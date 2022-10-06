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





    #########################
    #### FUNCTION-NO::02 ####
    #########################
    # Show city admin dashboard;

    function city_admin_dashboard(Request $request){

        return view('Admin/CityAdmin/Dashboard');

    }

    # End of function city_admin_dashboard.                     <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me, nothing done.
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #





    #########################
    #### FUNCTION-NO::03 ####
    #########################
    # Show vendor admin dashboard;

    function vendor_admin_dashboard(Request $request){

        return view('Admin/VendorAdmin/Dashboard');

    }

    # End of function vendor_admin_dashboard.                   <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me, nothing done.
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



}
