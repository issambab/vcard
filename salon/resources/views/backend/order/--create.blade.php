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
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <form class="forms-sample" id="validator" method="" action=""  >
        <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form</h4>
                    <p class="card-description"> Basic form elements </p>
                      <div class="form-group">
                        <label for="exampleInputName1"> Nom & Prénom </label>
                        <input type="text" class="form-control"  placeholder="Nom & Prénom" id="name" name="name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email </label>
                        <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPhone">Téléphone</label>
                        <input type="text" class="form-control"  placeholder="Téléphone" id="phone"  name="phone">
                      </div>
                                      
                  </div>
                </div>
              </div>
        </div>
        <div class="row">

        <div class="col-md-12 grid-margin stretch-card">


<div style="display: none" > 
<div id="clone1"  class="clone1">
                    <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" id="description0" rows="2" name="description0"></textarea>
                    </div>

                    <div class="form-group row">
                      <div class="col-12">
                        <div class="row">
                          <label class="col-sm-3 col-form-label">Zone</label>
                            <div class="col-sm-9">
                              <select onchange="selectNum('num0',this.value ,0)" class="form-control" name="zone0" id="zone0">
                                    <option  value="0">Select Zone</option>
                                    @foreach ($zone   as $key => $item)
                                        <option       value="{{ $key }}">{{ $key }}</option>
                                    @endforeach
                              
                              </select>
                              <input type="hidden" data-row="0" id="selectNum0"  name="selectNum0">
                              <input type="hidden" data-row="0"   id="selectZone0"  name="selectZone0">
                            </div>
                            </div>
                          </div>
                   
                    </div>
                      
                    <div class="form-group">
                    <div  id="num0" data-row="0" class="num" >
                  <!--  @for ($i = 1 ; $i <= $zone['A1'][0]; $i++)
                       <a class="btn btn-danger" href="#">{{ $i }}</a>
                    @endfor-->
                   </div>
           </div>

 </div>

  <div id="clone2" class="clone2">
                 <div class="form-group">
                  <label for="exampleInputRef"> Reference </label>
                  <input type="text" class="form-control" id="exampleInputRef0" placeholder=" n° Reference" name="reference0">
                </div>
                <div class="form-group">
                  <label for="exampleInputDate1"> Date </label>
                  <input type="text" class="form-control" id="exampleInputDate0" placeholder="Date" name="date0">
                </div>
                <div class="form-group">
                  
                  <input type="file"  id="img0" name="img0" >
                  
                </div> 
   </div> 
</div>



                <div class="card">
                <button id="remove" type="button" class="btn btn-icons btn-rounded btn-danger btn-pos-dn" onclick="removeBlock('clone1')" >
                    <i class="mdi mdi-minus"></i>
                </button>
                <button id="Add" type="button" class="btn btn-icons btn-rounded btn-success btn-pos" onclick="createBlock('clone1')" >
                    <i class="mdi mdi-plus"></i>
                </button>
                  <div class="card-body b1" >
                    <h4 class="card-title">Basic form</h4>
                    <p class="card-description"> Basic form elements </p>
                    <div >

                    <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" id="description1" rows="2" name="description1"></textarea>
                    </div>

                    <div class="form-group row">
                      <div class="col-12">
                        <div class="row">
                          <label class="col-sm-3 col-form-label">Zone</label>
                            <div class="col-sm-9">
                              <select onchange="selectNum('num1',this.value , 1)" class="form-control" name="zone1" id="zone1">
                                        <option       value="0">Select Zone</option>
                                    @foreach ($zone   as $key => $item)
                                        <option       value="{{ $key }}">{{ $key }}</option>
                                    @endforeach
                              
                              </select>
                                <input type="hidden" data-row="1"   id="selectNum1"  name="selectNum1">
                                <input type="hidden" data-row="1"   id="selectZone1"  name="selectZone1">


                            </div>
                            </div>
                          </div>
    
                    </div>
                      
                    <div class="form-group">
                    <div  id="num1" data-row="1" class="num" >
                 <!--   @for ($i = 1 ; $i <= $zone['A1'][0]; $i++)
                       <a class="btn btn-danger" href="#">{{ $i }}</a>
                    @endfor -->
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
                <button id="remove2" type="button" class="btn btn-icons btn-rounded btn-danger btn-pos-dn" onclick="removeBlock2('clone2')" >
                    <i class="mdi mdi-minus"></i>
                </button>
                <button id="Add2" type="button" class="btn btn-icons btn-rounded btn-success btn-pos" onclick="createBlock2('clone2')" >
                    <i class="mdi mdi-plus"></i>
                </button>
                  <div class="card-body">
                    <h4 class="card-title">Basic form</h4>
                    <p class="card-description"> Basic form elements </p>
                    <div class="b2">

                        <div >
                           <div class="form-group">
                            <label for="exampleInputRef"> Reference </label>
                            <input type="text" class="form-control" id="exampleInputRef1" placeholder=" n° Reference" name="reference1">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputDate1"> Date </label>
                            <input type="text" class="form-control" id="exampleInputDate1" placeholder="Date" name="date1">
                          </div>
                          <div class="form-group">
                            
                            <input type="file" name="img1" id="img1" >

                          </div> 
                        </div> 

                    </div>
                 
                    </div>
                </div>
         </div>
         <div class="col-md-12 grid-margin stretch-card">
            <button type="submit"  class="btn btn-success mr-2">Envoyer</button>
            <a class="btn btn-light" href="{{url('order')}}">Annuler</a>
        </div>
    </div>  
    </form>
    </div>



@endsection

