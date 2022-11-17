@extends('layouts.front2')
@section('content')

 <div class="justify-content-center"  style="background: white;    padding: 25px;" >
	  	<table id="table_id" class="display">
		    <thead>
		        <tr style="text-align: center;">
				    <!--<th>PHOTO </th>-->
					<th>NOM ET PRENOM </th>
					<th>TELEPHONE </th>
					<th>EMAIL</th>
					<th>ECOLE</th>
					<th>N° CARTE</th>
					<th>QRCODE</th>
					<th>N° ETUDIANT</th>
		        </tr>
		    </thead>
		    <tbody>

		    	 @foreach($listBotique as $key=>$val)
			        <tr style="text-align: center;">  
                     	<!--<td><IMG src="{{asset($val->img)}} "  width='50' height='50' /></td>	-->				
	        	        <td>{{$val->nom}} {{$val->prenom}}</td>
						<td>{{$val->telephone}} </td>
			            <td>{{$val->email}}</td>
						<td>{{$val->ecole}}</td>
						
						<td>@php echo str_pad($val->id,5,0,STR_PAD_LEFT)  @endphp </td>
						<td >{{$val->nsponso}}</td>
					
						<td>{{$val->code_etudiant}}	</td>
				
						
			        </tr>
	          @endforeach
		    	    
		    </tbody>
		</table>
		
 </div>
 
 

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