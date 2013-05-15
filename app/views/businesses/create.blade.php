@extends('layouts.scaffold')

@section('main')

  <div class="row">
@include('layouts.sidebar');
  <div class="span10">
     <h3 class="subheader">Profile</h3>
       <div class="row">
         <div class="span7">
           
            
{{ Form::open(array('route' => 'businesses.store', 'files'=>true))}}
                {{ Form::hidden('user_id', Auth::user()->id) }}
                <div class="control-group">
                 <label class="control-label">Name</label>
                 <div class="controls">
                        {{ Form::text('fullName') }}
                 </div>
               </div>
               <div class="control-group">
                 <label class="control-label">Business Name</label>
                 <div class="controls">
                         {{ Form::text('businessName') }}
                   
                 </div>
               </div>
               <div class="control-group">
                 <label class="control-label">Address line 1</label>
                 <div class="controls">
                      {{ Form::text('businessAddressLine1') }}
                   
                 </div>
               </div>
                 <div class="control-group">
                 <label class="control-label">Address line 2</label>
                 <div class="controls">
                      {{ Form::text('businessAddressLine2') }}
             
                   
                 </div>
               </div>
               <div class="control-group">
                 <label class="control-label">Country</label>
                 <div class="controls">
                      
                      {{ Form::text('businessCountry') }}
                      
                 </div>
               </div>
                <div class="control-group">
                 <label class="control-label">State</label>
                 <div class="controls">
                     {{ Form::text('businessState') }}
                    
                 </div>
               </div>
               <div class="control-group">
                 <label class="control-label">City</label>
                 <div class="controls">
                     {{ Form::text('BusinessCity') }}
                   
                 </div>
               </div>
                 <div class="control-group">
                 <label class="control-label">Zip Code</label>
                 <div class="controls">
                      {{ Form::text('businessPincode') }}
                   
                 </div>
               </div>
               <div class="control-group">
                 <label class="control-label">Currency</label>
                 <div class="controls">
                     {{ Form::text('businessCurrency') }}
                   
                 </div>
               </div>
               
                 <div class="control-group">
             <label for="" class="control-label">Photo</label>
              <div class="controls">

            
            {{ Form::file('businessLogo') }}

            
              </div>
            </div>
             <hr>
                <div class="control-group actions">
                   <div class="controls">
                       {{ Form::submit('Submit', array('class' => 'button blue')) }}
            

                    
                  </div>
                </div>
             </form>
         </div>
       </div>
        
        
          </div>

</div>
@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop
@extends('layouts.scaffold')

@section('main')

<h1>Create Business</h1>

{{ Form::open(array('route' => 'businesses.store', 'files'=>true))}}

    <ul>
        <li>
            {{ Form::hidden('user_id', Auth::user()->id) }}
        </li>

        <li>
            {{ Form::label('fullName', 'FullName:') }}
            {{ Form::text('fullName') }}
        </li>

        <li>
            {{ Form::label('businessName', 'BusinessName:') }}
            {{ Form::text('businessName') }}
        </li>

        <li>
            {{ Form::label('businessLogo', 'BusinessLogo:') }}
            {{ Form::file('businessLogo') }}
        </li>

        <li>
            {{ Form::label('businessCurrency', 'BusinessCurrency:') }}
            {{ Form::text('businessCurrency') }}
        </li>

        <li>
            {{ Form::label('businessTimeZone', 'BusinessTimeZone:') }}
            {{ Form::text('businessTimeZone') }}
        </li>

        <li>
            {{ Form::label('businessAddressLine1', 'BusinessAddressLine1:') }}
            {{ Form::text('businessAddressLine1') }}
        </li>

        <li>
            {{ Form::label('businessAddressLine2', 'BusinessAddressLine2:') }}
            {{ Form::text('businessAddressLine2') }}
        </li>

        <li>
            {{ Form::label('businessCountry', 'BusinessCountry:') }}
            {{ Form::text('businessCountry') }}
        </li>

        <li>
            {{ Form::label('businessState', 'BusinessState:') }}
            {{ Form::text('businessState') }}
        </li>

        <li>
            {{ Form::label('businessCity', 'BusinessCity:') }}
            {{ Form::text('businessCity') }}
        </li>

        <li>
            {{ Form::label('businessPincode', 'BusinessPincode:') }}
            {{ Form::text('businessPincode') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


