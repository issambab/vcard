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
        .active1{
          background-color :#01072f !important
        }
        .error{
          background-color: #fce4e4;
          border: 1px solid #cc0033;
          outline: none;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <form class="forms-sample" id="validator" method="" action=""  enctype="multipart/form-data" >
        <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Information sur le client</h4>
                
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


<div style="display: none"> 
<div id="clone1"  class="clone1">
                    <div class="form-group">
                        <label for="exampleTextarea1">Text sur le t-shirt</label>
                        <textarea class="form-control" id="description0"  rows="1" maxlength="20" name="description0"></textarea>
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
                  <label for="exampleInputRef"> Référence </label>
                  <input type="text" class="form-control" id="exampleInputRef0" placeholder=" n° Reference" name="reference0">
                </div>
                <div class="form-group">
                  <label for="exampleInputDate1"> Date </label>
                  <input type="date" class="form-control" id="exampleInputDate0"   value="2021-02-01" data-date-format="YYYY-MM-DD" placeholder="Date" name="date0">
                </div>
                <div class="form-group">
                  
                  <input type="file"  id="img0" name="img0" onchange="readURL(this,0);" >
                  <img src="" id="profile-img0" width="200px" />
                  <input type="hidden" name="imgName0" id="imgName0"  >
                  
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
                    <h4 class="card-title">Reserver une place sur le t-shirt </h4>
                  <!--  <p class="card-description"> Basic form elements </p>-->
                    <div >

                    <div class="form-group">
                        <label for="exampleTextarea1">Text sur le t-shirt</label>
                        <textarea class="form-control" id="description1" rows="1" maxlength="20" name="description1"></textarea>
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
                    <h4 class="card-title">Preuve de paiement</h4>
                  <!--  <p class="card-description"> Basic form elements </p>-->
                    <div class="b2">

                        <div >
                           <div class="form-group">
                            <label for="exampleInputRef"> Référence </label>
                            <input type="text" class="form-control" id="exampleInputRef1" placeholder=" n° Reference" name="reference1">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputDate1"> Date </label>
                            <input type="date" class="form-control" id="exampleInputDate1" placeholder="Date"
                             value="2021-02-01" data-date-format="YYYY-MM-DD"
                             name="date1"  >
                          </div>
                          <div class="form-group">
                            
                            <input type="file" name="img1" id="img1"  onchange="readURL(this,1);">
                            <img src="" id="profile-img1" width="200px" />
                            <input type="hidden" name="imgName1" id="imgName1"  >



                          </div> 
                        </div> 

                    </div>
                 
                    </div>
                </div>
         </div>
         <div class="col-md-12 grid-margin stretch-card">
            <button type="submit" id='Envoyer'  class="btn btn-success mr-2 Envoyer">Envoyer</button>
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
      
          $("#"+id).hide();
          $.ajax({
                  type:'POST',
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                  url:"{{ route('ajaxRequest.post') }}",
                  data:{zone:val},
                  success:function(data){
                 
                      $('#selectNum'+num).val('');
                      $('#selectZone'+num).val('');

                      $("#"+id).html( data.success );
                      $("#"+id).show();
                  }
                });

        }



  $("#validator").submit(function(event) {

 $("#Envoyer").hide()
     event.preventDefault();

      var name = $("#name").val();
      var email = $("#email").val();
      var phone = $("#phone").val();

      validation = true
      
      if(name ==  ''){ validation = false ; $("#name").addClass('error')  }else{$("#name").removeClass('error')}
      if(email == ''){ validation = false ; $("#email").addClass('error') }else{$("#email").removeClass('error')}
      if(phone == ''){ validation = false ; $("#phone").addClass('error') }else{$("#phone").removeClass('error')}

   tabZone = [];
   tabNum = [];
   tabDescription = []; 
  for(k=1 ; k<=i ; k++){

    //tabZone[] = array($("#selectNum"+k).val(),$("#selectZone"+k).val(),$("#description"+k).val() );
  
    if($("#selectNum"+k).val() ==  '' && $("#selectZone"+k).val() != ''){ validation = false ; $("#num"+k).addClass('error')  }else{$("#num"+k).removeClass('error')}
    if($("#selectZone"+k).val() == ''){ validation = false ; $("#zone"+k).addClass('error') }else{$("#zone"+k).removeClass('error')}
    if($("#description"+k).val() == ''){ validation = false ; $("#description"+k).addClass('error') }else{$("#description"+k).removeClass('error')}

    tabZone.push($("#selectZone"+k).val()); 
    tabNum.push($("#selectNum"+k).val()); 
    tabDescription.push($("#description"+k).val()); 
   /* console.log('-------------selectNum------------');
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
     if($("#description"+k).val() ==  ''){ validation = false ;     }*/
  }

  console.log(tabZone);
  console.log(tabNum);
  console.log(tabDescription);

   tabRef = [];
   tabDate = [];
   tabImg = []; 

   var form_data = new FormData();

    for(f=1 ; f<=j ; f++){

    if($("#exampleInputRef"+f).val() ==  ''){ validation = false ; $("#exampleInputRef"+f).addClass('error')  }else{$("#exampleInputRef"+f).removeClass('error')}
    if($("#exampleInputDate"+f).val() == ''){ validation = false ; $("#exampleInputDate"+f).addClass('error') }else{$("#exampleInputDate"+f).removeClass('error')}
    if( $("#img"+f).get(0).files.length === 0  || $("#imgName"+f).val() == ''  ){ validation = false ; $("#img"+f).addClass('error') }else{$("#img"+f).removeClass('error')}

    tabRef.push($("#exampleInputRef"+f).val()); 
    tabDate.push($("#exampleInputDate"+f).val()); 
    tabImg.push($("#imgName"+f).val()); 

     //form_data.append("files[]", $("#img"+f)[0].files[0]);

  /*  console.log('-------------selectNum------------');
    console.log($("#exampleInputRef"+f).val()) 
    console.log('-------------------------');

    console.log('------------selectZone------------');
    console.log($("#exampleInputDate"+f).val()) 
    console.log('-------------------------');

    console.log('------------description------------');
    console.log($("#img"+f).val())
    console.log('-------------------------');


     if($("#exampleInputRef"+f).val()  ==  '' ){ validation = false ;}
     if($("#exampleInputDate"+f).val() ==  ''){ validation = false ;    }
     if($("#img"+f).val() ==  ''){ validation = false ;     }*/

    }

      console.log('-------------------------');
      console.log(tabRef);
      console.log(tabDate);
      console.log(tabImg);
      console.log('-------------------------');
 
    
      if(validation == true ){
    

                  $.ajax({
                  type:'POST',
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                  url:"{{ route('ajaxRequest.submit') }}",
                  data:{ name:name , email:email, phone:phone, tabZone:tabZone,tabNum:tabNum,tabDescription:tabDescription,tabRef:tabRef,tabDate:tabDate,tabImg:tabImg },
                  success:function(data){
               

                      if(data.success == true ){



                               alert('votre commande et valide ');
                               location.reload(true)

                      }else{
                              alert('erreur  ');
                                location.reload(true)
                      }
               
                    
                  }
                });


      }else{
         $("#Envoyer").show();
      }
         


        })     


      $('.b1').on('click', '.clicknumber', function() {

           var $this=$(this);
           id=$this.parent().attr('id')
           $('#'+id+' .clicknumber').removeClass('active1');
           $this.addClass('active1');
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

         
            temp.find("#img0").attr("onchange", "readURL(this,"+j+");");

            temp.find("#img0").attr("name", "img"+j);

           temp.find("#imgName0").attr("name", "imgName"+j);


            temp.find("#imgName0").attr("id", "imgName"+j);
            temp.find("#exampleInputDate0").attr("id", "exampleInputDate"+j);
            temp.find("#exampleInputRef0").attr("id", "exampleInputRef"+j);
            temp.find("#img0").attr("id", "img"+j);
            temp.find("#profile-img0").attr("id", "profile-img"+j);


                                    

            //...attach events
            temp.find("#Add2").click(function() {
                //some click action like make a new template
                createBlock2();
            });

            //then add the new code to the holding area
            $(".b2").append(temp);
        }




    function readURL(input,id) {


    var postData=new FormData();
        postData.append('file',input.files[0]);
 
        var url="{{ route('ajaxRequest.fileupload') }}";
 
        $.ajax({
        headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
        async:true,
        type:"post",
        contentType:false,
        url:url,
        data:postData,
        processData:false,
        success:function(data){
                    

                    var reader = new FileReader();
                      reader.onload = function (e) {
                          $('#profile-img'+id).attr('src', e.target.result);
                      }

                      reader.readAsDataURL(input.files[0]);

                     $("#imgName"+id).attr('value',data.img);
                     }
 
 
        });


    }
  

    </script>
@endsection