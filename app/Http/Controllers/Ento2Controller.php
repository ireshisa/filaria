<?php

namespace App\Http\Controllers;

use App\Ento_02;
use App\Ento_02_data;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


require __DIR__ . '/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;




class Ento2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $district = DB::table('district')
            ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'ento_02/ento_02';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }

    public function ento2_data()
    {
        // if (Auth::user()->role === "ADMIN" & Auth::user()->role === "AFC") {
        $list = DB::table('ento_02')
            ->select('*')
            ->where('user_name', Auth::user()->email)
            ->orderBy('ento_02_id', 'desc')
            ->get();
        // } else {
        //     $list = DB::table('ento_02')
        //     ->select('*')
        //     ->orderBy('ento_02_id', 'desc')
        //     ->get();
        // }

        $district = DB::table('district')
            ->orderBy('district', 'ASC')
            ->select('*')
            ->get();

        $data['template'] = 'ento_02/ento_02_data';
        return view('template_user/template', compact('data'), ["ento2_list" => $list, "district_list" => $district]);
    }


    public function view_all()
    {
        if (Auth::user()->role === "RMO" || Auth::user()->role === "PHLT") {
            $ento2 = DB::table('ento_02')
                ->select('*')
                ->where('district', Auth::user()->district)
                ->orderBy('ento_02_id', 'desc')
                ->get();
        } else if (Auth::user()->role === "ADMIN" || Auth::user()->role === "AFC") {
            $ento2 = DB::table('ento_02')
                ->select('*')
                ->orderBy('ento_02_id', 'desc')
                ->get();
        } else {
            $ento2 = DB::table('ento_02')
                ->select('*')
                ->where('user_name', Auth::user()->email)
                ->orderBy('ento_02_id', 'desc')
                ->get();
        }

        $data['template'] = 'ento_02/ento_02_view';
        $district = DB::table('district')
            ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        return view('template_user/template', compact('data'), ["ento2_list" => $ento2, "district_list" => $district]);
    }


    public function ento2_update(Request $request)
    {
        $data = $request->all();
        // $ento2=[
        //     "district"=>$data['district'],
        //     "method"=>$data['method'],
        //     "total_cx_quin_mosq"=>$data['total_cx_quin_mosq'],
        //     "total_traps"=>$data['total_traps'],
        //     "mosq_density_per_trap"=>$data['mosq_density_per_trap'],
        //     "heo"=>$data['heo'],
        //     "date"=>$data['date'],
        //     "rmo_ent"=>$data['rmo_ent']
        // ];
        $id = $data['ento_02_id'];
        unset($data['ento_02_id'], $data['_token']);
        $success = Ento_02::where('ento_02_id', $id)->update($data);
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

        // $ento2=[
        //     "district"=>$data['district'],
        //     "method"=>$data['method'],
        //     "total_cx_quin_mosq"=>$data['total_cx_quin_mosq'],
        //     "total_traps"=>$data['total_traps'],
        //     "mosq_density_per_trap"=>$data['mosq_density_per_trap'],
        //     "heo"=>$data['heo'],
        //     "date"=>$data['date'],
        //     "rmo_ent"=>$data['rmo_ent']
        // ];
        $success = Ento_02::create($data);
        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function ento2_data_save(Request $request)
    {
        $data = $request->all();
        $data["user_name"] = Auth::user()->email;

        // $ento2_data=[
        //     "ento_02_id"=> $data['ento_02_id'],
        //     "date"=>$data['data_date'],
        //     "serial_no"=>$data['serial_no'],
        //     "moh_area"=>$data['moh_area'],
        //     "gn_division"=>$data['gn_division'],
        //     "chief_occupant"=>$data['chief_occupant'],
        //     "address"=>$data['address'],
        //     "gps_lat"=>$data['gps_lat'],
        //     "gps_long"=>$data['gps_long'],
        //     "total_cx_quin"=>$data['total_cx_quin'],
        //     "mosq_pcr"=>$data['mosq_pcr'],
        //     "mosq_dis"=>$data['mosq_dis'],
        //     "tube_no"=>$data['tube_no'],
        //     "pcr_date_rec"=>$data['pcr_date_rec'],
        //     "pcr_ref"=>$data['pcr_ref'],
        //     "pcr_date_test"=>$data['pcr_date_test'],
        //     "pcr_remarks"=>$data['pcr_remarks'],
        //     "tube_no2"=>$data['tube_no2'],
        //     "pcr_remarks2"=>$data['pcr_remarks2'],
        // ];
        $success = Ento_02_data::create($data);
        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function ento2_data_update(Request $request)
    {
        $data = $request->all();
        // $ento2_data=[
        //     "ento_02_id"=> $data['ento_02_id'],
        //     "date"=>$data['data_date'],
        //     "serial_no"=>$data['serial_no'],
        //     // "moh_area"=>$data['moh_area'],
        //     "gn_division"=>$data['gn_division'],
        //     "chief_occupant"=>$data['chief_occupant'],
        //     "address"=>$data['address'],
        //     "gps_lat"=>$data['gps_lat'],
        //     "gps_long"=>$data['gps_long'],
        //     "total_cx_quin"=>$data['total_cx_quin'],
        //     "mosq_pcr"=>$data['mosq_pcr'],
        //     "mosq_dis"=>$data['mosq_dis'],
        //     "tube_no"=>$data['tube_no'],
        //     "pcr_date_rec"=>$data['pcr_date_rec'],
        //     "pcr_ref"=>$data['pcr_ref'],
        //     "pcr_date_test"=>$data['pcr_date_test'],
        //     "pcr_remarks"=>$data['pcr_remarks'],
        //     "tube_no2"=>$data['tube_no2'],
        //     "pcr_remarks2"=>$data['pcr_remarks2'],
        // ];
        $id = $data['id'];
        unset($data['id'], $data['_token']);
        $success = Ento_02_data::where('id', $id)->update($data);
        if ($success) {
            return redirect()->back()->with('update', true);
        } else {
            return redirect()->back()->with('update', false);
        }
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
        $res = Ento_02::where('ento_02_id', $id)->delete();
        $res = Ento_02_data::where('ento_02_id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function view_ento2_data($id)
    {
        $list = DB::table('ento_02_data')
            ->select('*')
            ->where('ento_02_id', $id)
            ->get();

        $list2 = DB::table('ento_02')
            ->select('*')
            ->orderBy('ento_02_id', 'desc')
            ->get();
        $district = DB::table('district')
            ->orderBy('district', 'ASC')
            ->select('*')
            ->get();


        $data['template'] = 'ento_02/ento_02_data_view';
        return view('template_user/template', compact('data'), ["ento2_data_list" => $list, "ento2_list" => $list2, "district_list" => $district]);
    }

    public function delete_ento2_data($id)
    {
        $res = Ento_02_data::where('id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }


    // new ento_02 Form for new update request

    public function newForm()
    {
        $district = DB::table('district')
            ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'ento_02/ento_02_new_form';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }



    public function createNew(Request $request)
    {
        $data = $request->all();
        $data["user_name"] = Auth::user()->email;




        switch ($data['district']) {
            case "Colombo":
                $district = "COL/GT/";
                break;
            case "Gampaha":
                $district = "GAM/GT/";
                break;
            case "Kalutara":
                $district = "KAL/GT/";
                break;
            case "Galle":
                $district = "GAL/GT/";
                break;
            case "Matara":
                $district = "MAT/GT/";
                break;
            case "Hambantota":
                $district = "HAM/GT/";
                break;
            case "Kurunegala":
                $district = "KUR/GT/";
                break;
            case "Puttalam":
                $district = "PUT/GT/";
                break;
            case "CMC":
                $district = "AFC/GT/";
                break;
            case "Non endemic":
                $district = "NED/GT/";
                break;
            default:
        }

        // //get last Id relavent and make new one
        $initial_registration = DB::table('ento_02')
            ->select('*')
            ->orderBy('ento_02_id', 'desc')
            ->where('district', $data['district'])
            ->first();
        $date = date('Y');

        if (empty($initial_registration)) {
            $form_id    =  $district . $date . "/1";
        } else {
            $no = $initial_registration->formid;
            $split = explode("/", $no);
            $form_id    = $district . $date . "/" . ($split[3] + 1);
        }
        // //get last Id relavent 




        $ento2 = [
            "formid" => $form_id,
            "district" => $data['district'],
            "moh_area" => $data['moh_area'],
            "phm_area" => $data['phm_area'],
            "weather_condition" => $data['weather_condition'],
            "total_cx_quin_mosq" => $data['total_cx_quin_mosq'],
            "total_traps" => $data['total_traps'],
            "mosq_density_per_trap" => $data['mosq_density_per_trap'],
            "heo" => $data['heo'],
            "date" => $data['date'],
            "rmo_ent" => $data['rmo_ent']
        ];
        $success = Ento_02::create($ento2);
        $ento2_id = $success->id;
        $DataFildCount = count($data['address']);
        for ($i = 0; $i < $DataFildCount; $i++) {
            $ento1data = [
                "ento_02_id" => $ento2_id,
                "date" => $data['date2'][$i],
                "no_of_traps" => $data['no_of_traps'][$i],
                "gn_division" => $data['gn_division'][$i],
                "chief_occupant" => $data['chief_occupant'][$i],
                "address" => $data['address'][$i],
                "gps_lat" => $data['gps_lat'][$i],
                "gps_long" => $data['gps_long'][$i],
                "total_cx_quin" => $data['total_cx_quin'][$i],
                "user_name" => Auth::user()->email
            ];
            $success = Ento_02_data::create($ento1data);
        }



        if ($success) {
            return redirect()->back()->with('message', true)->with('id', $form_id);
        } else {
            return redirect()->back()->with('message', false)->with('id', $form_id);
        }
    }




    public function view_ento2new($id)
    {

        $role = Auth::user()->role;
        if ($role == "ADMIN" || $role == "ADMIN") {
            $pcr_details = "";
        } else {
            $pcr_details = "readonly";
        }


        $list = DB::table('ento_02_data')
            ->select('*')
            ->where('ento_02_id', $id)
            ->get();

        $list2 = DB::table('ento_02')
            ->select('*')
            ->orderBy('ento_02_id', 'desc')
            ->get();
        // $district = DB::table('district')
        // ->select('*')
        // ->get();
        $data2 = \App\Ento_02::with('ento_02_dataes')->where("ento_02_id", $id)->first();
        $data3 = \App\Ento_02_data::with('Ento_5_news')->where("ento_02_id", $id)->get();

        $data['template'] = 'ento_02/ento_02_new_view';
        return view('template_user/template', compact('data'), ["ento2_list" => $data2, "ento1_list_5" => $data3, "pcr_details" => $pcr_details]);
    }






    public function view_ento2new_print($id)
    {


        $Total = 0;
        $TotalCxQuin = 0;
        $TotalNo_Mos = 0;
        $TotalNoOF_Mos = 0;
        $TotalNOInfected_Mos = 0;
        $TotalNOInfective_Mos = 0;
        $TotalHead_mf = 0;
        $Totalhead_l1 = 0;
        $Totalhead_l2 = 0;
        $Totalhead_l3 = 0;
        $TotalThorax_mf = 0;
        $TotalThorax_l1 = 0;
        $TotalThorax_l2 = 0;
        $TotalThorax_l3 = 0;
        $TotalAbdomen_mf = 0;
        $TotalAbdomen_L1 = 0;
        $TotalAbdomen_L2 = 0;
        $TotalAbdomen_L3 = 0;


        $list = DB::table('ento_02_data')
            ->select('*')
            ->where('ento_02_id', $id)
            ->get();

        $list2 = DB::table('ento_02')
            ->select('*')
            ->orderBy('ento_02_id', 'desc')
            ->get();
        // $district = DB::table('district')
        // ->select('*')
        // ->get();
        $data2 = \App\Ento_02::with('ento_02_dataes')->where("ento_02_id", $id)->first();
        $data3 = \App\Ento_02_data::with('Ento_5_news')->where("ento_02_id", $id)->get();

        foreach ($data2->ento_02_dataes as $key) {
            foreach ($key->Ento_5_news as $data5) {



                $TotalNoOF_Mos += $data5->no_dissected_mosquitos;
                $TotalNOInfected_Mos += $data5->positive_mosq;
                $TotalNOInfective_Mos += $data5->mq_postive_for_l3;
                $TotalHead_mf += $data5->head_mf;
                $Totalhead_l1 += $data5->head_l1;
                $Totalhead_l2 += $data5->head_l2;
                $Totalhead_l3 += $data5->head_l3;
                $TotalThorax_mf += $data5->thorax_mf;
                $TotalThorax_l1 += $data5->thorax_l1;
                $TotalThorax_l2 += $data5->thorax_l2;
                $TotalThorax_l3 += $data5->thorax_l3;
                $TotalAbdomen_mf += $data5->abdomen_mf;
                $TotalAbdomen_L1 += $data5->abdomen_l1;
                $TotalAbdomen_L2 += $data5->abdomen_l2;
                $TotalAbdomen_L3 += $data5->abdomen_l3;
            }
            $TotalCxQuin += $key->total_cx_quin;
            $TotalNo_Mos += $key->No_mos_2 + $key->No_mos_1;
        }


        $ento_total = array(
            "TotalCxQuin" => $TotalCxQuin,
            "TotalNo_Mos" => $TotalNo_Mos,
            "TotalNoOF_Mos" => $TotalNoOF_Mos,
            "TotalNOInfected_Mos" => $TotalNOInfected_Mos,
            "TotalNOInfective_Mos" => $TotalNOInfective_Mos,
            "TotalHead_mf" => $TotalHead_mf,
            "Totalhead_l1" => $Totalhead_l1,
            "Totalhead_l2" => $Totalhead_l2,
            "Totalhead_l3" => $Totalhead_l3,
            "TotalThorax_mf" => $TotalThorax_mf,
            "TotalThorax_l1" => $TotalThorax_l1,
            "TotalThorax_l2" => $TotalThorax_l2,
            "TotalThorax_l3" => $TotalThorax_l3,
            "TotalAbdomen_mf" => $TotalAbdomen_mf,
            "TotalAbdomen_L1" => $TotalAbdomen_L1,
            "TotalAbdomen_L2" => $TotalAbdomen_L2,
            "TotalAbdomen_L3" => $TotalAbdomen_L3,

        );



        $page = 'ento_02/ento_02_new_view_print';
        $data = '';
        $content = ob_get_clean();
        // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
        // File::requireOnce($html2pdf_path);
        $template = view(
            $page,
            compact('data'),
            ["ento2_list" => $data2, "ento1_list_5" => $data3, "ento_total" => $ento_total]
        );
        try {

            $html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
            $html2pdf->pdf->SetTitle('Ento 2');
            $html2pdf->WriteHTML($template);
            $html2pdf->Output('Ento_2.pdf');
            ob_flush();
            ob_end_clean();
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }















    public function view_ento2new_excel($id)
    {


        $Total = 0;
        $TotalCxQuin = 0;
        $TotalNo_Mos = 0;
        $TotalNoOF_Mos = 0;
        $TotalNOInfected_Mos = 0;
        $TotalNOInfective_Mos = 0;
        $TotalHead_mf = 0;
        $Totalhead_l1 = 0;
        $Totalhead_l2 = 0;
        $Totalhead_l3 = 0;
        $TotalThorax_mf = 0;
        $TotalThorax_l1 = 0;
        $TotalThorax_l2 = 0;
        $TotalThorax_l3 = 0;
        $TotalAbdomen_mf = 0;
        $TotalAbdomen_L1 = 0;
        $TotalAbdomen_L2 = 0;
        $TotalAbdomen_L3 = 0;


        $list = DB::table('ento_02_data')
            ->select('*')
            ->where('ento_02_id', $id)
            ->get();

        $list2 = DB::table('ento_02')
            ->select('*')
            ->orderBy('ento_02_id', 'desc')
            ->get();
        // $district = DB::table('district')
        // ->select('*')
        // ->get();
        $data2 = \App\Ento_02::with('ento_02_dataes')->where("ento_02_id", $id)->first();
        $data3 = \App\Ento_02_data::with('Ento_5_news')->where("ento_02_id", $id)->get();

        foreach ($data2->ento_02_dataes as $key) {
            foreach ($key->Ento_5_news as $data5) {



                $TotalNoOF_Mos += $data5->no_dissected_mosquitos;
                $TotalNOInfected_Mos += $data5->positive_mosq;
                $TotalNOInfective_Mos += $data5->mq_postive_for_l3;
                $TotalHead_mf += $data5->head_mf;
                $Totalhead_l1 += $data5->head_l1;
                $Totalhead_l2 += $data5->head_l2;
                $Totalhead_l3 += $data5->head_l3;
                $TotalThorax_mf += $data5->thorax_mf;
                $TotalThorax_l1 += $data5->thorax_l1;
                $TotalThorax_l2 += $data5->thorax_l2;
                $TotalThorax_l3 += $data5->thorax_l3;
                $TotalAbdomen_mf += $data5->abdomen_mf;
                $TotalAbdomen_L1 += $data5->abdomen_l1;
                $TotalAbdomen_L2 += $data5->abdomen_l2;
                $TotalAbdomen_L3 += $data5->abdomen_l3;
            }
            $TotalCxQuin += $key->total_cx_quin;
            $TotalNo_Mos += $key->No_mos_2 + $key->No_mos_1;
        }


        $ento_total = array(
            "TotalCxQuin" => $TotalCxQuin,
            "TotalNo_Mos" => $TotalNo_Mos,
            "TotalNoOF_Mos" => $TotalNoOF_Mos,
            "TotalNOInfected_Mos" => $TotalNOInfected_Mos,
            "TotalNOInfective_Mos" => $TotalNOInfective_Mos,
            "TotalHead_mf" => $TotalHead_mf,
            "Totalhead_l1" => $Totalhead_l1,
            "Totalhead_l2" => $Totalhead_l2,
            "Totalhead_l3" => $Totalhead_l3,
            "TotalThorax_mf" => $TotalThorax_mf,
            "TotalThorax_l1" => $TotalThorax_l1,
            "TotalThorax_l2" => $TotalThorax_l2,
            "TotalThorax_l3" => $TotalThorax_l3,
            "TotalAbdomen_mf" => $TotalAbdomen_mf,
            "TotalAbdomen_L1" => $TotalAbdomen_L1,
            "TotalAbdomen_L2" => $TotalAbdomen_L2,
            "TotalAbdomen_L3" => $TotalAbdomen_L3,

        );



        $page = 'ento_02/ento_02_new_view_print';
        $data = '';
        $content = ob_get_clean();
        // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
        // File::requireOnce($html2pdf_path);
        $template = view(
            $page,
            compact('data'),
            ["ento2_list" => $data2, "ento1_list_5" => $data3, "ento_total" => $ento_total]
        );
   


        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=download.xls');
        echo    $template = view(
            $page,
            compact('data'),
            ["ento2_list" => $data2, "ento1_list_5" => $data3, "ento_total" => $ento_total]
        );
   




    }





    public function ento2UpdateNew(Request $request)
    {
        $data = $request->all();
        $data["user_name"] = Auth::user()->email;
        $ento2 = [
            "district" => $data['district'],
            "formid" => $data['formid'],
            "moh_area" => $data['moh_area'],
            "weather_condition" => $data['weather_condition'],
            "total_cx_quin_mosq" => $data['total_cx_quin_mosq'],
            "total_traps" => $data['total_traps'],
            "mosq_density_per_trap" => $data['mosq_density_per_trap'],
            "heo" => $data['heo'],
            "date" => $data['date'],
            "phm_area" => $data['phm_area'],
            "rmo_ent" => $data['rmo_ent']
        ];

        $ento2_id = $data['ento_02_id'];
        $success = Ento_02::where('ento_02_id', $data['ento_02_id'])->update($ento2);
        $DataFildCount = count($data['id2']);

        for ($i = 0; $i < $DataFildCount; $i++) {
            $ento2data = [
                // "serial_no" => $data['serial_no'][$i],
                "date" => $data['date2'][$i],
                "no_of_traps" => $data['no_of_traps'][$i],
                "gn_division" => $data['gn_division'][$i],
                "chief_occupant" => $data['chief_occupant'][$i],
                "address" => $data['address'][$i],
                "gps_lat" => $data['gps_lat'][$i],
                "gps_long" => $data['gps_long'][$i],
                "total_cx_quin" => $data['total_cx_quin'][$i],
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

            ];
            $success = Ento_02_data::where('id', $data['id2'][$i])->update($ento2data);
        }

        if ($DataFildCount < count($data['address'])) {
            for ($i = $DataFildCount; $i < count($data['address']); $i++) {
                $ento2newdata = [
                    "ento_02_id" => $ento2_id,
                    // "serial_no" => $data['serial_no'][$i],
                    "date" => $data['date2'][$i],
                    "no_of_traps" => $data['no_of_traps'][$i],
                    "gn_division" => $data['gn_division'][$i],
                    "chief_occupant" => $data['chief_occupant'][$i],
                    "address" => $data['address'][$i],
                    "gps_lat" => $data['gps_lat'][$i],
                    "gps_long" => $data['gps_long'][$i],
                    "total_cx_quin" => $data['total_cx_quin'][$i],
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
                ];
                $success = Ento_02_data::create($ento2newdata);
            }
        }

        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }



    public function delete_ento2_data_new($id)
    {

        $res = Ento_02_data::where('id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }
}
