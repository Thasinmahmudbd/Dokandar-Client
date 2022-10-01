<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboard extends Controller
{





    #########################
    #### FUNCTION-NO::01 ####
    #########################
    # Show super admin dashboard;

    function super_admin_dashboard(Request $request){

        return view('Admin/SuperAdmin/Dashboard');

    }

    # End of function super_admin_dashboard.                    <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me, nothing done.
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #





}
