@extends('themes.ubt.inc.base')

@section('head')
  	
    <title>{{ @$page->meta_title }}</title> 
  	<meta name="description" content="{{ @$page->meta_description }}">
    <meta name="robots" content="{{ @$page->robots }}">

@stop

@section('header')

@include('themes.ubt.inc.breadcrumbs')

@stop

@section('content')

<div class="article-ctr">
    <div class="article">
        <style>
            .article-heading{
                background-image:url('/themes/ubt/img/blog-img.jpg');
            }
        </style>
        <div class="article-heading">
            <div class="ctr">
                <h1>{!! $page->content->h1 !!}</h1>
                <p class="tagline">{!! $page->content->tagline !!}</p>
            </div>
        </div>
        <div class="article-content editor">
            <div class="ctr">
                {!! $page->content->body !!}
            </div>
        </div>
    </div>
    <div class="article-sidebar">
        <div class="sidebar-ctr">
            <h3>Leasing Guides</h3>
            <ul>
                <li><a href="#">Leasing with Insurance</a></li>
                <li><a href="#">Leasing with Insurance</a></li>
                <li><a href="#">Leasing with Insurance</a></li>
                <li><a href="#">Leasing with Insurance</a></li>
                <li><a href="#">Leasing with Insurance</a></li>
                <li><a href="#">Leasing with Insurance</a></li>
                <li><a href="#">Leasing with Insurance</a></li>
                <li><a href="#">Leasing with Insurance</a></li>
                <li><a href="#">Leasing with Insurance</a></li>
                <li><a href="#">Leasing with Insurance</a></li>
                <li><a href="#">Leasing with Insurance</a></li>
                <li><a href="#">Leasing with Insurance</a></li>
            </ul>
        </div>
    </div>
</div>

@include('themes.ubt.inc.cta-strip')

@stop

@section('footer')
    
@stop

@section('scripts')
    @include('themes.ubt.schema.article')
@stop