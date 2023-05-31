<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HForm extends Model
{
    public $table = 'f1';

    protected $fillable = [
        'group_number', 'phi_name', 'district', 'moh_area',
        'town_village', 'phi_serial', 'laboratory_no',
        'date_of_blood', 'phm_area','phi_area','group_no',
        'town_or_village', 'street_of_locality',
        'no_of_films', 'no_positive', 'no_examined',
        'to_phi', 'date', 'director_campain', 'user_name','code_no'
    ];

}
