<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Migrant extends Model
{
    public $table = 'migrant';

protected $fillable = ['district', 'moh_area', 'passport',
'date', 'patient', 'gender','ag_date',
'age', 'country_of_origin', 'state',
'home_town', 'is_endemic', 'work_place_in_lk',
'work_plc_address', 'occupation', 'how_long',
'origin_contact', 'lk_contact','adress_in_sri_lanka',
'lymph', 'when_filaria','had_filaria',
'mass_drug_admin','has_family_members','has_treated',
'mosq_prevent','mosq_nets','mass_drug_when',
'collection_date','gps_long','gps_lat',
'antigen_by_ICT', 'mf_count','species_diagnosed',
'weight_of_patient','treatment_start_date','antibody_by_elisa',
'deisgnation_inv','phfo_phi','treatment_given',
'inv_date', 'user_name','result_as_blood_samear','patient_id','investigation_officer',
'treatment_given_alb','treatment_given_alb2','treatment_given_alb3','treatment_given_DEC',
'treatment_given_DEC2','treatment_given_DEC3','albendazole1','albendazole2','albendazole3','due_date_for_5p','opd_number','actions_taken','remarks',
'folloupdate','antigen_date','antibody_date'];
}

