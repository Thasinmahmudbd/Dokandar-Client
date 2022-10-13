<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class area extends Controller
{
        


    #########################
    #### FUNCTION-NO::00 ####
    #########################
    # Time, Date &  Day setup;

    function timeDateDay(Request $request){
        # Date and day set up start.
        date_default_timezone_set('Asia/Dhaka');
        $date = date("Y-m-d");
        $time = time();

        $timestamp = strtotime($date);
        $day = date('D', $timestamp);

        $request->session()->put('DATE_TODAY',$date);
        $request->session()->put('TIME_TODAY',$time);
        $request->session()->put('DAY_TODAY',$day);
        # Date and day set up end.
    }

    # End of function timeDateDay.                              <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



    #########################
    #### FUNCTION-NO::01 ####
    #########################
    # Read area;

    function show_area(Request $request){

        \App::call('App\Http\Controllers\admin\area@timeDateDay');

        $result['data'] = DB::table('area')
            ->get();

        return view('Admin/CityAdmin/Area', $result);

    }

    # End of function show_area.                                <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::02 ####
    #########################
    # Add area;

    function add_area(Request $request){

        $area = $request->input('area');
        $delivery_charge = $request->input('delivery_charge');

        $entry=array(
            'area_name'=>$area,
            'delivery_charge'=>$delivery_charge
        );

        DB::table('area')
            ->insert($entry);

        $log=array(
            'log'=>'Area '.$area.' added'
        );

        DB::table('activity_log')
            ->insert($log);

        $request->session()->put('msgHook','green');
        $request->session()->flash('msg','Area added');

        #redirecting to area form.
        return redirect('/area/from');

    }

    # End of function add_area.                                 <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #

}
