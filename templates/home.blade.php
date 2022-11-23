@extends('themes.ubt.inc.base')

@section('head')

    @if(!empty(\Request::query()))
        <link rel="canonical" href="{{ config('app.base_path') }}">
    @endif

    {{-- Robots Tag --}}
    <meta name="robots" content="{{ @$page->robots }}">
    {{-- Primary Meta Tags --}}
    <title>{{ $page->meta_title }}</title>
    <meta name="title" content="{{ $page->meta_title }}">
    <meta name="description" content="{{ $page->meta_description }}">
    {{-- Open Graph / Facebook Tags --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('company.website').@$page->getPath() }}">
    <meta property="og:title" content="{{ $page->meta_title }}">
    <meta property="og:description" content="{{ $page->meta_description }}">
    <meta property="og:image" content="{!! config('company.website').@$page->content->hero_bg !!}">
    {{-- Twitter Tags --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ config('company.website').@$page->getPath() }}">
    <meta property="twitter:title" content="{{ $page->meta_title }}">
    <meta property="twitter:description" content="{{ $page->meta_description }}">
    <meta property="twitter:image" content="{!! config('company.website').@$page->content->hero_bg !!}">

@stop

@section('content')

<div class="full-header-ctr" style="background-image: url('{!! @\Image::url(@$page->content->hero_bg) !!}');">
    <div class="full-header-intro">
        <div class="ctr">
            <h1>{!! @$page->content->h1 !!}</h1>
            <p>{!! @$page->content->tagline !!}</p>
            <div class="group">
                <a href="/special-offers" class="btn-accent">View Special Offers</a>
                <a href="/stock" class="btn-transparent">View Stock Deals</a>
            </div>

        </div>
    </div>
</div>

{!! @$page->content->latest_deals !!}


@include('themes.ubt.inc.manufacturer-strip')
	
@include('themes.ubt.inc.about-intro')

@include('themes.ubt.inc.funders-strip')


@stop

@section('footer')
 
@stop

@section('scripts')
    @include('themes.ubt.schema.company')
@stop