
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaabha_sponsorha</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  @if(Auth::check()) {{Auth::user()->name}} @else user @endif </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
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

    <div class="container-mobile my-md-3 my-0 d-flex justify-content-center align-items-center">
           
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
    
    <img src="{{asset('img/forme.png')}}"  style="width: 100px;" class=" animate__animated animate__zoomIn mt-3" />
    @if(Auth::check()) {{Auth::user()->email}} @else user @endif   
    </p >
    <h4 class="width-p text-ooredooarabic text-ca  font-weight-bold mt-3">
    ﺍﻟﺒﻼﻳﺺ ﺇﻟﻲ ﻣﺮﻳﺰﺭﻓﻴﻬﻢ
    </h4>
    <div class="w-100" style="height: 239px;overflow-y: scroll;">   
    @if(isset($orders))
        @foreach($orders as $order )
            @foreach($order->products as $product )
            <div class="place d-flex mb-2" >
                    <div class="place-b1" >
                        <span class=" text-gothamrounded fs-14 text-white" style="vertical-align: -webkit-baseline-middle;">N° {{$product->number}}</span>
                    </div>
                    <div class="place-b2" > 
                        <span class="text-gothamrounded fs-14 text-gray-ca" style="vertical-align: -webkit-baseline-middle;">Prix : {{$zone[$product->zone][1]}} dt</span>
                        @if($product->status==0)
                        <span class="float-right mr-2 badge badge-warning mt-2">en cours</span>
                        @else
                        <span class="float-right mr-2 badge badge-success mt-2">valider</span>
                        @endif
                    </div>
            </div>
            @endforeach
        @endforeach 
    @endif
        <div class="text-center">
    <a class="btn btn-ca text-ooredooarabic px-4 pt-3 fs-18 text-white mt-2" href="{{url('App')}}">ﻧﺮﺟﻊ</a>
   </div> 
</section>
</div> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>   
<script>
    
    $( document ).ready(function() {
        var m=0;
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