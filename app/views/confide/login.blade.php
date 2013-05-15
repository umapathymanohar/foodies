@extends('layouts.scaffold')
@section('main')

<div class="row">
    <div class="span5 offset4">
      <h2 class="logo">Product Name</h2>
      <form class="form-box" method="POST" action="{{{ URL::action('UserController@do_login') ?: URL::to('/user/login') }}}" accept-charset="UTF-8">
          <input type="hidden" name="csrf_token" value="{{{ Session::getToken() }}}">
          <fieldset>
              <div id="legend">
                <legend clas="text-center">Member Login</legend>


  

            </div>
                          @if ( Session::get('error') )
                <div class="alert alert-error">{{{ Session::get('error') }}}</div>
                @endif

                @if ( Session::get('notice') )
                <div class="alert">{{{ Session::get('notice') }}}</div>
                @endif

            <div class="control-group">
                <label class="control-label"  for="username">Username</label>
                <div class="controls">
                  <input class="input-default" tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
              </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password">Password <small>(
                <a href="{{{ (URL::action('UserController@forgot_password')) ?: 'forgot' }}}">forgot password?</a>

                )</small></label>
                <div class="controls">
                  <input class="input-default" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
              </div>
          </div>
          <label for="remember" class="checkbox">{{{ Lang::get('confide::confide.login.remember') }}}
            <input type="hidden" name="remember" value="0">
            <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
        </label>
        <div class="control-group">
            <div class="controls">
              <button tabindex="3" type="submit" class="button blue pull-right">{{{ Lang::get('confide::confide.login.submit') }}}</button>        

              <p>New Here? <a href="{{URL::to('user/create')}}">Register</a></p>
          </div>
      </div>
  </fieldset>
</form>
</div>
</div>




@stop