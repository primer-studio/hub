@if($routeName == 'Public > Show > News')
    <div class="uk-hidden">
        <ul class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a href="{{ route('Public > Index') }}" itemprop="item" title="صفحه اصلی">
                  <span itemprop="name">
                    خانه
                  </span>
                </a>
                <meta itemprop="position" content="1">
            </li>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="">
                  <span itemprop="name">
                    {{ $news->service->title }}
                  </span>
                </a>
                <meta itemprop="position" content="2">
            </li>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="">
                  <span itemprop="name">
                    {{ $news->title }}
                  </span>
                </a>
                <meta itemprop="position" content="3">
            </li>
        </ul>
    </div>
@endif
