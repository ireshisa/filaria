<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ento_03 extends Model
{
    public $table = 'ento_03';

    protected $fillable = [
        'district', 'moh', 'date_of_collection', 'phi', 'time_of_bait', 'gn', 'address', 'start_time_of_col', 'no_of_mosq_sp',
        'total_no_of_mosq', 'user_name', 'weather_condition', 'gps_lat', 'gps_long', 'no_of_traps',
        'name_of_heo', 'name_of_rmo_entomologist', 'ento_03_id', 'formid',
        'period_of_collection_from','period_of_collection_to'
    ];



    public function ento_03_dataes()
    {
        return $this->hasMany(Ento_03_data::class, 'ento_03_id', 'ento_03_id');
    }
}
