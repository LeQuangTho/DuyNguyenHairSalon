<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryUser extends Controller
{
    public function index(Request $request){
        $data = [
            'list_booking' => DB::table('task')
            ->select('ID_Task','Is_Successful_Task',DB::raw('DATE_FORMAT(Date_Task,"%d/%m/%Y") as Date,DATE_FORMAT(Date_Task,"%H:%i") as Hour'))
            ->orderBy('Is_Successful_Task','ASC')
            ->where('ID_User',Session('id_user'))->get()->toArray(),
        ];
        // pr($data);
        return view('Web\HistoryUser',$data);
    }
}
