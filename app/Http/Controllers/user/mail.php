<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class mail extends Controller
{



    #########################
    #### FUNCTION-NO::01 ####
    #########################
    # Open contact page;

    function open_contact(Request $request){

        # collect info
        $myInfo = DB::table('personal_infos')->where('ID','1')->first();
        $phn1 = $myInfo->Phone_One;
        $phn2 = $myInfo->Phone_Two;

        $request->session()->put('phn1',$phn1);
        $request->session()->put('phn2',$phn2);

        return view('portfolio/contact');

    }

    # End of function open_contact.                             <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



    #########################
    #### FUNCTION-NO::02 ####
    #########################
    # Sends mail;

    function send_mail(Request $request){

        $email = $request->input('Email');
        $subject = $request->input('Subject');
        $txt = $request->input('Body');

        $result=DB::table('admins')->where('Ad_AI_ID','1')->first();

        if($subject == $result->Panel_Call){

            # redirect to admin login
            return redirect('/admin/login');

        }else{

            if($email==null){

                $request->session()->put('msgHook','red');
                $request->session()->flash('msg',"Please provide your valid email address.");

                # Redirecting to [FUNCTION-NO::01]---this-controller.
                return redirect('/open/contact/page/');

            }elseif($subject==null){

                $request->session()->put('msgHook','yellow');
                $request->session()->flash('msg',"Please provide a subject.");

                # Redirecting to [FUNCTION-NO::01]---this-controller.
                return redirect('/open/contact/page/');

            }elseif($txt==null){

                $request->session()->put('msgHook','yellow');
                $request->session()->flash('msg',"Seems like you've forgotten to write the message.");

                # Redirecting to [FUNCTION-NO::01]---this-controller.
                return redirect('/open/contact/page/');

            }else{

                # collect email
                $myInfo = DB::table('personal_infos')->where('ID','1')->first();
                $to = $myInfo->Email;

                # send mail
                $headers = 'From: '.$email;
                mail($to,$subject,$txt,$headers);

                $request->session()->put('msgHook','green');
                $request->session()->flash('msg',"E-mail sent successfully. I'll get back to you ASAP.");

                # Redirecting to [FUNCTION-NO::01]---this-controller.
                return redirect('/open/contact/page/');

            }

        }

    }

    # End of function send_mail.                                <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




}
