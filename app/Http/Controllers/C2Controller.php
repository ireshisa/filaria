<?php

namespace App\Http\Controllers;
use Auth;
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class C2Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function c2_report_print(Request $request)
    {
        $data = $request->all();
        $district = $data['district'];
        $select = $data['select'];
        $year = $data['year'];
        $month = $data['month'];
        $quarter = $data['quarter'];
        $export_type = $data['export_type'];

        $sumtotal_num_lymphed = 0;
        $sumtotal_num_hydro = 0;
        $summf_pos_patient = 0;
        $viewData = "";
        $viewData3 = "";
        $monthlyy= null;

        $total_num_lymphed12=0; 
        $total_num_hydro12=0;
        $mf_pos_patient12=0;
        $opd_patient12=0;
     $request_type="";

        if ($select == "yearly") {
           
            $request_type= "Annual-".$year;
            $result = DB::table('c1')
                ->select('*')
                ->where('district', $district)
                ->where('year', $year)
                ->get();

                // echo "yearly";
                // dd($result);
                // die();
        } else if ($select == "quarterly") {
            if ($quarter == "Quarter1") {
    
             $request_type= " 1<sup>st</sup> Quarter  " . $year;

                $result = DB::table('c1')
                    ->select('*')
                    ->where('district', $district)
                    ->where('year', $year)
                    ->whereIn('month', array("January", "February", "March"))
                    ->get();
            } else if ($quarter == "Quarter2") {
                $request_type= " 2<sup>nd</sup> Quarter  " . $year;
                $result = DB::table('c1')
                    ->select('*')
                    ->where('district', $district)
                    ->where('year', $year)
                    ->whereIn('month', array("April", "May", "June"))
                    ->get();
            } else if ($quarter == "Quarter3") {
                $request_type= " 3<sup>rd</sup> Quarter  " . $year;
                $result = DB::table('c1')
                    ->select('*')
                    ->where('district', $district)
                    ->where('year', $year)
                    ->whereIn('month', array("July", "August", "September"))
                    ->get();
            } else if ($quarter == "Quarter4") {

                $request_type= " 4<sup>th</sup> Quarter " . $year;
                $result = DB::table('c1')
                    ->select('*')
                    ->where('district', $district)
                    ->where('year', $year)
                    ->whereIn('month', array("October", "November", "December"))
                    ->get();
            }
        } else if ($select == "monthly") {

            $request_type= $month." ".$year;
            $result = DB::table('c1')
                ->select('*')
                ->where('district', $district)
                ->where('year', $year)
                ->where('month', $month)
                ->get();
        }
                //   echo "yearly";
                //   dd($result);
                //   die();



             



                $yearly_male_0_10_1 = 0;
                $yearly_male_0_10_2 = 0;
                $yearly_male_0_10_3 = 0;
                $yearly_male_0_10_4 = 0;
                $yearly_male_0_10_5 = 0;
                $yearly_male_0_10_6 = 0;
                $yearly_male_0_10_7 = 0;
                $yearly_male_0_10_total = 0;
                $yearly_male_11_20_1 = 0;
                $yearly_male_11_20_2 = 0;
                $yearly_male_11_20_3 = 0;
                $yearly_male_11_20_4 = 0;
                $yearly_male_11_20_5 = 0;
                $yearly_male_11_20_6 = 0;
                $yearly_male_11_20_7 = 0;
                $yearly_male_11_20_total = 0;
                $yearly_male_21_30_1 = 0;
                $yearly_male_21_30_2 = 0;
                $yearly_male_21_30_3 = 0;
                $yearly_male_21_30_4 = 0;
                $yearly_male_21_30_5 = 0;
                $yearly_male_21_30_6 = 0;
                $yearly_male_21_30_7 = 0;
                $yearly_male_21_30_total = 0;
                $yearly_male_31_40_1 = 0;
                $yearly_male_31_40_2 = 0;
                $yearly_male_31_40_3 = 0;
                $yearly_male_31_40_4 = 0;
                $yearly_male_31_40_5 = 0;
                $yearly_male_31_40_6 = 0;
                $yearly_male_31_40_7 = 0;
                $yearly_male_31_40_total = 0;
                $yearly_male_41_50_1 = 0;
                $yearly_male_41_50_2 = 0;
                $yearly_male_41_50_3 = 0;
                $yearly_male_41_50_4 = 0;
                $yearly_male_41_50_5 = 0;
                $yearly_male_41_50_6 = 0;
                $yearly_male_41_50_7 = 0;
                $yearly_male_41_50_total = 0;
                $yearly_male_51_60_1 = 0;
                $yearly_male_51_60_2 = 0;
                $yearly_male_51_60_3 = 0;
                $yearly_male_51_60_4 = 0;
                $yearly_male_51_60_5 = 0;
                $yearly_male_51_60_6 = 0;
                $yearly_male_51_60_7 = 0;
                $yearly_male_51_60_total = 0;
                $yearly_male_61_70_1 = 0;
                $yearly_male_61_70_2 = 0;
                $yearly_male_61_70_3 = 0;
                $yearly_male_61_70_4 = 0;
                $yearly_male_61_70_5 = 0;
                $yearly_male_61_70_6 = 0;
                $yearly_male_61_70_7 = 0;
                $yearly_male_61_70_total = 0;
                $yearly_male_71_80_1 = 0;
                $yearly_male_71_80_2 = 0;
                $yearly_male_71_80_3 = 0;
                $yearly_male_71_80_4 = 0;
                $yearly_male_71_80_5 = 0;
                $yearly_male_71_80_6 = 0;
                $yearly_male_71_80_7 = 0;
                $yearly_male_71_80_total = 0;
                $yearly_male_81_1 = 0;
                $yearly_male_81_2 = 0;
                $yearly_male_81_3 = 0;
                $yearly_male_81_4 = 0;
                $yearly_male_81_5 = 0;
                $yearly_male_81_6 = 0;
                $yearly_male_81_7 = 0;
                $yearly_male_81_total = 0;
                $yearly_male_total_1 = 0;
                $yearly_male_total_2 = 0;
                $yearly_male_total_3 = 0;
                $yearly_male_total_4 = 0;
                $yearly_male_total_5 = 0;
                $yearly_male_total_6 = 0;
                $yearly_male_total_7 = 0;
                $yearly_subsequent_male_0_10_1 = 0;
                $yearly_subsequent_male_0_10_2 = 0;
                $yearly_subsequent_male_0_10_3 = 0;
                $yearly_subsequent_male_0_10_4 = 0;
                $yearly_subsequent_male_0_10_5 = 0;
                $yearly_subsequent_male_0_10_6 = 0;
                $yearly_subsequent_male_0_10_7 = 0;
                $yearly_subsequent_male_0_10_total = 0;
                $yearly_subsequent_male_11_20_1 = 0;
                $yearly_subsequent_male_11_20_2 = 0;
                $yearly_subsequent_male_11_20_3 = 0;
                $yearly_subsequent_male_11_20_4 = 0;
                $yearly_subsequent_male_11_20_5 = 0;
                $yearly_subsequent_male_11_20_6 = 0;
                $yearly_subsequent_male_11_20_7 = 0;
                $yearly_subsequent_male_11_20_total = 0;
                $yearly_subsequent_male_21_30_1 = 0;
                $yearly_subsequent_male_21_30_2 = 0;
                $yearly_subsequent_male_21_30_3 = 0;
                $yearly_subsequent_male_21_30_4 = 0;
                $yearly_subsequent_male_21_30_5 = 0;
                $yearly_subsequent_male_21_30_6 = 0;
                $yearly_subsequent_male_21_30_7 = 0;
                $yearly_subsequent_male_21_30_total = 0;
                $yearly_subsequent_male_31_40_1 = 0;
                $yearly_subsequent_male_31_40_2 = 0;
                $yearly_subsequent_male_31_40_3 = 0;
                $yearly_subsequent_male_31_40_4 = 0;
                $yearly_subsequent_male_31_40_5 = 0;
                $yearly_subsequent_male_31_40_6 = 0;
                $yearly_subsequent_male_31_40_7 = 0;
                $yearly_subsequent_male_31_40_total = 0;
                $yearly_subsequent_male_41_50_1 = 0;
                $yearly_subsequent_male_41_50_2 = 0;
                $yearly_subsequent_male_41_50_3 = 0;
                $yearly_subsequent_male_41_50_4 = 0;
                $yearly_subsequent_male_41_50_5 = 0;
                $yearly_subsequent_male_41_50_6 = 0;
                $yearly_subsequent_male_41_50_7 = 0;
                $yearly_subsequent_male_41_50_total = 0;
                $yearly_subsequent_male_51_60_1 = 0;
                $yearly_subsequent_male_51_60_2 = 0;
                $yearly_subsequent_male_51_60_3 = 0;
                $yearly_subsequent_male_51_60_4 = 0;
                $yearly_subsequent_male_51_60_5 = 0;
                $yearly_subsequent_male_51_60_6 = 0;
                $yearly_subsequent_male_51_60_7 = 0;
                $yearly_subsequent_male_51_60_total = 0;
                $yearly_subsequent_male_61_70_1 = 0;
                $yearly_subsequent_male_61_70_2 = 0;
                $yearly_subsequent_male_61_70_3 = 0;
                $yearly_subsequent_male_61_70_4 = 0;
                $yearly_subsequent_male_61_70_5 = 0;
                $yearly_subsequent_male_61_70_6 = 0;
                $yearly_subsequent_male_61_70_7 = 0;
                $yearly_subsequent_male_61_70_total = 0;
                $yearly_subsequent_male_71_80_1 = 0;
                $yearly_subsequent_male_71_80_2 = 0;
                $yearly_subsequent_male_71_80_3 = 0;
                $yearly_subsequent_male_71_80_4 = 0;
                $yearly_subsequent_male_71_80_5 = 0;
                $yearly_subsequent_male_71_80_6 = 0;
                $yearly_subsequent_male_71_80_7 = 0;
                $yearly_subsequent_male_71_80_total = 0;
                $yearly_subsequent_male_80_1 = 0;
                $yearly_subsequent_male_80_2 = 0;
                $yearly_subsequent_male_80_3 = 0;
                $yearly_subsequent_male_80_4 = 0;
                $yearly_subsequent_male_80_5 = 0;
                $yearly_subsequent_male_80_6 = 0;
                $yearly_subsequent_male_80_7 = 0;
                $yearly_subsequent_male_80_total = 0;
                $yearly_subsequent_male_total_1 = 0;
                $yearly_subsequent_male_total_2 = 0;
                $yearly_subsequent_male_total_3 = 0;
                $yearly_subsequent_male_total_4 = 0;
                $yearly_subsequent_male_total_5 = 0;
                $yearly_subsequent_male_total_6 = 0;
                $yearly_subsequent_male_total_7 = 0;
                $yearly_total_num_lymphed = 0;
                $yearly_total_num_hydro = 0;
                $yearly_mf_pos_patient = 0;
                $yearly_opd_patient = 0;
                $yearly_female_0_10_1 = 0;
                $yearly_female_0_10_2 = 0;
                $yearly_female_0_10_3 = 0;
                $yearly_female_0_10_4 = 0;
                $yearly_female_0_10_5 = 0;
                $yearly_female_0_10_6 = 0;
                $yearly_female_0_10_7 = 0;
                $yearly_female_0_10_total = 0;
                $yearly_female_11_20_1 = 0;
                $yearly_female_11_20_2 = 0;
                $yearly_female_11_20_3 = 0;
                $yearly_female_11_20_4 = 0;
                $yearly_female_11_20_5 = 0;
                $yearly_female_11_20_6 = 0;
                $yearly_female_11_20_7 = 0;
                $yearly_female_11_20_total = 0;
                $yearly_female_21_30_1 = 0;
                $yearly_female_21_30_2 = 0;
                $yearly_female_21_30_3 = 0;
                $yearly_female_21_30_4 = 0;
                $yearly_female_21_30_5 = 0;
                $yearly_female_21_30_6 = 0;
                $yearly_female_21_30_7 = 0;
                $yearly_female_21_30_total = 0;
                $yearly_female_31_40_1 = 0;
                $yearly_female_31_40_2 = 0;
                $yearly_female_31_40_3 = 0;
                $yearly_female_31_40_4 = 0;
                $yearly_female_31_40_5 = 0;
                $yearly_female_31_40_6 = 0;
                $yearly_female_31_40_7 = 0;
                $yearly_female_31_40_total = 0;
                $yearly_female_41_50_1 = 0;
                $yearly_female_41_50_2 = 0;
                $yearly_female_41_50_3 = 0;
                $yearly_female_41_50_4 = 0;
                $yearly_female_41_50_5 = 0;
                $yearly_female_41_50_6 = 0;
                $yearly_female_41_50_7 = 0;
                $yearly_female_41_50_total = 0;
                $yearly_female_51_60_1 = 0;
                $yearly_female_51_60_2 = 0;
                $yearly_female_51_60_3 = 0;
                $yearly_female_51_60_4 = 0;
                $yearly_female_51_60_5 = 0;
                $yearly_female_51_60_6 = 0;
                $yearly_female_51_60_7 = 0;
                $yearly_female_51_60_total = 0;
                $yearly_female_61_70_1 = 0;
                $yearly_female_61_70_2 = 0;
                $yearly_female_61_70_3 = 0;
                $yearly_female_61_70_4 = 0;
                $yearly_female_61_70_5 = 0;
                $yearly_female_61_70_6 = 0;
                $yearly_female_61_70_7 = 0;
                $yearly_female_61_70_total = 0;
                $yearly_female_71_80_1 = 0;
                $yearly_female_71_80_2 = 0;
                $yearly_female_71_80_3 = 0;
                $yearly_female_71_80_4 = 0;
                $yearly_female_71_80_5 = 0;
                $yearly_female_71_80_6 = 0;
                $yearly_female_71_80_7 = 0;
                $yearly_female_71_80_total = 0;
                $yearly_female_80_1 = 0;
                $yearly_female_80_2 = 0;
                $yearly_female_80_3 = 0;
                $yearly_female_80_4 = 0;
                $yearly_female_80_5 = 0;
                $yearly_female_80_6 = 0;
                $yearly_female_80_7 = 0;
                $yearly_female_80_total = 0;
                $yearly_female_total_1 = 0;
                $yearly_female_total_2 = 0;
                $yearly_female_total_3 = 0;
                $yearly_female_total_4 = 0;
                $yearly_female_total_5 = 0;
                $yearly_female_total_6 = 0;
                $yearly_female_total_7 = 0;
                $yearly_subsequent_female_0_10_1 = 0;
                $yearly_subsequent_female_0_10_2 = 0;
                $yearly_subsequent_female_0_10_3 = 0;
                $yearly_subsequent_female_0_10_4 = 0;
                $yearly_subsequent_female_0_10_5 = 0;
                $yearly_subsequent_female_0_10_6 = 0;
                $yearly_subsequent_female_0_10_7 = 0;
                $yearly_subsequent_female_0_10_total = 0;
                $yearly_subsequent_female_11_20_1 = 0;
                $yearly_subsequent_female_11_20_2 = 0;
                $yearly_subsequent_female_11_20_3 = 0;
                $yearly_subsequent_female_11_20_4 = 0;
                $yearly_subsequent_female_11_20_5 = 0;
                $yearly_subsequent_female_11_20_6 = 0;
                $yearly_subsequent_female_11_20_7 = 0;
                $yearly_subsequent_female_11_20_total = 0;
                $yearly_subsequent_female_21_30_1 = 0;
                $yearly_subsequent_female_21_30_2 = 0;
                $yearly_subsequent_female_21_30_3 = 0;
                $yearly_subsequent_female_21_30_4 = 0;
                $yearly_subsequent_female_21_30_5 = 0;
                $yearly_subsequent_female_21_30_6 = 0;
                $yearly_subsequent_female_21_30_7 = 0;
                $yearly_subsequent_female_21_30_total = 0;
                $yearly_subsequent_female_31_40_1 = 0;
                $yearly_subsequent_female_31_40_2 = 0;
                $yearly_subsequent_female_31_40_3 = 0;
                $yearly_subsequent_female_31_40_4 = 0;
                $yearly_subsequent_female_31_40_5 = 0;
                $yearly_subsequent_female_31_40_6 = 0;
                $yearly_subsequent_female_31_40_7 = 0;
                $yearly_subsequent_female_31_40_total = 0;
                $yearly_subsequent_female_41_50_1 = 0;
                $yearly_subsequent_female_41_50_2 = 0;
                $yearly_subsequent_female_41_50_3 = 0;
                $yearly_subsequent_female_41_50_4 = 0;
                $yearly_subsequent_female_41_50_5 = 0;
                $yearly_subsequent_female_41_50_6 = 0;
                $yearly_subsequent_female_41_50_7 = 0;
                $yearly_subsequent_female_41_50_total = 0;
                $yearly_subsequent_female_51_60_1 = 0;
                $yearly_subsequent_female_51_60_2 = 0;
                $yearly_subsequent_female_51_60_3 = 0;
                $yearly_subsequent_female_51_60_4 = 0;
                $yearly_subsequent_female_51_60_5 = 0;
                $yearly_subsequent_female_51_60_6 = 0;
                $yearly_subsequent_female_51_60_7 = 0;
                $yearly_subsequent_female_51_60_total = 0;
                $yearly_subsequent_female_61_70_1 = 0;
                $yearly_subsequent_female_61_70_2 = 0;
                $yearly_subsequent_female_61_70_3 = 0;
                $yearly_subsequent_female_61_70_4 = 0;
                $yearly_subsequent_female_61_70_5 = 0;
                $yearly_subsequent_female_61_70_6 = 0;
                $yearly_subsequent_female_61_70_7 = 0;
                $yearly_subsequent_female_61_70_total = 0;
                $yearly_subsequent_female_71_80_1 = 0;
                $yearly_subsequent_female_71_80_2 = 0;
                $yearly_subsequent_female_71_80_3 = 0;
                $yearly_subsequent_female_71_80_4 = 0;
                $yearly_subsequent_female_71_80_5 = 0;
                $yearly_subsequent_female_71_80_6 = 0;
                $yearly_subsequent_female_71_80_7 = 0;
                $yearly_subsequent_female_71_80_total = 0;
                $yearly_subsequent_female_81_1 = 0;
                $yearly_subsequent_female_81_2 = 0;
                $yearly_subsequent_female_81_3 = 0;
                $yearly_subsequent_female_81_4 = 0;
                $yearly_subsequent_female_81_5 = 0;
                $yearly_subsequent_female_81_6 = 0;
                $yearly_subsequent_female_81_7 = 0;
                $yearly_subsequent_female_81_total = 0;
                $yearly_subsequent_female_total_1 = 0;
                $yearly_subsequent_female_total_2 = 0;
                $yearly_subsequent_female_total_3 = 0;
                $yearly_subsequent_female_total_4 = 0;
                $yearly_subsequent_female_total_5 = 0;
                $yearly_subsequent_female_total_6 = 0;
                $yearly_subsequent_female_total_7 = 0;
                $yearly_male_total_total = 0;
                $yearly_subsequent_male_total_total = 0;
                $yearly_female_total_total = 0;
                $yearly_subsequent_female_total_total = 0;
//this add for get sum yearly











$months = [];
$quarter1 = array(
'name'=> 'Quarter 01',
'male_0_10_1'=>0,
'male_0_10_2'=>0,
'male_0_10_3'=>0,
'male_0_10_4'=>0,
'male_0_10_5'=>0,
'male_0_10_6'=>0,
'male_0_10_7'=>0,
'male_0_10_total'=>0,
'male_11_20_1'=>0,
'male_11_20_2'=>0,
'male_11_20_3'=>0,
'male_11_20_4'=>0,
'male_11_20_5'=>0,
'male_11_20_6'=>0,
'male_11_20_7'=>0,
'male_11_20_total'=>0,
'male_21_30_1'=>0,
'male_21_30_2'=>0,
'male_21_30_3'=>0,
'male_21_30_4'=>0,
'male_21_30_5'=>0,
'male_21_30_6'=>0,
'male_21_30_7'=>0,
'male_21_30_total'=>0,
'male_31_40_1'=>0,
'male_31_40_2'=>0,
'male_31_40_3'=>0,
'male_31_40_4'=>0,
'male_31_40_5'=>0,
'male_31_40_6'=>0,
'male_31_40_7'=>0,
'male_31_40_total'=>0,
'male_41_50_1'=>0,
'male_41_50_2'=>0,
'male_41_50_3'=>0,
'male_41_50_4'=>0,
'male_41_50_5'=>0,
'male_41_50_6'=>0,
'male_41_50_7'=>0,
'male_41_50_total'=>0,
'male_51_60_1'=>0,
'male_51_60_2'=>0,
'male_51_60_3'=>0,
'male_51_60_4'=>0,
'male_51_60_5'=>0,
'male_51_60_6'=>0,
'male_51_60_7'=>0,
'male_51_60_total'=>0,
'male_61_70_1'=>0,
'male_61_70_2'=>0,
'male_61_70_3'=>0,
'male_61_70_4'=>0,
'male_61_70_5'=>0,
'male_61_70_6'=>0,
'male_61_70_7'=>0,
'male_61_70_total'=>0,
'male_71_80_1'=>0,
'male_71_80_2'=>0,
'male_71_80_3'=>0,
'male_71_80_4'=>0,
'male_71_80_5'=>0,
'male_71_80_6'=>0,
'male_71_80_7'=>0,
'male_71_80_total'=>0,
'male_81_1'=>0,
'male_81_2'=>0,
'male_81_3'=>0,
'male_81_4'=>0,
'male_81_5'=>0,
'male_81_6'=>0,
'male_81_7'=>0,
'male_81_total'=>0,
'male_total_1'=>0,
'male_total_2'=>0,
'male_total_3'=>0,
'male_total_4'=>0,
'male_total_5'=>0,
'male_total_6'=>0,
'male_total_7'=>0,
'subsequent_male_0_10_1'=>0,
'subsequent_male_0_10_2'=>0,
'subsequent_male_0_10_3'=>0,
'subsequent_male_0_10_4'=>0,
'subsequent_male_0_10_5'=>0,
'subsequent_male_0_10_6'=>0,
'subsequent_male_0_10_7'=>0,
'subsequent_male_0_10_total'=>0,
'subsequent_male_11_20_1'=>0,
'subsequent_male_11_20_2'=>0,
'subsequent_male_11_20_3'=>0,
'subsequent_male_11_20_4'=>0,
'subsequent_male_11_20_5'=>0,
'subsequent_male_11_20_6'=>0,
'subsequent_male_11_20_7'=>0,
'subsequent_male_11_20_total'=>0,
'subsequent_male_21_30_1'=>0,
'subsequent_male_21_30_2'=>0,
'subsequent_male_21_30_3'=>0,
'subsequent_male_21_30_4'=>0,
'subsequent_male_21_30_5'=>0,
'subsequent_male_21_30_6'=>0,
'subsequent_male_21_30_7'=>0,
'subsequent_male_21_30_total'=>0,
'subsequent_male_31_40_1'=>0,
'subsequent_male_31_40_2'=>0,
'subsequent_male_31_40_3'=>0,
'subsequent_male_31_40_4'=>0,
'subsequent_male_31_40_5'=>0,
'subsequent_male_31_40_6'=>0,
'subsequent_male_31_40_7'=>0,
'subsequent_male_31_40_total'=>0,
'subsequent_male_41_50_1'=>0,
'subsequent_male_41_50_2'=>0,
'subsequent_male_41_50_3'=>0,
'subsequent_male_41_50_4'=>0,
'subsequent_male_41_50_5'=>0,
'subsequent_male_41_50_6'=>0,
'subsequent_male_41_50_7'=>0,
'subsequent_male_41_50_total'=>0,
'subsequent_male_51_60_1'=>0,
'subsequent_male_51_60_2'=>0,
'subsequent_male_51_60_3'=>0,
'subsequent_male_51_60_4'=>0,
'subsequent_male_51_60_5'=>0,
'subsequent_male_51_60_6'=>0,
'subsequent_male_51_60_7'=>0,
'subsequent_male_51_60_total'=>0,
'subsequent_male_61_70_1'=>0,
'subsequent_male_61_70_2'=>0,
'subsequent_male_61_70_3'=>0,
'subsequent_male_61_70_4'=>0,
'subsequent_male_61_70_5'=>0,
'subsequent_male_61_70_6'=>0,
'subsequent_male_61_70_7'=>0,
'subsequent_male_61_70_total'=>0,
'subsequent_male_71_80_1'=>0,
'subsequent_male_71_80_2'=>0,
'subsequent_male_71_80_3'=>0,
'subsequent_male_71_80_4'=>0,
'subsequent_male_71_80_5'=>0,
'subsequent_male_71_80_6'=>0,
'subsequent_male_71_80_7'=>0,
'subsequent_male_71_80_total'=>0,
'subsequent_male_80_1'=>0,
'subsequent_male_80_2'=>0,
'subsequent_male_80_3'=>0,
'subsequent_male_80_4'=>0,
'subsequent_male_80_5'=>0,
'subsequent_male_80_6'=>0,
'subsequent_male_80_7'=>0,
'subsequent_male_80_total'=>0,
'subsequent_male_total_1'=>0,
'subsequent_male_total_2'=>0,
'subsequent_male_total_3'=>0,
'subsequent_male_total_4'=>0,
'subsequent_male_total_5'=>0,
'subsequent_male_total_6'=>0,
'subsequent_male_total_7'=>0,
'total_num_lymphed'=>0,
'total_num_hydro'=>0,
'mf_pos_patient'=>0,
'opd_patient'=>0,
'female_0_10_1'=>0,
'female_0_10_2'=>0,
'female_0_10_3'=>0,
'female_0_10_4'=>0,
'female_0_10_5'=>0,
'female_0_10_6'=>0,
'female_0_10_7'=>0,
'female_0_10_total'=>0,
'female_11_20_1'=>0,
'female_11_20_2'=>0,
'female_11_20_3'=>0,
'female_11_20_4'=>0,
'female_11_20_5'=>0,
'female_11_20_6'=>0,
'female_11_20_7'=>0,
'female_11_20_total'=>0,
'female_21_30_1'=>0,
'female_21_30_2'=>0,
'female_21_30_3'=>0,
'female_21_30_4'=>0,
'female_21_30_5'=>0,
'female_21_30_6'=>0,
'female_21_30_7'=>0,
'female_21_30_total'=>0,
'female_31_40_1'=>0,
'female_31_40_2'=>0,
'female_31_40_3'=>0,
'female_31_40_4'=>0,
'female_31_40_5'=>0,
'female_31_40_6'=>0,
'female_31_40_7'=>0,
'female_31_40_total'=>0,
'female_41_50_1'=>0,
'female_41_50_2'=>0,
'female_41_50_3'=>0,
'female_41_50_4'=>0,
'female_41_50_5'=>0,
'female_41_50_6'=>0,
'female_41_50_7'=>0,
'female_41_50_total'=>0,
'female_51_60_1'=>0,
'female_51_60_2'=>0,
'female_51_60_3'=>0,
'female_51_60_4'=>0,
'female_51_60_5'=>0,
'female_51_60_6'=>0,
'female_51_60_7'=>0,
'female_51_60_total'=>0,
'female_61_70_1'=>0,
'female_61_70_2'=>0,
'female_61_70_3'=>0,
'female_61_70_4'=>0,
'female_61_70_5'=>0,
'female_61_70_6'=>0,
'female_61_70_7'=>0,
'female_61_70_total'=>0,
'female_71_80_1'=>0,
'female_71_80_2'=>0,
'female_71_80_3'=>0,
'female_71_80_4'=>0,
'female_71_80_5'=>0,
'female_71_80_6'=>0,
'female_71_80_7'=>0,
'female_71_80_total'=>0,
'female_80_1'=>0,
'female_80_2'=>0,
'female_80_3'=>0,
'female_80_4'=>0,
'female_80_5'=>0,
'female_80_6'=>0,
'female_80_7'=>0,
'female_80_total'=>0,
'female_total_1'=>0,
'female_total_2'=>0,
'female_total_3'=>0,
'female_total_4'=>0,
'female_total_5'=>0,
'female_total_6'=>0,
'female_total_7'=>0,
'subsequent_female_0_10_1'=>0,
'subsequent_female_0_10_2'=>0,
'subsequent_female_0_10_3'=>0,
'subsequent_female_0_10_4'=>0,
'subsequent_female_0_10_5'=>0,
'subsequent_female_0_10_6'=>0,
'subsequent_female_0_10_7'=>0,
'subsequent_female_0_10_total'=>0,
'subsequent_female_11_20_1'=>0,
'subsequent_female_11_20_2'=>0,
'subsequent_female_11_20_3'=>0,
'subsequent_female_11_20_4'=>0,
'subsequent_female_11_20_5'=>0,
'subsequent_female_11_20_6'=>0,
'subsequent_female_11_20_7'=>0,
'subsequent_female_11_20_total'=>0,
'subsequent_female_21_30_1'=>0,
'subsequent_female_21_30_2'=>0,
'subsequent_female_21_30_3'=>0,
'subsequent_female_21_30_4'=>0,
'subsequent_female_21_30_5'=>0,
'subsequent_female_21_30_6'=>0,
'subsequent_female_21_30_7'=>0,
'subsequent_female_21_30_total'=>0,
'subsequent_female_31_40_1'=>0,
'subsequent_female_31_40_2'=>0,
'subsequent_female_31_40_3'=>0,
'subsequent_female_31_40_4'=>0,
'subsequent_female_31_40_5'=>0,
'subsequent_female_31_40_6'=>0,
'subsequent_female_31_40_7'=>0,
'subsequent_female_31_40_total'=>0,
'subsequent_female_41_50_1'=>0,
'subsequent_female_41_50_2'=>0,
'subsequent_female_41_50_3'=>0,
'subsequent_female_41_50_4'=>0,
'subsequent_female_41_50_5'=>0,
'subsequent_female_41_50_6'=>0,
'subsequent_female_41_50_7'=>0,
'subsequent_female_41_50_total'=>0,
'subsequent_female_51_60_1'=>0,
'subsequent_female_51_60_2'=>0,
'subsequent_female_51_60_3'=>0,
'subsequent_female_51_60_4'=>0,
'subsequent_female_51_60_5'=>0,
'subsequent_female_51_60_6'=>0,
'subsequent_female_51_60_7'=>0,
'subsequent_female_51_60_total'=>0,
'subsequent_female_61_70_1'=>0,
'subsequent_female_61_70_2'=>0,
'subsequent_female_61_70_3'=>0,
'subsequent_female_61_70_4'=>0,
'subsequent_female_61_70_5'=>0,
'subsequent_female_61_70_6'=>0,
'subsequent_female_61_70_7'=>0,
'subsequent_female_61_70_total'=>0,
'subsequent_female_71_80_1'=>0,
'subsequent_female_71_80_2'=>0,
'subsequent_female_71_80_3'=>0,
'subsequent_female_71_80_4'=>0,
'subsequent_female_71_80_5'=>0,
'subsequent_female_71_80_6'=>0,
'subsequent_female_71_80_7'=>0,
'subsequent_female_71_80_total'=>0,
'subsequent_female_81_1'=>0,
'subsequent_female_81_2'=>0,
'subsequent_female_81_3'=>0,
'subsequent_female_81_4'=>0,
'subsequent_female_81_5'=>0,
'subsequent_female_81_6'=>0,
'subsequent_female_81_7'=>0,
'subsequent_female_81_total'=>0,
'subsequent_female_total_1'=>0,
'subsequent_female_total_2'=>0,
'subsequent_female_total_3'=>0,
'subsequent_female_total_4'=>0,
'subsequent_female_total_5'=>0,
'subsequent_female_total_6'=>0,
'subsequent_female_total_7'=>0,
'male_total_total'=>0,
'subsequent_male_total_total'=>0,
'female_total_total'=>0,
'subsequent_female_total_total'=>0
);
$quarter2 = array(
'name'=> 'Quarter 02',
'male_0_10_1'=>0,
'male_0_10_2'=>0,
'male_0_10_3'=>0,
'male_0_10_4'=>0,
'male_0_10_5'=>0,
'male_0_10_6'=>0,
'male_0_10_7'=>0,
'male_0_10_total'=>0,
'male_11_20_1'=>0,
'male_11_20_2'=>0,
'male_11_20_3'=>0,
'male_11_20_4'=>0,
'male_11_20_5'=>0,
'male_11_20_6'=>0,
'male_11_20_7'=>0,
'male_11_20_total'=>0,
'male_21_30_1'=>0,
'male_21_30_2'=>0,
'male_21_30_3'=>0,
'male_21_30_4'=>0,
'male_21_30_5'=>0,
'male_21_30_6'=>0,
'male_21_30_7'=>0,
'male_21_30_total'=>0,
'male_31_40_1'=>0,
'male_31_40_2'=>0,
'male_31_40_3'=>0,
'male_31_40_4'=>0,
'male_31_40_5'=>0,
'male_31_40_6'=>0,
'male_31_40_7'=>0,
'male_31_40_total'=>0,
'male_41_50_1'=>0,
'male_41_50_2'=>0,
'male_41_50_3'=>0,
'male_41_50_4'=>0,
'male_41_50_5'=>0,
'male_41_50_6'=>0,
'male_41_50_7'=>0,
'male_41_50_total'=>0,
'male_51_60_1'=>0,
'male_51_60_2'=>0,
'male_51_60_3'=>0,
'male_51_60_4'=>0,
'male_51_60_5'=>0,
'male_51_60_6'=>0,
'male_51_60_7'=>0,
'male_51_60_total'=>0,
'male_61_70_1'=>0,
'male_61_70_2'=>0,
'male_61_70_3'=>0,
'male_61_70_4'=>0,
'male_61_70_5'=>0,
'male_61_70_6'=>0,
'male_61_70_7'=>0,
'male_61_70_total'=>0,
'male_71_80_1'=>0,
'male_71_80_2'=>0,
'male_71_80_3'=>0,
'male_71_80_4'=>0,
'male_71_80_5'=>0,
'male_71_80_6'=>0,
'male_71_80_7'=>0,
'male_71_80_total'=>0,
'male_81_1'=>0,
'male_81_2'=>0,
'male_81_3'=>0,
'male_81_4'=>0,
'male_81_5'=>0,
'male_81_6'=>0,
'male_81_7'=>0,
'male_81_total'=>0,
'male_total_1'=>0,
'male_total_2'=>0,
'male_total_3'=>0,
'male_total_4'=>0,
'male_total_5'=>0,
'male_total_6'=>0,
'male_total_7'=>0,
'subsequent_male_0_10_1'=>0,
'subsequent_male_0_10_2'=>0,
'subsequent_male_0_10_3'=>0,
'subsequent_male_0_10_4'=>0,
'subsequent_male_0_10_5'=>0,
'subsequent_male_0_10_6'=>0,
'subsequent_male_0_10_7'=>0,
'subsequent_male_0_10_total'=>0,
'subsequent_male_11_20_1'=>0,
'subsequent_male_11_20_2'=>0,
'subsequent_male_11_20_3'=>0,
'subsequent_male_11_20_4'=>0,
'subsequent_male_11_20_5'=>0,
'subsequent_male_11_20_6'=>0,
'subsequent_male_11_20_7'=>0,
'subsequent_male_11_20_total'=>0,
'subsequent_male_21_30_1'=>0,
'subsequent_male_21_30_2'=>0,
'subsequent_male_21_30_3'=>0,
'subsequent_male_21_30_4'=>0,
'subsequent_male_21_30_5'=>0,
'subsequent_male_21_30_6'=>0,
'subsequent_male_21_30_7'=>0,
'subsequent_male_21_30_total'=>0,
'subsequent_male_31_40_1'=>0,
'subsequent_male_31_40_2'=>0,
'subsequent_male_31_40_3'=>0,
'subsequent_male_31_40_4'=>0,
'subsequent_male_31_40_5'=>0,
'subsequent_male_31_40_6'=>0,
'subsequent_male_31_40_7'=>0,
'subsequent_male_31_40_total'=>0,
'subsequent_male_41_50_1'=>0,
'subsequent_male_41_50_2'=>0,
'subsequent_male_41_50_3'=>0,
'subsequent_male_41_50_4'=>0,
'subsequent_male_41_50_5'=>0,
'subsequent_male_41_50_6'=>0,
'subsequent_male_41_50_7'=>0,
'subsequent_male_41_50_total'=>0,
'subsequent_male_51_60_1'=>0,
'subsequent_male_51_60_2'=>0,
'subsequent_male_51_60_3'=>0,
'subsequent_male_51_60_4'=>0,
'subsequent_male_51_60_5'=>0,
'subsequent_male_51_60_6'=>0,
'subsequent_male_51_60_7'=>0,
'subsequent_male_51_60_total'=>0,
'subsequent_male_61_70_1'=>0,
'subsequent_male_61_70_2'=>0,
'subsequent_male_61_70_3'=>0,
'subsequent_male_61_70_4'=>0,
'subsequent_male_61_70_5'=>0,
'subsequent_male_61_70_6'=>0,
'subsequent_male_61_70_7'=>0,
'subsequent_male_61_70_total'=>0,
'subsequent_male_71_80_1'=>0,
'subsequent_male_71_80_2'=>0,
'subsequent_male_71_80_3'=>0,
'subsequent_male_71_80_4'=>0,
'subsequent_male_71_80_5'=>0,
'subsequent_male_71_80_6'=>0,
'subsequent_male_71_80_7'=>0,
'subsequent_male_71_80_total'=>0,
'subsequent_male_80_1'=>0,
'subsequent_male_80_2'=>0,
'subsequent_male_80_3'=>0,
'subsequent_male_80_4'=>0,
'subsequent_male_80_5'=>0,
'subsequent_male_80_6'=>0,
'subsequent_male_80_7'=>0,
'subsequent_male_80_total'=>0,
'subsequent_male_total_1'=>0,
'subsequent_male_total_2'=>0,
'subsequent_male_total_3'=>0,
'subsequent_male_total_4'=>0,
'subsequent_male_total_5'=>0,
'subsequent_male_total_6'=>0,
'subsequent_male_total_7'=>0,
'total_num_lymphed'=>0,
'total_num_hydro'=>0,
'mf_pos_patient'=>0,
'opd_patient'=>0,
'female_0_10_1'=>0,
'female_0_10_2'=>0,
'female_0_10_3'=>0,
'female_0_10_4'=>0,
'female_0_10_5'=>0,
'female_0_10_6'=>0,
'female_0_10_7'=>0,
'female_0_10_total'=>0,
'female_11_20_1'=>0,
'female_11_20_2'=>0,
'female_11_20_3'=>0,
'female_11_20_4'=>0,
'female_11_20_5'=>0,
'female_11_20_6'=>0,
'female_11_20_7'=>0,
'female_11_20_total'=>0,
'female_21_30_1'=>0,
'female_21_30_2'=>0,
'female_21_30_3'=>0,
'female_21_30_4'=>0,
'female_21_30_5'=>0,
'female_21_30_6'=>0,
'female_21_30_7'=>0,
'female_21_30_total'=>0,
'female_31_40_1'=>0,
'female_31_40_2'=>0,
'female_31_40_3'=>0,
'female_31_40_4'=>0,
'female_31_40_5'=>0,
'female_31_40_6'=>0,
'female_31_40_7'=>0,
'female_31_40_total'=>0,
'female_41_50_1'=>0,
'female_41_50_2'=>0,
'female_41_50_3'=>0,
'female_41_50_4'=>0,
'female_41_50_5'=>0,
'female_41_50_6'=>0,
'female_41_50_7'=>0,
'female_41_50_total'=>0,
'female_51_60_1'=>0,
'female_51_60_2'=>0,
'female_51_60_3'=>0,
'female_51_60_4'=>0,
'female_51_60_5'=>0,
'female_51_60_6'=>0,
'female_51_60_7'=>0,
'female_51_60_total'=>0,
'female_61_70_1'=>0,
'female_61_70_2'=>0,
'female_61_70_3'=>0,
'female_61_70_4'=>0,
'female_61_70_5'=>0,
'female_61_70_6'=>0,
'female_61_70_7'=>0,
'female_61_70_total'=>0,
'female_71_80_1'=>0,
'female_71_80_2'=>0,
'female_71_80_3'=>0,
'female_71_80_4'=>0,
'female_71_80_5'=>0,
'female_71_80_6'=>0,
'female_71_80_7'=>0,
'female_71_80_total'=>0,
'female_80_1'=>0,
'female_80_2'=>0,
'female_80_3'=>0,
'female_80_4'=>0,
'female_80_5'=>0,
'female_80_6'=>0,
'female_80_7'=>0,
'female_80_total'=>0,
'female_total_1'=>0,
'female_total_2'=>0,
'female_total_3'=>0,
'female_total_4'=>0,
'female_total_5'=>0,
'female_total_6'=>0,
'female_total_7'=>0,
'subsequent_female_0_10_1'=>0,
'subsequent_female_0_10_2'=>0,
'subsequent_female_0_10_3'=>0,
'subsequent_female_0_10_4'=>0,
'subsequent_female_0_10_5'=>0,
'subsequent_female_0_10_6'=>0,
'subsequent_female_0_10_7'=>0,
'subsequent_female_0_10_total'=>0,
'subsequent_female_11_20_1'=>0,
'subsequent_female_11_20_2'=>0,
'subsequent_female_11_20_3'=>0,
'subsequent_female_11_20_4'=>0,
'subsequent_female_11_20_5'=>0,
'subsequent_female_11_20_6'=>0,
'subsequent_female_11_20_7'=>0,
'subsequent_female_11_20_total'=>0,
'subsequent_female_21_30_1'=>0,
'subsequent_female_21_30_2'=>0,
'subsequent_female_21_30_3'=>0,
'subsequent_female_21_30_4'=>0,
'subsequent_female_21_30_5'=>0,
'subsequent_female_21_30_6'=>0,
'subsequent_female_21_30_7'=>0,
'subsequent_female_21_30_total'=>0,
'subsequent_female_31_40_1'=>0,
'subsequent_female_31_40_2'=>0,
'subsequent_female_31_40_3'=>0,
'subsequent_female_31_40_4'=>0,
'subsequent_female_31_40_5'=>0,
'subsequent_female_31_40_6'=>0,
'subsequent_female_31_40_7'=>0,
'subsequent_female_31_40_total'=>0,
'subsequent_female_41_50_1'=>0,
'subsequent_female_41_50_2'=>0,
'subsequent_female_41_50_3'=>0,
'subsequent_female_41_50_4'=>0,
'subsequent_female_41_50_5'=>0,
'subsequent_female_41_50_6'=>0,
'subsequent_female_41_50_7'=>0,
'subsequent_female_41_50_total'=>0,
'subsequent_female_51_60_1'=>0,
'subsequent_female_51_60_2'=>0,
'subsequent_female_51_60_3'=>0,
'subsequent_female_51_60_4'=>0,
'subsequent_female_51_60_5'=>0,
'subsequent_female_51_60_6'=>0,
'subsequent_female_51_60_7'=>0,
'subsequent_female_51_60_total'=>0,
'subsequent_female_61_70_1'=>0,
'subsequent_female_61_70_2'=>0,
'subsequent_female_61_70_3'=>0,
'subsequent_female_61_70_4'=>0,
'subsequent_female_61_70_5'=>0,
'subsequent_female_61_70_6'=>0,
'subsequent_female_61_70_7'=>0,
'subsequent_female_61_70_total'=>0,
'subsequent_female_71_80_1'=>0,
'subsequent_female_71_80_2'=>0,
'subsequent_female_71_80_3'=>0,
'subsequent_female_71_80_4'=>0,
'subsequent_female_71_80_5'=>0,
'subsequent_female_71_80_6'=>0,
'subsequent_female_71_80_7'=>0,
'subsequent_female_71_80_total'=>0,
'subsequent_female_81_1'=>0,
'subsequent_female_81_2'=>0,
'subsequent_female_81_3'=>0,
'subsequent_female_81_4'=>0,
'subsequent_female_81_5'=>0,
'subsequent_female_81_6'=>0,
'subsequent_female_81_7'=>0,
'subsequent_female_81_total'=>0,
'subsequent_female_total_1'=>0,
'subsequent_female_total_2'=>0,
'subsequent_female_total_3'=>0,
'subsequent_female_total_4'=>0,
'subsequent_female_total_5'=>0,
'subsequent_female_total_6'=>0,
'subsequent_female_total_7'=>0,
'male_total_total'=>0,
'subsequent_male_total_total'=>0,
'female_total_total'=>0,
'subsequent_female_total_total'=>0
 );



$quarter3 = array(
'name'=>'Quarter 03',
'male_0_10_1'=>0,
'male_0_10_2'=>0,
'male_0_10_3'=>0,
'male_0_10_4'=>0,
'male_0_10_5'=>0,
'male_0_10_6'=>0,
'male_0_10_7'=>0,
'male_0_10_total'=>0,
'male_11_20_1'=>0,
'male_11_20_2'=>0,
'male_11_20_3'=>0,
'male_11_20_4'=>0,
'male_11_20_5'=>0,
'male_11_20_6'=>0,
'male_11_20_7'=>0,
'male_11_20_total'=>0,
'male_21_30_1'=>0,
'male_21_30_2'=>0,
'male_21_30_3'=>0,
'male_21_30_4'=>0,
'male_21_30_5'=>0,
'male_21_30_6'=>0,
'male_21_30_7'=>0,
'male_21_30_total'=>0,
'male_31_40_1'=>0,
'male_31_40_2'=>0,
'male_31_40_3'=>0,
'male_31_40_4'=>0,
'male_31_40_5'=>0,
'male_31_40_6'=>0,
'male_31_40_7'=>0,
'male_31_40_total'=>0,
'male_41_50_1'=>0,
'male_41_50_2'=>0,
'male_41_50_3'=>0,
'male_41_50_4'=>0,
'male_41_50_5'=>0,
'male_41_50_6'=>0,
'male_41_50_7'=>0,
'male_41_50_total'=>0,
'male_51_60_1'=>0,
'male_51_60_2'=>0,
'male_51_60_3'=>0,
'male_51_60_4'=>0,
'male_51_60_5'=>0,
'male_51_60_6'=>0,
'male_51_60_7'=>0,
'male_51_60_total'=>0,
'male_61_70_1'=>0,
'male_61_70_2'=>0,
'male_61_70_3'=>0,
'male_61_70_4'=>0,
'male_61_70_5'=>0,
'male_61_70_6'=>0,
'male_61_70_7'=>0,
'male_61_70_total'=>0,
'male_71_80_1'=>0,
'male_71_80_2'=>0,
'male_71_80_3'=>0,
'male_71_80_4'=>0,
'male_71_80_5'=>0,
'male_71_80_6'=>0,
'male_71_80_7'=>0,
'male_71_80_total'=>0,
'male_81_1'=>0,
'male_81_2'=>0,
'male_81_3'=>0,
'male_81_4'=>0,
'male_81_5'=>0,
'male_81_6'=>0,
'male_81_7'=>0,
'male_81_total'=>0,
'male_total_1'=>0,
'male_total_2'=>0,
'male_total_3'=>0,
'male_total_4'=>0,
'male_total_5'=>0,
'male_total_6'=>0,
'male_total_7'=>0,
'subsequent_male_0_10_1'=>0,
'subsequent_male_0_10_2'=>0,
'subsequent_male_0_10_3'=>0,
'subsequent_male_0_10_4'=>0,
'subsequent_male_0_10_5'=>0,
'subsequent_male_0_10_6'=>0,
'subsequent_male_0_10_7'=>0,
'subsequent_male_0_10_total'=>0,
'subsequent_male_11_20_1'=>0,
'subsequent_male_11_20_2'=>0,
'subsequent_male_11_20_3'=>0,
'subsequent_male_11_20_4'=>0,
'subsequent_male_11_20_5'=>0,
'subsequent_male_11_20_6'=>0,
'subsequent_male_11_20_7'=>0,
'subsequent_male_11_20_total'=>0,
'subsequent_male_21_30_1'=>0,
'subsequent_male_21_30_2'=>0,
'subsequent_male_21_30_3'=>0,
'subsequent_male_21_30_4'=>0,
'subsequent_male_21_30_5'=>0,
'subsequent_male_21_30_6'=>0,
'subsequent_male_21_30_7'=>0,
'subsequent_male_21_30_total'=>0,
'subsequent_male_31_40_1'=>0,
'subsequent_male_31_40_2'=>0,
'subsequent_male_31_40_3'=>0,
'subsequent_male_31_40_4'=>0,
'subsequent_male_31_40_5'=>0,
'subsequent_male_31_40_6'=>0,
'subsequent_male_31_40_7'=>0,
'subsequent_male_31_40_total'=>0,
'subsequent_male_41_50_1'=>0,
'subsequent_male_41_50_2'=>0,
'subsequent_male_41_50_3'=>0,
'subsequent_male_41_50_4'=>0,
'subsequent_male_41_50_5'=>0,
'subsequent_male_41_50_6'=>0,
'subsequent_male_41_50_7'=>0,
'subsequent_male_41_50_total'=>0,
'subsequent_male_51_60_1'=>0,
'subsequent_male_51_60_2'=>0,
'subsequent_male_51_60_3'=>0,
'subsequent_male_51_60_4'=>0,
'subsequent_male_51_60_5'=>0,
'subsequent_male_51_60_6'=>0,
'subsequent_male_51_60_7'=>0,
'subsequent_male_51_60_total'=>0,
'subsequent_male_61_70_1'=>0,
'subsequent_male_61_70_2'=>0,
'subsequent_male_61_70_3'=>0,
'subsequent_male_61_70_4'=>0,
'subsequent_male_61_70_5'=>0,
'subsequent_male_61_70_6'=>0,
'subsequent_male_61_70_7'=>0,
'subsequent_male_61_70_total'=>0,
'subsequent_male_71_80_1'=>0,
'subsequent_male_71_80_2'=>0,
'subsequent_male_71_80_3'=>0,
'subsequent_male_71_80_4'=>0,
'subsequent_male_71_80_5'=>0,
'subsequent_male_71_80_6'=>0,
'subsequent_male_71_80_7'=>0,
'subsequent_male_71_80_total'=>0,
'subsequent_male_80_1'=>0,
'subsequent_male_80_2'=>0,
'subsequent_male_80_3'=>0,
'subsequent_male_80_4'=>0,
'subsequent_male_80_5'=>0,
'subsequent_male_80_6'=>0,
'subsequent_male_80_7'=>0,
'subsequent_male_80_total'=>0,
'subsequent_male_total_1'=>0,
'subsequent_male_total_2'=>0,
'subsequent_male_total_3'=>0,
'subsequent_male_total_4'=>0,
'subsequent_male_total_5'=>0,
'subsequent_male_total_6'=>0,
'subsequent_male_total_7'=>0,
'total_num_lymphed'=>0,
'total_num_hydro'=>0,
'mf_pos_patient'=>0,
'opd_patient'=>0,
'female_0_10_1'=>0,
'female_0_10_2'=>0,
'female_0_10_3'=>0,
'female_0_10_4'=>0,
'female_0_10_5'=>0,
'female_0_10_6'=>0,
'female_0_10_7'=>0,
'female_0_10_total'=>0,
'female_11_20_1'=>0,
'female_11_20_2'=>0,
'female_11_20_3'=>0,
'female_11_20_4'=>0,
'female_11_20_5'=>0,
'female_11_20_6'=>0,
'female_11_20_7'=>0,
'female_11_20_total'=>0,
'female_21_30_1'=>0,
'female_21_30_2'=>0,
'female_21_30_3'=>0,
'female_21_30_4'=>0,
'female_21_30_5'=>0,
'female_21_30_6'=>0,
'female_21_30_7'=>0,
'female_21_30_total'=>0,
'female_31_40_1'=>0,
'female_31_40_2'=>0,
'female_31_40_3'=>0,
'female_31_40_4'=>0,
'female_31_40_5'=>0,
'female_31_40_6'=>0,
'female_31_40_7'=>0,
'female_31_40_total'=>0,
'female_41_50_1'=>0,
'female_41_50_2'=>0,
'female_41_50_3'=>0,
'female_41_50_4'=>0,
'female_41_50_5'=>0,
'female_41_50_6'=>0,
'female_41_50_7'=>0,
'female_41_50_total'=>0,
'female_51_60_1'=>0,
'female_51_60_2'=>0,
'female_51_60_3'=>0,
'female_51_60_4'=>0,
'female_51_60_5'=>0,
'female_51_60_6'=>0,
'female_51_60_7'=>0,
'female_51_60_total'=>0,
'female_61_70_1'=>0,
'female_61_70_2'=>0,
'female_61_70_3'=>0,
'female_61_70_4'=>0,
'female_61_70_5'=>0,
'female_61_70_6'=>0,
'female_61_70_7'=>0,
'female_61_70_total'=>0,
'female_71_80_1'=>0,
'female_71_80_2'=>0,
'female_71_80_3'=>0,
'female_71_80_4'=>0,
'female_71_80_5'=>0,
'female_71_80_6'=>0,
'female_71_80_7'=>0,
'female_71_80_total'=>0,
'female_80_1'=>0,
'female_80_2'=>0,
'female_80_3'=>0,
'female_80_4'=>0,
'female_80_5'=>0,
'female_80_6'=>0,
'female_80_7'=>0,
'female_80_total'=>0,
'female_total_1'=>0,
'female_total_2'=>0,
'female_total_3'=>0,
'female_total_4'=>0,
'female_total_5'=>0,
'female_total_6'=>0,
'female_total_7'=>0,
'subsequent_female_0_10_1'=>0,
'subsequent_female_0_10_2'=>0,
'subsequent_female_0_10_3'=>0,
'subsequent_female_0_10_4'=>0,
'subsequent_female_0_10_5'=>0,
'subsequent_female_0_10_6'=>0,
'subsequent_female_0_10_7'=>0,
'subsequent_female_0_10_total'=>0,
'subsequent_female_11_20_1'=>0,
'subsequent_female_11_20_2'=>0,
'subsequent_female_11_20_3'=>0,
'subsequent_female_11_20_4'=>0,
'subsequent_female_11_20_5'=>0,
'subsequent_female_11_20_6'=>0,
'subsequent_female_11_20_7'=>0,
'subsequent_female_11_20_total'=>0,
'subsequent_female_21_30_1'=>0,
'subsequent_female_21_30_2'=>0,
'subsequent_female_21_30_3'=>0,
'subsequent_female_21_30_4'=>0,
'subsequent_female_21_30_5'=>0,
'subsequent_female_21_30_6'=>0,
'subsequent_female_21_30_7'=>0,
'subsequent_female_21_30_total'=>0,
'subsequent_female_31_40_1'=>0,
'subsequent_female_31_40_2'=>0,
'subsequent_female_31_40_3'=>0,
'subsequent_female_31_40_4'=>0,
'subsequent_female_31_40_5'=>0,
'subsequent_female_31_40_6'=>0,
'subsequent_female_31_40_7'=>0,
'subsequent_female_31_40_total'=>0,
'subsequent_female_41_50_1'=>0,
'subsequent_female_41_50_2'=>0,
'subsequent_female_41_50_3'=>0,
'subsequent_female_41_50_4'=>0,
'subsequent_female_41_50_5'=>0,
'subsequent_female_41_50_6'=>0,
'subsequent_female_41_50_7'=>0,
'subsequent_female_41_50_total'=>0,
'subsequent_female_51_60_1'=>0,
'subsequent_female_51_60_2'=>0,
'subsequent_female_51_60_3'=>0,
'subsequent_female_51_60_4'=>0,
'subsequent_female_51_60_5'=>0,
'subsequent_female_51_60_6'=>0,
'subsequent_female_51_60_7'=>0,
'subsequent_female_51_60_total'=>0,
'subsequent_female_61_70_1'=>0,
'subsequent_female_61_70_2'=>0,
'subsequent_female_61_70_3'=>0,
'subsequent_female_61_70_4'=>0,
'subsequent_female_61_70_5'=>0,
'subsequent_female_61_70_6'=>0,
'subsequent_female_61_70_7'=>0,
'subsequent_female_61_70_total'=>0,
'subsequent_female_71_80_1'=>0,
'subsequent_female_71_80_2'=>0,
'subsequent_female_71_80_3'=>0,
'subsequent_female_71_80_4'=>0,
'subsequent_female_71_80_5'=>0,
'subsequent_female_71_80_6'=>0,
'subsequent_female_71_80_7'=>0,
'subsequent_female_71_80_total'=>0,
'subsequent_female_81_1'=>0,
'subsequent_female_81_2'=>0,
'subsequent_female_81_3'=>0,
'subsequent_female_81_4'=>0,
'subsequent_female_81_5'=>0,
'subsequent_female_81_6'=>0,
'subsequent_female_81_7'=>0,
'subsequent_female_81_total'=>0,
'subsequent_female_total_1'=>0,
'subsequent_female_total_2'=>0,
'subsequent_female_total_3'=>0,
'subsequent_female_total_4'=>0,
'subsequent_female_total_5'=>0,
'subsequent_female_total_6'=>0,
'subsequent_female_total_7'=>0,
'male_total_total'=>0,
'subsequent_male_total_total'=>0,
'female_total_total'=>0,
'subsequent_female_total_total'=>0
 );


$quarter4 = array(
'name'=> 'Quarter 04',
'male_0_10_1'=>0,
'male_0_10_2'=>0,
'male_0_10_3'=>0,
'male_0_10_4'=>0,
'male_0_10_5'=>0,
'male_0_10_6'=>0,
'male_0_10_7'=>0,
'male_0_10_total'=>0,
'male_11_20_1'=>0,
'male_11_20_2'=>0,
'male_11_20_3'=>0,
'male_11_20_4'=>0,
'male_11_20_5'=>0,
'male_11_20_6'=>0,
'male_11_20_7'=>0,
'male_11_20_total'=>0,
'male_21_30_1'=>0,
'male_21_30_2'=>0,
'male_21_30_3'=>0,
'male_21_30_4'=>0,
'male_21_30_5'=>0,
'male_21_30_6'=>0,
'male_21_30_7'=>0,
'male_21_30_total'=>0,
'male_31_40_1'=>0,
'male_31_40_2'=>0,
'male_31_40_3'=>0,
'male_31_40_4'=>0,
'male_31_40_5'=>0,
'male_31_40_6'=>0,
'male_31_40_7'=>0,
'male_31_40_total'=>0,
'male_41_50_1'=>0,
'male_41_50_2'=>0,
'male_41_50_3'=>0,
'male_41_50_4'=>0,
'male_41_50_5'=>0,
'male_41_50_6'=>0,
'male_41_50_7'=>0,
'male_41_50_total'=>0,
'male_51_60_1'=>0,
'male_51_60_2'=>0,
'male_51_60_3'=>0,
'male_51_60_4'=>0,
'male_51_60_5'=>0,
'male_51_60_6'=>0,
'male_51_60_7'=>0,
'male_51_60_total'=>0,
'male_61_70_1'=>0,
'male_61_70_2'=>0,
'male_61_70_3'=>0,
'male_61_70_4'=>0,
'male_61_70_5'=>0,
'male_61_70_6'=>0,
'male_61_70_7'=>0,
'male_61_70_total'=>0,
'male_71_80_1'=>0,
'male_71_80_2'=>0,
'male_71_80_3'=>0,
'male_71_80_4'=>0,
'male_71_80_5'=>0,
'male_71_80_6'=>0,
'male_71_80_7'=>0,
'male_71_80_total'=>0,
'male_81_1'=>0,
'male_81_2'=>0,
'male_81_3'=>0,
'male_81_4'=>0,
'male_81_5'=>0,
'male_81_6'=>0,
'male_81_7'=>0,
'male_81_total'=>0,
'male_total_1'=>0,
'male_total_2'=>0,
'male_total_3'=>0,
'male_total_4'=>0,
'male_total_5'=>0,
'male_total_6'=>0,
'male_total_7'=>0,
'subsequent_male_0_10_1'=>0,
'subsequent_male_0_10_2'=>0,
'subsequent_male_0_10_3'=>0,
'subsequent_male_0_10_4'=>0,
'subsequent_male_0_10_5'=>0,
'subsequent_male_0_10_6'=>0,
'subsequent_male_0_10_7'=>0,
'subsequent_male_0_10_total'=>0,
'subsequent_male_11_20_1'=>0,
'subsequent_male_11_20_2'=>0,
'subsequent_male_11_20_3'=>0,
'subsequent_male_11_20_4'=>0,
'subsequent_male_11_20_5'=>0,
'subsequent_male_11_20_6'=>0,
'subsequent_male_11_20_7'=>0,
'subsequent_male_11_20_total'=>0,
'subsequent_male_21_30_1'=>0,
'subsequent_male_21_30_2'=>0,
'subsequent_male_21_30_3'=>0,
'subsequent_male_21_30_4'=>0,
'subsequent_male_21_30_5'=>0,
'subsequent_male_21_30_6'=>0,
'subsequent_male_21_30_7'=>0,
'subsequent_male_21_30_total'=>0,
'subsequent_male_31_40_1'=>0,
'subsequent_male_31_40_2'=>0,
'subsequent_male_31_40_3'=>0,
'subsequent_male_31_40_4'=>0,
'subsequent_male_31_40_5'=>0,
'subsequent_male_31_40_6'=>0,
'subsequent_male_31_40_7'=>0,
'subsequent_male_31_40_total'=>0,
'subsequent_male_41_50_1'=>0,
'subsequent_male_41_50_2'=>0,
'subsequent_male_41_50_3'=>0,
'subsequent_male_41_50_4'=>0,
'subsequent_male_41_50_5'=>0,
'subsequent_male_41_50_6'=>0,
'subsequent_male_41_50_7'=>0,
'subsequent_male_41_50_total'=>0,
'subsequent_male_51_60_1'=>0,
'subsequent_male_51_60_2'=>0,
'subsequent_male_51_60_3'=>0,
'subsequent_male_51_60_4'=>0,
'subsequent_male_51_60_5'=>0,
'subsequent_male_51_60_6'=>0,
'subsequent_male_51_60_7'=>0,
'subsequent_male_51_60_total'=>0,
'subsequent_male_61_70_1'=>0,
'subsequent_male_61_70_2'=>0,
'subsequent_male_61_70_3'=>0,
'subsequent_male_61_70_4'=>0,
'subsequent_male_61_70_5'=>0,
'subsequent_male_61_70_6'=>0,
'subsequent_male_61_70_7'=>0,
'subsequent_male_61_70_total'=>0,
'subsequent_male_71_80_1'=>0,
'subsequent_male_71_80_2'=>0,
'subsequent_male_71_80_3'=>0,
'subsequent_male_71_80_4'=>0,
'subsequent_male_71_80_5'=>0,
'subsequent_male_71_80_6'=>0,
'subsequent_male_71_80_7'=>0,
'subsequent_male_71_80_total'=>0,
'subsequent_male_80_1'=>0,
'subsequent_male_80_2'=>0,
'subsequent_male_80_3'=>0,
'subsequent_male_80_4'=>0,
'subsequent_male_80_5'=>0,
'subsequent_male_80_6'=>0,
'subsequent_male_80_7'=>0,
'subsequent_male_80_total'=>0,
'subsequent_male_total_1'=>0,
'subsequent_male_total_2'=>0,
'subsequent_male_total_3'=>0,
'subsequent_male_total_4'=>0,
'subsequent_male_total_5'=>0,
'subsequent_male_total_6'=>0,
'subsequent_male_total_7'=>0,
'total_num_lymphed'=>0,
'total_num_hydro'=>0,
'mf_pos_patient'=>0,
'opd_patient'=>0,
'female_0_10_1'=>0,
'female_0_10_2'=>0,
'female_0_10_3'=>0,
'female_0_10_4'=>0,
'female_0_10_5'=>0,
'female_0_10_6'=>0,
'female_0_10_7'=>0,
'female_0_10_total'=>0,
'female_11_20_1'=>0,
'female_11_20_2'=>0,
'female_11_20_3'=>0,
'female_11_20_4'=>0,
'female_11_20_5'=>0,
'female_11_20_6'=>0,
'female_11_20_7'=>0,
'female_11_20_total'=>0,
'female_21_30_1'=>0,
'female_21_30_2'=>0,
'female_21_30_3'=>0,
'female_21_30_4'=>0,
'female_21_30_5'=>0,
'female_21_30_6'=>0,
'female_21_30_7'=>0,
'female_21_30_total'=>0,
'female_31_40_1'=>0,
'female_31_40_2'=>0,
'female_31_40_3'=>0,
'female_31_40_4'=>0,
'female_31_40_5'=>0,
'female_31_40_6'=>0,
'female_31_40_7'=>0,
'female_31_40_total'=>0,
'female_41_50_1'=>0,
'female_41_50_2'=>0,
'female_41_50_3'=>0,
'female_41_50_4'=>0,
'female_41_50_5'=>0,
'female_41_50_6'=>0,
'female_41_50_7'=>0,
'female_41_50_total'=>0,
'female_51_60_1'=>0,
'female_51_60_2'=>0,
'female_51_60_3'=>0,
'female_51_60_4'=>0,
'female_51_60_5'=>0,
'female_51_60_6'=>0,
'female_51_60_7'=>0,
'female_51_60_total'=>0,
'female_61_70_1'=>0,
'female_61_70_2'=>0,
'female_61_70_3'=>0,
'female_61_70_4'=>0,
'female_61_70_5'=>0,
'female_61_70_6'=>0,
'female_61_70_7'=>0,
'female_61_70_total'=>0,
'female_71_80_1'=>0,
'female_71_80_2'=>0,
'female_71_80_3'=>0,
'female_71_80_4'=>0,
'female_71_80_5'=>0,
'female_71_80_6'=>0,
'female_71_80_7'=>0,
'female_71_80_total'=>0,
'female_80_1'=>0,
'female_80_2'=>0,
'female_80_3'=>0,
'female_80_4'=>0,
'female_80_5'=>0,
'female_80_6'=>0,
'female_80_7'=>0,
'female_80_total'=>0,
'female_total_1'=>0,
'female_total_2'=>0,
'female_total_3'=>0,
'female_total_4'=>0,
'female_total_5'=>0,
'female_total_6'=>0,
'female_total_7'=>0,
'subsequent_female_0_10_1'=>0,
'subsequent_female_0_10_2'=>0,
'subsequent_female_0_10_3'=>0,
'subsequent_female_0_10_4'=>0,
'subsequent_female_0_10_5'=>0,
'subsequent_female_0_10_6'=>0,
'subsequent_female_0_10_7'=>0,
'subsequent_female_0_10_total'=>0,
'subsequent_female_11_20_1'=>0,
'subsequent_female_11_20_2'=>0,
'subsequent_female_11_20_3'=>0,
'subsequent_female_11_20_4'=>0,
'subsequent_female_11_20_5'=>0,
'subsequent_female_11_20_6'=>0,
'subsequent_female_11_20_7'=>0,
'subsequent_female_11_20_total'=>0,
'subsequent_female_21_30_1'=>0,
'subsequent_female_21_30_2'=>0,
'subsequent_female_21_30_3'=>0,
'subsequent_female_21_30_4'=>0,
'subsequent_female_21_30_5'=>0,
'subsequent_female_21_30_6'=>0,
'subsequent_female_21_30_7'=>0,
'subsequent_female_21_30_total'=>0,
'subsequent_female_31_40_1'=>0,
'subsequent_female_31_40_2'=>0,
'subsequent_female_31_40_3'=>0,
'subsequent_female_31_40_4'=>0,
'subsequent_female_31_40_5'=>0,
'subsequent_female_31_40_6'=>0,
'subsequent_female_31_40_7'=>0,
'subsequent_female_31_40_total'=>0,
'subsequent_female_41_50_1'=>0,
'subsequent_female_41_50_2'=>0,
'subsequent_female_41_50_3'=>0,
'subsequent_female_41_50_4'=>0,
'subsequent_female_41_50_5'=>0,
'subsequent_female_41_50_6'=>0,
'subsequent_female_41_50_7'=>0,
'subsequent_female_41_50_total'=>0,
'subsequent_female_51_60_1'=>0,
'subsequent_female_51_60_2'=>0,
'subsequent_female_51_60_3'=>0,
'subsequent_female_51_60_4'=>0,
'subsequent_female_51_60_5'=>0,
'subsequent_female_51_60_6'=>0,
'subsequent_female_51_60_7'=>0,
'subsequent_female_51_60_total'=>0,
'subsequent_female_61_70_1'=>0,
'subsequent_female_61_70_2'=>0,
'subsequent_female_61_70_3'=>0,
'subsequent_female_61_70_4'=>0,
'subsequent_female_61_70_5'=>0,
'subsequent_female_61_70_6'=>0,
'subsequent_female_61_70_7'=>0,
'subsequent_female_61_70_total'=>0,
'subsequent_female_71_80_1'=>0,
'subsequent_female_71_80_2'=>0,
'subsequent_female_71_80_3'=>0,
'subsequent_female_71_80_4'=>0,
'subsequent_female_71_80_5'=>0,
'subsequent_female_71_80_6'=>0,
'subsequent_female_71_80_7'=>0,
'subsequent_female_71_80_total'=>0,
'subsequent_female_81_1'=>0,
'subsequent_female_81_2'=>0,
'subsequent_female_81_3'=>0,
'subsequent_female_81_4'=>0,
'subsequent_female_81_5'=>0,
'subsequent_female_81_6'=>0,
'subsequent_female_81_7'=>0,
'subsequent_female_81_total'=>0,
'subsequent_female_total_1'=>0,
'subsequent_female_total_2'=>0,
'subsequent_female_total_3'=>0,
'subsequent_female_total_4'=>0,
'subsequent_female_total_5'=>0,
'subsequent_female_total_6'=>0,
'subsequent_female_total_7'=>0,
'male_total_total'=>0,
'subsequent_male_total_total'=>0,
'female_total_total'=>0,
'subsequent_female_total_total'=>0
 );

$annual = array(
'male_0_10_1'=>0,
'male_0_10_2'=>0,
'male_0_10_3'=>0,
'male_0_10_4'=>0,
'male_0_10_5'=>0,
'male_0_10_6'=>0,
'male_0_10_7'=>0,
'male_0_10_total'=>0,
'male_11_20_1'=>0,
'male_11_20_2'=>0,
'male_11_20_3'=>0,
'male_11_20_4'=>0,
'male_11_20_5'=>0,
'male_11_20_6'=>0,
'male_11_20_7'=>0,
'male_11_20_total'=>0,
'male_21_30_1'=>0,
'male_21_30_2'=>0,
'male_21_30_3'=>0,
'male_21_30_4'=>0,
'male_21_30_5'=>0,
'male_21_30_6'=>0,
'male_21_30_7'=>0,
'male_21_30_total'=>0,
'male_31_40_1'=>0,
'male_31_40_2'=>0,
'male_31_40_3'=>0,
'male_31_40_4'=>0,
'male_31_40_5'=>0,
'male_31_40_6'=>0,
'male_31_40_7'=>0,
'male_31_40_total'=>0,
'male_41_50_1'=>0,
'male_41_50_2'=>0,
'male_41_50_3'=>0,
'male_41_50_4'=>0,
'male_41_50_5'=>0,
'male_41_50_6'=>0,
'male_41_50_7'=>0,
'male_41_50_total'=>0,
'male_51_60_1'=>0,
'male_51_60_2'=>0,
'male_51_60_3'=>0,
'male_51_60_4'=>0,
'male_51_60_5'=>0,
'male_51_60_6'=>0,
'male_51_60_7'=>0,
'male_51_60_total'=>0,
'male_61_70_1'=>0,
'male_61_70_2'=>0,
'male_61_70_3'=>0,
'male_61_70_4'=>0,
'male_61_70_5'=>0,
'male_61_70_6'=>0,
'male_61_70_7'=>0,
'male_61_70_total'=>0,
'male_71_80_1'=>0,
'male_71_80_2'=>0,
'male_71_80_3'=>0,
'male_71_80_4'=>0,
'male_71_80_5'=>0,
'male_71_80_6'=>0,
'male_71_80_7'=>0,
'male_71_80_total'=>0,
'male_81_1'=>0,
'male_81_2'=>0,
'male_81_3'=>0,
'male_81_4'=>0,
'male_81_5'=>0,
'male_81_6'=>0,
'male_81_7'=>0,
'male_81_total'=>0,
'male_total_1'=>0,
'male_total_2'=>0,
'male_total_3'=>0,
'male_total_4'=>0,
'male_total_5'=>0,
'male_total_6'=>0,
'male_total_7'=>0,
'subsequent_male_0_10_1'=>0,
'subsequent_male_0_10_2'=>0,
'subsequent_male_0_10_3'=>0,
'subsequent_male_0_10_4'=>0,
'subsequent_male_0_10_5'=>0,
'subsequent_male_0_10_6'=>0,
'subsequent_male_0_10_7'=>0,
'subsequent_male_0_10_total'=>0,
'subsequent_male_11_20_1'=>0,
'subsequent_male_11_20_2'=>0,
'subsequent_male_11_20_3'=>0,
'subsequent_male_11_20_4'=>0,
'subsequent_male_11_20_5'=>0,
'subsequent_male_11_20_6'=>0,
'subsequent_male_11_20_7'=>0,
'subsequent_male_11_20_total'=>0,
'subsequent_male_21_30_1'=>0,
'subsequent_male_21_30_2'=>0,
'subsequent_male_21_30_3'=>0,
'subsequent_male_21_30_4'=>0,
'subsequent_male_21_30_5'=>0,
'subsequent_male_21_30_6'=>0,
'subsequent_male_21_30_7'=>0,
'subsequent_male_21_30_total'=>0,
'subsequent_male_31_40_1'=>0,
'subsequent_male_31_40_2'=>0,
'subsequent_male_31_40_3'=>0,
'subsequent_male_31_40_4'=>0,
'subsequent_male_31_40_5'=>0,
'subsequent_male_31_40_6'=>0,
'subsequent_male_31_40_7'=>0,
'subsequent_male_31_40_total'=>0,
'subsequent_male_41_50_1'=>0,
'subsequent_male_41_50_2'=>0,
'subsequent_male_41_50_3'=>0,
'subsequent_male_41_50_4'=>0,
'subsequent_male_41_50_5'=>0,
'subsequent_male_41_50_6'=>0,
'subsequent_male_41_50_7'=>0,
'subsequent_male_41_50_total'=>0,
'subsequent_male_51_60_1'=>0,
'subsequent_male_51_60_2'=>0,
'subsequent_male_51_60_3'=>0,
'subsequent_male_51_60_4'=>0,
'subsequent_male_51_60_5'=>0,
'subsequent_male_51_60_6'=>0,
'subsequent_male_51_60_7'=>0,
'subsequent_male_51_60_total'=>0,
'subsequent_male_61_70_1'=>0,
'subsequent_male_61_70_2'=>0,
'subsequent_male_61_70_3'=>0,
'subsequent_male_61_70_4'=>0,
'subsequent_male_61_70_5'=>0,
'subsequent_male_61_70_6'=>0,
'subsequent_male_61_70_7'=>0,
'subsequent_male_61_70_total'=>0,
'subsequent_male_71_80_1'=>0,
'subsequent_male_71_80_2'=>0,
'subsequent_male_71_80_3'=>0,
'subsequent_male_71_80_4'=>0,
'subsequent_male_71_80_5'=>0,
'subsequent_male_71_80_6'=>0,
'subsequent_male_71_80_7'=>0,
'subsequent_male_71_80_total'=>0,
'subsequent_male_80_1'=>0,
'subsequent_male_80_2'=>0,
'subsequent_male_80_3'=>0,
'subsequent_male_80_4'=>0,
'subsequent_male_80_5'=>0,
'subsequent_male_80_6'=>0,
'subsequent_male_80_7'=>0,
'subsequent_male_80_total'=>0,
'subsequent_male_total_1'=>0,
'subsequent_male_total_2'=>0,
'subsequent_male_total_3'=>0,
'subsequent_male_total_4'=>0,
'subsequent_male_total_5'=>0,
'subsequent_male_total_6'=>0,
'subsequent_male_total_7'=>0,
'total_num_lymphed'=>0,
'total_num_hydro'=>0,
'mf_pos_patient'=>0,
'opd_patient'=>0,
'female_0_10_1'=>0,
'female_0_10_2'=>0,
'female_0_10_3'=>0,
'female_0_10_4'=>0,
'female_0_10_5'=>0,
'female_0_10_6'=>0,
'female_0_10_7'=>0,
'female_0_10_total'=>0,
'female_11_20_1'=>0,
'female_11_20_2'=>0,
'female_11_20_3'=>0,
'female_11_20_4'=>0,
'female_11_20_5'=>0,
'female_11_20_6'=>0,
'female_11_20_7'=>0,
'female_11_20_total'=>0,
'female_21_30_1'=>0,
'female_21_30_2'=>0,
'female_21_30_3'=>0,
'female_21_30_4'=>0,
'female_21_30_5'=>0,
'female_21_30_6'=>0,
'female_21_30_7'=>0,
'female_21_30_total'=>0,
'female_31_40_1'=>0,
'female_31_40_2'=>0,
'female_31_40_3'=>0,
'female_31_40_4'=>0,
'female_31_40_5'=>0,
'female_31_40_6'=>0,
'female_31_40_7'=>0,
'female_31_40_total'=>0,
'female_41_50_1'=>0,
'female_41_50_2'=>0,
'female_41_50_3'=>0,
'female_41_50_4'=>0,
'female_41_50_5'=>0,
'female_41_50_6'=>0,
'female_41_50_7'=>0,
'female_41_50_total'=>0,
'female_51_60_1'=>0,
'female_51_60_2'=>0,
'female_51_60_3'=>0,
'female_51_60_4'=>0,
'female_51_60_5'=>0,
'female_51_60_6'=>0,
'female_51_60_7'=>0,
'female_51_60_total'=>0,
'female_61_70_1'=>0,
'female_61_70_2'=>0,
'female_61_70_3'=>0,
'female_61_70_4'=>0,
'female_61_70_5'=>0,
'female_61_70_6'=>0,
'female_61_70_7'=>0,
'female_61_70_total'=>0,
'female_71_80_1'=>0,
'female_71_80_2'=>0,
'female_71_80_3'=>0,
'female_71_80_4'=>0,
'female_71_80_5'=>0,
'female_71_80_6'=>0,
'female_71_80_7'=>0,
'female_71_80_total'=>0,
'female_80_1'=>0,
'female_80_2'=>0,
'female_80_3'=>0,
'female_80_4'=>0,
'female_80_5'=>0,
'female_80_6'=>0,
'female_80_7'=>0,
'female_80_total'=>0,
'female_total_1'=>0,
'female_total_2'=>0,
'female_total_3'=>0,
'female_total_4'=>0,
'female_total_5'=>0,
'female_total_6'=>0,
'female_total_7'=>0,
'subsequent_female_0_10_1'=>0,
'subsequent_female_0_10_2'=>0,
'subsequent_female_0_10_3'=>0,
'subsequent_female_0_10_4'=>0,
'subsequent_female_0_10_5'=>0,
'subsequent_female_0_10_6'=>0,
'subsequent_female_0_10_7'=>0,
'subsequent_female_0_10_total'=>0,
'subsequent_female_11_20_1'=>0,
'subsequent_female_11_20_2'=>0,
'subsequent_female_11_20_3'=>0,
'subsequent_female_11_20_4'=>0,
'subsequent_female_11_20_5'=>0,
'subsequent_female_11_20_6'=>0,
'subsequent_female_11_20_7'=>0,
'subsequent_female_11_20_total'=>0,
'subsequent_female_21_30_1'=>0,
'subsequent_female_21_30_2'=>0,
'subsequent_female_21_30_3'=>0,
'subsequent_female_21_30_4'=>0,
'subsequent_female_21_30_5'=>0,
'subsequent_female_21_30_6'=>0,
'subsequent_female_21_30_7'=>0,
'subsequent_female_21_30_total'=>0,
'subsequent_female_31_40_1'=>0,
'subsequent_female_31_40_2'=>0,
'subsequent_female_31_40_3'=>0,
'subsequent_female_31_40_4'=>0,
'subsequent_female_31_40_5'=>0,
'subsequent_female_31_40_6'=>0,
'subsequent_female_31_40_7'=>0,
'subsequent_female_31_40_total'=>0,
'subsequent_female_41_50_1'=>0,
'subsequent_female_41_50_2'=>0,
'subsequent_female_41_50_3'=>0,
'subsequent_female_41_50_4'=>0,
'subsequent_female_41_50_5'=>0,
'subsequent_female_41_50_6'=>0,
'subsequent_female_41_50_7'=>0,
'subsequent_female_41_50_total'=>0,
'subsequent_female_51_60_1'=>0,
'subsequent_female_51_60_2'=>0,
'subsequent_female_51_60_3'=>0,
'subsequent_female_51_60_4'=>0,
'subsequent_female_51_60_5'=>0,
'subsequent_female_51_60_6'=>0,
'subsequent_female_51_60_7'=>0,
'subsequent_female_51_60_total'=>0,
'subsequent_female_61_70_1'=>0,
'subsequent_female_61_70_2'=>0,
'subsequent_female_61_70_3'=>0,
'subsequent_female_61_70_4'=>0,
'subsequent_female_61_70_5'=>0,
'subsequent_female_61_70_6'=>0,
'subsequent_female_61_70_7'=>0,
'subsequent_female_61_70_total'=>0,
'subsequent_female_71_80_1'=>0,
'subsequent_female_71_80_2'=>0,
'subsequent_female_71_80_3'=>0,
'subsequent_female_71_80_4'=>0,
'subsequent_female_71_80_5'=>0,
'subsequent_female_71_80_6'=>0,
'subsequent_female_71_80_7'=>0,
'subsequent_female_71_80_total'=>0,
'subsequent_female_81_1'=>0,
'subsequent_female_81_2'=>0,
'subsequent_female_81_3'=>0,
'subsequent_female_81_4'=>0,
'subsequent_female_81_5'=>0,
'subsequent_female_81_6'=>0,
'subsequent_female_81_7'=>0,
'subsequent_female_81_total'=>0,
'subsequent_female_total_1'=>0,
'subsequent_female_total_2'=>0,
'subsequent_female_total_3'=>0,
'subsequent_female_total_4'=>0,
'subsequent_female_total_5'=>0,
'subsequent_female_total_6'=>0,
'subsequent_female_total_7'=>0,
'male_total_total'=>0,
'subsequent_male_total_total'=>0,
'female_total_total'=>0,
'subsequent_female_total_total'=>0
);

        $quarters = [];
        $viewData2 = "";
        $viewDataQuarters = "";
        $viewDataAnnual = "";

      if ($result) {
            for ($j = 0; $j < count($result); $j++) {
                array_push($months, $result[$j]->month);


               
                // echo "yearly";
                // dd($result);
                // die();
                $total_num_lymphed12 =$result[$j]->total_num_lymphed;
                $total_num_hydro12=$total_num_hydro12+$result[$j]->total_num_hydro;
                $mf_pos_patient12=$mf_pos_patient12+$result[$j]->mf_pos_patient;
                $opd_patient12=$opd_patient12+$result[$j]->opd_patient;


                

$male_0_10_1=$result[$j]->male_0_10_1;
$male_0_10_2=$result[$j]->male_0_10_2;
$male_0_10_3=$result[$j]->male_0_10_3;
$male_0_10_4=$result[$j]->male_0_10_4;
$male_0_10_5=$result[$j]->male_0_10_5;
$male_0_10_6=$result[$j]->male_0_10_6;
$male_0_10_7=$result[$j]->male_0_10_7;
$male_0_10_total=$result[$j]->male_0_10_total;
$male_11_20_1=$result[$j]->male_11_20_1;
$male_11_20_2=$result[$j]->male_11_20_2;
$male_11_20_3=$result[$j]->male_11_20_3;
$male_11_20_4=$result[$j]->male_11_20_4;
$male_11_20_5=$result[$j]->male_11_20_5;
$male_11_20_6=$result[$j]->male_11_20_6;
$male_11_20_7=$result[$j]->male_11_20_7;
$male_11_20_total=$result[$j]->male_11_20_total;
$male_21_30_1=$result[$j]->male_21_30_1;
$male_21_30_2=$result[$j]->male_21_30_2;
$male_21_30_3=$result[$j]->male_21_30_3;
$male_21_30_4=$result[$j]->male_21_30_4;
$male_21_30_5=$result[$j]->male_21_30_5;
$male_21_30_6=$result[$j]->male_21_30_6;
$male_21_30_7=$result[$j]->male_21_30_7;
$male_21_30_total=$result[$j]->male_21_30_total;
$male_31_40_1=$result[$j]->male_31_40_1;
$male_31_40_2=$result[$j]->male_31_40_2;
$male_31_40_3=$result[$j]->male_31_40_3;
$male_31_40_4=$result[$j]->male_31_40_4;
$male_31_40_5=$result[$j]->male_31_40_5;
$male_31_40_6=$result[$j]->male_31_40_6;
$male_31_40_7=$result[$j]->male_31_40_7;
$male_31_40_total=$result[$j]->male_31_40_total;
$male_41_50_1=$result[$j]->male_41_50_1;
$male_41_50_2=$result[$j]->male_41_50_2;
$male_41_50_3=$result[$j]->male_41_50_3;
$male_41_50_4=$result[$j]->male_41_50_4;
$male_41_50_5=$result[$j]->male_41_50_5;
$male_41_50_6=$result[$j]->male_41_50_6;
$male_41_50_7=$result[$j]->male_41_50_7;
$male_41_50_total=$result[$j]->male_41_50_total;
$male_51_60_1=$result[$j]->male_51_60_1;
$male_51_60_2=$result[$j]->male_51_60_2;
$male_51_60_3=$result[$j]->male_51_60_3;
$male_51_60_4=$result[$j]->male_51_60_4;
$male_51_60_5=$result[$j]->male_51_60_5;
$male_51_60_6=$result[$j]->male_51_60_6;
$male_51_60_7=$result[$j]->male_51_60_7;
$male_51_60_total=$result[$j]->male_51_60_total;
$male_61_70_1=$result[$j]->male_61_70_1;
$male_61_70_2=$result[$j]->male_61_70_2;
$male_61_70_3=$result[$j]->male_61_70_3;
$male_61_70_4=$result[$j]->male_61_70_4;
$male_61_70_5=$result[$j]->male_61_70_5;
$male_61_70_6=$result[$j]->male_61_70_6;
$male_61_70_7=$result[$j]->male_61_70_7;
$male_61_70_total=$result[$j]->male_61_70_total;
$male_71_80_1=$result[$j]->male_71_80_1;
$male_71_80_2=$result[$j]->male_71_80_2;
$male_71_80_3=$result[$j]->male_71_80_3;
$male_71_80_4=$result[$j]->male_71_80_4;
$male_71_80_5=$result[$j]->male_71_80_5;
$male_71_80_6=$result[$j]->male_71_80_6;
$male_71_80_7=$result[$j]->male_71_80_7;
$male_71_80_total=$result[$j]->male_71_80_total;
$male_81_1=$result[$j]->male_81_1;
$male_81_2=$result[$j]->male_81_2;
$male_81_3=$result[$j]->male_81_3;
$male_81_4=$result[$j]->male_81_4;
$male_81_5=$result[$j]->male_81_5;
$male_81_6=$result[$j]->male_81_6;
$male_81_7=$result[$j]->male_81_7;
$male_81_total=$result[$j]->male_81_total;
$male_total_1=$result[$j]->male_total_1;
$male_total_2=$result[$j]->male_total_2;
$male_total_3=$result[$j]->male_total_3;
$male_total_4=$result[$j]->male_total_4;
$male_total_5=$result[$j]->male_total_5;
$male_total_6=$result[$j]->male_total_6;
$male_total_7=$result[$j]->male_total_7;
$subsequent_male_0_10_1=$result[$j]->subsequent_male_0_10_1;
$subsequent_male_0_10_2=$result[$j]->subsequent_male_0_10_2;
$subsequent_male_0_10_3=$result[$j]->subsequent_male_0_10_3;
$subsequent_male_0_10_4=$result[$j]->subsequent_male_0_10_4;
$subsequent_male_0_10_5=$result[$j]->subsequent_male_0_10_5;
$subsequent_male_0_10_6=$result[$j]->subsequent_male_0_10_6;
$subsequent_male_0_10_7=$result[$j]->subsequent_male_0_10_7;
$subsequent_male_0_10_total=$result[$j]->subsequent_male_0_10_total;
$subsequent_male_11_20_1=$result[$j]->subsequent_male_11_20_1;
$subsequent_male_11_20_2=$result[$j]->subsequent_male_11_20_2;
$subsequent_male_11_20_3=$result[$j]->subsequent_male_11_20_3;
$subsequent_male_11_20_4=$result[$j]->subsequent_male_11_20_4;
$subsequent_male_11_20_5=$result[$j]->subsequent_male_11_20_5;
$subsequent_male_11_20_6=$result[$j]->subsequent_male_11_20_6;
$subsequent_male_11_20_7=$result[$j]->subsequent_male_11_20_7;
$subsequent_male_11_20_total=$result[$j]->subsequent_male_11_20_total;
$subsequent_male_21_30_1=$result[$j]->subsequent_male_21_30_1;
$subsequent_male_21_30_2=$result[$j]->subsequent_male_21_30_2;
$subsequent_male_21_30_3=$result[$j]->subsequent_male_21_30_3;
$subsequent_male_21_30_4=$result[$j]->subsequent_male_21_30_4;
$subsequent_male_21_30_5=$result[$j]->subsequent_male_21_30_5;
$subsequent_male_21_30_6=$result[$j]->subsequent_male_21_30_6;
$subsequent_male_21_30_7=$result[$j]->subsequent_male_21_30_7;
$subsequent_male_21_30_total=$result[$j]->subsequent_male_21_30_total;
$subsequent_male_31_40_1=$result[$j]->subsequent_male_31_40_1;
$subsequent_male_31_40_2=$result[$j]->subsequent_male_31_40_2;
$subsequent_male_31_40_3=$result[$j]->subsequent_male_31_40_3;
$subsequent_male_31_40_4=$result[$j]->subsequent_male_31_40_4;
$subsequent_male_31_40_5=$result[$j]->subsequent_male_31_40_5;
$subsequent_male_31_40_6=$result[$j]->subsequent_male_31_40_6;
$subsequent_male_31_40_7=$result[$j]->subsequent_male_31_40_7;
$subsequent_male_31_40_total=$result[$j]->subsequent_male_31_40_total;
$subsequent_male_41_50_1=$result[$j]->subsequent_male_41_50_1;
$subsequent_male_41_50_2=$result[$j]->subsequent_male_41_50_2;
$subsequent_male_41_50_3=$result[$j]->subsequent_male_41_50_3;
$subsequent_male_41_50_4=$result[$j]->subsequent_male_41_50_4;
$subsequent_male_41_50_5=$result[$j]->subsequent_male_41_50_5;
$subsequent_male_41_50_6=$result[$j]->subsequent_male_41_50_6;
$subsequent_male_41_50_7=$result[$j]->subsequent_male_41_50_7;
$subsequent_male_41_50_total=$result[$j]->subsequent_male_41_50_total;
$subsequent_male_51_60_1=$result[$j]->subsequent_male_51_60_1;
$subsequent_male_51_60_2=$result[$j]->subsequent_male_51_60_2;
$subsequent_male_51_60_3=$result[$j]->subsequent_male_51_60_3;
$subsequent_male_51_60_4=$result[$j]->subsequent_male_51_60_4;
$subsequent_male_51_60_5=$result[$j]->subsequent_male_51_60_5;
$subsequent_male_51_60_6=$result[$j]->subsequent_male_51_60_6;
$subsequent_male_51_60_7=$result[$j]->subsequent_male_51_60_7;
$subsequent_male_51_60_total=$result[$j]->subsequent_male_51_60_total;
$subsequent_male_61_70_1=$result[$j]->subsequent_male_61_70_1;
$subsequent_male_61_70_2=$result[$j]->subsequent_male_61_70_2;
$subsequent_male_61_70_3=$result[$j]->subsequent_male_61_70_3;
$subsequent_male_61_70_4=$result[$j]->subsequent_male_61_70_4;
$subsequent_male_61_70_5=$result[$j]->subsequent_male_61_70_5;
$subsequent_male_61_70_6=$result[$j]->subsequent_male_61_70_6;
$subsequent_male_61_70_7=$result[$j]->subsequent_male_61_70_7;
$subsequent_male_61_70_total=$result[$j]->subsequent_male_61_70_total;
$subsequent_male_71_80_1=$result[$j]->subsequent_male_71_80_1;
$subsequent_male_71_80_2=$result[$j]->subsequent_male_71_80_2;
$subsequent_male_71_80_3=$result[$j]->subsequent_male_71_80_3;
$subsequent_male_71_80_4=$result[$j]->subsequent_male_71_80_4;
$subsequent_male_71_80_5=$result[$j]->subsequent_male_71_80_5;
$subsequent_male_71_80_6=$result[$j]->subsequent_male_71_80_6;
$subsequent_male_71_80_7=$result[$j]->subsequent_male_71_80_7;
$subsequent_male_71_80_total=$result[$j]->subsequent_male_71_80_total;
$subsequent_male_80_1=$result[$j]->subsequent_male_80_1;
$subsequent_male_80_2=$result[$j]->subsequent_male_80_2;
$subsequent_male_80_3=$result[$j]->subsequent_male_80_3;
$subsequent_male_80_4=$result[$j]->subsequent_male_80_4;
$subsequent_male_80_5=$result[$j]->subsequent_male_80_5;
$subsequent_male_80_6=$result[$j]->subsequent_male_80_6;
$subsequent_male_80_7=$result[$j]->subsequent_male_80_7;
$subsequent_male_80_total=$result[$j]->subsequent_male_80_total;
$subsequent_male_total_1=$result[$j]->subsequent_male_total_1;
$subsequent_male_total_2=$result[$j]->subsequent_male_total_2;
$subsequent_male_total_3=$result[$j]->subsequent_male_total_3;
$subsequent_male_total_4=$result[$j]->subsequent_male_total_4;
$subsequent_male_total_5=$result[$j]->subsequent_male_total_5;
$subsequent_male_total_6=$result[$j]->subsequent_male_total_6;
$subsequent_male_total_7=$result[$j]->subsequent_male_total_7;
$total_num_lymphed=$result[$j]->total_num_lymphed;
$total_num_hydro=$result[$j]->total_num_hydro;
$mf_pos_patient=$result[$j]->mf_pos_patient;
$opd_patient=$result[$j]->opd_patient;
$female_0_10_1=$result[$j]->female_0_10_1;
$female_0_10_2=$result[$j]->female_0_10_2;
$female_0_10_3=$result[$j]->female_0_10_3;
$female_0_10_4=$result[$j]->female_0_10_4;
$female_0_10_5=$result[$j]->female_0_10_5;
$female_0_10_6=$result[$j]->female_0_10_6;
$female_0_10_7=$result[$j]->female_0_10_7;
$female_0_10_total=$result[$j]->female_0_10_total;
$female_11_20_1=$result[$j]->female_11_20_1;
$female_11_20_2=$result[$j]->female_11_20_2;
$female_11_20_3=$result[$j]->female_11_20_3;
$female_11_20_4=$result[$j]->female_11_20_4;
$female_11_20_5=$result[$j]->female_11_20_5;
$female_11_20_6=$result[$j]->female_11_20_6;
$female_11_20_7=$result[$j]->female_11_20_7;
$female_11_20_total=$result[$j]->female_11_20_total;
$female_21_30_1=$result[$j]->female_21_30_1;
$female_21_30_2=$result[$j]->female_21_30_2;
$female_21_30_3=$result[$j]->female_21_30_3;
$female_21_30_4=$result[$j]->female_21_30_4;
$female_21_30_5=$result[$j]->female_21_30_5;
$female_21_30_6=$result[$j]->female_21_30_6;
$female_21_30_7=$result[$j]->female_21_30_7;
$female_21_30_total=$result[$j]->female_21_30_total;
$female_31_40_1=$result[$j]->female_31_40_1;
$female_31_40_2=$result[$j]->female_31_40_2;
$female_31_40_3=$result[$j]->female_31_40_3;
$female_31_40_4=$result[$j]->female_31_40_4;
$female_31_40_5=$result[$j]->female_31_40_5;
$female_31_40_6=$result[$j]->female_31_40_6;
$female_31_40_7=$result[$j]->female_31_40_7;
$female_31_40_total=$result[$j]->female_31_40_total;
$female_41_50_1=$result[$j]->female_41_50_1;
$female_41_50_2=$result[$j]->female_41_50_2;
$female_41_50_3=$result[$j]->female_41_50_3;
$female_41_50_4=$result[$j]->female_41_50_4;
$female_41_50_5=$result[$j]->female_41_50_5;
$female_41_50_6=$result[$j]->female_41_50_6;
$female_41_50_7=$result[$j]->female_41_50_7;
$female_41_50_total=$result[$j]->female_41_50_total;
$female_51_60_1=$result[$j]->female_51_60_1;
$female_51_60_2=$result[$j]->female_51_60_2;
$female_51_60_3=$result[$j]->female_51_60_3;
$female_51_60_4=$result[$j]->female_51_60_4;
$female_51_60_5=$result[$j]->female_51_60_5;
$female_51_60_6=$result[$j]->female_51_60_6;
$female_51_60_7=$result[$j]->female_51_60_7;
$female_51_60_total=$result[$j]->female_51_60_total;
$female_61_70_1=$result[$j]->female_61_70_1;
$female_61_70_2=$result[$j]->female_61_70_2;
$female_61_70_3=$result[$j]->female_61_70_3;
$female_61_70_4=$result[$j]->female_61_70_4;
$female_61_70_5=$result[$j]->female_61_70_5;
$female_61_70_6=$result[$j]->female_61_70_6;
$female_61_70_7=$result[$j]->female_61_70_7;
$female_61_70_total=$result[$j]->female_61_70_total;
$female_71_80_1=$result[$j]->female_71_80_1;
$female_71_80_2=$result[$j]->female_71_80_2;
$female_71_80_3=$result[$j]->female_71_80_3;
$female_71_80_4=$result[$j]->female_71_80_4;
$female_71_80_5=$result[$j]->female_71_80_5;
$female_71_80_6=$result[$j]->female_71_80_6;
$female_71_80_7=$result[$j]->female_71_80_7;
$female_71_80_total=$result[$j]->female_71_80_total;
$female_80_1=$result[$j]->female_80_1;
$female_80_2=$result[$j]->female_80_2;
$female_80_3=$result[$j]->female_80_3;
$female_80_4=$result[$j]->female_80_4;
$female_80_5=$result[$j]->female_80_5;
$female_80_6=$result[$j]->female_80_6;
$female_80_7=$result[$j]->female_80_7;
$female_80_total=$result[$j]->female_80_total;
$female_total_1=$result[$j]->female_total_1;
$female_total_2=$result[$j]->female_total_2;
$female_total_3=$result[$j]->female_total_3;
$female_total_4=$result[$j]->female_total_4;
$female_total_5=$result[$j]->female_total_5;
$female_total_6=$result[$j]->female_total_6;
$female_total_7=$result[$j]->female_total_7;
$subsequent_female_0_10_1=$result[$j]->subsequent_female_0_10_1;
$subsequent_female_0_10_2=$result[$j]->subsequent_female_0_10_2;
$subsequent_female_0_10_3=$result[$j]->subsequent_female_0_10_3;
$subsequent_female_0_10_4=$result[$j]->subsequent_female_0_10_4;
$subsequent_female_0_10_5=$result[$j]->subsequent_female_0_10_5;
$subsequent_female_0_10_6=$result[$j]->subsequent_female_0_10_6;
$subsequent_female_0_10_7=$result[$j]->subsequent_female_0_10_7;
$subsequent_female_0_10_total=$result[$j]->subsequent_female_0_10_total;
$subsequent_female_11_20_1=$result[$j]->subsequent_female_11_20_1;
$subsequent_female_11_20_2=$result[$j]->subsequent_female_11_20_2;
$subsequent_female_11_20_3=$result[$j]->subsequent_female_11_20_3;
$subsequent_female_11_20_4=$result[$j]->subsequent_female_11_20_4;
$subsequent_female_11_20_5=$result[$j]->subsequent_female_11_20_5;
$subsequent_female_11_20_6=$result[$j]->subsequent_female_11_20_6;
$subsequent_female_11_20_7=$result[$j]->subsequent_female_11_20_7;
$subsequent_female_11_20_total=$result[$j]->subsequent_female_11_20_total;
$subsequent_female_21_30_1=$result[$j]->subsequent_female_21_30_1;
$subsequent_female_21_30_2=$result[$j]->subsequent_female_21_30_2;
$subsequent_female_21_30_3=$result[$j]->subsequent_female_21_30_3;
$subsequent_female_21_30_4=$result[$j]->subsequent_female_21_30_4;
$subsequent_female_21_30_5=$result[$j]->subsequent_female_21_30_5;
$subsequent_female_21_30_6=$result[$j]->subsequent_female_21_30_6;
$subsequent_female_21_30_7=$result[$j]->subsequent_female_21_30_7;
$subsequent_female_21_30_total=$result[$j]->subsequent_female_21_30_total;
$subsequent_female_31_40_1=$result[$j]->subsequent_female_31_40_1;
$subsequent_female_31_40_2=$result[$j]->subsequent_female_31_40_2;
$subsequent_female_31_40_3=$result[$j]->subsequent_female_31_40_3;
$subsequent_female_31_40_4=$result[$j]->subsequent_female_31_40_4;
$subsequent_female_31_40_5=$result[$j]->subsequent_female_31_40_5;
$subsequent_female_31_40_6=$result[$j]->subsequent_female_31_40_6;
$subsequent_female_31_40_7=$result[$j]->subsequent_female_31_40_7;
$subsequent_female_31_40_total=$result[$j]->subsequent_female_31_40_total;
$subsequent_female_41_50_1=$result[$j]->subsequent_female_41_50_1;
$subsequent_female_41_50_2=$result[$j]->subsequent_female_41_50_2;
$subsequent_female_41_50_3=$result[$j]->subsequent_female_41_50_3;
$subsequent_female_41_50_4=$result[$j]->subsequent_female_41_50_4;
$subsequent_female_41_50_5=$result[$j]->subsequent_female_41_50_5;
$subsequent_female_41_50_6=$result[$j]->subsequent_female_41_50_6;
$subsequent_female_41_50_7=$result[$j]->subsequent_female_41_50_7;
$subsequent_female_41_50_total=$result[$j]->subsequent_female_41_50_total;
$subsequent_female_51_60_1=$result[$j]->subsequent_female_51_60_1;
$subsequent_female_51_60_2=$result[$j]->subsequent_female_51_60_2;
$subsequent_female_51_60_3=$result[$j]->subsequent_female_51_60_3;
$subsequent_female_51_60_4=$result[$j]->subsequent_female_51_60_4;
$subsequent_female_51_60_5=$result[$j]->subsequent_female_51_60_5;
$subsequent_female_51_60_6=$result[$j]->subsequent_female_51_60_6;
$subsequent_female_51_60_7=$result[$j]->subsequent_female_51_60_7;
$subsequent_female_51_60_total=$result[$j]->subsequent_female_51_60_total;
$subsequent_female_61_70_1=$result[$j]->subsequent_female_61_70_1;
$subsequent_female_61_70_2=$result[$j]->subsequent_female_61_70_2;
$subsequent_female_61_70_3=$result[$j]->subsequent_female_61_70_3;
$subsequent_female_61_70_4=$result[$j]->subsequent_female_61_70_4;
$subsequent_female_61_70_5=$result[$j]->subsequent_female_61_70_5;
$subsequent_female_61_70_6=$result[$j]->subsequent_female_61_70_6;
$subsequent_female_61_70_7=$result[$j]->subsequent_female_61_70_7;
$subsequent_female_61_70_total=$result[$j]->subsequent_female_61_70_total;
$subsequent_female_71_80_1=$result[$j]->subsequent_female_71_80_1;
$subsequent_female_71_80_2=$result[$j]->subsequent_female_71_80_2;
$subsequent_female_71_80_3=$result[$j]->subsequent_female_71_80_3;
$subsequent_female_71_80_4=$result[$j]->subsequent_female_71_80_4;
$subsequent_female_71_80_5=$result[$j]->subsequent_female_71_80_5;
$subsequent_female_71_80_6=$result[$j]->subsequent_female_71_80_6;
$subsequent_female_71_80_7=$result[$j]->subsequent_female_71_80_7;
$subsequent_female_71_80_total=$result[$j]->subsequent_female_71_80_total;
$subsequent_female_81_1=$result[$j]->subsequent_female_81_1;
$subsequent_female_81_2=$result[$j]->subsequent_female_81_2;
$subsequent_female_81_3=$result[$j]->subsequent_female_81_3;
$subsequent_female_81_4=$result[$j]->subsequent_female_81_4;
$subsequent_female_81_5=$result[$j]->subsequent_female_81_5;
$subsequent_female_81_6=$result[$j]->subsequent_female_81_6;
$subsequent_female_81_7=$result[$j]->subsequent_female_81_7;
$subsequent_female_81_total=$result[$j]->subsequent_female_81_total;
$subsequent_female_total_1=$result[$j]->subsequent_female_total_1;
$subsequent_female_total_2=$result[$j]->subsequent_female_total_2;
$subsequent_female_total_3=$result[$j]->subsequent_female_total_3;
$subsequent_female_total_4=$result[$j]->subsequent_female_total_4;
$subsequent_female_total_5=$result[$j]->subsequent_female_total_5;
$subsequent_female_total_6=$result[$j]->subsequent_female_total_6;
$subsequent_female_total_7=$result[$j]->subsequent_female_total_7;

$male_total_total=$result[$j]->male_total_total;
$subsequent_male_total_total=$result[$j]->subsequent_male_total_total;
$female_total_total=$result[$j]->female_total_total;
$subsequent_female_total_total=$result[$j]->subsequent_female_total_total;



// sum add for yearly
$yearly_male_0_10_1+=$result[$j]->male_0_10_1;
$yearly_male_0_10_2+=$result[$j]->male_0_10_2;
$yearly_male_0_10_3+=$result[$j]->male_0_10_3;
$yearly_male_0_10_4+=$result[$j]->male_0_10_4;
$yearly_male_0_10_5+=$result[$j]->male_0_10_5;
$yearly_male_0_10_6+=$result[$j]->male_0_10_6;
$yearly_male_0_10_7+=$result[$j]->male_0_10_7;
$yearly_male_0_10_total+=$result[$j]->male_0_10_total;
$yearly_male_11_20_1+=$result[$j]->male_11_20_1;
$yearly_male_11_20_2+=$result[$j]->male_11_20_2;
$yearly_male_11_20_3+=$result[$j]->male_11_20_3;
$yearly_male_11_20_4+=$result[$j]->male_11_20_4;
$yearly_male_11_20_5+=$result[$j]->male_11_20_5;
$yearly_male_11_20_6+=$result[$j]->male_11_20_6;
$yearly_male_11_20_7+=$result[$j]->male_11_20_7;
$yearly_male_11_20_total+=$result[$j]->male_11_20_total;
$yearly_male_21_30_1+=$result[$j]->male_21_30_1;
$yearly_male_21_30_2+=$result[$j]->male_21_30_2;
$yearly_male_21_30_3+=$result[$j]->male_21_30_3;
$yearly_male_21_30_4+=$result[$j]->male_21_30_4;
$yearly_male_21_30_5+=$result[$j]->male_21_30_5;
$yearly_male_21_30_6+=$result[$j]->male_21_30_6;
$yearly_male_21_30_7+=$result[$j]->male_21_30_7;
$yearly_male_21_30_total+=$result[$j]->male_21_30_total;
$yearly_male_31_40_1+=$result[$j]->male_31_40_1;
$yearly_male_31_40_2+=$result[$j]->male_31_40_2;
$yearly_male_31_40_3+=$result[$j]->male_31_40_3;
$yearly_male_31_40_4+=$result[$j]->male_31_40_4;
$yearly_male_31_40_5+=$result[$j]->male_31_40_5;
$yearly_male_31_40_6+=$result[$j]->male_31_40_6;
$yearly_male_31_40_7+=$result[$j]->male_31_40_7;
$yearly_male_31_40_total+=$result[$j]->male_31_40_total;
$yearly_male_41_50_1+=$result[$j]->male_41_50_1;
$yearly_male_41_50_2+=$result[$j]->male_41_50_2;
$yearly_male_41_50_3+=$result[$j]->male_41_50_3;
$yearly_male_41_50_4+=$result[$j]->male_41_50_4;
$yearly_male_41_50_5+=$result[$j]->male_41_50_5;
$yearly_male_41_50_6+=$result[$j]->male_41_50_6;
$yearly_male_41_50_7+=$result[$j]->male_41_50_7;
$yearly_male_41_50_total+=$result[$j]->male_41_50_total;
$yearly_male_51_60_1+=$result[$j]->male_51_60_1;
$yearly_male_51_60_2+=$result[$j]->male_51_60_2;
$yearly_male_51_60_3+=$result[$j]->male_51_60_3;
$yearly_male_51_60_4+=$result[$j]->male_51_60_4;
$yearly_male_51_60_5+=$result[$j]->male_51_60_5;
$yearly_male_51_60_6+=$result[$j]->male_51_60_6;
$yearly_male_51_60_7+=$result[$j]->male_51_60_7;
$yearly_male_51_60_total+=$result[$j]->male_51_60_total;
$yearly_male_61_70_1+=$result[$j]->male_61_70_1;
$yearly_male_61_70_2+=$result[$j]->male_61_70_2;
$yearly_male_61_70_3+=$result[$j]->male_61_70_3;
$yearly_male_61_70_4+=$result[$j]->male_61_70_4;
$yearly_male_61_70_5+=$result[$j]->male_61_70_5;
$yearly_male_61_70_6+=$result[$j]->male_61_70_6;
$yearly_male_61_70_7+=$result[$j]->male_61_70_7;
$yearly_male_61_70_total+=$result[$j]->male_61_70_total;
$yearly_male_71_80_1+=$result[$j]->male_71_80_1;
$yearly_male_71_80_2+=$result[$j]->male_71_80_2;
$yearly_male_71_80_3+=$result[$j]->male_71_80_3;
$yearly_male_71_80_4+=$result[$j]->male_71_80_4;
$yearly_male_71_80_5+=$result[$j]->male_71_80_5;
$yearly_male_71_80_6+=$result[$j]->male_71_80_6;
$yearly_male_71_80_7+=$result[$j]->male_71_80_7;
$yearly_male_71_80_total+=$result[$j]->male_71_80_total;
$yearly_male_81_1+=$result[$j]->male_81_1;
$yearly_male_81_2+=$result[$j]->male_81_2;
$yearly_male_81_3+=$result[$j]->male_81_3;
$yearly_male_81_4+=$result[$j]->male_81_4;
$yearly_male_81_5+=$result[$j]->male_81_5;
$yearly_male_81_6+=$result[$j]->male_81_6;
$yearly_male_81_7+=$result[$j]->male_81_7;
$yearly_male_81_total+=$result[$j]->male_81_total;
$yearly_male_total_1+=$result[$j]->male_total_1;
$yearly_male_total_2+=$result[$j]->male_total_2;
$yearly_male_total_3+=$result[$j]->male_total_3;
$yearly_male_total_4+=$result[$j]->male_total_4;
$yearly_male_total_5+=$result[$j]->male_total_5;
$yearly_male_total_6+=$result[$j]->male_total_6;
$yearly_male_total_7+=$result[$j]->male_total_7;
$yearly_subsequent_male_0_10_1+=$result[$j]->subsequent_male_0_10_1;
$yearly_subsequent_male_0_10_2+=$result[$j]->subsequent_male_0_10_2;
$yearly_subsequent_male_0_10_3+=$result[$j]->subsequent_male_0_10_3;
$yearly_subsequent_male_0_10_4+=$result[$j]->subsequent_male_0_10_4;
$yearly_subsequent_male_0_10_5+=$result[$j]->subsequent_male_0_10_5;
$yearly_subsequent_male_0_10_6+=$result[$j]->subsequent_male_0_10_6;
$yearly_subsequent_male_0_10_7+=$result[$j]->subsequent_male_0_10_7;
$yearly_subsequent_male_0_10_total+=$result[$j]->subsequent_male_0_10_total;
$yearly_subsequent_male_11_20_1+=$result[$j]->subsequent_male_11_20_1;
$yearly_subsequent_male_11_20_2+=$result[$j]->subsequent_male_11_20_2;
$yearly_subsequent_male_11_20_3+=$result[$j]->subsequent_male_11_20_3;
$yearly_subsequent_male_11_20_4+=$result[$j]->subsequent_male_11_20_4;
$yearly_subsequent_male_11_20_5+=$result[$j]->subsequent_male_11_20_5;
$yearly_subsequent_male_11_20_6+=$result[$j]->subsequent_male_11_20_6;
$yearly_subsequent_male_11_20_7+=$result[$j]->subsequent_male_11_20_7;
$yearly_subsequent_male_11_20_total+=$result[$j]->subsequent_male_11_20_total;
$yearly_subsequent_male_21_30_1+=$result[$j]->subsequent_male_21_30_1;
$yearly_subsequent_male_21_30_2+=$result[$j]->subsequent_male_21_30_2;
$yearly_subsequent_male_21_30_3+=$result[$j]->subsequent_male_21_30_3;
$yearly_subsequent_male_21_30_4+=$result[$j]->subsequent_male_21_30_4;
$yearly_subsequent_male_21_30_5+=$result[$j]->subsequent_male_21_30_5;
$yearly_subsequent_male_21_30_6+=$result[$j]->subsequent_male_21_30_6;
$yearly_subsequent_male_21_30_7+=$result[$j]->subsequent_male_21_30_7;
$yearly_subsequent_male_21_30_total+=$result[$j]->subsequent_male_21_30_total;
$yearly_subsequent_male_31_40_1+=$result[$j]->subsequent_male_31_40_1;
$yearly_subsequent_male_31_40_2+=$result[$j]->subsequent_male_31_40_2;
$yearly_subsequent_male_31_40_3+=$result[$j]->subsequent_male_31_40_3;
$yearly_subsequent_male_31_40_4+=$result[$j]->subsequent_male_31_40_4;
$yearly_subsequent_male_31_40_5+=$result[$j]->subsequent_male_31_40_5;
$yearly_subsequent_male_31_40_6+=$result[$j]->subsequent_male_31_40_6;
$yearly_subsequent_male_31_40_7+=$result[$j]->subsequent_male_31_40_7;
$yearly_subsequent_male_31_40_total+=$result[$j]->subsequent_male_31_40_total;
$yearly_subsequent_male_41_50_1+=$result[$j]->subsequent_male_41_50_1;
$yearly_subsequent_male_41_50_2+=$result[$j]->subsequent_male_41_50_2;
$yearly_subsequent_male_41_50_3+=$result[$j]->subsequent_male_41_50_3;
$yearly_subsequent_male_41_50_4+=$result[$j]->subsequent_male_41_50_4;
$yearly_subsequent_male_41_50_5+=$result[$j]->subsequent_male_41_50_5;
$yearly_subsequent_male_41_50_6+=$result[$j]->subsequent_male_41_50_6;
$yearly_subsequent_male_41_50_7+=$result[$j]->subsequent_male_41_50_7;
$yearly_subsequent_male_41_50_total+=$result[$j]->subsequent_male_41_50_total;
$yearly_subsequent_male_51_60_1+=$result[$j]->subsequent_male_51_60_1;
$yearly_subsequent_male_51_60_2+=$result[$j]->subsequent_male_51_60_2;
$yearly_subsequent_male_51_60_3+=$result[$j]->subsequent_male_51_60_3;
$yearly_subsequent_male_51_60_4+=$result[$j]->subsequent_male_51_60_4;
$yearly_subsequent_male_51_60_5+=$result[$j]->subsequent_male_51_60_5;
$yearly_subsequent_male_51_60_6+=$result[$j]->subsequent_male_51_60_6;
$yearly_subsequent_male_51_60_7+=$result[$j]->subsequent_male_51_60_7;
$yearly_subsequent_male_51_60_total+=$result[$j]->subsequent_male_51_60_total;
$yearly_subsequent_male_61_70_1+=$result[$j]->subsequent_male_61_70_1;
$yearly_subsequent_male_61_70_2+=$result[$j]->subsequent_male_61_70_2;
$yearly_subsequent_male_61_70_3+=$result[$j]->subsequent_male_61_70_3;
$yearly_subsequent_male_61_70_4+=$result[$j]->subsequent_male_61_70_4;
$yearly_subsequent_male_61_70_5+=$result[$j]->subsequent_male_61_70_5;
$yearly_subsequent_male_61_70_6+=$result[$j]->subsequent_male_61_70_6;
$yearly_subsequent_male_61_70_7+=$result[$j]->subsequent_male_61_70_7;
$yearly_subsequent_male_61_70_total+=$result[$j]->subsequent_male_61_70_total;
$yearly_subsequent_male_71_80_1+=$result[$j]->subsequent_male_71_80_1;
$yearly_subsequent_male_71_80_2+=$result[$j]->subsequent_male_71_80_2;
$yearly_subsequent_male_71_80_3+=$result[$j]->subsequent_male_71_80_3;
$yearly_subsequent_male_71_80_4+=$result[$j]->subsequent_male_71_80_4;
$yearly_subsequent_male_71_80_5+=$result[$j]->subsequent_male_71_80_5;
$yearly_subsequent_male_71_80_6+=$result[$j]->subsequent_male_71_80_6;
$yearly_subsequent_male_71_80_7+=$result[$j]->subsequent_male_71_80_7;
$yearly_subsequent_male_71_80_total+=$result[$j]->subsequent_male_71_80_total;
$yearly_subsequent_male_80_1+=$result[$j]->subsequent_male_80_1;
$yearly_subsequent_male_80_2+=$result[$j]->subsequent_male_80_2;
$yearly_subsequent_male_80_3+=$result[$j]->subsequent_male_80_3;
$yearly_subsequent_male_80_4+=$result[$j]->subsequent_male_80_4;
$yearly_subsequent_male_80_5+=$result[$j]->subsequent_male_80_5;
$yearly_subsequent_male_80_6+=$result[$j]->subsequent_male_80_6;
$yearly_subsequent_male_80_7+=$result[$j]->subsequent_male_80_7;
$yearly_subsequent_male_80_total+=$result[$j]->subsequent_male_80_total;
$yearly_subsequent_male_total_1+=$result[$j]->subsequent_male_total_1;
$yearly_subsequent_male_total_2+=$result[$j]->subsequent_male_total_2;
$yearly_subsequent_male_total_3+=$result[$j]->subsequent_male_total_3;
$yearly_subsequent_male_total_4+=$result[$j]->subsequent_male_total_4;
$yearly_subsequent_male_total_5+=$result[$j]->subsequent_male_total_5;
$yearly_subsequent_male_total_6+=$result[$j]->subsequent_male_total_6;
$yearly_subsequent_male_total_7+=$result[$j]->subsequent_male_total_7;
$yearly_total_num_lymphed+=$result[$j]->total_num_lymphed;
$yearly_total_num_hydro+=$result[$j]->total_num_hydro;
$yearly_mf_pos_patient+=$result[$j]->mf_pos_patient;
$yearly_opd_patient+=$result[$j]->opd_patient;
$yearly_female_0_10_1+=$result[$j]->female_0_10_1;
$yearly_female_0_10_2+=$result[$j]->female_0_10_2;
$yearly_female_0_10_3+=$result[$j]->female_0_10_3;
$yearly_female_0_10_4+=$result[$j]->female_0_10_4;
$yearly_female_0_10_5+=$result[$j]->female_0_10_5;
$yearly_female_0_10_6+=$result[$j]->female_0_10_6;
$yearly_female_0_10_7+=$result[$j]->female_0_10_7;
$yearly_female_0_10_total+=$result[$j]->female_0_10_total;
$yearly_female_11_20_1+=$result[$j]->female_11_20_1;
$yearly_female_11_20_2+=$result[$j]->female_11_20_2;
$yearly_female_11_20_3+=$result[$j]->female_11_20_3;
$yearly_female_11_20_4+=$result[$j]->female_11_20_4;
$yearly_female_11_20_5+=$result[$j]->female_11_20_5;
$yearly_female_11_20_6+=$result[$j]->female_11_20_6;
$yearly_female_11_20_7+=$result[$j]->female_11_20_7;
$yearly_female_11_20_total+=$result[$j]->female_11_20_total;
$yearly_female_21_30_1+=$result[$j]->female_21_30_1;
$yearly_female_21_30_2+=$result[$j]->female_21_30_2;
$yearly_female_21_30_3+=$result[$j]->female_21_30_3;
$yearly_female_21_30_4+=$result[$j]->female_21_30_4;
$yearly_female_21_30_5+=$result[$j]->female_21_30_5;
$yearly_female_21_30_6+=$result[$j]->female_21_30_6;
$yearly_female_21_30_7+=$result[$j]->female_21_30_7;
$yearly_female_21_30_total+=$result[$j]->female_21_30_total;
$yearly_female_31_40_1+=$result[$j]->female_31_40_1;
$yearly_female_31_40_2+=$result[$j]->female_31_40_2;
$yearly_female_31_40_3+=$result[$j]->female_31_40_3;
$yearly_female_31_40_4+=$result[$j]->female_31_40_4;
$yearly_female_31_40_5+=$result[$j]->female_31_40_5;
$yearly_female_31_40_6+=$result[$j]->female_31_40_6;
$yearly_female_31_40_7+=$result[$j]->female_31_40_7;
$yearly_female_31_40_total+=$result[$j]->female_31_40_total;
$yearly_female_41_50_1+=$result[$j]->female_41_50_1;
$yearly_female_41_50_2+=$result[$j]->female_41_50_2;
$yearly_female_41_50_3+=$result[$j]->female_41_50_3;
$yearly_female_41_50_4+=$result[$j]->female_41_50_4;
$yearly_female_41_50_5+=$result[$j]->female_41_50_5;
$yearly_female_41_50_6+=$result[$j]->female_41_50_6;
$yearly_female_41_50_7+=$result[$j]->female_41_50_7;
$yearly_female_41_50_total+=$result[$j]->female_41_50_total;
$yearly_female_51_60_1+=$result[$j]->female_51_60_1;
$yearly_female_51_60_2+=$result[$j]->female_51_60_2;
$yearly_female_51_60_3+=$result[$j]->female_51_60_3;
$yearly_female_51_60_4+=$result[$j]->female_51_60_4;
$yearly_female_51_60_5+=$result[$j]->female_51_60_5;
$yearly_female_51_60_6+=$result[$j]->female_51_60_6;
$yearly_female_51_60_7+=$result[$j]->female_51_60_7;
$yearly_female_51_60_total+=$result[$j]->female_51_60_total;
$yearly_female_61_70_1+=$result[$j]->female_61_70_1;
$yearly_female_61_70_2+=$result[$j]->female_61_70_2;
$yearly_female_61_70_3+=$result[$j]->female_61_70_3;
$yearly_female_61_70_4+=$result[$j]->female_61_70_4;
$yearly_female_61_70_5+=$result[$j]->female_61_70_5;
$yearly_female_61_70_6+=$result[$j]->female_61_70_6;
$yearly_female_61_70_7+=$result[$j]->female_61_70_7;
$yearly_female_61_70_total+=$result[$j]->female_61_70_total;
$yearly_female_71_80_1+=$result[$j]->female_71_80_1;
$yearly_female_71_80_2+=$result[$j]->female_71_80_2;
$yearly_female_71_80_3+=$result[$j]->female_71_80_3;
$yearly_female_71_80_4+=$result[$j]->female_71_80_4;
$yearly_female_71_80_5+=$result[$j]->female_71_80_5;
$yearly_female_71_80_6+=$result[$j]->female_71_80_6;
$yearly_female_71_80_7+=$result[$j]->female_71_80_7;
$yearly_female_71_80_total+=$result[$j]->female_71_80_total;
$yearly_female_80_1+=$result[$j]->female_80_1;
$yearly_female_80_2+=$result[$j]->female_80_2;
$yearly_female_80_3+=$result[$j]->female_80_3;
$yearly_female_80_4+=$result[$j]->female_80_4;
$yearly_female_80_5+=$result[$j]->female_80_5;
$yearly_female_80_6+=$result[$j]->female_80_6;
$yearly_female_80_7+=$result[$j]->female_80_7;
$yearly_female_80_total+=$result[$j]->female_80_total;
$yearly_female_total_1+=$result[$j]->female_total_1;
$yearly_female_total_2+=$result[$j]->female_total_2;
$yearly_female_total_3+=$result[$j]->female_total_3;
$yearly_female_total_4+=$result[$j]->female_total_4;
$yearly_female_total_5+=$result[$j]->female_total_5;
$yearly_female_total_6+=$result[$j]->female_total_6;
$yearly_female_total_7+=$result[$j]->female_total_7;
$yearly_subsequent_female_0_10_1+=$result[$j]->subsequent_female_0_10_1;
$yearly_subsequent_female_0_10_2+=$result[$j]->subsequent_female_0_10_2;
$yearly_subsequent_female_0_10_3+=$result[$j]->subsequent_female_0_10_3;
$yearly_subsequent_female_0_10_4+=$result[$j]->subsequent_female_0_10_4;
$yearly_subsequent_female_0_10_5+=$result[$j]->subsequent_female_0_10_5;
$yearly_subsequent_female_0_10_6+=$result[$j]->subsequent_female_0_10_6;
$yearly_subsequent_female_0_10_7+=$result[$j]->subsequent_female_0_10_7;
$yearly_subsequent_female_0_10_total+=$result[$j]->subsequent_female_0_10_total;
$yearly_subsequent_female_11_20_1+=$result[$j]->subsequent_female_11_20_1;
$yearly_subsequent_female_11_20_2+=$result[$j]->subsequent_female_11_20_2;
$yearly_subsequent_female_11_20_3+=$result[$j]->subsequent_female_11_20_3;
$yearly_subsequent_female_11_20_4+=$result[$j]->subsequent_female_11_20_4;
$yearly_subsequent_female_11_20_5+=$result[$j]->subsequent_female_11_20_5;
$yearly_subsequent_female_11_20_6+=$result[$j]->subsequent_female_11_20_6;
$yearly_subsequent_female_11_20_7+=$result[$j]->subsequent_female_11_20_7;
$yearly_subsequent_female_11_20_total+=$result[$j]->subsequent_female_11_20_total;
$yearly_subsequent_female_21_30_1+=$result[$j]->subsequent_female_21_30_1;
$yearly_subsequent_female_21_30_2+=$result[$j]->subsequent_female_21_30_2;
$yearly_subsequent_female_21_30_3+=$result[$j]->subsequent_female_21_30_3;
$yearly_subsequent_female_21_30_4+=$result[$j]->subsequent_female_21_30_4;
$yearly_subsequent_female_21_30_5+=$result[$j]->subsequent_female_21_30_5;
$yearly_subsequent_female_21_30_6+=$result[$j]->subsequent_female_21_30_6;
$yearly_subsequent_female_21_30_7+=$result[$j]->subsequent_female_21_30_7;
$yearly_subsequent_female_21_30_total+=$result[$j]->subsequent_female_21_30_total;
$yearly_subsequent_female_31_40_1+=$result[$j]->subsequent_female_31_40_1;
$yearly_subsequent_female_31_40_2+=$result[$j]->subsequent_female_31_40_2;
$yearly_subsequent_female_31_40_3+=$result[$j]->subsequent_female_31_40_3;
$yearly_subsequent_female_31_40_4+=$result[$j]->subsequent_female_31_40_4;
$yearly_subsequent_female_31_40_5+=$result[$j]->subsequent_female_31_40_5;
$yearly_subsequent_female_31_40_6+=$result[$j]->subsequent_female_31_40_6;
$yearly_subsequent_female_31_40_7+=$result[$j]->subsequent_female_31_40_7;
$yearly_subsequent_female_31_40_total+=$result[$j]->subsequent_female_31_40_total;
$yearly_subsequent_female_41_50_1+=$result[$j]->subsequent_female_41_50_1;
$yearly_subsequent_female_41_50_2+=$result[$j]->subsequent_female_41_50_2;
$yearly_subsequent_female_41_50_3+=$result[$j]->subsequent_female_41_50_3;
$yearly_subsequent_female_41_50_4+=$result[$j]->subsequent_female_41_50_4;
$yearly_subsequent_female_41_50_5+=$result[$j]->subsequent_female_41_50_5;
$yearly_subsequent_female_41_50_6+=$result[$j]->subsequent_female_41_50_6;
$yearly_subsequent_female_41_50_7+=$result[$j]->subsequent_female_41_50_7;
$yearly_subsequent_female_41_50_total+=$result[$j]->subsequent_female_41_50_total;
$yearly_subsequent_female_51_60_1+=$result[$j]->subsequent_female_51_60_1;
$yearly_subsequent_female_51_60_2+=$result[$j]->subsequent_female_51_60_2;
$yearly_subsequent_female_51_60_3+=$result[$j]->subsequent_female_51_60_3;
$yearly_subsequent_female_51_60_4+=$result[$j]->subsequent_female_51_60_4;
$yearly_subsequent_female_51_60_5+=$result[$j]->subsequent_female_51_60_5;
$yearly_subsequent_female_51_60_6+=$result[$j]->subsequent_female_51_60_6;
$yearly_subsequent_female_51_60_7+=$result[$j]->subsequent_female_51_60_7;
$yearly_subsequent_female_51_60_total+=$result[$j]->subsequent_female_51_60_total;
$yearly_subsequent_female_61_70_1+=$result[$j]->subsequent_female_61_70_1;
$yearly_subsequent_female_61_70_2+=$result[$j]->subsequent_female_61_70_2;
$yearly_subsequent_female_61_70_3+=$result[$j]->subsequent_female_61_70_3;
$yearly_subsequent_female_61_70_4+=$result[$j]->subsequent_female_61_70_4;
$yearly_subsequent_female_61_70_5+=$result[$j]->subsequent_female_61_70_5;
$yearly_subsequent_female_61_70_6+=$result[$j]->subsequent_female_61_70_6;
$yearly_subsequent_female_61_70_7+=$result[$j]->subsequent_female_61_70_7;
$yearly_subsequent_female_61_70_total+=$result[$j]->subsequent_female_61_70_total;
$yearly_subsequent_female_71_80_1+=$result[$j]->subsequent_female_71_80_1;
$yearly_subsequent_female_71_80_2+=$result[$j]->subsequent_female_71_80_2;
$yearly_subsequent_female_71_80_3+=$result[$j]->subsequent_female_71_80_3;
$yearly_subsequent_female_71_80_4+=$result[$j]->subsequent_female_71_80_4;
$yearly_subsequent_female_71_80_5+=$result[$j]->subsequent_female_71_80_5;
$yearly_subsequent_female_71_80_6+=$result[$j]->subsequent_female_71_80_6;
$yearly_subsequent_female_71_80_7+=$result[$j]->subsequent_female_71_80_7;
$yearly_subsequent_female_71_80_total+=$result[$j]->subsequent_female_71_80_total;
$yearly_subsequent_female_81_1+=$result[$j]->subsequent_female_81_1;
$yearly_subsequent_female_81_2+=$result[$j]->subsequent_female_81_2;
$yearly_subsequent_female_81_3+=$result[$j]->subsequent_female_81_3;
$yearly_subsequent_female_81_4+=$result[$j]->subsequent_female_81_4;
$yearly_subsequent_female_81_5+=$result[$j]->subsequent_female_81_5;
$yearly_subsequent_female_81_6+=$result[$j]->subsequent_female_81_6;
$yearly_subsequent_female_81_7+=$result[$j]->subsequent_female_81_7;
$yearly_subsequent_female_81_total+=$result[$j]->subsequent_female_81_total;
$yearly_subsequent_female_total_1+=$result[$j]->subsequent_female_total_1;
$yearly_subsequent_female_total_2+=$result[$j]->subsequent_female_total_2;
$yearly_subsequent_female_total_3+=$result[$j]->subsequent_female_total_3;
$yearly_subsequent_female_total_4+=$result[$j]->subsequent_female_total_4;
$yearly_subsequent_female_total_5+=$result[$j]->subsequent_female_total_5;
$yearly_subsequent_female_total_6+=$result[$j]->subsequent_female_total_6;
$yearly_subsequent_female_total_7+=$result[$j]->subsequent_female_total_7;
$yearly_male_total_total+=$result[$j]->male_total_total;
$yearly_subsequent_male_total_total+=$result[$j]->subsequent_male_total_total;
$yearly_female_total_total+=$result[$j]->female_total_total;
$yearly_subsequent_female_total_total+=$result[$j]->subsequent_female_total_total;




                switch ($result[$j]->month) {
                    case "January":
                    case "February":
                    case "March":

$quarter1['female_0_10_1'] += $female_0_10_1;
$quarter1['male_0_10_1']+=$male_0_10_1;
$quarter1['male_0_10_2']+=$male_0_10_2;
$quarter1['male_0_10_3']+=$male_0_10_3;
$quarter1['male_0_10_4']+=$male_0_10_4;
$quarter1['male_0_10_5']+=$male_0_10_5;
$quarter1['male_0_10_6']+=$male_0_10_6;
$quarter1['male_0_10_7']+=$male_0_10_7;
$quarter1['male_0_10_total']+=$male_0_10_total;
$quarter1['male_11_20_1']+=$male_11_20_1;
$quarter1['male_11_20_2']+=$male_11_20_2;
$quarter1['male_11_20_3']+=$male_11_20_3;
$quarter1['male_11_20_4']+=$male_11_20_4;
$quarter1['male_11_20_5']+=$male_11_20_5;
$quarter1['male_11_20_6']+=$male_11_20_6;
$quarter1['male_11_20_7']+=$male_11_20_7;
$quarter1['male_11_20_total']+=$male_11_20_total;
$quarter1['male_21_30_1']+=$male_21_30_1;
$quarter1['male_21_30_2']+=$male_21_30_2;
$quarter1['male_21_30_3']+=$male_21_30_3;
$quarter1['male_21_30_4']+=$male_21_30_4;
$quarter1['male_21_30_5']+=$male_21_30_5;
$quarter1['male_21_30_6']+=$male_21_30_6;
$quarter1['male_21_30_7']+=$male_21_30_7;
$quarter1['male_21_30_total']+=$male_21_30_total;
$quarter1['male_31_40_1']+=$male_31_40_1;
$quarter1['male_31_40_2']+=$male_31_40_2;
$quarter1['male_31_40_3']+=$male_31_40_3;
$quarter1['male_31_40_4']+=$male_31_40_4;
$quarter1['male_31_40_5']+=$male_31_40_5;
$quarter1['male_31_40_6']+=$male_31_40_6;
$quarter1['male_31_40_7']+=$male_31_40_7;
$quarter1['male_31_40_total']+=$male_31_40_total;
$quarter1['male_41_50_1']+=$male_41_50_1;
$quarter1['male_41_50_2']+=$male_41_50_2;
$quarter1['male_41_50_3']+=$male_41_50_3;
$quarter1['male_41_50_4']+=$male_41_50_4;
$quarter1['male_41_50_5']+=$male_41_50_5;
$quarter1['male_41_50_6']+=$male_41_50_6;
$quarter1['male_41_50_7']+=$male_41_50_7;
$quarter1['male_41_50_total']+=$male_41_50_total;
$quarter1['male_51_60_1']+=$male_51_60_1;
$quarter1['male_51_60_2']+=$male_51_60_2;
$quarter1['male_51_60_3']+=$male_51_60_3;
$quarter1['male_51_60_4']+=$male_51_60_4;
$quarter1['male_51_60_5']+=$male_51_60_5;
$quarter1['male_51_60_6']+=$male_51_60_6;
$quarter1['male_51_60_7']+=$male_51_60_7;
$quarter1['male_51_60_total']+=$male_51_60_total;
$quarter1['male_61_70_1']+=$male_61_70_1;
$quarter1['male_61_70_2']+=$male_61_70_2;
$quarter1['male_61_70_3']+=$male_61_70_3;
$quarter1['male_61_70_4']+=$male_61_70_4;
$quarter1['male_61_70_5']+=$male_61_70_5;
$quarter1['male_61_70_6']+=$male_61_70_6;
$quarter1['male_61_70_7']+=$male_61_70_7;
$quarter1['male_61_70_total']+=$male_61_70_total;
$quarter1['male_71_80_1']+=$male_71_80_1;
$quarter1['male_71_80_2']+=$male_71_80_2;
$quarter1['male_71_80_3']+=$male_71_80_3;
$quarter1['male_71_80_4']+=$male_71_80_4;
$quarter1['male_71_80_5']+=$male_71_80_5;
$quarter1['male_71_80_6']+=$male_71_80_6;
$quarter1['male_71_80_7']+=$male_71_80_7;
$quarter1['male_71_80_total']+=$male_71_80_total;
$quarter1['male_81_1']+=$male_81_1;
$quarter1['male_81_2']+=$male_81_2;
$quarter1['male_81_3']+=$male_81_3;
$quarter1['male_81_4']+=$male_81_4;
$quarter1['male_81_5']+=$male_81_5;
$quarter1['male_81_6']+=$male_81_6;
$quarter1['male_81_7']+=$male_81_7;
$quarter1['male_81_total']+=$male_81_total;
$quarter1['male_total_1']+=$male_total_1;
$quarter1['male_total_2']+=$male_total_2;
$quarter1['male_total_3']+=$male_total_3;
$quarter1['male_total_4']+=$male_total_4;
$quarter1['male_total_5']+=$male_total_5;
$quarter1['male_total_6']+=$male_total_6;
$quarter1['male_total_7']+=$male_total_7;
$quarter1['subsequent_male_0_10_1']+=$subsequent_male_0_10_1;
$quarter1['subsequent_male_0_10_2']+=$subsequent_male_0_10_2;
$quarter1['subsequent_male_0_10_3']+=$subsequent_male_0_10_3;
$quarter1['subsequent_male_0_10_4']+=$subsequent_male_0_10_4;
$quarter1['subsequent_male_0_10_5']+=$subsequent_male_0_10_5;
$quarter1['subsequent_male_0_10_6']+=$subsequent_male_0_10_6;
$quarter1['subsequent_male_0_10_7']+=$subsequent_male_0_10_7;
$quarter1['subsequent_male_0_10_total']+=$subsequent_male_0_10_total;
$quarter1['subsequent_male_11_20_1']+=$subsequent_male_11_20_1;
$quarter1['subsequent_male_11_20_2']+=$subsequent_male_11_20_2;
$quarter1['subsequent_male_11_20_3']+=$subsequent_male_11_20_3;
$quarter1['subsequent_male_11_20_4']+=$subsequent_male_11_20_4;
$quarter1['subsequent_male_11_20_5']+=$subsequent_male_11_20_5;
$quarter1['subsequent_male_11_20_6']+=$subsequent_male_11_20_6;
$quarter1['subsequent_male_11_20_7']+=$subsequent_male_11_20_7;
$quarter1['subsequent_male_11_20_total']+=$subsequent_male_11_20_total;
$quarter1['subsequent_male_21_30_1']+=$subsequent_male_21_30_1;
$quarter1['subsequent_male_21_30_2']+=$subsequent_male_21_30_2;
$quarter1['subsequent_male_21_30_3']+=$subsequent_male_21_30_3;
$quarter1['subsequent_male_21_30_4']+=$subsequent_male_21_30_4;
$quarter1['subsequent_male_21_30_5']+=$subsequent_male_21_30_5;
$quarter1['subsequent_male_21_30_6']+=$subsequent_male_21_30_6;
$quarter1['subsequent_male_21_30_7']+=$subsequent_male_21_30_7;
$quarter1['subsequent_male_21_30_total']+=$subsequent_male_21_30_total;
$quarter1['subsequent_male_31_40_1']+=$subsequent_male_31_40_1;
$quarter1['subsequent_male_31_40_2']+=$subsequent_male_31_40_2;
$quarter1['subsequent_male_31_40_3']+=$subsequent_male_31_40_3;
$quarter1['subsequent_male_31_40_4']+=$subsequent_male_31_40_4;
$quarter1['subsequent_male_31_40_5']+=$subsequent_male_31_40_5;
$quarter1['subsequent_male_31_40_6']+=$subsequent_male_31_40_6;
$quarter1['subsequent_male_31_40_7']+=$subsequent_male_31_40_7;
$quarter1['subsequent_male_31_40_total']+=$subsequent_male_31_40_total;
$quarter1['subsequent_male_41_50_1']+=$subsequent_male_41_50_1;
$quarter1['subsequent_male_41_50_2']+=$subsequent_male_41_50_2;
$quarter1['subsequent_male_41_50_3']+=$subsequent_male_41_50_3;
$quarter1['subsequent_male_41_50_4']+=$subsequent_male_41_50_4;
$quarter1['subsequent_male_41_50_5']+=$subsequent_male_41_50_5;
$quarter1['subsequent_male_41_50_6']+=$subsequent_male_41_50_6;
$quarter1['subsequent_male_41_50_7']+=$subsequent_male_41_50_7;
$quarter1['subsequent_male_41_50_total']+=$subsequent_male_41_50_total;
$quarter1['subsequent_male_51_60_1']+=$subsequent_male_51_60_1;
$quarter1['subsequent_male_51_60_2']+=$subsequent_male_51_60_2;
$quarter1['subsequent_male_51_60_3']+=$subsequent_male_51_60_3;
$quarter1['subsequent_male_51_60_4']+=$subsequent_male_51_60_4;
$quarter1['subsequent_male_51_60_5']+=$subsequent_male_51_60_5;
$quarter1['subsequent_male_51_60_6']+=$subsequent_male_51_60_6;
$quarter1['subsequent_male_51_60_7']+=$subsequent_male_51_60_7;
$quarter1['subsequent_male_51_60_total']+=$subsequent_male_51_60_total;
$quarter1['subsequent_male_61_70_1']+=$subsequent_male_61_70_1;
$quarter1['subsequent_male_61_70_2']+=$subsequent_male_61_70_2;
$quarter1['subsequent_male_61_70_3']+=$subsequent_male_61_70_3;
$quarter1['subsequent_male_61_70_4']+=$subsequent_male_61_70_4;
$quarter1['subsequent_male_61_70_5']+=$subsequent_male_61_70_5;
$quarter1['subsequent_male_61_70_6']+=$subsequent_male_61_70_6;
$quarter1['subsequent_male_61_70_7']+=$subsequent_male_61_70_7;
$quarter1['subsequent_male_61_70_total']+=$subsequent_male_61_70_total;
$quarter1['subsequent_male_71_80_1']+=$subsequent_male_71_80_1;
$quarter1['subsequent_male_71_80_2']+=$subsequent_male_71_80_2;
$quarter1['subsequent_male_71_80_3']+=$subsequent_male_71_80_3;
$quarter1['subsequent_male_71_80_4']+=$subsequent_male_71_80_4;
$quarter1['subsequent_male_71_80_5']+=$subsequent_male_71_80_5;
$quarter1['subsequent_male_71_80_6']+=$subsequent_male_71_80_6;
$quarter1['subsequent_male_71_80_7']+=$subsequent_male_71_80_7;
$quarter1['subsequent_male_71_80_total']+=$subsequent_male_71_80_total;
$quarter1['subsequent_male_80_1']+=$subsequent_male_80_1;
$quarter1['subsequent_male_80_2']+=$subsequent_male_80_2;
$quarter1['subsequent_male_80_3']+=$subsequent_male_80_3;
$quarter1['subsequent_male_80_4']+=$subsequent_male_80_4;
$quarter1['subsequent_male_80_5']+=$subsequent_male_80_5;
$quarter1['subsequent_male_80_6']+=$subsequent_male_80_6;
$quarter1['subsequent_male_80_7']+=$subsequent_male_80_7;
$quarter1['subsequent_male_80_total']+=$subsequent_male_80_total;
$quarter1['subsequent_male_total_1']+=$subsequent_male_total_1;
$quarter1['subsequent_male_total_2']+=$subsequent_male_total_2;
$quarter1['subsequent_male_total_3']+=$subsequent_male_total_3;
$quarter1['subsequent_male_total_4']+=$subsequent_male_total_4;
$quarter1['subsequent_male_total_5']+=$subsequent_male_total_5;
$quarter1['subsequent_male_total_6']+=$subsequent_male_total_6;
$quarter1['subsequent_male_total_7']+=$subsequent_male_total_7;
$quarter1['total_num_lymphed']+=$total_num_lymphed;
$quarter1['total_num_hydro']+=$total_num_hydro;
$quarter1['mf_pos_patient']+=$mf_pos_patient;
$quarter1['opd_patient']+=$opd_patient;
$quarter1['female_0_10_1']+=$female_0_10_1;
$quarter1['female_0_10_2']+=$female_0_10_2;
$quarter1['female_0_10_3']+=$female_0_10_3;
$quarter1['female_0_10_4']+=$female_0_10_4;
$quarter1['female_0_10_5']+=$female_0_10_5;
$quarter1['female_0_10_6']+=$female_0_10_6;
$quarter1['female_0_10_7']+=$female_0_10_7;
$quarter1['female_0_10_total']+=$female_0_10_total;
$quarter1['female_11_20_1']+=$female_11_20_1;
$quarter1['female_11_20_2']+=$female_11_20_2;
$quarter1['female_11_20_3']+=$female_11_20_3;
$quarter1['female_11_20_4']+=$female_11_20_4;
$quarter1['female_11_20_5']+=$female_11_20_5;
$quarter1['female_11_20_6']+=$female_11_20_6;
$quarter1['female_11_20_7']+=$female_11_20_7;
$quarter1['female_11_20_total']+=$female_11_20_total;
$quarter1['female_21_30_1']+=$female_21_30_1;
$quarter1['female_21_30_2']+=$female_21_30_2;
$quarter1['female_21_30_3']+=$female_21_30_3;
$quarter1['female_21_30_4']+=$female_21_30_4;
$quarter1['female_21_30_5']+=$female_21_30_5;
$quarter1['female_21_30_6']+=$female_21_30_6;
$quarter1['female_21_30_7']+=$female_21_30_7;
$quarter1['female_21_30_total']+=$female_21_30_total;
$quarter1['female_31_40_1']+=$female_31_40_1;
$quarter1['female_31_40_2']+=$female_31_40_2;
$quarter1['female_31_40_3']+=$female_31_40_3;
$quarter1['female_31_40_4']+=$female_31_40_4;
$quarter1['female_31_40_5']+=$female_31_40_5;
$quarter1['female_31_40_6']+=$female_31_40_6;
$quarter1['female_31_40_7']+=$female_31_40_7;
$quarter1['female_31_40_total']+=$female_31_40_total;
$quarter1['female_41_50_1']+=$female_41_50_1;
$quarter1['female_41_50_2']+=$female_41_50_2;
$quarter1['female_41_50_3']+=$female_41_50_3;
$quarter1['female_41_50_4']+=$female_41_50_4;
$quarter1['female_41_50_5']+=$female_41_50_5;
$quarter1['female_41_50_6']+=$female_41_50_6;
$quarter1['female_41_50_7']+=$female_41_50_7;
$quarter1['female_41_50_total']+=$female_41_50_total;
$quarter1['female_51_60_1']+=$female_51_60_1;
$quarter1['female_51_60_2']+=$female_51_60_2;
$quarter1['female_51_60_3']+=$female_51_60_3;
$quarter1['female_51_60_4']+=$female_51_60_4;
$quarter1['female_51_60_5']+=$female_51_60_5;
$quarter1['female_51_60_6']+=$female_51_60_6;
$quarter1['female_51_60_7']+=$female_51_60_7;
$quarter1['female_51_60_total']+=$female_51_60_total;
$quarter1['female_61_70_1']+=$female_61_70_1;
$quarter1['female_61_70_2']+=$female_61_70_2;
$quarter1['female_61_70_3']+=$female_61_70_3;
$quarter1['female_61_70_4']+=$female_61_70_4;
$quarter1['female_61_70_5']+=$female_61_70_5;
$quarter1['female_61_70_6']+=$female_61_70_6;
$quarter1['female_61_70_7']+=$female_61_70_7;
$quarter1['female_61_70_total']+=$female_61_70_total;
$quarter1['female_71_80_1']+=$female_71_80_1;
$quarter1['female_71_80_2']+=$female_71_80_2;
$quarter1['female_71_80_3']+=$female_71_80_3;
$quarter1['female_71_80_4']+=$female_71_80_4;
$quarter1['female_71_80_5']+=$female_71_80_5;
$quarter1['female_71_80_6']+=$female_71_80_6;
$quarter1['female_71_80_7']+=$female_71_80_7;
$quarter1['female_71_80_total']+=$female_71_80_total;
$quarter1['female_80_1']+=$female_80_1;
$quarter1['female_80_2']+=$female_80_2;
$quarter1['female_80_3']+=$female_80_3;
$quarter1['female_80_4']+=$female_80_4;
$quarter1['female_80_5']+=$female_80_5;
$quarter1['female_80_6']+=$female_80_6;
$quarter1['female_80_7']+=$female_80_7;
$quarter1['female_80_total']+=$female_80_total;
$quarter1['female_total_1']+=$female_total_1;
$quarter1['female_total_2']+=$female_total_2;
$quarter1['female_total_3']+=$female_total_3;
$quarter1['female_total_4']+=$female_total_4;
$quarter1['female_total_5']+=$female_total_5;
$quarter1['female_total_6']+=$female_total_6;
$quarter1['female_total_7']+=$female_total_7;
$quarter1['subsequent_female_0_10_1']+=$subsequent_female_0_10_1;
$quarter1['subsequent_female_0_10_2']+=$subsequent_female_0_10_2;
$quarter1['subsequent_female_0_10_3']+=$subsequent_female_0_10_3;
$quarter1['subsequent_female_0_10_4']+=$subsequent_female_0_10_4;
$quarter1['subsequent_female_0_10_5']+=$subsequent_female_0_10_5;
$quarter1['subsequent_female_0_10_6']+=$subsequent_female_0_10_6;
$quarter1['subsequent_female_0_10_7']+=$subsequent_female_0_10_7;
$quarter1['subsequent_female_0_10_total']+=$subsequent_female_0_10_total;
$quarter1['subsequent_female_11_20_1']+=$subsequent_female_11_20_1;
$quarter1['subsequent_female_11_20_2']+=$subsequent_female_11_20_2;
$quarter1['subsequent_female_11_20_3']+=$subsequent_female_11_20_3;
$quarter1['subsequent_female_11_20_4']+=$subsequent_female_11_20_4;
$quarter1['subsequent_female_11_20_5']+=$subsequent_female_11_20_5;
$quarter1['subsequent_female_11_20_6']+=$subsequent_female_11_20_6;
$quarter1['subsequent_female_11_20_7']+=$subsequent_female_11_20_7;
$quarter1['subsequent_female_11_20_total']+=$subsequent_female_11_20_total;
$quarter1['subsequent_female_21_30_1']+=$subsequent_female_21_30_1;
$quarter1['subsequent_female_21_30_2']+=$subsequent_female_21_30_2;
$quarter1['subsequent_female_21_30_3']+=$subsequent_female_21_30_3;
$quarter1['subsequent_female_21_30_4']+=$subsequent_female_21_30_4;
$quarter1['subsequent_female_21_30_5']+=$subsequent_female_21_30_5;
$quarter1['subsequent_female_21_30_6']+=$subsequent_female_21_30_6;
$quarter1['subsequent_female_21_30_7']+=$subsequent_female_21_30_7;
$quarter1['subsequent_female_21_30_total']+=$subsequent_female_21_30_total;
$quarter1['subsequent_female_31_40_1']+=$subsequent_female_31_40_1;
$quarter1['subsequent_female_31_40_2']+=$subsequent_female_31_40_2;
$quarter1['subsequent_female_31_40_3']+=$subsequent_female_31_40_3;
$quarter1['subsequent_female_31_40_4']+=$subsequent_female_31_40_4;
$quarter1['subsequent_female_31_40_5']+=$subsequent_female_31_40_5;
$quarter1['subsequent_female_31_40_6']+=$subsequent_female_31_40_6;
$quarter1['subsequent_female_31_40_7']+=$subsequent_female_31_40_7;
$quarter1['subsequent_female_31_40_total']+=$subsequent_female_31_40_total;
$quarter1['subsequent_female_41_50_1']+=$subsequent_female_41_50_1;
$quarter1['subsequent_female_41_50_2']+=$subsequent_female_41_50_2;
$quarter1['subsequent_female_41_50_3']+=$subsequent_female_41_50_3;
$quarter1['subsequent_female_41_50_4']+=$subsequent_female_41_50_4;
$quarter1['subsequent_female_41_50_5']+=$subsequent_female_41_50_5;
$quarter1['subsequent_female_41_50_6']+=$subsequent_female_41_50_6;
$quarter1['subsequent_female_41_50_7']+=$subsequent_female_41_50_7;
$quarter1['subsequent_female_41_50_total']+=$subsequent_female_41_50_total;
$quarter1['subsequent_female_51_60_1']+=$subsequent_female_51_60_1;
$quarter1['subsequent_female_51_60_2']+=$subsequent_female_51_60_2;
$quarter1['subsequent_female_51_60_3']+=$subsequent_female_51_60_3;
$quarter1['subsequent_female_51_60_4']+=$subsequent_female_51_60_4;
$quarter1['subsequent_female_51_60_5']+=$subsequent_female_51_60_5;
$quarter1['subsequent_female_51_60_6']+=$subsequent_female_51_60_6;
$quarter1['subsequent_female_51_60_7']+=$subsequent_female_51_60_7;
$quarter1['subsequent_female_51_60_total']+=$subsequent_female_51_60_total;
$quarter1['subsequent_female_61_70_1']+=$subsequent_female_61_70_1;
$quarter1['subsequent_female_61_70_2']+=$subsequent_female_61_70_2;
$quarter1['subsequent_female_61_70_3']+=$subsequent_female_61_70_3;
$quarter1['subsequent_female_61_70_4']+=$subsequent_female_61_70_4;
$quarter1['subsequent_female_61_70_5']+=$subsequent_female_61_70_5;
$quarter1['subsequent_female_61_70_6']+=$subsequent_female_61_70_6;
$quarter1['subsequent_female_61_70_7']+=$subsequent_female_61_70_7;
$quarter1['subsequent_female_61_70_total']+=$subsequent_female_61_70_total;
$quarter1['subsequent_female_71_80_1']+=$subsequent_female_71_80_1;
$quarter1['subsequent_female_71_80_2']+=$subsequent_female_71_80_2;
$quarter1['subsequent_female_71_80_3']+=$subsequent_female_71_80_3;
$quarter1['subsequent_female_71_80_4']+=$subsequent_female_71_80_4;
$quarter1['subsequent_female_71_80_5']+=$subsequent_female_71_80_5;
$quarter1['subsequent_female_71_80_6']+=$subsequent_female_71_80_6;
$quarter1['subsequent_female_71_80_7']+=$subsequent_female_71_80_7;
$quarter1['subsequent_female_71_80_total']+=$subsequent_female_71_80_total;
$quarter1['subsequent_female_81_1']+=$subsequent_female_81_1;
$quarter1['subsequent_female_81_2']+=$subsequent_female_81_2;
$quarter1['subsequent_female_81_3']+=$subsequent_female_81_3;
$quarter1['subsequent_female_81_4']+=$subsequent_female_81_4;
$quarter1['subsequent_female_81_5']+=$subsequent_female_81_5;
$quarter1['subsequent_female_81_6']+=$subsequent_female_81_6;
$quarter1['subsequent_female_81_7']+=$subsequent_female_81_7;
$quarter1['subsequent_female_81_total']+=$subsequent_female_81_total;
$quarter1['subsequent_female_total_1']+=$subsequent_female_total_1;
$quarter1['subsequent_female_total_2']+=$subsequent_female_total_2;
$quarter1['subsequent_female_total_3']+=$subsequent_female_total_3;
$quarter1['subsequent_female_total_4']+=$subsequent_female_total_4;
$quarter1['subsequent_female_total_5']+=$subsequent_female_total_5;
$quarter1['subsequent_female_total_6']+=$subsequent_female_total_6;
$quarter1['subsequent_female_total_7']+=$subsequent_female_total_7;
$quarter1['male_total_total']+=$male_total_total;
$quarter1['subsequent_male_total_total']+=$subsequent_male_total_total;
$quarter1['female_total_total']+=$female_total_total;
$quarter1['subsequent_female_total_7']+=$subsequent_female_total_7;




                        break;
                    case "April":
                    case "May":
                    case "June":
$quarter2['female_0_10_1'] += $female_0_10_1;
$quarter2['male_0_10_1']+=$male_0_10_1;
$quarter2['male_0_10_2']+=$male_0_10_2;
$quarter2['male_0_10_3']+=$male_0_10_3;
$quarter2['male_0_10_4']+=$male_0_10_4;
$quarter2['male_0_10_5']+=$male_0_10_5;
$quarter2['male_0_10_6']+=$male_0_10_6;
$quarter2['male_0_10_7']+=$male_0_10_7;
$quarter2['male_0_10_total']+=$male_0_10_total;
$quarter2['male_11_20_1']+=$male_11_20_1;
$quarter2['male_11_20_2']+=$male_11_20_2;
$quarter2['male_11_20_3']+=$male_11_20_3;
$quarter2['male_11_20_4']+=$male_11_20_4;
$quarter2['male_11_20_5']+=$male_11_20_5;
$quarter2['male_11_20_6']+=$male_11_20_6;
$quarter2['male_11_20_7']+=$male_11_20_7;
$quarter2['male_11_20_total']+=$male_11_20_total;
$quarter2['male_21_30_1']+=$male_21_30_1;
$quarter2['male_21_30_2']+=$male_21_30_2;
$quarter2['male_21_30_3']+=$male_21_30_3;
$quarter2['male_21_30_4']+=$male_21_30_4;
$quarter2['male_21_30_5']+=$male_21_30_5;
$quarter2['male_21_30_6']+=$male_21_30_6;
$quarter2['male_21_30_7']+=$male_21_30_7;
$quarter2['male_21_30_total']+=$male_21_30_total;
$quarter2['male_31_40_1']+=$male_31_40_1;
$quarter2['male_31_40_2']+=$male_31_40_2;
$quarter2['male_31_40_3']+=$male_31_40_3;
$quarter2['male_31_40_4']+=$male_31_40_4;
$quarter2['male_31_40_5']+=$male_31_40_5;
$quarter2['male_31_40_6']+=$male_31_40_6;
$quarter2['male_31_40_7']+=$male_31_40_7;
$quarter2['male_31_40_total']+=$male_31_40_total;
$quarter2['male_41_50_1']+=$male_41_50_1;
$quarter2['male_41_50_2']+=$male_41_50_2;
$quarter2['male_41_50_3']+=$male_41_50_3;
$quarter2['male_41_50_4']+=$male_41_50_4;
$quarter2['male_41_50_5']+=$male_41_50_5;
$quarter2['male_41_50_6']+=$male_41_50_6;
$quarter2['male_41_50_7']+=$male_41_50_7;
$quarter2['male_41_50_total']+=$male_41_50_total;
$quarter2['male_51_60_1']+=$male_51_60_1;
$quarter2['male_51_60_2']+=$male_51_60_2;
$quarter2['male_51_60_3']+=$male_51_60_3;
$quarter2['male_51_60_4']+=$male_51_60_4;
$quarter2['male_51_60_5']+=$male_51_60_5;
$quarter2['male_51_60_6']+=$male_51_60_6;
$quarter2['male_51_60_7']+=$male_51_60_7;
$quarter2['male_51_60_total']+=$male_51_60_total;
$quarter2['male_61_70_1']+=$male_61_70_1;
$quarter2['male_61_70_2']+=$male_61_70_2;
$quarter2['male_61_70_3']+=$male_61_70_3;
$quarter2['male_61_70_4']+=$male_61_70_4;
$quarter2['male_61_70_5']+=$male_61_70_5;
$quarter2['male_61_70_6']+=$male_61_70_6;
$quarter2['male_61_70_7']+=$male_61_70_7;
$quarter2['male_61_70_total']+=$male_61_70_total;
$quarter2['male_71_80_1']+=$male_71_80_1;
$quarter2['male_71_80_2']+=$male_71_80_2;
$quarter2['male_71_80_3']+=$male_71_80_3;
$quarter2['male_71_80_4']+=$male_71_80_4;
$quarter2['male_71_80_5']+=$male_71_80_5;
$quarter2['male_71_80_6']+=$male_71_80_6;
$quarter2['male_71_80_7']+=$male_71_80_7;
$quarter2['male_71_80_total']+=$male_71_80_total;
$quarter2['male_81_1']+=$male_81_1;
$quarter2['male_81_2']+=$male_81_2;
$quarter2['male_81_3']+=$male_81_3;
$quarter2['male_81_4']+=$male_81_4;
$quarter2['male_81_5']+=$male_81_5;
$quarter2['male_81_6']+=$male_81_6;
$quarter2['male_81_7']+=$male_81_7;
$quarter2['male_81_total']+=$male_81_total;
$quarter2['male_total_1']+=$male_total_1;
$quarter2['male_total_2']+=$male_total_2;
$quarter2['male_total_3']+=$male_total_3;
$quarter2['male_total_4']+=$male_total_4;
$quarter2['male_total_5']+=$male_total_5;
$quarter2['male_total_6']+=$male_total_6;
$quarter2['male_total_7']+=$male_total_7;
$quarter2['subsequent_male_0_10_1']+=$subsequent_male_0_10_1;
$quarter2['subsequent_male_0_10_2']+=$subsequent_male_0_10_2;
$quarter2['subsequent_male_0_10_3']+=$subsequent_male_0_10_3;
$quarter2['subsequent_male_0_10_4']+=$subsequent_male_0_10_4;
$quarter2['subsequent_male_0_10_5']+=$subsequent_male_0_10_5;
$quarter2['subsequent_male_0_10_6']+=$subsequent_male_0_10_6;
$quarter2['subsequent_male_0_10_7']+=$subsequent_male_0_10_7;
$quarter2['subsequent_male_0_10_total']+=$subsequent_male_0_10_total;
$quarter2['subsequent_male_11_20_1']+=$subsequent_male_11_20_1;
$quarter2['subsequent_male_11_20_2']+=$subsequent_male_11_20_2;
$quarter2['subsequent_male_11_20_3']+=$subsequent_male_11_20_3;
$quarter2['subsequent_male_11_20_4']+=$subsequent_male_11_20_4;
$quarter2['subsequent_male_11_20_5']+=$subsequent_male_11_20_5;
$quarter2['subsequent_male_11_20_6']+=$subsequent_male_11_20_6;
$quarter2['subsequent_male_11_20_7']+=$subsequent_male_11_20_7;
$quarter2['subsequent_male_11_20_total']+=$subsequent_male_11_20_total;
$quarter2['subsequent_male_21_30_1']+=$subsequent_male_21_30_1;
$quarter2['subsequent_male_21_30_2']+=$subsequent_male_21_30_2;
$quarter2['subsequent_male_21_30_3']+=$subsequent_male_21_30_3;
$quarter2['subsequent_male_21_30_4']+=$subsequent_male_21_30_4;
$quarter2['subsequent_male_21_30_5']+=$subsequent_male_21_30_5;
$quarter2['subsequent_male_21_30_6']+=$subsequent_male_21_30_6;
$quarter2['subsequent_male_21_30_7']+=$subsequent_male_21_30_7;
$quarter2['subsequent_male_21_30_total']+=$subsequent_male_21_30_total;
$quarter2['subsequent_male_31_40_1']+=$subsequent_male_31_40_1;
$quarter2['subsequent_male_31_40_2']+=$subsequent_male_31_40_2;
$quarter2['subsequent_male_31_40_3']+=$subsequent_male_31_40_3;
$quarter2['subsequent_male_31_40_4']+=$subsequent_male_31_40_4;
$quarter2['subsequent_male_31_40_5']+=$subsequent_male_31_40_5;
$quarter2['subsequent_male_31_40_6']+=$subsequent_male_31_40_6;
$quarter2['subsequent_male_31_40_7']+=$subsequent_male_31_40_7;
$quarter2['subsequent_male_31_40_total']+=$subsequent_male_31_40_total;
$quarter2['subsequent_male_41_50_1']+=$subsequent_male_41_50_1;
$quarter2['subsequent_male_41_50_2']+=$subsequent_male_41_50_2;
$quarter2['subsequent_male_41_50_3']+=$subsequent_male_41_50_3;
$quarter2['subsequent_male_41_50_4']+=$subsequent_male_41_50_4;
$quarter2['subsequent_male_41_50_5']+=$subsequent_male_41_50_5;
$quarter2['subsequent_male_41_50_6']+=$subsequent_male_41_50_6;
$quarter2['subsequent_male_41_50_7']+=$subsequent_male_41_50_7;
$quarter2['subsequent_male_41_50_total']+=$subsequent_male_41_50_total;
$quarter2['subsequent_male_51_60_1']+=$subsequent_male_51_60_1;
$quarter2['subsequent_male_51_60_2']+=$subsequent_male_51_60_2;
$quarter2['subsequent_male_51_60_3']+=$subsequent_male_51_60_3;
$quarter2['subsequent_male_51_60_4']+=$subsequent_male_51_60_4;
$quarter2['subsequent_male_51_60_5']+=$subsequent_male_51_60_5;
$quarter2['subsequent_male_51_60_6']+=$subsequent_male_51_60_6;
$quarter2['subsequent_male_51_60_7']+=$subsequent_male_51_60_7;
$quarter2['subsequent_male_51_60_total']+=$subsequent_male_51_60_total;
$quarter2['subsequent_male_61_70_1']+=$subsequent_male_61_70_1;
$quarter2['subsequent_male_61_70_2']+=$subsequent_male_61_70_2;
$quarter2['subsequent_male_61_70_3']+=$subsequent_male_61_70_3;
$quarter2['subsequent_male_61_70_4']+=$subsequent_male_61_70_4;
$quarter2['subsequent_male_61_70_5']+=$subsequent_male_61_70_5;
$quarter2['subsequent_male_61_70_6']+=$subsequent_male_61_70_6;
$quarter2['subsequent_male_61_70_7']+=$subsequent_male_61_70_7;
$quarter2['subsequent_male_61_70_total']+=$subsequent_male_61_70_total;
$quarter2['subsequent_male_71_80_1']+=$subsequent_male_71_80_1;
$quarter2['subsequent_male_71_80_2']+=$subsequent_male_71_80_2;
$quarter2['subsequent_male_71_80_3']+=$subsequent_male_71_80_3;
$quarter2['subsequent_male_71_80_4']+=$subsequent_male_71_80_4;
$quarter2['subsequent_male_71_80_5']+=$subsequent_male_71_80_5;
$quarter2['subsequent_male_71_80_6']+=$subsequent_male_71_80_6;
$quarter2['subsequent_male_71_80_7']+=$subsequent_male_71_80_7;
$quarter2['subsequent_male_71_80_total']+=$subsequent_male_71_80_total;
$quarter2['subsequent_male_80_1']+=$subsequent_male_80_1;
$quarter2['subsequent_male_80_2']+=$subsequent_male_80_2;
$quarter2['subsequent_male_80_3']+=$subsequent_male_80_3;
$quarter2['subsequent_male_80_4']+=$subsequent_male_80_4;
$quarter2['subsequent_male_80_5']+=$subsequent_male_80_5;
$quarter2['subsequent_male_80_6']+=$subsequent_male_80_6;
$quarter2['subsequent_male_80_7']+=$subsequent_male_80_7;
$quarter2['subsequent_male_80_total']+=$subsequent_male_80_total;
$quarter2['subsequent_male_total_1']+=$subsequent_male_total_1;
$quarter2['subsequent_male_total_2']+=$subsequent_male_total_2;
$quarter2['subsequent_male_total_3']+=$subsequent_male_total_3;
$quarter2['subsequent_male_total_4']+=$subsequent_male_total_4;
$quarter2['subsequent_male_total_5']+=$subsequent_male_total_5;
$quarter2['subsequent_male_total_6']+=$subsequent_male_total_6;
$quarter2['subsequent_male_total_7']+=$subsequent_male_total_7;
$quarter2['total_num_lymphed']+=$total_num_lymphed;
$quarter2['total_num_hydro']+=$total_num_hydro;
$quarter2['mf_pos_patient']+=$mf_pos_patient;
$quarter2['opd_patient']+=$opd_patient;
$quarter2['female_0_10_1']+=$female_0_10_1;
$quarter2['female_0_10_2']+=$female_0_10_2;
$quarter2['female_0_10_3']+=$female_0_10_3;
$quarter2['female_0_10_4']+=$female_0_10_4;
$quarter2['female_0_10_5']+=$female_0_10_5;
$quarter2['female_0_10_6']+=$female_0_10_6;
$quarter2['female_0_10_7']+=$female_0_10_7;
$quarter2['female_0_10_total']+=$female_0_10_total;
$quarter2['female_11_20_1']+=$female_11_20_1;
$quarter2['female_11_20_2']+=$female_11_20_2;
$quarter2['female_11_20_3']+=$female_11_20_3;
$quarter2['female_11_20_4']+=$female_11_20_4;
$quarter2['female_11_20_5']+=$female_11_20_5;
$quarter2['female_11_20_6']+=$female_11_20_6;
$quarter2['female_11_20_7']+=$female_11_20_7;
$quarter2['female_11_20_total']+=$female_11_20_total;
$quarter2['female_21_30_1']+=$female_21_30_1;
$quarter2['female_21_30_2']+=$female_21_30_2;
$quarter2['female_21_30_3']+=$female_21_30_3;
$quarter2['female_21_30_4']+=$female_21_30_4;
$quarter2['female_21_30_5']+=$female_21_30_5;
$quarter2['female_21_30_6']+=$female_21_30_6;
$quarter2['female_21_30_7']+=$female_21_30_7;
$quarter2['female_21_30_total']+=$female_21_30_total;
$quarter2['female_31_40_1']+=$female_31_40_1;
$quarter2['female_31_40_2']+=$female_31_40_2;
$quarter2['female_31_40_3']+=$female_31_40_3;
$quarter2['female_31_40_4']+=$female_31_40_4;
$quarter2['female_31_40_5']+=$female_31_40_5;
$quarter2['female_31_40_6']+=$female_31_40_6;
$quarter2['female_31_40_7']+=$female_31_40_7;
$quarter2['female_31_40_total']+=$female_31_40_total;
$quarter2['female_41_50_1']+=$female_41_50_1;
$quarter2['female_41_50_2']+=$female_41_50_2;
$quarter2['female_41_50_3']+=$female_41_50_3;
$quarter2['female_41_50_4']+=$female_41_50_4;
$quarter2['female_41_50_5']+=$female_41_50_5;
$quarter2['female_41_50_6']+=$female_41_50_6;
$quarter2['female_41_50_7']+=$female_41_50_7;
$quarter2['female_41_50_total']+=$female_41_50_total;
$quarter2['female_51_60_1']+=$female_51_60_1;
$quarter2['female_51_60_2']+=$female_51_60_2;
$quarter2['female_51_60_3']+=$female_51_60_3;
$quarter2['female_51_60_4']+=$female_51_60_4;
$quarter2['female_51_60_5']+=$female_51_60_5;
$quarter2['female_51_60_6']+=$female_51_60_6;
$quarter2['female_51_60_7']+=$female_51_60_7;
$quarter2['female_51_60_total']+=$female_51_60_total;
$quarter2['female_61_70_1']+=$female_61_70_1;
$quarter2['female_61_70_2']+=$female_61_70_2;
$quarter2['female_61_70_3']+=$female_61_70_3;
$quarter2['female_61_70_4']+=$female_61_70_4;
$quarter2['female_61_70_5']+=$female_61_70_5;
$quarter2['female_61_70_6']+=$female_61_70_6;
$quarter2['female_61_70_7']+=$female_61_70_7;
$quarter2['female_61_70_total']+=$female_61_70_total;
$quarter2['female_71_80_1']+=$female_71_80_1;
$quarter2['female_71_80_2']+=$female_71_80_2;
$quarter2['female_71_80_3']+=$female_71_80_3;
$quarter2['female_71_80_4']+=$female_71_80_4;
$quarter2['female_71_80_5']+=$female_71_80_5;
$quarter2['female_71_80_6']+=$female_71_80_6;
$quarter2['female_71_80_7']+=$female_71_80_7;
$quarter2['female_71_80_total']+=$female_71_80_total;
$quarter2['female_80_1']+=$female_80_1;
$quarter2['female_80_2']+=$female_80_2;
$quarter2['female_80_3']+=$female_80_3;
$quarter2['female_80_4']+=$female_80_4;
$quarter2['female_80_5']+=$female_80_5;
$quarter2['female_80_6']+=$female_80_6;
$quarter2['female_80_7']+=$female_80_7;
$quarter2['female_80_total']+=$female_80_total;
$quarter2['female_total_1']+=$female_total_1;
$quarter2['female_total_2']+=$female_total_2;
$quarter2['female_total_3']+=$female_total_3;
$quarter2['female_total_4']+=$female_total_4;
$quarter2['female_total_5']+=$female_total_5;
$quarter2['female_total_6']+=$female_total_6;
$quarter2['female_total_7']+=$female_total_7;
$quarter2['subsequent_female_0_10_1']+=$subsequent_female_0_10_1;
$quarter2['subsequent_female_0_10_2']+=$subsequent_female_0_10_2;
$quarter2['subsequent_female_0_10_3']+=$subsequent_female_0_10_3;
$quarter2['subsequent_female_0_10_4']+=$subsequent_female_0_10_4;
$quarter2['subsequent_female_0_10_5']+=$subsequent_female_0_10_5;
$quarter2['subsequent_female_0_10_6']+=$subsequent_female_0_10_6;
$quarter2['subsequent_female_0_10_7']+=$subsequent_female_0_10_7;
$quarter2['subsequent_female_0_10_total']+=$subsequent_female_0_10_total;
$quarter2['subsequent_female_11_20_1']+=$subsequent_female_11_20_1;
$quarter2['subsequent_female_11_20_2']+=$subsequent_female_11_20_2;
$quarter2['subsequent_female_11_20_3']+=$subsequent_female_11_20_3;
$quarter2['subsequent_female_11_20_4']+=$subsequent_female_11_20_4;
$quarter2['subsequent_female_11_20_5']+=$subsequent_female_11_20_5;
$quarter2['subsequent_female_11_20_6']+=$subsequent_female_11_20_6;
$quarter2['subsequent_female_11_20_7']+=$subsequent_female_11_20_7;
$quarter2['subsequent_female_11_20_total']+=$subsequent_female_11_20_total;
$quarter2['subsequent_female_21_30_1']+=$subsequent_female_21_30_1;
$quarter2['subsequent_female_21_30_2']+=$subsequent_female_21_30_2;
$quarter2['subsequent_female_21_30_3']+=$subsequent_female_21_30_3;
$quarter2['subsequent_female_21_30_4']+=$subsequent_female_21_30_4;
$quarter2['subsequent_female_21_30_5']+=$subsequent_female_21_30_5;
$quarter2['subsequent_female_21_30_6']+=$subsequent_female_21_30_6;
$quarter2['subsequent_female_21_30_7']+=$subsequent_female_21_30_7;
$quarter2['subsequent_female_21_30_total']+=$subsequent_female_21_30_total;
$quarter2['subsequent_female_31_40_1']+=$subsequent_female_31_40_1;
$quarter2['subsequent_female_31_40_2']+=$subsequent_female_31_40_2;
$quarter2['subsequent_female_31_40_3']+=$subsequent_female_31_40_3;
$quarter2['subsequent_female_31_40_4']+=$subsequent_female_31_40_4;
$quarter2['subsequent_female_31_40_5']+=$subsequent_female_31_40_5;
$quarter2['subsequent_female_31_40_6']+=$subsequent_female_31_40_6;
$quarter2['subsequent_female_31_40_7']+=$subsequent_female_31_40_7;
$quarter2['subsequent_female_31_40_total']+=$subsequent_female_31_40_total;
$quarter2['subsequent_female_41_50_1']+=$subsequent_female_41_50_1;
$quarter2['subsequent_female_41_50_2']+=$subsequent_female_41_50_2;
$quarter2['subsequent_female_41_50_3']+=$subsequent_female_41_50_3;
$quarter2['subsequent_female_41_50_4']+=$subsequent_female_41_50_4;
$quarter2['subsequent_female_41_50_5']+=$subsequent_female_41_50_5;
$quarter2['subsequent_female_41_50_6']+=$subsequent_female_41_50_6;
$quarter2['subsequent_female_41_50_7']+=$subsequent_female_41_50_7;
$quarter2['subsequent_female_41_50_total']+=$subsequent_female_41_50_total;
$quarter2['subsequent_female_51_60_1']+=$subsequent_female_51_60_1;
$quarter2['subsequent_female_51_60_2']+=$subsequent_female_51_60_2;
$quarter2['subsequent_female_51_60_3']+=$subsequent_female_51_60_3;
$quarter2['subsequent_female_51_60_4']+=$subsequent_female_51_60_4;
$quarter2['subsequent_female_51_60_5']+=$subsequent_female_51_60_5;
$quarter2['subsequent_female_51_60_6']+=$subsequent_female_51_60_6;
$quarter2['subsequent_female_51_60_7']+=$subsequent_female_51_60_7;
$quarter2['subsequent_female_51_60_total']+=$subsequent_female_51_60_total;
$quarter2['subsequent_female_61_70_1']+=$subsequent_female_61_70_1;
$quarter2['subsequent_female_61_70_2']+=$subsequent_female_61_70_2;
$quarter2['subsequent_female_61_70_3']+=$subsequent_female_61_70_3;
$quarter2['subsequent_female_61_70_4']+=$subsequent_female_61_70_4;
$quarter2['subsequent_female_61_70_5']+=$subsequent_female_61_70_5;
$quarter2['subsequent_female_61_70_6']+=$subsequent_female_61_70_6;
$quarter2['subsequent_female_61_70_7']+=$subsequent_female_61_70_7;
$quarter2['subsequent_female_61_70_total']+=$subsequent_female_61_70_total;
$quarter2['subsequent_female_71_80_1']+=$subsequent_female_71_80_1;
$quarter2['subsequent_female_71_80_2']+=$subsequent_female_71_80_2;
$quarter2['subsequent_female_71_80_3']+=$subsequent_female_71_80_3;
$quarter2['subsequent_female_71_80_4']+=$subsequent_female_71_80_4;
$quarter2['subsequent_female_71_80_5']+=$subsequent_female_71_80_5;
$quarter2['subsequent_female_71_80_6']+=$subsequent_female_71_80_6;
$quarter2['subsequent_female_71_80_7']+=$subsequent_female_71_80_7;
$quarter2['subsequent_female_71_80_total']+=$subsequent_female_71_80_total;
$quarter2['subsequent_female_81_1']+=$subsequent_female_81_1;
$quarter2['subsequent_female_81_2']+=$subsequent_female_81_2;
$quarter2['subsequent_female_81_3']+=$subsequent_female_81_3;
$quarter2['subsequent_female_81_4']+=$subsequent_female_81_4;
$quarter2['subsequent_female_81_5']+=$subsequent_female_81_5;
$quarter2['subsequent_female_81_6']+=$subsequent_female_81_6;
$quarter2['subsequent_female_81_7']+=$subsequent_female_81_7;
$quarter2['subsequent_female_81_total']+=$subsequent_female_81_total;
$quarter2['subsequent_female_total_1']+=$subsequent_female_total_1;
$quarter2['subsequent_female_total_2']+=$subsequent_female_total_2;
$quarter2['subsequent_female_total_3']+=$subsequent_female_total_3;
$quarter2['subsequent_female_total_4']+=$subsequent_female_total_4;
$quarter2['subsequent_female_total_5']+=$subsequent_female_total_5;
$quarter2['subsequent_female_total_6']+=$subsequent_female_total_6;
$quarter2['subsequent_female_total_7']+=$subsequent_female_total_7;
$quarter2['male_total_total']+=$male_total_total;
$quarter2['subsequent_male_total_total']+=$subsequent_male_total_total;
$quarter2['female_total_total']+=$female_total_total;
$quarter2['subsequent_female_total_total']+=$subsequent_female_total_total;



                        break;
                    case "July":
                    case "August":
                    case "Saptember":
$quarter3['female_0_10_1'] += $female_0_10_1;
$quarter3['male_0_10_1']+=$male_0_10_1;
$quarter3['male_0_10_2']+=$male_0_10_2;
$quarter3['male_0_10_3']+=$male_0_10_3;
$quarter3['male_0_10_4']+=$male_0_10_4;
$quarter3['male_0_10_5']+=$male_0_10_5;
$quarter3['male_0_10_6']+=$male_0_10_6;
$quarter3['male_0_10_7']+=$male_0_10_7;
$quarter3['male_0_10_total']+=$male_0_10_total;
$quarter3['male_11_20_1']+=$male_11_20_1;
$quarter3['male_11_20_2']+=$male_11_20_2;
$quarter3['male_11_20_3']+=$male_11_20_3;
$quarter3['male_11_20_4']+=$male_11_20_4;
$quarter3['male_11_20_5']+=$male_11_20_5;
$quarter3['male_11_20_6']+=$male_11_20_6;
$quarter3['male_11_20_7']+=$male_11_20_7;
$quarter3['male_11_20_total']+=$male_11_20_total;
$quarter3['male_21_30_1']+=$male_21_30_1;
$quarter3['male_21_30_2']+=$male_21_30_2;
$quarter3['male_21_30_3']+=$male_21_30_3;
$quarter3['male_21_30_4']+=$male_21_30_4;
$quarter3['male_21_30_5']+=$male_21_30_5;
$quarter3['male_21_30_6']+=$male_21_30_6;
$quarter3['male_21_30_7']+=$male_21_30_7;
$quarter3['male_21_30_total']+=$male_21_30_total;
$quarter3['male_31_40_1']+=$male_31_40_1;
$quarter3['male_31_40_2']+=$male_31_40_2;
$quarter3['male_31_40_3']+=$male_31_40_3;
$quarter3['male_31_40_4']+=$male_31_40_4;
$quarter3['male_31_40_5']+=$male_31_40_5;
$quarter3['male_31_40_6']+=$male_31_40_6;
$quarter3['male_31_40_7']+=$male_31_40_7;
$quarter3['male_31_40_total']+=$male_31_40_total;
$quarter3['male_41_50_1']+=$male_41_50_1;
$quarter3['male_41_50_2']+=$male_41_50_2;
$quarter3['male_41_50_3']+=$male_41_50_3;
$quarter3['male_41_50_4']+=$male_41_50_4;
$quarter3['male_41_50_5']+=$male_41_50_5;
$quarter3['male_41_50_6']+=$male_41_50_6;
$quarter3['male_41_50_7']+=$male_41_50_7;
$quarter3['male_41_50_total']+=$male_41_50_total;
$quarter3['male_51_60_1']+=$male_51_60_1;
$quarter3['male_51_60_2']+=$male_51_60_2;
$quarter3['male_51_60_3']+=$male_51_60_3;
$quarter3['male_51_60_4']+=$male_51_60_4;
$quarter3['male_51_60_5']+=$male_51_60_5;
$quarter3['male_51_60_6']+=$male_51_60_6;
$quarter3['male_51_60_7']+=$male_51_60_7;
$quarter3['male_51_60_total']+=$male_51_60_total;
$quarter3['male_61_70_1']+=$male_61_70_1;
$quarter3['male_61_70_2']+=$male_61_70_2;
$quarter3['male_61_70_3']+=$male_61_70_3;
$quarter3['male_61_70_4']+=$male_61_70_4;
$quarter3['male_61_70_5']+=$male_61_70_5;
$quarter3['male_61_70_6']+=$male_61_70_6;
$quarter3['male_61_70_7']+=$male_61_70_7;
$quarter3['male_61_70_total']+=$male_61_70_total;
$quarter3['male_71_80_1']+=$male_71_80_1;
$quarter3['male_71_80_2']+=$male_71_80_2;
$quarter3['male_71_80_3']+=$male_71_80_3;
$quarter3['male_71_80_4']+=$male_71_80_4;
$quarter3['male_71_80_5']+=$male_71_80_5;
$quarter3['male_71_80_6']+=$male_71_80_6;
$quarter3['male_71_80_7']+=$male_71_80_7;
$quarter3['male_71_80_total']+=$male_71_80_total;
$quarter3['male_81_1']+=$male_81_1;
$quarter3['male_81_2']+=$male_81_2;
$quarter3['male_81_3']+=$male_81_3;
$quarter3['male_81_4']+=$male_81_4;
$quarter3['male_81_5']+=$male_81_5;
$quarter3['male_81_6']+=$male_81_6;
$quarter3['male_81_7']+=$male_81_7;
$quarter3['male_81_total']+=$male_81_total;
$quarter3['male_total_1']+=$male_total_1;
$quarter3['male_total_2']+=$male_total_2;
$quarter3['male_total_3']+=$male_total_3;
$quarter3['male_total_4']+=$male_total_4;
$quarter3['male_total_5']+=$male_total_5;
$quarter3['male_total_6']+=$male_total_6;
$quarter3['male_total_7']+=$male_total_7;
$quarter3['subsequent_male_0_10_1']+=$subsequent_male_0_10_1;
$quarter3['subsequent_male_0_10_2']+=$subsequent_male_0_10_2;
$quarter3['subsequent_male_0_10_3']+=$subsequent_male_0_10_3;
$quarter3['subsequent_male_0_10_4']+=$subsequent_male_0_10_4;
$quarter3['subsequent_male_0_10_5']+=$subsequent_male_0_10_5;
$quarter3['subsequent_male_0_10_6']+=$subsequent_male_0_10_6;
$quarter3['subsequent_male_0_10_7']+=$subsequent_male_0_10_7;
$quarter3['subsequent_male_0_10_total']+=$subsequent_male_0_10_total;
$quarter3['subsequent_male_11_20_1']+=$subsequent_male_11_20_1;
$quarter3['subsequent_male_11_20_2']+=$subsequent_male_11_20_2;
$quarter3['subsequent_male_11_20_3']+=$subsequent_male_11_20_3;
$quarter3['subsequent_male_11_20_4']+=$subsequent_male_11_20_4;
$quarter3['subsequent_male_11_20_5']+=$subsequent_male_11_20_5;
$quarter3['subsequent_male_11_20_6']+=$subsequent_male_11_20_6;
$quarter3['subsequent_male_11_20_7']+=$subsequent_male_11_20_7;
$quarter3['subsequent_male_11_20_total']+=$subsequent_male_11_20_total;
$quarter3['subsequent_male_21_30_1']+=$subsequent_male_21_30_1;
$quarter3['subsequent_male_21_30_2']+=$subsequent_male_21_30_2;
$quarter3['subsequent_male_21_30_3']+=$subsequent_male_21_30_3;
$quarter3['subsequent_male_21_30_4']+=$subsequent_male_21_30_4;
$quarter3['subsequent_male_21_30_5']+=$subsequent_male_21_30_5;
$quarter3['subsequent_male_21_30_6']+=$subsequent_male_21_30_6;
$quarter3['subsequent_male_21_30_7']+=$subsequent_male_21_30_7;
$quarter3['subsequent_male_21_30_total']+=$subsequent_male_21_30_total;
$quarter3['subsequent_male_31_40_1']+=$subsequent_male_31_40_1;
$quarter3['subsequent_male_31_40_2']+=$subsequent_male_31_40_2;
$quarter3['subsequent_male_31_40_3']+=$subsequent_male_31_40_3;
$quarter3['subsequent_male_31_40_4']+=$subsequent_male_31_40_4;
$quarter3['subsequent_male_31_40_5']+=$subsequent_male_31_40_5;
$quarter3['subsequent_male_31_40_6']+=$subsequent_male_31_40_6;
$quarter3['subsequent_male_31_40_7']+=$subsequent_male_31_40_7;
$quarter3['subsequent_male_31_40_total']+=$subsequent_male_31_40_total;
$quarter3['subsequent_male_41_50_1']+=$subsequent_male_41_50_1;
$quarter3['subsequent_male_41_50_2']+=$subsequent_male_41_50_2;
$quarter3['subsequent_male_41_50_3']+=$subsequent_male_41_50_3;
$quarter3['subsequent_male_41_50_4']+=$subsequent_male_41_50_4;
$quarter3['subsequent_male_41_50_5']+=$subsequent_male_41_50_5;
$quarter3['subsequent_male_41_50_6']+=$subsequent_male_41_50_6;
$quarter3['subsequent_male_41_50_7']+=$subsequent_male_41_50_7;
$quarter3['subsequent_male_41_50_total']+=$subsequent_male_41_50_total;
$quarter3['subsequent_male_51_60_1']+=$subsequent_male_51_60_1;
$quarter3['subsequent_male_51_60_2']+=$subsequent_male_51_60_2;
$quarter3['subsequent_male_51_60_3']+=$subsequent_male_51_60_3;
$quarter3['subsequent_male_51_60_4']+=$subsequent_male_51_60_4;
$quarter3['subsequent_male_51_60_5']+=$subsequent_male_51_60_5;
$quarter3['subsequent_male_51_60_6']+=$subsequent_male_51_60_6;
$quarter3['subsequent_male_51_60_7']+=$subsequent_male_51_60_7;
$quarter3['subsequent_male_51_60_total']+=$subsequent_male_51_60_total;
$quarter3['subsequent_male_61_70_1']+=$subsequent_male_61_70_1;
$quarter3['subsequent_male_61_70_2']+=$subsequent_male_61_70_2;
$quarter3['subsequent_male_61_70_3']+=$subsequent_male_61_70_3;
$quarter3['subsequent_male_61_70_4']+=$subsequent_male_61_70_4;
$quarter3['subsequent_male_61_70_5']+=$subsequent_male_61_70_5;
$quarter3['subsequent_male_61_70_6']+=$subsequent_male_61_70_6;
$quarter3['subsequent_male_61_70_7']+=$subsequent_male_61_70_7;
$quarter3['subsequent_male_61_70_total']+=$subsequent_male_61_70_total;
$quarter3['subsequent_male_71_80_1']+=$subsequent_male_71_80_1;
$quarter3['subsequent_male_71_80_2']+=$subsequent_male_71_80_2;
$quarter3['subsequent_male_71_80_3']+=$subsequent_male_71_80_3;
$quarter3['subsequent_male_71_80_4']+=$subsequent_male_71_80_4;
$quarter3['subsequent_male_71_80_5']+=$subsequent_male_71_80_5;
$quarter3['subsequent_male_71_80_6']+=$subsequent_male_71_80_6;
$quarter3['subsequent_male_71_80_7']+=$subsequent_male_71_80_7;
$quarter3['subsequent_male_71_80_total']+=$subsequent_male_71_80_total;
$quarter3['subsequent_male_80_1']+=$subsequent_male_80_1;
$quarter3['subsequent_male_80_2']+=$subsequent_male_80_2;
$quarter3['subsequent_male_80_3']+=$subsequent_male_80_3;
$quarter3['subsequent_male_80_4']+=$subsequent_male_80_4;
$quarter3['subsequent_male_80_5']+=$subsequent_male_80_5;
$quarter3['subsequent_male_80_6']+=$subsequent_male_80_6;
$quarter3['subsequent_male_80_7']+=$subsequent_male_80_7;
$quarter3['subsequent_male_80_total']+=$subsequent_male_80_total;
$quarter3['subsequent_male_total_1']+=$subsequent_male_total_1;
$quarter3['subsequent_male_total_2']+=$subsequent_male_total_2;
$quarter3['subsequent_male_total_3']+=$subsequent_male_total_3;
$quarter3['subsequent_male_total_4']+=$subsequent_male_total_4;
$quarter3['subsequent_male_total_5']+=$subsequent_male_total_5;
$quarter3['subsequent_male_total_6']+=$subsequent_male_total_6;
$quarter3['subsequent_male_total_7']+=$subsequent_male_total_7;
$quarter3['total_num_lymphed']+=$total_num_lymphed;
$quarter3['total_num_hydro']+=$total_num_hydro;
$quarter3['mf_pos_patient']+=$mf_pos_patient;
$quarter3['opd_patient']+=$opd_patient;
$quarter3['female_0_10_1']+=$female_0_10_1;
$quarter3['female_0_10_2']+=$female_0_10_2;
$quarter3['female_0_10_3']+=$female_0_10_3;
$quarter3['female_0_10_4']+=$female_0_10_4;
$quarter3['female_0_10_5']+=$female_0_10_5;
$quarter3['female_0_10_6']+=$female_0_10_6;
$quarter3['female_0_10_7']+=$female_0_10_7;
$quarter3['female_0_10_total']+=$female_0_10_total;
$quarter3['female_11_20_1']+=$female_11_20_1;
$quarter3['female_11_20_2']+=$female_11_20_2;
$quarter3['female_11_20_3']+=$female_11_20_3;
$quarter3['female_11_20_4']+=$female_11_20_4;
$quarter3['female_11_20_5']+=$female_11_20_5;
$quarter3['female_11_20_6']+=$female_11_20_6;
$quarter3['female_11_20_7']+=$female_11_20_7;
$quarter3['female_11_20_total']+=$female_11_20_total;
$quarter3['female_21_30_1']+=$female_21_30_1;
$quarter3['female_21_30_2']+=$female_21_30_2;
$quarter3['female_21_30_3']+=$female_21_30_3;
$quarter3['female_21_30_4']+=$female_21_30_4;
$quarter3['female_21_30_5']+=$female_21_30_5;
$quarter3['female_21_30_6']+=$female_21_30_6;
$quarter3['female_21_30_7']+=$female_21_30_7;
$quarter3['female_21_30_total']+=$female_21_30_total;
$quarter3['female_31_40_1']+=$female_31_40_1;
$quarter3['female_31_40_2']+=$female_31_40_2;
$quarter3['female_31_40_3']+=$female_31_40_3;
$quarter3['female_31_40_4']+=$female_31_40_4;
$quarter3['female_31_40_5']+=$female_31_40_5;
$quarter3['female_31_40_6']+=$female_31_40_6;
$quarter3['female_31_40_7']+=$female_31_40_7;
$quarter3['female_31_40_total']+=$female_31_40_total;
$quarter3['female_41_50_1']+=$female_41_50_1;
$quarter3['female_41_50_2']+=$female_41_50_2;
$quarter3['female_41_50_3']+=$female_41_50_3;
$quarter3['female_41_50_4']+=$female_41_50_4;
$quarter3['female_41_50_5']+=$female_41_50_5;
$quarter3['female_41_50_6']+=$female_41_50_6;
$quarter3['female_41_50_7']+=$female_41_50_7;
$quarter3['female_41_50_total']+=$female_41_50_total;
$quarter3['female_51_60_1']+=$female_51_60_1;
$quarter3['female_51_60_2']+=$female_51_60_2;
$quarter3['female_51_60_3']+=$female_51_60_3;
$quarter3['female_51_60_4']+=$female_51_60_4;
$quarter3['female_51_60_5']+=$female_51_60_5;
$quarter3['female_51_60_6']+=$female_51_60_6;
$quarter3['female_51_60_7']+=$female_51_60_7;
$quarter3['female_51_60_total']+=$female_51_60_total;
$quarter3['female_61_70_1']+=$female_61_70_1;
$quarter3['female_61_70_2']+=$female_61_70_2;
$quarter3['female_61_70_3']+=$female_61_70_3;
$quarter3['female_61_70_4']+=$female_61_70_4;
$quarter3['female_61_70_5']+=$female_61_70_5;
$quarter3['female_61_70_6']+=$female_61_70_6;
$quarter3['female_61_70_7']+=$female_61_70_7;
$quarter3['female_61_70_total']+=$female_61_70_total;
$quarter3['female_71_80_1']+=$female_71_80_1;
$quarter3['female_71_80_2']+=$female_71_80_2;
$quarter3['female_71_80_3']+=$female_71_80_3;
$quarter3['female_71_80_4']+=$female_71_80_4;
$quarter3['female_71_80_5']+=$female_71_80_5;
$quarter3['female_71_80_6']+=$female_71_80_6;
$quarter3['female_71_80_7']+=$female_71_80_7;
$quarter3['female_71_80_total']+=$female_71_80_total;
$quarter3['female_80_1']+=$female_80_1;
$quarter3['female_80_2']+=$female_80_2;
$quarter3['female_80_3']+=$female_80_3;
$quarter3['female_80_4']+=$female_80_4;
$quarter3['female_80_5']+=$female_80_5;
$quarter3['female_80_6']+=$female_80_6;
$quarter3['female_80_7']+=$female_80_7;
$quarter3['female_80_total']+=$female_80_total;
$quarter3['female_total_1']+=$female_total_1;
$quarter3['female_total_2']+=$female_total_2;
$quarter3['female_total_3']+=$female_total_3;
$quarter3['female_total_4']+=$female_total_4;
$quarter3['female_total_5']+=$female_total_5;
$quarter3['female_total_6']+=$female_total_6;
$quarter3['female_total_7']+=$female_total_7;
$quarter3['subsequent_female_0_10_1']+=$subsequent_female_0_10_1;
$quarter3['subsequent_female_0_10_2']+=$subsequent_female_0_10_2;
$quarter3['subsequent_female_0_10_3']+=$subsequent_female_0_10_3;
$quarter3['subsequent_female_0_10_4']+=$subsequent_female_0_10_4;
$quarter3['subsequent_female_0_10_5']+=$subsequent_female_0_10_5;
$quarter3['subsequent_female_0_10_6']+=$subsequent_female_0_10_6;
$quarter3['subsequent_female_0_10_7']+=$subsequent_female_0_10_7;
$quarter3['subsequent_female_0_10_total']+=$subsequent_female_0_10_total;
$quarter3['subsequent_female_11_20_1']+=$subsequent_female_11_20_1;
$quarter3['subsequent_female_11_20_2']+=$subsequent_female_11_20_2;
$quarter3['subsequent_female_11_20_3']+=$subsequent_female_11_20_3;
$quarter3['subsequent_female_11_20_4']+=$subsequent_female_11_20_4;
$quarter3['subsequent_female_11_20_5']+=$subsequent_female_11_20_5;
$quarter3['subsequent_female_11_20_6']+=$subsequent_female_11_20_6;
$quarter3['subsequent_female_11_20_7']+=$subsequent_female_11_20_7;
$quarter3['subsequent_female_11_20_total']+=$subsequent_female_11_20_total;
$quarter3['subsequent_female_21_30_1']+=$subsequent_female_21_30_1;
$quarter3['subsequent_female_21_30_2']+=$subsequent_female_21_30_2;
$quarter3['subsequent_female_21_30_3']+=$subsequent_female_21_30_3;
$quarter3['subsequent_female_21_30_4']+=$subsequent_female_21_30_4;
$quarter3['subsequent_female_21_30_5']+=$subsequent_female_21_30_5;
$quarter3['subsequent_female_21_30_6']+=$subsequent_female_21_30_6;
$quarter3['subsequent_female_21_30_7']+=$subsequent_female_21_30_7;
$quarter3['subsequent_female_21_30_total']+=$subsequent_female_21_30_total;
$quarter3['subsequent_female_31_40_1']+=$subsequent_female_31_40_1;
$quarter3['subsequent_female_31_40_2']+=$subsequent_female_31_40_2;
$quarter3['subsequent_female_31_40_3']+=$subsequent_female_31_40_3;
$quarter3['subsequent_female_31_40_4']+=$subsequent_female_31_40_4;
$quarter3['subsequent_female_31_40_5']+=$subsequent_female_31_40_5;
$quarter3['subsequent_female_31_40_6']+=$subsequent_female_31_40_6;
$quarter3['subsequent_female_31_40_7']+=$subsequent_female_31_40_7;
$quarter3['subsequent_female_31_40_total']+=$subsequent_female_31_40_total;
$quarter3['subsequent_female_41_50_1']+=$subsequent_female_41_50_1;
$quarter3['subsequent_female_41_50_2']+=$subsequent_female_41_50_2;
$quarter3['subsequent_female_41_50_3']+=$subsequent_female_41_50_3;
$quarter3['subsequent_female_41_50_4']+=$subsequent_female_41_50_4;
$quarter3['subsequent_female_41_50_5']+=$subsequent_female_41_50_5;
$quarter3['subsequent_female_41_50_6']+=$subsequent_female_41_50_6;
$quarter3['subsequent_female_41_50_7']+=$subsequent_female_41_50_7;
$quarter3['subsequent_female_41_50_total']+=$subsequent_female_41_50_total;
$quarter3['subsequent_female_51_60_1']+=$subsequent_female_51_60_1;
$quarter3['subsequent_female_51_60_2']+=$subsequent_female_51_60_2;
$quarter3['subsequent_female_51_60_3']+=$subsequent_female_51_60_3;
$quarter3['subsequent_female_51_60_4']+=$subsequent_female_51_60_4;
$quarter3['subsequent_female_51_60_5']+=$subsequent_female_51_60_5;
$quarter3['subsequent_female_51_60_6']+=$subsequent_female_51_60_6;
$quarter3['subsequent_female_51_60_7']+=$subsequent_female_51_60_7;
$quarter3['subsequent_female_51_60_total']+=$subsequent_female_51_60_total;
$quarter3['subsequent_female_61_70_1']+=$subsequent_female_61_70_1;
$quarter3['subsequent_female_61_70_2']+=$subsequent_female_61_70_2;
$quarter3['subsequent_female_61_70_3']+=$subsequent_female_61_70_3;
$quarter3['subsequent_female_61_70_4']+=$subsequent_female_61_70_4;
$quarter3['subsequent_female_61_70_5']+=$subsequent_female_61_70_5;
$quarter3['subsequent_female_61_70_6']+=$subsequent_female_61_70_6;
$quarter3['subsequent_female_61_70_7']+=$subsequent_female_61_70_7;
$quarter3['subsequent_female_61_70_total']+=$subsequent_female_61_70_total;
$quarter3['subsequent_female_71_80_1']+=$subsequent_female_71_80_1;
$quarter3['subsequent_female_71_80_2']+=$subsequent_female_71_80_2;
$quarter3['subsequent_female_71_80_3']+=$subsequent_female_71_80_3;
$quarter3['subsequent_female_71_80_4']+=$subsequent_female_71_80_4;
$quarter3['subsequent_female_71_80_5']+=$subsequent_female_71_80_5;
$quarter3['subsequent_female_71_80_6']+=$subsequent_female_71_80_6;
$quarter3['subsequent_female_71_80_7']+=$subsequent_female_71_80_7;
$quarter3['subsequent_female_71_80_total']+=$subsequent_female_71_80_total;
$quarter3['subsequent_female_81_1']+=$subsequent_female_81_1;
$quarter3['subsequent_female_81_2']+=$subsequent_female_81_2;
$quarter3['subsequent_female_81_3']+=$subsequent_female_81_3;
$quarter3['subsequent_female_81_4']+=$subsequent_female_81_4;
$quarter3['subsequent_female_81_5']+=$subsequent_female_81_5;
$quarter3['subsequent_female_81_6']+=$subsequent_female_81_6;
$quarter3['subsequent_female_81_7']+=$subsequent_female_81_7;
$quarter3['subsequent_female_81_total']+=$subsequent_female_81_total;
$quarter3['subsequent_female_total_1']+=$subsequent_female_total_1;
$quarter3['subsequent_female_total_2']+=$subsequent_female_total_2;
$quarter3['subsequent_female_total_3']+=$subsequent_female_total_3;
$quarter3['subsequent_female_total_4']+=$subsequent_female_total_4;
$quarter3['subsequent_female_total_5']+=$subsequent_female_total_5;
$quarter3['subsequent_female_total_6']+=$subsequent_female_total_6;
$quarter3['subsequent_female_total_7']+=$subsequent_female_total_7;
$quarter3['male_total_total']+=$male_total_total;
$quarter3['subsequent_male_total_total']+=$subsequent_male_total_total;
$quarter3['female_total_total']+=$female_total_total;
$quarter3['subsequent_female_total_total']+=$subsequent_female_total_total;
                        break;
                    case "October":
                    case "November":
                    case "Desember":

$quarter4['female_0_10_1'] += $female_0_10_1;
$quarter4['male_0_10_1']+=$male_0_10_1;
$quarter4['male_0_10_2']+=$male_0_10_2;
$quarter4['male_0_10_3']+=$male_0_10_3;
$quarter4['male_0_10_4']+=$male_0_10_4;
$quarter4['male_0_10_5']+=$male_0_10_5;
$quarter4['male_0_10_6']+=$male_0_10_6;
$quarter4['male_0_10_7']+=$male_0_10_7;
$quarter4['male_0_10_total']+=$male_0_10_total;
$quarter4['male_11_20_1']+=$male_11_20_1;
$quarter4['male_11_20_2']+=$male_11_20_2;
$quarter4['male_11_20_3']+=$male_11_20_3;
$quarter4['male_11_20_4']+=$male_11_20_4;
$quarter4['male_11_20_5']+=$male_11_20_5;
$quarter4['male_11_20_6']+=$male_11_20_6;
$quarter4['male_11_20_7']+=$male_11_20_7;
$quarter4['male_11_20_total']+=$male_11_20_total;
$quarter4['male_21_30_1']+=$male_21_30_1;
$quarter4['male_21_30_2']+=$male_21_30_2;
$quarter4['male_21_30_3']+=$male_21_30_3;
$quarter4['male_21_30_4']+=$male_21_30_4;
$quarter4['male_21_30_5']+=$male_21_30_5;
$quarter4['male_21_30_6']+=$male_21_30_6;
$quarter4['male_21_30_7']+=$male_21_30_7;
$quarter4['male_21_30_total']+=$male_21_30_total;
$quarter4['male_31_40_1']+=$male_31_40_1;
$quarter4['male_31_40_2']+=$male_31_40_2;
$quarter4['male_31_40_3']+=$male_31_40_3;
$quarter4['male_31_40_4']+=$male_31_40_4;
$quarter4['male_31_40_5']+=$male_31_40_5;
$quarter4['male_31_40_6']+=$male_31_40_6;
$quarter4['male_31_40_7']+=$male_31_40_7;
$quarter4['male_31_40_total']+=$male_31_40_total;
$quarter4['male_41_50_1']+=$male_41_50_1;
$quarter4['male_41_50_2']+=$male_41_50_2;
$quarter4['male_41_50_3']+=$male_41_50_3;
$quarter4['male_41_50_4']+=$male_41_50_4;
$quarter4['male_41_50_5']+=$male_41_50_5;
$quarter4['male_41_50_6']+=$male_41_50_6;
$quarter4['male_41_50_7']+=$male_41_50_7;
$quarter4['male_41_50_total']+=$male_41_50_total;
$quarter4['male_51_60_1']+=$male_51_60_1;
$quarter4['male_51_60_2']+=$male_51_60_2;
$quarter4['male_51_60_3']+=$male_51_60_3;
$quarter4['male_51_60_4']+=$male_51_60_4;
$quarter4['male_51_60_5']+=$male_51_60_5;
$quarter4['male_51_60_6']+=$male_51_60_6;
$quarter4['male_51_60_7']+=$male_51_60_7;
$quarter4['male_51_60_total']+=$male_51_60_total;
$quarter4['male_61_70_1']+=$male_61_70_1;
$quarter4['male_61_70_2']+=$male_61_70_2;
$quarter4['male_61_70_3']+=$male_61_70_3;
$quarter4['male_61_70_4']+=$male_61_70_4;
$quarter4['male_61_70_5']+=$male_61_70_5;
$quarter4['male_61_70_6']+=$male_61_70_6;
$quarter4['male_61_70_7']+=$male_61_70_7;
$quarter4['male_61_70_total']+=$male_61_70_total;
$quarter4['male_71_80_1']+=$male_71_80_1;
$quarter4['male_71_80_2']+=$male_71_80_2;
$quarter4['male_71_80_3']+=$male_71_80_3;
$quarter4['male_71_80_4']+=$male_71_80_4;
$quarter4['male_71_80_5']+=$male_71_80_5;
$quarter4['male_71_80_6']+=$male_71_80_6;
$quarter4['male_71_80_7']+=$male_71_80_7;
$quarter4['male_71_80_total']+=$male_71_80_total;
$quarter4['male_81_1']+=$male_81_1;
$quarter4['male_81_2']+=$male_81_2;
$quarter4['male_81_3']+=$male_81_3;
$quarter4['male_81_4']+=$male_81_4;
$quarter4['male_81_5']+=$male_81_5;
$quarter4['male_81_6']+=$male_81_6;
$quarter4['male_81_7']+=$male_81_7;
$quarter4['male_81_total']+=$male_81_total;
$quarter4['male_total_1']+=$male_total_1;
$quarter4['male_total_2']+=$male_total_2;
$quarter4['male_total_3']+=$male_total_3;
$quarter4['male_total_4']+=$male_total_4;
$quarter4['male_total_5']+=$male_total_5;
$quarter4['male_total_6']+=$male_total_6;
$quarter4['male_total_7']+=$male_total_7;
$quarter4['subsequent_male_0_10_1']+=$subsequent_male_0_10_1;
$quarter4['subsequent_male_0_10_2']+=$subsequent_male_0_10_2;
$quarter4['subsequent_male_0_10_3']+=$subsequent_male_0_10_3;
$quarter4['subsequent_male_0_10_4']+=$subsequent_male_0_10_4;
$quarter4['subsequent_male_0_10_5']+=$subsequent_male_0_10_5;
$quarter4['subsequent_male_0_10_6']+=$subsequent_male_0_10_6;
$quarter4['subsequent_male_0_10_7']+=$subsequent_male_0_10_7;
$quarter4['subsequent_male_0_10_total']+=$subsequent_male_0_10_total;
$quarter4['subsequent_male_11_20_1']+=$subsequent_male_11_20_1;
$quarter4['subsequent_male_11_20_2']+=$subsequent_male_11_20_2;
$quarter4['subsequent_male_11_20_3']+=$subsequent_male_11_20_3;
$quarter4['subsequent_male_11_20_4']+=$subsequent_male_11_20_4;
$quarter4['subsequent_male_11_20_5']+=$subsequent_male_11_20_5;
$quarter4['subsequent_male_11_20_6']+=$subsequent_male_11_20_6;
$quarter4['subsequent_male_11_20_7']+=$subsequent_male_11_20_7;
$quarter4['subsequent_male_11_20_total']+=$subsequent_male_11_20_total;
$quarter4['subsequent_male_21_30_1']+=$subsequent_male_21_30_1;
$quarter4['subsequent_male_21_30_2']+=$subsequent_male_21_30_2;
$quarter4['subsequent_male_21_30_3']+=$subsequent_male_21_30_3;
$quarter4['subsequent_male_21_30_4']+=$subsequent_male_21_30_4;
$quarter4['subsequent_male_21_30_5']+=$subsequent_male_21_30_5;
$quarter4['subsequent_male_21_30_6']+=$subsequent_male_21_30_6;
$quarter4['subsequent_male_21_30_7']+=$subsequent_male_21_30_7;
$quarter4['subsequent_male_21_30_total']+=$subsequent_male_21_30_total;
$quarter4['subsequent_male_31_40_1']+=$subsequent_male_31_40_1;
$quarter4['subsequent_male_31_40_2']+=$subsequent_male_31_40_2;
$quarter4['subsequent_male_31_40_3']+=$subsequent_male_31_40_3;
$quarter4['subsequent_male_31_40_4']+=$subsequent_male_31_40_4;
$quarter4['subsequent_male_31_40_5']+=$subsequent_male_31_40_5;
$quarter4['subsequent_male_31_40_6']+=$subsequent_male_31_40_6;
$quarter4['subsequent_male_31_40_7']+=$subsequent_male_31_40_7;
$quarter4['subsequent_male_31_40_total']+=$subsequent_male_31_40_total;
$quarter4['subsequent_male_41_50_1']+=$subsequent_male_41_50_1;
$quarter4['subsequent_male_41_50_2']+=$subsequent_male_41_50_2;
$quarter4['subsequent_male_41_50_3']+=$subsequent_male_41_50_3;
$quarter4['subsequent_male_41_50_4']+=$subsequent_male_41_50_4;
$quarter4['subsequent_male_41_50_5']+=$subsequent_male_41_50_5;
$quarter4['subsequent_male_41_50_6']+=$subsequent_male_41_50_6;
$quarter4['subsequent_male_41_50_7']+=$subsequent_male_41_50_7;
$quarter4['subsequent_male_41_50_total']+=$subsequent_male_41_50_total;
$quarter4['subsequent_male_51_60_1']+=$subsequent_male_51_60_1;
$quarter4['subsequent_male_51_60_2']+=$subsequent_male_51_60_2;
$quarter4['subsequent_male_51_60_3']+=$subsequent_male_51_60_3;
$quarter4['subsequent_male_51_60_4']+=$subsequent_male_51_60_4;
$quarter4['subsequent_male_51_60_5']+=$subsequent_male_51_60_5;
$quarter4['subsequent_male_51_60_6']+=$subsequent_male_51_60_6;
$quarter4['subsequent_male_51_60_7']+=$subsequent_male_51_60_7;
$quarter4['subsequent_male_51_60_total']+=$subsequent_male_51_60_total;
$quarter4['subsequent_male_61_70_1']+=$subsequent_male_61_70_1;
$quarter4['subsequent_male_61_70_2']+=$subsequent_male_61_70_2;
$quarter4['subsequent_male_61_70_3']+=$subsequent_male_61_70_3;
$quarter4['subsequent_male_61_70_4']+=$subsequent_male_61_70_4;
$quarter4['subsequent_male_61_70_5']+=$subsequent_male_61_70_5;
$quarter4['subsequent_male_61_70_6']+=$subsequent_male_61_70_6;
$quarter4['subsequent_male_61_70_7']+=$subsequent_male_61_70_7;
$quarter4['subsequent_male_61_70_total']+=$subsequent_male_61_70_total;
$quarter4['subsequent_male_71_80_1']+=$subsequent_male_71_80_1;
$quarter4['subsequent_male_71_80_2']+=$subsequent_male_71_80_2;
$quarter4['subsequent_male_71_80_3']+=$subsequent_male_71_80_3;
$quarter4['subsequent_male_71_80_4']+=$subsequent_male_71_80_4;
$quarter4['subsequent_male_71_80_5']+=$subsequent_male_71_80_5;
$quarter4['subsequent_male_71_80_6']+=$subsequent_male_71_80_6;
$quarter4['subsequent_male_71_80_7']+=$subsequent_male_71_80_7;
$quarter4['subsequent_male_71_80_total']+=$subsequent_male_71_80_total;
$quarter4['subsequent_male_80_1']+=$subsequent_male_80_1;
$quarter4['subsequent_male_80_2']+=$subsequent_male_80_2;
$quarter4['subsequent_male_80_3']+=$subsequent_male_80_3;
$quarter4['subsequent_male_80_4']+=$subsequent_male_80_4;
$quarter4['subsequent_male_80_5']+=$subsequent_male_80_5;
$quarter4['subsequent_male_80_6']+=$subsequent_male_80_6;
$quarter4['subsequent_male_80_7']+=$subsequent_male_80_7; 
$quarter4['subsequent_male_80_total']+=$subsequent_male_80_total;
$quarter4['subsequent_male_total_1']+=$subsequent_male_total_1;
$quarter4['subsequent_male_total_2']+=$subsequent_male_total_2;
$quarter4['subsequent_male_total_3']+=$subsequent_male_total_3;
$quarter4['subsequent_male_total_4']+=$subsequent_male_total_4;
$quarter4['subsequent_male_total_5']+=$subsequent_male_total_5;
$quarter4['subsequent_male_total_6']+=$subsequent_male_total_6;
$quarter4['subsequent_male_total_7']+=$subsequent_male_total_7;
$quarter4['total_num_lymphed']+=$total_num_lymphed;
$quarter4['total_num_hydro']+=$total_num_hydro;
$quarter4['mf_pos_patient']+=$mf_pos_patient;
$quarter4['opd_patient']+=$opd_patient;
$quarter4['female_0_10_1']+=$female_0_10_1;
$quarter4['female_0_10_2']+=$female_0_10_2;
$quarter4['female_0_10_3']+=$female_0_10_3;
$quarter4['female_0_10_4']+=$female_0_10_4;
$quarter4['female_0_10_5']+=$female_0_10_5;
$quarter4['female_0_10_6']+=$female_0_10_6;
$quarter4['female_0_10_7']+=$female_0_10_7;
$quarter4['female_0_10_total']+=$female_0_10_total;
$quarter4['female_11_20_1']+=$female_11_20_1;
$quarter4['female_11_20_2']+=$female_11_20_2;
$quarter4['female_11_20_3']+=$female_11_20_3;
$quarter4['female_11_20_4']+=$female_11_20_4;
$quarter4['female_11_20_5']+=$female_11_20_5;
$quarter4['female_11_20_6']+=$female_11_20_6;
$quarter4['female_11_20_7']+=$female_11_20_7;
$quarter4['female_11_20_total']+=$female_11_20_total;
$quarter4['female_21_30_1']+=$female_21_30_1;
$quarter4['female_21_30_2']+=$female_21_30_2;
$quarter4['female_21_30_3']+=$female_21_30_3;
$quarter4['female_21_30_4']+=$female_21_30_4;
$quarter4['female_21_30_5']+=$female_21_30_5;
$quarter4['female_21_30_6']+=$female_21_30_6;
$quarter4['female_21_30_7']+=$female_21_30_7;
$quarter4['female_21_30_total']+=$female_21_30_total;
$quarter4['female_31_40_1']+=$female_31_40_1;
$quarter4['female_31_40_2']+=$female_31_40_2;
$quarter4['female_31_40_3']+=$female_31_40_3;
$quarter4['female_31_40_4']+=$female_31_40_4;
$quarter4['female_31_40_5']+=$female_31_40_5;
$quarter4['female_31_40_6']+=$female_31_40_6;
$quarter4['female_31_40_7']+=$female_31_40_7;
$quarter4['female_31_40_total']+=$female_31_40_total;
$quarter4['female_41_50_1']+=$female_41_50_1;
$quarter4['female_41_50_2']+=$female_41_50_2;
$quarter4['female_41_50_3']+=$female_41_50_3;
$quarter4['female_41_50_4']+=$female_41_50_4;
$quarter4['female_41_50_5']+=$female_41_50_5;
$quarter4['female_41_50_6']+=$female_41_50_6;
$quarter4['female_41_50_7']+=$female_41_50_7;
$quarter4['female_41_50_total']+=$female_41_50_total;
$quarter4['female_51_60_1']+=$female_51_60_1;
$quarter4['female_51_60_2']+=$female_51_60_2;
$quarter4['female_51_60_3']+=$female_51_60_3;
$quarter4['female_51_60_4']+=$female_51_60_4;
$quarter4['female_51_60_5']+=$female_51_60_5;
$quarter4['female_51_60_6']+=$female_51_60_6;
$quarter4['female_51_60_7']+=$female_51_60_7;
$quarter4['female_51_60_total']+=$female_51_60_total;
$quarter4['female_61_70_1']+=$female_61_70_1;
$quarter4['female_61_70_2']+=$female_61_70_2;
$quarter4['female_61_70_3']+=$female_61_70_3;
$quarter4['female_61_70_4']+=$female_61_70_4;
$quarter4['female_61_70_5']+=$female_61_70_5;
$quarter4['female_61_70_6']+=$female_61_70_6;
$quarter4['female_61_70_7']+=$female_61_70_7;
$quarter4['female_61_70_total']+=$female_61_70_total;
$quarter4['female_71_80_1']+=$female_71_80_1;
$quarter4['female_71_80_2']+=$female_71_80_2;
$quarter4['female_71_80_3']+=$female_71_80_3;
$quarter4['female_71_80_4']+=$female_71_80_4;
$quarter4['female_71_80_5']+=$female_71_80_5;
$quarter4['female_71_80_6']+=$female_71_80_6;
$quarter4['female_71_80_7']+=$female_71_80_7;
$quarter4['female_71_80_total']+=$female_71_80_total;
$quarter4['female_80_1']+=$female_80_1;
$quarter4['female_80_2']+=$female_80_2;
$quarter4['female_80_3']+=$female_80_3;
$quarter4['female_80_4']+=$female_80_4;
$quarter4['female_80_5']+=$female_80_5;
$quarter4['female_80_6']+=$female_80_6;
$quarter4['female_80_7']+=$female_80_7;
$quarter4['female_80_total']+=$female_80_total;
$quarter4['female_total_1']+=$female_total_1;
$quarter4['female_total_2']+=$female_total_2;
$quarter4['female_total_3']+=$female_total_3;
$quarter4['female_total_4']+=$female_total_4;
$quarter4['female_total_5']+=$female_total_5;
$quarter4['female_total_6']+=$female_total_6;
$quarter4['female_total_7']+=$female_total_7;
$quarter4['subsequent_female_0_10_1']+=$subsequent_female_0_10_1;
$quarter4['subsequent_female_0_10_2']+=$subsequent_female_0_10_2;
$quarter4['subsequent_female_0_10_3']+=$subsequent_female_0_10_3;
$quarter4['subsequent_female_0_10_4']+=$subsequent_female_0_10_4;
$quarter4['subsequent_female_0_10_5']+=$subsequent_female_0_10_5;
$quarter4['subsequent_female_0_10_6']+=$subsequent_female_0_10_6;
$quarter4['subsequent_female_0_10_7']+=$subsequent_female_0_10_7;
$quarter4['subsequent_female_0_10_total']+=$subsequent_female_0_10_total;
$quarter4['subsequent_female_11_20_1']+=$subsequent_female_11_20_1;
$quarter4['subsequent_female_11_20_2']+=$subsequent_female_11_20_2;
$quarter4['subsequent_female_11_20_3']+=$subsequent_female_11_20_3;
$quarter4['subsequent_female_11_20_4']+=$subsequent_female_11_20_4;
$quarter4['subsequent_female_11_20_5']+=$subsequent_female_11_20_5;
$quarter4['subsequent_female_11_20_6']+=$subsequent_female_11_20_6;
$quarter4['subsequent_female_11_20_7']+=$subsequent_female_11_20_7;
$quarter4['subsequent_female_11_20_total']+=$subsequent_female_11_20_total;
$quarter4['subsequent_female_21_30_1']+=$subsequent_female_21_30_1;
$quarter4['subsequent_female_21_30_2']+=$subsequent_female_21_30_2;
$quarter4['subsequent_female_21_30_3']+=$subsequent_female_21_30_3;
$quarter4['subsequent_female_21_30_4']+=$subsequent_female_21_30_4;
$quarter4['subsequent_female_21_30_5']+=$subsequent_female_21_30_5;
$quarter4['subsequent_female_21_30_6']+=$subsequent_female_21_30_6;
$quarter4['subsequent_female_21_30_7']+=$subsequent_female_21_30_7;
$quarter4['subsequent_female_21_30_total']+=$subsequent_female_21_30_total;
$quarter4['subsequent_female_31_40_1']+=$subsequent_female_31_40_1;
$quarter4['subsequent_female_31_40_2']+=$subsequent_female_31_40_2;
$quarter4['subsequent_female_31_40_3']+=$subsequent_female_31_40_3;
$quarter4['subsequent_female_31_40_4']+=$subsequent_female_31_40_4;
$quarter4['subsequent_female_31_40_5']+=$subsequent_female_31_40_5;
$quarter4['subsequent_female_31_40_6']+=$subsequent_female_31_40_6;
$quarter4['subsequent_female_31_40_7']+=$subsequent_female_31_40_7;
$quarter4['subsequent_female_31_40_total']+=$subsequent_female_31_40_total;
$quarter4['subsequent_female_41_50_1']+=$subsequent_female_41_50_1;
$quarter4['subsequent_female_41_50_2']+=$subsequent_female_41_50_2;
$quarter4['subsequent_female_41_50_3']+=$subsequent_female_41_50_3;
$quarter4['subsequent_female_41_50_4']+=$subsequent_female_41_50_4;
$quarter4['subsequent_female_41_50_5']+=$subsequent_female_41_50_5;
$quarter4['subsequent_female_41_50_6']+=$subsequent_female_41_50_6;
$quarter4['subsequent_female_41_50_7']+=$subsequent_female_41_50_7;
$quarter4['subsequent_female_41_50_total']+=$subsequent_female_41_50_total;
$quarter4['subsequent_female_51_60_1']+=$subsequent_female_51_60_1;
$quarter4['subsequent_female_51_60_2']+=$subsequent_female_51_60_2;
$quarter4['subsequent_female_51_60_3']+=$subsequent_female_51_60_3;
$quarter4['subsequent_female_51_60_4']+=$subsequent_female_51_60_4;
$quarter4['subsequent_female_51_60_5']+=$subsequent_female_51_60_5;
$quarter4['subsequent_female_51_60_6']+=$subsequent_female_51_60_6;
$quarter4['subsequent_female_51_60_7']+=$subsequent_female_51_60_7;
$quarter4['subsequent_female_51_60_total']+=$subsequent_female_51_60_total;
$quarter4['subsequent_female_61_70_1']+=$subsequent_female_61_70_1;
$quarter4['subsequent_female_61_70_2']+=$subsequent_female_61_70_2;
$quarter4['subsequent_female_61_70_3']+=$subsequent_female_61_70_3;
$quarter4['subsequent_female_61_70_4']+=$subsequent_female_61_70_4;
$quarter4['subsequent_female_61_70_5']+=$subsequent_female_61_70_5;
$quarter4['subsequent_female_61_70_6']+=$subsequent_female_61_70_6;
$quarter4['subsequent_female_61_70_7']+=$subsequent_female_61_70_7;
$quarter4['subsequent_female_61_70_total']+=$subsequent_female_61_70_total;
$quarter4['subsequent_female_71_80_1']+=$subsequent_female_71_80_1;
$quarter4['subsequent_female_71_80_2']+=$subsequent_female_71_80_2;
$quarter4['subsequent_female_71_80_3']+=$subsequent_female_71_80_3;
$quarter4['subsequent_female_71_80_4']+=$subsequent_female_71_80_4;
$quarter4['subsequent_female_71_80_5']+=$subsequent_female_71_80_5;
$quarter4['subsequent_female_71_80_6']+=$subsequent_female_71_80_6;
$quarter4['subsequent_female_71_80_7']+=$subsequent_female_71_80_7;
$quarter4['subsequent_female_71_80_total']+=$subsequent_female_71_80_total;
$quarter4['subsequent_female_81_1']+=$subsequent_female_81_1;
$quarter4['subsequent_female_81_2']+=$subsequent_female_81_2;
$quarter4['subsequent_female_81_3']+=$subsequent_female_81_3;
$quarter4['subsequent_female_81_4']+=$subsequent_female_81_4;
$quarter4['subsequent_female_81_5']+=$subsequent_female_81_5;
$quarter4['subsequent_female_81_6']+=$subsequent_female_81_6;
$quarter4['subsequent_female_81_7']+=$subsequent_female_81_7;
$quarter4['subsequent_female_81_total']+=$subsequent_female_81_total;
$quarter4['subsequent_female_total_1']+=$subsequent_female_total_1;
$quarter4['subsequent_female_total_2']+=$subsequent_female_total_2;
$quarter4['subsequent_female_total_3']+=$subsequent_female_total_3;
$quarter4['subsequent_female_total_4']+=$subsequent_female_total_4;
$quarter4['subsequent_female_total_5']+=$subsequent_female_total_5;
$quarter4['subsequent_female_total_6']+=$subsequent_female_total_6;
$quarter4['subsequent_female_total_7']+=$subsequent_female_total_7;


$quarter4['male_total_total']+=$male_total_total;
$quarter4['subsequent_male_total_total']+=$subsequent_male_total_total;
$quarter4['female_total_total']+=$female_total_total;
$quarter4['subsequent_female_total_7']+=$subsequent_female_total_7;


// <th rowspan="5">'. $month. '</th>
                        break;
                }
  if ($select == "monthly"  ) {
                $monthlyy ='
            <tr> 
                <th style="background-color: #e9f7ad;">0 - 10</th>
                <th>'.$male_0_10_1. '</th>
                <th>'.$male_0_10_2. '</th>
                <th>'.$male_0_10_3. '</th>
                <th>'.$male_0_10_4. '</th>
                <th>'.$male_0_10_5. '</th>
                <th>'.$male_0_10_6. '</th>
                <th>'.$male_0_10_7. '</th>
                <th    style="background-color: #ffe500;">'.$male_0_10_total.'</th>
                <th>'.$female_0_10_1. '</th>
                <th>'.$female_0_10_2. '</th>
                <th>'.$female_0_10_3. '</th>
                <th>'.$female_0_10_4. '</th>
                <th>'.$female_0_10_5. '</th>
                <th>'.$female_0_10_6. '</th>
                <th>'.$female_0_10_7. '</th>
                <th    style="background-color: #ffe500;" >'.$female_0_10_total.'</th>
         </tr>


          <tr>
       
       
                <th style="background-color: #e9f7ad;">11-20</th>
                <th>'.$male_11_20_1. '</th>
                <th>'.$male_11_20_2. '</th>
                <th>'.$male_11_20_3. '</th>
                <th>'.$male_11_20_4. '</th>
                <th>'.$male_11_20_5. '</th>
                <th>'.$male_11_20_6. '</th>
                <th>'.$male_11_20_7. '</th>
                <th style="background-color: #ffe500;">'.$male_11_20_total. '</th>

                <th>'.$female_11_20_1. '</th>
                <th>'.$female_11_20_2. '</th>
                <th>'.$female_11_20_3. '</th>
                <th>'.$female_11_20_4. '</th>
                <th>'.$female_11_20_5. '</th>
                <th>'.$female_11_20_6. '</th>
                <th>'.$female_11_20_7. '</th>
                <th    style="background-color: #ffe500;">'.$female_11_20_total.'</th>
         </tr>


          <tr>

                <th style="background-color: #e9f7ad;">21-30</th>
                <th>'.$male_21_30_1. '</th>
                <th>'.$male_21_30_2. '</th>
                <th>'.$male_21_30_3. '</th>
                <th>'.$male_21_30_4. '</th>
                <th>'.$male_21_30_5. '</th>
                <th>'.$male_21_30_6. '</th>
                <th>'.$male_21_30_7. '</th>
                <th    style="background-color: #ffe500;">'.$male_21_30_total. '</th>

                <th>'.$female_21_30_1. '</th>
                <th>'.$female_21_30_2. '</th>
                <th>'.$female_21_30_3. '</th>
                <th>'.$female_21_30_4. '</th>
                <th>'.$female_21_30_5. '</th>
                <th>'.$female_21_30_6. '</th>
                <th>'.$female_21_30_7. '</th>
                <th    style="background-color: #ffe500;">'.$female_21_30_total.'</th>
         </tr>
          <tr>
                <th style="background-color: #e9f7ad;">31-40</th>
                <th>'.$male_31_40_1. '</th>
                <th>'.$male_31_40_2. '</th>
                <th>'.$male_31_40_3. '</th>
                <th>'.$male_31_40_4. '</th>
                <th>'.$male_31_40_5. '</th>
                <th>'.$male_31_40_6. '</th>
                <th>'.$male_31_40_7. '</th>
                <th    style="background-color: #ffe500;">'.$male_31_40_total. '</th>

                <th>'.$female_31_40_1. '</th>
                <th>'.$female_31_40_2. '</th>
                <th>'.$female_31_40_3. '</th>
                <th>'.$female_31_40_4. '</th>
                <th>'.$female_31_40_5. '</th>
                <th>'.$female_31_40_6. '</th>
                <th>'.$female_31_40_7. '</th>
                <th    style="background-color: #ffe500;">'.$female_31_40_total.'</th>
         </tr>

          <tr>
                <th style="background-color: #e9f7ad;">41-50</th>
                <th>'.$male_41_50_1. '</th>
                <th>'.$male_41_50_2. '</th>
                <th>'.$male_41_50_3. '</th>
                <th>'.$male_41_50_4. '</th>
                <th>'.$male_41_50_5. '</th>
                <th>'.$male_41_50_6. '</th>
                <th>'.$male_41_50_7. '</th>
                <th    style="background-color: #ffe500;">'.$male_41_50_total. '</th>
                <th>'.$female_41_50_1. '</th>
                <th>'.$female_41_50_2. '</th>
                <th>'.$female_41_50_3. '</th>
                <th>'.$female_41_50_4. '</th>
                <th>'.$female_41_50_5. '</th>
                <th>'.$female_41_50_6. '</th>
                <th>'.$female_41_50_7. '</th>
                <th    style="background-color: #ffe500;">'.$female_41_50_total.'</th>
         </tr>



          <tr>
                <th style="background-color: #e9f7ad;">51-60</th>
                <th>'.$male_51_60_1. '</th>
                <th>'.$male_51_60_2. '</th>
                <th>'.$male_51_60_3. '</th>
                <th>'.$male_51_60_4. '</th>
                <th>'.$male_51_60_5. '</th>
                <th>'.$male_51_60_6. '</th>
                <th>'.$male_51_60_7. '</th>
                <th    style="background-color: #ffe500;">'.$male_51_60_total. '</th>
                <th>'.$female_51_60_1. '</th>
                <th>'.$female_51_60_2. '</th>
                <th>'.$female_51_60_3. '</th>
                <th>'.$female_51_60_4. '</th>
                <th>'.$female_51_60_5. '</th>
                <th>'.$female_51_60_6. '</th>
                <th>'.$female_51_60_7. '</th>
                <th    style="background-color: #ffe500;">'.$female_51_60_total.'</th>
         </tr>


          <tr>
                <th style="background-color: #e9f7ad;">61-70</th>
                <th>'.$male_61_70_1. '</th>
                <th>'.$male_61_70_2. '</th>
                <th>'.$male_61_70_3. '</th>
                <th>'.$male_61_70_4. '</th>
                <th>'.$male_61_70_5. '</th>
                <th>'.$male_61_70_6. '</th>
                <th>'.$male_61_70_7. '</th>
                <th    style="background-color: #ffe500;">'.$male_61_70_total. '</th>
                <th>'.$female_61_70_1. '</th>
                <th>'.$female_61_70_2. '</th>
                <th>'.$female_61_70_3. '</th>
                <th>'.$female_61_70_4. '</th>
                <th>'.$female_61_70_5. '</th>
                <th>'.$female_61_70_6. '</th>
                <th>'.$female_61_70_7. '</th>
                <th    style="background-color: #ffe500;">'.$female_61_70_total.'</th>
         </tr>




          <tr>
                <th style="background-color: #e9f7ad;">71-80</th>
                <th>'.$male_71_80_1. '</th>
                <th>'.$male_71_80_2. '</th>
                <th>'.$male_71_80_3. '</th>
                <th>'.$male_71_80_4. '</th>
                <th>'.$male_71_80_5. '</th>
                <th>'.$male_71_80_6. '</th>
                <th>'.$male_71_80_7. '</th>
                <th    style="background-color: #ffe500;">'.$male_71_80_total. '</th>
                <th>'.$female_71_80_1. '</th>
                <th>'.$female_71_80_2. '</th>
                <th>'.$female_71_80_3. '</th>
                <th>'.$female_71_80_4. '</th>
                <th>'.$female_71_80_5. '</th>
                <th>'.$female_71_80_6. '</th>
                <th>'.$female_71_80_7. '</th>
                <th    style="background-color: #ffe500;">'.$female_71_80_total.'</th>
         </tr>






          <tr>
                <th style="background-color: #e9f7ad;">81-100</th>
                <th>'.$male_81_1. '</th>
                <th>'.$male_81_2. '</th>
                <th>'.$male_81_3. '</th>
                <th>'.$male_81_4. '</th>
                <th>'.$male_81_5. '</th>
                <th>'.$male_81_6. '</th>
                <th>'.$male_81_7. '</th>
                <th style="background-color: #ffe500;">'.$male_81_total. '</th>
                <th>'.$female_80_1. '</th>
                <th>'.$female_80_2. '</th>
                <th>'.$female_80_3. '</th>
                <th>'.$female_80_4. '</th>
                <th>'.$female_80_5. '</th>
                <th>'.$female_80_6. '</th>
                <th>'.$female_80_7. '</th>
                <th style="background-color: #ffe500;">'.$female_80_total.'</th>
         </tr>





        <tr>
                <th style="background-color: #e9f7ad;">Total</th>
                <th>'.$male_total_1. '</th>
                <th>'.$male_total_2. '</th>
                <th>'.$male_total_3. '</th>
                <th>'.$male_total_4. '</th>
                <th>'.$male_total_5. '</th>
                <th>'.$male_total_6. '</th>
                <th>'.$male_total_7. '</th>
                   <th style="background-color: #ffe500;">'.$male_total_total.'</th>
                <th>'.$female_total_1. '</th>
                <th>'.$female_total_2. '</th>
                <th>'.$female_total_3. '</th>
                <th>'.$female_total_4. '</th>
                <th>'.$female_total_5. '</th>
                <th>'.$female_total_6. '</th>
                <th>'.$female_total_7. '</th>
                    <th style="background-color: #ffe500;">'.$subsequent_male_total_total.'</th>
              
        </tr>
 <tr>
           <th colspan="17" style=" text-align: center; background-color: #e9f7ad;"  >SUBSEQUENT VISITS</th>
       

 </tr>
         <tr>

         
            <td rowspan="2"     style="background-color: #e9f7ad;"> 
            <span id="A">AGE </span>
            <hr/>
            <span>STAGE</span>
            </td>

            
            <td colspan="7"     style="background-color: #e9f7ad;" >MALE</td>
            <td rowspan="2"     style="background-color: #e9f7ad;" >TOTAL</td>
            <td colspan="7"     style="background-color: #e9f7ad;" >FEMALE</td>
            <td rowspan="2"     style="background-color: #e9f7ad;" >TOTAL</td>
        
        </tr>
<tr>
    <th colspan="1"     style="background-color: #e9f7ad;" >I</th>
    <th colspan="1"     style="background-color: #e9f7ad;" >II</th>
    <th colspan="1"     style="background-color: #e9f7ad;" >III</th>
    <th colspan="1"     style="background-color: #e9f7ad;" >IV</th>
    <th colspan="1"     style="background-color: #e9f7ad;" >V</th>
    <th colspan="1"     style="background-color: #e9f7ad;" >VI</th>
    <th colspan="1"     style="background-color: #e9f7ad;" >VII</th>




    <th colspan="1"     style="background-color: #e9f7ad;" >I</th>
    <th colspan="1"     style="background-color: #e9f7ad;" >II</th>
    <th colspan="1"     style="background-color: #e9f7ad;" >III</th>
    <th colspan="1"     style="background-color: #e9f7ad;" >IV</th>
    <th colspan="1"     style="background-color: #e9f7ad;" >V</th>
    <th colspan="1"     style="background-color: #e9f7ad;" >VI</th>
    <th colspan="1"     style="background-color: #e9f7ad;" >VII</th>
</tr>






 <tr>
                <th     style="background-color: #e9f7ad;">0 - 10</th>
                <th>'.$subsequent_male_0_10_1. '</th>
                <th>'.$subsequent_male_0_10_2. '</th>
                <th>'.$subsequent_male_0_10_3. '</th>
                <th>'.$subsequent_male_0_10_4. '</th>
                <th>'.$subsequent_male_0_10_5. '</th>
                <th>'.$subsequent_male_0_10_6. '</th>
                <th>'.$subsequent_male_0_10_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_male_0_10_total.'</th>
                <th>'.$subsequent_female_0_10_1. '</th>
                <th>'.$subsequent_female_0_10_2. '</th>
                <th>'.$subsequent_female_0_10_3. '</th>
                <th>'.$subsequent_female_0_10_4. '</th>
                <th>'.$subsequent_female_0_10_5. '</th>
                <th>'.$subsequent_female_0_10_6. '</th>
                <th>'.$subsequent_female_0_10_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_female_0_10_total.'</th>
         </tr>


          <tr>

                <th     style="background-color: #e9f7ad;">11-20</th>
                <th>'.$subsequent_male_11_20_1. '</th>
                <th>'.$subsequent_male_11_20_2. '</th>
                <th>'.$subsequent_male_11_20_3. '</th>
                <th>'.$subsequent_male_11_20_4. '</th>
                <th>'.$subsequent_male_11_20_5. '</th>
                <th>'.$subsequent_male_11_20_6. '</th>
                <th>'.$subsequent_male_11_20_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_male_11_20_total. '</th>
                <th>'.$subsequent_female_11_20_1. '</th>
                <th>'.$subsequent_female_11_20_2. '</th>
                <th>'.$subsequent_female_11_20_3. '</th>
                <th>'.$subsequent_female_11_20_4. '</th>
                <th>'.$subsequent_female_11_20_5. '</th>
                <th>'.$subsequent_female_11_20_6. '</th>
                <th>'.$subsequent_female_11_20_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_female_11_20_total.'</th>
         </tr>


          <tr>

                <th     style="background-color: #e9f7ad;">21-30</th>
                <th>'.$subsequent_male_21_30_1. '</th>
                <th>'.$subsequent_male_21_30_2. '</th>
                <th>'.$subsequent_male_21_30_3. '</th>
                <th>'.$subsequent_male_21_30_4. '</th>
                <th>'.$subsequent_male_21_30_5. '</th>
                <th>'.$subsequent_male_21_30_6. '</th>
                <th>'.$subsequent_male_21_30_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_male_21_30_total. '</th>
                <th>'.$subsequent_female_21_30_1. '</th>
                <th>'.$subsequent_female_21_30_2. '</th>
                <th>'.$subsequent_female_21_30_3. '</th>
                <th>'.$subsequent_female_21_30_4. '</th>
                <th>'.$subsequent_female_21_30_5. '</th>
                <th>'.$subsequent_female_21_30_6. '</th>
                <th>'.$subsequent_female_21_30_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_female_21_30_total.'</th>
         </tr>
          <tr>
                <th     style="background-color: #e9f7ad;">31-40</th>
                <th>'.$subsequent_male_31_40_1. '</th>
                <th>'.$subsequent_male_31_40_2. '</th>
                <th>'.$subsequent_male_31_40_3. '</th>
                <th>'.$subsequent_male_31_40_4. '</th>
                <th>'.$subsequent_male_31_40_5. '</th>
                <th>'.$subsequent_male_31_40_6. '</th>
                <th>'.$subsequent_male_31_40_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_male_31_40_total. '</th>
                <th>'.$subsequent_female_31_40_1. '</th>
                <th>'.$subsequent_female_31_40_2. '</th>
                <th>'.$subsequent_female_31_40_3. '</th>
                <th>'.$subsequent_female_31_40_4. '</th>
                <th>'.$subsequent_female_31_40_5. '</th>
                <th>'.$subsequent_female_31_40_6. '</th>
                <th>'.$subsequent_female_31_40_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_female_31_40_total.'</th>
         </tr>

          <tr>
                <th     style="background-color: #e9f7ad;">41-50</th>
                <th>'.$subsequent_male_41_50_1. '</th>
                <th>'.$subsequent_male_41_50_2. '</th>
                <th>'.$subsequent_male_41_50_3. '</th>
                <th>'.$subsequent_male_41_50_4. '</th>
                <th>'.$subsequent_male_41_50_5. '</th>
                <th>'.$subsequent_male_41_50_6. '</th>
                <th>'.$subsequent_male_41_50_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_male_41_50_total. '</th>
                <th>'.$subsequent_female_41_50_1. '</th>
                <th>'.$subsequent_female_41_50_2. '</th>
                <th>'.$subsequent_female_41_50_3. '</th>
                <th>'.$subsequent_female_41_50_4. '</th>
                <th>'.$subsequent_female_41_50_5. '</th>
                <th>'.$subsequent_female_41_50_6. '</th>
                <th>'.$subsequent_female_41_50_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_female_41_50_total.'</th>
         </tr>



          <tr>
                <th     style="background-color: #e9f7ad;">51-60</th>
                <th>'.$subsequent_male_51_60_1. '</th>
                <th>'.$subsequent_male_51_60_2. '</th>
                <th>'.$subsequent_male_51_60_3. '</th>
                <th>'.$subsequent_male_51_60_4. '</th>
                <th>'.$subsequent_male_51_60_5. '</th>
                <th>'.$subsequent_male_51_60_6. '</th>
                <th>'.$subsequent_male_51_60_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_male_51_60_total. '</th>
                <th>'.$subsequent_female_51_60_1. '</th>
                <th>'.$subsequent_female_51_60_2. '</th>
                <th>'.$subsequent_female_51_60_3. '</th>
                <th>'.$subsequent_female_51_60_4. '</th>
                <th>'.$subsequent_female_51_60_5. '</th>
                <th>'.$subsequent_female_51_60_6. '</th>
                <th>'.$subsequent_female_51_60_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_female_51_60_total.'</th>
         </tr>


          <tr>
                <th     style="background-color: #e9f7ad;">61-70</th>
                <th>'.$subsequent_male_61_70_1. '</th>
                <th>'.$subsequent_male_61_70_2. '</th>
                <th>'.$subsequent_male_61_70_3. '</th>
                <th>'.$subsequent_male_61_70_4. '</th>
                <th>'.$subsequent_male_61_70_5. '</th>
                <th>'.$subsequent_male_61_70_6. '</th>
                <th>'.$subsequent_male_61_70_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_male_61_70_total. '</th>
                <th>'.$subsequent_female_61_70_1. '</th>
                <th>'.$subsequent_female_61_70_2. '</th>
                <th>'.$subsequent_female_61_70_3. '</th>
                <th>'.$subsequent_female_61_70_4. '</th>
                <th>'.$subsequent_female_61_70_5. '</th>
                <th>'.$subsequent_female_61_70_6. '</th>
                <th>'.$subsequent_female_61_70_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_female_61_70_total.'</th>
         </tr>




          <tr>
                <th    style="background-color: #e9f7ad;">71-80</th>
                <th>'.$subsequent_male_71_80_1. '</th>
                <th>'.$subsequent_male_71_80_2. '</th>
                <th>'.$subsequent_male_71_80_3. '</th>
                <th>'.$subsequent_male_71_80_4. '</th>
                <th>'.$subsequent_male_71_80_5. '</th>
                <th>'.$subsequent_male_71_80_6. '</th>
                <th>'.$subsequent_male_71_80_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_male_71_80_total. '</th>
                <th>'.$subsequent_female_71_80_1. '</th>
                <th>'.$subsequent_female_71_80_2. '</th>
                <th>'.$subsequent_female_71_80_3. '</th>
                <th>'.$subsequent_female_71_80_4. '</th>
                <th>'.$subsequent_female_71_80_5. '</th>
                <th>'.$subsequent_female_71_80_6. '</th>
                <th>'.$subsequent_female_71_80_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_female_71_80_total.'</th>
         </tr>






          <tr>
                <th     style="background-color: #e9f7ad;">81-100</th>
                <th>'.$subsequent_male_80_1. '</th>
                <th>'.$subsequent_male_80_2. '</th>
                <th>'.$subsequent_male_80_3. '</th>
                <th>'.$subsequent_male_80_4. '</th>
                <th>'.$subsequent_male_80_5. '</th>
                <th>'.$subsequent_male_80_6. '</th>
                <th>'.$subsequent_male_80_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_male_80_total. '</th>
                <th>'.$subsequent_female_81_1. '</th>
                <th>'.$subsequent_female_81_2. '</th>
                <th>'.$subsequent_female_81_3. '</th>
                <th>'.$subsequent_female_81_4. '</th>
                <th>'.$subsequent_female_81_5. '</th>
                <th>'.$subsequent_female_81_6. '</th>
                <th>'.$subsequent_female_81_7. '</th>
                <th style="background-color: #ffe500;">'.$subsequent_female_81_total.'</th>
         </tr>



        <tr>
                <th     style="background-color: #e9f7ad;">Total</th>
                <th>'.$subsequent_male_total_1. '</th>
                <th>'.$subsequent_male_total_2. '</th>
                <th>'.$subsequent_male_total_3. '</th>
                <th>'.$subsequent_male_total_4. '</th>
                <th>'.$subsequent_male_total_5. '</th>
                <th>'.$subsequent_male_total_6. '</th>
                <th>'.$subsequent_male_total_7. '</th>
                 <th style="background-color: #ffe500;">'.$female_total_total.'</th>
                <th>'.$subsequent_female_total_1. '</th>
                <th>'.$subsequent_female_total_2. '</th>
                <th>'.$subsequent_female_total_3. '</th>
                <th>'.$subsequent_female_total_4. '</th>
                <th>'.$subsequent_female_total_5. '</th>
                <th>'.$subsequent_female_total_6. '</th>
                <th>'.$subsequent_female_total_7. '</th>
            <th style="background-color: #ffe500;">'.$subsequent_female_total_total.'</th>
                 
        </tr>';
}


// yearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearlyyearly


if ($select == "yearly" ) {
                $viewData2 ='
                  <tr>
            <th     style="background-color: #e9f7ad;">0 - 10</th>
                <th>'.$yearly_male_0_10_1. '</th>
                <th>'.$yearly_male_0_10_2. '</th>
                <th>'.$yearly_male_0_10_3. '</th>
                <th>'.$yearly_male_0_10_4. '</th>
                <th>'.$yearly_male_0_10_5. '</th>
                <th>'.$yearly_male_0_10_6. '</th>
                <th>'.$yearly_male_0_10_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_male_0_10_total.'</th>
                <th>'.$yearly_female_0_10_1. '</th>
                <th>'.$yearly_female_0_10_2. '</th>
                <th>'.$yearly_female_0_10_3. '</th>
                <th>'.$yearly_female_0_10_4. '</th>
                <th>'.$yearly_female_0_10_5. '</th>
                <th>'.$yearly_female_0_10_6. '</th>
                <th>'.$yearly_female_0_10_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_female_0_10_total.'</th>
         </tr>


          <tr>

                <th     style="background-color: #e9f7ad;">11-20</th>
                <th>'.$yearly_male_11_20_1. '</th>
                <th>'.$yearly_male_11_20_2. '</th>
                <th>'.$yearly_male_11_20_3. '</th>
                <th>'.$yearly_male_11_20_4. '</th>
                <th>'.$yearly_male_11_20_5. '</th>
                <th>'.$yearly_male_11_20_6. '</th>
                <th>'.$yearly_male_11_20_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_male_11_20_total. '</th>

                <th>'.$yearly_female_11_20_1. '</th>
                <th>'.$yearly_female_11_20_2. '</th>
                <th>'.$yearly_female_11_20_3. '</th>
                <th>'.$yearly_female_11_20_4. '</th>
                <th>'.$yearly_female_11_20_5. '</th>
                <th>'.$yearly_female_11_20_6. '</th>
                <th>'.$yearly_female_11_20_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_female_11_20_total.'</th>
         </tr>


          <tr>

                <th     style="background-color: #e9f7ad;">21-30</th>
                <th>'.$yearly_male_21_30_1. '</th>
                <th>'.$yearly_male_21_30_2. '</th>
                <th>'.$yearly_male_21_30_3. '</th>
                <th>'.$yearly_male_21_30_4. '</th>
                <th>'.$yearly_male_21_30_5. '</th>
                <th>'.$yearly_male_21_30_6. '</th>
                <th>'.$yearly_male_21_30_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_male_21_30_total. '</th>

                <th>'.$yearly_female_21_30_1. '</th>
                <th>'.$yearly_female_21_30_2. '</th>
                <th>'.$yearly_female_21_30_3. '</th>
                <th>'.$yearly_female_21_30_4. '</th>
                <th>'.$yearly_female_21_30_5. '</th>
                <th>'.$yearly_female_21_30_6. '</th>
                <th>'.$yearly_female_21_30_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_female_21_30_total.'</th>
         </tr>
          <tr>
                <th     style="background-color: #e9f7ad;">31-40</th>
                <th>'.$yearly_male_31_40_1. '</th>
                <th>'.$yearly_male_31_40_2. '</th>
                <th>'.$yearly_male_31_40_3. '</th>
                <th>'.$yearly_male_31_40_4. '</th>
                <th>'.$yearly_male_31_40_5. '</th>
                <th>'.$yearly_male_31_40_6. '</th>
                <th>'.$yearly_male_31_40_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_male_31_40_total. '</th>

                <th>'.$yearly_female_31_40_1. '</th>
                <th>'.$yearly_female_31_40_2. '</th>
                <th>'.$yearly_female_31_40_3. '</th>
                <th>'.$yearly_female_31_40_4. '</th>
                <th>'.$yearly_female_31_40_5. '</th>
                <th>'.$yearly_female_31_40_6. '</th>
                <th>'.$yearly_female_31_40_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_female_31_40_total.'</th>
         </tr>

          <tr>
                <th     style="background-color: #e9f7ad;">41-50</th>
                <th>'.$yearly_male_41_50_1. '</th>
                <th>'.$yearly_male_41_50_2. '</th>
                <th>'.$yearly_male_41_50_3. '</th>
                <th>'.$yearly_male_41_50_4. '</th>
                <th>'.$yearly_male_41_50_5. '</th>
                <th>'.$yearly_male_41_50_6. '</th>
                <th>'.$yearly_male_41_50_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_male_41_50_total. '</th>
                <th>'.$yearly_female_41_50_1. '</th>
                <th>'.$yearly_female_41_50_2. '</th>
                <th>'.$yearly_female_41_50_3. '</th>
                <th>'.$yearly_female_41_50_4. '</th>
                <th>'.$yearly_female_41_50_5. '</th>
                <th>'.$yearly_female_41_50_6. '</th>
                <th>'.$yearly_female_41_50_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_female_41_50_total.'</th>
         </tr>



          <tr>
                <th     style="background-color: #e9f7ad;">51-60</th>
                <th>'.$yearly_male_51_60_1. '</th>
                <th>'.$yearly_male_51_60_2. '</th>
                <th>'.$yearly_male_51_60_3. '</th>
                <th>'.$yearly_male_51_60_4. '</th>
                <th>'.$yearly_male_51_60_5. '</th>
                <th>'.$yearly_male_51_60_6. '</th>
                <th>'.$yearly_male_51_60_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_male_51_60_total. '</th>
                <th>'.$yearly_female_51_60_1. '</th>
                <th>'.$yearly_female_51_60_2. '</th>
                <th>'.$yearly_female_51_60_3. '</th>
                <th>'.$yearly_female_51_60_4. '</th>
                <th>'.$yearly_female_51_60_5. '</th>
                <th>'.$yearly_female_51_60_6. '</th>
                <th>'.$yearly_female_51_60_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_female_51_60_total.'</th>
         </tr>


          <tr>
                <th     style="background-color: #e9f7ad;">61-70</th>
                <th>'.$yearly_male_61_70_1. '</th>
                <th>'.$yearly_male_61_70_2. '</th>
                <th>'.$yearly_male_61_70_3. '</th>
                <th>'.$yearly_male_61_70_4. '</th>
                <th>'.$yearly_male_61_70_5. '</th>
                <th>'.$yearly_male_61_70_6. '</th>
                <th>'.$yearly_male_61_70_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_male_61_70_total. '</th>
                <th>'.$yearly_female_61_70_1. '</th>
                <th>'.$yearly_female_61_70_2. '</th>
                <th>'.$yearly_female_61_70_3. '</th>
                <th>'.$yearly_female_61_70_4. '</th>
                <th>'.$yearly_female_61_70_5. '</th>
                <th>'.$yearly_female_61_70_6. '</th>
                <th>'.$yearly_female_61_70_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_female_61_70_total.'</th>
         </tr>




          <tr>
                <th     style="background-color: #e9f7ad;">71-80</th>
                <th>'.$yearly_male_71_80_1. '</th>
                <th>'.$yearly_male_71_80_2. '</th>
                <th>'.$yearly_male_71_80_3. '</th>
                <th>'.$yearly_male_71_80_4. '</th>
                <th>'.$yearly_male_71_80_5. '</th>
                <th>'.$yearly_male_71_80_6. '</th>
                <th>'.$yearly_male_71_80_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_male_71_80_total. '</th>
                <th>'.$yearly_female_71_80_1. '</th>
                <th>'.$yearly_female_71_80_2. '</th>
                <th>'.$yearly_female_71_80_3. '</th>
                <th>'.$yearly_female_71_80_4. '</th>
                <th>'.$yearly_female_71_80_5. '</th>
                <th>'.$yearly_female_71_80_6. '</th>
                <th>'.$yearly_female_71_80_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_female_71_80_total.'</th>
         </tr>






          <tr>
                <th     style="background-color: #e9f7ad;">81-100</th>
                <th>'.$yearly_male_81_1. '</th>
                <th>'.$yearly_male_81_2. '</th>
                <th>'.$yearly_male_81_3. '</th>
                <th>'.$yearly_male_81_4. '</th>
                <th>'.$yearly_male_81_5. '</th>
                <th>'.$yearly_male_81_6. '</th>
                <th>'.$yearly_male_81_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_male_81_total. '</th>
                <th>'.$yearly_female_80_1. '</th>
                <th>'.$yearly_female_80_2. '</th>
                <th>'.$yearly_female_80_3. '</th>
                <th>'.$yearly_female_80_4. '</th>
                <th>'.$yearly_female_80_5. '</th>
                <th>'.$yearly_female_80_6. '</th>
                <th>'.$yearly_female_80_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_female_80_total.'</th>
         </tr>






        <tr> 
                <th     style="background-color: #e9f7ad;">Total</th>
                <th style="background-color: #ffe500;" >'.$yearly_male_total_1. '</th>
                <th style="background-color: #ffe500;" >'.$yearly_male_total_2. '</th>
                <th style="background-color: #ffe500;" >'.$yearly_male_total_3. '</th>
                <th style="background-color: #ffe500;" >'.$yearly_male_total_4. '</th>
                <th style="background-color: #ffe500;" >'.$yearly_male_total_5. '</th>
                <th style="background-color: #ffe500;" >'.$yearly_male_total_6. '</th>
                <th style="background-color: #ffe500;" >'.$yearly_male_total_7. '</th>
                <th style="background-color: #ffe500;"  >'.$yearly_male_total_total.'</th>
                <th style="background-color: #ffe500;" >'.$yearly_female_total_1. '</th>
                <th style="background-color: #ffe500;" >'.$yearly_female_total_2. '</th>
                <th style="background-color: #ffe500;" >'.$yearly_female_total_3. '</th>
                <th style="background-color: #ffe500;" >'.$yearly_female_total_4. '</th>
                <th style="background-color: #ffe500;" >'.$yearly_female_total_5. '</th>
                <th style="background-color: #ffe500;" >'.$yearly_female_total_6. '</th>
                <th style="background-color: #ffe500;" >'.$yearly_female_total_7. '</th>
               <th style="background-color: #ffe500;" >'.$yearly_subsequent_male_total_total.'</th>
               
        </tr>  

         <tr> <th colspan="17" style=" text-align: center; "  >  </th> </tr>

         
 <tr>  <th colspan="17" style=" text-align: center;background-color: #e9f7ad;"  >SUBSEQUENT VISITS2</th> </tr>

         <tr>

        
         <td rowspan="2" style="background-color: #e9f7ad;"> 
         <span id="A" >AGE</span>
         <hr/>
         <span>STAGE</span>
         </td>

         
         <td colspan="7" style="background-color: #e9f7ad;">MALE</td>
         <td rowspan="2" style="background-color: #e9f7ad;">TOTAL</td>
         <td colspan="7" style="background-color: #e9f7ad;">FEMALE</td>
         <td rowspan="2" style="background-color: #e9f7ad;">TOTAL</td>
    
        </tr>
<tr>
    <th colspan="1" style="background-color: #e9f7ad;">I</th>
    <th colspan="1" style="background-color: #e9f7ad;">II</th>
    <th colspan="1" style="background-color: #e9f7ad;">III</th>
    <th colspan="1" style="background-color: #e9f7ad;">IV</th>
    <th colspan="1" style="background-color: #e9f7ad;">V</th>
    <th colspan="1" style="background-color: #e9f7ad;">VI</th>
    <th colspan="1" style="background-color: #e9f7ad;">VII</th>




    <th colspan="1" style="background-color: #e9f7ad;">I</th>
    <th colspan="1" style="background-color: #e9f7ad;">II</th>
    <th colspan="1" style="background-color: #e9f7ad;">III</th>
    <th colspan="1" style="background-color: #e9f7ad;">IV</th>
    <th colspan="1" style="background-color: #e9f7ad;">V</th>
    <th colspan="1" style="background-color: #e9f7ad;">VI</th>
    <th colspan="1" style="background-color: #e9f7ad;">VII</th>
</tr>

<tr>
       <th style="background-color: #e9f7ad;">0 - 10</th>
                <th>'.$yearly_subsequent_male_0_10_1. '</th>
                <th>'.$yearly_subsequent_male_0_10_2. '</th>
                <th>'.$yearly_subsequent_male_0_10_3. '</th>
                <th>'.$yearly_subsequent_male_0_10_4. '</th>
                <th>'.$yearly_subsequent_male_0_10_5. '</th>
                <th>'.$yearly_subsequent_male_0_10_6. '</th>
                <th>'.$yearly_subsequent_male_0_10_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_male_0_10_total.'</th>
                <th>'.$yearly_subsequent_female_0_10_1. '</th>
                <th>'.$yearly_subsequent_female_0_10_2. '</th>
                <th>'.$yearly_subsequent_female_0_10_3. '</th>
                <th>'.$yearly_subsequent_female_0_10_4. '</th>
                <th>'.$yearly_subsequent_female_0_10_5. '</th>
                <th>'.$yearly_subsequent_female_0_10_6. '</th>
                <th>'.$yearly_subsequent_female_0_10_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_female_0_10_total.'</th>
         </tr>


          <tr>

                <th style="background-color: #e9f7ad;">11-20</th>
                <th>'.$yearly_subsequent_male_11_20_1. '</th>
                <th>'.$yearly_subsequent_male_11_20_2. '</th>
                <th>'.$yearly_subsequent_male_11_20_3. '</th>
                <th>'.$yearly_subsequent_male_11_20_4. '</th>
                <th>'.$yearly_subsequent_male_11_20_5. '</th>
                <th>'.$yearly_subsequent_male_11_20_6. '</th>
                <th>'.$yearly_subsequent_male_11_20_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_male_11_20_total. '</th>
                <th>'.$yearly_subsequent_female_11_20_1. '</th>
                <th>'.$yearly_subsequent_female_11_20_2. '</th>
                <th>'.$yearly_subsequent_female_11_20_3. '</th>
                <th>'.$yearly_subsequent_female_11_20_4. '</th>
                <th>'.$yearly_subsequent_female_11_20_5. '</th>
                <th>'.$yearly_subsequent_female_11_20_6. '</th>
                <th>'.$yearly_subsequent_female_11_20_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_female_11_20_total.'</th>
         </tr>


          <tr>

                <th style="background-color: #e9f7ad;">21-30</th>
                <th>'.$yearly_subsequent_male_21_30_1. '</th>
                <th>'.$yearly_subsequent_male_21_30_2. '</th>
                <th>'.$yearly_subsequent_male_21_30_3. '</th>
                <th>'.$yearly_subsequent_male_21_30_4. '</th>
                <th>'.$yearly_subsequent_male_21_30_5. '</th>
                <th>'.$yearly_subsequent_male_21_30_6. '</th>
                <th>'.$yearly_subsequent_male_21_30_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_male_21_30_total. '</th>
                <th>'.$yearly_subsequent_female_21_30_1. '</th>
                <th>'.$yearly_subsequent_female_21_30_2. '</th>
                <th>'.$yearly_subsequent_female_21_30_3. '</th>
                <th>'.$yearly_subsequent_female_21_30_4. '</th>
                <th>'.$yearly_subsequent_female_21_30_5. '</th>
                <th>'.$yearly_subsequent_female_21_30_6. '</th>
                <th>'.$yearly_subsequent_female_21_30_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_female_21_30_total.'</th>
         </tr>
          <tr>
                <th style="background-color: #e9f7ad;">31-40</th>
                <th>'.$yearly_subsequent_male_31_40_1. '</th>
                <th>'.$yearly_subsequent_male_31_40_2. '</th>
                <th>'.$yearly_subsequent_male_31_40_3. '</th>
                <th>'.$yearly_subsequent_male_31_40_4. '</th>
                <th>'.$yearly_subsequent_male_31_40_5. '</th>
                <th>'.$yearly_subsequent_male_31_40_6. '</th>
                <th>'.$yearly_subsequent_male_31_40_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_male_31_40_total. '</th>
                <th>'.$yearly_subsequent_female_31_40_1. '</th>
                <th>'.$yearly_subsequent_female_31_40_2. '</th>
                <th>'.$yearly_subsequent_female_31_40_3. '</th>
                <th>'.$yearly_subsequent_female_31_40_4. '</th>
                <th>'.$yearly_subsequent_female_31_40_5. '</th>
                <th>'.$yearly_subsequent_female_31_40_6. '</th>
                <th>'.$yearly_subsequent_female_31_40_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_female_31_40_total.'</th>
         </tr>

          <tr>
                <th style="background-color: #e9f7ad;">41-50</th>
                <th>'.$yearly_subsequent_male_41_50_1. '</th>
                <th>'.$yearly_subsequent_male_41_50_2. '</th>
                <th>'.$yearly_subsequent_male_41_50_3. '</th>
                <th>'.$yearly_subsequent_male_41_50_4. '</th>
                <th>'.$yearly_subsequent_male_41_50_5. '</th>
                <th>'.$yearly_subsequent_male_41_50_6. '</th>
                <th>'.$yearly_subsequent_male_41_50_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_male_41_50_total. '</th>
                <th>'.$yearly_subsequent_female_41_50_1. '</th>
                <th>'.$yearly_subsequent_female_41_50_2. '</th>
                <th>'.$yearly_subsequent_female_41_50_3. '</th>
                <th>'.$yearly_subsequent_female_41_50_4. '</th>
                <th>'.$yearly_subsequent_female_41_50_5. '</th>
                <th>'.$yearly_subsequent_female_41_50_6. '</th>
                <th>'.$yearly_subsequent_female_41_50_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_female_41_50_total.'</th>
         </tr>



          <tr>
                <th style="background-color: #e9f7ad;">51-60</th>
                <th>'.$yearly_subsequent_male_51_60_1. '</th>
                <th>'.$yearly_subsequent_male_51_60_2. '</th>
                <th>'.$yearly_subsequent_male_51_60_3. '</th>
                <th>'.$yearly_subsequent_male_51_60_4. '</th>
                <th>'.$yearly_subsequent_male_51_60_5. '</th>
                <th>'.$yearly_subsequent_male_51_60_6. '</th>
                <th>'.$yearly_subsequent_male_51_60_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_male_51_60_total. '</th>
                <th>'.$yearly_subsequent_female_51_60_1. '</th>
                <th>'.$yearly_subsequent_female_51_60_2. '</th>
                <th>'.$yearly_subsequent_female_51_60_3. '</th>
                <th>'.$yearly_subsequent_female_51_60_4. '</th>
                <th>'.$yearly_subsequent_female_51_60_5. '</th>
                <th>'.$yearly_subsequent_female_51_60_6. '</th>
                <th>'.$yearly_subsequent_female_51_60_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_female_51_60_total.'</th>
         </tr>


          <tr>
                <th style="background-color: #e9f7ad;">61-70</th>
                <th>'.$yearly_subsequent_male_61_70_1. '</th>
                <th>'.$yearly_subsequent_male_61_70_2. '</th>
                <th>'.$yearly_subsequent_male_61_70_3. '</th>
                <th>'.$yearly_subsequent_male_61_70_4. '</th>
                <th>'.$yearly_subsequent_male_61_70_5. '</th>
                <th>'.$yearly_subsequent_male_61_70_6. '</th>
                <th>'.$yearly_subsequent_male_61_70_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_male_61_70_total. '</th>
                <th>'.$yearly_subsequent_female_61_70_1. '</th>
                <th>'.$yearly_subsequent_female_61_70_2. '</th>
                <th>'.$yearly_subsequent_female_61_70_3. '</th>
                <th>'.$yearly_subsequent_female_61_70_4. '</th>
                <th>'.$yearly_subsequent_female_61_70_5. '</th>
                <th>'.$yearly_subsequent_female_61_70_6. '</th>
                <th>'.$yearly_subsequent_female_61_70_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_female_61_70_total.'</th>
         </tr>




          <tr>
                <th style="background-color: #e9f7ad;">71-80</th>
                <th>'.$yearly_subsequent_male_71_80_1. '</th>
                <th>'.$yearly_subsequent_male_71_80_2. '</th>
                <th>'.$yearly_subsequent_male_71_80_3. '</th>
                <th>'.$yearly_subsequent_male_71_80_4. '</th>
                <th>'.$yearly_subsequent_male_71_80_5. '</th>
                <th>'.$yearly_subsequent_male_71_80_6. '</th>
                <th>'.$yearly_subsequent_male_71_80_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_male_71_80_total. '</th>
                <th>'.$yearly_subsequent_female_71_80_1. '</th>
                <th>'.$yearly_subsequent_female_71_80_2. '</th>
                <th>'.$yearly_subsequent_female_71_80_3. '</th>
                <th>'.$yearly_subsequent_female_71_80_4. '</th>
                <th>'.$yearly_subsequent_female_71_80_5. '</th>
                <th>'.$yearly_subsequent_female_71_80_6. '</th>
                <th>'.$yearly_subsequent_female_71_80_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_female_71_80_total.'</th>
         </tr>






          <tr>
                <th style="background-color: #e9f7ad;">81-100</th>
                <th>'.$yearly_subsequent_male_80_1. '</th>
                <th>'.$yearly_subsequent_male_80_2. '</th>
                <th>'.$yearly_subsequent_male_80_3. '</th>
                <th>'.$yearly_subsequent_male_80_4. '</th>
                <th>'.$yearly_subsequent_male_80_5. '</th>
                <th>'.$yearly_subsequent_male_80_6. '</th>
                <th>'.$yearly_subsequent_male_80_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_male_80_total. '</th>
                <th>'.$yearly_subsequent_female_81_1. '</th>
                <th>'.$yearly_subsequent_female_81_2. '</th>
                <th>'.$yearly_subsequent_female_81_3. '</th>
                <th>'.$yearly_subsequent_female_81_4. '</th>
                <th>'.$yearly_subsequent_female_81_5. '</th>
                <th>'.$yearly_subsequent_female_81_6. '</th>
                <th>'.$yearly_subsequent_female_81_7. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_female_81_total.'</th>
         </tr>







        <tr>
                <th style="background-color: #e9f7ad;">Total</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_male_total_1. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_male_total_2. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_male_total_3. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_male_total_4. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_male_total_5. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_male_total_6. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_male_total_7. '</th>
                   <th style="background-color: #ffe500;">'.$yearly_female_total_total. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_female_total_1. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_female_total_2. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_female_total_3. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_female_total_4. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_female_total_5. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_female_total_6. '</th>
                <th style="background-color: #ffe500;">'.$yearly_subsequent_female_total_7. '</th>
                    <th style="background-color: #ffe500;">'.$yearly_subsequent_female_total_total. '</th>
                
        </tr>';
}









            }


            
            
            if (in_array("January", $months) || in_array("February", $months) || in_array("March", $months)) {
                array_push($quarters, $quarter1);

            }
            if (in_array("April", $months) || in_array("May", $months) || in_array("June", $months)) {
                array_push($quarters, $quarter2);

            }
            if (in_array("July", $months) || in_array("August", $months) || in_array("September", $months)) {
                array_push($quarters, $quarter3);

            }
            if (in_array("October", $months) || in_array("November", $months) || in_array("December", $months)) {
                array_push($quarters, $quarter4);

            }
        }






        for ($i = 0; $i < count($quarters); $i++) {


if ($select == "quarterly") {

            $viewDataQuarters = '
            <tr>
                
                <th style="background-color: #e9f7ad;">o - 10</th>
                <th>'.$quarters[$i]['male_0_10_1']. '</th>
                <th>'.$quarters[$i]['male_0_10_2']. '</th>
                <th>'.$quarters[$i]['male_0_10_3']. '</th>
                <th>'.$quarters[$i]['male_0_10_4']. '</th>
                <th>'.$quarters[$i]['male_0_10_5']. '</th>
                <th>'.$quarters[$i]['male_0_10_6']. '</th>
                <th>'.$quarters[$i]['male_0_10_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['male_0_10_total']. '</th>
                <th>'.$quarters[$i]['female_0_10_1']. '</th>
                <th>'.$quarters[$i]['female_0_10_2']. '</th>
                <th>'.$quarters[$i]['female_0_10_3']. '</th>
                <th>'.$quarters[$i]['female_0_10_4']. '</th>
                <th>'.$quarters[$i]['female_0_10_5']. '</th>
                <th>'.$quarters[$i]['female_0_10_6']. '</th>
                <th>'.$quarters[$i]['female_0_10_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['female_0_10_total'].'</th>
         </tr>



          <tr>
                <th style="background-color: #e9f7ad;">11- 20</th>
                <th>'.$quarters[$i]['male_11_20_1']. '</th>
                <th>'.$quarters[$i]['male_11_20_2']. '</th>
                <th>'.$quarters[$i]['male_11_20_3']. '</th>
                <th>'.$quarters[$i]['male_11_20_4']. '</th>
                <th>'.$quarters[$i]['male_11_20_5']. '</th>
                <th>'.$quarters[$i]['male_11_20_6']. '</th>
                <th>'.$quarters[$i]['male_11_20_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['male_11_20_total']. '</th>
                <th>'.$quarters[$i]['female_11_20_1']. '</th>
                <th>'.$quarters[$i]['female_11_20_2']. '</th>
                <th>'.$quarters[$i]['female_11_20_3']. '</th>
                <th>'.$quarters[$i]['female_11_20_4']. '</th>
                <th>'.$quarters[$i]['female_11_20_5']. '</th>
                <th>'.$quarters[$i]['female_11_20_6']. '</th>
                <th>'.$quarters[$i]['female_11_20_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['female_11_20_total'].'</th>
         </tr>

         <tr>
                <th style="background-color: #e9f7ad;">21-30</th>
                <th>'.$quarters[$i]['male_21_30_1']. '</th>
                <th>'.$quarters[$i]['male_21_30_2']. '</th>
                <th>'.$quarters[$i]['male_21_30_3']. '</th>
                <th>'.$quarters[$i]['male_21_30_4']. '</th>
                <th>'.$quarters[$i]['male_21_30_5']. '</th>
                <th>'.$quarters[$i]['male_21_30_6']. '</th>
                <th>'.$quarters[$i]['male_21_30_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['male_21_30_total']. '</th>
                <th>'.$quarters[$i]['female_21_30_1']. '</th>
                <th>'.$quarters[$i]['female_21_30_2']. '</th>
                <th>'.$quarters[$i]['female_21_30_3']. '</th>
                <th>'.$quarters[$i]['female_21_30_4']. '</th>
                <th>'.$quarters[$i]['female_21_30_5']. '</th>
                <th>'.$quarters[$i]['female_21_30_6']. '</th>
                <th>'.$quarters[$i]['female_21_30_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['female_21_30_total'].'</th>
         </tr>
          <tr>
                <th style="background-color: #e9f7ad;">31-40</th>
                <th>'.$quarters[$i]['male_31_40_1']. '</th>
                <th>'.$quarters[$i]['male_31_40_2']. '</th>
                <th>'.$quarters[$i]['male_31_40_3']. '</th>
                <th>'.$quarters[$i]['male_31_40_4']. '</th>
                <th>'.$quarters[$i]['male_31_40_5']. '</th>
                <th>'.$quarters[$i]['male_31_40_6']. '</th>
                <th>'.$quarters[$i]['male_31_40_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['male_31_40_total']. '</th>
                <th>'.$quarters[$i]['female_31_40_1']. '</th>
                <th>'.$quarters[$i]['female_31_40_2']. '</th>
                <th>'.$quarters[$i]['female_31_40_3']. '</th>
                <th>'.$quarters[$i]['female_31_40_4']. '</th>
                <th>'.$quarters[$i]['female_31_40_5']. '</th>
                <th>'.$quarters[$i]['female_31_40_6']. '</th>
                <th>'.$quarters[$i]['female_31_40_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['female_31_40_total'].'</th>
         </tr>

          <tr>
                <th style="background-color: #e9f7ad;">41-50</th>
                <th>'.$quarters[$i]['male_41_50_1']. '</th>
                <th>'.$quarters[$i]['male_41_50_2']. '</th>
                <th>'.$quarters[$i]['male_41_50_3']. '</th>
                <th>'.$quarters[$i]['male_41_50_4']. '</th>
                <th>'.$quarters[$i]['male_41_50_5']. '</th>
                <th>'.$quarters[$i]['male_41_50_6']. '</th>
                <th>'.$quarters[$i]['male_41_50_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['male_41_50_total']. '</th>
                <th>'.$quarters[$i]['female_41_50_1']. '</th>
                <th>'.$quarters[$i]['female_41_50_2']. '</th>
                <th>'.$quarters[$i]['female_41_50_3']. '</th>
                <th>'.$quarters[$i]['female_41_50_4']. '</th>
                <th>'.$quarters[$i]['female_41_50_5']. '</th>
                <th>'.$quarters[$i]['female_41_50_6']. '</th>
                <th>'.$quarters[$i]['female_41_50_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['female_41_50_total'].'</th>
         </tr>

                   <tr>
                <th style="background-color: #e9f7ad;">51-60</th>
                <th>'.$quarters[$i]['male_51_60_1']. '</th>
                <th>'.$quarters[$i]['male_51_60_2']. '</th>
                <th>'.$quarters[$i]['male_51_60_3']. '</th>
                <th>'.$quarters[$i]['male_51_60_4']. '</th>
                <th>'.$quarters[$i]['male_51_60_5']. '</th>
                <th>'.$quarters[$i]['male_51_60_6']. '</th>
                <th>'.$quarters[$i]['male_51_60_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['male_51_60_total']. '</th>
                <th>'.$quarters[$i]['female_51_60_1']. '</th>
                <th>'.$quarters[$i]['female_51_60_2']. '</th>
                <th>'.$quarters[$i]['female_51_60_3']. '</th>
                <th>'.$quarters[$i]['female_51_60_4']. '</th>
                <th>'.$quarters[$i]['female_51_60_5']. '</th>
                <th>'.$quarters[$i]['female_51_60_6']. '</th>
                <th>'.$quarters[$i]['female_51_60_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['female_51_60_total'].'</th>
         </tr>

                   <tr>
                <th style="background-color: #e9f7ad;">61-70</th>
                <th>'.$quarters[$i]['male_61_70_1']. '</th>
                <th>'.$quarters[$i]['male_61_70_2']. '</th>
                <th>'.$quarters[$i]['male_61_70_3']. '</th>
                <th>'.$quarters[$i]['male_61_70_4']. '</th>
                <th>'.$quarters[$i]['male_61_70_5']. '</th>
                <th>'.$quarters[$i]['male_61_70_6']. '</th>
                <th>'.$quarters[$i]['male_61_70_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['male_61_70_total']. '</th>
                <th>'.$quarters[$i]['female_61_70_1']. '</th>
                <th>'.$quarters[$i]['female_61_70_2']. '</th>
                <th>'.$quarters[$i]['female_61_70_3']. '</th>
                <th>'.$quarters[$i]['female_61_70_4']. '</th>
                <th>'.$quarters[$i]['female_61_70_5']. '</th>
                <th>'.$quarters[$i]['female_61_70_6']. '</th>
                <th>'.$quarters[$i]['female_61_70_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['female_61_70_total'].'</th>
         </tr>
                   <tr>
                <th style="background-color: #e9f7ad;">71-80</th>
                <th>'.$quarters[$i]['male_71_80_1']. '</th>
                <th>'.$quarters[$i]['male_71_80_2']. '</th>
                <th>'.$quarters[$i]['male_71_80_3']. '</th>
                <th>'.$quarters[$i]['male_71_80_4']. '</th>
                <th>'.$quarters[$i]['male_71_80_5']. '</th>
                <th>'.$quarters[$i]['male_71_80_6']. '</th>
                <th>'.$quarters[$i]['male_71_80_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['male_71_80_total']. '</th>
                <th>'.$quarters[$i]['female_71_80_1']. '</th>
                <th>'.$quarters[$i]['female_71_80_2']. '</th>
                <th>'.$quarters[$i]['female_71_80_3']. '</th>
                <th>'.$quarters[$i]['female_71_80_4']. '</th>
                <th>'.$quarters[$i]['female_71_80_5']. '</th>
                <th>'.$quarters[$i]['female_71_80_6']. '</th>
                <th>'.$quarters[$i]['female_71_80_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['female_71_80_total'].'</th>
         </tr>

            <tr>
                <th style="background-color: #e9f7ad;">81-abou</th>
                <th>'.$quarters[$i]['male_81_1']. '</th>
                <th>'.$quarters[$i]['male_81_2']. '</th>
                <th>'.$quarters[$i]['male_81_3']. '</th>
                <th>'.$quarters[$i]['male_81_4']. '</th>
                <th>'.$quarters[$i]['male_81_5']. '</th>
                <th>'.$quarters[$i]['male_81_6']. '</th>
                <th>'.$quarters[$i]['male_81_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['male_81_total']. '</th>
                <th>'.$quarters[$i]['female_80_1']. '</th>
                <th>'.$quarters[$i]['female_80_2']. '</th>
                <th>'.$quarters[$i]['female_80_3']. '</th>
                <th>'.$quarters[$i]['female_80_4']. '</th>
                <th>'.$quarters[$i]['female_80_5']. '</th>
                <th>'.$quarters[$i]['female_80_6']. '</th>
                <th>'.$quarters[$i]['female_80_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['female_80_total'].'</th>
         </tr>






        <tr>
                <th style="background-color: #e9f7ad;">Total</th>
           
                <th>'.$quarters[$i]['male_total_1']. '</th>
                <th>'.$quarters[$i]['male_total_2']. '</th>
                <th>'.$quarters[$i]['male_total_3']. '</th>
                <th>'.$quarters[$i]['male_total_4']. '</th>
                <th>'.$quarters[$i]['male_total_5']. '</th>
                <th>'.$quarters[$i]['male_total_6']. '</th>
                <th>'.$quarters[$i]['male_total_7']. '</th>
            <th style="background-color: #ffe500;">'.$quarters[$i]['male_total_total']. '</th>
                <th>'.$quarters[$i]['female_total_1']. '</th>
                <th>'.$quarters[$i]['female_total_2']. '</th>
                <th>'.$quarters[$i]['female_total_3']. '</th>
                <th>'.$quarters[$i]['female_total_4']. '</th>
                <th>'.$quarters[$i]['female_total_5']. '</th>
                <th>'.$quarters[$i]['female_total_6']. '</th>
                <th>'.$quarters[$i]['female_total_7']. '</th>
            <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_male_total_total']. '</th>
           

 </tr>


 <tr>  
           <th colspan="17" style=" text-align: center;background-color: #e9f7ad;"  >SUBSEQUENT VISITS 2</th>


 </tr>

         <tr>

        
         <td rowspan="2" style="background-color: #e9f7ad;"> 
         <span id="A">AGE </span>
         <hr/>
         <span>STAGE</span>
         </td>

         
         <td colspan="7" style="background-color: #e9f7ad;">MALE</td>
         <td rowspan="2" style="background-color: #e9f7ad;">TOTAL</td>
         <td colspan="7" style="background-color: #e9f7ad;">FEMALE</td>
         <td rowspan="2" style="background-color: #e9f7ad;">TOTAL</td>
    
        </tr>
<tr>
    <th colspan="1" style="background-color: #e9f7ad;">I</th>
    <th colspan="1" style="background-color: #e9f7ad;">II</th>
    <th colspan="1" style="background-color: #e9f7ad;">III</th>
    <th colspan="1" style="background-color: #e9f7ad;">IV</th>
    <th colspan="1" style="background-color: #e9f7ad;">V</th>
    <th colspan="1" style="background-color: #e9f7ad;">VI</th>
    <th colspan="1" style="background-color: #e9f7ad;">VII</th>




    <th colspan="1" style="background-color: #e9f7ad;">I</th>
    <th colspan="1" style="background-color: #e9f7ad;">II</th>
    <th colspan="1" style="background-color: #e9f7ad;">III</th>
    <th colspan="1" style="background-color: #e9f7ad;">IV</th>
    <th colspan="1" style="background-color: #e9f7ad;">V</th>
    <th colspan="1" style="background-color: #e9f7ad;">VI</th>
    <th colspan="1" style="background-color: #e9f7ad;">VII</th>
</tr>






            <tr>
          
                <th style="background-color: #e9f7ad;">o - 10</th>
                <th>'.$quarters[$i]['subsequent_male_0_10_1']. '</th>
                <th>'.$quarters[$i]['subsequent_male_0_10_2']. '</th>
                <th>'.$quarters[$i]['subsequent_male_0_10_3']. '</th>
                <th>'.$quarters[$i]['subsequent_male_0_10_4']. '</th>
                <th>'.$quarters[$i]['subsequent_male_0_10_5']. '</th>
                <th>'.$quarters[$i]['subsequent_male_0_10_6']. '</th>
                <th>'.$quarters[$i]['subsequent_male_0_10_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_male_0_10_total']. '</th>
                <th>'.$quarters[$i]['subsequent_female_0_10_1']. '</th>
                <th>'.$quarters[$i]['subsequent_female_0_10_2']. '</th>
                <th>'.$quarters[$i]['subsequent_female_0_10_3']. '</th>
                <th>'.$quarters[$i]['subsequent_female_0_10_4']. '</th>
                <th>'.$quarters[$i]['subsequent_female_0_10_5']. '</th>
                <th>'.$quarters[$i]['subsequent_female_0_10_6']. '</th>
                <th>'.$quarters[$i]['subsequent_female_0_10_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_female_0_10_total'].'</th>
         </tr>

          <tr>
                <th style="background-color: #e9f7ad;">11- 20</th>
                <th>'.$quarters[$i]['subsequent_male_11_20_1']. '</th>
                <th>'.$quarters[$i]['subsequent_male_11_20_2']. '</th>
                <th>'.$quarters[$i]['subsequent_male_11_20_3']. '</th>
                <th>'.$quarters[$i]['subsequent_male_11_20_4']. '</th>
                <th>'.$quarters[$i]['subsequent_male_11_20_5']. '</th>
                <th>'.$quarters[$i]['subsequent_male_11_20_6']. '</th>
                <th>'.$quarters[$i]['subsequent_male_11_20_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_male_11_20_total']. '</th>
                <th>'.$quarters[$i]['subsequent_female_11_20_1']. '</th>
                <th>'.$quarters[$i]['subsequent_female_11_20_2']. '</th>
                <th>'.$quarters[$i]['subsequent_female_11_20_3']. '</th>
                <th>'.$quarters[$i]['subsequent_female_11_20_4']. '</th>
                <th>'.$quarters[$i]['subsequent_female_11_20_5']. '</th>
                <th>'.$quarters[$i]['subsequent_female_11_20_6']. '</th>
                <th>'.$quarters[$i]['subsequent_female_11_20_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_female_11_20_total'].'</th>
         </tr>

         <tr>
                <th style="background-color: #e9f7ad;">21-30</th>
                <th>'.$quarters[$i]['subsequent_male_21_30_1']. '</th>
                <th>'.$quarters[$i]['subsequent_male_21_30_2']. '</th>
                <th>'.$quarters[$i]['subsequent_male_21_30_3']. '</th>
                <th>'.$quarters[$i]['subsequent_male_21_30_4']. '</th>
                <th>'.$quarters[$i]['subsequent_male_21_30_5']. '</th>
                <th>'.$quarters[$i]['subsequent_male_21_30_6']. '</th>
                <th>'.$quarters[$i]['subsequent_male_21_30_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_male_21_30_total']. '</th>
                <th>'.$quarters[$i]['subsequent_female_21_30_1']. '</th>
                <th>'.$quarters[$i]['subsequent_female_21_30_2']. '</th>
                <th>'.$quarters[$i]['subsequent_female_21_30_3']. '</th>
                <th>'.$quarters[$i]['subsequent_female_21_30_4']. '</th>
                <th>'.$quarters[$i]['subsequent_female_21_30_5']. '</th>
                <th>'.$quarters[$i]['subsequent_female_21_30_6']. '</th>
                <th>'.$quarters[$i]['subsequent_female_21_30_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_female_21_30_total'].'</th>
         </tr>

          <tr>
                <th style="background-color: #e9f7ad;">31-40</th>
                <th>'.$quarters[$i]['subsequent_male_31_40_1']. '</th>
                <th>'.$quarters[$i]['subsequent_male_31_40_2']. '</th>
                <th>'.$quarters[$i]['subsequent_male_31_40_3']. '</th>
                <th>'.$quarters[$i]['subsequent_male_31_40_4']. '</th>
                <th>'.$quarters[$i]['subsequent_male_31_40_5']. '</th>
                <th>'.$quarters[$i]['subsequent_male_31_40_6']. '</th>
                <th>'.$quarters[$i]['subsequent_male_31_40_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_male_31_40_total']. '</th>
                <th>'.$quarters[$i]['subsequent_female_31_40_1']. '</th>
                <th>'.$quarters[$i]['subsequent_female_31_40_2']. '</th>
                <th>'.$quarters[$i]['subsequent_female_31_40_3']. '</th>
                <th>'.$quarters[$i]['subsequent_female_31_40_4']. '</th>
                <th>'.$quarters[$i]['subsequent_female_31_40_5']. '</th>
                <th>'.$quarters[$i]['subsequent_female_31_40_6']. '</th>
                <th>'.$quarters[$i]['subsequent_female_31_40_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_female_31_40_total'].'</th>
         </tr>

          <tr>
                <th style="background-color: #e9f7ad;">41-50</th>
                <th>'.$quarters[$i]['subsequent_male_41_50_1']. '</th>
                <th>'.$quarters[$i]['subsequent_male_41_50_2']. '</th>
                <th>'.$quarters[$i]['subsequent_male_41_50_3']. '</th>
                <th>'.$quarters[$i]['subsequent_male_41_50_4']. '</th>
                <th>'.$quarters[$i]['subsequent_male_41_50_5']. '</th>
                <th>'.$quarters[$i]['subsequent_male_41_50_6']. '</th>
                <th>'.$quarters[$i]['subsequent_male_41_50_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_male_41_50_total']. '</th>
                <th>'.$quarters[$i]['subsequent_female_41_50_1']. '</th>
                <th>'.$quarters[$i]['subsequent_female_41_50_2']. '</th>
                <th>'.$quarters[$i]['subsequent_female_41_50_3']. '</th>
                <th>'.$quarters[$i]['subsequent_female_41_50_4']. '</th>
                <th>'.$quarters[$i]['subsequent_female_41_50_5']. '</th>
                <th>'.$quarters[$i]['subsequent_female_41_50_6']. '</th>
                <th>'.$quarters[$i]['subsequent_female_41_50_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_female_41_50_total'].'</th>
         </tr>

                  <tr >
                <th style="background-color: #e9f7ad;">51-60</th>
                <th>'.$quarters[$i]['subsequent_male_51_60_1']. '</th>
                <th>'.$quarters[$i]['subsequent_male_51_60_2']. '</th>
                <th>'.$quarters[$i]['subsequent_male_51_60_3']. '</th>
                <th>'.$quarters[$i]['subsequent_male_51_60_4']. '</th>
                <th>'.$quarters[$i]['subsequent_male_51_60_5']. '</th>
                <th>'.$quarters[$i]['subsequent_male_51_60_6']. '</th>
                <th>'.$quarters[$i]['subsequent_male_51_60_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_male_51_60_total']. '</th>
                <th>'.$quarters[$i]['subsequent_female_51_60_1']. '</th>
                <th>'.$quarters[$i]['subsequent_female_51_60_2']. '</th>
                <th>'.$quarters[$i]['subsequent_female_51_60_3']. '</th>
                <th>'.$quarters[$i]['subsequent_female_51_60_4']. '</th>
                <th>'.$quarters[$i]['subsequent_female_51_60_5']. '</th>
                <th>'.$quarters[$i]['subsequent_female_51_60_6']. '</th>
                <th>'.$quarters[$i]['subsequent_female_51_60_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_female_51_60_total'].'</th>
         </tr>

                  <tr>
                <th style="background-color: #e9f7ad;">61-70</th>
                <th>'.$quarters[$i]['subsequent_male_61_70_1']. '</th>
                <th>'.$quarters[$i]['subsequent_male_61_70_2']. '</th>
                <th>'.$quarters[$i]['subsequent_male_61_70_3']. '</th>
                <th>'.$quarters[$i]['subsequent_male_61_70_4']. '</th>
                <th>'.$quarters[$i]['subsequent_male_61_70_5']. '</th>
                <th>'.$quarters[$i]['subsequent_male_61_70_6']. '</th>
                <th>'.$quarters[$i]['subsequent_male_61_70_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_male_61_70_total']. '</th>
                <th>'.$quarters[$i]['subsequent_female_61_70_1']. '</th>
                <th>'.$quarters[$i]['subsequent_female_61_70_2']. '</th>
                <th>'.$quarters[$i]['subsequent_female_61_70_3']. '</th>
                <th>'.$quarters[$i]['subsequent_female_61_70_4']. '</th>
                <th>'.$quarters[$i]['subsequent_female_61_70_5']. '</th>
                <th>'.$quarters[$i]['subsequent_female_61_70_6']. '</th>
                <th>'.$quarters[$i]['subsequent_female_61_70_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_female_61_70_total'].'</th>
         </tr>

                  <tr>
                <th style="background-color: #e9f7ad;">71-80</th>
                <th>'.$quarters[$i]['subsequent_male_71_80_1']. '</th>
                <th>'.$quarters[$i]['subsequent_male_71_80_2']. '</th>
                <th>'.$quarters[$i]['subsequent_male_71_80_3']. '</th>
                <th>'.$quarters[$i]['subsequent_male_71_80_4']. '</th>
                <th>'.$quarters[$i]['subsequent_male_71_80_5']. '</th>
                <th>'.$quarters[$i]['subsequent_male_71_80_6']. '</th>
                <th>'.$quarters[$i]['subsequent_male_71_80_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_male_71_80_total']. '</th>
                <th>'.$quarters[$i]['subsequent_female_71_80_1']. '</th>
                <th>'.$quarters[$i]['subsequent_female_71_80_2']. '</th>
                <th>'.$quarters[$i]['subsequent_female_71_80_3']. '</th>
                <th>'.$quarters[$i]['subsequent_female_71_80_4']. '</th>
                <th>'.$quarters[$i]['subsequent_female_71_80_5']. '</th>
                <th>'.$quarters[$i]['subsequent_female_71_80_6']. '</th>
                <th>'.$quarters[$i]['subsequent_female_71_80_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_female_71_80_total'].'</th>
         </tr>


                           <tr>
                <th style="background-color: #e9f7ad;">81-abou</th>
                <th>'.$quarters[$i]['subsequent_male_80_1']. '</th>
                <th>'.$quarters[$i]['subsequent_male_80_2']. '</th>
                <th>'.$quarters[$i]['subsequent_male_80_3']. '</th>
                <th>'.$quarters[$i]['subsequent_male_80_4']. '</th>
                <th>'.$quarters[$i]['subsequent_male_80_5']. '</th>
                <th>'.$quarters[$i]['subsequent_male_80_6']. '</th>
                <th>'.$quarters[$i]['subsequent_male_80_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_male_80_total']. '</th>
                <th>'.$quarters[$i]['subsequent_female_81_1']. '</th>
                <th>'.$quarters[$i]['subsequent_female_81_2']. '</th>
                <th>'.$quarters[$i]['subsequent_female_81_3']. '</th>
                <th>'.$quarters[$i]['subsequent_female_81_4']. '</th>
                <th>'.$quarters[$i]['subsequent_female_81_5']. '</th>
                <th>'.$quarters[$i]['subsequent_female_81_6']. '</th>
                <th>'.$quarters[$i]['subsequent_female_81_7']. '</th>
                <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_female_81_total'].'</th>
         </tr>






        <tr>
                <th style="background-color: #e9f7ad;">Total</th>
                <th>'.$quarters[$i]['subsequent_male_total_1']. '</th>
                <th>'.$quarters[$i]['subsequent_male_total_2']. '</th>
                <th>'.$quarters[$i]['subsequent_male_total_3']. '</th>
                <th>'.$quarters[$i]['subsequent_male_total_4']. '</th>
                <th>'.$quarters[$i]['subsequent_male_total_5']. '</th>
                <th>'.$quarters[$i]['subsequent_male_total_6']. '</th>
                <th>'.$quarters[$i]['subsequent_male_total_7']. '</th>
                    <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_male_total_total']. '</th>
                <th>'.$quarters[$i]['subsequent_female_total_1']. '</th>
                <th>'.$quarters[$i]['subsequent_female_total_2']. '</th>
                <th>'.$quarters[$i]['subsequent_female_total_3']. '</th>
                <th>'.$quarters[$i]['subsequent_female_total_4']. '</th>
                <th>'.$quarters[$i]['subsequent_female_total_5']. '</th>
                <th>'.$quarters[$i]['subsequent_female_total_6']. '</th>
                <th>'.$quarters[$i]['subsequent_female_total_7']. '</th>
                     <th style="background-color: #ffe500;">'.$quarters[$i]['subsequent_female_total_7']. '</th>
                

              </tr>';




}


        if (count($quarters) == 4) {
            $viewDataAnnual = $viewDataAnnual . '

            <tr>

                <th style="background-color: #e9f7ad;">o - 10</th>
                <th>'.$annual['male_0_10_1']. '</th>
                <th>'.$annual['male_0_10_2']. '</th>
                <th>'.$annual['male_0_10_3']. '</th>
                <th>'.$annual['male_0_10_4']. '</th>
                <th>'.$annual['male_0_10_5']. '</th>
                <th>'.$annual['male_0_10_6']. '</th>
                <th>'.$annual['male_0_10_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual['male_0_10_total']. '</th>
                <th>'.$annual['female_0_10_1']. '</th>
                <th>'.$annual['female_0_10_2']. '</th>
                <th>'.$annual['female_0_10_3']. '</th>
                <th>'.$annual['female_0_10_4']. '</th>
                <th>'.$annual['female_0_10_5']. '</th>
                <th>'.$annual['female_0_10_6']. '</th>
                <th>'.$annual['female_0_10_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual['female_0_10_total'].'</th>
         </tr>

          <tr>
                <th style="background-color: #e9f7ad;">11- 20</th>
                <th>'.$annual[$i]['male_11_20_1']. '</th>
                <th>'.$annual[$i]['male_11_20_2']. '</th>
                <th>'.$annual[$i]['male_11_20_3']. '</th>
                <th>'.$annual[$i]['male_11_20_4']. '</th>
                <th>'.$annual[$i]['male_11_20_5']. '</th>
                <th>'.$annual[$i]['male_11_20_6']. '</th>
                <th>'.$annual[$i]['male_11_20_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual[$i]['male_11_20_total']. '</th>
                <th>'.$annual[$i]['female_11_20_1']. '</th>
                <th>'.$annual[$i]['female_11_20_2']. '</th>
                <th>'.$annual[$i]['female_11_20_3']. '</th>
                <th>'.$annual[$i]['female_11_20_4']. '</th>
                <th>'.$annual[$i]['female_11_20_5']. '</th>
                <th>'.$annual[$i]['female_11_20_6']. '</th>
                <th>'.$annual[$i]['female_11_20_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual[$i]['female_11_20_total'].'</th>
         </tr>

         <tr>
                <th style="background-color: #e9f7ad;">21-30</th>
                <th>'.$annual['male_21_30_1']. '</th>
                <th>'.$annual['male_21_30_2']. '</th>
                <th>'.$annual['male_21_30_3']. '</th>
                <th>'.$annual['male_21_30_4']. '</th>
                <th>'.$annual['male_21_30_5']. '</th>
                <th>'.$annual['male_21_30_6']. '</th>
                <th>'.$annual['male_21_30_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual['male_21_30_total']. '</th>
                <th>'.$annual['female_21_30_1']. '</th>
                <th>'.$annual['female_21_30_2']. '</th>
                <th>'.$annual['female_21_30_3']. '</th>
                <th>'.$annual['female_21_30_4']. '</th>
                <th>'.$annual['female_21_30_5']. '</th>
                <th>'.$annual['female_21_30_6']. '</th>
                <th>'.$annual['female_21_30_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual['female_21_30_total'].'</th>
         </tr>

          <tr>
                <th style="background-color: #e9f7ad;">31-40</th>
                <th>'.$annual['male_31_40_1']. '</th>
                <th>'.$annual['male_31_40_2']. '</th>
                <th>'.$annual['male_31_40_3']. '</th>
                <th>'.$annual['male_31_40_4']. '</th>
                <th>'.$annual['male_31_40_5']. '</th>
                <th>'.$annual['male_31_40_6']. '</th>
                <th>'.$annual['male_31_40_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual['male_31_40_total']. '</th>
                <th>'.$annual['female_31_40_1']. '</th>
                <th>'.$annual['female_31_40_2']. '</th>
                <th>'.$annual['female_31_40_3']. '</th>
                <th>'.$annual['female_31_40_4']. '</th>
                <th>'.$annual['female_31_40_5']. '</th>
                <th>'.$annual['female_31_40_6']. '</th>
                <th>'.$annual['female_31_40_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual['female_31_40_total'].'</th>
         </tr>

          <tr>
                <th style="background-color: #e9f7ad;">41-50</th>
                <th>'.$annual['male_41_50_1']. '</th>
                <th>'.$annual['male_41_50_2']. '</th>
                <th>'.$annual['male_41_50_3']. '</th>
                <th>'.$annual['male_41_50_4']. '</th>
                <th>'.$annual['male_41_50_5']. '</th>
                <th>'.$annual['male_41_50_6']. '</th>
                <th>'.$annual['male_41_50_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual['male_41_50_total']. '</th>
                <th>'.$annual['female_41_50_1']. '</th>
                <th>'.$annual['female_41_50_2']. '</th>
                <th>'.$annual['female_41_50_3']. '</th>
                <th>'.$annual['female_41_50_4']. '</th>
                <th>'.$annual['female_41_50_5']. '</th>
                <th>'.$annual['female_41_50_6']. '</th>
                <th>'.$annual['female_41_50_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual['female_41_50_total'].'</th>
         </tr>


                   <tr>
                <th style="background-color: #e9f7ad;">51-60</th>
                <th>'.$annual['male_51_60_1']. '</th>
                <th>'.$annual['male_51_60_2']. '</th>
                <th>'.$annual['male_51_60_3']. '</th>
                <th>'.$annual['male_51_60_4']. '</th>
                <th>'.$annual['male_51_60_5']. '</th>
                <th>'.$annual['male_51_60_6']. '</th>
                <th>'.$annual['male_51_60_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual['male_51_60_total']. '</th>
                <th>'.$annual['female_51_60_1']. '</th>
                <th>'.$annual['female_51_60_2']. '</th>
                <th>'.$annual['female_51_60_3']. '</th>
                <th>'.$annual['female_51_60_4']. '</th>
                <th>'.$annual['female_51_60_5']. '</th>
                <th>'.$annual['female_51_60_6']. '</th>
                <th>'.$annual['female_51_60_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual['female_51_60_total'].'</th>
         </tr>



                   <tr>
                <th style="background-color: #e9f7ad;">61-70</th>
                <th>'.$annual['male_61_70_']. '</th>
                <th>'.$annual['male_61_70_2']. '</th>
                <th>'.$annual['male_61_70_3']. '</th>
                <th>'.$annual['male_61_70_4']. '</th>
                <th>'.$annual['male_61_70_5']. '</th>
                <th>'.$annual['male_61_70_6']. '</th>
                <th>'.$annual['male_61_70_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual['male_61_70_total']. '</th>
                <th>'.$annual['female_61_70_']. '</th>
                <th>'.$annual['female_61_70_2']. '</th>
                <th>'.$annual['female_61_70_3']. '</th>
                <th>'.$annual['female_61_70_4']. '</th>
                <th>'.$annual['female_61_70_5']. '</th>
                <th>'.$annual['female_61_70_6']. '</th>
                <th>'.$annual['female_61_70_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual['female_61_70_total'].'</th>
         </tr>



                   <tr>
                <th style="background-color: #e9f7ad;">71-80</th>
                <th>'.$annual['male_71_80_1']. '</th>
                <th>'.$annual['male_71_80_2']. '</th>
                <th>'.$annual['male_71_80_3']. '</th>
                <th>'.$annual['male_71_80_4']. '</th>
                <th>'.$annual['male_71_80_5']. '</th>
                <th>'.$annual['male_71_80_6']. '</th>
                <th>'.$annual['male_71_80_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual['male_71_80_total']. '</th>
                <th>'.$annual['female_71_80_1']. '</th>
                <th>'.$annual['female_71_80_2']. '</th>
                <th>'.$annual['female_71_80_3']. '</th>
                <th>'.$annual['female_71_80_4']. '</th>
                <th>'.$annual['female_71_80_5']. '</th>
                <th>'.$annual['female_71_80_6']. '</th>
                <th>'.$annual['female_71_80_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual['female_71_80_total'].'</th>
         </tr>



                            <tr>
                <th style="background-color: #e9f7ad;">81-100</th>
                <th>'.$annual['male_81_1']. '</th>
                <th>'.$annual['male_81_2']. '</th>
                <th>'.$annual['male_81_3']. '</th>
                <th>'.$annual['male_81_4']. '</th>
                <th>'.$annual['male_81_5']. '</th>
                <th>'.$annual['male_81_6']. '</th>
                <th>'.$annual['male_81_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual['male_81_total']. '</th>
                <th>'.$annual['female_80_1']. '</th>
                <th>'.$annual['female_80_2']. '</th>
                <th>'.$annual['female_80_3']. '</th>
                <th>'.$annual['female_80_4']. '</th>
                <th>'.$annual['female_80_5']. '</th>
                <th>'.$annual['female_80_6']. '</th>
                <th>'.$annual['female_80_7']. '</th>
                <th style="background-color: #ffe500;">'.$annual['female_80_total'].'</th>
         </tr>



        <tr>
                <th style="background-color: #e9f7ad;">Total</th>
                <th>'.$annual['male_total_1']. '</th>
                <th>'.$annual['male_total_2']. '</th>
                <th>'.$annual['male_total_3']. '</th>
                <th>'.$annual['male_total_4']. '</th>
                <th>'.$annual['male_total_5']. '</th>
                <th>'.$annual['male_total_6']. '</th>
                <th>'.$annual['male_total_7']. '</th>
                   <th style="background-color: #ffe500;">'.$annual['female_total_total']. '</th>
                <th>'.$annual['female_total_1']. '</th>
                <th>'.$annual['female_total_2']. '</th>
                <th>'.$annual['female_total_3']. '</th>
                <th>'.$annual['female_total_4']. '</th>
                <th>'.$annual['female_total_5']. '</th>
                <th>'.$annual['female_total_6']. '</th>
                <th>'.$annual['female_total_7']. '</th>
                    <th style="background-color: #ffe500;">'.$annual['subsequent_female_total_total']. '</th>
            
      </tr>

        <tr>
                <th colspan="17" style="background-color: #e9f7ad;" >SUBSEQUENT VISITS</th>
       </tr>



        <tr>

       
        <td rowspan="2" style="background-color: #e9f7ad;"> 
        <span id="A">AGE </span>
        <hr/>
        <span>STAGE</span>
        </td>

        
        <td colspan="7" style="background-color: #e9f7ad;">MALE</td>
        <td rowspan="2" style="background-color: #e9f7ad;">TOTAL</td>
        <td colspan="7" style="background-color: #e9f7ad;">FEMALE</td>
        <td rowspan="2" style="background-color: #e9f7ad;">TOTAL</td>
   
        </tr>
<tr>
    <th colspan="1" style="background-color: #e9f7ad;">I</th>
    <th colspan="1" style="background-color: #e9f7ad;">II</th>
    <th colspan="1" style="background-color: #e9f7ad;">III</th>
    <th colspan="1" style="background-color: #e9f7ad;">IV</th>
    <th colspan="1" style="background-color: #e9f7ad;">V</th>
    <th colspan="1" style="background-color: #e9f7ad;">VI</th>
    <th colspan="1" style="background-color: #e9f7ad;">VII</th>




    <th colspan="1" style="background-color: #e9f7ad;">I</th>
    <th colspan="1" style="background-color: #e9f7ad;">II</th>
    <th colspan="1" style="background-color: #e9f7ad;">III</th>
    <th colspan="1" style="background-color: #e9f7ad;">IV</th>
    <th colspan="1" style="background-color: #e9f7ad;">V</th>
    <th colspan="1" style="background-color: #e9f7ad;">VI</th>
    <th colspan="1" style="background-color: #e9f7ad;">VII</th>
</tr>

 </tr>';


}




        }

        $viewData3 = $viewData3 . '
        <tr>
        <th>8 Total Number of lymphoedema patients registered at the clinic </th>
        <th>'. $sumtotal_num_lymphed . '</th>
    </tr>
    <tr>
        <th>9 Total Number of Hydrocele patientstregisterd at the clinic </th>
        <th>'. $sumtotal_num_hydro . '</th>
    </tr>
    <tr>
        <th>follow up MF positive patients </th>
        <th>'. $summf_pos_patient . '</th>
    </tr>';


        
                    if ($export_type == 'PDF') {

    
        $content = ob_get_clean();
    
        $template = view(
            'report/c2_view',
            compact('data'),
            ["dataView2" => $viewData2, "viewData3" => $viewData3, 'district'=> $data['district'], 'month'=> $monthlyy, "dataViewQuarter" => $viewDataQuarters,
             "dataViewAnnual" => $viewDataAnnual,"request_type"=>$request_type,'type'=>$select
             ,'total_num_lymphed'=>$total_num_lymphed12,'total_num_hydro'=>$total_num_hydro12,'mf_pos_patient'=>$mf_pos_patient12,'opd_patient'=>$opd_patient12
             ]
        );
   

        try {
            $html2pdf = new HTML2PDF('P', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
            $html2pdf->pdf->SetTitle('C2 Report');
            $html2pdf->WriteHTML($template);
            $html2pdf->Output('C2_report.pdf');
            ob_flush();
            ob_end_clean();
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }


            } else {

                header('Content-Type: application/xls');
                header('Content-Disposition: attachment; filename=download.xls');
                echo  $template = view(
            'report/c2_view',
            compact('data'),
            ["dataView2" => $viewData2, "viewData3" => $viewData3, 'district'=> $data['district'], 'month'=> $monthlyy, "dataViewQuarter" => $viewDataQuarters,
             "dataViewAnnual" => $viewDataAnnual,"request_type"=>$request_type,'type'=>$select ,'total_num_lymphed'=>$total_num_lymphed12,'total_num_hydro'=>$total_num_hydro12,'mf_pos_patient'=>$mf_pos_patient12,'opd_patient'=>$opd_patient12]
        );

            }


    }



    public function c2_report()
    {
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'report/c2';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }
    
}

?>