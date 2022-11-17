<?php

namespace App\Http\Controllers;

use App\Buy;
use  App\Product;
use  App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function createLogin()
    {
       
        return view('frontend.login') ;
    }
    public function createSponso()
    {
        return view('frontend.sp');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCaLogin(Request $request)
    {
        
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        //dd(bcrypt($request->password) );
        if (Auth::attempt($credentials) ) {
            return  redirect()->route('user');
        }
        else{
            return   redirect()->route('ca-login')->with('message',"Ces identifiants ne correspondent pas à nos enregistrements");     
        }
        
    }
    public function user(Request $request)
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
          $client=Auth::user()->client()->first();
		  if(empty($client)){
			  return view('frontend.login' );
		  }
		  else{
			  $orders=$client->orders;
          //dd($orders[0]->products);
        return view('frontend.user' ,["orders"=>$orders,"zone"=>$zone]);
		  }
          
    }
    public function storeSponso (Request $request)
    {
		  $zones = array(
                "A1"=>array(17,5000),
                "C1"=>array(17,5000),
                "B1"=>array(29,10000),
                "2"=>array(117,1000),
                "3"=>array(176,500),
                "4"=>array(252,300),
                "5"=>array(252,200),
    
                "A6"=>array(25,200),
                "B6"=>array(25,00),
    
                "8"=>array(1630,100),
                "9"=>array(252,100),
                "10"=>array(252,100),
              );
			  
			  $table = array() ; 
    
               foreach($zones as $key1=>$zone){
          
    
                    for($i=1 ; $i<= $zone[0] ; $i++ ){
                     
                        $exitNum = DB::table('products')->where('zone', $key1)->where('number',$i)->first();
                        if(empty($exitNum)){
                            //$table[] = array($key1,$i , null , -1 ) ;
                              
                      }else{
                         if ( $exitNum->status == 1 ){
								 $name =  strtolower($exitNum->text_name);
								 if (strlen($name) > 20){
									
								 $findme = 'mohamed';
								 $pos1 = stripos($name, $findme);
								 if($pos1 !== false) {
									 $name = str_replace($findme, "med", $name);
								 }
								 
							   }
							   $table[] = array($key1,$i ,  $name  , $exitNum->status  ) ;
						   }
                 
                    }
                 }
      
            }
         
        
        $product = Product::where('nsponso',$request->sponso)->first();
        if(empty($product)){
            //return 'no';
			   return view('frontend.marioul',["tableMarioul"=>$table]);
        }
        else {
            //return $product;
          
    


            return view('frontend.marioul',["product"=>$product, "tableMarioul"=>$table]);
        }

     
        
    }
	
	   public function appMarioul (Request $request)
    {
		
		 $zones = array(
                "A1"=>array(17,5000),
                "C1"=>array(17,5000),
                "B1"=>array(29,10000),
                "2"=>array(117,1000),
                "3"=>array(176,500),
                "4"=>array(252,300),
                "5"=>array(252,200),
    
                "A6"=>array(25,200),
                "B6"=>array(25,00),
    
                "8"=>array(1630,100),
                "9"=>array(252,100),
                "10"=>array(252,100),
              );
         
              $table = array() ; 
    
               foreach($zones as $key1=>$zone){
          
    
                    for($i=1 ; $i<= $zone[0] ; $i++ ){
                     
                        $exitNum = DB::table('products')->where('zone', $key1)->where('number',$i)->first();
                        if(empty($exitNum)){
                            //$table[] = array($key1,$i , null , -1 ) ;
                              
                      }else{
                          if ( $exitNum->status == 1 ){
								 $name =  strtolower($exitNum->text_name);
								 if (strlen($name) > 20){
									
								 $findme = 'mohamed';
								 $pos1 = stripos($name, $findme);
								 if($pos1 !== false) {
									 $name = str_replace($findme, "med", $name);
								 }
								 
							   }
							   $table[] = array($key1,$i ,  $name  , $exitNum->status  ) ;
						   }
                 
                    }
                 }
      
            }

       
         return view('frontend.marioul',["tableMarioul"=>$table]);


       }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function show(Buy $buy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function edit(Buy $buy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buy $buy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buy $buy)
    {
        //
    }
	
	
	  public function sponsotest (Request $request)
    {
		  $zones = array(
                "A1"=>array(17,5000),
                "C1"=>array(17,5000),
                "B1"=>array(29,10000),
                "2"=>array(117,1000),
                "3"=>array(176,500),
                "4"=>array(252,300),
                "5"=>array(252,200),
    
                "A6"=>array(25,200),
                "B6"=>array(25,00),
    
                "8"=>array(1630,100),
                "9"=>array(252,100),
                "10"=>array(252,100),
              );
			  
			  $table = array() ; 
    
               foreach($zones as $key1=>$zone){
          
    
                    for($i=1 ; $i<= $zone[0] ; $i++ ){
                     
                        $exitNum = DB::table('products')->where('zone', $key1)->where('number',$i)->first();
                        if(empty($exitNum)){
                            //$table[] = array($key1,$i , null , -1 ) ;
                              
                      }else{
                           if ( $exitNum->status == 1 ){
							 $name =  strtolower($exitNum->text_name);
							 if (strlen($name) > 20){
								
							 $findme = 'mohamed';
							 $pos1 = stripos($name, $findme);
							 if($pos1 !== false) {
								 $name = str_replace($findme, "med", $name);
							 }
							 
						   }
                           $table[] = array($key1,$i ,  $name  , $exitNum->status  ) ;
						   }
                 
                    }
                 }
      
            }
         
        
   

            return view('frontend.marioul2',[ "tableMarioul"=>$table]);
        

     
        
    }
}
