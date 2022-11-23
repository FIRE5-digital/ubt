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
	
	  <div id="map" style="height:90vh;">
    </div>
    
    <div class="ctr">
        <div class="contact-details">
            <div class="contact-details-ctr">

                <div class="contact-details-form">
                    <div class="contact-content"> 
                        {!! @$page->content->intro_content !!}
                        <form id="contact-form" class="contact-form" data-recaptcha="{{ config('google.recaptcha_key') }}">
                            {!! \Form::token() !!}
                            {!! \Form::hidden('g-recaptcha-response', null) !!}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" placeholder="Phone Number" name="telephone" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" class="form-control" placeholder="Message" name="comments" required></textarea>
                            </div>
                            <button class="button button-accent" id="send-contact-form">Submit</button>
                        </form>
                    </div>
                    <div class="thank-you hidden">
                        <h1>Thank You</h1>
                        <p>A member of our team will be in touch as soon as possible</p>
                    </div>
                </div>

                <div class="contact-info">
                    <div class="opening-times">
                        {!! @$page->content->opening_times !!}
                    </div>
                    <div class="contact-numbers">
                        {!! @$page->content->contact_numbers !!}
                    </div>
                    <div class="email-info">
                        {!! @$page->content->email_info !!}
                    </div>
                    <div class="address-info">
                        {!! @$page->content->address_info !!}
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    @include('themes.ubt.inc.map')


@stop

@section('footer')
<style>
  .grecaptcha-badge {
    visibility: hidden;
  }
</style>
@stop