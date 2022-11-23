        <!-- SITE HEADER -->

        <!-- OPTIONAL CLASSES: dark -->
        <header class="site-header ctr">
            <!-- OPTIONAL CLASSES: transparent, below -->
            <div class="top-bar transparent">
                <div class="top-bar-wrapper">
                    <div class="top-bar-container">
                        <ul class="top-bar-items layout inline-list">
                            <li>
                                <a href="tel: {{ @$page->content->global->telephone }}">
                                    <svg class="icon before">
                                        <use xlink:href="/themes/ubt/img/sprite.svg#icon-phone"></use>
                                    </svg>  
                                    
                                    <strong>{{ @$page->content->global->telephone }}</strong>
                                </a>
                            </li>
    
                            <li>
                                <a href="mailto: {{ @$page->content->global->email }}">
                                    <svg class="icon before">
                                        <use xlink:href="/themes/ubt/img/sprite.svg#icon-mail"></use>
                                    </svg>
                                    {{ @@$page->content->global->email }}
                                </a>
                            </li>
    
                            <li>
                                <svg class="icon before">
                                    <use xlink:href="/themes/ubt/img/sprite.svg#icon-clock"></use>
                                </svg>
        
                                Monday - Friday : 09:00 - 17:00
                            </li>
    
                            {{-- <li>
                                <a href="#">
                                    <svg class="icon">
                                        <use xlink:href="/themes/ubt/img/sprite.svg#icon-star"></use>
                                    </svg>
    
                                    <svg class="icon">
                                        <use xlink:href="/themes/ubt/img/sprite.svg#icon-star"></use>
                                    </svg>
    
                                    <svg class="icon">
                                        <use xlink:href="/themes/ubt/img/sprite.svg#icon-star"></use>
                                    </svg>
    
                                    <svg class="icon">
                                        <use xlink:href="/themes/ubt/img/sprite.svg#icon-star"></use>
                                    </svg>
    
                                    <svg class="icon before">
                                        <use xlink:href="/themes/ubt/img/sprite.svg#icon-star"></use>
                                    </svg>
            
                                    580 reviews
                                </a>
                            </li> --}}
                        </ul>

                       
                        <ul class="social-links layout inline-list">
                            @if(@$page->content->global->twitter_url)
                            <li>
                                <a href="{{ @$page->content->global->twitter_url  }}">
                                    <svg class="icon">
                                        <use xlink:href="/themes/ubt/img/sprite.svg#icon-twitter"></use>
                                    </svg>
                                </a>
                            </li>
                            @endif
                            @if(@$page->content->global->facebook_url)
                            <li>
                                <a href="{{ @$page->content->global->facebook_url  }}">
                                    <svg class="icon">
                                        <use xlink:href="/themes/ubt/img/sprite.svg#icon-facebook"></use>
                                    </svg>
                                </a>
                            </li>
                            @endif
                            @if(@$page->content->global->linkedin_url)
                            <li>
                                <a href="{{ @$page->content->global->linkedin_url  }}">
                                    <svg class="icon">
                                        <use xlink:href="/themes/ubt/img/sprite.svg#icon-linkedin"></use>
                                    </svg>
                                </a>
                            </li>
                            @endif
                            @if(@$page->content->global->instagram_url)
                            <li>
                                <a href="{{ @$page->content->global->instagram_url  }}">
                                    <svg class="icon">
                                        <use xlink:href="/themes/ubt/img/sprite.svg#icon-instagram"></use>
                                    </svg>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="nav-wrapper">
                <div class="nav-container inner">
                    <a class="logo" href="/">
                        <img src="/themes/ubt/img/logo@2x.png" alt="{{ config('company.name') }}">
                    </a>

                    <!-- nav start -->
                    @include('themes.ubt.inc.nav')

                    
                    <ul class="nav-toggles inline-list layout">
                        <li>
                            <a href="#" class="toggle-search">
                                <svg class="icon circle">
                                    <use xlink:href="/themes/ubt/img/sprite.svg#icon-search-toggle"></use>
                                </svg>
                            </a>
                        </li>
                    
                        <li class="hidden-m">
                            <a href="/account">
                                <svg class="icon circle">
                                    <use xlink:href="/themes/ubt/img/sprite.svg#icon-user"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    
                    <button id="hamburger" class="hamburger hamburger--slider" type="button" onclick="toggleNav()">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>    
                </div>


            </div>


        </header>
        <!-- END SITE HEADER -->
        
        @if(@$page->name=='Home')
        <!-- MISSION STATEMENTS -->
        <div class="mission-statements">
            <ul>
                <li>
                    <svg class="icon">
                        <use xlink:href="/themes/ubt/img/sprite.svg#icon-check"></use>
                    </svg>
                    Specialists in <strong>Electric</strong>
                </li>

                <li>
                    <svg class="icon">
                        <use xlink:href="/themes/ubt/img/sprite.svg#icon-check"></use>
                    </svg>
                    <strong>Ultra Low</strong> Emission Vehicles
                </li>

                <li>
                    <svg class="icon">
                        <use xlink:href="/themes/ubt/img/sprite.svg#icon-check"></use>
                    </svg>
                    <strong>Sustainable</strong> Options
                </li>
            </ul>
        </div>
        <!-- END MISSION STATEMENTS -->
        @endif
        
        @if(@$page->name!='Home')
        <div class="popout-form dark {{ \Request::has('show-search-bar')?'':'hidden' }}" id="popout-form">
            <div class="full-header-search ctr">
                @include('themes.ubt.inc.search')
            </div>
        </div>
        @endif