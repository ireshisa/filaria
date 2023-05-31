<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ento_02 extends Model
{
    public $table = 'ento_02';

    protected $fillable = [
        'district','moh_area', 'method', 'total_cx_quin_mosq',
        'total_traps', 'mosq_density_per_trap', 'heo',
        'date', 'rmo_ent', 'user_name' ,'gn_division','phm_area','ento_02_id','formid','weather_condition'
    ];

    // protected $hidden = [
    //     'password', 'remember_token',
    // ];


    public function ento_02_dataes()
{
    return $this->hasMany(Ento_02_data::class,'ento_02_id','ento_02_id');
}



}



