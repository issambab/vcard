<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ca</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"  />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>
        g:hover .cls-1{
            fill:white;
            
        }
        g{
            cursor: pointer;
        }
    .popup {
        width: 230px;
        height: 180px;
        position: absolute;
        z-index: 3;
        background: white;
        border: 2px solid red;
        border-radius: 25px;
        top: 36%;
       }
   .mask {
    width: 100%;
    height: 100%;
    position: absolute;
    background-color: rgba(128, 128, 128, 0.377);
    z-index: 2;
       }  
       .fermer{
        float: right;
        margin: -21px -20px 0 0;
        cursor: pointer;
       }
       .A1CAR {    
            text-align: center;
            width: 200px;
            color: white;
       }
       .A1CAR2{
          width: 100%;
          text-align: center;
          color: white;
       }
       .error {
    background-color: #fce4e4;
    border: 1px solid #cc0033;
    outline: none;
} 
        </style>
</head>
<body class="d-flex justify-content-center">


    <div class="container-mobile mb-md-3 my-0 d-flex justify-content-center align-items-center">
            
        <!--start header-->
        <header>
            <img src="{{ asset('img/menu.png')}}" alt="" class="menu">
            <a href="{{url('/App')}}">
                <img src="{{ asset('img/logo-ca.png')}}" alt="" class="logo">
            </a>
            <ul class="nav-menu mt-3 text-white px-4 text-ooredooarabic" style="display: none;">
                <li class="text-white"><a  class="text-white" href="{{url('sponso')}}"> تشوف بلا صة
               
                    
                        إسمك </a></li>
                <li class="text-gothamrounded text-white"><a class="text-white" href="{{url('ca-login')}}">Mes commandes</a></li>
                <li class="text-gothamrounded text-white"><a href="https://www.facebook.com/Cha3bhaSponsorha" target="_blank" class="text-white" >Page Facebook</a> </li>
            </ul>
         </header>
    <section class="section12 d-flex flex-column align-items-center mt-3" >
    
    
    <img src="{{asset('img/forme.png')}}"  style="width: 230px;" class=" animate__animated animate__zoomIn" />
    <h2 class="width-p text-ooredooarabic text-ca  font-weight-bold mt-3">
        !  ﻣﺮﺣﺒﺎ ﺑﻴﻚ
    </h2>
    @if(Session::has('message'))
    <p class="alert alert-danger">{{ Session::get('message') }}</p>
    @endif
    <form action="{{url('ca-login')}}" method="POST" class="w-100">
            @csrf
        <div class=" d-flex mb-3 w-100" >
            <input class="input-form text-center text-ooredooarabic" type="email"  name="email"  placeholder="ﻣﺘﺎﻋﻚ mailﺍﻟـ"> </input>
        </div>
        <div class=" d-flex mb-3 w-100" >
            <input class="input-form text-center text-ooredooarabic" type="password"  name="password"  placeholder="ﻧﻮﻣﺮﻭ ﺗﻠﻴﻔﻮﻧﻚ"> </input>
        </div>
       <div class="text-center">
        <button class="btn btn-ca text-ooredooarabic px-4 pt-3 fs-18" type="submit">ﻧﻜﻮﻧﻜﺘﻲ</button>
       </div> 
  </form>
    
</section>
</div>    
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script >
    $( document ).ready(function() {
        var m =0;
        $( ".menu" ).click(function(){
       m++;
       if( m % 2 == 0 ){
        $("header").addClass('header');
        
        $(".nav-menu").hide();
       }
       else{
        $("header").removeClass('header');
        $(".nav-menu").show();
        $("header").css('index','10000')
        
       }
        
   })
    });
</script>
</html>