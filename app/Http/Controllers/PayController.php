<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;
use App\Card;
use Validator;
use App\Prediction;

class PayController extends Controller
{
    private $MERCHANT_ID = "";
    private $CLIENT_ID = "";
    private $CLIENT_SECRET = "";

    public function prediction($id, Request $request){
        $request->validate([
            'type' => 'required',
            'serial' => 'required',
            'code' => 'required'
        ]);

        //Lấy thông tin config
        $config = Config::first();
        if(!empty($config)){
            $this->MERCHANT_ID = $config->merchant_id;
            $this->CLIENT_ID = $config->client_id;
            $this->CLIENT_SECRET = $config->client_secret;
        }
        $response = $this->exec_curl($request->type,$request->serial,$request->code);
        
        //test
        //$response = '{ "Code": 1, "Data":{ "Money": 20000 } }';

        //Kết quả bạp thẻ
        $response = json_decode($response);
        if($response -> Code > 0){//Nạp thẻ thành công
            if(session()->has('money')){
                session()->put('money',intval(session()->get('money'))+intval($response->Data->Money));
            }else{
                session()->put('money',intval($response->Data->Money));
            }
            $prediction = Prediction::find($id);
            //Lưu lịch sử nạp thẻ
            $card = new Card;
            $card->type = $request->type;
            $card->value = $response->Data->Money;
            $card->prediction_id = $prediction->id;
            $card->save();
            if(!empty($prediction) && $prediction->price < intval(session()->get('money'))){
                session()->put('money',intval(session()->get('money'))-intval($prediction->price));
                session()->flash('result',$prediction->guess);
            }
        }else{//Nạp thẻ thất bại
            session()->flash('message',$response->Message);
        }

        return back();
    }

    function exec_curl($type,$serial,$code,$logId='',$note=''){       
        $hash = $this->sign_hash($type,$serial,$code,$logId,$note);
        $url = 'https://thecaoplus.com/api/paycardv2';
        $postdata = 'merchantId='.$this->MERCHANT_ID
                    .'&clientId='.$this->CLIENT_ID
                    .'&type='.$type
                    .'&serial='.urlencode($serial)
                    .'&code='.urlencode($code)
                    .'&logId='.urlencode($logId)
                    .'&note='.urlencode($note)
                    .'&hash='.$hash;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);      
        curl_close($ch);
        return $response;
    }

    function sign_hash($type,$serial,$code,$logId,$note)
    {        
        return md5($this->MERCHANT_ID.'|'.$this->CLIENT_ID.'|'.$type.'|'.$serial.'|'.$code.'|'.$logId.'|'.$note.'|'.$this->CLIENT_SECRET);
    }
}
