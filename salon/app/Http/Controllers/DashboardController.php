<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class DashboardController extends Controller
{


  
    public function index(){
              //  $gggg =  bcrypt('1920CA*/;sponso');
        /* $gggg =  bcrypt('allasaiphshar2021');
        var_dump($gggg);
        exit();*/      
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
      
         

        }else{    }


    

    }
    return 'Jobi done or what ever';    
}
	
}
