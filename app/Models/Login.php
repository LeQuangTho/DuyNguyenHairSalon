<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login extends Model
{
    public static function addAccount($username,$pass){
        DB::table('account')->insert([
            'UserName' => $username,
            'Password' => sha1($pass),
        ]);
        DB::table('user')->insert([
            'Name_User'         => 'Khách hàng',
            'Phone_Number_User' => $username,
            'UserName' => $username,
        ]);
        $id = DB::getPdo()->lastInsertId();
        return $id;
    }
    public static function CheckUser($username){
        return DB::table('account')
        ->select('UserName')
        ->where('UserName',$username)->first();
    }
    public static function getAccount($username){
        return DB::table('account')
        ->join('user','user.UserName','=','account.UserName')
        ->where('account.UserName',$username)->first();
    }
}
