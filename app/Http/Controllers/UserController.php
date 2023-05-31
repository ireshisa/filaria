<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function reg()
    {
        $district = DB::table('district')
        ->orderBy('district', 'ASC')
            ->select('*')
            ->get();
        return view('auth/register', ["district_list" => $district]);
    }

    public function delete_users($id)
    {
        if (Auth::user()->role == "ADMIN") {
            $res = User::where('id', $id)->delete();
            if ($res) {
                return redirect()->back()->with('message', true);
            } else {
                return redirect()->back()->with('message', false);
            }
        } else {
            return redirect()->back()->with('message', false);
        }
    }

    public function storeData(Request $request)
    {
        User::create($request->all());
        return "Your Registered !";
    }

    public function manage_users()
    {
        $users = DB::table('users')
            ->select('*')
            ->get();
        $data['template'] = 'users/users';
        return view('template_user/template', compact('data'), ["users" => $users]);
    }
}
