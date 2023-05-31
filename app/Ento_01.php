<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ento_01 extends Model
{
    public $table = 'ento_01';

    protected $fillable = [
        'ento_01_id',
        'district', 'gn_divison', 'date',
        'moh_area', 'locality', 'start_at',
        'phi_and_phm', 'weather_condition', 'finished_at',
        'no_of_premises', 'total_time_spend', 'no_of_premises_positive',
        'mansonia_species_of_positive', 'total_mosquitos_collected', 'mansonia_spcies_of_mosquitos_collected',
        'anopheles_species', 'start_at', 'aedes_sp', 'armigerus_sp',
        'tubes_submitted', 'no_of_collectors', 'name_of_heo', 'user_name',
        'MosDensityCx','MosDensityMan','name_of_heo','formid'
    ];


    public function ento_01_dataes()
    {
        return $this->hasMany(Ento_01_data::class,'ento_01_id','ento_01_id');
    }



    
    public function ento_05_new()
    {
        return $this->hasManyThrough(Ento_5_new::class,Ento_01_data::class,'id','main_form_data_id');
    }



}


