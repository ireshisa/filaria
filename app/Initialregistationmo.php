<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initialregistationmo extends Model
{
    public $table = 'initialregistationmo';
    protected $primaryKey = 'id';
    protected $fillable = [
      'name_of_patient','id','date_of_first_clinic','full_name','gender','age_in_completed','address','date_of_registration','name_of_docter','date_of_first_clinic_arrendance','Arm_Left','Arm_Right','Breast_left','Breast_right','scrotortum_left','scrotortum_right','Penisleft','Penisright','no_lymhedema_left'
      ,'no_lymhedema_right','duration_on_lymhodema_month','duration_on_lymhodema_years','stage_1_Left','stage_1_right','stage_2_Left','stage_2_right','stage_3_Left','stage_3_right','stage_4_Left','stage_4_right',
      'stage_5_Left','stage_5_right','stage_6_Left','stage_7Left','stage_7_right','probable_couse_filariasis',
      'probable_couse_filariasis_fat_positive','probable_couse__cellulitis','probable_couse_recurrent_of_cellulists','probable_couse_Skin_rash','probable_couse_Thrombotic_disease','probable_couse_Past_surgery','probable_couse_Trauma','probable_couse_Obesity','probable_couse_Heart_disease'
      ,'probable_couse_Renal_disease','probable_couse_Liver_disease','probable_couse_other','civil_status_other','history_of_attacks_of_dermatoly','history_of_attacks_of_dermatoly_other','comorbidities_diabetes','comorbidities_Hypertension'
      ,'comorbidities_Ischemic','comorbidities_renal','comorbidities_liver'
      ,'comorbidities_other','history_of_microfilaria_positivity','night_blood_film_postive','antigen_postive','antibody_positive','not_diagonses_by_a_test','past_surgical_history','past_surgical_history_specify','droug_allergies','droug_allergies_specify',
      'created_at','food_allergies','food_allergies_specify','updated_at','remarks','next_clinic_data','user_name',
      'stage_6_right','district_lymphedema_no','Leg_Right','Leg_Left','clinical_presentatio','date_of_birth','age_in_completed','full_name' ,'gender','date_of_birth','age_in_completed','address'
    ];
}
