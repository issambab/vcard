<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css"  />
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>
    <div class="container bg-white mt-5 " >
        <form method="POST" action="{{ url('creation') }}"   enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row align-items-center" style="height: 86vh;">
            <div class="col-md-6 d-flex flex-column py-5 justify-content-between align-items-center" style="background-color: #f5f5f5;height: inherit;">
                <div style="display:grid" class="text-center">
                    <label for="image"><img 				  
					@if (old('imgName') == "" )
				 		 src="{{ asset('img/upload.jpg')}}" 
					@else
						src="{{ asset('upload')}}/{{ old('imgName') }}" 
					@endif  
id="profile-img" alt="" style="max-width: 224px;cursor: pointer;"></label>
                    <input type="file" name="image"  id="image" style="display: none;" onchange="readURL(this);">
					<img src="{{ asset('img/spinner.gif')}}" alt="" style="display:none;width:75px" class="spinner">
                  <input type="hidden" name="imgName" id="imgName" value="{{ old('imgName') }}"  >
			
                     <div class="img-error">  
						@if ($errors->has('imgName'))
							<span class="text-danger text-center">{{ $errors->first('imgName') }}</span>
						@endif
                     </div>
                </div>
                <div>
                    <img src="{{ asset('img/logo.png')}}" alt="" style="max-width: 124px;" onchange="readURL(this);">
					
                    
                </div>
            </div>
            <div class="col-md-6 pt-2" style="background-color: #ffffff;">             
                    <div class="form-row">
                        <div class="input-group col-md-6 ">
                            <div class="form-group w-100">
                                <label for="lname" class="text-nurom">NOM</label>
                                <input type="text" class="form-control "  value="{{ old('lname') }}"  name="lname" id="lname"  placeholder="">
                                @if ($errors->has('lname'))
                                    <span class="text-danger">{{ $errors->first('lname') }}</span>
                                @endif
                                @if (!$errors->has('lname'))
                                    <span class="text-danger" style="visibility: hidden;">validate</span>
                                @endif
                            </div>
                            <div class="form-group w-100">
                                <label for="fname" class="text-nurom">prénom</label>
                                <input type="text" class="form-control " value="{{ old('fname') }}" name="fname" id="fname"  placeholder="">
                                @if ($errors->has('fname'))
                                    <span class="text-danger">{{ $errors->first('fname') }}</span>
                                @endif
                                @if (!$errors->has('fname'))
                                    <span class="text-danger" style="visibility: hidden;">validate</span>
                                @endif
                            </div>
                            <div class="form-group w-100">
                                <label for="place" class="text-nurom">lieu de résidence</label>
                                <input type="text" class="form-control "  value="{{ old('place') }}"  name="place" id="place"  placeholder="">
                                @if ($errors->has('place'))
                                    <span class="text-danger">{{ $errors->first('place') }}</span>
                                @endif
                                @if (!$errors->has('place'))
                                    <span class="text-danger" style="visibility: hidden;">validate</span>
                                @endif
                            </div>
                        </div> 
                        <div class="input-group col-md-6 ">
                            <div class="form-group w-100">
                                <label for="dateofbirth" class="text-nurom">date de naissance</label>
                                <input type="date" class="form-control " value="{{ old('dateofbirth') }}"  name="dateofbirth" id="dateofbirth"  placeholder="">
                                @if ($errors->has('dateofbirth'))
                                    <span class="text-danger">{{ $errors->first('dateofbirth') }}</span>
                                @endif
                                @if (!$errors->has('dateofbirth'))
                                    <span class="text-danger" style="visibility: hidden;">validate</span>
                                @endif
                            </div>
                            <div class="form-group w-100">
                                <label for="phone" class="text-nurom">téléphone</label>
                                <input type="text" class="form-control " value="{{ old('phone') }}" name="phone" id="phone"  placeholder="">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                                @if (!$errors->has('phone'))
                                    <span class="text-danger" style="visibility: hidden;">validate</span>
                                @endif
                            </div>
                            <div class="form-group w-100">
                                <label for="email" class="text-nurom">adresse e-mail</label>
                                <input type="email" class="form-control "  value="{{ old('email') }}" name="email" id="email"  placeholder="">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                @if (!$errors->has('email'))
                                    <span class="text-danger" style="visibility: hidden;">validate</span>
                                @endif
                            </div>
                        </div>
                       
                    </div> 
                    <div class="form-row w-100">
                        <div class="input-group col-md-12 ">
                            <div class="form-group w-100">
                                <label for="ecole" class="text-nurom">Ecole</label>
                                <select class="custom-select" name="ecole" id="ecole">
                                    <option value="" selected>Choisissez ....</option>
                                    <option {{ old('ecole') == "Ecole paramédicale" ? "selected" : "" }}   value="Ecole paramédicale" >Ecole paramédicale</option>
                                    <option {{ old('ecole') == "Ecole Polytechnique" ? "selected" : "" }}  value="Ecole Polytechnique">Ecole Polytechnique </option>
                                    <option {{ old('ecole') == "Ecole d'informatique" ? "selected" : "" }}  value="Ecole d'informatique">Ecole d'informatique</option>
                                    <option {{ old('ecole') == "Ecole de droit" ? "selected" : "" }}  value="Ecole de droit">Ecole de droit</option>
                                    <option {{ old('ecole') == "Business School" ? "selected" : "" }}  value="Business School">Business School</option>
                                    <option {{ old('ecole') == "Ecole de Communication" ? "selected" : "" }}  value="Ecole de Communicati">Ecole de Communication</option>
                                    <option {{ old('ecole') == "IMSET" ? "selected" : "" }}  value="IMSET">IMSET</option>
                                    <option {{ old('ecole') == "AAC" ? "selected" : "" }}  value="AAC">AAC</option>
                                </select>
                                @if ($errors->has('ecole'))
                                    <span class="text-danger">{{ $errors->first('ecole') }}</span>
                                @endif
                                @if (!$errors->has('ecole'))
                                    <span class="text-danger" style="visibility: hidden;">validate</span>
                                @endif 
                            </div>
                        </div>
                        
                    </div>   
                    <div class="form-row w-100">
                        <div class="input-group col-md-6 mb-3">
                            <div class="form-group w-100">
                                <label for="name" class="text-nurom">code étudiant</label>
                                <input type="text" class="form-control w-100" value="{{ old('code_etudiant') }}" name="code_etudiant"  id="code_etudiant"  placeholder="">
                                @if ($errors->has('code_etudiant'))
                                    <span class="text-danger">{{ $errors->first('code_etudiant') }}</span>
                                @endif
                                @if (!$errors->has('code_etudiant'))
                                    <span class="text-danger" style="visibility: hidden;">validate</span>
                                @endif 
                            </div>
                        </div>
                        <div class="input-group col-md-6 mb-3 align-items-center">
                            <button class=" btn btn-red-submit" style="margin-top:1.8rem">valider</button> 
                            @if ($errors->has('code_etudiant'))
                                    <span class="text-danger" style="visibility: hidden;">validate</span>
                                @endif   
                            @if (!$errors->has('code_etudiant'))
                                    <span class="text-danger" style="visibility: hidden;">validate</span>
                            @endif                       
                        </div>   
                    </div>
                    
            </div>
        </div>
        </form> 
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cropper/1.0.1/jquery-cropper.min.js" ></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" ></script>

