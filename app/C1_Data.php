<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C1_Data extends Model
{

    public $table = 'c_1_data';

    protected $fillable = [
        'district','year','month','date',
        'c1_ID', 'name_clinic', 'no_clinic',
        'no_3_1', 'no_3_2', 'no_3_3',
        'no_4_1', 'no_4_2', 'no_4_3',
        'total_nm_5', 'No_presented_TPE','No_dirofilaria_cases','user_name','No_presented_hydrocele'
    ];
}