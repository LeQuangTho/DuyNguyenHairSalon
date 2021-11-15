<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function SearchProduct(Request $request){
        $keySearch = $request->searchProduct;
        $products = DB::table('product')->where('Name_Product','like','%'.$keySearch.'%')->get()->toArray();
        $data = [
            'products'      =>$products,
            'countProduct'  => count($products),
            'keySearch'     => $keySearch
        ];
        return view('Web/SearchProduct',$data);
    }
}
