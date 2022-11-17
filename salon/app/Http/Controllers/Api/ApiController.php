<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File ;
use Carbon\Carbon;
use \Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\User;
use App\Candidat;
use App\Enterprise;
use App\Salon;
use App\Imprimeur;
use App\Visiteur;
use App\Cuisine;
use App\Coaching;
use DB ; 



class ApiController extends Controller
{
  public function __construct(){
  
  }
  public function index()
  {
      
  }


  public function visiteur(Request $request)
  {
    $Candidat=Candidat::where('nsponso' ,$request->id)->first();
    if(empty($Candidat)){
      return response()->json(['success' => false , 'message' => 'user not found']);
    }else{
          
        $Visiteur=Visiteur::where('id_candidat' ,$Candidat->id)->whereDate('date', date('Y-m-d' , time()))->first();
        if(empty($Visiteur)){
          $Visiteur = new Visiteur();  
          $Visiteur->id_candidat =   $Candidat->id ;
          $Visiteur->date = date('Y-m-d H:i:s',time());
          $Visiteur->save();
          return response()->json(['success' => true  ,  'candidat' => $Candidat  , 'user' => $Candidat ]);
        }else{
          return response()->json(['success' => true ,  'candidat' => $Candidat  , 'user' => $Candidat , 'message' => 'user used' ]);
        }
      } 

  }
  
  
  public function loginenterprises(Request $request)
  {

    $validator = \Validator::make($request->all(), [
      'email' => 'required',
      'password' => 'required',
     
     ]);

     if ($validator->fails()) {
      return response()->json(['success' => false , 'message' => 'email and password required']);
     }


      if ( ($request->email == 'visiteur@gmail.com') and ($request->password == 'salon*2021') ){
		 
			$Visiteur = "visiteur" ;
			
		  return  response()->json(['success' => true , 'role' => $Visiteur ]) ;
       
	  }else{
      return response()->json(['success' => false , 'message' => 'user not found']);
    }
    
    /*else if ( ($request->email == 'coaching@gmail.com') and ($request->password == 'coaching*2021'  )){
		  
		   
			$coching = "coaching" ;
		  
		  return  response()->json(['success' => true , 'role' => $coching ]) ;
		  
  	}else if ( ($request->email == 'cuisine@gmail.com') and ($request->password == 'cuisine*2021'  )){
		  
		   
			$coching = "cuisine" ;
		  
		  return  response()->json(['success' => true , 'role' => $coching ]) ;  

	  }else{		  


          $user=User::where('email' , $request->email)->first();
          if (!$user) {
            return response()->json(['success' => false , 'message' => 'user not found']);
          }
          if(Hash::check($request->password,$user->password)){
              $Enterprise=Enterprise::where('user_id' ,$user->id)->first();
              return  response()->json(['success' => true , 'role' => 'entreprise', 'user' => $Enterprise ]) ;
          }
          return response()->json(['success' => false , 'message' => 'user not found']);
        
     }*/
  }
  


  public function cuisine(Request $request)
  {
    $Candidat=Candidat::where('nsponso' ,$request->id)->first();
    if(empty($Candidat)){
      return response()->json(['success' => false , 'message' => 'user not found']);
    }else{
          
        $Cuisine=Cuisine::where('id_candidat' ,$Candidat->id)->whereDate('date', date('Y-m-d' , time()))->first();
        if(empty($Cuisine)){
          $Cuisine = new Cuisine();  
          $Cuisine->id_candidat =   $Candidat->id ;
          $Cuisine->date = date('Y-m-d H:i:s',time());
          $Cuisine->save();
          return response()->json(['success' => true  ,  'candidat' => $Candidat  , 'user' => $Candidat ]);
        }else{
          return response()->json(['success' => false ,  'candidat' => $Candidat  , 'user' => $Candidat , 'message' => 'user used' ]);
        }
      } 

  }


