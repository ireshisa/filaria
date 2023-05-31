<?php

namespace App\Http\Controllers;

require __DIR__ . '/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use App\HForm;
use App\HFormData;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Initialregistation;
use App\Initialregistationmo;
use App\TreatmentHistory;
use App\Treatment;
use App\Subsequent;

//Initialregistation MODEL TO INSER  TO DATA 
class NewpatentController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function reg()
	{
		$district = DB::table('district')
			->orderBy('district', 'ASC')
			->select('*')
			->get();
		$data['template'] = 'newpationdata/pationdataReg';
		return view('template_user/template', compact('data'), ["district_list" => $district]);
	}

	public function pation_data_save(Request $request) // create
	{
		$data = $request->all();
		$data["user_name"] = Auth::user()->email;
		$district = $data['district'];

		if (empty($data["civil_status"])) {
			$data["civil_status"] = " ";
		}

		if (empty($data["residence"])) {
			$data["residence"] = " ";
		}

		if (empty($data["occupation"])) {
			$data["occupation"] = " ";
		}

		if (empty($data["living"])) {
			$data["living"] = " ";
		}

		if (empty($data["area_of_living"])) {
			$data["area_of_living"] = " ";
		}

		if (empty($data["education"])) {
			$data["education"] = " ";
		}

		if (empty($data["endemic_area_than_cuurent_residence"])) {
			$data["endemic_area_than_cuurent_residence"] = " ";
		}



		if ($data["civil_status"] == 'other') {
			$civil_status = $data["civil_status_other"];
		} else {
			$civil_status = $data["civil_status"];
		}

		if ($data["residence"] == 'other') {
			$residence = $data["residence_other"];
		} else {
			$residence = $data["residence"];
		}

		if ($data["occupation"] == 'other') {
			$occupation = $data["occupation_other_input"];
		} else {
			$occupation = $data["occupation"];
		}
		// $ento2=[

		$Initialregistation_data = [
			"date_of_registration" => $data["date_of_registration"],
			"district" => $data["district"],
			"residentialdistrict" => $data["residentialdistrict"],
			"district_lymphedema_no" => $data["district_lymphedema_no"],
			"name_of_patient" => $data["name_of_patient"],
			"gender" => $data["gender"],
			"date_of_birth" => $data["date_of_birth"],
			"age_in_completed_years" => $data["age_in_completed_years"],
			"nic_no" => $data["nic_no"],
			"civil_status" => $civil_status,
			"area_of_living" => $data["area_of_living"],
			"residence" => $residence,
			"living" => $data["living"],
			"education" => $data["education"],
			"occupation" => $occupation,
			"telephone_home" => $data["telephone_home"],
			"telephone_mobile" => $data["telephone_mobile"],
			"telephone_guardian" => $data["telephone_guardian"],
			"gps_point_lon" => $data["gps_point_lon"],
			"address" => $data["address"],
			"gps_point_latitude" => $data["gps_point_latitude"],
			"moh" => $data["moh"],
			"phm" => $data["phm"],
			"gn_area" => $data["gn_area"],
			"endemic_area_than_cuurent_residence" => $data["endemic_area_than_cuurent_residence"],
			"user_name" => $data["user_name"],
			"name_of_clinic" => $data["name_of_clinic"],
		];



		$success = Initialregistation::create($Initialregistation_data);
		if ($success) {
			return redirect()->back()->with('message', true);
		} else {
			return redirect()->back()->with('message', false);
		}
	}


	public function view()
	{





		if (!empty($_GET['from']) && !empty($_GET['to'])) {
			$from = $_GET['from'];
			$to = $_GET['to'];

			if (Auth::user()->role === "RMO" ||  Auth::user()->role === "PHLT") {

				$initial_registration = DB::table('initialregistation')
					->select('*')
					->orderBy('id', 'desc')
					->WhereBetween('date_of_registration', [$from, $to])
					->get();
			} else {
				$initial_registration = DB::table('initialregistation')
					->select('*')
					->orderBy('id', 'desc')
					->WhereBetween('date_of_registration', [$from, $to])
					->where('user_name', Auth::user()->email)
					->get();
			}
		} else {
			$from = "";
			$to = "";
			$initial_registration = DB::table('initialregistation')
				->select('*')
				->orderBy('id', 'desc')
				->get();
		}





		$data['template'] = 'newpationdata/pationdataReg_view';
		return view('template_user/template', compact('data'), ["Viewdata" => $initial_registration, "from" => $from, "to" => $to, "title" => "New  Patient Registration"]);
	}




	public function viewData_patinDataReg($id)
	{
		$initial_registration = DB::table('initialregistation')
			->select('*')
			->where('id', $id)
			->First();
		$district = DB::table('district')
			->orderBy('district', 'ASC')
			->select('*')
			->get();


		$from = "";
		$to = "";
		$data['template'] = 'newpationdata/pationdataRegView';
		return view('template_user/template', compact('data'), ["Viewdata" => $initial_registration, "from" => $from, "to" => $to, "district_list" => $district]);
	}



	public function printData_patinDataReg($id)
	{

		$page = 'newpationdata/printData_patinDataReg';

		$data = "";

		$initial_registration = DB::table('initialregistation')
			->select('*')
			->where('id', $id)
			->First();
		$viewData = $initial_registration;
		//  csv
		//header('Content-type: text/csv');
		//header('Content-disposition: attachment;filename=MyVerySpecial.csv');

		header('Content-Type: application/xls');
		header('Content-Disposition: attachment; filename=New Patient Registration.xls');
		echo $template = view(
			$page,
			compact('data'),
			["Viewdata" => $viewData]
		);
	}





	public function delete_patinData($id)
	{
		$res = Initialregistation::where('id', $id)->delete();
		if ($res) {
			return redirect()->back()->with('message', true);
		} else {
			return redirect()->back()->with('message', false);
		}
	}





	public function pation_data_update(Request $request) // create
	{

		$data = $request->all();
		$data["user_name"] = Auth::user()->email;
		unset($data["_token"]);







		if (empty($data["civil_status"])) {
			$data["civil_status"] = " ";
		}

		if (empty($data["residence"])) {
			$data["residence"] = " ";
		}

		if (empty($data["occupation"])) {
			$data["occupation"] = " ";
		}

		if (empty($data["living"])) {
			$data["living"] = " ";
		}

		if (empty($data["area_of_living"])) {
			$data["area_of_living"] = " ";
		}

		if (empty($data["education"])) {
			$data["education"] = " ";
		}

		if (empty($data["endemic_area_than_cuurent_residence"])) {
			$data["endemic_area_than_cuurent_residence"] = " ";
		}













		if ($data["civil_status"] == 'other') {
			$civil_status = $data["civil_status_other"];
		} else {
			$civil_status = $data["civil_status"];
		}

		if ($data["residence"] == 'other') {
			$residence = $data["residence_other"];
		} else {
			$residence = $data["residence"];
		}

		if ($data["occupation"] == 'other') {
			$occupation = $data["occupation_other_input"];
		} else {
			$occupation = $data["occupation"];
		}
		// $ento2=[

		$Initialregistation_data = [
			"date_of_registration" => $data["date_of_registration"],
			"district" => $data["district"],
			"district_lymphedema_no" => $data["district_lymphedema_no"],
			"name_of_patient" => $data["name_of_patient"],
			"gender" => $data["gender"],
			"date_of_birth" => $data["date_of_birth"],
			"age_in_completed_years" => $data["age_in_completed_years"],
			"nic_no" => $data["nic_no"],
			"civil_status" => $civil_status,
			"area_of_living" => $data["area_of_living"],
			"residence" => $residence,
			"living" => $data["living"],
			"education" => $data["education"],
			"occupation" => $occupation,
			"telephone_home" => $data["telephone_home"],
			"telephone_mobile" => $data["telephone_mobile"],
			"telephone_guardian" => $data["telephone_guardian"],
			"gps_point_lon" => $data["gps_point_lon"],
			"address" => $data["address"],
			"gps_point_latitude" => $data["gps_point_latitude"],
			"moh" => $data["moh"],
			"phm" => $data["phm"],
			"gn_area" => $data["gn_area"],
			"endemic_area_than_cuurent_residence" => $data["endemic_area_than_cuurent_residence"],
			"user_name" => $data["user_name"],
			"name_of_clinic" => $data["name_of_clinic"],

		];




		$success = Initialregistation::where('id', $data['id'])->update($Initialregistation_data);
		if ($success) {
			return redirect()->back()->with('message', true);
		} else {
			return redirect()->back()->with('message', false);
		}
	}



	// *********************************************initial_registration_mo*********************************************


	public function initial_registration_mo()
	{
		$initial_registration = DB::table('initialregistation')
			->select('*')
			->get();
		$data['template'] = 'newpationdata/pationdataReg_mo';
		return view('template_user/template', compact('data'), ["opd" => $initial_registration]);
	}



	public function getpationdata(Request $request)
	{


		$data = $request->all();



		$opd_no = $data['opd'];

		$initial_registration = DB::table('initialregistation')
			->select('*')
			->where('district_lymphedema_no', $opd_no)
			->First();





		if (!empty($initial_registration)) {

			$name_of_patient = $initial_registration->name_of_patient;
			$gender = $initial_registration->gender;
			$date_of_birth = $initial_registration->date_of_birth;
			$age_in_completed_years = $initial_registration->age_in_completed_years;
			$address_of_patient = $initial_registration->address;
			$date_of_registration = $initial_registration->date_of_registration;
			$district_lymphedema_no = $initial_registration->district_lymphedema_no;
			$name_of_clinic = $initial_registration->name_of_clinic;

			print_r($name_of_patient . ":" . $gender . ":" . $date_of_birth . ":" . $age_in_completed_years . ":" . $address_of_patient . ":" . $date_of_registration . ":" . $district_lymphedema_no	. ":" . $name_of_clinic);
		} else {
			$date_of_first_clinice = " ";
			$name_of_patient = " ";
			$gender = " ";
			$date_of_birth = " ";
			$age_in_completed_years = " ";
			$address_of_patient = " ";
			$date_of_registration = " ";
			$district_lymphedema_no = " ";
			$name_of_clinic = " ";




			print_r($name_of_patient . ":" . $gender . ":" . $date_of_birth . ":" . $age_in_completed_years . ":" . $address_of_patient . ":" . $date_of_registration . ":" . $district_lymphedema_no . ":" . $name_of_clinic);
		}
	}







	public function mopation_data_save(Request $request) // create
	{
		$data = $request->all();
		$data["user_name"] = Auth::user()->email;



		// $Arm_Left= (!empty($data["Arm_Left"])) ? " " : $data["Arm_Left"] ;//




		$Leg_Left = (!empty($data["Leg_Left"])) ? $data["Leg_Left"] : "";
		$Leg_Right = (!empty($data["Leg_Right"])) ? $data["Leg_Right"] : "";

		$Arm_Left = (!empty($data["Arm_Left"])) ? $data["Arm_Left"] : "";
		$Arm_Right = (!empty($data["Arm_Right"])) ? $data["Arm_Right"] : "";
		$Breast_left = (!empty($data["Breast_left"])) ? $data["Breast_left"] : "";
		$Breast_right = (!empty($data["Breast_right"])) ? $data["Breast_right"] : "";
		$scrotortum_left = (!empty($data["scrotortum_left"])) ? $data["scrotortum_left"] : "";
		$scrotortum_right = (!empty($data["scrotortum_right"])) ? $data["scrotortum_right"] : "";

		$Penisleft = (!empty($data["Penisleft"])) ? $data["Penisleft"] : "";
		$Penisright = (!empty($data["Penisright"])) ? $data["Penisright"] : "";
		$no_lymhedema_left = (!empty($data["no_lymhedema_left"])) ? $data["no_lymhedema_left"] : "";
		$no_lymhedema_right = (!empty($data["no_lymhedema_right"])) ? $data["no_lymhedema_right"] : "";




		$data["past_surgical_history"] = (!empty($data["past_surgical_history"])) ? $data["past_surgical_history"] : "";
		$data["droug_allergies"] = (!empty($data["droug_allergies"])) ? $data["droug_allergies"] : "";
		$data["food_allergies"] = (!empty($data["food_allergies"])) ? $data["food_allergies"] : "";





		// 		past_surgical_history_specify
		// past_surgical_history


		$stage_1_Left = $stage_1_Left = (!empty($data["stage_1_Left"])) ? $data["stage_1_Left"] : "";
		$stage_1_right = $stage_1_right = (!empty($data["stage_1_right"])) ? $data["stage_1_right"] : "";
		$stage_2_Left = $stage_2_Left = (!empty($data["stage_2_Left"])) ? $data["stage_2_Left"] : "";
		$stage_2_right = $stage_2_right = (!empty($data["stage_2_right"])) ? $data["stage_2_right"] : "";
		$stage_3_Left = $stage_3_Left = (!empty($data["stage_3_Left"])) ? $data["stage_3_Left"] : "";
		$stage_3_right = $stage_3_right = (!empty($data["stage_3_right"])) ? $data["stage_3_right"] : "";
		$stage_4_Left = $stage_4_Left = (!empty($data["stage_4_Left"])) ? $data["stage_4_Left"] : "";
		$stage_4_right = $stage_4_right = (!empty($data["stage_4_right"])) ? $data["stage_4_right"] : "";
		$stage_5_Left = $stage_5_Left = (!empty($data["stage_5_Left"])) ? $data["stage_5_Left"] : "";
		$stage_5_right = $stage_5_right = (!empty($data["stage_5_right"])) ? $data["stage_5_right"] : "";
		$stage_6_Left = $stage_6_Left = (!empty($data["stage_6_Left"])) ? $data["stage_6_Left"] : "";
		$stage_6_right = $stage_6_right = (!empty($data["stage_6_right"])) ? $data["stage_6_right"] : "";
		$stage_7Left = $stage_7Left = (!empty($data["stage_7Left"])) ? $data["stage_7Left"] : "";
		$stage_7_right = (!empty($data["stage_7_right"])) ? $data["stage_7_right"] : "";


		$probable_couse_filariasis = (!empty($data["probable_couse_filariasis"])) ? $data["probable_couse_filariasis"] : "";
		$probable_couse_filariasis_fat_positive = (!empty($data["probable_couse_filariasis_fat_positive"])) ? $data["probable_couse_filariasis_fat_positive"] : "";
		$probable_couse__cellulitis = (!empty($data["probable_couse__cellulitis"])) ? $data["probable_couse__cellulitis"] : "";
		$probable_couse_recurrent_of_cellulists = (!empty($data["probable_couse_recurrent_of_cellulists"])) ? $data["probable_couse_recurrent_of_cellulists"] : "";
		$probable_couse_Skin_rash = (!empty($data["probable_couse_Skin_rash"])) ? $data["probable_couse_Skin_rash"] : "";
		$probable_couse_Thrombotic_disease = (!empty($data["probable_couse_Thrombotic_disease"])) ? $data["probable_couse_Thrombotic_disease"] : "";
		$probable_couse_Past_surgery = (!empty($data["probable_couse_Past_surgery"])) ? $data["probable_couse_Past_surgery"] : "";
		$probable_couse_Trauma = (!empty($data["probable_couse_Trauma"])) ? $data["probable_couse_Trauma"] : "";
		$probable_couse_Obesity = (!empty($data["probable_couse_Obesity"])) ? $data["probable_couse_Obesity"] : "";
		$probable_couse_Heart_disease = (!empty($data["probable_couse_Heart_disease"])) ? $data["probable_couse_Heart_disease"] : "";
		$probable_couse_Renal_disease = (!empty($data["probable_couse_Renal_disease"])) ? $data["probable_couse_Renal_disease"] : "";
		$probable_couse_Liver_disease = (!empty($data["probable_couse_Liver_disease"])) ? $data["probable_couse_Liver_disease"] : "";
		$probable_couse_other = (!empty($data["probable_couse_other"])) ? $data["probable_couse_other"] : "";


		$clinical_presentatio = ($data["clinical_presentatio"] == "other") ? $data["civil_status_other"] : $data["clinical_presentatio"];
		$history_of_attacks_of_dermatoly = ($data["history_of_attacks_of_dermatoly"] == "other") ? $data["history_of_attacks_of_dermatoly_other"] : $data["history_of_attacks_of_dermatoly"];


		$comorbidities_diabetes = (!empty($data["comorbidities_diabetes"])) ? $data["comorbidities_diabetes"] : "";
		$comorbidities_Hypertension = (!empty($data["comorbidities_Hypertension"])) ? $data["comorbidities_Hypertension"] : "";
		$comorbidities_Ischemic = (!empty($data["comorbidities_Ischemic"])) ? $data["comorbidities_Ischemic"] : "";
		$comorbidities_renal = (!empty($data["comorbidities_renal"])) ? $data["comorbidities_renal"] : "";
		$comorbidities_liver = (!empty($data["comorbidities_liver"])) ? $data["comorbidities_liver"] : "";



		$night_blood_film_postive = (!empty($data["night_blood_film_postive"])) ? $data["night_blood_film_postive"] : "";
		$antigen_postive = (!empty($data["antigen_postive"])) ? $data["antigen_postive"] : "";
		$antibody_positive = (!empty($data["antibody_positive"])) ? $data["antibody_positive"] : "";
		$not_diagonses_by_a_test = (!empty($data["not_diagonses_by_a_test"])) ? $data["not_diagonses_by_a_test"] : "";



		$past_surgical_history = ($data["past_surgical_history"] == "yes") ? $data["past_surgical_history_specify"] : $data["past_surgical_history"];
		$droug_allergies = ($data["droug_allergies"] == "yes") ? $data["droug_allergies_specify"] : $data["droug_allergies"];
		$food_allergies = ($data["food_allergies"] == "yes") ? $data["food_allergies_specify"] : $data["food_allergies"];

		$history_of_microfilaria_positivity = (!empty($data["history_of_microfilaria_positivity"])) ? $data["history_of_microfilaria_positivity"] : "";

		$Initialregistation_data = [
			"Leg_Left" => $Leg_Left,
			"Leg_Right" => $Leg_Right,
			"name_of_docter" => $data["name_of_docter"],
			"date_of_first_clinic_arrendance" => $data["date_of_first_clinic_arrendance"],
			"Arm_Left" => $Arm_Left,
			"Arm_Right" => $Arm_Right,
			"Breast_left" => $Breast_left,
			"Breast_right" => $Breast_right,
			"scrotortum_left" => $scrotortum_left,
			"scrotortum_right" => $scrotortum_right,
			"Penisleft" => $Penisleft,
			"Penisright" => $Penisright,
			"no_lymhedema_left" => $no_lymhedema_left,
			"no_lymhedema_right" => $no_lymhedema_right,
			"duration_on_lymhodema_month" => $data["duration_on_lymhodema_month"],
			"duration_on_lymhodema_years" => $data["duration_on_lymhodema_years"],
			"stage_1_Left" => $stage_1_Left,
			"stage_1_right" => $stage_1_right,
			"stage_2_Left" => $stage_2_Left,
			"stage_2_right" => $stage_2_right,
			"stage_3_Left" => $stage_3_Left,
			"stage_3_right" => $stage_3_right,
			"stage_4_Left" => $stage_4_Left,
			"stage_4_right" => $stage_4_right,
			"stage_5_Left" => $stage_5_Left,
			"stage_5_right" => $stage_5_right,
			"stage_6_Left" => $stage_6_Left,
			"stage_6_right" => $stage_6_right,
			"stage_7Left" => $stage_7Left,
			"stage_7_right" => $stage_7_right,
			"probable_couse_filariasis" => $probable_couse_filariasis,
			"probable_couse_filariasis_fat_positive" => $probable_couse_filariasis_fat_positive,
			"probable_couse__cellulitis" => $probable_couse__cellulitis,
			"probable_couse_recurrent_of_cellulists" => $probable_couse_recurrent_of_cellulists,
			"probable_couse_Skin_rash" => $probable_couse_Skin_rash,
			"probable_couse_Thrombotic_disease" => $probable_couse_Thrombotic_disease,
			"probable_couse_Past_surgery" => $probable_couse_Past_surgery,
			"probable_couse_Trauma" => $probable_couse_Trauma,
			"probable_couse_Obesity" => $probable_couse_Obesity,
			"probable_couse_Heart_disease" => $probable_couse_Heart_disease,
			"probable_couse_Renal_disease" => $probable_couse_Renal_disease,
			"probable_couse_Liver_disease" => $probable_couse_Liver_disease,
			"probable_couse_other" => $probable_couse_other,
			"clinical_presentatio" => $clinical_presentatio,
			"history_of_attacks_of_dermatoly" => $history_of_attacks_of_dermatoly,
			"comorbidities_other" => $data["comorbidities_other"],
			"comorbidities_diabetes" => $comorbidities_diabetes,
			"comorbidities_Hypertension" => $comorbidities_Hypertension,
			"comorbidities_Ischemic" => $comorbidities_Ischemic,
			"comorbidities_renal" => $comorbidities_renal,
			"comorbidities_liver" => $comorbidities_liver,
			"history_of_microfilaria_positivity" => $history_of_microfilaria_positivity,
			"night_blood_film_postive" => $night_blood_film_postive,
			"antigen_postive" => $antigen_postive,
			"antibody_positive" => $antibody_positive,
			"not_diagonses_by_a_test" => $not_diagonses_by_a_test,
			"past_surgical_history" => $past_surgical_history,
			"droug_allergies" => $droug_allergies,
			"food_allergies" => $food_allergies,
			"next_clinic_data" => $data["next_clinic_data"],
			"date_of_birth" => $data["date_of_birth"],
			"age_in_completed" => $data["age_in_completed"],
			"address" => $data["address"],
			"date_of_registration" => $data["date_of_registration"],
			"district_lymphedema_no" => $data["district_lymphedema_no"],
			"full_name" => $data["full_name"],
			"gender" => $data["gender"],
			"address" => $data["address"],
			"remarks" => $data["remarks"]
		];


		$success = Initialregistationmo::create($Initialregistation_data);
		if ($success) {
			if (!empty($data["treatment"])) {
				return redirect('treatment');
			}



			return redirect()->back()->with('message', true);
		} else {
			return redirect()->back()->with('message', false);
		}
	}





	public function initial_registration_mo_view()
	{

		if (!empty($_GET['from']) && !empty($_GET['to'])) {
			$from = $_GET['from'];
			$to = $_GET['to'];



			if (Auth::user()->role === "RMO" ||  Auth::user()->role === "PHLT" ||  Auth::user()->role === "ADMIN") {
				$initial_registration = DB::table('initialregistationmo')
					->select('*')
					->orderBy('id', 'desc')
					->WhereBetween('date_of_first_clinic_arrendance', [$from, $to])
					->get();
			} else {
				$initial_registration = DB::table('initialregistationmo')
					->select('*')
					->orderBy('id', 'desc')
					->WhereBetween('date_of_first_clinic_arrendance', [$from, $to])
					->where('user_name', Auth::user()->email)
					->get();
			}
		} else {
			$from = "";
			$to = "";


			if (Auth::user()->role === "RMO" ||  Auth::user()->role === "PHLT" ||  Auth::user()->role === "ADMIN") {
				$initial_registration = DB::table('initialregistationmo')
					->select('*')
					->get();
			} else {

				$initial_registration = DB::table('initialregistationmo')
					->select('*')
					->where('user_name', Auth::user()->email)
					->get();
			}
		}


		$data['template'] = 'newpationdata/pationdataReg_mo_view';
		return view('template_user/template', compact('data'), ["Viewdata" => $initial_registration, "from" => $from, "to" => $to, "title" => "Clinical Assessment"]);
	}


	public function registration_mo_delete($id)
	{
		$res = Initialregistationmo::where('id', $id)->delete();
		if ($res) {
			return redirect()->back()->with('message', true);
		} else {
			return redirect()->back()->with('message', false);
		}
	}




	public function viewData_patinMoDataReg($id)
	{
		$initial_registration = DB::table('initialregistationmo')
			->select('*')
			->where('id', $id)
			->First();


		$initial_registration1 = DB::table('initialregistationmo')
			->select('*')
			->where('id', $id)
			->get();

		$data['template'] = 'newpationdata/viewData_patinMoDataReg';
		return view('template_user/template', compact('data'), ["Viewdata" => $initial_registration, "opd" => $initial_registration1]);
	}





	public function printData_patinMoDataReg($id)
	{

		$data = "";
		$initial_registration = DB::table('initialregistationmo')
			->select('*')
			->where('id', $id)
			->First();

		$initial_registration1 = DB::table('initialregistationmo')
			->select('*')
			->where('id', $id)
			->get();




		header('Content-Type: application/xls');
		header('Content-Disposition: attachment; filename=Clinical Assessment.xls');

		$page = 'newpationdata/printData_patinMoDataReg';
		echo $template = view(
			$page,
			compact('data'),
			["Viewdata" => $initial_registration]
		);
	}




	public function mopation_data_update(Request $request) // create
	{
		$data = $request->all();
		$data["user_name"] = Auth::user()->email;
		// $success = Initialregistationmo::create($data);
		$treatment = 0;
		if (!empty($data["treatment"])) {
			$treatment = 1;
		}

		$data = $request->all();
		$data["user_name"] = Auth::user()->email;

		$Leg_Left = (!empty($data["Leg_Left"])) ? $data["Leg_Left"] : "";
		$Leg_Right = (!empty($data["Leg_Right"])) ? $data["Leg_Right"] : "";
		$Arm_Left = (!empty($data["Arm_Left"])) ? $data["Arm_Left"] : "";
		$Arm_Right = (!empty($data["Arm_Right"])) ? $data["Arm_Right"] : "";
		$Breast_left = (!empty($data["Breast_left"])) ? $data["Breast_left"] : "";
		$Breast_right = (!empty($data["Breast_right"])) ? $data["Breast_right"] : "";
		$scrotortum_left = (!empty($data["scrotortum_left"])) ? $data["scrotortum_left"] : "";
		$scrotortum_right = (!empty($data["scrotortum_right"])) ? $data["scrotortum_right"] : "";
		$Penisleft = (!empty($data["Penisleft"])) ? $data["Penisleft"] : "";
		$Penisright = (!empty($data["Penisright"])) ? $data["Penisright"] : "";
		$no_lymhedema_left = (!empty($data["no_lymhedema_left"])) ? $data["no_lymhedema_left"] : "";
		$no_lymhedema_right = (!empty($data["no_lymhedema_right"])) ? $data["no_lymhedema_right"] : "";
		$stage_1_Left = $stage_1_Left = (!empty($data["stage_1_Left"])) ? $data["stage_1_Left"] : "";
		$stage_1_right = $stage_1_right = (!empty($data["stage_1_right"])) ? $data["stage_1_right"] : "";
		$stage_2_Left = $stage_2_Left = (!empty($data["stage_2_Left"])) ? $data["stage_2_Left"] : "";
		$stage_2_right = $stage_2_right = (!empty($data["stage_2_right"])) ? $data["stage_2_right"] : "";
		$stage_3_Left = $stage_3_Left = (!empty($data["stage_3_Left"])) ? $data["stage_3_Left"] : "";
		$stage_3_right = $stage_3_right = (!empty($data["stage_3_right"])) ? $data["stage_3_right"] : "";
		$stage_4_Left = $stage_4_Left = (!empty($data["stage_4_Left"])) ? $data["stage_4_Left"] : "";
		$stage_4_right = $stage_4_right = (!empty($data["stage_4_right"])) ? $data["stage_4_right"] : "";
		$stage_5_Left = $stage_5_Left = (!empty($data["stage_5_Left"])) ? $data["stage_5_Left"] : "";
		$stage_5_right = $stage_5_right = (!empty($data["stage_5_right"])) ? $data["stage_5_right"] : "";
		$stage_6_Left = $stage_6_Left = (!empty($data["stage_6_Left"])) ? $data["stage_6_Left"] : "";
		$stage_6_right = $stage_6_right = (!empty($data["stage_6_right"])) ? $data["stage_6_right"] : "";
		$stage_7Left = $stage_7Left = (!empty($data["stage_7Left"])) ? $data["stage_7Left"] : "";
		$stage_7_right = (!empty($data["stage_7_right"])) ? $data["stage_7_right"] : "";



		$data["past_surgical_history"] = (!empty($data["past_surgical_history"])) ? $data["past_surgical_history"] : "";

		$data["food_allergies"] = (!empty($data["food_allergies"])) ? $data["food_allergies"] : "";


		$probable_couse_filariasis = (!empty($data["probable_couse_filariasis"])) ? $data["probable_couse_filariasis"] : "";
		$probable_couse_filariasis_fat_positive = (!empty($data["probable_couse_filariasis_fat_positive"])) ? $data["probable_couse_filariasis_fat_positive"] : "";
		$probable_couse__cellulitis = (!empty($data["probable_couse__cellulitis"])) ? $data["probable_couse__cellulitis"] : "";
		$probable_couse_recurrent_of_cellulists = (!empty($data["probable_couse_recurrent_of_cellulists"])) ? $data["probable_couse_recurrent_of_cellulists"] : "";
		$probable_couse_Skin_rash = (!empty($data["probable_couse_Skin_rash"])) ? $data["probable_couse_Skin_rash"] : "";
		$probable_couse_Thrombotic_disease = (!empty($data["probable_couse_Thrombotic_disease"])) ? $data["probable_couse_Thrombotic_disease"] : "";
		$probable_couse_Past_surgery = (!empty($data["probable_couse_Past_surgery"])) ? $data["probable_couse_Past_surgery"] : "";
		$probable_couse_Trauma = (!empty($data["probable_couse_Trauma"])) ? $data["probable_couse_Trauma"] : "";
		$probable_couse_Obesity = (!empty($data["probable_couse_Obesity"])) ? $data["probable_couse_Obesity"] : "";
		$probable_couse_Heart_disease = (!empty($data["probable_couse_Heart_disease"])) ? $data["probable_couse_Heart_disease"] : "";
		$probable_couse_Renal_disease = (!empty($data["probable_couse_Renal_disease"])) ? $data["probable_couse_Renal_disease"] : "";
		$probable_couse_Liver_disease = (!empty($data["probable_couse_Liver_disease"])) ? $data["probable_couse_Liver_disease"] : "";
		$probable_couse_other = (!empty($data["probable_couse_other"])) ? $data["probable_couse_other"] : "";


		$clinical_presentatio = ($data["clinical_presentatio"] == "other") ? $data["civil_status_other"] : $data["clinical_presentatio"];



		$comorbidities_diabetes = (!empty($data["comorbidities_diabetes"])) ? $data["comorbidities_diabetes"] : "";
		$comorbidities_Hypertension = (!empty($data["comorbidities_Hypertension"])) ? $data["comorbidities_Hypertension"] : "";
		$comorbidities_Ischemic = (!empty($data["comorbidities_Ischemic"])) ? $data["comorbidities_Ischemic"] : "";
		$comorbidities_renal = (!empty($data["comorbidities_renal"])) ? $data["comorbidities_renal"] : "";
		$comorbidities_liver = (!empty($data["comorbidities_liver"])) ? $data["comorbidities_liver"] : "";


		$droug_allergies = (!empty($data["droug_allergies"])) ? $data["droug_allergies"] : "";








		$night_blood_film_postive = (!empty($data["night_blood_film_postive"])) ? $data["night_blood_film_postive"] : "";
		$antigen_postive = (!empty($data["antigen_postive"])) ? $data["antigen_postive"] : "";
		$antibody_positive = (!empty($data["antibody_positive"])) ? $data["antibody_positive"] : "";
		$not_diagonses_by_a_test = (!empty($data["not_diagonses_by_a_test"])) ? $data["not_diagonses_by_a_test"] : "";
		$past_surgical_history = ($data["past_surgical_history"] == "yes") ? $data["past_surgical_history_specify"] : $data["past_surgical_history"];
		$history_of_attacks_of_dermatoly =	$past_surgical_history;
		$food_allergies = ($data["food_allergies"] == "yes") ? $data["food_allergies_specify"] : $data["food_allergies"];








		$history_of_microfilaria_positivity = (!empty($data["history_of_microfilaria_positivity"])) ? $data["history_of_microfilaria_positivity"] : "";

		$Initialregistation_data = [

			"Leg_Left" => $Leg_Left,
			"Leg_Right" => $Leg_Right,
			"name_of_docter" => $data["name_of_docter"],
			"date_of_first_clinic_arrendance" => $data["date_of_first_clinic_arrendance"],
			"Arm_Left" => $Arm_Left,
			"Arm_Right" => $Arm_Right,
			"Breast_left" => $Breast_left,
			"Breast_right" => $Breast_right,
			"scrotortum_left" => $scrotortum_left,
			"scrotortum_right" => $scrotortum_right,
			"Penisleft" => $Penisleft,
			"Penisright" => $Penisright,
			"no_lymhedema_left" => $no_lymhedema_left,
			"no_lymhedema_right" => $no_lymhedema_right,
			"duration_on_lymhodema_month" => $data["duration_on_lymhodema_month"],
			"duration_on_lymhodema_years" => $data["duration_on_lymhodema_years"],
			"stage_1_Left" => $stage_1_Left,
			"stage_1_right" => $stage_1_right,
			"stage_2_Left" => $stage_2_Left,
			"stage_2_right" => $stage_2_right,
			"stage_3_Left" => $stage_3_Left,
			"stage_3_right" => $stage_3_right,
			"stage_4_Left" => $stage_4_Left,
			"stage_4_right" => $stage_4_right,
			"stage_5_Left" => $stage_5_Left,
			"stage_5_right" => $stage_5_right,
			"stage_6_Left" => $stage_6_Left,
			"stage_6_right" => $stage_6_right,
			"stage_7Left" => $stage_7Left,
			"stage_7_right" => $stage_7_right,
			"probable_couse_filariasis" => $probable_couse_filariasis,
			"probable_couse_filariasis_fat_positive" => $probable_couse_filariasis_fat_positive,
			"probable_couse__cellulitis" => $probable_couse__cellulitis,
			"probable_couse_recurrent_of_cellulists" => $probable_couse_recurrent_of_cellulists,
			"probable_couse_Skin_rash" => $probable_couse_Skin_rash,
			"probable_couse_Thrombotic_disease" => $probable_couse_Thrombotic_disease,
			"probable_couse_Past_surgery" => $probable_couse_Past_surgery,
			"probable_couse_Trauma" => $probable_couse_Trauma,
			"probable_couse_Obesity" => $probable_couse_Obesity,
			"probable_couse_Heart_disease" => $probable_couse_Heart_disease,
			"probable_couse_Renal_disease" => $probable_couse_Renal_disease,
			"probable_couse_Liver_disease" => $probable_couse_Liver_disease,
			"probable_couse_other" => $probable_couse_other,
			"clinical_presentatio" => $clinical_presentatio,
			"history_of_attacks_of_dermatoly" => $history_of_attacks_of_dermatoly,
			"comorbidities_other" => $data["comorbidities_other"],
			"comorbidities_diabetes" => $comorbidities_diabetes,
			"comorbidities_Hypertension" => $comorbidities_Hypertension,
			"comorbidities_Ischemic" => $comorbidities_Ischemic,
			"comorbidities_renal" => $comorbidities_renal,
			"comorbidities_liver" => $comorbidities_liver,
			"history_of_microfilaria_positivity" => $history_of_microfilaria_positivity,
			"night_blood_film_postive" => $night_blood_film_postive,
			"antigen_postive" => $antigen_postive,
			"antibody_positive" => $antibody_positive,
			"not_diagonses_by_a_test" => $not_diagonses_by_a_test,
			"past_surgical_history" => $past_surgical_history,
			"droug_allergies" => $droug_allergies,
			"droug_allergies_specify" => $data["droug_allergies_specify"],
			"remarks" => $data["remarks"],
			"food_allergies" => $food_allergies,
			"next_clinic_data" => $data["next_clinic_data"],
			"date_of_birth" => $data["date_of_birth"],
			"age_in_completed" => $data["age_in_completed"],
			"address" => $data["address"],
			"date_of_registration" => $data["date_of_registration"],
			"district_lymphedema_no" => $data["district_lymphedema_no"],
			"full_name" => $data["full_name"],
			"gender" => $data["gender"],
			"address" => $data["address"],
		];

		/* 		dd($Initialregistation_data); */

		$success = Initialregistationmo::where('id', $data['id'])->update($Initialregistation_data);

		if ($success) {
			if ($treatment == 1) {
				return redirect('treatment');
			}
			return redirect()->back()->with('message', true);
		} else {
			return redirect()->back()->with('message', false);
		}
	}


	// treatment



	public function treatment()
	{

		$initial_registration = DB::table('initialregistation')
			->select('*')
			->get();

		$data['template'] = 'newpationdata/treatment_add_new';
		return view('template_user/template', compact('data'), ["opd" => $initial_registration]);
	}




	public function getbodydetails($value)
	{

		$Viewdata = DB::table('initialregistationmo')
			->select('*')
			->where('district_lymphedema_no', $value)
			->First();

		$data = "";

		return view('newpationdata/viewData_patinMoDataReg2', compact('data'), ["Viewdata" => $Viewdata]);
	}










	public function getpationdata2($value)
	{
		$initial_registration = DB::table('initialregistationmo')
			->select('*')
			->where('opd_no', $value)
			->First();




		$initial_registration_first = DB::table('initialregistation')
			->select('*')
			->where('opd_no', $value)
			->First();


		$weight = $initial_registration_first->weight;

		//faind  this opd number before inset
		// (hided or show relevant section subvisit initial)

		$treatment = DB::table('treatment')
			->select('*')
			->where('opd_no_fk', $value)
			->First();

		if (!empty($treatment)) {
			$treatment_availability = "available";
		} else {
			$treatment_availability = "unavailable";
		}
		//faind  this opd number before inset
		// (hided or show relevant section subvisit initial)

		if (!empty($initial_registration)) {
			$full_name = $initial_registration->full_name;
			$age_in_completed = $initial_registration->age_in_completed;
			$gender = $initial_registration->gender;
			$address = $initial_registration->address;
			$district_lymphedema_no = $initial_registration->district_lymphedema_no;
			$stage_of_disease_at_registration = $initial_registration->stage_of_disease_at_registration;
			$co_morbidities = $initial_registration->co_morbidities;
			print_r($full_name . ":" . $age_in_completed . ":" . $gender . ":" . $address . ":" . $district_lymphedema_no . ":" . $stage_of_disease_at_registration . ":" . $co_morbidities . ":" . $treatment_availability . ":" . $weight);
		} else {
			print_r(" " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " ");
		}
	}





	public function gettreatmentHistory($value)
	{

		$initial_registration = DB::table('treatment')
			->select('*')
			->where('opd_no_fk', $value)
			->First();
		//faind  this opd number before inset
		// (hided or show relevant section subvisit initial)
		if (!empty($initial_registration)) {
			$body_weight = $initial_registration->body_weight;
			$stage_of_disease = $initial_registration->stage_of_disease;
			$habits = $initial_registration->habits;
			$allergies = $initial_registration->allergies;
			$at_clinice_visite_le_without = $initial_registration->at_clinice_visite_le_without;
			$at_clinice_visite_le_with = $initial_registration->at_clinice_visite_le_with;
			$at_clinice_visite_patient_give = $initial_registration->at_clinice_visite_patient_give;

			$health_education_on_washing = $initial_registration->health_education_on_washing;
			$health_education_on_limb = $initial_registration->health_education_on_limb;
			$correct_technice_of_wearing = $initial_registration->correct_technice_of_wearing;
			$sub_at_clinice_visite_le_without = $initial_registration->sub_at_clinice_visite_le_without;
			$sub_at_clinice_visite_le_with = $initial_registration->sub_at_clinice_visite_le_with;
			$sub_at_clinice_visite_patient_give = $initial_registration->sub_at_clinice_visite_patient_give;
			$patient_following_advice = $initial_registration->patient_following_advice;
			$remarks = $initial_registration->remarks;
			$next_appoinment = $initial_registration->next_appoinment;

			$at_clinice_visite_le_without = $initial_registration->at_clinice_visite_le_without;
			$at_clinice_visite_le_with = $initial_registration->at_clinice_visite_le_with;
			$at_clinice_visite_patient_give = $initial_registration->at_clinice_visite_patient_give;
			$sub_at_clinice_visite_le_without = $initial_registration->sub_at_clinice_visite_le_without;
			$sub_at_clinice_visite_le_with = $initial_registration->sub_at_clinice_visite_le_with;
			$sub_at_clinice_visite_patient_give = $initial_registration->sub_at_clinice_visite_patient_give;




			print_r($body_weight . ":" . $stage_of_disease . ":" . $habits . ":" . $allergies . ":" . $at_clinice_visite_le_without . ":" . $at_clinice_visite_le_with . ":" . $at_clinice_visite_patient_give . ":" . $health_education_on_washing . ":" . $health_education_on_limb . ":" . $correct_technice_of_wearing . ":" . $sub_at_clinice_visite_le_without . ":" . $sub_at_clinice_visite_le_with . ":" . $sub_at_clinice_visite_patient_give . ":" . $patient_following_advice . ":" . $remarks . ":" . $next_appoinment . ":" . $at_clinice_visite_le_without . ":" . $at_clinice_visite_le_with . ":" . $at_clinice_visite_patient_give . ":" . $sub_at_clinice_visite_le_without . ":" . $sub_at_clinice_visite_le_with . ":" . $sub_at_clinice_visite_patient_give);
		} else {
			print_r(" " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " ");
		}
	}









	public function getintialtableHistory($value)
	{

		$getintialtableHistory = DB::table('treatment_history')
			->select('*')
			->where('opd_num', $value)
			->where('treatment_type', 'first')
			->get();

		foreach ($getintialtableHistory as $key) {

			$date = $key->date;
			$name_of_drug = $key->name_of_drug;
			$per_day = $key->per_day;
			$no_of_days = $key->no_of_days;
			$dose = $key->dose;
			$prescribing_doctor = $key->prescribing_doctor;
			$VisitNo = $key->VisitNo;
			$id = $key->id;
			echo "<tr>
			         <td>$date</td>
			         <td>$name_of_drug</td>
			         <td>$per_day</td>
			         <td>$no_of_days</td>
			         <td>$dose	</td>
			         <td>$prescribing_doctor</td>
			         <td>$VisitNo</td>
							 <td  class='deletetd'><a onclick='return confirm(&apos;Are you sure Delete this record?&apos;)' href='" . url('/treatmentHistry_delete') . "/" . $id . "' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i> Delete </a>
							 </td>
		      </tr>";
		}
	}



	public function getsubvisitTableHistory($value)
	{

		$getintialtableHistory = DB::table('treatment_history')
			->select('*')
			->where('opd_num', $value)
			->where('treatment_type', 'subvisite')
			->get();

		foreach ($getintialtableHistory as $key) {

			$date = $key->date;
			$name_of_drug = $key->name_of_drug;
			$per_day = $key->per_day;
			$no_of_days = $key->no_of_days;
			$dose = $key->dose;
			$prescribing_doctor = $key->prescribing_doctor;
			$VisitNo = $key->VisitNo;
			$id = $key->id;
			echo "<tr>
			         <td>$date</td>
			         <td>$name_of_drug</td>
			         <td>$per_day</td>
			         <td>$no_of_days</td>
			         <td>$dose	</td>
			         <td>$prescribing_doctor</td>
			         <td>$VisitNo</td>
							 <td class='deletetd'><a onclick='return confirm(&apos;Are you sure Delete this record?&apos;)' href='" . url('/treatmentHistry_delete') . "/" . $id . "' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i> Delete </a>
							 </td>
							 
		      </tr>";
		}
	}



	public function treatment_save(Request $request)
	{
		$data = $request->all();

		$Leg_Left = (!empty($data["Leg_Left"])) ? $data["Leg_Left"] : "";

		$skin_care = (!empty($data["skin_care"])) ? $data["skin_care"] : "";
		$elvation = (!empty($data["elvation"])) ? $data["elvation"] : "";
		$movement_and_exercise = (!empty($data["movement_and_exercise"])) ? $data["movement_and_exercise"] : "";
		$bandaging = (!empty($data["bandaging"])) ? $data["bandaging"] : "";
		$bandaging = (!empty($data["bandaging"])) ? $data["bandaging"] : "";
		$foot_wear = (!empty($data["foot_wear"])) ? $data["foot_wear"] : "";
		$foot_wear = (!empty($data["foot_wear"])) ? $data["foot_wear"] : "";
		$psychological = (!empty($data["psychological"])) ? $data["psychological"] : "";
		$psychological = (!empty($data["psychological"])) ? $data["psychological"] : "";
		$screening = (!empty($data["screening"])) ? $data["screening"] : "";


		$firstVisidata = [
			"district_lymphedema_no" => $data['district_lymphedema_no'],
			"full_name" => $data['full_name'],
			"gender" => $data['gender'],
			"date_of_birth" => $data['date_of_birth'],
			"age_in_completed" => $data['age_in_completed'],
			"address" => $data['address'],
			"date_of_registration" => $data['date_of_registration'],
			"weight" => $data['weight'],
			"height" => $data['height'],
			"bmi" => $data['bmi'],
			"skin_care" => $skin_care,
			"elvation" => $elvation,
			"movement_and_exercise" => $movement_and_exercise,
			"bandaging" => $bandaging,
			"bandaging" => $bandaging,
			"foot_wear" => $foot_wear,
			"foot_wear" => $foot_wear,
			"psychological" => $psychological,
			"psychological" => $psychological,
			"screening" => $screening,
			"screening" => $screening,
			"remarks" => $data['remarks'],
		];

		$success = Treatment::create($firstVisidata);
		$treatment_id = $success->id;
		$DataFildCount = count($data['name_of_drug']);

		for ($i = 0; $i < $DataFildCount; $i++) {
			$treatment_history = [
				"name_of_drug" => $data['name_of_drug'][$i],
				"Dosage" => $data['Dosage'][$i],
				"Frequency" => $data['Frequency'][$i],
				"Duration" => $data['Duration'][$i],
				"district_lymphedema_no" => $data['district_lymphedema_no'],
			];
			$success = TreatmentHistory::create($treatment_history);
		}

		return redirect()->back()->with('message', true);
	}











	// _view All 
	public function treatment_view()
	{
		if (!empty($_GET['from']) && !empty($_GET['to'])) {
			$from = $_GET['from'];
			$to = $_GET['to'];
			if (Auth::user()->role === "RMO" ||  Auth::user()->role === "PHLT" ||  Auth::user()->role === "ADMIN") {
				$data2 = \App\Treatment::with('TreatmentHistory_dates')
					->orderBy('id', 'desc')
					->WhereBetween('date_of_registration', [$from, $to])
					->get();
			} else {
				$data2 = \App\Treatment::with('TreatmentHistory_dates')
					->orderBy('id', 'desc')
					->WhereBetween('date_of_registration', [$from, $to])
					->where('user_name', Auth::user()->email)
					->get();
			}
		} else {
			$from = "";
			$to = "";


			if (Auth::user()->role === "RMO" ||  Auth::user()->role === "PHLT" ||  Auth::user()->role === "ADMIN") {
				$data2 = \App\Treatment::with('TreatmentHistory_dates')
					->orderBy('id', 'desc')
					->get();
			} else {
				$data2 = \App\Treatment::with('TreatmentHistory_dates')
					->orderBy('id', 'desc')
					->where('user_name', Auth::user()->email)
					->get();
			}
		}



		$data['template'] = 'newpationdata/TreatmentHistory_view';
		return view('template_user/template', compact('data'), ["Viewdata" => $data2, "from" => $from, "to" => $to, "title" => "Clinical Management"]);
	}




	public function treatment_view_one($id)
	{
		$data2 = \App\Treatment::with('TreatmentHistory_dates')->where('id', $id)->first();

		$initial_registration = DB::table('initialregistation')
			->select('*')
			->get();


		$data['template'] = 'newpationdata/treatment_view_one';
		return view('template_user/template', compact('data'), ["Viewdata" => $data2, "opd" => $initial_registration]);
	}



	public function treatment_export_one($id)
	{
		$data2 = \App\Treatment::with('TreatmentHistory_dates')->where('id', $id)->first();

		$initial_registration = DB::table('initialregistation')
			->select('*')
			->get();

		$page = 'newpationdata/treatment_print';

		$data = "";

		//  csv
		//header('Content-type: text/csv');
		//header('Content-disposition: attachment;filename=MyVerySpecial.csv');

		header('Content-Type: application/xls');
		header('Content-Disposition: attachment; filename=Clinical Management.xls');
		echo $template = view(
			$page,
			compact('data'),
			["Viewdata" => $data2]
		);
	}











	public function treatment_update(Request $request)
	{
		$data = $request->all();

		$skin_care = (!empty($data["skin_care"])) ? $data["skin_care"] : "";
		$elvation = (!empty($data["elvation"])) ? $data["elvation"] : "";
		$movement_and_exercise = (!empty($data["movement_and_exercise"])) ? $data["movement_and_exercise"] : "";
		$bandaging = (!empty($data["bandaging"])) ? $data["bandaging"] : "";
		$bandaging = (!empty($data["bandaging"])) ? $data["bandaging"] : "";
		$foot_wear = (!empty($data["foot_wear"])) ? $data["foot_wear"] : "";
		$foot_wear = (!empty($data["foot_wear"])) ? $data["foot_wear"] : "";
		$psychological = (!empty($data["psychological"])) ? $data["psychological"] : "";

		$screening = (!empty($data["screening"])) ? $data["screening"] : "";




		$firstVisidata = [
			"district_lymphedema_no" => $data['district_lymphedema_no'],
			"full_name" => $data['full_name'],
			"gender" => $data['gender'],
			"date_of_birth" => $data['date_of_birth'],
			"age_in_completed" => $data['age_in_completed'],
			"address" => $data['address'],
			"date_of_registration" => $data['date_of_registration'],
			"weight" => $data['weight'],
			"height" => $data['height'],
			"bmi" => $data['bmi'],
			"skin_care" => $skin_care,
			"elvation" => $elvation,
			"movement_and_exercise" => $movement_and_exercise,
			"bandaging" => $bandaging,
			"bandaging" => $bandaging,
			"foot_wear" => $foot_wear,
			"foot_wear" => $foot_wear,
			"psychological" => $psychological,
			"screening" => $screening,
			"screening" => $screening,
			"remarks" => $data['remarks'],
		];

		$success = Treatment::where('id', $data['id'])->update($firstVisidata);


		// if (!empty($data['name_of_drug'])) {
		// 	$DataFildCount = count($data['name_of_drug']);
		// } else {
		// 	$DataFildCount = 0;
		// }



		if (!empty($data['id22'])) {

			$DataFildCount = count($data['id22']);
			for ($i = 0; $i < $DataFildCount; $i++) {
				if (!empty($data['name_of_drug2'][$i]) && $data['name_of_drug2'][$i] != " ") {
					$treatment_history = [
						"name_of_drug" => $data['name_of_drug2'][$i],
						"Dosage" => $data['Dosage2'][$i],
						"Frequency" => $data['Frequency'][$i],
						"Duration" => $data['Duration2'][$i],
						"district_lymphedema_no" => $data['district_lymphedema_no'],
					];


					$success = TreatmentHistory::where('id', $data['id22'][$i])->update($treatment_history);
				}
			}
		}

		if (!empty($data['id2'])) {
			$DataFildCount = count($data['id2']);
			for ($i = 0; $i < $DataFildCount; $i++) {
				if (!empty($data['name_of_drug'][$i]) && $data['name_of_drug'][$i] != " ") {
					$treatment_history2 = [
						"name_of_drug" => $data['name_of_drug'][$i],
						"Dosage" => $data['Dosage'][$i],
						"Frequency" => $data['Frequency2'][$i],
						"Duration" => $data['Duration'][$i],
						"district_lymphedema_no" => $data['district_lymphedema_no'],
					];
					$success = TreatmentHistory::create($treatment_history2);
				}
			}
		}

		return redirect()->back()->with('message', true);
	}



	public function treatmentHistry_delete($id)
	{
		$res = TreatmentHistory::where('id', $id)->delete();
		if ($res) {
			return redirect()->back()->with('message', true);
		} else {
			return redirect()->back()->with('message', false);
		}
	}






	public function change_appoinmentt()
	{
		$initial_registration = DB::table('initialregistation')
			->select('*')
			->get();

		$data['template'] = 'newpationdata/change_appoinment';
		return view('template_user/template', compact('data'), ["opd" => $initial_registration]);
	}



	public function getappoinmentdata($value)
	{
		$initial_registration = DB::table('initialregistationmo')
			->select('*')
			->where('opd_no', $value)
			->First();

		$treatment = DB::table('treatment')
			->select('*')
			->where('opd_no_fk', $value)
			->First();

		if (!empty($treatment)) {
			$current_appoinment = $treatment->next_appoinment;
			$district_le_no = $treatment->district_le_no;
			$name = $treatment->name;
			$date_of_registration = $initial_registration->date_of_registration;
			print_r($current_appoinment . ":" . $district_le_no . ":" . $name . ":" . $date_of_registration);
		} else {
			print_r(" " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " ");
		}
		print_r(" " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " " . ":" . " ");
	}














	public function changeappoinment_update(Request $request) // create
	{
		$data = $request->all();
		$dataw["next_appoinment"] = $data['next_appoinment'];
		unset($data["_token"]);
		$success = Treatment::where('opd_no_fk', $data['opd_no'])->update($dataw);
		if ($success) {
			return redirect()->back()->with('message', true);
		} else {
			return redirect()->back()->with('message', false);
		}
	}



	// subsequent

	public function subsequent()
	{

		$initial_registration = DB::table('initialregistation')
			->select('*')
			->get();

		$data['template'] = 'newpationdata/subsequent_add_new';
		return view('template_user/template', compact('data'), ["opd" => $initial_registration]);
	}





	public function subsequentsave(Request $request)
	{
		$data = $request->all();


		$movement_and_exercise = (!empty($data["movement_and_exercise"])) ? $data["movement_and_exercise"] : "";
		$bandaging = (!empty($data["bandaging"])) ? $data["bandaging"] : "";

		$Clinical_lymphedema_regular_clinic = (!empty($data["Clinical_lymphedema_regular_clinic"])) ? $data["Clinical_lymphedema_regular_clinic"] : "";
		$Clinical_other_specify = (!empty($data["Clinical_other_specify"])) ? $data["Clinical_other_specify"] : "";
		$history_of_attacks_yes = (!empty($data["history_of_attacks_yes"])) ? $data["history_of_attacks_yes"] : "";
		$history_of_attacks_of_dermatoly_other = (!empty($data["history_of_attacks_of_dermatoly_other"])) ? $data["history_of_attacks_of_dermatoly_other"] : "";
		$stage_1_Left = (!empty($data["stage_1_Left"])) ? $data["stage_1_Left"] : "";
		$stage_1_right = (!empty($data["stage_1_right"])) ? $data["stage_1_right"] : "";
		$stage_2_Left = (!empty($data["stage_2_Left"])) ? $data["stage_2_Left"] : "";
		$stage_2_right = (!empty($data["stage_2_right"])) ? $data["stage_2_right"] : "";
		$stage_3_Left = (!empty($data["stage_3_Left"])) ? $data["stage_3_Left"] : "";
		$stage_3_right = (!empty($data["stage_3_right"])) ? $data["stage_3_right"] : "";
		$stage_4_Left = (!empty($data["stage_4_Left"])) ? $data["stage_4_Left"] : "";
		$stage_4_right = (!empty($data["stage_4_right"])) ? $data["stage_4_right"] : "";
		$stage_5_Left = (!empty($data["stage_5_Left"])) ? $data["stage_5_Left"] : "";
		$stage_5_right = (!empty($data["stage_5_right"])) ? $data["stage_5_right"] : "";
		$stage_6_Left = (!empty($data["stage_6_Left"])) ? $data["stage_6_Left"] : "";
		$stage_6_right = (!empty($data["stage_6_right"])) ? $data["stage_6_right"] : "";
		$stage_7Left = (!empty($data["stage_7Left"])) ? $data["stage_7Left"] : "";
		$stage_7_right = (!empty($data["stage_7_right"])) ? $data["stage_7_right"] : "";






		$skin_care_satisfactory = (!empty($data["skin_care_satisfactory"])) ? $data["skin_care_satisfactory"] : "";


		$elavation_satisfactory = (!empty($data["elavation_satisfactory"])) ? $data["elavation_satisfactory"] : "";
		$movement_satisfactory = (!empty($data["movement_satisfactory"])) ? $data["movement_satisfactory"] : "";
		$bandaging_satisfactory = (!empty($data["bandaging_satisfactory"])) ? $data["bandaging_satisfactory"] : "";
		$foot_satisfactory = (!empty($data["foot_satisfactory"])) ? $data["foot_satisfactory"] : "";
		$phychological_satsfactory = (!empty($data["phychological_satsfactory"])) ? $data["phychological_satsfactory"] : "";
		$screening_satisfactory = (!empty($data["screening_satisfactory"])) ? $data["screening_satisfactory"] : "";


		$remarks = (!empty($data["remarks"])) ? $data["remarks"] : "";
		$next_clinic_visit = (!empty($data["next_clinic_visit"])) ? $data["next_clinic_visit"] : "";


		$firstVisidata = [
			"district_lymphedema_no" => $data['district_lymphedema_no'],
			"full_name" => $data['full_name'],
			"gender" => $data['gender'],
			"date_of_birth" => $data['date_of_birth'],
			"age_in_completed" => $data['age_in_completed'],
			"address" => $data['address'],
			"date_of_registration" => $data['date_of_registration'],
			"name_doctor" => $data['name_doctor'],
			"date_of_first_clinic_arrendance" => $data['date_of_first_clinic_arrendance'],
			"Clinical_lymphedema_regular_clinic" => $Clinical_lymphedema_regular_clinic,
			"Clinical_other_specify" => $Clinical_other_specify,
			"history_of_attacks_yes" => $history_of_attacks_yes,
			"history_of_attacks_of_dermatoly_other" => $history_of_attacks_of_dermatoly_other,
			"stage_1_Left" => $stage_1_Left,
			"stage_1_right" => $stage_1_right,
			"stage_2_Left" => $stage_2_Left,
			"stage_2_right" => $stage_2_right,
			"stage_3_Left" => $stage_3_Left,
			"stage_3_right" => $stage_3_right,
			"stage_4_Left" => $stage_4_Left,
			"stage_4_right" => $stage_4_right,
			"stage_5_Left" => $stage_5_Left,
			"stage_5_right" => $stage_5_right,
			"stage_6_Left" => $stage_6_Left,
			"stage_6_right" => $stage_6_right,
			"stage_7Left" => $stage_7Left,
			"stage_7_right" => $stage_7_right,
			"skin_care_satisfactory" => $skin_care_satisfactory,
			"screening_satisfactory" => $screening_satisfactory,
			"elavation_satisfactory" => $elavation_satisfactory,
			"movement_satisfactory" => $movement_satisfactory,
			"bandaging_satisfactory" => $bandaging_satisfactory,
			"foot_satisfactory" => $foot_satisfactory,
			"phychological_satsfactory" => $phychological_satsfactory,
			"remarks" => $remarks,
			"next_clinic_visit" => $next_clinic_visit,
		];



		$Subsequent_id = Subsequent::create($firstVisidata);

		$treatment_id = $Subsequent_id->id;
		$DataFildCount = count($data['name_of_drug']);
		for ($i = 0; $i < $DataFildCount; $i++) {
			$treatment_history = [
				"name_of_drug" => $data['name_of_drug'][$i],
				"Dosage" => $data['Dosage'][$i],
				"Frequency" => $data['Frequency'][$i],
				"Duration" => $data['Duration'][$i],
				"district_lymphedema_no" => $data['district_lymphedema_no'],
				"type" => 'subsequent',
				"subsequen_id" => $treatment_id,
			];
			$success = TreatmentHistory::create($treatment_history);
		}

		return redirect()->back()->with('message', true);
	}





	public function subsequent_view()
	{

		if (!empty($_GET['from']) && !empty($_GET['to'])) {
			$from = $_GET['from'];
			$to = $_GET['to'];
			if (Auth::user()->role === "RMO" ||  Auth::user()->role === "PHLT" ||  Auth::user()->role === "ADMIN") {
				$initial_registration = \App\Subsequent::with('TreatmentHistory_history')
					->orderBy('id', 'desc')
					->WhereBetween('date_of_first_clinic_arrendance', [$from, $to])
					->get();
			} else {
				$initial_registration = \App\Subsequent::with('TreatmentHistory_history')
					->orderBy('id', 'desc')
					->WhereBetween('date_of_first_clinic_arrendance', [$from, $to])
					->where('user_name', Auth::user()->email)
					->get();
			}
		} else {
			$from = "";
			$to = "";
			if (Auth::user()->role === "RMO" ||  Auth::user()->role === "PHLT" ||  Auth::user()->role === "ADMIN") {
				$initial_registration = \App\Subsequent::with('TreatmentHistory_history')
					->orderBy('id', 'desc')
					->get();
			} else {
				$initial_registration = \App\Subsequent::with('TreatmentHistory_history')
					->orderBy('id', 'desc')
					->where('user_name', Auth::user()->email)
					->get();
			}
		}
		$data['template'] = 'newpationdata/subsequent_view';
		return view('template_user/template', compact('data'), ["Viewdata" => $initial_registration, "from" => $from, "to" => $to, "title" => "Subsequent Visits"]);
	}


	public function viewData_psubsequent($id)
	{
		$data2 = \App\Subsequent::with('TreatmentHistory_dates')->where('id', $id)->first();

		$initial_registration = DB::table('initialregistation')
			->select('*')
			->get();;

		$data['template'] = 'newpationdata/subsequent_view_one';
		return view('template_user/template', compact('data'), ["Viewdata" => $data2, "opd" => $initial_registration]);
	}








	public function printData_psubsequent($id)
	{
		$data2 = \App\Subsequent::with('TreatmentHistory_dates')->where('id', $id)->first();

		$initial_registration = DB::table('initialregistation')
			->select('*')
			->get();

		$page = 'newpationdata/subsequent_print';
		$data = "";
		//  csv
		//header('Content-type: text/csv');
		//header('Content-disposition: attachment;filename=MyVerySpecial.csv');

		header('Content-Type: application/xls');
		header('Content-Disposition: attachment; filename=Subsequent Visit.xls');
		echo $template = view(
			$page,
			compact('data'),
			["Viewdata" => $data2]
		);
	}
























	// create
	public function subsequentupdate(Request $request)
	{
		$data = $request->all();


		$movement_and_exercise = (!empty($data["movement_and_exercise"])) ? $data["movement_and_exercise"] : "";
		$bandaging = (!empty($data["bandaging"])) ? $data["bandaging"] : "";

		$Clinical_lymphedema_regular_clinic = (!empty($data["Clinical_lymphedema_regular_clinic"])) ? $data["Clinical_lymphedema_regular_clinic"] : "";
		$Clinical_other_specify = (!empty($data["Clinical_other_specify"])) ? $data["Clinical_other_specify"] : "";
		$history_of_attacks_yes = (!empty($data["history_of_attacks_yes"])) ? $data["history_of_attacks_yes"] : "";
		$history_of_attacks_of_dermatoly_other = (!empty($data["history_of_attacks_of_dermatoly_other"])) ? $data["history_of_attacks_of_dermatoly_other"] : "";
		$stage_1_Left = (!empty($data["stage_1_Left"])) ? $data["stage_1_Left"] : "";
		$stage_1_right = (!empty($data["stage_1_right"])) ? $data["stage_1_right"] : "";
		$stage_2_Left = (!empty($data["stage_2_Left"])) ? $data["stage_2_Left"] : "";
		$stage_2_right = (!empty($data["stage_2_right"])) ? $data["stage_2_right"] : "";
		$stage_3_Left = (!empty($data["stage_3_Left"])) ? $data["stage_3_Left"] : "";
		$stage_3_right = (!empty($data["stage_3_right"])) ? $data["stage_3_right"] : "";
		$stage_4_Left = (!empty($data["stage_4_Left"])) ? $data["stage_4_Left"] : "";
		$stage_4_right = (!empty($data["stage_4_right"])) ? $data["stage_4_right"] : "";
		$stage_5_Left = (!empty($data["stage_5_Left"])) ? $data["stage_5_Left"] : "";
		$stage_5_right = (!empty($data["stage_5_right"])) ? $data["stage_5_right"] : "";
		$stage_6_Left = (!empty($data["stage_6_Left"])) ? $data["stage_6_Left"] : "";
		$stage_6_right = (!empty($data["stage_6_right"])) ? $data["stage_6_right"] : "";
		$stage_7Left = (!empty($data["stage_7Left"])) ? $data["stage_7Left"] : "";
		$stage_7_right = (!empty($data["stage_7_right"])) ? $data["stage_7_right"] : "";






		$skin_care_satisfactory = (!empty($data["skin_care_satisfactory"])) ? $data["skin_care_satisfactory"] : "";


		$elavation_satisfactory = (!empty($data["elavation_satisfactory"])) ? $data["elavation_satisfactory"] : "";
		$movement_satisfactory = (!empty($data["movement_satisfactory"])) ? $data["movement_satisfactory"] : "";
		$bandaging_satisfactory = (!empty($data["bandaging_satisfactory"])) ? $data["bandaging_satisfactory"] : "";
		$foot_satisfactory = (!empty($data["foot_satisfactory"])) ? $data["foot_satisfactory"] : "";
		$phychological_satsfactory = (!empty($data["phychological_satsfactory"])) ? $data["phychological_satsfactory"] : "";
		$screening_satisfactory = (!empty($data["screening_satisfactory"])) ? $data["screening_satisfactory"] : "";


		$remarks = (!empty($data["remarks"])) ? $data["remarks"] : "";
		$next_clinic_visit = (!empty($data["next_clinic_visit"])) ? $data["next_clinic_visit"] : "";


		$firstVisidata = [
			"district_lymphedema_no" => $data['district_lymphedema_no'],
			"full_name" => $data['full_name'],
			"gender" => $data['gender'],
			"date_of_birth" => $data['date_of_birth'],
			"age_in_completed" => $data['age_in_completed'],
			"address" => $data['address'],
			"date_of_registration" => $data['date_of_registration'],
			"name_doctor" => $data['name_doctor'],
			"date_of_first_clinic_arrendance" => $data['date_of_first_clinic_arrendance'],
			"Clinical_lymphedema_regular_clinic" => $Clinical_lymphedema_regular_clinic,
			"Clinical_other_specify" => $Clinical_other_specify,
			"history_of_attacks_yes" => $history_of_attacks_yes,
			"history_of_attacks_of_dermatoly_other" => $history_of_attacks_of_dermatoly_other,
			"stage_1_Left" => $stage_1_Left,
			"stage_1_right" => $stage_1_right,
			"stage_2_Left" => $stage_2_Left,
			"stage_2_right" => $stage_2_right,
			"stage_3_Left" => $stage_3_Left,
			"stage_3_right" => $stage_3_right,
			"stage_4_Left" => $stage_4_Left,
			"stage_4_right" => $stage_4_right,
			"stage_5_Left" => $stage_5_Left,
			"stage_5_right" => $stage_5_right,
			"stage_6_Left" => $stage_6_Left,
			"stage_6_right" => $stage_6_right,
			"stage_7Left" => $stage_7Left,
			"stage_7_right" => $stage_7_right,
			"skin_care_satisfactory" => $skin_care_satisfactory,
			"screening_satisfactory" => $screening_satisfactory,
			"elavation_satisfactory" => $elavation_satisfactory,
			"movement_satisfactory" => $movement_satisfactory,
			"bandaging_satisfactory" => $bandaging_satisfactory,
			"foot_satisfactory" => $foot_satisfactory,
			"phychological_satsfactory" => $phychological_satsfactory,
			"remarks" => $remarks,
			"next_clinic_visit" => $next_clinic_visit,
		];

		$success = Subsequent::where('id', $data['id'])->update($firstVisidata);
		$treatment_id = $data['id'];

		if (!empty($data['name_of_drug'])) {
			$DataFildCount = count($data['name_of_drug']);
		} else {
			$DataFildCount = 0;
		}




		//insert
		$DataFildCount = count($data['id2']);

		for ($i = 0; $i < $DataFildCount; $i++) {
			if (!empty($data['name_of_drug2'][$i]) && $data['name_of_drug2'][$i] != " ") {
				$treatment_history = [
					"name_of_drug" => $data['name_of_drug2'][$i],
					"Dosage" => $data['Dosage2'][$i],
					"Frequency" => $data['Frequency2'][$i],
					"Duration" => $data['Duration2'][$i],
					"district_lymphedema_no" => $data['district_lymphedema_no'],

				];


				$success = TreatmentHistory::where('id', $data['id2'][$i])->update($treatment_history);
			}
		}



		if (!empty($data['id1'])) {

			$DataFildCount2 = count($data['id1']);
			for ($i = 0; $i < $DataFildCount2; $i++) {
				if (!empty($data['name_of_drug'][$i]) && $data['name_of_drug'][$i] != " ") {
					$treatment_history = [
						"name_of_drug" => $data['name_of_drug'][$i],
						"Dosage" => $data['Dosage'][$i],
						"Frequency" => $data['Frequency'][$i],
						"Duration" => $data['Duration'][$i],
						"district_lymphedema_no" => $data['district_lymphedema_no'],
						"type" => 'subsequent',
						"subsequen_id" => $data['id']
					];

					dd($treatment_history);
					$success = TreatmentHistory::create($treatment_history);
				}
			}
		}













		return redirect()->back()->with('message', true);
	}



	public function delete_subsequent($id)
	{
		$res = Subsequent::where('id', $id)->delete();
		if ($res) {
			return redirect()->back()->with('message', true);
		} else {
			return redirect()->back()->with('message', false);
		}
	}

	public function treatment_delete($id)
	{
		$res = Treatment::where('id', $id)->delete();
		if ($res) {
			return redirect()->back()->with('message', true);
		} else {
			return redirect()->back()->with('message', false);
		}
	}




	public function subsequent_treatment_delete($id)
	{
		$res = TreatmentHistory::where('id', $id)->delete();
		if ($res) {
			return redirect()->back()->with('message', true);
		} else {
			return redirect()->back()->with('message', false);
		}
	}








	public function delete_treatment($id)
	{
		$res = TreatmentHistory::where('id', $id)->delete();
		if ($res) {
			return redirect()->back()->with('message', true);
		} else {
			return redirect()->back()->with('message', false);
		}
	}


	public function new_lymphoedema_patients_registered($year)
	{

		$getintialtableHistory = DB::table('initialregistationmo')
			->select('*')
			->where('date_of_registration', 'LIKE', "%$year%")
			->get();
		echo count($getintialtableHistory);
	}



	public function lymphoedema_patients_care()
	{
		$getintialtableHistory = DB::table('initialregistationmo')
			->select('*')
			->get();
		echo count($getintialtableHistory);
	}


	public function subsequent_patients()
	{
		$getintialtableHistory = DB::table('initialregistationmo')
			->select('*')
			->get();
		echo count($getintialtableHistory);
	}




	public function getbodydetailspost(Request $request) // create
	{
		$data = $request->all();
		$value = $data['opd'];


		$Viewdata = DB::table('initialregistationmo')
			->select('*')
			->where('district_lymphedema_no', $value)
			->First();

		$data = "";

		return view('newpationdata/viewData_patinMoDataReg2', compact('data'), ["Viewdata" => $Viewdata]);
	}








	// END of controller
}
