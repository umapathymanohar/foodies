 <header role="banner">
        <div class="container">
          <div class="row">
            <div class="span3">
              <a class="brand" href="index.html">Foodies</a>

            </div>



@if (Auth::check())
<?php 
 $username = Confide::user()->username;
?>
            <div class="span9">
              <nav class="pull-right"> 
               <ul class="profileBar">
                <li class="profile">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Howdy, {{ $username }}<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="change-pwd.html"><i class="icon-cog"></i> Settings</a></li>
                    <li><a href="support.html"><i class="icon-envelope"></i> Contact Support</a></li>
                    <li class="divider"></li>
                    <li><a href="{{URL::to('user/logout')}}"><i class="icon-off"></i> Logout</a></li>
                  </ul>
                </li>
                <!-- <li class="notify"><a href="#"><span>2</span></a></li> -->
                <!-- <li class="calendar"><a href="#"></a></li> -->
                <!-- <li class="mail"><a href="#"></a><span class="attention">!</span></li> -->
              </ul>
            </nav>
            <!--/nav-->
          </div>
@endif

        </div>
      </div>

    </header>