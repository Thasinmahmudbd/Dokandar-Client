<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class personalInfo extends Controller
{
    
    

    #########################
    #### FUNCTION-NO::01 ####
    #########################
    # Read personal info;

    function show_Personal_Info(Request $request){

        $result['data'] = DB::table('personal_infos')
            ->where('ID','1')
            ->get();

        return view('admin/personalInfo', $result);
    }

    # End of function show_Personal_Info.                       <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::02 ####
    #########################
    # Update personal info;

    function update_Personal_Info(Request $request){

        $entry=array(
            'Name'=>$request->input(''),
            'Name'=>$request->input('name'),
            'Interested_In'=>$request->input('interest'),
            'Organization'=>$request->input('organization'),
            'Fiver_Link'=>$request->input('fiver'),
            'Objective'=>$request->input('objective'),
            'Phone_One'=>$request->input('phone_1'),
            'Phone_Two'=>$request->input('phone_2'),
            'Github'=>$request->input('github'),
            'Linkedin'=>$request->input('linkedin'),
            'Youtube'=>$request->input('youtube'),
            'Twitter'=>$request->input('twitter'),
            'Facebook'=>$request->input('facebook'),
            'Email'=>$request->input('email')
        );

        DB::table('personal_infos')
            ->where('ID','1')
            ->update($entry);

        $log=array(
            'Logs'=>'Personal info changed.'
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','yellow');
        $request->session()->flash('msg','Profile Updated.');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/home');

    }

    # End of function update_Personal_info.                     <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::03 ####
    #########################
    # Uploading CV;

    function upload_CV(Request $request){

        # validating data from form.
        $request->validate([

            'CV'=>'mimes:pdf,docx'

        ]);

        $pdf=$request->file('cv');
        $ext=$pdf->extension();
        $file_name='Thasin Mahmud CV.'.$ext;
        // $pdf->storeAs('/public/CV',$file_name); // to storage
        $pdf->move(public_path('/CV'), $file_name); // to public

        $entry=array(
            'CV'=>$file_name
        );

        DB::table('personal_infos')
            ->where('ID','1')
            ->update($entry);

        $log=array(
            'Logs'=>'CV Updated.'
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','green');
        $request->session()->flash('msg','CV Uploaded.');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/home');

    }

    # End of function upload_CV.                                <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::04 ####
    #########################
    # Uploading DP;

    function upload_DP(Request $request){

        # validating data from form.
        $request->validate([

            'DP'=>'image|dimensions:ratio=1/1|mimes:jpg,jpeg,png'

        ]);

        $img=$request->file('dp');
        $ext=$img->extension();
        $file_name='Thasin Mahmud.'.$ext;
        // $img->storeAs('/public/CV',$file_name); // to storage
        $img->move(public_path('/DP'), $file_name); // to public

        $entry=array(
            'DP'=>$file_name
        );

        DB::table('personal_infos')
            ->where('ID','1')
            ->update($entry);

        $log=array(
            'Logs'=>'DP Updated.'
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','green');
        $request->session()->flash('msg','DP Uploaded.');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/home');

    }

    # End of function upload_DP.                                <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




}
