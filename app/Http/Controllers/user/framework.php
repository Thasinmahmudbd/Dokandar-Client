<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class framework extends Controller
{
        


    #########################
    #### FUNCTION-NO::01 ####
    #########################
    # Read frameworks;

    function show_frameworks(Request $request, $tag = null){

        if(!empty($tag)){

            $result['data'] = DB::table('frameworks')
                ->where('Fw_Tag', $tag)
                ->get();
            
            $request->session()->put('frmTag',$tag);

        }else{

            $result['data'] = DB::table('frameworks')
                ->orderBy('Sorting', 'asc')
                ->get();

            $request->session()->put('frmTag','All');

        }

        $tagList['dist'] = DB::table('frameworks')
                ->distinct('Fw_Tag')
                ->orderBy('Fw_Tag', 'asc')
                ->get();

        return view('portfolio/framework', $result, $tagList);

    }

    # End of function show_frameworks.                          <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




}
