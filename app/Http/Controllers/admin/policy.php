<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class policy extends Controller
{



    #########################
    #### FUNCTION-NO::01 ####
    #########################
    # Read terms;

    function show_terms(Request $request){

        $result = DB::table('policy')
            ->where('policy_id','1')
            ->get();

        $request->session()->put('policy',$result[0]->term);

        return view('Admin/SuperAdmin/Terms');

    }

    # End of function show_terms.                               <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



    #########################
    #### FUNCTION-NO::02 ####
    #########################
    # Read about;

    function show_about(Request $request){

        $result = DB::table('policy')
            ->where('policy_id','1')
            ->get();

        $request->session()->put('policy',$result[0]->about);

        return view('Admin/SuperAdmin/AboutUs');

    }

    # End of function show_about.                               <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



    #########################
    #### FUNCTION-NO::03 ####
    #########################
    # Update policy;

    function update_policy(Request $request){

        $about = $request->input('about');
        $term = $request->input('term');
        $type = $request->input('type');

        if($type=="term"){

            $entry=array(
                'term'=>$term
            );

        }else{

            $entry=array(
                'about'=>$about
            );

        }

        DB::table('policy')
            ->where('policy_id','1')
            ->update($entry);

        $log=array(
            'log'=>'Policy updated.'
        );

        DB::table('activity_log')
            ->insert($log);

        $request->session()->put('msgHook','yellow');
        $request->session()->flash('msg','Policy updated.');

        #redirecting to dashboard.
        return redirect('/dashboard');

    }

    # End of function update_policy.                            <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



}
