<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class frameworks extends Controller
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
    # Read frameworks;

    function show_frameworks(Request $request, $id = null){

        \App::call('App\Http\Controllers\admin\frameworks@timeDateDay');

        if(!empty($id)){

            $result['data'] = DB::table('frameworks')
                ->where('Fw_ID', $id)
                ->get();

            return view('admin/frameworkAdd', $result);

        }else{

            $result['data'] = DB::table('frameworks')
                ->orderBy('Sorting', 'asc')
                ->get();

            return view('admin/frameworkList', $result);

        }
    }

    # End of function show_framework.                           <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



    #########################
    #### FUNCTION-NO::02 ####
    #########################
    # Insert framework;

    function insert_framework(Request $request){

        \App::call('App\Http\Controllers\admin\frameworks@timeDateDay');

        $Fw_Title = $request->input('Fw_Title');
        $time = $request->session()->get('TIME_TODAY');

        $img = $request->file('Fw_Image');
        $ext = $img->extension();
        $file_name = $Fw_Title.'-'.$time.'.'.$ext;
        // $img->storeAs('/public/CV',$file_name); // to storage
        $img->move(public_path('/Fw_Image'), $file_name); // to public

        $entry=array(
            'Fw_Title'=>$Fw_Title,
            'Fw_Summary'=>$request->input('Fw_Summary'),
            'Fw_Tag'=>$request->input('Fw_Tag'),
            'Fw_Name'=>$request->input('Fw_Name'),
            'Fw_Type'=>$request->input('Fw_Type'),
            'Fw_Version'=>$request->input('Fw_Version'),
            'Fw_Documentation'=>$request->input('Fw_Documentation'),
            'Fw_Extension'=>$request->input('Fw_Extension'),
            'Fw_Git'=>$request->input('Fw_Git'),
            'Fw_Article'=>0,
            'Fw_Liveview'=>$request->input('Fw_Liveview'),
            'Fw_Video'=>0,
            'Sorting'=>$request->input('Sorting'),
            'Fw_Image'=>$file_name
        );

        DB::table('frameworks')
            ->insert($entry);

        $log=array(
            'Logs'=>$Fw_Title.' - Framework Uploaded'
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','green');
        $request->session()->flash('msg','Framework Uploaded');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/framework/list');

    }

    # End of function insert_framework.                         <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::03 ####
    #########################
    # Edit framework;

    function edit_framework(Request $request, $id){

        \App::call('App\Http\Controllers\admin\frameworks@timeDateDay');

        $Fw_Title = $request->input('Fw_Title');
        $time = $request->session()->get('TIME_TODAY');

        $entry=array(
            'Fw_Title'=>$Fw_Title,
            'Fw_Summary'=>$request->input('Fw_Summary'),
            'Fw_Tag'=>$request->input('Fw_Tag'),
            'Fw_Name'=>$request->input('Fw_Name'),
            'Fw_Type'=>$request->input('Fw_Type'),
            'Fw_Version'=>$request->input('Fw_Version'),
            'Fw_Documentation'=>$request->input('Fw_Documentation'),
            'Fw_Extension'=>$request->input('Fw_Extension'),
            'Fw_Git'=>$request->input('Fw_Git'),
            'Fw_Liveview'=>$request->input('Fw_Liveview'),
            'Sorting'=>$request->input('Sorting')
        );

        if($request->hasfile('Fw_Image')){

            # delete old pic.
            $result = DB::table('frameworks')
            ->where('Fw_ID', $id)
            ->first();

            $old_file_name = $result->Fw_Image;
            $file_path = public_path('/Fw_Image/'.$old_file_name);
            unlink($file_path);

            # add new pic.
            $img = $request->file('Fw_Image');
            $ext = $img->extension();
            $file_name = $Fw_Title.'-'.$time.'.'.$ext;
            // $img->storeAs('/public/CV',$file_name); // to storage
            $img->move(public_path('/Fw_Image'), $file_name); // to public

            $entry['Fw_Image']=$file_name;

        }

        DB::table('frameworks')
            ->where('Fw_ID',$id)
            ->update($entry);

        $log=array(
            'Logs'=>$Fw_Title.' - Framework Updated'
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','yellow');
        $request->session()->flash('msg','Framework Updated');
        $request->session()->put('actionType','list');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/framework/list');

    }

    # End of function edit_framework.                           <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::04 ####
    #########################
    # Delete framework;

    function delete_framework(Request $request, $id){

        \App::call('App\Http\Controllers\admin\frameworks@timeDateDay');

        $result = DB::table('frameworks')
            ->where('Fw_ID', $id)
            ->first();

        $file_name = $result->Fw_Image;
        $Fw_Title = $result->Fw_Title;

        $log=array(
            'Logs'=>$Fw_Title.' - Framework Deleted'
        );
    
        DB::table('activity_logs')
            ->insert($log);

        $file_name = $result->Fw_Image;
        $file_path = public_path('/Fw_Image/'.$file_name);
        unlink($file_path);

        DB::table('frameworks')
            ->where('Fw_ID',$id)
            ->delete();

        $request->session()->put('msgHook','red');
        $request->session()->flash('msg','Framework Deleted');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/framework/list');

    }

    # End of function delete_framework.                         <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



}
