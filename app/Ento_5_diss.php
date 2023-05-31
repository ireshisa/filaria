<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ento_5_diss extends Model
{
    public $table = 'Ento_5_diss';

protected $fillable = [
'ento_05_id', 'species','dissected_by','dissected_by_date','examined','examined_date','total_mosqito','remarks', 'species2', 'abdo_uf', 'abdo_f','abdo_sg','abdo_g',
'no_of_spoiled', 'no_of_dissected'
    ];
}