@section('jsSup')

    <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });



        var i=1,j=1 ,tabnum=[] ,tabzone=[];

    function selectNum(id,val,num){
          alert('rrrr'+val)
          $("#"+id).hide();
          $.ajax({
                  type:'POST',
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                  url:"{{ route('ajaxRequest.post') }}",
                  data:{zone:val},
                  success:function(data){
                    //  alert(data.success);
                  /*   for(i=1 ; $i<=data.total ; i++ ){

                      }*/
                      $('#selectNum'+num).val('');
                      $('#selectZone'+num).val('');

                      $("#"+id).html( data.success );
                      $("#"+id).show();
                  }
                });

        }



  $("#validator").submit(function(event) {
     alert( "Handler for .submit() called." );
     event.preventDefault();

      var name = $("#name").val();
      var email = $("#email").val();
      var phone = $("#phone").val();

      validation = true
      
      if(name ==  ''){ validation = false ;  }
      if(email == ''){ validation = false ;  }
      if(phone == ''){ validation = false ;  }

  for(k=1 ; k<=i ; k++){
    console.log('-------------selectNum------------');
    console.log($("#selectNum"+k).val()) 
    console.log('-------------------------');

    console.log('------------selectZone------------');
    console.log($("#selectZone"+k).val()) 
    console.log('-------------------------');

    console.log('------------description------------');
    console.log($("#description"+k).val())
    console.log('-------------------------');
     if($("#selectNum"+k).val() ==  ''){ validation = false ;    }
     if($("#selectZone"+k).val() ==  ''){ validation = false ;    }
     if($("#description"+k).val() ==  ''){ validation = false ;     }
  }


    for(f=1 ; f<=j ; f++){


    console.log('-------------selectNum------------');
    console.log($("#exampleInputRef"+j).val()) 
    console.log('-------------------------');

    console.log('------------selectZone------------');
    console.log($("#exampleInputDate"+j).val()) 
    console.log('-------------------------');

    console.log('------------description------------');
    console.log($("#img"+j).val())
    console.log('-------------------------');


     if($("#exampleInputRef"+f).val() ==  ''){ validation = false ;    }
     if($("#exampleInputDate"+f).val() ==  ''){ validation = false ;    }
     if($("#img"+f).val() ==  ''){ validation = false ;     }

    }





    console.log($('#name').val())
    /* $('#name').val();
      $('#email').val();
      $('#phone').val();*/
      
      console.log()
         
         /* $.ajax({
                  type:'POST',
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                  url:"{{ route('ajaxRequest.post') }}",
                  data:{zone:val},
                  success:function(data){
                    //  alert(data.success);
               
                      $('#selectNum'+num).val('');
                      $('#selectZone'+num).val('');

                      $("#"+id).html( data.success );
                      $("#"+id).show();
                  }
                });*/

        })     


$('.b1').on('click', '.clicknumber', function() {

     var $this=$(this);
     id=$this.parent().attr('id')
     $('#'+id+' .clicknumber').removeClass('active');
     $this.addClass('active');
     num=$this.attr('data-num');
     zone=$this.attr('data-zone');
     row=$this.parent().attr('data-row');
     console.log(row);
    $('#selectNum'+row).val(num);
    $('#selectZone'+row).val(zone);

    console.log($('#selectNum'+row).val());


});




        $("#remove").hide();
        function removeBlock(){
            i--;
            if(i==1){
            $("#remove").hide();
         }
         console.log($(".clone1").last().attr('data-row'));
            $(".clone1").last().remove();
            tabnum.splice(-1,1)
            tabzone.splice(-1,1)
           
        }
        function createBlock(bl) {
         i++;
         if(i>1){
            $("#remove").show();
         }
            var temp = $("#"+bl).clone();

    //from here you can do things like change name fields or values
    temp.find("#description0").attr("name", "description"+i);
    temp.find("#selectNum0").attr("name", "selectNum"+i);
    temp.find("#selectZone0").attr("name", "selectZone"+i);


                               
    temp.find("#zone0").attr("name", "zone"+i);
    temp.find("#zone0").attr( "onchange", "selectNum('num"+i+"',this.value,"+i+")" );
    temp.find("#selectNum0").attr("data-row", i);
    temp.find("#selectZone").attr("data-row", i);

    temp.find("#num0").attr("data-row",i);
    temp.find("#num0").attr("id", "num"+i);
    temp.find("#description0").attr("id", "description"+i);
    temp.find("#selectNum0").attr("id", "selectNum"+i);
     temp.find("#selectZone0").attr("id", "selectZone"+i);
    
    temp.find("#zone0").attr("id", "zone"+i);

    
    //...attach events
    temp.find("#Add").click(function() {
        //some click action like make a new template
        createBlock();
    });

    //then add the new code to the holding area
    $(".b1").append(temp);
    
}
$("#remove2").hide();
        function removeBlock2(){
            j--;
            if(j==1){
            $("#remove2").hide();
         }
            $(".clone2").last().remove();
           
        }
        function createBlock2(bl) {
         j++;
         if(j>1){
            $("#remove2").show();
         }
            var temp = $("#"+bl).clone();

    //from here you can do things like change name fields or values
    temp.find("#exampleInputRef0").attr("name", "reference"+j);
    temp.find("#exampleInputDate0").attr("name", "date"+j);
    temp.find("#img0").attr("name", "img"+j);


    temp.find("#exampleInputDate0").attr("id", "date"+j);
    temp.find("#exampleInputRef0").attr("id", "reference"+j);
    temp.find("#img0").attr("id", "img"+j);
                            

    //...attach events
    temp.find("#Add2").click(function() {
        //some click action like make a new template
        createBlock2();
    });

    //then add the new code to the holding area
    $(".b2").append(temp);
        }
    </script>
@endsection