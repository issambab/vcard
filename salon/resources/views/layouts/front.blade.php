<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site Officiel du CA | Club Africain</title>
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png')}}"  />    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        @yield('cssSup')
</head>
<body>

<div class="loading">
<img src="{{asset('images/loading.gif')}}"  class="img-loading" />
</div> 
     
     <div class="justify-content-center d-flex">

    	    <!-- start sidebar menu -->
             @include('layouts.front.sidebar')
             <!-- end sidebar menu -->

    
         <div class="container ">

           
             <!-- start sidebar menu -->
             @include('layouts.front.header')
             <!-- end sidebar menu -->


            <!-- start page content -->
            @yield('content')
            <!-- end page content -->

         </div>
   


     

    </div>
    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" ></script>
    <script src="{{ asset('js/main.js')}}"></script>
      @yield('jsSup')
</body>
</html>