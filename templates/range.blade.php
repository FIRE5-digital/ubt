@extends('themes.ubt.inc.base')

@section('head')
  	
    <title>{{ $range->meta_title }}</title> 
  	<meta name="description" content="{{ $range->meta_description }}">

@stop

@section('header')
<!-- BREADCRUMBS --> 
<div class="breadcrumbs">
    <div class="ctr"> 
        <ul class="layout inline-list" aria-labelledby="breadcrumbMenu">
            <li><a href="/">Home</a></li>
            @if($type=='van')<li><a href="/van-leasing">Van Leasing</a></li>@else <li><a href="/car-leasing">Car Leasing</a></li>@endif
            <li><a href="{{ $manufacturer->getUrl() }}">{{ $manufacturer->name }}</a></li>
            <li><a href="{{ $range->getUrl() }}">{{ $range->name }}</a></li>
        </ul>
    </div>
</div>
<!-- END BREADCRUMBS -->
@stop

@section('content')

    <div class="range model-list ctr">
        <div class="range-intro make-list-intro">
            <div>
                <h1>{{ $manufacturer->name }} {{ $range->name }} Leasing</h1>
                {!! @$range->description !!}
            </div>
            <div class="make-logo">
                @if(!empty(@$manufacturer->logo))
                <img src="/uploads/{{ @$manufacturer->logo }}" alt="{{ @$manufacturer->name }}">
                @else
                <img src="/themes/ubt/img/manufacturer/{{ friendlyClass(@$manufacturer->name) }}.png" alt="{{ $manufacturer->name }}">
                @endif
            </div>
        </div>
        <div class="deal-list">
            @php($rangelist=$range->type=='van'?$range->getGroupedModels():$range->getFuelGroupedModels())
            @foreach($rangelist as $models)
                @php($model = $models->first())
                @if($model->getDerivatives()->where('active',1)->count() > 0)
                    <div class="model-box" data-derivatives="{{@$model->getDerivatives()->where('active',1)->count()}}">
                        <a href="{{ $model->getUrl() }}" title="View {{ $model->name }}">
                            <div class="model-box-img">
                                <div class="model-box-tags">
                                    <span class="green-arrow"></span>
                                </div>

                                <div class="model-box-img-ctr">
                                    <img class="lazy" src="/themes/ubt/img/placeholder.png" data-src="{{ $model->getMainImage('large') }}" alt="{{ $model->short_name }}">
                                </div>

                            </div>
                            <div class="model-box-content">
                                <div class="model-box-content-ctr">
                                    <h3>{{ $model->name }}</h3>
                                </div>
                            </div>
                        </a>
                    </div><!--model-box-->
                @endif
            @endforeach
            
        </div>
    </div><!--search-results-->

    <div class="model-table ctr">
        <div class="model-table-head">
            <div class="search-form table-cell spec">
                <div class="form-group">
                    @if($type!='van')
                        <label for="sortSpec" class="visuallyhidden">Spec</label>
                        <select class="form-control select-css row-filter" name="spec" id="sortSpec">
                            <option value="">Spec</option>
                            @php($unique = array())
                            @foreach($range->getDerivativeList(price_view()) as $der)
                                @if($der->discontinued&&$der->getDeals()->count()==0) @continue @endif
                                @if($der->getDeals()->count()==0) @continue @endif
                                @if(in_array($der->spec_level, $unique)) @continue @endif
                                @if(empty($der->spec_level)) @continue @endif
                                @php(array_push($unique, $der->spec_level))
                                <option value="{{ $der->spec_level }}">{{ $der->spec_level }}</option>
                            @endforeach
                        </select>
                    @else
                        <label for="filter-keywords" style="margin-bottom:0">Spec</label>
                    @endif
                </div>
            </div>
            <div></div>
            <div class="search-form table-cell t-hidden">
                <div class="form-group">
                    <label for="sortFuel" class="visuallyhidden">Fuel Type</label>
                    <select name="fuel-type" class="select-css form-control filter row-filter" id="sortFuel">
                        <option value="">Fuel Type</option>
                        @foreach($fuel_types as $f => $v)
                            @if($v === 'Petrol' || $v === 'Diesel') @continue @endif
                            <option data-value="{{ $v }}">{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="search-form table-cell t-hidden">
                <div class="form-group">
                    <label for="sortTransmission" class="visuallyhidden">Gear Box</label>
                    <select name="transmission" class="select-css form-control filter row-filter" id="sortTransmission">
                        <option value="">Gear Box</option>
                        <option value="Manual">Manual</option>
                        <option value="Automatic">Auto/Semi</option>
                    </select>
                </div>
            </div>
            <div class="search-form table-cell t-right">
                <div class="form-group">
                    <label class="visuallyhidden" for="sortTerm">Term</label>
                    <select name="term" class="select-css form-control term-filter" id="sortTerm">
                        <option value="">Cheapest</option>
                        <option value="24">24 Months</option>
                        <option value="36">36 Months</option>
                        <option value="48">48 Months</option>
                    </select>
                </div>
            </div>
        </div>
            
        @foreach($range->getDerivativeList(\Cookie::get('price_view') ?? 'Personal') as $der)
            @if($der->discontinued&&$der->getDeals()->count()==0) @continue @endif
            <a href="{{ $der->getUrl() }}" class="model-table-row" data-fuel="{{ @$der->fuel_type }}" data-transmission="{{ @$der->transmission }}" data-name="{{ strtolower(@$der->getModel->name.' '.$der->name) }}" data-spec="{{ strtolower($der->spec_level) }}">
                <div class="table-cell spec">
                    <h3 class="h6">{{ $der->getModel->name }}<br>
                    <span>{{ $der->name }}</span></h3>
                </div>
                <div class="table-cell tags">
                    <ul class="list-tags layout inline-list">
                        @if($der->special_offer)
                        <li data-content="Top Deal" class="top-tag">
                            <span>Top Deal</span>
                        </li>
                        @endif
                        @if($der->highlight)
                        <li data-content="Hot Deal" class="hot-tag">
                            <span>Hot Deal</span>
                        </li>
                        @endif
                        @if($der->in_stock)
                        <li data-content="In Stock" class="stock-tag">
                            <span>In Stock</span>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="table-cell">
                    {{ @$der->fuel_type }}
                </div>
                <div class="table-cell">
                    {{ @$der->transmission }}
                </div>
                <div class="term-list bold table-cell">
                    <span class="price-from show">{{ @$der->getFromPrice(\Cookie::get('price_view') ?? 'Personal', true) }}</span>
                    <span class="price-24 hidden">{{ @$der->getFromByTerm(\Cookie::get('price_view') ?? 'Personal', 24, true) }}</span>
                    <span class="price-36 hidden">{{ @$der->getFromByTerm(\Cookie::get('price_view') ?? 'Personal', 36, true) }}</span>
                    <span class="price-48 hidden">{{ @$der->getFromByTerm(\Cookie::get('price_view') ?? 'Personal', 48, true) }}</span>
                </div>
            </a>
        @endforeach

    </div>

    @include('themes.ubt.inc.filters')


@stop

@section('footer')
 
@stop
