<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class video extends Controller
{
    


    #########################
    #### FUNCTION-NO::01 ####
    #########################
    # Read videos;

    function show_related_video(Request $request, $tag, $title){

        if($tag=='P'){

            $result['data'] = DB::table('videos')
                ->where('Video_Tag', 'like', '%'.$title.'%')
                ->orderBy('Sorting', 'asc')
                ->get();

            $info = DB::table('projects')
                ->where('Pro_Title', 'like', '%'.$title.'%')
                ->first();

            $request->session()->put('Name_', $info->Pro_Title);
            $request->session()->forget('Type_');
            $request->session()->forget('Version_');
            $request->session()->forget('IDE_');
            $request->session()->forget('Use_');
            $request->session()->forget('Documentation_');
            $request->session()->forget('Extension_');

            $request->session()->put('Git_', $info->Pro_Git);
            $request->session()->put('Article_', $info->Pro_Article);
            $request->session()->put('Liveview_', $info->Pro_Liveview);
            $request->session()->put('Video_', $info->Pro_Video);

            $request->session()->put('ID_', $info->Pro_ID);

            $request->session()->put('TagPrint','Project');
            $request->session()->put('Tag_','P');
            $request->session()->put('Summary_',$info->Pro_Summary);

        }elseif($tag=='F'){

            $result['data'] = DB::table('videos')
                ->where('Video_Tag', 'like', '%'.$title.'%')
                ->orderBy('Sorting', 'asc')
                ->get();

            $info = DB::table('frameworks')
                ->where('Fw_Title', 'like', '%'.$title.'%')
                ->first();

            $request->session()->put('Name_', $info->Fw_Name);
            $request->session()->put('Type_', $info->Fw_Type);
            $request->session()->put('Version_', $info->Fw_Version);
            $request->session()->forget('IDE_');
            $request->session()->forget('Use_');
            $request->session()->put('Documentation_', $info->Fw_Documentation);
            $request->session()->put('Extension_', $info->Fw_Extension);

            $request->session()->put('Git_', $info->Fw_Git);
            $request->session()->put('Article_', $info->Fw_Article);
            $request->session()->put('Liveview_', $info->Fw_Liveview);
            $request->session()->put('Video_', $info->Fw_Video);

            $request->session()->put('ID_', $info->Fw_ID);

            $request->session()->put('TagPrint','Framework');
            $request->session()->put('Tag_','F');
            $request->session()->put('Summary_',$info->Fw_Summary);

        }elseif($tag=='E'){

            $result['data'] = DB::table('videos')
                ->where('Video_Tag', 'like', '%'.$title.'%')
                ->orderBy('Sorting', 'asc')
                ->get();

            $info = DB::table('extensions')
                ->where('Ex_Name', 'like', '%'.$title.'%')
                ->first();

            $request->session()->put('Name_', $info->Ex_Name);
            $request->session()->put('Type_', $info->Ex_Type);
            $request->session()->put('Version_', $info->Ex_Version);
            $request->session()->put('IDE_', $info->Ex_IDE);
            $request->session()->put('Use_', $info->Ex_Use);
            $request->session()->forget('Documentation_');
            $request->session()->forget('Extension_');

            $request->session()->put('Git_', $info->Ex_Git);
            $request->session()->put('Article_', $info->Ex_Article);
            $request->session()->put('Liveview_', $info->Ex_Liveview);
            $request->session()->put('Video_', $info->Ex_Video);

            $request->session()->put('ID_', $info->Ex_ID);

            $request->session()->put('TagPrint','Extension');
            $request->session()->put('Tag_','E');
            $request->session()->forget('Summary_');

        }

        $request->session()->put('TitlePrint',$title);

        return view('portfolio/videoGallery', $result);

    }

    # End of function show_related_video.                       <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
}
