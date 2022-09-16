<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class projects extends Controller
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
    # Read projects;

    function show_projects(Request $request, $id = null){

        \App::call('App\Http\Controllers\admin\projects@timeDateDay');

        if(!empty($id)){

            $result['data'] = DB::table('projects')
                ->where('Pro_ID', $id)
                ->get();

            return view('admin/projectAdd', $result);

        }else{

            $result['data'] = DB::table('projects')
                ->orderBy('Sorting', 'asc')
                ->get();

            return view('admin/projectList', $result);

        }
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
    # Insert project;

    function insert_project(Request $request){

        \App::call('App\Http\Controllers\admin\projects@timeDateDay');

        $Pro_Title = $request->input('Pro_Title');
        $time = $request->session()->get('TIME_TODAY');

        $img = $request->file('Pro_Image');
        $ext = $img->extension();
        $file_name = $Pro_Title.'-'.$time.'.'.$ext;
        // $img->storeAs('/public/CV',$file_name); // to storage
        $img->move(public_path('/Pro_Image'), $file_name); // to public

        $entry=array(
            'Pro_Title'=>$Pro_Title,
            'Pro_Summary'=>$request->input('Pro_Summary'),
            'Pro_Tag'=>$request->input('Pro_Tag'),
            'Pro_Git'=>$request->input('Pro_Git'),
            'Pro_Article'=>0,
            'Pro_Liveview'=>$request->input('Pro_Liveview'),
            'Pro_Video'=>0,
            'Sorting'=>$request->input('Sorting'),
            'Pro_Image'=>$file_name
        );

        DB::table('projects')
            ->insert($entry);

        $log=array(
            'Logs'=>$Pro_Title.' - Project Uploaded'
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','green');
        $request->session()->flash('msg','Project Uploaded');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/project/list');

    }

    # End of function insert_project.                           <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::03 ####
    #########################
    # Edit project;

    function edit_project(Request $request, $id){

        \App::call('App\Http\Controllers\admin\projects@timeDateDay');

        $Pro_Title = $request->input('Pro_Title');
        $time = $request->session()->get('TIME_TODAY');

        $entry=array(
            'Pro_Title'=>$Pro_Title,
            'Pro_Summary'=>$request->input('Pro_Summary'),
            'Pro_Tag'=>$request->input('Pro_Tag'),
            'Pro_Git'=>$request->input('Pro_Git'),
            'Pro_Liveview'=>$request->input('Pro_Liveview'),
            'Sorting'=>$request->input('Sorting')
        );

        if($request->hasfile('Pro_Image')){

            # delete old pic.
            $result = DB::table('projects')
            ->where('Pro_ID', $id)
            ->first();

            $old_file_name = $result->Pro_Image;
            $file_path = public_path('/Pro_Image/'.$old_file_name);
            unlink($file_path);

            # add new pic.
            $img = $request->file('Pro_Image');
            $ext = $img->extension();
            $file_name = $Pro_Title.'-'.$time.'.'.$ext;
            // $img->storeAs('/public/CV',$file_name); // to storage
            $img->move(public_path('/Pro_Image'), $file_name); // to public

            $entry['Pro_Image']=$file_name;

        }

        DB::table('projects')
            ->where('Pro_ID',$id)
            ->update($entry);

        $log=array(
            'Logs'=>$Pro_Title.' - Project Updated'
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','yellow');
        $request->session()->flash('msg','Project Updated');
        $request->session()->put('actionType','list');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/project/list');

    }

    # End of function edit_project.                             <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::04 ####
    #########################
    # Delete project;

    function delete_project(Request $request, $id){

        \App::call('App\Http\Controllers\admin\projects@timeDateDay');

        $result = DB::table('projects')
            ->where('Pro_ID', $id)
            ->first();

        $file_name = $result->Pro_Image;
        $Pro_Title = $result->Pro_Title;

        $log=array(
            'Logs'=>$Pro_Title.' - Project Updated'
        );
    
        DB::table('activity_logs')
            ->insert($log);

        $file_name = $result->Pro_Image;
        $file_path = public_path('/Pro_Image/'.$file_name);
        unlink($file_path);

        DB::table('projects')
            ->where('Pro_ID',$id)
            ->delete();

        $request->session()->put('msgHook','red');
        $request->session()->flash('msg','Project deleted');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/project/list');

    }

    # End of function delete_project.                             <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



}
