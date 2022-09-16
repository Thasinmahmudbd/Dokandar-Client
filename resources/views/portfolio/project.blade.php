@extends('portfolioFrame')




@section('meta')

    <meta name="description" content="Here you will get a list of projects that I've worked on.">
    <meta name="keywords" content="thasin mahmud, thasin, projects, thasin mahmud projects, thasin mahmud portfolio">

@endsection




@section('title')

    <!-- Title -->
    <title>Thasin Mahmud - Project</title>

@endsection




@section('body')

<body class="nunito bgThasin ofHiddenY scrlNone mobileFlow">

@endsection




@section('sidenav')

    <ul class="sideNavUnAnimated">
        <li class="navs"><i class="fa-solid fa-diagram-project"></i><a href="{{url('/show/all/projects/')}}">Projects</a></li>
        <li class="navs"><i class="fa-solid fa-newspaper"></i><a href="{{url('/show/all/articles/')}}">Articles</a></li>
        <li class="navs"><i class="fa-brands fa-hubspot"></i><a href="{{url('/show/all/frameworks/')}}">Frameworks</a></li>
        <li class="navs"><i class="fa-solid fa-code"></i><a href="{{url('/show/all/extensions/')}}">Extensions</a></li>
        <li class="navs"><i class="fa-solid fa-note-sticky"></i><a href="{{url('/open/contact/page/')}}">Contact</a></li>
        <li class="navs"><i class="fa-solid fa-info"></i><a href="{{url('/open/about/page/')}}">About</a></li>
        <li class="navs"><i class="fa-solid fa-house"></i><a href="{{url('/')}}">Home</a></li>
    </ul>

@endsection




