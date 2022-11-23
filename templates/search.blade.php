@extends('themes.ubt.inc.base')

@section('head')
  	
    <title>{{ $page_title }}</title> 	
  	@if($module->name=="Search")
  	<meta name="description" content="Search for a lease">
  	<meta name="robots" content="noindex,follow">
  	@else
  	<meta name="description" content="{{ @$module->meta_description }}">
	<meta name="robots" content="{{ @$module->robots }}">
  	@endif

    @if(!empty(\Request::query()))
    <link rel="canonical" href="{{ \Request::url() }}">
    @endif

@stop

@section('header')
<!-- BREADCRUMBS --> 
<div class="breadcrumbs">
    <div class="ctr"> 
        <ul class="layout inline-list" aria-labelledby="breadcrumbMenu">
            <li><a href="/">Home</a></li>
            <li><a href="{{ url()->current() }}">{{ $page_title }}</a></li>
        </ul>
    </div>
</div>
<!-- END BREADCRUMBS -->
@stop

@section('content')

	<div class="search-results ctr">
        
        <h1>{{ $page_title }}</h1>

        @if($search_results->total())
        <div class="deal-list deal-boxes no-carousel four-column no-features no-similar-offers">
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



@stop

@section('footer')
 
@stop


