<?php

namespace App\Http\Controllers\article;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class builder extends Controller
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
    # Search or read articles;

    function set_up(Request $request, $id = null){

        $art_id = $request->session()->get('Art_ID');

        if(!empty($id)){

            $result['data'] = DB::table('articles')
                ->where('Art_Title','like', '%'.$id.'%')
                ->orWhere('Art_Tag','like', '%'.$id.'%')
                ->orderBy('Sorting', 'asc')
                ->get();

        }else{

            $result['data'] = DB::table('articles')
                ->orderBy('Sorting', 'asc')
                ->get();

        }

        if(!empty($art_id)){

            $article['section'] = DB::table('full_articles')
                ->where('Art_ID', $art_id)
                ->orderBy('Sorting', 'asc')
                ->get();

            return view('articleBuilder/articleBuilder', $result, $article);

        }else{

            return view('articleBuilder/articleBuilder', $result);

        }

    }

    # End of function set_up.                                   <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::02 ####
    #########################
    # Search article;

    function search_article(Request $request){

        $searchArticle = $request->input('searchArticle');
        $request->session()->forget('Art_ID');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/article/editor/'.$searchArticle);

    }

    # End of function search_video.                             <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::03 ####
    #########################
    # Build article;

    function build_article(Request $request){

        \App::call('App\Http\Controllers\article\builder@timeDateDay');

        $time = $request->session()->get('TIME_TODAY');
        $Art_ID = $request->input('Art_ID');

        $entry=array(
            'Art_ID'=>$Art_ID,
            'Section'=>$request->input('Section'),
            'Main_Title'=>$request->input('Main_Title'),
            'Sub_Title'=>$request->input('Sub_Title'),
            'Para'=>$request->input('Para'),
            'ImgPara_Para'=>$request->input('ImgPara_Para'),
            'ParaImg_Para'=>$request->input('ParaImg_Para'),
            'Code'=>$request->input('Code'),
            'Language'=>$request->input('Language'),
            'Link_Name'=>$request->input('Link_Name'),
            'Link_URL'=>$request->input('Link_URL'),
            'Sorting'=>$request->input('Sorting')
        );

        if($request->hasfile('ImgPara_Img')){

            $img = $request->file('ImgPara_Img');
            $ext = $img->extension();
            $file_name = $time.'.'.$ext;
            // $img->storeAs('/public/CV',$file_name); // to storage
            $img->move(public_path('/Article_Builder'), $file_name); // to public

            $entry['ImgPara_Img']=$file_name;

        }

        if($request->hasfile('ParaImg_Img')){

            $img = $request->file('ParaImg_Img');
            $ext = $img->extension();
            $file_name = $time.'.'.$ext;
            // $img->storeAs('/public/CV',$file_name); // to storage
            $img->move(public_path('/Article_Builder'), $file_name); // to public

            $entry['ParaImg_Img']=$file_name;

        }

        DB::table('full_articles')
            ->insert($entry);

        # checking and setting full article condition

        $hasMore = DB::table('articles')
            ->where('Art_ID', $Art_ID)
            ->first();

        $Art_More = $hasMore->Art_More;
        $Art_More = $Art_More + 1;

        $check=array(
            'Art_More'=>$Art_More
        );

        DB::table('articles')
            ->where('Art_ID',$Art_ID)
            ->update($check);

        # log

        $log=array(
            'Logs'=>'Article section added for article ID: '.$Art_ID
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','green');
        $request->session()->flash('msg','Article Section Built');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/article/editor/');

    }

    # End of function build_article.                            <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::04 ####
    #########################
    # Delete portion;

    function delete_portion(Request $request, $id){

        \App::call('App\Http\Controllers\admin\articles@timeDateDay');

        $result = DB::table('full_articles')
            ->where('Unique_ID', $id)
            ->first();

        $Section = $result->Section;
        $Art_ID = $result->Art_ID;
        
        if($Section == 'imgPara'){
            $file_name = $result->ImgPara_Img;
            $file_path = public_path('/Article_Builder/'.$file_name);
            unlink($file_path);
        }if($Section == 'paraImg'){
            $file_name = $result->ParaImg_Img;
            $file_path = public_path('/Article_Builder/'.$file_name);
            unlink($file_path);
        }

        # checking and setting full article condition

        $hasMore = DB::table('articles')
            ->where('Art_ID', $Art_ID)
            ->first();

        $Art_More = $hasMore->Art_More;
        $Art_More = $Art_More - 1;

        $check=array(
            'Art_More'=>$Art_More
        );

        DB::table('articles')
            ->where('Art_ID',$Art_ID)
            ->update($check);

        # log

        $log=array(
            'Logs'=>'Section deleted from article: '.$id
        );
    
        DB::table('activity_logs')
            ->insert($log);

        DB::table('full_articles')
            ->where('Unique_ID',$id)
            ->delete();

        $request->session()->put('msgHook','red');
        $request->session()->flash('msg','Article Portion Deleted');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/article/editor/');

    }

    # End of function delete_portion.                           <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::05 ####
    #########################
    # Edit portion;

    function edit_portion(Request $request, $id){

        \App::call('App\Http\Controllers\article\builder@timeDateDay');

        $time = $request->session()->get('TIME_TODAY');

        $result = DB::table('full_articles')
            ->where('Unique_ID', $id)
            ->first();

        $Art_ID = $result->Art_ID;

        $entry=array(
            'Main_Title'=>$request->input('Main_Title'),
            'Sub_Title'=>$request->input('Sub_Title'),
            'Para'=>$request->input('Para'),
            'ImgPara_Para'=>$request->input('ImgPara_Para'),
            'ParaImg_Para'=>$request->input('ParaImg_Para'),
            'Code'=>$request->input('Code'),
            'Language'=>$request->input('Language'),
            'Link_Name'=>$request->input('Link_Name'),
            'Link_URL'=>$request->input('Link_URL'),
            'Sorting'=>$request->input('Sorting')
        );

        if($request->hasfile('ImgPara_Img')){

            $file_name = $result->ImgPara_Img;
            $file_path = public_path('/Article_Builder/'.$file_name);
            unlink($file_path);

            $img = $request->file('ImgPara_Img');
            $ext = $img->extension();
            $file_name = $time.'.'.$ext;
            // $img->storeAs('/public/CV',$file_name); // to storage
            $img->move(public_path('/Article_Builder'), $file_name); // to public

            $entry['ImgPara_Img']=$file_name;

        }

        if($request->hasfile('ParaImg_Img')){

            $file_name = $result->ParaImg_Img;
            $file_path = public_path('/Article_Builder/'.$file_name);
            unlink($file_path);

            $img = $request->file('ParaImg_Img');
            $ext = $img->extension();
            $file_name = $time.'.'.$ext;
            // $img->storeAs('/public/CV',$file_name); // to storage
            $img->move(public_path('/Article_Builder'), $file_name); // to public

            $entry['ParaImg_Img']=$file_name;

        }

        DB::table('full_articles')
            ->where('Unique_ID',$id)
            ->update($entry);

        $log=array(
            'Logs'=>'Article section edited for article ID: '.$Art_ID
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','yellow');
        $request->session()->flash('msg','Article Section Edited');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/article/editor/');

    }

    # End of function edit_portion.                             <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #








}
