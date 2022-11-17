@extends('layouts.back')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">

		
		
            <div class="card">
			
			<form  method="post" action=""  enctype="multipart/form-data">
			<div class="card-body b1" >
                    <h4 class="card-title">Rechercher </h4>
                  <!--  <p class="card-description"> Basic form elements </p>-->
						<div >
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
								<div class="form-group">
									<label for="exampleTextarea1">Email</label>
								    <input type="text" class="form-control"  id="email"  placeholder="email"   name="email">
								</div>
								<div class="form-group">
								<label for="exampleInputRef"> Nom & Prénom </label>
								<input type="text" class="form-control" id="name" placeholder="Nom & Prénom" name="name">
							  </div>
								  <div class="col-md-12 grid-margin stretch-card">
										<button type="submit" id='Envoyer'  class="btn btn-success mr-2 Envoyer">Envoyer</button>
										<a class="btn btn-light" href="{{url('order')}}">Annuler</a>
									</div>
		 
						</div>
             </div>
			 </form>
			
                    <div class="card-body"style="overflow: auto;" >
                        <h4 class="card-title">Liste Commande</h4>
                        <table class="table">
                          <thead>
                            <tr>
                              <th>N°</th>
                              <th>Nom & prenom</th>
                              <th>Télephone</th>
							 
                              <th>id order / Text /Zone(s) /Num(s) /N°sponso /Montant/N° Ref/statut</th>
                              
                            </tr>
                          </thead>
                      <tbody>
                      @foreach($clients as $key=>$client)
                       @if(isset($client->orders[0]->products )) 
                        <tr>
                          <td>{{$key + $clients->firstItem()}}</td>
                          <td>{{$client->name}}</td>
                          <td>{{$client->phone}}</td>
						 
                          <td>
                             
                            @foreach($client->orders as $key1=>$order)
                            <div class="border p-3 my-2">
                                @if(isset($order->products )) 
								 <h4 >{{$order->id}}	 </h4 >							
                                @foreach($order->products as $key2=>$product)
                                    <h4 >   <span class="badge badge-primary">{{$product->text_name}}</span> <span  class="badge badge-info"> {{$product->zone}} / {{$product->number}} </span > <span class="badge badge-success">{{$product->nsponso}}</span> <span class="h6">{{$zone[$product->zone][1]}} DT</span> 
                                       
										@foreach($order->buys as $key2=>$buy)
                                           <span  class="badge badge-info"> {{$buy->reference}}  </span >
										@endforeach
										 
									   @if($order->status==0)
                                        <span class="badge badge-danger">En attente</span>
                                        @endif
                                        @if($order->status==1)
                                            <span class="badge badge-success">valider</span>
                                        @endif
                                        
                                    </h4>
                                @endforeach
                                 @endif
                                <a href="#" class="btn btn-primary view my-2" data-toggle="modal" data-name="{{$client->name}}" data-target="#exampleModal" data-ref="@foreach($order->buys as $key=>$buy){{$buy->reference}}@if(count($order->buys)!=$key+1), @endif @endforeach" data-date="@foreach($order->buys as $key=>$buy){{$buy->date}}@if(count($order->buys)!=$key+1),@endif  @endforeach" data-images="@foreach($order->buys as $key=>$buy) {{$buy->image}} @if(count($order->buys)!=$key+1),@endif  @endforeach ">
                            <i class="fa fa-eye"></i>
                          </a>
                          <br/>
                            </div>   
                            @endforeach
                           
                          </td>
                          
                         
                        </tr>
                         @endif
                       @endforeach
                      
                      </tbody>
                    </table>
                    {{-- Pagination --}}
                    showing {{($clients->currentPage()-1)* $clients->perPage()+($clients->total() ? 1:0)}} to {{($clients->currentPage()-1)*$clients->perPage()+count($clients)}}  of  {{$clients->total()}}  Results
                    <div class="d-flex justify-content-end mt-2">
                        {!! $clients->links() !!}
                    </div>
                        
                    </div>
            </div> 
        </div> 
    </div>   
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
@endsection     
@section('jsSup')
<script>

   
   
    $( document ).ready(function() {
        
        $('.view').click(function(){
            $('#exampleModal .modal-body').html('');
            
           ref= $(this).attr('data-ref');
           name= $(this).attr('data-name');
           date= $(this).attr('data-date');
           images= $(this).attr('data-images');
           $('#exampleModal .modal-title').html(name)
           var tabRef = ref.split(",");
            var tabDate = date.split(",");
            var tabImage = images.split(",");
            for (let i in tabRef) {
                $('#exampleModal .modal-body').append('<div class="text-center my-2"><b>Preuve de paiement</b></div>');
                $('#exampleModal .modal-body').append('<img class="w-100" src="images/'+tabImage[i].trim()+'">')
                $('#exampleModal .modal-body').append('<div><hr><b>Reference : </b>'+tabRef[i].trim()+'</div><hr>');
                $('#exampleModal .modal-body').append('<div><b>Date : </b>'+tabDate[i].trim()+'</div>');
            }   
        })
  
      
    })




</script>
@endsection