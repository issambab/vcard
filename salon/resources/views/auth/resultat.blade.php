@extends('layouts.back')

@section('jsSup')
  <!-- data tables -->
  <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('assets/js/pages/table/table_data.js')}}"></script>

  <!-- Material -->
  <script src="{{ asset('assets/plugins/material/material.min.js')}}"></script>
    <!-- toastr -->  <script src="{{ asset('assets/plugins/toastr/toastr.min.js')}}"></script>
  <script>
     $(document).ready(function(){
 
	$('.dataTables-example').DataTable({              
				pageLength: 25,               
				responsive: true,   
              				
				language: {        
						url: "{{ asset('assets/plugins/datatables/French.json')}}" 
						}, 
						buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]          
			});

     $('.delete').click(function() {   
                 id= $(this).attr("data-id") ;
              $(".modal-footer form").attr("action", "ordercommande/"+id);
            });

    @if(session()->has('successSupp'))
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 6000
                    };
                    toastr.error( 'La Voiture a étè bien supprimeé !!','Suppersion'  );
                }, 1000);            @endif 
          });       
    </script>@endsection

@section('cssSup')
      <!-- data tables -->
     <link href="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
     <!-- Toastr style -->
     <link href="{{ asset('assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- start page content -->
<div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Liste des Commandes</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ url('dashboard') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Liste des Commandes</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line">
                       <ul class="nav nav-pills nav-pills-rose">
                        <!--    <li class="nav-item tab-all"><a  href="{{ url('news/create') }}" class="nav-link active show" >Ajouter une Voiture</a></li>-->
                        </ul>	
                        <div class="tab-content">
                            <div class="tab-pane active fontawesome-demo" id="tab1">
                                <div class="row">
                                    <div class="col-md-12">

                                  

                                        <div class="card  card-box">
                                            <div class="card-head">
                                                <header></header>
                                                <div class="tools">
                                                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="card-body ">
                                      
                                              <div class="table-scrollable">
                                                <table class="table table-hover table-checkable order-column full-width dataTables-example" id="">
                                                    <thead>
                                                        <tr>
                                                           <!-- <th>Photo</th>-->
                                                           <th>id</th>
                                                            <th>photo</th>
                                                            <th >Titre </th>
                                                            <th>Date de circulation</th>
                                                            <th>Date Fin deal</th>
                                                            <th>Nbr de commande</th>
                                                            <th>Action </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($ListOrder as $list)
                                                        <tr class="odd gradeX" >
                                                          <!--  <td>
                                                                  <img src="{{ asset('upload/news/'.$list->photo) }}" alt="" class="w-25"> 
                                                            </td>-->

                                                            <td onclick='window.location.href ="carorderencher/"+{{$list->id}}+"";'>{{$list->id}} </td>
                                                            
                                                            <td onclick='window.location.href ="carorderencher/"+{{$list->id}}+"";'>
                                                               <img src="{{ asset($list->min_picture) }}" alt="" width="100px"> 
                                                            </td>
                                                            
                                                            <td> <a href="{{ url('carorderencher/'.$list->id.'') }}" style="color: #000000;"> {{ $list->title  }} </a></td>

                                                          
                                                            <td> <a href="{{ url('carorderencher/'.$list->id.'') }}" style="color: #000000;"> {{ $list->production_date }} </a></td>

                                                            <td>{{ $list->end_date}}</td>

                                                            <td>{{ $list->user_count}}</td>

                                                            <td >
                                                                 <!--    <a href="{{ url('carorderencher/'.$list->id.'/edit') }}" class="btn btn-tbl-edit btn-xs">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>-->
                                                             

                                                                <a href="{{ url('carorderencher/'.$list->id.'/') }}" class="btn btn-tbl-edit btn-xs" 
																@if( $list->caretat == 1)  style="background-color: #f60a2f;" 	
																@elseif($list->caretat == 2)  style="background-color: #167ccb;"  
																@elseif($list->caretat == 3)  style="background-color: #13c538;"   
																@endif																																>
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a  data-toggle="modal" data-target="#myModal"  data-id="{{ $list->id }}" class="btn btn-tbl-delete btn-xs delete">
                                                                    <i class="fa fa-trash-o "></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                   </tbody>
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page content -->
         
        <!-- The Modal -->
        <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
              
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Confirmation l'annulation de cette voiture </h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
              
                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Etes-vous sûr de vouloir annuler cet commande ?</p>
                    </div>
              
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    
                      <form method="post" name="suppelement"   >
                        {{ csrf_field() }}
                        {{ method_field('PUT')}}
                     <button  type="submit"  class="btn btn-primary" >Oui</button>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                    </form>
        
               
                    </div>
              
                  </div>
                </div>
            </div>
 
      
@endsection