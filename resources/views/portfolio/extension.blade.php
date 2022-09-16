@extends('portfolioFrame')




@section('meta')

    <meta name="description" content="Here you will get a list of extension that I've published.">
    <meta name="keywords" content="Thasin Mahmud, Thasin, thasin, extension, thasin mahmud portfolio, thasin extensions, thasin mahmud extensions">

@endsection




@section('title')

    <!-- Title -->
    <title>Thasin Mahmud - Extension</title>

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




        <!-- extension -->

        <div class="posAbs w_70vw left_0 top_0 bgmix p_1 contentMobile">

            <div class="disGrid gridCol_2_size_3_7 gridGap_h ml_5px">

                <div class="nav bgmix2">
                
                    <!-- Text Logo. -->
                    <p class="txtLogo clrWhite">Extension</p>
                
                </div>

                <p class="disGrid gridCol_2_size_3_7 TagFilters alignContentCenter">
                    <span class="lineHeight_2_5">
                        <span class="highlightBlack content--W">Tags</span>
                        <span class="highlightLink bgmix2 content--W">
                            {{Session::get('extTag')}}
                        </span>
                    </span>
                    <span class="lineHeight_2_5">
                        <span class="highlightBlack content--W">Filters</span>
                        <span class="highlightLink content--W">
                            <a href="{{url('/show/all/extensions/')}}">All</a>
                        </span>
                        @foreach($dist as $list)
                        <span class="highlightLink content--W ml_5px">
                            <a href="{{url('/show/all/extensions/'.$list->Ex_Tag)}}">{{$list->Ex_Tag}}</a>
                        </span>
                        @endforeach
                    </span>
                </p>

            </div>

            <div class="vScrlr_800 snapInline bgmix" data-aos="fade">

                <!-- pc template extension start-->

                @foreach($data as $list)
                <div class="vScrlrElm gridCol_3_size_2_7_1 bgThasin boxContent shadow">
                    <img src="{{asset('Ex_Image/'.$list->Ex_Image)}}" alt="loading error..." width="100%">
                    <table class="tableChart content--H">
                        <tr>
                            <th width="30%">Name</th>
                            <td width="70%">{{$list->Ex_Name}}</td>
                        </tr>
                        <tr>
                            <th width="30%">Type</th>
                            <td width="70%">{{$list->Ex_Type}}</td>
                        </tr>
                        <tr>
                            <th width="30%">Version</th>
                            <td width="70%">{{$list->Ex_Version}}</td>
                        </tr>
                        <tr>
                            <th width="30%">IDE</th>
                            <td width="70%">{{$list->Ex_IDE}}</td>
                        </tr>
                        <tr>
                            <th width="30%">Use</th>
                            <td width="70%">{{$list->Ex_Use}}</td>
                        </tr>
                    </table>
                    <div class="disFlex gridGap_h flexDirCol txtCenter p_1 sideBtns">
                        
                        @if($list->Ex_Git==null)
                        <a href="#" class="linkless fSize_1_h unavailable">
                        @else
                        <a href="{{$list->Ex_Git}}" target="blank" class="linkless fSize_1_h">
                        @endif
                            <abbr title="Will redirect you to the github repository"><i class="bgmix_2 fa-solid fa-code-branch"></i></abbr>
                        </a>

                        @if($list->Ex_Liveview==null)
                        <a href="#" class="linkless fSize_1_h unavailable">
                        @else
                        <a href="{{$list->Ex_Liveview}}" target="blank" class="linkless fSize_1_h">
                        @endif
                            <abbr title="Will take you to the documentation or live example"><i class="bgmix_2 fa-solid fa-eye"></i></abbr>
                        </a>

                        @if($list->Ex_Article==0)
                        <a href="#" class="linkless fSize_1_h unavailable">
                        @else
                        <a href="{{url('/show/related/articles/E/'.$list->Ex_ID)}}" class="linkless fSize_1_h">
                        @endif
                            <abbr title="Will suggest you related articles"><i class="bgmix_2 fa-solid fa-newspaper"></i></abbr>
                        </a>

                        @if($list->Ex_Video==0)
                        <a href="#" class="linkless fSize_1_h unavailable">
                        @else
                        <a href="{{url('/show/related/videos/E/'.$list->Ex_Name)}}" class="linkless fSize_1_h">
                        @endif
                            <abbr title="Will take you to video gallery"><i class="bgmix_2 fa-solid fa-film"></i></abbr>
                        </a>

                    </div>
                </div>
                @endforeach

                <!-- pc template extension end-->

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
                    <span class="highlightLink bgmix2 content--W">Extension</span>
                    <span class="highlightLink bgmix2 content--W">
                        {{Session::get('extTag')}}
                    </span>
                </span>
                <span class="lineHeight_2_5">
                    <span class="highlightBlack content--W">Filters</span>
                    <span class="highlightLink content--W">
                        <a href="{{url('/show/all/extensions/')}}">All</a>
                    </span>
                    @foreach($dist as $list)
                    <span class="highlightLink content--W ml_5px">
                        <a href="{{url('/show/all/extensions/'.$list->Ex_Tag)}}">{{$list->Ex_Tag}}</a>
                    </span>
                    @endforeach
                </span>
            </p>

            <!-- mobile template extension start-->
        
            @foreach($data as $list)
            <div class="vScrlrElm gridCol_3_size_2_7_1 bgThasin boxContent shadow" data-aos="fade-up">
                <img src="{{asset('Ex_Image/'.$list->Ex_Image)}}" alt="loading error..." width="100%">
                <table class="tableChart">
                    <tr>
                        <th class="articleEndLinks">Name</th>
                        <td class="articleEndLinks">{{$list->Ex_Name}}</td>
                    </tr>
                    <tr>
                        <th class="articleEndLinks">Type</th>
                        <td class="articleEndLinks">{{$list->Ex_Type}}</td>
                    </tr>
                    <tr>
                        <th class="articleEndLinks">Version</th>
                        <td class="articleEndLinks">{{$list->Ex_Version}}</td>
                    </tr>
                    <tr>
                        <th class="articleEndLinks">IDE</th>
                        <td class="articleEndLinks">{{$list->Ex_IDE}}</td>
                    </tr>
                    <tr>
                        <th class="articleEndLinks">Use</th>
                        <td class="articleEndLinks">{{$list->Ex_Use}}</td>
                    </tr>
                </table>
                <div class="disFlex gridGap_h flexDirCol txtCenter p_1 sideBtns">
                    
                    @if($list->Ex_Git==null)
                    <a href="#" class="linkless fSize_1_h unavailable">
                    @else
                    <a href="{{$list->Ex_Git}}" target="blank" class="linkless fSize_1_h">
                    @endif
                        <i class="bgmix_2 fa-solid fa-code-branch"></i>
                    </a>

                    @if($list->Ex_Liveview==null)
                    <a href="#" class="linkless fSize_1_h unavailable">
                    @else
                    <a href="{{$list->Ex_Liveview}}" target="blank" class="linkless fSize_1_h">
                    @endif
                        <i class="bgmix_2 fa-solid fa-eye"></i>
                    </a>

                    @if($list->Ex_Article==0)
                    <a href="#" class="linkless fSize_1_h unavailable">
                    @else
                    <a href="{{url('/show/related/articles/E/'.$list->Ex_ID)}}" class="linkless fSize_1_h">
                    @endif
                        <i class="bgmix_2 fa-solid fa-newspaper"></i>
                    </a>

                    @if($list->Ex_Video==0)
                    <a href="#" class="linkless fSize_1_h unavailable">
                    @else
                    <a href="{{url('/show/related/videos/E/'.$list->Ex_Name)}}" class="linkless fSize_1_h">
                    @endif
                        <i class="bgmix_2 fa-solid fa-film"></i>
                    </a>

                </div>
            </div>
            @endforeach

            <!-- mobile template extension end-->

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