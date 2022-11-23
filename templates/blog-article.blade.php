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
    <section class="blog-article main-slim-side">
        <div class="main">
            <div class="ctr editor">
                <h1>{!! @$page->content->h1 !!}</h1>
                <div class="blog-info">
                    Posted in <span class="bold text-highlight">{!! @$page->tags !!}</span> On <span class="bold">{{ @$page->publish_date->format('d/m/Y') }}</span> By <span class="bold">{!! @$page->content->author !!}</span>
                </div>

                @if(!empty(@$page->content->puff_image))
                    <div class="article-img">
                        <img src="{{ @\Image::url(@$page->content->puff_image,2000,1500,['crop']) }}" alt="{{ $page->content->h1 }}">
                    </div>
                @endif

                <p class="tagline">{!! @$page->content->tagline !!}</p>

                {!! @$page->content->body !!}

                @if(@$page->content->body_cta)
                    <div class="body-cta">
                        {!! @$page->content->body_cta !!}
                    </div>
                @endif

            </div><!--ctr-->
        </div><!--main-->
        <div class="aside ctr">
            <div class="aside-ctr">
                @include('themes.ubt.inc.blog-categories')
            </div>
            {{-- <div class="newsletter-ctr">
                <div class="newsletter">
                    @include('themes.stable.inc.newsletter-box')
                </div>
            </div> --}}
        </div>
    </section>

@stop

@section('footer')

@stop

@section('scripts')
    @include('themes.ubt.schema.blog')
@stop