<?php

namespace App\Http\Controllers;



require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;



use App\C1_Data;
use App\C1_Form;
use Auth;
// use HTML2PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class C1Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function c1_report_print(Request $request)
    {
        $data = $request->all();
        $district = $data['district'];
        $select = $data['select'];
        $year = $data['year'];
        $month = $data['month'];
        $export_type = $data['export_type'];
        $quarter = $data['quarter'];

        $sumtotal_num_lymphed = 0;
        $sumtotal_num_hydro = 0;
        $summf_pos_patient = 0;
        $viewData = "";
        $viewData3 = "";
        $requestType="";
        
      

        
           $request_type= " 3<sup>rd</sup> Quarter  " . $year;

        if ($select == "yearly") {
            $requestType= "Annual-".$year;
            $result34 = DB::table('c_1_data')
                ->select('*')
                ->where('district', $district)
                ->where('year', $year)
                ->get();
        } else if ($select == "quarterly") {
            $requestType= " 1<sup>st</sup> Quarter   " . $year;;
            if ($quarter == "Quarter1") {
                $result34 = DB::table('c_1_data')
                    ->select('*')
                    ->where('district', $district)
                    ->where('year', $year)
                    ->whereIn('month', array("January", "February", "March"))
                    ->get();
            } else if ($quarter == "Quarter2") {
                $requestType= " 2<sup>nd</sup> Quarter  " . $year;
                $result34 = DB::table('c_1_data')
                    ->select('*')
                    ->where('district', $district)
                    ->where('year', $year)
                    ->whereIn('month', array("April", "May", "June"))
                    ->get();
            } else if ($quarter == "Quarter3") {
                $requestType=  " 3<sup>rd</sup> Quarter  " . $year;
                $result34 = DB::table('c_1_data')
                    ->select('*')
                    ->where('district', $district)
                    ->where('year', $year)
                    ->whereIn('month', array("July", "August", "September"))
                    ->get();
            } else if ($quarter == "Quarter4") {
                $requestType= $request_type= " 4<sup>th</sup> Quarter  " . $year;;
                $result34 = DB::table('c_1_data')
                    ->select('*')
                    ->where('district', $district)
                    ->where('year', $year)
                    ->whereIn('month', array("October", "November", "December"))
                    ->get();
            }
        } else if ($select == "monthly") {
            $requestType= $month." ".$year;
            
            $result34 = DB::table('c_1_data')
                ->select('*')
                ->where('district', $district)
                ->where('year', $year)
                ->where('month', $month)
                ->get();
        }

      


                if ($result34) {
                    for ($j = 0; $j < count($result34); $j++) {


                        $name_clinic = $result34[$j]->name_clinic;
                        $no_clinic = $result34[$j]->no_clinic;
                        $no_3_1 = $result34[$j]->no_3_1;
                        $no_3_2 = $result34[$j]->no_3_2;
                        $no_3_3 = $result34[$j]->no_3_3;
                        $no_4_1 = $result34[$j]->no_4_1;
                        $no_4_2 = $result34[$j]->no_4_2;
                        $no_4_3 = $result34[$j]->no_4_3;
                        $total_nm_5 = $result34[$j]->total_nm_5;
                        $No_presented_TPE = $result34[$j]->No_presented_TPE;
                        $No_dirofilaria_cases = $result34[$j]->No_dirofilaria_cases;
                        if (empty($no_3_1) or $no_3_1 == ' ') {
                            $no_3_1 = 0;
                        }
                        if (empty($no_3_2) or $no_3_2 == ' ') {
                            $no_3_2 = 0;
                        }
                        if (empty($no_3_3) or $no_3_3 == ' ') {
                            $no_3_3 = 0;
                        }
                        $n3_4 = $no_3_1 + $no_3_2;
                        if (empty($no_4_2) or $no_4_2 == ' ') {
                            $no_4_2 = 0;
                        }
                        if (empty($no_4_3) or $no_4_3 == ' ') {
                            $no_4_3 = 0;
                        }
                        if (empty($no_4_1) or $no_4_1 == ' ') {
                            $no_4_1 = 0;
                        }
                        if (empty($total_nm_5) or $total_nm_5 == ' ') {
                            $total_nm_5 = 0;
                        }
                        if (empty($No_presented_TPE) or $No_presented_TPE == ' ') {
                            $No_presented_TPE = 0;
                        }

                        if (empty($No_dirofilaria_cases) or $No_dirofilaria_cases == ' ') {
                            $No_dirofilaria_cases = 0;
                        }




                        $n4_4 = $no_4_1 + $no_4_2;

                        $viewData = $viewData . '<tr>
                        <td>' . $name_clinic . '</td>' .
                            '<td>' . $no_clinic . '</td>' .
                            '<td>' . $no_3_2 . '</td>' .
                            '<td>' . $no_3_2 . '</td>' .
                            '<td>' . $no_3_3 . '</td>' .
                            '<td>' . $n3_4 . '</td>' .
                            '<td>' . $no_4_1 . '</td>' .
                            '<td>' . $no_4_2 . '</td>' .
                            '<td>' . $no_4_3 . '</td>' .
                            '<td>' . $n4_4 . '</td>' .
                            '<td>' . ($n3_4 + $n4_4) . '</td>' .
                            '<td>' . $No_presented_TPE . '</td>' .
                            '<td>' . $No_dirofilaria_cases . '</td>
                        </tr>';
                    }
                }
            
        
        //        $viewData2 = "";
        //
        //        if ($result) {
        //            for ($j = 0; $j < count($result); $j++) {
        //                $i_male = $result[$j]->i_male;
        //                $i_male_age = $result[$j]->i_male_age;
        //                $i_female = $result[$j]->i_female;
        //                $i_female_age = $result[$j]->i_female_age;
        //                $i_visits = $result[$j]->i_visits;
        //                $ii_male = $result[$j]->ii_male;
        //                $ii_male_age = $result[$j]->ii_male_age;
        //                $ii_female = $result[$j]->ii_female;
        //                $ii_female_age = $result[$j]->ii_female_age;
        //                $ii_visits = $result[$j]->ii_visits;
        //                $iii_male = $result[$j]->iii_male;
        //                $iii_male_age = $result[$j]->iii_male_age;
        //                $iii_female = $result[$j]->iii_female;
        //                $iii_female_age = $result[$j]->iii_female_age;
        //                $iii_visits = $result[$j]->iii_visits;
        //                $iv_male = $result[$j]->iv_male;
        //                $iv_male_age = $result[$j]->iv_male_age;
        //                $iv_female = $result[$j]->iv_female;
        //                $iv_femail_age = $result[$j]->iv_femail_age;
        //                $iv_visits = $result[$j]->iv_visits;
        //                $t_male = $result[$j]->t_male;
        //                $t_male_age = $result[$j]->t_male_age;
        //                $t_female = $result[$j]->t_female;
        //                $t_female_age = $result[$j]->t_female_age;
        //                $t_visit = $result[$j]->t_visit;
        //
        //                $viewData2 = $viewData2 . '
        //                <tr>
        //                <th rowspan="5">' . $result[$j]->month . '</th>
        //                <th>I</th>
        //                <th>' . $i_male . '</th>
        //                <th>' . $i_male_age . '</th>
        //                <th>' . $i_female . '</th>
        //                <th>' . $i_female_age . '</th>
        //                <th>' . $i_visits . '</th>
        //                <th>' . ($i_male + $i_female + $i_visits) . '</th>
        //            </tr>
        //            <tr>
        //                <th>II</th>
        //                <th>' . $ii_male . '</th>
        //                <th>' . $ii_male_age . '</th>
        //                <th>' . $ii_female . '</th>
        //                <th>' . $ii_female_age . '</th>
        //                <th>' . $ii_visits . '</th>
        //                <th>' . ($ii_male + $ii_female + $ii_visits) . '</th>
        //            </tr>
        //            <tr>
        //                <th>III</th>
        //                <th>' . $iii_male . '</th>
        //                <th>' . $iii_male_age . '</th>
        //                <th>' . $iii_female . '</th>
        //                <th>' . $iii_female_age . '</th>
        //                <th>' . $iii_visits . '</th>
        //                <th>' . ($iii_male + $iii_female + $iii_visits) . '</th>
        //            </tr>
        //            <tr>
        //                <th>IV</th>
        //                <th>' . $iv_male . '</th>
        //                <th>' . $iv_male_age . '</th>
        //                <th>' . $iv_female . '</th>
        //                <th>' . $iv_femail_age . '</th>
        //                <th>' . $iv_visits . '</th>
        //                <th>' . ($iv_male + $iv_female + $iv_visits) . '</th>
        //            </tr>
        //            <tr>
        //
        //                <th>total</th>
        //                <th>' . $t_male . '</th>
        //                <th>' . $t_male_age . '</th>
        //                <th>' . $t_female . '</th>
        //                <th>' . $t_female_age . '</th>
        //                <th>' . $t_visit . '</th>
        //                <th>' . ($t_male + $t_visit + $t_female) . '</th>
        //            </tr>';
        //            }
        //        }
        //        $viewData3 = $viewData3 . '
        //        <tr>
        //        <th>8 Total Number of lymphoedema patients registered at the clinic </th>
        //        <th>' . $sumtotal_num_lymphed . '</th>
        //    </tr>
        //    <tr>
        //        <th>9 Total Number of Hydrocele patientstregisterd at the clinic </th>
        //        <th>' . $sumtotal_num_hydro . '</th>
        //    </tr>
        //    <tr>
        //        <th>follow up MF positive patients </th>
        //        <th>' . $summf_pos_patient . '</th>
        //    </tr>';


        







                    if ($export_type == 'PDF') {
                        $content = ob_get_clean();
        // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
        // File::requireOnce($html2pdf_path);

        $html2pdf = new Html2Pdf('L', 'A2', 'en', true, 'UTF-8', array(10, 10, 10, 10));

        
        $template = view(
            'report/c1_view',
            compact('data'),
            ["dataView" => $viewData, 'district' => $data['district'], 'month' => $month,'type'=>$requestType]
        );

        try {
            $html2pdf = new HTML2PDF('L', 'A2', 'en', true, 'UTF-8', array(10, 10, 10, 10));
            $html2pdf->pdf->SetTitle('C1 Report');
            $html2pdf->WriteHTML($template);
            $html2pdf->Output('C1_report.pdf');
            ob_flush();
            ob_end_clean();
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }


 

            } else {

                header('Content-Type: application/xls');
                header('Content-Disposition: attachment; filename=c1_download.xls');
                echo $template = view('report/c1_view',compact('data'),
            ["dataView" => $viewData, 'district' => $data['district'], 'month' => $month,'type'=>$requestType]
        );


            }















    }

    public function c1_report()
    {
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'report/c1';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }

    public function index()
    {
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'c1/c1_form';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }

    public function c1_data()
    {
        $c1_list = DB::table('c1')
            ->select('*')
            // ->where('user_name', Auth::user()->email)
            ->orderBy('c1_id', 'desc')
            ->get();
            
            $district = DB::table('district')
            ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'c1/c1_data';
        return view('template_user/template',compact('data'),["c1_list" => $c1_list,"district_list" => $district]);
    }

    public function c1_update(Request $request)
    {
        $data = $request->all();
        $id = $data['c1_id'];
        unset($data['c1_id'], $data['_token']);
        $success = C1_Form::where('c1_id', $id)->update($data);
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
        $success = C1_Form::create($data);
        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function c1_data_update(Request $request)
    {
        $data = $request->all();
        $id = $data['c1_dataid'];
        unset($data['c1_dataid'], $data['_token']);
        $success = C1_Data::where('c1_dataid', $id)->update($data);
        if ($success) {
            return redirect()->back()->with('update', true);
        } else {
            return redirect()->back()->with('update', false);
        }
    }

    public function c1_data_save(Request $request)
    {
        $data = $request->all();
        $data["user_name"] = Auth::user()->email;
        $success = C1_Data::create($data);
        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function c1_view()
    {
        if (Auth::user()->role === "RMO") {
            $c1_list = DB::table('c1')
                ->select('*')
                ->where('district', Auth::user()->district)
                ->orderBy('c1_id', 'desc')
                ->get();
        } else if (Auth::user()->role === "ADMIN" || Auth::user()->role === "AFC") {
            $c1_list = DB::table('c1')
                ->select('*')
                ->orderBy('c1_id', 'desc')
                ->get();
        } else {
            $c1_list = DB::table('c1')
                ->select('*')
                ->where('user_name', Auth::user()->email)
                ->orderBy('c1_id', 'desc')
                ->get();
        }
        $data['template'] = 'c1/c1_view';
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        return view('template_user/template', compact('data'), ["c1_list" => $c1_list, "district_list" => $district]);
    }

    public function view_c1_data($id)
    {
        $c_1_data = DB::table('c_1_data')
            ->select('*')
            ->where('c1_ID', $id)
            ->orderBy('c1_dataid', 'desc')
            ->get();
        $c1_list = DB::table('c1')
            ->select('*')
            ->orderBy('c1_id', 'desc')
            ->get();
        $data['template'] = 'c1/c1_data_view';

        return view('template_user/template', compact('data'), ["c1_data_list" => $c_1_data, "c1_list" => $c1_list]);
    }



    

    public function view_c1_data_new()
    {
        $c_1_data = DB::table('c_1_data')
            ->select('*')
            ->orderBy('c1_dataid', 'ACE')
            ->get();
        $c1_list = DB::table('c1')
            ->select('*')
            ->orderBy('c1_id', 'ACE')
            ->get();
        $data['template'] = 'c1/c1_data_view';

        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();

        return view('template_user/template', compact('data'), ["c1_data_list" => $c_1_data, "c1_list" => $c1_list
        ,"district_list" => $district]);
    }











    public function delete_c1($id)
    {
        $res = C1_Form::where('c1_id', $id)->delete();
        $res2 = C1_Data::where('c1_ID', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function delete_c1_data($id)
    {
        $res = C1_Data::where('c1_dataid', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }
}
