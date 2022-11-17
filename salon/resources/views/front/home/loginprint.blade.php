<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Site Officiel du CA | Club Africain</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css"  />
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
    <div class="container justify-content-center d-flex flex-column align-items-center">
        <div style="height: 10vh;" class="my-4"  >
        </div>

        <div style="height: 40vh;background-color: #f5f5f5" class="text-center" >
      
            <img src="{{ asset('img/logo.png')}}" alt="" class="my-2 " style="width: 150px;">
            <div class="d-flex flex-column align-items-center mt-2" style="padding: 0 20px;background-color: #f5f5f5;" >
                <form action="{{url('frontlogin')}}" method="POST" class="w-100">
                    @csrf
                    <div>
                       <label for="lname" class="text-nurom">Login</label>
                        <input type="email" name="email" id="" class="form-control "  placeholder="Email">
                    </div>

                    <div>
                    <label for="lname" class="text-nurom">Mot de passe</label>
                        <input type="password" name="password" id="" class="form-control " placeholder="Mot de passe" class="mt-4">
                    </div>
                        @if(Session::has('message'))
                            <p class="alert alert-danger  mt-5">{{ Session::get('message') }}</p>
                            @endif
                    <div   style="background-color: #f5f5f5;padding: 0 50px;"  >
                        <label for="rememberme" class="check mr-2">
                            <input name="rememberme" type="checkbox" id="rememberme" >
                            <span class="text-dark">Se souvenir de moi</span>
                            <span class="checkmark"></span>    
                        </label>
                        <button href="#"   class=" btn btn-red-submit my-4"  style="width: 150px;" type="submit">
                            Se connecter
                        </button>
                    </div>
                    
                </form>
                
            </div>
           
        </div>
		
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" ></script>
</body>
</html>