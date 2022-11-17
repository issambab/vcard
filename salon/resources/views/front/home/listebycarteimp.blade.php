@extends('layouts.front')
@section('content')

 <div class="justify-content-center"  style="background: white;    padding: 25px;" >
	  	<table id="table_id" class="display">
		    <thead>
		        <tr style="text-align: center;">
				<th>NOM ET PRENOM </th>
				<th>TELEPHONE </th>
			<!--	<th>EMAIL</th>-->
				<th>ECOLE</th>
			
				<th>CREER LE</th>
				<th>N° CARTE</th>
				<th>QRCODE</th>
				
				<th>COPIE DONNEES CARTE</th>
				<!--<th>COPIE ID NFC </th> -->
				<th>IMP CARTE </th>
				<th>CODE</th>
		        </tr>
		    </thead>
		    <tbody>

		    	 @foreach($listBotique as $key=>$val)
			        <tr style="text-align: center;">        
	        	        <td>{{$val->nom}} {{$val->prenom}}</td>
						<td>{{$val->telephone}} </td>
			        <!-- 	<td>{{$val->email}}</td>-->
						<td>{{$val->ecole}}</td>
						<td>{{ \Carbon\Carbon::parse($val->created_at)->format('Y-m-d H:i') }}  </td>
						<td>@php echo str_pad($val->id,5,0,STR_PAD_LEFT)  @endphp </td>
						<td id="qrcode_{{$val->id}}">{{$val->nsponso}}</td>
					
						<td><a href="#" onclick ="copie('{{$val->nom}} {{$val->prenom}} @php echo str_pad($val->id,5,0,STR_PAD_LEFT)  @endphp','{{$val->id}}')" class="copie_{{$val->id}}" >
						    @if($val->etat_don == 1)
						       <img src="{{asset('images/copie-active.png')}}" width="15%; ">
						   	@else
								<img src="{{asset('images/copie.png')}}" width="15%; ">
							@endif
                            </a>
						</td>
					<!--	<td><a href="#" onclick ="copienfc('{{$val->nsponso}}','{{$val->id}}')"  class="copienfc_{{$val->id}}" >
						    @if($val->carte_imp == 1)
						       <img src="{{asset('images/nfc-active.png')}}" width="30%;" > 
						   	@else
							<img src="{{asset('images/nfc.png')}}" width="30%;" > 
							@endif
						
						   </a>
						   
						  </td>-->
						<td><a href="#" onclick ="imprime({{$val->id}})" class="imprime_{{$val->id}}" >
						        @if($val->carte_imp == 1)
						      <img src="{{asset('images/imprim-active.png')}}" width="25%; ">
						   	@else
						    	<img src="{{asset('images/imprim.png')}}" width="25%; ">
							@endif
							 </a>
						</td>
						<td><a onclick="modalshow({{$val->id}})" style="cursor: pointer;" > <i class="fa fa-pencil" aria-hidden="true"></i> </td>	 
			        </tr>
	          @endforeach
		    	    
		    </tbody>
		</table>
		
 </div>
 
 
 <!--------------------------------EtudiantModal--------------------------------->
<div class="modal fade" id="ModalInfo" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 990px;">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Condidat <span class="ClientClass"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form  action="" method="post">
      <div class="modal-body  ">
      	  	       <div class="row">
					  <div class="col-lg-12">
					 
						       <div class="form-group">
						       	 	<label class="label px-2" >Codeqr :</label> 
						            <input type=""   id="code"  name="code" class="mx-5" >
						            <input type="hidden"  id="idproduit"  name="idproduit" required="">
						        </div>
						</div>
			    </div> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
		    <button  class="btn btn-primary" type="submit">Enregistré</button>
      
      </div>
	  	  </form >
    </div>
  </div>
</div>
 <!--------------------------------Modal--------------------------------->
@endsection


@section("jsSup")
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
	$(document).ready( function () {
	   		$('#table_id').DataTable({
            "order": [[ 3, "desc" ]],
			language: {
           url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json"
    }
		})
	});
	
    function modalshow(id){
		  $('#code').val('');			
         var fd = new FormData() ;
	         fd.append('id',id ) ;
			 
     $.ajax({
                type: "POST",
                url: "{{url('getinfo')}}",
                data: { id: id,},
                success: function (response) {
                         console.log(response);
                       
					   $('.ClientClass').html(response.nom+'  '+response.prenom+'  ' );
                       $('#idproduit').val(id);					  
					   $('#code').val(response.nsponso);	
                       $('#ModalInfo').modal('show');
                }
            });
	}
	
	
	   $("#ModalInfo").find('form').on('submit', function(e) {
					        	  e.preventDefault();
					        	   console.log( $(this).serialize() );
								
							   
  $.ajax({
                type: "POST",
                url: "{{url('saveinfo')}}",
                data: $(this).serialize() ,
                success: function (response) {
                     
                       console.log(response);
					   if(response == true) {
					   var id = $('#idproduit').val() ;

                       $('#qrcode_'+id).html($('#code').val());
                       $('#ModalInfo').modal('hide');
					   
					   }else{
						   alert("Code n'existe pas ou deja utilise");
					   } 
                      // $('#urlr_'+response.id).attr('href',response.url);
                      // if(response.url == ''){$('#urlr_'+response.id).attr('class','d-none');}else{$('#urlr_'+response.id).attr('class','d-block'); }*/
                }
            });
 });
	
	function copie(name,id){
		
		 var $temp = $("<input>");
		  $("body").append($temp);
		  $temp.val(name).select();
		  document.execCommand("copy");
		  $temp.remove();
		

			var fd = new FormData();
	        fd.append('id',id ) ;
	
		$.ajax({
              url: "{{url('changecopie')}}" ,
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
               
                console.log(response);
                if(response) {
                	 $('.copie_'+id).html('<img src="{{asset("images/copie-active.png")}}" width="15%; ">');
                }else{
                		
                }



              },
           });
		
	}
	function copienfc(name,id){
			
		  var $temp = $("<input>");
		  $("body").append($temp);
		  $temp.val(name).select();
		  document.execCommand("copy");
		  $temp.remove();
		  
		 var fd = new FormData() ;
	         fd.append('id',id ) ;
		  
		 $.ajax({
              url: "{{url('changenfc')}}" ,
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
               
                console.log(response);
                if(response) {
                	 $('.copienfc_'+id).html('<img src="{{asset("images/nfc-active.png")}}" width="30%; ">');
                }else{
                		
                }
              },
           });
		  
	}
		function imprime(id){
		 var fd = new FormData() ;
	         fd.append('id',id ) ;
		 $.ajax({
              url:  "{{url('changeimp')}}" ,
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                console.log(response);
                if(response) {
                	 $('.imprime_'+id).html('<img src="{{asset("images/imprim-active.png")}}" width="25%; ">');
                }else{	
                }
              },
           });
	}
</script>
@endsection

@section("cssSup")
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"  />
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<style>
.sorting{
	font-size: 10px;
}
</style>
@endsection  