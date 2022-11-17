<?php

namespace App\Http\Controllers;
use Mail;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $clients=Client::orderBy('id', 'desc')->paginate(10);
        return view('backend.client.index',[ "clients" => $clients ,"zone" =>$zone]) ;
    }


        public function list()
    {
        $clients=Client::orderBy('id', 'desc')->paginate(10);
        return view('backend.client.list',[ "clients" => $clients ]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	 $Num  =  DB::table('products')->where('order_id', 10 )->get();
         //    $client  =  DB::table('clients')->where('id', $orders->client_id)->first();

   
               $numberSponso ;
              foreach ($Num as $key => $value) {
                    
                   $numberSponso[] = $value->nsponso ;

                 }
 


              $data=["mohamedraissi10@gmail.com","babchia.issam.atelier216@gmail.com"];
                // $data=[$client->email];
                $datas = array('nsponso'=>$numberSponso, 'email'=> $data );
                Mail::send('email.form',$datas, function($message) use ($datas)
                {    
                    $message->from('chaabha@sponsorha.com', ' Chaabha Sponsorha');
                    $message->to($datas['email'])->subject('Sponsorha');    
                });	
		
   /*     $data=["mohamedraissi10@gmail.com","babchia.issam.atelier216@gmail.com"];
        Mail::send('email.form',$data, function($message) use ($data)
        {    
            $message->from('chaabhasponsorha@gmail.com', ' Chaabha Sponsorha');
            $message->to($data)->subject('Ca');    
        });
*/
        return 'yrsy';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
