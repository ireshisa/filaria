<?php

namespace App\Http\Controllers;

use App\Case1x;
use App\Case1x_follow_up;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
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
        $data['template'] = 'case_lx/case_lx';
        return view('template_user/template', compact('data'), ["district_list" => $district]);
    }

    public function case_lx_follow_up()
    {
        $caselx = DB::table('case_lx')
            ->select('*')
            ->orderBy('case_lx_id', 'desc')
            ->get();
        $data['template'] = 'case_lx/case_lx_follow_up';
        return view('template_user/template', compact('data'), ["caselx_list" => $caselx]);
    }





    public function caselx_update(Request $request)
    {
        $data = $request->all();
        $id = $data['case_lx_id'];
        unset($data['case_lx_id'], $data['_token']);


$data["actions_taken"]  =implode("|",$data["actions_takenarray"]);


   unset( $data['actions_takenarray']);
        
        $success = Case1x::where('case_lx_id', $id)->update($data);
        if ($success) {
            return redirect('caselx_view')->with('update', true);
        } else {
            return redirect('caselx_view')->with('update', false);
        }
    }

    public function register_case_lx(Request $request)
    {
        $data = $request->all();
        $data["user_name"] = Auth::user()->email;

        if(!empty($data["actions_takenarray"]))
        {
               $data["actions_taken"]  =implode("|",$data["actions_takenarray"]);

                  unset( $data['actions_takenarray']);

        }
        

        $success = Case1x::create($data);

        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function caselx_followup_update(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        unset($data['id'], $data['_token']);


if(!empty($data["meassuresarray"]))
{
$data["meassures"]  =implode("|",$data["meassuresarray"]);
      unset($data['meassuresarray']);
}

     


        $success = Case1x_follow_up::where('id', $id)->update($data);
        if ($success) {
            return redirect()->back()->with('update', true);
        } else {
            return redirect()->back()->with('update', false);
        }
    }

    public function case_lx_follow_up_save(Request $request)
    {
        $data = $request->all();
        $data["user_name"] = Auth::user()->email;

if(!empty($data["meassuresarray"]))
{

     $data["meassures"]  =implode("|",$data["meassuresarray"]);
     unset($data['meassuresarray']);
}


        $success = Case1x_follow_up::create($data);
        if ($success) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function view_all()
    {
        if (Auth::user()->role === "RMO") {
            $caselx_list = DB::table('case_lx')
                ->select('*')
                ->where('district', Auth::user()->district)
                ->orderBy('case_lx_id', 'ASC')
                ->get();
        } else if (Auth::user()->role === "ADMIN" || Auth::user()->role === "AFC") {
            $caselx_list = DB::table('case_lx')
                ->select('*')
                ->orderBy('case_lx_id', 'ASC')
                ->get();
        } else {
            $caselx_list = DB::table('case_lx')
                ->select('*')
                ->where('user_name', Auth::user()->email)
                ->orderBy('case_lx_id', 'ASC')
                ->get();
        }

        $data['template'] = 'case_lx/caselx_view_original';
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        return view('template_user/template', compact('data'), ["caselx_list" => $caselx_list, "district_list" => $district]);
    }









    public function caselx_custom(Request $request)
    {

        
        if (Auth::user()->role === "RMO") {
            $caselx_list = DB::table('case_lx')
                ->select('*')
                ->where('district', Auth::user()->district)
                ->orderBy('case_lx_id', 'desc')
                ->get();
        } else if (Auth::user()->role === "ADMIN" || Auth::user()->role === "AFC") {
            $caselx_list = DB::table('case_lx')
                ->select('*')
                ->orderBy('case_lx_id', 'desc')
                ->get();
        } else {
            $caselx_list = DB::table('case_lx')
                ->select('*')
                ->where('user_name', Auth::user()->email)
                ->orderBy('case_lx_id', 'desc')
                ->get();
        }

        $data['template'] = 'case_lx/caselx_view';
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        

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

     case "wbc_dc":
      $tablehades[$i]="WBC/DC";
    break;

    case "slide_id_number":
     $tablehades[$i]="OPD identification number";
    break;

    case "patient_id":
     $tablehades[$i]="Lab identification number";
    break;

    case "date_of_rep":
    $tablehades[$i]="Date of registration";
    break;

    case "name_of_patient":
     $tablehades[$i]="Name";
    break;

    case "sex":
     $tablehades[$i]="Sex";
    break;

    case "age":
     $tablehades[$i]="Age";
    break;

    case "occupation":
     $tablehades[$i]="Occupation";
    break;

    case "address":
     $tablehades[$i]="Address";
    break;

    case "pastaddress":
     $tablehades[$i]="Past addresses ";
    break;

    case "period_of_residence":
     $tablehades[$i]="Period of residence ";
    break;


    case "contact":
     $tablehades[$i]="Contact no ";
    break;

    case "gps_lat":
     $tablehades[$i]="GPS Latitude";
    break;

    case "gps_long":
     $tablehades[$i]="GPS Longitude";
    break;

    case "date_of_col":
     $tablehades[$i]="Date collected";
    break;

    case "date_of_examination":
     $tablehades[$i]="Date examined";
    break;

    case "species_diag":
     $tablehades[$i]="Species ";
    break;
   
    case "mf_count":
     $tablehades[$i]="MF count ";
    break;

    case "resultOfFilariaAg":
     $tablehades[$i]="Ag test (ICT) ";
    break;

    case "resultOfFilariaAntibody":
     $tablehades[$i]="Filaria Antibody (ELISA)";
    break;

    case "pslf":
     $tablehades[$i]="Suggestive symptoms ";
    break;


    case "history":
     $tablehades[$i]="PMHx /PSHx    ";
    break;

    
    case "Past_allergic_history":
     $tablehades[$i]="Allergic Hx ";
    break;

    case "treatment_started_on":
     $tablehades[$i]="Date Rx ";
    break;

    case "treatment_given_alb":
     $tablehades[$i]="Wt ";
    break;

    case "treatment_given_DEC":
    $tablehades[$i]="Treatment given : DEC";
    break;

    case "albendazole1":
    $tablehades[$i]="Albendazole";
    break;

    case "actions_taken":
    $tablehades[$i]="Actions taken for prevention";
    break;

    case "history_of_mda":
    $tablehades[$i]="History Of MDA (year)";
    break;

    case "phfo_phi":
    $tablehades[$i]="Name of PHFO/PHI collection blood film ";
    break;

    case "investigation_officer":
    $tablehades[$i]="Name of PHLT examined the blood film ";
    break;

    case "inv_date":
    $tablehades[$i]="Due date for 5P  ";
    break;
    
    case "remarks":
    $tablehades[$i]="Remarks  ";
    break;

    case "trading_Officer":
    $tablehades[$i]="Name of treating medical officer ";
    break;


  default:

  


}
}


   return view('template_user/template', compact('data'), ["caselx_list" => $caselx_list, "district_list" => $district, "table_headers" => $tablehades, "table_row" => $tablerow]);
    }

















    public function delete_caselx($id)
    {
        $res1 = Case1x::where('case_lx_id', $id)->delete();
        $res = Case1x_follow_up::where('case_lx_id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function delete_caselx_follow($id)
    {
        $res = Case1x_follow_up::where('id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', true);
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function view_caselx_data($id)
    {
        $list = DB::table('case_lx_follow_up')
            ->select('*')
            ->where('case_lx_id', $id)
            ->get();
        $caselx = DB::table('case_lx')
            ->select('*')
            ->orderBy('case_lx_id', 'desc')
            ->get();
        $data['template'] = 'case_lx/caselx_followup_view';
        return view('template_user/template', compact('data'), ["case_lx_followup_list" => $list, "caselx_list" => $caselx]);
    }
}
