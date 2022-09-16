<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class extension extends Controller
{



    #########################
    #### FUNCTION-NO::01 ####
    #########################
    # Read extensions;

    function show_extensions(Request $request, $tag = null){

        if(!empty($tag)){

            $result['data'] = DB::table('extensions')
                ->where('Ex_Tag', $tag)
                ->get();
            
            $request->session()->put('extTag',$tag);

        }else{

            $result['data'] = DB::table('extensions')
                ->orderBy('Sorting', 'asc')
                ->get();

            $request->session()->put('extTag','All');

        }

        $tagList['dist'] = DB::table('extensions')
                ->distinct('Ex_Tag')
                ->orderBy('Ex_Tag', 'asc')
                ->get();

        return view('portfolio/extension', $result, $tagList);

    }

    # End of function show_extensions.                          <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




}
