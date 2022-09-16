<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class articles Extends Controller
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
    # Read articles;

    function show_articles(Request $request, $id = null){

        \App::call('App\Http\Controllers\admin\articles@timeDateDay');

        if(!empty($id)){

            $result['data'] = DB::table('articles')
                ->where('Art_ID', $id)
                ->get();

            return view('admin/articleAdd', $result);

        }else{

            $result['data'] = DB::table('articles')
                ->orderBy('Sorting', 'asc')
                ->get();

            return view('admin/articleList', $result);

        }
    }

    # End of function show_article.                           <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #



    #########################
    #### FUNCTION-NO::02 ####
    #########################
    # Insert article;

    function insert_article(Request $request, $hook = null, $id = null){

        \App::call('App\Http\Controllers\admin\articles@timeDateDay');

        $Art_Title = $request->input('Art_Title');
        $time = $request->session()->get('TIME_TODAY');

        $entry=array(
            'Art_Title'=>$Art_Title,
            'Art_Summary'=>$request->input('Art_Summary'),
            'Art_Date'=>$request->input('Art_Date'),
            'Art_Reference'=>$request->input('Art_Reference'),
            'Art_More'=>0,
            'Sorting'=>$request->input('Sorting')
        );

        if($request->hasfile('Art_Image')){

            $img = $request->file('Art_Image');
            $ext = $img->extension();
            $file_name = $Art_Title.'-'.$time.'.'.$ext;
            // $img->storeAs('/public/CV',$file_name); // to storage
            $img->move(public_path('/Art_Image'), $file_name); // to public

            $entry['Art_Image']=$file_name;

        }

        # creating tag

        if(!empty($hook) && !empty($id)){

            $entry['Art_Tag'] = $hook.'-'.$id;
            session()->forget('tagHook');
            session()->forget('tagId');

            if($hook=='P'){

                $Pro_Article_Count = DB::table('projects')
                    ->where('Pro_ID', $id)
                    ->first();

                $Pro_Article = $Pro_Article_Count->Pro_Article;
                $Pro_Article = $Pro_Article + 1;

                $countArticle=array(
                    'Pro_Article'=>$Pro_Article
                );

                DB::table('projects')
                    ->where('Pro_ID',$id)
                    ->update($countArticle);

            }elseif($hook=='F'){

                $Fw_Article_Count = DB::table('frameworks')
                    ->where('Fw_ID', $id)
                    ->first();

                $Fw_Article = $Fw_Article_Count->Fw_Article;
                $Fw_Article = $Fw_Article + 1;

                $countArticle=array(
                    'Fw_Article'=>$Fw_Article
                );

                DB::table('frameworks')
                    ->where('Fw_ID',$id)
                    ->update($countArticle);

            }elseif($hook=='E'){

                $Ex_Article_Count = DB::table('extensions')
                    ->where('Ex_ID', $id)
                    ->first();

                $Ex_Article = $Ex_Article_Count->Ex_Article;
                $Ex_Article = $Ex_Article + 1;

                $countArticle=array(
                    'Ex_Article'=>$Ex_Article
                );

                DB::table('extensions')
                    ->where('Ex_ID',$id)
                    ->update($countArticle);

            }

        }

        # section insert

        DB::table('articles')
            ->insert($entry);

        # log insert

        $log=array(
            'Logs'=>$Art_Title.' - Article Uploaded'
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','green');
        $request->session()->flash('msg','Article Uploaded');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/article/list');

    }

    # End of function insert_article.                           <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::03 ####
    #########################
    # Edit article;

    function edit_article(Request $request, $id){

        \App::call('App\Http\Controllers\admin\articles@timeDateDay');

        $Art_Title = $request->input('Art_Title');
        $time = $request->session()->get('TIME_TODAY');

        $entry=array(
            'Art_Title'=>$Art_Title,
            'Art_Summary'=>$request->input('Art_Summary'),
            'Art_Reference'=>$request->input('Art_Reference'),
            'Sorting'=>$request->input('Sorting')
        );

        if($request->hasfile('Art_Image')){

            # delete old pic.
            $result = DB::table('articles')
            ->where('Art_ID', $id)
            ->first();

            $old_file_name = $result->Art_Image;
            $file_path = public_path('/Art_Image/'.$old_file_name);

            if($old_file_name!=null){
                unlink($file_path);
            }

            # add new pic.
            $img = $request->file('Art_Image');
            $ext = $img->extension();
            $file_name = $Art_Title.'-'.$time.'.'.$ext;
            // $img->storeAs('/public/CV',$file_name); // to storage
            $img->move(public_path('/Art_Image'), $file_name); // to public

            $entry['Art_Image']=$file_name;

        }

        DB::table('articles')
            ->where('Art_ID',$id)
            ->update($entry);

        $log=array(
            'Logs'=>$Art_Title.' - Article Updated'
        );

        DB::table('activity_logs')
            ->insert($log);

        $request->session()->put('msgHook','yellow');
        $request->session()->flash('msg','Article Updated');
        $request->session()->put('actionType','list');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/article/list');

    }

    # End of function edit_article.                           <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::04 ####
    #########################
    # Delete article;

    function delete_article(Request $request, $id){

        \App::call('App\Http\Controllers\admin\articles@timeDateDay');

        $result = DB::table('articles')
            ->where('Art_ID', $id)
            ->first();

        $file_name = $result->Art_Image;
        $Art_Title = $result->Art_Title;

        $log=array(
            'Logs'=>$Art_Title.' - Article Deleted'
        );
    
        DB::table('activity_logs')
            ->insert($log);

        $file_name = $result->Art_Image;
        $file_path = public_path('/Art_Image/'.$file_name);
        
        if($file_name!=null){
            unlink($file_path);
        }

        DB::table('articles')
            ->where('Art_ID',$id)
            ->delete();

        $request->session()->put('msgHook','red');
        $request->session()->flash('msg','Article Deleted');

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/article/list');

    }

    # End of function delete_article.                         <-------#
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

    function generate_tag(Request $request, $hook, $id){

        $request->session()->put('tagHook', $hook);
        $request->session()->put('tagId', $id);

        #redirecting to function no :: 01 C:thisController.
        return redirect('/admin/article/add');

    }

    # End of function generate_tag.                             <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    



}
