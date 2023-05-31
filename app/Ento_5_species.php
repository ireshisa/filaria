<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ento_5_species extends Model
{
    public $table = 'ento_05_species';

    protected $fillable = [
        'ento_05_id', 'species', 'total_mosqito',
        'abdo_uf', 'abdo_f', 'abdo_sg',
        'no_of_spoiled', 'no_of_dissected',
        'dissected_by', 'dissected_by_date', 'examined',
        'examined_date', 'entered', 'entered_date', 'user_name'
    ];
}