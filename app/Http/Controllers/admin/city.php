<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class city extends Controller
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
    # Insert city;

    function insert_city(Request $request){

        \App::call('App\Http\Controllers\admin\city@timeDateDay');

        $address = $request->input('address');
        $time = $request->session()->get('TIME_TODAY');

        $image = $request->file('image');
        $ext = $image->extension();
        $file_name = $address.'-'.$time.'.'.$ext;
        // $img->storeAs('/public/CV',$file_name); // to storage
        $image->move(public_path('/City'), $file_name); // to public

        $entry=array(
            'city_name'=>$address,
            'city_image'=>$file_name
        );

        DB::table('city')
            ->insert($entry);

        $log=array(
            'log'=>$address.' - city added.'
        );

        DB::table('activity_log')
            ->insert($log);

        $request->session()->put('msgHook','green');
        $request->session()->flash('msg','City added.');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/add/city');

    }

    # End of function insert_city.                              <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    


    #########################
    #### FUNCTION-NO::02 ####
    #########################
    # Read city;

    function show_city(Request $request){

        \App::call('App\Http\Controllers\admin\city@timeDateDay');

        $result['data'] = DB::table('city')
            ->get();

        return view('Admin/SuperAdmin/Cities', $result);

    }

    # End of function show_city.                                <-------#
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

    function edit_city(Request $request, $id){

        $result=DB::table('city')->where('city_id',$id)->get();

        $request->session()->put('city_name', $result[0]->city_name);
        $request->session()->put('city_image', $result[0]->city_image);
        $request->session()->put('city_id', $id);

        return view('Admin/SuperAdmin/EditCity');

    }

    # End of function show_city.                                <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



    #########################
    #### FUNCTION-NO::04 ####
    #########################
    # Update city;

    function update_city(Request $request){

        \App::call('App\Http\Controllers\admin\city@timeDateDay');

        $address = $request->input('address');
        $id = $request->input('id');
        $image = $request->input('city_image');
        $time = $request->session()->get('TIME_TODAY');

        $entry=array(
            'city_name'=>$address
        );

        if($request->hasfile('image')){

            # delete old pic.
            $result = DB::table('city')
            ->where('city_id', $id)
            ->first();

            $old_file_name = $result->city_image;
            $file_path = public_path('/City/'.$old_file_name);

            if($old_file_name!=null){
                unlink($file_path);
            }

            # add new pic.
            $img = $request->file('image');
            $ext = $img->extension();
            $file_name = $address.'-'.$time.'.'.$ext;
            // $img->storeAs('/public/CV',$file_name); // to storage
            $img->move(public_path('/City'), $file_name); // to public

            $entry['city_image']=$file_name;

        }

        DB::table('city')
            ->where('city_id',$id)
            ->update($entry);

        $log=array(
            'log'=>$address.' - city name updated'
        );

        DB::table('activity_log')
            ->insert($log);

        $request->session()->put('msgHook','yellow');
        $request->session()->flash('msg','City name updated');

        #redirecting to function no :: 02 C:thisController.
        return redirect('/cities');

    }

    # End of function update_city.                              <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



    #########################
    #### FUNCTION-NO::05 ####
    #########################
    # Delete article;

    function delete_city(Request $request, $id){

        \App::call('App\Http\Controllers\admin\city@timeDateDay');

        $result = DB::table('city')
            ->where('city_id', $id)
            ->first();

        $image = $result->city_image;
        $address = $result->city_name;

        $log=array(
            'log'=>$address.' - city deleted'
        );
    
        DB::table('activity_log')
            ->insert($log);

        $file_path = public_path('/City/'.$image);
        
        if($image!=null){
            unlink($file_path);
        }

        DB::table('city')
            ->where('city_id',$id)
            ->delete();

        $request->session()->put('msgHook','red');
        $request->session()->flash('msg','City Deleted');

        #redirecting to function no :: 02 C:thisController.
        return redirect('/cities');

    }

    # End of function delete_city.                              <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
}
