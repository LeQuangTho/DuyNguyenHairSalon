<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Login;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index(){
        return view('Admin/Login');
    }
    public function LoginAdmin(Request $request){
        $error = 'Tài khoản không chính xác';
        $username = $request->username;
        $password = $request->password;
        $account = Login::getAccount($username);
        if($account){
            if($account->Password == sha1($password) && $account->quyen === 'admin'){
                $request->Session()->put('user',$account->UserName);
                $request->Session()->put('id_user',$account->ID_User);
                $request->Session()->put('quyen',$account->quyen);
                return redirect('Home-Admin');
            }
            $error = 'Mật khẩu không chính xác';
        }
        $data['notification'] = $error;
        return view('Admin/Login',$data);
    }
}
