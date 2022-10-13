<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class delivery extends Controller
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
    # Read banner;

    function show_delivery_boy_list(Request $request){

        \App::call('App\Http\Controllers\admin\delivery@timeDateDay');

        $result['data'] = DB::table('delivery_boy')
            ->get();

        return view('Admin/CityAdmin/DeliveryBoy', $result);

    }

    # End of function show_delivery_boy_list.                   <-------#
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

    function show_delivery_boy_form(Request $request){

        $result['area'] = DB::table('area')
            ->orderBy('area_name','asc')
            ->get();

        $result2['vendor'] = DB::table('admin')
            ->where('admin_type','vendor')
            ->orderBy('admin_name','asc')
            ->get();

        return view('Admin/CityAdmin/AddDeliveryBoy', $result, $result2);

    }

    # End of function show_delivery_boy_form.                   <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::03 ####
    #########################
    # Add delivery boy;

    function add_delivery_boy(Request $request){

        \App::call('App\Http\Controllers\admin\cityAdmin@timeDateDay');

        $area = $request->input('area');
        $vendor = $request->input('vendor');
        $name = $request->input('name');
        $commission = $request->input('commission');
        $phone = $request->input('phone');
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        $time = $request->session()->get('TIME_TODAY');

        if($password==$confirm_password){

            $entry=array(
                'delivery_name'=>$name,
                'delivery_phone'=>$phone,
                'area'=>$area,
                'vendor'=>$vendor,
                'commission'=>$commission,
                'password'=>$password,
            );

            if($request->hasfile('image')){

                # add new pic.
                $img = $request->file('image');
                $ext = $img->extension();
                $file_name = $phone.'-'.$time.'.'.$ext;
                // $img->storeAs('/public/CV',$file_name); // to storage
                $img->move(public_path('/Delivery'), $file_name); // to public

                $entry['delivery_image']=$file_name;

            }

            DB::table('delivery_boy')
                ->insert($entry);

            $log=array(
                'log'=>'Delivery boy '.$name.' added'
            );

            DB::table('activity_log')
                ->insert($log);

            $request->session()->put('msgHook','green');
            $request->session()->flash('msg','Delivery boy added');

        }else{

            $request->session()->put('msgHook','red');
            $request->session()->flash('msg','Passwords not matching.');

        }

        #redirecting to function::02 this controller.
        return redirect('/delivery/boy/form');

    }

    # End of function add_city_admin.                           <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::04 ####
    #########################
    # Show delivery commission;

    function show_delivery_commission_list(Request $request){

        $result['data'] = DB::table('delivery_boy')
            ->orderBy('delivery_name','asc')
            ->get();

        return view('Admin/CityAdmin/DeliveryBoyCommission', $result);

    }

    # End of function show_delivery_commission_list.            <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #

}
