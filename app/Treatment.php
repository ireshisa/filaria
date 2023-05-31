<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
	public $table = 'treatment';
	protected $primaryKey = 'id';
	protected $fillable = [
		'id','district_lymphedema_no','full_name','gender','date_of_birth','age_in_completed','address','date_of_registration','weight','height','skin_care','elvation','movement_and_exercise','bandaging','foot_wear','psychological','screening','remarks','bmi'
	];






	public function TreatmentHistory_dates()
	{
			return $this->hasMany(TreatmentHistory::class,'district_lymphedema_no','district_lymphedema_no');
	}


}














