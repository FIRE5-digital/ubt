@extends('themes.ubt.inc.base')

@section('head')
  	
    <title>{{ @$module->meta_title }}</title> 
  	<meta name="description" content="">
    <meta name="robots" content="{{ @$module->robots }}">

@stop

@section('content')
<div class="account-page">
    <section class="main-full">
        <div class="ctr">
            <h1>Hi {{ @session('account')->given_name }} <small><a href="{{ account_logout() }}" class="button-small right">Logout</a></small></h1>

            @switch(@session('account')->custom['Vehicle '.session('active_order').' - Order Progress'])
                @case('Processing')
                    @php($status = '<p>Your order is currently being processed.</p>')
                    @php($step=1)
                    @break
                @case('With Factory')
                    @php($status = '<p>Your vehicle has been ordered with the factory. No build week has been allocated yet.</p>')
                    @php($step=2)
                    @break
                @case('Build Week Confirmed')
                    @php($status = '<p>The factory has confirmed your build week which is '.@session('account')->custom['Build Week'].'. We expect delivery to be approximately 4-6 weeks from the build week.</p>')
                    @php($step=3)
                    @break
                @case('Build in Progress')
                    @php($status = '<p>Your order is currently in production at the factory. We expect delivery to be approximately 4-6 weeks from now.</p>')
                    @php($step=4)
                    @break
                @case('In Transit')
                    @php($status = '<p>Your vehicle is in transit from the factory. We expect delivery to be approximately 3-4 weeks from now. When the vehicle arrives at the dealership, we will send out your Finance Documents.</p>')
                    @php($step=5)
                    @break
                @case('At Dealership')
                    @php($status = '<p>Your vehicle has now arrived at the dealership. When you have returned the Finance Documents, and they have been accepted, we will be able to organise delivery.</p>')
                    @php($step=6)
                    @break
                @case('Delivery')
                    @php($status = '<p>Delivery Booked For: '.@session('account')->custom['Est. Delivery Date'].'</p>')
                    @php($step=7)
                    @break
                @default
                    @php($status = '<p>There was a problem retireving you order status.</p>')
                    @php($step=0)
            @endswitch


            <!-- Pearls -->
            <div class="pearls-ctr">
                <div class="pearls">
                    <div class="pearl @if($step==1)current @elseif($step>1) done @endif">
                      <span class="pearl-icon">1</span>
                      <span class="pearl-title">Processing Your Order</span>
                    </div>
                    <div class="pearl @if($step==2)current @elseif($step>2) done @endif">
                      <span class="pearl-icon">2</span>
                      <span class="pearl-title">With The Factory</span>
                    </div>
                    <div class="pearl @if($step==3)current @elseif($step>3) done @endif">
                      <span class="pearl-icon">3</span>
                      <span class="pearl-title">Build Week Confirmed</span>
                    </div>
                    <div class="pearl @if($step==4)current @elseif($step>4) done @endif">
                      <span class="pearl-icon">4</span>
                      <span class="pearl-title">Build In Progress</span>
                    </div>
                    <div class="pearl @if($step==5)current @elseif($step>5) done @endif">
                      <span class="pearl-icon">5</span>
                      <span class="pearl-title">In Transit</span>
                    </div>
                    <div class="pearl @if($step==6)current @elseif($step>6) done @endif">
                      <span class="pearl-icon">6</span>
                      <span class="pearl-title">At Dealership</span>
                    </div>
                    <div class="pearl @if($step==7)current @elseif($step>7) done @endif">
                      <span class="pearl-icon">7</span>
                      <span class="pearl-title">Delivery</span>
                    </div>
                </div>
            </div>
            @if(Session::has('status'))
            <div class="alert-success" role="alert">
                <h4>{{ Session::get('status') }}</h4>
            </div>
            @endif
            @if($step==1&&@session('account')->custom['Customer Order Confirmation']!='Confirmed')
            <div class="alert-success" role="alert">
                <h4>Action Required <a class="tags-primary" href="{{ account_order_confirm() }}" title="Go to order confirmation">Confirm Order</a></h4>
                <p>You need to confirm your order details in order for us to progress you order.</p>
            </div>
            @elseif($step==7&&!array_key_exists('Payment Confirmation', @session('account')->tags))
            <div class="alert-success" role="alert">
                <h4>Action Required <a class="tags-primary" href="{{ account_delivery() }}" title="Go to delivery confirmation">Confirm Delivery</a></h4>
                <p>You need to confirm your delivery details and pay you processing fee in order to complete you order.</p>
            </div>
            @else
            <div class="alert-error" role="alert">
                <h4>Current Order Status <span class="tags-primary">{{ @session('account')->custom['Vehicle '.session('active_order').' - Order Progress'] }}</span></h4>
                {!! $status !!}
            </div>
            @endif
        </div><!--ctr-->
    </section><!--main-->

    <section class="order-details">
        <div class="ctr main-side">
            <div class="main">
                <h3 class="h4">Order Summary</h3>
                <div class="order-summary">
                    {{-- <div class="order-summary-img">
                        <picture>
                            <img src="/themes/stable/img/blog-img.jpg" alt="" width="212" height="147">
                        </picture>
                    </div> --}}
                    <div class="order-summary-name"><p class="bold">{{ @session('account')->custom['Vehicle '.session('active_order').' - Make'].' '.@session('account')->custom['Vehicle '.session('active_order').' - Model'] }}</p></div>
                    <div class="order-summary-content">
                        <ul>
                            <li>Order Status&nbsp;<span class="bold">{{ @session('account')->custom['Vehicle '.session('active_order').' - Order Progress'] }}</span></li>
                            <li>Date Ordered&nbsp;<span class="bold">{{  !is_null(@session('account')->custom['Vehicle '.session('active_order').' - Date Ordered']) ? \Carbon\Carbon::createFromFormat('Y-m-d',@session('account')->custom['Vehicle '.session('active_order').' - Date Ordered'])->format('d/m/Y') : 'TBC' }}</span></li>
                            <li>Vehicle Registration&nbsp;<span class="bold">{{ @session('account')->custom['Vehicle '.session('active_order').' - Reg Number'] ?: '…awaiting' }}</span></li>
                            <li>Last Updated&nbsp;<span class="bold">{{ (new \Carbon\Carbon(@session('account')->last_updated))->format('d/m/Y') }}</span></li>
                        </ul>
                    </div>
                </div>
                <table class="data-table">
                    <tr>
                        <th>Contract Type</th>
                        <td>{{ @session('account')->custom['Contract Type'] }}</td>
                    </tr>
                    <tr>
                        <th>Contract Term</th>
                        <td>{{ @session('account')->custom['Vehicle '.session('active_order').' - Term'] }}</td>
                    </tr>
                    <tr>
                        <th>Annual Mileage</th>
                        <td>{{ @session('account')->custom['Vehicle '.session('active_order').' - Annual Mileage'] }}</td>
                    </tr>
                    <tr>
                        <th>Monthly Rental</th>
                        <td>&pound;{{ @session('account')->custom['Monthly Rental'] }}</td>
                    </tr>
                    <tr>
                        <th>Initial Rental</th>
                        <td>&pound;{{ @session('account')->custom['Initial Rental'] }}</td>
                    </tr>
                    <tr>
                        <th>Processing Fee</th>
                        <td>&pound;{{ @session('account')->custom['Processing Fee'] }} @if(array_key_exists('Payment Confirmation', @session('account')->tags))<span class="tags-secondary">PAID</span> @else {{-- <a href="/payment" class="button-small">Pay Processing Fee</a> --}}@endif</td>
                    </tr>
                    <tr>
                        <th>Estimated Delivery</th>
                        <td>{{ @session('account')->custom['Est. Delivery Date'] }}</td>
                    </tr>
                </table>
                {{-- <h3 class="h4">Order History</h3>
                <table class="info-table">
                    <tr>
                        <td>012957264930</td>
                        <td class="bold">Audi A4 Avant 35 TFSI Black Edition</td>
                        <td>12/03/2015</td>
                    </tr>
                    <tr>
                        <td>012957264930</td>
                        <td class="bold">Audi A4 Avant 35 TFSI Black Edition</td>
                        <td>12/03/2015</td>
                    </tr>
                    <tr>
                        <td>012957264930</td>
                        <td class="bold">Audi A4 Avant 35 TFSI Black Edition</td>
                        <td>12/03/2015</td>
                    </tr>
                </table> --}}
            </div>
            <div class="aside">
                <h3 class="h4">Account Information</h3>
                <div class="alert-tertiary" role="alert">
                    <p>Your Account Manager is {{ @session('account')->custom['Account Manager'] }} - if you have any questions, don’t hesitate to get in touch <a href="tel:{{ config('company.telephone') }}">{{ config('company.telephone') }}</a> or <a class="mobile-break" href="mailto:{{ @session('account')->custom['Account Manager Email'] }}">{{ @session('account')->custom['Account Manager Email'] }}</a></p>
                </div>
                <table class="data-table">
                    <tr>
                        <th>Name</th>
                        <td>{{ @session('account')->given_name }} {{ @session('account')->family_name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ @session('account')->email_addresses[0]->email }}</td>
                    </tr>
                    <tr>
                        <th>Telephone Number</th>
                        <td>{{ @session('account')->phone_numbers[0]->number }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ @session('account')->addresses[0]->line1 }}<br/>
                            {{ @session('account')->addresses[0]->line2 }}<br/>
                            {{ @session('account')->addresses[0]->locality }}<br/>
                            {{ @session('account')->addresses[0]->region }}
                        </td>
                    </tr>
                    <tr>
                        <th>Postcode</th>
                        <td>{{ @session('account')->addresses[0]->zip_code }} {{ @session('account')->addresses[0]->zip_four }}</td>
                    </tr>
                </table>
                <p class="text-link">Are these details wrong? Let us know <a class="text-highlight" href="tel:{{ config('company.telephone') }}">{{ config('company.telephone') }}</a></p>
            </div>
        </div>
    </section> 
</div>
@stop

@section('footer')
 
@stop