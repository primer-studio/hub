@extends('private.template')

@section('title')
    Manager Dashboard
@endsection

@section('content')
    <div class="uk-card uk-card-default uk-card-large uk-card-body uk-border-rounded opacity-90">
        <div class="uk-child-width-1-3@m" uk-grid>
            <div>
                <div class="card-mazarine card-light uk-card uk-card-default uk-card-body uk-border-rounded">
                    <h3 class="uk-card-title">Today News Count</h3>
                    <p>{{ $statics['topday_news_count'] }}</p>
                </div>
            </div>

            <div>
                <div class="card-naval card-light uk-card uk-card-default uk-card-body uk-border-rounded">
                    <h3 class="uk-card-title">Today Hits</h3>
                    <p>{{ $statics['topday_news_hits'] }}</p>
                </div>
            </div>

            <div>
                <!-- <div class="card-night card-light uk-card uk-card-default uk-card-body uk-border-rounded"> -->
                <!-- <h3 class="uk-card-title">Queue status</h3> -->
                {{--                <p class="uk-text-bold">12 jobs is running... </p>--}}
                <ul class="uk-list uk-list-disc">
                    @foreach($statics['jobs'] as $job)
                        @php
                            $s = new DateTime(gmdate("Y-m-d H:i:s", $job->started_at));//start time
                            $f = new DateTime(gmdate("Y-m-d H:i:s", $job->finished_at));//end time
                            $interval = $s->diff($f);
                        @endphp
                        @if($job->current_status == 'running')
                            <li><p class="uk-text-meta"><code>{{ $job->type }}</code> <span
                                        class="uk-label uk-label-warning">{{ $job->current_status }}</span></p></li>
                        @elseif($job->current_status == 'finished')
                            <li><p class="uk-text-meta"><code>{{ $job->type }}</code> <span
                                        class="uk-label uk-label-success">{{ $job->current_status }}</span><span
                                        class="uk-text-meta">{{ $interval->format('%s seconds') }}</span></p></li>
                        @elseif($job->current_status == 'failed')
                            <li><p class="uk-text-meta"><code>{{ $job->type }}</code> <span
                                        class="uk-label uk-label-default">{{ $job->current_status }}</span></p></li>
                        @else
                            <li><p class="uk-text-meta"><code>{{ $job->type }}</code> <span class="uk-label"
                                                                                            style="background: #303030; color: #c6c6c6">{{ $job->current_status }}</span>
                                </p></li>
                        @endif
                    @endforeach
                </ul>

                <!-- </div> -->
            </div>
        </div>

        <hr class="uk-divider-icon">

        <div class="card- card-dark uk-card uk-card-default uk-card-body uk-border-rounded">
            <h3 class="uk-card-title">Top 10</h3>
            <hr class="uk-divider-small">

            <table class="uk-table uk-table-striped uk-text-left">
                <thead>
                <tr class="uk-text-left">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Hits</th>
                    <th>Owner</th>
                    <td>labels</td>
                </tr>
                </thead>
                <tbody>
                @foreach($top_hits as $item)
                    <tr class="@if(!empty($item->extra)) uk-text-danger @endif">
                        <td>{{ $item->id }}</td>
                        <td><a href="{{ route('Public > Show > News', $item->id) }}"
                               target="_blank">{{ $item->title }}</a></td>
                        <td>{{ $item->hits }}</td>
                        <td>{{ $item->publisher->name }}</td>
                        @php
                            $labels = [];
                            if (strpos($item->extra, 'title:empty') !== false) {
                                $labels[] = "<span class='uk-label uk-label-warning' style='color: white !important; font-size: 10px'>title:empty</span>";
                            }
                            if (strpos($item->extra, 'title:illegal') !== false) {
                                $labels[] = "<span class='uk-label uk-label-danger' style='color: white !important; font-size: 10px'>title:illegal</span>";
                            }
                            if (strpos($item->extra, 'url:empty') !== false) {
                                $labels[] = "<span class='uk-label uk-label-warning' style='color: white !important; font-size: 10px'>url:empty</span>";
                            }
                            if (strpos($item->extra, 'timestamp') !== false) {
                                $labels[] = "<span class='uk-label uk-label-danger' style='color: white !important; font-size: 10px'>timestamp:0/empty</span>";
                            }
                        @endphp
                        <td>@foreach($labels as $label) {!! $label !!} @endforeach</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
