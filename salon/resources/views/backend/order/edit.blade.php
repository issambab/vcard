@extends('layouts.back')

@section('cssSup')
    <style >
        .btn-pos{
            position: absolute;
            right: 20px;
            top: 20px;
        }
        .btn-pos-dn{
            position: absolute;
            right: 80px;
            top: 20px;
        }
        .active{
          background-color :#01072f !important
        }
        .error{
          background-color: #fce4e4;
          border: 1px solid #cc0033;
          outline: none;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
      
        <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Information sur le client</h4>
                
                      <div class="form-group">
                        <label for="exampleInputName1"> Nom & Prénom </label>
                        <input type="text" class="form-control"  placeholder="Nom & Prénom" value="{{$client->name}}" id="name" name="name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email </label>
                        <input type="text" class="form-control" placeholder="Email" id="email" value="{{$client->email}}" name="email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPhone">Téléphone</label>
                        <input type="text" class="form-control"  placeholder="Téléphone" id="phone" value="{{$client->phone}}"   name="phone">
                      </div>
                                      
                  </div>
                </div>
              </div>
        </div>
<div class="row">

        <div class="col-md-12 grid-margin stretch-card">

                <div class="card">
            
     
                  <div class="card-body b1" >
                    <h4 class="card-title">place Reserver sur le t-shirt </h4>
                  <!--  <p class="card-description"> Basic form elements </p>-->
                    <div >

                    

                    <div class="form-group row">
                      <div class="col-12">
                        <div class="row">
                          
                            <div class="col-4">Text</div>
                            <div class="col-4">Zone</div>
                            <div class="col-4">Num</div>

                          </div>
                         </div>
                    </div>
                      
                    <div class="form-group">
	                     <div class="col-12">

		                    <div  class="row" >
		                    	 @foreach ($produit  as $produits )
		                    	    <div class="col-4"> {{$produits->text_name }} </div>
		                            <div class="col-4">{{$produits->zone }}     </div>
		                            <div class="col-4"> {{$produits->number }}  </div>    
		                        @endforeach
		                   </div>

		                  </div>    
                    </div>

                    </div>
                    </div>
                </div>
         </div> 
        </div >
        <div class="row">
         <div class="col-md-12 grid-margin stretch-card">
                <div class="card ">
          
       
                  <div class="card-body">
                    <h4 class="card-title">Preuve de paiement</h4>
                  <!--  <p class="card-description"> Basic form elements </p>-->
                    <div >
                           
                      <div class="form-group row">
                          <div class="col-12">
                            <div class="row">
                              
                                <div class="col-4">N Ref</div>
                                <div class="col-4">Date</div>
                                <div class="col-4">Image</div>

                              </div>
                             </div>
                        </div>
                          
                      <div class="form-group">
                           <div class="col-12">

                            <div  class="row" >
                               @foreach ($buys  as $buy )
                                  <div class="col-4"> {{$buy->reference }}   </div>
                                    <div class="col-4">{{$buy->date }}         </div>
                                    <div class="col-4"><img src="{{asset('images/')}}/{{$buy->image}}" width="200px" />      </div>    
                                @endforeach
                           </div>

                          </div>    
                        </div>
               

                    </div>
                 
                    </div>
                </div>
         </div>

          <div class="col-md-12 grid-margin stretch-card">
                <div class="card ">
          
       
                  <div class="card-body">
                    <h4 class="card-title">Etat de command</h4>
                      <!--  <p class="card-description"> Basic form elements </p>-->
                        <div >
                               
                          <div class="form-group row">
                              <div class="col-12">
                                <div class="row">
                                  
                                    <div class="col-4">Etat</div>
                                    <div class="col-4">
                                        @if($order->status==0)
                                            <h4><span class="badge badge-danger">En attente</span></h4>
                                        @endif
                                        @if($order->status==1)
                                        <h4><span class="badge badge-success">valider</span>
                                        @endif
                                    </div>
                                    <div class="col-4">{{$diff_in_hours}} H</div>

                                  </div>
                                 </div>
                            </div>
                        </div>
                 
                    </div>
                </div>
         </div>


         <div class="col-md-12 grid-margin stretch-card">
		   @if($order->status==0)
                                   <button id='Envoyer'  class="btn btn-success mr-2 Envoyer">Valider</button>
                                        @endif
           
            <button id='Supprime'  class="btn btn-danger mr-2 Supprime">Supprime</button>
            
            <a class="btn btn-light" href="{{url('order')}}">Annuler</a>
        </div>
    </div>  

    </div>



@endsection

@section('jsSup')

    <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });


$(".Envoyer").click(function(event) {

 $(".Envoyer").hide()
     event.preventDefault();

   isBoss =  confirm("VOUS CONFIRMEZ LA COMMANDE !!!!");
    
    
              if(isBoss == true ){
            

                          $.ajax({
                          type:'POST',
                          headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                          url:"{{ route('ajaxRequest.updateetat') }}",
                          data:{id:{{$order->id}} },
                          success:function(data){

                              if(data.success){

                                       alert('votre commande et valide ');
                                       location.reload();


                              }else{
                                      alert('erreur  ');
                              }
                       
                            
                          }
                        });


              }
         
        })

$("#Supprime").click(function(event) {

 $("#Supprime").hide()
     event.preventDefault();

  isBoss = confirm("VOUS VOULEZ CONFIRMEZ LA SUUPRIME CETTE COMMANDE!!!!");

      if(isBoss == true ){
    
                  $.ajax({
                  type:'POST',
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                  url:"{{ route('ajaxRequest.deletedorder') }}",
                  data:{id:{{$order->id}} },
                  success:function(data){
          
                      if(data.success){

                               alert('votre commande Supprime ');
                               location.href = '{{url('order')}}' ;

                      }else{
                              alert('erreur  ');
                      }
                    
                  }
                });

         }
  })               













    </script>
@endsection