 @if(Auth::user()->role == 0 )
 <div class="sidebar d-none d-md-block  pl-3" style="padding-top: 10rem;">
            <a href="{{url('creation')}}" class="btn  {{ request()->route()->uri=='creation'  ?'btn-red':'btn-white'}}  my-4" style="width: 150px;" type="submit">
                Créer une Carte 
            </a>
          
            <a href="{{url('listabonne')}}/{{Auth::user()->boutique->id}}" class="btn {{ request()->route()->uri=='listabonne/{id}'  ?'btn-red':'btn-white'}}  my-0" style="width: 150px;"  type="submit" >
                Liste Des cartes
            </a>
        
  </div>
@else 

 <div class="sidebar d-none d-md-block  pl-3" style="padding-top: 1.2rem; background-color: whitesmoke;">
          <div class="passport" style="text-align: center"  >
              <img src="{{ asset('img/logo.png')}}" alt="" style="width: 100px;" class="height-inherit">
          </div>
            <a href="{{url('imprimant')}}" class=" btn {{ request()->route()->uri=='imprimant'  ?'btn-red-submit':'btn-white'}}  mt-4" style="width: 170px;" type="submit">
               Liste des Evenement
            </a>

            <a href="{{url('carteimprimein')}}" class="btn {{ request()->route()->uri=='carteimprimein'  ?'btn-red-submit':'btn-white'}}  my-3" style="width: 170px;"  type="submit" >
              Liste a imprimer
            </a>
          
            <a href="{{url('carteimprime')}}" class=" btn {{ request()->route()->uri=='carteimprime'  ?'btn-red-submit':'btn-white'}}  my-0" style="width: 170px;"  type="submit" >
              Liste Des cartes
            </a>
        
       

            
 </div>       
@endif       

