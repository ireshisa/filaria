<?php

namespace App\Http\Controllers;

use App\Ento_5;
use App\Ento_5_mosq;
use App\Ento_5_species;
use App\Ento_5_new_mosq;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



use App\Ento_5_new;

class Ento5Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view_all()
    {
        $ento5 = "";
        if (Auth::user()->role === "ADMIN" || Auth::user()->role === "AFC") {
            $ento5 = DB::table('ento_05')
                ->select('*')
                ->orderBy('ento_05_id', 'desc')
                ->get();
        } else {
            $ento5 = DB::table('ento_05')
                ->select('*')
                ->where('district', Auth::user()->district)
                ->where('user_name', Auth::user()->email)
                ->orderBy('ento_05_id', 'desc')
                ->get();
        }

        $data['template'] = 'ento_05/ento_05_view';
        return view('template_user/template', compact('data'), ["ento5_list" => $ento5]);
    }



    public function Newview_all()
    {
        $ento5 = "";
        if (Auth::user()->role === "ADMIN" || Auth::user()->role === "AFC") {
            $ento5 = DB::table('ento_05_new')
                ->select('*')
                ->orderBy('ento_05_new_id', 'desc')
                ->get();
        } else {
            $ento5 = DB::table('ento_05_new')
                ->select('*')
                // ->where('district', Auth::user()->district)
                ->where('user_name', Auth::user()->email)
                ->orderBy('ento_05_new_id', 'desc')
                ->get();
        }
        $data['template'] = 'ento_05/ento_05_new_view';
        return view('template_user/template', compact('data'), ["ento5_list" => $ento5]);
    }






    public function index()
    {
        $data['template'] = 'ento_05/ento_05';
        return view('template_user/template', compact('data'));
    }

    public function ento5mosq()
    {
        $list = DB::table('ento_05')
            ->select('*')
            ->where('user_name', Auth::user()->email)
            ->orderBy('ento_05_id', 'desc')
            ->get();

        // if (Auth::user()->role !== "ADMIN" && Auth::user()->role !== "AFC") {
        //     foreach ($list0 as $row) {
        //         $result = DB::table($row->main_form_type)
        //         ->select('*')
        //         ->where($row->main_form_type . '_id', $row->main_form_id)
        //         ->get();

        //         foreach($result as $res) {
        //             if ($res->user_name == Auth::user()->email) {
        //                 array_push($list, $row);
        //             }
        //         }
        //     }
        // } else {
        //     $list = $list0;
        // }

        $data['template'] = 'ento_05/ento_05_mosq';
        return view('template_user/template', compact('data'), ["ento5_list" => $list]);
    }

    public function ento5species()
    {
        $list = DB::table('ento_05')
            ->select('*')
            ->orderBy('ento_05_id', 'desc')
            ->get();
        $data['template'] = 'ento_05/ento_05_species';
        return view('template_user/template', compact('data'), ["ento5_list" => $list]);
    }




    public function getEnto1FromData($value)
    {

        $resting_place_1 = 0;
        $resting_place_2 = 0;
        $resting_place_3 = 0;
        $resting_place_4 = 0;
        $resting_place_5 = 0;
        $resting_place_6 = 0;

        $resting_place_1_mansonia = 0;
        $resting_place_2_mansonia = 0;
        $resting_place_3_mansonia = 0;
        $resting_place_4_mansonia = 0;
        $resting_place_5_mansonia = 0;
        $resting_place_6_mansonia = 0;

        $no_of_culex = 0;
        $total_time_spend = 0;
        $no_of_collectors = 0;
        $mansonia_spcies_of_mosquitos_collected = 0;

        $list = DB::table("ento_01")
            ->join('ento_01_data', 'ento_01.ento_01_id', '=', 'ento_01_data.ento_01_id')
            ->where('ento_01_data.ento_01_id', $value)
            ->get();

        if (count($list) > 0) {

            $mansonia_spcies_of_mosquitos_collected = $list[0]->mansonia_spcies_of_mosquitos_collected;
            $no_of_collectors = $no_of_collectors + $list[0]->no_of_collectors;
            $total_time_spend = $total_time_spend + $list[0]->total_time_spend;
            for ($j = 0; $j < count($list); $j++) {
                $resting_place_1 = $resting_place_1 + $list[$j]->resting_place_1;
                $resting_place_2 = $resting_place_2 + $list[$j]->resting_place_2;
                $resting_place_3 = $resting_place_3 + $list[$j]->resting_place_3;
                $resting_place_4 = $resting_place_4 + $list[$j]->resting_place_4;
                $resting_place_5 = $resting_place_5 + $list[$j]->resting_place_5;
                $resting_place_6 = $resting_place_6 + $list[$j]->resting_place_6;

                $resting_place_1_mansonia = $resting_place_1_mansonia + $list[$j]->resting_place_1_mansonia;
                $resting_place_2_mansonia = $resting_place_2_mansonia + $list[$j]->resting_place_2_mansonia;
                $resting_place_3_mansonia = $resting_place_3_mansonia + $list[$j]->resting_place_3_mansonia;
                $resting_place_4_mansonia = $resting_place_4_mansonia + $list[$j]->resting_place_4_mansonia;
                $resting_place_5_mansonia = $resting_place_5_mansonia + $list[$j]->resting_place_5_mansonia;
                $resting_place_6_mansonia = $resting_place_6_mansonia + $list[$j]->resting_place_6_mansonia;


                $no_of_culex = $no_of_culex + $list[$j]->no_of_culex;
            }
        } else {
            print_r("0:0:0");
        }

        print_r(
            $resting_place_1
                . ":" . $resting_place_2
                . ":" . $resting_place_3
                . ":" . $resting_place_4
                . ":" . $resting_place_5
                . ":" . $resting_place_6
                . ":" . $no_of_culex
                . ":" . $total_time_spend
                . ":" . $no_of_collectors
                . ":" . $mansonia_spcies_of_mosquitos_collected
                . ":" . $resting_place_1_mansonia
                . ":" . $resting_place_2_mansonia
                . ":" . $resting_place_3_mansonia
                . ":" . $resting_place_4_mansonia
                . ":" . $resting_place_5_mansonia
                . ":" . $resting_place_6_mansonia
        );
    }


    public function getEnto2FromData($value)
    {
        $list = DB::table("ento_02")
            ->where('ento_02_id', $value)
            ->get();

        if (count($list) > 0) {
            print_r(
                "0:0:0:0:0:0:" . $list[0]->total_cx_quin_mosq . ":0:0:0"
            );
        } else {
            print_r("0:0:0:0:0:0:0:0:0:0:0");
        }
    }




    public function getEnto3FromData($value)
    {
        $culex = 0;
        $mansoniay = 0;

        $list = DB::table("ento_03")
            ->join('ento_03_data', 'ento_03.ento_03_id', '=', 'ento_03_data.ento_03_id')
            ->where('ento_03.ento_03_id', $value)
            ->where('ento_03_data.mosq_species', "Culex (culex) quinquefasciatus")
            ->SUM('ento_03_data.no_of_mosq');

        $list2 = DB::table("ento_03")
            ->join('ento_03_data', 'ento_03.ento_03_id', '=', 'ento_03_data.ento_03_id')
            ->where('ento_03.ento_03_id', $value)
            ->where('ento_03_data.mosq_species', 'like', 'Mansonia%')
            ->SUM('ento_03_data.no_of_mosq');



        $culex = $list;
        $mansoniay =   $list2;



        print_r("0:0:0:0:0:0:" . $culex . ":0:0:" . $mansoniay . ":0:0:0:0:0:0");
    }





    public function getEntoAllFromData($main_form_type, $val)
    {
        $total_cx_quin_mosq_value = 0;
        $total_mansonia_sp_value = 0;

        if ($main_form_type == "1") {
            $list = DB::table("ento_01")
                ->join('ento_01_data', 'ento_01.ento_01_id', '=', 'ento_01_data.ento_01_id')
                ->where('ento_01_data.ento_01_id', $val)
                ->get();
            if (count($list) > 0) {
                for ($j = 0; $j < count($list); $j++) {
                    $total_cx_quin_mosq_value = $total_cx_quin_mosq_value + $list[$j]->no_of_dissected;
                    $total_mansonia_sp_value = $total_mansonia_sp_value + $list[$j]->no_of_dissected_ma;
                }
            }
        }

        if ($main_form_type == "2") {
            $list = DB::table("ento_02")
                ->join('ento_02_data', 'ento_02.ento_02_id', '=', 'ento_02_data.ento_02_id')
                ->where('ento_02_data.ento_02_id', $val)
                ->get();

            if (count($list) > 0) {
                for ($j = 0; $j < count($list); $j++) {
                    $total_cx_quin_mosq_value = $total_cx_quin_mosq_value + $list[$j]->no_of_dissected;
                    $total_mansonia_sp_value = 0;
                }
            }
        }

        if ($main_form_type == "3") {
            $list = DB::table("ento_03")
                ->join('ento_03_data', 'ento_03.ento_03_id', '=', 'ento_03_data.ento_03_id')
                ->where('ento_03.ento_03_id', $val)
                ->where('ento_03_data.mosq_species', "Culex (culex) quinquefasciatus")
                ->SUM('ento_03_data.no_of_dissected');

            $list2 = DB::table("ento_03")
                ->join('ento_03_data', 'ento_03.ento_03_id', '=', 'ento_03_data.ento_03_id')
                ->where('ento_03.ento_03_id', $val)
                ->where('ento_03_data.mosq_species', 'like', 'Mansonia%')
                ->SUM('ento_03_data.no_of_dissected');
            $total_cx_quin_mosq_value = $list;
            $total_mansonia_sp_value = $list2;
        }
        print_r($total_cx_quin_mosq_value . ":" . $total_mansonia_sp_value);
    }




















    public function getEnto4FromData($value)
    {


        $culex_total = 0;
        $mansonia_total = 0;
        // indoor culex total
        $list1 = DB::table("ento_04")
            ->join('ento_04_indoor', 'ento_04.ento_04_id', '=', 'ento_04_indoor.ento_04_id')
            ->join('ento_04_mosq', 'ento_04_indoor.id', '=', 'ento_04_mosq.ento_04_id')
            ->where('ento_04.ento_04_id', $value)
            ->where('ento_04_mosq.mosq_species', 'like', 'Culex (culex) quinquefasciatus%')
            ->SUM('ento_04_mosq.mos_number');
        $culex_total = $culex_total + $list1;

        // indoor mansoniay total
        $list2 = DB::table("ento_04")
            ->join('ento_04_indoor', 'ento_04.ento_04_id', '=', 'ento_04_indoor.ento_04_id')
            ->join('ento_04_mosq', 'ento_04_indoor.id', '=', 'ento_04_mosq.ento_04_id')
            ->where('ento_04.ento_04_id', $value)
            ->where('ento_04_mosq.mosq_species', 'like', 'Mansonia%')
            ->SUM('ento_04_mosq.mos_number');
        $mansonia_total = $mansonia_total +  $list2;



        // outdoor culex total
        $list3 = DB::table("ento_04")
            ->join('ento_04_outdoor', 'ento_04.ento_04_id', '=', 'ento_04_outdoor.ento_04_id')
            ->join('ento_04_mosq', 'ento_04_outdoor.id', '=', 'ento_04_mosq.ento_04_id')
            ->where('ento_04.ento_04_id', $value)
            ->where('ento_04_mosq.mosq_species', 'like', 'Culex (culex) quinquefasciatus%')
            ->SUM('ento_04_mosq.mos_number');

        $culex_total = $culex_total + $list3;

        // outdoor Mansonia total
        $list4 = DB::table("ento_04")
            ->join('ento_04_outdoor', 'ento_04.ento_04_id', '=', 'ento_04_outdoor.ento_04_id')
            ->join('ento_04_mosq', 'ento_04_outdoor.id', '=', 'ento_04_mosq.ento_04_id')
            ->where('ento_04.ento_04_id', $value)
            ->where('ento_04_mosq.mosq_species', 'like', 'Mansonia%')
            ->SUM('ento_04_mosq.mos_number');
        $mansonia_total = $mansonia_total +  $list4;
        print_r("0:0:0:0:0:0:" . $culex_total . ":0:0:" . $mansonia_total);
    }





    public function getEntoFrom($table)
    {
        if (Auth::user()->role !== "ADMIN" && Auth::user()->role !== "AFC") {
            $list = DB::table($table)
                ->select('*')
                ->where('district', Auth::user()->district)
                ->get();
        } else {
            $list = DB::table($table)
                ->select('*')
                ->get();
        }
        print_r('<option value=""> </option>');

        if ($table == "ento_01") {
            foreach ($list as $s) {
                print_r('<option value="' . $s->ento_01_id  . '">' . $s->formid . ' / ' . $s->district . '</option>');
            }
        }
        if ($table == "ento_02") {
            foreach ($list as $s) {
                print_r('<option value="' . $s->ento_02_id . '">' . $s->formid . ' / ' . $s->district . '</option>');
            }
        }
        if ($table == "ento_03") {
            foreach ($list as $s) {
                print_r('<option value="' . $s->ento_03_id . '">' . $s->formid . ' / ' . $s->district . '</option>');
            }
        }
        if ($table == "ento_04") {
            foreach ($list as $s) {
                print_r('<option value="' . $s->ento_04_id . '">' . $s->formid . ' / ' . $s->district . '</option>');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ento5_update(Request $request)
    {
        $data = $request->all();
        $id = $data['ento_05_id'];
        unset($data['ento_05_id'], $data['_token']);
        $success = Ento_5::where('ento_05_id', $id)->update($data);
        if ($success) {
            return redirect()->back()->with('update', true);
        } else {
            return redirect()->back()->with('update', false);
        }
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $main_form_id = $data['main_form_id'];
        $myArray = explode('/', $main_form_id);
        $data["main_form_id"] = $myArray[0];
        // $data["district"] = $myArray[1];

        $data["user_name"] = Auth::user()->email;
        $success = Ento_5::create($data);

        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function ento_05_mosq_save(Request $request)
    {
        $data = $request->all();
        // $data1=[
        //     "ento_05_id"=>$data['ento_05_id'],
        //     "species"=>$data['species'],
        //     "positive_mosq"=>$data['positive_mosq'],
        //     "head_mf"=>$data['head_mf'],
        //     "head_l1"=>$data['head_l1'],
        //     "head_l2"=>$data['head_l2'],
        //     "head_l3"=>$data['head_l3'],
        //     "thorax_mf"=>$data['thorax_mf'],
        //     "thorax_l1"=>$data['thorax_l1'],
        //     "thorax_l2"=>$data['thorax_l2'],
        //     "thorax_l3"=>$data['thorax_l3'],
        //     "abdomen_mf"=>$data['abdomen_mf'],
        //     "abdomen_l1"=>$data['abdomen_l1'],
        //     "abdomen_l2"=>$data['abdomen_l2'],
        //     "abdomen_l3"=>$data['abdomen_l3'],
        //     "remarks"=>$data['remarks'],
        //     "species2"=>$data['species2'],
        //     "total_mosqito"=>$data['total_mosqito'],
        //     "abdo_uf"=>$data['abdo_uf'],
        //     "abdo_f"=>$data['abdo_f'],
        //     "abdo_sg"=>$data['abdo_sg'],
        //     "no_of_spoiled"=>$data['no_of_spoiled'],
        //     "no_of_dissected"=>$data['no_of_dissected'],
        //     "dissected_by"=>$data['dissected_by'],
        //     "dissected_by_date"=>$data['dissected_by_date'],
        //     "examined_date"=>$data['examined_date'],
        //     "examined"=>$data['examined'],
        //     "entered"=>$data['entered'],
        //     "entered_date"=>$data['entered_date'],
        // ];

        $data1 = [


            "ento_05_id" => $data['ento_05_id'],
            "dissected_by" => $data['dissected_by'],
            "dissected_by_date" => $data['dissected_by_date'],
            "examined_date" => $data['examined_date'],
            "entered_date" => $data['entered_date'],
            "species" => 'Cx quin',
            "total_mosqito" => $data['total_mosqito'],
            "abdo_uf" => $data['abdo_uf'],
            "abdo_f" => $data['abdo_f'],
            "abdo_sg" => $data['abdo_sg'],
            "abdo_g" => $data['abdo_g'],
            "no_of_spoiled" => $data['no_of_spoiled'],
            "no_of_dissected" => $data['no_of_dissected'],
            "examined" => $data['examined'],

        ];


        $data2 = [
            "ento_05_id" => $data['ento_05_id'],
            "dissected_by" => $data['dissected_by'],
            "dissected_by_date" => $data['dissected_by_date'],
            "examined_date" => $data['examined_date'],
            "entered_date" => $data['entered_date'],
            "species" => 'Mansonia',
            "total_mosqito" => $data['total_mosqito_ma'],
            "abdo_uf" => $data['abdo_uf_ma'],
            "abdo_f" => $data['abdo_f_ma'],
            "abdo_sg" => $data['abdo_sg_ma'],
            "abdo_g" => $data['abdo_g_ma'],
            "no_of_spoiled" => $data['no_of_spoiled_ma'],
            "no_of_dissected" => $data['no_of_dissected_ma'],
            "examined" => $data['examined'],

        ];












        $data["user_name"] = Auth::user()->email;
        $success_s = Ento_5_mosq::create($data1);
        $success_s = Ento_5_mosq::create($data2);
        if ($success_s) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }


















    public function ento_05_new_mosq_save(Request $request)
    {

        $data = $request->all();

        $data["user_name"] = Auth::user()->email;
        $success_s = Ento_5_new_mosq::create($data);
        // $success_s= Ento_5_species::create($data2);

        if ($success_s) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }








    public function ento5_mosq_update(Request $request)
    {
        $data = $request->all();
        // $data1=[
        //     "ento_05_id"=>$data['ento_05_id'],
        //     "species"=>$data['species'],
        //     "positive_mosq"=>$data['positive_mosq'],
        //     "head_mf"=>$data['head_mf'],
        //     "head_l1"=>$data['head_l1'],
        //     "head_l2"=>$data['head_l2'],
        //     "head_l3"=>$data['head_l3'],
        //     "thorax_mf"=>$data['thorax_mf'],
        //     "thorax_l1"=>$data['thorax_l1'],
        //     "thorax_l2"=>$data['thorax_l2'],
        //     "thorax_l3"=>$data['thorax_l3'],
        //     "abdomen_mf"=>$data['abdomen_mf'],
        //     "abdomen_l1"=>$data['abdomen_l1'],
        //     "abdomen_l2"=>$data['abdomen_l2'],
        //     "abdomen_l3"=>$data['abdomen_l3'],
        //     "remarks"=>$data['remarks'],
        // ];
        $id = $data['id'];
        unset($data['id'], $data['_token']);
        $success = Ento_5_mosq::where('id', $id)->update($data);
        if ($success) {
            return redirect()->back()->with('update', true);
        } else {
            return redirect()->back()->with('update', false);
        }
    }




    public function ento5_new_mosq_update(Request $request)
    {
        $data = $request->all();

        $id = $data['id'];
        unset($data['id'], $data['_token']);
        $success = Ento_5_new_mosq::where('id', $id)->update($data);
        if ($success) {
            return redirect()->back()->with('update', true);
        } else {
            return redirect()->back()->with('update', false);
        }
    }
    public function ento5_species_update(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        unset($data['id'], $data['_token']);
        $success = Ento_5_species::where('id', $id)->update($data);
        if ($success) {
            return redirect()->back()->with('update', true);
        } else {
            return redirect()->back()->with('update', false);
        }
    }

    public function ento_05_species_save(Request $request)
    {
        $data = $request->all();
        $data["user_name"] = Auth::user()->email;
        $success = Ento_5_species::create($data);
        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function getEnto5MosqData($id)
    {
        $list = DB::table('ento_05_mosq')
            ->select('*')
            ->where('ento_05_id', $id)
            ->get();
        $list2 = DB::table('ento_05')
            ->select('*')
            ->orderBy('ento_05_id', 'desc')
            ->get();
        $data['template'] = 'ento_05/ento_05_mosq_view';
        return view('template_user/template', compact('data'), ["ento5_mosq_list" => $list, "ento5_list" => $list2]);
    }




    public function getEnto5NewMosqData($id)
    {
        $list = DB::table('ento_05_new_mosq')
            ->select('*')
            ->where('ento_05_id', $id)
            ->get();



        $list2 = DB::table('ento_05_new_mosq')
            ->select('*')
            ->orderBy('ento_05_id', 'desc')
            ->get();


        $form_id = "";
        $new_list = DB::table('ento_05')
            ->select('*')
            ->where('ento_05_id', $id)
            ->get();

        $address_data = array();
        foreach ($new_list as $s) {
            $form_id = $s->main_form_type;
            $mid = $s->main_form_id;
        }


        switch ($form_id) {

            case "ento_01":
                $address_list = DB::table('ento_01_data')
                    ->select('*')
                    ->where('ento_01_id', $mid)
                    ->get();
                foreach ($address_list as $listad) {

                    $address_data[] = array('address' =>  $listad->house_no);
                }
                break;


            case "ento_02":
                $address_list = DB::table('ento_02_data')
                    ->select('*')
                    ->where('ento_02_id', $mid)
                    ->get();

                foreach ($address_list as $listad) {

                    $address_data[] = array('address' =>  $listad->chief_occupant);
                }
                break;


            case "ento_03":
                $address_list = DB::table('ento_03')
                    ->select('*')
                    ->where('ento_03_id', $mid)
                    ->get();
                foreach ($address_list as $listad) {


                    $address_data[] = array('address' =>  $listad->address);
                }
                break;



            case "ento_04":
                $address_list = DB::table('ento_04')
                    ->select('*')
                    ->where('ento_04_id', $mid)
                    ->get();
                foreach ($address_list as $listad) {


                    $address_data[] = array('address' =>  $listad->locality);
                }
                break;


            default:
        }

        $data['template'] = 'ento_05/ento_05_new_mosq_view';
        return view('template_user/template', compact('data'), ["ento5_mosq_list" => $list, "ento5_list" => $list2, "address_list" => $address_data]);
    }





    public function getEnto5SpeciesData($id)
    {
        $list = DB::table('ento_05_species')
            ->select('*')
            ->where('ento_05_id', $id)
            ->get();
        $data['template'] = 'ento_05/ento_05_species_view';
        $list2 = DB::table('ento_05')
            ->select('*')
            ->orderBy('ento_05_id', 'desc')
            ->get();

        return view('template_user/template', compact('data'), ["ento5_species_list" => $list, "ento5_list" => $list2]);
    }

    public function delete_ento5($id)
    {
        $res = Ento_5::where('ento_05_id', $id)->delete();
        $res1 = Ento_5_mosq::where('ento_05_id', $id)->delete();
        $res2 = Ento_5_species::where('ento_05_id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function delete_ento5_mosq($id)
    {
        $res = Ento_5_mosq::where('id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }



    public function delete_ento5_new_mosq($id)
    {
        $res = Ento_5_new_mosq::where('id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }



    public function delete_ento5_species($id)
    {
        $res = Ento_5_species::where('id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }


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
        //
    }









    //           Ento5Controller                newForm

    public function ento5new()
    {
        $list = "";

        $data['template'] = 'ento_05/ento_05_ento5new';
        return view('template_user/template', compact('data'), ["ento5_list" => $list]);
    }










    public function ento_05_new_save(Request $request)
    {
        $data = $request->all();
        switch ($data['main_form_type']) {
            case 'ento_01':
                $list = DB::table($data['main_form_type'])
                    ->select('*')->where("ento_01_id", $data['main_form_id'])
                    ->first();
                break;
            case 'ento_02':
                $list = DB::table($data['main_form_type'])
                    ->select('*')->where("ento_02_id", $data['main_form_id'])
                    ->first();
                # code...
                break;
            case 'ento_03':
                $list = DB::table($data['main_form_type'])
                    ->select('*')->where("ento_03_id", $data['main_form_id'])
                    ->first();
                break;
            case 'ento_04':
                $list = DB::table($data['main_form_type'])
                    ->select('*')->where("ento_04_id", $data['main_form_id'])
                    ->first();
                break;
            default:
                break;
        }


        $formid = $list->formid;
        if (empty($formid)) {
            return redirect()->back()->with('message', false);
        }

        $DataFildCount = count($data['address']);
        for ($i = 0; $i < $DataFildCount; $i++) {

            $myString =  $data['address'][$i];  //address =>0 , id =>1



            $myArray = explode('-%', $myString);





            if ($data['main_form_type'] == 'ento_03' || $data['main_form_type'] == 'ento_04') {

                $myString2 =  $data['species2'][$i];  //address =>0 , id =>1

                $myArray1 = explode('-%', $myString2);

                dd($myArray1);

                $data2 = [
                    "type_of_parasite" => $data['type_of_parasite'][$i],
                    "main_form_type" => $data['main_form_type'],
                    "main_form_id" => $data['main_form_id'],
                    "formid" => $formid,
                    "received_by" => $data['received_by'],
                    "dissected_by" => $data['dissected_by'],
                    "examined" => $data['examined'],
                    "dissected_by_date" => $data['dissected_by_date'],
                    "examined_date" => $data['examined_date'],
                    "address" => $myArray[0],
                    "main_form_data_id" => $myArray1[1],
                    "species2" => $myArray1[0],
                    "positive_mosq" => $data['positive_mosq'][$i],
                    "mq_postive_for_l3" => $data['mq_postive_for_l3'][$i],
                    "head_mf" => $data['head_mf'][$i],
                    "head_l1" => $data['head_l1'][$i],
                    "head_l2" => $data['head_l2'][$i],
                    "head_l3" => $data['head_l3'][$i],
                    "thorax_mf" => $data['thorax_mf'][$i],
                    "thorax_l1" => $data['thorax_l1'][$i],
                    "thorax_l2" => $data['thorax_l2'][$i],
                    "thorax_l3" => $data['thorax_l3'][$i],
                    "abdomen_mf" => $data['abdomen_mf'][$i],
                    "abdomen_l1" => $data['abdomen_l1'][$i],
                    "abdomen_l2" => $data['abdomen_l2'][$i],
                    "abdomen_l3" => $data['abdomen_l3'][$i],
                    "remarks" => $data['remarks'][$i],
                    "confirmed" => $data['confirmed'],
                    "confirmed_by" => $data['confirmed_by'],
                    "user_name" => Auth::user()->email,
                    "no_dissected_mosquitos" => $data['no_dissected_mosquitos'][$i],
                    "received_by_postion" => $data['received_by_postion'],
                    "dissected_by_by_postion" => $data['dissected_by_by_postion'],
                    "examined_by_by_postion" => $data['examined_by_by_postion'],
                    "received_by_date" => $data['received_by_date'],

                ];
            } else {
                $data2 = [
                    "type_of_parasite" => $data['type_of_parasite'][$i],
                    "main_form_type" => $data['main_form_type'],
                    "main_form_id" => $data['main_form_id'],
                    "formid" => $formid,
                    "received_by" => $data['received_by'],
                    "dissected_by" => $data['dissected_by'],
                    "examined" => $data['examined'],
                    "dissected_by_date" => $data['dissected_by_date'],
                    "examined_date" => $data['examined_date'],
                    "address" => $myArray[0],
                    "main_form_data_id" => $myArray[1],
                    "species2" => $data['species2'][$i],
                    "positive_mosq" => $data['positive_mosq'][$i],
                    "mq_postive_for_l3" => $data['mq_postive_for_l3'][$i],
                    "head_mf" => $data['head_mf'][$i],
                    "head_l1" => $data['head_l1'][$i],
                    "head_l2" => $data['head_l2'][$i],
                    "head_l3" => $data['head_l3'][$i],
                    "thorax_mf" => $data['thorax_mf'][$i],
                    "thorax_l1" => $data['thorax_l1'][$i],
                    "thorax_l2" => $data['thorax_l2'][$i],
                    "thorax_l3" => $data['thorax_l3'][$i],
                    "abdomen_mf" => $data['abdomen_mf'][$i],
                    "abdomen_l1" => $data['abdomen_l1'][$i],
                    "abdomen_l2" => $data['abdomen_l2'][$i],
                    "abdomen_l3" => $data['abdomen_l3'][$i],
                    "remarks" => $data['remarks'][$i],
                    "confirmed" => $data['confirmed'],
                    "confirmed_by" => $data['confirmed_by'],
                    "user_name" => Auth::user()->email,
                    "no_dissected_mosquitos" => $data['no_dissected_mosquitos'][$i],
                    "received_by_postion" => $data['received_by_postion'],
                    "dissected_by_by_postion" => $data['dissected_by_by_postion'],
                    "examined_by_by_postion" => $data['examined_by_by_postion'],
                    "received_by_date" => $data['received_by_date'],
                ];
            }



            $success_s = Ento_5_new::create($data2);
        }



        if ($success_s) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }


    public function ento_05_new_edit(Request $request)
    {
        $data = $request->all();

        $formid = $data['formid'];
        $DataFildCount = count($data['ento_05_new_id']);
        for ($i = 0; $i < $DataFildCount; $i++) {

            $data2 = [
                "type_of_parasite" => $data['type_of_parasite'][$i],
                "dissected_by" => $data['dissected_by'],
                "received_by" => $data['received_by'],
                "examined" => $data['examined'],
                "dissected_by_date" => $data['dissected_by_date'],
                "examined_date" => $data['examined_date'],
                "no_dissected_mosquitos" => $data['no_dissected_mosquitos'][$i],
                "positive_mosq" => $data['positive_mosq'][$i],
                "mq_postive_for_l3" => $data['mq_postive_for_l3'][$i],
                "head_mf" => $data['head_mf'][$i],
                "head_l1" => $data['head_l1'][$i],
                "head_l2" => $data['head_l2'][$i],
                "head_l3" => $data['head_l3'][$i],
                "thorax_mf" => $data['thorax_mf'][$i],
                "thorax_l1" => $data['thorax_l1'][$i],
                "thorax_l2" => $data['thorax_l2'][$i],
                "thorax_l3" => $data['thorax_l3'][$i],
                "abdomen_mf" => $data['abdomen_mf'][$i],
                "abdomen_l1" => $data['abdomen_l1'][$i],
                "abdomen_l2" => $data['abdomen_l2'][$i],
                "abdomen_l3" => $data['abdomen_l3'][$i],
                "remarks" => $data['remarks'][$i],
                "confirmed" => $data['confirmed'],
                "confirmed_by" => $data['confirmed_by'],
                "received_by_date" => $data['received_by_date'],
            ];
            $success = Ento_5_new::where('ento_05_new_id', $data['ento_05_new_id'][$i])->update($data2);
        }

        if (!empty($data['idnew'])) {
            $DataFildCount = count($data['idnew']);
            for ($i = 0; $i < $DataFildCount; $i++) {

                $myString =  $data['addresse'][$i];  //address =>0 , id =>1
                $myArray = explode('-%', $myString);
                if ($data['main_form_type'] == 'ento_03' || $data['main_form_type'] == 'ento_04') {

                    $myString2 =  $data['species2e'][$i];  //address =>0 , id =>1

                    $myArray1 = explode('-%', $myString2);

                    $data2 = [
                        "type_of_parasite" => $data['type_of_parasitee'][$i],
                        "main_form_type" => $data['main_form_type'],
                        "main_form_id" => $data['main_form_id'],
                        "formid" => $formid,
                        "received_by" => $data['received_by'],
                        "dissected_by" => $data['dissected_by'],
                        "examined" => $data['examined'],
                        "dissected_by_date" => $data['dissected_by_date'],
                        "examined_date" => $data['examined_date'],
                        "address" => $myArray[0],
                        "main_form_data_id" => $myArray1[1],
                        "species2" => $myArray1[0],
                        "positive_mosq" => $data['positive_mosqe'][$i],
                        "mq_postive_for_l3" => $data['mq_postive_for_l3e'][$i],
                        "head_mf" => $data['head_mfe'][$i],
                        "head_l1" => $data['head_l1e'][$i],
                        "head_l2" => $data['head_l2e'][$i],
                        "head_l3" => $data['head_l3e'][$i],
                        "thorax_mf" => $data['thorax_mfe'][$i],
                        "thorax_l1" => $data['thorax_l1e'][$i],
                        "thorax_l2" => $data['thorax_l2e'][$i],
                        "thorax_l3" => $data['thorax_l3e'][$i],
                        "abdomen_mf" => $data['abdomen_mfe'][$i],
                        "abdomen_l1" => $data['abdomen_l1e'][$i],
                        "abdomen_l2" => $data['abdomen_l2e'][$i],
                        "abdomen_l3" => $data['abdomen_l3e'][$i],
                        "remarks" => $data['remarkse'][$i],
                        "confirmed" => $data['confirmed'],
                        "confirmed_by" => $data['confirmed_by'],
                        "user_name" => Auth::user()->email,
                        "no_dissected_mosquitos" => $data['no_dissected_mosquitose'][$i],
                        "received_by_postion" => $data['received_by_postion'],
                        "dissected_by_by_postion" => $data['dissected_by_by_postion'],
                        "examined_by_by_postion" => $data['examined_by_by_postion'],
                        "received_by_date" => $data['received_by_date'],

                    ];
                } else {
                    $data2 = [
                        "type_of_parasite" => $data['type_of_parasitee'][$i],
                        "main_form_type" => $data['main_form_type'],
                        "main_form_id" => $data['main_form_id'],
                        "formid" => $formid,
                        "received_by" => $data['received_by'],
                        "dissected_by" => $data['dissected_by'],
                        "examined" => $data['examined'],
                        "dissected_by_date" => $data['dissected_by_date'],
                        "examined_date" => $data['examined_date'],
                        "address" => $myArray[0],
                        "main_form_data_id" => $myArray[1],
                        "species2" => $data['species2e'][$i],
                        "positive_mosq" => $data['positive_mosqe'][$i],
                        "mq_postive_for_l3" => $data['mq_postive_for_l3e'][$i],
                        "head_mf" => $data['head_mfe'][$i],
                        "head_l1" => $data['head_l1e'][$i],
                        "head_l2" => $data['head_l2e'][$i],
                        "head_l3" => $data['head_l3e'][$i],
                        "thorax_mf" => $data['thorax_mfe'][$i],
                        "thorax_l1" => $data['thorax_l1e'][$i],
                        "thorax_l2" => $data['thorax_l2e'][$i],
                        "thorax_l3" => $data['thorax_l3e'][$i],
                        "abdomen_mf" => $data['abdomen_mfe'][$i],
                        "abdomen_l1" => $data['abdomen_l1e'][$i],
                        "abdomen_l2" => $data['abdomen_l2e'][$i],
                        "abdomen_l3" => $data['abdomen_l3e'][$i],
                        "remarks" => $data['remarkse'][$i],
                        "confirmed" => $data['confirmed'],
                        "confirmed_by" => $data['confirmed_by'],
                        "user_name" => Auth::user()->email,
                        "no_dissected_mosquitos" => $data['no_dissected_mosquitose'][$i],
                        "received_by_postion" => $data['received_by_postion'],
                        "dissected_by_by_postion" => $data['dissected_by_by_postion'],
                        "examined_by_by_postion" => $data['examined_by_by_postion'],
                        "received_by_date" => $data['received_by_date'],
                    ];
                }


                $success_s = Ento_5_new::create($data2);
            }
        }

        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }






    public function ento5_view_new($type, $id)
    {
        $data2 = \App\Ento_5_new::where("main_form_type", $type)
            ->where("main_form_id", $id)
            ->get();
        $data['template'] = 'ento_05/ento_05_ento5new_edit';
        return view('template_user/template', compact('data'), ["ento5_list" =>  $data2]);
    }




    public function ento5_view_new_delete($id)
    {
        $res = Ento_5_new::where('ento_05_new_id', $id)->delete();

        return redirect()->back()->with('message', true);
    }
}
