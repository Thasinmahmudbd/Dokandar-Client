<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class setting extends Controller
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
    # Update admin info;

    function update_admin(Request $request){

        \App::call('App\Http\Controllers\admin\setting@timeDateDay');

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        $id = $request->input('id');
        $time = $request->session()->get('TIME_TODAY');

        if($password==$confirm_password){

            $entry=array(
                'admin_name'=>$name,
                'admin_email'=>$email,
                'admin_number'=>$phone,
                'password'=>$password,
            );

            if($request->hasfile('image')){

                # delete old pic.
                $result = DB::table('admin')
                ->where('admin_id', $id)
                ->first();

                $old_file_name = $result->admin_image;
                $file_path = public_path('/Admin/'.$old_file_name);

                if($old_file_name!=null){
                    unlink($file_path);
                }

                # add new pic.
                $img = $request->file('image');
                $ext = $img->extension();
                $file_name = $phone.'-'.$time.'.'.$ext;
                // $img->storeAs('/public/CV',$file_name); // to storage
                $img->move(public_path('/Admin'), $file_name); // to public

                $entry['admin_image']=$file_name;

                $request->session()->put('Admin_Image',$file_name);

            }

            DB::table('admin')
                ->where('admin_id',$id)
                ->update($entry);

            $log=array(
                'log'=>$phone.' - admin updated'
            );

            DB::table('activity_log')
                ->insert($log);

            $request->session()->put('Admin_Name',$name);
            $request->session()->put('Admin_Email',$email);
            $request->session()->put('Admin_Phone',$phone);

            $request->session()->put('msgHook','yellow');
            $request->session()->flash('msg','Admin info updated');

        }else{

            $request->session()->put('msgHook','red');
            $request->session()->flash('msg','Passwords not matching.');

        }

        #redirecting to view settings.
        return redirect('/setting');

    }

    # End of function update_admin.                             <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



}
