<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	@include('themes.ubt.inc.head')
    @yield('head')
</head>
<body class="{{ 'page-'.friendlyClass(@$page->getTemplate->name) }}">
    
    @if(\App::environment()=='production')
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5MWJC8G"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @endif

    @include('themes.ubt.inc.loader')
    @yield('loader')
    
    @include('themes.ubt.inc.header')

    @yield('header')

    <div id="page">
        <div class="body">
    		
    		@yield('content')

    	</div>
    </div>

	@include('themes.ubt.inc.footer')
	@yield('footer')
    @include('themes.ubt.inc.scripts')
    @yield('scripts')
    
</body>
</html>