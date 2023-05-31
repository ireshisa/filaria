<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function mf_rate($district, $year)
    {

        if ($district == "a") {
            $data = DB::table('f1')
                ->select('no_positive', 'no_examined')
                ->where('date_of_blood', 'like', $year . '-%-%')
                ->get();
        } else {
            $data = DB::table('f1')
                ->select('no_positive', 'no_examined')
                ->where('district', $district)
                ->where('date_of_blood', 'like', $year . '-%-%')
                ->get();
        }

        $positives = 0;
        $examined = 0;

        foreach ($data as $row) {
            $positives += $row->no_positive;
            $examined += $row->no_examined;
        }

        if ($examined == 0) {
            $mf_rate = 0;
        } else {
            $mf_rate = ($positives / $examined) * 100;
        }

        return response()->json(['mfRate' => $mf_rate]);
    }

    public function infected_rate($district, $year)
    {
        $data = DB::table('ento_05_mosq')
            ->select('head_mf', 'head_l1', 'head_l2', 'head_l3', 'thorax_mf', 'thorax_l1', 'thorax_l2', 'thorax_l3', 'abdomen_mf', 'abdomen_l1', 'abdomen_l2', 'abdomen_l3', 'no_of_dissected', 'ento_05_id')
            ->where('dissected_by_date', 'like', $year . '-%-%')
            ->get();

        foreach ($data as $row) {
            $sql = "SELECT main_form_type, main_form_id FROM ento_05 WHERE ento_05_id = $row->ento_05_id";
            $result = DB::select($sql);

            $sql = "SELECT district FROM " . $result[0]->main_form_type . " WHERE " . $result[0]->main_form_type . "_id = " . $result[0]->main_form_id;
            $result = DB::select($sql);

            $row->district = $result[0]->district;
        }

        $no_of_mosquitoes = 0;
        $no_of_mosquitoes_dissected = 0;

        foreach ($data as $row) {
            if ($district == "a" || $district == $row->district) {
                $no_of_mosquitoes += $row->head_mf + $row->head_l1 + $row->head_l2 + $row->head_l3 + $row->thorax_mf + $row->thorax_l1 + $row->thorax_l2 + $row->thorax_l3 + $row->abdomen_mf + $row->abdomen_l1 + $row->abdomen_l2 + $row->abdomen_l3;
                $no_of_mosquitoes_dissected += $row->no_of_dissected;
            }
        }

        if ($no_of_mosquitoes_dissected == 0) {
            $infectedRate = 0;
        } else {
            $infectedRate = ($no_of_mosquitoes / $no_of_mosquitoes_dissected) * 100;
        }

        return response()->json(['infectedRate' => $infectedRate]);
    }

    public function infective_rate($district, $year)
    {
        $data = DB::table('ento_05_mosq')
            ->select('head_l3', 'thorax_l3', 'abdomen_l3', 'no_of_dissected', 'ento_05_id')
            ->where('dissected_by_date', 'like', $year . '-%-%')
            ->get();

        foreach ($data as $row) {
            $sql = "SELECT main_form_type, main_form_id FROM ento_05 WHERE ento_05_id = $row->ento_05_id";
            $result = DB::select($sql);

            $sql = "SELECT district FROM " . $result[0]->main_form_type . " WHERE " . $result[0]->main_form_type . "_id = " . $result[0]->main_form_id;
            $result = DB::select($sql);

            $row->district = $result[0]->district;
        }

        $no_of_mosquitoes = 0;
        $no_of_mosquitoes_dissected = 0;

        foreach ($data as $row) {
            if ($district == "a" || $district == $row->district) {
                $no_of_mosquitoes += $row->head_l3 + $row->thorax_l3 + $row->abdomen_l3;
                $no_of_mosquitoes_dissected += $row->no_of_dissected;
            }
        }

        if ($no_of_mosquitoes_dissected == 0) {
            $infectiveRate = 0;
        } else {
            $infectiveRate = ($no_of_mosquitoes / $no_of_mosquitoes_dissected) * 100;
        }

        return response()->json(['infectiveRate' => $infectiveRate]);
    }

    public function mf_density($district, $year)
    {

        if ($district == "a") {
            $data = DB::table('f1')
                ->join('f1_data', 'f1.ID', '=', 'f1_data.f1_form_id')
                ->where('date_of_blood', 'like', $year . '-%-%')
                ->select('no_positive', 'mfcount')
                ->get();
        } else {
            $data = DB::table('f1')
                ->join('f1_data', 'f1.ID', '=', 'f1_data.f1_form_id')
                ->where('district', $district)
                ->where('date_of_blood', 'like', $year . '-%-%')
                ->select('no_positive', 'mfcount')
                ->get();
        }

        $mfCount = 0;
        $positives = 0;

        foreach ($data as $row) {
            $mfCount += $row->mfcount;
            $positives += $row->no_positive;
        }

        if ($positives == 0) {
            $mf_density = 0;
        } else {
            $mf_density = ($mfCount * 16.67) / $positives;
        }

        return response()->json(['mfDensity' => $mf_density]);
    }
}