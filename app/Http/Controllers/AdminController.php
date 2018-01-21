<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Config;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function index(){
        $cards = Card::all();
        return view('admin.index')->withCards($cards)   ;
    }

    public function login(){
        return view('admin.login');
    }

    public function changePassword(){
        return view('admin.changePassword');
    }

    public function postChangePassword(Request $request){
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6|max:32|confirmed'
        ],[
            'required' => 'Không được để trống',
            'newPassword.min' => 'Mật khẩu ít nhất 6 kí tự',
            'newPassword.max' => 'Mật khẩu nhiều nhất 32 kí tự',
            'newPassword.confirmed' => 'Nhâp lại mật khẩu không đúng'
        ]);
        $user = Auth::user();
        if (Hash::check($request->oldPassword, $user->password))
        {
            $user->password = bcrypt($request->newPassword);
            if($user->save()){
                session()->flash('message', 'Đổi mật khẩu thành công');
            }else{
                session()->flash('message', 'Đổi mật khẩu thất bại');
            }
        }else{
            session()->flash('message', 'Mật khẩu cũ không đúng');
        }
        return back();
    }

    public function config(){
        $config = Config::first();
        return view('admin.config')->withConfig($config);
    }

    public function postConfig(Request $request){
        $request->validate([
            'merchant_id' => 'required',
            'client_id' => 'required',
            'client_secret' => 'required'
        ],[
            'required' => 'Không được để trống',
        ]);

        $config = Config::first();
        if(empty($config)){
            $config = new Config;
        }

        $config->merchant_id = $request->merchant_id;
        $config->client_id = $request->client_id;
        $config->client_secret = $request->client_secret;
        if($config->save()){
            session()->flash('message', 'Cấu hình thành công');
        }else{
            session()->flash('message', 'Cấu hình thất bại');
        }
        return back();
    }

    public function register(){
        return view('admin.register');
    }
}
