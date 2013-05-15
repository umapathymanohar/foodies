@extends('layouts.scaffold')
@section('main')

 <div class="row">
 
  <div class="span5 offset4">
          <h2 class="logo">Change Password</h2>
     
       <div class="row">
         <div class="span5">
<form method="POST" class="form-box" action="{{{ (URL::action('UserController@do_reset_password')) ?: URL::to('/user/reset') }}}" accept-charset="UTF-8">           

    <input type="hidden" name="token" value="{{{ $token }}}">
    @if ( Session::get('error') )
        <div class="alert alert-error">{{{ Session::get('error') }}}</div>
    @endif

    @if ( Session::get('notice') )
        <div class="alert">{{{ Session::get('notice') }}}</div>
    @endif

              <fieldset>

                <p>Please enter your password below to change your current password.</p>
                <div class="control-group">
                  <label class="control-label"  for="">New password</label>
                  <div class="controls">
                    <input class="input-default" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"  for="">Confirm new password</label>
                  <div class="controls">
                    <input class="input-default" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
                    
                  </div>
                </div>
                <div class="control-group">
                  <div class="controls">
                    <button type="submit" class="button blue pull-right">{{{ Lang::get('confide::confide.forgot.submit') }}}</button>
                    <div>
                </div>
              </fieldset>
            </form>
         </div>
       </div>
        
        
          </div>

</div>

@stop