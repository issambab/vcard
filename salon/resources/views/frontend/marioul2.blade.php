
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    

    <style>
        body {
            padding-top: 70px;
            padding-bottom: 30px;
        }
		text {
			font-weight:bold;
			
		}
        .btn-ca{
    color: #fff;
    background-color: #e31b23;
    border-color: #e31b23;
    border-radius: 2.25rem;
}
        .cls-9 {
            fill: #000000 !important;
}
        
        .cls-14 {
    letter-spacing: 0!important;
}

        svg {
           /* border: 1px solid black;*/
            display: block;
           /* width:650PX;*/
            margin-left: auto;
            margin-right: auto;
        }
        .cls-1{
            fill: transparent !important;
        }
        div.controls {
            text-align: center;
        }

        div.controls i {
            margin: 3px;
        }

        div.controls p {

        }

        div.controls-zoom, div.controls-pan {
            display: inline-block;
        }

        div.controls-zoom {
           /* margin-left: 20px;*/
        }
		    svg rect{
        fill: transparent !important;
        }
       .band8  {
		   font-size: 3.8px !important;
	   } 
	    .band9 {
		   font-size: 3.8px !important;
	   } 
	    .band10  {
		   font-size: 3.8px !important;
	   } 
    </style>

    
</head>
<body style="overflow: inherit;height:auto">
<div class="container tsh-front" style="overflow-x: hidden;">

  <div id="example1" class="controls" >
       
        <div class="controls-zoom " style=" display: flex;justify-content: center;">
            <p><i class="btn btn-ca fa fa-refresh"></i></p>
            <p><i class="btn btn-ca fa fa-plus"></i> </p>
            <p><i class="btn btn-ca fa fa-minus"></i></p>
        </div>
    </div>
    <div class="text-center">
        <img src="{{ asset('img/lat5a-front.png')}}" class="mr-1 tshirt-front" style="width: 65px;" alt="">
        <img src="{{ asset('img/Lat5a-Back.png')}}" class="ml-1 tshirt-back" style="width: 65px;" alt="">
    </div>
    <div class="text-center" style="margin-top:20px;">
    <a class="btn btn-ca text-ooredooarabic px-4 pt-3 fs-18" href="{{url('/')}}">نرجع</a>
   </div>  
    
</div>


<div class="container tsh-back" style=" display: none;overflow-x: hidden;" >
    <div id="example2" class="controls" >      
	  <div class="controls-zoom " style=" display: flex;justify-content: center;">
            <p><i class="btn btn-ca fa fa-refresh"></i></p>
            <p><i class="btn btn-ca fa fa-plus"></i> </p>
            <p><i class="btn btn-ca fa fa-minus"></i></p>
        </div>
    </div>
    <div class="text-center">
        <img src="{{ asset('img/lat5a-front-b.png')}}" class="mr-1 tshirt-front" style="width: 65px;" alt="">
        <img src="{{ asset('img/Lat5a-Back-b.png')}}" class="ml-1 tshirt-back" style="width: 65px;" alt="">
    </div>
    <div class="text-center" style="margin-top:20px;">
    <a class="btn btn-ca text-ooredooarabic px-4 pt-3 fs-18" href="{{url('/')}}">نرجع</a>
   </div>  
    </div>
	 
 </div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
