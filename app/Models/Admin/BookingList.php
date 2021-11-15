<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookingList extends Model
{
    public function GetListBooking($date){
        return DB::table('task')
        ->join('user','user.ID_User','=','task.ID_User')
        ->where([
            [DB::raw('DATE_FORMAT(Date_Task, "%Y-%m-%d")'),$date],
            ['Is_Successful_Task',0]
        ])->get()->toArray();
    }
    public function GetBookingsComplete($date){
        return DB::table('task')
        ->join('user','user.ID_User','=','task.ID_User')
        ->where([
            [DB::raw('DATE_FORMAT(Date_Task, "%Y-%m-%d")'),$date],
            ['Is_Successful_Task',1]
        ])->get()->toArray();
    }
    public function CompleteBooking($arr_task){
        $rows = DB::table('task')
        ->whereIn('ID_Task',$arr_task)
        ->update(['Is_Successful_Task' => 1]);
        return $rows;
    }
    public function GetDetailsBooking($id){
        $task = DB::table('task')
            ->join('user','user.ID_User','=','task.ID_User')
            ->where('Task.ID_Task',$id)
            ->get()->first();
        $bookingService = DB::table('descriptiontask')
            ->join('service','service.ID_Service','=','descriptiontask.ID_Service')
            ->where('ID_Task',$id)->get()->toArray();
        $task->service_booking = $bookingService;
        return $task;
    }
}
