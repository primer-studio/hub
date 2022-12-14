<div class="uk-container uk-container-expand uk-padding-large">
        <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
            <div class="uk-child-width-expand uk-text-center" uk-grid>
                <div>
                    <p uk-tooltip="title: Dashboard; pos: top">
                        <a href="{{ route('Admin > Dashboard > Index') }}" class="uk-link-reset">
                            <span uk-icon="home"></span>
                            <span id="Data:Dashboard" class="uk-visible@m">&nbsp;Dashboard</span>
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
                    <p uk-tooltip="title: Servives; pos: top">
                        <a href="{{ route('Admin > Dashboard > Services > Manage') }}" class="uk-link-reset">
                            <span uk-icon="thumbnails"></span>
                            <span class="uk-visible@m">&nbsp;Services</span>
                        </a>
                    </p>
                </div>
                <div>
                    <p uk-tooltip="title: Add service; pos: top">
                        <a href="{{ route('Admin > Dashboard > Services > Add') }}" class="uk-link-reset">
                            <span uk-icon="plus-circle"></span>
                            <span class="uk-visible@m">&nbsp;Service</span>
                        </a>
                    </p>
                </div>
                <div>
                    <p uk-tooltip="title: Logout; pos: top">
                        <a href="{{ route('logout') }}.php" class="uk-link-reset">
                            <span uk-icon="sign-out"></span>
                            <span class="uk-visible@m">&nbsp;Logout!</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
