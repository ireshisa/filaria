<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ento_02_data extends Model
{
    public $table = 'ento_02_data';

    protected $fillable = [
        'ento_02_id', 'date', 'serial_no', 'moh_area',
        'gn_division', 'chief_occupant', 'address',
        'gps_lat', 'gps_long', 'total_cx_quin',
        'mosq_pcr', 'mosq_dis', 'tube_no',
        'pcr_date_rec', 'pcr_ref', 'pcr_date_test',
        'pcr_remarks', 'tube_no2', 'pcr_remarks2', 'user_name', 'pcr_ref_2', 'phm_area', 'no_of_traps', 'No_mos_1', 'Pool_no_1', 'ref_no_1', 'No_mos_2', 'Pool_no_2', 'ref_no_2',
        // 'no_of_infrcted','no_of_infective','no_of_dissected'
    ];



    public function Ento_5_news()
    {
        return $this->hasMany(Ento_5_new::class, 'main_form_data_id', 'id')->where('main_form_type', '=', 'ento_02');
    }
}
