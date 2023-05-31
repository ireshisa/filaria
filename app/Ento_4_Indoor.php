<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ento_4_Indoor extends Model
{
    public $table = 'ento_04_indoor';
    protected $fillable = [
        'ento_04_id','pm_6_7', 'pm_7_8', 'pm_8_9', 'pm_9_10', 'pm_10_11','id',
        'pm_11_12', 'am_12_1', 'am_1_2', 'am_2_3', 'am_3_4',
        'am_4_5', 'am_5_6', 'total', 'noofbaits', 'temp6_7',
        'RH6_7', 'noofbairs7_8', 'temp7_8', 'RH7_8',
        'noofbairs8_9', 'temp8_9', 'RH8_9',
        'noofbairs9_10', 'temp9_10', 'RH9_10',
        'noofbairs10_11', 'temp10_11', 'RH10_11',
        'noofbairs11_12', 'temp11_12', 'RH11_12',
        'noofbairs12_1', 'temp12_1', 'RH12_1', 'noofbairs1_2',
        'temp1_2', 'RH1_2', 'noofbairs2_3', 'temp2_3', 'RH2_3',
        'noofbairs3_4', 'temp3_4', 'RH3_4',
        'noofbairs4_5', 'temp4_5', 'RH4_5', 'noofbairs5_6',
        'temp5_6','RH5_6','user_name','weather_condition_6_7','weather_condition_7_8','weather_condition_8_9','weather_condition_9_10','weather_condition_10_11',
        'weather_condition_11_12','weather_condition_12_1','weather_condition_1_2','weather_condition_2_3','weather_condition_3_4',
        'weather_condition_4_5','weather_condition_5_6','address'
    ];

}