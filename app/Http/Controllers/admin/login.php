<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class login extends Controller
{





    #########################
    #### FUNCTION-NO::01 ####
    #########################
    # Logins user;

    function login_admin(Request $request){

        # Auth start from here.
        $password=$request->input('password');
        $phone=$request->input('phone');
        $result=DB::table('admin')->where('admin_number',$phone)->where('password',$password)->get();

        if(isset($result[0]->admin_id)){

            $admin_type=$result[0]->admin_type;

            $request->session()->put('Admin','Active');
            $request->session()->put('Admin_Type',$admin_type);

            # Update activity log.
            $msg = $result[0]->admin_name.' logged in successfully to admin panel.';
            $entry=array(
                'log'=>$msg
            );

            DB::table('activity_log')->insert($entry);

            $request->session()->put('msgHook','green');
            $request->session()->flash('msg','Admin panel successfully accessed.');

            return redirect('/dashboard/super/admin');

        }else{

            # Update activity log.
            $msg = $result[0]->admin_name.' failed to login.';
            $entry=array(
                'log'=>$msg
            );

            DB::table('activity_log')->insert($entry);

            $request->session()->flash('msg','Wrong Password.');

            return redirect('/admin/login');

        }

    }

    # End of function login_admin.                              <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #





}
