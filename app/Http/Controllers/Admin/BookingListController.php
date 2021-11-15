<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BookingList;
use Illuminate\Http\Request;

class BookingListController extends Controller
{
    public function __construct()
    {
        $this->Booking = new BookingList();
    }
    public function index(){
        $days = array('Chủ nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4','Thứ 5','Thứ 6', 'Thứ 7');
        $days_then =array('Hôm nay','Ngày mai','Ngày kia');
        $date = date('Y-m-d');
        for($i = 0; $i < 3; ++$i){
            if($i>0){
                $date = date('Y-m-d',strtotime($date.'+1 day'));
            }
            $dayofweek = date('w', strtotime($date));
            $threeday[strtotime($date)] = $days_then[$i].', '.$days[$dayofweek].' ('. date('d/m',strtotime($date)).')'; 
        }
        $BookingsUnfinished = $this->Booking->GetListBooking(date('Y-m-d'));
        $BookingsComplete = $this->Booking->GetBookingsComplete(date('Y-m-d'));
        $data =[
            'date_default'          => date('d/m/Y'),
            'BookingsUnfinished'    => $BookingsUnfinished,
            'BookingsComplete'      => $BookingsComplete,
            'threeday'              => $threeday,
        ];
        return view('Admin/BookingList',$data);
    }
    public function GetBookingDate(Request $request){
        $str_date = $request->str_date;
        $BookingsUnfinished = $this->Booking->GetListBooking(date('Y-m-d',$str_date));
        $BookingsComplete = $this->Booking->GetBookingsComplete(date('Y-m-d',$str_date));
        $data = [
            'BookingsUnfinished' => $BookingsUnfinished,
            'BookingsComplete'   => $BookingsComplete,
        ];
        echo json_encode($data);exit;
    }
    public function BookingComplete(Request $request){
        $rows = $this->Booking->CompleteBooking($request->all());
        echo $rows;exit;
    }
    public function DetailsTask($id){
        $detailsBooking = $this->Booking->GetDetailsBooking($id);
        echo json_encode($detailsBooking);exit;
    }
}
