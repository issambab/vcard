<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaabha_sponsorha</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
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
        <!--start section 12-->
        <section class="section12 d-flex flex-column align-items-center mt-3" >
            
            
            <img src="{{asset('img/tshirt-front-fin.png')}}"  style="width: 230px;" class=" animate__animated animate__zoomIn" />
            <p class="width-p text-ooredooarabic text-gray-ca fs-18 font-weight-bold mt-3">
                عندك نومرو سبنصور إكتبو و شوف إسمك على المريول
            </p>
            <form action="{{url('sponso')}}" method="POST">
            @csrf
            
            <div class=" d-flex mb-3 w-100" >
                <input class="input-form text-center" type="text" value="{{@$_GET['ca']}}" name="sponso"  style="font-size: 18px;" placeholder="Sonpsor نومرو"> </input>
            </div>
        <div class="text-center">
            <button class="btn btn-ca text-ooredooarabic px-4 pt-3 fs-18 " type='submit'>ﻧﺸﻮﻑ ﺇﺳﻤﻲ</button>
			 
        </div> 
        </form>
	<!--	
		 <div class="text-center mt-2">
          
			  <button class="btn btn-ca text-ooredooarabic px-4 pt-3 fs-18 " onclick="{{url('Mariouli')}}" type='text'>ﻧﺸﻮﻑ مريولي</button>
        </div> -->
        </section>
        <!--end section 12-->
</div> 
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
})
</script> 

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3YY0NHTT59"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-3YY0NHTT59');
</script>
</body>
</html>