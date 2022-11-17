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
        return view('home');
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

    public function vcardsProfile(){
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
            
    public function vcards(){
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
	



    public function ImageFileUpload(Request $request) {


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
       // dd($request);
        $this->validate($request, [
            'lname' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'place' => 'required|string|max:255',      
            'dateofbirth'=> 'required',
			'phone' => 'required',
            'email' => 'required|unique:candidats|string|max:255',
            'ecole' => 'required',
        /*    'code_etudiant' => 'required|unique:candidats|exists:code_etudiants|string|max:255',*/
            'imgName' => 'required',
            //'image'  => 'required|mimes:jpeg,png,jpg',
        ],[
            'lname.required' => 'Le nom est obligatoire',
            'fname.required' => 'Le Prénom est obligatoire',
            'place.required' => 'Le lieu de résidence est obligatoire',
            'dateofbirth.required' => 'La date de naissance est obligatoire',
            'phone.required' => 'Le téléphone est obligatoire',
            'email.required' => "L'adresse e-mail est obligatoire",
            'email.unique' => "L'adresse e-mail est déja utilise",
            'ecole.required' => "L'ecole est obligatoire",
            'code_etudiant.required' => 'Le code est obligatoire',
            'code_etudiant.unique' => 'Le code est déja utilise',
            'code_etudiant.exists' => "Le code est n'existe ",
            'imgName.required' => "L'image est obligatoire",
            //'image.mimes' => "L'image doit être un fichier de type : jpeg, png, jpg."
        ]);
     


            $Candidat = new Candidat();  
            $Candidat->nom =   $request->lname ;
            $Candidat->prenom = $request->fname ;
            $Candidat->date_n = $request->dateofbirth ;
            $Candidat->img =  "upload/".$request->imgName ;
            $Candidat->telephone =  $request->phone ;
            $Candidat->email        =  $request->email ;
            $Candidat->adresse          = $request->place ;    
            $Candidat->ecole         =   $request->carte_imp ;
            $Candidat->ecole         =   $request->ecole ;
            $Candidat->code_etudiant    =  $request->code_etudiant ;
            $Candidat->carte_imp = 0 ;
            $Candidat->save();  

            $Code_etudiant = DB::table('code_etudiants')->where("code_etudiant" ,'=',  $request->code_etudiant )->first();
            if(!empty($Code_etudiant)){
                $Code_etudiants = Code_etudiant::find($Code_etudiant->id) ;
                $Code_etudiants->id_candidats = $Candidat->id ; 
                $Code_etudiants->save();  
            }
            


      session()->flash('successCreate','le candidat a étè bien enrgistre !!') ;
     
      return   redirect()->route('inscription')->with('message',"Ces identifiants ne correspondent pas à nos enregistrements");     
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