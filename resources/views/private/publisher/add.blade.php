@extends('private.template')

@section('title')
Add Publisher
@endsection

@section('content')
<div class="uk-card uk-card-default uk-card-large uk-card-body uk-border-rounded opacity-90">
    <div class="uk-grid uk-child-width-1-2">
        <div>
            <h3 class="uk-card-title">Add Publisher</h3>
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
                <input class="uk-input @error('name') uk-form-danger @enderror" id="name" name="name" type="text" placeholder="Publisher Name (Fa)" value="{{ old('name') }}">
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="website">Website</label>
            <div class="uk-form-controls">
                <input class="uk-input @error('website') uk-form-danger @enderror" id="website" name="website" type="text" placeholder="Publisher website url" value="{{ old('website') }}">
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="feeds">Feeds</label>
            <div class="uk-form-controls">
                <textarea class="uk-textarea @error('feeds') uk-form-danger @enderror" id="feeds" name="feeds">{{ old('feeds') }} </textarea>
                <span class="uk-text-meta"><?php echo '{"feeds":[{"service_id":1,""},{"service_id":2,"url":""},{"service_id":3,"url":""}]}'; ?></span>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="avatar">Avatar</label>
            <div class="uk-form-controls">
                <input class="uk-input @error('avatar') uk-form-danger @enderror" id="avatar" name="avatar" type="text" placeholder="Publisher avatar url" value="{{ old('avatar') }}">
            </div>
        </div>

        <div class="uk-margin uk-margin-large-top">
            <button class="uk-button uk-button-primary uk-width-1-3 uk-align-center" type="submit">submit</button>
        </div>

    </form>
</div>
@endsection