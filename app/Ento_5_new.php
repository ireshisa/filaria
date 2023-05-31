<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ento_5_new extends Model
{
    public $table = 'ento_05_new';
		protected $primaryKey = 'ento_05_new_id'; // o
    protected $fillable = [
			'ento_05_new_id','main_form_type','main_form_id','dissected_by','examined',
			'dissected_by_date','examined_date','total_cx_quin_mosq','total_mansonia_sp','address',
			'species2','positive_mosq','mq_postive_for_l3','head_mf','head_l1','head_l2','head_l3',
			'thorax_mf','thorax_l1','thorax_l2','thorax_l3','abdomen_mf','abdomen_l1','abdomen_l2',
			'abdomen_l3','remarks','confirmed','confirmed_by','user_name','no_dissected_mosquitos','main_form_data_id','received_by','type_of_parasite',
			'formid','received_by_postion','dissected_by_by_postion','examined_by_by_postion','received_by_date'
			];
}