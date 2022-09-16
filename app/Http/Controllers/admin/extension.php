<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class extension extends Controller
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
    # Read extensions;

    function show_extensions(Request $request, $id = null){

        \App::call('App\Http\Controllers\admin\extension@timeDateDay');

        if(!empty($id)){

            $result['data'] = DB::table('extensions')
                ->where('Ex_ID', $id)
                ->get();

            return view('admin/extensionAdd', $result);

        }else{

            $result['data'] = DB::table('extensions')
                ->orderBy('Sorting', 'asc')
                ->get();

            return view('admin/extensionList', $result);

        }
    }

    # End of function show_extension.                           <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



    #########################
    #### FUNCTION-NO::02 ####
    #########################
    # Insert extension;

    function insert_extension(Request $request){

        \App::call('App\Http\Controllers\admin\extension@timeDateDay');

        $Ex_Name = $request->input('Ex_Name');
        $time = $request->session()->get('TIME_TODAY');

        $img = $request->file('Ex_Image');
        $ext = $img->extension();
        $file_name = $Ex_Name.'-'.$time.'.'.$ext;
        // $img->storeAs('/public/CV',$file_name); // to storage
        $img->move(public_path('/Ex_Image'), $file_name); // to public

        $entry=array(
            'Ex_Name'=>$Ex_Name,
            'Ex_Type'=>$request->input('Ex_Type'),
            'Ex_Version'=>$request->input('Ex_Version'),
            'Ex_IDE'=>$request->input('Ex_IDE'),
            'Ex_Use'=>$request->input('Ex_Use'),
            'Ex_Tag'=>$request->input('Ex_Tag'),
            'Ex_Git'=>$request->input('Ex_Git'),
            'Ex_Article'=>0,
            'Ex_Liveview'=>$request->input('Ex_Liveview'),
            'Ex_Video'=>0,
            'Ex_Image'=>$file_name,
            'Sorting'=>$request->input('Sorting')
        );

        DB::table('extensions')
            ->insert($entry);

        $log=array(
            'Logs'=>$Ex_Name.' - Extension Uploaded'
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','green');
        $request->session()->flash('msg','Extension Uploaded');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/extension/list');

    }

    # End of function insert_extension.                         <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::03 ####
    #########################
    # Edit extension;

    function edit_extension(Request $request, $id){

        \App::call('App\Http\Controllers\admin\extension@timeDateDay');

        $Ex_Name = $request->input('Ex_Name');
        $time = $request->session()->get('TIME_TODAY');

        $entry=array(
            'Ex_Name'=>$Ex_Name,
            'Ex_Type'=>$request->input('Ex_Type'),
            'Ex_Version'=>$request->input('Ex_Version'),
            'Ex_IDE'=>$request->input('Ex_IDE'),
            'Ex_Use'=>$request->input('Ex_Use'),
            'Ex_Tag'=>$request->input('Ex_Tag'),
            'Ex_Git'=>$request->input('Ex_Git'),
            'Ex_Liveview'=>$request->input('Ex_Liveview'),
            'Sorting'=>$request->input('Sorting')
        );

        if($request->hasfile('Ex_Image')){

            # delete old pic.
            $result = DB::table('extensions')
            ->where('Ex_ID', $id)
            ->first();

            $old_file_name = $result->Ex_Image;
            $file_path = public_path('/Ex_Image/'.$old_file_name);
            unlink($file_path);

            # add new pic.
            $img = $request->file('Ex_Image');
            $ext = $img->extension();
            $file_name = $Ex_Name.'-'.$time.'.'.$ext;
            // $img->storeAs('/public/CV',$file_name); // to storage
            $img->move(public_path('/Ex_Image'), $file_name); // to public

            $entry['Ex_Image']=$file_name;

        }

        DB::table('extensions')
            ->where('Ex_ID',$id)
            ->update($entry);

        $log=array(
            'Logs'=>$Ex_Name.' - Extension Updated'
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','yellow');
        $request->session()->flash('msg','Extension Updated');
        $request->session()->put('actionType','list');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/extension/list');

    }

    # End of function edit_extension.                           <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::04 ####
    #########################
    # Delete extension;

    function delete_extension(Request $request, $id){

        \App::call('App\Http\Controllers\admin\extension@timeDateDay');

        $result = DB::table('extensions')
            ->where('Ex_ID', $id)
            ->first();

        $file_name = $result->Ex_Image;
        $Ex_Name = $result->Ex_Name;

        $log=array(
            'Logs'=>$Ex_Name.' - Extension Deleted'
        );
    
        DB::table('activity_logs')
            ->insert($log);

        $file_name = $result->Ex_Image;
        $file_path = public_path('/Ex_Image/'.$file_name);
        unlink($file_path);

        DB::table('extensions')
            ->where('Ex_ID',$id)
            ->delete();

        $request->session()->put('msgHook','red');
        $request->session()->flash('msg','Extension Deleted');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/extension/list');

    }

    # End of function delete_extension.                         <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



}