  public function coching(Request $request)
  {
   $Candidat=Candidat::where('nsponso' ,$request->id)->first();
    if(empty($Candidat)){
      return response()->json(['success' => false , 'message' => 'user not found']);
    }else{
            $Coaching=Coaching::where('id_candidat' ,$Candidat->id)->first();
            if(empty($Coaching)){
              $Coaching = new Coaching();  
              $Coaching->id_candidat =   $Candidat->id ;
              $Coaching->date = date('Y-m-d H:i:s',time());
              $Coaching->save();
              return response()->json(['success' => true , 'candidat' => $Candidat   ]);
            }else{
              return response()->json(['success' => true , 'candidat' => $Candidat   ]);
            }
         }
  }
  
  public function imprimeur(Request $request)
  {
    $Candidat=Candidat::where('idnsponso' ,$request->id)->first();
    if(empty($Candidat)){
      return response()->json(['success' => false , 'message' => 'user not found' ]);
    }else{
      $Candidat->carte_imp = 1;
      $Candidat->save();
      return response()->json(['success' => true ]);
    }
      
  }


  public function candidat(Request $request)
  {

    $validator = \Validator::make($request->all(), [
      'id' => 'required',
      'idenp' => 'required',
     
     ]);

     if ($validator->fails()) {
      return response()->json(['success' => false , 'message' => 'id candidat and id enterpise required']);
     } 

    $Candidat=Candidat::where('nsponso' ,$request->id)->first();

    if(empty($Candidat)){
      return response()->json(['success' => false , 'message' => 'candidat not found']);
    }else{
      $Enterprise=Enterprise::where('id' ,$request->idenp)->first();
      if(empty($Enterprise)){
        return response()->json(['success' => false , 'message' => 'Enterprise not found']);
      }else{ 
            $Salons=Salon::where('id_candidat' ,$Candidat->id)->where('id_enterprise' ,$request->idenp)->first();
            if(empty($Salons)){
                $Salon = new Salon();  
                $Salon->id_candidat =   $Candidat->id ;
                $Salon->id_enterprise = $request->idenp ;
                $Salon->date = date('Y-m-d H:i:s',time());
                $Salon->entretien = 0 ;
                $Salon->cv_depo = 0 ;
                $Salon->preselection = 0 ;
                $Salon->save();
                return response()->json(['success' => true , 'candidat' => $Candidat  , 'user' => $Salon]);
            }else{
              return response()->json(['success' => true ,  'candidat' => $Candidat  ,'user' => $Salons]);
            }
        }
 
    }
      
  }

  public function candidatentretien(Request $request)
  {
    $validator = \Validator::make($request->all(), [
      'id' => 'required',
      'idenp' => 'required',
     
     ]);

     if ($validator->fails()) {
      return response()->json(['success' => false , 'message' => 'id candidat and id enterpise required']);
     } 

    $Candidat=Candidat::where('nsponso' ,$request->id)->first();

    if(empty($Candidat)){
      return response()->json(['success' => false , 'message' => 'user not found']);
    }else{
      $Enterprise=Enterprise::where('id' ,$request->idenp)->first();
      if(empty($Enterprise)){
        return response()->json(['success' => false , 'message' => 'Enterprise not found']);
      }else{ 
          $Salons=Salon::where('id_candidat' ,$Candidat->id)->where('id_enterprise' ,$request->idenp)->first();
          if(empty($Salons)){
              $Salon = new Salon();  
              $Salon->id_candidat =   $Candidat->id ;
              $Salon->id_enterprise = $request->idenp ;
              $Salon->date = date('Y-m-d H:i:s',time());
              $Salon->entretien = 1 ;
              $Salon->cv_depo = 0 ;
              $Salon->preselection = 0 ;
              $Salon->save();
              return response()->json(['success' => true ,  'user' => $Salon]);
          }else{
              $Salons->entretien = 1 ;
              $Salons->save();
            return response()->json(['success' => true ,  'user' => $Salons]);
          }
      } 
    }
      
  }
 
