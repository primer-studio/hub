@extends('private.template')

@section('title')
Services Manage
@endsection

@section('content')
<div class="uk-card uk-card-default uk-card-large uk-card-body uk-border-rounded opacity-90">
    <div class="uk-grid uk-child-width-1-2">
        <div>
            <h3 class="uk-card-title">Manage Services</h3>
        </div>
        <div class="uk-text-right">
            <a href="{{ route('Admin > Dashboard > Services > Add') }}" target="_blank" class="uk-text-meta uk-text-bolder">Add Service</a>
        </div>
    </div>
    <div class="uk-divider uk-divider-small"></div>
    <table class="uk-table uk-table-striped uk-text-left">
        <thead>
            <tr class="uk-text-left">
                <th>#</th>
                <th>Name</th>
                <th>NewsCount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($services as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td><a href="{{ route('Admin > Dashboard > Services > Edit', $item->id) }}" target="_blank">{{ $item->title }}</a></td>
                <td>{{ $item->news->count() }}</td>
                <td>@if($item->active) <span uk-icon="check"></span> @else <span uk-icon="close"></span> @endif</td>
                <td><a href="{{ route('Admin > Dashboard > Services > Edit', $item->id) }}" target="_blank"><span class="uk-label uk-label-danger">Edit</span></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
