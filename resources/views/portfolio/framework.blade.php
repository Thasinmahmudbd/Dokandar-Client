@extends('portfolioFrame')




@section('meta')

    <meta name="description" content="Here you will get a list of frameworks that I've published.">
    <meta name="keywords" content="Thasin Mahmud, Thasin, thasin, framework, thasin mahmud portfolio, thasin frameworks, thasin mahmud frameworks">

@endsection




@section('title')

    <!-- Title -->
    <title>Thasin Mahmud - Frameworks</title>

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
                    <p class="txtLogo clrWhite">Frameworks</p>
                
                </div>

                <p class="disGrid gridCol_2_size_3_7 TagFilters alignContentCenter">
                    <span class="lineHeight_2_5">
                        <span class="highlightBlack content--W">Tags</span>
                        <span class="highlightLink bgmix2 content--W">
                            {{Session::get('frmTag')}}
                        </span>
                    </span>
                    <span class="lineHeight_2_5">
                        <span class="highlightBlack content--W">Filters</span>
                        <span class="highlightLink content--W">
                            <a href="{{url('/show/all/frameworks/')}}">All</a>
                        </span>
                        @foreach($dist as $list)
                        <span class="highlightLink content--W ml_5px">
                            <a href="{{url('/show/all/frameworks/'.$list->Fw_Tag)}}">{{$list->Fw_Tag}}</a>
                        </span>
                        @endforeach
                    </span>
                </p>

            </div>

            <div class="vScrlr_800 snapInline bgmix" data-aos="fade">

                <!--  pc template framework start -->
        
                @foreach($data as $list)
                <div class="vScrlrElm gridCol_3_size_3_6_1 bgThasin boxContent">
                    <img src="{{asset('Fw_Image/'.$list->Fw_Image)}}" alt="loading error..." width="100%">
                    <div>
                        <p class="clrWhite pl_1 pr_1 txtJustify">
                            <span class="titleL borNoneB">{{$list->Fw_Title}}</span> <br>
                            <span>{{$list->Fw_Summary}}</span> 
                        </p>
                        <table class="tableChart content--H w_100Per">
                            <tr>
                                <th width="30%">Name</th>
                                <td width="70%">{{$list->Fw_Name}}</td>
                            </tr>
                            <tr>
                                <th width="30%">Type</th>
                                <td width="70%">{{$list->Fw_Type}}</td>
                            </tr>
                            <tr>
                                <th width="30%">Version</th>
                                <td width="70%">{{$list->Fw_Version}}</td>
                            </tr>
                            <tr>
                                <th width="30%">Documentation</th>
                                <td width="70%">{{$list->Fw_Documentation}}</td>
                            </tr>
                            <tr>
                                <th width="30%">Extension</th>
                                <td width="70%">{{$list->Fw_Extension}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="disFlex gridGap_h flexDirCol txtCenter p_1 sideBtns">
                        
                        @if($list->Fw_Git==null)
                        <a href="#" class="linkless fSize_1_h unavailable">
                        @else
                        <a href="{{$list->Fw_Git}}" target="blank" class="linkless fSize_1_h">
                        @endif
                            <abbr title="Will redirect you to the github repository"><i class="bgmix_2 fa-solid fa-code-branch"></i></abbr>
                        </a>

                        @if($list->Fw_Liveview==null)
                        <a href="#" class="linkless fSize_1_h unavailable">
                        @else
                        <a href="{{$list->Fw_Liveview}}" target="blank" class="linkless fSize_1_h">
                        @endif
                            <abbr title="Will take you to the documentation or live example"><i class="bgmix_2 fa-solid fa-eye"></i></abbr>
                        </a>

                        @if($list->Fw_Article==0)
                        <a href="#" class="linkless fSize_1_h unavailable">
                        @else
                        <a href="{{url('/show/related/articles/F/'.$list->Fw_ID)}}" class="linkless fSize_1_h">
                        @endif
                            <abbr title="Will suggest you related articles"><i class="bgmix_2 fa-solid fa-newspaper"></i></abbr>
                        </a>

                        @if($list->Fw_Video==0)
                        <a href="#" class="linkless fSize_1_h unavailable">
                        @else
                        <a href="{{url('/show/related/videos/F/'.$list->Fw_Title)}}" class="linkless fSize_1_h">
                        @endif
                            <abbr title="Will take you to video gallery"><i class="bgmix_2 fa-solid fa-film"></i></abbr>
                        </a>

                    </div>
                </div>
                @endforeach

                <!--  pc template framework end -->

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
                    <span class="highlightLink bgmix2 content--W">Framework</span>
                    <span class="highlightLink bgmix2 content--W">
                        {{Session::get('frmTag')}}
                    </span>
                </span>
                <span class="lineHeight_2_5">
                    <span class="highlightBlack content--W">Filters</span>
                    <span class="highlightLink content--W">
                        <a href="{{url('/show/all/frameworks/')}}">All</a>
                    </span>
                    @foreach($dist as $list)
                    <span class="highlightLink content--W ml_5px">
                        <a href="{{url('/show/all/frameworks/'.$list->Fw_Tag)}}">{{$list->Fw_Tag}}</a>
                    </span>
                    @endforeach
                </span>
            </p>

            <!-- mobile template framework start -->

            @foreach($data as $list)
            <div class="vScrlrElm gridCol_3_size_3_6_1 bgThasin boxContent shadow" data-aos="fade-up">
                <img src="{{asset('Fw_Image/'.$list->Fw_Image)}}" alt="loading error..." width="100%">
                <div>
                    <p class="clrWhite pl_1 pr_1 txtJustify">
                        <span class="titleL borNoneB">{{$list->Fw_Title}}</span> <br>
                        <span>{{$list->Fw_Title}}</span> 
                    </p>
                    <table class="tableChart content--H w_100Per articleEndLinks">
                        <tr>
                            <th class="articleEndLinks">Name</th>
                            <td class="articleEndLinks">{{$list->Fw_Name}}</td>
                        </tr>
                        <tr>
                            <th class="articleEndLinks">Type</th>
                            <td class="articleEndLinks">{{$list->Fw_Type}}</td>
                        </tr>
                        <tr>
                            <th class="articleEndLinks">Version</th>
                            <td class="articleEndLinks">{{$list->Fw_Version}}</td>
                        </tr>
                        <tr>
                            <th class="articleEndLinks">Documentation</th>
                            <td class="articleEndLinks">{{$list->Fw_Documentation}}</td>
                        </tr>
                        <tr>
                            <th class="articleEndLinks">Extension</th>
                            <td class="articleEndLinks">{{$list->Fw_Extension}}</td>
                        </tr>
                    </table>
                </div>
                <div class="disFlex gridGap_h flexDirCol txtCenter p_1 sideBtns">
                    
                    @if($list->Fw_Git==null)
                    <a href="#" class="linkless fSize_1_h unavailable">
                    @else
                    <a href="{{$list->Fw_Git}}" target="blank" class="linkless fSize_1_h">
                    @endif
                        <i class="bgmix_2 fa-solid fa-code-branch"></i>
                    </a>

                    @if($list->Fw_Liveview==null)
                    <a href="#" class="linkless fSize_1_h unavailable">
                    @else
                    <a href="{{$list->Fw_Liveview}}" target="blank" class="linkless fSize_1_h">
                    @endif
                        <i class="bgmix_2 fa-solid fa-eye"></i>
                    </a>

                    @if($list->Fw_Article==0)
                    <a href="#" class="linkless fSize_1_h unavailable">
                    @else
                    <a href="{{url('/show/related/articles/F/'.$list->Fw_ID)}}" class="linkless fSize_1_h">
                    @endif
                        <i class="bgmix_2 fa-solid fa-newspaper"></i>
                    </a>

                    @if($list->Fw_Video==0)
                    <a href="#" class="linkless fSize_1_h unavailable">
                    @else
                    <a href="{{url('/show/related/videos/F/'.$list->Fw_Title)}}" class="linkless fSize_1_h">
                    @endif
                        <i class="bgmix_2 fa-solid fa-film"></i>
                    </a>

                </div>
            </div>
            @endforeach

            <!--  mobile template framework end -->

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