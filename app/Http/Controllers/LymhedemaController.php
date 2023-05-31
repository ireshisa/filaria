<?php

namespace App\Http\Controllers;

require __DIR__ . '/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class LymhedemaController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


	public function districtLymhedema()
	{
		$district = DB::table('district')
			->orderBy('district', 'ASC')
			->select('*')
			->get();
		$data['template'] = 'report/districtLymhedema';
		return view('template_user/template', compact('data'), ["district_list" => $district]);
	}


	public function newmorbidity()
	{
		$district = DB::table('district')
			->orderBy('district', 'ASC')
			->select('*')
			->get();
		$data['template'] = 'report/newmorbidity';
		return view('template_user/template', compact('data'), ["district_list" => $district]);
	}



	public function newmorbidityNational()
	{
		$district = DB::table('district')
			->orderBy('district', 'ASC')
			->select('*')
			->get();
		$data['template'] = 'report/newmorbidityNational';
		return view('template_user/template', compact('data'), ["district_list" => $district]);
	}


	public function newmorbidity_regional()
	{
		$district = DB::table('district')
			->orderBy('district', 'ASC')
			->select('*')
			->get();
		$data['template'] = 'report/newmorbidity_regional';
		return view('template_user/template', compact('data'), ["district_list" => $district]);
	}




	public function national_subsquen_lympoedema_stage()
	{
		$district = DB::table('district')
			->orderBy('district', 'ASC')
			->select('*')
			->get();
		$data['template'] = 'report/national_subsquen_lympoedema_stage';
		return view('template_user/template', compact('data'), ["district_list" => $district]);
	}


	public function national_new_lympoedema_stage()
	{
		$district = DB::table('district')
			->orderBy('district', 'ASC')
			->select('*')
			->get();
		$data['template'] = 'report/national_new_lympoedema_stage';
		return view('template_user/template', compact('data'), ["district_list" => $district]);
	}




	public function national_new_lympoedemasubsequen()
	{
		$district = DB::table('district')
			->orderBy('district', 'ASC')
			->select('*')
			->get();
		$data['template'] = 'report/national_new_lympoedema_subsquen';
		return view('template_user/template', compact('data'), ["district_list" => $district]);
	}






	public function national_new_lympoedema()
	{
		$district = DB::table('district')
			->orderBy('district', 'ASC')
			->select('*')
			->get();
		$data['template'] = 'report/national_new_lympoedema';
		return view('template_user/template', compact('data'), ["district_list" => $district]);
	}












	public function genderstageofdisease()
	{
		$district = DB::table('district')
			->orderBy('district', 'ASC')
			->select('*')
			->get();
		$data['template'] = 'report/genderstageofdisease';
		return view('template_user/template', compact('data'), ["district_list" => $district]);
	}





	public function genderstageofdisease_sub()
	{
		$district = DB::table('district')
			->orderBy('district', 'ASC')
			->select('*')
			->get();
		$data['template'] = 'report/genderstageofdisease_sub';
		return view('template_user/template', compact('data'), ["district_list" => $district]);
	}










	public function districtLymhedema_report_print(Request $request)
	{
		$data = $request->all();
		$export_type = $data['export_type'];
		$from = $data['from'];
		$to = $data['to'];
		$moh = array('123123123');


		$result2 = DB::table('initialregistation')
			->select('*')
			->where('district', $data['district'])
			->WhereBetween('date_of_registration', [$from, $to])
			->get();


		if ($result2 and count($result2) > 0) {
		}
		$viewData = "";

		return view(
			'report/lymhedema',
			compact('data'),
			["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
		);
	}





	public function genderstageofdisease_report_print(Request $request)
	{
		$data = $request->all();
		$export_type = $data['export_type'];
		$from = $data['from'];
		$to = $data['to'];
		$moh = array('123123123');

		$report_type = $data['report_type'];

		if ($report_type == "New Patient") {
			$result2 = \App\Initialregistation::with('initialregistationmos')
				->select('*')
				->where('district', $data['district'])
				->join('initialregistationmo', function ($join) use ($from, $to) {
					$join->on('initialregistation.district_lymphedema_no', '=', 'initialregistationmo.district_lymphedema_no')
						->whereBetween('initialregistationmo.date_of_first_clinic_arrendance', [$from, $to]);
				})
				->get();
			$viewData = $result2;
			if ($export_type == 'PDF') {
				$content = ob_get_clean();
				$template = view(
					'report/genderstageofdisease_report_print',
					compact('data'),
					["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
				);

				try {

					$html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
					$html2pdf->pdf->SetTitle('NATIONAL NEW:AGE,GENDER REPORT');
					$html2pdf->WriteHTML($template);
					$html2pdf->Output('mobility_report_print.pdf');
					ob_flush();
					ob_end_clean();
				} catch (HTML2PDF_exception $e) {
					echo $e;
					exit;
				}
				return  view(
					'report/genderstageofdisease_report_print',
					compact('data'),
					["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
				);
			} else {

				header('Content-Type: application/xls');
				header('Content-Disposition: attachment; filename=download.xls');
				echo $template = view(
					'report/genderstageofdisease_report_print',
					compact('data'),
					["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
				);
			}
		}
	}




	public function genderstageofdisease_report_print2(Request $request)
	{
		$data = $request->all();
		$export_type = $data['export_type'];
		$from = $data['from'];
		$to = $data['to'];
		$moh = array('123123123');

		$report_type = $data['report_type'];

		if ($report_type == "New Patient") {

			$result2 = \App\Initialregistation::with('initialregistationmos')
				->select('*')
				->where('district', $data['district'])
				->join('initialregistationmo', function ($join) use ($from, $to) {
					$join->on('initialregistation.district_lymphedema_no', '=', 'initialregistationmo.district_lymphedema_no')
						->whereBetween('initialregistationmo.date_of_registration', [$from, $to]);
				})
				->get();


			$viewData = $result2;
			if ($export_type == 'PDF') {
				$content = ob_get_clean();
				$template = view(
					'report/genderstageofdisease_report_print',
					compact('data'),
					["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
				);

				try {
					$html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
					$html2pdf->pdf->SetTitle('NEW:AGE,GENDER REPORT');
					$html2pdf->WriteHTML($template);
					$html2pdf->Output('report_print.pdf');
					ob_flush();
					ob_end_clean();
				} catch (HTML2PDF_exception $e) {
					echo $e;
					exit;
				}
				return  view(
					'report/genderstageofdisease_report_print',
					compact('data'),
					["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
				);
			} else {

				header('Content-Type: application/xls');
				header('Content-Disposition: attachment; filename=download.xls');
				echo $template = view(
					'report/genderstageofdisease_report_print',
					compact('data'),
					["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
				);
			}
		} else {

			$result22 = \App\Initialregistation::with('Subsequents')
				->select('*')
				->where('district', $data['district'])
				->join('subsequent', function ($join) use ($from, $to) {
					$join->on('initialregistation.district_lymphedema_no', '=', 'subsequent.district_lymphedema_no')
						->whereBetween('subsequent.date_of_first_clinic_arrendance', [$from, $to]);
				})
				->get();

			$viewData = $result22;
			if ($export_type == 'PDF') {

				$content = ob_get_clean();
				$template = view(
					'report/genderstageofdisease_report_print_Subsequents',
					compact('data'),
					["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
				);

				try {

					$html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
					$html2pdf->pdf->SetTitle('Subsequent:AGE,GENDER REPORT');
					$html2pdf->WriteHTML($template);
					$html2pdf->Output('mobility_report_print.pdf');
					ob_flush();
					ob_end_clean();
				} catch (HTML2PDF_exception $e) {
					echo $e;
					exit;
				}
				return  view(
					'report/genderstageofdisease_report_print_Subsequents',
					compact('data'),
					["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
				);
			} else {

				header('Content-Type: application/xls');
				header('Content-Disposition: attachment; filename=download.xls');
				echo $template = view(
					'report/genderstageofdisease_report_print_Subsequents',
					compact('data'),
					["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
				);
			}
		}
	}







	public function national_subsequent_lympoedema_stage_print(Request $request)
	{
		$data = $request->all();
		$export_type = $data['export_type'];
		$from = $data['from'];
		$to = $data['to'];
		$moh = array('123123123');

		$report_type = 'national_new_lympoedema_print';
		$w = 1;
		$result22 = \App\Initialregistation::has('Subsequents', '>', 0)->with(['Subsequents' => function ($q) use ($from, $to) {
			$q->whereBetween('subsequent.date_of_first_clinic_arrendance', [$from, $to])
				->orderBy('id', 'desc')->get();
		}])->get();


		$viewData = $result22;


		if ($export_type == 'PDF') {
			$content = ob_get_clean();
			$template = view(
				'report/national_subsequent_lympoedema_stage_print',
				compact('data'),
				["dataView" => $viewData, 'from' => $data['from'], 'to' => $data['to']]
			);

			try {
				$html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
				$html2pdf->pdf->SetTitle('NATIONAL NEW:STAGE REPORT');
				$html2pdf->WriteHTML($template);
				$html2pdf->Output('NATIONAL_Subsequent_AGE_GENDER_REPORT.pdf');
				ob_flush();
				ob_end_clean();
			} catch (HTML2PDF_exception $e) {
				echo $e;
				exit;
			}
		} else {
			header('Content-Type: application/xls');
			header('Content-Disposition: attachment; filename=download.xls');
			echo $template = view(
				'report/national_subsequent_lympoedema_stage_print',
				compact('data'),
				["dataView" => $viewData, 'from' => $data['from'], 'to' => $data['to']]
			);
		}
	}
	public function national_new_lympoedema_stage_print(Request $request)
	{
		$data = $request->all();
		$export_type = $data['export_type'];
		$from = $data['from'];
		$to = $data['to'];
		$moh = array('123123123');

		// $report_type = 'national_new_lympoedema_print';
		// $w = 1;
		// $result22 = \App\Initialregistation::has('Subsequents', '>', 0)->with(['Subsequents' => function ($q) use ($from, $to) {
		// 	$q->whereBetween('subsequent.date_of_first_clinic_arrendance', [$from, $to])
		// 		->orderBy('id', 'desc')->first();
		// }])->get();


		$result22 = \App\Initialregistation::with('initialregistationmos')
			->select('*')
			->join('initialregistationmo', function ($join) use ($from, $to) {
				$join->on('initialregistation.district_lymphedema_no', '=', 'initialregistationmo.district_lymphedema_no')
					->whereBetween('initialregistationmo.date_of_first_clinic_arrendance', [$from, $to]);
			})
			->get();



		$viewData = $result22;


		if ($export_type == 'PDF') {
			$content = ob_get_clean();
			$template = view(
				'report/national_new_lympoedema_stage_print',
				compact('data'),
				["dataView" => $viewData, 'from' => $data['from'], 'to' => $data['to']]
			);

			try {
				$html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
				$html2pdf->pdf->SetTitle('NATIONAL NEW:STAGE REPORT');
				$html2pdf->WriteHTML($template);
				$html2pdf->Output('NATIONAL_Subsequent_AGE_GENDER_REPORT.pdf');
				ob_flush();
				ob_end_clean();
			} catch (HTML2PDF_exception $e) {
				echo $e;
				exit;
			}
		} else {
			header('Content-Type: application/xls');
			header('Content-Disposition: attachment; filename=download.xls');
			echo $template = view(
				'report/national_new_lympoedema_stage_print',
				compact('data'),
				["dataView" => $viewData, 'from' => $data['from'], 'to' => $data['to']]
			);
		}
	}




	public function national_new_lympoedema_print_subsquen(Request $request)
	{
		$data = $request->all();
		$export_type = $data['export_type'];
		$from = $data['from'];
		$to = $data['to'];
		$moh = array('123123123');

		$report_type = 'national_new_lympoedema_print';
		$w = 1;
		$result22 = \App\Initialregistation::has('Subsequents', '>', 0)->with(['Subsequents' => function ($q) use ($from, $to) {
			$q->whereBetween('subsequent.date_of_first_clinic_arrendance', [$from, $to])
				->whereNotNull('date_of_first_clinic_arrendance')
				->orderBy('id', 'desc')->first();
		}])->get();

		$viewData = $result22;
		if ($export_type == 'PDF') {
			$content = ob_get_clean();
			$template = view(
				'report/national_new_lympoedema_print_subseq',
				compact('data'),
				["dataView" => $viewData, 'from' => $data['from'], 'to' => $data['to']]
			);

			try {
				$html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
				$html2pdf->pdf->SetTitle('NATIONAL Subsequent:AGE,GENDER REPORT');
				$html2pdf->WriteHTML($template);
				$html2pdf->Output('NATIONAL_Subsequent_AGE_GENDER_REPORT.pdf');
				ob_flush();
				ob_end_clean();
			} catch (HTML2PDF_exception $e) {
				echo $e;
				exit;
			}
		} else {
			header('Content-Type: application/xls');
			header('Content-Disposition: attachment; filename=download.xls');
			echo $template = view(
				'report/national_new_lympoedema_print_subseq',
				compact('data'),
				["dataView" => $viewData, 'from' => $data['from'], 'to' => $data['to']]
			);
		}
	}



	public function national_new_lympoedema_print(Request $request)
	{
		$data = $request->all();
		$export_type = $data['export_type'];
		$from = $data['from'];
		$to = $data['to'];
		$moh = array('123123123');

		$report_type = 'New Patient';

		if ($report_type == "New Patient") {
			$result2 = \App\Initialregistation::with('initialregistationmos')
				->select('*')
				->join('initialregistationmo', function ($join) use ($from, $to) {
					$join->on('initialregistation.district_lymphedema_no', '=', 'initialregistationmo.district_lymphedema_no')
						->whereBetween('initialregistationmo.date_of_first_clinic_arrendance', [$from, $to]);
				})
				->get();
			$viewData = $result2;

			if ($export_type == 'PDF') {
				$content = ob_get_clean();
				$template = view(
					'report/national_new_lympoedema_print',
					compact('data'),
					["dataView" => $viewData, 'from' => $data['from'], 'to' => $data['to']]
				);
				try {

					$html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
					$html2pdf->pdf->SetTitle('B 1 Report');
					$html2pdf->WriteHTML($template);
					$html2pdf->Output('mobility_report_print.pdf');
					ob_flush();
					ob_end_clean();
				} catch (HTML2PDF_exception $e) {
					echo $e;
					exit;
				}
				return  view(
					'report/genderstageofdisease_report_print',
					compact('data'),
					["dataView" => $viewData, 'from' => $data['from'], 'to' => $data['to']]
				);
			} else {
				header('Content-Type: application/xls');
				header('Content-Disposition: attachment; filename=download.xls');
				echo $template = view(
					'report/national_new_lympoedema_print',
					compact('data'),
					["dataView" => $viewData, 'from' => $data['from'], 'to' => $data['to']]
				);
			}
		} else {

			$w = 1;
			$result22 = \App\Initialregistation::with(['Subsequents' => function ($q) use ($from, $to) {
				$q->whereBetween('subsequent.date_of_first_clinic_arrendance', [$from, $to])
					->orderBy('id', 'desc')->first()->id;
			}])

				->get();

			$viewData = $result22;

			if ($export_type == 'PDF') {

				$content = ob_get_clean();
				$template = view(
					'report/genderstageofdisease_report_print_Subsequents',
					compact('data'),
					["dataView" => $viewData, 'from' => $data['from'], 'to' => $data['to']]
				);

				try {

					$html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
					$html2pdf->pdf->SetTitle('B 1 Report');
					$html2pdf->WriteHTML($template);
					$html2pdf->Output('mobility_report_print.pdf');
					ob_flush();
					ob_end_clean();
				} catch (HTML2PDF_exception $e) {
					echo $e;
					exit;
				}
				return  view(
					'report/genderstageofdisease_report_print_Subsequents',
					compact('data'),
					["dataView" => $viewData, 'from' => $data['from'], 'to' => $data['to']]
				);
			} else {

				header('Content-Type: application/xls');
				header('Content-Disposition: attachment; filename=download.xls');
				echo $template = view(
					'report/genderstageofdisease_report_print_Subsequents',
					compact('data'),
					["dataView" => $viewData, 'from' => $data['from'], 'to' => $data['to']]
				);
			}
		}
	}





	public function regional_mobility_report_print(Request $request)
	{
		$data = $request->all();
		$export_type = $data['export_type'];
		$from = $data['from'];
		$to = $data['to'];
		$moh = array('123123123');


		$FirstVisite = \App\Initialregistation::with('initialregistationmos',)
			->select('*')
			->where('district', $data['district'])
			->join('initialregistationmo', function ($join) use ($from, $to) {
				$join->on('initialregistation.district_lymphedema_no', '=', 'initialregistationmo.district_lymphedema_no')
					->whereBetween('initialregistationmo.date_of_first_clinic_arrendance', [$from, $to]);
			})
			->get();

		$total_result1 = array();
		foreach ($FirstVisite as $value) {
			if (($value->scrotortum_left == 'scrotortum_left') || ($value->scrotortum_right == 'scrotortum_right')) {
				$hydrocele = 1;
			} else {
				$hydrocele = 0;
			}

			$x = 0;
			$faind = 0;
			foreach ($total_result1 as $value2){
				if (array_search($value['name_of_clinic'], $value2, true)) {
					$total_result1[$x] =  array(
						"name_of_clinic" => $value['name_of_clinic'],
						"no_of_clinic" => ($total_result1[$x]['no_of_clinic'] + 1),
						"lymphoedema_without_acute_attack" => (($total_result1[$x]['lymphoedema_without_acute_attack']) + ($value->clinical_presentatio == 'Lymphedema' ? '1' : '0')),
						"lymphoedema_with_acute_attack" => (($total_result1[$x]['lymphoedema_with_acute_attack']) + ($value->clinical_presentatio == 'Acute dermatolymphangioadenitis' ? '1' : '0')),
						"no_with_ho_4week" => (($total_result1[$x]['no_with_ho_4week']) + ($value->history_of_attacks_of_dermatoly == 'yes' ? '1' : '0')),
						"sub_no_of_clinic" => 0,
						"sub_lymphoedema_without_acute_attack" => 0,
						"sub_lymphoedema_with_acute_attack" => 0,
						"sub_no_with_ho_4week" => 0,
						"sub_total_no_of_new_lymph" => 0,
						"hydrocele" => (($total_result1[$x]['hydrocele'] + $hydrocele)),
						"tpe" => (($total_result1[$x]['tpe']) + ($value->clinical_presentatio == 'Tropical Pulmonary eosinophilia (TPE)' ? '1' : '0')),
					);
					$faind = 1;
				}
				$x++;
			}
			if ($faind == 0) {
				$total_result1[$x] =  array(
					"name_of_clinic" => $value['name_of_clinic'],
					"no_of_clinic" => 1,
					"lymphoedema_without_acute_attack" => ($value->clinical_presentatio == 'Lymphedema' ? '1' : '0'),
					"lymphoedema_with_acute_attack" => $value->clinical_presentatio == 'Acute dermatolymphangioadenitis' ? '1' : '0',
					"no_with_ho_4week" => $value->history_of_attacks_of_dermatoly == 'yes' ? '1' : '0',
					"sub_no_of_clinic" => 0,
					"sub_lymphoedema_without_acute_attack" => 0,
					"sub_lymphoedema_with_acute_attack" => 0,
					"sub_no_with_ho_4week" => 0,
					"sub_total_no_of_new_lymph" => 0,
					"hydrocele" => +$hydrocele,
					"tpe" => ($value->clinical_presentatio == 'Tropical Pulmonary eosinophilia (TPE)' ? '1' : '0'),
				);
			}
		}


		$SubsequentVist = \App\Initialregistation::with(['Subsequents' => function ($q) use ($from, $to) {
			$q->whereBetween('subsequent.date_of_first_clinic_arrendance', [$from, $to])
				->orderBy('id', 'desc')->get();
		}])
			->select('*')
			->where('district', $data['district'])
			->join('subsequent', function ($join) use ($from, $to) {
				$join->on('initialregistation.district_lymphedema_no', '=', 'subsequent.district_lymphedema_no')
					->whereBetween('subsequent.date_of_first_clinic_arrendance', [$from, $to]);
			})
			->get();


			

		foreach ($SubsequentVist as $value) {
			$x = 0;
			$faind = 0;



			foreach ($total_result1 as $value2) {

				if (array_search($value['name_of_clinic'], $value2, true)) {
					$total_result1[$x] =  array(
						"name_of_clinic" => $value['name_of_clinic'],
						"no_of_clinic" => $total_result1[$x]['no_of_clinic'],
						"lymphoedema_without_acute_attack" => $total_result1[$x]['lymphoedema_without_acute_attack'],
						"lymphoedema_with_acute_attack" => $total_result1[$x]['lymphoedema_with_acute_attack'],
						"no_with_ho_4week" => $total_result1[$x]['no_with_ho_4week'],
						"sub_no_of_clinic" => (($total_result1[$x]['sub_no_of_clinic']) + ($value->Clinical_lymphedema_regular_clinic == 'yes' ? '1' : '0')),
						"sub_lymphoedema_without_acute_attack" => (($total_result1[$x]['sub_lymphoedema_without_acute_attack']) + ($value->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_lymphoedema_with_acute_attack" => (($total_result1[$x]['sub_lymphoedema_with_acute_attack']) + ($value->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_no_with_ho_4week" => (($total_result1[$x]['sub_no_with_ho_4week']) + ($value->history_of_attacks_yes == 'yes' ? '1' : '0')),
						"sub_total_no_of_new_lymph" => $total_result1[$x]['sub_total_no_of_new_lymph'],
						"hydrocele" => $total_result1[$x]['hydrocele'],
						"tpe" => $total_result1[$x]['tpe'],
					);

					$faind = 1;
				}else {
					$x = count($total_result1) ;
					$total_result1[$x] =  array(
						"name_of_clinic" => $value->name_of_clinic,
						"no_of_clinic" => 0,
						"lymphoedema_without_acute_attack" => 0,
						"lymphoedema_with_acute_attack" =>0,
						"no_with_ho_4week" => 0,
						"sub_no_of_clinic" => ( ($value->Clinical_lymphedema_regular_clinic == 'yes' ? '1' : '0')),
						"sub_lymphoedema_without_acute_attack" => (($value->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_lymphoedema_with_acute_attack" => ( ($value->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_no_with_ho_4week" => (($value->history_of_attacks_yes == 'yes' ? '1' : '0')),
						"sub_total_no_of_new_lymph" => 0,
						"hydrocele" => 0,
						"tpe" => 0,
					);
				}







				$x++;
			}



if(empty($total_result1))
{
	$x = 0;
	$total_result1[$x] =  array(
		"name_of_clinic" => $value->name_of_clinic,
		"no_of_clinic" => 0,
		"lymphoedema_without_acute_attack" => 0,
		"lymphoedema_with_acute_attack" =>0,
		"no_with_ho_4week" => 0,
		"sub_no_of_clinic" => ( ($value->Clinical_lymphedema_regular_clinic == 'yes' ? '1' : '0')),
		"sub_lymphoedema_without_acute_attack" => (($value->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
		"sub_lymphoedema_with_acute_attack" => ( ($value->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
		"sub_no_with_ho_4week" => (($value->history_of_attacks_yes == 'yes' ? '1' : '0')),
		"sub_total_no_of_new_lymph" => 0,
		"hydrocele" => 0,
		"tpe" => 0,
	);
}






		}




		if ($export_type == 'PDF') {

			$content = ob_get_clean();
			// $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
			// File::requireOnce($html2pdf_path);
			$template = view(
				'report/remobility_report_print',
				compact('data'),
				["dataView" => $total_result1, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
			);
			try {

				$html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
				$html2pdf->pdf->SetTitle('MORBIDITY DATA  Report');
				$html2pdf->WriteHTML($template);
				$html2pdf->Output('mobility_report_print.pdf');
				ob_flush();
				ob_end_clean();
			} catch (HTML2PDF_exception $e) {
				echo $e;
				exit;
			}
			return  view(
				'report/remobility_report_print',
				compact('data'),
				["dataView" => $total_result1, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
			);
		} else {

			header('Content-Type: application/xls');
			header('Content-Disposition: attachment; filename=download.xls');
			echo $template = view(
				'report/remobility_report_print',
				compact('data'),
				["dataView" => $total_result1, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
			);
		}
	}

	public function mobility_report_print(Request $request)
	{
		$data = $request->all();
		$export_type = $data['export_type'];
		$from = $data['from'];
		$to = $data['to'];
		$moh = array('123123123');
		$result2 = "";

		if ($data['district'] == 'All') {
			$FirstVisite = \App\Initialregistation::with('initialregistationmos')
				->select('*')
				->join('initialregistationmo', function ($join) use ($from, $to) {
					$join->on('initialregistation.district_lymphedema_no', '=', 'initialregistationmo.district_lymphedema_no')
						->whereBetween('initialregistationmo.date_of_first_clinic_arrendance', [$from, $to]);
				})
				->get();

			$SubsequentVist = \App\Initialregistation::with(['Subsequents' => function ($q) use ($from, $to) {
				$q->whereBetween('subsequent.date_of_first_clinic_arrendance', [$from, $to])
					->orderBy('id', 'desc')->get();
			}])->has('Subsequents', '>', 0)
				->get();


			// $result22 = \App\Initialregistation::has('Subsequents', '>', 0)->with(['Subsequents' => function ($q) use ($from, $to) {
			// 	$q->whereBetween('subsequent.date_of_first_clinic_arrendance', [$from, $to])
			// 		->orderBy('id', 'desc')->first();
			// }])->get();




		} else {
			$FirstVisite = \App\Initialregistation::with('initialregistationmos')
				->select('*')
				->where('district', $data['district'])
				->join('initialregistationmo', function ($join) use ($from, $to) {
					$join->on('initialregistation.district_lymphedema_no', '=', 'initialregistationmo.district_lymphedema_no')
						->whereBetween('initialregistationmo.date_of_first_clinic_arrendance', [$from, $to]);
				})
				->get();
			$SubsequentVist = \App\Initialregistation::with(['Subsequents' => function ($q) use ($from, $to) {
				$q->whereBetween('subsequent.date_of_first_clinic_arrendance', [$from, $to])
					->orderBy('id', 'desc')->first();
			}])
				->where('district', $data['district'])
				->get();
		}

		$total_result = array(); // this array to store all district value 
		$total_result1['Colombo'] = array(
			"district" => 'Colombo',
			"no_of_clinic" => 0,
			"lymphoedema_without_acute_attack" => 0,
			"lymphoedema_with_acute_attack" => 0,
			"no_with_ho_4week" => 0,
			"total_no_of_new_lymph" => 0,
			"sub_no_of_clinic" => 0,
			"sub_lymphoedema_without_acute_attack" => 0,
			"sub_lymphoedema_with_acute_attack" => 0,
			"sub_no_with_ho_4week" => 0,
			"sub_total_no_of_new_lymph" => 0,
			"total_no_of_lymphoedema" => 0,
			"hydrocele" => 0,
			"tpe" => 0,
		);

		$total_result1['Gampaha'] = array(
			"district" => 'Gampaha',
			"no_of_clinic" => 0,
			"lymphoedema_without_acute_attack" => 0,
			"lymphoedema_with_acute_attack" => 0,
			"no_with_ho_4week" => 0,
			"total_no_of_new_lymph" => 0,
			"sub_no_of_clinic" => 0,
			"sub_lymphoedema_without_acute_attack" => 0,
			"sub_lymphoedema_with_acute_attack" => 0,
			"sub_no_with_ho_4week" => 0,
			"sub_total_no_of_new_lymph" => 0,
			"total_no_of_lymphoedema" => 0,
			"hydrocele" => 0,
			"tpe" => 0,
		);
		$total_result1['Kalutara'] = array(
			"district" => 'Kalutara',
			"no_of_clinic" => 0,
			"lymphoedema_without_acute_attack" => 0,
			"lymphoedema_with_acute_attack" => 0,
			"no_with_ho_4week" => 0,
			"total_no_of_new_lymph" => 0,
			"sub_no_of_clinic" => 0,
			"sub_lymphoedema_without_acute_attack" => 0,
			"sub_lymphoedema_with_acute_attack" => 0,
			"sub_no_with_ho_4week" => 0,
			"sub_total_no_of_new_lymph" => 0,
			"total_no_of_lymphoedema" => 0,
			"hydrocele" => 0,
			"tpe" => 0,
		);
		$total_result1['Galle'] = array(
			"district" => 'Galle',
			"no_of_clinic" => 0,
			"lymphoedema_without_acute_attack" => 0,
			"lymphoedema_with_acute_attack" => 0,
			"no_with_ho_4week" => 0,
			"total_no_of_new_lymph" => 0,
			"sub_no_of_clinic" => 0,
			"sub_lymphoedema_without_acute_attack" => 0,
			"sub_lymphoedema_with_acute_attack" => 0,
			"sub_no_with_ho_4week" => 0,
			"sub_total_no_of_new_lymph" => 0,
			"total_no_of_lymphoedema" => 0,
			"hydrocele" => 0,
			"tpe" => 0,
		);
		$total_result1['Matara'] = array(
			"district" => 'Matara',
			"no_of_clinic" => 0,
			"lymphoedema_without_acute_attack" => 0,
			"lymphoedema_with_acute_attack" => 0,
			"no_with_ho_4week" => 0,
			"total_no_of_new_lymph" => 0,
			"sub_no_of_clinic" => 0,
			"sub_lymphoedema_without_acute_attack" => 0,
			"sub_lymphoedema_with_acute_attack" => 0,
			"sub_no_with_ho_4week" => 0,
			"sub_total_no_of_new_lymph" => 0,
			"total_no_of_lymphoedema" => 0,
			"hydrocele" => 0,
			"tpe" => 0,
		);
		$total_result1['Hambantota'] = array(
			"district" => 'Hambantota',
			"no_of_clinic" => 0,
			"lymphoedema_without_acute_attack" => 0,
			"lymphoedema_with_acute_attack" => 0,
			"no_with_ho_4week" => 0,
			"total_no_of_new_lymph" => 0,
			"sub_no_of_clinic" => 0,
			"sub_lymphoedema_without_acute_attack" => 0,
			"sub_lymphoedema_with_acute_attack" => 0,
			"sub_no_with_ho_4week" => 0,
			"sub_total_no_of_new_lymph" => 0,
			"total_no_of_lymphoedema" => 0,
			"hydrocele" => 0,
			"tpe" => 0,
		);
		$total_result1['Kurunegala'] = array(
			"district" => 'Kurunegala',
			"no_of_clinic" => 0,
			"lymphoedema_without_acute_attack" => 0,
			"lymphoedema_with_acute_attack" => 0,
			"no_with_ho_4week" => 0,
			"total_no_of_new_lymph" => 0,
			"sub_no_of_clinic" => 0,
			"sub_lymphoedema_without_acute_attack" => 0,
			"sub_lymphoedema_with_acute_attack" => 0,
			"sub_no_with_ho_4week" => 0,
			"sub_total_no_of_new_lymph" => 0,
			"total_no_of_lymphoedema" => 0,
			"hydrocele" => 0,
			"tpe" => 0,
		);
		$total_result1['Puttalam'] = array(
			"district" => 'Puttalam',
			"no_of_clinic" => 0,
			"lymphoedema_without_acute_attack" => 0,
			"lymphoedema_with_acute_attack" => 0,
			"no_with_ho_4week" => 0,
			"total_no_of_new_lymph" => 0,
			"sub_no_of_clinic" => 0,
			"sub_lymphoedema_without_acute_attack" => 0,
			"sub_lymphoedema_with_acute_attack" => 0,
			"sub_no_with_ho_4week" => 0,
			"sub_total_no_of_new_lymph" => 0,
			"total_no_of_lymphoedema" => 0,
			"hydrocele" => 0,
			"tpe" => 0,
		);
		$total_result1['CMC'] = array(
			"district" => 'CMC',
			"no_of_clinic" => 0,
			"lymphoedema_without_acute_attack" => 0,
			"lymphoedema_with_acute_attack" => 0,
			"no_with_ho_4week" => 0,
			"total_no_of_new_lymph" => 0,
			"sub_no_of_clinic" => 0,
			"sub_lymphoedema_without_acute_attack" => 0,
			"sub_lymphoedema_with_acute_attack" => 0,
			"sub_no_with_ho_4week" => 0,
			"sub_total_no_of_new_lymph" => 0,
			"total_no_of_lymphoedema" => 0,
			"hydrocele" => 0,
			"tpe" => 0,
		);
		$total_result1['Total'] = array(
			"district" => 'Total',
			"no_of_clinic" => 0,
			"lymphoedema_without_acute_attack" => 0,
			"lymphoedema_with_acute_attack" => 0,
			"no_with_ho_4week" => 0,
			"total_no_of_new_lymph" => 0,
			"sub_no_of_clinic" => 0,
			"sub_lymphoedema_without_acute_attack" => 0,
			"sub_lymphoedema_with_acute_attack" => 0,
			"sub_no_with_ho_4week" => 0,
			"sub_total_no_of_new_lymph" => 0,
			"total_no_of_lymphoedema" => 0,
			"hydrocele" => 0,
			"tpe" => 0,
		);



		$Clinec_count_details[] = array(
			"clinic_name" => "",
			"dataRegistratiion" => "",
		);
		$x = 0;
		$faind = 0;

		//  dd($FirstVisite);
		foreach ($FirstVisite as 	$FirstVisiteData) {

			$clinic_name =	$FirstVisiteData->name_of_clinic;
			$dataofRegistation = $FirstVisiteData->initialregistationmos->date_of_first_clinic_arrendance;

			foreach ($Clinec_count_details as $value3) {
				if (array_search($clinic_name, $value3, true) and array_search($dataofRegistation, $value3, true)) {
					$faind = 1;
					$plusenumber = 0;
				}
				$x++;
				if ($faind == 0) {
					$Clinec_count_details[$x] = array(
						"clinic_name" => $clinic_name,
						"dataRegistratiion" => $dataofRegistation,
					);

					$plusenumber = 1;
				}
			}

			if (($FirstVisiteData->scrotortum_left == 'scrotortum_left') || ($FirstVisiteData->scrotortum_right == 'scrotortum_right')) {
				$hydrocele = 1;
			} else {
				$hydrocele = 0;
			}

			$total_result1['Total'] = array(
				"no_of_clinic" => ($total_result1['Total']['no_of_clinic'] + $plusenumber),
				"lymphoedema_without_acute_attack" => (($total_result1['Total']['lymphoedema_without_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Lymphedema' ? '1' : '0')),
				"lymphoedema_with_acute_attack" => (($total_result1['Total']['lymphoedema_with_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Acute dermatolymphangioadenitis' ? '1' : '0')),
				"no_with_ho_4week" => (($total_result1['Total']['no_with_ho_4week']) + ($FirstVisiteData->history_of_attacks_of_dermatoly == 'yes' ? '1' : '0')),
				"total_no_of_new_lymph" => $total_result1['Total']['total_no_of_new_lymph'],
				"sub_no_of_clinic" => $total_result1['Total']['sub_no_of_clinic'],
				"sub_lymphoedema_without_acute_attack" => $total_result1['Total']['sub_lymphoedema_without_acute_attack'],
				"sub_lymphoedema_with_acute_attack" => $total_result1['Total']['sub_lymphoedema_with_acute_attack'],
				"sub_no_with_ho_4week" => $total_result1['Total']['sub_no_with_ho_4week'],
				"sub_total_no_of_new_lymph" => $total_result1['Total']['sub_total_no_of_new_lymph'],
				"total_no_of_lymphoedema" => $total_result1['Total']['total_no_of_lymphoedema'],
				"hydrocele" => (($total_result1['Total']['hydrocele'] + $hydrocele)),
				"tpe" => (($total_result1['Total']['tpe']) + ($FirstVisiteData->clinical_presentatio == 'Tropical Pulmonary eosinophilia (TPE)' ? '1' : '0')),
			);


			switch ($FirstVisiteData->district) {
				case 'Colombo':
					$total_result1['Colombo'] = array(
						"no_of_clinic" => ($total_result1['Colombo']['no_of_clinic'] + $plusenumber),
						"lymphoedema_without_acute_attack" => (($total_result1['Colombo']['lymphoedema_without_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Lymphedema' ? '1' : '0')),
						"lymphoedema_with_acute_attack" => (($total_result1['Colombo']['lymphoedema_with_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Acute dermatolymphangioadenitis' ? '1' : '0')),
						"no_with_ho_4week" => (($total_result1['Colombo']['no_with_ho_4week']) + ($FirstVisiteData->history_of_attacks_of_dermatoly == 'yes' ? '1' : '0')),
						"total_no_of_new_lymph" => $total_result1['Colombo']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => $total_result1['Colombo']['sub_no_of_clinic'],
						"sub_lymphoedema_without_acute_attack" => $total_result1['Colombo']['sub_lymphoedema_without_acute_attack'],
						"sub_lymphoedema_with_acute_attack" => $total_result1['Colombo']['sub_lymphoedema_with_acute_attack'],
						"sub_no_with_ho_4week" => $total_result1['Colombo']['sub_no_with_ho_4week'],
						"sub_total_no_of_new_lymph" => $total_result1['Colombo']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['Colombo']['total_no_of_lymphoedema'],
						"hydrocele" => (($total_result1['Colombo']['hydrocele'] + $hydrocele)),
						"tpe" => (($total_result1['Colombo']['tpe']) + ($FirstVisiteData->clinical_presentatio == 'Tropical Pulmonary eosinophilia (TPE)' ? '1' : '0')),
					);
					break;
				case 'Gampaha':
					$total_result1['Gampaha'] = array(
						"no_of_clinic" => ($total_result1['Gampaha']['no_of_clinic'] +  $plusenumber),
						"lymphoedema_without_acute_attack" => (($total_result1['Gampaha']['lymphoedema_without_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Lymphedema' ? '1' : '0')),
						"lymphoedema_with_acute_attack" => (($total_result1['Gampaha']['lymphoedema_with_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Acute dermatolymphangioadenitis' ? '1' : '0')),
						"no_with_ho_4week" => (($total_result1['Gampaha']['no_with_ho_4week']) + ($FirstVisiteData->history_of_attacks_of_dermatoly == 'yes' ? '1' : '0')),
						"total_no_of_new_lymph" => $total_result1['Gampaha']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => $total_result1['Gampaha']['sub_no_of_clinic'],
						"sub_lymphoedema_without_acute_attack" => $total_result1['Gampaha']['sub_lymphoedema_without_acute_attack'],
						"sub_lymphoedema_with_acute_attack" => $total_result1['Gampaha']['sub_lymphoedema_with_acute_attack'],
						"sub_no_with_ho_4week" => $total_result1['Gampaha']['sub_no_with_ho_4week'],
						"sub_total_no_of_new_lymph" => $total_result1['Gampaha']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['Gampaha']['total_no_of_lymphoedema'],
						"hydrocele" => (($total_result1['Gampaha']['hydrocele'] + $hydrocele)),
						"tpe" => (($total_result1['Gampaha']['tpe']) + ($FirstVisiteData->clinical_presentatio == 'Tropical Pulmonary eosinophilia (TPE)' ? '1' : '0')),
					);
					break;
				case 'Kalutara':
					$total_result1['Kalutara'] = array(
						"no_of_clinic" => ($total_result1['Kalutara']['no_of_clinic'] +  $plusenumber),
						"lymphoedema_without_acute_attack" => (($total_result1['Kalutara']['lymphoedema_without_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Lymphedema' ? '1' : '0')),
						"lymphoedema_with_acute_attack" => (($total_result1['Kalutara']['lymphoedema_with_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Acute dermatolymphangioadenitis' ? '1' : '0')),
						"no_with_ho_4week" => (($total_result1['Kalutara']['no_with_ho_4week']) + ($FirstVisiteData->history_of_attacks_of_dermatoly == 'yes' ? '1' : '0')),
						"total_no_of_new_lymph" => $total_result1['Kalutara']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => $total_result1['Kalutara']['sub_no_of_clinic'],
						"sub_lymphoedema_without_acute_attack" => $total_result1['Kalutara']['sub_lymphoedema_without_acute_attack'],
						"sub_lymphoedema_with_acute_attack" => $total_result1['Kalutara']['sub_lymphoedema_with_acute_attack'],
						"sub_no_with_ho_4week" => $total_result1['Kalutara']['sub_no_with_ho_4week'],
						"sub_total_no_of_new_lymph" => $total_result1['Kalutara']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['Kalutara']['total_no_of_lymphoedema'],
						"hydrocele" => (($total_result1['Kalutara']['hydrocele'] + $hydrocele)),
						"tpe" => (($total_result1['Kalutara']['tpe']) + ($FirstVisiteData->clinical_presentatio == 'Tropical Pulmonary eosinophilia (TPE)' ? '1' : '0')),
					);
					break;
				case 'Galle':
					$total_result1['Galle'] = array(
						"no_of_clinic" => ($total_result1['Galle']['no_of_clinic'] +  $plusenumber),
						"lymphoedema_without_acute_attack" => (($total_result1['Galle']['lymphoedema_without_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Lymphedema' ? '1' : '0')),
						"lymphoedema_with_acute_attack" => (($total_result1['Galle']['lymphoedema_with_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Acute dermatolymphangioadenitis' ? '1' : '0')),
						"no_with_ho_4week" => (($total_result1['Galle']['no_with_ho_4week']) + ($FirstVisiteData->history_of_attacks_of_dermatoly == 'yes' ? '1' : '0')),
						"total_no_of_new_lymph" => $total_result1['Galle']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => $total_result1['Galle']['sub_no_of_clinic'],
						"sub_lymphoedema_without_acute_attack" => $total_result1['Galle']['sub_lymphoedema_without_acute_attack'],
						"sub_lymphoedema_with_acute_attack" => $total_result1['Galle']['sub_lymphoedema_with_acute_attack'],
						"sub_no_with_ho_4week" => $total_result1['Galle']['sub_no_with_ho_4week'],
						"sub_total_no_of_new_lymph" => $total_result1['Galle']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['Galle']['total_no_of_lymphoedema'],
						"hydrocele" => (($total_result1['Galle']['hydrocele'] + $hydrocele)),
						"tpe" => (($total_result1['Galle']['tpe']) + ($FirstVisiteData->clinical_presentatio == 'Tropical Pulmonary eosinophilia (TPE)' ? '1' : '0')),
					);

					break;
				case 'Matara':
					$total_result1['Matara'] = array(
						"no_of_clinic" => ($total_result1['Matara']['no_of_clinic'] + $plusenumber),
						"lymphoedema_without_acute_attack" => (($total_result1['Matara']['lymphoedema_without_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Lymphedema' ? '1' : '0')),
						"lymphoedema_with_acute_attack" => (($total_result1['Matara']['lymphoedema_with_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Acute dermatolymphangioadenitis' ? '1' : '0')),
						"no_with_ho_4week" => (($total_result1['Matara']['no_with_ho_4week']) + ($FirstVisiteData->history_of_attacks_of_dermatoly == 'yes' ? '1' : '0')),
						"total_no_of_new_lymph" => $total_result1['Matara']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => $total_result1['Matara']['sub_no_of_clinic'],
						"sub_lymphoedema_without_acute_attack" => $total_result1['Matara']['sub_lymphoedema_without_acute_attack'],
						"sub_lymphoedema_with_acute_attack" => $total_result1['Matara']['sub_lymphoedema_with_acute_attack'],
						"sub_no_with_ho_4week" => $total_result1['Matara']['sub_no_with_ho_4week'],
						"sub_total_no_of_new_lymph" => $total_result1['Matara']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['Matara']['total_no_of_lymphoedema'],
						"hydrocele" => (($total_result1['Matara']['hydrocele'] + $hydrocele)),
						"tpe" => (($total_result1['Matara']['tpe']) + ($FirstVisiteData->clinical_presentatio == 'Tropical Pulmonary eosinophilia (TPE)' ? '1' : '0')),
					);
					break;
				case 'Hambantota':
					$total_result1['Hambantota'] = array(
						"no_of_clinic" => ($total_result1['Hambantota']['no_of_clinic'] +  $plusenumber),
						"lymphoedema_without_acute_attack" => (($total_result1['Hambantota']['lymphoedema_without_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Lymphedema' ? '1' : '0')),
						"lymphoedema_with_acute_attack" => (($total_result1['Hambantota']['lymphoedema_with_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Acute dermatolymphangioadenitis' ? '1' : '0')),
						"no_with_ho_4week" => (($total_result1['Hambantota']['no_with_ho_4week']) + ($FirstVisiteData->history_of_attacks_of_dermatoly == 'yes' ? '1' : '0')),
						"total_no_of_new_lymph" => $total_result1['Hambantota']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => $total_result1['Hambantota']['sub_no_of_clinic'],
						"sub_lymphoedema_without_acute_attack" => $total_result1['Hambantota']['sub_lymphoedema_without_acute_attack'],
						"sub_lymphoedema_with_acute_attack" => $total_result1['Hambantota']['sub_lymphoedema_with_acute_attack'],
						"sub_no_with_ho_4week" => $total_result1['Hambantota']['sub_no_with_ho_4week'],
						"sub_total_no_of_new_lymph" => $total_result1['Hambantota']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['Hambantota']['total_no_of_lymphoedema'],
						"hydrocele" => (($total_result1['Hambantota']['hydrocele'] + $hydrocele)),
						"tpe" => (($total_result1['Hambantota']['tpe']) + ($FirstVisiteData->clinical_presentatio == 'Tropical Pulmonary eosinophilia (TPE)' ? '1' : '0')),
					);
					break;
				case 'Kurunegala':
					$total_result1['Kurunegala'] = array(
						"no_of_clinic" => ($total_result1['Kurunegala']['no_of_clinic'] +  $plusenumber),
						"lymphoedema_without_acute_attack" => (($total_result1['Kurunegala']['lymphoedema_without_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Lymphedema' ? '1' : '0')),
						"lymphoedema_with_acute_attack" => (($total_result1['Kurunegala']['lymphoedema_with_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Acute dermatolymphangioadenitis' ? '1' : '0')),
						"no_with_ho_4week" => (($total_result1['Kurunegala']['no_with_ho_4week']) + ($FirstVisiteData->history_of_attacks_of_dermatoly == 'yes' ? '1' : '0')),
						"total_no_of_new_lymph" => $total_result1['Kurunegala']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => $total_result1['Kurunegala']['sub_no_of_clinic'],
						"sub_lymphoedema_without_acute_attack" => $total_result1['Kurunegala']['sub_lymphoedema_without_acute_attack'],
						"sub_lymphoedema_with_acute_attack" => $total_result1['Kurunegala']['sub_lymphoedema_with_acute_attack'],
						"sub_no_with_ho_4week" => $total_result1['Kurunegala']['sub_no_with_ho_4week'],
						"sub_total_no_of_new_lymph" => $total_result1['Kurunegala']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['Kurunegala']['total_no_of_lymphoedema'],
						"hydrocele" => (($total_result1['Kurunegala']['hydrocele'] + $hydrocele)),
						"tpe" => (($total_result1['Kurunegala']['tpe']) + ($FirstVisiteData->clinical_presentatio == 'Tropical Pulmonary eosinophilia (TPE)' ? '1' : '0')),
					);
					break;
				case 'Puttalam':
					$total_result1['Puttalam'] = array(
						"no_of_clinic" => ($total_result1['Puttalam']['no_of_clinic'] +  $plusenumber),
						"lymphoedema_without_acute_attack" => (($total_result1['Puttalam']['lymphoedema_without_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Lymphedema' ? '1' : '0')),
						"lymphoedema_with_acute_attack" => (($total_result1['Puttalam']['lymphoedema_with_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Acute dermatolymphangioadenitis' ? '1' : '0')),
						"no_with_ho_4week" => (($total_result1['Puttalam']['no_with_ho_4week']) + ($FirstVisiteData->history_of_attacks_of_dermatoly == 'yes' ? '1' : '0')),
						"total_no_of_new_lymph" => $total_result1['Puttalam']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => $total_result1['Puttalam']['sub_no_of_clinic'],
						"sub_lymphoedema_without_acute_attack" => $total_result1['Puttalam']['sub_lymphoedema_without_acute_attack'],
						"sub_lymphoedema_with_acute_attack" => $total_result1['Puttalam']['sub_lymphoedema_with_acute_attack'],
						"sub_no_with_ho_4week" => $total_result1['Puttalam']['sub_no_with_ho_4week'],
						"sub_total_no_of_new_lymph" => $total_result1['Puttalam']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['Puttalam']['total_no_of_lymphoedema'],
						"hydrocele" => (($total_result1['Puttalam']['hydrocele'] + $hydrocele)),
						"tpe" => (($total_result1['Puttalam']['tpe']) + ($FirstVisiteData->clinical_presentatio == 'Tropical Pulmonary eosinophilia (TPE)' ? '1' : '0')),
					);
					break;
				case 'CMC':
					$total_result1['CMC'] = array(
						"no_of_clinic" => ($total_result1['CMC']['no_of_clinic'] +  $plusenumber),
						"lymphoedema_without_acute_attack" => (($total_result1['CMC']['lymphoedema_without_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Lymphedema' ? '1' : '0')),
						"lymphoedema_with_acute_attack" => (($total_result1['CMC']['lymphoedema_with_acute_attack']) + ($FirstVisiteData->clinical_presentatio == 'Acute dermatolymphangioadenitis' ? '1' : '0')),
						"no_with_ho_4week" => (($total_result1['CMC']['no_with_ho_4week']) + ($FirstVisiteData->history_of_attacks_of_dermatoly == 'yes' ? '1' : '0')),
						"total_no_of_new_lymph" => $total_result1['CMC']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => $total_result1['CMC']['sub_no_of_clinic'],
						"sub_lymphoedema_without_acute_attack" => $total_result1['CMC']['sub_lymphoedema_without_acute_attack'],
						"sub_lymphoedema_with_acute_attack" => $total_result1['CMC']['sub_lymphoedema_with_acute_attack'],
						"sub_no_with_ho_4week" => $total_result1['CMC']['sub_no_with_ho_4week'],
						"sub_total_no_of_new_lymph" => $total_result1['CMC']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['CMC']['total_no_of_lymphoedema'],
						"hydrocele" => (($total_result1['CMC']['hydrocele'] + $hydrocele)),
						"tpe" => (($total_result1['CMC']['tpe']) + ($FirstVisiteData->clinical_presentatio == 'Tropical Pulmonary eosinophilia (TPE)' ? '1' : '0')),
					);
					break;
			}
		}



		foreach ($SubsequentVist as 	$SubsequentVistData) {

if($SubsequentVistData->Subsequents){



			$x = 0;
			$faind = 0;
			$total_result1['Total'] = array(
				"no_of_clinic" => $total_result1['Total']['no_of_clinic'],
				"lymphoedema_without_acute_attack" => $total_result1['Total']['lymphoedema_without_acute_attack'],
				"lymphoedema_with_acute_attack" => $total_result1['Total']['lymphoedema_with_acute_attack'],
				"no_with_ho_4week" => $total_result1['Total']['no_with_ho_4week'],
				"total_no_of_new_lymph" => $total_result1['Total']['total_no_of_new_lymph'],
				"sub_no_of_clinic" => (($total_result1['Total']['sub_no_of_clinic']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'yes' ? '1' : '0')),
				"sub_lymphoedema_without_acute_attack" => (($total_result1['Total']['sub_lymphoedema_without_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
				"sub_lymphoedema_with_acute_attack" => (($total_result1['Total']['sub_lymphoedema_with_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
				"sub_no_with_ho_4week" => (($total_result1['Total']['sub_no_with_ho_4week']) + ($SubsequentVistData->Subsequents->history_of_attacks_yes == 'yes' ? '1' : '0')),
				"sub_total_no_of_new_lymph" => $total_result1['Total']['sub_total_no_of_new_lymph'],
				"total_no_of_lymphoedema" => $total_result1['Total']['total_no_of_lymphoedema'],
				"hydrocele" => $total_result1['Total']['hydrocele'],
				"tpe" => $total_result1['Total']['tpe'],
			);


			switch ($SubsequentVistData->district) {
				case 'Colombo':
					$total_result1['Colombo'] = array(
						"no_of_clinic" => $total_result1['Colombo']['no_of_clinic'],
						"lymphoedema_without_acute_attack" => $total_result1['Colombo']['lymphoedema_without_acute_attack'],
						"lymphoedema_with_acute_attack" => $total_result1['Colombo']['lymphoedema_with_acute_attack'],
						"no_with_ho_4week" => $total_result1['Colombo']['no_with_ho_4week'],
						"total_no_of_new_lymph" => $total_result1['Colombo']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => (($total_result1['Colombo']['sub_no_of_clinic']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'yes' ? '1' : '0')),
						"sub_lymphoedema_without_acute_attack" => (($total_result1['Colombo']['sub_lymphoedema_without_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_lymphoedema_with_acute_attack" => (($total_result1['Colombo']['sub_lymphoedema_with_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_no_with_ho_4week" => (($total_result1['Colombo']['sub_no_with_ho_4week']) + ($SubsequentVistData->Subsequents->history_of_attacks_yes == 'yes' ? '1' : '0')),
						"sub_total_no_of_new_lymph" => $total_result1['Colombo']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['Colombo']['total_no_of_lymphoedema'],
						"hydrocele" => $total_result1['Colombo']['hydrocele'],
						"tpe" => $total_result1['Colombo']['tpe'],
					);
					break;
				case 'Gampaha':
					$total_result1['Gampaha'] = array(
						"no_of_clinic" => $total_result1['Gampaha']['no_of_clinic'],
						"lymphoedema_without_acute_attack" => $total_result1['Gampaha']['lymphoedema_without_acute_attack'],
						"lymphoedema_with_acute_attack" => $total_result1['Gampaha']['lymphoedema_with_acute_attack'],
						"no_with_ho_4week" => $total_result1['Gampaha']['no_with_ho_4week'],
						"total_no_of_new_lymph" => $total_result1['Gampaha']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => (($total_result1['Gampaha']['sub_no_of_clinic']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'yes' ? '1' : '0')),
						"sub_lymphoedema_without_acute_attack" => (($total_result1['Gampaha']['sub_lymphoedema_without_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_lymphoedema_with_acute_attack" => (($total_result1['Gampaha']['sub_lymphoedema_with_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_no_with_ho_4week" => (($total_result1['Gampaha']['sub_no_with_ho_4week']) + ($SubsequentVistData->Subsequents->history_of_attacks_yes == 'yes' ? '1' : '0')),
						"sub_total_no_of_new_lymph" => $total_result1['Gampaha']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['Gampaha']['total_no_of_lymphoedema'],
						"hydrocele" => $total_result1['Gampaha']['hydrocele'],
						"tpe" => $total_result1['Gampaha']['tpe'],
					);
					break;
				case 'Kalutara':
					$total_result1['Kalutara'] = array(
						"no_of_clinic" => $total_result1['Kalutara']['no_of_clinic'],
						"lymphoedema_without_acute_attack" => $total_result1['Kalutara']['lymphoedema_without_acute_attack'],
						"lymphoedema_with_acute_attack" => $total_result1['Kalutara']['lymphoedema_with_acute_attack'],
						"no_with_ho_4week" => $total_result1['Kalutara']['no_with_ho_4week'],
						"total_no_of_new_lymph" => $total_result1['Kalutara']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => (($total_result1['Kalutara']['sub_no_of_clinic']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'yes' ? '1' : '0')),
						"sub_lymphoedema_without_acute_attack" => (($total_result1['Kalutara']['sub_lymphoedema_without_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_lymphoedema_with_acute_attack" => (($total_result1['Kalutara']['sub_lymphoedema_with_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_no_with_ho_4week" => (($total_result1['Kalutara']['sub_no_with_ho_4week']) + ($SubsequentVistData->Subsequents->history_of_attacks_yes == 'yes' ? '1' : '0')),
						"sub_total_no_of_new_lymph" => $total_result1['Kalutara']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['Kalutara']['total_no_of_lymphoedema'],
						"hydrocele" => $total_result1['Kalutara']['hydrocele'],
						"tpe" => $total_result1['Kalutara']['tpe'],
					);
					break;
				case 'Galle':
					$total_result1['Galle'] = array(
						"no_of_clinic" => $total_result1['Galle']['no_of_clinic'],
						"lymphoedema_without_acute_attack" => $total_result1['Galle']['lymphoedema_without_acute_attack'],
						"lymphoedema_with_acute_attack" => $total_result1['Galle']['lymphoedema_with_acute_attack'],
						"no_with_ho_4week" => $total_result1['Galle']['no_with_ho_4week'],
						"total_no_of_new_lymph" => $total_result1['Galle']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => (($total_result1['Galle']['sub_no_of_clinic']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'yes' ? '1' : '0')),
						"sub_lymphoedema_without_acute_attack" => (($total_result1['Galle']['sub_lymphoedema_without_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_lymphoedema_with_acute_attack" => (($total_result1['Galle']['sub_lymphoedema_with_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_no_with_ho_4week" => (($total_result1['Galle']['sub_no_with_ho_4week']) + ($SubsequentVistData->Subsequents->history_of_attacks_yes == 'yes' ? '1' : '0')),
						"sub_total_no_of_new_lymph" => $total_result1['Galle']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['Galle']['total_no_of_lymphoedema'],
						"hydrocele" => $total_result1['Galle']['hydrocele'],
						"tpe" => $total_result1['Galle']['tpe'],
					);
					break;
				case 'Matara':
					$total_result1['Matara'] = array(
						"no_of_clinic" => $total_result1['Matara']['no_of_clinic'],
						"lymphoedema_without_acute_attack" => $total_result1['Matara']['lymphoedema_without_acute_attack'],
						"lymphoedema_with_acute_attack" => $total_result1['Matara']['lymphoedema_with_acute_attack'],
						"no_with_ho_4week" => $total_result1['Matara']['no_with_ho_4week'],
						"total_no_of_new_lymph" => $total_result1['Matara']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => (($total_result1['Matara']['sub_no_of_clinic']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'yes' ? '1' : '0')),
						"sub_lymphoedema_without_acute_attack" => (($total_result1['Matara']['sub_lymphoedema_without_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_lymphoedema_with_acute_attack" => (($total_result1['Matara']['sub_lymphoedema_with_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_no_with_ho_4week" => (($total_result1['Matara']['sub_no_with_ho_4week']) + ($SubsequentVistData->Subsequents->history_of_attacks_yes == 'yes' ? '1' : '0')),
						"sub_total_no_of_new_lymph" => $total_result1['Matara']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['Matara']['total_no_of_lymphoedema'],
						"hydrocele" => $total_result1['Matara']['hydrocele'],
						"tpe" => $total_result1['Matara']['tpe'],
					);
					break;
				case 'Hambantota':
					$total_result1['Hambantota'] = array(
						"no_of_clinic" => $total_result1['Hambantota']['no_of_clinic'],
						"lymphoedema_without_acute_attack" => $total_result1['Hambantota']['lymphoedema_without_acute_attack'],
						"lymphoedema_with_acute_attack" => $total_result1['Hambantota']['lymphoedema_with_acute_attack'],
						"no_with_ho_4week" => $total_result1['Hambantota']['no_with_ho_4week'],
						"total_no_of_new_lymph" => $total_result1['Hambantota']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => (($total_result1['Hambantota']['sub_no_of_clinic']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'yes' ? '1' : '0')),
						"sub_lymphoedema_without_acute_attack" => (($total_result1['Hambantota']['sub_lymphoedema_without_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_lymphoedema_with_acute_attack" => (($total_result1['Hambantota']['sub_lymphoedema_with_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_no_with_ho_4week" => (($total_result1['Hambantota']['sub_no_with_ho_4week']) + ($SubsequentVistData->Subsequents->history_of_attacks_yes == 'yes' ? '1' : '0')),
						"sub_total_no_of_new_lymph" => $total_result1['Hambantota']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['Hambantota']['total_no_of_lymphoedema'],
						"hydrocele" => $total_result1['Hambantota']['hydrocele'],
						"tpe" => $total_result1['Hambantota']['tpe'],
					);
					break;
				case 'Kurunegala':
					$total_result1['Kurunegala'] = array(
						"no_of_clinic" => $total_result1['Kurunegala']['no_of_clinic'],
						"lymphoedema_without_acute_attack" => $total_result1['Kurunegala']['lymphoedema_without_acute_attack'],
						"lymphoedema_with_acute_attack" => $total_result1['Kurunegala']['lymphoedema_with_acute_attack'],
						"no_with_ho_4week" => $total_result1['Kurunegala']['no_with_ho_4week'],
						"total_no_of_new_lymph" => $total_result1['Kurunegala']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => (($total_result1['Kurunegala']['sub_no_of_clinic']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'yes' ? '1' : '0')),
						"sub_lymphoedema_without_acute_attack" => (($total_result1['Kurunegala']['sub_lymphoedema_without_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_lymphoedema_with_acute_attack" => (($total_result1['Kurunegala']['sub_lymphoedema_with_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_no_with_ho_4week" => (($total_result1['Kurunegala']['sub_no_with_ho_4week']) + ($SubsequentVistData->Subsequents->history_of_attacks_yes == 'yes' ? '1' : '0')),
						"sub_total_no_of_new_lymph" => $total_result1['Kurunegala']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['Kurunegala']['total_no_of_lymphoedema'],
						"hydrocele" => $total_result1['Kurunegala']['hydrocele'],
						"tpe" => $total_result1['Kurunegala']['tpe'],
					);
					break;
				case 'Puttalam':
					$total_result1['Puttalam'] = array(
						"no_of_clinic" => $total_result1['Puttalam']['no_of_clinic'],
						"lymphoedema_without_acute_attack" => $total_result1['Puttalam']['lymphoedema_without_acute_attack'],
						"lymphoedema_with_acute_attack" => $total_result1['Puttalam']['lymphoedema_with_acute_attack'],
						"no_with_ho_4week" => $total_result1['Puttalam']['no_with_ho_4week'],
						"total_no_of_new_lymph" => $total_result1['Puttalam']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => (($total_result1['Puttalam']['sub_no_of_clinic']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'yes' ? '1' : '0')),
						"sub_lymphoedema_without_acute_attack" => (($total_result1['Puttalam']['sub_lymphoedema_without_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_lymphoedema_with_acute_attack" => (($total_result1['Puttalam']['sub_lymphoedema_with_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_no_with_ho_4week" => (($total_result1['Puttalam']['sub_no_with_ho_4week']) + ($SubsequentVistData->Subsequents->history_of_attacks_yes == 'yes' ? '1' : '0')),
						"sub_total_no_of_new_lymph" => $total_result1['Puttalam']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['Puttalam']['total_no_of_lymphoedema'],
						"hydrocele" => $total_result1['Puttalam']['hydrocele'],
						"tpe" => $total_result1['Puttalam']['tpe'],
					);
					break;
				case 'CMC':

		
					$total_result1['CMC'] = array(
						"no_of_clinic" => $total_result1['CMC']['no_of_clinic'],
						"lymphoedema_without_acute_attack" => $total_result1['CMC']['lymphoedema_without_acute_attack'],
						"lymphoedema_with_acute_attack" => $total_result1['CMC']['lymphoedema_with_acute_attack'],
						"no_with_ho_4week" => $total_result1['CMC']['no_with_ho_4week'],
						"total_no_of_new_lymph" => $total_result1['CMC']['total_no_of_new_lymph'],
						"sub_no_of_clinic" => (($total_result1['CMC']['sub_no_of_clinic']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'yes' ? '1' : '0')),
						"sub_lymphoedema_without_acute_attack" => (($total_result1['CMC']['sub_lymphoedema_without_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_lymphoedema_with_acute_attack" => (($total_result1['CMC']['sub_lymphoedema_with_acute_attack']) + ($SubsequentVistData->Subsequents->Clinical_lymphedema_regular_clinic == 'No' ? '1' : '0')),
						"sub_no_with_ho_4week" => (($total_result1['CMC']['sub_no_with_ho_4week']) + ($SubsequentVistData->Subsequents->history_of_attacks_yes == 'yes' ? '1' : '0')),
						"sub_total_no_of_new_lymph" => $total_result1['CMC']['sub_total_no_of_new_lymph'],
						"total_no_of_lymphoedema" => $total_result1['CMC']['total_no_of_lymphoedema'],
						"hydrocele" => $total_result1['CMC']['hydrocele'],
						"tpe" => $total_result1['CMC']['tpe'],
					);
					break;
			}
		}
		}


		$viewData = $result2;

		if ($export_type == 'PDF') {
			$content = ob_get_clean();
			$template = view(
				'report/mobility_report_print',
				compact('data'),
				["dataView" => $total_result1, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
			);
			try {
				$html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
				$html2pdf->pdf->SetTitle('Mobility__Report');
				$html2pdf->WriteHTML($template);
				$html2pdf->Output('b1_report.pdf');
				ob_flush();
				ob_end_clean();
			} catch (HTML2PDF_exception $e) {
				echo $e;
				exit;
			}
			return  view(
				'report/mobility_report_print',
				compact('data'),
				["dataView" => $total_result1, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
			);
		} else {

			header('Content-Type: application/xls');
			header('Content-Disposition: attachment; filename=download.xls');
			echo $template = view(
				'report/mobility_report_print',
				compact('data'),
				["dataView" => $total_result1, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
			);
		}
	}
	//end

}
