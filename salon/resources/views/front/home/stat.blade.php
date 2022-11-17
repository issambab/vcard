<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png')}}"  />   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <title>fairsj</title>
    <style>
    .container{
    margin: 4.5% 4.5%;
    max-width: 91vw;
      }


    </style>
</head>

<body>
    <div class="container bg-white">
	     <div class="row " >
	       <div class="col-md-4 justify-content-center d-flex align-items-center ">
                <img src="{{ asset('img/logo.svg')}}" class="" style="max-width:190px;" alt="">
            </div>
			<div  class="col-md-4 justify-content-center d-flex align-items-center my-5">
			
			    <span class=" my-2"  style="    font-size: x-large;    font-weight: bold;">
                   Total: 
                </span>
				 <span class=" text-uppercase pl-4" style="line-height: 0.4;    font-size: x-large; font-weight: bold;  color: green;">
                    {{$total}}
					
                </span>
			</div>  
    
	     </div>
        <div class="row " >
     
	@foreach($tabresult  as $key=>$val)
            <div class="col-md-4 justify-content-center d-flex align-items-center flex-column my-5">
                
                <span class=" my-2"  style="    font-size: x-large;    font-weight: bold;">
                    {{$tabEcol[$key]}}
                </span>
                <span class=" text-uppercase" style="line-height: 0.4;  font-weight: bold;  color: green;">
                {{$val}}
                </span>
            </div>
	@endforeach		
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cropper/1.0.1/jquery-cropper.min.js" ></script>

</body>
</html>