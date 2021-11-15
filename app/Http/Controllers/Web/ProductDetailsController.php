<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Cart;
use App\Models\ProductDetails;

class ProductDetailsController extends Controller
{
    public function __construct()
    {
        
    }
    public function index(Request $request){
        $id_product = $request->input('id');
        $info_product = Store::GetInfoProduct($id_product);
        $data = array(
            'info_product' => $info_product[0],
        );
        return view('Web/ProductDetail',$data);
    }
    public function AddCart(Request $request, $id, $num){
        $product = DB::table('product')->where('ID_Product',$id)->first();
        if($product != null){
            if(Session('user')){
                $item_cart = [
                    'Amount'    => $num,
                    'ID_User'   => Session('id_user'),
                    'ID_Product'=> $id
                ];
                $newCart = ProductDetails::addCartUser($item_cart);
            }else{
                $oldCart = Session('Cart') ? Session('Cart') : null;
                $newCart = new Cart($oldCart);
                $newCart->AddCart($product,$id);
                $request->Session()->put('Cart',$newCart);
            }
            return json_encode($newCart);exit;
        }
    }
    public function DeleteItemCart(Request $request, $id){
        if(Session('user')){
            $newCart = ProductDetails::deleteItemCartUser(Session('id_user'),$id);
        }else{
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->DeleteItemCart($id);
            if($newCart->products && Count($newCart->products) > 0){
                $request->Session()->put('Cart',$newCart);
            }else{
                $request->Session()->forget('Cart');
            }
        }
        return json_encode($newCart);exit;
    }
    public function AddProductBuy(Request $request){
        $id_product = $request->buynow;
        $number = $request->number;
        $this->AddCart($request,$id_product,$number);
        return redirect('Checkout');exit;
    }
    

}
