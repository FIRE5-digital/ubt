<nav id="site-menu" class="site-menu">
    @php($nav=\App\Nav::where('name','Main Nav')->first())
    <ul class="main-nav layout">
        @if($nav)
            @forelse($nav->getChildren as $item)
                <li @if($item->getChildren()->count())class="dropdown-menu more-dropdown"@endif>
                    <a href="{{ $item->destination }}">
                        {{ $item->name }}
                        @if($item->getChildren()->count())
                            <svg class="icon after">
                                <use xlink:href="/themes/ubt/img/sprite.svg#icon-chevron-down"></use>
                            </svg>
                        @endif
                    </a>
                    @if($item->getChildren()->count())
                        <div class="dropdown">
                            <ul class="layout module">
                                @foreach($item->getChildren as $subitem)
                                    <li><a href="{{ $subitem->destination }}">{{ $subitem->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </li>
            @empty
            @endforelse
        @endif
        {{-- <li class="menu-dropdown"><a href="#">More</a>
            <div class="menu-dropdown-inline">
                <ul>
                    <li><a href="/leasing-guides">Car Leasing Guides</a></li>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
        </li> --}}
    </ul>
    {{-- <div class="price-switch">
        <form id="price-switch" action="/switch" method="post">
            {!! \Form::token() !!}
            {!! \Form::hidden('switch', \Cookie::get('price_view'), ['id'=>'switch-price-type']) !!}
            <button class="{{ \Cookie::get('price_view')=='Personal' || !\Cookie::has('price_view') ? 'active' : '' }}" value="Personal">Personal</button>
            <button class="{{ \Cookie::get('price_view')=='Business' ? 'active' : '' }}" value="Business">Business</button>
            {{ \Cookie::get('price') }}
        </form>
    </div> --}}
</nav>