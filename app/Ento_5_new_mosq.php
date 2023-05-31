<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ento_5_new_mosq extends Model
{
    public $table = 'ento_05_new_mosq';

    protected $fillable = ['ento_05_id','address',  'species2', 'positive_mosq','head_mf', 'head_l1',
     'head_l2','head_l3', 'thorax_mf', 'thorax_l1','thorax_l2', 'thorax_l3', 'abdomen_mf',
     'abdomen_l1', 'abdomen_l2', 'abdomen_l3','remarks', 'mq_postive_for_l3','no_dissected_mosquitos'
    ];
}



