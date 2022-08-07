@extends('private.template')

@section('title')
    Edit Publisher
@endsection

@section('content')
    <div class="uk-card uk-card-default uk-card-large uk-card-body uk-border-rounded opacity-90">
        <div class="uk-grid uk-child-width-1-2">
            <div>
                <h3 class="uk-card-title">Edit Publisher</h3>
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
                    <input class="uk-input @error('name') uk-form-danger @enderror" id="name" name="name" type="text"
                           placeholder="Publisher Name (Fa)" value="{{ $publisher->name }}">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="website">Website</label>
                <div class="uk-form-controls">
                    <input class="uk-input @error('website') uk-form-danger @enderror" id="website" name="website"
                           type="text" placeholder="Publisher website url" value="{{ $publisher->website }}">
                </div>
            </div>

            <div class="uk-grid">
                <div class="uk-width-1-2@m">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="feeds">Feeds</label>
                        <div class="uk-form-controls">
                            <textarea class="uk-textarea @error('feeds') uk-form-danger @enderror" id="feeds"
                                      name="feeds" rows=10>{{ $publisher->feeds }} </textarea>
                            <code class="uk-text-meta"><?php echo '{"feeds":[{"service_id":1,"url":""}]}'; ?></code>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-2@m">
                    <div class="uk-margin json-action-box">
                        <label class="uk-form-label uk-margin-bottom">Add Item</label>
                        <input class="uk-input uk-margin-bottom" id="feed_url" name="feed_url" type="text"
                               placeholder="feed url">

                        <select class="uk-select uk-margin-bottom" id="service_id" name="service_id">
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->title }} - {{ $service->id }}</option>
                            @endforeach
                        </select>
                        <script>
                            function addFeedItem() {
                                let feeds = document.querySelector('#feeds');
                                let feedObj = JSON.parse(feeds.value);
                                let lastKey = (Object.keys(feedObj.feeds)).length + 1;
                                let serviceId = document.querySelector('#service_id').value;
                                let feedUrl = document.querySelector('#feed_url').value;
                                let newObj = {[lastKey]: {"service_id": serviceId, "url": feedUrl}};
                                Object.assign(feedObj.feeds, newObj);
                                let newJson = JSON.stringify(feedObj).replace(',null,', ',');

                                document.querySelector('#feeds').value = newJson;
                                document.querySelector('#feeds').innerText = newJson;
                                document.querySelector('#feeds').innerHtml = newJson;

                                console.table(JSON.parse(newJson));
                            }
                        </script>
                        <span class="uk-button uk-width-1-3 uk-align-center" onclick="addFeedItem()">inject json</span>
                    </div>
                </div>
            </div>

            <div class="uk-grid">
                <div class="uk-width-1-1@m">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="settings_pubdate"><code>RSS PUBDATE key</code></label>
                        <div class="uk-form-controls">
                            <input class="uk-input uk-margin-bottom @error('settings_pubdate') uk-form-danger @enderror" id="settings_pubdate" name="settings[pubdate]"
                                    type="text" placeholder="RSS PUBDATE key signature" value="{{ $publisher->getSettings('pubdate') }}">
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1@m">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="settings_url"><code>RSS URL key</code></label>
                        <div class="uk-form-controls">
                            <input class="uk-input uk-margin-bottom @error('settings_url') uk-form-danger @enderror" id="settings_url" name="settings[url]"
                                    type="text" placeholder="RSS URL key signature" value="{{ $publisher->getSettings('url') }}">
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1@m">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="settings_title"><code>RSS TITLE key</code></label>
                        <div class="uk-form-controls">
                            <input class="uk-input uk-margin-bottom @error('settings_title') uk-form-danger @enderror" id="settings_title" name="settings[title]"
                                    type="text" placeholder="RSS url key signature" value="{{ $publisher->getSettings('title') }}">
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1@m">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="url"><code>RSS DESCRIPTION key</code></label>
                        <div class="uk-form-controls">
                            <input class="uk-input uk-margin-bottom @error('settings_description') uk-form-danger @enderror" id="settings_description" name="settings[description]"
                                    type="text" placeholder="RSS DESCRIPTION key signature" value="{{ $publisher->getSettings('description') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="avatar">Avatar</label>
                <div class="uk-form-controls">
                    <input class="uk-input @error('avatar') uk-form-danger @enderror" id="avatar" name="avatar"
                           type="text" placeholder="Publisher avatar url" value="{{ $publisher->avatar }}">
                </div>
            </div>

            <div class="uk-margin uk-margin-large-top">
                <button class="uk-button uk-button-primary uk-width-1-3 uk-align-center" type="submit">submit</button>
            </div>

        </form>
    </div>
@endsection