@section('container')




        <!-- Projects -->

        <div class="posAbs w_70vw left_0 top_0 bgmix p_1 contentMobile">

            <div class="disGrid gridCol_2_size_3_7 gridGap_h ml_5px">

                <div class="nav bgmix2">
                
                    <!-- Text Logo. -->
                    <p class="txtLogo clrWhite">Projects</p>
                
                </div>

                <p class="disGrid gridCol_2_size_3_7 TagFilters alignContentCenter">
                    <span class="lineHeight_2_5">
                        <span class="highlightBlack content--W">Tags</span>
                        <span class="highlightLink bgmix2 content--W">
                            {{Session::get('proTag')}}
                        </span>
                    </span>
                    <span class="lineHeight_2_5">
                        <span class="highlightBlack content--W">Filters</span>
                        <span class="highlightLink content--W">
                            <a href="{{url('/show/all/projects/')}}">All</a>
                        </span>
                        @foreach($dist as $list)
                        <span class="highlightLink content--W ml_5px">
                            <a href="{{url('/show/all/projects/'.$list->Pro_Tag)}}">{{$list->Pro_Tag}}</a>
                        </span>
                        @endforeach
                    </span>
                </p>

            </div>

            <div class="vScrlr_800 snapInline bgmix" data-aos="fade">

                <!--  pc template project start -->

                @foreach($data as $list)
                <div class="vScrlrElm gridCol_3_size_3_6_1 bgThasin boxContent">
                    <img src="{{asset('Pro_Image/'.$list->Pro_Image)}}" alt="loading error..." width="100%">
                    <p class="clrWhite pl_1 pr_1 txtJustify">
                        <span class="titleL borNoneB">{{$list->Pro_Title}}</span> <br>
                        <span>{{$list->Pro_Summary}}</span> 
                    </p>
                    <div class="disFlex gridGap_h flexDirCol txtCenter p_1 sideBtns">

                        @if($list->Pro_Git==null)
                        <a href="#" class="linkless fSize_1_h unavailable">
                        @else
                        <a href="{{$list->Pro_Git}}" target="blank" class="linkless fSize_1_h">
                        @endif
                            <abbr title="Will redirect you to the github repository"><i class="bgmix_2 fa-solid fa-code-branch"></i></abbr>
                        </a>

                        @if($list->Pro_Liveview==null)
                        <a href="#" class="linkless fSize_1_h unavailable">
                        @else
                        <a href="{{$list->Pro_Liveview}}" target="blank" class="linkless fSize_1_h">
                        @endif
                            <abbr title="Will take you to the documentation or live example"><i class="bgmix_2 fa-solid fa-eye"></i></abbr>
                        </a>

                        @if($list->Pro_Article==0)
                        <a href="#" class="linkless fSize_1_h unavailable">
                        @else
                        <a href="{{url('/show/related/articles/P/'.$list->Pro_ID)}}" class="linkless fSize_1_h">
                        @endif
                            <abbr title="Will suggest you related articles"><i class="bgmix_2 fa-solid fa-newspaper"></i></abbr>
                        </a>

                        @if($list->Pro_Video==0)
                        <a href="#" class="linkless fSize_1_h unavailable">
                        @else
                        <a href="{{url('/show/related/videos/P/'.$list->Pro_Title)}}" class="linkless fSize_1_h">
                        @endif
                            <abbr title="Will take you to video gallery"><i class="bgmix_2 fa-solid fa-film"></i></abbr>
                        </a>

                    </div>
                </div>
                @endforeach

                <!--  pc template project end -->

                <span class="bigGap"></span>
                <span class="bigGap"></span>
                <span class="bigGap"></span>
                <span class="bigGap"></span>
                <span class="bigGap"></span>
                <span class="bigGap"></span>
                <span class="bigGap"></span>
                <span class="bigGap"></span>
                <span class="bigGap"></span>
                <span class="bigGap"></span>
                <span class="bigGap"></span>
                <span class="bigGap"></span>

            </div>

        </div>





        <!-- mobile -->


        <div class="bgmix forMobile gridGap_h">

            <p class="disGrid gridCol_2_size_3_7 TagFilters">
                <span class="lineHeight_2_5">
                    <span class="highlightBlack content--W">Tags</span>
                    <span class="highlightLink bgmix2 content--W">Projects</span>
                    <span class="highlightLink bgmix2 content--W">
                        {{Session::get('proTag')}}
                    </span>
                </span>
                <span class="lineHeight_2_5">
                    <span class="highlightBlack content--W">Filters</span>
                    <span class="highlightLink content--W">
                        <a href="{{url('/show/all/projects/')}}">All</a>
                    </span>
                    @foreach($dist as $list)
                    <span class="highlightLink content--W ml_5px">
                        <a href="{{url('/show/all/projects/'.$list->Pro_Tag)}}">{{$list->Pro_Tag}}</a>
                    </span>
                    @endforeach
                </span>
            </p>

            <!--  mobile template project start -->

            @foreach($data as $list)
            <div class="vScrlrElm gridCol_3_size_3_6_1 bgThasin boxContent shadow" data-aos="fade-up">
                <img src="{{asset('Pro_Image/'.$list->Pro_Image)}}" alt="loading error..." width="100%">
                <p class="clrWhite pl_1 pr_1 txtJustify">
                    <span class="titleL borNoneB">{{$list->Pro_Title}}</span> <br>
                    <span>{{$list->Pro_Summary}}</span> 
                </p>
                <div class="disFlex gridGap_h flexDirCol txtCenter p_1 sideBtns">

                    @if($list->Pro_Git==null)
                    <a href="#" class="linkless fSize_1_h unavailable">
                    @else
                    <a href="{{$list->Pro_Git}}" target="blank" class="linkless fSize_1_h">
                    @endif
                        <i class="bgmix_2 fa-solid fa-code-branch"></i>
                    </a>

                    @if($list->Pro_Liveview==null)
                    <a href="#" class="linkless fSize_1_h unavailable">
                    @else
                    <a href="{{$list->Pro_Liveview}}" target="blank" class="linkless fSize_1_h">
                    @endif
                        <i class="bgmix_2 fa-solid fa-eye"></i>
                    </a>

                    @if($list->Pro_Article==0)
                    <a href="#" class="linkless fSize_1_h unavailable">
                    @else
                    <a href="{{url('/show/related/articles/P/'.$list->Pro_ID)}}" class="linkless fSize_1_h">
                    @endif
                        <i class="bgmix_2 fa-solid fa-newspaper"></i>
                    </a>

                    @if($list->Pro_Video==0)
                    <a href="#" class="linkless fSize_1_h unavailable">
                    @else
                    <a href="{{url('/show/related/videos/P/'.$list->Pro_Title)}}" class="linkless fSize_1_h">
                    @endif
                        <i class="bgmix_2 fa-solid fa-film"></i>
                    </a>

                </div>
            </div>
            @endforeach

            <!--  mobile template project end -->

            <span class="bigGap"></span>
            <span class="bigGap"></span>
            <span class="bigGap"></span>
            <span class="bigGap"></span>
            <span class="bigGap"></span>
            <span class="bigGap"></span>
            <span class="bigGap"></span>
            <span class="bigGap"></span>
            <span class="bigGap"></span>
            <span class="bigGap"></span>
            <span class="bigGap"></span>
            <span class="bigGap"></span>

        </div>




@endsection