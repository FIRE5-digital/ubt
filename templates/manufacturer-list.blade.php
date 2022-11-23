@extends('themes.ubt.inc.base')

@section('head')
  	
    <title>{{ @$module->meta_title }}</title> 
  	<meta name="description" content="{{ @$module->meta_description }}">

@stop

@section('header')
<!-- BREADCRUMBS --> 
<div class="breadcrumbs">
    <div class="ctr"> 
        <ul class="layout inline-list" aria-labelledby="breadcrumbMenu">
            <li><a href="/">Home</a></li>
            <li><a href="/{{ $type }}-leasing">{{ ucfirst($type) }} Leasing</a></li>
            <li><a href="/{{ $type }}-leasing/manufacturers">Manufacturers</a></li>
        </ul>
    </div>
</div>
<!-- END BREADCRUMBS -->
@stop

@section('content')
	<div class="manufacturer-list">
		<div class="ctr">
			<h1>Manufacturers</h1>
			<div class="make-logos">
				@if($type === 'car')
					@php($manufacturers = \App\CarManufacturer::where('active',1)->whereHas('getDerivatives', function($q){ $q->whereHas('getDeals'); })->orderBy('name','asc')->get())
				@else
					@php($manufacturers = \App\VanManufacturer::where('active',1)->whereHas('getDerivatives', function($q){ $q->whereHas('getDeals'); })->orderBy('name','asc')->get())
				@endif
				@foreach($manufacturers as $m)
				<div class="make-link">
	            	<div>
						<a href="{{ $m->getUrl() }}">
							<img src="{{ $m->getLogo() ?? '/themes/ubt/img/manufacturer/'.strtolower(str_replace(" ", "-", $m->name)).'.png' }}" alt="{{ ucwords(strtolower($m->name)) }}">
						</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@stop

@section('footer')
 
@stop