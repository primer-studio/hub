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
                <p>+239K</p>
            </div>
        </div>
        
        <div>
            <!-- <div class="card-night card-light uk-card uk-card-default uk-card-body uk-border-rounded"> -->
                <!-- <h3 class="uk-card-title">Queue status</h3> -->
                <p class="uk-text-bold">12 jobs is running... </p>
                <ul class="uk-list uk-list-disc">
                    <li><p class="uk-text-meta">news fetch: <span class="uk-label uk-label-primary" id="update_dataset" onClick="update_dataset()">manual.</span></p></li>
                    <li><p class="uk-text-meta">words filter: <span class="uk-label uk-label-danger">failed.</span></p></li>
                    <li><p class="uk-text-meta">tags reorder: <span class="uk-label uk-label-success">done.</span></p></li>
                    <li><p class="uk-text-meta">hints migrate: <span class="uk-label uk-label-warning">proccessing ...</span></p></li>
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
                    <!-- <th>ID</th> -->
                    <th>Title</th>
                    <th>Hits</th>
                    <th>Owner</th>
                </tr>
            </thead>
            <tbody>
            @foreach($top_hits as $item)
                <tr>
                    <!-- <td>{{ $item->id }}</td> -->
                    <td><a href="{{ route('Public > Show > News', $item->id) }}" target="_blank">{{ $item->title }}</a></td>
                    <td>{{ $item->hits }}</td>
                    <td>{{ $item->publisher->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>            
    </div>

</div>
@endsection