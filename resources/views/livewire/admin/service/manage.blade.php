@extends('livewire.template')

@section('title')
    Publishers Manage
@endsection

@section('content')
    <div class="uk-card uk-card-default uk-card-large uk-card-body uk-border-rounded opacity-90">
        <div class="uk-grid uk-child-width-1-2">
            <div>
                <h3 class="uk-card-title">Manage Publishers</h3>
            </div>
            <div class="uk-text-right">
                <a href="{{ route('Admin > Dashboard > Publishers > Add') }}" target="_blank" class="uk-text-meta uk-text-bolder">Add Publisher</a>
            </div>
        </div>
        <div class="uk-divider uk-divider-small"></div>
        <table class="uk-table uk-table-striped uk-text-left">
            <thead>
            <tr class="uk-text-left">
                <!-- <th>ID</th> -->
                <th>Name</th>
                <th>NewsCount</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $item)
                <tr>
                <!-- <td>{{ $item->id }}</td> -->
                    <td><a href="{{ route('Admin > Dashboard > Publishers > Edit', $item->id) }}" target="_blank">{{ $item->name }}</a></td>
                    <td>{{ $item->news->count() }}</td>
                    <td><a href="{{ route('Admin > Dashboard > Publishers > Edit', $item->id) }}" target="_blank"><span class="uk-label uk-label-danger">Edit</span></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
