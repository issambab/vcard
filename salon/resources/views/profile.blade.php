<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <link

      rel="stylesheet"

      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"

      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"

      crossorigin="anonymous"

    />


    <link rel="stylesheet" href="{{ asset('profilecss/style.css')}}" />

    <title>Fairsj</title>

  </head>

  <body>

    <div class="page">

      <div class="vcard-header gradient-red-orange-bg">
        <div class="logo-header">
         <img src="{{ asset('img/logo.png')}}" alt="" style="width:150px">
        </div>
        <div class="vcard-header-wrapper">

          <div class="vcard-top-info">

            <h4 class="top"></h4>

            <div class="img" style="background:url({{ asset('img/user.png')}}), url({{ asset($user->img)}}) ;background-size:108%,100%  !important;"></div>

            <h2 class="name dynamicTextColor ng-binding">{{$user->nom}} </h2>

            <h6 class="title dynamicTextColor ng-binding">

            {{$user->function}}  

            </h6>

          </div>

          <div class="vcard-functions">

            <div class="vcard-functions-wrapper">

              <a

                href="tel:{{$user->telephone}}"

                style="border-right: 1px solid rgba(255, 255, 255, 0.15)"

              >

                <i class="fas fa-phone-alt dynamicTextColor"></i>

                <small class="dynamicTextColor">Call</small>

              </a>



              <a

                href="mailto:{{$user->email}}?subject=From my vCard&amp;body="

                target="_newEmail"

              >

                <i class="fas fa-paper-plane dynamicTextColor"></i>

                <small class="dynamicTextColor">Email</small>

              </a>

            </div>

          </div>

        </div>

      </div>

      <div class="vcard-body-wrapper">

        <div class="vcard-body">

          <div id="dvcard-details">

            <div class="vcard-row">

              <i class="fas fa-phone-alt"></i>

              <h4>

                <a href="tel:456-234-4567" class="ng-binding">{{$user->telephone}}</a>

              </h4>

              <small>Mobile</small>

            </div>

            <div class="vcard-separator"></div>

            <div class="vcard-row">

              <i class="fas fa-paper-plane"></i>

              <h4>

                <a

                  href="mailto:{{$user->email}}"

                  target="_newLink"

                  class="ng-binding"

                  >{{$user->email}}</a

                >

              </h4>

              <small>Email</small>

            </div>


            @if ($user->function != null)
            <div class="vcard-separator"></div>
           
            <div class="vcard-row">

              <i class="fas fa-suitcase"></i>

              <h4 data-test="company-name" class="ng-binding">

              {{$user->adresse}}

              </h4>

              <small class="ng-binding">      {{$user->function}}  </small>

            </div>
            @endif
            @if ($user->adresse != null)
            <div class="vcard-separator"></div>
            
            
            <div class="vcard-row">

              <label></label>

              <i class="fas fa-map-marker-alt"></i>

              <h4 class="ng-binding"></h4>

              <h4 class="ng-binding">   {{$user->adresse}}</h4>

            </div>
            @endif


            @if (($user->url_linkedin != null) || ($user->url_facebook != null) || ($user->url_instagram != null) )

            <div class="vcard-separator"></div>

            <div class="vcard-social" style="margin-bottom: 20px"></div>

            <div class="vcard-row">

              <div class="socialMedia-container">

                <i class="fas fa-hashtag"></i>

                <div class="icons">

                  @if($user->url_linkedin != null)

                <a href="{{$user->url_linkedin}}">  <i

                    class="fab fa-linkedin-in"

                    style="left: 52px;
    color: white;
    font-size: 14px;
    background: #0072b1;
    padding: 10px;
    border-radius: 50%;"

                  ></i></a>

                  @endif



                  @if($user->url_facebook != null)

                  <a href="{{$user->url_facebook}}"> 

                  <i

                    class="fab fa-facebook fab-3x"

                    style="left: 122px; color: #4267b2; font-size: 34px"

                  ></i></a>

                  @endif



                  @if($user->url_instagram != null)

                  <a href="{{$user->url_instagram}}"> 

                  <i

                    class="fab fa-instagram"

                    style=" color: white;left:192px;
    font-size: 16px;
    background: #e1306c;
    padding: 10px;
    border-radius: 50%;" 

                  ></i></a>

                  @endif

                </div>

              </div>

            </div>

            @endif 

          </div>

              <div class="vcard-row icons">

                    <a href="{{url('/vcards/')}}/{{$user->nsponso}}"  class="prime "><span> Vcard </span><i class="fas fa-download"  style="color: white; font-size: 14px;position:relative;top:0;left:10px;"></i></a>

              </div>

        </div>



     

      </div>

    </div>

  </body>

</html>

