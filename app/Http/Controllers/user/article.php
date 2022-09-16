<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class article extends Controller
{



    #########################
    #### FUNCTION-NO::01 ####
    #########################
    # Read articles;

    function show_article(Request $request, $key = null){

        if(!empty($key)){

            $result['data'] = DB::table('articles')
                ->where('Art_Title', 'like', '%'.$key.'%')
                ->orWhere('Art_Tag', 'like', '%'.$key.'%')
                ->orderBy('Sorting', 'asc')
                ->get();

        }else{

            $result['data'] = DB::table('articles')
                ->orderBy('Sorting', 'asc')
                ->get();

        }

        return view('portfolio/article', $result);

    }

    # End of function show_article.                             <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::02 ####
    #########################
    # Read full article;

    function show_full_article(Request $request, $id){

        $article['section'] = DB::table('full_articles')
            ->where('Art_ID', $id)
            ->orderBy('Sorting', 'asc')
            ->get();

        $tag = DB::table('articles')
            ->where('Art_ID', $id)
            ->first();

        # tag recommendation

        $Art_Tag = $tag->Art_Tag;

        $result['data'] = DB::table('articles')
            ->where('Art_Tag', $Art_Tag)
            ->where('Art_More', '>', 0)
            ->orderBy('Sorting', 'asc')
            ->get();

        # views count

        $Art_Views = $tag->Art_Views;
        $Art_Views = $Art_Views + 1;

        $view=array(
            'Art_Views'=>$Art_Views
        );

        DB::table('articles')
            ->where('Art_ID',$id)
            ->update($view);

        return view('portfolio/articleDetails', $result, $article);

    }

    # End of function show_full_article.                        <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




    #########################
    #### FUNCTION-NO::03 ####
    #########################
    # Show related articles;

    function show_related_article(Request $request, $tag, $id){

        $Art_Tag = $tag.'-'.$id;

        $result['data'] = DB::table('articles')
            ->where('Art_Tag', $Art_Tag)
            ->orderBy('Sorting', 'asc')
            ->get();

        return view('portfolio/article', $result);

    }

    # End of function show_related_article.                     <-------#
                                                                        #
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
    # Note: Hello, future me,
    # 
    # 
    # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #











}
