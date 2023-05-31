<?php

namespace App\Http\Controllers;

use App\Ento_4;
use App\Ento_4_Indoor;
use App\Ento_4_Outdoor;
use App\Ento_04_Mosq;
use App\Ento_04_mosq_new;
use App\Ento_04_outdoor;



use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


require __DIR__ . '/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Illuminate\Support\Facades\File;


class Ento4Controller extends Controller
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
        $data['template'] = 'ento_04/ento_04';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }

    public function ento4indoor()
    {
        $mosquito_list = DB::table('mosquito_species')
            ->select('*')
            ->orderBy('data', 'asc')
            ->get();
        // if (Auth::user()->role !== "ADMIN" & Auth::user()->role !== "AFC") {
        $list = DB::table('ento_04')
            ->select('*')
            ->where('user_name', Auth::user()->email)
            ->orderBy('ento_04_id', 'desc')
            ->get();
        // } else {
        //     $list = DB::table('ento_04')
        //     ->select('*')
        //     ->orderBy('ento_04_id', 'desc')
        //     ->get();
        // }
        $data['template'] = 'ento_04/ento_04_indoor';
        return view('template_user/template', compact('data'), ["ento4_list" => $list, "mosquito_list" => $mosquito_list]);
    }

    public function ento4outdoor()
    {
        $mosquito_list = DB::table('mosquito_species')
            ->select('*')
            ->orderBy('data', 'asc')
            ->get();

        // if (Auth::user()->role !== "ADMIN" & Auth::user()->role !== "AFC") {
        $list = DB::table('ento_04')
            ->select('*')
            ->where('user_name', Auth::user()->email)
            ->orderBy('ento_04_id', 'desc')
            ->get();
        // } else {
        //     $list = DB::table('ento_04')
        //     ->select('*')
        //     ->orderBy('ento_04_id', 'desc')
        //     ->get();
        // }
        $data['template'] = 'ento_04/ento_04_outdoor';
        return view('template_user/template', compact('data'), ["ento4_list" => $list, "mosquito_list" => $mosquito_list]);
    }

    public function getMohByDistrict($id)
    {
        $moh_list = DB::table('moh')
            ->join('district', 'district.district_1', '=', 'moh.district_id')
            ->orderBy('moh', 'ASC')
            ->select('*')
            ->where('district.district', $id)
            ->get();
        foreach ($moh_list as $s) {
            print_r('<option value="' . $s->moh . '">' . $s->moh . '</option>');
        }
    }

    public function getPhi($id)
    {
        $moh_list = DB::table('moh_phm')
            ->select('*')
            ->where('DSD/MOH', $id)
            ->get();
        foreach ($moh_list as $s) {
            print_r('<option value="' . $s->ND_PHM_WARD . '">' . $s->ND_PHM_WARD . '</option>');
        }
    }

    public function getaddress($id)
    {

        $data = 0;
        $form = "";
        $moh_list = DB::table('ento_05')
            ->select('*')
            ->where('ento_05_id', $id)
            ->get();

        foreach ($moh_list as $s) {
            $form = $s->main_form_type;
            $mid = $s->main_form_id;
        }

        switch ($form) {

            case "ento_01":
                $address_list = DB::table('ento_01_data')
                    ->select('*')
                    ->where('ento_01_id', $mid)
                    ->get();
                foreach ($address_list as $listad) {
                    $data = 1;
                    print_r('<option value="' . $listad->house_no . '">' . $listad->house_no . '</option>');
                }
                break;

            case "ento_02":
                $address_list = DB::table('ento_02_data')
                    ->select('*')
                    ->where('ento_02_id', $mid)
                    ->get();

                foreach ($address_list as $listad) {
                    $data = 1;
                    print_r('<option value="' . $listad->chief_occupant . '">' . $listad->chief_occupant . '</option>');
                }
                break;

            case "ento_03":
                $address_list = DB::table('ento_03')
                    ->select('*')
                    ->where('ento_03_id', $mid)
                    ->get();
                foreach ($address_list as $listad) {

                    $data = 1;
                    print_r('<option value="' . $listad->address . '">' . $listad->address . '</option>');
                }
                break;

            case "ento_04":
                $address_list = DB::table('ento_04')
                    ->select('*')
                    ->where('ento_04_id', $mid)
                    ->get();
                foreach ($address_list as $listad) {

                    $data = 1;
                    print_r('<option value="' . $listad->locality . '">' . $listad->locality . '</option>');
                }
                break;

            default:
                print_r('<option value="">No data faund</option>');
        }
    }

    public function getEntoIndoorData($id)
    {
        $list2 = DB::table('ento_04_indoor')
            ->select('*')
            ->where('ento_04_id', $id)
            ->get();

        for ($i = 0; $i < count($list2); $i++) {
            $mosquitoes = DB::table('ento_04_mosq')
                ->select('*')
                ->where('ento_04_id', $list2[$i]->id)
                ->where('form_type', 'indoor')
                ->get();

            $list2[$i]->mosq_spec_stat = array();
            $list2[$i]->mosq_spec_stat7_8 = array();
            $list2[$i]->mosq_spec_stat8_9 = array();
            $list2[$i]->mosq_spec_stat9_10 = array();
            $list2[$i]->mosq_spec_stat10_11 = array();
            $list2[$i]->mosq_spec_stat11_12 = array();
            $list2[$i]->mosq_spec_stat12_1 = array();
            $list2[$i]->mosq_spec_stat1_2 = array();
            $list2[$i]->mosq_spec_stat2_3 = array();
            $list2[$i]->mosq_spec_stat3_4 = array();
            $list2[$i]->mosq_spec_stat4_5 = array();
            $list2[$i]->mosq_spec_stat5_6 = array();

            $list2[$i]->mos_number = array();
            $list2[$i]->mos_number7_8 = array();
            $list2[$i]->mos_number8_9 = array();
            $list2[$i]->mos_number9_10 = array();
            $list2[$i]->mos_number10_11 = array();
            $list2[$i]->mos_number11_12 = array();
            $list2[$i]->mos_number12_1 = array();
            $list2[$i]->mos_number1_2 = array();
            $list2[$i]->mos_number2_3 = array();
            $list2[$i]->mos_number3_4 = array();
            $list2[$i]->mos_number4_5 = array();
            $list2[$i]->mos_number5_6 = array();

            for ($j = 0; $j < count($mosquitoes); $j++) {
                switch ($mosquitoes[$j]->time) {
                    case "6to7":

                        array_push($list2[$i]->mosq_spec_stat, $mosquitoes[$j]);
                        array_push($list2[$i]->mos_number, $mosquitoes[$j]);

                        break;
                    case "7to8":
                        array_push($list2[$i]->mosq_spec_stat7_8, $mosquitoes[$j]);
                        array_push($list2[$i]->mos_number7_8, $mosquitoes[$j]);
                        break;
                    case "8to9":
                        array_push($list2[$i]->mosq_spec_stat8_9, $mosquitoes[$j]);
                        array_push($list2[$i]->mos_number8_9, $mosquitoes[$j]);
                        break;
                    case "9to10":
                        array_push($list2[$i]->mosq_spec_stat9_10, $mosquitoes[$j]);
                        array_push($list2[$i]->mos_number9_10, $mosquitoes[$j]);
                        break;
                    case "10to11":
                        array_push($list2[$i]->mosq_spec_stat10_11, $mosquitoes[$j]);
                        array_push($list2[$i]->mos_number10_11, $mosquitoes[$j]);
                        break;
                    case "11to12":
                        array_push($list2[$i]->mosq_spec_stat11_12, $mosquitoes[$j]);
                        array_push($list2[$i]->mos_number11_12, $mosquitoes[$j]);
                        break;
                    case "12to1":
                        array_push($list2[$i]->mosq_spec_stat12_1, $mosquitoes[$j]);
                        array_push($list2[$i]->mos_number12_1, $mosquitoes[$j]);
                        break;
                    case "1to2":
                        array_push($list2[$i]->mosq_spec_stat1_2, $mosquitoes[$j]);
                        array_push($list2[$i]->mos_number1_2, $mosquitoes[$j]);
                        break;
                    case "2to3":
                        array_push($list2[$i]->mosq_spec_stat2_3, $mosquitoes[$j]);
                        array_push($list2[$i]->mos_number2_3, $mosquitoes[$j]);
                        break;
                    case "3to4":
                        array_push($list2[$i]->mosq_spec_stat3_4, $mosquitoes[$j]);
                        array_push($list2[$i]->mos_number3_4, $mosquitoes[$j]);
                        break;
                    case "4to5":
                        array_push($list2[$i]->mosq_spec_stat4_5, $mosquitoes[$j]);
                        array_push($list2[$i]->mos_number4_5, $mosquitoes[$j]);
                        break;
                    case "5to6":
                        array_push($list2[$i]->mosq_spec_stat5_6, $mosquitoes[$j]);
                        array_push($list2[$i]->mos_number5_6, $mosquitoes[$j]);
                        break;
                }
            }
        }

        // -----------------------------------------------get spe total

        $display_array = array();
        for ($i = 0; $i < count($list2); $i++) {
            $mosquitoes_species = DB::table('ento_04_mosq')
                ->select('mosq_species')
                ->where('ento_04_id', $list2[$i]->id)
                ->where('form_type', 'indoor')
                ->distinct('name')
                ->get();

            $string_total = "";
            $x = 0;
            $y = 0;
            foreach ($mosquitoes_species as $rowmos) {
                $mosspec = $rowmos->mosq_species;

                for ($i = 0; $i < count($list2); $i++) {
                    $x++;
                    $y++;
                    $mosquitoes_species_sum = DB::table('ento_04_mosq')
                        ->select('*')
                        ->where('ento_04_id', $list2[$i]->id)
                        ->where('form_type', 'indoor')
                        ->where('mosq_species', $mosspec)
                        ->SUM('mos_number');
                    // array_push($display_array ,"Total ".$mosspec."=    ".$mosquitoes_species_sum  );

                }
                $rowmos->total_mos = $mosquitoes_species_sum;

                $display_array[] = $rowmos;
            }
        }

        // ------------------------------get spe total

        $total_mosq_spec_stat = 0;
        $total_mosq_spec_stat7_8 = 0;
        $total_mosq_spec_stat8_9 = 0;
        $total_mosq_spec_stat9_10 = 0;
        $total_mosq_spec_stat10_11 = 0;
        $total_mosq_spec_stat11_12 = 0;
        $total_mosq_spec_stat12_1 = 0;
        $total_mosq_spec_stat1_2 = 0;
        $total_mosq_spec_stat2_3 = 0;
        $total_mosq_spec_stat3_4 = 0;
        $total_mosq_spec_stat4_5 = 0;
        $total_mosq_spec_stat5_6 = 0;

        foreach ($list2 as $ento4) {

            if (count($ento4->mosq_spec_stat) > 0) {
                foreach ($ento4->mosq_spec_stat as $row) {
                    $total_mosq_spec_stat = $total_mosq_spec_stat + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat7_8) > 0) {
                foreach ($ento4->mosq_spec_stat7_8 as $row) {
                    $total_mosq_spec_stat7_8 = $total_mosq_spec_stat7_8 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat8_9) > 0) {
                foreach ($ento4->mosq_spec_stat8_9 as $row) {
                    $total_mosq_spec_stat8_9 = $total_mosq_spec_stat8_9 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat9_10) > 0) {
                foreach ($ento4->mosq_spec_stat9_10 as $row) {
                    $total_mosq_spec_stat9_10 = $total_mosq_spec_stat9_10 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat10_11) > 0) {
                foreach ($ento4->mosq_spec_stat9_10 as $row) {
                    $total_mosq_spec_stat10_11 = $total_mosq_spec_stat10_11 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat11_12) > 0) {
                foreach ($ento4->mosq_spec_stat11_12 as $row) {
                    $total_mosq_spec_stat11_12 = $total_mosq_spec_stat11_12 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat12_1) > 0) {
                foreach ($ento4->mosq_spec_stat12_1 as $row) {
                    $total_mosq_spec_stat12_1 = $total_mosq_spec_stat12_1 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat1_2) > 0) {
                foreach ($ento4->mosq_spec_stat1_2 as $row) {
                    $total_mosq_spec_stat1_2 = $total_mosq_spec_stat1_2 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat2_3) > 0) {
                foreach ($ento4->mosq_spec_stat2_3 as $row) {
                    $total_mosq_spec_stat2_3 = $total_mosq_spec_stat2_3 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat3_4) > 0) {
                foreach ($ento4->mosq_spec_stat3_4 as $row) {
                    $total_mosq_spec_stat3_4 = $total_mosq_spec_stat3_4 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat4_5) > 0) {
                foreach ($ento4->mosq_spec_stat4_5 as $row) {
                    $total_mosq_spec_stat4_5 = $total_mosq_spec_stat4_5 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat5_6) > 0) {
                foreach ($ento4->mosq_spec_stat5_6 as $row) {
                    $total_mosq_spec_stat5_6 = $total_mosq_spec_stat5_6 + $row->mos_number;
                }
            }
        }

        $dara = array(
            $total_mosq_spec_stat,
            $total_mosq_spec_stat7_8,
            $total_mosq_spec_stat8_9,
            $total_mosq_spec_stat9_10,
            $total_mosq_spec_stat10_11,
            $total_mosq_spec_stat11_12,
            $total_mosq_spec_stat12_1,
            $total_mosq_spec_stat1_2,
            $total_mosq_spec_stat2_3,
            $total_mosq_spec_stat3_4,
            $total_mosq_spec_stat4_5,
            $total_mosq_spec_stat5_6,
        );

        $mosquito_list = DB::table('mosquito_species')
            ->select('*')
            ->orderBy('data', 'asc')
            ->get();

        $list = DB::table('ento_04')
            ->select('*')
            ->orderBy('ento_04_id', 'desc')
            ->get();

        dd($list2);

        $data['template'] = 'ento_04/ento_04_indoor_view';
        return view('template_user/template', compact('data'), ["ento4_indoor_list" => $list2, "ento4_list" => $list, "mosquito_list" => $mosquito_list, "total" => $dara, "string_total" => $display_array]);
    }

    public function getEntoOutdoorData($id)
    {
        $outdoor = DB::table('ento_04_outdoor')
            ->select('*')
            ->where('ento_04_id', $id)
            ->get();

        for ($i = 0; $i < count($outdoor); $i++) {
            $mosquitoes = DB::table('ento_04_mosq')
                ->select('*')
                ->where('ento_04_id', $outdoor[$i]->id)
                ->where('form_type', 'outdoor')
                ->get();

            $outdoor[$i]->mosq_spec_stat = array();
            $outdoor[$i]->mosq_spec_stat7_8 = array();
            $outdoor[$i]->mosq_spec_stat8_9 = array();
            $outdoor[$i]->mosq_spec_stat9_10 = array();
            $outdoor[$i]->mosq_spec_stat10_11 = array();
            $outdoor[$i]->mosq_spec_stat11_12 = array();
            $outdoor[$i]->mosq_spec_stat12_1 = array();
            $outdoor[$i]->mosq_spec_stat1_2 = array();
            $outdoor[$i]->mosq_spec_stat2_3 = array();
            $outdoor[$i]->mosq_spec_stat3_4 = array();
            $outdoor[$i]->mosq_spec_stat4_5 = array();
            $outdoor[$i]->mosq_spec_stat5_6 = array();

            $outdoor[$i]->mos_number = array();
            $outdoor[$i]->mos_number7_8 = array();
            $outdoor[$i]->mos_number8_9 = array();
            $outdoor[$i]->mos_number9_10 = array();
            $outdoor[$i]->mos_number10_11 = array();
            $outdoor[$i]->mos_number11_12 = array();
            $outdoor[$i]->mos_number12_1 = array();
            $outdoor[$i]->mos_number1_2 = array();
            $outdoor[$i]->mos_number2_3 = array();
            $outdoor[$i]->mos_number3_4 = array();
            $outdoor[$i]->mos_number4_5 = array();
            $outdoor[$i]->mos_number5_6 = array();

            for ($j = 0; $j < count($mosquitoes); $j++) {
                switch ($mosquitoes[$j]->time) {
                    case "6to7":
                        array_push($outdoor[$i]->mosq_spec_stat, $mosquitoes[$j]);
                        array_push($outdoor[$i]->mos_number, $mosquitoes[$j]);
                        break;
                    case "7to8":
                        array_push($outdoor[$i]->mosq_spec_stat7_8, $mosquitoes[$j]);
                        array_push($outdoor[$i]->mos_number7_8, $mosquitoes[$j]);
                        break;
                    case "8to9":
                        array_push($outdoor[$i]->mosq_spec_stat8_9, $mosquitoes[$j]);
                        array_push($outdoor[$i]->mos_number8_9, $mosquitoes[$j]);
                        break;
                    case "9to10":
                        array_push($outdoor[$i]->mosq_spec_stat9_10, $mosquitoes[$j]);
                        array_push($outdoor[$i]->mos_number9_10, $mosquitoes[$j]);
                        break;
                    case "10to11":
                        array_push($outdoor[$i]->mosq_spec_stat10_11, $mosquitoes[$j]);
                        array_push($outdoor[$i]->mos_number10_11, $mosquitoes[$j]);
                        break;
                    case "11to12":
                        array_push($outdoor[$i]->mosq_spec_stat11_12, $mosquitoes[$j]);
                        array_push($outdoor[$i]->mos_number11_12, $mosquitoes[$j]);
                        break;
                    case "12to1":
                        array_push($outdoor[$i]->mosq_spec_stat12_1, $mosquitoes[$j]);
                        array_push($outdoor[$i]->mos_number12_1, $mosquitoes[$j]);
                        break;
                    case "1to2":
                        array_push($outdoor[$i]->mosq_spec_stat1_2, $mosquitoes[$j]);
                        array_push($outdoor[$i]->mos_number1_2, $mosquitoes[$j]);
                        break;
                    case "2to3":
                        array_push($outdoor[$i]->mosq_spec_stat2_3, $mosquitoes[$j]);
                        array_push($outdoor[$i]->mos_number2_3, $mosquitoes[$j]);
                        break;
                    case "3to4":
                        array_push($outdoor[$i]->mosq_spec_stat3_4, $mosquitoes[$j]);
                        array_push($outdoor[$i]->mos_number3_4, $mosquitoes[$j]);
                        break;
                    case "4to5":
                        array_push($outdoor[$i]->mosq_spec_stat4_5, $mosquitoes[$j]);
                        array_push($outdoor[$i]->mos_number4_5, $mosquitoes[$j]);
                        break;
                    case "5to6":
                        array_push($outdoor[$i]->mosq_spec_stat5_6, $mosquitoes[$j]);
                        array_push($outdoor[$i]->mos_number5_6, $mosquitoes[$j]);
                        break;
                }
            }
        }

        $mosquito_list = DB::table('mosquito_species')
            ->select('*')
            ->orderBy('data', 'asc')
            ->get();
        $list = DB::table('ento_04')
            ->select('*')
            ->orderBy('ento_04_id', 'desc')
            ->get();

        $total_mosq_spec_stat = 0;
        $total_mosq_spec_stat7_8 = 0;
        $total_mosq_spec_stat8_9 = 0;
        $total_mosq_spec_stat9_10 = 0;
        $total_mosq_spec_stat10_11 = 0;
        $total_mosq_spec_stat11_12 = 0;
        $total_mosq_spec_stat12_1 = 0;
        $total_mosq_spec_stat1_2 = 0;
        $total_mosq_spec_stat2_3 = 0;
        $total_mosq_spec_stat3_4 = 0;
        $total_mosq_spec_stat4_5 = 0;
        $total_mosq_spec_stat5_6 = 0;

        foreach ($outdoor as $ento4) {

            if (count($ento4->mosq_spec_stat) > 0) {
                foreach ($ento4->mosq_spec_stat as $row) {
                    $total_mosq_spec_stat = $total_mosq_spec_stat + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat7_8) > 0) {
                foreach ($ento4->mosq_spec_stat7_8 as $row) {
                    $total_mosq_spec_stat7_8 = $total_mosq_spec_stat7_8 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat8_9) > 0) {
                foreach ($ento4->mosq_spec_stat8_9 as $row) {
                    $total_mosq_spec_stat8_9 = $total_mosq_spec_stat8_9 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat9_10) > 0) {
                foreach ($ento4->mosq_spec_stat9_10 as $row) {
                    $total_mosq_spec_stat9_10 = $total_mosq_spec_stat9_10 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat10_11) > 0) {
                foreach ($ento4->mosq_spec_stat9_10 as $row) {
                    $total_mosq_spec_stat10_11 = $total_mosq_spec_stat10_11 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat11_12) > 0) {
                foreach ($ento4->mosq_spec_stat11_12 as $row) {
                    $total_mosq_spec_stat11_12 = $total_mosq_spec_stat11_12 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat12_1) > 0) {
                foreach ($ento4->mosq_spec_stat12_1 as $row) {
                    $total_mosq_spec_stat12_1 = $total_mosq_spec_stat12_1 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat1_2) > 0) {
                foreach ($ento4->mosq_spec_stat1_2 as $row) {
                    $total_mosq_spec_stat1_2 = $total_mosq_spec_stat1_2 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat2_3) > 0) {
                foreach ($ento4->mosq_spec_stat2_3 as $row) {
                    $total_mosq_spec_stat2_3 = $total_mosq_spec_stat2_3 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat3_4) > 0) {
                foreach ($ento4->mosq_spec_stat3_4 as $row) {
                    $total_mosq_spec_stat3_4 = $total_mosq_spec_stat3_4 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat4_5) > 0) {
                foreach ($ento4->mosq_spec_stat4_5 as $row) {
                    $total_mosq_spec_stat4_5 = $total_mosq_spec_stat4_5 + $row->mos_number;
                }
            }

            if (count($ento4->mosq_spec_stat5_6) > 0) {
                foreach ($ento4->mosq_spec_stat5_6 as $row) {
                    $total_mosq_spec_stat5_6 = $total_mosq_spec_stat5_6 + $row->mos_number;
                }
            }
        }

        // -----------------------------------------------get spe total

        $display_array = array();

        for ($i = 0; $i < count($outdoor); $i++) {

            $mosquitoes_species = DB::table('ento_04_mosq')
                ->select('mosq_species')
                ->where('ento_04_id', $outdoor[$i]->id)
                ->where('form_type', 'outdoor')
                ->distinct('name')
                ->get();

            // echo '<pre>';
            // print_r($mosquitoes_species);
            // echo '</pre>';
            $string_total = "";

            foreach ($mosquitoes_species as $rowmos) {
                $mosspec = $rowmos->mosq_species;

                for ($i = 0; $i < count($outdoor); $i++) {
                    $mosquitoes_species_sum = DB::table('ento_04_mosq')
                        ->select('*')
                        ->where('ento_04_id', $outdoor[$i]->id)
                        ->where('form_type', 'outdoor')
                        ->where('mosq_species', $mosspec)
                        ->SUM('mos_number');
                    $rowmos->total_mos = $mosquitoes_species_sum;

                    $display_array[] = $rowmos;

                    // echo '<pre>';

                    // print_r($display_array);
                    // echo '</pre>';
                }
            }
        }
        $dara = array(
            $total_mosq_spec_stat,
            $total_mosq_spec_stat7_8,
            $total_mosq_spec_stat8_9,
            $total_mosq_spec_stat9_10,
            $total_mosq_spec_stat10_11,
            $total_mosq_spec_stat11_12,
            $total_mosq_spec_stat12_1,
            $total_mosq_spec_stat1_2,
            $total_mosq_spec_stat2_3,
            $total_mosq_spec_stat3_4,
            $total_mosq_spec_stat4_5,
            $total_mosq_spec_stat5_6,
        );

        $data['template'] = 'ento_04/ento_04_outdoor_view';
        return view('template_user/template', compact('data'), ["ento4_outdoor_list" => $outdoor, "ento4_list" => $list, "mosquito_list" => $mosquito_list, "total" => $dara, "string_total" => $display_array]);
    }





















    public function ento4_update(Request $request)
    {
        $data = $request->all();
        // $ento4=[
        //     "district"=>$data['district'],
        //     "moh"=>$data['moh'],
        //     "gn_division"=>$data['gn_division'],
        //     "locality"=>$data['locality'],
        //     "date_of_collection"=>$data['date_of_collection'],
        //     "phi"=>$data['phi'],
        // ];
        $id = $data['ento_04_id'];
        unset($data['ento_04_id'], $data['_token']);
        $success = Ento_4::where('ento_04_id', $id)->update($data);

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
        // $ento4=[
        //     "district"=>$data['district'],
        //     "moh"=>$data['moh'],
        //     "gn_division"=>$data['gn_division'],
        //     "locality"=>$data['locality'],
        //     "date_of_collection"=>$data['date_of_collection'],
        //     "phi"=>$data['phi'],
        // ];
        $success = Ento_4::create($data);
        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function ento4_indoor_update(Request $request)
    {
        $data = $request->all();
        $ento4mosq = array(
            $data['mosq_spec_stat'],
            $data['mosq_spec_stat7_8'],
            $data['mosq_spec_stat8_9'],
            $data['mosq_spec_stat9_10'],
            $data['mosq_spec_stat10_11'],
            $data['mosq_spec_stat11_12'],
            $data['mosq_spec_stat12_1'],
            $data['mosq_spec_stat1_2'],
            $data['mosq_spec_stat2_3'],
            $data['mosq_spec_stat3_4'],
            $data['mosq_spec_stat4_5'],
            $data['mosq_spec_stat5_6'],
        );
        $ento4mosqnumber = array(
            $data['number'],
            $data['number7_8'],
            $data['number8_9'],
            $data['number9_10'],
            $data['number10_11'],
            $data['number11_12'],
            $data['number12_1'],
            $data['number1_2'],
            $data['number2_3'],
            $data['number3_4'],
            $data['number4_5'],
            $data['number5_6'],
        );
        $id = $data['id'];
        unset(
            $data['id'],
            $data['_token'],
            $data['mosq_spec_stat'],
            $data['mosq_spec_stat7_8'],
            $data['mosq_spec_stat8_9'],
            $data['mosq_spec_stat9_10'],
            $data['mosq_spec_stat10_11'],
            $data['mosq_spec_stat11_12'],
            $data['mosq_spec_stat12_1'],
            $data['mosq_spec_stat1_2'],
            $data['mosq_spec_stat2_3'],
            $data['mosq_spec_stat3_4'],
            $data['mosq_spec_stat4_5'],
            $data['mosq_spec_stat5_6'],
            $data['number'],
            $data['number7_8'],
            $data['number8_9'],
            $data['number9_10'],
            $data['number10_11'],
            $data['number11_12'],
            $data['number12_1'],
            $data['number1_2'],
            $data['number2_3'],
            $data['number3_4'],
            $data['number4_5'],
            $data['number5_6']
        );
        $success = Ento_4_Indoor::where('id', $id)->update($data);
        $success = true;
        if ($success) {
            DB::table('ento_04_mosq')
                ->where('ento_04_id', $id)
                ->delete();

            for ($i = 0; $i < count($ento4mosq); $i++) {
                switch ($i) {
                    case 0:
                        $time = "6to7";
                        break;
                    case 1:
                        $time = "7to8";
                        break;
                    case 2:
                        $time = "8to9";
                        break;
                    case 3:
                        $time = "9to10";
                        break;
                    case 4:
                        $time = "10to11";
                        break;
                    case 5:
                        $time = "11to12";
                        break;
                    case 6:
                        $time = "12to1";
                        break;
                    case 7:
                        $time = "1to2";
                        break;
                    case 8:
                        $time = "2to3";
                        break;
                    case 9:
                        $time = "3to4";
                        break;
                    case 10:
                        $time = "4to5";
                        break;
                    case 11:
                        $time = "5to6";
                        break;
                }
                for ($j = 0; $j < count($ento4mosq[$i]); $j++) {
                    if ($ento4mosq[$i][$j] != null) {
                        DB::table('ento_04_mosq')->insert(array('ento_04_id' => $id, 'time' => $time, 'mosq_species' => $ento4mosq[$i][$j], 'form_type' => 'indoor', 'mos_number' => $ento4mosqnumber[$i][$j]));
                    }
                }
            }
            return redirect()->back()->with('update', true);
        } else {
            return redirect()->back()->with('update', false);
        }
    }

    public function ento4_indoor_save(Request $request)
    {
        $data = $request->all();
        $ento4mosq = array(
            $data['mosq_spec_stat'],
            $data['mosq_spec_stat7_8'],
            $data['mosq_spec_stat8_9'],
            $data['mosq_spec_stat9_10'],
            $data['mosq_spec_stat10_11'],
            $data['mosq_spec_stat11_12'],
            $data['mosq_spec_stat12_1'],
            $data['mosq_spec_stat1_2'],
            $data['mosq_spec_stat2_3'],
            $data['mosq_spec_stat3_4'],
            $data['mosq_spec_stat4_5'],
            $data['mosq_spec_stat5_6'],
        );
        $ento4mosqnumber = array(
            $data['number'],
            $data['number7_8'],
            $data['number8_9'],
            $data['number9_10'],
            $data['number10_11'],
            $data['number11_12'],
            $data['number12_1'],
            $data['number1_2'],
            $data['number2_3'],
            $data['number3_4'],
            $data['number4_5'],
            $data['number5_6'],
        );
        $data["user_name"] = Auth::user()->email;
        $success = Ento_4_Indoor::create($data);
        if ($success) {
            for ($i = 0; $i < count($ento4mosq); $i++) {
                switch ($i) {
                    case 0:
                        $time = "6to7";
                        break;
                    case 1:
                        $time = "7to8";
                        break;
                    case 2:
                        $time = "8to9";
                        break;
                    case 3:
                        $time = "9to10";
                        break;
                    case 4:
                        $time = "10to11";
                        break;
                    case 5:
                        $time = "11to12";
                        break;
                    case 6:
                        $time = "12to1";
                        break;
                    case 7:
                        $time = "1to2";
                        break;
                    case 8:
                        $time = "2to3";
                        break;
                    case 9:
                        $time = "3to4";
                        break;
                    case 10:
                        $time = "4to5";
                        break;
                    case 11:
                        $time = "5to6";
                        break;
                }
                for ($j = 0; $j < count($ento4mosq[$i]); $j++) {
                    if ($ento4mosq[$i][$j] != null) {
                        DB::table('ento_04_mosq')->insert(array('ento_04_id' => $success['id'], 'time' => $time, 'mosq_species' => $ento4mosq[$i][$j], 'form_type' => 'indoor', 'mos_number' => $ento4mosqnumber[$i][$j]));
                    }
                }
            }
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function ento4_outdoor_update(Request $request)
    {
        $data = $request->all();
        $ento4mosq = array(
            $data['mosq_spec_stat'],
            $data['mosq_spec_stat7_8'],
            $data['mosq_spec_stat8_9'],
            $data['mosq_spec_stat9_10'],
            $data['mosq_spec_stat10_11'],
            $data['mosq_spec_stat11_12'],
            $data['mosq_spec_stat12_1'],
            $data['mosq_spec_stat1_2'],
            $data['mosq_spec_stat2_3'],
            $data['mosq_spec_stat3_4'],
            $data['mosq_spec_stat4_5'],
            $data['mosq_spec_stat5_6'],
        );
        $ento4mosqnumber = array(
            $data['number'],
            $data['number7_8'],
            $data['number8_9'],
            $data['number9_10'],
            $data['number10_11'],
            $data['number11_12'],
            $data['number12_1'],
            $data['number1_2'],
            $data['number2_3'],
            $data['number3_4'],
            $data['number4_5'],
            $data['number5_6'],
        );

        $id = $data['id'];
        unset(
            $data['id'],
            $data['_token'],
            $data['mosq_spec_stat'],
            $data['mosq_spec_stat7_8'],
            $data['mosq_spec_stat8_9'],
            $data['mosq_spec_stat9_10'],
            $data['mosq_spec_stat10_11'],
            $data['mosq_spec_stat11_12'],
            $data['mosq_spec_stat12_1'],
            $data['mosq_spec_stat1_2'],
            $data['mosq_spec_stat2_3'],
            $data['mosq_spec_stat3_4'],
            $data['mosq_spec_stat4_5'],
            $data['mosq_spec_stat5_6'],
            $data['number'],
            $data['number7_8'],
            $data['number8_9'],
            $data['number9_10'],
            $data['number10_11'],
            $data['number11_12'],
            $data['number12_1'],
            $data['number1_2'],
            $data['number2_3'],
            $data['number3_4'],
            $data['number4_5'],
            $data['number5_6']
        );
        $success = Ento_4_Outdoor::where('id', $id)->update($data);
        if ($success) {
            DB::table('ento_04_mosq')
                ->where('ento_04_id', $id)
                ->delete();
            for ($i = 0; $i < count($ento4mosq); $i++) {
                switch ($i) {
                    case 0:
                        $time = "6to7";
                        break;
                    case 1:
                        $time = "7to8";
                        break;
                    case 2:
                        $time = "8to9";
                        break;
                    case 3:
                        $time = "9to10";
                        break;
                    case 4:
                        $time = "10to11";
                        break;
                    case 5:
                        $time = "11to12";
                        break;
                    case 6:
                        $time = "12to1";
                        break;
                    case 7:
                        $time = "1to2";
                        break;
                    case 8:
                        $time = "2to3";
                        break;
                    case 9:
                        $time = "3to4";
                        break;
                    case 10:
                        $time = "4to5";
                        break;
                    case 11:
                        $time = "5to6";
                        break;
                }
                for ($j = 0; $j < count($ento4mosq[$i]); $j++) {
                    if ($ento4mosq[$i][$j] != null) {
                        DB::table('ento_04_mosq')
                            ->insert(array('ento_04_id' => $id, 'time' => $time, 'mosq_species' => $ento4mosq[$i][$j], 'form_type' => 'outdoor', 'mos_number' => $ento4mosqnumber[$i][$j]));
                    }
                }
            }
            return redirect()->back()->with('update', true);
        } else {
            return redirect()->back()->with('update', false);
        }
    }

    public function ento4_outdoor_save(Request $request)
    {
        $data = $request->all();
        $ento4mosq = array(
            $data['mosq_spec_stat'],
            $data['mosq_spec_stat7_8'],
            $data['mosq_spec_stat8_9'],
            $data['mosq_spec_stat9_10'],
            $data['mosq_spec_stat10_11'],
            $data['mosq_spec_stat11_12'],
            $data['mosq_spec_stat12_1'],
            $data['mosq_spec_stat1_2'],
            $data['mosq_spec_stat2_3'],
            $data['mosq_spec_stat3_4'],
            $data['mosq_spec_stat4_5'],
            $data['mosq_spec_stat5_6'],
        );
        $ento4mosqnumber = array(
            $data['number'],
            $data['number7_8'],
            $data['number8_9'],
            $data['number9_10'],
            $data['number10_11'],
            $data['number11_12'],
            $data['number12_1'],
            $data['number1_2'],
            $data['number2_3'],
            $data['number3_4'],
            $data['number4_5'],
            $data['number5_6'],
        );
        $data["user_name"] = Auth::user()->email;
        $success = Ento_4_Outdoor::create($data);
        if ($success) {
            for ($i = 0; $i < count($ento4mosq); $i++) {
                switch ($i) {
                    case 0:
                        $time = "6to7";
                        break;
                    case 1:
                        $time = "7to8";
                        break;
                    case 2:
                        $time = "8to9";
                        break;
                    case 3:
                        $time = "9to10";
                        break;
                    case 4:
                        $time = "10to11";
                        break;
                    case 5:
                        $time = "11to12";
                        break;
                    case 6:
                        $time = "12to1";
                        break;
                    case 7:
                        $time = "1to2";
                        break;
                    case 8:
                        $time = "2to3";
                        break;
                    case 9:
                        $time = "3to4";
                        break;
                    case 10:
                        $time = "4to5";
                        break;
                    case 11:
                        $time = "5to6";
                        break;
                }
                for ($j = 0; $j < count($ento4mosq[$i]); $j++) {
                    if ($ento4mosq[$i][$j] != null) {
                        DB::table('ento_04_mosq')->insert(array('ento_04_id' => $success['id'], 'time' => $time, 'mosq_species' => $ento4mosq[$i][$j], 'form_type' => 'outdoor', 'mos_number' => $ento4mosqnumber[$i][$j]));
                    }
                }
            }


            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
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
        $res = Ento_4::where('ento_04_id', $id)->delete();
        $res2 = Ento_4_Outdoor::where('ento_04_id', $id)->delete();
        $res3 = Ento_4_Indoor::where('ento_04_id', $id)->delete();

        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function delete_ento4_outdoor($id)
    {
        $res = Ento_4_Outdoor::where('id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function delete_ento4_indoor($id)
    {
        $res = Ento_4_Indoor::where('id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function view_all()
    {
        if (Auth::user()->role === "RMO") {
            $ento4 = DB::table('ento_04')
                ->select('*')
                ->where('district', Auth::user()->district)
                ->orderBy('ento_04_id', ' asc')
                ->get();
        } else if (Auth::user()->role === "ADMIN" || Auth::user()->role === "AFC") {
            $ento4 = DB::table('ento_04')
                ->select('*')
                ->orderBy('ento_04_id', ' asc')
                ->get();
        } else {
            $ento4 = DB::table('ento_04')
                ->select('*')
                ->where('user_name', Auth::user()->email)
                ->orderBy('ento_04_id', ' asc')
                ->get();
        }
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'ento_04/ento_04_view';
        return view('template_user/template', compact('data'), ["ento4_list" => $ento4, "district_list" => $district]);
    }











    //new ento 4 
    public function ento4new()
    {
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        $data['template'] = 'ento_04/ento4new';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }




    public function ento4_newsave(Request $request)
    {
        $data = $request->all();



        switch ($data['district']) {
            case "Colombo":
                $district = "COL/HLC/";
                break;
            case "Gampaha":
                $district = "GAM/HLC/";
                break;
            case "Kalutara":
                $district = "KAL/HLC/";
                break;
            case "Galle":
                $district = "GAL/HLC/";
                break;
            case "Matara":
                $district = "MAT/HLC/";
                break;
            case "Hambantota":
                $district = "HAM/HLC/";
                break;
            case "Kurunegala":
                $district = "KUR/HLC/";
                break;
            case "Puttalam":
                $district = "PUT/HLC/";
                break;
            case "CMC":
                $district = "AFC/HLC/";
                break;
            case "Non endemic":
                $district = "NED/HLC/";
                break;
            default:
        }

        // //get last Id relavent and make new one
        $initial_registration = DB::table('ento_04')
            ->select('*')
            ->orderBy('ento_04_id', 'desc')
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


        $ento4 = [
            "district" => $data['district'],
            "formid" => $form_id,
            "moh" => $data['moh'],
            "gn_division" => $data['gn_division'],
            "locality" => $data['locality'],
            "date_of_collection" => $data['date_of_collection'],
            "phi" => $data['phi'],
            "gps_lat" => $data['gps_lat'],
            "gps_long" => $data['gps_long'],
            "user_name" => Auth::user()->email,
        ];





        $ent4_data = Ento_4::create($ento4);

        // INSERT INDOOR DATA
        $ent4_id = $ent4_data->id;
        $ento4_data = [
            "ento_04_id" => $ent4_id,
            "noofbaits" => $data['noofbaits'],
            "noofbairs7_8" => $data['noofbairs7_8'],
            "noofbairs8_9" => $data['noofbairs8_9'],
            "noofbairs9_10" => $data['noofbairs9_10'],
            "noofbairs10_11" => $data['noofbairs10_11'],
            "noofbairs11_12" => $data['noofbairs11_12'],
            "noofbairs12_1" => $data['noofbairs12_1'],
            "noofbairs1_2" => $data['noofbairs1_2'],
            "noofbairs2_3" => $data['noofbairs2_3'],
            "noofbairs3_4" => $data['noofbairs3_4'],
            "noofbairs4_5" => $data['noofbairs4_5'],
            "noofbairs5_6" => $data['noofbairs5_6'],
            "temp6_7" => $data['temp6_7'],
            "temp7_8" => $data['temp7_8'],
            "temp8_9" => $data['temp8_9'],
            "temp9_10" => $data['temp9_10'],
            "temp10_11" => $data['temp10_11'],
            "temp11_12" => $data['temp11_12'],
            "temp12_1" => $data['temp12_1'],
            "temp1_2" => $data['temp1_2'],
            "temp2_3" => $data['temp2_3'],
            "temp3_4" => $data['temp3_4'],
            "temp4_5" => $data['temp4_5'],
            "temp5_6" => $data['temp5_6'],
            "RH6_7" => $data['RH6_7'],
            "RH7_8" => $data['RH7_8'],
            "RH8_9" => $data['RH8_9'],
            "RH9_10" => $data['RH9_10'],
            "RH10_11" => $data['RH10_11'],
            "RH11_12" => $data['RH11_12'],
            "RH12_1" => $data['RH12_1'],
            "RH1_2" => $data['RH1_2'],
            "RH2_3" => $data['RH2_3'],
            "RH3_4" => $data['RH3_4'],
            "RH4_5" => $data['RH4_5'],
            "RH5_6" => $data['RH5_6'],
            "weather_condition_6_7" => $data['weather_condition_6_7'],
            "weather_condition_7_8" => $data['weather_condition_7_8'],
            "weather_condition_8_9" => $data['weather_condition_8_9'],
            "weather_condition_9_10" => $data['weather_condition_9_10'],
            "weather_condition_10_11" => $data['weather_condition_10_11'],
            "weather_condition_11_12" => $data['weather_condition_11_12'],
            "weather_condition_12_1" => $data['weather_condition_12_1'],
            "weather_condition_1_2" => $data['weather_condition_1_2'],
            "weather_condition_2_3" => $data['weather_condition_2_3'],
            "weather_condition_3_4" => $data['weather_condition_3_4'],
            "weather_condition_4_5" => $data['weather_condition_4_5'],
            "weather_condition_5_6" => $data['weather_condition_5_6'],
            "user_name" => Auth::user()->email
        ];

        $ento4_data_in2 = Ento_4_Indoor::create($ento4_data);
        $ent4_data_id2 = $ento4_data_in2->id;






        $DataFildCount = count($data['mosq_spec_stat']);
        for ($iw = 0; $iw < $DataFildCount; $iw++) {

            $ento4newmos = [
                "ento_04_id_data" => $ent4_id, [],
                "formtype" => 'indoor',
                "mosq_spec_stat" => $data['mosq_spec_stat'][$iw],
                "number" => $data['number'][$iw],
                "number7_8" => $data['number7_8'][$iw],
                "number8_9" => $data['number8_9'][$iw],
                "number9_10" => $data['number9_10'][$iw],
                "number10_11" => $data['number10_11'][$iw],
                "number11_12" => $data['number11_12'][$iw],
                "number12_1" => $data['number12_1'][$iw],
                "number1_2" => $data['number1_2'][$iw],
                "number2_3" => $data['number2_3'][$iw],
                "number3_4" => $data['number3_4'][$iw],
                "number4_5" => $data['number4_5'][$iw],
                "number5_6" => $data['number5_6'][$iw],

            ];
            $ento4_data_in2 = Ento_04_mosq_new::create($ento4newmos);


            for ($i = 0; $i < 12; $i++) {
                switch ($i) {
                    case 0:
                        $time = "6to7";
                        break;
                    case 1:
                        $time = "7to8";
                        break;
                    case 2:
                        $time = "8to9";
                        break;
                    case 3:
                        $time = "9to10";
                        break;
                    case 4:
                        $time = "10to11";
                        break;
                    case 5:
                        $time = "11to12";
                        break;
                    case 6:
                        $time = "12to1";
                        break;
                    case 7:
                        $time = "1to2";
                        break;
                    case 8:
                        $time = "2to3";
                        break;
                    case 9:
                        $time = "3to4";
                        break;
                    case 10:
                        $time = "4to5";
                        break;
                    case 11:
                        $time = "5to6";
                        break;
                }
                $ento4mosqnumber = array(
                    $data['number'],
                    $data['number7_8'],
                    $data['number8_9'],
                    $data['number9_10'],
                    $data['number10_11'],
                    $data['number11_12'],
                    $data['number12_1'],
                    $data['number1_2'],
                    $data['number2_3'],
                    $data['number3_4'],
                    $data['number4_5'],
                    $data['number5_6'],
                );



                $ento4mos = [
                    "ento_04_id" => $ent4_id,
                    "time" => $time,
                    "mosq_species" => $data['mosq_spec_stat'][$iw],
                    "form_type" => 'indoor',
                    "mos_number" => $ento4mosqnumber[$i][$iw]
                ];

                $ento4_data_in = Ento_04_mosq::create($ento4mos);
            }
        }





        // INSERT OUTDOOR DATA
        $ent4_id = $ent4_data->id;
        $ento4_out_data = [
            "ento_04_id" => $ent4_id,
            "noofbaits" => $data['noofbaits_out'],
            "noofbairs7_8" => $data['noofbairs7_8_out'],
            "noofbairs8_9" => $data['noofbairs8_9_out'],
            "noofbairs9_10" => $data['noofbairs9_10_out'],
            "noofbairs10_11" => $data['noofbairs10_11_out'],
            "noofbairs11_12" => $data['noofbairs11_12_out'],
            "noofbairs12_1" => $data['noofbairs12_1_out'],
            "noofbairs1_2" => $data['noofbairs1_2_out'],
            "noofbairs2_3" => $data['noofbairs2_3_out'],
            "noofbairs3_4" => $data['noofbairs3_4_out'],
            "noofbairs4_5" => $data['noofbairs4_5_out'],
            "noofbairs5_6" => $data['noofbairs5_6_out'],
            "temp6_7" => $data['temp6_7_out'],
            "temp7_8" => $data['temp7_8_out'],
            "temp8_9" => $data['temp8_9_out'],
            "temp9_10" => $data['temp9_10_out'],
            "temp10_11" => $data['temp10_11_out'],
            "temp11_12" => $data['temp11_12_out'],
            "temp12_1" => $data['temp12_1_out'],
            "temp1_2" => $data['temp1_2_out'],
            "temp2_3" => $data['temp2_3_out'],
            "temp3_4" => $data['temp3_4_out'],
            "temp4_5" => $data['temp4_5_out'],
            "temp5_6" => $data['temp5_6_out'],
            "RH6_7" => $data['RH6_7_out'],
            "RH7_8" => $data['RH7_8_out'],
            "RH8_9" => $data['RH8_9_out'],
            "RH9_10" => $data['RH9_10_out'],
            "RH10_11" => $data['RH10_11_out'],
            "RH11_12" => $data['RH11_12_out'],
            "RH12_1" => $data['RH12_1_out'],
            "RH1_2" => $data['RH1_2_out'],
            "RH2_3" => $data['RH2_3_out'],
            "RH3_4" => $data['RH3_4_out'],
            "RH4_5" => $data['RH4_5_out'],
            "RH5_6" => $data['RH5_6_out'],
            "weather_condition_6_7" => $data['weather_condition_6_7_out'],
            "weather_condition_7_8" => $data['weather_condition_7_8_out'],
            "weather_condition_8_9" => $data['weather_condition_8_9_out'],
            "weather_condition_9_10" => $data['weather_condition_9_10_out'],
            "weather_condition_10_11" => $data['weather_condition_10_11_out'],
            "weather_condition_11_12" => $data['weather_condition_11_12_out'],
            "weather_condition_12_1" => $data['weather_condition_12_1_out'],
            "weather_condition_1_2" => $data['weather_condition_1_2_out'],
            "weather_condition_2_3" => $data['weather_condition_2_3_out'],
            "weather_condition_3_4" => $data['weather_condition_3_4_out'],
            "weather_condition_4_5" => $data['weather_condition_4_5_out'],
            "weather_condition_5_6" => $data['weather_condition_5_6_out'],
            "user_name" => Auth::user()->email
        ];
        $Ento_04_outdoor = Ento_04_outdoor::create($ento4_out_data);
        $Ento_04_outdoor2 = $Ento_04_outdoor->id;

        $DataFildCount = count($data['mosq_spec_stat_out']);
        for ($iw = 0; $iw < $DataFildCount; $iw++) {
            $ento4newmos = [
                "ento_04_id_data" => $ent4_id, [],
                "mosq_spec_stat" => $data['mosq_spec_stat_out'][$iw],
                "number" => $data['number_out'][$iw],
                "number7_8" => $data['number7_8_out'][$iw],
                "number8_9" => $data['number8_9_out'][$iw],
                "number9_10" => $data['number9_10_out'][$iw],
                "number10_11" => $data['number10_11_out'][$iw],
                "number11_12" => $data['number11_12_out'][$iw],
                "number12_1" => $data['number12_1_out'][$iw],
                "number1_2" => $data['number1_2_out'][$iw],
                "number2_3" => $data['number2_3_out'][$iw],
                "number3_4" => $data['number3_4_out'][$iw],
                "number4_5" => $data['number4_5_out'][$iw],
                "number5_6" => $data['number5_6_out'][$iw],
                "formtype" => 'outdoor',
            ];

            $ento4_data_in2 = Ento_04_mosq_new::create($ento4newmos);
            for ($i = 0; $i < 12; $i++) {
                switch ($i) {
                    case 0:
                        $time = "6to7";
                        break;
                    case 1:
                        $time = "7to8";
                        break;
                    case 2:
                        $time = "8to9";
                        break;
                    case 3:
                        $time = "9to10";
                        break;
                    case 4:
                        $time = "10to11";
                        break;
                    case 5:
                        $time = "11to12";
                        break;
                    case 6:
                        $time = "12to1";
                        break;
                    case 7:
                        $time = "1to2";
                        break;
                    case 8:
                        $time = "2to3";
                        break;
                    case 9:
                        $time = "3to4";
                        break;
                    case 10:
                        $time = "4to5";
                        break;
                    case 11:
                        $time = "5to6";
                        break;
                }
                $ento4mosqnumber = array(
                    $data['number_out'],
                    $data['number7_8_out'],
                    $data['number8_9_out'],
                    $data['number9_10_out'],
                    $data['number10_11_out'],
                    $data['number11_12_out'],
                    $data['number12_1_out'],
                    $data['number1_2_out'],
                    $data['number2_3_out'],
                    $data['number3_4_out'],
                    $data['number4_5_out'],
                    $data['number5_6_out'],
                );
                $ento4mos = [
                    "ento_04_id" => $ent4_id,
                    "time" => $time,
                    "mosq_species" => $data['mosq_spec_stat'][$iw],
                    "form_type" => 'outdoor',
                    "mos_number" => $ento4mosqnumber[$i][$iw]
                ];
                $ento4_data_in = Ento_04_mosq::create($ento4mos);
            }
        }


        if ($ento4_data_in) {
            return redirect()->back()->with('message', true)->with('id', $form_id);
        } else {
            return redirect()->back()->with('message', false)->with('id', $form_id);
        }
    }



    // newgetEntoIndoorData
    // newgetEntoOutdoorData


    public function 
    newgetEntoIndoorData($id)
    {

        $data2 = \App\Ento_4::with('ento_04_indoors', 'ento_04_mosq_news', 'ento_04_outdoors')->where("ento_04_id", $id)->first();
        $data['template'] = 'ento_04/ento4newView';
        return view('template_user/template', compact('data'), ["ento4_list" => $data2]);
    }



    




    public function newgetEntoIndoorData_print($id)
    {

      
        $data2 = \App\Ento_4::with('ento_04_indoors', 'ento_04_mosq_news', 'ento_04_outdoors')->where("ento_04_id", $id)->first();
        
        $page = 'ento_04/ento4newView_print';
        $data = '';
        $content = ob_get_clean();
        // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
        // File::requireOnce($html2pdf_path);
        $template = view(
            $page,
            compact('data'),
            ["ento4_list" => $data2]
        );


        // header('Content-Type: application/xls');
		// header('Content-Disposition: attachment; filename=download.xls');
		// echo $template =  view(
        //     $page,
        //     compact('data'),
        //     ["ento4_list" => $data2]
        // );
        try {

            $html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
            $html2pdf->pdf->SetTitle('Ento 4');
            $html2pdf->WriteHTML($template);
            $html2pdf->Output('Ento.4.pdf');
            ob_flush();
            ob_end_clean();
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }

    }

















    public function  newgetEntoIndoorData_excel($id)
    {

      
        $data2 = \App\Ento_4::with('ento_04_indoors', 'ento_04_mosq_news', 'ento_04_outdoors')->where("ento_04_id", $id)->first();
        
        $page = 'ento_04/ento4newView_print';
        $data = '';
        $content = ob_get_clean();
        // $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
        // File::requireOnce($html2pdf_path);
        $template = view(
            $page,
            compact('data'),
            ["ento4_list" => $data2]
        );


        header('Content-Type: application/xls');
		header('Content-Disposition: attachment; filename=download.xls');
		echo $template =  view(
            $page,
            compact('data'),
            ["ento4_list" => $data2]
        );
        // try {

        //     $html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
        //     $html2pdf->pdf->SetTitle('Ento 4');
        //     $html2pdf->WriteHTML($template);
        //     $html2pdf->Output('Ento.4.pdf');
        //     ob_flush();
        //     ob_end_clean();
        // } catch (HTML2PDF_exception $e) {
        //     echo $e;
        //     exit;
        // }

    }




    public function ento4_data_newupdate(Request $request)
    {
        $data = $request->all();

        $ento4 = [
            "district" => $data['district'],
            "formid" => $data['formid'],
            "moh" => $data['moh'],
            "gn_division" => $data['gn_division'],
            "locality" => $data['locality'],
            "date_of_collection" => $data['date_of_collection'],
            "phi" => $data['phi'],
            "gps_lat" => $data['gps_lat'],
            "gps_long" => $data['gps_long'],
            "user_name" => Auth::user()->email,

        ];

        $ento_04_id = $data['ento_04_id'];
        $success = Ento_4::where('ento_04_id', $data['ento_04_id'])->update($ento4);



        $ento4_data = [
            "noofbaits" => $data['noofbaits'],
            "noofbairs7_8" => $data['noofbairs7_8'],
            "noofbairs8_9" => $data['noofbairs8_9'],
            "noofbairs9_10" => $data['noofbairs9_10'],
            "noofbairs10_11" => $data['noofbairs10_11'],
            "noofbairs11_12" => $data['noofbairs11_12'],
            "noofbairs12_1" => $data['noofbairs12_1'],
            "noofbairs1_2" => $data['noofbairs1_2'],
            "noofbairs2_3" => $data['noofbairs2_3'],
            "noofbairs3_4" => $data['noofbairs3_4'],
            "noofbairs4_5" => $data['noofbairs4_5'],
            "noofbairs5_6" => $data['noofbairs5_6'],
            "temp6_7" => $data['temp6_7'],
            "temp7_8" => $data['temp7_8'],
            "temp8_9" => $data['temp8_9'],
            "temp9_10" => $data['temp9_10'],
            "temp10_11" => $data['temp10_11'],
            "temp11_12" => $data['temp11_12'],
            "temp12_1" => $data['temp12_1'],
            "temp1_2" => $data['temp1_2'],
            "temp2_3" => $data['temp2_3'],
            "temp3_4" => $data['temp3_4'],
            "temp4_5" => $data['temp4_5'],
            "temp5_6" => $data['temp5_6'],
            "RH6_7" => $data['RH6_7'],
            "RH7_8" => $data['RH7_8'],
            "RH8_9" => $data['RH8_9'],
            "RH9_10" => $data['RH9_10'],
            "RH10_11" => $data['RH10_11'],
            "RH11_12" => $data['RH11_12'],
            "RH12_1" => $data['RH12_1'],
            "RH1_2" => $data['RH1_2'],
            "RH2_3" => $data['RH2_3'],
            "RH3_4" => $data['RH3_4'],
            "RH4_5" => $data['RH4_5'],
            "RH5_6" => $data['RH5_6'],
            "weather_condition_6_7" => $data['weather_condition_6_7'],
            "weather_condition_7_8" => $data['weather_condition_7_8'],
            "weather_condition_8_9" => $data['weather_condition_8_9'],
            "weather_condition_9_10" => $data['weather_condition_9_10'],
            "weather_condition_10_11" => $data['weather_condition_10_11'],
            "weather_condition_11_12" => $data['weather_condition_11_12'],
            "weather_condition_12_1" => $data['weather_condition_12_1'],
            "weather_condition_1_2" => $data['weather_condition_1_2'],
            "weather_condition_2_3" => $data['weather_condition_2_3'],
            "weather_condition_3_4" => $data['weather_condition_3_4'],
            "weather_condition_4_5" => $data['weather_condition_4_5'],
            "weather_condition_5_6" => $data['weather_condition_5_6'],
            "user_name" => Auth::user()->email
        ];
        $success = Ento_4_Indoor::where('id', $data['ento_04_indoors_id'])->update($ento4_data);

        // out dorr table insert
        $ento4_data = [
            "noofbaits" => $data['noofbaits_out'],
            "noofbairs7_8" => $data['noofbairs7_8_out'],
            "noofbairs8_9" => $data['noofbairs8_9_out'],
            "noofbairs9_10" => $data['noofbairs9_10_out'],
            "noofbairs10_11" => $data['noofbairs10_11_out'],
            "noofbairs11_12" => $data['noofbairs11_12_out'],
            "noofbairs12_1" => $data['noofbairs12_1_out'],
            "noofbairs1_2" => $data['noofbairs1_2_out'],
            "noofbairs2_3" => $data['noofbairs2_3_out'],
            "noofbairs3_4" => $data['noofbairs3_4_out'],
            "noofbairs4_5" => $data['noofbairs4_5_out'],
            "noofbairs5_6" => $data['noofbairs5_6_out'],
            "temp6_7" => $data['temp6_7_out'],
            "temp7_8" => $data['temp7_8_out'],
            "temp8_9" => $data['temp8_9_out'],
            "temp9_10" => $data['temp9_10_out'],
            "temp10_11" => $data['temp10_11_out'],
            "temp11_12" => $data['temp11_12_out'],
            "temp12_1" => $data['temp12_1_out'],
            "temp1_2" => $data['temp1_2_out'],
            "temp2_3" => $data['temp2_3_out'],
            "temp3_4" => $data['temp3_4_out'],
            "temp4_5" => $data['temp4_5_out'],
            "temp5_6" => $data['temp5_6_out'],
            "RH6_7" => $data['RH6_7_out'],
            "RH7_8" => $data['RH7_8_out'],
            "RH8_9" => $data['RH8_9_out'],
            "RH9_10" => $data['RH9_10_out'],
            "RH10_11" => $data['RH10_11_out'],
            "RH11_12" => $data['RH11_12_out'],
            "RH12_1" => $data['RH12_1_out'],
            "RH1_2" => $data['RH1_2_out'],
            "RH2_3" => $data['RH2_3_out'],
            "RH3_4" => $data['RH3_4_out'],
            "RH4_5" => $data['RH4_5_out'],
            "RH5_6" => $data['RH5_6_out'],
            "weather_condition_6_7" => $data['weather_condition_6_7_out'],
            "weather_condition_7_8" => $data['weather_condition_7_8_out'],
            "weather_condition_8_9" => $data['weather_condition_8_9_out'],
            "weather_condition_9_10" => $data['weather_condition_9_10_out'],
            "weather_condition_10_11" => $data['weather_condition_10_11_out'],
            "weather_condition_11_12" => $data['weather_condition_11_12_out'],
            "weather_condition_12_1" => $data['weather_condition_12_1_out'],
            "weather_condition_1_2" => $data['weather_condition_1_2_out'],
            "weather_condition_2_3" => $data['weather_condition_2_3_out'],
            "weather_condition_3_4" => $data['weather_condition_3_4_out'],
            "weather_condition_4_5" => $data['weather_condition_4_5_out'],
            "weather_condition_5_6" => $data['weather_condition_5_6_out'],
            "user_name" => Auth::user()->email
        ];
        $success = Ento_04_outdoor::where('id', $data['ento_04_outdoors_id'])->update($ento4_data);


        // ******************************************





        if (!empty($data['ento_04_mosq_new_id'])) {
            $DataFildCount = count($data['ento_04_mosq_new_id']);
        } else {
            $DataFildCount = 0;
        }



        if (!empty($data['ento_04_mosq_new_id_out'])) {
            $DataFildCount2_OUT = count($data['ento_04_mosq_new_id_out']);
        } else {
            $DataFildCount2_OUT = 0;
        }



        if (!empty($data['ento_04_mosq_new_id'])) {
            $DataFildCount_INDOR = count($data['ento_04_mosq_new_id']);
        } else {
            $DataFildCount_INDOR = 0;
        }







        for ($iw = 0; $iw < $DataFildCount; $iw++) {

            $ento4newmos = [
                "mosq_spec_stat" => $data['mosq_spec_stat'][$iw],
                "number" => $data['number'][$iw],
                "number7_8" => $data['number7_8'][$iw],
                "number8_9" => $data['number8_9'][$iw],
                "number9_10" => $data['number9_10'][$iw],
                "number10_11" => $data['number10_11'][$iw],
                "number11_12" => $data['number11_12'][$iw],
                "number12_1" => $data['number12_1'][$iw],
                "number1_2" => $data['number1_2'][$iw],
                "number2_3" => $data['number2_3'][$iw],
                "number3_4" => $data['number3_4'][$iw],
                "number4_5" => $data['number4_5'][$iw],
                "number5_6" => $data['number5_6'][$iw],
            ];

            $success = Ento_04_mosq_new::where('id', $data['ento_04_mosq_new_id'][$iw])->update($ento4newmos);
        }
        if (!empty($data['ento_04_mosq_new_id_out'])) {
            $DataFildCount2 = count($data['ento_04_mosq_new_id_out']);
        } else {
            $DataFildCount2  = 0;
        }

        for ($iw = 0; $iw < $DataFildCount2; $iw++) {
            $ento4newmos_out = [
                "mosq_spec_stat" => $data['mosq_spec_stat_out'][$iw],
                "number" => $data['number_out'][$iw],
                "number7_8" => $data['number7_8_out'][$iw],
                "number8_9" => $data['number8_9_out'][$iw],
                "number9_10" => $data['number9_10_out'][$iw],
                "number10_11" => $data['number10_11_out'][$iw],
                "number11_12" => $data['number11_12_out'][$iw],
                "number12_1" => $data['number12_1_out'][$iw],
                "number1_2" => $data['number1_2_out'][$iw],
                "number2_3" => $data['number2_3_out'][$iw],
                "number3_4" => $data['number3_4_out'][$iw],
                "number4_5" => $data['number4_5_out'][$iw],
                "number5_6" => $data['number5_6_out'][$iw],
            ];
            $success = Ento_04_mosq_new::where('id', $data['ento_04_mosq_new_id_out'][$iw])->update($ento4newmos_out);
        }
        // new data

        $NEW_INDOR = count($data['number7_8']) - $DataFildCount_INDOR;
        $NEW_OUT = count($data['number7_8_out']) - $DataFildCount2_OUT;


        // new data
        if ($DataFildCount < count($data['number7_8'])) {


            for ($i = $DataFildCount; $i < count($data['number7_8']); $i++) {


                $ento4newmos = [
                    "ento_04_id_data" => $ento_04_id,
                    "mosq_spec_stat" => $data['mosq_spec_stat'][$i],
                    "number" => $data['number'][$i],
                    "number7_8" => $data['number7_8'][$i],
                    "number8_9" => $data['number8_9'][$i],
                    "number9_10" => $data['number9_10'][$i],
                    "number10_11" => $data['number10_11'][$i],
                    "number11_12" => $data['number11_12'][$i],
                    "number12_1" => $data['number12_1'][$i],
                    "number1_2" => $data['number1_2'][$i],
                    "number2_3" => $data['number2_3'][$i],
                    "number3_4" => $data['number3_4'][$i],
                    "number4_5" => $data['number4_5'][$i],
                    "number5_6" => $data['number5_6'][$i],
                    "formtype" => 'indoor',

                ];
                $ento4_data_in2 = Ento_04_mosq_new::create($ento4newmos);
            }
        }

        // out dor new data insert
        if ($DataFildCount2 < count($data['number7_8_out'])) {
            for ($i = $DataFildCount2; $i < count($data['number7_8_out']); $i++) {
                $ento4newmos = [
                    "ento_04_id_data" => $ento_04_id,
                    "mosq_spec_stat" => $data['mosq_spec_stat_out'][$iw],
                    "number" => $data['number_out'][$iw],
                    "number7_8" => $data['number7_8_out'][$iw],
                    "number8_9" => $data['number8_9_out'][$iw],
                    "number9_10" => $data['number9_10_out'][$iw],
                    "number10_11" => $data['number10_11_out'][$iw],
                    "number11_12" => $data['number11_12_out'][$iw],
                    "number12_1" => $data['number12_1_out'][$iw],
                    "number1_2" => $data['number1_2_out'][$iw],
                    "number2_3" => $data['number2_3_out'][$iw],
                    "number3_4" => $data['number3_4_out'][$iw],
                    "number4_5" => $data['number4_5_out'][$iw],
                    "number5_6" => $data['number5_6_out'][$iw],
                    "formtype" => 'outdoor',
                ];

                $ento4_data_in2 = Ento_04_mosq_new::create($ento4newmos);
            }
        }







        return redirect()->back()->with('message', true);
    }


    public function delete_ento4_mosqdata($id)
    {
        $res = Ento_04_mosq_new::where('id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }


    public function ento5fill($typeForm, $id)
    {
        $data = 0;
        $form = "";
        $form = $typeForm;
        $mid = $id;

        switch ($form) {
            case "1":
                $typeForm="ento_01";
                break;
            case "2":
                $typeForm="ento_02";
                break;
            case "3":
                $typeForm="ento_03";
                break;
            case "4":
                $typeForm="ento_04";
                break;
            default:
            $typeForm="ento_011";
        }

        $list = DB::table('ento_05_new')
        ->select('*')
        ->where('main_form_type',$typeForm)
        ->where('main_form_id',$id)
        ->first();
        if ($list) {
        $received_by_postion=$list->received_by_postion;
        $received_by=$list->received_by;
        $dissected_by_by_postion=$list->dissected_by_by_postion;
        $dissected_by=$list->dissected_by;
        $examined_by_by_postion="$list->examined_by_by_postion";
        $examined=$list->examined;
        $dissected_by_date=$list->dissected_by_date;
        $examined_date=$list->examined_date;
        $received_by_date=$list->received_by_date;
        print_r($received_by_postion.":".$received_by.":".$dissected_by_by_postion.":". $dissected_by .":".$examined_by_by_postion.":". $examined.":". $dissected_by_date.":".$examined_date.":".$received_by_date);
        }
        // print_r("0:0:0:0:0:0:0:0:0);
    }





    public function newgetaddress($typeForm, $id)
    {

        $data = 0;
        $form = "";
        $form = $typeForm;
        $mid = $id;
        switch ($form) {

            case "1":
                $address_list = DB::table('ento_01_data')
                    ->select('*')
                    ->where('ento_01_id', $mid)
                    ->get();
                foreach ($address_list as $listad) {
                    $data = 1;
                    print_r('<option value="' . $listad->house_no . "-%" . $listad->id . '">' . $listad->house_no . '</option>');
                }
                break;

            case "2":
                $address_list = DB::table('ento_02_data')
                    ->select('*')
                    ->where('ento_02_id', $mid)
                    ->get();

                foreach ($address_list as $listad) {
                    $data = 1;
                    print_r('<option value="' . $listad->address . "-%" . $listad->id . '">' . $listad->address ."  ".$listad->chief_occupant . '</option>');
                }
                break;

            case "3":
                $address_list = DB::table('ento_03')
                    ->select('*')
                    ->where('ento_03_id', $mid)
                    ->get();
                foreach ($address_list as $listad) {

                    $data = 1;
                    print_r('<option value="' . $listad->address . "-%" . $listad->ento_03_id . '">' . $listad->address . '</option>');
                }
                break;

            case "4":
                $address_list = DB::table('ento_04')
                    ->select('*')
                    ->where('ento_04_id', $mid)
                    ->get();
                foreach ($address_list as $listad) {

                    $data = 1;
                    print_r('<option value="' . $listad->locality . "-%" . $listad->ento_04_id . '">' . $listad->locality . '</option>');
                }
                break;

            default:
                print_r('<option value="">No data faund</option>');
        }
    }









    public function newgetaddress2($typeForm, $id)
    {

        $data = 0;
        $form = "";
        $form = $typeForm;
        $mid = $id;
        switch ($form) {

            case "3":
                $address_list = DB::table('ento_03_data')
                    ->select('*')
                    ->where('ento_03_id', $mid)
                    ->get();
                foreach ($address_list as $listad) {
                    $data = 1;
                    print_r('<option value="' . $listad->mosq_species . "-%" . $listad->id . '">' . $listad->mosq_species . '</option>');
                }
                break;

            case "4":
                $address_list = DB::table('ento_04_mosq_new')
                    ->select('*')
                    ->where('ento_04_id_data', $mid)
                    ->get();
                foreach ($address_list as $listad) {

                    $data = 1;
                    print_r('<option value="' . $listad->mosq_spec_stat . "-%" . $listad->id . '">' . $listad->mosq_spec_stat     . '</option>');
                }
                break;

            default:
                print_r('<option value="">No data faund</option>');
        }
    }
}
