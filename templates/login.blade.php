@extends('themes.ubt.inc.base')

@section('head')
  	
    <title>{{ @$module->meta_title }}</title> 
  	<meta name="description" content="{{ @$module->meta_description }}">
    <meta name="robots" content="{{ @$module->robots }}">

@stop

@section('header')
    <!-- BREADCRUMBS --> 
    <div class="breadcrumbs">
        <div class="ctr"> 
            <ul class="layout inline-list" aria-labelledby="breadcrumbMenu">
                <li><a href="/">Home</a></li>
                <li><a href="/account/auth/login">Account Login</a></li>
            </ul>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
@stop

@section('content')

    <section class="account-login">
        <div class="ctr">
            <h1>Account Login</h1>
            
            <div class="login">
                @if (Session::has('status'))
                <div class="alert-info alert" role="alert">
                    {{ Session::get('status') }}
                </div>
                @endif

                @if (Session::has('error'))
                <div class="alert-danger alert" role="alert">
                    {{ Session::get('error') }}
                </div>
                @endif

                {!! Form::open(['route' => 'Account.Login']) !!}
                    
                
                        <div class="form-group">
                            <label for="name">Account Number</label>
                            <input type="text" class="form-control" name="account_id" placeholder="Acccount Number">
                        </div>
                    
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email address">
                        </div>
                        
                        <button id="account-login" class="button-tertiary" type="submit">Login</button>

                    
                
                {!! Form::close() !!}    
            </div>

        </div><!--ctr-->
    </section><!--main-->

@stop

@section('footer')
 
@stop