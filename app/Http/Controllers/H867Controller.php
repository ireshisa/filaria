<?php

namespace App\Http\Controllers;

require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

use App\HForm;
use App\HFormData;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class H867Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }




   public function getgroupnu($id)
{
    $result2 = DB::table('f1')
    ->select('*')
    ->where('ID', $id)
    ->get();

    if ($result2) {
    for ($i = 0; $i < count($result2); $i++)
     {
        $group_number=$result2[$i]->group_number;
        echo "<option value='$group_number'>$group_number</option>";
     }

    }
}


    public function a3_report()
    {
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();

        $data['template'] = 'report/a3';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }

    public function a3_report_print(Request $request)
    {
        $data = $request->all();
        $from = $data['from'];
        $to = $data['to'];
        $export_type = $data['export_type'];

        $bf_new_wd = 0;
        $bf_o_wd = 0;
        $bf_o_bm = 0;
        $bf_new_bm = 0;
        $result2 = DB::table('f1')
            ->select('*')
            ->where('district', $data['district'])
            ->WhereBetween('date_of_blood', [$from, $to])
            ->get();
        $viewData = "";
        if ($result2) {

            for ($i = 0; $i < count($result2); $i++) {
                $IqD = $result2[$i]->ID;
                $phi_name = $result2[$i]->phi_name;
                $moh_area = $result2[$i]->moh_area;
                $phm_area = $result2[$i]->phm_area;
                $phi_area = $result2[$i]->phi_area;
                $town_village = $result2[$i]->town_village;
                $group_no = $result2[$i]->group_number;
                $no_of_films = $result2[$i]->no_of_films;
                $no_examined = $result2[$i]->no_examined;
                $date_of_blood = $result2[$i]->date_of_blood;
                $code_no = $result2[$i]->code_no;
                //   $history_of_mda = $result2[$i]->history_of_mda;

                $date = $result2[$i]->date;

                if ($group_no == '1-C') {
                    $v1c = $no_of_films;
                    $v2R = 0;
                    $v3L = 0;
                    $v4S = 0;
                    $v5P = 0;
                }
                if ($group_no == '2-R') {
                    $v1c = 0;
                    $v2R = $no_of_films;
                    $v3L = 0;
                    $v4S = 0;
                    $v5P = 0;
                }
                if ($group_no == '3-L') {
                    $v1c = 0;
                    $v2R = 0;
                    $v3L = $no_of_films;
                    $v4S = 0;
                    $v5P = 0;
                }
                if ($group_no == '4-S') {
                    $v1c = 0;
                    $v2R = 0;
                    $v3L = 0;
                    $v4S = $no_of_films;
                    $v5P = 0;
                }
                if ($group_no == '5-P') {
                    $v1c = 0;
                    $v2R = 0;
                    $v3L = 0;
                    $v4S = 0;
                    $v5P = $no_of_films;
                }

                $resultwd = DB::table('f1_data')
                    ->select('*')
                    ->where('result', 'Positive')
                    ->where('F1_Form_ID', $IqD)
                    ->get();
                if ($resultwd) {
                    for ($j = 0; $j < count($resultwd); $j++) {
                        $phiname = $resultwd[$j]->phiname;
                        $no = $resultwd[$j]->no;
                        $age = $resultwd[$j]->age;
                        $sex = $resultwd[$j]->sex;
                        $address = $resultwd[$j]->address;
                        $Species = $resultwd[$j]->Species;
                        $mfcount = $resultwd[$j]->mfcount;
                        $labref = $resultwd[$j]->labref;

                        $resulthis = DB::table('case_lx')
                            ->select('*')
                            ->where('name_of_patient', $phiname)
                            ->get();
                        if ($resulthis) {
                            for ($gg = 0; $gg < count($resulthis); $gg++) {
                                $history_of_mda = $resulthis[$gg]->history_of_mda;
                                $treatment_started_on = $resulthis[$gg]->treatment_started_on;
                            }

                        } else {
                            $history_of_mda = " ";
                            $treatment_started_on = " ";
                        }

                        if (empty($history_of_mda)) {
                            $history_of_mda = " ";
                        }

                        if (empty($treatment_started_on)) {
                            $treatment_started_on = " ";
                        }

                        $resultsum = DB::table('f1_data')
                            ->select(DB::raw('SUM(mfcount) as wbmfsum'))
                            ->where('F1_Form_ID', $IqD)
                            ->get();

                        if ($resultsum) {
                            $br = 0;
                            for ($k = 0; $k < count($resultsum); $k++) {
                                if ($br == 0) {
                                    $sum = $resultsum[$k]->wbmfsum;
                                    $br = 1;
                                }

                                $viewData = $viewData .
                                    '<tr>
                                    <td style="width:8%">' . $labref  . '</td>' .
                                    '<td style="width:10%">' . $phiname . '</td>' .
                                    '<td>' . $age . '</td>' .
                                    '<td>' . $sex . '</td>' .
                                    '<td style="width:10%">' . $address . '</td>' .
                                    '<td>' . $moh_area . '</td>' .
                                    '<td>' . $phi_area . '</td>' .
                                    '<td>' . $phm_area . '</td>' .
                                    '<td>' . $town_village . '</td>' .
                                    '<td>' . $group_no . '</td>' .
                                    '<td>' . $Species . '</td>' .
                                    '<td>' . $mfcount . '</td>' .
                                    '<td>' . $date_of_blood . '</td>' .
                                    '<td>' . $date . '</td>' .
                                    '<td>' . $treatment_started_on . '</td>' .
                                    '<td>' . $history_of_mda . '</td>
                                </tr>';
                            }
                        }
                    }
                    $phiname = 0;
                    $phi_name = 0;
                    $phm_area = 0;
                    $moh_area = 0;
                    $v1c = 0;
                    $v2R = 0;
                    $v3L = 0;
                    $v4S = 0;
                    $v5P = 0;
                    $no_of_films = 0;
                    $no_examined = 0;
                    $bf_new_wd = 0;
                    $bf_new_bm = 0;
                    $bf_o_wd = 0;
                    $bf_o_bm = 0;
                    $mf_Rate = 0;
                    $history_of_mda = " ";
                }
            }
        }

        if ($export_type == 'PDF') {
               ob_start();
            // $content = ob_get_clean();
            // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
            // File::requireOnce($html2pdf_path);
            $template = view(
                'report/a3_view',
                compact('data'),
                ["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]

            );
            try {
                $html2pdf = new Html2Pdf('L', 'A4', 'en', true, 'UTF-8', array(10, 10, 10, 10));
                $html2pdf->pdf->SetTitle('A 3 Report');
                $html2pdf->WriteHTML($template);
                $html2pdf->Output('a3_report.pdf');
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
                'report/a3_view',
                compact('data'),
                ["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]);
        }
    }

    public function a2_report()
    {
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'report/a2';
        return view('template_user/template', compact('data'), ["district_list" => $district]);

    }

    public function a2_report_print(Request $request)
    {
        $sum_of_1 = 0;
        $sum_of_2 = 0;
        $sum_of_3 = 0;
        $sum_of_4 = 0;
        $sum_of_5 = 0;
        $sum_of_6 = 0;
        $sum_of_7 = 0;
        $sum_of_8 = 0;
        $sum_of_9 = 0;

        $total_getsum=0;
        $total_no_positive=0;
        $data = $request->all();
        $export_type = $data['export_type'];
        $from = $data['from'];
        $to = $data['to'];
        $moh = array('123123123');
        $result2 = DB::table('f1')
            ->select('*')
            ->where('district', $data['district'])
            ->WhereBetween('date_of_blood', [$from, $to])
            ->get();
        if ($result2 and count($result2) > 0) {
            for ($i = 0; $i < count($result2); $i++) {
                $moh_area = $result2[$i]->moh_area;
                $array_reslt = array_search($moh_area, $moh);
                if (empty($array_reslt)) {
                    array_push($moh, $moh_area);
                    $array_reslt = array_search($moh_area, $moh);
                }
                if (empty($f1[$array_reslt])) {
                    $f1[$array_reslt] = array($result2[$i]);
                } else {
                    array_push($f1[$array_reslt], $result2[$i]);
                }
            }

            // echo "<br>";

            for ($i = 1; $i <= count($f1); $i++) {
                $phi_name = 0;
                $phm_area = 0;
                $moh_area = 0;
                $v1c = 0;
                $v2R = 0;
                $v3L = 0;
                $v4S = 0;
                $v5P = 0;
                $no_of_films = 0;
                $no_examined = 0;
                $bf_new_wd = 0;
                $bf_new_bm = 0;
                $bf_o_wd = 0;
                $bf_o_bm = 0;
                $mf_Rate = 0;
                $mfrate = 0;
                $getsum = 0;
                $mf_density = 0;
                $sum_no_of_films = 0;
                $sum_no_examined = 0;
                $sum_bf_new_wd = 0;
                $sum_bf_new_bm = 0;
                $sum_bf_o_wd = 0;
                $sum_bf_o_bm = 0;
                $sum_mfrate = 0;
                $sum_getsum = 0;
                $sum_mf_density = 0;
                $revet = "";
                $ssum_no_positive=0;
                for ($a = 0; $a < count($f1[$i]); $a++) {
                    if ($revet != $i) {
                        $revet = $i;
                        $sum_no_of_films = 0;
                        $sum_no_examined = 0;
                        $sum_bf_new_wd = 0;
                        $sum_bf_new_bm = 0;
                        $sum_bf_o_wd = 0;
                        $sum_bf_o_bm = 0;
                        $sum_mfrate = 0;
                        $sum_getsum = 0;
                        $sum_mf_density = 0;
                        $sum_no_positive=0;
                    }

                    $IqD = $f1[$i][$a]->ID;
                    $phi_name = $f1[$i][$a]->phi_name;
                    $moh_area = $f1[$i][$a]->moh_area;
                    $phm_area = $f1[$i][$a]->phm_area;
                    $group_no = $f1[$i][$a]->group_number;
                    $no_of_films = $f1[$i][$a]->no_of_films;
                    $no_examined = $f1[$i][$a]->no_examined;
                    $no_positive = $f1[$i][$a]->no_positive;
                    
                    $sum_no_positive=$sum_no_positive+$no_positive;

                        $ssum_no_positive=$ssum_no_positive+$no_positive;


                        // get table token_get_all
                    
                        $total_no_positive=$total_no_positive+$no_positive;






                        

                    if ($group_no == '1-C') {
                        $v1c = $no_of_films;
                        $v2R = 0;
                        $v3L = 0;
                        $v4S = 0;
                        $v5P = 0;
                    }
                    if ($group_no == '2-R') {
                        $v1c = 0;
                        $v2R = $no_of_films;
                        $v3L = 0;
                        $v4S = 0;
                        $v5P = 0;
                    }
                    if ($group_no == '3-I') {
                        $v1c = 0;
                        $v2R = 0;
                        $v3L = $no_of_films;
                        $v4S = 0;
                        $v5P = 0;
                    }
                    if ($group_no == '4-S') {
                        $v1c = 0;
                        $v2R = 0;
                        $v3L = 0;
                        $v4S = $no_of_films;
                        $v5P = 0;
                    }
                    if ($group_no == '5-P') {
                        $v1c = 0;
                        $v2R = 0;
                        $v3L = 0;
                        $v4S = 0;
                        $v5P = $no_of_films;
                    }

                    $resultwd = DB::table('f1_data')
                        ->select('*')
                        ->where('F1_Form_ID', $IqD)
                        ->where('Species', "W.bancrofti")
                        ->get();

                    if ($resultwd) {

                        $resultsum = DB::table('f1_data')->select(DB::raw('COUNT(mfcount) as wbmfsum'))
                            ->where('F1_Form_ID', $IqD)
                            ->where('Species', "W.bancrofti")
                            ->where('result', 'Positive')
                            ->get();

                        if ($resultsum) {
                            $br = 0;
                            for ($k = 0; $k < count($resultsum); $k++) {
                                if ($br == 0) {
                                    $sum = $resultsum[$k]->wbmfsum;
                                    $br = 1;
                                }
                            }
                        }

                        if ($group_no != '5-P') {
                            $bf_new_wd = $bf_new_wd + $sum;
                            $bf_o_wd = $bf_o_wd + 0;
                        }
                        if ($group_no == '5-P') {
                            $bf_o_wd = $bf_o_wd + $sum;
                            $bf_new_wd = $bf_new_wd + 0;
                        }

                    }

                    $result2db = DB::table('f1_data')
                        ->select('*')
                        ->where('F1_Form_ID', $IqD)
                        ->where('Species', "B.malayi")
                        ->where('result', 'Positive')
                        ->get();
                    if ($result2db) {
                        $br3 = 0;

                        if ($br3 == 0) {
                            $resultsum = DB::table('f1_data')->select(DB::raw('COUNT(mfcount) as wbmfsum'))
                                ->where('F1_Form_ID', $IqD)
                                ->where('Species', "B.malayi")
                                ->get();
                            if ($resultsum) {
                                $br2 = 0;
                                for ($m = 0; $m < count($resultsum); $m++) {
                                    if ($br2 == 0) {
                                        $sum = $resultsum[$m]->wbmfsum;
                                        $br2 = 1;
                                    }
                                }
                                $br3 = 1;
                            }

                            if ($group_no != '5-P') {
                                $bf_new_bm = $bf_new_bm + $sum;
                                $bf_o_bm = $bf_o_bm + 0;
                            }
                            if ($group_no == '5-P') {
                                $bf_o_bm = $bf_o_bm + $sum;
                                $bf_new_bm = $bf_new_bm + 0;
                            }
                        }

                    }

                    // ///////////////////////////////////////////
                    $resultsum = DB::table('f1_data')
                        ->select(DB::raw('SUM(mfcount) as sumsum'))
                        ->where('F1_Form_ID', $IqD)
                    // ->where('no','<>','5-P')
                        ->get();
                    if ($resultsum) {

                        for ($m = 0; $m < count($resultsum); $m++) {

                            $getsum = $getsum + $resultsum[$m]->sumsum;
                           // get table token_get_all   
                           $total_getsum=    $total_getsum+$resultsum[$m]->sumsum;
                        }
                    }

                    // ///////////////////////////////////////////
                    $resultsum2 = DB::table('f1_data')
                        ->select(DB::raw('SUM(mfcount) as total_cases'))
                        ->where('F1_Form_ID', $IqD)
                        ->get();

                    if ($resultsum2) {
                        for ($n = 0; $n < count($resultsum2); $n++) {
                            $sumsum = 0;
                            if ($sumsum == 0) {
                                $total_cases = $resultsum2[$n]->total_cases;
                            }
                        }
                    }

                    $total_cases_sum = $bf_o_wd + $bf_new_wd + $bf_o_bm + $bf_new_bm;

//                                                            density rate





                }

                if ($no_positive == 0 or empty($no_positive)) {
                    $mf_density = "0";
                } else {
                    // $mf_density = (16.67 * $getsum) / $total_cases;
                    // $mf_density = round($mf_density, 2);
                    $mf_density = ($getsum / $sum_no_positive) * 16.67;

                    $mf_density = round($mf_density, 2);

                    // echo $getsum ;
                    // echo "<br>";
                    // echo  $sum_no_positive;

                    // die();
                }
//                                                            density rate

                //                                                            MF rate
                if ($no_examined == 0 and empty($no_examined)) {
                    $mf_Rate = "FILFILE THE DATA";
                } else {
                    //   $mf_Rate = ($bf_new_wd + $bf_new_bm) / $no_examined;

                    $mf_Rate = (($bf_new_wd + $bf_o_wd + $bf_new_bm + $bf_o_bm) / $no_examined) * 100;

                }

                $mfrate = round($mf_Rate, 2);

                $moh_area;
                $sum_no_of_films = $sum_no_of_films + $no_of_films;
                $sum_no_examined = $sum_no_examined + $no_examined;
                $sum_bf_new_wd = $sum_bf_new_wd + $bf_new_wd;
                $sum_bf_new_bm = $sum_bf_new_bm + $bf_new_bm;
                $sum_bf_o_wd = $sum_bf_o_wd + $bf_o_wd;
                $sum_bf_o_bm = $sum_bf_o_bm + $bf_o_bm;
                $sum_mfrate = $sum_mfrate + $mfrate;
                $sum_getsum = $sum_getsum + $getsum;
                $sum_mf_density = $sum_mf_density + $mf_density;



                $result_array[$i] = array(
                    $moh_area,
                    $sum_no_of_films,
                    $sum_no_examined,
                    $sum_bf_new_wd,
                    $sum_bf_new_bm,
                    $sum_bf_o_wd,
                    $sum_bf_o_bm,
                    $sum_mfrate,
                    $sum_getsum,
                    $sum_mf_density,
                );

                

            }


       




        }

     
        $viewData = "";

        if (isset($result_array)) {
            for ($rr = 1; $rr <= count($result_array); $rr++) {
                $viewData = $viewData .
                    '<tr>
<td>' . $result_array[$rr][0] . '</td>' .
                    '<td>' . $result_array[$rr][1] . '</td>' .
                    '<td>' . $result_array[$rr][2] . '</td>' .
                    '<td>' . $result_array[$rr][3] . '</td>' .
                    '<td>' . $result_array[$rr][4] . '</td>' .
                    '<td>' . $result_array[$rr][5] . '</td>' .
                    '<td>' . $result_array[$rr][6] . '</td>' .
                    '<td>' . $result_array[$rr][7] . '%</td>' .
                    '<td>' . $result_array[$rr][8] . '</td>' .
                    '<td>' . $result_array[$rr][9] . '</td>
</tr>';
                $sum_of_1 = $sum_of_1 + $result_array[$rr][1];
                $sum_of_2 = $sum_of_2 + $result_array[$rr][2];
                $sum_of_3 = $sum_of_3 + $result_array[$rr][3];
                $sum_of_4 = $sum_of_4 + $result_array[$rr][4];
                $sum_of_5 = $sum_of_5 + $result_array[$rr][5];
                $sum_of_6 = $sum_of_6 + $result_array[$rr][6];
                $sum_of_7 = $sum_of_7 + $result_array[$rr][7];
                $sum_of_8 = $sum_of_8 + $result_array[$rr][8];
                $sum_of_9 = $sum_of_9 + $result_array[$rr][9];

            }

//                                                            table total density rate

            if ($total_no_positive == 0 or empty($total_no_positive)) {
                $sum_mf_density = "-";
            } else {
                // $mf_density = (16.67 * $getsum) / $total_cases;
                // $mf_density = round($mf_density, 2);
                $sum_mf_density = ($total_getsum / $total_no_positive) * 16.67;
                $sum_mf_density = round($sum_mf_density, 2);

                // echo $sum_getsum ;
                // echo "<br>";
                // echo $sum_no_examined ;
                
            }
//                                                            density rate

            //                                                            MF rate
            if ($sum_of_3 == 0 and empty($sum_of_3)) {
                $sum_mf_Rate = "FILFILE THE DATA";
            } else {
                //   $mf_Rate = ($bf_new_wd + $bf_new_bm) / $no_examined;

                $sum_mf_Rate = (($sum_of_3+$sum_of_4) / $sum_of_2) * 100;

            //    echo  $sum_of_3;
            //    die();
            

            }

            $sum_mf_Rate = round($sum_mf_Rate, 2);

//                                                           MF rate

            $viewData = $viewData .
                '<tr>
<td>Total</td>' .
                '<td>' . $sum_of_1 . '</td>' .
                '<td>' . $sum_of_2 . '</td>' .
                '<td>' . $sum_of_3 . '</td>' .
                '<td>' . $sum_of_4 . '</td>' .
                '<td>' . $sum_of_5 . '</td>' .
                '<td>' . $sum_of_6 . '</td>' .
                '<td>' . $sum_mf_Rate . '%</td>' .
                '<td>' . $sum_of_8 . '</td>' .
                '<td>' . $sum_mf_density . '</td>
</tr>';

// than total row  s

        } else {
            $viewData = $viewData .
                '<tr>
 <td>No data </td>' .
                '<td>No data </td>' .
                '<td>No data </td>' .
                '<td>No data </td>' .
                '<td>No data </td>' .
                '<td>No data </td>' .
                '<td>No data </td>' .
                '<td>No data </td>' .
                '<td>No data </td>' .
                '<td>No data </td>
</tr>';

        }

        if ($export_type == 'PDF') {

            $content = ob_get_clean();
      
   
            $template = view(
                'report/a2_view',
                compact('data'),
                ["dataView" => $viewData, 'district' => $data['district'], 'to' => $data['to'], 'from' => $data['from']]
            );

            try {
               $html2pdf = new Html2Pdf('L', 'A4', 'en', true, 'UTF-8', array(10, 10, 10, 10));
                $html2pdf->pdf->SetTitle('A 2 Report');
                $html2pdf->WriteHTML($template);
                $html2pdf->Output('a2_report.pdf');
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
                'report/a2_view',
                compact('data'),
                ["dataView" => $viewData, 'district' => $data['district'], 'to' => $data['to'], 'from' => $data['from']]
            );

        }

    }

    public function isa()
    {
        $data = $request->all();
        $from = $data['from'];
        $to = $data['to'];

        $bf_new_wd = 0;
        $bf_o_wd = 0;
        $bf_o_bm = 0;
        $bf_new_bm = 0;

        $result2 = DB::table('f1')
            ->select('*')
            ->where('district', $data['district'])
            ->WhereBetween('date_of_blood', [$from, $to])
            ->get();
        $viewData = "";
        if ($result2) {
            for ($i = 0; $i < count($result2); $i++) {
                $IqD = $result2[$i]->ID;
                $phi_name = $result2[$i]->phi_name;
                $moh_area = $result2[$i]->moh_area;
                $phm_area = $result2[$i]->phm_area;
                $group_no = $result2[$i]->group_number;
                $no_of_films = $result2[$i]->no_of_films;
                $no_examined = $result2[$i]->no_examined;
                $no_positive = $result2[$i]->no_positive;

                if ($group_no == '1-C') {
                    $v1c = $no_of_films;
                    $v2R = 0;
                    $v3L = 0;
                    $v4S = 0;
                    $v5P = 0;
                }
                if ($group_no == '2-R') {
                    $v1c = 0;
                    $v2R = $no_of_films;
                    $v3L = 0;
                    $v4S = 0;
                    $v5P = 0;
                }
                if ($group_no == '3-I') {
                    $v1c = 0;
                    $v2R = 0;
                    $v3L = $no_of_films;
                    $v4S = 0;
                    $v5P = 0;
                }
                if ($group_no == '4-S') {
                    $v1c = 0;
                    $v2R = 0;
                    $v3L = 0;
                    $v4S = $no_of_films;
                    $v5P = 0;
                }
                if ($group_no == '5-P') {
                    $v1c = 0;
                    $v2R = 0;
                    $v3L = 0;
                    $v4S = 0;
                    $v5P = $no_of_films;
                }

                $resultwd = DB::table('f1_data')
                    ->select('*')
                    ->where('F1_Form_ID', $IqD)
                    ->where('Species', "W.bancrofti")
                    ->get();
                if ($resultwd) {
                    for ($j = 0; $j < count($resultwd); $j++) {
                        $resultsum = DB::table('f1_data')->select(DB::raw('SUM(mfcount) as wbmfsum'))
                            ->where('F1_Form_ID', $IqD)
                            ->where('Species', "W.bancrofti")
                            ->get();

                        if ($resultsum) {
                            $br = 0;
                            for ($k = 0; $k < count($resultsum); $k++) {
                                if ($br == 0) {
                                    $sum = $resultsum[$k]->wbmfsum;
                                    $br = 1;
                                }
                            }
                        }
                        if ($group_no != '5-P') {
                            $bf_new_wd = $sum;
                            $bf_o_wd = 0;
                        }
                        if ($group_no == '5-P') {
                            $bf_o_wd = $sum;
                            $bf_new_wd = 0;
                        }
                    }
                }

                $result2db = DB::table('f1_data')
                    ->select('*')
                    ->where('F1_Form_ID', $IqD)
                    ->where('Species', "B.malayi")
                    ->get();
                if ($result2db) {
                    $br3 = 0;
                    for ($l = 0; $l < count($result2db); $l++) {
                        if ($br3 == 0) {
                            $resultsum = DB::table('f1_data')->select(DB::raw('SUM(mfcount) as wbmfsum'))
                                ->where('F1_Form_ID', $IqD)
                                ->where('Species', "B.malayi")
                                ->get();
                            if ($resultsum) {
                                $br2 = 0;
                                for ($m = 0; $m < count($resultsum); $m++) {
                                    if ($br2 == 0) {
                                        $sum = $resultsum[$m]->wbmfsum;
                                        $br2 = 1;
                                    }
                                }
                                $br3 = 1;
                            }
                            if ($group_no != '5-P') {
                                $bf_new_bm = $sum;
                                $bf_o_bm = 0;
                            }
                            if ($group_no == '5-P') {
                                $bf_o_bm = $sum;
                                $bf_new_bm = 0;
                            }
                        }
                    }
                }

                // ///////////////////////////////////////////
                $resultsum = DB::table('f1_data')
                    ->select(DB::raw('SUM(mfcount) as sumsum'))
                    ->where('F1_Form_ID', $IqD)
                    ->where(DB::raw("no!='5-P'"))
                    ->get();
                if ($resultsum) {
                    for ($m = 0; $m < count($resultsum); $m++) {
                        $sumsum = 0;
                        if ($sumsum == 0) {
                            $getsum = $resultsum[$m]->sumsum;
                        }
                    }
                }

                // ///////////////////////////////////////////
                $resultsum2 = DB::table('f1_data')
                    ->select(DB::raw('SUM(mfcount) as total_cases'))
                    ->where('F1_Form_ID', $IqD)
                    ->get();

                if ($resultsum2) {
                    for ($n = 0; $n < count($resultsum2); $n++) {
                        $sumsum = 0;
                        if ($sumsum == 0) {
                            $total_cases = $resultsum2[$n]->total_cases;
                        }
                    }
                }

                if ($total_cases == 0 or empty($total_cases)) {
                    $mf_density = "-";
                } else {
                    $mf_density = (16.67 * $getsum) / $total_cases;
                    $mf_density = round($mf_density, 2);
                }
                if ($no_examined == 0 and $no_examined == '') {
                    $mf_Rate = "FILL DATA";
                } else {
                    $mf_Rate = ($bf_new_wd + $bf_new_bm) / $no_examined2;
                    $mfrate = round($mf_Rate, 2);
                }

                if (empty($bf_new_wd)) {
                    $bf_new_wd = 0;
                }
                // ///////////////////////////////////////////

                $viewData = $viewData .
                    '<tr>
                     <td>' . $moh_area . '</td>' .
                    '<td>' . $no_of_films . '</td>' .
                    '<td>' . $no_examined . '</td>' .
                    '<td>' . $bf_new_wd . '</td>' .
                    '<td>' . $bf_new_bm . '</td>' .
                    '<td>' . $bf_o_wd . '</td>' .
                    '<td>' . $bf_o_bm . '</td>' .
                    '<td>' . $mfrate . '%</td>' .
                    '<td>' . $getsum . '</td>' .
                    '<td>' . $mf_density . '%</td>
                            </tr>';

                $phi_name = 0;
                $phm_area = 0;
                $moh_area = 0;
                $v1c = 0;
                $v2R = 0;
                $v3L = 0;
                $v4S = 0;
                $v5P = 0;
                $no_of_films = 0;
                $no_examined = 0;
                $bf_new_wd = 0;
                $bf_new_bm = 0;
                $bf_o_wd = 0;
                $bf_o_bm = 0;
                $mf_Rate = 0;
                $mfrate = 0;
                $mf_density = 0;
                $getsum = 0;
                $total_cases = 0;
            }
        }

        $content = ob_get_clean();
        // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
        // File::requireOnce($html2pdf_path);
        $template = view(
            'report/a2_view',
            compact('data'),
            ["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
        );

        try {
            $html2pdf = new \HTML2PDF('L', 'Legal', 'en', true, 'UTF-8', array(15, 5, 15, 5));
            $html2pdf->pdf->SetTitle('A 2 Report');
            $html2pdf->WriteHTML($template);
            $html2pdf->Output('a2_report.pdf');
            ob_flush();
            ob_end_clean();
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }

        // return view('report/a2_view',compact('data'), ["dataView" => $viewData, 'district' => $data['district']]);

    }

    public function h867_report_view(Request $request)
    {

        $data = $request->all();
        echo $from = $data['from'];
        echo $to = $data['to'];

    }

    public function f1_report()
    {
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'report/f1';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }

    public function f1_report_print(Request $request)
    {
        $v1c = 0;
        $v2R = 0;
        $v3L = 0;
        $v4S = 0;
        $v5P = 0;
        $data = $request->all();
        $from = $data['from'];
        $to = $data['to'];
        $export_type = $data['export_type'];
        // print_r('<option value="'.$s->moh.'">'.$s->moh.'</option>');
        // include(base_path().'\resources\views\report\f1.php');
        $bf_new_wd = 0;
        $bf_o_wd = 0;
        $bf_o_bm = 0;
        $bf_new_bm = 0;
        $result2 = DB::table('f1')
            ->select('*')
            ->where('district', $data['district'])
            ->WhereBetween('date_of_blood', [$from, $to])
            ->get();
        $viewData = "";
        if ($result2) {
            for ($i = 0; $i < count($result2); $i++) {
                $IqD = $result2[$i]->ID;
                $phi_name = $result2[$i]->phi_name;
                $moh_area = $result2[$i]->moh_area;
                $phm_area = $result2[$i]->phm_area;

                $phi_area = $result2[$i]->phi_area;
                $town_village = $result2[$i]->town_village;


                $group_no = $result2[$i]->group_number;
                $no_of_films = $result2[$i]->no_of_films;
                $no_examined = $result2[$i]->no_examined;
                if ($group_no == '1-C') {
                    $v1c = $no_of_films;
                    $v2R = 0;
                    $v3L = 0;
                    $v4S = 0;
                    $v5P = 0;
                }
                if ($group_no == '2-R') {
                    $v1c = 0;
                    $v2R = $no_of_films;
                    $v3L = 0;
                    $v4S = 0;
                    $v5P = 0;
                }
                if ($group_no == '3-I') {
                    $v1c = 0;
                    $v2R = 0;
                    $v3L = $no_of_films;
                    $v4S = 0;
                    $v5P = 0;
                }
                if ($group_no == '4-S') {
                    $v1c = 0;
                    $v2R = 0;
                    $v3L = 0;
                    $v4S = $no_of_films;
                    $v5P = 0;
                }
                if ($group_no == '5-P') {
                    $v1c = 0;
                    $v2R = 0;
                    $v3L = 0;
                    $v4S = 0;
                    $v5P = $no_of_films;
                }
                $resultwd = DB::table('f1_data')
                    ->select('*')
                    ->where('Species', "W.bancrofti")
                    ->get();
                if ($resultwd) {
                    for ($j = 0; $j < count($resultwd); $j++) {
                        $resultsum = DB::table('f1_data')->select(DB::raw('COUNT(mfcount) as wbmfsum'))
                            ->where('F1_Form_ID', $IqD)
                            ->where('result', 'Positive')
                            ->where('Species', "W.bancrofti")
                            ->get();

                        if ($resultsum) {
                            $br = 0;
                            for ($k = 0; $k < count($resultsum); $k++) {
                                if ($br == 0) {
                                    $sum = $resultsum[$k]->wbmfsum;
                                    $br = 1;
                                }
                            }
                        }
                        if ($group_no != '5-P') {
                            $bf_new_wd = $sum;
                            $bf_o_wd = 0;
                        }
                        if ($group_no == '5-P') {
                            $bf_o_wd = $sum;
                            $bf_new_wd = 0;
                        }
                    }
                }

                $result2db = DB::table('f1_data')
                    ->select('*')
                    ->where('F1_Form_ID', $IqD)
                    ->where('result', 'Positive')
                    ->where('Species', "B.malayi")
                    ->get();
                if ($result2db) {
                    $br3 = 0;
                    for ($l = 0; $l < count($result2db); $l++) {
                        if ($br3 == 0) {
                            $resultsum = DB::table('f1_data')->select(DB::raw('COUNT(mfcount) as wbmfsum'))
                                ->where('F1_Form_ID', $IqD)
                                ->where('Species', "B.malayi")
                                ->get();
                            if ($resultsum) {
                                $br2 = 0;
                                for ($m = 0; $m < count($resultsum); $m++) {
                                    if ($br2 == 0) {
                                        $sum = $resultsum[$m]->wbmfsum;
                                        $br2 = 1;
                                    }
                                }
                                $br3 = 1;
                            }
                            if ($group_no != '5-P') {
                                $bf_new_bm = $sum;
                                $bf_o_bm = 0;
                            }
                            if ($group_no == '5-P') {
                                $bf_o_bm = $sum;
                                $bf_new_bm = 0;
                            }
                        }
                    }
                }
                if ($no_examined == 0 || $no_examined == '') {
                    $no_examined2 = 1;
                } else {
                    $no_examined2 = $no_examined;
                }

                $mf_Rate = (($bf_new_wd + $bf_o_wd + $bf_new_bm + $bf_o_bm) / $no_examined2) * 100;
                // sqll11111111111111111weeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
                if (empty($bf_new_wd)) {
                    $bf_new_wd = 0;
                }

                $viewData = $viewData .
                    '<tr>
                    <td>' . $phi_name . '</td>' .
                    '<td>' . $moh_area . '</td>' .
                    '<td>' . $phi_area . '</td>' .
                    '<td>' . $phm_area . '</td>' .
                    '<td>' . $town_village
                    . '</td>' .
                    '<td>' . $v1c . '</td>' .
                    '<td>' . $v2R . '</td>' .
                    '<td>' . $v3L . '</td>' .
                    '<td>' . $v4S . '</td>' .
                    '<td>' . $v5P . '</td>' .
                    '<td>' . $no_of_films . '</td>' .
                    '<td>' . $no_examined . '</td>' .
                    '<td>' . $bf_new_wd . '</td>' .
                    '<td>' . $bf_new_bm . '</td>' .
                    '<td>' . $bf_o_wd . '</td>' .
                    '<td>' . $bf_o_bm . '</td>' .
                    '<td>' . round($mf_Rate, 2) . '</td>
                                                </tr>';

                $phi_name = 0;
                $phm_area = 0;
                $moh_area = 0;
                $v1c = 0;
                $v2R = 0;
                $v3L = 0;
                $v4S = 0;
                $v5P = 0;
                $no_of_films = 0;
                $no_examined = 0;
                $bf_new_wd = 0;
                $bf_new_bm = 0;
                $bf_o_wd = 0;
                $bf_o_bm = 0;
                $mf_Rate = 0;
            }

            if ($export_type == 'PDF') {

                $content = ob_get_clean();
                // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
                // File::requireOnce($html2pdf_path);
                $template = view(
                    'report/f1_view',
                    compact('data'),
                    ["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]

                );
                try {
                      $html2pdf = new Html2Pdf('L', 'A4', 'en', true, 'UTF-8', array(10, 10, 10, 10));
                    $html2pdf->pdf->SetTitle('A 1 Report');
                    $html2pdf->WriteHTML($template);
                    $html2pdf->Output('a1_report.pdf');
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
                    'report/f1_view',
                    compact('data'),
                    ["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
                );
            }

        }
    }

    public function index()
    {
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'h867/h867';
        return view(
            'template_user/template',
            compact('data'),
            ["district_list" => $district]
        );
    }

    public function h867_data()
    {

        if (Auth::user()->role === "RMO") {
            $h867_list = DB::table('f1')
                ->select('*')
                ->where('district', Auth::user()->district)
                ->orderBy('ID', 'desc')
                ->get();
        } else if (Auth::user()->role === "ADMIN" || Auth::user()->role === "AFC") {
            $h867_list = DB::table('f1')
                ->select('*')
                ->orderBy('ID', 'desc')
                ->get();
        } else {
            $h867_list = DB::table('f1')
                ->select('*')
                ->where('user_name', Auth::user()->email)
                ->orderBy('ID', 'desc')
                ->get();
        }

        $data['template'] = 'h867/h867_data';
        return view(
            'template_user/template',
            compact('data'),
            ["h867_list" => $h867_list]
        );
    }

    public function h867_update(Request $request)
    {
        $data = $request->all();
        $id = $data['ID'];
        unset($data['ID'], $data['_token']);
        $success = HForm::where('ID', $id)->update($data);
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
        $success = HForm::create($data);
        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function h867_data_update(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        unset($data['id'], $data['_token']);
        $success = HFormData::where('id', $id)->update($data);
        if ($success) {
            return redirect()->back()->with('update', true);
        } else {
            return redirect()->back()->with('update', false);
        }
    }

    public function h867_data_save(Request $request)
    {
        $data = $request->all();
        $data["user_name"] = Auth::user()->email;
        $success = HFormData::create($data);
        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function h867_view()
    {
        if (Auth::user()->role === "RMO") {
            $h867_list = DB::table('f1')
                ->select('*')
                ->where('district', Auth::user()->district)
                ->orderBy('ID', 'desc')
                ->get();
        } else if (Auth::user()->role === "ADMIN" || Auth::user()->role === "AFC") {
            $h867_list = DB::table('f1')
                ->select('*')
                ->orderBy('ID', 'desc')
                ->get();

        } else {
            $h867_list = DB::table('f1')
                ->select('*')
                ->where('user_name', Auth::user()->email)
                ->orderBy('ID', 'desc')
                ->get();
        }
        $data['template'] = 'h867/h867_view';
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        return view('template_user/template', compact('data'), ["h867_list" => $h867_list, "district_list" => $district]);
    }

    public function h867_report()
    {

        $h867_list = DB::table('f1')
            ->select('*')
            ->orderBy('ID', 'desc')
            ->get();

        $data['template'] = 'report/h867';
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        return view('template_user/template', compact('data'), ["h867_list" => $h867_list, "district_list" => $district]);
    }

    public function view_h867_list_data($id)
    {
        $f1_data = DB::table('f1_data')
            ->select('*')
            ->where('f1_form_id', $id)
            ->orderBy('id', 'desc')
            ->get();
        $data['template'] = 'h867/h867_data_view';

        $h867_list = DB::table('f1')
            ->select('*')
            ->orderBy('ID', 'desc')
            ->get();
        return view(
            'template_user/template',
            compact('data'),
            ["f1_data_list" => $f1_data, "h867_list" => $h867_list]
        );
    }

    public function view_h867_list_data_re($id)
    {
        $f1_data = DB::table('f1_data')
            ->select('*')
            ->where('f1_form_id', $id)
            ->orderBy('id', 'desc')
            ->get();
        $data['template'] = 'h867/h867_data_view_re';

        $h867_list = DB::table('f1')
            ->select('*')
            ->orderBy('ID', 'desc')
            ->get();
        return view(
            'template_user/template',
            compact('data'),
            ["f1_data_list" => $f1_data, "h867_list" => $h867_list]
        );
    }

// ------------------------------------------------------------------------------------------------------------

    public function h867_print($id)
    {

        // $data['template'] = 'h867/h867_print';
        //   return view(
        //            'template_user/template',
        //            compact('data'),]  );

        $result = DB::table('f1')
            ->select('*')
            ->where('ID', $id)
            ->get();

        $result2 = DB::table('f1_data')
            ->select('*')
            ->where('f1_form_id', $id)
            ->get();

        $content = ob_get_clean();
        // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
        // File::requireOnce($html2pdf_path);
        $template = view(
            'report/h867_print',
            compact('data'),
            ["f1_list" => $result, "f1_data_list" => $result2]);

        try {
            $html2pdf = new \HTML2PDF('L', 'Legal', 'en', true, 'UTF-8', array(
                15,
                5, 15, 5,
            ));
            $html2pdf->pdf->SetTitle('A 1 Report');
            $html2pdf->WriteHTML($template);
            $html2pdf->Output('a1_report.pdf');

            ob_flush();
            ob_end_clean();
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }

    }

    public function delete_h867($id)
    {
        $res = HForm::where('ID', $id)->delete();
        $res2 = HFormData::where('f1_form_id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function delete_h867_data($id)
    {
        $res = HFormData::where('id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }
}
