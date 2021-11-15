<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class StoreController extends Controller
{
    function index(){
        $species_product = Store::GetSpeciesproduct();
        $data = array(
            'species_product' => $species_product,
        );
        return view('Web/Store',$data);
    }
}
