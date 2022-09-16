<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class project extends Controller
{
    


    #########################
    #### FUNCTION-NO::01 ####
    #########################
    # Read projects;

    function show_projects(Request $request, $tag = null){

        if(!empty($tag)){

            $result['data'] = DB::table('projects')
                ->where('Pro_Tag', $tag)
                ->get();
            
            $request->session()->put('proTag',$tag);

        }else{

            $result['data'] = DB::table('projects')
                ->orderBy('Sorting', 'asc')
                ->get();

            $request->session()->put('proTag','All');

        }

        $tagList['dist'] = DB::table('projects')
                ->select('Pro_Tag')
                ->distinct()
                ->orderBy('Pro_Tag', 'asc')
                ->get();

        return view('portfolio/project', $result, $tagList);

    }

    # End of function show_projects.                            <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




}
