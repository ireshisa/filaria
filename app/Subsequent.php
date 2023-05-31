<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsequent extends Model
{
	public $table = 'subsequent';
	protected $primaryKey = 'id';
	protected $fillable = ['id','district_lymphedema_no','full_name','gender','date_of_birth','age_in_completed','address','date_of_registration','name_doctor','date_of_first_clinic_arrendance','Clinical_lymphedema_regular_clinic','Clinical_history_of_attacks_of_dermatoly','Clinical_other','Clinical_other_specify','history_of_attacks_yes','history_of_attacks_of_dermatoly','history_of_attacks_of_dermatoly_other','stage_1_Left','stage_1_right','stage_2_Left','stage_2_right','stage_3_Left','stage_3_right','stage_4_Left','stage_4_right','stage_5_Left','stage_5_right','stage_6_Left','stage_6_right','stage_7Left','stage_7_right','skin_care_satisfactory','skin_care_need_improvement','skin_care_no_satisfactory','elavation_satisfactory','elevation_need_improvement','elavation_not_satisfactory','movement_satisfactory','movement_need_improvement','movement_not_satisfactory','bandaging_satisfactory','bandaging_need_mprovment','bavdaging_not_satisfactory','foot_satisfactory','fast_need_improvement','fast_not_satisfactory','phychological_satsfactory','phychological_need_improvement','phychological_not_satisfactory','screening_satisfactory','screeing_need_improvement','skiscreening_not_satisfactory','remarks','next_clinic_visit','created_at','updated_at','user_name','type'
	];



	public function TreatmentHistory_dates()
	{
			return $this->hasMany(TreatmentHistory::class,'district_lymphedema_no','district_lymphedema_no');
	}



	public function TreatmentHistory_history()
	{
			return $this->hasMany(TreatmentHistory::class,'subsequen_id','id');
	}
}














