<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use DateTime;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    public function __construct()
    {
        
        $this->booking = new Booking();
    }
    public function index(){
        // date_default_timezone_set('Asia/Ho_Chi_Minh');
        
        $list_service = Booking::get_species_service();
        $item_service = array();
        $dm_service = array();
        $gr_service = array();
        foreach($list_service as $service){
            $gr_service[$service['ID_Species']][] = $service; 
            $dm_service[$service['ID_Species']] = $service['Name_Species'];
            $item_service[$service['ID_Service']] = $service['Name_Service'];
        }
        
        $days = array('CN', 'T2', 'T3', 'T4','T5','T6', 'T7');
        $days_then =array('Hôm nay','Ngày mai','Ngày kia');
        $date = date('Y-m-d');
        for($i = 0; $i < 3; ++$i){
            if($i>0){
                $date = date('Y-m-d',strtotime($date.'+1 day'));
            }
            $dayofweek = date('w', strtotime($date));
            $threeday[strtotime($date)] = $days_then[$i].', '.$days[$dayofweek].' ('. date('d/m',strtotime($date)).')'; 
        }
        // list tiện ích miễn phí
        $ds_tienich = array("Bỏ bớt thời gian gội, cắt sớm","Da dễ kích ứng","Hỏi kỹ trước khi cắt","Hướng dẫn vuốt sáp tại nhà","Tư vấn cắt tóc mới","Cắt - giũa móng tay");
        $data = array(
            'dm_service'    => json_encode($dm_service),
            'gr_service'    => json_encode($gr_service),
            'item_service'  => json_encode($item_service),
            'threeday'      => $threeday,
            'ds_tienich'    => $ds_tienich,
        );
        return view('Web/Booking',$data);
    }
    public function completebooking(Request $request){
        $data = $request->all();
        $sum_money = $this->booking->get_sum_money_service($data['service-item']);
        $datetask = DateTime::createFromFormat('Y-m-d H:i',date('Y-m-d',$data['date']).' '.str_replace('h',':',$data['time']));
        $id_task = time();
        $task = array(
            'ID_Task'           => $id_task,
            'Date_Task'         => $datetask,
            'Sum_Money_Task'    => $sum_money,
            'Is_Save_Photo'     => isset($data['photo']) ? 1 : 0,
            'Is_Consulting'     => isset($data['consulting']) ? 1 : 0,
            'Is_Successful_Task'=> 0,
            'Service_Free'      => $data['service-free'],
            'ID_User'           => Session('id_user'),
        );
        foreach($data['service-item'] as $service){
            $descriptiontask[] = array(
                'ID_Task'   => $id_task,
                'ID_Service'=> $service
            );
        }
        $rows = $this->booking->insert_task($task,$descriptiontask);
        alert('Thàn công','Mua hàng thành công!', 'success');
        echo $rows;exit;
    }
}
