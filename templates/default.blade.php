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
	<div class="ctr default"> 
		{!! @@$page->content->body !!}
	</div>
@stop

@section('footer')
 
@stop