<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css"  />
    <link rel="stylesheet" href="{{ asset('profilecss/style.css')}}" />
    <title>Qrco</title>
    <style>
      input {
        width: 245px;
      }
    </style>
  </head>
  <body>
    <div class="page">
      <form method="POST" action="{{ url('creation') }}"   enctype="multipart/form-data">
        {{ csrf_field() }}
      <div
        class="vcard-header gradient-red-orange-bg"
        style="padding-top: 30px !important; padding-bottom: 20px"
      >
        <div class="vcard-header-wrapper">
          <div class="vcard-top-info">
            <h4 class="top"></h4>
            <div style="display:grid" class="text-center">
                    <label for="image">
                      <div class="img" id="profile-img" style="background: url({{Auth::user()->candidat->img}} )"></div> 
                    </label>
                    <input type="file" name="image"  id="image" style="display: none;" onchange="readURL(this);">
					<img src="{{ asset('img/spinner.gif')}}" alt="" style="display:none;width:75px" class="spinner">
                  <input type="hidden" name="imgName" id="imgName" value="{{ Auth::user()->candidat->img }}"  >
			
                     <div class="img-error">  
						@if ($errors->has('imgName'))
							<span class="text-danger text-center">{{ $errors->first('imgName') }}</span>
						@endif
                     </div>
                </div>
           
            <input
              type="text"
              value="{{Auth::user()->candidat->prenom}}"
              name="name"
              style="margin-top: 15px"
            />
            <h6 class="">
              <input type="text" value="{{Auth::user()->candidat->function}}" name="job" />
            </h6>
          </div>
        </div>
      </div>
      <div class="vcard-body-wrapper">
        <div class="vcard-body">
          <div id="dvcard-details">
            <div class="vcard-row">
              <i class="fas fa-phone-alt"></i>
              <h4>
                <input type="text" value="{{Auth::user()->candidat->telephone}}" name="phone" class="" />
              </h4>
              <small>Mobile</small>
            </div>
            <div class="vcard-separator"></div>
            <div class="vcard-row">
              <i class="fas fa-paper-plane"></i>
              <h4>
                <input
                  type="text"
                  value="{{Auth::user()->candidat->email}}"
                  name="email"
                  class=""
                />
              </h4>
              <small>Email</small>
            </div>

            <div class="vcard-separator"></div>
            <div class="vcard-row">
              <i class="fas fa-suitcase"></i>
              <h4 data-test="company-name" class="ng-binding">
                <input
                  type="text"
                  value="{{Auth::user()->candidat->job_location}}"
                  name="address_job"
                  class=""
                />
              </h4>
              <small>job location</small>
            </div>
            <div class="vcard-separator"></div>
            <div class="vcard-row">
              <label></label>
              <i class="fas fa-map-marker-alt"></i>
              <h4 class="ng-binding"></h4>
              <h4 class="ng-binding">
                <input
                  type="text"
                  value="{{Auth::user()->candidat->adresse}}"
                  name="adresse"
                  class=""
                />
              </h4>
              <small>Address </small>
            </div>
            <div class="vcard-separator"></div>
            <div class="vcard-social" style="margin-bottom: 20px"></div>
            <div class="vcard-row">
              <div class="">
                <i class="fas fa-hashtag"></i>
                <div class="iconFab">
                  <i
                    class="fab fa-linkedin iconFab"
                    style="left: 52px; color: #0072b1"
                  ></i>
                  <input
                    type="text"
                    value="{{Auth::user()->candidat->url_linkedin}}"
                    name="url_linkedin"
                    style="display: block"
                  />
                  <i
                    class="fab fa-facebook-square iconFab"
                    style="left: 122px; color: #4267b2"
                  ></i>
                  <input
                    type="text"
                    value="{{Auth::user()->candidat->url_facebook}}"
                    name="url_facebook"
                    style="display: block"
                  />
                  <i
                    class="fab fa-instagram-square iconFab"
                    style="left: 192px; color: #e1306c"
                  ></i>
                  <input
                    type="text"
                    value="{{Auth::user()->candidat->url_instagram}}"
                    name="url_instagram"
                    style="display: block"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="vcard-row">
                    <button type="submit"  class="prime"><span> Send </span></button>
              </div>
        </div>
      </div>
      
    </form>
    <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-power-off" style="color: white; font-size: 24px"></i>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
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
                    console.log(e.target.result)
                      $('#profile-img').css('background', 'url("'+e.target.result+'")');
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

   
</script>

  </body>
</html>
