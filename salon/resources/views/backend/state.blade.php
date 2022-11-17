@extends('layouts.back')
@section('content')
<div class="content-wrapper">

<div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-3 col-md-6">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">{{$totalValide}}</h3>
								<p class="mb-0 text-muted">{{$pourcentagevalide}} %</p>
                            <h5 class="mb-0 font-weight-medium text-success">Total Place Validé</h5>
                           
                          </div>
 
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">{{$totalenAttend}}</h3>
									<p class="mb-0 text-muted">{{$pourcentageAttend}} %</p>
                            <h5 class="mb-0 font-weight-medium text-warning ">Total Place en Attente</h5>
                         
                          </div>
             
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">{{$totalLibre}}</h3>
								<p class="mb-0 text-muted">{{$pourcentageLibree}} %</p>
                            <h5 class="mb-0 font-weight-medium text-danger">Total Place Libre </h5>
                        
                          </div>
         
						  
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">{{$TotalVendu}} DT</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Total Vendu</h5>
                         
                          </div>
       
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

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