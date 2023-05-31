<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Case1x_follow_up extends Model
{
    public $table = 'case_lx_follow_up';

    protected $fillable = [
        'case_lx_id', 'date', 'has_completed', 'reason',
        'adverse_effect', 'mf_count', 'meassures',
        'pfo_phi', 'user_name','blood_result','recommendation','name_followed_Officer','name_examind_blood','remarks','reporteddatefor5p'
    ];
}