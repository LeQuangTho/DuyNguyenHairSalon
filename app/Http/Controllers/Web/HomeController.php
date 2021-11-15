<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        // $request->session()->flush();
        // $request->session()->forget('user');
        // pr($request->session()->all());
        $data = array(
            'name'=> 'hello',
        );
        return view('Web/Home');
    }
    public function CheckLogin(Request $request){
        $login = Session('user')?'ok':'';
        
        echo $login;exit;
    }
}
