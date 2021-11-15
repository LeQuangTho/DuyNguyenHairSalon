<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function CheckUser(Request $request){
        $sdt = 0;
        $user = $request->user;
        $check_user = Login::CheckUser($user);
        if($check_user){
            $sdt = $check_user->UserName;
        }
        echo $sdt;exit();
    }
    public function AddAccount(Request $request)
    {
        $data = $request->all();
        if($data['password1'] === $data['password2']){
            $id_user = Login::addAccount($data['completed'],$data['password1']);
            $request->Session()->put('user',$data['completed']);
            $request->Session()->put('id_user',$id_user);
            Alert('Thành công','Tạo tài khoản thành công','success');
        }
        return Redirect::to('Home');
    }
    public function Login(Request $request)
    { 
        $data = $request->all();
        $account = Login::getAccount($data['user']);
        $check_login = 0;
        if($account->Password == sha1($data['pass'])){
            $request->Session()->put('user',$account->UserName);
            $request->Session()->put('id_user',$account->ID_User);
            $check_login = 'ok';
        }
        echo json_encode($check_login);
    }
    public function Logout(Request $request)
    { 
        $request->session()->flush();
        return back();
    }
}
