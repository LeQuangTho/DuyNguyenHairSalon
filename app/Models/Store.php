<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Store extends Model
{
    public static function GetSpeciesproduct(){
        return DB::table('speciesproduct')->get()->toArray();
    }
    public static function GetProduct($id_species_product){
        return DB::table('product')
        ->where('ID_SpeciesProduct',$id_species_product)
        ->get()->toArray();
    }
    public static function GetInfoProduct($id_product){
        return DB::table('product')
        ->where('ID_Product',$id_product)
        ->get()->toArray();
    }
}
