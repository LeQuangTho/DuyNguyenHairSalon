<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{
    public function Checkout(Request $request){
        // if($id_product && $num){
        //     $productBuy = Store::GetInfoProduct($id_product)[0];
        //     $CartUser = getCartUser(Session('id_user'));
        //     if(array_key_exists($id_product,$CartUser['products'])){
        //         $CartUser['products'][$id_product]['Quanty'] += $num; 
        //         $CartUser['products'][$id_product]['price'] += $num * $productBuy->Price_Product; 
        //     }
        //     else{
        //         $CartUser['products'][$id_product]['Quanty'] = $num;
        //         $CartUser['products'][$id_product]['price'] = $num * $productBuy->Price_Product; 
        //         $CartUser['products'][$id_product]['productInfo'] = $productBuy;
        //     }
        //     $CartUser['totalPrice'] += $num * $productBuy->Price_Product;
        //     $CartUser['totalQuanty'] += $num;
        // }
        // $data= [
        //     'CartUser' => $CartUser,
        // ];
        return view('Web/Checkout');
    }
    public function purchase(Request $request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id_user = Session('id_user');
        $data = $request->all();
        // $list_products_buy = DB::table('descriptioncart')->where('ID_User',Session('id_user'))->get()->toArray();
        $cart_user = getCartUser($id_user);
        $id_bill = "B".time();
        $bill = [
            'ID_Bill'                   => $id_bill,
            'Date_Bill'                 => date('Y-m-d H:i:s'),
            'Sum_Money_Bill'            => $cart_user['totalPrice'],
            'Shipping_Fee'              => $cart_user['totalPrice'] > 500000 ? 0 : 30000,
            'Delivery_Address'          => json_encode([$data['tinh'],$data['huyen'],$data['xa']]),
            'Specific_Delivery_Address' => $data['address'],
            'Fast_Delivery'             => 0,
            'Is_Successful'             => 0,
            'ID_User'                   => $id_user,
        ];
        $descriptionbill = [];
        foreach($cart_user['products'] as $id_product => $info){
            $descriptionbill[] = [
                'ID_Bill'       => $id_bill,
                'ID_Product'    => $id_product,
                'Amount'        => $info['Quanty']
            ];
        }
        DB::table('bill')->insert($bill);
        DB::table('descriptionbill')->insert($descriptionbill);
        DB::table('descriptioncart')->where('ID_User',$id_user)->delete();
        alert('Thành công','Thanh toán hóa đơn thành công', 'success');
        return redirect('Home');
    }
}
