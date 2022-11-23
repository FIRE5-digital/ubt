@extends('themes.ubt.inc.base')

@section('head')
    
    <title>{{ @$derivative->meta_title ?? $module->meta_title }}</title> 
    <meta name="description" content="{{ @$derivative->meta_description ?? $module->meta_description }}">
    <meta name="robots" content="{{ @$derivative->robots }}">
    @if(!empty(\Request::query()))
    <link rel="canonical" href="{{ \Request::url() }}">
    @endif

@stop

@section('header')
<!-- BREADCRUMBS --> 
<div class="breadcrumbs">
    <div class="ctr"> 
        <ul class="layout inline-list" aria-labelledby="breadcrumbMenu">
            <li><a href="/{{ $type }}-leasing">{{ ucfirst($type) }} Leasing</a></li>
            <li><a href="/{{ $type }}-leasing/{{ @$manufacturer->url }}">{{ @$manufacturer->name }}</a></li>
            <li><a href="{{ @$range->getUrl() }}">{{ @$range->name }}</a></li>
            <li><span>{{ @$derivative->name }}</span></li>
        </ul>
    </div>
</div>
<!-- END BREADCRUMBS -->
@stop

@section('content')

    <div class="deal-detail ctr">
        <div class="deal-header">
            <div class="deal-header-info">
                <h1>{{ @$derivative->model_name }}</h1>
                <p>{{ @$derivative->name }}</p>
            </div>
            <div class="deal-header-controls">
                <div class="share-menu">
                    <span>Share this deal</span>
                    <a class="email-icon" target="_blank" href="mailto:?&subject=Check out this leasing deal on {{ config('company.name') }}&body={{ url()->current() }}">Email</a>
                    <a class="twitter-icon" target="_blank" href="https://twitter.com/home?status={{ url()->current() }}">Tweet</a>
                    <a class="fb-icon" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}">Share on Facebook</a>
                </div>
            </div>
        </div>
        <div class="deal-detail-ctr">
            <div class="deal-main">
                <div class="deal-gallery">
                    <div class="deal-gallery-ctr">
                        <div class="deal-gallery-img">
                            <div class="deal-box-tags">
                                @if($derivative->special_offer)
                                <span data-content="Top Deal" class="top-tag">
                                    <span>Top Deal</span>
                                </span>
                                @endif
                                @if($derivative->highlight)
                                <span data-content="Hot Deal" class="hot-tag">
                                    <span>{{ @$derivative->highlight }}</span>
                                </span>
                                @endif
                                @if($derivative->in_stock)
                                <span data-content="In Stock" class="stock-tag">
                                    <span>In Stock</span>
                                </span>
                                @endif
                            </div>

                            <div class="deal-gallery-controls">
                                <a title="previous image" class="prev">
                                    <img src="/themes/ubt/img/icons/general/slider-arrow.svg" width="10" height="9" alt="Previous">
                                </a>
                                <a title="next image" class="next">
                                    <img src="/themes/ubt/img/icons/general/slider-arrow.svg" width="10" height="9" alt="Next">
                                </a>
                            </div>

                            <img src="{{ @$derivative->getMainImage('large') }}" alt="{{ @$derivative->full_name }}" id="main-img">
                        </div>
                        <div class="gallery-track-ctr">
                            <ul id="track">
                                @forelse($derivative->getImages as $img)
                                <li class="thumbnail"><a href="#" class="{{ $img->main?'active':'' }} gallery-thumb" data-img="{{ $img->setSize('large')->url }}"><img src="{{ $img->url }}"></a></li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div><!--deal-gallery-->
                <div class="deal-info">
                    <div class="deal-spec">
                        <h3>Vehicle Information</h3>
                        <div class="deal-spec-ctr">
                            <ul>
                                <li>
                                    <span>
                                        <img src="/themes/ubt/img/icons/features/diesel.svg" alt="Fuel Type" width="29" height="40">
                                        <div>Fuel Type <span class="bold">{{ @$derivative->fuel_type }}</span></div>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <img src="/themes/ubt/img/icons/features/manual.svg" alt="Transmission" width="35" height="35">
                                        <div>Transmission <span class="bold">{{ @$derivative->transmission }}</span></div>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <img src="/themes/ubt/img/icons/features/speedometer.svg" alt="Mileage" width="39" height="34">
                                        <div>Mileage <span class="bold">{{ @$derivative->mpg_combined }}mpg</span></div>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <img src="/themes/ubt/img/icons/features/stop-watch.svg" alt="Top Speed" width="38" height="36">
                                        <div>Top Speed <span class="bold">{{ @$derivative->top_speed  }}mph</span></div>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <img src="/themes/ubt/img/icons/features/environment.svg" alt="CO2" width="29" height="41">
                                        <div>CO2 <span class="bold">{{ @$derivative->co2 }}g/km</span></div>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div><!--deal-spec-->

                    @if($review)
                    <div class="deal-review">
                        <div class="accordion">
                            <button class="accordion-title" aria-controls="review-panel" id="review-title">
                                Vehicle Review <span></span>
                            </button>

                            <div class="accordion-panel" id="review-panel" aria-labelledby="review-title">
                                @if(isset($review->videolist))
                                <div class="embed-responsive embed-responsive-16by9">
                                    <video width="100%" preload="metadata" controls>
                                        <source src="<?php echo @$review->videolist->video->hdvideo->hdvideolist->hdvideoitem[1]->video_url; ?>#t=1" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                @endif
                                <div class="full-review">
                                    @foreach ($review->paragraphlist->paragraph as $para)
                                        @if($para->type=="Ten Second Review"||$para->type=="by Line") @continue @endif
                                        <h4>{{ $para->headline }}</h4>
                                        <p>{{ $para->text }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!-- deal-review-->
                    @endif
                </div><!--deal-info-->
                <div class="deal-tabs">
                    <div class="deal-tab-ctr">
                        <div class="tab-list">
                            <div id="options" class="tab active" onclick="openTab(event, 'optional-extras')">
                                <h4>Options</h4>
                            </div>
                            <div class="tab" onclick="openTab(event, 'standard-equipment')">
                                <h4>Standard Equipment</h4>
                            </div>
                            <div class="tab" onclick="openTab(event, 'technical-data')">
                                <h4>Technical Data</h4>
                            </div>
                            
                        </div>
                        <div id="optional-extras" class="tab-content active">
                            @php($show_stock_spec=false)
                            @if($derivative->in_stock)
                                @php($show_stock_spec=true)
                                @if($derivative->getDeals()->where('stock_price',1)->count()>0&&$derivative->getDefaultTerms(price_view())->stock_price==0)
                                    @php($show_stock_spec=false)
                                @endif
                            @endif
                            @if($derivative->getDeals()->where('stock_pipeline',1)->count()>0&&$derivative->getDefaultTerms(price_view())->stock_pipeline==1)
                                @php($show_stock_spec=true)
                            @endif

                            <div class="stock-spec @if(!$show_stock_spec) hidden @endif">
                                <h3>Specification</h3>
                                <p>This deal is a stock offer. The specification for this vehicle has been pre-selected.</p>
                                @if(!empty($derivative->stock_spec))
                                    <p>Specification/options:</p>
                                    <p>{!! nl2br($derivative->stock_spec) !!}</p>
                                @else
                                    <p>Please contact us for full specification details.</p>
                                @endif
                            </div>

                            <div class="options-list @if($show_stock_spec) hidden @endif ">
                                <?php $i = 0; ?>
                                @foreach($options as $opt_group => $opts)
                                <?php $i++; ?>
                                <div class="accordion">
                                    <button class="accordion-title" aria-controls="opt1-panel" id="opt1-title">
                                        {{ $opt_group }}<span></span>
                                    </button>
                                    <div class="accordion-panel" id="opt1-panel" aria-labelledby="opt1-title">
                                        <ul>
                                            @foreach($opts as $opt)
                                            <li>
                                                <label class="checkbox-label">
                                                    <div>{{ $opt['name'] }}</div>
                                                    <div><span class="option-price">({{ $opt['price']==0?'free':'+'.$opt['price'] }})</span>
                                                        <input name="options[]" type="checkbox" {!! $opt['default']?' checked="checked"':'' !!} data-price="{{ $opt['price'] }}" data-name="{{ $opt['name'] }}" data-monthly="" data-monthly-vat="" data-default="{{ $opt['default'] }}">
                                                        <span class="checkmark"></span>
                                                    </div>
                                                </label>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div id="standard-equipment" class="tab-content">
                            <?php $i = 0; ?>
                            @foreach($std_equipment as $eq_group => $eqp)
                            <?php $i++; ?>
                            <div class="accordion">
                                <button class="accordion-title" aria-controls="eq1-panel" id="eq1-title">
                                    {{ $eq_group }}<span></span>
                                </button>
                                <div class="accordion-panel" id="eq1-panel" aria-labelledby="eq1-title">
                                    <ul>
                                        @foreach($eqp as $e)
                                        <li>
                                            <label class="checkbox-label">
                                                <div>{{ $e['name'] }}</div>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div><!--tab-->

                        <div id="technical-data" class="tab-content">
                            <?php $i = 0; ?>
                            @foreach($tech as $tech_group => $tech_data)
                            <?php $i++; ?>
                             <div class="accordion">
                                <button class="accordion-title" aria-controls="tech1-panel" id="tech1-title">
                                    {{ $tech_group }}<span></span>
                                </button>
                                <div class="accordion-panel" id="tech1-panel" aria-labelledby="tech1-title">
                                    <ul>
                                        @foreach($tech_data as $t)
                                            @if(is_object($t['value'])) @continue @endif
                                        <li>
                                            <label class="checkbox-label">
                                                <div>{{ $t['name'] }}</div> 
                                                <div>{{ $t['value'] }}</div>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div><!-- deal-tabs-->
            </div>

            <div class="deal-aside">
                <div class="deal-aside-ctr">
                    <div class="deal-summary">
                        <div class="price invisible">                       
                            <div class="deal-summary-ctr">
                                <div class="deal-summary-price">
                                    <div>
                                        <h3 class="price-label">Personal Price</h3>
                                    </div>
                                    <div>
                                        <h2 class="monthly-rental"> <span></span></h2>
                                    </div>
                                    <div>
                                        <p class="initial-rental">+ initial rental</p>
                                    </div>
                                    <div>
                                        <p class="extra-information">Processing Fee: &pound;{{ @$derivative->getDefaultTerms()->document_fee }} inc VAT</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="price-fetching">
                            <h2 class="price-loading">Fetching your price</h2>
                        </div>
                    </div>
                    <div class="deal-form search-form">
                        @if(@\Auth::user()->user_group==2)
                        {{-- <div class="admin-details">
                            <table>
                                <tr>
                                    <th>Admin</th>
                                    <td colspan="2"><a href="{{ @$derivative->getAdminUrl() }}" target="_blank">{{ @$derivative->full_name }}</a></td>
                                </tr>
                                <tr>
                                    <th>CAP Code</th>
                                    <td>{{ @$derivative->cap_code }}</td>
                                    <th>System ID</th>
                                    <td>{{ @$derivative->id }}</td>
                                </tr>
                            </table>
                        </div> --}}
                        @endif
                        <div class="quote-form-ctr">
                            <form id="quote-form" class="quote-form" action="/quote" method="post">
                                {!! csrf_field() !!}
                                {!! Form::hidden('vehicle_type', $type=='van' ? 'van' : 'car') !!}
                                {!! Form::hidden('car_id', $type=='car' ? @$derivative->id : null) !!}
                                {!! Form::hidden('van_id', $type=='van' ? @$derivative->id : null) !!}
                                {!! Form::hidden('deal_id', \Request::input('deal_id') ?? old('deal_id')) !!}
                                {!! Form::hidden('initial_payment', \Request::input('initial_payment') ?? old('initial_payment')) !!}
                                {!! Form::hidden('monthly_rental', \Request::input('monthly_rental') ?? old('monthly_rental')) !!}
                                {!! Form::hidden('maintenance_cost', \Request::input('maintenance_cost') ?? old('maintenance_cost')) !!}
                                {!! Form::hidden('balloon_payment', \Request::input('balloon_payment') ?? old('balloon_payment')) !!}
                                {!! Form::hidden('options', \Request::input('options') ?? old('options')) !!}
                                {!! Form::hidden('options_total', \Request::input('options_total') ?? old('options_total')) !!}
                                

                                <div class="form-group">
                                    <label for="make">Lease Type 
                                        <span data-content="The type of contract you are interested in." class="more-info">
                                            <span>More Info</span>
                                        </span>
                                    </label>
                                    @if($type=='van')
                                    {!! Form::select('type', [
                                        'Business - Contract Hire'=>'Business - Contract Hire',
                                        'Business - Finance Lease'=>'Business - Finance Lease'
                                        ] , @$derivative->getDefaultTerms()->type, ['class'=>'select-css form-control quote-terms']) !!}
                                    @else
                                    {!! Form::select('type', [
                                        'Personal'=>'Personal',
                                        'Business - Contract Hire'=>'Business'
                                        ] , @$derivative->getDefaultTerms(\Cookie::get('price_view')??'Personal')->type, ['class'=>'select-css form-control quote-terms']) !!}
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="make">Term 
                                        <span data-content="How long do you wish to lease the vehicle for" class="more-info">
                                            <span>More Info</span>
                                        </span>
                                    </label>
                                    {!! Form::select('term', [
                                    '24'=>'24 Months',
                                    '36'=>'36 Months',
                                    '48'=>'48 Months',
                                    ] , @$derivative->getDefaultTerms(\Cookie::get('price_view')??'Personal')->term, ['class'=>'select-css form-control quote-terms']) !!}
                                </div>
                                <div class="form-group">
                                    <label for="make">Initial Rental 
                                        <span data-content="How many months do you wish to pay as the initial rental" class="more-info">
                                            <span>More Info</span>
                                        </span>
                                    </label>
                                    {!! Form::select('profile', [
                                    '1'=>'1 Month',
                                    '3'=>'3 Months',
                                    '6'=>'6 Months',
                                    '9'=>'9 Months',
                                    '12'=>'12 Months',
                                    ] , @$derivative->getDefaultTerms(\Cookie::get('price_view')??'Personal')->initial_profile, ['class'=>'select-css form-control quote-terms']) !!}
                                </div>
                                <div class="form-group">
                                    <label for="make">Annual Mileage
                                        <span data-content="The number of miles you travel per year" class="more-info">
                                            <span>More Info</span>
                                        </span>
                                    </label>
                                    {!! Form::select('mileage', array_combine($derivative->getAvailableMileages(), @$derivative->getAvailableMileages()), @$derivative->getDefaultTerms(\Cookie::get('price_view')??'Personal')->mileage, ['class'=>'select-css form-control quote-terms']) !!}
                                </div>
                                <div class="form-group">
                                    <label for="make">Maintenance 
                                        <span data-content="Do you wish to include the vehicle maintenance or maintain yourself" class="more-info">
                                            <span>More Info</span>
                                        </span>
                                    </label>
                                    {!! Form::select('maintenance', [
                                        'no' => 'Customer Maintained',
                                        'yes' => 'Maintenance Included',
                                    ], 'no', ['class'=>'select-css form-control quote-terms']) !!}
                                </div>
                                @if( ($derivative->in_stock==1&&$derivative->getDeals()->where('stock_price',1)->count()>0) ||($derivative->getDeals()->where('stock_pipeline',1)->count()>0))
                                    <div class="form-group" data-field="stock" data-type="">
                                        <label for="stock">Stock / Factory Order
                                            <span data-content="Stock orders are pre configured and usually available for quick delivery. Factory orders can be configured by you and ordered directly from the factory" class="more-info">
                                                <span>More Info</span>
                                            </span>
                                        </label>
                                        <div class="radio-switch input-container">
                                            @if($derivative->in_stock==1&&$derivative->getDeals()->where('stock_price',1)->count()>0)
                                                {!! Form::radio('stock', 'yes', $derivative->getDefaultTerms(price_view())->stock_price==1?true:false, ['class'=>'quote-terms hide-options ', 'id'=>'stock-deal']) !!}
                                                <label for="stock-deal" class="radio-label stock-order toggles">Stock Order</label>
                                            @endif
                                            @if($derivative->getDeals()->where('stock_pipeline',1)->count()>0)
                                                {!! Form::radio('stock', 'pipeline', $derivative->getDefaultTerms(price_view())->stock_pipeline==1?true:false, ['class'=>'quote-terms hide-options', 'id'=>'stock-pipeline']) !!}
                                                <label for="stock-pipeline" class="radio-label stock-order toggles">Due in Stock</label>
                                            @endif
                                            {!! Form::radio('stock', 'no', $derivative->getDefaultTerms(price_view())->stock_price==1||$derivative->getDefaultTerms(price_view())->stock_pipeline==1?false:true, ['class'=>'quote-terms show-options', 'id'=>'stock-factory']) !!}
                                            <label for="stock-factory" class="radio-label stock-order toggles">Factory Order</label>
                                        </div>
                                    </div>
                                @endif

                                <div class="deal-notice">
                                    <p><small>An excess mileage charge will apply if you exceed the contracted mileage. The exact charge will be confirmed on the official quotation prior to your acceptance to proceed.</small></p>
                                </div>
                                <button class="button-accent submit-enquiry">Get a Quote Now</button>
                            </form><!--deal-form-->
                        </div>
                    </div><!--deal-form-->
                </div>
            </div>

        </div>

        @if($derivative->getRelatedDeals())
        <section>
            <div class="latest-offers-strip-ctr">
                <div class="full-width-container">

                    <h2 class="centered">Similar offers</h2>

                    <div class="deal-boxes four-column no-similar-offers no-features no-carousel">
                        @foreach($derivative->getRelatedDeals(4) as $deal)
                            @include('themes.ubt.inc.deal-box')
                        @endforeach
                    </div>

                    
                </div>
            </div>
        </section>
        @endif

    </div><!--deal-detail-->


@stop

@section('scripts')

<script>

function loadPrice()
{

    document.getElementsByClassName('price')[0].classList.add('hidden');
    document.getElementsByClassName('price-fetching')[0].classList.remove('hidden');

    // Set option total
    var opts = document.querySelectorAll('#optional-extras input:checked');
    var option_total = 0;
    document.getElementsByName('options')[0].value = '';
    for (var i = 0; i < opts.length; i++) {
        //if(opts[i].dataset.default==1) continue;
        option_price = parseFloat( (document.querySelector('[name=type]').value=='Personal' ? opts[i].dataset.monthlyVat : opts[i].dataset.monthly) );
        option_total += option_price
        document.getElementsByName('options')[0].value += opts[i].dataset.name+(opts[i].dataset.default==1?' -[Std Option]-':'')+' (+£'+option_price+'pm)\n\r';
    }
    document.getElementsByName('options_total')[0].value = option_total;

    var url = '/api/{{ $type }}/price/{{ @$derivative->id }}';
    var params = document.getElementById('quote-form');
    var formData = new FormData(document.getElementById('quote-form'));

    fetch(url, {
        method: 'POST', 
        body: formData,
    }).then(function(response) {  
        if (response.status !== 200) {  
            console.warn('Looks like there was a problem. Status Code: ' + response.status);  
            return;  
        }
        return response.json();
    }).then(function(data) {  
        document.getElementsByClassName('price')[0].classList.remove('hidden');
        document.getElementsByClassName('price')[0].classList.remove('invisible');
        document.getElementsByClassName('price-fetching')[0].classList.add('hidden');
        document.getElementsByClassName('price-label')[0].innerHTML = data.type;

        document.getElementsByName('deal_id')[0].value = data.id;
        
        document.getElementsByClassName('monthly-rental')[0].innerHTML = data.monthly_rental_formatted;
        document.getElementsByName('monthly_rental')[0].value = data.monthly_rental;
        
        document.getElementsByClassName('initial-rental')[0].innerHTML = data.initial_rental_formatted;
        document.getElementsByName('initial_payment')[0].value = data.initial_payment;

        document.getElementsByName('balloon_payment')[0].value = data.balloon_payment;

        if(typeof document.getElementsByClassName('maintenance-cost')[0] !== 'undefined'){
            if(data.maintenance_cost==0||data.maintenance_cost==null){
                document.getElementsByClassName('maintenance-cost')[0].innerHTML = '(Contact us for price)';
                document.getElementsByName('maintenance_cost')[0].value = 0;
            } else {
                document.getElementsByClassName('maintenance-cost')[0].innerHTML = '+ '+data.maintenance_cost+'pm';
                document.getElementsByName('maintenance_cost')[0].value = data.maintenance_cost; 
            }
        }

        if(typeof document.getElementsByClassName('extra-information')[0] !== 'undefined'){
            if(data.fee==0||data.fee==null){
                document.getElementsByClassName('extra-information')[0].innerHTML = '';
            } else {
                document.getElementsByClassName('extra-information')[0].innerHTML = 'Processing fee: &pound;'+data.fee+(data.type=='Personal'?' inc VAT':' plus VAT');
            }
        }
        

    }).catch(function(err) {
          console.error('Fetch Error -', err);
          document.getElementsByClassName('price')[0].classList.remove('hidden');
          document.getElementsByClassName('price-fetching')[0].classList.add('hidden');
    });


}

function updateOptionMonthly() 
{
    var options = document.querySelectorAll('#optional-extras input');
    // document.querySelector('.summary-options').innerHTML = '';
    var summary = '';
    for (var x = 0; x < options.length; x++) {
        if(options[x].dataset.price == 0){
            options[x].dataset.monthly = 0;
            options[x].dataset.monthlyVat = 0;
        } else {
            options[x].dataset.monthly = (parseFloat(options[x].dataset.price.replace(',','')) / ( parseFloat(document.querySelector('#quote-form [name=profile]').value.replace(',','')) + (parseInt(document.querySelector('#quote-form [name=term]').value.replace(',',''))-1) )).toFixed(2);
            options[x].dataset.monthlyVat = (options[x].dataset.monthly * 1.2).toFixed(2);
            options[x].parentNode.firstChild.innerHTML = '(+'+(document.querySelector('#quote-form [name=type]').value=='Personal'?options[x].dataset.monthlyVat:options[x].dataset.monthly)+'/pm)';
        }
        // Add to Summary
        //console.log(options[x].dataset.name+' - '+options[x].dataset.default);
        if(options[x].dataset.default!=1&&options[x].checked==1){
            summary += '<li>'+options[x].dataset.name+'</li>';
        }
    }
    //console.log(summary);
    if(summary.length>0){
        summary = '<ul>'+summary+'</ul>';
    }
    // document.querySelector('.summary-options').innerHTML = summary;
}

function buildSummary() 
{
    document.querySelector('.summary-type').innerHTML = document.querySelector('[name=type]').value;
    document.querySelector('.summary-term').innerHTML = document.querySelector('[name=term]').value+' months';
    document.querySelector('.summary-mileage').innerHTML = document.querySelector('[name=mileage]').value+' miles per annum';
    document.querySelector('.summary-profile').innerHTML = document.querySelector('[name=profile]').value+'+'+(parseInt(document.querySelector('[name=term]').value)-1);
    document.querySelector('.summary-maintenance').innerHTML = document.querySelector('[name=maintenance]').value == 'no' ? 'Customer Maintained' : 'Included';
    // document.querySelector('.summary-type').innerHTML = document.querySelector('[name=type]:checked').value;

    
}




var els = document.getElementsByClassName('quote-terms');
for (var i = 0; i < els.length; i++) {
  els[i].addEventListener("change", function() {
    updateOptionMonthly();
    loadPrice();
    //buildSummary();
  });
}

let allHideOpts = document.querySelectorAll('.hide-options');
if(allHideOpts){
  for (let i = 0; i < allHideOpts.length; i++) {
    allHideOpts[i].addEventListener("click", function() {
      if(document.querySelector('.stock-spec')){
        document.querySelector('.stock-spec').classList.remove('hidden');
      }
      if(document.querySelector('.options-list')){
        document.querySelector('.options-list').classList.add('hidden');
      }
    });
  }
}

let allShowOpts = document.querySelectorAll('.show-options');
if(allShowOpts){
  for (let i = 0; i < allShowOpts.length; i++) {
    allShowOpts[i].addEventListener("click", function() {
      if(document.querySelector('.stock-spec')){
        document.querySelector('.stock-spec').classList.add('hidden');
      }
      if(document.querySelector('.options-list')){
        document.querySelector('.options-list').classList.remove('hidden');
      }
    });
  }
}

var els = document.querySelectorAll('#optional-extras input');
for (var i = 0; i < els.length; i++) {
  els[i].addEventListener("change", function() {
    updateOptionMonthly();
    loadPrice();
    //buildSummary();
  });
}
    
// var els = document.querySelectorAll('.gallery-thumb');
// for (var i = 0; i < els.length; i++) {
//   els[i].addEventListener("click", function(e) {
//     e.preventDefault();
//     elems = document.querySelectorAll('.gallery-thumb');
//     [].forEach.call(elems, function(el) {
//         el.classList.remove("active");
//     });
//     this.classList.add('active');
//     url = this.dataset.img;
//     document.getElementById("main-img").src = url; 
//   });
// }
    
document.getElementsByClassName('submit-enquiry')[0].addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById('quote-form').submit();
});

