@extends('themes.ubt.inc.base')

@section('head')
  	
    <title>Quote Enquiry</title> 
  	<meta name="description" content="Request a quote today">
  	<meta name="robots" content="noindex,nofollow">

@stop

@section('header')
<!-- BREADCRUMBS --> 
<div class="breadcrumbs">
    <div class="ctr"> 
        <ul class="layout inline-list" aria-labelledby="breadcrumbMenu">
            <li><a href="{{ url()->previous() }}?term={{ \Request::input('term') }}&mileage={{ \Request::input('mileage') }}&type={{ \Request::input('type') }}&profile={{ \Request::input('profile') }}&maintenance={{ \Request::input('maintenance') }}">{{ @$derivative->full_name }}</a></li>
            <li><a href="{{ url()->current() }}">Quote</a></li>
        </ul>
    </div>
</div>
<!-- END BREADCRUMBS -->
@stop

@section('content')

<div class="quote-enquiry">
	<div class="ctr"> 
	
	@if($show=='error')
		
		<h1>Quote Enquiry - Error</h1>
		
		<p>Sorry, but it looks like you have landed on this page by mistake or your enquiry form has expired.</p>
		@if(count($errors))
		<div class="form-errors">
			<ul>
			@forelse($errors->all() as $error)
				<li>{{ $error }}</li>
			@empty
			@endforelse
			</ul>
		</div>
		@endif
		<p><big>&laquo; <a href="{{ \URL::previous() }}">Go back to previous page</a></big></p>
		<p>If you are experience issues submitting your enquiry please contact us by tlephone or email to discuss your enquiry.</p>
		
	
	@elseif($show=='form')
	
		<h1>Quote Enquiry</h1>
		
		@if(count($errors))
		<div class="form-errors">
			<ul>
			
			@forelse($errors->all() as $error)
				<li>{{ $error }}</li>
			@empty
			@endforelse
			
			</ul>
		</div>
		@endif
		<div class="form-holder">
			<div class="quote-details">
				<a href="#" class="button view-summary">View Quote Summary</a>
				<div class="quote-details-ctr">
					<table class="data-table">
						<tr>
							<th>Contract Type</th>
							<td>{{ \Request::input('type') ?? old('deal_type') }}</td>
						</tr>
						<tr>
							<th>Manufacturer</th>
							<td>{{ @$derivative->getManufacturer->name }}</td>
						</tr>
						<tr>
							<th>Model</th>
							<td>{{ @$derivative->getModel->name }}</td>
						</tr>
						<tr>
							<th>Derivative</th>
							<td>{{ @$derivative->name }}</td>
						</tr>
						<tr>
							<th>Term (months)</th>
							<td>{{ \Request::input('term') ?? old('term') }}</td>
						</tr>
						<tr>
							<th>Initial Rental (months)</th>
							<td>{{ \Request::input('profile') ?? old('initial_profile') }}</td>
						</tr>
						<tr>
							<th>Anuual Mileage</th>
							<td>{{ \Request::input('mileage') ?? old('mileage') }}</td>
						</tr>
						<tr>
							<th>Maintenance</th>
							<td>{{ \Request::input('maintenance') ?? old('maintenance') }}</td>
						</tr>
						<tr>
							<th>Options Selected</th>
							@php($opts = explode(' ---- ',str_replace("\n\r",  " ---- ",\Request::input('options') ?? old('options'))))
							@php($std = count(preg_grep( "/Std\ Opt/", $opts)))
							@php($ex = count($opts)-$std)
							@if(count($opts))
							<td>{{ count($opts) }} (Standard: {{ $std }}) (Additional: {{ $ex }})</td>
							@else
							<td>No options selected</td>
							@endif
						</tr>
					</table>
				</div>
			</div>
			<div class="quote-info">
		
				{!! Form::open(['class'=>'admin-form', 'url' => '/quote/complete']) !!}
					{!! Form::hidden('vehicle_type', \Request::input('vehicle_type') ?? old('vehicle_type')) !!}
		            {!! Form::hidden('car_id', \Request::input('car_id') ?? old('car_id')) !!}
		            {!! Form::hidden('van_id', \Request::input('van_id') ?? old('van_id')) !!}
		            {!! Form::hidden('deal_id', \Request::input('deal_id') ?? old('deal_id')) !!}
		            {!! Form::hidden('deal_type', \Request::input('type') ?? old('deal_type')) !!}
		            {!! Form::hidden('term', \Request::input('term') ?? old('term')) !!}
		            {!! Form::hidden('mileage', \Request::input('mileage') ?? old('mileage')) !!}
		            {!! Form::hidden('initial_profile', \Request::input('profile') ?? old('initial_profile')) !!}
		            {!! Form::hidden('initial_payment', \Request::input('initial_payment') ?? old('initial_payment')) !!}
		            {!! Form::hidden('monthly_rental', \Request::input('monthly_rental') ?? old('monthly_rental')) !!}
		            {!! Form::hidden('maintenance' , \Request::input('maintenance') ?? old('maintenance')) !!}
		            {!! Form::hidden('maintenance_cost', \Request::input('maintenance_cost') ?? old('maintenance_cost')) !!}
		            {!! Form::hidden('balloon_payment', \Request::input('balloon_payment') ?? old('balloon_payment')) !!}
		            {!! Form::hidden('options', \Request::input('options') ?? old('options')) !!}

		            {!! Form::hidden('source', \Cookie::get('source')) !!}
		            {!! Form::hidden('campaign', \Cookie::get('campaign')) !!}
		            {!! Form::hidden('click_id', \Cookie::get('click_id')) !!}
		        
		            <div class="form-group">
		                {!! Form::label('forename', 'Forename', ['class'=>'required']) !!}
		                {!! Form::text('forename', null, ['class' => 'form-control', 'placeholder' => 'Forename']) !!}
		            </div>

		            <div class="form-group">
		                {!! Form::label('surname', 'Surname', ['class'=>'required']) !!}
		                {!! Form::text('surname', null, ['class' => 'form-control', 'placeholder' => 'Surname']) !!}
		            </div>

		            <div class="form-group">
		                {!! Form::label('company', 'Company', ['class'=>(\Request::input('type') ?? old('deal_type') == 'Personal' ?: 'required')]) !!}
		                {!! Form::text('company', null, ['class' => 'form-control', 'placeholder' => 'Company']) !!}
		            </div>

		            <div class="form-group">
		                {!! Form::label('email', 'Email', ['class'=>'required']) !!}
		                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
		            </div>

		            <div class="form-group ">
		                {!! Form::label('telephone', 'Telephone', ['class'=>'required']) !!}
		                {!! Form::text('telephone', null, ['class' => 'form-control', 'placeholder' => 'Telephone']) !!}
		            </div>

		            <div class="form-group">
		                {!! Form::label('comments', 'Comments') !!}
		                {!! Form::textarea('comments', null, ['class' => 'form-control', 'placeholder' => 'Additional comments']) !!}
		            </div>
		            
		            {!! Form::button('Send Enquiry', ['class' => 'button send-enquiry', 'id'=>'send-enquiry', 'type' => 'submit']) !!}

		        {!! Form::close() !!}
		    </div>

		</div>
	
	@elseif($show=='complete')

		<h1>Thank you!</h1>
		
		<p>Your enquiry has been sent and a member of our team will be in touch to discuss your personalised quotation.</p>
		
		<script>
			
		// Trigger event tracking
	    window.dataLayer = window.dataLayer || [];
	    window.dataLayer.push({
	    	'event': 'Quote Form Submit'
	    });

	    if(typeof fbq !== 'undefined'){
	    	fbq('track', 'Lead');
		}

		</script>

	@else
		
		<h1>Error!</h1>

		<p>Error: {{ $show }}</p>

		<p>Sorry but we couldn't confirm receipt of your enquiry! Please contact us on {{ config('company.telephone') }}</p>

		<br>

	@endif
	</div>
</div>
@stop

@section('footer')
<script>

	if(document.getElementById('send-enquiry')){ 
		document.getElementById('send-enquiry').addEventListener('click', function(e){
			document.body.classList.remove('remove');
		});
	}

	if(document.getElementById('send-enquiry')){ 
		document.getElementsByClassName('view-summary')[0].addEventListener('click', function(e){
			e.preventDefault();
			this.classList.add('hidden');
			document.querySelectorAll('.quote-details-ctr')[0].classList.add('visible');
		});
	}
</script>
@stop