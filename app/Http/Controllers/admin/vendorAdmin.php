<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class vendorAdmin extends Controller
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
    # Show form;

    function add_vendor_admin(Request $request){

        \App::call('App\Http\Controllers\admin\vendorAdmin@timeDateDay');

        $name = $request->input('name');
        $owner_name = $request->input('owner_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $vendor_category = $request->input('vendor_category');
        $opening = $request->input('opening');
        $closing = $request->input('closing');
        $commission = $request->input('commission');
        $delivery_range = $request->input('delivery_range');
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        $time = $request->session()->get('TIME_TODAY');

        if($password==$confirm_password){

            $entry=array(
                'admin_name'=>$name,
                'owner_name'=>$owner_name,
                'admin_email'=>$email,
                'admin_number'=>$phone,
                'admin_address'=>$address,
                'admin_type'=>'vendor',
                'open_time'=>$opening,
                'close_time'=>$closing,
                'commission_per_order'=>$commission,
                'delivery_range'=>$delivery_range,
                'vendor_category'=>$vendor_category,
                'password'=>$password,
            );

            if($request->hasfile('image')){

                # add new pic.
                $img = $request->file('image');
                $ext = $img->extension();
                $file_name = $phone.'-'.$time.'.'.$ext;
                // $img->storeAs('/public/CV',$file_name); // to storage
                $img->move(public_path('/Admin'), $file_name); // to public

                $entry['admin_image']=$file_name;

            }

            DB::table('admin')
                ->insert($entry);

            $log=array(
                'log'=>'Vendor '.$name.' added'
            );

            DB::table('activity_log')
                ->insert($log);

            $request->session()->put('msgHook','green');
            $request->session()->flash('msg','Vendor admin added');

        }else{

            $request->session()->put('msgHook','red');
            $request->session()->flash('msg','Passwords not matching.');

        }

        #redirecting to function::01 this controller.
        return redirect('/vendor/admin/form');

    }

    # End of function add_vendor_admin.                         <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



    #########################
    #### FUNCTION-NO::02 ####
    #########################
    # Show form;

    function vendor_admin_list(Request $request){

        $result['data'] = DB::table('admin')
            ->where('admin_type','vendor')
            ->get();

        return view('Admin/CityAdmin/VendorList', $result);

    }

    # End of function vendor_admin_list.                        <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
}
