<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use App\User;
use Session;

class OptionsController extends Controller
{
    
    public function __construct() {
        $option = Option::where('key', 'mla_global_password')->count();
        if(isset($option) && $option === 0 ) {
            Option::create([
                'key' => 'mla_global_password',
                'value' => '',
            ]);
        }
    }
 
    public function view_log_table() {
        $title = 'Activity Log';
        $users = User::where('role', 'tax-expert')->orderby('id', 'DESC')->get();
        return view('pages.activity-log-table', compact('title', 'users'));
    }

    public function view_log(User $log) {
        if($log) {
            $title = 'Activity Log';
            $user = $log;
            return view( 'pages.activity-log', compact( 'user', 'title' ) );
        }
    }

    public function view_global_password () {
        $title = 'Global Password';
        $option = Option::where('key', 'mla_global_password')->count();
        if(isset($option) && $option !== 0 ) {
            $option = Option::where('key', 'mla_global_password')->get();
            $password = $option[0]->value;
        } else {
            $password = '';
        }
        return view('pages.global-password', compact('title', 'password'));
    }

    public function set_global_password(Request $request)
    {
        if($request->global_password) {
            $option = Option::where('key', 'mla_global_password')->get();
            
            $password = $request->global_password;
            $option[0]->update([
                'value' => $password
            ]);
            $option[0]->save();
            Session::flash('success', 'Password Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Password is Required');
            return redirect()->back();
        }
    }

    public function security() {
        // $title = 'Security';
        // return view( 'pages.security', compact( 'title' ) );
    }

    public function security_post(Request $request) {
        if($request->security_password) {
            $pw = $request->security_password;
            $option = Option::where('key', 'mla_global_password')->count();
            if(isset($option) && $option !== 0 ) {
                $option = Option::where('key', 'mla_global_password')->get();
                $password = $option[0]->value;
            } else {
                return redirect()->back()->with('error','Something went wrong please contact site admin.');
            }
            
            if( $password == $pw ) {
                Session::put('isLoggedIn', 'true');
                return redirect()->to('/');
            } else {
                return redirect()->back()->with('error', "Password didn't match");
            }
        } else {
            return redirect()->back()->with('error','Password is required');
        }
    }
}
