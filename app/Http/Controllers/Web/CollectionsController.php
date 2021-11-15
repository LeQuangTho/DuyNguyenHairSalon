<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class CollectionsController extends Controller
{
    public function index(Request $request){
        $id_species_product = $request->input('sp');
        $list_product = Store::GetProduct($id_species_product);
        $data = array(
            'list_product' => $list_product,
        );
        return view('Web/Collections',$data);
    }
}
