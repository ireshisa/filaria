<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Migrant_Follow_up extends Model
{
    public $table = 'migrant_follow';

    protected $fillable = [
        'migrant_id', 'visit_date',
        'has_treated', 'reson', 'adverse_effects',
        'mf_count', 'meassures', 'phfo_phi', 'user_name', 'blood_result', 'name_followed_officer', 'name_examined_blood_film', 'date_of_5p',
        'remarks','folloupdate','actions_taken'
    ];
}