<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentHistory extends Model
{
	public $table = 'treatment_history';
	protected $primaryKey = 'id';
	protected $fillable = ['id','name_of_drug','Dosage','Frequency','Duration','district_lymphedema_no','type','subsequen_id'];
}

