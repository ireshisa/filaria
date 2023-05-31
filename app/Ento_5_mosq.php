<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ento_5_mosq extends Model
{
    public $table = 'ento_05_mosq';

    protected $fillable = [
        'ento_05_id', 'species','total_mosqito','abdo_uf', 'abdo_f', 'abdo_sg', 'abdo_g','no_of_spoiled', 'no_of_dissected', 'dissected_by',
        'dissected_by_date', 'examined_date', 'examined','entered_date', 'entered', 'user_name',
    ];
}



// ,'address'  'species2', 'positive_mosq',
// 'head_mf', 'head_l1', 'head_l2',
//         'head_l3', 'thorax_mf', 'thorax_l1',
//         'thorax_l2', 'thorax_l3', 'abdomen_mf',
//         'abdomen_l1', 'abdomen_l2', 'abdomen_l3',
//         'remarks', 'mq_postive_for_l3'