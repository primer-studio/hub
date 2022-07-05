<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Publisher;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    public function TestFeed($url = 'https://www.varzesh3.com/rss/all')
    {
        $publisher = Publisher::where('name', 'test')->first();
        echo "Creating test dataset ...\r\n";
        $dataset = [];
        $dataset["{$publisher->name}"] = [
            'publisher_id' => $publisher->id,
            'feeds' => [
                [
                    'url' => $url,
                    'service_id' => 1
                ]
            ],
        ];
        echo "Test ready.\r\n";
        $this->XMLrender($dataset);
    }

    public function makeStreams()
    {
        echo "Fetching publishers ...\r\n";
        $streams = Publisher::all()->where('id', '!=', '1');
        $dataset = [];
        echo "Creating dataset ...\r\n";
        foreach ($streams as $stream) {
            $dataset["{$stream->name}"] = [
                'publisher_id' => $stream->id,
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
                News::updateOrCreate([
                    'publisher_id' => $content['publisher_id'],
                    'service_id' => $content['service_id'],
                    'title' => $content['title'],
                    'url' => $content['url'],
                    'timestamp' => $content['timestamp'],
                ]);
            } else {
                $duplicates_count += 1;
            }
        }

        echo "$duplicates_count duplicate entries ignored.\r\n";
        echo count($data) . " items [updated/inserted] to DB.\r\n";
    }

    public function XMLrender($custom_stream = false)
    {

        $streams = ($custom_stream !== false) ? $custom_stream : $this->makeStreams();
        // return $streams;

        $data = [];
        $timestamps = [];
        foreach ($streams as $owner => $stream) {
            foreach ($stream['feeds'] as $feed) {
                echo "Parsing feed: " . $feed['url'] . " ...\r\n";
                try {
                    $stream = file_get_contents($feed['url']);
                    $parser = simplexml_load_string($stream);
                    foreach ($parser->channel->item as $item) {
                        $date = (string )$item->pubDate;
                        // echo "$date\r\n";
                        $time = strtotime($item->pubDate);
                        // echo "$time\r\n";
                        $link = (string)$item->link;
                        // echo "$link\r\n";
                        $title = (string)$item->title;
                        // echo "$title\r\n";
                        $text = (string)$item->description;
                        // echo "<hr>";

                        $data[] = [
                            // 'src' => $owner,
                            'publisher_id' => $streams[$owner]['publisher_id'],
                            // 'service_id' => $streams[$owner]['service_id'],
                            'service_id' => $feed['service_id'],
                            'timestamp' => $time,
                            'url' => $link,
                            'title' => $title
                        ];

                        $timestamps[$time] = [
                            // 'src' => $owner,
                            'publisher_id' => $streams[$owner]['publisher_id'],
                            'service_id' => $feed['service_id'],
                            'timestamp' => $time,
                            'url' => $link,
                            'title' => $title
                        ];
                    }
                    echo "Feed parsed.\r\n";
                } catch (\Exception $exception) {
                    Storage::disk('local')
                        ->append('/logs/' . date('Y-m-d') . '/' . $streams[$owner]['publisher_id'] . '-fetch-fail-attempt.log'
                            , time() . ' - ' . date('H:i:s') . ' - cant fetch feed: ' . $feed['url'] . ' -> ' . $exception->getMessage());
                    echo "Can't parse feed.\r\n";
                    echo $exception->getMessage() . "\r\n";
                    echo "passing feed ...\r\n";
                }
            }
        }
        echo "Dataset ready.\r\n";
        krsort($timestamps);
        echo "Dataset sorted.\r\n";

        // return $timestamps;
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
            $class = ($c == 1) ? 'uk-text-bold' : null ;
            $style = ($c == 1) ? 'border-right: 3px solid #4c8bf540; padding-right: 3px' : null ;
            $response .= "<li class='$class' style='$style'><a class='uk-link-reset' href='$l' target='_blank' title='$p - $t'>$t</a></li>";
            $c ++;
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
        echo "Founded " . count($duplicates) . " duplicate rows ...\r\n.";

        if (count($duplicates) > 0) {
            echo "Process to removing duplicate items ...\r\n";
            $list = [];
            $should_delete = [];
            foreach ($duplicates as $duplicate) {
                $tmp = News::where('title', $duplicate->title)->orderByDesc('publisher_id')->orderByDesc('timestamp')->select(['id', 'publisher_id', 'timestamp', 'title'])->get();
                $list[$duplicate->title] = $tmp->groupBy('publisher_id');
            }
            foreach($list as $items) {
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
                            echo "id:" . $item->id . " removed.\r\n";
                        }
                    }
                    $c ++;
                }
            }
            echo "Duplicate entries removed.\r\n";
        } else {
            echo "Process stopped due to results count.";
        }
    }
}
