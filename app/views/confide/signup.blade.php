@extends('layouts.scaffold')

@section('main')


<div class="row">
    <div class="span5 offset4">
      <h2 class="logo">Product Name</h2>

      <form method="POST"  class="form-box" action="{{{ (URL::action('UserController@store')) ?: URL::to('user')  }}}" accept-charset="UTF-8">
        <input type="hidden" name="csrf_token" value="{{{ Session::getToken() }}}">
        <fieldset>


          <div id="legend">
            <legend class="text-center">Register</legend>

            @if ( Session::get('error') )
            <div class="alert alert-error">
                @if ( is_array(Session::get('error')) )
                {{ head(Session::get('error')) }}
                @endif
            </div>
            @endif

            @if ( Session::get('notice') )
            <div class="alert">{{ Session::get('notice') }}</div>
            @endif

        </div>
        <div class="control-group">
            <label class="control-label"  for="username">Username</label>
            <div class="controls">
                <input class="input-default" placeholder="Username" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">

            </div>
        </div>
        <div class="control-group">
            <label class="control-label"  for="email">Email Address</label>
            <div class="controls">
              <input class="input-default" placeholder="Email Address" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
          </div>
      </div>
      <div class="control-group">
        <label class="control-label"  for="password">Password</label>
        <div class="controls">
          <input class="input-default" placeholder="Password" type="password" name="password" id="password">
      </div>
  </div>
  <div class="control-group">
    <label class="control-label"  for="password">Confirm Password</label>
    <div class="controls">
      <input class="input-default" placeholder="Confirm Password" type="password" name="password_confirmation" id="password_confirmation">
  </div>
</div>

<div class="control-group">
    <div class="controls">
       <label><input type="checkbox" name="terms"> I agree with the <a href="#">Terms and Conditions</a>.</label>
   </div> 
</div>
<div class="control-group">
  <div class="controls">
    <button type="submit" class="button blue pull-right">Register</button>

    <p>Already a member?
         
      <a href="{{URL::to('user/login')}}">Login</a>
  </p>
</div>
</div>
</fieldset>



</form>
</div>
</div>



@stop