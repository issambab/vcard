@extends('layouts.back')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin ">
        <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Zones</h4>
                    {!!$select!!}
                 </div>
        </div>         
        
        </div>             
    </div>  
</div>                    
@endsection

@section("jsSup")
	<script>
		$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
	</script>	
@endsection