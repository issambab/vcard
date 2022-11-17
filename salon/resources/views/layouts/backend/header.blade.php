 <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">T-shirt</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
           <img src="{{asset('assets/images/maillot.jpg')}}" style="width:100%;" alt="">
      
       
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
 <!-- partial:partials/_navbar.html -->
 <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="#">
            <img src="{{asset('assets/images/logo.png')}}" alt="logo" /> </a>
          <a class="navbar-brand brand-logo-mini" href="#">
            <img src="{{asset('assets/images/logo.png')}}" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav ml-auto">
            <li>
           <a href="#" data-toggle="modal"  data-target="#exampleModal1" > <img src="{{asset('assets/images/soccer.png')}}" style="width:40px;" alt=""></a>
            </li>
             <li>
               <a href="{{asset('exel/Placement_Numero_des_bandes.xlsx')}}" download> 

                   
                <img src="{{asset('assets/images/phoca-download-r.svg')}}" style="width:40px;" alt="W3Schools"></a>   
             </li>
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="{{asset('assets/images/faces/face8.jpg')}}" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="{{asset('assets/images/faces/face8.jpg')}}" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                  <p class="font-weight-light text-muted mb-0">Administrator</p>
                </div>
                <a class="dropdown-item">My Profile <span class="badge badge-pill badge-danger">1</span><i class="dropdown-item-icon ti-dashboard"></i></a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- Modal -->

      <!-- partial -->
  