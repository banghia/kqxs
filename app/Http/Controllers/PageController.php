<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prediction;

class PageController extends Controller
{
    public function index(){
        $result = $this->getResult();
        if(count($result) > 3){
            $predictions = Prediction::all();
            return view('lottery')->withResult($result)->withPredictions($predictions);
        }else{
            return back();
        }
    }

    public function lottery($url, Request $request){
        if(!empty($request->query('ngay'))){
            $url = $url.'?ngay='.$request->query('ngay');
        }
        $result = $this->getResult($url);
        if(count($result) > 3){
            $predictions = Prediction::all();
            return view('lottery')->withResult($result)->withPredictions($predictions);
        }else{
            return back();
        }
    }

    public function prediction($id){
        $prediction = Prediction::find($id);
        $predictions = Prediction::all();
        $histories = $prediction->histories()->orderBy('date', 'desc')->get();
        return view('prediction')->withHistories($histories)->withPredictions($predictions)->withPrediction($prediction);
    }

    public function getResult($url = ''){
        $result = [];
        try{
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET','http://ketqua.net/'.$url);
            $body = preg_replace('~[\r\n]+~', '', $res->getBody());
            preg_match_all('/<table[^>]*kq[^>]*>(.*?)<\/table>/',$body, $tables, PREG_PATTERN_ORDER);
            $tables = isset($tables[0])?$tables[0]:[];
            foreach($tables as $table){
                preg_match_all('/<td[^>]*>(.*?)<\/td>/',$table, $cells, PREG_PATTERN_ORDER);
                $result[] = isset($cells[1])?$cells[1]:[];
            }
        }catch(Exception $e){
            return [];
        }
        return $result;
    }
}
