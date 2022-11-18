<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidat;
use Mail;

use Carbon\Carbon;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use JeroenDesloovere\VCard\VCard;
use App\User;
use App\Imprimeur;
use App\Enterprise;
use App\Code_etudiant;


class HomeController extends Controller
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

        //return view('home');
    }
	 
    public function loginprint()
    {
     return view('front.home.loginprint');
    }
	
	public function password()
        {	
		  // echo  $pwd = bin2hex(openssl_random_pseudo_bytes(4));
           $pwd = 123456789 ;
		   echo '<br>';
             echo  $pw =  bcrypt($pwd);
			/* 
			   $Users = new User();
            $Users->password =  $pw ;
            $Users->name= 'Taoufik holding' ;
            $Users->email ='taoufik_holding@fairsj.com' ;
            $Users->role = 0 ;
            $Users->save() ;*/
            
            //print_r($Users);
            /*
            $Enterprise = new Enterprise();
            $Enterprise->name = 'Taoufik holding' ;	
            $Enterprise->role	= 0 ; 
            $Enterprise->user_id = $Users->id ;
             $Enterprise->save() ;*/
			 exit();
		}
	


    public function editprofile()
        {

            $vcard = new VCard();
            // define variables
            $lastname = 'Desloovere';
            $firstname = 'Jeroen';
            $additional = '';
            $prefix = '';
            $suffix = '';
            // add personal data
            $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);
            $vcard =  $vcard->getOutput();

            return view('profilefrom',['vcard' => $vcard ]);
          //   return view('front.home.inscription');


        }

    public function vcardsProfile()
       {
        
            $vcard = new VCard();
            // define variables
            $lastname = 'Desloovere';
            $firstname = 'Jeroen';
            $additional = '';
            $prefix = '';
            $suffix = '';
            // add personal data
            $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);
            return $vcard->download();
        }    
            
  
        public function vcards(Request $request , $id)
        {

            $user = DB::table('candidats')->where('nsponso' , '=', $id)->first();
            $vcard = new VCard();
            // define variables
            $lastname = $user->nom;
            $firstname = '';
            $additional = '';
            $prefix = '';
            $suffix = '';
            // add personal data
            $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

            // add work data
            /*$vcard->addCompany('Siesqo');
            $vcard->addJobtitle('Web Developer');
            $vcard->addRole('Data Protection Officer');
            $vcard->addEmail('info@jeroendesloovere.be');
            $vcard->addPhoneNumber(1234121212, 'PREF;WORK');
            $vcard->addPhoneNumber(123456789, 'WORK');
            $vcard->addAddress(null, null, 'street', 'worktown', null, 'workpostcode', 'Belgium');
            $vcard->addLabel('street, worktown, workpostcode Belgium');
            $vcard->addURL('http://www.jeroendesloovere.be');

            $vcard->addPhoto(__DIR__ . '/landscape.jpeg');*/

            return $vcard->download();
        }


   
        public function inscription()
    {
     return view('front.home.inscription');
    }
	
	  public function search()
    {
		
	 $tabResult = DB::table('candidats')->get();
     return view('front.home.listecarte',['listBotique'=> $tabResult ]);
    }
	
	   public function statecol()
    {
			$tabEcol = array( "Ecole paramédicale",
                                    "Ecole Polytechnique",
                                    "Ecole d'informatique",
                                    "Ecole de droit",
                                    "Business School",
                                    "Ecole de Communicati",
                                    "IMSET",
                                    "AAC");
			$total = DB::table('candidats')->count();
			foreach($tabEcol as $key=>$val):
			 $tabresult[] = DB::table('candidats')->where('ecole' ,'=',$val )->count();
			endforeach;	
		
		
     return view('front.home.stat',['tabresult' => $tabresult , 'tabEcol'  => $tabEcol  , 'total' => $total]);
    }
	



    public function ImageFileUpload(Request $request) 
    {

                    $this->validate($request, [
                
                    'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
                
                    ],[ 'file.required' => "L'image est obligatoire",
                    'file.mimes' => "L'image doit être un fichier de type : jpeg, png, jpg."]); 
                
                    if ($request->hasFile('file')) {
                        $image = $request->file('file');
                        $name = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/upload');
                        $image->move($destinationPath, $name);
                        return response()->json(['success' =>true , 'img'=>$name ]);
                    }
     }


   
     public function creation(Request $request)
    {
      
        
     
       

            $Candidat =  Candidat::find(Auth::user()->candidat->id);  
            
            $Candidat->nom =   $request->name ;
            $Candidat->prenom =   $request->name ;
            $Candidat->function = $request->job ;
            if($Candidat->img!=$request->imgName){
                $Candidat->img =  "upload/".$request->imgName ;
            }
            $Candidat->telephone =  $request->phone ;
            $Candidat->email        =  $request->email ;
            $Candidat->adresse          = $request->adresse ;  
            $Candidat->carte_imp          = 1 ;   
            $Candidat->save();  
        




      session()->flash('successCreate','le candidat a étè bien enrgistre !!') ;
     
      return   redirect()->route('editprofile')->with('message',"Ces identifiants ne correspondent pas à nos enregistrements");     
    }
        

     public function appHome()
    {
			$visiteur = DB::table('visiteurs')->count();
			$entretien = DB::table('salon')->where("entretien" ,'=',  1)->count();
			$cvdepo = DB::table('salon')->where("cv_depo" ,'=',  1)->count();
			$preselection = DB::table('salon')->where("preselection" ,'=',  1)->count();
			$coachings = DB::table('coachings')->count();
			 
	
		 
		    return view('front.home.index',['visiteur'=> $visiteur ,'entretien'=> $entretien , 'cvdepo'=> $cvdepo ,'preselection'=> $preselection ,'coachings'=> $coachings  ]);
     
    }
	
	     public function GetInfoSalon()
    {
			$visiteur = DB::table('visiteurs')->count();
			$entretien = DB::table('salon')->where("entretien" ,'=',  1)->count();
			$cvdepo = DB::table('salon')->where("cv_depo" ,'=',  1)->count();
			$preselection = DB::table('salon')->where("preselection" ,'=',  1)->count();
			$coachings = DB::table('coachings')->count();
			 
	
			return response()->json(['success' => true  ,  'visiteur'=> $visiteur ,'entretien'=> $entretien , 'cvdepo'=> $cvdepo ,'preselection'=> $preselection ,'coachings'=> $coachings]);
     
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
	
	
	public function importCsv()
    {
        $file =  public_path('codeetudiant.csv'); 
        $customerArr = $this->csvToArray($file);

         // print_r($customerArr);
        
        foreach($customerArr as $key=>$val) {
            echo   $val[0] ;
            echo '<br>';
            
            $Code_etudiant = DB::table('code_etudiants')->where("code_etudiant" ,'=',  $val[0] )->first();
                if(empty($Code_etudiant)){
                    $Code_etudiants = new Code_etudiant();
                    $Code_etudiants->code_etudiant =   $val[0];
                //  $Code_etudiants->save() ; 
                }
        }
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
