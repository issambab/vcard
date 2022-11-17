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
        <div class="row line-one" >
            <div class="col-md-4 justify-content-center d-flex align-items-center flex-column">
                <img src="{{ asset('img/logo.svg')}}" class="" style="max-width:190px;" alt="">
            </div>
            <div class="col-md-4 justify-content-center d-flex align-items-center flex-column">
                <img src="{{ asset('img/visiteurs.svg')}}" class="w-25" alt="">
                <span class="text-nurom text-red font-size-42 mt-2" id="visiteur">
				{{$visiteur}}
                </span>
                <span class="text-nurom font-size-24 text-uppercase" style="line-height: 0.4;">
                    visiteurs   
                </span>
            </div>
            <div class="col-md-4 justify-content-center d-flex align-items-center flex-column">
                <img src="{{ asset('img/entretiens.svg')}}" class="w-25" alt="">
                <span class="text-nurom text-red font-size-42 mt-2" id="entretien">
                    {{$entretien}}
                </span>
                <span class="text-nurom font-size-24 text-uppercase" style="line-height: 0.4;">
                    entretiens   
                </span>
            </div>
        </div>
        <div class="row line-two" >
            <div class="col-md-4 justify-content-center d-flex align-items-center flex-column">
                <img src="{{ asset('img/cv.svg')}}" class="w-25" alt="">
                <span class="text-nurom text-red font-size-42 mt-2 " id="cvdepo">
                     {{$cvdepo}}
                </span>
                <span class="text-nurom font-size-24 text-uppercase" style="line-height: 0.4;">
                    cv Collectés   
                </span>
            </div>
            <div class="col-md-4 justify-content-center d-flex align-items-center flex-column">
                <img src="{{ asset('img/pre.svg')}}" class="w-25" alt="">
                <span class="text-nurom text-red font-size-42 mt-2" id="preselection">
                      {{$preselection}}
                </span>
                <span class="text-nurom font-size-24 text-uppercase" style="line-height: 0.4;">
                    préselections   
                </span>
            </div>
            <div class="col-md-4 justify-content-center d-flex align-items-center flex-column">
                <img src="{{ asset('img/coaching.png')}}" class="w-25" alt="">
                <span class="text-nurom text-red font-size-42 mt-2 " id="coachings">
                      {{$coachings}}
                </span>
                <span class="text-nurom font-size-24 text-uppercase" style="line-height: 0.4;">
                    in coaching   
                </span>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cropper/1.0.1/jquery-cropper.min.js" ></script>
	
	<script>

$(document).ready(function(){
	setInterval(function(){ 		
	var url="{{ route('GetInfoSalon') }}";
	var postData=new FormData();
    $.ajax({
    headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
    async:true,
    type:"post",
    contentType:false,
    url:url,
    data:postData,
    processData:false,
    success:function(data){
        if(data.success){
			
				console.log(data.visiteur);
			$("#visiteur").html(data.visiteur);
			$("#entretien").html(data.entretien);
			$("#cvdepo").html(data.cvdepo);
			$("#preselection").html(data.preselection);
			$("#coachings").html(data.coachings);
						
                }else{
					console.log(data.errors);
                }
        
          
     },
        error: function(e) {
			const obj = JSON.parse(e.responseText);
			console.log(obj.errors);
			
        }
            

    }); }, 5000);
	

	
});
   	
	</script>
	
<!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-5FXDFSK');</script>

<!-- End Google Tag Manager -->	
</body>
</html>