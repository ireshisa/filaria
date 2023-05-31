<?php

namespace App\Http\Controllers;

use App\Migrant;
use App\Migrant_Follow_up;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Migrant_formController extends Controller
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
        $data['template'] = 'migrant/migrant';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }

    public function migrant_follow_up()
    {
        $migrant_list = DB::table('migrant')
         ->select('*')
         ->orderBy('migrant_id', 'desc')
         ->get();
        $data['template'] = 'migrant/migrant_follow_up';
        return view('template_user/template', compact('data'), ["migrant_list" => $migrant_list]);
    }

    public function migrant_update(Request $request)
    {
        $data = $request->all();
        $id = $data['migrant_id'];
        unset($data['migrant_id'], $data['_token']);
        if(!empty($data["mosq_netsarray"]))
        {
          $data["actions_taken"]  =implode("|",$data["mosq_netsarray"]);
          unset( $data['mosq_netsarray']);
        }

        $success = Migrant::where('migrant_id', $id)->update($data);
        if ($success) {
            return redirect('migrant_view')->with('update', true);
        } else {
            return redirect('migrant_view')->with('update', false);
        }

    }

    public function create(Request $request)
    {
        $data = $request->all();
        $data["user_name"] = Auth::user()->email;

     if(!empty($data["mosq_netsarray"]))
        {
           $data["actions_taken"]  =implode("|",$data["mosq_netsarray"]);
           unset( $data['mosq_netsarray']);

        }
     $success = Migrant::create($data);


        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function migrant_follow_up_save(Request $request)
    {

        $data = $request->all();
        $data["user_name"] = Auth::user()->email;


      if(!empty($data["mosq_netsarray"]))
        {
            $data["actions_taken"]  =implode("|",$data["mosq_netsarray"]);
            unset( $data['mosq_netsarray']);
        }
        
        $success = Migrant_Follow_up::create($data);
        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function migrant_follow_update(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        unset($data['id'], $data['_token']);

         if(!empty($data["mosq_netsarray"]))
        {
               $data["actions_taken"]  =implode("|",$data["mosq_netsarray"]);
                  unset( $data['mosq_netsarray']);

        }
        $success = Migrant_Follow_up::where('id', $id)->update($data);
        if ($success) {
            return redirect()->back()->with('update', true);
        } else {
            return redirect()->back()->with('update', false);
        }
    }

    public function migrant_view()
    {
        if (Auth::user()->role === "RMO") {
            $migrant_list = DB::table('migrant')
                ->select('*')
                ->where('district', Auth::user()->district)
                ->orderBy('migrant_id', 'ASC')
                ->get();
        } else if (Auth::user()->role === "ADMIN" || Auth::user()->role === "AFC") {
            $migrant_list = DB::table('migrant')
                ->select('*')
                ->orderBy('migrant_id', 'ASC')
                ->get();
        } else {
            $migrant_list = DB::table('migrant')
                ->select('*')
                ->where('user_name', Auth::user()->email)
                ->orderBy('migrant_id', 'ASC')
                ->get();
        }

        $data['template'] = 'migrant/migrant_view';
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        return view('template_user/template', compact('data'), ["migrant_list" => $migrant_list, "district_list" => $district]);
    }





    public function migrant_custom(Request $request)
    {
        if (Auth::user()->role === "RMO") {
            $migrant_list = DB::table('migrant')
                ->select('*')
                ->where('district', Auth::user()->district)
                ->orderBy('migrant_id', 'desc')
                ->get();
        } else if (Auth::user()->role === "ADMIN" || Auth::user()->role === "AFC") {
            $migrant_list = DB::table('migrant')
                ->select('*')
                ->orderBy('migrant_id', 'desc')
                ->get();
        } else {
            $migrant_list = DB::table('migrant')
                ->select('*')
                ->where('user_name', Auth::user()->email)
                ->orderBy('migrant_id', 'desc')
                ->get();
        }




           $data2 = $request->all();
          $tablehades =$data2["fild"];
          $tablerow=$data2["fild"];

        for ($i = 0; $i < count($tablehades); $i++)
       {
switch ($tablehades[$i]) {

    case "district":
   $tablehades[$i]="District";
    break;

    case "moh_area":
    $tablehades[$i]="MOH Area";
    break;

    case "date":
    $tablehades[$i]="date";
    break;

    case "patient_id":
    $tablehades[$i]="Lab ID.No";
    break;

    case "opd_number":
    $tablehades[$i]="OPD –ID.No-Migrant";
    break;

    case "passport":
    $tablehades[$i]="Passport No";
    break;

    case "patient":
    $tablehades[$i]="Name";
    break;
  
    case "gender":
    $tablehades[$i]="Sex";
    break;

    case "age":
    $tablehades[$i]="Age";
    break;

    case "country_of_origin":
    $tablehades[$i]="Country";
    break;

    case "state":
    $tablehades[$i]="state";
    break;

    case "home_town":
    $tablehades[$i]="Town/village";
    break;

    
    case "work_place_in_lk":
    $tablehades[$i]="working Institution";
    break;

    case "work_plc_address":
    $tablehades[$i]="Work address";
    break;

    case "occupation":
    $tablehades[$i]="occupation";
    break;

    case "how_long":
    $tablehades[$i]="Period of stay";
    break;

    case "adress_in_sri_lanka":
    $tablehades[$i]="Resident. Add.";
    break;
   
    case "lk_contact":
    $tablehades[$i]="Cont.no.(SL)";
    break;

    case "origin_contact":
    $tablehades[$i]="Cont.no(Country)";
    break;

    case "had_filaria":
    $tablehades[$i]="Prev.infec. Fila.";
    break;

    
    case "when_filaria":
    $tablehades[$i]="when (If yes,when?) ";
    break;

    case "lymph":
    $tablehades[$i]="Symptoms (lim)";
    break;

    case "has_treated":
    $tablehades[$i]="Prev.Rx";
    break;


    case "mass_drug_admin":
    $tablehades[$i]="MDA";
    break;

    case "mass_drug_when":
    $tablehades[$i]="MDA (year)";
    break;

    case "gps_lat":
    $tablehades[$i]="GPS (Long.)";
    break;

    case "gps_long":
    $tablehades[$i]="GPS (Lat.)";
    break;

    case "antigen_by_ICT":
    $tablehades[$i]="Ag result";
    break;

    case "antibody_by_elisa":
    $tablehades[$i]="Ab result";
    break;

    case "collection_date":
    $tablehades[$i]="Date of collection of blood film";
    break;

    case "result_as_blood_samear":
    $tablehades[$i]="Result of the blood film";
    break;


    case "species_diagnosed":
    $tablehades[$i]="Species diagnosed ";
    break;

    case "mf_count":
    $tablehades[$i]="MF count";
    break;

    case "treatment_start_date":
    $tablehades[$i]="Date Rx";
    break;

    case "treatment_given_alb":
    $tablehades[$i]="Wt ( weight of the patient)";
    break;


    case "treatment_given_DEC":
    $tablehades[$i]="Rx (Treatment given : DEC / Albendazole)";
    break;

    case "Albendazole":
    $tablehades[$i]="albendazole1";
    break;

    case "due_date_for_5p":
    $tablehades[$i]="Due date for 5P";
    break;

    
    case "phfo_phi":
    $tablehades[$i]="PHFO/PHI";
    break;

    case "investigation_officer":
    $tablehades[$i]="PHLT";
    break;

     case "remarks":
    $tablehades[$i]="Remarks";
    break;


    case "deisgnation_inv":
    $tablehades[$i]="deisgnation_inv";
    break;

  default:

  


}
}

        $data['template'] = 'migrant/migrant_view_original';
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        return view('template_user/template', compact('data'), ["migrant_list" => $migrant_list, "district_list" => $district,"table_headers" => $tablehades, "table_row" => $tablerow]);
    }


































    

    public function view_migrant_data($id)
    {
        $migrant_follow_list = DB::table('migrant_follow')
            ->select('*')
            ->where('migrant_id', $id)
            ->orderBy('id', 'desc')
            ->get();
        $migrant_list = DB::table('migrant')
            ->select('*')
            ->orderBy('migrant_id', 'desc')
            ->get();
        $data['template'] = 'migrant/migrant_follow_view';
        return view('template_user/template', compact('data'), ["migrant_follow_list" => $migrant_follow_list, "migrant_list" => $migrant_list]);
    }

    public function delete_migrant($id)
    {
        $res = Migrant::where('migrant_id', $id)->delete();
        $res2 = Migrant_Follow_up::where('migrant_id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function delete_migrant_follow($id)
    {
        $res = Migrant_Follow_up::where('id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }
}
