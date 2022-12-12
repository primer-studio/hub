@extends('private.template')

@section('title')
    Edit Service
@endsection

@section('content')
    <div class="uk-card uk-card-default uk-card-large uk-card-body uk-border-rounded opacity-90">
        <div class="uk-grid uk-child-width-1-2">
            <div>
                <h3 class="uk-card-title">Edit Service</h3>
            </div>
            <div class="uk-text-right">
                <a href="{{ url()->previous() }}" class="uk-text-meta uk-text-bolder"><- back</a>
            </div>
        </div>
        <div class="uk-divider uk-divider-small"></div>

        @if($errors->any())
            <div class="uk-margin">
                <div class="errors-bag">
                    <ul class="uk-list uk-list-square">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form class="uk-form-horizontal uk-margin-large" method="post">
            @csrf

            <div class="uk-margin">
                <label class="uk-form-label" for="name">Name</label>
                <div class="uk-form-controls">
                    <input class="uk-input @error('title') uk-form-danger @enderror" id="title" name="title" type="text"
                           placeholder="Service Name (Fa)" value="{{ $service->title }}">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="active">Status</label>
                <div class="uk-form-controls">
                    <input class="uk-input @error('active') uk-form-danger @enderror" id="active" name="active" type="number"
                           placeholder="0/1" value="{{ $service->active }}" min="0" max="1">
                </div>
            </div>

            <div class="uk-margin uk-margin-large-top">
                <button class="uk-button uk-button-primary uk-width-1-3 uk-align-center" type="submit">submit</button>
            </div>

        </form>
    </div>
@endsection
