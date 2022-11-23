@extends('themes.ubt.inc.base')

@section('head')
  	
    <title>{{ $manufacturer->meta_title }}</title> 
  	<meta name="description" content="{{ $manufacturer->meta_description }}">
    <meta name="robots" content="{{ @$manufacturer->robots }}">

@stop

@section('header')
<!-- BREADCRUMBS --> 
<div class="breadcrumbs">
    <div class="ctr"> 
        <ul class="layout inline-list" aria-labelledby="breadcrumbMenu">
            <li><a href="/">Home</a></li>
            <li><a href="/{{ @$type }}-leasing">{{ ucfirst($type) }} Leasing</a></li>
            <li><a href="/{{ @$type }}-leasing/{{ @$manufacturer->url }}">{{ @$manufacturer->name }}</a></li>
        </ul>
    </div>
</div>
<!-- END BREADCRUMBS -->
@stop

@section('content')
	<div class="manufacturer ctr">
        <div class="manufacturer-intro">
            <div>
                <h1>{{ @$manufacturer->name }} Leasing Deals</h1>
                {!! @$manufacturer->description !!}
            </div>
            <div class="manufacturer-logo">
                @if(!empty(@$manufacturer->logo))
                <img src="/uploads/{{ @$manufacturer->logo }}" alt="{{ @$manufacturer->name }}">
                @else
                <img src="/themes/ubt/img/manufacturer/{{ friendlyClass(@$manufacturer->name) }}.png" alt="{{ $manufacturer->name }}">
                @endif
            </div>
        </div>
        <div class="range-list">
            @foreach($manufacturer->getRange()->where('active',1)->orderBy('name')->get() as $range)
                @if($range->getDerivatives()->where('active',1)->count() > 0)
                    <div class="range-box">
                        <a href="{{ $range->getUrl() }}" title="View {{ @$range->name }}">
                            <div class="range-box-img">
                                <div class="range-box-tags">
                                    <span class="bold">{{ @$range->getDerivatives()->where('active',1)->count() }}</span> &nbsp; Variant{{$range->getDerivatives()->where('active',1)->count() == 1 ? '' : 's'}} Available
                                </div>
                                <div class="range-box-img-ctr">
                                    <img class="lazy" src="/themes/ubt/img/placeholder.png" data-src="{{ @$range->getMainImage('large') }}" alt="{{ @$range->name }}">
                                </div>
                            </div>
                            <div class="range-box-content">
                                <div class="range-box-content-ctr">
                                    <h3>{{ @$range->name }}</h3>
                                    <p>{{ @$range->short_description }}</p>
                                </div>
                                <div class="range-box-extra">
                                    <div class="range-box-button">
                                        <span class="button-accent">View All</span>
                                    </div>
                                    <div class="range-box-price">
                                        @php($price=@$range->getFromPrice(\Cookie::get('price_view') ?? 'Personal'))
                                        @if($price!='POA')
                                            <span class="bold">from</span>
                                            <div>{{ $price=='POA' ? $price : '&pound;'.$price }} <span>pm</span></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div><!--deal-box-->
                @endif
            @endforeach
        </div>
    </div><!--search-results-->


@stop

@section('footer')
 
@stop
