@extends('portfolioFrame')




@section('meta')

    <meta name="description" content="Here you will get a videos related to {{Session::get('TitlePrint')}}.">
    <meta name="keywords" content="thasin mahmud, thasin, videos, thasin mahmud videos, thasin mahmud portfolio, {{Session::get('TitlePrint')}}">

@endsection




@section('title')

    <!-- Title -->
    <title>Thasin Mahmud - {{Session::get('TitlePrint')}}</title>

@endsection




@section('body')

<body class="nunito bgThasin scrlNone mobileFlow">

@endsection




@section('sidenav')


@endsection




@section('container')






        <!-- video gallery -->

        <div class="galleryGrid">

            <div>

                <div class="disGrid gridCol_2_size_5_5 gridGap_h ml_5px">

                    <div class="p_0_q bgmix2">
                    
                        <!-- Text Logo. -->
                        <p class="txtLogo clrWhite">Gallery Tag: {{Session::get('TitlePrint')}}</p>
                    
                    </div>

                    <p class="disGrid gridCol_2_size_3_7 TagFilters alignContentCenter">
                        <span class="lineHeight_2_5">
                            <span class="highlightBlack content--W">Tags</span>
                            <span class="highlightLink bgmix2 content--W">{{Session::get('TagPrint')}}</span>
                        </span>
                        <span class="lineHeight_2_5">
                            <span class="disGrid gridCol_8_size_1 alignItemsCenter p_0 justifyItemsCenter highlightBlack">

                                <span class="content--W disFlex p_0">Nav</span>

                                <abbr title="Will redirect you to projects">
                                    <a class="linkless" href="{{url('/show/all/projects/')}}">
                                        <i class="fa-solid fa-diagram-project txtCenter"></i>
                                    </a>
                                </abbr>
    
                                <abbr title="Will redirect you to articles">
                                    <a class="linkless" href="{{url('/show/all/articles/')}}">
                                        <i class="fa-solid fa-newspaper txtCenter"></i>
                                    </a>
                                </abbr>
                                
                                <abbr title="Will redirect you to frameworks">
                                    <a class="linkless" href="{{url('/show/all/frameworks/')}}">
                                        <i class="fa-brands fa-hubspot txtCenter"></i>
                                    </a>
                                </abbr>
    
                                <abbr title="Will redirect you to extensions">
                                    <a class="linkless" href="{{url('/show/all/extensions/')}}">
                                        <i class="fa-solid fa-code txtCenter"></i>
                                    </a>
                                </abbr>
    
                                <abbr title="Will redirect you to contact page">
                                    <a class="linkless" href="{{url('/open/contact/page/')}}">
                                        <i class="fa-solid fa-note-sticky txtCenter"></i>
                                    </a>
                                </abbr>
    
                                <abbr title="Will redirect you to about page">
                                    <a class="linkless" href="{{url('/open/about/page/')}}">
                                        <i class="fa-solid fa-info txtCenter"></i>
                                    </a>
                                </abbr>
    
                                <abbr title="Will redirect you to homapage">
                                    <a class="linkless" href="{{url('/')}}">
                                        <i class="fa-solid fa-house txtCenter"></i>
                                    </a>
                                </abbr>
                                
                            </span>
                        </span>
                    </p>

                </div>

                <div class="w_90Per m_a disFlex flexDirRow gridGap_2 pt_50px justifyContentCenter" data-aos="fade">

                    <!-- pc video template start-->
                    @foreach($data as $list)
                    <div class="disGrid gridGap_h boxContent vScrlrElm bgThasin p_1 shadow">
                        <iframe src="{{$list->Embed}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <strong class="clrWhite">{{$list->Vid_Name}}</strong>
                    </div>
                    @endforeach
                    <!-- pc video template end-->

                </div>

            </div>

            <div class="posFix top_0 right_0">

                <div class="vScrlr_700 snapInline w_500 transparent">
            
                    <div class="vScrlrElm p_1 ml_1 mr_1 boxContent bgThasin">
                        
                        <table class="tableChart content--H">

                            @if(Session::get('Name_'))
                            <tr>
                                <th>Name</th>
                                <td>{{Session::get('Name_')}}</td>
                            </tr>
                            @endif
                            
                            @if(Session::get('Type_'))
                            <tr>
                                <th>Type</th>
                                <td>{{Session::get('Type_')}}</td>
                            </tr>
                            @endif
                            @if(Session::get('Version_'))
                            <tr>
                                <th>Version</th>
                                <td>{{Session::get('Version_')}}</td>
                            </tr>
                            @endif
                            @if(Session::get('IDE_'))
                            <tr>
                                <th>IDE</th>
                                <td>{{Session::get('IDE_')}}</td>
                            </tr>
                            @endif
                            @if(Session::get('Use_'))
                            <tr>
                                <th>Use</th>
                                <td>{{Session::get('Use_')}}</td>
                            </tr>
                            @endif
                            @if(Session::get('Documentation_'))
                            <tr>
                                <th>Documentation</th>
                                <td>{{Session::get('Documentation_')}}</td>
                            </tr>
                            @endif
                            @if(Session::get('Extension_'))
                            <tr>
                                <th>Extension</th>
                                <td>{{Session::get('Extension_')}}</td>
                            </tr>
                            @endif

                        </table>

                        <div class="disFlex gridGap_h flexDirRow txtCenter p_1 sideBtns justifyContentCenter">
                            
                            @if(Session::get('Git_'))
                            <a href="#" class="linkless fSize_1_h unavailable">
                            @else
                            <a href="{{Session::get('Git_')}}" target="blank" class="linkless fSize_1_h">
                            @endif
                                <abbr title="Will redirect you to the github repository"><i class="bgmix_2 fa-solid fa-code-branch"></i></abbr>
                            </a>

                            @if(Session::get('Liveview_'))
                            <a href="#" class="linkless fSize_1_h unavailable">
                            @else
                            <a href="{{Session::get('Liveview_')}}" target="blank" class="linkless fSize_1_h">
                            @endif
                                <abbr title="Will take you to the documentation or live example"><i class="bgmix_2 fa-solid fa-eye"></i></abbr>
                            </a>

                            @if(Session::get('Article_')==0)
                            <a href="#" class="linkless fSize_1_h unavailable">
                            @else
                            <a href="{{url('/show/related/articles/'.Session::get('Tag_').'/'.Session::get('ID_'))}}" class="linkless fSize_1_h">
                            @endif
                                <abbr title="Will suggest you related articles"><i class="bgmix_2 fa-solid fa-newspaper"></i></abbr>
                            </a>

                        </div>

                        @if(Session::get('TagPrint')!='Extension')

                        <div class="p_1 ml_1 mr_1 clrWhite">
                            
                            <p class="titleL borClrWhite">Summary</p>

                            <p class="txtJustify">{{Session::get('Summary_')}}</p>

                        </div>

                        @endif

                    </div>
            
                </div>

            </div>

        </div>





        <!-- mobile -->


        <div class="bgmix forMobile gridGap_h">

            <p class="disGrid gridCol_2_size_3_7 TagFilters">
                <span class="lineHeight_2_5">
                    <span class="highlightBlack content--W">Tags</span>
                    <span class="highlightLink bgmix2 content--W">{{Session::get('TagPrint')}}</span>
                </span>
                <span class="lineHeight_2_5">
                    <!-- <span class="highlightBlack content--W">Nav</span>
                    <span class="highlightLink content--W"><a href="#">Go Back</a></span>
                    <span class="highlightLink content--W"><a href="#">Home</a></span> -->
                </span>
            </p>
        
            <div class="vScrlrElm gridCol_2_size_9_1 bgThasin boxContent shadow">
                <table class="tableChart">
                    @if(Session::get('Name_'))
                    <tr>
                        <th class="articleEndLinks">Name</th>
                        <td class="articleEndLinks">{{Session::get('Name_')}}</td>
                    </tr>
                    @endif
                    @if(Session::get('Type_'))
                    <tr>
                        <th class="articleEndLinks">Type</th>
                        <td class="articleEndLinks">{{Session::get('Type_')}}</td>
                    </tr>
                    @endif
                    @if(Session::get('Version_'))
                    <tr>
                        <th class="articleEndLinks">Version</th>
                        <td class="articleEndLinks">{{Session::get('Version_')}}</td>
                    </tr>
                    @endif
                    @if(Session::get('IDE_'))
                    <tr>
                        <th class="articleEndLinks">IDE</th>
                        <td class="articleEndLinks">{{Session::get('IDE_')}}</td>
                    </tr>
                    @endif
                    @if(Session::get('Use_'))
                    <tr>
                        <th class="articleEndLinks">Use</th>
                        <td class="articleEndLinks">{{Session::get('Use_')}}</td>
                    </tr>
                    @endif
                    @if(Session::get('Documentation_'))
                    <tr>
                        <th class="articleEndLinks">Documentation</th>
                        <td class="articleEndLinks">{{Session::get('Documentation_')}}</td>
                    </tr>
                            @endif
                    @if(Session::get('Extension_'))
                    <tr>
                        <th class="articleEndLinks">Extension</th>
                        <td class="articleEndLinks">{{Session::get('Extension_')}}</td>
                    </tr>
                    @endif
                </table>
                <div class="disFlex gridGap_h flexDirCol txtCenter p_1 sideBtns">
                    @if(Session::get('Git_'))
                    <a href="#" class="linkless fSize_1_h unavailable">
                    @else
                    <a href="{{Session::get('Git_')}}" target="blank" class="linkless fSize_1_h">
                    @endif
                        <abbr title="Will redirect you to the github repository"><i class="bgmix_2 fa-solid fa-code-branch"></i></abbr>
                    </a>

                    @if(Session::get('Liveview_'))
                    <a href="#" class="linkless fSize_1_h unavailable">
                    @else
                    <a href="{{Session::get('Liveview_')}}" target="blank" class="linkless fSize_1_h">
                    @endif
                        <abbr title="Will take you to the documentation or live example"><i class="bgmix_2 fa-solid fa-eye"></i></abbr>
                    </a>

                    @if(Session::get('Article_')==0)
                    <a href="#" class="linkless fSize_1_h unavailable">
                    @else
                    <a href="{{url('/show/related/articles/'.Session::get('Tag_').'/'.Session::get('ID_'))}}" class="linkless fSize_1_h">
                    @endif
                        <abbr title="Will suggest you related articles"><i class="bgmix_2 fa-solid fa-newspaper"></i></abbr>
                    </a>
                </div>
            </div>

            @if(Session::get('TagPrint')!='Extension')

            <div class="p_1 ml_1 mr_1 clrWhite">
                
                <p class="titleL borClrWhite">Summary</p>

                <p class="txtJustify">{{Session::get('Summary_')}}</p>

            </div>

            @endif

            <div class="w_90Per m_a disFlex flexDirRow gridGap_2 pt_50px justifyContentCenter">

                <!-- mobile video template start-->
                @foreach($data as $list)
                <div class="disGrid gridGap_h boxContent vScrlrElm bgThasin p_1 shadow" data-aos="fade-up">
                    <iframe src="{{$list->Embed}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <strong class="clrWhite">{{$list->Vid_Name}}</strong>
                </div>
                @endforeach
                <!-- mobile video template end-->

            </div>

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