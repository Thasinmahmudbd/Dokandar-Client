<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class banner extends Controller
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
    # Insert banner;

    function insert_banner(Request $request){

        \App::call('App\Http\Controllers\admin\banner@timeDateDay');

        $title = $request->input('title');
        $message = $request->input('message');
        $time = $request->session()->get('TIME_TODAY');

        $image = $request->file('image');
        $ext = $image->extension();
        $file_name = $title.'-'.$time.'.'.$ext;
        // $img->storeAs('/public/CV',$file_name); // to storage
        $image->move(public_path('/Banner'), $file_name); // to public

        $entry=array(
            'banner_title'=>$title,
            'banner_message'=>$message,
            'banner_image'=>$file_name
        );

        DB::table('banner')
            ->insert($entry);

        $log=array(
            'log'=>$title.' - banner added.'
        );

        DB::table('activity_log')
            ->insert($log);

        $request->session()->put('msgHook','green');
        $request->session()->flash('msg','banner added.');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/add/banner');

    }

    # End of function insert_banner.                            <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    


    #########################
    #### FUNCTION-NO::02 ####
    #########################
    # Read banner;

    function show_banner(Request $request){

        \App::call('App\Http\Controllers\admin\banner@timeDateDay');

        $result['data'] = DB::table('banner')
            ->get();

        return view('Admin/SuperAdmin/BannerList', $result);

    }

    # End of function show_banner.                              <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



    #########################
    #### FUNCTION-NO::03 ####
    #########################
    # Takes to edit page;

    function edit_banner(Request $request, $id){

        $result=DB::table('banner')->where('banner_id',$id)->get();

        $request->session()->put('banner_title', $result[0]->banner_title);
        $request->session()->put('banner_message', $result[0]->banner_message);
        $request->session()->put('banner_image', $result[0]->banner_image);
        $request->session()->put('banner_id', $id);

        return view('Admin/SuperAdmin/EditBanner');

    }

    # End of function show_banner.                              <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



    #########################
    #### FUNCTION-NO::04 ####
    #########################
    # Update banner;

    function update_banner(Request $request){

        \App::call('App\Http\Controllers\admin\banner@timeDateDay');

        $title = $request->input('title');
        $message = $request->input('message');
        $id = $request->input('id');
        $image = $request->input('image');
        $time = $request->session()->get('TIME_TODAY');

        $entry=array(
            'banner_title'=>$title,
            'banner_message'=>$message
        );

        if($request->hasfile('image')){

            # delete old pic.
            $result = DB::table('banner')
            ->where('banner_id', $id)
            ->first();

            $old_file_name = $result->banner_image;
            $file_path = public_path('/Banner/'.$old_file_name);

            if($old_file_name!=null){
                unlink($file_path);
            }

            # add new pic.
            $img = $request->file('image');
            $ext = $img->extension();
            $file_name = $title.'-'.$time.'.'.$ext;
            // $img->storeAs('/public/CV',$file_name); // to storage
            $img->move(public_path('/Banner'), $file_name); // to public

            $entry['banner_image']=$file_name;

        }

        DB::table('banner')
            ->where('banner_id',$id)
            ->update($entry);

        $log=array(
            'log'=>$title.' - banner updated'
        );

        DB::table('activity_log')
            ->insert($log);

        $request->session()->put('msgHook','yellow');
        $request->session()->flash('msg','banner updated');

        #redirecting to function no :: 02 C:thisController.
        return redirect('/banners');

    }

    # End of function update_banner.                            <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



    #########################
    #### FUNCTION-NO::05 ####
    #########################
    # Delete banner;

    function delete_banner(Request $request, $id){

        \App::call('App\Http\Controllers\admin\banner@timeDateDay');

        $result = DB::table('banner')
            ->where('banner_id', $id)
            ->first();

        $image = $result->banner_image;
        $title = $result->banner_title;

        $log=array(
            'log'=>$title.' - banner deleted'
        );
    
        DB::table('activity_log')
            ->insert($log);

        $file_path = public_path('/Banner/'.$image);
        
        if($image!=null){
            unlink($file_path);
        }

        DB::table('banner')
            ->where('banner_id',$id)
            ->delete();

        $request->session()->put('msgHook','red');
        $request->session()->flash('msg','banner deleted');

        #redirecting to function no :: 02 C:thisController.
        return redirect('/banners');

    }

    # End of function delete_banner.                            <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
}
