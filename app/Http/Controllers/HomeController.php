<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

        public function index()
    {
        $session = session('cryptomonnaie');
        $tableau = [];
        $coinList = json_decode(file_get_contents('https://api.coingecko.com/api/v3/coins/list'), true);
        $newArray = [];
        $getInfoCrypto = [];
        $now = time();
        $hier = $now - 86400;

            if(session('cryptomonnaie')){
            foreach($session as $key => $value)
            {
                
                $getInfoCrypto[$key] = json_decode(file_get_contents("https://api.coingecko.com/api/v3/coins/".$session[$key]), true);
                $test[$key] = json_decode(file_get_contents("https://api.coingecko.com/api/v3/coins/".$session[$key]."/market_chart/range?vs_currency=eur&from=".$hier."&to=".$now.""), true);
                
        
                foreach($test[$key]["prices"] as $value){
                    $newArray[$key][] = [date('d/m/Y H:i:s', $value[0]/1000),$value[1]];
                }
            }
        }
            return view('home',["coinList" => $coinList,
                        "test"=> $newArray,
                        "getInfoCrypto"=> $getInfoCrypto]);
    }

    public function addCrypto(Request $request)
    {
        $tableau = [];
        if(session('cryptomonnaie'))
        {
            $tableau = session('cryptomonnaie');
        }
        if(!in_array($request->input("cryptoList"),$tableau))
        {
            $tableau[] = $request->input("cryptoList");
            session(['cryptomonnaie' => $tableau]);
        }
        return redirect("home");
    }

    public function removeCrypto(Request $request)
    {
        $tableau = [];
        print_r(session('cryptomonnaie'));
        if(session('cryptomonnaie'))
        {
            $tableau = session('cryptomonnaie');
        }
        if(in_array($request->input("cryptoList"),$tableau))
        {
            $key = array_search($request->input("cryptoList"),$tableau);
            unset($tableau[$key]);
            session(['cryptomonnaie' => $tableau]);
        }

        return redirect("home");
    }
}
