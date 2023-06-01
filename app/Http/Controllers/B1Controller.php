<?php

namespace App\Http\Controllers;

require __DIR__ . '/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class B1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public  $total_no_of_premises_total = 0;
    public  $total_no_of_premises_positive_total = 0;
    public  $total_total_mosquitos_collected_total = 0;
    public  $total_pcr_total = 0;
    public  $total_no_of_dissected_total = 0;
    public  $total_total_postive_cx_total = 0;
    public  $total_infective_total = 0;
    public  $cach_time_total = 0;




    public  $District_total_no_of_premises_total = 0;
    public  $District_total_no_of_premises_positive_total = 0;
    public  $District_total_total_mosquitos_collected_total = 0;
    public  $District_total_pcr_total = 0;
    public  $District_total_no_of_dissected_total = 0;
    public  $District_total_total_postive_cx_total = 0;
    public  $District_total_infective_total = 0;
    public  $District_cach_time_total = 0;


    public  $province_total_no_of_premises_total = 0;
    public  $province_total_no_of_premises_positive_total = 0;
    public  $province_total_total_mosquitos_collected_total = 0;
    public  $province_total_pcr_total = 0;
    public  $province_total_no_of_dissected_total = 0;
    public  $province_total_total_postive_cx_total = 0;
    public  $province_total_infective_total = 0;
    public  $province_cach_time_total = 0;




    public $district_total = " ";


    public function b1_report_print(Request $request)
    {
        $old_data_1 = array();
        $old_data_2 = array();
        $old_data_3 = array();
        $old_data_4 = array();

        $data = $request->all();
        $from = $data['from'];
        $to = $data['to'];
        $export_type = $data['export_type'];
        $district = $data['district'];
        $species = $data['species'];
        $viewData = " ";

        if ("Cx" == $species) {

            $page = 'report/b1_view';
        } else {
            $page = 'report/b1_view_man';
        }

        $type = "district";

        if ($district == 'all') {
            $type = "srilanka";

            $district = DB::table('district')
                ->orderBy('district', 'ASC')
                ->select('*')
                ->get();


            // western province
            // CMC
            // Colombo
            // Gampaha
            // Kalutara

            // Southern Province
            //    Galle
            //    Matara
            //    Hambantota

            //    North Western Province
            //    Kurunegala
            //    Puttalam

            // Sri Lanka
            // Non endemic
            $district_Arrray = array("CMC", "Colombo", "Gampaha", "Kalutara", "Galle", "Matara", "Hambantota", "Kurunegala", "Puttalam", "Non endemic");

            foreach ($district_Arrray as $key) {
                $ento2 = "";
                $district = $key;
                $ento1 = $this->get_ento1_data($from, $to, $district, $species, $type);

                if ("Cx" == $species) {
                    $ento2 = $this->get_ento2_data($from, $to, $district, $species, $type);
                }

                $ento3 = $this->get_ento3_data($from, $to, $district, $species, $type);
                $ento4 = $this->get_ento4_data($from, $to, $district, $species, $type);

                $viewData = $viewData .  $ento1;
                if ("Cx" == $species) {
                    $viewData = $viewData . $ento2;
                }
                $viewData = $viewData . $ento3;   // ento 2 data get funtion
                $viewData = $viewData . $ento4;
                if ($ento1 != "" ||   $ento2 != ""  ||   $ento3 != "" ||   $ento4 != "") {
                    $viewData = $viewData . $this->get_total_row($type);
                }

                if ($key == "Kalutara") {
                    $viewData = $viewData . $this->get_total_row($type, "province", "western province");
                }
                 if ($key == "Hambantota") {
                     $viewData = $viewData . $this->get_total_row($type, "province", "Southern Province");
                 }
                 if ($key == "Puttalam") {
                 $viewData = $viewData . $this->get_total_row($type, "province", "North Western Province");
                }
                 if ($key == "Non endemic") {
                     $viewData = $viewData . $this->get_total_row($type, "province", "Non endemic");
                 }
            }
            $viewData = $viewData . $this->get_total_row($type, "final");   //

        } else {
            $viewData = $this->get_ento1_data($from, $to, $district, $species);
            if ("Cx" == $species) {
                $viewData = $viewData . $this->get_ento2_data($from, $to, $district, $species);
            }
            $viewData = $viewData . $this->get_ento3_data($from, $to, $district, $species);   // ento 2 data get funtion
            $viewData = $viewData . $this->get_ento4_data($from, $to, $district, $species);   // en
            $viewData = $viewData . $this->get_total_row($type);   // en
        }

        if ($export_type == 'PDF') {
            $content = ob_get_clean();
            // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
            // File::requireOnce($html2pdf_path);
            $template = view(
                $page,
                compact('data'),
                ["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to'], 'type' => $type]
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
                $page,
                compact('data'),
                ["dataView" => $viewData, 'district' => $data['district']]
            );
        } else {
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=download.xls');
            echo $template = view(
                $page,
                compact('data'),
                ["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to'], 'type' => $type]
            );
        }
    }





    public function    get_total_row($type, $final = null, $province = null)
    {
        $total_no_of_dissected = $this->total_no_of_dissected_total;
        $total_total_postive_cx = $this->total_total_postive_cx_total;
        $total_infective = $this->total_infective_total;
        $total_total_mosquitos_collected = $this->total_total_mosquitos_collected_total;
        $total_no_of_premises =  $this->total_no_of_premises_total;
        $total_no_of_premises_positive = $this->total_no_of_premises_positive_total;
        $total_total_time_spend = $this->cach_time_total;

        $District_total_no_of_dissected = $this->District_total_no_of_dissected_total;
        $District_total_total_postive_cx = $this->District_total_total_postive_cx_total;
        $District_total_infective = $this->District_total_infective_total;
        $District_total_total_mosquitos_collected = $this->District_total_total_mosquitos_collected_total;
        $District_total_no_of_premises =  $this->District_total_no_of_premises_total;
        $District_total_no_of_premises_positive = $this->District_total_no_of_premises_positive_total;
        $District_total_total_time_spend = $this->District_cach_time_total;



        $province_total_no_of_dissected = $this->province_total_no_of_dissected_total;
        $province_total_total_postive_cx = $this->province_total_total_postive_cx_total;
        $province_total_infective = $this->province_total_infective_total;
        $province_total_total_mosquitos_collected = $this->province_total_total_mosquitos_collected_total;
        $province_total_no_of_premises =  $this->province_total_no_of_premises_total;
        $province_total_no_of_premises_positive = $this->province_total_no_of_premises_positive_total;
        $province_total_total_time_spend = $this->province_cach_time_total;

        $District_total_pcr = $this->District_total_pcr_total;
        if ($District_total_no_of_dissected != 0) {
            $District_total_infective_t = round((($District_total_total_postive_cx / $District_total_no_of_dissected) * 100), 2);
            $District_total_infected = round((($District_total_infective / $District_total_no_of_dissected) * 100), 2);
        } else {
            $District_total_infective_t = 0;
            $District_total_infected = 0;
        }

        if ($District_total_total_time_spend == 0) {
            $District_total_row = 0;
        } else {
            $District_total_row = round((($District_total_total_mosquitos_collected / $District_total_total_time_spend)), 2);
        }



        $viewData = "";
        $total_pcr = $this->total_pcr_total;

        if ($total_no_of_dissected != 0) {
            $total_infective_t = round((($total_total_postive_cx / $total_no_of_dissected) * 100), 2);
            $total_infected = round((($total_infective / $total_no_of_dissected) * 100), 2);
        } else {
            $total_infective_t = 0;
            $total_infected = 0;
        }

        if ($total_total_time_spend == 0) {
            $total_row = 0;
        } else {
            $total_row = round((($total_total_mosquitos_collected / $total_total_time_spend)), 2);
        }




        $province_total_pcr = $this->province_total_pcr_total;

        if ($province_total_no_of_dissected != 0) {
            $province_total_infective_t = round((($province_total_total_postive_cx / $province_total_no_of_dissected) * 100), 2);
            $province_total_infected = round((($province_total_infective / $province_total_no_of_dissected) * 100), 2);
        } else {
            $province_total_infective_t = 0;
            $province_total_infected = 0;
        }

        if ($province_total_total_time_spend == 0) {
            $province_total_row = 0;
        } else {
            $province_total_row = round((($province_total_total_mosquitos_collected / $province_total_total_time_spend)), 2);
        }





        if ($total_no_of_premises != 0) {



            if ($final == 'province') {
                $viewData = $viewData .
                    '<tr style="  background-color:#f1c4b6;">' .
                    '<td>' . $province . '</td>' .
                    '<td></td>' .
                  
                    '<td></td>' .
                    '<td></td>' .
                    '<td> </td>' .
                    '<td>' . $province_total_no_of_premises . '</td>' .
                    '<td>' . $province_total_no_of_premises_positive . '</td>' .
                    '<td>' . round((($province_total_no_of_premises_positive / $province_total_no_of_premises) * 100), 2) . '</td>' . // round((($total_no_of_premises_positive / $total_no_of_premises) * 100)/$total_no_of_collectors,2)
                    '<td>' . $province_total_total_time_spend . '</td>' .
                    '<td> 0 </td>' . //'<td>' . $total_row. '</td>' .
                    '<td>' . $province_total_total_mosquitos_collected . '</td>' .
                    '<td>' . $province_total_pcr . '</td>' .
                    '<td>' . $province_total_no_of_dissected . '</td>' .
                    '<td>' . $province_total_total_postive_cx . '</td>' . /* $infected */
                    '<td>' . $province_total_infective . '</td>' .
                    '<td>' . $province_total_infective_t . '</td>' .
                    '<td>' . $province_total_infected . '</td>
               </tr>';
                $this->province_total_no_of_premises_total = 0;
                $this->province_total_no_of_premises_positive_total = 0;
                $this->province_total_total_mosquitos_collected_total = 0;
                $this->province_total_pcr_total = 0;
                $this->province_total_no_of_dissected_total = 0;
                $this->province_total_total_postive_cx_total = 0;
                $this->province_total_infective_total = 0;
                $this->province_cach_time_total = 0;

                return   $viewData;
            }







            if ($type != 'srilanka') {
                $viewData = $viewData .
                    '<tr>' .
                    '<td>Total</td>' .
                    '<td></td>' .
                    '<td></td>' .
                    '<td> </td>' .
                    '<td>' . $total_no_of_premises . '</td>' .
                    '<td>' . $total_no_of_premises_positive . '</td>' .
                    '<td>' . round((($total_no_of_premises_positive / $total_no_of_premises) * 100), 2) . '</td>' . // round((($total_no_of_premises_positive / $total_no_of_premises) * 100)/$total_no_of_collectors,2)
                    '<td>' . $total_total_time_spend . '</td>' .
                    '<td> 0 </td>' . //'<td>' . $total_row. '</td>' .
                    '<td>' . $total_total_mosquitos_collected . '</td>' .
                    '<td>' . $total_pcr . '</td>' .
                    '<td>' . $total_no_of_dissected . '</td>' .
                    '<td>' . $total_total_postive_cx . '</td>' . /* $infected */
                    '<td>' . $total_infective . '</td>' .
                    '<td>' . $total_infective_t . '</td>' .
                    '<td>' . $total_infected . '</td>
</tr>';
            } else {

                if ($final == "final") {
                    $viewData = $viewData .
                        '<tr>' .
                        '<td>  Sri Lanka</td>' .
                        '<td></td>' .
                        '<td></td>' .
                        '<td></td>' .
                        '<td> </td>' .
                        '<td>' . $total_no_of_premises . '</td>' .
                        '<td>' . $total_no_of_premises_positive . '</td>' .
                        '<td>' . round((($total_no_of_premises_positive / $total_no_of_premises) * 100), 2) . '</td>' . // round((($total_no_of_premises_positive / $total_no_of_premises) * 100)/$total_no_of_collectors,2)
                        '<td>' . $total_total_time_spend . '</td>' .
                        '<td> 0 </td>' . //'<td>' . $total_row. '</td>' .
                        '<td>' . $total_total_mosquitos_collected . '</td>' .
                        '<td>' . $total_pcr . '</td>' .
                        '<td>' . $total_no_of_dissected . '</td>' .
                        '<td>' . $total_total_postive_cx . '</td>' . /* $infected */
                        '<td>' . $total_infective . '</td>' .
                        '<td>' . $total_infective_t . '</td>' .
                        '<td>' . $total_infected . '</td>
               </tr>';
                } else {
                    $viewData = $viewData .
                        '<tr style="  background-color:#cbf18e;">' .
                        '<td></td>' .
                        '<td> District Total</td>' .
                        '<td></td>' .
                        '<td></td>' .
                        '<td> </td>' .
                        '<td>' . $District_total_no_of_premises . '</td>' .
                        '<td>' . $District_total_no_of_premises_positive . '</td>' .
                        '<td>' . round((($District_total_no_of_premises_positive / $District_total_no_of_premises) * 100), 2) . '</td>' . // round((($total_no_of_premises_positive / $total_no_of_premises) * 100)/$total_no_of_collectors,2)
                        '<td>' . $District_total_total_time_spend . '</td>' .
                        '<td> 0 </td>' . //'<td>' . $total_row. '</td>' .
                        '<td>' . $District_total_total_mosquitos_collected . '</td>' .
                        '<td>' . $District_total_pcr . '</td>' .
                        '<td>' . $District_total_no_of_dissected . '</td>' .
                        '<td>' . $District_total_total_postive_cx . '</td>' . /* $infected */
                        '<td>' . $District_total_infective . '</td>' .
                        '<td>' . $District_total_infective_t . '</td>' .
                        '<td>' . $District_total_infected . '</td>
               </tr>';
        

                    $this->province_total_no_of_dissected_total += $this->District_total_no_of_dissected_total;
                    $this->province_total_total_postive_cx_total += $this->District_total_total_postive_cx_total;
                    $this->province_total_infective_total += $this->District_total_infective_total;
                    $this->province_total_total_mosquitos_collected_total += $this->District_total_total_mosquitos_collected_total;
                    $this->province_total_no_of_premises_total += $this->District_total_no_of_premises_total;
                    $this->province_total_no_of_premises_positive_total += $this->District_total_no_of_premises_positive_total;
                    $this->province_cach_time_total += $this->District_cach_time_total;

                    $this->District_total_no_of_premises_total = 0;
                    $this->District_total_no_of_premises_positive_total = 0;
                    $this->District_total_total_mosquitos_collected_total = 0;
                    $this->District_total_pcr_total = 0;
                    $this->District_total_no_of_dissected_total = 0;
                    $this->District_total_total_postive_cx_total = 0;
                    $this->District_total_infective_total = 0;
                    $this->District_cach_time_total = 0;


                }
            }
        }


        return   $viewData;
    }










    public function  get_ento1_data($from, $to, $district, $species, $type = null)
    {

        $sub_total_o_of_premises = 0;
        $sub_total_o_of_premises_positive = 0;
        $sub_total_ach_time = 0;
        $sub_total_osquitodensity = 0;
        $sub_total_otal_mosquitos_collected = 0;
        $sub_total_o_of_dissected = 0;
        $sub_total_otal_postive = 0;
        $sub_total_nfective = 0;

        $viewData = "";
        $alldata_ento_1 = array();
        $total_no_of_collectors = 0;

        if ($district == 'all') {
            $ento_1_form_data = \App\Ento_01::with('ento_01_dataes')->whereBetween('date', [$from, $to])->get();
        } else {
            $ento_1_form_data = \App\Ento_01::with('ento_01_dataes')->whereBetween('date', [$from, $to])->where("district", $district)->get();
        }

        if (empty(count($ento_1_form_data))) {
            return   $viewData;
            die();
        }

        foreach ($ento_1_form_data as  $ento_1_form_data_row) {

            $name_of_heo = $ento_1_form_data_row->name_of_heo;
            $moh_area = $ento_1_form_data_row->moh_area;
            $phi_and_phm = $ento_1_form_data_row->phi_and_phm;
            $gn_divison = $ento_1_form_data_row->gn_divison;
            $no_of_collectors = $ento_1_form_data_row->no_of_collectors;
            $total_no_of_collectors = $total_no_of_collectors + $no_of_collectors;
            $no_of_premises = 1;
            // need add filed to db to count permisess postive for mansoniay





            $total_time_spend = $ento_1_form_data_row->total_time_spend;

            foreach ($ento_1_form_data_row->ento_01_dataes as  $ento_1_form_data_datea) {

                $data9d = $ento_1_form_data_datea->id;
                $no_of_premises_positive = 0;


                if ("Cx" == $species) {
                    $total_mosquitos_collected = $ento_1_form_data_datea->no_of_culex;
                    if (1 == $ento_1_form_data_datea->no_of_pre_postive_cx) {
                        $no_of_premises_positive = 1;
                    };
                } else {
                    $total_mosquitos_collected = $ento_1_form_data_datea->no_of_mosq;
                    if (1 ==  $ento_1_form_data_datea->no_of_pre_postive_man) {
                        $no_of_premises_positive = 1;
                    };
                }




                // get premises postive calculation
                if ($no_of_premises == "" or $no_of_premises == 0) {
                    $premises_posotive = 0;
                } else {
                    $premises_posotive = ($no_of_premises_positive / $no_of_premises) * 100;
                    $premises_posotive = round($premises_posotive, 2);
                }

                //          get time // time inser by housrs 

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


                $infective = 0;

                $no_of_dissected = 0;
                $positive_mosq = 0;
                foreach ($Ento_01_data as  $Ento_01_data2) {
                    foreach ($Ento_01_data2->Ento_5_news as  $Ento_5_news_each) {
                        if ($Ento_5_news_each->main_form_data_id ==    $data9d) {

                            if ($Ento_5_news_each->species2 == $species || $Ento_5_news_each->species2 == "CX" && $species == "Cx") {
                                $no_of_dissected += $Ento_5_news_each->no_dissected_mosquitos;
                                $positive_mosq += $Ento_5_news_each->positive_mosq;
                                $infective = $infective + $Ento_5_news_each->mq_postive_for_l3;
                            }
                        }
                    }
                }









                if (empty($no_of_dissected)) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($positive_mosq / $no_of_dissected) * 100;
                    $infectivepercentage = ($infective / $no_of_dissected) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }

                $alldata_ento_1[] = array(
                    "name_of_heo" => $name_of_heo,
                    "moh_area" => $moh_area,
                    "phi_and_phm" => $phi_and_phm,
                    "gn_divison" => $gn_divison,
                    "ENTO_01" => "ENTO_01",
                    "no_of_premises" => $no_of_premises,
                    "no_of_premises_positive" => $no_of_premises_positive,
                    "premises_posotive" => $premises_posotive,
                    "cach_time" => $cach_time,
                    "mosquitodensity" => $mosquitodensity,
                    "total_mosquitos_collected" => $total_mosquitos_collected,
                    "no_of_dissected" => $no_of_dissected,
                    "total_postive" => $positive_mosq,
                    "infective" => $infective,
                    "infectedpercentage" => $infectedpercentage,
                    "infectivepercentage" => $infectivepercentage,
                );
            }
        }







        // faind same moh and phi conactinate and merging to array
        $total_result1 = array();
        foreach ($alldata_ento_1 as $value) {
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
                        "premises_posotive" => ($value['premises_posotive'] + $value2['premises_posotive']),
                        "cach_time" => ($value['cach_time']),
                        "mosquitodensity" => (round((($value['total_mosquitos_collected'] + $value2['total_mosquitos_collected']) / ($value['cach_time'])), 2)),
                        "total_mosquitos_collected" => ($value['total_mosquitos_collected'] + $value2['total_mosquitos_collected']),
                        "no_of_dissected" => ($value['no_of_dissected'] + $value2['no_of_dissected']),
                        "total_postive" => ($value['total_postive'] + $value2['total_postive']),
                        "infective" => ($value['infective'] + $value2['infective']),
                        "infectedpercentage" => '',
                        "infectivepercentage" => '',
                    );
                    $faind = 1;
                }
                $x++;
            }
            if ($faind == 0) {
                $total_result1[] = $value;
            }
        }

        //marginf data need to recalculate this  for re calculate data 
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
                $infectedpercentage = ($total_result1_value2['total_postive'] / $total_result1_value2['no_of_dissected']) * 100;
                $infectivepercentage = ($total_result1_value2['infective'] / $total_result1_value2['no_of_dissected']) * 100;
                $infectedpercentage = round($infectedpercentage, 2);
                $infectivepercentage = round($infectivepercentage, 2);
            }
            /////////////////////////////////////////////


            if ($type == null) {


                $viewData = $viewData .
                    '<tr>' .
                    '<td>IHC</td>' .
                    '<td>' . $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' . $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' . $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' . $poscx . '</td>' .
                    '<td>' . $total_result1_value2['cach_time'] . '</td>' .
                    '<td>' . $total_result1_value2['mosquitodensity'] . '</td>' .
                    '<td>' . $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td> 0 </td>' .
                    '<td>' . $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' . $total_result1_value2['total_postive'] . '</td>' . /* $infected */
                    '<td>' . $total_result1_value2['infective'] . '</td>' .
                    '<td>' . $infectedpercentage . '</td>' .
                    '<td>' . $infectivepercentage . '</td>
                </tr>';
            } else {
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' . $district . '</td>' .
                    '<td>IHC</td>' .
                    '<td>' . $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' . $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' . $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' . $poscx . '</td>' .
                    '<td>' . $total_result1_value2['cach_time'] . '</td>' .
                    '<td>' . $total_result1_value2['mosquitodensity'] . '</td>' .
                    '<td>' . $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td> 0 </td>' .
                    '<td>' . $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' . $total_result1_value2['total_postive'] . '</td>' . /* $infected */
                    '<td>' . $total_result1_value2['infective'] . '</td>' .
                    '<td>' . $infectedpercentage . '</td>' .
                    '<td>' . $infectivepercentage . '</td>
                </tr>';
            }



            $this->cach_time_total = $this->cach_time_total + $total_result1_value2['cach_time'];
            $this->total_no_of_premises_total = $this->total_no_of_premises_total + $total_result1_value2['no_of_premises'];
            $this->total_no_of_premises_positive_total = $this->total_no_of_premises_positive_total + $total_result1_value2['no_of_premises_positive'];
            $this->total_total_mosquitos_collected_total = $this->total_total_mosquitos_collected_total + $total_result1_value2['total_mosquitos_collected'];
            $this->total_no_of_dissected_total = $this->total_no_of_dissected_total + $total_result1_value2['no_of_dissected'];
            $this->total_total_postive_cx_total = $this->total_total_postive_cx_total + $total_result1_value2['total_postive'];
            $this->total_infective_total = $this->total_infective_total + $total_result1_value2['infective'];

            $this->District_cach_time_total = $this->District_cach_time_total + $total_result1_value2['cach_time'];
            $this->District_total_no_of_premises_total = $this->District_total_no_of_premises_total + $total_result1_value2['no_of_premises'];
            $this->District_total_no_of_premises_positive_total = $this->District_total_no_of_premises_positive_total + $total_result1_value2['no_of_premises_positive'];
            $this->District_total_total_mosquitos_collected_total = $this->District_total_total_mosquitos_collected_total + $total_result1_value2['total_mosquitos_collected'];
            $this->District_total_no_of_dissected_total = $this->District_total_no_of_dissected_total + $total_result1_value2['no_of_dissected'];
            $this->District_total_total_postive_cx_total = $this->District_total_total_postive_cx_total + $total_result1_value2['total_postive'];
            $this->District_total_infective_total = $this->District_total_infective_total + $total_result1_value2['infective'];








            // ento1 all data total
            $sub_total_o_of_premises += $total_result1_value2['no_of_premises'];
            $sub_total_o_of_premises_positive += $total_result1_value2['no_of_premises_positive'];
            $sub_total_ach_time += $total_result1_value2['cach_time'];
            $sub_total_osquitodensity += $total_result1_value2['mosquitodensity'];
            $sub_total_otal_mosquitos_collected += $total_result1_value2['total_mosquitos_collected'];
            $sub_total_o_of_dissected += $total_result1_value2['no_of_dissected'];
            $sub_total_otal_postive += $total_result1_value2['total_postive'];
            $sub_total_nfective += $total_result1_value2['infective'];
        }

        ////////////////////////////////////////////////////////////////
        if ($sub_total_o_of_premises == "" or $sub_total_o_of_premises == 0) {
            $poscx = 0;
        } else {
            $poscx = ($sub_total_o_of_premises_positive / $sub_total_o_of_premises) * 100;
            $poscx = round($poscx, 2);
        }
        if (empty($sub_total_o_of_dissected)) {
            $infectedpercentage = '0';
            $infectivepercentage = '0';
        } else {
            $infectedpercentage = ($sub_total_otal_postive / $sub_total_o_of_dissected) * 100;
            $infectivepercentage = ($sub_total_nfective / $sub_total_o_of_dissected) * 100;
            $infectedpercentage = round($infectedpercentage, 2);
            $infectivepercentage = round($infectivepercentage, 2);
        }
        /////////////////////////////////////////////


        if (empty($sub_total_ach_time == "" or $sub_total_ach_time == 0)) {
            $sub_dencity = $sub_total_otal_mosquitos_collected / $sub_total_ach_time;
            $sub_dencity =round($sub_dencity, 2);
        } else {
            $sub_dencity = 0;
        }


        if ($type == null) {
            $viewData = $viewData .
                '<tr style="  background-color:#e1f0c9;">' .
                '<td>Sub total <br> IHC</td>' .
                '<td></td>' .
                '<td></td>' .
                '<td></td>' .
                '<td>' .  $sub_total_o_of_premises . '</td>' .
                '<td>' .  $sub_total_o_of_premises_positive . '</td>' .
                '<td>' . $poscx . '</td>' .
                '<td>' . $sub_total_ach_time . '</td>' .
                '<td>' . $sub_dencity . '</td>' .
                '<td>' . $sub_total_otal_mosquitos_collected . '</td>' .
                '<td> 0 </td>' .
                '<td>' . $sub_total_o_of_dissected . '</td>' .
                '<td>' . $sub_total_otal_postive . '</td>' . /* $infected */
                '<td>' . $sub_total_nfective . '</td>' .
                '<td>' . $infectedpercentage . '</td>' .
                '<td>' . $infectivepercentage . '</td>
            </tr>';
        } else {
            $viewData = $viewData .
                '<tr style="  background-color:#e1f0c9;">' .
                '<td>' . $district . '</td>' .
                '<td>Sub total <br> IHC</td>' .
                '<td></td>' .
                '<td></td>' .
                '<td></td>' .
                '<td>' .  $sub_total_o_of_premises . '</td>' .
                '<td>' .  $sub_total_o_of_premises_positive . '</td>' .
                '<td>' . $poscx . '</td>' .
                '<td>' . $sub_total_ach_time . '</td>' .
                '<td>' . $sub_dencity . '</td>' .
                '<td>' . $sub_total_otal_mosquitos_collected . '</td>' .
                '<td> 0 </td>' .
                '<td>' . $sub_total_o_of_dissected . '</td>' .
                '<td>' . $sub_total_otal_postive . '</td>' . /* $infected */
                '<td>' . $sub_total_nfective . '</td>' .
                '<td>' . $infectedpercentage . '</td>' .
                '<td>' . $infectivepercentage . '</td>
            </tr>';
        }
        return   $viewData;
    }






    public function  get_ento2_data($from, $to, $district, $species, $type = null)
    {
        $alldata_ento_2 = array();
        $viewData = "";
        $total_no_of_collectors = 0;

        if ($district == 'all') {
            $ento_2_form_data = \App\Ento_02::with('ento_02_dataes')->whereBetween('date', [$from, $to])->get();
        } else {
            $ento_2_form_data = \App\Ento_02::with('ento_02_dataes')->whereBetween('date', [$from, $to])->where("district", $district)->get();
        }


        if (empty(count($ento_2_form_data))) {
            return   $viewData;
        }

        foreach ($ento_2_form_data as  $ento_2_form_data_row) {
            $pcr = 0;
            $no_of_dissected = 0;
            $ento_02_id = $ento_2_form_data_row['ento_02_id'];

            $name_of_heo = $ento_2_form_data_row->name_of_heo;
            $moh_area = $ento_2_form_data_row->moh_area;
            $phi_and_phm = $ento_2_form_data_row->phm_area;

            foreach ($ento_2_form_data_row->ento_02_dataes as  $data2_data) {

                $entoData_id = $data2_data->id;
                $gn_divison = $data2_data->gn_division;

                $Ento_05_data22 = \App\Ento_02_data::with('Ento_5_news')->where("ento_02_id", $ento_02_id)
                    ->join('ento_05_new', function ($join) use ($entoData_id, $to) {
                        $join->on('ento_05_new.main_form_data_id', '=', 'ento_02_data.id')
                            ->where('ento_02_data.id', $entoData_id)
                            ->where('ento_05_new.main_form_type', "ento_02");
                    })->get();

                if ($Ento_05_data22) {
                    $no_of_premises = 1;
                } else {
                    $no_of_premises = 0;
                }

                $total_mosquitos_collected = $data2_data->total_cx_quin;
                $pcr  = ($data2_data->No_mos_1 + $data2_data->No_mos_2);
                $no_of_dissected = 0;
                // get promiss postive 

                $no_of_premises_positive_data = \App\Ento_02_data::where("ento_02_id", $ento_02_id)
                    ->join('ento_05_new', function ($join) use ($entoData_id, $to) {
                        $join->on('ento_05_new.main_form_data_id', '=', 'ento_02_data.id')
                            ->where('ento_05_new.main_form_type', "ento_02")
                            ->where('ento_02_data.id', $entoData_id)
                            ->where('ento_02_data.total_cx_quin', '!=', 0);
                    })->get();
                // echo "<pre>";
                // print_r(  $no_of_premises_positive_data);
                // echo "</pre>";
                if ($data2_data->total_cx_quin != 0) {
                    $no_of_premises_positive = 1;
                };

                $infective = 0;

                $positive_mosq = 0;

                $Ento_05_data = \App\Ento_02_data::with('Ento_5_news')->where("ento_02_id", $ento_02_id)->get();
                foreach ($Ento_05_data as  $ento_2_form_data_row2) {

                    if ($ento_2_form_data_row2->id =  $entoData_id) {
                        foreach ($ento_2_form_data_row2->Ento_5_news as  $Ento_5_news_each) {
                            if ($Ento_5_news_each->main_form_data_id ==    $entoData_id) {
                                $no_of_dissected += $Ento_5_news_each->no_dissected_mosquitos;
                                if ($Ento_5_news_each->species2 == $species || $Ento_5_news_each->species2 == "CX" && $species == "Cx") {
                                    $positive_mosq += $Ento_5_news_each->positive_mosq;
                                    $infective = $infective + $Ento_5_news_each->mq_postive_for_l3;
                                }
                            }
                        }
                    }
                }





                if ($no_of_premises == "" or $no_of_premises == 0) {
                    $premises_posotive = 0;
                } else {
                    $premises_posotive = ($no_of_premises_positive / $no_of_premises) * 100;
                    $premises_posotive = round($premises_posotive, 2);
                }

                if (empty($no_of_dissected)) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($positive_mosq / $no_of_dissected) * 100;
                    $infectivepercentage = ($infective / $no_of_dissected) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }

                // no data to proceeed in entoi 02
                $cach_time = 0;
                $mosquitodensity = 0;

                $alldata_ento_2[] = array(
                    "name_of_heo" => $name_of_heo,
                    "moh_area" => $moh_area,
                    "phi_and_phm" => $phi_and_phm,
                    "gn_divison" => $gn_divison,
                    "ENTO_01" => "ENTO_02",
                    "no_of_premises" => $no_of_premises,
                    "no_of_premises_positive" => $no_of_premises_positive,
                    "premises_posotive" => $premises_posotive,
                    "cach_time" => $cach_time,
                    "mosquitodensity" => $mosquitodensity,
                    "total_mosquitos_collected" => $total_mosquitos_collected,
                    "no_of_dissected" => $no_of_dissected,
                    "total_postive" => $positive_mosq,
                    "infective" => $infective,
                    "infectedpercentage" => $infectedpercentage,
                    "infectivepercentage" => $infectivepercentage,
                    "pcr" => $pcr,
                );
            }
        }
        // dd();

        // faind same moh and phi conactinate and merging to array
        $total_result1 = array();
        foreach ($alldata_ento_2 as $value) {
            $x = 0;
            $faind = 0;
            foreach ($total_result1 as $value2) {
                if (array_search($value['name_of_heo'], $value2, true) and array_search($value['gn_divison'], $value2, true)) {

                    $total_result1[$x] = array(
                        "name_of_heo" => $value['name_of_heo'],
                        "moh_area" => $value['moh_area'],
                        "phi_and_phm" => $value['phi_and_phm'],
                        "gn_divison" => $value['gn_divison'],
                        "ENTO_01" => "ENTO_02",
                        "no_of_premises" => ($value['no_of_premises'] + $value2['no_of_premises']),
                        "no_of_premises_positive" => ($value['no_of_premises_positive'] + $value2['no_of_premises_positive']),
                        "premises_posotive" => ($value['premises_posotive'] + $value2['premises_posotive']),
                        "cach_time" => 0,
                        "mosquitodensity" => 0,
                        "total_mosquitos_collected" => ($value['total_mosquitos_collected'] + $value2['total_mosquitos_collected']),
                        "no_of_dissected" => ($value['no_of_dissected'] + $value2['no_of_dissected']),
                        "total_postive" => ($value['total_postive'] + $value2['total_postive']),
                        "infective" => ($value['infective'] + $value2['infective']),
                        "infectedpercentage" => '',
                        "infectivepercentage" => '',
                        "pcr" => ($value['pcr'] + $value2['pcr']),
                    );
                    $faind = 1;
                }
                $x++;
            }
            if ($faind == 0) {
                $total_result1[] = $value;
            }
        }



        $sub_total_o_of_premises = 0;
        $sub_total_o_of_premises_positive = 0;
        $sub_total_otal_mosquitos_collected = 0;
        $sub_total_PCR = 0;
        $sub_total_o_of_dissected = 0;
        $sub_total_otal_postive = 0;
        $sub_total_nfective = 0;

        //marginf data need to recalculate this  for re calculate data 
        foreach ($total_result1 as $total_result1_value2) {
            $tno_of_premises_positive = $total_result1_value2['no_of_premises_positive'];
            $tno_of_premises = $total_result1_value2['no_of_premises'];

            $tno_pcr = $total_result1_value2['pcr'];
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
                $infectedpercentage = ($total_result1_value2['total_postive'] / $total_result1_value2['no_of_dissected']) * 100;
                $infectivepercentage = ($total_result1_value2['infective'] / $total_result1_value2['no_of_dissected']) * 100;
                $infectedpercentage = round($infectedpercentage, 2);
                $infectivepercentage = round($infectivepercentage, 2);
            }
            /////////////////////////////////////////////



            if ($type == null) {
                $viewData = $viewData .
                    '<tr>' .
                    '<td>GT</td>' .
                    '<td>' . $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' . $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' . $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' . $poscx . '</td>' .
                    '<td>0</td>' .
                    '<td>0</td>' .
                    '<td>' . $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td>' . $tno_pcr . '</td>' .
                    '<td>' . $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' . $total_result1_value2['total_postive'] . '</td>' . /* $infected */
                    '<td>' . $total_result1_value2['infective'] . '</td>' .
                    '<td>' . $infectedpercentage . '</td>' .
                    '<td>' . $infectivepercentage . '</td>
                </tr>';
            } else {
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' . $district . '</td>' .
                    '<td>GT</td>' .
                    '<td>' . $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' . $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' . $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' . $poscx . '</td>' .
                    '<td>0</td>' .
                    '<td>0</td>' .
                    '<td>' . $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td>' . $tno_pcr . '</td>' .
                    '<td>' . $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' . $total_result1_value2['total_postive'] . '</td>' . /* $infected */
                    '<td>' . $total_result1_value2['infective'] . '</td>' .
                    '<td>' . $infectedpercentage . '</td>' .
                    '<td>' . $infectivepercentage . '</td>
            </tr>';
            }

            $this->cach_time_total = $this->cach_time_total + $total_result1_value2['cach_time'];
            $this->total_no_of_premises_total = $this->total_no_of_premises_total + $total_result1_value2['no_of_premises'];
            $this->total_no_of_premises_positive_total = $this->total_no_of_premises_positive_total + $total_result1_value2['no_of_premises_positive'];
            $this->total_total_mosquitos_collected_total = $this->total_total_mosquitos_collected_total + $total_result1_value2['total_mosquitos_collected'];
            $this->total_pcr_total = $this->total_pcr_total + $tno_pcr;
            $this->total_no_of_dissected_total = $this->total_no_of_dissected_total + $total_result1_value2['no_of_dissected'];
            $this->total_total_postive_cx_total = $this->total_total_postive_cx_total + $total_result1_value2['total_postive'];
            $this->total_infective_total = $this->total_infective_total + $total_result1_value2['infective'];




            $this->District_cach_time_total = $this->District_cach_time_total + $total_result1_value2['cach_time'];
            $this->District_total_no_of_premises_total = $this->District_total_no_of_premises_total + $total_result1_value2['no_of_premises'];
            $this->District_total_no_of_premises_positive_total = $this->District_total_no_of_premises_positive_total + $total_result1_value2['no_of_premises_positive'];
            $this->District_total_total_mosquitos_collected_total = $this->District_total_total_mosquitos_collected_total + $total_result1_value2['total_mosquitos_collected'];
            $this->District_total_pcr_total = $this->District_total_pcr_total + $tno_pcr;
            $this->District_total_no_of_dissected_total = $this->District_total_no_of_dissected_total + $total_result1_value2['no_of_dissected'];
            $this->District_total_total_postive_cx_total = $this->District_total_total_postive_cx_total + $total_result1_value2['total_postive'];
            $this->District_total_infective_total = $this->District_total_infective_total + $total_result1_value2['infective'];








            $sub_total_o_of_premises += $total_result1_value2['no_of_premises'];
            $sub_total_o_of_premises_positive += $total_result1_value2['no_of_premises_positive'];
            $sub_total_otal_mosquitos_collected += $total_result1_value2['total_mosquitos_collected'];



            $sub_total_PCR += $tno_pcr;
            $sub_total_o_of_dissected += $total_result1_value2['no_of_dissected'];
            $sub_total_otal_postive += $total_result1_value2['total_postive'];
            $sub_total_nfective += $total_result1_value2['infective'];
        }

        if ($sub_total_o_of_premises == "" or $sub_total_o_of_premises == 0) {
            $poscx = 0;
        } else {
            $poscx = ($sub_total_o_of_premises / $sub_total_o_of_premises) * 100;
            $poscx = round($poscx, 2);
        }
        if (empty($sub_total_o_of_dissected)) {
            $infectedpercentage = '0';
            $infectivepercentage = '0';
        } else {
            $infectedpercentage = ($sub_total_otal_postive / $sub_total_o_of_dissected) * 100;
            $infectivepercentage = ($sub_total_nfective / $sub_total_o_of_dissected) * 100;
            $infectedpercentage = round($infectedpercentage, 2);
            $infectivepercentage = round($infectivepercentage, 2);
        }
        /////////////////////////////////////////////



        if ($type == null) {
            $viewData = $viewData .
                '<tr  style="  background-color:#e1f0c9;">' .
                '<td >Sub total <br> GT</td>' .
                '<td></td>' .
                '<td></td>' .
                '<td></td>' .
                '<td>' . $sub_total_o_of_premises . '</td>' .
                '<td>' . $sub_total_o_of_premises_positive . '</td>' .
                '<td>' . $poscx . '</td>' .
                '<td>0</td>' .
                '<td>0</td>' .
                '<td>' . $sub_total_otal_mosquitos_collected . '</td>' .
                '<td>' . $sub_total_PCR . '</td>' .
                '<td>' . $sub_total_o_of_dissected . '</td>' .
                '<td>' . $sub_total_otal_postive . '</td>' . /* $infected */
                '<td>' . $sub_total_nfective . '</td>' .
                '<td>' . $infectedpercentage . '</td>' .
                '<td>' . $infectivepercentage . '</td>
        </tr>';
        } else {

            $viewData = $viewData .
                '<tr  style="background-color:#e1f0c9;">' .
                '<td>' . $district . '</td>' .
                '<td >Sub total <br> GT</td>' .
                '<td></td>' .
                '<td></td>' .
                '<td></td>' .
                '<td>' . $sub_total_o_of_premises . '</td>' .
                '<td>' . $sub_total_o_of_premises_positive . '</td>' .
                '<td>' . $poscx . '</td>' .
                '<td>0</td>' .
                '<td>0</td>' .
                '<td>' . $sub_total_otal_mosquitos_collected . '</td>' .
                '<td>' . $sub_total_PCR . '</td>' .
                '<td>' . $sub_total_o_of_dissected . '</td>' .
                '<td>' . $sub_total_otal_postive . '</td>' . /* $infected */
                '<td>' . $sub_total_nfective . '</td>' .
                '<td>' . $infectedpercentage . '</td>' .
                '<td>' . $infectivepercentage . '</td>
            </tr>';
        }





        //  dd("ias");
        return   $viewData;
    }








    public function  get_ento3_data($from, $to, $district, $species, $type = null)
    {
        $alldata_ento_3 = array();
        $viewData = "";
        $total_no_of_collectors = 1;

        if ($district == 'all') {
            $ento_3_form_data = \App\Ento_03::with('ento_03_dataes')->whereBetween('date_of_collection', [$from, $to])->get();
        } else {
            $ento_3_form_data = \App\Ento_03::with('ento_03_dataes')->whereBetween('date_of_collection', [$from, $to])->where("district", $district)->get();
        }






        if (empty(count($ento_3_form_data))) {
            return   $viewData;
            die();
        }
        // $data3 = \App\Ento_03_data::with('Ento_5_news')->where("ento_03_id", $id)->get();
        foreach ($ento_3_form_data as  $ento_3_form_data_row) {
            $pcr = 0;
            $ento_03_id = $ento_3_form_data_row['ento_03_id'];



            if ("Cx" == $species) {
                $Ento_05_data = \App\Ento_03_data::with('Ento_5_news')->where("ento_03_id", $ento_03_id)->where('mosq_species', 'like', 'Culex (culex) quinquefasciatus%')->get();
                // $total_mosquitos_collected
            } else {

                $Ento_05_data = \App\Ento_03_data::with('Ento_5_news')->where("ento_03_id", $ento_03_id)->where('mosq_species', 'like', 'Mansonia%')->get();
            }




            $name_of_heo = $ento_3_form_data_row->name_of_heo;
            $moh_area = $ento_3_form_data_row->moh;
            $phi_and_phm = $ento_3_form_data_row->phi;
            $no_of_premises = 1;
            $gn_divison = $ento_3_form_data_row->gn;
            $no_of_collectors = 1;
            $total_no_of_collectors = $total_no_of_collectors + $no_of_collectors;


            foreach ($Ento_05_data as  $ento_2_form_data_row) {
                $pcr +=  ($ento_2_form_data_row->No_mos_1 + $ento_2_form_data_row->No_mos_2);
            }

            if ("Cx" == $species) {
                $Ento_03_total_mosq = \App\Ento_03_data::with('Ento_5_news')->where("ento_03_id", $ento_03_id)->where('mosq_species', 'like', 'Culex (culex) quinquefasciatus%')
                    ->sum('no_of_mosq');
                // $total_mosquitos_collected
            } else {
                $Ento_03_total_mosq = \App\Ento_03_data::with('Ento_5_news')->where("ento_03_id", $ento_03_id)->where('mosq_species', 'like', 'Mansonia%')
                    ->sum('no_of_mosq');
            }


            if (empty($Ento_03_total_mosq)) {
                return   $viewData = "";
                die();
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


                    // if ($Ento_5_news_each->type_of_parasite == 'Brugia malayi' || $Ento_5_news_each->type_of_parasite == 'Wuchereria bancrofit') {
                    if ($Ento_5_news_each->species2 == $species || $Ento_5_news_each->species2 == "CX" && $species == "Cx") {
                        $no_of_dissected += $Ento_5_news_each->no_dissected_mosquitos;
                        $positive_mosq += $Ento_5_news_each->positive_mosq;
                        $infective = $infective + $Ento_5_news_each->mq_postive_for_l3;
                        // }
                    }
                }
            }

            if (empty($no_of_dissected)) {
                $infectedpercentage = '0';
                $infectivepercentage = '0';
            } else {
                $infectedpercentage = ($positive_mosq / $no_of_dissected) * 100;
                $infectivepercentage = ($infective / $no_of_dissected) * 100;
                $infectedpercentage = round($infectedpercentage, 2);
                $infectivepercentage = round($infectivepercentage, 2);
            }

            // no data to proceeed in entoi 02
            $cach_time = 0;
            $mosquitodensity = 0;

            $alldata_ento_3[] = array(
                "name_of_heo" => $name_of_heo,
                "moh_area" => $moh_area,
                "phi_and_phm" => $phi_and_phm,
                "gn_divison" => $gn_divison,
                "ENTO_01" => "ENTO_03",
                "no_of_premises" => $no_of_premises,
                "no_of_premises_positive" => $no_of_premises_positive,
                "premises_posotive" => $premises_posotive,
                "cach_time" => $cach_time,
                "mosquitodensity" => $mosquitodensity,
                "total_mosquitos_collected" => $total_mosquitos_collected,
                "no_of_dissected" => $no_of_dissected,
                "total_postive" => $positive_mosq,
                "infective" => $infective,
                "infectedpercentage" => $infectedpercentage,
                "infectivepercentage" => $infectivepercentage,
                "pcr" => $pcr,
            );
        }
        // faind same moh and phi conactinate and merging to array
        $total_result1 = array();
        foreach ($alldata_ento_3 as $value) {
            $x = 0;
            $faind = 0;
            foreach ($total_result1 as $value2) {
                if (array_search($value['name_of_heo'], $value2, true) and array_search($value['gn_divison'], $value2, true)) {

                    $total_result1[$x] = array(
                        "name_of_heo" => $value['name_of_heo'],
                        "moh_area" => $value['moh_area'],
                        "phi_and_phm" => $value['phi_and_phm'],
                        "gn_divison" => $value['gn_divison'],
                        "ENTO_03" => "ENTO_03",
                        "no_of_premises" => ($value['no_of_premises'] + $value2['no_of_premises']),
                        "no_of_premises_positive" => ($value['no_of_premises_positive'] + $value2['no_of_premises_positive']),
                        "premises_posotive" => ($value['premises_posotive'] + $value2['premises_posotive']),
                        "cach_time" => 0,
                        "mosquitodensity" => 0,
                        "total_mosquitos_collected" => ($value['total_mosquitos_collected'] + $value2['total_mosquitos_collected']),
                        "no_of_dissected" => ($value['no_of_dissected'] + $value2['no_of_dissected']),
                        "total_postive" => ($value['total_postive'] + $value2['total_postive']),
                        "infective" => ($value['infective'] + $value2['infective']),
                        "infectedpercentage" => '',
                        "infectivepercentage" => '',
                        "pcr" => ($value['pcr'] + $value2['pcr']),
                    );
                    $faind = 1;
                }
                $x++;
            }
            if ($faind == 0) {
                $total_result1[] = $value;
            }
        }

        $sub_total_o_of_premises = 0;
        $sub_total_o_of_premises_positive = 0;
        $sub_total_otal_mosquitos_collected = 0;
        $sub_total_o_of_dissected = 0;
        $sub_total_otal_postive = 0;
        $sub_total_nfective = 0;
        $sub_total_PCR = 0;
        //marginf data need to recalculate this  for re calculate data 
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
                $infectedpercentage = ($total_result1_value2['total_postive'] / $total_result1_value2['no_of_dissected']) * 100;
                $infectivepercentage = ($total_result1_value2['infective'] / $total_result1_value2['no_of_dissected']) * 100;
                $infectedpercentage = round($infectedpercentage, 2);
                $infectivepercentage = round($infectivepercentage, 2);
            }
            /////////////////////////////////////////////

            if ($type == null) {
                $viewData = $viewData .
                    '<tr>' .
                    '<td>CBNT</td>' .
                    '<td>' . $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' . $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' . $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' . $poscx . '</td>' .
                    '<td>0</td>' .
                    '<td>0</td>' .
                    '<td>' . $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td>' . $total_result1_value2['pcr'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' . $total_result1_value2['total_postive'] . '</td>' . /* $infected */
                    '<td>' . $total_result1_value2['infective'] . '</td>' .
                    '<td>' . $infectedpercentage . '</td>' .
                    '<td>' . $infectivepercentage . '</td>
                </tr>';
            } else {
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' . $district . '</td>' .
                    '<td>CBNT</td>' .
                    '<td>' . $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' . $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' . $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' . $poscx . '</td>' .
                    '<td>0</td>' .
                    '<td>0</td>' .
                    '<td>' . $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td>' . $total_result1_value2['pcr'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' . $total_result1_value2['total_postive'] . '</td>' . /* $infected */
                    '<td>' . $total_result1_value2['infective'] . '</td>' .
                    '<td>' . $infectedpercentage . '</td>' .
                    '<td>' . $infectivepercentage . '</td>
                </tr>';
            }










            $this->cach_time_total = $this->cach_time_total + $total_result1_value2['cach_time'];
            $this->total_no_of_premises_total = $this->total_no_of_premises_total + $total_result1_value2['no_of_premises'];
            $this->total_no_of_premises_positive_total = $this->total_no_of_premises_positive_total + $total_result1_value2['no_of_premises_positive'];
            $this->total_total_mosquitos_collected_total = $this->total_total_mosquitos_collected_total + $total_result1_value2['total_mosquitos_collected'];
            $this->total_no_of_dissected_total = $this->total_no_of_dissected_total + $total_result1_value2['no_of_dissected'];
            $this->total_total_postive_cx_total = $this->total_total_postive_cx_total + $total_result1_value2['total_postive'];
            $this->total_infective_total = $this->total_infective_total + $total_result1_value2['infective'];





            $this->District_cach_time_total = $this->District_cach_time_total + $total_result1_value2['cach_time'];
            $this->District_total_no_of_premises_total = $this->District_total_no_of_premises_total + $total_result1_value2['no_of_premises'];
            $this->District_total_no_of_premises_positive_total = $this->District_total_no_of_premises_positive_total + $total_result1_value2['no_of_premises_positive'];
            $this->District_total_total_mosquitos_collected_total = $this->District_total_total_mosquitos_collected_total + $total_result1_value2['total_mosquitos_collected'];
            $this->District_total_no_of_dissected_total = $this->District_total_no_of_dissected_total + $total_result1_value2['no_of_dissected'];
            $this->District_total_total_postive_cx_total = $this->District_total_total_postive_cx_total + $total_result1_value2['total_postive'];
            $this->District_total_infective_total = $this->District_total_infective_total + $total_result1_value2['infective'];
            $this->District_total_pcr_total = $this->District_total_pcr_total + $total_result1_value2['pcr'];





            $this->total_pcr_total = $this->total_pcr_total + $total_result1_value2['pcr'];

            $sub_total_o_of_premises += $total_result1_value2['no_of_premises'];
            $sub_total_o_of_premises_positive += $total_result1_value2['no_of_premises_positive'];
            $sub_total_otal_mosquitos_collected += $total_result1_value2['total_mosquitos_collected'];
            $sub_total_o_of_dissected += $total_result1_value2['no_of_dissected'];
            $sub_total_otal_postive += $total_result1_value2['total_postive'];
            $sub_total_nfective += $total_result1_value2['infective'];


            $sub_total_PCR += $total_result1_value2['pcr'];

            $sub_total_nfective += $total_result1_value2['infective'];
        }

        if ($sub_total_o_of_premises == "" or $sub_total_o_of_premises == 0) {
            $poscx = 0;
        } else {
            $poscx = ($sub_total_o_of_premises / $sub_total_o_of_premises) * 100;
            $poscx = round($poscx, 2);
        }
        if (empty($sub_total_o_of_dissected)) {
            $infectedpercentage = '0';
            $infectivepercentage = '0';
        } else {
            $infectedpercentage = ($sub_total_otal_postive / $sub_total_o_of_dissected) * 100;
            $infectivepercentage = ($sub_total_nfective / $sub_total_o_of_dissected) * 100;
            $infectedpercentage = round($infectedpercentage, 2);
            $infectivepercentage = round($infectivepercentage, 2);
        }
        /////////////////////////////////////////////
        if ($type == null) {
            $viewData = $viewData .
                '<tr  style="  background-color:#e1f0c9;">' .
                '<td >Sub total <br> CBNT</td>' .
                '<td></td>' .
                '<td></td>' .
                '<td></td>' .
                '<td>' . $sub_total_o_of_premises . '</td>' .
                '<td>' . $sub_total_o_of_premises_positive . '</td>' .
                '<td>' . $poscx . '</td>' .
                '<td>0</td>' .
                '<td>0</td>' .
                '<td>' . $sub_total_otal_mosquitos_collected . '</td>' .
                '<td>' . $sub_total_PCR . '</td>' .
                '<td>' . $sub_total_o_of_dissected . '</td>' .
                '<td>' . $sub_total_otal_postive . '</td>' . /* $infected */
                '<td>' . $sub_total_nfective . '</td>' .
                '<td>' . $infectedpercentage . '</td>' .
                '<td>' . $infectivepercentage . '</td>
        </tr>';
        } else {
            $viewData = $viewData .

                '<tr  style="  background-color:#e1f0c9;">' .
                '<td>' . $district . '</td>' .
                '<td >Sub total <br> CBNT</td>' .
                '<td></td>' .
                '<td></td>' .
                '<td></td>' .
                '<td>' . $sub_total_o_of_premises . '</td>' .
                '<td>' . $sub_total_o_of_premises_positive . '</td>' .
                '<td>' . $poscx . '</td>' .
                '<td>0</td>' .
                '<td>0</td>' .
                '<td>' . $sub_total_otal_mosquitos_collected . '</td>' .
                '<td>' . $sub_total_PCR . '</td>' .
                '<td>' . $sub_total_o_of_dissected . '</td>' .
                '<td>' . $sub_total_otal_postive . '</td>' . /* $infected */
                '<td>' . $sub_total_nfective . '</td>' .
                '<td>' . $infectedpercentage . '</td>' .
                '<td>' . $infectivepercentage . '</td>
            </tr>';
        }


        return   $viewData;

        // ENS OGF GETV  ENTO 3
    }









    public function  get_ento4_data($from, $to, $district, $species, $type = null)
    {
        $alldata_ento_4 = array();
        $viewData = "";
        $total_no_of_collectors = 1;
        $alldata_ento_3 = array();
        $viewData = "";
        $total_no_of_collectors = 1;


        if ($district == 'all') {

            if ("Cx" == $species) {
                $ento_4_form_data = \App\Ento_4::with('ento_04_indoors', 'ento_04_mosq_news', 'ento_04_outdoors', 'Ento_5_new_culex_s')
                    ->whereBetween('date_of_collection', [$from, $to])
                    ->get();

                // $total_mosquitos_collected
            } else {
                $ento_4_form_data = \App\Ento_4::with('ento_04_indoors', 'ento_04_mosq_news', 'ento_04_outdoors', 'Ento_5_new_man_s')
                    ->whereBetween('date_of_collection', [$from, $to])
                    ->get();
            }
        } else {

            if ("Cx" == $species) {
                $ento_4_form_data = \App\Ento_4::with('ento_04_indoors', 'ento_04_mosq_news', 'ento_04_outdoors', 'Ento_5_new_culex_s')
                    ->whereBetween('date_of_collection', [$from, $to])
                    ->where("district", $district)->get();

                // $total_mosquitos_collected
            } else {
                $ento_4_form_data = \App\Ento_4::with('ento_04_indoors', 'ento_04_mosq_news', 'ento_04_outdoors', 'Ento_5_new_man_s')
                    ->whereBetween('date_of_collection', [$from, $to])
                    ->where("district", $district)->get();
            }
        }




        if (empty(count($ento_4_form_data))) {
            return   $viewData;
            die();
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
            $premises_posotive = 100;

            $total_mosquitos_collected = 0;
            if ("Cx" == $species) {
                $Ento_03_total_mosq2 = \App\ento_04_mosq_new::where("ento_04_id_data", $ento_04_id)->where('mosq_spec_stat', 'like', 'Culex (culex) quinquefasciatus%')
                    ->get();

                foreach ($Ento_03_total_mosq2 as  $Ento_03_total_mosq) {
                    $total_mosquitos_collected += ($Ento_03_total_mosq->number + $Ento_03_total_mosq->number7_8 + $Ento_03_total_mosq->number8_9 + $Ento_03_total_mosq->number9_10 + $Ento_03_total_mosq->number10_11 + $Ento_03_total_mosq->number11_12 + $Ento_03_total_mosq->number12_1 + $Ento_03_total_mosq->number1_2 + $Ento_03_total_mosq->number2_3 + $Ento_03_total_mosq->number3_4 + $Ento_03_total_mosq->number4_5 + $Ento_03_total_mosq->number5_6);
                }
            } else {
                $Ento_03_total_mosq2 = \App\ento_04_mosq_new::where("ento_04_id_data", $ento_04_id)->where('mosq_spec_stat', 'like', 'Mansonia%')
                    ->get();
                foreach ($Ento_03_total_mosq2 as  $Ento_03_total_mosq) {
                    $total_mosquitos_collected += ($Ento_03_total_mosq->number + $Ento_03_total_mosq->number7_8 + $Ento_03_total_mosq->number8_9 + $Ento_03_total_mosq->number9_10 + $Ento_03_total_mosq->number10_11 + $Ento_03_total_mosq->number11_12 + $Ento_03_total_mosq->number12_1 + $Ento_03_total_mosq->number1_2 + $Ento_03_total_mosq->number2_3 + $Ento_03_total_mosq->number3_4 + $Ento_03_total_mosq->number4_5 + $Ento_03_total_mosq->number5_6);
                }
            }

            $infective = 0;
            $no_of_dissected = 0;
            $positive_mosq = 0;


            if ("Cx" == $species) {
                foreach ($ento_4_form_data_row->Ento_5_new_culex_s as  $Ento_5_news_each) {
                    if ($species == "Cx") {
                        $speciesfaind = "Culex";
                    } else {
                        $speciesfaind = "Mansonia ";
                    }
                    // if ($Ento_5_news_each->type_of_parasite == 'Brugia malayi' || $Ento_5_news_each->type_of_parasite == 'Wuchereria bancrofit') {
                    if (strpos($Ento_5_news_each->species2, $speciesfaind) || strpos($Ento_5_news_each->species2, $speciesfaind) == 0) {
                        $no_of_dissected += $Ento_5_news_each->no_dissected_mosquitos;
                        $positive_mosq += $Ento_5_news_each->positive_mosq;
                        $infective = $infective + $Ento_5_news_each->mq_postive_for_l3;
                        // }
                    }
                }
            } else {
                foreach ($ento_4_form_data_row->Ento_5_new_man_s as  $Ento_5_news_each) {
                    if ($species == "Cx") {
                        $speciesfaind = "Culex";
                    } else {
                        $speciesfaind = "Mansonia ";
                    }
                    // if ($Ento_5_news_each->type_of_parasite == 'Brugia malayi' || $Ento_5_news_each->type_of_parasite == 'Wuchereria bancrofit') {
                    if (strpos($Ento_5_news_each->species2, $speciesfaind) || strpos($Ento_5_news_each->species2, $speciesfaind) == 0) {
                        $no_of_dissected += $Ento_5_news_each->no_dissected_mosquitos;
                        $positive_mosq += $Ento_5_news_each->positive_mosq;
                        $infective = $infective + $Ento_5_news_each->mq_postive_for_l3;
                        // }
                    }
                }
            }


            if (empty($no_of_dissected)) {
                $infectedpercentage = '0';
                $infectivepercentage = '0';
            } else {
                $infectedpercentage = ($positive_mosq / $no_of_dissected) * 100;
                $infectivepercentage = ($infective / $no_of_dissected) * 100;
                $infectedpercentage = round($infectedpercentage, 2);
                $infectivepercentage = round($infectivepercentage, 2);
            }

            $alldata_ento_4[] = array(
                "name_of_heo" => $name_of_heo,
                "moh_area" => $moh_area,
                "phi_and_phm" => $phi_and_phm,
                "gn_divison" => $gn_divison,
                "ENTO_04" => "ENTO_04",
                "no_of_premises" => $no_of_premises,
                "no_of_premises_positive" => $no_of_premises_positive,
                "premises_posotive" => $premises_posotive,
                "cach_time" => 0,
                "mosquitodensity" => 0,
                "total_mosquitos_collected" => $total_mosquitos_collected,
                "no_of_dissected" => $no_of_dissected,
                "total_postive" => $positive_mosq,
                "infective" => $infective,
                "infectedpercentage" => $infectedpercentage,
                "infectivepercentage" => $infectivepercentage,
            );
        }



        $total_result1 = array();
        foreach ($alldata_ento_4 as $value) {
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
                        "premises_posotive" => ($value['premises_posotive'] + $value2['premises_posotive']),
                        "cach_time" => 0,
                        "mosquitodensity" => 0,
                        "total_mosquitos_collected" => ($value['total_mosquitos_collected'] + $value2['total_mosquitos_collected']),
                        "no_of_dissected" => ($value['no_of_dissected'] + $value2['no_of_dissected']),
                        "total_postive" => ($value['total_postive'] + $value2['total_postive']),
                        "infective" => ($value['infective'] + $value2['infective']),
                        "infectedpercentage" => '',
                        "infectivepercentage" => '',
                    );
                    $faind = 1;
                }
                $x++;
            }
            if ($faind == 0) {
                $total_result1[] = $value;
            }
        }


        $sub_total_o_of_premises = 0;
        $sub_total_o_of_premises_positive = 0;
        $sub_total_otal_mosquitos_collected = 0;
        $sub_total_o_of_dissected = 0;
        $sub_total_otal_postive = 0;
        $sub_total_nfective = 0;
        //marginf data need to recalculate this  for re calculate data 
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
                $infectedpercentage = ($total_result1_value2['total_postive'] / $total_result1_value2['no_of_dissected']) * 100;
                $infectivepercentage = ($total_result1_value2['infective'] / $total_result1_value2['no_of_dissected']) * 100;
                $infectedpercentage = round($infectedpercentage, 2);
                $infectivepercentage = round($infectivepercentage, 2);
            }
            /////////////////////////////////////////////





            if ($type == null) {
                $viewData = $viewData .
                    '<tr>' .
                    '<td>HNLC</td>' .
                    '<td>' . $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' . $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' . $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' . $poscx . '</td>' .
                    '<td>0</td>' .
                    '<td>0</td>' .
                    '<td>' . $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td> 0 </td>' .
                    '<td>' . $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' . $total_result1_value2['total_postive'] . '</td>' . /* $infected */
                    '<td>' . $total_result1_value2['infective'] . '</td>' .
                    '<td>' . $infectedpercentage . '</td>' .
                    '<td>' . $infectivepercentage . '</td>
                </tr>';
            } else {
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' . $district . '</td>' .
                    '<td>HNLC</td>' .
                    '<td>' . $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' . $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' . $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' . $poscx . '</td>' .
                    '<td>0</td>' .
                    '<td>0</td>' .
                    '<td>' . $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td> 0 </td>' .
                    '<td>' . $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' . $total_result1_value2['total_postive'] . '</td>' . /* $infected */
                    '<td>' . $total_result1_value2['infective'] . '</td>' .
                    '<td>' . $infectedpercentage . '</td>' .
                    '<td>' . $infectivepercentage . '</td>
                </tr>';
            }


            $this->total_no_of_premises_total = $this->total_no_of_premises_total + $total_result1_value2['no_of_premises'];
            $this->total_no_of_premises_positive_total = $this->total_no_of_premises_positive_total + $total_result1_value2['no_of_premises_positive'];
            $this->total_total_mosquitos_collected_total = $this->total_total_mosquitos_collected_total + $total_result1_value2['total_mosquitos_collected'];
            $this->total_no_of_dissected_total = $this->total_no_of_dissected_total + $total_result1_value2['no_of_dissected'];
            $this->total_total_postive_cx_total = $this->total_total_postive_cx_total + $total_result1_value2['total_postive'];
            $this->total_infective_total = $this->total_infective_total + $total_result1_value2['infective'];





            $this->District_total_no_of_premises_total = $this->District_total_no_of_premises_total + $total_result1_value2['no_of_premises'];
            $this->District_total_no_of_premises_positive_total = $this->District_total_no_of_premises_positive_total + $total_result1_value2['no_of_premises_positive'];
            $this->District_total_total_mosquitos_collected_total = $this->District_total_total_mosquitos_collected_total + $total_result1_value2['total_mosquitos_collected'];
            $this->District_total_no_of_dissected_total = $this->District_total_no_of_dissected_total + $total_result1_value2['no_of_dissected'];
            $this->District_total_total_postive_cx_total = $this->District_total_total_postive_cx_total + $total_result1_value2['total_postive'];
            $this->District_total_infective_total = $this->District_total_infective_total + $total_result1_value2['infective'];




            $sub_total_o_of_premises += $total_result1_value2['no_of_premises'];
            $sub_total_o_of_premises_positive += $total_result1_value2['no_of_premises_positive'];
            $sub_total_otal_mosquitos_collected += $total_result1_value2['total_mosquitos_collected'];
            $sub_total_o_of_dissected += $total_result1_value2['no_of_dissected'];
            $sub_total_otal_postive += $total_result1_value2['total_postive'];
            $sub_total_nfective += $total_result1_value2['infective'];
        }

        if ($sub_total_o_of_premises == "" or $sub_total_o_of_premises == 0) {
            $poscx = 0;
        } else {
            $poscx = ($sub_total_o_of_premises / $sub_total_o_of_premises) * 100;
            $poscx = round($poscx, 2);
        }
        if (empty($sub_total_o_of_dissected)) {
            $infectedpercentage = '0';
            $infectivepercentage = '0';
        } else {
            $infectedpercentage = ($sub_total_otal_postive / $sub_total_o_of_dissected) * 100;
            $infectivepercentage = ($sub_total_nfective / $sub_total_o_of_dissected) * 100;
            $infectedpercentage = round($infectedpercentage, 2);
            $infectivepercentage = round($infectivepercentage, 2);
        }
        /////////////////////////////////////////////


        if ($type == null) {

            $viewData = $viewData .
                '<tr  style="  background-color:#e1f0c9;">' .
                '<td >Sub total <br>HNLC</td>' .
                '<td></td>' .
                '<td></td>' .
                '<td></td>' .
                '<td>' . $sub_total_o_of_premises . '</td>' .
                '<td>' . $sub_total_o_of_premises_positive . '</td>' .
                '<td>' . $poscx . '</td>' .
                '<td>0</td>' .
                '<td>0</td>' .
                '<td>' . $sub_total_otal_mosquitos_collected . '</td>' .
                '<td> 0 </td>' .
                '<td>' . $sub_total_o_of_dissected . '</td>' .
                '<td>' . $sub_total_otal_postive . '</td>' . /* $infected */
                '<td>' . $sub_total_nfective . '</td>' .
                '<td>' . $infectedpercentage . '</td>' .
                '<td>' . $infectivepercentage . '</td>
        </tr>';
        } else {
            $viewData = $viewData .
                '<tr  style="  background-color:#e1f0c9;">' .
                '<td>' . $district . '</td>' .
                '<td >Sub total <br>HNLC</td>' .
                '<td></td>' .
                '<td></td>' .
                '<td></td>' .
                '<td>' . $sub_total_o_of_premises . '</td>' .
                '<td>' . $sub_total_o_of_premises_positive . '</td>' .
                '<td>' . $poscx . '</td>' .
                '<td>0</td>' .
                '<td>0</td>' .
                '<td>' . $sub_total_otal_mosquitos_collected . '</td>' .
                '<td> 0 </td>' .
                '<td>' . $sub_total_o_of_dissected . '</td>' .
                '<td>' . $sub_total_otal_postive . '</td>' . /* $infected */
                '<td>' . $sub_total_nfective . '</td>' .
                '<td>' . $infectedpercentage . '</td>' .
                '<td>' . $infectivepercentage . '</td>
        </tr>';
        }





        return   $viewData;
    }








    // ************ blue ********************b1 report********************************
    public function b1_report_print22(Request $request)
    {
        $old_data_1 = array();
        $old_data_2 = array();
        $old_data_3 = array();
        $old_data_4 = array();

        $data = $request->all();
        $from = $data['from'];
        $from = $data['from'];
        $export_type = $data['export_type'];
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
            $total_pcr = 0;
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
AND en5.main_form_type='ento_01'
AND en1.district='" . $district . "' AND en1.date BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY en1.ento_01_id");

            // AND mos.no_of_dissected > 0


            $old_data_1 = array();
            for ($i = 0; $i < count($results); $i++) {
                // this qure for get dessected form ento5 mos table
                $id = $results[$i]->id;
                $results_2 = DB::select("  SELECT  SUM(no_of_dissected) as no_of_dissected_al  from ento_05_mosq where ento_05_id=$id and    species='Cx quin' ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $no_of_dissected_al = $results_2[$e]->no_of_dissected_al;
                }
                // this qure for get dessected form ento5 mos table
                $ento1id_id = $results[$i]->ento1id;
                // $total_postive_cx = $results[$i]->positive_mosq;    replase this qure for this
                // $infective =$results[$i]->infective;
                $results_3 = DB::select(" SELECT SUM(lab_no) as labno ,SUM(lab_positive) as lab_positive FROM ento_01_data WHERE ento_01_id=$ento1id_id ");
                for ($ee = 0; $ee < count($results_3); $ee++) {
                    $infective = $results_3[$ee]->labno;
                    // $total_postive_cx  = $results_3[$ee]->lab_positive;
                }
                // get  all  infective and infecterd
                $results_4 = DB::select(" SELECT COUNT(id) as lab_positive FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='CX' ");
                for ($ee4 = 0; $ee4 < count($results_4); $ee4++) {
                    // $infective  = $results_3[$ee]->labno;
                    $total_postive_cx = $results_4[$ee4]->lab_positive;
                }
                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='CX' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    $infective = $results_6[$ee6]->labno;
                }
                $name_of_heo = $results[$i]->name_of_heo;
                $moh_area = $results[$i]->moh_area;
                $phi_and_phm = $results[$i]->phi_and_phm;
                $gn_divison = $results[$i]->gn_divison;
                $no_of_collectors = $results[$i]->no_of_collectors;
                $total_no_of_collectors = $total_no_of_collectors + $no_of_collectors;
                $no_of_premises = $results[$i]->no_of_premises;
                $no_of_premises_positive = $results[$i]->no_of_premises_positive;
                $total_mosquitos_collected = $results[$i]->total_mosquitos_collected;
                //          get %+
                if ($no_of_premises == "" or $no_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($no_of_premises_positive / $no_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }
                //          get %+
                $total_time_spend = $results[$i]->total_time_spend;
                $total_time_spend = round((($total_time_spend / 60) * $no_of_collectors), 2);

                //        mosquito density
                if ($total_mosquitos_collected == "" or $total_mosquitos_collected == 0) {
                    $mosquitodensity = 0;
                } else {
                    $mosquitodensity = ($total_mosquitos_collected / $total_time_spend);
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
                    $mosquitodensity_row = ($total_mosquitos_collected / $total_time_spend);
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
                            "infectedpercentage" => '',
                            "infectivepercentage" => '',
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
                    $infectedpercentage = ($total_result1_value2['total_postive_cx'] / $total_result1_value2['no_of_dissected']) * 100;
                    $infectivepercentage = ($total_result1_value2['infective'] / $total_result1_value2['no_of_dissected']) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                /////////////////////////////////////////////
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' . $total_result1_value2['name_of_heo'] . '</td>' .
                    '<td>' . $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' . $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' . $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>ENTO 01</td>' .
                    '<td>' . $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' . $poscx . '</td>' .
                    '<td>' . $total_result1_value2['total_time_spend'] . '</td>' .
                    '<td>' . $total_result1_value2['mosquitodensity'] . '</td>' .

                    '<td>' . $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td> 0 </td>' .
                    '<td>' . $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' . $total_result1_value2['total_postive_cx'] . '</td>' . /* $infected */
                    '<td>' . $total_result1_value2['infective'] . '</td>' .
                    '<td>' . $total_result1_value2['infectedpercentage'] . '</td>' .
                    '<td>' . $total_result1_value2['infectivepercentage'] . '</td>
</tr>';
            }
            // ENTO ONE 1   data get calculate

            //  red red red  red  ENTO ONE 2   data get calculate    red red red  red
            $results = DB::select("
select  en2.heo, en2.moh_area,en2.phm_area,en2.moh_area,en2.gn_division,en2.total_cx_quin_mosq,en2.ento_02_id as ento_02_id,en5.ento_05_id as id
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
AND en5.main_form_type='ento_02'
AND en2.district='" . $district . "' AND en2.date BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY en2.ento_02_id
");

            //AND mos.no_of_dissected > 0
            // WHERE mos.species2='CX' AND en1.district='".$district."' AND en1.date BETWEEN '".$from."' AND '".$to."'
            // GROUP BY en1.moh_area
            for ($i = 0; $i < count($results); $i++) {
                // this qure for get dessected form ento5 mos table
                $id = $results[$i]->id;
                $results_2 = DB::select("  SELECT  SUM(no_of_dissected) as no_of_dissected_al  from ento_05_mosq where ento_05_id=$id and    species='Cx quin' ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $no_of_dissected_al = $results_2[$e]->no_of_dissected_al;
                }
                // this qure for get dessected form ento5 mos table
                $ento_02_id = $results[$i]->ento_02_id;
                // $total_postive_cx = $results[$i]->positive_mosq;    replase this qure for this
                // $infective =$results[$i]->infective;
                $results_3 = DB::select(" SELECT COUNT(ento_02_id) as no_of_premises  , SUM(mosq_pcr) as pcr FROM ento_02_data WHERE ento_02_id=$ento_02_id ");
                for ($ee = 0; $ee < count($results_3); $ee++) {
                    $no_of_premises = $results_3[$ee]->no_of_premises;
                    $pcr = $results_3[$ee]->pcr;
                }
                $results_33 = DB::select(" SELECT COUNT(ento_02_id) as no_of_premises_positive FROM ento_02_data WHERE ento_02_id=$ento_02_id and total_cx_quin > 0 ");
                for ($ee33 = 0; $ee33 < count($results_33); $ee33++) {
                    $no_of_premises_positive = $results_33[$ee33]->no_of_premises_positive;
                }
                // get  all  infective and infecterd
                $results_4 = DB::select(" SELECT COUNT(id) as lab_positive FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='CX' ");
                for ($ee4 = 0; $ee4 < count($results_4); $ee4++) {
                    // $infective  = $results_3[$ee]->labno;
                    $total_postive_cx = $results_4[$ee4]->lab_positive;
                }
                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='CX' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective = $results_6[$ee6]->labno;
                }
                $name_of_heo = $results[$i]->heo;
                $moh_area = $results[$i]->moh_area;
                $phi_and_phm = $results[$i]->phm_area;
                $gn_divison = $results[$i]->gn_division;
                // $no_of_premises  = $results[$i]->no_of_premises;
                // $no_of_premises_positive  = $results[$i]->no_of_premises_positive;
                $results_7 = DB::select(" SELECT COUNT(ento_02_id) as no_of_premises FROM ento_02_data WHERE ento_02_id=$ento_02_id ");
                for ($ee = 0; $ee < count($results_3); $ee++) {
                    $no_of_premises = $results_3[$ee]->no_of_premises;
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
                $total_pcr = $total_pcr + $pcr;
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

                // group for row
                if ($total_time_spend == "" or $total_time_spend == 0) {
                    $mosquitodensity_row = 0;
                } else {
                    $mosquitodensity_row = ($total_mosquitos_collected / $total_time_spend);
                    $mosquitodensity_row = round($mosquitodensity_row, 2);
                }

                // group for row
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
                    "mosquitodensity" => $mosquitodensity_row,
                    "total_mosquitos_collected" => $total_mosquitos_collected,
                    "pcr" => $pcr,
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
                            "pcr" => ($value_2['pcr'] + $value3['pcr']),
                            "infective" => ($value_2['infective'] + $value3['infective']),
                            "infectedpercentage" => '',
                            "infectivepercentage" => '',
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
                    $infectedpercentage = ($total_result1_value2['total_postive_cx'] / $total_result1_value2['no_of_dissected']) * 100;
                    $infectivepercentage = ($total_result1_value2['infective'] / $total_result1_value2['no_of_dissected']) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                /////////////////////////////////////////////
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' . $total_result1_value2['name_of_heo'] . '</td>' .
                    '<td>' . $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' . $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' . $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>ENTO 02</td>' .
                    '<td>' . $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' . $poscx . '</td>' .
                    '<td>' . $total_result1_value2['total_time_spend'] . '</td>' .
                    '<td>' . $total_result1_value2['mosquitodensity'] . '</td>' .
                    '<td>' . $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td>' . $total_result1_value2['pcr'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' . $total_result1_value2['total_postive_cx'] . '</td>' . /* $infected */
                    '<td>' . $total_result1_value2['infective'] . '</td>' .
                    '<td>' . $total_result1_value2['infectedpercentage'] . '</td>' .
                    '<td>' . $total_result1_value2['infectivepercentage'] . '</td>
</tr>';
            }
            //  red red red  red  ENTO ONE 2   data get calculate    red red red  red

            // yellow yellow yellow yellow yellow ENTO ONE 3   data get calculate  yellow yellow yellow yellow
            $results = DB::select("
select en3.phi,en3.moh,en3.gn,en3.total_no_of_mosq,en3.ento_03_id as ento_03_id,en5.ento_05_id as id
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
AND en5.main_form_type='ento_03'
AND en3.district='" . $district . "' AND en3.date_of_collection BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY en3.ento_03_id
");
            //AND mos.no_of_dissected > 0
            // WHERE mos.species2='CX' AND en1.district='".$district."' AND en1.date BETWEEN '".$from."' AND '".$to."'
            // GROUP BY en1.moh_area
            for ($i = 0; $i < count($results); $i++) {
                // this qure for get dessected form ento5 mos table
                $id = $results[$i]->id;
                $results_2 = DB::select("  SELECT  SUM(no_of_dissected) as no_of_dissected_al  from ento_05_mosq where ento_05_id=$id and    species='Cx quin' ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $no_of_dissected_al = $results_2[$e]->no_of_dissected_al;
                }
                // this qure for get dessected form ento5 mos table
                $ento_03_id = $results[$i]->ento_03_id;
                // $total_postive_cx = $results[$i]->positive_mosq;    replase this qure for this
                // $infective =$results[$i]->infective;
                $no_of_premises_positive = "1";
                // get  all  infective and infecterd

                $results_2_2 = DB::select("  SELECT  SUM(no_of_mosq) as collectedmos  from ento_03_data where ento_03_id=$ento_03_id and   mosq_species LIKE 'Culex (culex) quinquefasciatus%'; ");
                for ($e22 = 0; $e22 < count($results_2_2); $e22++) {
                    $total_mosquitos_collected = $results_2_2[$e22]->collectedmos;
                }

                $results_4 = DB::select(" SELECT COUNT(id) as lab_positive FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='CX' ");
                for ($ee4 = 0; $ee4 < count($results_4); $ee4++) {
                    // $infective  = $results_3[$ee]->labno;
                    $total_postive_cx = $results_4[$ee4]->lab_positive;
                }
                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='CX' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective = $results_6[$ee6]->labno;
                }
                // $name_of_heo  = $results[$i]->heo;
                $name_of_heo = "";
                $moh_area = $results[$i]->moh;
                $phi_and_phm = $results[$i]->phi;
                $gn_divison = $results[$i]->gn;
                // $no_of_premises  = $results[$i]->no_of_premises;
                // $no_of_premises_positive  = $results[$i]->no_of_premises_positive;
                $no_of_premises = "1";
                // $total_mosquitos_collected=$results[$i]->total_no_of_mosq;
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

                if ($total_time_spend == "" or $total_time_spend == 0) {
                    $mosquitodensity_row = 0;
                } else {
                    $mosquitodensity_row = ($total_mosquitos_collected / $total_time_spend);
                    $mosquitodensity_row = round($mosquitodensity_row, 2);
                }
                // group for row
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
                            "infectedpercentage" => "",
                            "infectivepercentage" => "",
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
                    $infectedpercentage = ($total_result1_value2['total_postive_cx'] / $total_result1_value2['no_of_dissected']) * 100;
                    $infectivepercentage = ($total_result1_value2['infective'] / $total_result1_value2['no_of_dissected']) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                /////////////////////////////////////////////
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' . $total_result1_value2['name_of_heo'] . '</td>' .
                    '<td>' . $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' . $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' . $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>ENTO 03</td>' .
                    '<td>' . $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' . $poscx . '</td>' .
                    '<td>' . $total_result1_value2['total_time_spend'] . '</td>' .
                    '<td>' . $total_result1_value2['mosquitodensity'] . '</td>' .
                    '<td>' . $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td> 0 </td>' .
                    '<td>' . $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' . $total_result1_value2['total_postive_cx'] . '</td>' . /* $infected */
                    '<td>' . $total_result1_value2['infective'] . '</td>' .
                    '<td>' . $total_result1_value2['infectedpercentage'] . '</td>' .
                    '<td>' . $total_result1_value2['infectivepercentage'] . '</td>
</tr>';
            }
            // ENTO ONE 3   data get calculate
            $culex_total = 0; // ENTO ONE 4   data get calculate
            $results = DB::select("select en3.phi,en3.moh,en3.gn_division,en3.ento_04_id as ento_04_id,en5.ento_05_id as id
FROM ento_04 as en3
INNER JOIN ento_05 as en5
ON en3.ento_04_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mos.species='Cx quin'
AND en5.main_form_type='ento_04'
AND en3.district='" . $district . "' AND en3.date_of_collection BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY en3.ento_04_id");
            // AND mos.no_of_dissected > 0
            // WHERE mos.species2='CX' AND en1.district='".$district."' AND en1.date BETWEEN '".$from."' AND '".$to."'
            // GROUP BY en1.moh_area
            for ($i = 0; $i < count($results); $i++) {
                // this qure for get dessected form ento5 mos table
                $id = $results[$i]->id;
                $results_2 = DB::select("  SELECT  SUM(no_of_dissected) as no_of_dissected_al  from ento_05_mosq where ento_05_id=$id and  species='Cx quin' ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $no_of_dissected_al = $results_2[$e]->no_of_dissected_al;
                }
                // this qure for get dessected form ento5 mos table
                $ento_04_id = $results[$i]->ento_04_id;
                // $total_postive_cx = $results[$i]->positive_mosq;    replase this qure for this
                // $infective =$results[$i]->infective;
                $no_of_premises_positive = "1";
                // get  all  infective and infecterd
                $results_4 = DB::select(" SELECT COUNT(id) as lab_positive FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='CX' ");
                for ($ee4 = 0; $ee4 < count($results_4); $ee4++) {
                    // $infective  = $results_3[$ee]->labno;
                    $total_postive_cx = $results_4[$ee4]->lab_positive;
                }
                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective = $results_6[$ee6]->labno;
                }
                // $name_of_heo  = $results[$i]->heo;
                $name_of_heo = "";
                $moh_area = $results[$i]->moh;
                $phi_and_phm = $results[$i]->phi;
                $gn_divison = $results[$i]->gn_division;
                // $no_of_premises  = $results[$i]->no_of_premises;
                // $no_of_premises_positive  = $results[$i]->no_of_premises_positive;
                $no_of_premises = "1";
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

                if ($total_time_spend == "" or $total_time_spend == 0) {
                    $mosquitodensity_row = 0;
                } else {
                    $mosquitodensity_row = ($total_mosquitos_collected / $total_time_spend);
                    $mosquitodensity_row = round($mosquitodensity_row, 2);
                }
                // group for row
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
                            "infectedpercentage" => '',
                            "infectivepercentage" => '',
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
                    $infectedpercentage = ($total_result1_value2['total_postive_cx'] / $total_result1_value2['no_of_dissected']) * 100;
                    $infectivepercentage = ($total_result1_value2['infective'] / $total_result1_value2['no_of_dissected']) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                /////////////////////////////////////////////
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' . $total_result1_value2['name_of_heo'] . '</td>' .
                    '<td>' . $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' . $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' . $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>ENTO 04</td>' .
                    '<td>' . $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' . $poscx . '</td>' .
                    '<td>' . $total_result1_value2['total_time_spend'] . '</td>' .
                    '<td>' . $total_result1_value2['mosquitodensity'] . '</td>' .
                    '<td>' . $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td> 0 </td>' .
                    '<td>' . $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' . $total_result1_value2['total_postive_cx'] . '</td>' . /* $infected */
                    '<td>' . $total_result1_value2['infective'] . '</td>' .
                    '<td>' . $total_result1_value2['infectedpercentage'] . '</td>' .
                    '<td>' . $total_result1_value2['infectivepercentage'] . '</td>
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

                if ($total_total_time_spend == 0) {
                    $total_row = 0;
                } else {
                    $total_row = round((($total_total_mosquitos_collected / $total_total_time_spend)), 2);
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
                    '<td>' . round((($total_no_of_premises_positive / $total_no_of_premises) * 100), 2) . '</td>' . // round((($total_no_of_premises_positive / $total_no_of_premises) * 100)/$total_no_of_collectors,2)
                    '<td>' . $total_total_time_spend . '</td>' .
                    '<td> 0 </td>' . //'<td>' . $total_row. '</td>' .
                    '<td>' . $total_total_mosquitos_collected . '</td>' .
                    '<td>' . $total_pcr . '</td>' .
                    '<td>' . $total_no_of_dissected . '</td>' .
                    '<td>' . $total_total_postive_cx . '</td>' . /* $infected */
                    '<td>' . $total_infective . '</td>' .
                    '<td>' . $total_infective_t . '</td>' .
                    '<td>' . $total_infected . '</td>
</tr>';
            }
            // ENTO ONE 4   data get calculate





            if ($export_type == 'PDF') {

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

                header('Content-Type: application/xls');
                header('Content-Disposition: attachment; filename=download.xls');
                echo $template = view(
                    'report/b1_view',
                    compact('data'),
                    ["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
                );
            }
        } else {
            $pcr = 0;
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

            $total_pcr = 0;
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
            $results = DB::select("select  en1.no_of_collectors, en1.mansonia_spcies_of_mosquitos_collected ,en1.mansonia_species_of_positive,en1.name_of_heo, en1.moh_area,en1.phi_and_phm,en1.gn_divison,en1.total_mosquitos_collected,en5.ento_05_id as id,en1.ento_01_id as ento1id,
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
AND mos.no_of_dissected > 0
AND en5.main_form_type='ento_01'
AND en1.district='" . $district . "' AND en1.date BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY en1.ento_01_id ");
            for ($i = 0; $i < count($results); $i++) {
                // this qure for get dessected form ento5 mos table
                $id = $results[$i]->id;
                $results_2 = DB::select("SELECT  SUM(no_of_dissected) as no_of_dissected_al  from ento_05_mosq where ento_05_id=$id and    species='Mansonia' ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $no_of_dissected_al = $results_2[$e]->no_of_dissected_al;
                }
                // this qure for get dessected form ento5 mos table
                $ento1id_id = $results[$i]->ento1id;
                // $total_postive_cx = $results[$i]->positive_mosq;    replase this qure for this
                // $infective =$results[$i]->infective;
                $results_3 = DB::select(" SELECT SUM(lab_no) as labno ,SUM(lab_positive) as lab_positive FROM ento_01_data WHERE ento_01_id=$ento1id_id ");
                for ($ee = 0; $ee < count($results_3); $ee++) {
                    $infective = $results_3[$ee]->labno;
                    // $total_postive_cx  = $results_3[$ee]->lab_positive;
                }
                // get  all  infective and infecterd
                $results_4 = DB::select(" SELECT COUNT(id) as lab_positive FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' ");
                for ($ee4 = 0; $ee4 < count($results_4); $ee4++) {
                    // $infective  = $results_3[$ee]->labno;
                    $total_postive_cx = $results_4[$ee4]->lab_positive;
                }
                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");

                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    $infective = $results_6[$ee6]->labno;
                }

                $name_of_heo = $results[$i]->name_of_heo;
                $moh_area = $results[$i]->moh_area;
                $phi_and_phm = $results[$i]->phi_and_phm;
                $gn_divison = $results[$i]->gn_divison;
                $no_of_premises = $results[$i]->no_of_premises;
                $no_of_collectors = $results[$i]->no_of_collectors;
                $total_no_of_collectors = $total_no_of_collectors + $no_of_collectors;
                $no_of_premises_positive = $results[$i]->mansonia_species_of_positive;
                $total_mosquitos_collected = $results[$i]->mansonia_spcies_of_mosquitos_collected;
                //          get %+
                if ($no_of_premises == "" or $no_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($no_of_premises_positive / $no_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }

                //          get %+
                $total_time_spend = $results[$i]->total_time_spend;
                $total_time_spend = round(($total_time_spend / 60) * $no_of_collectors, 2);

                //        mosquito density
                if ($total_mosquitos_collected == "" or $total_mosquitos_collected == 0) {
                    $mosquitodensity = 0;
                } else {
                    $mosquitodensity = $total_mosquitos_collected / $total_time_spend;
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

                if ($total_total_mosquitos_collected == "" or $total_total_mosquitos_collected == 0) {
                    $mosquitodensity_row = 0;
                } else {
                    $mosquitodensity_row = ($total_mosquitos_collected / $total_time_spend);
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
                            "mosquitodensity" => (round((($value_1['total_mosquitos_collected'] + $value1['total_mosquitos_collected']) / ($value_1['total_time_spend'] + $value1['total_time_spend'])), 2)),
                            "total_mosquitos_collected" => ($value_1['total_mosquitos_collected'] + $value1['total_mosquitos_collected']),
                            "no_of_dissected" => ($value_1['no_of_dissected'] + $value1['no_of_dissected']),
                            "total_postive_cx" => ($value_1['total_postive_cx'] + $value1['total_postive_cx']),
                            "infective" => ($value_1['infective'] + $value1['infective']),
                            "infectedpercentage" => '',
                            "infectivepercentage" => '',
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
                    $infectedpercentage = ($total_result1_value2['total_postive_cx'] / $total_result1_value2['no_of_dissected']) * 100;
                    $infectivepercentage = ($total_result1_value2['infective'] / $total_result1_value2['no_of_dissected']) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                /////////////////////////////////////////////
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' . $total_result1_value2['name_of_heo'] . '</td>' .
                    '<td>' . $total_result1_value2['moh_area'] . '</td>' .
                    '<td>' . $total_result1_value2['phi_and_phm'] . '</td>' .
                    '<td>' . $total_result1_value2['gn_divison'] . '</td>' .
                    '<td>ENTO 01</td>' .
                    '<td>' . $total_result1_value2['no_of_premises'] . '</td>' .
                    '<td>' . $total_result1_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' . $poscx . '</td>' .
                    '<td>' . $total_result1_value2['total_time_spend'] . '</td>' .
                    '<td>' . $total_result1_value2['mosquitodensity'] . '</td>' .
                    '<td>' . $total_result1_value2['total_mosquitos_collected'] . '</td>' .
                    '<td> 0 </td>' .
                    '<td>' . $total_result1_value2['no_of_dissected'] . '</td>' .
                    '<td>' . $total_result1_value2['total_postive_cx'] . '</td>' . /* $infected */
                    '<td>' . $total_result1_value2['infective'] . '</td>' .
                    '<td>' . $total_result1_value2['infectedpercentage'] . '</td>' .
                    '<td>' . $total_result1_value2['infectivepercentage'] . '</td>
</tr>';
            }
            // ENTO ` ONE 1   data get calculate

            // red ento 2 form hasnt mansoniya filed

            // ENTO ONE 2   data get calculate
            // $results = DB::select("
            // select  en2.heo, en2.moh_area,en2.moh_area,en2.gn_division,en2.total_cx_quin_mosq,en2.ento_02_id as ento_02_id,en5.ento_05_id as id
            // FROM ento_02 as en2
            // INNER JOIN ento_02_data as ento02data
            // ON ento02data.ento_02_id=en2.ento_02_id
            // INNER JOIN ento_05 as en5
            // ON en2.ento_02_id=en5.main_form_id
            // INNER JOIN ento_05_mosq as mos
            // ON en5.ento_05_id=mos.ento_05_id
            // INNER JOIN ento_05_new_mosq as mosnew
            // ON en5.ento_05_id=mosnew.ento_05_id
            // WHERE mos.species='Mansonia'
            // and mos.no_of_dissected > 0
            // and en5.main_form_type='ento_02'
            // AND en2.district='".$district."' AND en2.date BETWEEN '".$from."' AND '".$to."'
            // GROUP BY en2.ento_02_id
            // ");
            // WHERE mos.species2='CX' AND en1.district='".$district."' AND en1.date BETWEEN '".$from."' AND '".$to."'
            // GROUP BY en1.moh_area
            for ($i = 0; $i > count($results); $i++) {
                // this qure for get dessected form ento5 mos table
                $id = $results[$i]->id;
                $results_2 = DB::select(" SELECT  SUM(no_of_dissected) as no_of_dissected_al  from ento_05_mosq where ento_05_id=$id and species='Mansonia' ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $no_of_dissected_al = $results_2[$e]->no_of_dissected_al;
                }
                // this qure for get dessected form ento5 mos table
                $ento_02_id = $results[$i]->ento_02_id;
                // $total_postive_cx = $results[$i]->positive_mosq;    replase this qure for this
                // $infective =$results[$i]->infective;
                $results_3 = DB::select(" SELECT COUNT(ento_02_id) as no_of_premises , SUM(mosq_pcr) as pcr FROM ento_02_data WHERE ento_02_id=$ento_02_id ");
                for ($ee = 0; $ee < count($results_3); $ee++) {
                    $no_of_premises = $results_3[$ee]->no_of_premises;
                    $pcr = $results_3[$ee]->pcr;
                }

                $results_33 = DB::select(" SELECT COUNT(ento_02_id) as no_of_premises_positive FROM ento_02_data WHERE ento_02_id=$ento_02_id and total_cx_quin > 0 ");
                for ($ee33 = 0; $ee33 < count($results_33); $ee33++) {
                    $no_of_premises_positive = $results_33[$ee33]->no_of_premises_positive;
                }
                // get  all  infective and infecterd
                $results_4 = DB::select(" SELECT COUNT(id) as lab_positive FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' ");
                for ($ee4 = 0; $ee4 < count($results_4); $ee4++) {
                    // $infective  = $results_3[$ee]->labno;
                    $total_postive_cx = $results_4[$ee4]->lab_positive;
                }
                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective = $results_6[$ee6]->labno;
                }
                $name_of_heo = $results[$i]->heo;
                $moh_area = $results[$i]->moh_area;
                $phi_and_phm = "";
                $gn_divison = $results[$i]->gn_division;
                // $no_of_premises  = $results[$i]->no_of_premises;
                // $no_of_premises_positive  = $results[$i]->no_of_premises_positive;
                $results_7 = DB::select(" SELECT COUNT(ento_02_id) as no_of_premises FROM ento_02_data WHERE ento_02_id=$ento_02_id ");
                for ($ee = 0; $ee < count($results_3); $ee++) {
                    $no_of_premises = $results_3[$ee]->no_of_premises;
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
                $total_pcr = $total_pcr + $pcr;
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

                if ($total_time_spend == "" or $total_time_spend == 0) {
                    $mosquitodensity_row = 0;
                } else {
                    $mosquitodensity_row = ($total_mosquitos_collected / $total_time_spend);
                    $mosquitodensity_row = round($mosquitodensity_row, 2);
                }
                // group for row
                $old_data_2[] = array(
                    "name_of_heo" => $name_of_heo,
                    "moh_area" => $moh_area,
                    "phi_and_phm" => $phi_and_phm,
                    "gn_divison" => $gn_divison,
                    "ENTO_01" => "ENTO_03",
                    "no_of_premises" => $no_of_premises,
                    "no_of_premises_positive" => $no_of_premises_positive,
                    "poscx" => $poscx,
                    "total_time_spend" => $total_time_spend,
                    "mosquitodensity" => $mosquitodensity_row,
                    "total_mosquitos_collected" => $total_mosquitos_collected,
                    "pcr" => $pcr,
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
                            "ENTO_01" => "ENTO_03",
                            "no_of_premises" => ($value_2['no_of_premises'] + $value2['no_of_premises']),
                            "no_of_premises_positive" => ($value_2['no_of_premises_positive'] + $value2['no_of_premises_positive']),
                            "poscx" => ($value_2['poscx'] + $value2['poscx']),
                            "total_time_spend" => ($value_2['total_time_spend'] + $value2['total_time_spend']),
                            "mosquitodensity" => "0",
                            "total_mosquitos_collected" => ($value_2['total_mosquitos_collected'] + $value2['total_mosquitos_collected']),
                            "pcr" => ($value_2['pcr'] + $value2['pcr']),
                            "no_of_dissected" => ($value_2['no_of_dissected'] + $value2['no_of_dissected']),
                            "total_postive_cx" => ($value_2['total_postive_cx'] + $value2['total_postive_cx']),
                            "infective" => ($value_2['infective'] + $value2['infective']),
                            "infectedpercentage" => '',
                            "infectivepercentage" => '',
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
                    $infectedpercentage = ($total_result2_value2['total_postive_cx'] / $total_result2_value2['no_of_dissected']) * 100;
                    $infectivepercentage = ($total_result2_value2['infective'] / $total_result2_value2['no_of_dissected']) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                /////////////////////////////////////////////
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' . $total_result2_value2['name_of_heo'] . '</td>' .
                    '<td>' . $total_result2_value2['moh_area'] . '</td>' .
                    '<td>' . $total_result2_value2['phi_and_phm'] . '</td>' .
                    '<td>' . $total_result2_value2['gn_divison'] . '</td>' .
                    '<td>ENTO 02</td>' .
                    '<td>' . $total_result2_value2['no_of_premises'] . '</td>' .
                    '<td>' . $total_result2_value2['no_of_premises_positive'] . '</td>' .
                    '<td>' . $poscx . '</td>' .
                    '<td>' . $total_result2_value2['total_time_spend'] . '</td>' .
                    '<td>' . $total_result2_value2['mosquitodensity'] . '</td>' .
                    '<td>' . $total_result2_value2['total_mosquitos_collected'] . '</td>' .
                    '<td>' . $total_result2_value2['pcr'] . '</td>' .
                    '<td>' . $total_result2_value2['no_of_dissected'] . '</td>' .
                    '<td>' . $total_result2_value2['total_postive_cx'] . '</td>' . /* $infected */
                    '<td>' . $total_result2_value2['infective'] . '</td>' .
                    '<td>' . $total_result2_value2['infectedpercentage'] . '</td>' .
                    '<td>' . $total_result2_value2['infectivepercentage'] . '</td>
</tr>';
            }
            // ENTO ONE 2   data get calculate
            // ENTO ONE 3   data get calculate
            $results = DB::select("
select   en3.phi,en3.moh,en3.gn,en3.total_no_of_mosq,en3.ento_03_id as ento_03_id,en5.ento_05_id as id
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
AND mos.no_of_dissected > 0
AND en5.main_form_type='ento_03'
AND en3.district='" . $district . "' AND en3.date_of_collection BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY en3.ento_03_id");
            // AND en3.district='".$district."' AND en3.date_of_collection BETWEEN '".$from."' AND '".$to."'
            // WHERE mos.species2='CX' AND en1.district='".$district."' AND en1.date BETWEEN '".$from."' AND '".$to."'
            // GROUP BY en1.moh_area
            for ($i = 0; $i < count($results); $i++) {
                // this qure for get dessected form ento5 mos table
                $id = $results[$i]->id;
                $ento_03_id = $results[$i]->ento_03_id;
                // get collecterd mosqto
                $results_2_2 = DB::select("  SELECT  SUM(no_of_mosq) as collectedmos  from ento_03_data where    ento_03_id=$ento_03_id and   mosq_species LIKE 'Mansonia%'; ");
                for ($e22 = 0; $e22 < count($results_2_2); $e22++) {
                    $total_mosquitos_collected = $results_2_2[$e22]->collectedmos;
                }
                // get collecterd mosqto
                $results_2 = DB::select("  SELECT  SUM(no_of_dissected) as no_of_dissected_al  from ento_05_mosq where ento_05_id=$id and    species='Mansonia' ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $no_of_dissected_al = $results_2[$e]->no_of_dissected_al;
                }
                // this qure for get dessected form ento5 mos table
                $ento_02_id = $results[$i]->ento_03_id;
                // $total_postive_cx = $results[$i]->positive_mosq;    replase this qure for this
                // $infective =$results[$i]->infective;
                $no_of_premises_positive = "1";
                // get  all  infective and infecterd
                $results_4 = DB::select(" SELECT COUNT(id) as lab_positive FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' ");
                for ($ee4 = 0; $ee4 < count($results_4); $ee4++) {
                    // $infective  = $results_3[$ee]->labno;
                    $total_postive_cx = $results_4[$ee4]->lab_positive;
                }
                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective = $results_6[$ee6]->labno;
                }
                // $name_of_heo  = $results[$i]->heo;
                $name_of_heo = "";
                $moh_area = $results[$i]->moh;
                $phi_and_phm = $results[$i]->phi;
                $gn_divison = $results[$i]->gn;
                // $no_of_premises  = $results[$i]->no_of_premises;
                // $no_of_premises_positive  = $results[$i]->no_of_premises_positive;
                $no_of_premises = "1";
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

                if ($total_time_spend == "" or $total_time_spend == 0) {
                    $mosquitodensity_row = 0;
                } else {
                    $mosquitodensity_row = ($total_mosquitos_collected / $total_time_spend);
                    $mosquitodensity_row = round($mosquitodensity_row, 2);
                }
                // group for row
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
                            "mosquitodensity" => "0",
                            "total_mosquitos_collected" => ($value_3['total_mosquitos_collected'] + $value3['total_mosquitos_collected']),
                            "no_of_dissected" => ($value_3['no_of_dissected'] + $value3['no_of_dissected']),
                            "total_postive_cx" => ($value_3['total_postive_cx'] + $value3['total_postive_cx']),
                            "infective" => ($value_3['infective'] + $value3['infective']),
                            "infectedpercentage" => '',
                            "infectivepercentage" => '',
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
                    $infectedpercentage = ($total_result2_value3['total_postive_cx'] / $total_result2_value3['no_of_dissected']) * 100;
                    $infectivepercentage = ($total_result2_value3['infective'] / $total_result2_value3['no_of_dissected']) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                /////////////////////////////////////////////
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' . $total_result2_value3['name_of_heo'] . '</td>' .
                    '<td>' . $total_result2_value3['moh_area'] . '</td>' .
                    '<td>' . $total_result2_value3['phi_and_phm'] . '</td>' .
                    '<td>' . $total_result2_value3['gn_divison'] . '</td>' .
                    '<td>ENTO 03</td>' .
                    '<td>' . $total_result2_value3['no_of_premises'] . '</td>' .
                    '<td>' . $total_result2_value3['no_of_premises_positive'] . '</td>' .
                    '<td>' . $poscx . '</td>' .
                    '<td>' . $total_result2_value3['total_time_spend'] . '</td>' .
                    '<td>' . $total_result2_value3['mosquitodensity'] . '</td>' .
                    '<td>' . $total_result2_value3['total_mosquitos_collected'] . '</td>' .
                    '<td> 0 </td>' .
                    '<td>' . $total_result2_value3['no_of_dissected'] . '</td>' .
                    '<td>' . $total_result2_value3['total_postive_cx'] . '</td>' . /* $infected */
                    '<td>' . $total_result2_value3['infective'] . '</td>' .
                    '<td>' . $total_result2_value3['infectedpercentage'] . '</td>' .
                    '<td>' . $total_result2_value3['infectivepercentage'] . '</td>
</tr>';
            }
            // ENTO ONE 3   data get calculate
            $culex_total = 0; // ENTO ONE 4   data get calculate
            $results = DB::select("select  en3.phi,en3.moh,en3.moh,en3.gn_division,en3.ento_04_id as ento_04_id,en5.ento_05_id as id
FROM ento_04 as en3
INNER JOIN ento_05 as en5
ON en3.ento_04_id=en5.main_form_id
INNER JOIN ento_05_mosq as mos
ON en5.ento_05_id=mos.ento_05_id
INNER JOIN ento_05_new_mosq as mosnew
ON en5.ento_05_id=mosnew.ento_05_id
WHERE mos.species='Mansonia'
AND mos.no_of_dissected > 0
AND en3.district='" . $district . "' AND en3.date_of_collection BETWEEN '" . $from . "' AND '" . $to . "'
GROUP BY en3.ento_04_id
");
            // AND en3.district='".$district."' AND en3.date_of_collection BETWEEN '".$from."' AND '".$to."'
            // WHERE mos.species2='CX' AND en1.district='".$district."' AND en1.date BETWEEN '".$from."' AND '".$to."'
            // GROUP BY en1.moh_area
            for ($i = 0; $i < count($results); $i++) {
                // this qure for get dessected form ento5 mos table
                $id = $results[$i]->id;
                $results_2 = DB::select("  SELECT  SUM(no_of_dissected) as no_of_dissected_al  from ento_05_mosq where ento_05_id=$id and  species='Mansonia' ");
                for ($e = 0; $e < count($results_2); $e++) {
                    $no_of_dissected_al = $results_2[$e]->no_of_dissected_al;
                }
                // this qure for get dessected form ento5 mos table
                $ento_04_id = $results[$i]->ento_04_id;
                // $total_postive_cx = $results[$i]->positive_mosq;    replase this qure for this
                // $infective =$results[$i]->infective;
                $no_of_premises_positive = "1";
                // get  all  infective and infecterd
                $results_4 = DB::select(" SELECT COUNT(id) as lab_positive FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' ");
                for ($ee4 = 0; $ee4 < count($results_4); $ee4++) {
                    // $infective  = $results_3[$ee]->labno;
                    $total_postive_cx = $results_4[$ee4]->lab_positive;
                }
                $results_6 = DB::select("SELECT COUNT(id) as labno FROM ento_05_new_mosq WHERE ento_05_id=$id and species2='Mansonia' and (`abdomen_l3` > 0 or `head_l3` > 0 or `thorax_l3` > 0)");
                for ($ee6 = 0; $ee6 < count($results_6); $ee6++) {
                    // $infective  = $results_3[$ee]->labno;
                    $infective = $results_6[$ee6]->labno;
                }
                // $name_of_heo  = $results[$i]->heo;
                $name_of_heo = "";
                $moh_area = $results[$i]->moh;
                $phi_and_phm = $results[$i]->phi;
                $gn_divison = $results[$i]->gn_division;
                // $no_of_premises  = $results[$i]->no_of_premises;
                // $no_of_premises_positive  = $results[$i]->no_of_premises_positive;
                $no_of_premises = "1";
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

                if ($total_time_spend == "" or $total_time_spend == 0) {
                    $mosquitodensity_row = 0;
                } else {
                    $mosquitodensity_row = ($total_mosquitos_collected / $total_time_spend);
                    $mosquitodensity_row = round($mosquitodensity_row, 2);
                }
                // group for row
                $old_data_4[] = array(
                    "name_of_heo" => $name_of_heo,
                    "moh_area" => $moh_area,
                    "phi_and_phm" => $phi_and_phm,
                    "gn_divison" => $gn_divison,
                    "ENTO_01" => "ENTO_04",
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
            $total_result3 = array();
            foreach ($old_data_4 as $value_4) {
                $x = 0;
                $faind = 0;
                foreach ($total_result3 as $value4) {
                    if (array_search($value_4['name_of_heo'], $value4, true) and array_search($value_4['gn_divison'], $value4, true)) {
                        $total_result3[$x] = array(
                            "name_of_heo" => $value_4['name_of_heo'],
                            "moh_area" => $value_4['moh_area'],
                            "phi_and_phm" => $value_4['phi_and_phm'],
                            "gn_divison" => $value_4['gn_divison'],
                            "ENTO_01" => "ENTO_04",
                            "no_of_premises" => ($value_4['no_of_premises'] + $value4['no_of_premises']),
                            "no_of_premises_positive" => ($value_4['no_of_premises_positive'] + $value4['no_of_premises_positive']),
                            "poscx" => ($value_4['poscx'] + $value4['poscx']),
                            "total_time_spend" => ($value_4['total_time_spend'] + $value4['total_time_spend']),
                            "mosquitodensity" => "0",
                            "total_mosquitos_collected" => ($value_4['total_mosquitos_collected'] + $value4['total_mosquitos_collected']),
                            "no_of_dissected" => ($value_4['no_of_dissected'] + $value4['no_of_dissected']),
                            "total_postive_cx" => ($value_4['total_postive_cx'] + $value4['total_postive_cx']),
                            "infective" => ($value_4['infective'] + $value4['infective']),
                            "infectedpercentage" => '',
                            "infectivepercentage" => '',
                        );
                        $faind = 1;
                    }
                    $x++;
                }
                if ($faind == 0) {
                    $total_result3[] = $value_4;
                }
            }

            foreach ($total_result3 as $total_result2_value4) {
                $tno_of_premises_positive = $total_result2_value4['no_of_premises_positive'];
                $tno_of_premises = $total_result2_value4['no_of_premises'];
                ////////////////////////////////////////////////////////////////
                if ($tno_of_premises == "" or $tno_of_premises == 0) {
                    $poscx = 0;
                } else {
                    $poscx = ($tno_of_premises_positive / $tno_of_premises) * 100;
                    $poscx = round($poscx, 2);
                }

                //////////////////////////////////////////////
                if (empty($total_result2_value4['no_of_dissected'])) {
                    $infectedpercentage = '0';
                    $infectivepercentage = '0';
                } else {
                    $infectedpercentage = ($total_result2_value4['total_postive_cx'] / $total_result2_value4['no_of_dissected']) * 100;
                    $infectivepercentage = ($total_result2_value4['infective'] / $total_result2_value4['no_of_dissected']) * 100;
                    $infectedpercentage = round($infectedpercentage, 2);
                    $infectivepercentage = round($infectivepercentage, 2);
                }
                /////////////////////////////////////////////
                $viewData = $viewData .
                    '<tr>' .
                    '<td>' . $total_result2_value4['name_of_heo'] . '</td>' .
                    '<td>' . $total_result2_value4['moh_area'] . '</td>' .
                    '<td>' . $total_result2_value4['phi_and_phm'] . '</td>' .
                    '<td>' . $total_result2_value4['gn_divison'] . '</td>' .
                    '<td>ENTO 04</td>' .
                    '<td>' . $total_result2_value4['no_of_premises'] . '</td>' .
                    '<td>' . $total_result2_value4['no_of_premises_positive'] . '</td>' .
                    '<td>' . $poscx . '</td>' .
                    '<td>' . $total_result2_value4['total_time_spend'] . '</td>' .
                    '<td>' . $total_result2_value4['mosquitodensity'] . '</td>' .
                    '<td>' . $total_result2_value4['total_mosquitos_collected'] . '</td>' .
                    '<td> 0 </td>' .
                    '<td>' . $total_result2_value4['no_of_dissected'] . '</td>' .
                    '<td>' . $total_result2_value4['total_postive_cx'] . '</td>' . /* $infected */
                    '<td>' . $total_result2_value4['infective'] . '</td>' .
                    '<td>' . $total_result2_value4['infectedpercentage'] . '</td>' .
                    '<td>' . $total_result2_value4['infectivepercentage'] . '</td>
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

                if ($total_total_time_spend == 0) {
                    $total = 0;
                } else {
                    $total = round((($total_total_mosquitos_collected / $total_total_time_spend)), 2);
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
                    '<td>' . $total . '</td>' .
                    '<td> 0 </td>' . //  '<td>' . $total_mosquitodensity . '</td>' .
                    '<td>' . $total_total_mosquitos_collected . '</td>' .
                    '<td>' . $total_pcr . '</td>' .
                    '<td>' . $total_no_of_dissected . '</td>' .
                    '<td>' . $total_total_postive_cx . '</td>' . /* $infected */
                    '<td>' . $total_infective . '</td>' .
                    '<td>' . $total_infective_t . '</td>' .
                    '<td>' . $total_infected . '</td>
</tr>';
            }
            // if($total_no_of_premises)
            // {

            // $viewData = $viewData .
            // '<tr>' .
            //     '<td>Total</td>' .
            //     '<td></td>' .
            //     '<td></td>' .
            //     '<td></td>' .
            //     '<td> </td>' .
            //     '<td>' . $total_no_of_premises . '</td>' .
            //     '<td>' . $total_no_of_premises_positive . '</td>' .
            //     '<td>' . round((($total_no_of_premises_positive / $total_no_of_premises) * 100),2) .'</td>' .   // round((($total_no_of_premises_positive / $total_no_of_premises) * 100)/$total_no_of_collectors,2)
            //     '<td>' . $total_total_time_spend . '</td>' .
            //     '<td>' . round((($total_total_mosquitos_collected / $total_total_time_spend) ),2) . '</td>' .
            //     '<td>' . $total_total_mosquitos_collected . '</td>' .
            //     '<td>' . $total_no_of_dissected . '</td>' .
            //     '<td>' . $total_total_postive_cx   . '</td>' ./* $infected */
            //     '<td>' . $total_infective . '</td>' .
            //     '<td>' . $total_infective_t. '</td>' .
            //     '<td>' . $total_infected .'</td>
            // </tr>';
            // }
            // ENTO ONE 4   data get calculate

            if ($export_type == 'PDF') {

                $content = ob_get_clean();
                // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
                // File::requireOnce($html2pdf_path);
                $template = view(
                    'report/b1_view_man',
                    compact('data'),
                    ["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
                );
                try {
                    $html2pdf = new Html2Pdf('L', 'A3', 'en', true, 'UTF-8', array(10, 10, 10, 10));

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
                    'report/',
                    compact('data'),
                    ["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
                );
            } else {

                header('Content-Type: application/xls');
                header('Content-Disposition: attachment; filename=download.xls');
                echo $template = view(
                    'report/b1_view_man',
                    compact('data'),
                    ["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
                );
            }

            // red if anny error_log plz chek php version;
        }
        // red if anny error_log plz chek php version;
    }

    //                 header('Content-Type: application/xls');
    // header('Content-Disposition: attachment; filename=download.xls');
    // echo $template = view(
    //     'report/b1_view_man',
    //     compact('data'),
    //     ["dataView" => $viewData, 'district' => $data['district'], 'from' => $data['from'], 'to' => $data['to']]
    // );

}
