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
      <div
        class="vcard-header gradient-red-orange-bg"
        style="padding-top: 30px !important; padding-bottom: 20px"
      >
        <div class="vcard-header-wrapper">
          <div class="vcard-top-info">
            <h4 class="top"></h4>
            <div class="img" style="background: url({{Auth::user()->candidat->img}} )"></div>
            <input
              type="text"
              value="Scott Reed"
              name="name"
              style="margin-top: 15px"
            />
            <h6 class="">
              <input type="text" value="{{Auth::user()->candidat->nom}} {{Auth::user()->candidat->prenom}}" name="job" />
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
                  value="{{Auth::user()->candidat->function}}"
                  name="address_job"
                  class=""
                />
              </h4>
              <small>Address job</small>
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
                    name="url_linkedin"
                    style="display: block"
                  />
                  <i
                    class="fab fa-instagram-square iconFab"
                    style="left: 192px; color: #e1306c"
                  ></i>
                  <input
                    type="text"
                    value="{{Auth::user()->candidat->url_instagram}}"
                    name="url_linkedin"
                    style="display: block"
                  />
                </div>
              </div>
            </div>


            <div class="vcard-row">
                   <a href="{{url('/vcardsProfile')}} " >Download </a>
             </div>

          

          </div>
        </div>
      </div>

     <a href="{{url('/vcards')}} " >Download </a>
      <div class="logout">
        <i class="fas fa-power-off" style="color: white; font-size: 24px"></i>
      </div>
    </div>
  </body>
</html>
