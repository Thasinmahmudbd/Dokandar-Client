<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class home extends Controller
{
    
    

    #########################
    #### FUNCTION-NO::01 ####
    #########################
    # Read personal info;

    function show_Personal_Info(Request $request){

        $result['data'] = DB::table('personal_infos')
            ->where('ID','1')
            ->get();

        return view('portfolio/home', $result);
    }

    # End of function show_Personal_Info.                       <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



}
