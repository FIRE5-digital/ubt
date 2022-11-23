@extends('themes.ubt.inc.base')

@section('head')
  	
    <title>{{ @$page->meta_title }}</title> 
  	<meta name="description" content="{{ @$page->meta_description }}">
    <meta name="robots" content="{{ @$page->robots }}">

@stop

@section('header')

@include('themes.ubt.inc.search-bar')

@include('themes.ubt.inc.breadcrumbs')

@stop

@section('content')

   <div class="blog-list-ctr">
        <section class="blog-list-strip">
            <div class="ctr">
                <div class="blog-list-strip-intro">
                    <div>
                        <h1>{!! $page->content->h1 !!}</h1>
                        <p>{!! $page->content->tagline !!}}</p>
                    </div>
                </div>
            </div>
            <div class="blog-list">
                @php($articles = $page->getChildren())
                @forelse($articles as $article)
                    @php($article->loadContent())
                    <div class="blog-item">
                        <a href="{!! $article->getPath() !!}">
                            <div class="blog-item-img">
                                <picture>
                                    <img src="{!! $article->content->puff_image !!}" alt="{!! $article->content->h1 !!}" width="480" height="430">
                                </picture>
                            </div>
                            <div class="blog-item-content">
                                <div class="blog-item-content-ctr">
                                    <h3>{!! $article->content->h1 !!}</h3>
                                    <p>{!! $article->content->tagline !!}</p>
                                </div>
                            </div>
                            <div class="blog-item-icon">
                            </div>
                        </a>
                    </div>
                @empty
                    <p>We couldn't find any articles</p>
                @endforelse
            </div>
        </section>
    </div>

@include('themes.ubt.inc.cta-strip')

@stop

@section('footer')



@stop