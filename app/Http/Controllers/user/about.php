<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class about extends Controller
{




    #########################
    #### FUNCTION-NO::01 ####
    #########################
    # Read personal info;

    function show_about(Request $request){

        $result['data'] = DB::table('personal_infos')
            ->where('ID','1')
            ->get();

        $education['edu'] = DB::table('educations')
            ->orderBy('Sorting','asc')
            ->get();

        return view('portfolio/about', $result, $education);
    }

    # End of function show_about.                               <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



}
