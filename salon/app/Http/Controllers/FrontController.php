<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Code_carte;
use App\User;
use App\Enterprise;
use Carbon\Carbon;
use App\Candidat;

use Mail;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        return view('home');
    }
	
	function random_str($length) 
        {
                $str = '';
                $keyspace = '0123456789abcdefghijklmnopqrstuvwxyz' ;
                $max = mb_strlen($keyspace, '8bit') - 1;
                if ($max < 1) {
                    throw new Exception('$keyspace must be at least two characters long');
                }
                for ($i = 0; $i < $length; ++$i) {
                    $str .= $keyspace[random_int(0, $max)];
                }
                return $str;
        }
	
	
	public function codeGenere()
        {
         	
        for($i=0;$i<600;$i++){
            echo '<br>';
            $strrend = $this->random_str(8);
                $Code_carte = DB::table('code_carte')->where('code', '=',  $strrend )->first();
            while(!empty($Code_carte)){
                $strrend = $this->random_str(8);
                $Code_carte = DB::table('code_carte')->where('code', '=',  $strrend )->first();
            }
                echo $strrend;
                
            $Code_carte = new Code_carte(); 
            $Code_carte->code =   $strrend ;
            $Code_carte->save();

            }
        }	

    public function creation()
        {
            return view('front.home.creation');
        }

    public function testcin(Request $request){
		 $products = DB::table('products')->where('cin' , '=', $request->cin )->first();
		 
		 if(empty($products)){
			return  true ;
		 }else{
			 return  false ;
		 }
	 }
	 
	 
	public function getinfo(Request $request){
		 
	    $products = DB::table('candidats')->where('id' , '=', $request->id)->first();
	 
	   	return response()->json($products);
	 }


     public function getinfocandida(Request $request , $id){

	    $user = DB::table('candidats')->where('nsponso' , '=', $id)->first();
	 
        if(!empty($user)){
            return view('profile',['user' => $user]);
        }else{

        }
  
	   	//return response()->json($products);
	 }
	 
	public function saveinfo(Request $request){
		
		    $code = $request->code ;
			if( $code  == ""){
				
				        $Candidats =  Candidat::find($request->idproduit) ;
						
						$Candidats->nsponso = NULL  ;
						$Candidats->save();	
						
						
						$Code_carte = DB::table('code_carte')->where('id_candidats', '=', $request->idproduit)->first();
						
						$carte =  Code_carte::find($Code_carte->id) ;
						$carte->id_candidats = NULL ;
						$carte->save();
						
						return response()->json(true);
			
			}else{      
			            $Candidats =  Candidat::find($request->idproduit) ;
						if($Candidats->nsponso == NULL) {
				
							$Code_carte = DB::table('code_carte')->where('code', '=', $code)->where('id_candidats', '=', null)->first();
						
                        
							if(empty($Code_carte)){
								
								return response()->json(false);
								
							}else{
								
								$Candidats =  Candidat::find($request->idproduit) ;
								
								$Candidats->nsponso = $code ;
								$Candidats->save();	
								
								$carte =  Code_carte::find($Code_carte->id) ;
								$carte->id_candidats = $Candidats->id ;
								$carte->save();
								
								return response()->json(true);
							}
						}else{
							
							$Code_cartes = DB::table('code_carte')->where('code', '=', $code)->where('id_candidats', '=', null)->first();
							if(empty($Code_cartes)){
								
								return response()->json(false);
								
							}else{
								$Code_carte = DB::table('code_carte')->where('id_candidats', '=', $request->idproduit)->first();
								
								if(!empty($Code_carte)){
									$Candidats =  Candidat::find($request->idproduit) ;
									$Candidats->nsponso = $code ;
									$Candidats->save();	
									
									$cartes =  Code_carte::find($Code_carte->id) ;
									$cartes->id_candidats = null ;
									$cartes->save();
									
									$carte =  Code_carte::find($Code_cartes->id) ;
									$carte->id_candidats = $Candidats->id ;
									$carte->save();
									
									return response()->json(true);
								}
								
							}	
							
							
							
							return response()->json('eeeeee');
						}	
			     }	
	 }
	 
	 
  	 
	public function testcinIn($request){
		 $products = DB::table('products')->where('cin' , '=', $request)->first();
		 
		 if(empty($products)){
			return  true ;
		 }else{
			 return  false ;
		 }
	 }
    public function carteimprime()
        {
                     
        $imprimeurid=  Auth::user()->imprimeur->id ;
        
         $tabResult = array();
         $tabResult = DB::table('candidats')->get();

         return view('front.home.listebycarteimp',['listBotique'=> $tabResult ]);
       }    

    public function carteimprimein()
       {
                    
       $imprimeurid=  Auth::user()->imprimeur->id ;
       
        $tabResult = array();
        $tabResult = DB::table('candidats')->where("nsponso" ,'=', NULL)->get();


        return view('front.home.listebycarteimp',['listBotique'=> $tabResult ]);
      }       

    public function imprimant()
        {

            $imprimeurid=  Auth::user()->imprimeur->id ;
            
            $tabResult = array();
        
            
            $BoutiqueGouvTotal = DB::table('candidats')->count();
            $BoutiqueGouvNoimp = DB::table('candidats')->where('carte_imp' , '=', 0 )->count();
            $BoutiqueGouvimp = $BoutiqueGouvTotal - $BoutiqueGouvNoimp ;
    
            $tabResult[] = array(
                                "id"=>  1,
                                "name"=> "SALON DE L'EMPLOI", 
                                "gouv"=>"", 
                                "ref"=>"" , 
                                "total"=>$BoutiqueGouvTotal ,  
                                "noimp"=>$BoutiqueGouvNoimp , 
                                "imp"=>$BoutiqueGouvimp ) ; 
    
            return view('front.home.listebyboutiqueimp',['listBotique'=> $tabResult ]);
        }
        
        
    public function listabonneby(Request $request, $id)
        {
            $Boutique = DB::table('products')->where('boutique_id' , '=', $id )->get()  ;
            return view('front.home.listeabonne',['listBotique'=> $Boutique ]);
        }	
    public function listabonne()
        {
            
            $idBoutique =  Auth::user()->boutique->id ;
            $Boutique = DB::table('products')->where('boutique_id' , '=', $idBoutique )->get()  ;
            return view('front.home.listeabonne',['listBotique'=> $Boutique ]);
        }


    public function changenfc(Request $request)
        {
        $Products =  Product::find($request->id) ;
        $Products->etat_nfc = 1 ;
            $Products->save();	

        return true ;
        }
        
    public function changecopie(Request $request)
        {
                
        $Candidat =  Candidat::find($request->id) ;
        $Candidat->etat_don = 1 ;
            $Candidat->save();	   
        
        return true ;

        }
        
    public function changeimp(Request $request)
        {
                
        $Candidat =  Candidat::find($request->id) ;
        $Candidat->carte_imp = 1 ;
            $Candidat->save();	   
        
        return true ;

        }

    public function changesmsclient(Request $request)
        {/*
                
        $Candidat =  Candidat::find($request->id) ;
        $Candidat->sms_liv = 1 ;
            $Candidat->save();	 
                if($Candidat->email != ""){
            $data=[$Candidat->email];
                
                    $datas = array('nsponso'=>$Candidat->id,'name' => $Candidat->nom ,'create' => $Candidat->created_at  ,'email'=> $data );
                    Mail::send('email.liv',$datas, function($message) use ($datas)
                    {    
                        $message->from('chaabha@sponsorha.com', ' Passeport Lefri9i');
                        $message->to($datas['email'])->subject('Réception de votre Passeport Lefri9i');    
                    });
                }	*/
        return true ;

        }

    public function changelivclient(Request $request)
        {
                
        $Candidat =  Candidat::find($request->id) ;
        $Candidat->etat_liv = 1 ;
            $Candidat->save();	   
        
        return true ;

        }	
        
    public function submitabon(Request $request)
        {


            $this->validate($request, [
                'name' => 'required|string|max:255',
                'date' => 'required|string|max:255',
                'cin'  => 'required|unique:products|string|max:255',
                'phone'=> 'required',
                'gouv' => 'required',
                'abon' => 'required',
                'filescin'  => 'required|mimes:jpeg,png,jpg,pdf',
                'filesrecu' => 'required|mimes:jpeg,png,jpg,pdf',
            ]);
        
        

        /*
            $response = false;
            if(isset($_FILES['filesimag']['name'])){
            $filename = $_FILES['filesimag']['name'];
            $locations = "upload/".$filename;
                $imageFileType = pathinfo($locations,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);
            $location = "upload/".time().".".$imageFileType;
            


            $valid_extensions = array("jpg","jpeg","png");

        

            if(in_array(strtolower($imageFileType), $valid_extensions)) {
            
                if(move_uploaded_file($_FILES['filesimag']['tmp_name'],$location)){
                    
                    $response = true;
                }
            }

            }
            */

            $response2 = false;
            if(isset($_FILES['filescin']['name'])){

            $filenames = $_FILES['filescin']['name'];

            $locations2 = "upload/".$filenames;
            $imageFileType2 = pathinfo($locations2,PATHINFO_EXTENSION);
            $imageFileType2 = strtolower($imageFileType2);
            $location2 =  "upload/".time()."-2.".$imageFileType2;

            $valid_extensions = array("jpg","jpeg","png","pdf");

        
            if(in_array(strtolower($imageFileType2), $valid_extensions)) {
            
                if(move_uploaded_file($_FILES['filescin']['tmp_name'],$location2)){
                    // $response2 = $location2;
                    $response2 = true;
                }
            }

            }

        $response3 = false;

            if(isset($_FILES['filesrecu']['name'])){

            $filenames3 = $_FILES['filesrecu']['name'];

            $locations3 = "upload/".$filenames3;
            $imageFileType3 = pathinfo($locations3,PATHINFO_EXTENSION);
            $imageFileType3 = strtolower($imageFileType3);
            $location3 =  "upload/".time()."-3.".$imageFileType3;

            $valid_extensions = array("jpg","jpeg","png","pdf");

        
            if(in_array(strtolower($imageFileType3), $valid_extensions)) {
            
                if(move_uploaded_file($_FILES['filesrecu']['tmp_name'],$location3)){
                    // $response3 = $location3;
                            $response3 = true;
                    //echo  '*****'.$location3.'*****'.$response3.'*****';
                }
            }

            }

            if( ($response2) && ($response3) ){
                
            $reponse =  $this->testcinIn($request->cin) ;
            
            if($reponse) {
                    $Product = new Product(); 
                    
                    $Product->name =   $request->name ;
                    $Product->date_n = $request->date ;
                    $Product->telephone =  $request->phone ;
                    $Product->email        =  $request->email ;
                    $Product->boutique_id  = Auth::user()->boutique->id  ;
                    $Product->cin          = $request->cin ;    
                    $Product->etat_imp     = 0;
                    $Product->etat_nfc     = 0;
                    $Product->etat_don     = 0;
                    $Product->sms_creation = 1 ;
                    //$Product->nsponso      =  'CA-'.time().'-'.Auth::user()->boutique->id  ;
                    $Product->gouv         =   $request->gouv ;
                    $Product->photo_cin    = $locations2 ;
                    $Product->photo_image  = "no-image.png" ;
                    $Product->photo_recu   = $location3;
                    $Product->type_abonnement = $request->abon ; 
                    $Product->save();        

                    //$Product->nsponso  =  'CA-'.time().'-'.$Product->id  ;
                    //$Product->nsponso  =  0  ;
                    //$Product->save(); 
                    
                    /*
                        $Code_carte = DB::table('code_carte')->where('id_products', '=', null)
                                                            ->inRandomOrder()
                                                            ->limit(1)
                                                            ->update(['id_products' => $Product->id ,'date' => date('Y-m-d H:i:s',time()) ]);
                        
                        $Code = DB::table('code_carte')->where('id_products', '=', $Product->id)->first();
                        $ProductAll = DB::table('products')->where('id', '=',  $Product->id )->update(['nsponso' => $Code->code ]);
                    */
                    
                    if($request->email != ""){
                            $data=[$request->email];
                            $datas = array('nsponso'=>$Product->id ,'name' => $request->name ,'create' => $request->created_at  ,'email'=> $data );
                            Mail::send('email.form',$datas, function($message) use ($datas)
                            {    
                                $message->from('chaabha@sponsorha.com', ' Passeport Lefri9i');
                                $message->to($datas['email'])->subject('Inscription Passeport Lefri9i');    
                            });
                    }
                        return true ;
                }else{   return false ;     }
            }else{      return false ;     }

        }
        
        
        function csvToArray($filename = '', $delimiter = ';')
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
                        $data[] =  $row;
                }
                fclose($handle);
            }

            return $data;
        }
		
	
        
    public function importCsvUser()
        {
            $file =  public_path('test2.csv'); 




            $customerArr = $this->csvToArray($file);
        //  echo '<pre>';
   print_r($customerArr);
          //  echo $pw =  bcrypt('250309b5');
            exit();
       
           $delimiter =';';
 $filename = "societe_login" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
	
        foreach($customerArr as $key=>$val) {
            
        
            $pwd = bin2hex(openssl_random_pseudo_bytes(4));
            $pw =  bcrypt($pwd);
            
            $Users = new User();
            $Users->password =  $pw ;
            $Users->name= $val[0] ;
            $Users->email = strtolower($val['0']).'@fairsj.com' ;
            $Users->role = 0 ;
            //$Users->save() ;
            
            //print_r($Users);
            
            $Enterprise = new Enterprise();
            $Enterprise->name = $val[0] ;	
            $Enterprise->role	= 0 ; 
            $Enterprise->user_id = $Users->id ;
            // $Enterprise->save() ;
            
          //  echo  strtolower($val['0']).'@fairsj.com;'.$val[0].';'.$pwd.'\r'  ;

          // echo '<br>' ;
             $lineData = array(strtolower($val['0']).'@fairsj.com',$pwd); 
              fputcsv($f, $lineData, $delimiter); 
        } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
            return 'Jobi done or what ever';    
        }



    public function FrontLogin(Request $request)
        {
            
                $credentials = [
                    'email' => $request['email'],
                    'password' => $request['password'],
                ];
            

                if (Auth::attempt($credentials) ) {

                if( Auth::user()->role == 0 )  return  redirect()->route('creation');

                else return  redirect()->route('imprimant');

                }
                else{
                    return   redirect()->route('loginprint')->with('message',"Ces identifiants ne correspondent pas à nos enregistrements");     
                }
                
            }

    




}
