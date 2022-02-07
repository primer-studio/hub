<div class="uk-container uk-container-expand uk-padding-large">
        <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
            <div class="uk-child-width-expand uk-text-center" uk-grid>
                <div>
                    <p>
                        <a href="http://keymanager.ir" class="uk-link-reset">
                            <span><img src="{{ asset('assets/theme/minimal/images/logo.png') }}" alt="" srcset="" style="border-radius: 5px; filter: black; filter: grayscale(20%); width: 35px"></span>
                            <span class="uk-visible@m">&nbsp;Spider's Nest</span>
                        </a>
                    </p>
                </div>
                <div>
                    <p uk-tooltip="title: Publishers; pos: top">
                        <a href="{{ route('Admin > Dashboard > Publishers > Manage') }}" class="uk-link-reset">
                            <span uk-icon="users"></span>
                            <span id="Data:Publishers" class="uk-visible@m">&nbsp;Publishers</span>
                        </a>
                    </p>
                </div>
                <div>
                    <p uk-tooltip="title: Add publisher; pos: top">
                        <a href="{{ route('Admin > Dashboard > Publishers > Add') }}" class="uk-link-reset">
                            <span uk-icon="plus"></span>
                            <span class="uk-visible@m">&nbsp;Add publisher</span>
                        </a>
                    </p>
                </div>
                <div>
                    <p uk-tooltip="title: Jobs; pos: top">
                        <a href="#" class="uk-link-reset">
                            <span uk-icon="database"></span>
                            <span class="uk-visible@m">&nbsp;Jobs</span>
                        </a>
                    </p>
                </div>
                <div>
                    <p uk-tooltip="title: Add service; pos: top">
                        <a href="http://keymanager.ir/add/service" class="uk-link-reset">
                            <span uk-icon="plus-circle"></span>
                            <span class="uk-visible@m">&nbsp;Service</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>