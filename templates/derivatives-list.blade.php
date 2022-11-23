@extends('themes.ubt.inc.base')

@section('head')
  	
    <title>{{ $page_title }}</title> 	
  	@if($module->name=="Search")
  	<meta name="description" content="Search for your ideal lease">
  	<meta name="robots" content="noindex,follow">
  	@else
  	<meta name="description" content="{{ @$module->meta_description }}">
	<meta name="robots" content="{{ @$module->robots }}">
  	@endif

@stop

@section('header')

@include('themes.ubt.inc.search-bar')

@include('themes.ubt.inc.breadcrumbs')

@stop

@section('content')

	<div class="search-results ctr">
        <div class="search-results-intro">
            <h1>{{ $page_title }}</h1>
            <div class="search-results-sort">
                <div class="form-group">
                    <label for="budget">Sort By:</label>
                    {{ Form::select('order', [
                    'offers' => 'Sort: Special Offers', 
                    'stock' => 'Sort: In Stock', 
                    'price_asc' => 'Sort: Price - Low to High', 
                    'price_desc' => 'Sort: Price - High to Low'
                  ] , null, ['class'=>'dropdown-filter select-css', 'id'=>'sortBy']) }}
                </div>
            </div>
        </div>
        @if($search_results->total())
        <div class="deal-list">
        	@foreach($search_results as $deal)
        		{{-- @php(dd($deal)) --}}
                @include('themes.ubt.inc.deal-box')
            @endforeach
        </div>
        <div class="pagination-holder">
              <div>
                Showing {{ $search_results->firstItem() }} - {{ $search_results->lastItem() }} of {{ $search_results->total() }}
              </div>
            {!! $search_results->appends(\Input::except('page'))->links('vendor/pagination/bootstrap-4') !!}
            {{-- <div class="results-per-page">
                {!! $results_per_page !!}
            </div> --}}
        </div>
		@else
		<div class="noresult">
			 <h3>{{ $noresult }}</h3>
		</div>
		@endif
    </div>

@include('themes.ubt.inc.manufacturer-strip')

@include('themes.ubt.inc.cta-strip')

@stop

@section('footer')
 
@stop


