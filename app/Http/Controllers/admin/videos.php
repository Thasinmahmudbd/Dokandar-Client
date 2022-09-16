<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class videos extends Controller
{



    #########################
    #### FUNCTION-NO::01 ####
    #########################
    # Read videos;

    function show_video(Request $request, $tag = null){

        if(!empty($tag)){

            $result['data'] = DB::table('videos')
                ->where('Video_Tag','like', $tag)
                ->orderBy('Sorting', 'asc')
                ->get();

            $request->session()->put('search','yes');
            return view('admin/videos', $result);

        }else{

            $result['data'] = DB::table('videos')
                ->orderBy('Sorting', 'asc')
                ->get();

            $request->session()->put('search','no');
            return view('admin/videos', $result);

        }
    }

    # End of function show_videos.                              <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



    #########################
    #### FUNCTION-NO::02 ####
    #########################
    # Insert video;

    function insert_video(Request $request){

        $Vid_Name = $request->input('Vid_Name');
        $Video_Tag = $request->input('Video_Tag');
        $Gallery_Tag = $request->input('Gallery_Tag');

        $entry=array(
            'Vid_Name'=>$Vid_Name,
            'Gallery_Tag'=>$Gallery_Tag,
            'Video_Tag'=>$Video_Tag,
            'Embed'=>$request->input('Embed'),
            'Sorting'=>$request->input('Sorting')
        );

        DB::table('videos')
            ->insert($entry);

        # counting video
        if($Gallery_Tag=='fr'){

            $Fw_Video_Count = DB::table('frameworks')
                ->where('Fw_Title', $Video_Tag)
                ->first();

            $Fw_Video = $Fw_Video_Count->Fw_Video;
            $Fw_Video = $Fw_Video + 1;

            $countVideo=array(
                'Fw_Video'=>$Fw_Video
            );

            DB::table('frameworks')
                ->where('Fw_Title', $Video_Tag)
                ->update($countVideo);

        }elseif($Gallery_Tag=='ex'){

            $Ex_Video_Count = DB::table('extensions')
                ->where('Ex_Name', $Video_Tag)
                ->first();

            $Ex_Video = $Ex_Video_Count->Ex_Video;
            $Ex_Video = $Ex_Video + 1;

            $countVideo=array(
                'Ex_Video'=>$Ex_Video
            );

            DB::table('extensions')
                ->where('Ex_Name', $Video_Tag)
                ->update($countVideo);

        }elseif($Gallery_Tag=='pro'){

            $Pro_Video_Count = DB::table('projects')
                ->where('Pro_Title', $Video_Tag)
                ->first();

            $Pro_Video = $Pro_Video_Count->Pro_Video;
            $Pro_Video = $Pro_Video + 1;

            $countVideo=array(
                'Pro_Video'=>$Pro_Video
            );

            DB::table('projects')
                ->where('Pro_Title', $Video_Tag)
                ->update($countVideo);

        }
        

        #log

        $log=array(
            'Logs'=>$Vid_Name.' - Video Uploaded'
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','green');
        $request->session()->flash('msg','Video Uploaded');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/video');

    }

    # End of function insert_video.                             <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::03 ####
    #########################
    # Edit video;

    function edit_video(Request $request, $id){

        $Vid_Name = $request->input('Vid_Name');

        $entry=array(
            'Vid_Name'=>$Vid_Name,
            'Gallery_Tag'=>$request->input('Gallery_Tag'),
            'Video_Tag'=>$request->input('Video_Tag'),
            'Embed'=>$request->input('Embed'),
            'Sorting'=>$request->input('Sorting')
        );

        DB::table('videos')
            ->where('Vid_ID',$id)
            ->update($entry);

        $log=array(
            'Logs'=>$Vid_Name.' - Video Updated'
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','yellow');
        $request->session()->flash('msg','Video Updated');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/video');

    }

    # End of function edit_video.                               <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::04 ####
    #########################
    # Delete video;

    function delete_video(Request $request, $id){

        $result = DB::table('videos')
            ->where('Vid_ID', $id)
            ->first();
        
        $Vid_Name = $result->Vid_Name;
        $Gallery_Tag = $result->Gallery_Tag;
        $Video_Tag = $result->Video_Tag;
    
        # counting video
        if($Gallery_Tag=='fr'){

            $Fw_Video_Count = DB::table('frameworks')
                ->where('Fw_Title', $Video_Tag)
                ->first();

            $Fw_Video = $Fw_Video_Count->Fw_Video;
            $Fw_Video = $Fw_Video - 1;

            $countVideo=array(
                'Fw_Video'=>$Fw_Video
            );

            DB::table('frameworks')
                ->where('Fw_Title', $Video_Tag)
                ->update($countVideo);

        }elseif($Gallery_Tag=='ex'){

            $Ex_Video_Count = DB::table('extensions')
                ->where('Ex_Name', $Video_Tag)
                ->first();

            $Ex_Video = $Ex_Video_Count->Ex_Video;
            $Ex_Video = $Ex_Video - 1;

            $countVideo=array(
                'Ex_Video'=>$Ex_Video
            );

            DB::table('extensions')
                ->where('Ex_Name', $Video_Tag)
                ->update($countVideo);

        }elseif($Gallery_Tag=='pro'){

            $Pro_Video_Count = DB::table('projects')
                ->where('Pro_Title', $Video_Tag)
                ->first();

            $Pro_Video = $Pro_Video_Count->Pro_Video;
            $Pro_Video = $Pro_Video - 1;

            $countVideo=array(
                'Pro_Video'=>$Pro_Video
            );

            DB::table('projects')
                ->where('Pro_Title', $Video_Tag)
                ->update($countVideo);

        }

        #log

        $log=array(
            'Logs'=>$Vid_Name.' - Video Deleted'
        );

        DB::table('activity_logs')
            ->insert($log);

        DB::table('videos')
            ->where('Vid_ID',$id)
            ->delete();

        $request->session()->put('msgHook','red');
        $request->session()->flash('msg','Video Deleted');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/video');

    }

    # End of function delete_video.                             <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::05 ####
    #########################
    # Search video;

    function search_video(Request $request){

        $Video_Tag = $request->input('Video_Tag');

        $request->session()->put('msgHook','green');
        $request->session()->flash('msg','Search result');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/video/'.$Video_Tag);

    }

    # End of function search_video.                             <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #


}
