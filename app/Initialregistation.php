<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


// first 1
class Initialregistation extends Model
{
    public $table = 'initialregistation';
    protected $primaryKey = 'id'; 
    protected $fillable = [
      'name_of_patient','date_of_birth','age_in_completed_years','gender',
       'nic_no','date_of_first_clinice','date_of_registration',
       'district','telephone_mobile','telephone_home',
       'telephone_guardian','gps_point_lon',
       'bmi','civil_status','residence','living','occupation','education',
       'nationality','ethnicity','moh','phi','phm','gn_area',
       'id','district_lymphedema_no','remarks','user_name',
       'name_of_clinic','area_of_living','garama_nilladari','endemic_area_than_cuurent_residence'
       ,'address','full_name','gps_point_latitude','residentialdistrict'
    ];


    
    public function initialregistationmos()
    {
        return $this->hasOne(Initialregistationmo::class,'district_lymphedema_no','district_lymphedema_no');
    }


    public function Subsequents()
    {
        return $this->hasOne(Subsequent::class,'district_lymphedema_no','district_lymphedema_no');
    }





    // public function ento_05_new()
    // {
    //     return $this->hasManyThrough(Ento_5_new::class,Ento_01_data::class,'id','main_form_data_id');
    // }



}


