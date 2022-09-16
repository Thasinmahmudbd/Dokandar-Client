<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class education extends Controller
{
    
    #########################
    #### FUNCTION-NO::01 ####
    #########################
    # Read education;

    function show_education(Request $request){

        $result['data'] = DB::table('educations')
            ->orderBy('Sorting', 'asc')
            ->get();

        return view('admin/education', $result);

    }

    # End of function show_education.                           <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



    #########################
    #### FUNCTION-NO::02 ####
    #########################
    # Insert education;

    function insert_education(Request $request){

        $entry=array(
            'Degree'=>$request->input('Degree'),
            'Subject'=>$request->input('Subject'),
            'CGPA'=>$request->input('CGPA'),
            'Type'=>$request->input('Type'),
            'Skill_Genre'=>$request->input('Skill_Genre'),
            'Skill'=>$request->input('Skill'),
            'Extra_Skill'=>$request->input('Extra_Skill'),
            'Efficiency'=>$request->input('Efficiency'),
            'Sorting'=>$request->input('Sorting')
        );

        DB::table('educations')
            ->insert($entry);

        $log=array(
            'Logs'=>'Education Uploaded'
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','green');
        $request->session()->flash('msg','Education Uploaded');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/education');

    }

    # End of function insert_education.                         <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::03 ####
    #########################
    # Edit education;

    function edit_education(Request $request, $id){

        $entry=array(
            'Degree'=>$request->input('Degree'),
            'Subject'=>$request->input('Subject'),
            'CGPA'=>$request->input('CGPA'),
            'Type'=>$request->input('Type'),
            'Skill_Genre'=>$request->input('Skill_Genre'),
            'Skill'=>$request->input('Skill'),
            'Extra_Skill'=>$request->input('Extra_Skill'),
            'Efficiency'=>$request->input('Efficiency'),
            'Sorting'=>$request->input('Sorting')
        );

        DB::table('educations')
            ->where('Edu_ID',$id)
            ->update($entry);

        $log=array(
            'Logs'=>'Education Updated'
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','yellow');
        $request->session()->flash('msg','Education Updated');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/education');

    }

    # End of function edit_education.                           <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::04 ####
    #########################
    # Delete education;

    function delete_education(Request $request, $id){

        $log=array(
            'Logs'=>'Education Deleted'
        );
    
        DB::table('activity_logs')
            ->insert($log);

        DB::table('educations')
            ->where('Edu_ID',$id)
            ->delete();

        $request->session()->put('msgHook','red');
        $request->session()->flash('msg','Education Deleted');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/education');

    }

    # End of function delete_education.                         <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
}
