<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ento_4 extends Model
{
    public $table = 'ento_04';

    protected $fillable = [
        'district', 'gn_division', 'moh', 'ento_04_id Primary',
        'locality', 'phi', 'date_of_collection', 'user_name', 'gps_lat', 'gps_long', 'formtype', 'formid'
    ];




    public function ento_04_indoors()
    {
        return $this->hasOne(Ento_4_Indoor::class, 'ento_04_id', 'ento_04_id');
    }


    public function ento_04_outdoors()
    {
        return $this->hasOne(Ento_04_outdoor::class, 'ento_04_id', 'ento_04_id');
    }




    public function ento_04_mosq_news()
    {
        return $this->hasMany(Ento_04_mosq_new::class, 'ento_04_id_data', 'ento_04_id');
    }


    public function Ento_5_news()
    {
        return $this->hasMany(Ento_5_new::class, 'main_form_id', 'ento_04_id')->where('main_form_type', '=', 'ento_04');
    }




    public function Ento_5_new_culex_s()
    {
        return $this->hasMany(Ento_5_new::class, 'main_form_id', 'ento_04_id')->where('main_form_type', '=', 'ento_04')->where('species2', 'like', 'Culex (culex) quinquefasciatus%');
    }

    public function Ento_5_new_man_s()
    {
        return $this->hasMany(Ento_5_new::class, 'main_form_id', 'ento_04_id')->where('main_form_type', '=', 'ento_04')->where('species2', 'like', 'Mansonia%');
    }
}

