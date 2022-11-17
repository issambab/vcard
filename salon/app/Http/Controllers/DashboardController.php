<?php

namespace App\Http\Controllers;

use App\Client;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class DashboardController extends Controller
{

  private $NumGlobale = 1370 ;
  
    public function index(){
      //  $gggg =  bcrypt('1920CA*/;sponso');
 /* $gggg =  bcrypt('allasaiphshar2021');
 var_dump($gggg);
 exit();*/

            $zones = array(
            "A1"=>array(17,5000),
            "C1"=>array(12,5000),
            "B1"=>array(29,10000),
            "2"=>array(117,1000),
            "3"=>array(176,500),
            "4"=>array(252,300),
            "5"=>array(252,200),

            "A6"=>array(25,1000),
            "B6"=>array(25,1000),

            "8"=>array(1504,100),
            "9"=>array(252,100),
            "10"=>array(252,100),
          );
          $select="";
         /*  for($i=1 ; $i<= $zone[$request->zone][0] ; $i++ ){
            $tab[]= $i ;
           }
           */

           $select="";
		   
		   $totalValide = 0 ; 
		   $totalLibre = 0 ;
		   $totalenAttend = 0 ;
           $TotalVendu= 0 ;
		   
		   		

           foreach($zones as $key1=>$zone){
			
			$totalValideByzone = 0 ; 
		    $totalLibreByzone = 0 ;
		    $totalenAttendByzone = 0 ;
		    $TotalVenduByzone= 0 ;


            $select=$select." <div class='card mb-3'>
            <div class='card-body '><h4 class='card-title'>".$key1."</h4>";
                for($i=1 ; $i<= $zone[0] ; $i++ ){
                    $exitNum = DB::table('products')->where('zone', $key1)->where('number',$i)->first();
                    if(empty($exitNum)){
                          $totalLibre++;
						  $totalLibreByzone++;
                       $select = $select.'<button type="button"  class="btn btn-danger m-1  ">'.$i.'</button>';
                  }else{
             
                               if( $exitNum->status == 0  ){
                                     $totalenAttend++ ;
									 $totalenAttendByzone++ ;
                                   $select = $select.'<button type="button" tabindex="0" data-toggle="tooltip"  role="tooltip"  data-placement="top" title="'.$exitNum->text_name.'"  class="btn btn-warning m-1 ">'.$i.'</button>';
     
                               }else{
								    $totalValide++ ;
									$totalValideByzone++;
								//	$totalbyZone[$key1] = $totalbyZone[$key1] + $zone[1];
									  $TotalVendu =   $TotalVendu + $zone[1];
									  $TotalVenduByzone =  $TotalVenduByzone + $zone[1];
                                    $select = $select.'<button type="button" tabindex="0" role="tooltip"  data-toggle="tooltip" data-placement="top" title="'.$exitNum->text_name.'"  class="btn btn-success m-1 ">'.$i.'</button>';
                               }
                }
           }
          $select=$select.'</div>
		  		   <div class="card-body">
                    <div class="row">
                      <div class="col-lg-3 col-md-6">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">'.$totalValideByzone.'</h3>
							<p class="mb-0 text-muted">'.number_format((($totalValideByzone*100)/$zone[0]),2,'.','' ).'%</p>
                            <h5 class="mb-0 font-weight-medium text-success">Total Place Validé</h5>
                           
                          </div>
 
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">'.$totalenAttendByzone.'</h3>
										<p class="mb-0 text-muted">'.number_format((($totalenAttendByzone*100)/$zone[0]),2,'.','' ).'%</p>
                            <h5 class="mb-0 font-weight-medium text-warning ">Total Place en Attente</h5>
                         
                          </div>
             
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">'.$totalLibreByzone.'</h3>
										<p class="mb-0 text-muted">'.number_format((($totalLibreByzone*100)/$zone[0]),2,'.','' ).'%</p>
                            <h5 class="mb-0 font-weight-medium text-danger">Total Place Libre </h5>
                        
                          </div>
         
						  
                        </div>
                      </div>
       
                    </div>
                  </div>
		   
		   </div>';
		   

        }
		$total = $totalValide + $totalLibre + $totalenAttend  ;
		//$pourcentagevalide =  number_format(($totalValide * 100) / $total );
		//$pourcentageLibree =  number_format(($totalLibre * 100) / $total );
		//$pourcentageAttend =  number_format(($totalenAttend * 100) / $total ) ;
		
        return view('backend.dashboard',["select"=>$select , 		   
       	'totalValide' =>$totalValide  , 
		   'totalLibre' =>  $totalLibre ,
		   'totalenAttend' => $totalenAttend  ,
		   'pourcentagevalide' =>  number_format(($totalValide * 100) / $total ,2,'.','' ),
		'pourcentageLibree' =>  number_format(($totalLibre * 100) / $total ,2,'.','' ),
		'pourcentageAttend' =>  number_format(($totalenAttend * 100) / $total ,2,'.','' ) ,

		   ]);
    }



    function csvToArray($filename = '', $delimiter = ',')
{
    if (!file_exists($filename) || !is_readable($filename))
        return false;

    $header = null;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== false)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
        {
            if (!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }

    return $data;
}


public function importCsv()
{
    $file = public_path('text2.txt');

    $customerArr = $this->csvToArray($file);

    //print_r($customerArr);


    foreach($customerArr as $key=>$val) {
      print_r($val['Nom'] ) ; 
      echo '<br>';

      $this->NumGlobale++;
      $Num =   $this->getnumvid($this->NumGlobale) ;
            
      
        if(!empty($Num)){
           
           $numberSponso = "CA-".time().'-8'.$Num ;
       
            $Products = new Product();
            $Products->number = $Num  ;
            $Products->zone = 8 ;
            $Products->text_name = $val['Nom'] ;
            $Products->description =$val['Nom'] ;
            $Products->order_id = 1244 ;
            $Products->status = 0 ;
            $Products->nsponso = $numberSponso  ;
         //   $Products->save();
           $rpod = array( $Num,1244,$val['Nom']) ;
           print_r($rpod);
         

        }else{    }


    

    }



    return 'Jobi done or what ever';    
}
public function getnumvid($Nums){
    $i = $Nums ;
  $produit =  DB::table('products')->where('number', '=' ,$i )->where('zone', 8 )->first();
  if(empty($produit)){
    $this->NumGlobale = $i;
       return  $i ; 

  }else{
  
      while(!empty($produit)){
        $i++;
        $produit =  DB::table('products')->where('number','=' , $i)->where('zone', 8 )->first();
      }
      $this->NumGlobale = $i;
    return  $i ;  
  }

}


	
	 public function statm(){
        $gggg =  bcrypt('1920CA*/;sponso');

// var_dump($gggg);

            $zones = array(
            "A1"=>array(17,5000),
            "C1"=>array(12,5000),
            "B1"=>array(29,10000),
            "2"=>array(117,1000),
            "3"=>array(176,500),
            "4"=>array(252,300),
            "5"=>array(252,200),

            "A6"=>array(25,1000),
            "B6"=>array(25,1000),

            "8"=>array(1504,100),
            "9"=>array(252,100),
            "10"=>array(252,100),
          );
          $select="";
         /*  for($i=1 ; $i<= $zone[$request->zone][0] ; $i++ ){
            $tab[]= $i ;
           }
           */

           $select="";
		   
		   $totalValide = 0 ; 
		   $totalLibre = 0 ;
		   $totalenAttend = 0 ;
           $TotalVendu= 0 ;
		   
		   		

           foreach($zones as $key1=>$zone){
			
			$totalValideByzone = 0 ; 
		    $totalLibreByzone = 0 ;
		    $totalenAttendByzone = 0 ;
		    $TotalVenduByzone= 0 ;


            $select=$select." <div class='card mb-3'>
            <div class='card-body '><h4 class='card-title'>".$key1."</h4>";
                for($i=1 ; $i<= $zone[0] ; $i++ ){
                    $exitNum = DB::table('products')->where('zone', $key1)->where('number',$i)->first();
                    if(empty($exitNum)){
                          $totalLibre++;
						  $totalLibreByzone++;
                       $select = $select.'<button type="button"  class="btn btn-danger m-1  ">'.$i.'</button>';
                  }else{
             
                               if( $exitNum->status == 0  ){
                                     $totalenAttend++ ;
									 $totalenAttendByzone++ ;
                                   $select = $select.'<button type="button" data-toggle="tooltip" data-placement="top" title="'.$exitNum->text_name.'"  class="btn btn-warning m-1 ">'.$i.'</button>';
     
                               }else{
								    $totalValide++ ;
									$totalValideByzone++;
								//	$totalbyZone[$key1] = $totalbyZone[$key1] + $zone[1];
									  $TotalVendu =   $TotalVendu + $zone[1];
									  $TotalVenduByzone =  $TotalVenduByzone + $zone[1];
                                    $select = $select.'<button type="button" data-toggle="tooltip" data-placement="top" title="'.$exitNum->text_name.'"   class="btn btn-success m-1 ">'.$i.'</button>';
                               }
                }
           }
                    $select=$select.'</div>
		  		   <div class="card-body">
                    <div class="row">
                      <div class="col-lg-3 col-md-6">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">'.$totalValideByzone.'</h3>
							<p class="mb-0 text-muted">'.number_format((($totalValideByzone*100)/$zone[0]),2,'.','' ).'%</p>
                            <h5 class="mb-0 font-weight-medium text-success">Total Place Validé</h5>
                           
                          </div>
 
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">'.$totalenAttendByzone.'</h3>
										<p class="mb-0 text-muted">'.number_format((($totalenAttendByzone*100)/$zone[0]),2,'.','' ).'%</p>
                            <h5 class="mb-0 font-weight-medium text-warning ">Total Place en Attente</h5>
                         
                          </div>
             
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">'.$totalLibreByzone.'</h3>
										<p class="mb-0 text-muted">'.number_format((($totalLibreByzone*100)/$zone[0]),2,'.','' ).'%</p>
                            <h5 class="mb-0 font-weight-medium text-danger">Total Place Libre </h5>
                        
                          </div>
         
						  
                        </div>
                      </div>
       
                    </div>
                  </div>
		   
		   </div>';
		   

        }
				$total = $totalValide + $totalLibre + $totalenAttend  ;

		
        return view('backend.state',["select"=>$select , 		   
       	    'totalValide' =>$totalValide  , 
		    'totalLibre' =>  $totalLibre ,
		    'totalenAttend' => $totalenAttend  ,
		 //  'totalbyZone' => $totalbyZone ,
			'pourcentagevalide' =>  number_format(($totalValide * 100) / $total ,2,'.','' ),
			'pourcentageLibree' =>  number_format(($totalLibre * 100) / $total ,2,'.','' ),
			'pourcentageAttend' =>  number_format(($totalenAttend * 100) / $total ,2,'.','' ) ,
		   'TotalVendu' => number_format($TotalVendu) ,
		   ]);
    }
	
	///////////////////////////////////
	
	
	 public function statename(){

            $zones = array(
            "A1"=>array(17,5000),
            "C1"=>array(12,5000),
            "B1"=>array(29,10000),
            "2"=>array(117,1000),
            "3"=>array(176,500),
            "4"=>array(252,300),
            "5"=>array(252,200),

            "A6"=>array(25,1000),
            "B6"=>array(25,1000),

            "8"=>array(1504,100),
            "9"=>array(252,100),
            "10"=>array(252,100),
          );
          $select="";
         /*  for($i=1 ; $i<= $zone[$request->zone][0] ; $i++ ){
            $tab[]= $i ;
           }
           */

           $select="";
		   
		   $totalValide = 0 ; 
		   $totalLibre = 0 ;
		   $totalenAttend = 0 ;
           $TotalVendu= 0 ;
		   
		   		

           foreach($zones as $key1=>$zone){
			
			$totalValideByzone = 0 ; 
		    $totalLibreByzone = 0 ;
		    $totalenAttendByzone = 0 ;
		    $TotalVenduByzone= 0 ;


            $select=$select." <div class='card mb-3'>
            <div class='card-body '><h4 class='card-title'>".$key1."</h4>";
                for($i=1 ; $i<= $zone[0] ; $i++ ){
                    $exitNum = DB::table('products')->where('zone', $key1)->where('number',$i)->first();
                    if(empty($exitNum)){
                          $totalLibre++;
						  $totalLibreByzone++;
                       $select = $select.'<button type="button"  class="btn btn-danger m-1  ">'.$i.'</button>';
                  }else{
					  
					   $name =  strtolower($exitNum->text_name);
								 if (strlen($name) > 20){
									
										 $findme = 'mohamed';
										 $pos1 = stripos($name, $findme);
										 if($pos1 !== false) {
											 $name = str_replace($findme, "med", $name);
										 }
								 
							   }
             
                               if (strlen($name) > 20){
                                     $totalenAttend++ ;
									 $totalenAttendByzone++ ;
                                   $select = $select.'<button type="button"  class="btn btn-warning m-1 ">'.$name.'-'.$i.'</button>';
     
                               }else{
								    $totalValide++ ;
									$totalValideByzone++;
								//	$totalbyZone[$key1] = $totalbyZone[$key1] + $zone[1];
									  $TotalVendu =   $TotalVendu + $zone[1];
									  $TotalVenduByzone =  $TotalVenduByzone + $zone[1];
                                    $select = $select.'<button type="button"  class="btn btn-success m-1 ">'.$name.'-'.$i.'</button>';
                               }
                }
           }
           $select=$select.'</div>
		  		   <div class="card-body">
                    <div class="row">
                      <div class="col-lg-3 col-md-6">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">'.$totalValideByzone.' - '.number_format((($totalValideByzone*100)/$zone[0]),2,'.','' ).' % </h3>
                            <h5 class="mb-0 font-weight-medium text-success">Total Place Validé</h5>
                           
                          </div>
 
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">'.$totalenAttendByzone.' - '.number_format((($totalenAttendByzone*100)/$zone[0]),2,'.','' ).' % </h3>
                            <h5 class="mb-0 font-weight-medium text-warning ">Total Place en Attente</h5>
                         
                          </div>
             
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">'.$totalLibreByzone.' - '.number_format((($totalLibreByzone*100)/$zone[0]),2,'.','' ).' % </h3>
                            <h5 class="mb-0 font-weight-medium text-danger">Total Place Libre </h5>
                        
                          </div>
         
						  
                        </div>
                      </div>
       
                    </div>
                  </div>
		   
		   </div>';
		   

        }
			$total = $totalValide + $totalLibre + $totalenAttend  ;

		
        return view('backend.statename',["select"=>$select , 		   
       	'totalValide' =>$totalValide  , 
		   'totalLibre' =>  $totalLibre ,
		   'totalenAttend' => $totalenAttend  ,
		 //  'totalbyZone' => $totalbyZone ,
		 			'pourcentagevalide' =>  number_format(($totalValide * 100) / $total ,2,'.','' ),
			'pourcentageLibree' =>  number_format(($totalLibre * 100) / $total ,2,'.','' ),
			'pourcentageAttend' =>  number_format(($totalenAttend * 100) / $total ,2,'.','' ) ,
		   'TotalVendu' => number_format($TotalVendu) ,
		   ]);
    }
	
	
	
	
	//////////////////////////////////
	
	
	
	
    public function zones()
    {
                     $zones = array(
            "A1"=>array(17,5000),
            "C1"=>array(12,5000),
            "B1"=>array(29,10000),
            "2"=>array(117,1000),
            "3"=>array(176,500),
            "4"=>array(252,300),
            "5"=>array(252,200),

            "A6"=>array(25,1000),
            "B6"=>array(25,1000),

            "8"=>array(1504,100),
            "9"=>array(252,100),
            "10"=>array(252,100),
          );
          $select="";
         /*  for($i=1 ; $i<= $zone[$request->zone][0] ; $i++ ){
            $tab[]= $i ;
           }
           */

           $select="";

           foreach($zones as $key1=>$zone){

            $select=$select." <div class='card mb-3'>
            <div class='card-body '><h4 class='card-title'>".$key1."</h4>";
                for($i=1 ; $i<= $zone[0] ; $i++ ){
                    $exitNum = DB::table('products')->where('zone', $key1)->where('number',$i)->first();
                    if(empty($exitNum)){
                         
                       $select = $select.'<button type="button"  class="btn btn-danger m-1  ">'.$i.'</button>';
                  }else{
             
                               if( $exitNum->status == 0  ){
     
                                   $select = $select.'<button type="button" data-toggle="tooltip" data-placement="top" title="'.$exitNum->text_name.'"  class="btn btn-warning m-1 ">'.$i.'</button>';
     
                               }else{
                                    $select = $select.'<button type="button" data-toggle="tooltip" data-placement="top" title="'.$exitNum->text_name.'"   class="btn btn-success m-1 ">'.$i.'</button>';
                               }
                }
           }
           $select=$select."</div></div>";
        }
       
        return view('backend.zones',["select"=>$select]);
    }
	
	
	
	    public function searchPoste(Request $request)
    {
         $zone = array(
            "A1"=>array(17,5000),
            "C1"=>array(12,5000),
            "B1"=>array(29,10000),
            "2"=>array(117,1000),
            "3"=>array(176,500),
            "4"=>array(252,300),
            "5"=>array(252,200),

            "A6"=>array(25,1000),
            "B6"=>array(25,1000),

            "8"=>array(1504,100),
            "9"=>array(252,100),
            "10"=>array(252,100),
          );
		  //dd($request->email);,  ['column_2', '<>', 'value_2'] 
		   //$clients=Client::where('email',$request->email)->paginate(10);
		if( !empty($request->email) && !empty($request->name) ) 
		{
			$clients=Client::where([ ['email', '=', $request->email],['name', '=', $request->name]   ])->paginate(10);
		}elseif( !empty($request->email)){
				$clients=Client::where([ ['email', '=', $request->email]])->paginate(10);
		}else{
				$clients=Client::where([['name', '=', $request->name]   ])->paginate(10);
		}
		
		
		
		
		//print_r( $clients);
        return view('backend.client.search',[ "clients" => $clients ,"zone" =>$zone]) ;
    }
	
	
	public function search()
    {
         $zone = array(
            "A1"=>array(17,5000),
            "C1"=>array(12,5000),
            "B1"=>array(29,10000),
            "2"=>array(117,1000),
            "3"=>array(176,500),
            "4"=>array(252,300),
            "5"=>array(252,200),

            "A6"=>array(25,1000),
            "B6"=>array(25,1000),

            "8"=>array(1504,100),
            "9"=>array(252,100),
            "10"=>array(252,100),
          );
        $clients=Client::where('id', '0')->paginate(10);
        return view('backend.client.search',[ "clients" => $clients ,"zone" =>$zone]) ;
    }
	
	
	
	
}