updateOptionMonthly();
loadPrice();
//buildSummary();


/* Slide Declerations */
document.addEventListener("DOMContentLoaded", function(event) { 

    var track = document.querySelector('.deal-gallery-ctr ul'),
        numSlides = document.getElementsByClassName('thumbnail').length;
        offset = 0,
        slideWidth = 20,
        numShowing = 5,
        autoPlay = false,
        timeout = 0;

    if(Math.max(document.documentElement.clientWidth, window.innerWidth || 0)<768){
        numShowing = 1;
    }

    slideThumbnail(track, numSlides, offset, slideWidth, numShowing, autoPlay, timeout);



    if(document.querySelector('[style="border: 0px none !important; padding: 0px !important; z-index: 999999999 !important; overflow: visible !important; min-width: 0px !important; min-height: 0px !important; max-width: none !important; max-height: none !important; width: auto !important; height: auto !important; position: fixed !important; inset: auto 0px 0px auto !important; display: block !important; margin: 0px !important;"]')){
        document.querySelector('[style="border: 0px none !important; padding: 0px !important; z-index: 999999999 !important; overflow: visible !important; min-width: 0px !important; min-height: 0px !important; max-width: none !important; max-height: none !important; width: auto !important; height: auto !important; position: fixed !important; inset: auto 0px 0px auto !important; display: block !important; margin: 0px !important;"]').style.display = "none";
    }

});

</script>

@include('themes.ubt.schema.derivative')

@stop
