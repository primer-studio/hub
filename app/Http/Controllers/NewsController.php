<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Publisher;

use App\Models\Tag;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    public function TestFeed($url = 'https://www.rokna.net/fa/feeds/?p=Y2F0ZWdvcmllcz0yNDU%2C')
    {
        $stream = file_get_contents($url);
        $parser = simplexml_load_string($stream);
        foreach ($parser->channel->item as $item) {
            $date = $item->pubDate;
            $time = strtotime($item->pubDate);
            $link = $item->link;
            $title = (string) $item->title;
            $text = (string) $item->description;

            $data[] = [
                'timestamp' => $time,
                'url' => $link,
                'title' => $title,
                'description' => $text,
            ];
        }
        return $data;
    }

    public function makeStreams()
    {
        echo "Fetching publishers ...\r\n";
        $streams = Publisher::all()->where('id', '!=', '1');
//        $streams = $streams->where('id', 7);
        $dataset = [];
        echo "Creating dataset ...\r\n";
        foreach ($streams as $stream) {
            $dataset["{$stream->name}"] = [
                'publisher_id' => $stream->id,
                'settings' => $stream->settings,
                'has_custom_feed_settings' => $this->PublisherSettingParser($stream->id, 'pubdate', false),
                'feeds' => null,
            ];
            foreach (json_decode($stream->feeds)->feeds as $feed) {
                $dataset["{$stream->name}"]['feeds'][] = [
                    'url' => $feed->url,
                    'service_id' => $feed->service_id
                ];
            }
        }
        echo "Dataset ready.\r\n";
        return $dataset;
    }

    public function UpdateDataSet($data)
    {
        echo "Pushing dataset to DB ...\r\n";
        $duplicates_count = 0;
        foreach ($data as $content) {
            // $stream = New News;
            // $stream->publisher_id = $content['publisher_id'];
            // $stream->service_id = 1;
            // $stream->title = $content['title'];
            // $stream->url = $content['url'];
            // $stream->timestamp = $content['timestamp'];
            // $stream->save();
            $q = News::where([
                'publisher_id' => $content['publisher_id'],
                'service_id' => $content['service_id'],
                'title' => $content['title'],
                'url' => $content['url'],
            ])->count();
            if (!$q) {
                $news = News::updateOrCreate([
                    'publisher_id' => $content['publisher_id'],
                    'service_id' => $content['service_id'],
                    'title' => $content['title'],
                    'description' => $content['description'],
                    'url' => $content['url'],
                    'timestamp' => $content['timestamp'],
                ]);
//                $this->InsertNewsTags($news);

            } else {
                $duplicates_count += 1;
            }
        }

        echo "$duplicates_count duplicate entries ignored.\r\n";
        echo count($data) . " items [updated/inserted] to DB.\r\n";
    }

    public function PublisherSettingParser($publisher_id, $input, $default)
    {
        $publisher = Publisher::find($publisher_id);
        return (is_null($publisher))
            ? false
            : ((is_null($publisher->settings) || empty($publisher->settings) || !property_exists(json_decode($publisher->settings), $input) || is_null(json_decode($publisher->settings)->$input)) ? $default : json_decode($publisher->settings)->$input);
    }

    public function XMLrender($custom_stream = false)
    {

        $streams = ($custom_stream !== false) ? $custom_stream : $this->makeStreams();

        $data = [];
        $timestamps = [];
        foreach ($streams as $owner => $stream) {
            if (!is_null($stream['settings'])) {
                $feed_settings = json_decode($stream['settings']);
                if (!is_null($feed_settings)) {
                    $pubDate_key = $feed_settings->pubdate;
                    $link_key = $feed_settings->url;
                    $title_key = $feed_settings->title;
                    $text_key = $feed_settings->description;
                }
            }

            $pid = $stream['publisher_id'];
            foreach ($stream['feeds'] as $feed) {
                echo "Parsing feed: " . $feed['url'] . " ...\r\n";
                try {
                    /***
                     * the fgetcontents is old and has bugs with charsets & etc.
                     * so fgetcontents replaced with laravel http which uses guzzleHttp client.
                     */
//                    $arrContextOptions = [
//                        "ssl"=> [
//                            "verify_peer"=>false,
//                            "verify_peer_name"=>false,
//                        ]
//                    ];
//                    $stream = file_get_contents($feed['url'], false, stream_context_create($arrContextOptions));
                    $stream = Http::withoutVerifying()->get($feed['url'])->body();
                    $parser = simplexml_load_string($stream);
                    foreach ($parser->channel->item as $item) {
                        $date = (string) isset($pubDate_key) ? $item->$pubDate_key : $item->pubDate;
                        $time = isset($pubDate_key) ? strtotime($item->$pubDate_key) :  strtotime($item->pubDate);
                        $link = (string) isset($link_key) ? $item->$link_key : $item->link;
                        $title = (string) isset($title_key) ? $item->$title_key : $item->title;
                        $text = isset($text_key) ? $item->$text_key : $item->description;
                        $text = (is_object($text)) ? $text[0]->__toString() : $text;

                        $data[] = [
                            'publisher_id' => $streams[$owner]['publisher_id'],
                            'service_id' => $feed['service_id'],
                            'timestamp' => $time,
                            'url' => $link,
                            'title' => $title,
                            'description' => $text,
                        ];
                        $timestamps[$time] = [
                            'publisher_id' => $streams[$owner]['publisher_id'],
                            'service_id' => $feed['service_id'],
                            'timestamp' => $time,
                            'url' => $link,
                            'title' => $title,
                            'description' => $text,
                        ];
                    }
                    echo "Feed parsed.\r\n";
                } catch (\Exception $exception) {
                    Storage::disk('local')
                        ->append('/logs/' . date('Y-m-d') . '/' . $streams[$owner]['publisher_id'] . '-fetch-fail-attempt.log'
                            , time() . ' - ' . date('H:i:s') . ' - cant fetch feed: ' . $feed['url'] . ' -> ' . $exception->getMessage() . " [File: {$exception->getFile()}  Line: {$exception->getLine()}]");
                    echo "Can't parse feed.\r\n";
                    echo $exception->getMessage() . "\r\n";
                    echo "passing feed ...\r\n";
                }
            }
        }
        echo "Dataset ready.\r\n";
        krsort($timestamps);
        echo "Dataset sorted.\r\n";
        $this->UpdateDataSet($timestamps);
    }

    public function Show($id)
    {
        $news = News::FindOrFail($id);
        $news->hits = $news->hits + 1;
        $news->save();
        return view('public.news.iframe', compact(['news']));
    }

    public function RealTime(Request $request, $order, $count)
    {
        $news = News::where('publisher_id', '!=', 1)->orderByDesc($order)->take($count)->get();
        $response = '';
        $c = 1;
        foreach ($news as $item) {
            $l = route('Public > Show > News', $item->id);
            $t = $item->title;
            $p = $item->publisher->name;
            $class = ($c == 1) ? 'uk-text-meta uk-text-danger' : 'uk-text-meta';
            $id = ($c == 1) ? 'realtime-headline' : null;
            $style = ($c == 1) ? 'border-right: 3px solid #4c8bf540; padding-right: 3px' : null;
            $utm = "?utm_source=website&utm_medium=realtime&utm_campaign=default";
            $response .= "<li id='$id' class='$class' style='$style'><a class='uk-link-reset' href='$l$utm' target='_blank' title='$p - $t'>$t</a></li>";
            $c++;
        }
        return $response;
    }

    public function RemoveDuplicates()
    {
        /**
         * query: SELECT title, publisher_id, timestamp, COUNT(*) c FROM `news` GROUP BY title HAVING c > 1 ORDER BY timestamp DESC
         * note: this query wont work till the mysql engine 'strict' => true, changes to false in config/database.php
         * note: consider setting mysql strict to flase may create security issues.
         */
//        $duplicates = News::whereDate('created_at', Carbon::today())
//                            ->select([
//                                'title',
//                                'publisher_id',
//                                'timestamp',
//                                DB::raw('COUNT(*) as `c`')
//                            ])
//                            ->groupBy('title')
//                            ->having('c', '>', 1)
//                            ->orderByDesc('timestamp')
//                            ->get();
        /**
         * note: because top code block has issues, use this type of query,
         */

        echo "Fetching duplicate entries created today ...\r\n";
        $duplicates = DB::table('news')
            ->select('title', DB::raw('COUNT(*) as `count`'))
            ->whereDate('created_at', Carbon::today())
            ->groupBy('title')
            ->havingRaw('COUNT(*) > 1')
            ->get();
        echo "Founded " . count($duplicates) . " duplicate rows ...\r\n";

        if (count($duplicates) > 0) {
            echo "Process to removing duplicate items ...\r\n";
            $list = [];
            $should_delete = [];
            foreach ($duplicates as $duplicate) {
                $tmp = News::where('title', $duplicate->title)->orderByDesc('publisher_id')->orderByDesc('timestamp')->select(['id', 'publisher_id', 'timestamp', 'title'])->get();
                $list[$duplicate->title] = $tmp->groupBy('publisher_id');
            }
            foreach ($list as $items) {
                foreach ($items as $publisher_id => $news) {
                    if (count($items[$publisher_id]) > 1) {
                        $should_delete[] = $news;
                    }
                }
            }
            foreach ($should_delete as $news) {
                $c = 1;
                foreach ($news as $item) {

                    while ($c > 1) {
                        $index = News::find($item->id);
                        if (!is_null($index)) {
                            $index->delete();
//                            echo "id:" . $item->id . " removed.\r\n";
                        }
                    }
                    $c++;
                }
            }
            echo "$c duplicate entries removed.\r\n";
        } else {
            echo "Process stopped due to results count.";
        }
    }

    public function Test()
    {
        $streams = Publisher::all();
        foreach ($streams as $stream) {
            if (strpos($stream->avatar, 'http') !== false) {
                $arrContextOptions=array(
                    "ssl"=>array(
                        "verify_peer"=>false,
                        "verify_peer_name"=>false,
                    ),
                );
                $response = file_get_contents($stream->avatar, false, stream_context_create($arrContextOptions));
                $path = 'assets/theme/minimal/images/fav/'.time().'-'.basename($stream->avatar);
                file_put_contents($path, $response);
                Publisher::find($stream->id)->update([
                    'avatar' => $path
                ]);
            }
        }
    }

    public function LegalRules()
    {
        $illegal_words = [
            'دلار',
            'بلیط'
        ];
        $news = News::whereDate('created_at', Carbon::today())->get();
        foreach ($news as $item) {
            $main_extra = $item->extra;
            $extra = '';
            if (is_null($item->title) || strlen($item->title) == 0 || $item->title == '') {
                if (strpos($main_extra, 'title:empty') == false) {
                    $extra .= 'title:empty|';
                }
            }
            if (is_null($item->url)) {
                if (strpos($main_extra, 'url:empty') == false) {
                    $extra .= 'url:empty|';
                }
            }
            if (is_null($item->timestamp) || $item->timestamp == 0) {
                if (strpos($main_extra, 'timestamp:') == false) {
                    $extra .= 'timestamp:0/empty|';
                }
            }

            foreach ($illegal_words as $illegal_item) {
                if (strpos($item->title, $illegal_item) !== false) {
                    if (strpos($main_extra, 'title:illegal') == false) {
                        $extra .= 'title:illegal';
                    }
                }
            }

            if ($extra !== '') {
                $handle = News::find($item->id);
                $handle->extra = $main_extra . $extra;
                $handle->active = 0;
                $handle->save();
            }
        }
    }

    public function Cleanup($input) {
        $characters = [
            'ك' => 'ک',
            'دِ' => 'د',
            'بِ' => 'ب',
            'زِ' => 'ز',
            'ذِ' => 'ذ',
            'شِ' => 'ش',
            'سِ' => 'س',
            'ى' => 'ی',
            'ي' => 'ی',
            '١' => '۱',
            '٢' => '۲',
            '٣' => '۳',
            '٤' => '۴',
            '٥' => '۵',
            '٦' => '۶',
            '٧' => '۷',
            '٨' => '۸',
            '٩' => '۹',
            '٠' => '۰',
        ];
        $input = strip_tags($input);
        $input = str_replace(array_keys($characters), array_values($characters),$input);
        $input = str_replace(['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], ' ', $input);
        $input = str_replace(['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'], ' ', $input);
        $input = str_replace(['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'], ' ', $input);
        $input = str_replace(['\r', '\r\n', PHP_EOL, '.', ',', '،', '/', '\\', ')', '(', '"', ':', ';'], ' ', $input);
//        $input = preg_replace("/&#?[a-z0-9]{2,8};/i","",$input);
        return $input;
    }

    public function InsertNewsTags(News $news)
    {
        $stopwords = file_get_contents(__DIR__.'/Helpers/fa_IR_stopwords.txt');
        $stopwords = explode(PHP_EOL, $stopwords);

        $title = $this->Cleanup($news->title);
        $sample = $this->Cleanup($news->description);

        // Remove stop words
        foreach ($stopwords as $word) {
            $sample = str_replace(" $word ", ' ', $sample);
        }
        // explode input word by word
        $sample = explode(' ', $sample);
        $sample = array_filter($sample, fn($value) => !is_null($value) && $value !== '' && $value !== ' ');
        foreach ($sample as $index => $word) {
            $sample[$index] = trim(str_replace(['\r', '\r\n', PHP_EOL, '.', ',', '،', '/', '\\', ')', '(', '"', ':', ';'], '', $word));
        }
        $scores = [];
        // loop over words to calculate score
        foreach ($sample as $word) {
            $score = 0;
            foreach ($sample as $index) {
                if ($index == $word || strpos($index, $word) !== false) {
                    $score ++;
                }
            }
            if (strpos($title, $word) !== false) {
                $score ++;
            }
            foreach (array_intersect(explode(' ', $title), $sample) as $index) {
                if ($index == $word || strpos($index, $word) !== false) {
                    $score ++;
                }
            }
            $scores[$word] = $score;
        }

        // loop over words to remove scores lower than 3
        foreach($scores as $item => $score) {
            if ($score < 3) {
                unset($scores[$item]);
            }
        }

        // remove indexes with less than 3 characters
        foreach($scores as $index => $score) {
            // it should be 3, because some important tags like سکه & طلا wont pass.
            if (mb_strlen($index) < 3) {
                unset($scores[$index]);
            }
        }

        // sort scores by score value
        arsort($scores);

        $tags = array_keys($scores);
        $tags_bag = [];
        foreach ($tags as $tag) {
            $tag_exists = Tag::where('name', $tag)->first();
            $can_insert_new_tag = (is_null($tag_exists)) ? 1 : 0 ;
            if($can_insert_new_tag) {
                $tmp = new Tag();
                $tmp->name = $tag;
                $tmp->slug = SlugService::createSlug(Tag::class, 'slug', $tag);
                $tmp->save();
                $tags_bag[] = $tmp->id;
            } else {
                $tags_bag[] = $tag_exists->id;
            }
        }
        $news->tag()->sync($tags_bag);
    }

    public function TagAssistance()
    {
//        $news = News::latest('timestamp')->take(200)->get();
//        foreach ($news as $news_item) {
//            $this->InsertNewsTags($news_item);
//        }
    }
}
