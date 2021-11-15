<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductDetails extends Model
{
    public static function addCartUser($item_cart){
        $isset_item = DB::table('descriptioncart')->where([
            ['ID_User','=',$item_cart["ID_User"]],
            ['ID_Product','=',$item_cart["ID_Product"]]
        ])->first();
        if(empty($isset_item)){
            DB::table('descriptioncart')->insert($item_cart);
        }else{
            DB::table('descriptioncart')->where([
                ['ID_User','=',$item_cart["ID_User"]],
                ['ID_Product','=',$item_cart["ID_Product"]]
            ])
            ->update(['Amount'=> DB::raw('Amount+'.$item_cart['Amount'])]);
        }
        return self::getNewCart($item_cart["ID_User"]);
    }
    public static function UpdateCartUser($item_cart){
        DB::table('descriptioncart')->where([
            ['ID_User','=',$item_cart["ID_User"]],
            ['ID_Product','=',$item_cart["ID_Product"]]
        ])
        ->update(['Amount'=> $item_cart['Amount']]);
        return self::getNewCart($item_cart["ID_User"]);
    }
    public static function deleteItemCartUser($id_user,$id_product){
        DB::table('descriptioncart')->where([
            ['ID_User','=',$id_user],
            ['ID_Product','=',$id_product]
        ])
        ->delete();
        return self::getNewCart($id_user);
    }
    public static function getNewCart($id_user){
        $products = [];
        $totalPrice = 0;
        $totalQuanty = 0;
        $newcart = DB::table('descriptioncart')
        ->join('product','product.ID_Product','=','descriptioncart.ID_Product')
        ->where('ID_User',$id_user)->get()->toArray();
        foreach($newcart as $cart){
            $product = array(
                'Quanty'        => $cart->Amount,
                'price'         => $cart->Amount * $cart->Price_Product,
                'productInfo'   => $cart,  
            );
            $products[$cart->ID_Product] = $product;
            $totalPrice   += $product['price'];
            $totalQuanty  += $product['Quanty'];
        }
        return [
            'products'      => $products,
            'totalPrice'    => $totalPrice,
            'totalQuanty'   => $totalQuanty,
        ];
    }
}