  public function candidatcvdepo(Request $request)
  {
    $validator = \Validator::make($request->all(), [
      'id' => 'required',
      'idenp' => 'required',
     
     ]);

     if ($validator->fails()) {
      return response()->json(['success' => false , 'message' => 'id candidat and id enterpise required']);
     } 
    
    $Candidat=Candidat::where('nsponso' ,$request->id)->first();
    if(empty($Candidat)){
      return response()->json(['success' => false , 'message' => 'user not found']);
    }else{
      $Enterprise=Enterprise::where('id' ,$request->idenp)->first();
      if(empty($Enterprise)){
        return response()->json(['success' => false , 'message' => 'Enterprise not found']);
      }else{ 

            $Salons=Salon::where('id_candidat' ,$Candidat->id)->where('id_enterprise' ,$request->idenp)->first();
            if(empty($Salons)){
                $Salon = new Salon();  
                $Salon->id_candidat =   $Candidat->id ;
                $Salon->id_enterprise = $request->idenp ;
                $Salon->date = date('Y-m-d H:i:s',time());
                $Salon->entretien = 0 ;
                $Salon->cv_depo = 1 ;
                $Salon->preselection = 0 ;
                $Salon->save();
                return response()->json(['success' => true ,  'user' => $Salon]);
            }else{
                $Salons->cv_depo = 1 ;
                $Salons->save();
              return response()->json(['success' => true ,  'user' => $Salons]);
            }
          }
    }
      
  }
  
  public function candidatcvpreselection(Request $request)
  {
    $validator = \Validator::make($request->all(), [
      'id' => 'required',
      'idenp' => 'required',
     
     ]);

     if ($validator->fails()) {
      return response()->json(['success' => false , 'message' => 'id candidat and id enterpise required']);
     } 

    $Candidat=Candidat::where('nsponso' ,$request->id)->first();
    if(empty($Candidat)){
      return response()->json(['success' => false , 'message' => 'user not found']);
    }else{
      $Enterprise=Enterprise::where('id' ,$request->idenp)->first();
      if(empty($Enterprise)){
        return response()->json(['success' => false , 'message' => 'Enterprise not found']);
      }else{ 
          
          $Salons=Salon::where('id_candidat' ,$Candidat->id)->where('id_enterprise' ,$request->idenp)->first();
          if(empty($Salons)){
              $Salon = new Salon();  
              $Salon->id_candidat =   $Candidat->id ;
              $Salon->id_enterprise = $request->idenp ;
              $Salon->date = date('Y-m-d H:i:s',time());
              $Salon->entretien = 0 ;
              $Salon->cv_depo = 0 ;
              $Salon->preselection = 1 ;
              $Salon->save();
              return response()->json(['success' => true ,  'user' => $Salon]);
          }else{
              $Salons->preselection = 1 ;
              $Salons->save();
            return response()->json(['success' => true ,  'user' => $Salons]);
          }
     }  
    
    }
      
  }
  
   public function candidatnote(Request $request)
  {
    $validator = \Validator::make($request->all(), [
      'id' => 'required',
      'idenp' => 'required',
     
     ]);

     if ($validator->fails()) {
      return response()->json(['success' => false , 'message' => 'id candidat and id enterpise required']);
     } 

    $Candidat=Candidat::where('nsponso' ,$request->id)->first();
    if(empty($Candidat)){
      return response()->json(['success' => false , 'message' => 'user not found']);
    }else{
      $Enterprise=Enterprise::where('id' ,$request->idenp)->first();
      if(empty($Enterprise)){
        return response()->json(['success' => false , 'message' => 'Enterprise not found']);
      }else{ 
          
          $Salons=Salon::where('id_candidat' ,$Candidat->id)->where('id_enterprise' ,$request->idenp)->first();
          if(empty($Salons)){
			  
              return response()->json(['success' => false , 'message' => 'no entertien found']);
          }else{
              $Salons->note = $request->note ;
              $Salons->save();
            return response()->json(['success' => true ,  'user' => $Salons]);
          }
     }  
    
    }
      
  }


}
