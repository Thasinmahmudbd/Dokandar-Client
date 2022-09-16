<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class log extends Controller
{
    #########################
    #### FUNCTION-NO::01 ####
    #########################
    # Read log;

    function show_log(Request $request, $date = null){

        $result['data'] = DB::table('activity_logs')
            ->orderBy('AL_ID', 'desc')
            ->get();

        if(!empty($date)){

            $result['data'] = DB::table('activity_logs')
                ->where('Timestamp','like', $date.'%')
                ->orderBy('AL_ID', 'desc')
                ->get();
    
        }else{
    
            $result['data'] = DB::table('activity_logs')
                ->orderBy('AL_ID', 'desc')
                ->get();
    
        }

        return view('admin/activity', $result);

    }

    # End of function show_log.                                 <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::02 ####
    #########################
    # Search video;

    function search_activity(Request $request){

        $search = $request->input('search');

        $request->session()->put('msgHook','green');
        $request->session()->flash('msg','Search result');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/activity/'.$search);

    }

    # End of function search_activity.                          <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
}
