@extends('layouts.scaffold')
@section('main')

 <div class="row">
            <div class="span5 offset4">
             <h2 class="logo">Product Name</h2>
             
<form method="POST" class="form-box" action="{{{ (URL::action('UserController@do_forgot_password')) ?: URL::to('/user/forgot') }}}" accept-charset="UTF-8">
   <input type="hidden" name="csrf_token" value="{{{ Session::getToken() }}}">
              <fieldset>
                <div id="legend">
                  <legend>Forgot Password</legend>
                </div>


    @if ( Session::get('error') )
        <div class="alert alert-error">{{{ Session::get('error') }}}</div>
    @endif

    @if ( Session::get('notice') )
        <div class="alert">{{{ Session::get('notice') }}}</div>
    @endif


                <p>Please enter your email address below and we will send you an email to change your password.</p>
                <div class="control-group">
                  <label class="control-label"  for="email">Email Address</label>
                  <div class="controls">
                    
                    <input class="input-default" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
        
                  </div>
                </div>
                <div class="control-group">
                  <div class="controls">
                    <input class="button blue pull-right" type="submit" value="{{{ Lang::get('confide::confide.forgot.submit') }}}">
                    
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>



@stop