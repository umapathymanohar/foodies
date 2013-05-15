@extends('layouts.scaffold')

@section('main')

  <div class="row">
@include('layouts.sidebar');
  <div class="span10">
     <h3 class="subheader">Profile</h3>
       <div class="row">
         <div class="span7">
           
            
                {{Form::model($business, array('method' => 'PATCH', 'files' => 'true', 'route' => array('businesses.update', $business->id,)))}}
                {{ Form::hidden('user_id') }}
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

                            @if ($business->businessLogo)
            <img width="200" src="{{URL::asset('/business_assets/'.$business->id . '/' . $business->businessLogo )}}" alt="">
            @endif
            
            {{ Form::file('businessLogo') }}

            
              </div>
            </div>
             <hr>
                <div class="control-group actions">
                   <div class="controls">
                    {{ Form::submit('Update', array('class' => 'button')) }}
            {{ link_to_route('businesses.show', 'Cancel', $business->id, array('class' => 'button')) }}

                    
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