<?php

namespace App\Http\Controllers;

use App\Ento_03;
use App\Ento_03_data;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


require __DIR__ . '/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;




class Ento3Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'ento_03/ento_03';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }

    public function ento3_data()
    {
        // if (Auth::user()->role !== "ADMIN" & Auth::user()->role !== "AFC") {
        $list = DB::table('ento_03')
            ->select('*')
            ->where('user_name', Auth::user()->email)
            ->orderBy('ento_03_id', 'desc')
            ->get();
        // } else {
        //     $list = DB::table('ento_03')
        //     ->select('*')
        //     ->orderBy('ento_03_id', 'desc')
        //     ->get();
        // }
        $data['template'] = 'ento_03/ento_03_data';
        return view('template_user/template', compact('data'), ["ento3_list" => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ento3_update(Request $request)
    {
        $data = $request->all();
        $ento3 = [
            "district" => $data['district'],
            "moh" => $data['moh'],
            "address" => $data['address'],
            "date_of_collection" => $data['date_of_collection'],
            "phi" => $data['phi'],
            "time_of_bait" => $data['time_of_bait'],
            "gn" => $data['gn'],
            "start_time_of_col" => $data['start_time_of_col'],
            "no_of_mosq_sp" => $data['no_of_mosq_sp'],
            "total_no_of_mosq" => $data['total_no_of_mosq'],
            "gps_lat" => $data['gps_lat'],
            "gps_long" => $data['gps_long']
        ];
        $success = Ento_03::where('ento_03_id', $data['ento_03_id'])->update($ento3);
        if ($success) {
            return redirect()->back()->with('update', true);
        } else {
            return redirect()->back()->with('update', false);
        }
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $data["user_name"] = Auth::user()->email;
        // $ento3=[
        //     "district"=>$data['distrcit'],
        //     "moh"=>$data['moh'],
        //     "address"=>$data['address'],
        //     "date_of_collection"=>$data['date_of_collection'],
        //     "phi"=>$data['phi'],
        //     "time_of_bait"=>$data['time_of_bait'],
        //     "gn"=>$data['gn'],
        //     "start_time_of_col"=>$data['start_time_of_col'],
        //     "no_of_mosq_sp"=>$data['no_of_mosq_sp'],
        //     "total_no_of_mosq"=>$data['total_no_of_mosq'],
        // ];
        $success = Ento_03::create($data);
        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }


    public function ento3_data_save(Request $request)
    {
        $data = $request->all();
        $data["user_name"] = Auth::user()->email;
        $success = Ento_03_data::create($data);




        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function ento3_data_update(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        unset($data['id'], $data['_token']);
        $success = Ento_03_data::where('id', $id)->update($data);
        if ($success) {
            return redirect()->back()->with('update', true);
        } else {
            return redirect()->back()->with('update', false);
        }
    }

    public function view_all()
    {
        if (Auth::user()->role === "RMO") {
            $ento3 = DB::table('ento_03')
                ->select('*')
                ->where('district', Auth::user()->district)
                ->orderBy('ento_03_id', 'desc')
                ->get();
        } else if (Auth::user()->role === "ADMIN" || Auth::user()->role === "AFC") {
            $ento3 = DB::table('ento_03')
                ->select('*')
                ->orderBy('ento_03_id', 'desc')
                ->get();
        } else {
            $ento3 = DB::table('ento_03')
                ->select('*')
                ->where('user_name', Auth::user()->email)
                ->orderBy('ento_03_id', 'desc')
                ->get();
        }

        $data['template'] = 'ento_03/ento_03_view';
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        return view('template_user/template', compact('data'), ["ento3_list" => $ento3, "district_list" => $district]);
    }




    public function view_ento3_data($id)
    {
        $ento3 = DB::table('ento_03_data')
            ->select('*')
            ->where('ento_03_id', $id)
            ->orderBy('ento_03_id', 'desc')
            ->get();
        $data['template'] = 'ento_03/ento_03_data_view';

        $list = DB::table('ento_03')
            ->select('*')
            ->orderBy('ento_03_id', 'desc')
            ->get();
        return view('template_user/template', compact('data'), ["ento3_data_list" => $ento3, "ento3_list" => $list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Ento_03::where('ento_03_id', $id)->delete();
        // $res = Ento_03_data::where('ento_03_id', $id)->delete();
        Ento_03_data::where('ento_03_id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function delete_ento3_data($id)
    {
        $res = Ento_03_data::where('ID', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }


    public function ento3New()
    {
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'ento_03/ento_03newForm';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }



    public function ento3_datanew_save(Request $request)
    {
        $data = $request->all();
        $data["user_name"] = Auth::user()->email;


        switch ( $data['district']) {
            case "Colombo":
                $district="COL/CBNT/";
                break;
            case "Gampaha":
                $district="GAM/CBNT/";
                break;
            case "Kalutara":
                $district="KAL/CBNT/";
                break;
            case "Galle":
                $district="GAL/CBNT/";
                break;
            case "Matara":
                $district="MAT/CBNT/";
                break;
            case "Hambantota":
                $district="HAM/CBNT/";
                break;
            case "Kurunegala":
                $district="KUR/CBNT/";
                break;
            case "Puttalam":
                $district="PUT/CBNT/";
                break;
            case "CMC":
                $district="AFC/CBNT/";
                break;
            case "Non endemic":
                $district="NED/CBNT/";
                break;
            default:
        }

		// //get last Id relavent and make new one
		$initial_registration = DB::table('ento_03')
			->select('*')
			->orderBy('ento_03_id', 'desc')
			->where('district', $data['district'])
			->first();
		$date = date('Y');

		if (empty($initial_registration)) {
			$form_id	=  $district.$date."/1" ;
		} else {
			$no = $initial_registration->formid;
			$split = explode("/", $no);
			$form_id	=$district.$date."/".($split[3] + 1);
		}


        $ento3 = [
            "name_of_rmo_entomologist" => $data['name_of_rmo_entomologist'],
            "formid" => $form_id,
            "district" => $data['district'],
            "moh" => $data['moh'],
            "phi" => $data['phi'],
            "period_of_collection_from" => $data['period_of_collection_from'],
            "period_of_collection_to" => $data['period_of_collection_to'],
            "gn" => $data['gn'],
            "date_of_collection" => $data['date_of_collection'],
            "address" => $data['address'],
            "gps_lat" => $data['gps_lat'],
            "gps_long" => $data['gps_long'],
            "no_of_traps" => $data['no_of_traps'],
            "name_of_heo" => $data['name_of_heo'],
            "start_time_of_col" => $data['start_time_of_col'],
            "user_name" => Auth::user()->email
        ];

        $success = Ento_03::create($ento3);
        $ento_03_id = $success->id;




        // Insert Second time data array to entodata table
        $DataFildCount = count($data['no_of_mosq']);


        for ($i = 0; $i < $DataFildCount; $i++) {
            $ento3data = [
                "ento_03_id" => $ento_03_id,
                "mosq_species" => $data['mosq_species'][$i],
                "no_of_mosq" => $data['no_of_mosq'][$i],
                "density_per_trap" => $data['density_per_trap'][$i],
                "No_mos_1" => $data['No_mos_1'][$i],
                "Pool_no_1" => $data['Pool_no_1'][$i],
                "pcr_date_rec" => $data['pcr_date_rec'][$i],
                "ref_no_1" => $data['ref_no_1'][$i],
                "pcr_date_test" => $data['pcr_date_test'][$i],
                "pcr_remarks" => $data['pcr_remarks'][$i],
                "No_mos_2" => $data['No_mos_2'][$i],
                "Pool_no_2" => $data['Pool_no_2'][$i],
                "ref_no_2" => $data['ref_no_2'][$i],
                "pcr_remarks2" => $data['pcr_remarks2'][$i],
                "user_name" => Auth::user()->email

            ];

            $success = Ento_03_data::create($ento3data);
        }


        if ($success) {
            return redirect()->back()->with('message', true)->with('id', $form_id);
        } else {
            return redirect()->back()->with('message', false)->with('id', $form_id);
        }
    }


    // 
    public function new_view_ento3($id)
    {

        $role = Auth::user()->role;
        if ($role == "ADMIN" || $role == "ADMIN") {
            $pcr_details = "";
        } else {
            $pcr_details = "readonly";
        }
        $data2 = \App\Ento_03::with('ento_03_dataes')->where("ento_03_id", $id)->first();

        $data3 = \App\Ento_03_data::with('Ento_5_news')->where("ento_03_id", $id)->get();


// dd( $data3);
        $data['template'] = 'ento_03/ento_03_new_view';
        return view('template_user/template', compact('data'), ["ento3_list" => $data2,"ento3_list_5" => $data3,"pcr_details" => $pcr_details]);
    }


public function new_view_ento3_print($id)
{

    $data2 = \App\Ento_03::with('ento_03_dataes')->where("ento_03_id", $id)->first();
    $data3 = \App\Ento_03_data::with('Ento_5_news')->where("ento_03_id", $id)->get();

    $ento_total="";
    $page = 'ento_03/ento_03_new_view_print';
    $data = '';
    $content = ob_get_clean();

    $template = view(
        $page,
        compact('data'),
        ["ento3_list" => $data2, "ento3_list_5" => $data3,"ento_total" => $ento_total]
    );
    try {

        $html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
        $html2pdf->pdf->SetTitle('Ento 3');
        $html2pdf->WriteHTML($template);
        $html2pdf->Output('Ento_3.pdf');
        ob_flush();
        ob_end_clean();
    } catch (HTML2PDF_exception $e) {
        echo $e;
        exit;
    }





}









public function new_view_ento3_excel($id)
{

    $data2 = \App\Ento_03::with('ento_03_dataes')->where("ento_03_id", $id)->first();
    $data3 = \App\Ento_03_data::with('Ento_5_news')->where("ento_03_id", $id)->get();

    $ento_total="";
    $page = 'ento_03/ento_03_new_view_print';
    $data = '';
    $content = ob_get_clean();

    $template = view(
        $page,
        compact('data'),
        ["ento3_list" => $data2, "ento3_list_5" => $data3,"ento_total" => $ento_total]
    );
    

    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=download.xls');
    echo    $template = view(
        $page,
        compact('data'),
        ["ento3_list" => $data2, "ento3_list_5" => $data3,"ento_total" => $ento_total]
    );



}




    public function ento3_data_newupdate(Request $request)
    {
        $data = $request->all();
        $data["user_name"] = Auth::user()->email;

        $ento3 = [
            "name_of_rmo_entomologist" => $data['name_of_rmo_entomologist'],
            "formid" => $data['formid'],
            "district" => $data['district'],
            "moh" => $data['moh'],
            "phi" => $data['phi'],
            "gn" => $data['gn'],
            "address" => $data['address'],
            "gps_lat" => $data['gps_lat'],
            "gps_long" => $data['gps_long'],
            "period_of_collection_from" => $data['period_of_collection_from'],
            "period_of_collection_to" => $data['period_of_collection_to'],
            "no_of_traps" => $data['no_of_traps'],
            "name_of_heo" => $data['name_of_heo'],
            "date_of_collection" => $data['date_of_collection'],
            "start_time_of_col" => $data['start_time_of_col'],
            "user_name" => Auth::user()->email
        ];

        $ento3_id = $data['ento_03_id'];
        $success = Ento_03::where('ento_03_id', $data['ento_03_id'])->update($ento3);


        $DataFildCount = count($data['id2']);

        for ($i = 0; $i < $DataFildCount; $i++) {
            $ento3data = [
                "mosq_species" => $data['mosq_species'][$i],
                "no_of_mosq" => $data['no_of_mosq'][$i],
                "density_per_trap" => $data['density_per_trap'][$i],
                "No_mos_1" => $data['No_mos_1'][$i],
                "Pool_no_1" => $data['Pool_no_1'][$i],
                "pcr_date_rec" => $data['pcr_date_rec'][$i],
                "ref_no_1" => $data['ref_no_1'][$i],
                "pcr_date_test" => $data['pcr_date_test'][$i],
                "pcr_remarks" => $data['pcr_remarks'][$i],
                "No_mos_2" => $data['No_mos_2'][$i],
                "Pool_no_2" => $data['Pool_no_2'][$i],
                "ref_no_2" => $data['ref_no_2'][$i],
                "pcr_remarks2" => $data['pcr_remarks2'][$i],
                 "abdominalcondition_UF" => $data['abdominalcondition_UF'][$i],
                 "abdominalcondition_U" => $data['abdominalcondition_U'][$i],
                 "abdominalcondition_SG" => $data['abdominalcondition_SG'][$i],
                 "abdominalcondition_G" => $data['abdominalcondition_G'][$i],
                
            ];
            $success = Ento_03_data::where('id', $data['id2'][$i])->update($ento3data);
        }

        // new data
        if ($DataFildCount < count($data['no_of_mosq'])) {
            for ($i = $DataFildCount; $i < count($data['no_of_mosq']); $i++) {
                $ento3newdata = [
                    "mosq_species" => $data['mosq_species'][$i],
                    "no_of_mosq" => $data['no_of_mosq'][$i],
                    "density_per_trap" => $data['density_per_trap'][$i],
                    "No_mos_1" => $data['No_mos_1'][$i],
                    "Pool_no_1" => $data['Pool_no_1'][$i],
                    "pcr_date_rec" => $data['pcr_date_rec'][$i],
                    "ref_no_1" => $data['ref_no_1'][$i],
                    "pcr_date_test" => $data['pcr_date_test'][$i],
                    "pcr_remarks" => $data['pcr_remarks'][$i],
                    "No_mos_2" => $data['No_mos_2'][$i],
                    "Pool_no_2" => $data['Pool_no_2'][$i],
                    "ref_no_2" => $data['ref_no_2'][$i],
                    "pcr_remarks2" => $data['pcr_remarks2'][$i],
                    "abdominalcondition_UF" => $data['abdominalcondition_UF'][$i],
                    "abdominalcondition_U" => $data['abdominalcondition_U'][$i],
                    "abdominalcondition_SG" => $data['abdominalcondition_SG'][$i],
                    "abdominalcondition_G" => $data['abdominalcondition_G'][$i],
                ];
                $success = Ento_03_data::create($ento3newdata);
            }
        }

        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }



    public function delete_ento3_data_new($id)
    {
        $res = Ento_03_data::where('ID', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }
}
