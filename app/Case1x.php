<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Case1x extends Model
{
    public $table = 'case_lx';

    protected $fillable = [
        'district','moh_area','patient_id','date_of_rep',
        'name_of_patient','sex','age',
        'occupation','address','gps_lat','contact','inv_date',
        'gps_long','date_of_col','species_diag','period_of_residence',
        'mf_count','pslf','history','treatment_started_on','treatment_given_DEC','treatment_given_DEC2','treatment_given_DEC3','actions_taken',
        'treatment_given_alb','treatment_given_alb2','treatment_given_alb3',
        'history_of_mda','phfo_phi','investigation_officer','albendazole1','albendazole2','albendazole3',
        'investigation_officer','phfo_phi','investigation_officer','user_name','date_of_examination','slide_id_number',
        'Past_allergic_history','trading_Officer','resultOfFilariaAg','resultOfFilariaAntibody','remarks','pastaddress','wbc_dc'


    ];
}
