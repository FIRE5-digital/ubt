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

    <section class="blog-page-list main-slim-side">
        <div class="main">
            <div class="ctr">
                <h1>{!! @$page->content->h1 !!}</h1>
                @if(\Request::has('tag'))
                    <div class="tag">
                        <a href="/blog" class="button-small-tertiary">Tag: {{ urldecode(\Request::get('tag')) }} <icon>(x)</icon></a>
                    </div>
                @endif
                <div class="blog-list">
                    @php($articles = $page->getChildren(\Request::get('tag'))->paginate(10))
                    @forelse($articles as $article)
                        @php($article->loadContent())
                        @if(@$article->content->puff_image && @$article->content->h1)
                            <div class="blog-item">
                                <div class="blog-item-img">
                                    <a href="{!! $article->getPath() !!}">
                                        <picture>
                                            <img src="{!! @\Image::url(@$article->content->puff_image,980,684,['crop']) !!}" alt="{!! $article->content->h1 !!}" width="483" height="337">
                                        </picture>
                                    </a>
                                </div>
                                <div class="blog-item-content">
                                    <div class="blog-item-content-ctr">
                                        <div class="blog-item-tags">
                                            <a href="#">{!! $article->tags !!}</a>
                                        </div>
                                        <h3><a href="{!! $article->getPath() !!}">{!! $article->content->h1 !!}</a></h3>
                                        <p>{!! $article->content->tagline !!}</p>
                                        <a href="{!! $article->getPath() !!}" class="button-small">Continue Reading</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <p>We couldn't find any articles</p>
                    @endforelse
                </div><!--blog-list-->
                <div class="pagination-holder">
                    <div>
                        Showing {{ $articles->firstItem() }} - {{ $articles->lastItem() }} of {{ $articles->total() }}
                    </div>
                    {!! $articles->appends(\Input::except('page'))->links('vendor/pagination/bootstrap-4') !!}
                </div>
            </div><!--ctr-->
        </div><!--main-->
    </section>

@stop

@section('footer')

@stop