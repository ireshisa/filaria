<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ento_01_data extends Model
{
    public $table = 'ento_01_data';
    protected $primaryKey = 'id'; // o

    protected $fillable = [
   'ento_01_id', 'ser_no', 'house_no', 'no_of_mosq','resting_place_1', 'resting_place_2', 'resting_place_3','resting_place_4', 
   'resting_place_5', 'resting_place_6','lab_positive', 'lab_no', 'ento_01_id', 'no_of_culex', 'no_of_other', 'user_name','gps_lat',
   'gps_long','anopheles','andes','armigerous','resting_place_1_mansonia', 'resting_place_2_mansonia', 
   'resting_place_3_mansonia','resting_place_4_mansonia','resting_place_5_mansonia', 'resting_place_6_mansonia','lab_positive_man',
   'lab_no_man','phm_area','no_of_pre_postive_cx','no_of_pre_postive_man',
   'abdo_uf','abdo_f','abdo_sg','abdo_g','males','abdo_uf_ma','abdo_f_ma','abdo_sg_ma','abdo_g_ma','males_ma',
//    'no_of_infrcted','no_of_infective','no_of_infrcted_ma','no_of_infective_ma','no_of_dissected','no_of_dissected_ma' 1

/* 
removed--
timeSpand
 */

    ];

    public function Ento_5_news()
    {
        return $this->hasMany(Ento_5_new::class,'main_form_data_id','id')->where('main_form_type','=', 'ento_01');
    }









}
// 1 remove this section only view from ento 5 data
























