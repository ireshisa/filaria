<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ento_5 extends Model
{
    public $table = 'ento_05';

    protected $fillable = [
        'no_of_cpq', 'total_cx_quin_mosq',
        'furniture_and_fittings', 'catch_per_mh', 'man_hrs_spent',
        'clothes_and_hang', 'bed_nets', 'walls',
        'electronic', 'others',
        'main_form_type', 'main_form_id', 'user_name','district','furniture_and_fittings_mansonia','clothes_and_hang_mansonia','bed_nets_mansonia','walls_mansonia','electronic_mansonia','others_mansonia','total_mansonia_sp'
    ];
    // protected $fillable = [
    //     'resting_sites', 'no_of_cpq', 'total_cx_quin_mosq',
    //     'furniture_and_fittings', 'catch_per_mh', 'man_hrs_spent' ,
    //     'clothes_and_hang', 'bed_nets', 'walls' ,
    //     'electronic', 'others', 'dissected_by' ,
    //     'dissected_date', 'examined_by', 'examined_date' ,
    //     'main_form_type' ,
    //     'main_form_id'
    //  ]; 
}