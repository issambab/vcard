@extends('layouts.back')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                    <div class="card-body"style="overflow: auto;" >
                        <h4 class="card-title">Liste Clients</h4>
                        <table class="table">
                          <thead>
                            <tr>
                              <th>N°</th>
                              <th>Nom & prenom</th>
                              <th>Télephone</th>
                              <th>Emailt</th>
                              
                            </tr>
                          </thead>
                      <tbody>
                      @foreach($clients as $key=>$client)
           
                        <tr>
                          <td>{{$key + $clients->firstItem()}}</td>
                          <td>{{$client->name}}</td>
                          <td>{{$client->phone}}</td>
                          <td>{{$client->email}}</td>
                        </tr>
                     
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