<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cart
{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuanty =0;
     
    public function __construct($cart)
    {
        if($cart){
            $this->products     = $cart->products;
            $this->totalPrice   = $cart->totalPrice;
            $this->totalQuanty  = $cart->totalQuanty;
        }
    }
    public function AddCart($product,$id){
        $newProduct = ['Quanty' => 0,'price'=>$product->Price_Product, 'productInfo' => $product];
        if($this->products){
            if(array_key_exists($id,$this->products)){
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['Quanty']++;
        $newProduct['price'] = $newProduct['Quanty'] * $product->Price_Product;

        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->Price_Product;
        $this->totalQuanty ++;
    }
    public function DeleteItemCart($id){
        $this->totalQuanty -= $this->products[$id]['Quanty'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }
    public function UpdateItemCart($id,$quanty){
        $this->totalQuanty -= $this->products[$id]['Quanty'];
        $this->totalPrice -= $this->products[$id]['price'];

        $this->products[$id]['Quanty'] = $quanty;
        $this->products[$id]['price'] = $quanty * $this->products[$id]['productInfo']->Price_Product;

        $this->totalQuanty += $this->products[$id]['Quanty'];
        $this->totalPrice += $this->products[$id]['price'];
    }
}
