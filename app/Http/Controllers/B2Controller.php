<?php

namespace App\Http\Controllers;

require __DIR__ . '/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class B2Controller extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}





	public function b2_report_print(Request $request)
	{
		$data = $request->all();
		$from = $data['from'];
		$to = $data['to'];
		$district = $data['district'];
		$species = $data['species'];
		$export_type = $data['export_type'];

		$old_data_1 = array();
		$old_data_2 = array();
		$old_data_3 = array();
		$old_data_4 = array();

		$type = "district";
		$viewData = "";

		if ($district == "all") {
			$type = "srilanka";
			$district_Arrray = array("CMC", "Colombo", "Gampaha", "Kalutara", "Galle", "Matara", "Hambantota", "Kurunegala", "Puttalam", "Non endemic");

			foreach ($district_Arrray as $district) {

				$viewData = $viewData . $this->get_ento1_data($from, $to, $district, $species);
				if ("Cx" == $species) {
					$page = 'report/b2_view';
					$viewData = $viewData . $this->get_ento2_data($from, $to, $district, $species);
				} else {
					$page = 'report/b2_view_man';
				}

				$viewData = $viewData . $this->get_ento3_data($from, $to, $district, $species);   // ento 2 data get funtion
				$viewData = $viewData . $this->get_ento4_data($from, $to, $district, $species);   // en
				// $viewData = $viewData . $this->get_total_row();   // en


			}
		} else {


			$viewData = $this->get_ento1_data($from, $to, $district, $species);
			if ("Cx" == $species) {
				$page = 'report/b2_view';
				$viewData = $viewData . $this->get_ento2_data($from, $to, $district, $species);
			} else {
				$page = 'report/b2_view_man';
			}

			$viewData = $viewData . $this->get_ento3_data($from, $to, $district, $species);   // ento 2 data get funtion
			$viewData = $viewData . $this->get_ento4_data($from, $to, $district, $species);   // en
			// $viewData = $viewData . $this->get_total_row();   // en



		}


















		if ($export_type == 'PDF') {
			$content = ob_get_clean();
			$template = view(
				$page,
				compact('data'),
				["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to'],'type' => $type]
			);
			try {
				$html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
				$html2pdf->pdf->SetTitle('B 2 Report');
				$html2pdf->WriteHTML($template);
				$html2pdf->Output('b2_report.pdf');
				ob_flush();
				ob_end_clean();
			} catch (HTML2PDF_exception $e) {
				echo $e;
				exit;
			}
			return view(
				$page,
				compact('data'),
				["dataView" => $viewData, 'district' => $data['district'],'type' => $type]
			);
		} else {
			header('Content-Type: application/xls');
			header('Content-Disposition: attachment; filename=downloadB2.xls');
			echo $template = view(
				$page,
				compact('data'),
				["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to'],'type' => $type]
			);
		}
	}




	public function  get_ento1_data($from, $to, $district, $species)
	{
		$viewData = "";
		$alldata_ento_1 = array();
		$total_no_of_collectors = 0;


		if ($district == 'all') {
			$ento_1_form_data = \App\Ento_01::with('ento_01_dataes')->whereBetween('date', [$from, $to])->get();
		} else {
			$ento_1_form_data = \App\Ento_01::with('ento_01_dataes')->whereBetween('date', [$from, $to])->where("district", $district)->get();
		}





		foreach ($ento_1_form_data as  $ento_1_form_data_row) {

			$name_of_heo = $ento_1_form_data_row->name_of_heo;
			$moh_area = $ento_1_form_data_row->moh_area;
			$phi_and_phm = $ento_1_form_data_row->phi_and_phm;
			$gn_divison = $ento_1_form_data_row->gn_divison;
			$no_of_collectors = $ento_1_form_data_row->no_of_collectors;
			$total_no_of_collectors = $total_no_of_collectors + $no_of_collectors;
			$no_of_premises = $ento_1_form_data_row->no_of_premises;
			$date = $ento_1_form_data_row->date;

			// need add filed to db to count permisess postive for mansoniay


			if ("Cx" == $species) {
				$total_mosquitos_collected = $ento_1_form_data_row->total_mosquitos_collected;
				$no_of_premises_positive = $ento_1_form_data_row->no_of_premises_positive;
			} else {
				$total_mosquitos_collected = $ento_1_form_data_row->mansonia_spcies_of_mosquitos_collected;
				$no_of_premises_positive = $ento_1_form_data_row->mansonia_species_of_positive;
			}

			// get premises postive calculation
			if ($no_of_premises == "" or $no_of_premises == 0) {
				$premises_posotive = 0;
			} else {
				$premises_posotive = ($no_of_premises_positive / $no_of_premises) * 100;
				$premises_posotive = round($premises_posotive, 2);
			}


			//          get time // time inser by housrs 
			$total_time_spend = $ento_1_form_data_row->total_time_spend;
			$cach_time = round((($total_time_spend) * $no_of_collectors), 2);


			//        mosquito density
			if ($total_mosquitos_collected == "" or $total_mosquitos_collected == 0) {
				$mosquitodensity = 0;
			} else {
				$mosquitodensity = ($total_mosquitos_collected / $total_time_spend) / $no_of_collectors;
				$mosquitodensity = round($mosquitodensity, 2);
			}


			$ento_01_id = $ento_1_form_data_row['ento_01_id'];
			$Ento_01_data = \App\Ento_01_data::with('Ento_5_news')->where("ento_01_id", $ento_01_id)->get();

			// dd($Ento_01_data);
			$infective = 0;

			$no_of_dissected = 0;
			$positive_mosq = 0;
			foreach ($Ento_01_data as  $Ento_01_data2) {
				$address = $Ento_01_data2->house_no;
				$gps_long = $Ento_01_data2->gps_long;
				$gps_lat = $Ento_01_data2->gps_lat;

				foreach ($Ento_01_data2->Ento_5_news as  $Ento_5_news_each) {


					if ($Ento_5_news_each->species2 == $species || $Ento_5_news_each->species2 == "CX" && $species == "Cx") {
						$no_of_dissected += $Ento_5_news_each->no_dissected_mosquitos;
						$positive_mosq += $Ento_5_news_each->positive_mosq;
						$infective = $infective + $Ento_5_news_each->positive_mosq;




						$t_mf = $Ento_5_news_each->head_mf + $Ento_5_news_each->thorax_mf + $Ento_5_news_each->abdomen_mf;
						$t_l1 = $Ento_5_news_each->head_l1 + $Ento_5_news_each->thorax_l1 + $Ento_5_news_each->abdomen_l1;
						$t_l2 = $Ento_5_news_each->head_l2 + $Ento_5_news_each->thorax_l2 + $Ento_5_news_each->abdomen_l2;
						$t_l3 = $Ento_5_news_each->head_l3 + $Ento_5_news_each->thorax_l3 + $Ento_5_news_each->abdomen_l3;


						if ($infective > 0) {

							$viewData = $viewData .
								'<tr>' .
								'<td>' .  $district . '</td>
								 <td> IHC </td>' .
								' <td>' . $date . '</td>' .
								'<td>' . $moh_area . '</td>' .
								'<td>' . $phi_and_phm . '</td>' .
								'<td>' . $gn_divison . '</td>' .

								'<td>' . $address . '</td>' .
								'<td>' . $gps_long . '</td>' .
								'<td>' . $gps_lat . '</td>' .
								'<td>' . $infective . '</td>' .
								'<td>' . $t_mf . '</td>' .
								'<td>' . $t_l1 . '</td>' .
								'<td>' . $t_l2 . '</td>' .
								'<td>' . $t_l3 . '</td>
</tr>';
						}
					}
				}
			}
		}

		return   $viewData;
	}




	public function  get_ento2_data($from, $to, $district, $species)
	{
		$alldata_ento_2 = array();
		$viewData = "";
		$total_no_of_collectors = 0;


		if ($district == 'all') {
			$ento_2_form_data = \App\Ento_02::with('ento_02_dataes')->whereBetween('date', [$from, $to])->get();
		} else {
			$ento_2_form_data = \App\Ento_02::with('ento_02_dataes')->whereBetween('date', [$from, $to])->where("district", $district)->get();
		}

		foreach ($ento_2_form_data as  $ento_2_form_data_row) {
			$ento_02_id = $ento_2_form_data_row['ento_02_id'];
			$Ento_05_data = \App\Ento_02_data::with('Ento_5_news')->where("ento_02_id", $ento_02_id)->get();
			$name_of_heo = $ento_2_form_data_row->name_of_heo;
			$moh_area = $ento_2_form_data_row->moh_area;
			$phi_and_phm = $ento_2_form_data_row->phm_area;
			$date = $ento_2_form_data_row->date;




			$no_of_premises = count($Ento_05_data);
			$total_mosquitos_collected = $ento_2_form_data_row->total_cx_quin_mosq;
			// get promiss postive 
			$no_of_premises_positive_data = \App\Ento_02_data::where("ento_02_id", $ento_02_id)->where("total_cx_quin", '>', '0')->get();
			$no_of_premises_positive = count($no_of_premises_positive_data);


			$gn_data = \App\Ento_02_data::where("ento_02_id", $ento_02_id)->first();





			// get premises postive calculation  presnatagebcalculation'
			if ($no_of_premises == "" or $no_of_premises == 0) {
				$premises_posotive = 0;
			} else {
				$premises_posotive = ($no_of_premises_positive / $no_of_premises) * 100;
				$premises_posotive = round($premises_posotive, 2);
			}
			$infective = 0;
			$no_of_dissected = 0;
			$positive_mosq = 0;
			foreach ($Ento_05_data as  $Ento_05) {
				$name = $Ento_05->chief_occupant;
				$address = $Ento_05->address;


				$gn_divison = $Ento_05->gn_division;
				$gps_long = $Ento_05->gps_long;
				$gps_lat = $Ento_05->gps_lat;



				foreach ($Ento_05->Ento_5_news as  $Ento_5_news_each) {

					if ($Ento_5_news_each->type_of_parasite == 'Brugia malayi' || $Ento_5_news_each->type_of_parasite == 'Wuchereria bancrofit') {
						if ($Ento_5_news_each->species2 == $species || $Ento_5_news_each->species2 == "CX" && $species == "Cx") {
							$no_of_dissected += $Ento_5_news_each->no_dissected_mosquitos;
							$positive_mosq += $Ento_5_news_each->positive_mosq;
							$infective =  $Ento_5_news_each->positive_mosq;

							$t_mf = $Ento_5_news_each->head_mf + $Ento_5_news_each->thorax_mf + $Ento_5_news_each->abdomen_mf;
							$t_l1 = $Ento_5_news_each->head_l1 + $Ento_5_news_each->thorax_l1 + $Ento_5_news_each->abdomen_l1;
							$t_l2 = $Ento_5_news_each->head_l2 + $Ento_5_news_each->thorax_l2 + $Ento_5_news_each->abdomen_l2;
							$t_l3 = $Ento_5_news_each->head_l3 + $Ento_5_news_each->thorax_l3 + $Ento_5_news_each->abdomen_l3;



							$viewData = $viewData .
							'<tr>' .
							'<td>' .  $district . '</td>
							 <td>GTC </td>' .
								'<td>' . $date . '</td>' .
								'<td>' . $moh_area . '</td>' .
								'<td>' . $phi_and_phm . '</td>' .
								'<td>' . $gn_divison . '</td>' .
								'<td>' .	$name . " " . $address . '</td>' .
								'<td>' . $gps_lat . '</td>' .
								'<td>' . $gps_long . '</td>' .
								'<td>' . $infective . '</td>' .
								'<td>' . $t_mf . '</td>' .
								'<td>' . $t_l1 . '</td>' .
								'<td>' . $t_l2 . '</td>' .
								'<td>' . $t_l3 . '</td>
								</tr>';
						}
					}
				}
			}
		}

		return   $viewData;
	}






	public function  get_ento3_data($from, $to, $district, $species)
	{
		$alldata_ento_3 = array();
		$viewData = "";
		$total_no_of_collectors = 1;


		if ($district == 'all') {
			$ento_3_form_data = \App\Ento_03::with('ento_03_dataes')->whereBetween('date_of_collection', [$from, $to])->get();
		} else {
			$ento_3_form_data = \App\Ento_03::with('ento_03_dataes')->whereBetween('date_of_collection', [$from, $to])->where("district", $district)->get();
		}








		// $data3 = \App\Ento_03_data::with('Ento_5_news')->where("ento_03_id", $id)->get();
		foreach ($ento_3_form_data as  $ento_3_form_data_row) {

			$ento_03_id = $ento_3_form_data_row['ento_03_id'];

			$Ento_05_data = \App\Ento_03_data::with('Ento_5_news')->where("ento_03_id", $ento_03_id)->get();
			$name_of_heo = $ento_3_form_data_row->name_of_heo;
			$moh_area = $ento_3_form_data_row->moh;
			$phi_and_phm = $ento_3_form_data_row->phi;
			$no_of_premises = 1;
			$gn_divison = $ento_3_form_data_row->gn;
			$no_of_collectors = 1;
			$total_no_of_collectors = $total_no_of_collectors + $no_of_collectors;
			$date = $ento_3_form_data_row->date_of_collection;

			$address = $ento_3_form_data_row->address;
			$gps_long = $ento_3_form_data_row->gps_long;
			$gps_lat = $ento_3_form_data_row->gps_lat;

			if ("Cx" == $species) {
				$Ento_03_total_mosq = \App\Ento_03_data::with('Ento_5_news')->where("ento_03_id", $ento_03_id)->where('mosq_species', 'like', 'Culex (culex) quinquefasciatus%')
					->sum('no_of_mosq');
				// $total_mosquitos_collected
			} else {
				$Ento_03_total_mosq = \App\Ento_03_data::with('Ento_5_news')->where("ento_03_id", $ento_03_id)->where('mosq_species', 'like', 'Mansonia%')
					->sum('no_of_mosq');
			}




			$total_mosquitos_collected = $Ento_03_total_mosq;
			// get promiss postive 
			$no_of_premises_positive = "1";



			// get premises postive calculation  presnatagebcalculation'
			if ($no_of_premises == "" or $no_of_premises == 0) {
				$premises_posotive = 0;
			} else {
				$premises_posotive = ($no_of_premises_positive / $no_of_premises) * 100;
				$premises_posotive = round($premises_posotive, 2);
			}
			$infective = 0;
			$no_of_dissected = 0;
			$positive_mosq = 0;
			foreach ($Ento_05_data as  $Ento_05) {

				foreach ($Ento_05->Ento_5_news as  $Ento_5_news_each) {
					if ($Ento_5_news_each->type_of_parasite == 'Brugia malayi' || $Ento_5_news_each->type_of_parasite == 'Wuchereria bancrofit') {
						if ($Ento_5_news_each->species2 == $species || $Ento_5_news_each->species2 == "CX" && $species == "Cx") {
							$no_of_dissected += $Ento_5_news_each->no_dissected_mosquitos;
							$positive_mosq += $Ento_5_news_each->positive_mosq;
							$infective = $infective + $Ento_5_news_each->positive_mosq;

							$t_mf = $Ento_5_news_each->head_mf + $Ento_5_news_each->thorax_mf + $Ento_5_news_each->abdomen_mf;
							$t_l1 = $Ento_5_news_each->head_l1 + $Ento_5_news_each->thorax_l1 + $Ento_5_news_each->abdomen_l1;
							$t_l2 = $Ento_5_news_each->head_l2 + $Ento_5_news_each->thorax_l2 + $Ento_5_news_each->abdomen_l2;
							$t_l3 = $Ento_5_news_each->head_l3 + $Ento_5_news_each->thorax_l3 + $Ento_5_news_each->abdomen_l3;

							$viewData = $viewData .
							'<tr>' .
							'<td>' .  $district . '</td>
							 <td> CBNT</td>' .
								'<td>' . $date . '</td>' .
								'<td>' . $moh_area . '</td>' .
								'<td>' . $phi_and_phm . '</td>' .
								'<td>' . $gn_divison . '</td>' .

								'<td>' . $address . '</td>' .
								'<td>' . $gps_long . '</td>' .
								'<td>' . $gps_lat . '</td>' .
								'<td>' . $infective . '</td>' .
								'<td>' . $t_mf . '</td>' .
								'<td>' . $t_l1 . '</td>' .
								'<td>' . $t_l2 . '</td>' .
								'<td>' . $t_l3 . '</td>
										</tr>';
						}
					}
				}
			}
		}
		return   $viewData;
	}
	// ENS OGF GETV  ENTO 3


	public function  get_ento4_data($from, $to, $district, $species)
	{
		$alldata_ento_4 = array();
		$viewData = "";
		$total_no_of_collectors = 1;
		$alldata_ento_3 = array();
		$viewData = "";
		$total_no_of_collectors = 1;



		if ($district == 'all') {
			$ento_4_form_data = \App\Ento_4::with('ento_04_indoors', 'ento_04_mosq_news', 'ento_04_outdoors', 'Ento_5_news')
				->whereBetween('date_of_collection', [$from, $to])
				->get();
		} else {
			$ento_4_form_data = \App\Ento_4::with('ento_04_indoors', 'ento_04_mosq_news', 'ento_04_outdoors', 'Ento_5_news')
				->whereBetween('date_of_collection', [$from, $to])
				->where("district", $district)->get();
		}







		foreach ($ento_4_form_data as  $ento_4_form_data_row) {
			$ento_04_id = $ento_4_form_data_row->ento_04_id;
			$name_of_heo = "";
			$moh_area = $ento_4_form_data_row->moh;
			$phi_and_phm = $ento_4_form_data_row->phi;
			$no_of_premises = 1;
			$gn_divison = $ento_4_form_data_row->gn_division;
			$no_of_collectors = 1;
			$no_of_premises_positive = 1;
			$date = $ento_4_form_data_row->date_of_collection;
			$premises_posotive = 100;
			$address = $ento_4_form_data_row->locality;
			$gps_lat = $ento_4_form_data_row->locality;
			$gps_long = $ento_4_form_data_row->locality;





			if ("Cx" == $species) {
				$Ento_03_total_mosq = \App\ento_04_mosq_new::where("ento_04_id_data", $ento_04_id)->where('mosq_spec_stat', 'like', 'Culex (culex) quinquefasciatus%')
					->sum('mosq_spec_stat');
				// $total_mosquitos_collected
			} else {
				$Ento_03_total_mosq = \App\ento_04_mosq_new::where("ento_04_id_data", $ento_04_id)->where('mosq_spec_stat', 'like', 'Mansonia%')
					->sum('mosq_spec_stat');
			}

			$infective = 0;
			$no_of_dissected = 0;
			$positive_mosq = 0;
			$total_mosquitos_collected = $Ento_03_total_mosq;

			foreach ($ento_4_form_data_row->Ento_5_news as  $Ento_5_news_each) {

				if ($species == "Cx") {
					$speciesfaind = "Culex";
				} else {
					$speciesfaind = "Mansonia";
				}
				if ($Ento_5_news_each->type_of_parasite == 'Brugia malayi' || $Ento_5_news_each->type_of_parasite == 'Wuchereria bancrofit') {
					if (strpos($Ento_5_news_each->species2, $speciesfaind) || strpos($Ento_5_news_each->species2, $speciesfaind) === 0) {

						$no_of_dissected += $Ento_5_news_each->no_dissected_mosquitos;
						$positive_mosq += $Ento_5_news_each->positive_mosq;
						$infective = $infective + $Ento_5_news_each->positive_mosq;

						$t_mf = $Ento_5_news_each->head_mf + $Ento_5_news_each->thorax_mf + $Ento_5_news_each->abdomen_mf;
						$t_l1 = $Ento_5_news_each->head_l1 + $Ento_5_news_each->thorax_l1 + $Ento_5_news_each->abdomen_l1;
						$t_l2 = $Ento_5_news_each->head_l2 + $Ento_5_news_each->thorax_l2 + $Ento_5_news_each->abdomen_l2;
						$t_l3 = $Ento_5_news_each->head_l3 + $Ento_5_news_each->thorax_l3 + $Ento_5_news_each->abdomen_l3;


						$viewData = $viewData .
						'<tr>' .
						'<td>' .  $district . '</td>
						 <td> HLNC </td>' .
							'<td>' . $date . '</td>' .
							'<td>' . $moh_area . '</td>' .
							'<td>' . $phi_and_phm . '</td>' .
							'<td>' . $gn_divison . '</td>' .
							'<td>' . $address . '</td>' .
							'<td>' . $gps_long . '</td>' .
							'<td>' . $gps_lat . '</td>' .
							'<td>' . $infective . '</td>' .
							'<td>' . $t_mf . '</td>' .
							'<td>' . $t_l1 . '</td>' .
							'<td>' . $t_l2 . '</td>' .
							'<td>' . $t_l3 . '</td>
						</tr>';
					}
				}
			}
		}

		return   $viewData;
	}



	// END oF CONTROLLER
}
