
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CA</title>
 
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/ionicons/dist/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.addons.css')}}">
   
    <link rel="stylesheet" href="{{asset('assets/css/shared/style.cs')}}s">
  
   <!-- <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />-->
    <style>
      .btn-ca {
    color: #fff;
    background-color: #f32121;
    border-color: #f32121;
}
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                <form method="POST" action="{{ route('login') }}">
                @csrf
                  <div class="form-group">
                    <label class="label">Email</label>
                    <div class="input-group">
                      <input type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" name="email">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="*********" name="password">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-ca submit-btn btn-block" type="submit">Login</button>
                  </div>
                 
                </form>
              </div>
             
              <p class="footer-text text-center mt-3">copyright © 2021 Atelier216. All rights reserved.</p>
              
            </div>
          </div>
        </div>
       
      </div>
     
    </div>

    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('/assets/vendors/js/vendor.bundle.addons.js')}}"></script>
   
    <script src="{{asset('assets/js/shared/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/shared/misc.js')}}"></script>
    
  </body>
</html>

