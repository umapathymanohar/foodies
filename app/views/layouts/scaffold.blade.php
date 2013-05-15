<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.document_header')

</head>
<body>
    @include('layouts.masthead')
 

    <div id="content" role="main">
        <div class="container">


            @yield('main')
        </div>
        <!-- /container -->
        <div id="sticky-footer"></div>
    </div>
    <!-- /main -->
       @include('layouts.footer')
 
    
</body>
</html>