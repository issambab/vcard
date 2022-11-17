 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="{{asset('assets/images/faces/face8.jpg')}}" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{ Auth::user()->name }}</p>
                  <p class="designation">Administrator</p>
                </div>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{url('dashboard')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item {{ request()->route()->uri=='zones'  ?'link-active':''}} " >
              <a class="nav-link" href="{{url('zones')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Zones</span>
              </a>
            </li>
            <li class="nav-item {{ request()->route()->uri=='clients'  ?'link-active':''}} {{ request()->route()->uri=='clients/list'  ?'link-active':''}}">
              <a class="nav-link" data-toggle="collapse" href="#ui-su" aria-expanded="false" aria-controls="ui-su" >
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Clients</span>
                <i class="menu-arrow"></i>
              </a>
                <div class="collapse" id="ui-su">
                <ul class="nav flex-column sub-menu">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ request()->route()->uri=='clients'  ?'':''}}">
                      <a class="nav-link" href="{{url('/clients')}}">client with order</a>
                    </li>
                    <li class="nav-item {{ request()->route()->uri=='order'  ?'':''}}">
                      <a class="nav-link" href="{{url('/clients/list')}}">list clients</a>
                    </li>
                  </ul>
                </ul>
              </div>
            </li>
            <li class="nav-item {{ request()->route()->uri=='order'  ?'link-active':''}} {{ request()->route()->uri=='search'  ?'link-active':''}} {{ request()->route()->uri=='order/create'  ?'link-active':''}}">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Orders</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <ul class="nav flex-column sub-menu">
                   <!-- <li class="nav-item {{ request()->route()->uri=='order/create'  ?'':''}}">
                      <a class="nav-link" href="{{url('/order/create')}}">create order</a>
                    </li>-->
					
					 <li class="nav-item {{ request()->route()->uri=='order'  ?'':''}} ">
                      <a class="nav-link" href="{{url('/ordernovalide')}}">list orders En attente</a>
                    </li>
					
                    <li class="nav-item {{ request()->route()->uri=='order'  ?'':''}} ">
                      <a class="nav-link" href="{{url('/order')}}">list orders</a>
                    </li>
					
					  <li class="nav-item {{ request()->route()->uri=='search'  ?'':''}}">
                      <a class="nav-link" href="{{url('/search')}}">search</a>
                    </li>
				
                  </ul>
                </ul>
              </div>
            </li>
          
          
            
           
          </ul>
        </nav>
        <!-- partial -->