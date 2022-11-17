@extends('layouts.front')
@section('content')
 <div> </div>
 <div class="justify-content-center"  style="background: white;    padding: 25px;" >

	  	<table id="table_id" class="display">
		    <thead>
		        <tr>
								<th>NOM DE L'EVENEMENT</th>
								<th>CARTE IMP</th>
								<th>CARTE NON IMP</th>
								<th>TOTAL CARTE</th>
		        </tr>
		    </thead>
		    <tbody>

		    	 @foreach($listBotique as $key=>$val)
				
			        <tr  >
								<td>{{$val['name']}}</td>
								
								<td><img src="{{asset('images/imprim-active.png')}}" width="25%; "> {{$val['imp']}}</td>
								<td><img src="{{asset('images/imprim.png')}}" width="20%;" > {{$val['noimp']}}</td>
								<td>{{$val['total']}}</td>
			        </tr>
	          @endforeach
		    	    
		    </tbody>
		</table>
		
 </div>
@endsection


@section("jsSup")
	
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script>
	$(document).ready( function () {
		$('#table_id').DataTable({
  
  language: {
url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json"
}
})
	} );
</script>
@endsection

@section("cssSup")
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<style>
.sorting{
	font-size: 10px;
}
</style>
@endsection  