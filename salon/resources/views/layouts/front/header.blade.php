
@if(Auth::user()->role == 0 )
<header class="justify-content-between d-flex my-2 py-2" style="border-bottom: 5px solid #766262;">
	 <div class="text-dark"  ><h2>{{ Auth::user()->name }} - {{ Auth::user()->boutique->gouv }}</h2> </div>

	       <div class="" >
	        <span class="text-dark" style="font-size: 1.25rem;">{{ Auth::user()->boutique->ref_boutique }} </span> 
	       
               <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     	 <img src="{{ asset('images/user.png')}}" style="width: 30px;background-color: #7d7d7d;" class="mx-4" alt="">
                                                     </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>


	        <img src="{{ asset('images/salon.png')}}" style="width: 45px;" alt="">
	       </div>    
</header>
@else
<header class="justify-content-between d-flex my-2 py-2" style="border-bottom: 5px solid #766262;">
	 <div class="text-dark"  ><h2>{{ Auth::user()->name }}</h2> </div>

	       <div class="" >
	        <span class="text-dark" style="font-size: 1.25rem;">{{ Auth::user()->imprimeur->name }}</span> 
	       
               <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     	 <img src="{{ asset('images/user.png')}}" style="width: 30px;background-color: #7d7d7d;" class="mx-4" alt="">
                                                     </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>


	        <img src="{{ asset('images/salon.png')}}" style="width: 45px;" alt="">
	       </div>    
</header>
@endif