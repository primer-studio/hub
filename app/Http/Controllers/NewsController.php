<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Publisher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class NewsController extends Controller
{
    public function makeStreams() {
        $streams = Publisher::all();
        $dataset = [];

        foreach ($streams as $stream) {
            $dataset["{$stream->name}"] = [
                'publisher_id' => $stream->id,
                'feeds' => null,
            ];
            foreach(json_decode($stream->feeds)->feeds as $feed) {
                $dataset["{$stream->name}"]['feeds'][] = [
                    'url' => $feed->url,
                    'service_id' => $feed->service_id
                ];
            }
        }

        return $dataset;
    }
    public function XMLrender() {

        $streams = $this->makeStreams();
        // return $streams;

        $data = [];
        $timestamps = [];
        foreach($streams as $owner => $stream) {
            foreach($stream['feeds'] as $feed) {
                $stream = file_get_contents($feed['url']);
                $parser = simplexml_load_string($stream);
                
                foreach ($parser->channel->item as $item) {
                    $date = (string )$item->pubDate;
                    // echo "$date\r\n";
                    $time = strtotime($item->pubDate);
                    // echo "$time\r\n";
                    $link  = (string) $item->link;
                    // echo "$link\r\n";
                    $title = (string) $item->title;
                    // echo "$title\r\n";
                    $text  = (string) $item->description;
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
            }
        }
        krsort($timestamps);

        // return $timestamps;
        $this->UpdateDataSet($timestamps);
    }

    public function UpdateDataSet($data) {
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

        echo 'done.';
    }

    public function Show($id) {
        $news = News::FindOrFail($id);
        $news->hits = $news->hits + 1;
        $news->save();
        return view('public.news.iframe', compact(['news']));
    }

    public function RealTime() {
        //
    }
}
