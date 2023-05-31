<?php

namespace App\Http\Controllers;

use App\Ento_01;
use App\Ento_01_data;
use Auth;

require __DIR__ . '/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;






class Ento1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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



    public function dashboard()
    {
        $district = DB::table('district')
            ->orderBy('district', 'ASC')
            ->select('*')
            ->get();

        date_default_timezone_set("Asia/Colombo");
        $date = date("Y");
        $getintialtableHistory = DB::table('initialregistationmo')
            ->select('*')
            ->where('date_of_registration', 'LIKE', "%$date%")
            ->get();
        $new_lymphoedema_patients_registered = count($getintialtableHistory);




        $getintialtableHistory = DB::table('initialregistationmo')
            ->select('*')
            ->get();
        $lymphoedema_patients_care = count($getintialtableHistory);


        $getintialtableHistory = DB::table('initialregistationmo')
            ->select('*')
            ->get();
        $subsequent_patients = count($getintialtableHistory);


        $data['template'] = 'dashboard';
        return view('template_user/template', compact('data'), [
            "district_list" => $district,
            "new_lymphoedema_patients_registered" => $new_lymphoedema_patients_registered,
            "lymphoedema_patients_care" => $lymphoedema_patients_care,
            "subsequent_patients" => $subsequent_patients
        ]);
    }

    public function b2_report()
    {
        $district = DB::table('district')
            ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'report/b2';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }

    public function b1_report()
    {
        $district = DB::table('district')
            ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'report/b1';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }


    public function b2_report_print(Request $request)
    {
        $data = $request->all();
        $from = $data['from'];
        $to = $data['to'];
        $district = $data['district'];
        $species = $data['species'];
        $export_type = $data['export_type'];

        if ($species == "Cx") {
            /////////////////////////////////////////////////////////////////////////////////////////////////////////
            $head_mf = 0;
            $head_l1 = 0;
            $head_l2 = 0;
            $head_l3 = 0;
            $thorax_mf = 0;
            $thorax_l1 = 0;
            $thorax_l2 = 0;
            $thorax_l3 = 0;
            $abdomen_mf = 0;
            $abdomen_l1 = 0;
            $abdomen_l2 = 0;
            $abdomen_l3 = 0;
            $total_stage = 0;
            $positive_mosq = 0;
            $viewData = "";
            $gn = "";

            // ento 01 data
            // $result2 = DB::table('ento_01')
            // ->select('*')
            // // ->where('district', $data['district'])
            // // ->WhereBetween('date', [$from, $to])
            // ->get();

            $results = DB::select("
select en1.gn_divison, en1.date,en1.name_of_heo, en1.moh_area,en1.phi_and_phm,en1.gn_divison,en5.ento_05_id as id,en1.ento_01_id as ento1id ,mosnew.address as ad,mosnew.id as mid, en5.main_form_id as main_form_id
FROM ento_01 as en1
INNER JOIN ento_01_data as ento01data
ON ento01data.ento_01_id=en1.ento_01_id
INNER JOIN ento_05 as en5
ON en1.ento_01_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mosnew.species2='CX'
AND  en5.main_form_type='ento_01'
AND en1.district='" . $district . "' AND en1.date BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY mosnew.address");

            for ($i = 0; $i < count($results); $i++) {
                $ad  = $results[$i]->ad;
                $main_form_id = $results[$i]->main_form_id;


                $results_2 = DB::select("SELECT * from `ento_01_data` where `house_no`='$ad'  and `ento_01_id`=$main_form_id ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $gps_lat  = $results_2[$e]->gps_lat;
                    $gps_long  = $results_2[$e]->gps_long;
                }
                $id  = $results[$i]->id;
                $mid  = $results[$i]->mid;


                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE  address='$ad' and species2='CX' and `ento_05_id`=$id ");

                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective  = $results_6[$ee6]->labno;
                }
                $head_mf = 0;
                $head_l1 = 0;
                $head_l2 = 0;
                $head_l3 = 0;
                $thorax_mf = 0;
                $thorax_l1 = 0;
                $thorax_l2 = 0;
                $thorax_l3 = 0;
                $abdomen_mf = 0;
                $abdomen_l1 = 0;
                $abdomen_l2 = 0;
                $abdomen_l3 = 0;
                $t_mf = 0;
                $t_l1 = 0;
                $t_l2 = 0;
                $t_l3 = 0;
                // iadasda sdsad asd asd sad sad asd s da sdas d sad sad sa da
                $results_6 = DB::select("SELECT * FROM ento_05_new_mosq WHERE  address='$ad'and species2='CX'  ");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    $head_mf = $head_mf + $results_6[$ee6]->head_mf;
                    $head_l1 = $head_l1 + $results_6[$ee6]->head_l1;
                    $head_l2 = $head_l2 + $results_6[$ee6]->head_l2;
                    $head_l3 = $head_l3 + $results_6[$ee6]->head_l3;
                    $thorax_mf = $thorax_mf + $results_6[$ee6]->thorax_mf;
                    $thorax_l1 = $thorax_l1 + $results_6[$ee6]->thorax_l1;
                    $thorax_l2 = $thorax_l2 + $results_6[$ee6]->thorax_l2;
                    $thorax_l3 = $thorax_l3 + $results_6[$ee6]->thorax_l3;
                    $abdomen_mf = $abdomen_mf + $results_6[$ee6]->abdomen_mf;
                    $abdomen_l1 = $abdomen_l1 + $results_6[$ee6]->abdomen_l1;
                    $abdomen_l2 = $abdomen_l2 + $results_6[$ee6]->abdomen_l2;
                    $abdomen_l3 = $abdomen_l3 + $results_6[$ee6]->abdomen_l3;
                }
                $t_mf = $head_mf + $thorax_mf + $abdomen_mf;
                $t_l1 = $head_l1 + $thorax_l1 + $abdomen_l1;
                $t_l2 = $head_l2 + $thorax_l2 + $abdomen_l2;
                $t_l3 = $head_l3 + $thorax_l3 + $abdomen_l3;
                // this qure for get dessected form ento5 mos table
                $date = $results[$i]->date;
                $moh_area = $results[$i]->moh_area;
                $phi_and_phm = $results[$i]->phi_and_phm;
                $gn = $results[$i]->gn_divison;
                $locality = $results[$i]->ad;

                $viewData = $viewData .
                    '<tr>
    <td>' . $date . '</td>' .
                    '<td>' . $moh_area . '</td>' .
                    '<td>' . $phi_and_phm . '</td>' .
                    '<td>' . $gn . '</td>' .
                    '<td> ento 01 </td>' .
                    '<td>' . $locality . '</td>' .
                    '<td>' . $gps_lat . '</td>' .
                    '<td>' . $gps_long . '</td>' .
                    '<td>' . $infective . '</td>' .
                    '<td>' . $t_mf . '</td>' .
                    '<td>' . $t_l1 . '</td>' .
                    '<td>' . $t_l2 . '</td>' .
                    '<td>' . $t_l3 . '</td>
</tr>';
            }
            // ento 01 data
            // ento 02 data
            // $result2 = DB::table('ento_01')
            // ->select('*')
            // // ->where('district', $data['district'])
            // // ->WhereBetween('date', [$from, $to])
            // ->get();
            $results = DB::select("
select en5.main_form_id as main_form_id,en2.date,en2.heo,en2.moh_area,en2.gn_division, en2.phm_area,en2.ento_02_id as ento_02_id,en5.ento_05_id as id,mosnew.address as ad, mosnew.id as mid
FROM ento_02 as en2
INNER JOIN ento_02_data as ento02data
ON ento02data.ento_02_id=en2.ento_02_id
INNER JOIN ento_05 as en5
ON en2.ento_02_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mosnew.species2='CX'
AND  en5.main_form_type='ento_02'
AND en2.district='" . $district . "' AND en2.date BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY mosnew.address
");
            for ($i = 0; $i < count($results); $i++) {

                $ad  = $results[$i]->ad;
                $main_form_id  = $results[$i]->main_form_id;

                $results_2 = DB::select("SELECT * from `ento_02_data` where `chief_occupant`='$ad'  and `ento_02_id`=$main_form_id ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $gps_lat  = $results_2[$e]->gps_lat;
                    $gps_long  = $results_2[$e]->gps_long;
                }
                $id  = $results[$i]->id;
                $mid  = $results[$i]->mid;





                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE  ento_05_id=$id and species2='CX' and address='$ad' ");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective  = $results_6[$ee6]->labno;
                }
                $head_mf = 0;
                $head_l1 = 0;
                $head_l2 = 0;
                $head_l3 = 0;
                $thorax_mf = 0;
                $thorax_l1 = 0;
                $thorax_l2 = 0;
                $thorax_l3 = 0;
                $abdomen_mf = 0;
                $abdomen_l1 = 0;
                $abdomen_l2 = 0;
                $abdomen_l3 = 0;
                $t_mf = 0;
                $t_l1 = 0;
                $t_l2 = 0;
                $t_l3 = 0;
                // iadasda sdsad asd asd sad sad asd s da sdas d sad sad sa da
                $results_6 = DB::select("SELECT * FROM ento_05_new_mosq WHERE   ento_05_id=$id and species2='CX'  and address='$ad'  ");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    $head_mf = $head_mf + $results_6[$ee6]->head_mf;
                    $head_l1 = $head_l1 + $results_6[$ee6]->head_l1;
                    $head_l2 = $head_l2 + $results_6[$ee6]->head_l2;
                    $head_l3 = $head_l3 + $results_6[$ee6]->head_l3;
                    $thorax_mf = $thorax_mf + $results_6[$ee6]->thorax_mf;
                    $thorax_l1 = $thorax_l1 + $results_6[$ee6]->thorax_l1;
                    $thorax_l2 = $thorax_l2 + $results_6[$ee6]->thorax_l2;
                    $thorax_l3 = $thorax_l3 + $results_6[$ee6]->thorax_l3;
                    $abdomen_mf = $abdomen_mf + $results_6[$ee6]->abdomen_mf;
                    $abdomen_l1 = $abdomen_l1 + $results_6[$ee6]->abdomen_l1;
                    $abdomen_l2 = $abdomen_l2 + $results_6[$ee6]->abdomen_l2;
                    $abdomen_l3 = $abdomen_l3 + $results_6[$ee6]->abdomen_l3;
                }
                $t_mf = $head_mf + $thorax_mf + $abdomen_mf;
                $t_l1 = $head_l1 + $thorax_l1 + $abdomen_l1;
                $t_l2 = $head_l2 + $thorax_l2 + $abdomen_l2;
                $t_l3 = $head_l3 + $thorax_l3 + $abdomen_l3;
                // this qure for get dessected form ento5 mos table
                $date = $results[$i]->date;
                $moh_area = $results[$i]->moh_area;
                $gn = $results[$i]->gn_division;
                $phi_and_phm = $results[$i]->phm_area;

                $locality = $results[$i]->ad;


                if ($infective !== 0) {
                    $viewData = $viewData .
                        '<tr>
    <td>' . $date . '</td>' .
                        '<td>' . $moh_area . '</td>' .
                        '<td>' . $phi_and_phm . '</td>' .
                        '<td>' . $gn . '</td>' .
                        '<td> ento 02 </td>' .
                        '<td>' . $locality . '</td>' .
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
            // ento 02 data
            // ento 03 data
            // $result2 = DB::table('ento_01')
            // ->select('*')
            // // ->where('district', $data['district'])
            // // ->WhereBetween('date', [$from, $to])
            // ->get();
            $results = DB::select("
select en5.main_form_id as main_form_id ,en3.date_of_collection as date,en3.phi,en3.moh as moh_area,en3.gn,en3.ento_03_id as ento_03_id,en5.ento_05_id as id,mosnew.address as ad, mosnew.id as mid,en3.gps_lat as gps_lat ,en3.gps_long as gps_long
FROM ento_03 as en3
INNER JOIN ento_03_data as ento03data
ON ento03data.ento_03_id=en3.ento_03_id
INNER JOIN ento_05 as en5
ON en3.ento_03_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mosnew.species2='CX'
AND  en5.main_form_type='ento_03'
AND en3.district='" . $district . "' AND en3.date_of_collection BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY mosnew.address
");
            for ($i = 0; $i < count($results); $i++) {
                $ad  = $results[$i]->ad;
                $gps_lat = $results[$i]->gps_lat;
                $gps_long = $results[$i]->gps_long;
                $id  = $results[$i]->id;
                $mid  = $results[$i]->mid;
                $main_form_id  = $results[$i]->main_form_id;

                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE address='$ad' and ento_05_id=$id and species2='CX' ");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective  = $results_6[$ee6]->labno;
                }
                $head_mf = 0;
                $head_l1 = 0;
                $head_l2 = 0;
                $head_l3 = 0;
                $thorax_mf = 0;
                $thorax_l1 = 0;
                $thorax_l2 = 0;
                $thorax_l3 = 0;
                $abdomen_mf = 0;
                $abdomen_l1 = 0;
                $abdomen_l2 = 0;
                $abdomen_l3 = 0;
                $t_mf = 0;
                $t_l1 = 0;
                $t_l2 = 0;
                $t_l3 = 0;
                // iadasda sdsad asd asd sad sad asd s da sdas d sad sad sa da
                $mid  = $results[$i]->mid;
                $results_6 = DB::select("SELECT * FROM ento_05_new_mosq WHERE   ento_05_id=$id and species2='CX'  and address='$ad' ");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    $head_mf = $head_mf + $results_6[$ee6]->head_mf;
                    $head_l1 = $head_l1 + $results_6[$ee6]->head_l1;
                    $head_l2 = $head_l2 + $results_6[$ee6]->head_l2;
                    $head_l3 = $head_l3 + $results_6[$ee6]->head_l3;
                    $thorax_mf = $thorax_mf + $results_6[$ee6]->thorax_mf;
                    $thorax_l1 = $thorax_l1 + $results_6[$ee6]->thorax_l1;
                    $thorax_l2 = $thorax_l2 + $results_6[$ee6]->thorax_l2;
                    $thorax_l3 = $thorax_l3 + $results_6[$ee6]->thorax_l3;
                    $abdomen_mf = $abdomen_mf + $results_6[$ee6]->abdomen_mf;
                    $abdomen_l1 = $abdomen_l1 + $results_6[$ee6]->abdomen_l1;
                    $abdomen_l2 = $abdomen_l2 + $results_6[$ee6]->abdomen_l2;
                    $abdomen_l3 = $abdomen_l3 + $results_6[$ee6]->abdomen_l3;
                }
                $t_mf = $head_mf + $thorax_mf + $abdomen_mf;
                $t_l1 = $head_l1 + $thorax_l1 + $abdomen_l1;
                $t_l2 = $head_l2 + $thorax_l2 + $abdomen_l2;
                $t_l3 = $head_l3 + $thorax_l3 + $abdomen_l3;
                // this qure for get dessected form ento5 mos table
                $date = $results[$i]->date;
                $moh_area = $results[$i]->moh_area;
                $phi_and_phm = $results[$i]->phi;
                $gn = $results[$i]->gn;
                // $phi_and_phm="";
                $locality = $results[$i]->ad;

                if ($infective !== 0) {
                    $viewData = $viewData .
                        '<tr>
    <td>' . $date . '</td>' .
                        '<td>' . $moh_area . '</td>' .
                        '<td>' . $phi_and_phm . '</td>' .
                        '<td>' . $gn . '</td>' .
                        '<td> ento 03 </td>' .
                        '<td>' . $locality . '</td>' .
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
            // ento 03 data
            // AND WHERE en5.main_form_type='ento_01'
            // ento 04 data
            $results = DB::select("
select en4.date_of_collection as date,en4.phi,en4.moh as moh_area,
en4.gn_division,en4.ento_04_id as ento_04_id,en5.ento_05_id as id,mosnew.address as ad, mosnew.id as mid,en4.gps_lat as gps_lat ,en4.gps_long as gps_long
FROM ento_04 as en4
INNER JOIN ento_05 as en5
ON en4.ento_04_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mosnew.species2='CX'
AND  en5.main_form_type='ento_04'
AND en4.district='" . $district . "' AND en4.date_of_collection BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY mosnew.address
");
            for ($i = 0; $i < count($results); $i++) {
                $ad  = $results[$i]->ad;
                $gps_lat = $results[$i]->gps_lat;
                $gps_long = $results[$i]->gps_long;
                $id  = $results[$i]->id;
                $mid  = $results[$i]->mid;






                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE  address='$ad' and  ento_05_id=$id and species2='CX' ");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective  = $results_6[$ee6]->labno;
                }
                $head_mf = 0;
                $head_l1 = 0;
                $head_l2 = 0;
                $head_l3 = 0;
                $thorax_mf = 0;
                $thorax_l1 = 0;
                $thorax_l2 = 0;
                $thorax_l3 = 0;
                $abdomen_mf = 0;
                $abdomen_l1 = 0;
                $abdomen_l2 = 0;
                $abdomen_l3 = 0;
                $t_mf = 0;
                $t_l1 = 0;
                $t_l2 = 0;
                $t_l3 = 0;
                // iadasda sdsad asd asd sad sad asd s da sdas d sad sad sa da
                $mid  = $results[$i]->mid;
                $results_6 = DB::select("SELECT * FROM ento_05_new_mosq WHERE   ento_05_id=$id and species2='CX'  and address='$ad'  ");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    $head_mf = $head_mf + $results_6[$ee6]->head_mf;
                    $head_l1 = $head_l1 + $results_6[$ee6]->head_l1;
                    $head_l2 = $head_l2 + $results_6[$ee6]->head_l2;
                    $head_l3 = $head_l3 + $results_6[$ee6]->head_l3;
                    $thorax_mf = $thorax_mf + $results_6[$ee6]->thorax_mf;
                    $thorax_l1 = $thorax_l1 + $results_6[$ee6]->thorax_l1;
                    $thorax_l2 = $thorax_l2 + $results_6[$ee6]->thorax_l2;
                    $thorax_l3 = $thorax_l3 + $results_6[$ee6]->thorax_l3;
                    $abdomen_mf = $abdomen_mf + $results_6[$ee6]->abdomen_mf;
                    $abdomen_l1 = $abdomen_l1 + $results_6[$ee6]->abdomen_l1;
                    $abdomen_l2 = $abdomen_l2 + $results_6[$ee6]->abdomen_l2;
                    $abdomen_l3 = $abdomen_l3 + $results_6[$ee6]->abdomen_l3;
                }
                $t_mf = $head_mf + $thorax_mf + $abdomen_mf;
                $t_l1 = $head_l1 + $thorax_l1 + $abdomen_l1;
                $t_l2 = $head_l2 + $thorax_l2 + $abdomen_l2;
                $t_l3 = $head_l3 + $thorax_l3 + $abdomen_l3;
                // this qure for get dessected form ento5 mos table
                $date = $results[$i]->date;
                $moh_area = $results[$i]->moh_area;
                $phi_and_phm = $results[$i]->phi;
                $gn = $results[$i]->gn_division;
                // $phi_and_phm="";
                $locality = $results[$i]->ad;


                if ($infective !== 0) {

                    $viewData = $viewData .
                        '<tr>
    <td>' . $date . '</td>' .
                        '<td>' . $moh_area . '</td>' .
                        '<td>' . $phi_and_phm . '</td>' .
                        '<td>' . $gn . '</td>' .
                        '<td> ento 04 </td>' .
                        '<td>' . $locality . '</td>' .
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

            // ento 03 data




            if ($export_type == 'PDF') {

                $content = ob_get_clean();

                $template = view(
                    'report/b2_view',
                    compact('data'),
                    ["dataView" => $viewData, 'district' => $data['district'], 'to' => $data['to'], 'from' => $data['from']]
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
            } else {

                header('Content-Type: application/xls');
                header('Content-Disposition: attachment; filename=download.xls');
                echo $template = view(
                    'report/b2_view',
                    compact('data'),
                    ["dataView" => $viewData, 'district' => $data['district'], 'to' => $data['to'], 'from' => $data['from']]
                );
            }


            /////////////////////////////////////////////////////////////////////////////////////////////////////////
        } else {

            //////////////////////////////////////////////////////////////////////////////////////////////////
            $head_mf = 0;
            $head_l1 = 0;
            $head_l2 = 0;
            $head_l3 = 0;
            $thorax_mf = 0;
            $thorax_l1 = 0;
            $thorax_l2 = 0;
            $thorax_l3 = 0;
            $abdomen_mf = 0;
            $abdomen_l1 = 0;
            $abdomen_l2 = 0;
            $abdomen_l3 = 0;
            $total_stage = 0;
            $positive_mosq = 0;
            $viewData = "";
            $gn = "";
            $results = DB::select("
select en5.main_form_id,en1.gn_divison, en1.date,en1.name_of_heo, en1.moh_area,en1.phi_and_phm,en1.gn_divison,en5.ento_05_id as id,en1.ento_01_id as ento1id ,mosnew.address as ad,mosnew.id as mid
FROM ento_01 as en1
INNER JOIN ento_01_data as ento01data
ON ento01data.ento_01_id=en1.ento_01_id
INNER JOIN ento_05 as en5
ON en1.ento_01_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mosnew.species2='Mansonia'
AND  en5.main_form_type='ento_01'
AND en1.district='" . $district . "' AND en1.date BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY mosnew.address");
            for ($i = 0; $i < count($results); $i++) {
                $ad  = $results[$i]->ad;

                $main_form_id  = $results[$i]->main_form_id;






                $results_2 = DB::select("SELECT * from `ento_01_data` where `house_no`='$ad' and `ento_01_id`=$main_form_id ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $gps_lat  = $results_2[$e]->gps_lat;
                    $gps_long  = $results_2[$e]->gps_long;
                }
                $id  = $results[$i]->id;
                $mid  = $results[$i]->mid;
                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE  address='$ad' and ento_05_id=$id and species2='Mansonia' ");






                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective  = $results_6[$ee6]->labno;
                }
                $head_mf = 0;
                $head_l1 = 0;
                $head_l2 = 0;
                $head_l3 = 0;
                $thorax_mf = 0;
                $thorax_l1 = 0;
                $thorax_l2 = 0;
                $thorax_l3 = 0;
                $abdomen_mf = 0;
                $abdomen_l1 = 0;
                $abdomen_l2 = 0;
                $abdomen_l3 = 0;
                $t_mf = 0;
                $t_l1 = 0;
                $t_l2 = 0;
                $t_l3 = 0;
                // iadasda sdsad asd asd sad sad asd s da sdas d sad sad sa da
                $results_6 = DB::select("SELECT * FROM ento_05_new_mosq WHERE   ento_05_id=$id and species2='Mansonia'  and address='$ad'  ");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    $head_mf = $head_mf + $results_6[$ee6]->head_mf;
                    $head_l1 = $head_l1 + $results_6[$ee6]->head_l1;
                    $head_l2 = $head_l2 + $results_6[$ee6]->head_l2;
                    $head_l3 = $head_l3 + $results_6[$ee6]->head_l3;
                    $thorax_mf = $thorax_mf + $results_6[$ee6]->thorax_mf;
                    $thorax_l1 = $thorax_l1 + $results_6[$ee6]->thorax_l1;
                    $thorax_l2 = $thorax_l2 + $results_6[$ee6]->thorax_l2;
                    $thorax_l3 = $thorax_l3 + $results_6[$ee6]->thorax_l3;
                    $abdomen_mf = $abdomen_mf + $results_6[$ee6]->abdomen_mf;
                    $abdomen_l1 = $abdomen_l1 + $results_6[$ee6]->abdomen_l1;
                    $abdomen_l2 = $abdomen_l2 + $results_6[$ee6]->abdomen_l2;
                    $abdomen_l3 = $abdomen_l3 + $results_6[$ee6]->abdomen_l3;
                }
                $t_mf = $head_mf + $thorax_mf + $abdomen_mf;
                $t_l1 = $head_l1 + $thorax_l1 + $abdomen_l1;
                $t_l2 = $head_l2 + $thorax_l2 + $abdomen_l2;
                $t_l3 = $head_l3 + $thorax_l3 + $abdomen_l3;
                // this qure for get dessected form ento5 mos table
                $date = $results[$i]->date;
                $moh_area = $results[$i]->moh_area;
                $phi_and_phm = $results[$i]->phi_and_phm;
                $gn = $results[$i]->gn_divison;
                $locality = $results[$i]->ad;
                $viewData = $viewData .
                    '<tr>
    <td>' . $date . '</td>' .
                    '<td>' . $moh_area . '</td>' .
                    '<td>' . $phi_and_phm . '</td>' .
                    '<td>' . $gn . '</td>' .
                    '<td> ento 01 </td>' .
                    '<td>' . $locality . '</td>' .
                    '<td>' . $gps_lat . '</td>' .
                    '<td>' . $gps_long . '</td>' .
                    '<td>' . $infective . '</td>' .
                    '<td>' . $t_mf . '</td>' .
                    '<td>' . $t_l1 . '</td>' .
                    '<td>' . $t_l2 . '</td>' .
                    '<td>' . $t_l3 . '</td>
</tr>';
            }
            $results = DB::select("
select  en2.date,en2.heo,en2.moh_area,en2.gn_division,en2.ento_02_id as ento_02_id,en5.ento_05_id as id,mosnew.address as ad, mosnew.id as mid
FROM ento_02 as en2
INNER JOIN ento_02_data as ento02data
ON ento02data.ento_02_id=en2.ento_02_id
INNER JOIN ento_05 as en5
ON en2.ento_02_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mosnew.species2='Mansonia'
AND  en5.main_form_type='ento_02'
AND en2.district='" . $district . "' AND en2.date BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY mosnew.address");
            for ($i = 0; $i < count($results); $i++) {
                $ad  = $results[$i]->ad;



                // $main_form_id  = $results[$i]->main_form_id;
                // $results_2 = DB::select("SELECT * from `ento_01_data` where `house_no`='$ad'  and `ento_02_id`=$main_form_id ");
                // $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE  address='$ad' and species2='CX' and `ento_05_id`=$id ");





                $results_2 = DB::select("SELECT * from `ento_02_data` where `chief_occupant`='$ad' and `ento_02_id`=$main_form_id ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $gps_lat  = $results_2[$e]->gps_lat;
                    $gps_long  = $results_2[$e]->gps_long;
                }
                $id  = $results[$i]->id;
                $mid  = $results[$i]->mid;
                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE  address='$ad' and ento_05_id=$id and species2='Mansonia' ");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective  = $results_6[$ee6]->labno;
                }
                $head_mf = 0;
                $head_l1 = 0;
                $head_l2 = 0;
                $head_l3 = 0;
                $thorax_mf = 0;
                $thorax_l1 = 0;
                $thorax_l2 = 0;
                $thorax_l3 = 0;
                $abdomen_mf = 0;
                $abdomen_l1 = 0;
                $abdomen_l2 = 0;
                $abdomen_l3 = 0;
                $t_mf = 0;
                $t_l1 = 0;
                $t_l2 = 0;
                $t_l3 = 0;
                // iadasda sdsad asd asd sad sad asd s da sdas d sad sad sa da
                $results_6 = DB::select("SELECT * FROM ento_05_new_mosq WHERE   ento_05_id=$id and species2='Mansonia'  and address='$ad'  ");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    $head_mf = $head_mf + $results_6[$ee6]->head_mf;
                    $head_l1 = $head_l1 + $results_6[$ee6]->head_l1;
                    $head_l2 = $head_l2 + $results_6[$ee6]->head_l2;
                    $head_l3 = $head_l3 + $results_6[$ee6]->head_l3;
                    $thorax_mf = $thorax_mf + $results_6[$ee6]->thorax_mf;
                    $thorax_l1 = $thorax_l1 + $results_6[$ee6]->thorax_l1;
                    $thorax_l2 = $thorax_l2 + $results_6[$ee6]->thorax_l2;
                    $thorax_l3 = $thorax_l3 + $results_6[$ee6]->thorax_l3;
                    $abdomen_mf = $abdomen_mf + $results_6[$ee6]->abdomen_mf;
                    $abdomen_l1 = $abdomen_l1 + $results_6[$ee6]->abdomen_l1;
                    $abdomen_l2 = $abdomen_l2 + $results_6[$ee6]->abdomen_l2;
                    $abdomen_l3 = $abdomen_l3 + $results_6[$ee6]->abdomen_l3;
                }
                $t_mf = $head_mf + $thorax_mf + $abdomen_mf;
                $t_l1 = $head_l1 + $thorax_l1 + $abdomen_l1;
                $t_l2 = $head_l2 + $thorax_l2 + $abdomen_l2;
                $t_l3 = $head_l3 + $thorax_l3 + $abdomen_l3;
                // this qure for get dessected form ento5 mos table
                $date = $results[$i]->date;
                $moh_area = $results[$i]->moh_area;
                $gn = $results[$i]->gn_division;
                $phi_and_phm = $results[$i]->phi_and_phm;
                $locality = $results[$i]->ad;


                if ($infective !== 0) {
                    $viewData = $viewData .
                        '<tr>
    <td>' . $date . '</td>' .
                        '<td>' . $moh_area . '</td>' .
                        '<td>' . $phi_and_phm . '</td>' .
                        '<td>' . $gn . '</td>' .
                        '<td> ento 02 </td>' .
                        '<td>' . $locality . '</td>' .
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
            // ento 02 data
            // ento 03 data
            // $result2 = DB::table('ento_01')
            // ->select('*')
            // // ->where('district', $data['district'])
            // // ->WhereBetween('date', [$from, $to])
            // ->get();
            $results = DB::select("
select en5.main_form_id,en3.date_of_collection as date,en3.phi,en3.moh as moh_area,en3.gn,en3.ento_03_id as ento_03_id,en5.ento_05_id as id,mosnew.address as ad, mosnew.id as mid,en3.gps_lat as gps_lat ,en3.gps_long as gps_long
FROM ento_03 as en3
INNER JOIN ento_03_data as ento03data
ON ento03data.ento_03_id=en3.ento_03_id
INNER JOIN ento_05 as en5
ON en3.ento_03_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mosnew.species2='Mansonia'
AND  en5.main_form_type='ento_03'
AND en3.district='" . $district . "' AND en3.date_of_collection BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY mosnew.address");
            for ($i = 0; $i < count($results); $i++) {
                $ad  = $results[$i]->ad;
                $gps_lat = $results[$i]->gps_lat;
                $gps_long = $results[$i]->gps_long;
                $id  = $results[$i]->id;
                $mid  = $results[$i]->mid;
                $main_form_id = $results[$i]->main_form_id;


                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE address='$ad' and ento_05_id=$id and species2='Mansonia' ");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective  = $results_6[$ee6]->labno;
                }
                $head_mf = 0;
                $head_l1 = 0;
                $head_l2 = 0;
                $head_l3 = 0;
                $thorax_mf = 0;
                $thorax_l1 = 0;
                $thorax_l2 = 0;
                $thorax_l3 = 0;
                $abdomen_mf = 0;
                $abdomen_l1 = 0;
                $abdomen_l2 = 0;
                $abdomen_l3 = 0;
                $t_mf = 0;
                $t_l1 = 0;
                $t_l2 = 0;
                $t_l3 = 0;
                // iadasda sdsad asd asd sad sad asd s da sdas d sad sad sa da
                $mid  = $results[$i]->mid;
                $results_6 = DB::select("SELECT * FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' and address='$ad'  ");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    $head_mf = $head_mf + $results_6[$ee6]->head_mf;
                    $head_l1 = $head_l1 + $results_6[$ee6]->head_l1;
                    $head_l2 = $head_l2 + $results_6[$ee6]->head_l2;
                    $head_l3 = $head_l3 + $results_6[$ee6]->head_l3;
                    $thorax_mf = $thorax_mf + $results_6[$ee6]->thorax_mf;
                    $thorax_l1 = $thorax_l1 + $results_6[$ee6]->thorax_l1;
                    $thorax_l2 = $thorax_l2 + $results_6[$ee6]->thorax_l2;
                    $thorax_l3 = $thorax_l3 + $results_6[$ee6]->thorax_l3;
                    $abdomen_mf = $abdomen_mf + $results_6[$ee6]->abdomen_mf;
                    $abdomen_l1 = $abdomen_l1 + $results_6[$ee6]->abdomen_l1;
                    $abdomen_l2 = $abdomen_l2 + $results_6[$ee6]->abdomen_l2;
                    $abdomen_l3 = $abdomen_l3 + $results_6[$ee6]->abdomen_l3;
                }
                $t_mf = $head_mf + $thorax_mf + $abdomen_mf;
                $t_l1 = $head_l1 + $thorax_l1 + $abdomen_l1;
                $t_l2 = $head_l2 + $thorax_l2 + $abdomen_l2;
                $t_l3 = $head_l3 + $thorax_l3 + $abdomen_l3;
                // this qure for get dessected form ento5 mos table
                $date = $results[$i]->date;
                $moh_area = $results[$i]->moh_area;
                $phi_and_phm = $results[$i]->phi;
                $gn = $results[$i]->gn;
                // $phi_and_phm="";
                $locality = $results[$i]->ad;

                if ($infective !== 0) {
                    $viewData = $viewData .
                        '<tr>
    <td>' . $date . '</td>' .
                        '<td>' . $moh_area . '</td>' .
                        '<td>' . $phi_and_phm . '</td>' .
                        '<td>' . $gn . '</td>' .
                        '<td> ento 03 </td>' .
                        '<td>' . $locality . '</td>' .
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
            // ento 03 data
            // AND WHERE en5.main_form_type='ento_01'
            // ento 04 data
            $results = DB::select("
select en5.main_form_id,en4.date_of_collection as date,en4.phi,en4.moh as moh_area,
en4.gn_division,en4.ento_04_id as ento_04_id,en5.ento_05_id as id,mosnew.address as ad, mosnew.id as mid,en4.gps_lat as gps_lat ,en4.gps_long as gps_long
FROM ento_04 as en4
INNER JOIN ento_05 as en5
ON en4.ento_04_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mosnew.species2='Mansonia'
AND  en5.main_form_type='ento_04'
AND en4.district='" . $district . "' AND en4.date_of_collection BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY mosnew.address");
            for ($i = 0; $i < count($results); $i++) {
                $ad  = $results[$i]->ad;
                $gps_lat = $results[$i]->gps_lat;
                $gps_long = $results[$i]->gps_long;
                $id  = $results[$i]->id;
                $mid  = $results[$i]->mid;


                $main_form_id = $results[$i]->main_form_id;






                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE  address='$ad' and ento_05_id=$id and species2='Mansonia' ");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective  = $results_6[$ee6]->labno;
                }
                $head_mf = 0;
                $head_l1 = 0;
                $head_l2 = 0;
                $head_l3 = 0;
                $thorax_mf = 0;
                $thorax_l1 = 0;
                $thorax_l2 = 0;
                $thorax_l3 = 0;
                $abdomen_mf = 0;
                $abdomen_l1 = 0;
                $abdomen_l2 = 0;
                $abdomen_l3 = 0;
                $t_mf = 0;
                $t_l1 = 0;
                $t_l2 = 0;
                $t_l3 = 0;
                // iadasda sdsad asd asd sad sad asd s da sdas d sad sad sa da
                $mid  = $results[$i]->mid;
                $results_6 = DB::select("SELECT * FROM ento_05_new_mosq WHERE   ento_05_id=$id and species2='Mansonia' and address='$ad'  ");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    $head_mf = $head_mf + $results_6[$ee6]->head_mf;
                    $head_l1 = $head_l1 + $results_6[$ee6]->head_l1;
                    $head_l2 = $head_l2 + $results_6[$ee6]->head_l2;
                    $head_l3 = $head_l3 + $results_6[$ee6]->head_l3;
                    $thorax_mf = $thorax_mf + $results_6[$ee6]->thorax_mf;
                    $thorax_l1 = $thorax_l1 + $results_6[$ee6]->thorax_l1;
                    $thorax_l2 = $thorax_l2 + $results_6[$ee6]->thorax_l2;
                    $thorax_l3 = $thorax_l3 + $results_6[$ee6]->thorax_l3;
                    $abdomen_mf = $abdomen_mf + $results_6[$ee6]->abdomen_mf;
                    $abdomen_l1 = $abdomen_l1 + $results_6[$ee6]->abdomen_l1;
                    $abdomen_l2 = $abdomen_l2 + $results_6[$ee6]->abdomen_l2;
                    $abdomen_l3 = $abdomen_l3 + $results_6[$ee6]->abdomen_l3;
                }
                $t_mf = $head_mf + $thorax_mf + $abdomen_mf;
                $t_l1 = $head_l1 + $thorax_l1 + $abdomen_l1;
                $t_l2 = $head_l2 + $thorax_l2 + $abdomen_l2;
                $t_l3 = $head_l3 + $thorax_l3 + $abdomen_l3;
                // this qure for get dessected form ento5 mos table
                $date = $results[$i]->date;
                $moh_area = $results[$i]->moh_area;
                $phi_and_phm = $results[$i]->phi;
                $gn = $results[$i]->gn_division;
                // $phi_and_phm="";
                $locality = $results[$i]->ad;

                if ($infective !== 0) {
                    $viewData = $viewData .
                        '<tr>
    <td>' . $date . '</td>' .
                        '<td>' . $moh_area . '</td>' .
                        '<td>' . $phi_and_phm . '</td>' .
                        '<td>' . $gn . '</td>' .
                        '<td> ento 04 </td>' .
                        '<td>' . $locality . '</td>' .
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
            // ento 03 data






            if ($export_type == 'PDF') {


                $content = ob_get_clean();
                // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
                // File::requireOnce($html2pdf_path);

                $html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
                $template = view(
                    'report/b2_view_man',
                    compact('data'),
                    ["dataView" => $viewData, 'district' => $data['district'], 'to' => $data['to'], 'from' => $data['from']]
                );
                try {
                    $html2pdf = new HTML2PDF('L', 'A4', 'en', true, 'UTF-8', array(10, 10, 10, 10));
                    $html2pdf->pdf->SetTitle('B 2 Report');
                    $html2pdf->WriteHTML($template);
                    $html2pdf->Output('b2_report.pdf');
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
                    'report/b2_view_man',
                    compact('data'),
                    ["dataView" => $viewData, 'district' => $data['district'], 'to' => $data['to'], 'from' => $data['from']]
                );
            }




            ////////////////////////////////////////////////////////////////////////////////////////////////////

        }
    }













    //***************************************            yellow b2 report   ********************************************************
    public function b2_report_print2(Request $request)
    {

        $data = $request->all();
        $from = $data['from'];
        $to = $data['to'];
        $district = $data['district'];
        $head_mf = 0;
        $head_l1 = 0;
        $head_l2 = 0;
        $head_l3 = 0;
        $thorax_mf = 0;
        $thorax_l1 = 0;
        $thorax_l2 = 0;
        $thorax_l3 = 0;
        $abdomen_mf = 0;
        $abdomen_l1 = 0;
        $abdomen_l2 = 0;
        $abdomen_l3 = 0;
        $total_stage = 0;
        $positive_mosq = 0;
        $viewData = "";
        $gn = "";
        $results = DB::select("
select en1.gn_divison, en1.date,en1.name_of_heo, en1.moh_area,en1.phi_and_phm,en1.gn_divison,en5.ento_05_id as id,en1.ento_01_id as ento1id ,mosnew.address as ad,mosnew.id as mid
FROM ento_01 as en1
INNER JOIN ento_01_data as ento01data
ON ento01data.ento_01_id=en1.ento_01_id
INNER JOIN ento_05 as en5
ON en1.ento_01_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mos.species='Mansonia'
AND  en5.main_form_type='ento_01'
AND en1.district='" . $district . "' AND en1.date BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY mosnew.address");
        for ($i = 0; $i < count($results); $i++) {
            $ad  = $results[$i]->ad;
            $results_2 = DB::select("SELECT * from `ento_01_data` where `house_no`='$ad' ");
            for ($e = 0; $e < count($results_2); $e++) {
                $gps_lat  = $results_2[$e]->gps_lat;
                $gps_long  = $results_2[$e]->gps_long;
            }
            $id  = $results[$i]->id;
            $mid  = $results[$i]->mid;
            $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE  id=$mid and species2='Mansonia' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
            for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                // $infective  = $results_3[$ee]->labno;
                $infective  = $results_6[$ee6]->labno;
            }
            $head_mf = 0;
            $head_l1 = 0;
            $head_l2 = 0;
            $head_l3 = 0;
            $thorax_mf = 0;
            $thorax_l1 = 0;
            $thorax_l2 = 0;
            $thorax_l3 = 0;
            $abdomen_mf = 0;
            $abdomen_l1 = 0;
            $abdomen_l2 = 0;
            $abdomen_l3 = 0;
            $t_mf = 0;
            $t_l1 = 0;
            $t_l2 = 0;
            $t_l3 = 0;
            // iadasda sdsad asd asd sad sad asd s da sdas d sad sad sa da
            $results_6 = DB::select("SELECT * FROM ento_05_new_mosq WHERE   id=$mid and species2='Mansonia'  ");
            for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                $head_mf = $head_mf + $results_6[$ee6]->head_mf;
                $head_l1 = $head_l1 + $results_6[$ee6]->head_l1;
                $head_l2 = $head_l2 + $results_6[$ee6]->head_l2;
                $head_l3 = $head_l3 + $results_6[$ee6]->head_l3;
                $thorax_mf = $thorax_mf + $results_6[$ee6]->thorax_mf;
                $thorax_l1 = $thorax_l1 + $results_6[$ee6]->thorax_l1;
                $thorax_l2 = $thorax_l2 + $results_6[$ee6]->thorax_l2;
                $thorax_l3 = $thorax_l3 + $results_6[$ee6]->thorax_l3;
                $abdomen_mf = $abdomen_mf + $results_6[$ee6]->abdomen_mf;
                $abdomen_l1 = $abdomen_l1 + $results_6[$ee6]->abdomen_l1;
                $abdomen_l2 = $abdomen_l2 + $results_6[$ee6]->abdomen_l2;
                $abdomen_l3 = $abdomen_l3 + $results_6[$ee6]->abdomen_l3;
            }
            $t_mf = $head_mf + $thorax_mf + $abdomen_mf;
            $t_l1 = $head_l1 + $thorax_l1 + $abdomen_l1;
            $t_l2 = $head_l2 + $thorax_l2 + $abdomen_l2;
            $t_l3 = $head_l3 + $thorax_l3 + $abdomen_l3;
            // this qure for get dessected form ento5 mos table
            $date = $results[$i]->date;
            $moh_area = $results[$i]->moh_area;
            $phi_and_phm = $results[$i]->phi_and_phm;
            $gn = $results[$i]->gn_divison;
            $locality = $results[$i]->ad;
            $viewData = $viewData .
                '<tr>
    <td>' . $date . '</td>' .
                '<td>' . $moh_area . '</td>' .
                '<td>' . $phi_and_phm . '</td>' .
                '<td>' . $gn . '</td>' .
                '<td>' . $locality . '</td>' .
                '<td>' . $gps_lat . '</td>' .
                '<td>' . $gps_long . '</td>' .
                '<td>' . $infective . '</td>' .
                '<td>' . $t_mf . '</td>' .
                '<td>' . $t_l1 . '</td>' .
                '<td>' . $t_l2 . '</td>' .
                '<td>' . $t_l3 . '</td>
</tr>';
        }
        $results = DB::select("
select  en2.date,en2.heo,en2.moh_area,en2.gn_division,en2.ento_02_id as ento_02_id,en5.ento_05_id as id,mosnew.address as ad, mosnew.id as mid
FROM ento_02 as en2
INNER JOIN ento_02_data as ento02data
ON ento02data.ento_02_id=en2.ento_02_id
INNER JOIN ento_05 as en5
ON en2.ento_02_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mos.species='Mansonia'
AND  en5.main_form_type='ento_02'
AND en2.district='" . $district . "' AND en2.date BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY mosnew.address");
        for ($i = 0; $i < count($results); $i++) {
            $ad  = $results[$i]->ad;
            $results_2 = DB::select("SELECT * from `ento_02_data` where `chief_occupant`='$ad' ");
            for ($e = 0; $e < count($results_2); $e++) {
                $gps_lat  = $results_2[$e]->gps_lat;
                $gps_long  = $results_2[$e]->gps_long;
            }
            $id  = $results[$i]->id;
            $mid  = $results[$i]->mid;
            $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE  id=$mid and species2='Mansonia' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
            for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                // $infective  = $results_3[$ee]->labno;
                $infective  = $results_6[$ee6]->labno;
            }
            $head_mf = 0;
            $head_l1 = 0;
            $head_l2 = 0;
            $head_l3 = 0;
            $thorax_mf = 0;
            $thorax_l1 = 0;
            $thorax_l2 = 0;
            $thorax_l3 = 0;
            $abdomen_mf = 0;
            $abdomen_l1 = 0;
            $abdomen_l2 = 0;
            $abdomen_l3 = 0;
            $t_mf = 0;
            $t_l1 = 0;
            $t_l2 = 0;
            $t_l3 = 0;
            // iadasda sdsad asd asd sad sad asd s da sdas d sad sad sa da
            $results_6 = DB::select("SELECT * FROM ento_05_new_mosq WHERE   id=$mid and species2='Mansonia'  ");
            for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                $head_mf = $head_mf + $results_6[$ee6]->head_mf;
                $head_l1 = $head_l1 + $results_6[$ee6]->head_l1;
                $head_l2 = $head_l2 + $results_6[$ee6]->head_l2;
                $head_l3 = $head_l3 + $results_6[$ee6]->head_l3;
                $thorax_mf = $thorax_mf + $results_6[$ee6]->thorax_mf;
                $thorax_l1 = $thorax_l1 + $results_6[$ee6]->thorax_l1;
                $thorax_l2 = $thorax_l2 + $results_6[$ee6]->thorax_l2;
                $thorax_l3 = $thorax_l3 + $results_6[$ee6]->thorax_l3;
                $abdomen_mf = $abdomen_mf + $results_6[$ee6]->abdomen_mf;
                $abdomen_l1 = $abdomen_l1 + $results_6[$ee6]->abdomen_l1;
                $abdomen_l2 = $abdomen_l2 + $results_6[$ee6]->abdomen_l2;
                $abdomen_l3 = $abdomen_l3 + $results_6[$ee6]->abdomen_l3;
            }
            $t_mf = $head_mf + $thorax_mf + $abdomen_mf;
            $t_l1 = $head_l1 + $thorax_l1 + $abdomen_l1;
            $t_l2 = $head_l2 + $thorax_l2 + $abdomen_l2;
            $t_l3 = $head_l3 + $thorax_l3 + $abdomen_l3;
            // this qure for get dessected form ento5 mos table
            $date = $results[$i]->date;
            $moh_area = $results[$i]->moh_area;
            $gn = $results[$i]->gn_division;
            $phi_and_phm = $results[$i]->phi_and_phm;

            $locality = $results[$i]->ad;
            $viewData = $viewData .
                '<tr>
    <td>' . $date . '</td>' .
                '<td>' . $moh_area . '</td>' .
                '<td>' . $phi_and_phm . '</td>' .
                '<td>' . $gn . '</td>' .
                '<td>' . $locality . '</td>' .
                '<td>' . $gps_lat . '</td>' .
                '<td>' . $gps_long . '</td>' .
                '<td>' . $infective . '</td>' .
                '<td>' . $t_mf . '</td>' .
                '<td>' . $t_l1 . '</td>' .
                '<td>' . $t_l2 . '</td>' .
                '<td>' . $t_l3 . '</td>
</tr>';
        }
        // ento 02 data
        // ento 03 data
        // $result2 = DB::table('ento_01')
        // ->select('*')
        // // ->where('district', $data['district'])
        // // ->WhereBetween('date', [$from, $to])
        // ->get();
        $results = DB::select("
select en3.date_of_collection as date,en3.phi,en3.moh as moh_area,en3.gn,en3.ento_03_id as ento_03_id,en5.ento_05_id as id,mosnew.address as ad, mosnew.id as mid,en3.gps_lat as gps_lat ,en3.gps_long as gps_long
FROM ento_03 as en3
INNER JOIN ento_03_data as ento03data
ON ento03data.ento_03_id=en3.ento_03_id
INNER JOIN ento_05 as en5
ON en3.ento_03_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mos.species='Mansonia'
AND  en5.main_form_type='ento_03'
AND en3.district='" . $district . "' AND en3.date_of_collection BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY mosnew.address");
        for ($i = 0; $i < count($results); $i++) {
            $ad  = $results[$i]->ad;
            $gps_lat = $results[$i]->gps_lat;
            $gps_long = $results[$i]->gps_long;
            $id  = $results[$i]->id;
            $mid  = $results[$i]->mid;
            $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE  id=$mid and species2='Mansonia' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
            for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                // $infective  = $results_3[$ee]->labno;
                $infective  = $results_6[$ee6]->labno;
            }
            $head_mf = 0;
            $head_l1 = 0;
            $head_l2 = 0;
            $head_l3 = 0;
            $thorax_mf = 0;
            $thorax_l1 = 0;
            $thorax_l2 = 0;
            $thorax_l3 = 0;
            $abdomen_mf = 0;
            $abdomen_l1 = 0;
            $abdomen_l2 = 0;
            $abdomen_l3 = 0;
            $t_mf = 0;
            $t_l1 = 0;
            $t_l2 = 0;
            $t_l3 = 0;
            // iadasda sdsad asd asd sad sad asd s da sdas d sad sad sa da
            $mid  = $results[$i]->mid;
            $results_6 = DB::select("SELECT * FROM ento_05_new_mosq WHERE   id=$mid and species2='Mansonia'  ");
            for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                $head_mf = $head_mf + $results_6[$ee6]->head_mf;
                $head_l1 = $head_l1 + $results_6[$ee6]->head_l1;
                $head_l2 = $head_l2 + $results_6[$ee6]->head_l2;
                $head_l3 = $head_l3 + $results_6[$ee6]->head_l3;
                $thorax_mf = $thorax_mf + $results_6[$ee6]->thorax_mf;
                $thorax_l1 = $thorax_l1 + $results_6[$ee6]->thorax_l1;
                $thorax_l2 = $thorax_l2 + $results_6[$ee6]->thorax_l2;
                $thorax_l3 = $thorax_l3 + $results_6[$ee6]->thorax_l3;
                $abdomen_mf = $abdomen_mf + $results_6[$ee6]->abdomen_mf;
                $abdomen_l1 = $abdomen_l1 + $results_6[$ee6]->abdomen_l1;
                $abdomen_l2 = $abdomen_l2 + $results_6[$ee6]->abdomen_l2;
                $abdomen_l3 = $abdomen_l3 + $results_6[$ee6]->abdomen_l3;
            }
            $t_mf = $head_mf + $thorax_mf + $abdomen_mf;
            $t_l1 = $head_l1 + $thorax_l1 + $abdomen_l1;
            $t_l2 = $head_l2 + $thorax_l2 + $abdomen_l2;
            $t_l3 = $head_l3 + $thorax_l3 + $abdomen_l3;
            // this qure for get dessected form ento5 mos table
            $date = $results[$i]->date;
            $moh_area = $results[$i]->moh_area;
            $phi_and_phm = $results[$i]->phi;
            $gn = $results[$i]->gn;
            $phi_and_phm = $results[$i]->phi;
            $locality = $results[$i]->ad;
            $viewData = $viewData .
                '<tr>
    <td>' . $date . '</td>' .
                '<td>' . $moh_area . '</td>' .
                '<td>' . $phi_and_phm . '</td>' .
                '<td>' . $gn . '</td>' .
                '<td>' . $locality . '</td>' .
                '<td>' . $gps_lat . '</td>' .
                '<td>' . $gps_long . '</td>' .
                '<td>' . $infective . '</td>' .
                '<td>' . $t_mf . '</td>' .
                '<td>' . $t_l1 . '</td>' .
                '<td>' . $t_l2 . '</td>' .
                '<td>' . $t_l3 . '</td>
</tr>';
        }
        // ento 03 data
        // AND WHERE en5.main_form_type='ento_01'
        // ento 04 data
        $results = DB::select("
select en4.date_of_collection as date,en4.phi,en4.moh as moh_area,
en4.gn_division,en4.ento_04_id as ento_04_id,en5.ento_05_id as id,mosnew.address as ad, mosnew.id as mid,en4.gps_lat as gps_lat ,en4.gps_long as gps_long
FROM ento_04 as en4
INNER JOIN ento_05 as en5
ON en4.ento_04_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mos.species='Mansonia'
AND  en5.main_form_type='ento_04'
AND en4.district='" . $district . "' AND en4.date_of_collection BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY mosnew.address");
        for ($i = 0; $i < count($results); $i++) {
            $ad  = $results[$i]->ad;
            $gps_lat = $results[$i]->gps_lat;
            $gps_long = $results[$i]->gps_long;
            $id  = $results[$i]->id;
            $mid  = $results[$i]->mid;
            $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE  id=$mid and species2='Mansonia' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
            for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                // $infective  = $results_3[$ee]->labno;
                $infective  = $results_6[$ee6]->labno;
            }
            $head_mf = 0;
            $head_l1 = 0;
            $head_l2 = 0;
            $head_l3 = 0;
            $thorax_mf = 0;
            $thorax_l1 = 0;
            $thorax_l2 = 0;
            $thorax_l3 = 0;
            $abdomen_mf = 0;
            $abdomen_l1 = 0;
            $abdomen_l2 = 0;
            $abdomen_l3 = 0;
            $t_mf = 0;
            $t_l1 = 0;
            $t_l2 = 0;
            $t_l3 = 0;
            // iadasda sdsad asd asd sad sad asd s da sdas d sad sad sa da
            $mid  = $results[$i]->mid;
            $results_6 = DB::select("SELECT * FROM ento_05_new_mosq WHERE   id=$mid and species2='Mansonia '  ");
            for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                $head_mf = $head_mf + $results_6[$ee6]->head_mf;
                $head_l1 = $head_l1 + $results_6[$ee6]->head_l1;
                $head_l2 = $head_l2 + $results_6[$ee6]->head_l2;
                $head_l3 = $head_l3 + $results_6[$ee6]->head_l3;
                $thorax_mf = $thorax_mf + $results_6[$ee6]->thorax_mf;
                $thorax_l1 = $thorax_l1 + $results_6[$ee6]->thorax_l1;
                $thorax_l2 = $thorax_l2 + $results_6[$ee6]->thorax_l2;
                $thorax_l3 = $thorax_l3 + $results_6[$ee6]->thorax_l3;
                $abdomen_mf = $abdomen_mf + $results_6[$ee6]->abdomen_mf;
                $abdomen_l1 = $abdomen_l1 + $results_6[$ee6]->abdomen_l1;
                $abdomen_l2 = $abdomen_l2 + $results_6[$ee6]->abdomen_l2;
                $abdomen_l3 = $abdomen_l3 + $results_6[$ee6]->abdomen_l3;
            }
            $t_mf = $head_mf + $thorax_mf + $abdomen_mf;
            $t_l1 = $head_l1 + $thorax_l1 + $abdomen_l1;
            $t_l2 = $head_l2 + $thorax_l2 + $abdomen_l2;
            $t_l3 = $head_l3 + $thorax_l3 + $abdomen_l3;
            // this qure for get dessected form ento5 mos table
            $date = $results[$i]->date;
            $moh_area = $results[$i]->moh_area;
            $phi_and_phm = $results[$i]->phi;
            $gn = $results[$i]->gn_division;
            $phi_and_phm = $results[$i]->phi;
            $locality = $results[$i]->ad;
            $viewData = $viewData .
                '<tr>
    <td>' . $date . '</td>' .
                '<td>' . $moh_area . '</td>' .
                '<td>' . $phi_and_phm . '</td>' .
                '<td>' . $gn . '</td>' .
                '<td>' . $locality . '</td>' .
                '<td>' . $gps_lat . '</td>' .
                '<td>' . $gps_long . '</td>' .
                '<td>' . $infective . '</td>' .
                '<td>' . $t_mf . '</td>' .
                '<td>' . $t_l1 . '</td>' .
                '<td>' . $t_l2 . '</td>' .
                '<td>' . $t_l3 . '</td>
</tr>';
        }
        // ento 03 data
        $content = ob_get_clean();
        // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
        // File::requireOnce($html2pdf_path);
        $html2pdf = new HTML2PDF('L', 'A4', 'en', true, 'UTF-8', array(1, 1, 1, 1));
        $template = view(
            'report/b2_view',
            compact('data'),
            ["dataView" => $viewData, 'district' => $data['district'], 'to' => $data['to'], 'from' => $data['from']]
        );
        try {
            $html2pdf = new HTML2PDF('L', 'A4', 'en', true, 'UTF-8', array(10, 10, 10, 10));
            $html2pdf->pdf->SetTitle('B 2 Report');
            $html2pdf->WriteHTML($template);
            $html2pdf->Output('b2_report.pdf');
            ob_flush();
            ob_end_clean();
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }
    //***************************************            yellow b2 report   ********************************************************








































    // ************ blue ********************b1 report********************************





















    public function b1_report_print(Request $request)
    {


        $old_data_1 = array();
        $old_data_2 = array();
        $old_data_3 = array();
        $old_data_4 = array();


        $data = $request->all();
        $from = $data['from'];
        $to = $data['to'];
        $district = $data['district'];

        $species = $data['species'];



        if ($species == "Cx") {
            $total_no_of_premises = 0;
            $total_no_of_premises_positive = 0;
            $total_poscx = 0;
            $total_total_time_spend = 0;
            $total_mosquitodensity = 0;
            $total_total_mosquitos_collected = 0;
            $total_no_of_dissected = 0;
            $total_total_postive_cx = 0;
            $total_infective = 0;
            $total_infectedpercentage = 0;
            $total_infectivepercentage = 0;


            $total_no_of_collectors = 0;


            $name_of_heo = '';
            $moh_area = '';
            $phi_and_phm = '';
            $gn_divison = '';
            $no_of_premises = '';
            $no_of_premises_positive = '';
            $poscx = '';
            $total_time_spend = '';
            $mosquitodensity = '';
            $total_mosquitos_collected = '';
            $no_of_dissected = '';
            $total_postive_cx = '';
            $mq_postive_for_l3 = '';
            $infectedpercentage = '';
            $infectivepercentage = '';
            $viewData = "";

            $results = DB::select("
select  en1.no_of_collectors ,en1.name_of_heo, en1.moh_area,en1.phi_and_phm,en1.gn_divison,en1.total_mosquitos_collected,en5.ento_05_id as id,en1.ento_01_id as ento1id,
en1.no_of_premises ,en1.no_of_premises_positive as no_of_premises_positive ,en1.total_time_spend as total_time_spend
FROM ento_01 as en1
INNER JOIN ento_01_data as ento01data
ON ento01data.ento_01_id=en1.ento_01_id
INNER JOIN ento_05 as en5
ON en1.ento_01_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mos.species='Cx quin'
AND en1.district='" . $district . "' AND en1.date BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY en1.ento_01_id
");

            $old_data_1 = array();


            for ($i = 0; $i < count($results); $i++) {
                // this qure for get dessected form ento5 mos table
                $id  = $results[$i]->id;
                $results_2 = DB::select("  SELECT  SUM(no_of_dissected) as no_of_dissected_al  from ento_05_mosq where ento_05_id=$id and    species='Cx quin' ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $no_of_dissected_al  = $results_2[$e]->no_of_dissected_al;
                }
                // this qure for get dessected form ento5 mos table
                $ento1id_id  = $results[$i]->ento1id;
                // $total_postive_cx = $results[$i]->positive_mosq;    replase this qure for this
                // $infective =$results[$i]->infective;
                $results_3 = DB::select(" SELECT SUM(lab_no) as labno ,SUM(lab_positive) as lab_positive FROM ento_01_data WHERE ento_01_id=$ento1id_id ");
                for ($ee = 0; $ee < count($results_3); $ee++) {
                    $infective  = $results_3[$ee]->labno;
                    // $total_postive_cx  = $results_3[$ee]->lab_positive;
                }
                // get  all  infective and infecterd
                $results_4 = DB::select(" SELECT COUNT(id) as lab_positive FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='CX' ");
                for ($ee4 = 0; $ee4 < count($results_4); $ee4++) {
                    // $infective  = $results_3[$ee]->labno;
                    $total_postive_cx  = $results_4[$ee4]->lab_positive;
                }
                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='CX' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");

                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    $infective  = $results_6[$ee6]->labno;
                }
                $name_of_heo  = $results[$i]->name_of_heo;
                $moh_area  = $results[$i]->moh_area;
                $phi_and_phm  = $results[$i]->phi_and_phm;
                $gn_divison  = $results[$i]->gn_divison;

                $no_of_collectors   = $results[$i]->no_of_collectors;
                $total_no_of_collectors = $total_no_of_collectors + $no_of_collectors;
                $no_of_premises  = $results[$i]->no_of_premises;
                $no_of_premises_positive  = $results[$i]->no_of_premises_positive;
                $total_mosquitos_collected = $results[$i]->total_mosquitos_collected;
                //          get %+
                if ($no_of_premises == "" or $no_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($no_of_premises_positive / $no_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }
                //          get %+
                $total_time_spend  = $results[$i]->total_time_spend;
                $total_time_spend = round($total_time_spend / 60, 2);;
                //        mosquito density
                if ($total_mosquitos_collected == "" or $total_mosquitos_collected == 0) {
                    $mosquitodensity = 0;
                } else {
                    $mosquitodensity =  ($total_mosquitos_collected / $total_time_spend) / $no_of_collectors;
                    $mosquitodensity = round($mosquitodensity, 2);
                }
                //        mosquito density
                // $total_mosquitos_collected =$results[$i]->total_cx_quin_mosq;
                $no_of_dissected = $no_of_dissected_al;

                if (empty($no_of_dissected)) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($total_postive_cx / $no_of_dissected) * 100;
                    $infectivepercentage = ($infective / $no_of_dissected) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }


                $total_no_of_premises = $total_no_of_premises + $no_of_premises;
                $total_no_of_premises_positive = $total_no_of_premises_positive + $no_of_premises_positive;
                $total_poscx = $total_poscx + $poscx;
                $total_total_time_spend = $total_total_time_spend + $total_time_spend;
                $total_mosquitodensity = $total_mosquitodensity + $mosquitodensity;
                $total_total_mosquitos_collected = $total_total_mosquitos_collected + $total_mosquitos_collected;
                $total_no_of_dissected = $total_no_of_dissected + $no_of_dissected;
                $total_total_postive_cx = $total_total_postive_cx + $total_postive_cx;
                $total_infective = $total_infective + $infective;
                $total_infectedpercentage = $total_infectedpercentage + $infectedpercentage;
                $total_infectivepercentage = $total_infectivepercentage + $infectivepercentage;





                // $viewData = $viewData .
                // '<tr>' .
                //     '<td>' . $name_of_heo . '</td>' .
                //     '<td>' . $moh_area . '</td>' .
                //     '<td>' . $phi_and_phm . '</td>' .
                //     '<td>' . $gn_divison . '</td>' .
                //     '<td>ENTO 01</td>' .
                //     '<td>' . $no_of_premises . '</td>' .
                //     '<td>' . $no_of_premises_positive . '</td>' .
                //     '<td>' . $poscx . '</td>' .
                //     '<td>' . $total_time_spend . '</td>' .
                //     '<td>' . $mosquitodensity . '</td>' .
                //     '<td>' . $total_mosquitos_collected . '</td>' .
                //     '<td>' . $no_of_dissected . '</td>' .
                //     '<td>' . $total_postive_cx   . '</td>' ./* $infected */
                //     '<td>' . $infective . '</td>' .
                //     '<td>' . $infectedpercentage . '</td>' .
                //     '<td>' . $infectivepercentage . '</td>
                // </tr>';



                // group for row

                if ($total_total_mosquitos_collected == "" or $total_total_mosquitos_collected == 0) {
                    $mosquitodensity_row = 0;
                } else {
                    $mosquitodensity_row =  ($total_mosquitos_collected / $total_time_spend);
                    $mosquitodensity_row = round($mosquitodensity_row, 2);
                }

                // group for row




                $old_data_1[] = array(
                    "name_of_heo" => $name_of_heo,
                    "moh_area" => $moh_area,
                    "phi_and_phm" => $phi_and_phm,
                    "gn_divison" => $gn_divison,
                    "ENTO_01" => "ENTO_01",
                    "no_of_premises" => $no_of_premises,
                    "no_of_premises_positive" => $no_of_premises_positive,
                    "poscx" => $poscx,
                    "total_time_spend" => $total_time_spend,
                    "mosquitodensity" => $mosquitodensity_row,
                    "total_mosquitos_collected" => $total_mosquitos_collected,
                    "no_of_dissected" => $no_of_dissected,
                    "total_postive_cx" => $total_postive_cx,
                    "infective" => $infective,
                    "infectedpercentage" => $infectedpercentage,
                    "infectivepercentage" => $infectivepercentage,
                );




                $name_of_heo = '';
                $moh_area = '';
                $phi_and_phm = '';
                $gn_divison = '';
                $no_of_premises = '';
                $no_of_premises_positive = '';
                $poscx = '';
                $total_time_spend = '';
                $mosquitodensity = '';
                $total_mosquitos_collected = '';
                $no_of_dissected = '';
                $total_postive_cx = '';
                $infective = "";
                $mq_postive_for_l3 = '';
                $infectedpercentage = '';
                $infectivepercentage = '';
                $no_of_dissected_al = "";
            }


            $total_result1 = array();
            foreach ($old_data_1 as $value) {
                $x = 0;
                $faind = 0;
                foreach ($total_result1 as $value2) {
                    if (array_search($value['name_of_heo'], $value2, true) and array_search($value['gn_divison'], $value2, true)) {
                        $total_result1[$x] = array(

                            "name_of_heo" => $value['name_of_heo'],
                            "moh_area" => $value['moh_area'],
                            "phi_and_phm" => $value['phi_and_phm'],
                            "gn_divison" => $value['gn_divison'],
                            "ENTO_01" => "ENTO_01",
                            "no_of_premises" => ($value['no_of_premises'] + $value2['no_of_premises']),
                            "no_of_premises_positive" => ($value['no_of_premises_positive'] + $value2['no_of_premises_positive']),
                            "poscx" => ($value['poscx'] + $value2['poscx']),
                            "total_time_spend" => ($value['total_time_spend'] + $value2['total_time_spend']),
                            "mosquitodensity" => (round((($value['total_mosquitos_collected'] + $value2['total_mosquitos_collected']) / ($value['total_time_spend'] + $value2['total_time_spend'])), 2)),
                            "total_mosquitos_collected" => ($value['total_mosquitos_collected'] + $value2['total_mosquitos_collected']),
                            "no_of_dissected" => ($value['no_of_dissected'] + $value2['no_of_dissected']),
                            "total_postive_cx" => ($value['total_postive_cx'] + $value2['total_postive_cx']),
                            "infective" => ($value['infective'] + $value2['infective']),
                            "infectedpercentage" => (round((($value['total_postive_cx'] + $value2['total_postive_cx']) / ($value['no_of_dissected'] + $value2['no_of_dissected'])) * 100, 2)),
                            "infectivepercentage" => (round(((($value['infective'] + $value2['infective']) / ($value['no_of_dissected'] + $value2['no_of_dissected'])) * 100), 2))
                        );






                        $faind = 1;
                    }
                    $x++;
                }
                if ($faind == 0) {
                    $total_result1[] = $value;
                }
            }
            foreach ($total_result1 as $total_result1_value2) {
                $tno_of_premises_positive = $total_result1_value2['no_of_premises_positive'];
                $tno_of_premises = $total_result1_value2['no_of_premises'];
                ////////////////////////////////////////////////////////////////
                if ($tno_of_premises == "" or $tno_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($tno_of_premises_positive / $tno_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }
                //////////////////////////////////////////////
                if (empty($total_result1_value2['no_of_dissected'])) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($total_result1_value2['total_postive_cx'] /  $total_result1_value2['no_of_dissected']) * 100;
                    $infectivepercentage = ($total_result1_value2['infective']  /  $total_result1_value2['no_of_dissected']) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                /////////////////////////////////////////////
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' .  $total_result1_value2['name_of_heo'] . '</td>' .
                    '<td>' .  $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' .  $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' .  $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>ENTO 01</td>' .
                    '<td>' .  $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' .  $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' .  $poscx . '</td>' .
                    '<td>' .  $total_result1_value2['total_time_spend'] . '</td>' .
                    '<td>' .  $total_result1_value2['mosquitodensity'] . '</td>' .
                    '<td>' .  $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td>' .  $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' .  $total_result1_value2['total_postive_cx']   . '</td>' ./* $infected */
                    '<td>' .  $total_result1_value2['infective'] . '</td>' .
                    '<td>' .  $total_result1_value2['infectedpercentage'] . '</td>' .
                    '<td>' .  $total_result1_value2['infectivepercentage'] . '</td>
</tr>';
            }


            // ENTO ONE 1   data get calculate




            // ENTO ONE 2   data get calculate
            $results = DB::select("
select  en2.heo, en2.moh_area,en2.moh_area,en2.gn_division,en2.total_cx_quin_mosq,en2.ento_02_id as ento_02_id,en5.ento_05_id as id
FROM ento_02 as en2
INNER JOIN ento_02_data as ento02data
ON ento02data.ento_02_id=en2.ento_02_id
INNER JOIN ento_05 as en5
ON en2.ento_02_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mos.species='Cx quin'
AND en2.district='" . $district . "' AND en2.date BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY en2.ento_02_id

");
            // WHERE mos.species2='CX' AND en1.district='".$district."' AND en1.date BETWEEN '".$from."' AND '".$to."'
            // GROUP BY en1.moh_area
            for ($i = 0; $i < count($results); $i++) {
                // this qure for get dessected form ento5 mos table
                $id  = $results[$i]->id;
                $results_2 = DB::select("  SELECT  SUM(no_of_dissected) as no_of_dissected_al  from ento_05_mosq where ento_05_id=$id and    species='Cx quin' ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $no_of_dissected_al  = $results_2[$e]->no_of_dissected_al;
                }
                // this qure for get dessected form ento5 mos table
                $ento_02_id  = $results[$i]->ento_02_id;
                // $total_postive_cx = $results[$i]->positive_mosq;    replase this qure for this
                // $infective =$results[$i]->infective;
                $results_3 = DB::select(" SELECT COUNT(ento_02_id) as no_of_premises FROM ento_02_data WHERE ento_02_id=$ento_02_id ");
                for ($ee = 0; $ee < count($results_3); $ee++) {
                    $no_of_premises   = $results_3[$ee]->no_of_premises;
                }
                $results_33 = DB::select(" SELECT COUNT(ento_02_id) as no_of_premises_positive FROM ento_02_data WHERE ento_02_id=$ento_02_id and total_cx_quin > 0 ");
                for ($ee33 = 0; $ee33 < count($results_33); $ee33++) {
                    $no_of_premises_positive   = $results_33[$ee33]->no_of_premises_positive;
                }
                // get  all  infective and infecterd
                $results_4 = DB::select(" SELECT COUNT(id) as lab_positive FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='CX' ");
                for ($ee4 = 0; $ee4 < count($results_4); $ee4++) {
                    // $infective  = $results_3[$ee]->labno;
                    $total_postive_cx  = $results_4[$ee4]->lab_positive;
                }
                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective  = $results_6[$ee6]->labno;
                }
                $name_of_heo  = $results[$i]->heo;
                $moh_area  = $results[$i]->moh_area;
                $phi_and_phm  = "";
                $gn_divison  = $results[$i]->gn_division;
                // $no_of_premises  = $results[$i]->no_of_premises;
                // $no_of_premises_positive  = $results[$i]->no_of_premises_positive;
                $results_7 = DB::select(" SELECT COUNT(ento_02_id) as no_of_premises FROM ento_02_data WHERE ento_02_id=$ento_02_id ");
                for ($ee = 0; $ee < count($results_3); $ee++) {
                    $no_of_premises   = $results_3[$ee]->no_of_premises;
                }
                $total_mosquitos_collected = $results[$i]->total_cx_quin_mosq;
                //          get %+
                if ($no_of_premises == "" or $no_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($no_of_premises_positive / $no_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }
                $total_time_spend = 0;
                $mosquitodensity = 0;
                //        mosquito density
                // $total_mosquitos_collected =$results[$i]->total_cx_quin_mosq;
                $no_of_dissected = $no_of_dissected_al;
                if (empty($no_of_dissected)) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($total_postive_cx / $no_of_dissected) * 100;
                    $infectivepercentage = ($infective / $no_of_dissected) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                $total_no_of_premises = $total_no_of_premises + $no_of_premises;
                $total_no_of_premises_positive = $total_no_of_premises_positive + $no_of_premises_positive;
                $total_poscx = $total_poscx + $poscx;
                $total_total_time_spend = $total_total_time_spend + $total_time_spend;
                $total_mosquitodensity = $total_mosquitodensity + $mosquitodensity;
                $total_total_mosquitos_collected = $total_total_mosquitos_collected + $total_mosquitos_collected;
                $total_no_of_dissected = $total_no_of_dissected + $no_of_dissected;
                $total_total_postive_cx = $total_total_postive_cx + $total_postive_cx;
                $total_infective = $total_infective + $infective;
                $total_infectedpercentage = $total_infectedpercentage + $infectedpercentage;
                $total_infectivepercentage = $total_infectivepercentage + $infectivepercentage;
                // $viewData = $viewData .
                // '<tr>' .
                //     '<td>' . $name_of_heo . '</td>' .
                //     '<td>' . $moh_area . '</td>' .
                //     '<td>' . $phi_and_phm . '</td>' .
                //     '<td>' . $gn_divison . '</td>' .
                //     '<td>ENTO 02</td>' .
                //     '<td>' . $no_of_premises . '</td>' .
                //     '<td>' . $no_of_premises_positive . '</td>' .
                //     '<td>' . $poscx . '</td>' .
                //     '<td>' . $total_time_spend . '</td>' .
                //     '<td>' . $mosquitodensity . '</td>' .
                //     '<td>' . $total_mosquitos_collected . '</td>' .
                //     '<td>' . $no_of_dissected . '</td>' .
                //     '<td>' . $total_postive_cx   . '</td>' ./* $infected */
                //     '<td>' . $infective . '</td>' .
                //     '<td>' . $infectedpercentage . '</td>' .
                //     '<td>' . $infectivepercentage . '</td>
                // </tr>';




                $old_data_2[] = array(
                    "name_of_heo" => $name_of_heo,
                    "moh_area" => $moh_area,
                    "phi_and_phm" => $phi_and_phm,
                    "gn_divison" => $gn_divison,
                    "ENTO_01" => "ENTO_01",
                    "no_of_premises" => $no_of_premises,
                    "no_of_premises_positive" => $no_of_premises_positive,
                    "poscx" => $poscx,
                    "total_time_spend" => $total_time_spend,
                    "mosquitodensity" => $mosquitodensity,
                    "total_mosquitos_collected" => $total_mosquitos_collected,
                    "no_of_dissected" => $no_of_dissected,
                    "total_postive_cx" => $total_postive_cx,
                    "infective" => $infective,
                    "infectedpercentage" => $infectedpercentage,
                    "infectivepercentage" => $infectivepercentage,
                );










                $name_of_heo = '';
                $moh_area = '';
                $phi_and_phm = '';
                $gn_divison = '';
                $no_of_premises = '';
                $no_of_premises_positive = '';
                $poscx = '';
                $total_time_spend = '';
                $mosquitodensity = '';
                $total_mosquitos_collected = '';
                $no_of_dissected = '';
                $total_postive_cx = '';
                $infective = "";
                $mq_postive_for_l3 = '';
                $infectedpercentage = '';
                $infectivepercentage = '';
                $no_of_dissected_al = "";
            }









            $total_result1 = array();
            foreach ($old_data_2 as $value_2) {
                $x = 0;
                $faind = 0;
                foreach ($total_result1 as $value3) {
                    if (array_search($value_2['name_of_heo'], $value3, true) and array_search($value_2['gn_divison'], $value3, true)) {
                        $total_result1[$x] = array(

                            "name_of_heo" => $value_2['name_of_heo'],
                            "moh_area" => $value_2['moh_area'],
                            "phi_and_phm" => $value_2['phi_and_phm'],
                            "gn_divison" => $value_2['gn_divison'],
                            "ENTO_01" => "ENTO_01",
                            "no_of_premises" => ($value_2['no_of_premises'] + $value3['no_of_premises']),
                            "no_of_premises_positive" => ($value_2['no_of_premises_positive'] + $value3['no_of_premises_positive']),
                            "poscx" => ($value_2['poscx'] + $value3['poscx']),
                            "total_time_spend" => ($value_2['total_time_spend'] + $value3['total_time_spend']),
                            "mosquitodensity" => ($value_2['mosquitodensity'] + $value3['mosquitodensity']),
                            "total_mosquitos_collected" => ($value_2['total_mosquitos_collected'] + $value3['total_mosquitos_collected']),
                            "no_of_dissected" => ($value_2['no_of_dissected'] + $value3['no_of_dissected']),
                            "total_postive_cx" => ($value_2['total_postive_cx'] + $value3['total_postive_cx']),
                            "infective" => ($value_2['infective'] + $value3['infective']),
                            "infectedpercentage" => ($value_2['infectedpercentage'] + $value3['infectedpercentage']),
                            "infectivepercentage" => ($value_2['infectivepercentage'] + $value3['infectivepercentage'])
                        );

                        $faind = 1;
                    }
                    $x++;
                }
                if ($faind == 0) {
                    $total_result1[] = $value_2;
                }
            }
            foreach ($total_result1 as $total_result1_value2) {
                $tno_of_premises_positive = $total_result1_value2['no_of_premises_positive'];
                $tno_of_premises = $total_result1_value2['no_of_premises'];
                ////////////////////////////////////////////////////////////////
                if ($tno_of_premises == "" or $tno_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($tno_of_premises_positive / $tno_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }
                //////////////////////////////////////////////
                if (empty($total_result1_value2['no_of_dissected'])) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($total_result1_value2['total_postive_cx'] /  $total_result1_value2['no_of_dissected']) * 100;
                    $infectivepercentage = ($total_result1_value2['infective']  /  $total_result1_value2['no_of_dissected']) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                /////////////////////////////////////////////
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' .  $total_result1_value2['name_of_heo'] . '</td>' .
                    '<td>' .  $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' .  $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' .  $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>ENTO 02</td>' .
                    '<td>' .  $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' .  $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' .  $poscx . '</td>' .
                    '<td>' .  $total_result1_value2['total_time_spend'] . '</td>' .
                    '<td>' .  $total_result1_value2['mosquitodensity'] . '</td>' .
                    '<td>' .  $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td>' .  $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' .  $total_result1_value2['total_postive_cx']   . '</td>' ./* $infected */
                    '<td>' .  $total_result1_value2['infective'] . '</td>' .
                    '<td>' .  $total_result1_value2['infectedpercentage'] . '</td>' .
                    '<td>' .  $total_result1_value2['infectivepercentage'] . '</td>
</tr>';
            }


            // ENTO ONE 2   data get calculate








            // ENTO ONE 3   data get calculate
            $results = DB::select("
select   en3.moh,en3.gn,en3.total_no_of_mosq,en3.ento_03_id as ento_03_id,en5.ento_05_id as id
FROM ento_03 as en3
INNER JOIN ento_03_data as ento03data
ON ento03data.ento_03_id=en3.ento_03_id
INNER JOIN ento_05 as en5
ON en3.ento_03_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mos.species='Cx quin'
AND en3.district='" . $district . "' AND en3.date_of_collection BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY en3.ento_03_id


");
            // WHERE mos.species2='CX' AND en1.district='".$district."' AND en1.date BETWEEN '".$from."' AND '".$to."'
            // GROUP BY en1.moh_area
            for ($i = 0; $i < count($results); $i++) {
                // this qure for get dessected form ento5 mos table
                $id  = $results[$i]->id;
                $results_2 = DB::select("  SELECT  SUM(no_of_dissected) as no_of_dissected_al  from ento_05_mosq where ento_05_id=$id and    species='Cx quin' ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $no_of_dissected_al  = $results_2[$e]->no_of_dissected_al;
                }
                // this qure for get dessected form ento5 mos table
                $ento_02_id  = $results[$i]->ento_03_id;
                // $total_postive_cx = $results[$i]->positive_mosq;    replase this qure for this
                // $infective =$results[$i]->infective;
                $no_of_premises_positive   = "-";
                // get  all  infective and infecterd
                $results_4 = DB::select(" SELECT COUNT(id) as lab_positive FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='CX' ");
                for ($ee4 = 0; $ee4 < count($results_4); $ee4++) {
                    // $infective  = $results_3[$ee]->labno;
                    $total_postive_cx  = $results_4[$ee4]->lab_positive;
                }

                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective  = $results_6[$ee6]->labno;
                }
                // $name_of_heo  = $results[$i]->heo;
                $name_of_heo  = "";
                $moh_area  = $results[$i]->moh;
                $phi_and_phm  = "";
                $gn_divison  = $results[$i]->gn;
                // $no_of_premises  = $results[$i]->no_of_premises;
                // $no_of_premises_positive  = $results[$i]->no_of_premises_positive;
                $no_of_premises   = "-";
                $total_mosquitos_collected = $results[$i]->total_no_of_mosq;
                //          get %+
                if ($no_of_premises == "" or $no_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($no_of_premises_positive / $no_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }
                $total_time_spend = 0;
                $mosquitodensity = 0;
                //        mosquito density
                // $total_mosquitos_collected =$results[$i]->total_cx_quin_mosq;
                $no_of_dissected = $no_of_dissected_al;
                if (empty($no_of_dissected)) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($total_postive_cx / $no_of_dissected) * 100;
                    $infectivepercentage = ($infective / $no_of_dissected) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                $total_no_of_premises = $total_no_of_premises + $no_of_premises;
                $total_no_of_premises_positive = $total_no_of_premises_positive + $no_of_premises_positive;
                $total_poscx = $total_poscx + $poscx;
                $total_total_time_spend = $total_total_time_spend + $total_time_spend;
                $total_mosquitodensity = $total_mosquitodensity + $mosquitodensity;
                $total_total_mosquitos_collected = $total_total_mosquitos_collected + $total_mosquitos_collected;
                $total_no_of_dissected = $total_no_of_dissected + $no_of_dissected;
                $total_total_postive_cx = $total_total_postive_cx + $total_postive_cx;
                $total_infective = $total_infective + $infective;
                $total_infectedpercentage = $total_infectedpercentage + $infectedpercentage;
                $total_infectivepercentage = $total_infectivepercentage + $infectivepercentage;
                // $viewData = $viewData .
                // '<tr>' .
                //     '<td>' . $name_of_heo . '</td>' .
                //     '<td>' . $moh_area . '</td>' .
                //     '<td>' . $phi_and_phm . '</td>' .
                //     '<td>' . $gn_divison . '</td>' .
                //     '<td>ENTO 03</td>' .
                //     '<td>' . $no_of_premises . '</td>' .
                //     '<td>' . $no_of_premises_positive . '</td>' .
                //     '<td>' . $poscx . '</td>' .
                //     '<td>' . $total_time_spend . '</td>' .
                //     '<td>' . $mosquitodensity . '</td>' .
                //     '<td>' . $total_mosquitos_collected . '</td>' .
                //     '<td>' . $no_of_dissected . '</td>' .
                //     '<td>' . $total_postive_cx   . '</td>' ./* $infected */
                //     '<td>' . $infective . '</td>' .
                //     '<td>' . $infectedpercentage . '</td>' .
                //     '<td>' . $infectivepercentage . '</td>
                // </tr>';





                $old_data_3[] = array(
                    "name_of_heo" => $name_of_heo,
                    "moh_area" => $moh_area,
                    "phi_and_phm" => $phi_and_phm,
                    "gn_divison" => $gn_divison,
                    "ENTO_01" => "ENTO_01",
                    "no_of_premises" => $no_of_premises,
                    "no_of_premises_positive" => $no_of_premises_positive,
                    "poscx" => $poscx,
                    "total_time_spend" => $total_time_spend,
                    "mosquitodensity" => $mosquitodensity,
                    "total_mosquitos_collected" => $total_mosquitos_collected,
                    "no_of_dissected" => $no_of_dissected,
                    "total_postive_cx" => $total_postive_cx,
                    "infective" => $infective,
                    "infectedpercentage" => $infectedpercentage,
                    "infectivepercentage" => $infectivepercentage,
                );



                $name_of_heo = '';
                $moh_area = '';
                $phi_and_phm = '';
                $gn_divison = '';
                $no_of_premises = '';
                $no_of_premises_positive = '';
                $poscx = '';
                $total_time_spend = '';
                $mosquitodensity = '';
                $total_mosquitos_collected = '';
                $no_of_dissected = '';
                $total_postive_cx = '';
                $infective = "";
                $mq_postive_for_l3 = '';
                $infectedpercentage = '';
                $infectivepercentage = '';
                $no_of_dissected_al = "";
            }




            $total_result1 = array();
            foreach ($old_data_3 as $value_3) {
                $x = 0;
                $faind = 0;
                foreach ($total_result1 as $value4) {
                    if (array_search($value_3['name_of_heo'], $value4, true) and array_search($value_3['gn_divison'], $value4, true)) {
                        $total_result1[$x] = array(

                            "name_of_heo" => $value_3['name_of_heo'],
                            "moh_area" => $value_3['moh_area'],
                            "phi_and_phm" => $value_3['phi_and_phm'],
                            "gn_divison" => $value_3['gn_divison'],
                            "ENTO_01" => "ENTO_01",
                            "no_of_premises" => ($value_3['no_of_premises'] + $value4['no_of_premises']),
                            "no_of_premises_positive" => ($value_3['no_of_premises_positive'] + $value4['no_of_premises_positive']),
                            "poscx" => ($value_3['poscx'] + $value4['poscx']),
                            "total_time_spend" => ($value_3['total_time_spend'] + $value4['total_time_spend']),
                            "mosquitodensity" => ($value_3['mosquitodensity'] + $value4['mosquitodensity']),
                            "total_mosquitos_collected" => ($value_3['total_mosquitos_collected'] + $value4['total_mosquitos_collected']),
                            "no_of_dissected" => ($value_3['no_of_dissected'] + $value4['no_of_dissected']),
                            "total_postive_cx" => ($value_3['total_postive_cx'] + $value4['total_postive_cx']),
                            "infective" => ($value_3['infective'] + $value4['infective']),
                            "infectedpercentage" => ($value_3['infectedpercentage'] + $value4['infectedpercentage']),
                            "infectivepercentage" => ($value_3['infectivepercentage'] + $value4['infectivepercentage'])
                        );

                        $faind = 1;
                    }
                    $x++;
                }
                if ($faind == 0) {
                    $total_result1[] = $value_3;
                }
            }
            foreach ($total_result1 as $total_result1_value2) {
                $tno_of_premises_positive = $total_result1_value2['no_of_premises_positive'];
                $tno_of_premises = $total_result1_value2['no_of_premises'];
                ////////////////////////////////////////////////////////////////
                if ($tno_of_premises == "" or $tno_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($tno_of_premises_positive / $tno_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }
                //////////////////////////////////////////////
                if (empty($total_result1_value2['no_of_dissected'])) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($total_result1_value2['total_postive_cx'] /  $total_result1_value2['no_of_dissected']) * 100;
                    $infectivepercentage = ($total_result1_value2['infective']  /  $total_result1_value2['no_of_dissected']) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                /////////////////////////////////////////////
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' .  $total_result1_value2['name_of_heo'] . '</td>' .
                    '<td>' .  $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' .  $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' .  $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>ENTO 03</td>' .
                    '<td>' .  $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' .  $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' .  $poscx . '</td>' .
                    '<td>' .  $total_result1_value2['total_time_spend'] . '</td>' .
                    '<td>' .  $total_result1_value2['mosquitodensity'] . '</td>' .
                    '<td>' .  $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td>' .  $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' .  $total_result1_value2['total_postive_cx']   . '</td>' ./* $infected */
                    '<td>' .  $total_result1_value2['infective'] . '</td>' .
                    '<td>' .  $total_result1_value2['infectedpercentage'] . '</td>' .
                    '<td>' .  $total_result1_value2['infectivepercentage'] . '</td>
</tr>';
            }

















            // ENTO ONE 3   data get calculate

            $culex_total = 0;                                                     // ENTO ONE 4   data get calculate
            $results = DB::select("select en3.moh,en3.gn_division,en3.ento_04_id as ento_04_id,en5.ento_05_id as id
FROM ento_04 as en3
INNER JOIN ento_05 as en5
ON en3.ento_04_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mos.species='Cx quin'
AND en3.district='" . $district . "' AND en3.date_of_collection BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY en3.ento_04_id");
            // WHERE mos.species2='CX' AND en1.district='".$district."' AND en1.date BETWEEN '".$from."' AND '".$to."'
            // GROUP BY en1.moh_area
            for ($i = 0; $i < count($results); $i++) {
                // this qure for get dessected form ento5 mos table
                $id  = $results[$i]->id;
                $results_2 = DB::select("  SELECT  SUM(no_of_dissected) as no_of_dissected_al  from ento_05_mosq where ento_05_id=$id and  species='Cx quin' ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $no_of_dissected_al  = $results_2[$e]->no_of_dissected_al;
                }
                // this qure for get dessected form ento5 mos table
                $ento_04_id  = $results[$i]->ento_04_id;
                // $total_postive_cx = $results[$i]->positive_mosq;    replase this qure for this
                // $infective =$results[$i]->infective;
                $no_of_premises_positive   = "-";
                // get  all  infective and infecterd
                $results_4 = DB::select(" SELECT COUNT(id) as lab_positive FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='CX' ");
                for ($ee4 = 0; $ee4 < count($results_4); $ee4++) {
                    // $infective  = $results_3[$ee]->labno;
                    $total_postive_cx  = $results_4[$ee4]->lab_positive;
                }

                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");

                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective  = $results_6[$ee6]->labno;
                }
                // $name_of_heo  = $results[$i]->heo;
                $name_of_heo  = "";
                $moh_area  = $results[$i]->moh;
                $phi_and_phm  = "";
                $gn_divison  = $results[$i]->gn_division;
                // $no_of_premises  = $results[$i]->no_of_premises;
                // $no_of_premises_positive  = $results[$i]->no_of_premises_positive;
                $no_of_premises   = "-";
                // $total_mosquitos_collected=$results[$i]->total_no_of_mosq;
                // get total mosq from ento 4 ento indoor ento 5 out door
                // $ento_04_id
                $culex_total = 0;
                $list1 = DB::table("ento_04")
                    ->join('ento_04_indoor', 'ento_04.ento_04_id', '=', 'ento_04_indoor.ento_04_id')
                    ->join('ento_04_mosq', 'ento_04_indoor.id', '=', 'ento_04_mosq.ento_04_id')
                    ->where('ento_04.ento_04_id', $ento_04_id)
                    ->where('ento_04_mosq.mosq_species', 'like', 'Culex%')
                    ->SUM('ento_04_mosq.mos_number');
                $culex_total = $culex_total + $list1;
                // outdoor culex total
                $list3 = DB::table("ento_04")
                    ->join('ento_04_outdoor', 'ento_04.ento_04_id', '=', 'ento_04_outdoor.ento_04_id')
                    ->join('ento_04_mosq', 'ento_04_outdoor.id', '=', 'ento_04_mosq.ento_04_id')
                    ->where('ento_04.ento_04_id', $ento_04_id)
                    ->where('ento_04_mosq.mosq_species', 'like', 'Culex%')
                    ->SUM('ento_04_mosq.mos_number');
                $culex_total = $culex_total + $list3;
                // get total mosq from ento 4 ento indoor ento 5 out door
                $total_mosquitos_collected = $culex_total;
                //          get %+
                if ($no_of_premises == "" or $no_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($no_of_premises_positive / $no_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }
                $total_time_spend = 0;
                $mosquitodensity = 0;
                //        mosquito density
                // $total_mosquitos_collected =$results[$i]->total_cx_quin_mosq;
                $no_of_dissected = $no_of_dissected_al;
                if (empty($no_of_dissected)) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($total_postive_cx / $no_of_dissected) * 100;
                    $infectivepercentage = ($infective / $no_of_dissected) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                $total_no_of_premises = $total_no_of_premises + $no_of_premises;
                $total_no_of_premises_positive = $total_no_of_premises_positive + $no_of_premises_positive;
                $total_poscx = $total_poscx + $poscx;
                $total_total_time_spend = $total_total_time_spend + $total_time_spend;
                $total_mosquitodensity = $total_mosquitodensity + $mosquitodensity;
                $total_total_mosquitos_collected = $total_total_mosquitos_collected + $total_mosquitos_collected;
                $total_no_of_dissected = $total_no_of_dissected + $no_of_dissected;
                $total_total_postive_cx = $total_total_postive_cx + $total_postive_cx;
                $total_infective = $total_infective + $infective;
                $total_infectedpercentage = $total_infectedpercentage + $infectedpercentage;
                $total_infectivepercentage = $total_infectivepercentage + $infectivepercentage;
                // $viewData = $viewData .
                // '<tr>' .
                //     '<td>' . $name_of_heo . '</td>' .
                //     '<td>' . $moh_area . '</td>' .
                //     '<td>' . $phi_and_phm . '</td>' .
                //     '<td>' . $gn_divison . '</td>' .
                //     '<td>ENTO 04 </td>' .
                //     '<td>' . $no_of_premises . '</td>' .
                //     '<td>' . $no_of_premises_positive . '</td>' .
                //     '<td>' . $poscx . '</td>' .
                //     '<td>' . $total_time_spend . '</td>' .
                //     '<td>' . $mosquitodensity . '</td>' .
                //     '<td>' . $total_mosquitos_collected . '</td>' .
                //     '<td>' . $no_of_dissected . '</td>' .
                //     '<td>' . $total_postive_cx   . '</td>' ./* $infected */
                //     '<td>' . $infective . '</td>' .
                //     '<td>' . $infectedpercentage . '</td>' .
                //     '<td>' . $infectivepercentage . '</td>
                // </tr>';

                $old_data_4[] = array(
                    "name_of_heo" => $name_of_heo,
                    "moh_area" => $moh_area,
                    "phi_and_phm" => $phi_and_phm,
                    "gn_divison" => $gn_divison,
                    "ENTO_01" => "ENTO_01",
                    "no_of_premises" => $no_of_premises,
                    "no_of_premises_positive" => $no_of_premises_positive,
                    "poscx" => $poscx,
                    "total_time_spend" => $total_time_spend,
                    "mosquitodensity" => $mosquitodensity,
                    "total_mosquitos_collected" => $total_mosquitos_collected,
                    "no_of_dissected" => $no_of_dissected,
                    "total_postive_cx" => $total_postive_cx,
                    "infective" => $infective,
                    "infectedpercentage" => $infectedpercentage,
                    "infectivepercentage" => $infectivepercentage,
                );





                $name_of_heo = '';
                $moh_area = '';
                $phi_and_phm = '';
                $gn_divison = '';
                $no_of_premises = '';
                $no_of_premises_positive = '';
                $poscx = '';
                $total_time_spend = '';
                $mosquitodensity = '';
                $total_mosquitos_collected = '';
                $no_of_dissected = '';
                $total_postive_cx = '';
                $infective = "";
                $mq_postive_for_l3 = '';
                $infectedpercentage = '';
                $infectivepercentage = '';
                $no_of_dissected_al = "";
            }



            $total_result1 = array();
            foreach ($old_data_4 as $value_4) {
                $x = 0;
                $faind = 0;
                foreach ($total_result1 as $value5) {
                    if (array_search($value_4['name_of_heo'], $value5, true) and array_search($value_4['gn_divison'], $value5, true)) {
                        $total_result1[$x] = array(

                            "name_of_heo" => $value_4['name_of_heo'],
                            "moh_area" => $value_4['moh_area'],
                            "phi_and_phm" => $value_4['phi_and_phm'],
                            "gn_divison" => $value_4['gn_divison'],
                            "ENTO_01" => "ENTO_01",
                            "no_of_premises" => ($value_4['no_of_premises'] + $value5['no_of_premises']),
                            "no_of_premises_positive" => ($value_4['no_of_premises_positive'] + $value5['no_of_premises_positive']),
                            "poscx" => ($value_4['poscx'] + $value5['poscx']),
                            "total_time_spend" => ($value_4['total_time_spend'] + $value5['total_time_spend']),
                            "mosquitodensity" => ($value_4['mosquitodensity'] + $value5['mosquitodensity']),
                            "total_mosquitos_collected" => ($value_4['total_mosquitos_collected'] + $value5['total_mosquitos_collected']),
                            "no_of_dissected" => ($value_4['no_of_dissected'] + $value5['no_of_dissected']),
                            "total_postive_cx" => ($value_4['total_postive_cx'] + $value5['total_postive_cx']),
                            "infective" => ($value_4['infective'] + $value5['infective']),
                            "infectedpercentage" => ($value_4['infectedpercentage'] + $value5['infectedpercentage']),
                            "infectivepercentage" => ($value_4['infectivepercentage'] + $value5['infectivepercentage'])
                        );

                        $faind = 1;
                    }
                    $x++;
                }
                if ($faind == 0) {
                    $total_result1[] = $value_4;
                }
            }
            foreach ($total_result1 as $total_result1_value2) {
                $tno_of_premises_positive = $total_result1_value2['no_of_premises_positive'];
                $tno_of_premises = $total_result1_value2['no_of_premises'];
                ////////////////////////////////////////////////////////////////
                if ($tno_of_premises == "" or $tno_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($tno_of_premises_positive / $tno_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }
                //////////////////////////////////////////////
                if (empty($total_result1_value2['no_of_dissected'])) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($total_result1_value2['total_postive_cx'] /  $total_result1_value2['no_of_dissected']) * 100;
                    $infectivepercentage = ($total_result1_value2['infective']  /  $total_result1_value2['no_of_dissected']) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                /////////////////////////////////////////////
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' .  $total_result1_value2['name_of_heo'] . '</td>' .
                    '<td>' .  $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' .  $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' .  $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>ENTO 04</td>' .
                    '<td>' .  $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' .  $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' .  $poscx . '</td>' .
                    '<td>' .  $total_result1_value2['total_time_spend'] . '</td>' .
                    '<td>' .  $total_result1_value2['mosquitodensity'] . '</td>' .
                    '<td>' .  $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td>' .  $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' .  $total_result1_value2['total_postive_cx']   . '</td>' ./* $infected */
                    '<td>' .  $total_result1_value2['infective'] . '</td>' .
                    '<td>' .  $total_result1_value2['infectedpercentage'] . '</td>' .
                    '<td>' .  $total_result1_value2['infectivepercentage'] . '</td>
</tr>';
            }



            if ($total_no_of_premises) {
                if ($total_no_of_dissected != 0) {
                    $total_infective_t = round((($total_total_postive_cx / $total_no_of_dissected) * 100), 2);
                    $total_infected = round((($total_infective / $total_no_of_dissected) * 100), 2);
                } else {
                    $total_infective_t = 0;
                    $total_infected = 0;
                }


                $viewData = $viewData .
                    '<tr>' .
                    '<td>Total</td>' .
                    '<td></td>' .
                    '<td></td>' .
                    '<td></td>' .
                    '<td> </td>' .
                    '<td>' . $total_no_of_premises . '</td>' .
                    '<td>' . $total_no_of_premises_positive . '</td>' .
                    '<td>' . round((($total_no_of_premises_positive / $total_no_of_premises) * 100), 2) . '</td>' .   // round((($total_no_of_premises_positive / $total_no_of_premises) * 100)/$total_no_of_collectors,2)           
                    '<td>' . $total_total_time_spend . '</td>' .
                    '<td>' . round((($total_total_mosquitos_collected / $total_total_time_spend)), 2) . '</td>' .
                    '<td>' . $total_total_mosquitos_collected . '</td>' .
                    '<td>' . $total_no_of_dissected . '</td>' .
                    '<td>' . $total_total_postive_cx   . '</td>' ./* $infected */
                    '<td>' . $total_infective . '</td>' .
                    '<td>' . $total_infective_t . '</td>' .
                    '<td>' . $total_infected . '</td>
</tr>';
            }
            // ENTO ONE 4   data get calculate
            $content = ob_get_clean();
            // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
            // File::requireOnce($html2pdf_path);
            $template = view(
                'report/b1_view',
                compact('data'),
                ["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
            );
            try {
                $html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
                $html2pdf->pdf->SetTitle('B 1 Report');
                $html2pdf->WriteHTML($template);
                $html2pdf->Output('b1_report.pdf');
                ob_flush();
                ob_end_clean();
            } catch (HTML2PDF_exception $e) {
                echo $e;
                exit;
            }
            return view(
                'report/b1_view',
                compact('data'),
                ["dataView" => $viewData, 'district' => $data['district']]
            );
        } else {


            $total_no_of_premises = 0;
            $total_no_of_premises_positive = 0;
            $total_poscx = 0;
            $total_total_time_spend = 0;
            $total_mosquitodensity = 0;
            $total_total_mosquitos_collected = 0;
            $total_no_of_dissected = 0;
            $total_total_postive_cx = 0;
            $total_infective = 0;
            $total_infectedpercentage = 0;
            $total_infectivepercentage = 0;

            $no_of_collectors = 0;
            $total_no_of_collectors = 0;
            // $data =$request->all();
            // $from = $data['from'];
            // $to = $data['to'];
            // $district=$data['district'];

            $name_of_heo = '';
            $moh_area = '';
            $phi_and_phm = '';
            $gn_divison = '';
            $no_of_premises = '';
            $no_of_premises_positive = '';
            $poscx = '';
            $total_time_spend = '';
            $mosquitodensity = '';
            $total_mosquitos_collected = '';
            $no_of_dissected = '';
            $total_postive_cx = '';
            $mq_postive_for_l3 = '';
            $infectedpercentage = '';
            $infectivepercentage = '';
            $viewData = "";
            $results = DB::select("
select  en1.no_of_collectors, en1.mansonia_spcies_of_mosquitos_collected ,en1.mansonia_species_of_positive, en1.name_of_heo, en1.moh_area,en1.phi_and_phm,en1.gn_divison,en1.total_mosquitos_collected,en5.ento_05_id as id,en1.ento_01_id as ento1id,
en1.no_of_premises ,en1.no_of_premises_positive as no_of_premises_positive ,en1.total_time_spend as total_time_spend
FROM ento_01 as en1
INNER JOIN ento_01_data as ento01data
ON ento01data.ento_01_id=en1.ento_01_id
INNER JOIN ento_05 as en5
ON en1.ento_01_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew 
ON en5.ento_05_id=mosnew.ento_05_id 
WHERE mos.species='Mansonia'
AND en1.district='" . $district . "' AND en1.date BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY en1.ento_01_id ");

            for ($i = 0; $i < count($results); $i++) {
                // this qure for get dessected form ento5 mos table
                $id  = $results[$i]->id;
                $results_2 = DB::select("  SELECT  SUM(no_of_dissected) as no_of_dissected_al  from ento_05_mosq where ento_05_id=$id and    species='Mansonia' ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $no_of_dissected_al  = $results_2[$e]->no_of_dissected_al;
                }
                // this qure for get dessected form ento5 mos table
                $ento1id_id  = $results[$i]->ento1id;
                // $total_postive_cx = $results[$i]->positive_mosq;    replase this qure for this
                // $infective =$results[$i]->infective;
                $results_3 = DB::select(" SELECT SUM(lab_no) as labno ,SUM(lab_positive) as lab_positive FROM ento_01_data WHERE ento_01_id=$ento1id_id ");
                for ($ee = 0; $ee < count($results_3); $ee++) {
                    $infective  = $results_3[$ee]->labno;
                    // $total_postive_cx  = $results_3[$ee]->lab_positive;
                }
                // get  all  infective and infecterd
                $results_4 = DB::select(" SELECT COUNT(id) as lab_positive FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' ");
                for ($ee4 = 0; $ee4 < count($results_4); $ee4++) {
                    // $infective  = $results_3[$ee]->labno;
                    $total_postive_cx  = $results_4[$ee4]->lab_positive;
                }
                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    $infective  = $results_6[$ee6]->labno;
                }
                $name_of_heo  = $results[$i]->name_of_heo;
                $moh_area  = $results[$i]->moh_area;
                $phi_and_phm  = $results[$i]->phi_and_phm;
                $gn_divison  = $results[$i]->gn_divison;
                $no_of_premises  = $results[$i]->no_of_premises;

                $no_of_collectors  = $results[$i]->no_of_collectors;
                $total_no_of_collectors  = $total_no_of_collectors + $no_of_collectors;

                $no_of_premises_positive  = $results[$i]->mansonia_species_of_positive;
                $total_mosquitos_collected = $results[$i]->mansonia_spcies_of_mosquitos_collected;
                //          get %+
                if ($no_of_premises == "" or $no_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($no_of_premises_positive / $no_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }
                //          get %+
                $total_time_spend  = $results[$i]->total_time_spend;
                $total_time_spend = round($total_time_spend / 60, 2);;
                //        mosquito density
                if ($total_mosquitos_collected == "" or $total_mosquitos_collected == 0) {
                    $mosquitodensity = 0;
                } else {
                    $mosquitodensity =  $total_mosquitos_collected / $total_time_spend;
                    $mosquitodensity = round($mosquitodensity, 2);
                }
                //        mosquito density
                // $total_mosquitos_collected =$results[$i]->total_cx_quin_mosq;
                $no_of_dissected = $no_of_dissected_al;
                if (empty($no_of_dissected)) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($total_postive_cx / $no_of_dissected) * 100;
                    $infectivepercentage = ($infective / $no_of_dissected) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                $total_no_of_premises = $total_no_of_premises + $no_of_premises;
                $total_no_of_premises_positive = $total_no_of_premises_positive + $no_of_premises_positive;
                $total_poscx = $total_poscx + $poscx;
                $total_total_time_spend = $total_total_time_spend + $total_time_spend;
                $total_mosquitodensity = $total_mosquitodensity + $mosquitodensity;
                $total_total_mosquitos_collected = $total_total_mosquitos_collected + $total_mosquitos_collected;
                $total_no_of_dissected = $total_no_of_dissected + $no_of_dissected;
                $total_total_postive_cx = $total_total_postive_cx + $total_postive_cx;
                $total_infective = $total_infective + $infective;
                $total_infectedpercentage = $total_infectedpercentage + $infectedpercentage;
                $total_infectivepercentage = $total_infectivepercentage + $infectivepercentage;
                // $viewData = $viewData .
                // '<tr>' .
                //     '<td>' . $name_of_heo . '</td>' .
                //     '<td>' . $moh_area . '</td>' .
                //     '<td>' . $phi_and_phm . '</td>' .
                //     '<td>' . $gn_divison . '</td>' .
                //     '<td>ENTO 01</td>' .
                //     '<td>' . $no_of_premises . '</td>' .
                //     '<td>' . $no_of_premises_positive . '</td>' .
                //     '<td>' . $poscx . '</td>' .
                //     '<td>' . $total_time_spend . '</td>' .
                //     '<td>' . $mosquitodensity . '</td>' .
                //     '<td>' . $total_mosquitos_collected . '</td>' .
                //     '<td>' . $no_of_dissected . '</td>' .
                //     '<td>' . $total_postive_cx   . '</td>' ./* $infected */
                //     '<td>' . $infective . '</td>' .
                //     '<td>' . $infectedpercentage . '</td>' .
                //     '<td>' . $infectivepercentage . '</td>
                // </tr>';


                $old_data_1[] = array(
                    "name_of_heo" => $name_of_heo,
                    "moh_area" => $moh_area,
                    "phi_and_phm" => $phi_and_phm,
                    "gn_divison" => $gn_divison,
                    "ENTO_01" => "ENTO_01",
                    "no_of_premises" => $no_of_premises,
                    "no_of_premises_positive" => $no_of_premises_positive,
                    "poscx" => $poscx,
                    "total_time_spend" => $total_time_spend,
                    "mosquitodensity" => $mosquitodensity,
                    "total_mosquitos_collected" => $total_mosquitos_collected,
                    "no_of_dissected" => $no_of_dissected,
                    "total_postive_cx" => $total_postive_cx,
                    "infective" => $infective,
                    "infectedpercentage" => $infectedpercentage,
                    "infectivepercentage" => $infectivepercentage,
                );








                $name_of_heo = '';
                $moh_area = '';
                $phi_and_phm = '';
                $gn_divison = '';
                $no_of_premises = '';
                $no_of_premises_positive = '';
                $poscx = '';
                $total_time_spend = '';
                $mosquitodensity = '';
                $total_mosquitos_collected = '';
                $no_of_dissected = '';
                $total_postive_cx = '';
                $infective = "";
                $mq_postive_for_l3 = '';
                $infectedpercentage = '';
                $infectivepercentage = '';
                $no_of_dissected_al = "";
            }



            $total_result1 = array();
            foreach ($old_data_1 as $value_1) {
                $x = 0;
                $faind = 0;
                foreach ($total_result1 as $value1) {
                    if (array_search($value_1['name_of_heo'], $value1, true) and array_search($value_1['gn_divison'], $value1, true)) {
                        $total_result1[$x] = array(

                            "name_of_heo" => $value_1['name_of_heo'],
                            "moh_area" => $value_1['moh_area'],
                            "phi_and_phm" => $value_1['phi_and_phm'],
                            "gn_divison" => $value_1['gn_divison'],
                            "ENTO_01" => "ENTO_01",
                            "no_of_premises" => ($value_1['no_of_premises'] + $value1['no_of_premises']),
                            "no_of_premises_positive" => ($value_1['no_of_premises_positive'] + $value1['no_of_premises_positive']),
                            "poscx" => ($value_1['poscx'] + $value1['poscx']),
                            "total_time_spend" => ($value_1['total_time_spend'] + $value1['total_time_spend']),
                            "mosquitodensity" => ($value_1['mosquitodensity'] + $value1['mosquitodensity']),
                            "total_mosquitos_collected" => ($value_1['total_mosquitos_collected'] + $value1['total_mosquitos_collected']),
                            "no_of_dissected" => ($value_1['no_of_dissected'] + $value1['no_of_dissected']),
                            "total_postive_cx" => ($value_1['total_postive_cx'] + $value1['total_postive_cx']),
                            "infective" => ($value_1['infective'] + $value1['infective']),
                            "infectedpercentage" => ($value_1['infectedpercentage'] + $value1['infectedpercentage']),
                            "infectivepercentage" => ($value_1['infectivepercentage'] + $value1['infectivepercentage'])
                        );

                        $faind = 1;
                    }
                    $x++;
                }
                if ($faind == 0) {
                    $total_result1[] = $value_1;
                }
            }
            foreach ($total_result1 as $total_result1_value2) {
                $tno_of_premises_positive = $total_result1_value2['no_of_premises_positive'];
                $tno_of_premises = $total_result1_value2['no_of_premises'];
                ////////////////////////////////////////////////////////////////
                if ($tno_of_premises == "" or $tno_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($tno_of_premises_positive / $tno_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }
                //////////////////////////////////////////////
                if (empty($total_result1_value2['no_of_dissected'])) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($total_result1_value2['total_postive_cx'] /  $total_result1_value2['no_of_dissected']) * 100;
                    $infectivepercentage = ($total_result1_value2['infective']  /  $total_result1_value2['no_of_dissected']) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                /////////////////////////////////////////////
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' .  $total_result1_value2['name_of_heo'] . '</td>' .
                    '<td>' .  $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' .  $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' .  $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>ENTO 01</td>' .
                    '<td>' .  $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' .  $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' .  $poscx . '</td>' .
                    '<td>' .  $total_result1_value2['total_time_spend'] . '</td>' .
                    '<td>' .  $total_result1_value2['mosquitodensity'] . '</td>' .
                    '<td>' .  $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td>' .  $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' .  $total_result1_value2['total_postive_cx']   . '</td>' ./* $infected */
                    '<td>' .  $total_result1_value2['infective'] . '</td>' .
                    '<td>' .  $total_result1_value2['infectedpercentage'] . '</td>' .
                    '<td>' .  $total_result1_value2['infectivepercentage'] . '</td>
</tr>';
            }

            // ENTO ` ONE 1   data get calculate




            // ENTO ONE 2   data get calculate
            $results = DB::select("
select  en2.heo, en2.moh_area,en2.moh_area,en2.gn_division,en2.total_cx_quin_mosq,en2.ento_02_id as ento_02_id,en5.ento_05_id as id
FROM ento_02 as en2
INNER JOIN ento_02_data as ento02data
ON ento02data.ento_02_id=en2.ento_02_id
INNER JOIN ento_05 as en5
ON en2.ento_02_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mos.species='Mansonia'
AND en2.district='" . $district . "' AND en2.date BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY en2.ento_02_id
");
            // WHERE mos.species2='CX' AND en1.district='".$district."' AND en1.date BETWEEN '".$from."' AND '".$to."'
            // GROUP BY en1.moh_area
            for ($i = 0; $i < count($results); $i++) {
                // this qure for get dessected form ento5 mos table
                $id  = $results[$i]->id;
                $results_2 = DB::select("  SELECT  SUM(no_of_dissected) as no_of_dissected_al  from ento_05_mosq where ento_05_id=$id and    species='Mansonia' ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $no_of_dissected_al  = $results_2[$e]->no_of_dissected_al;
                }
                // this qure for get dessected form ento5 mos table
                $ento_02_id  = $results[$i]->ento_02_id;
                // $total_postive_cx = $results[$i]->positive_mosq;    replase this qure for this
                // $infective =$results[$i]->infective;
                $results_3 = DB::select(" SELECT COUNT(ento_02_id) as no_of_premises FROM ento_02_data WHERE ento_02_id=$ento_02_id ");
                for ($ee = 0; $ee < count($results_3); $ee++) {
                    $no_of_premises   = $results_3[$ee]->no_of_premises;
                }
                $results_33 = DB::select(" SELECT COUNT(ento_02_id) as no_of_premises_positive FROM ento_02_data WHERE ento_02_id=$ento_02_id and total_cx_quin > 0 ");
                for ($ee33 = 0; $ee33 < count($results_33); $ee33++) {
                    $no_of_premises_positive   = $results_33[$ee33]->no_of_premises_positive;
                }
                // get  all  infective and infecterd
                $results_4 = DB::select(" SELECT COUNT(id) as lab_positive FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' ");
                for ($ee4 = 0; $ee4 < count($results_4); $ee4++) {
                    // $infective  = $results_3[$ee]->labno;
                    $total_postive_cx  = $results_4[$ee4]->lab_positive;
                }
                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective  = $results_6[$ee6]->labno;
                }
                $name_of_heo  = $results[$i]->heo;
                $moh_area  = $results[$i]->moh_area;
                $phi_and_phm  = "";
                $gn_divison  = $results[$i]->gn_division;
                // $no_of_premises  = $results[$i]->no_of_premises;
                // $no_of_premises_positive  = $results[$i]->no_of_premises_positive;
                $results_7 = DB::select(" SELECT COUNT(ento_02_id) as no_of_premises FROM ento_02_data WHERE ento_02_id=$ento_02_id ");
                for ($ee = 0; $ee < count($results_3); $ee++) {
                    $no_of_premises   = $results_3[$ee]->no_of_premises;
                }
                $total_mosquitos_collected = $results[$i]->total_cx_quin_mosq;
                //          get %+
                if ($no_of_premises == "" or $no_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($no_of_premises_positive / $no_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }
                $total_time_spend = 0;
                $mosquitodensity = 0;
                //        mosquito density
                // $total_mosquitos_collected =$results[$i]->total_cx_quin_mosq;
                $no_of_dissected = $no_of_dissected_al;
                if (empty($no_of_dissected)) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($total_postive_cx / $no_of_dissected) * 100;
                    $infectivepercentage = ($infective / $no_of_dissected) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                $total_no_of_premises = $total_no_of_premises + $no_of_premises;
                $total_no_of_premises_positive = $total_no_of_premises_positive + $no_of_premises_positive;
                $total_poscx = $total_poscx + $poscx;
                $total_total_time_spend = $total_total_time_spend + $total_time_spend;
                $total_mosquitodensity = $total_mosquitodensity + $mosquitodensity;
                $total_total_mosquitos_collected = $total_total_mosquitos_collected + $total_mosquitos_collected;
                $total_no_of_dissected = $total_no_of_dissected + $no_of_dissected;
                $total_total_postive_cx = $total_total_postive_cx + $total_postive_cx;
                $total_infective = $total_infective + $infective;
                $total_infectedpercentage = $total_infectedpercentage + $infectedpercentage;
                $total_infectivepercentage = $total_infectivepercentage + $infectivepercentage;
                // $viewData = $viewData .
                // '<tr>' .
                //     '<td>' . $name_of_heo . '</td>' .
                //     '<td>' . $moh_area . '</td>' .
                //     '<td>' . $phi_and_phm . '</td>' .
                //     '<td>' . $gn_divison . '</td>' .
                //     '<td>ENTO 02</td>' .
                //     '<td>' . $no_of_premises . '</td>' .
                //     '<td>' . $no_of_premises_positive . '</td>' .
                //     '<td>' . $poscx . '</td>' .
                //     '<td>' . $total_time_spend . '</td>' .
                //     '<td>' . $mosquitodensity . '</td>' .
                //     '<td>' . $total_mosquitos_collected . '</td>' .
                //     '<td>' . $no_of_dissected . '</td>' .
                //     '<td>' . $total_postive_cx   . '</td>' ./* $infected */
                //     '<td>' . $infective . '</td>' .
                //     '<td>' . $infectedpercentage . '</td>' .
                //     '<td>' . $infectivepercentage . '</td>
                // </tr>';

                $old_data_2[] = array(
                    "name_of_heo" => $name_of_heo,
                    "moh_area" => $moh_area,
                    "phi_and_phm" => $phi_and_phm,
                    "gn_divison" => $gn_divison,
                    "ENTO_01" => "ENTO_02",
                    "no_of_premises" => $no_of_premises,
                    "no_of_premises_positive" => $no_of_premises_positive,
                    "poscx" => $poscx,
                    "total_time_spend" => $total_time_spend,
                    "mosquitodensity" => $mosquitodensity,
                    "total_mosquitos_collected" => $total_mosquitos_collected,
                    "no_of_dissected" => $no_of_dissected,
                    "total_postive_cx" => $total_postive_cx,
                    "infective" => $infective,
                    "infectedpercentage" => $infectedpercentage,
                    "infectivepercentage" => $infectivepercentage,
                );



                $name_of_heo = '';
                $moh_area = '';
                $phi_and_phm = '';
                $gn_divison = '';
                $no_of_premises = '';
                $no_of_premises_positive = '';
                $poscx = '';
                $total_time_spend = '';
                $mosquitodensity = '';
                $total_mosquitos_collected = '';
                $no_of_dissected = '';
                $total_postive_cx = '';
                $infective = "";
                $mq_postive_for_l3 = '';
                $infectedpercentage = '';
                $infectivepercentage = '';
                $no_of_dissected_al = "";
            }



            $total_result2 = array();
            foreach ($old_data_2 as $value_2) {
                $x = 0;
                $faind = 0;
                foreach ($total_result2 as $value2) {
                    if (array_search($value_2['name_of_heo'], $value2, true) and array_search($value_2['gn_divison'], $value2, true)) {
                        $total_result2[$x] = array(

                            "name_of_heo" => $value_2['name_of_heo'],
                            "moh_area" => $value_2['moh_area'],
                            "phi_and_phm" => $value_2['phi_and_phm'],
                            "gn_divison" => $value_2['gn_divison'],
                            "ENTO_01" => "ENTO_01",
                            "no_of_premises" => ($value_2['no_of_premises'] + $value2['no_of_premises']),
                            "no_of_premises_positive" => ($value_2['no_of_premises_positive'] + $value2['no_of_premises_positive']),
                            "poscx" => ($value_2['poscx'] + $value2['poscx']),
                            "total_time_spend" => ($value_2['total_time_spend'] + $value2['total_time_spend']),
                            "mosquitodensity" => ($value_2['mosquitodensity'] + $value2['mosquitodensity']),
                            "total_mosquitos_collected" => ($value_2['total_mosquitos_collected'] + $value2['total_mosquitos_collected']),
                            "no_of_dissected" => ($value_2['no_of_dissected'] + $value2['no_of_dissected']),
                            "total_postive_cx" => ($value_2['total_postive_cx'] + $value2['total_postive_cx']),
                            "infective" => ($value_2['infective'] + $value2['infective']),
                            "infectedpercentage" => ($value_2['infectedpercentage'] + $value2['infectedpercentage']),
                            "infectivepercentage" => ($value_2['infectivepercentage'] + $value2['infectivepercentage'])
                        );

                        $faind = 1;
                    }
                    $x++;
                }
                if ($faind == 0) {
                    $total_result2[] = $value_2;
                }
            }
            foreach ($total_result2 as $total_result2_value2) {
                $tno_of_premises_positive = $total_result2_value2['no_of_premises_positive'];
                $tno_of_premises = $total_result2_value2['no_of_premises'];
                ////////////////////////////////////////////////////////////////
                if ($tno_of_premises == "" or $tno_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($tno_of_premises_positive / $tno_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }
                //////////////////////////////////////////////
                if (empty($total_result2_value2['no_of_dissected'])) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($total_result2_value2['total_postive_cx'] /  $total_result2_value2['no_of_dissected']) * 100;
                    $infectivepercentage = ($total_result2_value2['infective']  /  $total_result2_value2['no_of_dissected']) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                /////////////////////////////////////////////
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' .  $total_result2_value2['name_of_heo'] . '</td>' .
                    '<td>' .  $total_result2_value2['moh_area'] . '</td>' .
                    '<td>' .  $total_result2_value2['phi_and_phm'] . '</td>' .
                    '<td>' .  $total_result2_value2['gn_divison'] . '</td>' .
                    '<td>ENTO 02</td>' .
                    '<td>' .  $total_result2_value2['no_of_premises'] . '</td>' .
                    '<td>' .  $total_result2_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' .  $poscx . '</td>' .
                    '<td>' .  $total_result2_value2['total_time_spend'] . '</td>' .
                    '<td>' .  $total_result2_value2['mosquitodensity'] . '</td>' .
                    '<td>' .  $total_result2_value2['total_mosquitos_collected'] . '</td>' .
                    '<td>' .  $total_result2_value2['no_of_dissected'] . '</td>' .
                    '<td>' .  $total_result2_value2['total_postive_cx']   . '</td>' ./* $infected */
                    '<td>' .  $total_result2_value2['infective'] . '</td>' .
                    '<td>' .  $total_result2_value2['infectedpercentage'] . '</td>' .
                    '<td>' .  $total_result2_value2['infectivepercentage'] . '</td>
</tr>';
            }

            // ENTO ONE 2   data get calculate


            // ENTO ONE 3   data get calculate
            $results = DB::select("
select   en3.moh,en3.gn,en3.total_no_of_mosq,en3.ento_03_id as ento_03_id,en5.ento_05_id as id
FROM ento_03 as en3
INNER JOIN ento_03_data as ento03data
ON ento03data.ento_03_id=en3.ento_03_id
INNER JOIN ento_05 as en5
ON en3.ento_03_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mos.species='Mansonia'
AND en3.district='" . $district . "' AND en3.date_of_collection BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY en3.ento_03_id");

            // AND en3.district='".$district."' AND en3.date_of_collection BETWEEN '".$from."' AND '".$to."'
            // WHERE mos.species2='CX' AND en1.district='".$district."' AND en1.date BETWEEN '".$from."' AND '".$to."'
            // GROUP BY en1.moh_area
            for ($i = 0; $i < count($results); $i++) {
                // this qure for get dessected form ento5 mos table
                $id  = $results[$i]->id;
                $ento_03_id  = $results[$i]->ento_03_id;
                // get collecterd mosqto
                $results_2_2 = DB::select("  SELECT  SUM(no_of_mosq) as collectedmos  from ento_03_data where    ento_03_id=$ento_03_id and   mosq_species LIKE 'Mansonia%'; ");
                for ($e22 = 0; $e22 < count($results_2_2); $e22++) {
                    $total_mosquitos_collected  = $results_2_2[$e22]->collectedmos;
                }
                // get collecterd mosqto
                $results_2 = DB::select("  SELECT  SUM(no_of_dissected) as no_of_dissected_al  from ento_05_mosq where ento_05_id=$id and    species='Mansonia' ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $no_of_dissected_al  = $results_2[$e]->no_of_dissected_al;
                }
                // this qure for get dessected form ento5 mos table
                $ento_02_id  = $results[$i]->ento_03_id;
                // $total_postive_cx = $results[$i]->positive_mosq;    replase this qure for this
                // $infective =$results[$i]->infective;
                $no_of_premises_positive   = "0";
                // get  all  infective and infecterd
                $results_4 = DB::select(" SELECT COUNT(id) as lab_positive FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' ");
                for ($ee4 = 0; $ee4 < count($results_4); $ee4++) {
                    // $infective  = $results_3[$ee]->labno;
                    $total_postive_cx  = $results_4[$ee4]->lab_positive;
                }
                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective  = $results_6[$ee6]->labno;
                }
                // $name_of_heo  = $results[$i]->heo;
                $name_of_heo  = "";
                $moh_area  = $results[$i]->moh;
                $phi_and_phm  = "";
                $gn_divison  = $results[$i]->gn;
                // $no_of_premises  = $results[$i]->no_of_premises;
                // $no_of_premises_positive  = $results[$i]->no_of_premises_positive;
                $no_of_premises   = "0";
                //          get %+
                if ($no_of_premises == "" or $no_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($no_of_premises_positive / $no_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }
                $total_time_spend = 0;
                $mosquitodensity = 0;
                //        mosquito density
                $no_of_dissected = $no_of_dissected_al;
                if (empty($no_of_dissected)) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($total_postive_cx / $no_of_dissected) * 100;
                    $infectivepercentage = ($infective / $no_of_dissected) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                $total_no_of_premises = $total_no_of_premises + $no_of_premises;
                $total_no_of_premises_positive = $total_no_of_premises_positive + $no_of_premises_positive;
                $total_poscx = $total_poscx + $poscx;
                $total_total_time_spend = $total_total_time_spend + $total_time_spend;
                $total_mosquitodensity = $total_mosquitodensity + $mosquitodensity;
                $total_total_mosquitos_collected = $total_total_mosquitos_collected + $total_mosquitos_collected;
                $total_no_of_dissected = $total_no_of_dissected + $no_of_dissected;
                $total_total_postive_cx = $total_total_postive_cx + $total_postive_cx;
                $total_infective = $total_infective + $infective;
                $total_infectedpercentage = $total_infectedpercentage + $infectedpercentage;
                $total_infectivepercentage = $total_infectivepercentage + $infectivepercentage;
                // $viewData = $viewData .
                // '<tr>' .
                //     '<td>' . $name_of_heo . '</td>' .
                //     '<td>' . $moh_area . '</td>' .
                //     '<td>' . $phi_and_phm . '</td>' .
                //     '<td>' . $gn_divison . '</td>' .
                //     '<td>ENTO 03</td>' .
                //     '<td>' . $no_of_premises . '</td>' .
                //     '<td>' . $no_of_premises_positive . '</td>' .
                //     '<td>' . $poscx . '</td>' .
                //     '<td>' . $total_time_spend . '</td>' .
                //     '<td>' . $mosquitodensity . '</td>' .
                //     '<td>' . $total_mosquitos_collected . '</td>' .
                //     '<td>' . $no_of_dissected . '</td>' .
                //     '<td>' . $total_postive_cx   . '</td>' ./* $infected */
                //     '<td>' . $infective . '</td>' .
                //     '<td>' . $infectedpercentage . '</td>' .
                //     '<td>' . $infectivepercentage . '</td>
                // </tr>';


                $old_data_3[] = array(
                    "name_of_heo" => $name_of_heo,
                    "moh_area" => $moh_area,
                    "phi_and_phm" => $phi_and_phm,
                    "gn_divison" => $gn_divison,
                    "ENTO_01" => "ENTO_01",
                    "no_of_premises" => $no_of_premises,
                    "no_of_premises_positive" => $no_of_premises_positive,
                    "poscx" => $poscx,
                    "total_time_spend" => $total_time_spend,
                    "mosquitodensity" => $mosquitodensity,
                    "total_mosquitos_collected" => $total_mosquitos_collected,
                    "no_of_dissected" => $no_of_dissected,
                    "total_postive_cx" => $total_postive_cx,
                    "infective" => $infective,
                    "infectedpercentage" => $infectedpercentage,
                    "infectivepercentage" => $infectivepercentage,
                );








                $name_of_heo = '';
                $moh_area = '';
                $phi_and_phm = '';
                $gn_divison = '';
                $no_of_premises = '';
                $no_of_premises_positive = '';
                $poscx = '';
                $total_time_spend = '';
                $mosquitodensity = '';
                $total_mosquitos_collected = '';
                $no_of_dissected = '';
                $total_postive_cx = '';
                $infective = "";
                $mq_postive_for_l3 = '';
                $infectedpercentage = '';
                $infectivepercentage = '';
                $no_of_dissected_al = "";
            }


            $total_result2 = array();
            foreach ($old_data_3 as $value_3) {
                $x = 0;
                $faind = 0;
                foreach ($total_result2 as $value3) {
                    if (array_search($value_3['name_of_heo'], $value3, true) and array_search($value_3['gn_divison'], $value3, true)) {
                        $total_result2[$x] = array(

                            "name_of_heo" => $value_3['name_of_heo'],
                            "moh_area" => $value_3['moh_area'],
                            "phi_and_phm" => $value_3['phi_and_phm'],
                            "gn_divison" => $value_3['gn_divison'],
                            "ENTO_01" => "ENTO_01",
                            "no_of_premises" => ($value_3['no_of_premises'] + $value3['no_of_premises']),
                            "no_of_premises_positive" => ($value_3['no_of_premises_positive'] + $value3['no_of_premises_positive']),
                            "poscx" => ($value_3['poscx'] + $value3['poscx']),
                            "total_time_spend" => ($value_3['total_time_spend'] + $value3['total_time_spend']),
                            "mosquitodensity" => ($value_3['mosquitodensity'] + $value3['mosquitodensity']),
                            "total_mosquitos_collected" => ($value_3['total_mosquitos_collected'] + $value3['total_mosquitos_collected']),
                            "no_of_dissected" => ($value_3['no_of_dissected'] + $value3['no_of_dissected']),
                            "total_postive_cx" => ($value_3['total_postive_cx'] + $value3['total_postive_cx']),
                            "infective" => ($value_3['infective'] + $value3['infective']),
                            "infectedpercentage" => ($value_3['infectedpercentage'] + $value3['infectedpercentage']),
                            "infectivepercentage" => ($value_3['infectivepercentage'] + $value3['infectivepercentage'])
                        );

                        $faind = 1;
                    }
                    $x++;
                }
                if ($faind == 0) {
                    $total_result2[] = $value_3;
                }
            }
            foreach ($total_result2 as $total_result2_value3) {
                $tno_of_premises_positive = $total_result2_value3['no_of_premises_positive'];
                $tno_of_premises = $total_result2_value3['no_of_premises'];
                ////////////////////////////////////////////////////////////////
                if ($tno_of_premises == "" or $tno_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($tno_of_premises_positive / $tno_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }
                //////////////////////////////////////////////
                if (empty($total_result2_value3['no_of_dissected'])) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($total_result2_value3['total_postive_cx'] /  $total_result2_value3['no_of_dissected']) * 100;
                    $infectivepercentage = ($total_result2_value3['infective']  /  $total_result2_value3['no_of_dissected']) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                /////////////////////////////////////////////
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' .  $total_result2_value3['name_of_heo'] . '</td>' .
                    '<td>' .  $total_result2_value3['moh_area'] . '</td>' .
                    '<td>' .  $total_result2_value3['phi_and_phm'] . '</td>' .
                    '<td>' .  $total_result2_value3['gn_divison'] . '</td>' .
                    '<td>ENTO 03</td>' .
                    '<td>' .  $total_result2_value3['no_of_premises'] . '</td>' .
                    '<td>' .  $total_result2_value3['no_of_premises_positive'] . '</td>' .
                    '<td>' .  $poscx . '</td>' .
                    '<td>' .  $total_result2_value3['total_time_spend'] . '</td>' .
                    '<td>' .  $total_result2_value3['mosquitodensity'] . '</td>' .
                    '<td>' .  $total_result2_value3['total_mosquitos_collected'] . '</td>' .
                    '<td>' .  $total_result2_value3['no_of_dissected'] . '</td>' .
                    '<td>' .  $total_result2_value3['total_postive_cx']   . '</td>' ./* $infected */
                    '<td>' .  $total_result2_value3['infective'] . '</td>' .
                    '<td>' .  $total_result2_value3['infectedpercentage'] . '</td>' .
                    '<td>' .  $total_result2_value3['infectivepercentage'] . '</td>
</tr>';
            }






            // ENTO ONE 3   data get calculate
            $culex_total = 0;                                                     // ENTO ONE 4   data get calculate
            $results = DB::select("select   en3.moh,en3.gn_division,en3.ento_04_id as ento_04_id,en5.ento_05_id as id
FROM ento_04 as en3
INNER JOIN ento_05 as en5
ON en3.ento_04_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mos.species='Mansonia'
AND en3.district='" . $district . "' AND en3.date_of_collection BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY en3.ento_04_id
");

            // AND en3.district='".$district."' AND en3.date_of_collection BETWEEN '".$from."' AND '".$to."'
            // WHERE mos.species2='CX' AND en1.district='".$district."' AND en1.date BETWEEN '".$from."' AND '".$to."'
            // GROUP BY en1.moh_area
            for ($i = 0; $i < count($results); $i++) {
                // this qure for get dessected form ento5 mos table
                $id  = $results[$i]->id;
                $results_2 = DB::select("  SELECT  SUM(no_of_dissected) as no_of_dissected_al  from ento_05_mosq where ento_05_id=$id and  species='Mansonia' ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $no_of_dissected_al  = $results_2[$e]->no_of_dissected_al;
                }
                // this qure for get dessected form ento5 mos table
                $ento_04_id  = $results[$i]->ento_04_id;
                // $total_postive_cx = $results[$i]->positive_mosq;    replase this qure for this
                // $infective =$results[$i]->infective;
                $no_of_premises_positive   = "-";
                // get  all  infective and infecterd
                $results_4 = DB::select(" SELECT COUNT(id) as lab_positive FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' ");
                for ($ee4 = 0; $ee4 < count($results_4); $ee4++) {
                    // $infective  = $results_3[$ee]->labno;
                    $total_postive_cx  = $results_4[$ee4]->lab_positive;
                }
                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective  = $results_6[$ee6]->labno;
                }
                // $name_of_heo  = $results[$i]->heo;
                $name_of_heo  = "";
                $moh_area  = $results[$i]->moh;
                $phi_and_phm  = "";
                $gn_divison  = $results[$i]->gn_division;
                // $no_of_premises  = $results[$i]->no_of_premises;
                // $no_of_premises_positive  = $results[$i]->no_of_premises_positive;
                $no_of_premises   = "-";
                // $total_mosquitos_collected=$results[$i]->total_no_of_mosq;
                // get total mosq from ento 4 ento indoor ento 5 out door
                // $ento_04_id
                $culex_total = 0;
                $list1 = DB::table("ento_04")
                    ->join('ento_04_indoor', 'ento_04.ento_04_id', '=', 'ento_04_indoor.ento_04_id')
                    ->join('ento_04_mosq', 'ento_04_indoor.id', '=', 'ento_04_mosq.ento_04_id')
                    ->where('ento_04.ento_04_id', $ento_04_id)
                    ->where('ento_04_mosq.mosq_species', 'like', 'Mansonia%')
                    ->SUM('ento_04_mosq.mos_number');
                $culex_total = $culex_total + $list1;
                // outdoor culex total
                $list3 = DB::table("ento_04")
                    ->join('ento_04_outdoor', 'ento_04.ento_04_id', '=', 'ento_04_outdoor.ento_04_id')
                    ->join('ento_04_mosq', 'ento_04_outdoor.id', '=', 'ento_04_mosq.ento_04_id')
                    ->where('ento_04.ento_04_id', $ento_04_id)
                    ->where('ento_04_mosq.mosq_species', 'like', 'Mansonia%')
                    ->SUM('ento_04_mosq.mos_number');
                $culex_total = $culex_total + $list3;
                // get total mosq from ento 4 ento indoor ento 5 out door
                $total_mosquitos_collected = $culex_total;
                //          get %+
                if ($no_of_premises == "" or $no_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($no_of_premises_positive / $no_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }
                $total_time_spend = 0;
                $mosquitodensity = 0;
                //        mosquito density
                // $total_mosquitos_collected =$results[$i]->total_cx_quin_mosq;
                $no_of_dissected = $no_of_dissected_al;
                if (empty($no_of_dissected)) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($total_postive_cx / $no_of_dissected) * 100;
                    $infectivepercentage = ($infective / $no_of_dissected) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                $total_no_of_premises = $total_no_of_premises + $no_of_premises;
                $total_no_of_premises_positive = $total_no_of_premises_positive + $no_of_premises_positive;
                $total_poscx = $total_poscx + $poscx;
                $total_total_time_spend = $total_total_time_spend + $total_time_spend;
                $total_mosquitodensity = $total_mosquitodensity + $mosquitodensity;
                $total_total_mosquitos_collected = $total_total_mosquitos_collected + $total_mosquitos_collected;
                $total_no_of_dissected = $total_no_of_dissected + $no_of_dissected;
                $total_total_postive_cx = $total_total_postive_cx + $total_postive_cx;
                $total_infective = $total_infective + $infective;
                $total_infectedpercentage = $total_infectedpercentage + $infectedpercentage;
                $total_infectivepercentage = $total_infectivepercentage + $infectivepercentage;
                // $viewData = $viewData .
                // '<tr>' .
                //     '<td>' . $name_of_heo . '</td>' .
                //     '<td>' . $moh_area . '</td>' .
                //     '<td>' . $phi_and_phm . '</td>' .
                //     '<td>' . $gn_divison . '</td>' .
                //     '<td>ENTO 04 </td>' .
                //     '<td>' . $no_of_premises . '</td>' .
                //     '<td>' . $no_of_premises_positive . '</td>' .
                //     '<td>' . $poscx . '</td>' .
                //     '<td>' . $total_time_spend . '</td>' .
                //     '<td>' . $mosquitodensity . '</td>' .
                //     '<td>' . $total_mosquitos_collected . '</td>' .
                //     '<td>' . $no_of_dissected . '</td>' .
                //     '<td>' . $total_postive_cx   . '</td>' ./* $infected */
                //     '<td>' . $infective . '</td>' .
                //     '<td>' . $infectedpercentage . '</td>' .
                //     '<td>' . $infectivepercentage . '</td>
                // </tr>';


                $old_data_4[] = array(
                    "name_of_heo" => $name_of_heo,
                    "moh_area" => $moh_area,
                    "phi_and_phm" => $phi_and_phm,
                    "gn_divison" => $gn_divison,
                    "ENTO_01" => "ENTO_01",
                    "no_of_premises" => $no_of_premises,
                    "no_of_premises_positive" => $no_of_premises_positive,
                    "poscx" => $poscx,
                    "total_time_spend" => $total_time_spend,
                    "mosquitodensity" => $mosquitodensity,
                    "total_mosquitos_collected" => $total_mosquitos_collected,
                    "no_of_dissected" => $no_of_dissected,
                    "total_postive_cx" => $total_postive_cx,
                    "infective" => $infective,
                    "infectedpercentage" => $infectedpercentage,
                    "infectivepercentage" => $infectivepercentage,
                );






                $name_of_heo = '';
                $moh_area = '';
                $phi_and_phm = '';
                $gn_divison = '';
                $no_of_premises = '';
                $no_of_premises_positive = '';
                $poscx = '';
                $total_time_spend = '';
                $mosquitodensity = '';
                $total_mosquitos_collected = '';
                $no_of_dissected = '';
                $total_postive_cx = '';
                $infective = "";
                $mq_postive_for_l3 = '';
                $infectedpercentage = '';
                $infectivepercentage = '';
                $no_of_dissected_al = "";
            }




















            if ($total_no_of_premises) {
                if ($total_no_of_dissected != 0) {
                    $total_infective_t = round((($total_total_postive_cx / $total_no_of_dissected) * 100), 2);
                    $total_infective_t = round((($total_infective / $total_no_of_dissected) * 100), 2);
                } else {
                    $total_infective_t = 0;
                    $total_infected = 0;
                }

                $viewData = $viewData .
                    '<tr>' .
                    '<td>Total</td>' .
                    '<td></td>' .
                    '<td></td>' .
                    '<td></td>' .
                    '<td> </td>' .

                    '<td>' . $total_no_of_premises . '</td>' .
                    '<td>' . $total_no_of_premises_positive . '</td>' .
                    '<td>' . round((($total_no_of_premises_positive / $total_no_of_premises) * 100), 2) . '</td>' .
                    '<td>' . $total_total_time_spend . '</td>' .
                    '<td>' . round((($total_total_mosquitos_collected / $total_total_time_spend)), 2) . '</td>' .
                    '<td>' . $total_total_mosquitos_collected . '</td>' .
                    '<td>' . $total_no_of_dissected . '</td>' .
                    '<td>' . $total_total_postive_cx   . '</td>' ./* $infected */
                    '<td>' . $total_infective . '</td>' .
                    '<td>' . $total_infective_t . '</td>' .
                    '<td>' . $total_infected . '</td>
</tr>';
            }


















            // ENTO ONE 4   data get calculate
            $content = ob_get_clean();
            // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
            // File::requireOnce($html2pdf_path);
            $template = view(
                'report/b1_view_man',
                compact('data'),
                ["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
            );
            try {
                $html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
                $html2pdf->pdf->SetTitle('B 1 Report');
                $html2pdf->WriteHTML($template);
                $html2pdf->Output('b1_report.pdf');
                ob_flush();
                ob_end_clean();
            } catch (HTML2PDF_exception $e) {
                echo $e;
                exit;
            }
            return view(
                'report/
',
                compact('data'),
                ["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
            );
            // red if anny error_log plz chek php version;

        }

        // red if anny error_log plz chek php version;
    }













    // ************ blue ********************b1 report********************************









    public function b1_report_print1(Request $request)
    {

        $total_postive_cx = 0;
        $data = $request->all();
        $from = $data['from'];
        $to = $data['to'];


        $mq_postive_for_l3 = 0;
        $name_of_heo = 0;
        $moh_area = 0;
        $phi_and_phm = 0;
        $gn_divison = 0;
        $no_of_premises = 0;
        $no_of_premises_positive = 0;
        $poscx = 0;
        $mansonia_species_of_positive = 0;
        $posms = 0;
        $total_time_spend = 0;
        $mosquitodensity = 0;
        $total_mosquitos_collected = 0;
        $no_of_dissected = 0;
        $infected = 0;
        $infective = 0;
        $infectedpercentage = 0;
        $infectivepercentage = 0;

        $result2 = DB::table('ento_01')
            ->select('*')
            ->where('district', $data['district'])
            ->WhereBetween('date', [$from, $to])
            // ->groupBy('moh_area')
            ->get();

        //         $result2 = DB::select('select ento_01_id,date,name_of_heo,moh_area,phi_and_phm,gn_divison,
        //   sum(no_of_premises) as no_of_premises,
        //   sum(no_of_premises_positive) as no_of_premises_positive,
        //   sum(total_time_spend) as total_time_spend,
        //   sum(mansonia_species_of_positive) as mansonia_species_of_positive,
        //   sum(mansonia_spcies_of_mosquitos_collected) as mansonia_spcies_of_mosquitos_collected
        //         from ento_01
        //         GROUP BY moh_area

        //         ');



        $viewData = "";
        if ($result2) {
            for ($i = 0; $i < count($result2); $i++) {
                $formid = $result2[$i]->ento_01_id;
                $id = $result2[$i]->date;
                $name_of_heo = $result2[$i]->name_of_heo;
                $moh_area = $result2[$i]->moh_area;
                $phi_and_phm = $result2[$i]->phi_and_phm;
                $gn_divison = $result2[$i]->gn_divison;


                $no_of_premises = $result2[$i]->no_of_premises;
                $no_of_premises_positive = $result2[$i]->no_of_premises_positive;
                $total_time_spend = $result2[$i]->total_time_spend;
                $mansonia_species_of_positive = $result2[$i]->mansonia_species_of_positive;
                $mansonia_spcies_of_mosquitos_collected = $result2[$i]->mansonia_spcies_of_mosquitos_collected;


                if ($no_of_premises == "" or $no_of_premises == 0) {
                    $posms = 0;
                } else {
                    $posms = ($mansonia_species_of_positive / $no_of_premises) * 100;
                    $posms = round($posms);
                }
                $result34 = DB::table('ento_05')
                    ->select('*')
                    ->where('main_form_type', "ento_01")
                    ->where('main_form_id', $formid)
                    ->get();
                if ($result34) {
                    for ($j = 0; $j < count($result34); $j++) {
                        $ento_05_id = $result34[$j]->ento_05_id;
                        $total_mosquitos_collected = $result34[$j]->total_cx_quin_mosq;

                        // $resultdi = DB::table('ento_05_species')
                        //     ->select('*')
                        //     ->where('species', "CX")
                        //     ->where('ento_05_id', $ento_05_id)
                        //     ->get();

                        // if ($resultdi) {
                        //     for ($k = 0; $k < count($resultdi); $k++) {
                        //         $no_of_dissected = $resultdi[$k]->no_of_dissected;
                        //     }
                        // }

                        $resultin = DB::table('ento_05_mosq')
                            ->select('*')
                            ->where('species2', "CX")
                            ->where('ento_05_id', $ento_05_id)
                            ->get();

                        if ($resultin) {
                            for ($l = 0; $l < count($resultin); $l++) {

                                $total_postive_cx = $resultin[$l]->positive_mosq;
                                $mq_postive_for_l3 = $resultin[$l]->mq_postive_for_l3;

                                $head_mf = $resultin[$l]->head_mf;
                                $head_l1 = $resultin[$l]->head_l1;
                                $head_l2 = $resultin[$l]->head_l2;
                                $head_l3 = $resultin[$l]->head_l3;
                                $thorax_mf = $resultin[$l]->thorax_mf;
                                $thorax_l1 = $resultin[$l]->thorax_l1;
                                $thorax_l2 = $resultin[$l]->thorax_l2;
                                $thorax_l3 = $resultin[$l]->thorax_l3;
                                $abdomen_mf = $resultin[$l]->abdomen_mf;
                                $abdomen_l1 = $resultin[$l]->abdomen_l1;
                                $abdomen_l2 = $resultin[$l]->abdomen_l2;
                                $abdomen_l3 = $resultin[$l]->abdomen_l3;
                                $infective = $head_l3 + $thorax_l3 + $abdomen_l3;
                                /*echo "<br>thi is infected".$infective;*/
                                $infected = $head_mf + $head_l1 + $head_l2 + $head_l3 + $thorax_mf + $thorax_l1 + $thorax_l2 + $thorax_l3 + $abdomen_mf + $abdomen_l1 + $abdomen_l2 + $abdomen_l3;
                                /*echo "<br>thi is infected".$infected;*/
                                $no_of_dissected = $resultin[$l]->no_of_dissected;
                            }
                        }
                    }



                    if ($total_mosquitos_collected == "" or  $total_mosquitos_collected == 0) {
                        $mosquitodensity = 0;
                    } else {
                        $mosquitodensity =  $total_time_spend / $total_mosquitos_collected;
                        $mosquitodensity = round($mosquitodensity, 2);
                    }

                    if (empty($no_of_dissected)) {
                        $infectedpercentage = 'Fill ento5_species';
                        $infectivepercentage = 'Fill ento5_species';
                    } else {
                        $infectedpercentage = ($total_postive_cx / $no_of_dissected) * 100;
                        $infectivepercentage = ($mq_postive_for_l3 / $no_of_dissected) * 100;

                        $infectedpercentage = round($infectedpercentage, 2) . '%';
                        $infectivepercentage = round($infectivepercentage, 2) . '%';
                    }
                    //          get %+

                    if ($no_of_premises == "" or $no_of_premises == 0) {
                        $poscx = 0;
                    } else {
                        $poscx = ($no_of_premises_positive / $no_of_premises) * 100;
                        $poscx = round($poscx) . "%";
                    }

                    //        mosquito density

                    if ($total_postive_cx == "" or $total_postive_cx == 0) {
                        $mosquitodensity = 0;
                    } else {
                        $mosquitodensity =  $total_time_spend / $total_postive_cx;
                        $mosquitodensity = round($mosquitodensity, 2);
                    }


                    $viewData = $viewData .
                        '<tr>' .
                        '<td>' . $name_of_heo . '</td>' .
                        '<td>' . $moh_area . '</td>' .
                        '<td>' . $phi_and_phm . '</td>' .
                        '<td>' . $gn_divison . '</td>' .
                        '<td>' . $no_of_premises . '</td>' .
                        '<td>' . $no_of_premises_positive . '</td>' .
                        '<td>' . $poscx . '</td>' .
                        // '<td>' . $mansonia_species_of_positive . '</td>' .
                        // '<td>' . $posms . '</td>' .
                        '<td>' . $total_time_spend . '</td>' .
                        '<td>' . $mosquitodensity . '</td>' .
                        '<td>' . $total_mosquitos_collected . '</td>' .
                        '<td>' . $no_of_dissected . '</td>' .
                        '<td>' . $total_postive_cx   . '</td>' ./* $infected */
                        '<td>' . $mq_postive_for_l3 . '</td>' .
                        '<td>' . $infectedpercentage . '</td>' .
                        '<td>' . $infectivepercentage . '</td>
                </tr>';
                }
            }
        }



        $content = ob_get_clean();
        // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
        // File::requireOnce($html2pdf_path);
        $template = view(
            'report/b1_view',
            compact('data'),
            ["dataView" => $viewData, 'district' => $data['district']]
        );
        try {
            $html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
            $html2pdf->pdf->SetTitle('B 1 Report');
            $html2pdf->WriteHTML($template);
            $html2pdf->Output('b1_report.pdf');
            ob_flush();
            ob_end_clean();
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }

        return view(
            'report/b1_view',
            compact('data'),
            ["dataView" => $viewData, 'district' => $data['district']]
        );
    }

    public function index()
    {
        $district = DB::table('district')
            ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'ento_01/ento_01';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }

    public function ento1_data()
    {
        if (Auth::user()->role !== "ADMIN" & Auth::user()->role !== "AFC") {
            $list = DB::table('ento_01')
                ->select('*')
                ->where('user_name', Auth::user()->email)
                ->orderBy('ento_01_id', 'desc')
                ->get();
        } else {
            $list = DB::table('ento_01')
                ->select('*')
                ->orderBy('ento_01_id', 'desc')
                ->get();
        }

        $data['template'] = 'ento_01/ento_01_data';
        return view('template_user/template', compact('data'), ["ento1_list" => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $data["user_name"] = Auth::user()->email;

        // $ento1 = [
        //     "district" => $data['district'],
        //     "gn_divison" => $data['gn_divison'],
        //     "date" => $data['date'],
        //     "moh_area" => $data['moh_area'],
        //     // "locality" => 2,
        //     // "locality"=>$data['locality'],
        //     "start_at" => $data['start_at'],
        //     "phi_and_phm" => $data['phi_and_phm'],
        //     "weather_condition" => $data['weather_condition'],
        //     "finished_at" => $data['finished_at'],
        //     "no_of_premises" => $data['no_of_premises'],
        //     "total_time_spend" => $data['total_time_spend'],
        //     "no_of_premises_positive" => $data['no_of_premises_positive'],
        //     "mansonia_species_of_positive" => $data['mansonia_species_of_positive'],
        //     "total_mosquitos_collected" => $data['total_mosquitos_collected'],
        //     "mansonia_spcies_of_mosquitos_collected" => $data['mansonia_spcies_of_mosquitos_collected'],
        //     "anopheles_species" => $data['anopheles_species'],
        //     "aedes_sp" => $data['aedes_sp'],
        //     "armigerus_sp" => $data['armigerus_sp'],
        //     "tubes_submitted" => $data['tubes_submitted'],
        //     "no_of_collectors" => $data['no_of_collectors'],
        //     "name_of_heo" => $data['name_of_heo'],
        // ];
        $success = Ento_01::create($data);
        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function ento1_update(Request $request)
    {
        $data = $request->all();
        $ento1 = [
            "district" => $data['district'],
            "gn_divison" => $data['gn_divison'],
            "date" => $data['date'],
            "moh_area" => $data['moh_area'],
            "locality" => 2,
            "start_at" => $data['start_at'],
            "phi_and_phm" => $data['phi_and_phm'],
            "weather_condition" => $data['weather_condition'],
            "finished_at" => $data['finished_at'],
            "no_of_premises" => $data['no_of_premises'],
            "total_time_spend" => $data['total_time_spend'],
            "no_of_premises_positive" => $data['no_of_premises_positive'],
            "mansonia_species_of_positive" => $data['mansonia_species_of_positive'],
            "total_mosquitos_collected" => $data['total_mosquitos_collected'],
            "mansonia_spcies_of_mosquitos_collected" => $data['mansonia_spcies_of_mosquitos_collected'],
            "anopheles_species" => $data['anopheles_species'],
            "aedes_sp" => $data['aedes_sp'],
            "armigerus_sp" => $data['armigerus_sp'],
            "tubes_submitted" => $data['tubes_submitted'],
            "no_of_collectors" => $data['no_of_collectors'],
            "name_of_heo" => $data['name_of_heo'],

        ];

        $success = Ento_01::where('ento_01_id', $data['ento_01_id'])->update($ento1);
        if ($success) {
            return redirect()->back()->with('update', true);
        } else {
            return redirect()->back()->with('update', false);
        }
    }








    public function ento1_auto($form_id)
    {
        echo $form_id;
        $list = DB::table("ento_01_data")
            ->where('ento_01_data.ento_01_id', $form_id)
            ->get();

        $no_of_premises_examined = count($list);
        $total_cx_mosquitos_collected = 0;
        $total_mansonia_mosquitos_collected = 0;
        $total_anopheles_mosquitos_collected = 0;
        $total_aedessp_mosquitos_collected = 0;
        $total_armigerus_mosquitos_collected = 0;


        $tota_premises_postive_for_cx = 0;
        $tota_premises_postive_for_mansoia = 0;

        foreach ($list as $value) {
            $total_cx_mosquitos_collected = $total_cx_mosquitos_collected + $value->no_of_culex;
            $total_mansonia_mosquitos_collected = $total_mansonia_mosquitos_collected + $value->no_of_mosq;
            $total_anopheles_mosquitos_collected = $total_anopheles_mosquitos_collected + $value->anopheles;
            $total_aedessp_mosquitos_collected = $total_aedessp_mosquitos_collected + $value->andes;
            $total_armigerus_mosquitos_collected = $total_armigerus_mosquitos_collected + $value->armigerous;
            if (0 < $value->no_of_culex) {
                $tota_premises_postive_for_cx++;
            }
            if (0 < $value->no_of_mosq) {
                $tota_premises_postive_for_mansoia++;
            }
        }

        $ento1_up = [
            "no_of_premises" => $no_of_premises_examined,
            "no_of_premises_positive" => $tota_premises_postive_for_cx,
            "total_mosquitos_collected" => $total_cx_mosquitos_collected,
            "mansonia_species_of_positive" => $tota_premises_postive_for_mansoia,
            "mansonia_spcies_of_mosquitos_collected" => $total_mansonia_mosquitos_collected,
            // "anopheles_species" => $total_anopheles_mosquitos_collected,
            // "aedes_sp" => $total_aedessp_mosquitos_collected,
            // "armigerus_sp" => $total_armigerus_mosquitos_collected,
        ];

        $success1 = Ento_01::where('ento_01_id', $form_id)->update($ento1_up);
    }






    public function ento1_data_save(Request $request)
    {

        $data = $request->all();
        $data["user_name"] = Auth::user()->email;

        // $ento1_data = [
        //     "ento_01_id" => $data['ento_01_id'],
        //     "ser_no" => $data['ser_no'],
        //     "house_no" => $data['house_no'],
        //     "no_of_mosq" => $data['no_of_mosq'],
        //     "resting_place_1" => $data['resting_place_1'],
        //     "resting_place_2" => $data['resting_place_2'],
        //     "resting_place_3" => $data['resting_place_3'],
        //     "resting_place_4" => $data['resting_place_4'],
        //     "resting_place_5" => $data['resting_place_5'],
        //     "resting_place_6" => $data['resting_place_6'],
        //     "lab_positive" => $data['lab_positive'],
        //     "lab_no" => $data['lab_no'],
        // ];

        $success = Ento_01_data::create($data);
        $form_id = $success->ento_01_id;

        $list = DB::table("ento_01_data")
            ->where('ento_01_data.ento_01_id', $form_id)
            ->get();

        $this->ento1_auto($form_id);

        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }






    public function ento1_data_update(Request $request)
    {

        $data = $request->all();
        $ento1_data = [
            "ento_01_id" => $data['ento_01_id'],
            "ser_no" => $data['ser_no'],
            "house_no" => $data['house_no'],
            "no_of_mosq" => $data['no_of_mosq'],
            "anopheles" => $data['anopheles'],
            "andes" => $data['andes'],
            "armigerous" => $data['armigerous'],
            "gps_lat" => $data['gps_lat'],
            "gps_long" => $data['gps_long'],
            "no_of_culex" => $data['no_of_culex'],
            "resting_place_1" => $data['resting_place_1'],
            "resting_place_2" => $data['resting_place_2'],
            "resting_place_3" => $data['resting_place_3'],
            "resting_place_4" => $data['resting_place_4'],
            "resting_place_5" => $data['resting_place_5'],
            "resting_place_6" => $data['resting_place_6'],
            "resting_place_1_mansonia" => $data['resting_place_1_mansonia'],
            "resting_place_2_mansonia" => $data['resting_place_2_mansonia'],
            "resting_place_3_mansonia" => $data['resting_place_3_mansonia'],
            "resting_place_4_mansonia" => $data['resting_place_4_mansonia'],
            "resting_place_5_mansonia" => $data['resting_place_5_mansonia'],
            "resting_place_6_mansonia" => $data['resting_place_6_mansonia'],
            "lab_positive" => $data['lab_positive'],
            "lab_no" => $data['lab_no'],
        ];


        $success = Ento_01_data::where('id', $data['id'])->update($ento1_data);
        $this->ento1_auto($data['ento_01_id']);

        if ($success) {
            return redirect()->back()->with('update', true);
        } else {
            return redirect()->back()->with('update', false);
        }
    }


    public function view_all(Request $request)
    {

        $from = "";
        $to = "";
        $data = $request->all();
        if (empty($data['from'])) {


            if (Auth::user()->role === "RMO" ||  Auth::user()->role === "PHLT") {
                $ento1 = DB::table('ento_01')
                    ->select('*')
                    ->where('district', Auth::user()->district)
                    ->orderBy('ento_01_id', 'desc')
                    ->get();
            } else if (Auth::user()->role === "ADMIN" || Auth::user()->role === "AFC") {
                $ento1 = DB::table('ento_01')
                    ->select('*')
                    ->orderBy('ento_01_id', 'desc')
                    ->get();
            } else {
                $ento1 = DB::table('ento_01')
                    ->select('*')
                    ->where('user_name', Auth::user()->email)
                    ->orderBy('ento_01_id', 'desc')
                    ->get();
            }
        } else {

            $from = $data['from'];
            $to = $data['to'];


            if (Auth::user()->role === "RMO" ||  Auth::user()->role === "PHLT") {
                $ento1 = DB::table('ento_01')
                    ->select('*')
                    ->where('district', Auth::user()->district)
                    ->WhereBetween('date', [$from, $to])
                    ->orderBy('ento_01_id', 'desc')
                    ->get();
            } else if (Auth::user()->role === "ADMIN" || Auth::user()->role === "AFC") {
                $ento1 = DB::table('ento_01')
                    ->select('*')
                    ->WhereBetween('date', [$from, $to])
                    ->orderBy('ento_01_id', 'desc')
                    ->get();
            } else {
                $ento1 = DB::table('ento_01')
                    ->select('*')
                    ->where('user_name', Auth::user()->email)
                    ->WhereBetween('date', [$from, $to])
                    ->orderBy('ento_01_id', 'desc')
                    ->get();
            }
        }







        $district = DB::table('district')
            ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'ento_01/ento_01_view';
        return view('template_user/template', compact('data'), ["ento1_list" => $ento1, "district_list" => $district, "from" => $from, "to" => $to]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $res1 = Ento_01::where('ento_01_id', $id)->delete();
        $res = Ento_01_data::where('ento_01_id', $id)->delete();
        if ($res1) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function delete_ento1_data($id, $fid)
    {
        $res = Ento_01_data::where('id', $id)->delete();





        $this->ento1_auto($fid);

        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function view_ento1_data($id)
    {
        $list = DB::table('ento_01_data')
            ->select('*')
            ->where('ento_01_id', $id)
            ->get();
        $list2 = DB::table('ento_01')
            ->select('*')
            ->orderBy('ento_01_id', 'desc')
            ->get();

        $data['template'] = 'ento_01/ento_01_data_view';
        return view('template_user/template', compact('data'), ["ento1_data_list" => $list, "ento1_list" => $list2]);
    }

    //                                      new Form sextion

    public function newForm()
    {

        $district = DB::table('district')
            ->select('*')
            ->orderBy('district', 'ASC')
            ->get();
        $data['template'] = 'ento_01/ento_01NewForms';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }






    public function newcreate(Request $request)
    {

        $data = $request->all();
        $data["user_name"] = Auth::user()->email;


        switch ($data['district']) {
            case "Colombo":
                $district = "COL/IHC/";
                break;
            case "Gampaha":
                $district = "GAM/IHC/";
                break;
            case "Kalutara":
                $district = "KAL/IHC/";
                break;
            case "Galle":
                $district = "GAL/IHC/";
                break;
            case "Matara":
                $district = "MAT/IHC/";
                break;
            case "Hambantota":
                $district = "HAM/IHC/";
                break;
            case "Kurunegala":
                $district = "KUR/IHC/";
                break;
            case "Puttalam":
                $district = "PUT/IHC/";
                break;
            case "CMC":
                $district = "AFC/IHC/";
                break;
            case "Non endemic":
                $district = "NED/IHC/";
                break;
            default:
        }
        // COL/IHC/2023/1
        // GAM/IHC/2023/1
        // KAL/IHC/2023/1
        // GAL/IHC/2023/1
        // MAT/IHC/2023/1
        // HAM/IHC/2023/1
        // KUR/IHC/2023/1
        // PUT/IHC/2023/1
        // AFC/IHC/2023/1


        // //get last Id relavent and make new one
        $initial_registration = DB::table('ento_01')
            ->select('*')
            ->orderBy('ento_01_id', 'desc')
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



        // dd($district_lymphedema_no);







        $ento1 = [
            "district" => $data['district'],
            "formid" => $form_id,
            "moh_area" => $data['moh_area'],
            "phi_and_phm" => $data['phi_and_phm'],
            "gn_divison" => $data['gn_divison'],
            "locality" => $data['locality'],
            "weather_condition" => $data['weather_condition'],
            "date" => $data['date'],
            "start_at" => $data['start_at'],
            "finished_at" => $data['finished_at'],
            "anopheles_species" => $data['anopheles_species'],
            "aedes_sp" => $data['aedes_sp'],
            "armigerus_sp" => $data['armigerus_sp'],
            "no_of_collectors" => $data['no_of_collectors'],
            "MosDensityCx" => $data['MosDensityCx'],
            "MosDensityMan" => $data['MosDensityMan'],
            "name_of_heo" => $data['name_of_heo'],
            "total_time_spend" => $data['total_time_spend'],
            "user_name" => Auth::user()->email
        ];

        $success = Ento_01::create($ento1);
        $ento_01_id = $success->id;

        // Insert Second time data array to entodata table
        $DataFildCount = count($data['resting_place_1']);
        for ($i = 0; $i < $DataFildCount; $i++) {
            $ento1data = [
                "ento_01_id" => $ento_01_id,
                "ser_no" => $data['ser_no'][$i],
                "gps_long" => $data['gps_long'][$i],
                "gps_lat" => $data['gps_lat'][$i],
                "house_no" => $data['house_no'][$i],
                // "timeSpand" => $data['timeSpand'][$i],
                "no_of_pre_postive_cx" => $data['no_of_pre_postive_cx'][$i],
                "no_of_pre_postive_man" => $data['no_of_pre_postive_man'][$i],
                "no_of_culex" => $data['no_of_culex'][$i],
                "no_of_mosq" => $data['no_of_mosq'][$i],
                "resting_place_1" => $data['resting_place_1'][$i],
                "resting_place_2" => $data['resting_place_2'][$i],
                "resting_place_3" => $data['resting_place_3'][$i],
                "resting_place_4" => $data['resting_place_4'][$i],
                "resting_place_5" => $data['resting_place_5'][$i],
                "resting_place_6" => $data['resting_place_6'][$i],
                "abdo_uf" => $data['abdo_uf'][$i],
                "abdo_f" => $data['abdo_f'][$i],
                "abdo_sg" => $data['abdo_sg'][$i],
                "abdo_g" => $data['abdo_g'][$i],
                "males" => $data['males'][$i],
                "resting_place_1_mansonia" => $data['resting_place_1_mansonia'][$i],
                "resting_place_2_mansonia" => $data['resting_place_2_mansonia'][$i],
                "resting_place_3_mansonia" => $data['resting_place_3_mansonia'][$i],
                "resting_place_4_mansonia" => $data['resting_place_4_mansonia'][$i],
                "resting_place_5_mansonia" => $data['resting_place_5_mansonia'][$i],
                "resting_place_6_mansonia" => $data['resting_place_6_mansonia'][$i],
                "abdo_uf_ma" => $data['abdo_uf_ma'][$i],
                "abdo_f_ma" => $data['abdo_f_ma'][$i],
                "abdo_sg_ma" => $data['abdo_sg_ma'][$i],
                "abdo_g_ma" => $data['abdo_g_ma'][$i],
                "males_ma" => $data['males_ma'][$i],
                "user_name" => Auth::user()->email
            ];
            $success = Ento_01_data::create($ento1data);
        }
        $this->ento1_auto($ento_01_id);
        if ($success) {
            return redirect()->back()->with('message', true)->with('id', $form_id);
        } else {
            return redirect()->back()->with('message', false)->with('id', $form_id);
        }
    }




    public function view_ento1($id)
    {

        $data2 = \App\Ento_01::with('ento_01_dataes')->where("ento_01_id", $id)->first();
        $data3 = \App\Ento_01_data::with('Ento_5_news')->where("ento_01_id", $id)->first();



        $data['template'] = 'ento_01/ento_01_Newview';
        return view('template_user/template', compact('data'), ["ento1_list" => $data2, "ento1_list_5" => $data3]);
    }



    public function view_ento1_print($id)
    {

        $NoofPreTotal = 0; //no_of_pre_postive_cx[]
        $NoofPreTotalMn = 0; //no_of_pre_postive_man[]
        $TotalMosCu = 0; //no_of_culex[]
        $TotalMosMa = 0; //no_of_mosq[]

        $t1TotalCx = 0; //resting_place_1[]
        $t2TotalCx = 0; //resting_place_2[]
        $t3TotalCx = 0; //resting_place_3[]
        $t4TotalCx = 0; //resting_place_4[]
        $t6TotalCx = 0; //resting_place_6[]
        $UfTotalCx = 0; //abdo_uf[]
        $fTotalCx = 0; //abdo_f[]
        $SgTotalCx = 0; //abdo_sg[]
        $GtoTalCx = 0; //abdo_g[]
        $MalestoTalCx = 0; //males[]

        $t1TotalMn = 0; //resting_place_1_mansonia[]
        $t2TotalMn = 0; //resting_place_2_mansonia[]
        $t3TotalMn = 0; //resting_place_3_mansonia[]
        $t4TotalMn = 0; //resting_place_4_mansonia[]
        $t5TotalMn = 0; //resting_place_5_mansonia[]
        $t6TotalMn = 0; //resting_place_6_mansonia[]
        $UfTotalMn = 0; //abdo_uf_ma[]
        $fTotalMn = 0; //abdo_f_ma[]
        $SgTotalMn = 0; //abdo_sg_ma[]
        $GtoTalMn = 0; //abdo_g_ma[]
        $MalestoTalMn = 0; //males_ma[]
        $t5TotalCx = 0;


        $data2 = \App\Ento_01::with('ento_01_dataes')->where("ento_01_id", $id)->first();
        $data3 = \App\Ento_01_data::with('Ento_5_news')->where("ento_01_id", $id)->first();





        foreach ($data2->ento_01_dataes as $key) {

            $NoofPreTotal += $key->no_of_pre_postive_cx;
            $NoofPreTotalMn += $key->no_of_pre_postive_man;
            $TotalMosCu += $key->no_of_culex;
            $TotalMosMa += $key->no_of_mosq;

            $t2TotalCx += $key->resting_place_2; //resting_place_2[]
            $t1TotalCx += $key->resting_place_1; //resting_place_1[]
            $t3TotalCx += $key->resting_place_3; //resting_place_3[]
            $t4TotalCx += $key->resting_place_4; //resting_place_4[]
            $t6TotalCx += $key->resting_place_6; //resting_place_6[]
            $t5TotalCx += $key->resting_place_5; //
            $UfTotalCx += $key->abdo_uf; //abdo_uf[]
            $fTotalCx += $key->abdo_f; //abdo_f[]
            $SgTotalCx += $key->abdo_sg; //abdo_sg[]
            $GtoTalCx += $key->abdo_g; //abdo_g[]
            $MalestoTalCx += $key->males; //males[]

            $t1TotalMn += $key->resting_place_1_mansonia; //resting_place_1_mansonia[]
            $t2TotalMn += $key->resting_place_2_mansonia;; //resting_place_2_mansonia[]
            $t3TotalMn += $key->resting_place_3_mansonia;
            $t4TotalMn += $key->resting_place_4_mansonia;
            $t5TotalMn += $key->resting_place_5_mansonia;
            $t6TotalMn += $key->resting_place_6_mansonia;
            $UfTotalMn += $key->abdo_uf_ma;
            $fTotalMn += $key->abdo_f_ma;
            $SgTotalMn += $key->abdo_sg_ma;
            $GtoTalMn += $key->abdo_g_ma;
            $MalestoTalMn += $key->males_ma;
        }


        $ento_total = array(
            "NoofPreTotal" => $NoofPreTotal,
            "NoofPreTotalMn" => $NoofPreTotalMn,
            "TotalMosCu" => $TotalMosCu,
            "TotalMosMa" => $TotalMosMa,
            "t2TotalCx" => $t2TotalCx,
            "t1TotalCx" => $t1TotalCx,
            "t3TotalCx" => $t3TotalCx,
            "t4TotalCx" => $t4TotalCx,
            "t5TotalCx" => $t5TotalCx,
            "t6TotalCx" => $t6TotalCx,
            "UfTotalCx" => $UfTotalCx,
            "fTotalCx" => $fTotalCx,
            "SgTotalCx" => $SgTotalCx,
            "GtoTalCx" => $GtoTalCx,
            "MalestoTalCx" => $MalestoTalCx,
            "t1TotalMn" => $t1TotalMn,
            "t2TotalMn" => $t2TotalMn,
            "t3TotalMn" => $t3TotalMn,
            "t4TotalMn" => $t4TotalMn,
            "t5TotalMn" => $t5TotalMn,
            "t6TotalMn" => $t6TotalMn,
            "UfTotalMn" => $UfTotalMn,
            "fTotalMn" => $fTotalMn,
            "SgTotalMn" => $SgTotalMn,
            "GtoTalMn" => $GtoTalMn,
            "MalestoTalMn" => $MalestoTalMn,
        );



        $page = 'ento_01/ento_01_Newview_print';
        $data = '';
        $content = ob_get_clean();
        // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
        // File::requireOnce($html2pdf_path);
        $template = view(
            $page,
            compact('data'),
            ["ento1_list" => $data2, "ento1_list_5" => $data3, "ento_total" => $ento_total]
        );
        try {

            $html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
            $html2pdf->pdf->SetTitle('Ento 1 ');
            $html2pdf->WriteHTML($template);
            $html2pdf->Output('Ento_1.pdf');
            ob_flush();
            ob_end_clean();
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }











    public function view_ento1_excel($id)
    {

        $NoofPreTotal = 0; //no_of_pre_postive_cx[]
        $NoofPreTotalMn = 0; //no_of_pre_postive_man[]
        $TotalMosCu = 0; //no_of_culex[]
        $TotalMosMa = 0; //no_of_mosq[]

        $t1TotalCx = 0; //resting_place_1[]
        $t2TotalCx = 0; //resting_place_2[]
        $t3TotalCx = 0; //resting_place_3[]
        $t4TotalCx = 0; //resting_place_4[]
        $t6TotalCx = 0; //resting_place_6[]
        $UfTotalCx = 0; //abdo_uf[]
        $fTotalCx = 0; //abdo_f[]
        $SgTotalCx = 0; //abdo_sg[]
        $GtoTalCx = 0; //abdo_g[]
        $MalestoTalCx = 0; //males[]

        $t1TotalMn = 0; //resting_place_1_mansonia[]
        $t2TotalMn = 0; //resting_place_2_mansonia[]
        $t3TotalMn = 0; //resting_place_3_mansonia[]
        $t4TotalMn = 0; //resting_place_4_mansonia[]
        $t5TotalMn = 0; //resting_place_5_mansonia[]
        $t6TotalMn = 0; //resting_place_6_mansonia[]
        $UfTotalMn = 0; //abdo_uf_ma[]
        $fTotalMn = 0; //abdo_f_ma[]
        $SgTotalMn = 0; //abdo_sg_ma[]
        $GtoTalMn = 0; //abdo_g_ma[]
        $MalestoTalMn = 0; //males_ma[]
        $t5TotalCx = 0;


        $data2 = \App\Ento_01::with('ento_01_dataes')->where("ento_01_id", $id)->first();
        $data3 = \App\Ento_01_data::with('Ento_5_news')->where("ento_01_id", $id)->first();





        foreach ($data2->ento_01_dataes as $key) {

            $NoofPreTotal += $key->no_of_pre_postive_cx;
            $NoofPreTotalMn += $key->no_of_pre_postive_man;
            $TotalMosCu += $key->no_of_culex;
            $TotalMosMa += $key->no_of_mosq;

            $t2TotalCx += $key->resting_place_2; //resting_place_2[]
            $t1TotalCx += $key->resting_place_1; //resting_place_1[]
            $t3TotalCx += $key->resting_place_3; //resting_place_3[]
            $t4TotalCx += $key->resting_place_4; //resting_place_4[]
            $t6TotalCx += $key->resting_place_6; //resting_place_6[]
            $t5TotalCx += $key->resting_place_5; //
            $UfTotalCx += $key->abdo_uf; //abdo_uf[]
            $fTotalCx += $key->abdo_f; //abdo_f[]
            $SgTotalCx += $key->abdo_sg; //abdo_sg[]
            $GtoTalCx += $key->abdo_g; //abdo_g[]
            $MalestoTalCx += $key->males; //males[]

            $t1TotalMn += $key->resting_place_1_mansonia; //resting_place_1_mansonia[]
            $t2TotalMn += $key->resting_place_2_mansonia;; //resting_place_2_mansonia[]
            $t3TotalMn += $key->resting_place_3_mansonia;
            $t4TotalMn += $key->resting_place_4_mansonia;
            $t5TotalMn += $key->resting_place_5_mansonia;
            $t6TotalMn += $key->resting_place_6_mansonia;
            $UfTotalMn += $key->abdo_uf_ma;
            $fTotalMn += $key->abdo_f_ma;
            $SgTotalMn += $key->abdo_sg_ma;
            $GtoTalMn += $key->abdo_g_ma;
            $MalestoTalMn += $key->males_ma;
        }


        $ento_total = array(
            "NoofPreTotal" => $NoofPreTotal,
            "NoofPreTotalMn" => $NoofPreTotalMn,
            "TotalMosCu" => $TotalMosCu,
            "TotalMosMa" => $TotalMosMa,
            "t2TotalCx" => $t2TotalCx,
            "t1TotalCx" => $t1TotalCx,
            "t3TotalCx" => $t3TotalCx,
            "t4TotalCx" => $t4TotalCx,
            "t5TotalCx" => $t5TotalCx,
            "t6TotalCx" => $t6TotalCx,
            "UfTotalCx" => $UfTotalCx,
            "fTotalCx" => $fTotalCx,
            "SgTotalCx" => $SgTotalCx,
            "GtoTalCx" => $GtoTalCx,
            "MalestoTalCx" => $MalestoTalCx,
            "t1TotalMn" => $t1TotalMn,
            "t2TotalMn" => $t2TotalMn,
            "t3TotalMn" => $t3TotalMn,
            "t4TotalMn" => $t4TotalMn,
            "t5TotalMn" => $t5TotalMn,
            "t6TotalMn" => $t6TotalMn,
            "UfTotalMn" => $UfTotalMn,
            "fTotalMn" => $fTotalMn,
            "SgTotalMn" => $SgTotalMn,
            "GtoTalMn" => $GtoTalMn,
            "MalestoTalMn" => $MalestoTalMn,
        );



        $page = 'ento_01/ento_01_Newview_print';
        $data = '';
        $content = ob_get_clean();
        // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
        // File::requireOnce($html2pdf_path);
        $template = view(
            $page,
            compact('data'),
            ["ento1_list" => $data2, "ento1_list_5" => $data3, "ento_total" => $ento_total]
        );


        
        header('Content-Type: application/xls');
		header('Content-Disposition: attachment; filename=download.xls');
		echo   $template = view(
            $page,
            compact('data'),
            ["ento1_list" => $data2, "ento1_list_5" => $data3, "ento_total" => $ento_total]
        );


    }






    // Updatge

    public function newento1_update(Request $request)
    {
        $data = $request->all();
        $data["user_name"] = Auth::user()->email;
        $ento1 = [
            "formid" => $data['formid'],
            "district" => $data['district'],
            "moh_area" => $data['moh_area'],
            "phi_and_phm" => $data['phi_and_phm'],
            "gn_divison" => $data['gn_divison'],
            "locality" => $data['locality'],
            "weather_condition" => $data['weather_condition'],
            "date" => $data['date'],
            "start_at" => $data['start_at'],
            "finished_at" => $data['finished_at'],
            "anopheles_species" => $data['anopheles_species'],
            "aedes_sp" => $data['aedes_sp'],
            "armigerus_sp" => $data['armigerus_sp'],
            "no_of_collectors" => $data['no_of_collectors'],
            "MosDensityCx" => $data['MosDensityCx'],
            "MosDensityMan" => $data['MosDensityMan'],
            "name_of_heo" => $data['name_of_heo'],
            "total_time_spend" => $data['total_time_spend'],
            "user_name" => Auth::user()->email
        ];

        //    $success = Ento_01::create($ento1);
        //    $ento_01_id= $success->id;

        $ento_01_id = $data['ento_01_id'];
        $success = Ento_01::where('ento_01_id', $data['ento_01_id'])->update($ento1);
        // Insert Second time data array to entodata table



        $DataFildCount = count($data['id2']);
        for ($i = 0; $i < $DataFildCount; $i++) {
            $ento1data = [

                "ser_no" => $data['ser_no'][$i],
                "gps_long" => $data['gps_long'][$i],
                "gps_lat" => $data['gps_lat'][$i],
                "house_no" => $data['house_no'][$i],
                // "timeSpand" => $data['timeSpand'][$i],
                "no_of_pre_postive_cx" => $data['no_of_pre_postive_cx'][$i],
                "no_of_pre_postive_man" => $data['no_of_pre_postive_man'][$i],
                "no_of_culex" => $data['no_of_culex'][$i],
                "no_of_mosq" => $data['no_of_mosq'][$i],
                "resting_place_1" => $data['resting_place_1'][$i],
                "resting_place_2" => $data['resting_place_2'][$i],
                "resting_place_3" => $data['resting_place_3'][$i],
                "resting_place_4" => $data['resting_place_4'][$i],
                "resting_place_5" => $data['resting_place_5'][$i],
                "resting_place_6" => $data['resting_place_6'][$i],
                "abdo_uf" => $data['abdo_uf'][$i],
                "abdo_f" => $data['abdo_f'][$i],
                "abdo_sg" => $data['abdo_sg'][$i],
                "abdo_g" => $data['abdo_g'][$i],
                "males" => $data['males'][$i],
                "resting_place_1_mansonia" => $data['resting_place_1_mansonia'][$i],
                "resting_place_2_mansonia" => $data['resting_place_2_mansonia'][$i],
                "resting_place_3_mansonia" => $data['resting_place_3_mansonia'][$i],
                "resting_place_4_mansonia" => $data['resting_place_4_mansonia'][$i],
                "resting_place_5_mansonia" => $data['resting_place_5_mansonia'][$i],
                "resting_place_6_mansonia" => $data['resting_place_6_mansonia'][$i],
                "abdo_uf_ma" => $data['abdo_uf_ma'][$i],
                "abdo_f_ma" => $data['abdo_f_ma'][$i],
                "abdo_sg_ma" => $data['abdo_sg_ma'][$i],
                "abdo_g_ma" => $data['abdo_g_ma'][$i],
                "males_ma" => $data['males_ma'][$i],
                "user_name" => Auth::user()->email,
                "no_of_infrcted" => $data['no_of_infrcted'][$i],
                "no_of_infective" => $data['no_of_infective'][$i],
                "no_of_infrcted_ma" => $data['no_of_infrcted_ma'][$i],
                "no_of_infective_ma" => $data['no_of_infective_ma'][$i],
                "no_of_dissected" => $data['no_of_dissected'][$i],
                "no_of_dissected_ma" => $data['no_of_dissected_ma'][$i]
            ];
            $success = Ento_01_data::where('id', $data['id2'][$i])->update($ento1data);
        }


        if ($DataFildCount < count($data['resting_place_1_mansonia'])) {


            for ($i = $DataFildCount; $i < count($data['resting_place_1_mansonia']); $i++) {
                $ento1data2 = [
                    "ento_01_id" => $ento_01_id,
                    "ser_no" => $data['ser_no'][$i],
                    "gps_long" => $data['gps_long'][$i],
                    "gps_lat" => $data['gps_lat'][$i],
                    "house_no" => $data['house_no'][$i],
                    // "timeSpand" => $data['timeSpand'][$i],
                    "no_of_pre_postive_cx" => $data['no_of_pre_postive_cx'][$i],
                    "no_of_pre_postive_man" => $data['no_of_pre_postive_man'][$i],
                    "no_of_culex" => $data['no_of_culex'][$i],
                    "no_of_mosq" => $data['no_of_mosq'][$i],
                    "resting_place_1" => $data['resting_place_1'][$i],
                    "resting_place_2" => $data['resting_place_2'][$i],
                    "resting_place_3" => $data['resting_place_3'][$i],
                    "resting_place_4" => $data['resting_place_4'][$i],
                    "resting_place_5" => $data['resting_place_5'][$i],
                    "resting_place_6" => $data['resting_place_6'][$i],
                    "abdo_uf" => $data['abdo_uf'][$i],
                    "abdo_f" => $data['abdo_f'][$i],
                    "abdo_sg" => $data['abdo_sg'][$i],
                    "abdo_g" => $data['abdo_g'][$i],
                    "males" => $data['males'][$i],
                    "resting_place_1_mansonia" => $data['resting_place_1_mansonia'][$i],
                    "resting_place_2_mansonia" => $data['resting_place_2_mansonia'][$i],
                    "resting_place_3_mansonia" => $data['resting_place_3_mansonia'][$i],
                    "resting_place_4_mansonia" => $data['resting_place_4_mansonia'][$i],
                    "resting_place_5_mansonia" => $data['resting_place_5_mansonia'][$i],
                    "resting_place_6_mansonia" => $data['resting_place_6_mansonia'][$i],
                    "abdo_uf_ma" => $data['abdo_uf_ma'][$i],
                    "abdo_f_ma" => $data['abdo_f_ma'][$i],
                    "abdo_sg_ma" => $data['abdo_sg_ma'][$i],
                    "abdo_g_ma" => $data['abdo_g_ma'][$i],
                    "males_ma" => $data['males_ma'][$i],
                    "user_name" => Auth::user()->email,
                    "no_of_infrcted" => $data['no_of_infrcted'][$i],
                    "no_of_infective" => $data['no_of_infective'][$i],
                    "no_of_infrcted_ma" => $data['no_of_infrcted_ma'][$i],
                    "no_of_infective_ma" => $data['no_of_infective_ma'][$i],
                    "no_of_dissected" => $data['no_of_dissected'][$i],
                    "no_of_dissected_ma" => $data['no_of_dissected_ma'][$i]
                ];
                $success = Ento_01_data::create($ento1data2);
            }
        }
        $this->ento1_auto($ento_01_id);


        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }








    //     public function newview_all(Request $request)
    //     {
    //      $from="";
    //      $to="";
    //      $data = $request->all();
    //      if (empty($data['from'])) {
    //          if (Auth::user()->role === "RMO" ||  Auth::user()->role === "PHLT") 
    //         {
    //             $data=\App\Ento_01::with('ento_01_dataes')->where("district",Auth::user()->district)->get();
    //         } 
    //         else if (Auth::user()->role === "ADMIN" || Auth::user()->role === "AFC") 
    //         {
    //             $data=\App\Ento_01::with('ento_01_dataes')->get();
    //         } else {
    //            $data=\App\Ento_01::with('ento_01_dataes')->where("user_name",Auth::user()->email)->get();
    //         }
    //      }
    //      else
    //     {
    //      $from= $data['from'];
    //      $to=$data['to'];
    //          if (Auth::user()->role === "RMO" ||  Auth::user()->role === "PHLT") {
    //             $ento1 = DB::table('ento_01')
    //                 ->select('*')
    //                 ->where('district', Auth::user()->district)
    //                 ->WhereBetween('date', [$from, $to])
    //                 ->orderBy('ento_01_id', 'desc')
    //                 ->get();
    //         } else if (Auth::user()->role === "ADMIN" || Auth::user()->role === "AFC") {
    //             $ento1 = DB::table('ento_01')
    //                 ->select('*')
    //                 ->WhereBetween('date', [$from, $to])
    //                 ->orderBy('ento_01_id', 'desc')
    //                 ->get();
    //         } else {
    //             $ento1 = DB::table('ento_01')
    //                 ->select('*')
    //                 ->where('user_name', Auth::user()->email)
    //                 ->WhereBetween('date', [$from, $to])
    //                 ->orderBy('ento_01_id', 'desc')
    //                 ->get();
    //         }
    // }
    //         $district = DB::table('district')
    //             ->select('*')
    //             ->get();
    //         $data['template'] = 'ento_01/ento_01_Newview';
    //         return view('template_user/template', compact('data'), ["ento1_list" => $data, "district_list" => $district  , "from" => $from   , "to" => $to]);
    //     }


    public function delete_ento1_data_new($id)
    {
        $res = Ento_01_data::where('id', $id)->delete();



        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }
}
