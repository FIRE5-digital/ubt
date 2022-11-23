
<div class="search-results-form">
	<form class="form search-form" action="/search">
		@if(\Request::segment(1) != 'van-leasing')
			<input type="hidden" id="search-type" name="search-type" class="search-type-{{ strtolower(\Request::input('search-type')??'car') }}" value="{{ @\Request::input('search-type')??'Car' }}">
		@else
			<input type="hidden" id="search-type" name="search-type" class="search-type-{{ strtolower(\Request::input('search-type')??'van') }}" value="{{ @\Request::input('search-type')??'Van' }}">
		@endif
		
		<div class="form-row">
			<div class="form-group">
				<label for="make">Make</label>
				{!! Form::select('make', [''=>'Any']+(is_array(@$makes)?@$makes:[]), @\Request::input('make'), ['class'=>'form-control select-css']) !!}
			</div>
			<div class="form-group">
				<label for="model">Model</label>
				{!! Form::select('model', [''=>'Any']+(is_array(@$models)?@$models:[]), @\Request::input('model'), ['class'=>'form-control select-css']) !!}
			</div>
			<div class="form-group">
				<label for="spec">Spec</label>
				{!! Form::select('spec', [''=>'Any']+(is_array(@$specs)?@$specs:[]), @\Request::input('spec'), ['class'=>'form-control select-css']) !!}
				
			</div>
			<div class="form-group">
				<label for="body_type">Body Type</label>
				{!! Form::select('body_type', [''=>'Any']+(is_array(@$bodytypes)?@$bodytypes:[]), @\Request::input('body_type'), ['class'=>'form-control select-css']) !!}
			</div>
			<div class="form-group">
				<label for="fuel_type">Fuel Type</label>
				{!! Form::select('fuel_type', [
					''=>'Any',
					'Hybrid'=>'Hybrid',
					'Electric'=>'Electric',
				], @\Request::input('fuel_type'), ['class'=>'form-control select-css']) !!}
			</div>
			<div class="form-group">
				<label for="electric_range">Electric Range</label>
				{!! Form::select('electric_range', [
                    ''=>'Electric Range',
                    '0-200'=>'upto 200 miles',
                    '200-500'=>'above 200 miles',
                ], @\Request::input('electric_range'), ['class'=>'form-control select-css']) !!}
			</div>
			<div class="form-group">
				<label for="budget">Budget</label>
				{!! Form::select('budget', [
					''=>'Any',
					'0-150' => 'upto £150 pm',
					'150-200' => '£150-£200 pm',
					'200-250' => '£200-£250 pm',
					'250-300' => '£250-£300 pm',
					'300-350' => '£300-£350 pm',
					'350-400' => '£350-£400 pm',
					'400-500' => '£400-£500 pm',
					'500+' => 'Above £500 pm'
				], @\Request::input('budget'), ['class'=>'form-control select-css']) !!}
			</div>
			<div class="form-group">
				<label for="term">Term</label>
				{!! Form::select('term', [
					''=>'Any',
					'24'=>'24 Months',
					'36'=>'36 Months',
					'48'=>'48 Months',
				], @\Request::input('term'), ['class'=>'form-control select-css']) !!}
			</div>

			<div class="form-group">
				<label for="initial_profile">Initial Rental</label>
				{!! Form::select('initial_profile', [
					''=>'Any',
					'1'=>'1',
					'3'=>'3',
					'6'=>'6',
					'9'=>'9',
					'12'=>'12',
				], @\Request::input('initial_profile'), ['class'=>'form-control select-css']) !!}
			</div>

			<div class="form-group">
				<label for="mileage">Mileage</label>
				{!! Form::select('mileage', [
					''=>'Any',
					'5000'=>'5,000 pa',
					'10000'=>'10,000 pa',
					'15000'=>'15,000 pa',
					'20000'=>'20,000 pa',
					'30000'=>'30,000 pa',
				], @\Request::input('mileage'), ['class'=>'form-control select-css']) !!}
			</div>
			
			<div class="form-group sort-mobile">
				<label for="order">Sort By</label>
				{{ Form::select('order', [
					'offers' => 'Special Offers', 
					'stock' => 'In Stock', 
					'price_asc' => 'Price - Low to High', 
					'price_desc' => 'Price - High to Low'
				] , @\Request::input('order'), ['class'=>'form-control select-css']) }}
			</div>
			
			<div class="form-group">
				<button class="button-accent full update-search">Search</button>
			</div>

		</div>
		
		
	</form>
</div>