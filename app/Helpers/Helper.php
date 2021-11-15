<?php

use App\Models\ProductDetails;

if(! function_exists('pr'))
{
    function pr($data) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit();
    }
}
if(! function_exists('getCartUser'))
{
    function getCartUser($id_user) {
        return ProductDetails::getNewCart($id_user);
    }
}
?>