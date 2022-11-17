@extends('layouts.back')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                    <div class="card-body" style="overflow: auto;">
                        <h4 class="card-title">Liste Commande</h4>
                
                        <table class="table">
                          <thead>
                            <tr>
                           <!--   <th>N°</th>-->
							  <th>N° order</th>
                              <th>Nom & prenom</th>
							  <th>Email</th>
                              <th>Télephone</th>
                              <th>Text /Zone(s) /Num(s) /N°sponso</th>
                              <th>Montant</th>
                              <th>Statut</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                      <tbody>
                      @foreach($orders as $key=>$order )
                        <tr>
                         <!-- <td>{{$key + $orders->firstItem()}}</td>-->
						   <td>{{$order->id}}</td>
                          <td>{{$order->client->name}}</td>
						   <td>{{$order->client->email}}</td>
                          <td>{{$order->client->phone}}</td>
                          <td>
                            @foreach($order->products as $key=>$product)
                                <h4> <span class="badge badge-primary">{{$product->text_name}}</span> <span  class="badge badge-info"> {{$product->zone}} / {{$product->number}} </span > <span class="badge badge-success">{{$product->nsponso}}</span> <span class="h6">{{$zone[$product->zone][1]}} DT</span> </h4>
                            @endforeach
                          </td>
                          <td>
                          @php
                            $amount=0;
                          @endphp
                          @foreach($order->products as $key=>$product)
                                @php
                                $amount= $amount+$zone[$product->zone][1]
                                @endphp
                            @endforeach
                            {{$amount}} DT
                          </td>
                          <td>
                            @if($order->status==0)
                                <h4><span class="badge badge-danger">En attente</span></h4>
                            @endif
                            @if($order->status==1)
                            <h4><span class="badge badge-success">valider</span>
                            @endif
                            
                          </td>
                          <td>
                          <a href="#" class="btn btn-primary view" data-toggle="modal" data-name="{{$order->client->name}}" data-target="#exampleModal" data-ref="@foreach($order->buys as $key=>$buy){{$buy->reference}}@if(count($order->buys)!=$key+1), @endif @endforeach" data-date="@foreach($order->buys as $key=>$buy){{$buy->date}}@if(count($order->buys)!=$key+1),@endif  @endforeach" data-images="@foreach($order->buys as $key=>$buy) {{$buy->image}} @if(count($order->buys)!=$key+1),@endif  @endforeach ">
                            <i class="fa fa-eye"></i>
                          </a>
                          <a href="{{url('order/'.$order->id.'/edit')}}" class="btn btn-info">
                            <i class="fa fa-pencil"></i>
                          </a>
                          <a href="#" onclick="Supprime({{$order->id}})" class="btn btn-danger">
                            <i class="fa  fa-trash-o"></i>
                          </a >
                         
                          </td>
                        </tr>
                       @endforeach
                      
                      </tbody>
                    </table>
                    {{-- Pagination --}}
                    <div class="d-flex justify-content-end mt-2">
                        {!! $orders->links() !!}
                    </div>
                   
                    </div> 
             </div>        
        </div>             
    </div>  
</div>
<!-- Button trigger modal -->


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

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
   
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

function Supprime (idorder) {

  isBoss = confirm("VOUS VOULEZ CONFIRMEZ LA SUUPRIME CETTE COMMANDE!!!!");

    
      if(isBoss == true ){
    
                  $.ajax({
                  type:'POST',
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                  url:"{{ route('ajaxRequest.deletedorder') }}",
                  data:{id:idorder },
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
  } 


</script>
@endsection