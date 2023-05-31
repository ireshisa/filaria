<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ento_04_Mosq extends Model
{
    public $table = 'ento_04_mosq';

    protected $fillable = [
        'ento_04_mosq_id','time','mos_number','form_type','mosq_species','ento_04_id'

    ];
}