<script type="text/javascript" src="https://rawgit.com/DanielHoffmann/jquery-svg-pan-zoom/master/compiled/jquery.svg.pan.zoom.js"></script>
  


    
    <!--script type="text/javascript" src="/home/daniel/dev/jquery-svg-pan-zoom/compiled/jquery.svg.pan.zoom.js"></script-->

    <script>
       var example1, example2;//globals so we can manipulate them in the debugger
       $( document ).ready(function() {
            "use strict";
            $( ".tshirt-front" ).click(function(){
                
                $(".tsh-back").hide();
                $(".tsh-front").show();
                
            })
            $( ".tshirt-back" ).click(function(){
               
                $(".tsh-front").hide();
                $(".tsh-back").show();
                
            })
            var examples = $("svg").svgPanZoom();


            var callback= function(example) {
                return function(event) {
                    if ($(event.target).hasClass("fa-arrow-up")){		example.panUp()	; console.log('panUp') ;	}
                        
                    if ($(event.target).hasClass("fa-arrow-down")){		example.panDown();	console.log('panDown') ;	}
                        
                    if ($(event.target).hasClass("fa-arrow-left")){		example.panLeft();	console.log('panLeft') ;	}
                       
                    if ($(event.target).hasClass("fa-arrow-right")){		example.panRight();	console.log('panRight') ;		}
                       
                    if ($(event.target).hasClass("fa-plus")){		example.zoomIn();	console.log('zoomIn') ;		}
                      
                    if ($(event.target).hasClass("fa-minus")){		example.zoomOut();	console.log('zoomOut') ;		}
                   
                    if ($(event.target).hasClass("fa-refresh")){		example.reset()	;	console.log('reset') ;	}
                       
                }
            };

              example1= examples[0]
            example2= examples[1]

            $("div#example1 i").click(callback(example1));
            $("div#example2 i").click(callback(example2));
      
        });
    </script>
    <script>

@php


foreach($tableMarioul as $key=>$val){
	
	
		   $valk = 20 - strlen($val[2]);
                                $valk = $valk/4 ;
                                $Naim =  round($valk) ;
								
								 $tt = $val[2].substr(0,19);
								 if(($val[0] == "B1" ) && ($val[1] == 4 )){
									 $nameAff = $tt ;
								 }else{
								 $nameAff = ucwords(strtolower($tt)) ;}
                                for($j=0 ; $j<=$Naim ; $j++){
									$nameAff = '- '.$nameAff ;
                                  /* if($j==0)  $nameAff = '.  '.$nameAff ;
                                   else if($j==$Naim)$nameAff = '  .'.$nameAff ;
                                   else  $nameAff = '.'.$nameAff ;*/
                                }
                                for($j=0 ; $j<=$Naim ; $j++){
									$nameAff =  $nameAff.' -' ;
                                  /*  if($j==0)  $nameAff = $nameAff.'.' ;
                                   else if($j==$Naim)$nameAff = $nameAff.'  .' ;
                                   else  $nameAff =  $nameAff.'.' ;*/
                                }
	
    echo  '$("#Bande_'.$val[0].' g[data-name='.$val[1].'] text").html("'.htmlentities($nameAff, ENT_QUOTES, "UTF-8").'")   ; ';
	echo  '$("#'.$val[0].' g[data-name='.$val[1].'] text").html("'.htmlentities($nameAff, ENT_QUOTES, "UTF-8").'")   ; ';
	 echo  '$("#Bande_'.$val[0].' text[data-name='.$val[1].'] ").html("'.htmlentities($nameAff, ENT_QUOTES, "UTF-8").'")   ; ';
	 if($val[0] == 8 ){  echo  '$("#Bande_'.$val[0].' text").addClass("band8")   ; ';}
	 if($val[0] == 9 ){  echo  '$("#Bande_'.$val[0].' text").addClass("band9")   ; ';}
	  if($val[0] == 10 ){  echo  '$("#Bande_'.$val[0].' text").addClass("band10")   ; ';}
	  if($val[0] == 4 )
		
}
  echo  '$("#8 g[data-name=1] text").css("fill","#ffffff")  ; ';
	   echo  '$("#Bande_8 text[data-name=1] ").css("fill","#ffffff")  ; ';
if(isset($product)){
	
	 echo  '$("#Bande_'.$product->zone.' g[data-name='.$product->number.'] text").css("fill","#ffffff")  ; ';
	  echo  '$("#'.$product->zone.' g[data-name='.$product->number.'] text").css("fill","#ffffff")  ; ';
	   echo  '$("#Bande_'.$product->zone.' text[data-name='.$product->number.'] ").css("fill","#ffffff")  ; ';
	 
}
@endphp

        var m =1;
        $( ".menu" ).click(function(){
       m++;
       if( m % 2 == 0 ){
        $("header").removeClass('header');
        $(".nav-menu").hide();
        
       }
       else{
        $("header").addClass('header');
        
        $(".nav-menu").show();
        $("header").css('index','10000')
        $("header").css('height','40vh')
        
       }
    });


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