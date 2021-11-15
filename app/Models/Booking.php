<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Booking extends Model
{
    public static function get_species_service(){
        $data = SpeciesService::query()
        ->select(DB::raw('CONCAT(SUBSTRING(Price_Service, 1, LENGTH(Price_Service)-3),"K") as Price_Service')
        ,'service.ID_Species','Name_Species','ID_Service','Name_Service','Description_Service')
        ->join('service','service.ID_Species','=','speciesservice.ID_Species')
        ->orderBy('speciesservice.ID_Species','asc')->get()->toArray();
        // $data = DB::table('speciesservice')->orderBy('ID_Species','asc')->get()->toArray();
        return $data;
    }
    public function get_sum_money_service($id_service){
        return DB::table('service')
        // ->select(DB::raw('SUM(Price_Service) as sum_money'))
        ->whereIn('ID_Service',$id_service)
        ->sum('Price_Service');
    }
    public function insert_task($task,$descriptiontask){
        DB::table('task')->insert($task);
        $rows = DB::table('descriptiontask')->insertOrIgnore($descriptiontask);
        return $rows;
    }
}