<script>
	function readURL(input) {


var postData=new FormData();
    postData.append('file',input.files[0]);
    postData.append('_token',"{{ csrf_token() }}");
	var url="{{ route('Request.ImageFileUpload') }}";

    $('.spinner').show() ;
    $('#profile-img').hide();
    $('.confirm').hide() ;
    
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
                var reader = new FileReader();
                  reader.onload = function (e) {
                      $('#profile-img').attr('src', e.target.result);
                      $('#profile-img').show();
                  }
                  reader.readAsDataURL(input.files[0]);
                 $("#imgName").attr('value',data.img);
                 $('.spinner').hide() ;
                }else{
					console.log(data.errors);
                    $('#profile-img').addClass('error');
                    $('.spinner').hide() ;
                }
        
    $('.confirm').show() ;           
     },
        error: function(e) {
		
			const obj = JSON.parse(e.responseText);
			console.log(obj.errors.file[1]);
			
			$('.img-error').html( '<span class="text-danger text-center">'+obj.errors.file[1]+'</span>');
			$("#imgName").attr('value','');
            $('#profile-img').addClass('error');
			$('#profile-img').show();
            $('.confirm').show() ; 
            $('.spinner').hide() ;  
        }
            

    });


}    

$(document).ready(function(){

        @if(session()->has('successCreate'))
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 6000
                        };
                        toastr.success( 'le candidat a étè bien enrgistre !!','Creation'  );
                    }, 1000);
                @endif  
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