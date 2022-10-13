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
            $admin_name=$result[0]->admin_name;

            $request->session()->put('Admin_Name',$admin_name);
            $request->session()->put('Admin_Email',$result[0]->admin_email);
            $request->session()->put('Admin_Phone',$result[0]->admin_number);
            $request->session()->put('Admin_ID',$result[0]->admin_id);
            $request->session()->put('Admin_Image',$result[0]->admin_image);
            $request->session()->put('Admin_Type',$admin_type);

            $request->session()->forget('super');
            $request->session()->forget('city');
            $request->session()->forget('vendor');

            $request->session()->put($admin_type,'Active');

            # Update activity log.

            if($admin_type == 'super'){

                $msg = 'Super admin '.$admin_name.' logged in successfully to admin panel.';

            }if($admin_type == 'city'){

                $msg = 'City admin '.$admin_name.' logged in successfully to admin panel.';

            }if($admin_type == 'vendor'){

                $msg = 'Vendor '.$admin_name.' logged in successfully to admin panel.';
            }

            $entry=array(
                'log'=>$msg
            );

            DB::table('activity_log')->insert($entry);

            $request->session()->put('msgHook','green');
            $request->session()->flash('msg','Admin panel successfully accessed.');

            if($admin_type == 'super'){
                return redirect('/dashboard/super/admin');
            }if($admin_type == 'city'){
                return redirect('/dashboard/city/admin');
            }else{
                return redirect('/dashboard/vendor/admin');
            }

        }else{

            # Update activity log.
            $msg = 'Failed to login.';
            $entry=array(
                'log'=>$msg
            );

            DB::table('activity_log')->insert($entry);

            $request->session()->flash('msg','Wrong Password.');

            return redirect('/');

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
