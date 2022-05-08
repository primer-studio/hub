<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Publisher;

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
        foreach ($data as $content) {
            // $stream = New News;
            // $stream->publisher_id = $content['publisher_id'];
            // $stream->service_id = 1;
            // $stream->title = $content['title'];
            // $stream->url = $content['url'];
            // $stream->timestamp = $content['timestamp'];
            // $stream->save();

            News::updateOrCreate([
                'publisher_id' => $content['publisher_id'],
                'service_id' => $content['service_id'],
                'title' => $content['title'],
                'url' => $content['url'],
                'timestamp' => $content['timestamp'],
            ]);
        }

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
                        ->append('/logs/'.date('Y-m-d').'/'.$streams[$owner]['publisher_id'].'-fetch-fail-attempt.log'
                            , time().' - '.date('H:i:s').' - cant fetch feed: '.$feed['url'].' -> '.$exception->getMessage() );
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

    public function RealTime()
    {
        //
    }
}
