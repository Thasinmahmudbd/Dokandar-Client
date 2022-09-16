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
        $panel=$request->input('panel');
        $result=DB::table('admins')->where('Ad_AI_ID','1')->where('Password',$password)->get();

        if(isset($result[0]->Ad_AI_ID)){

            $request->session()->put('Admin','Active');

            if($panel=="admin"){

                # Update activity log.
                $msg = 'Login successful to admin panel.';
                $entry=array(
                    'Logs'=>$msg
                );

                DB::table('activity_logs')->insert($entry);

                $request->session()->put('msgHook','green');
                $request->session()->flash('msg','Admin panel successfully accessed.');

                return redirect('/admin/home');

            }else{

                # Update activity log.
                $msg = 'Login successful to article editor.';
                $entry=array(
                    'Logs'=>$msg
                );

                DB::table('activity_logs')->insert($entry);

                $request->session()->put('msgHook','green');
                $request->session()->flash('msg','Article editor successfully accessed.');

                return redirect('/article/editor/');

            }

        }else{

            # Update activity log.
            $msg = 'Failed attempt to login.';
            $entry=array(
                'Logs'=>$msg
            );

            DB::table('activity_logs')->insert($entry);

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
