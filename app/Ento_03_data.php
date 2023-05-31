<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ento_03_data extends Model
{
    public $table = 'ento_03_data';

    protected $fillable = [
        'ento_03_id', 'mosq_genus', 'mosq_species', 'no_of_mosq',
        'density_per_trap', 'user_name'
        ,'No_mos_1','Pool_no_1','pcr_date_rec','pcr_remarks','No_of_mos',
        'No_mos_2','Pool_no_2','ref_no_2','pcr_remarks2','pcr_date_test','ref_no_1','abdominalcondition_UF','abdominalcondition_U',
        'abdominalcondition_SG','abdominalcondition_G','head_mf','head_l1','head_l2','head_l3','thorax_mf','thorax_l1','thorax_l2',
        'thorax_l3','abdomen_mf','abdomen_l1','abdomen_l2','abdomen_l3'
    ];


    public function Ento_5_news()
    {
        return $this->hasMany(Ento_5_new::class,'main_form_data_id','id')->where('main_form_type','=', 'ento_03');
    }
}


