@extends('portfolioFrame')




@section('meta')

    @foreach($section as $list)
    <meta name="description" content="{{$list->Main_Title}}">
    @endforeach
    <meta name="keywords" content="thasin mahmud, thasin, articles, thasin mahmud articles, thasin mahmud portfolio">

@endsection




@section('title')

    <!-- Title -->
    @foreach($section as $list)
    <title>{{$list->Main_Title}}</title>
    @endforeach

@endsection




@section('body')

<body class="nunito bgThasin scrlNone mobileFlow">

@endsection



@section('sidenav')

@endsection




@section('container')




        <!-- Article full -->

        <div class="galleryGrid">

            <div>

                <div class="disGrid gridCol_2_size_9_1 ml_5px p_0_q bgmix2">

                    <!-- Article Title -->
                    <h1 class="txtLogo clrWhite txtCenter">Full Article</h1>

                    <!-- theme switch -->
                        <a onclick="themeChange()" class="txtLogo" href="#">
                            <abbr class="txtRight pr_1" title="Dark/Light mode">
                                <i class="fa-solid fa-circle-half-stroke clrWhite fSize_1_h"></i>
                            </abbr>
                        </a>

                </div>

                <div data-aos="fade">

                    <!-- pc article template start -->

                    <div class="w_90Per m_a disGrid gridGap_1 pt_50px justifyContentCenter articleDarkMode themeMode">

                        @foreach($section as $list)
                        @if($list->Section=='mainTitle')

                        <!-- title section -->
                        <strong class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1_h m_0">{{$list->Main_Title}}</strong>


                        @elseif($list->Section=='subTitle')

                        <!-- sub title section -->
                        <strong class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1_q m_0">{{$list->Sub_Title}}</strong>


                        @elseif($list->Section=='para')

                        <!-- text section -->
                        <p class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1 m_0">{{$list->Para}}</p>


                        @elseif($list->Section=='imgPara')

                        <!-- image + text section -->
                        <div class="disGrid gridGap_1 gridCol_2_size_4_6">
                            <img class="vScrlrElm p_0 m_0" src="{{asset('Article_Builder/'.$list->ImgPara_Img)}}" width="100%" alt="loading failed!">
                            <p class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1 m_0">{{$list->ImgPara_Para}}</p>
                        </div>


                        @elseif($list->Section=='paraImg')

                        <!-- text section + image -->
                        <div class="disGrid gridGap_1 gridCol_2_size_6_4">
                            <p class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1 m_0">{{$list->ParaImg_Para}}</p>
                            <img class="vScrlrElm p_0 m_0" src="{{asset('Article_Builder/'.$list->ParaImg_Img)}}" width="100%" alt="loading failed!">
                        </div>


                        @elseif($list->Section=='code')

<!-- code section -->
<pre data-start="1" style="white-space:pre-wrap;" class="language-{{$list->Language}} line-numbers">
<code>
{{$list->Code}}
</code>
</pre>


                        @elseif($list->Section=='link')

                        <!-- link -->
                        <a target="blank" class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1 m_0 disFlex flexDirRow alignItemsCenter linkless" href="{{$list->Link_URL}}"><i class="fa-solid fa-link fSize_1_q"></i>{{$list->Link_Name}}</a>

                        @endif
                        @endforeach

                    </div>

                    <!-- pc article template end -->

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

            <div class="posFix top_0 right_0">

                <div class="vScrlr_650 snapInline w_500 transparent">
            
                    <div class="vScrlrElm p_1 ml_1 mr_1 disBlock bgThasin clrWhite">

                        <h2>Mini Navigation:</h2>
                        <div class="disGrid gridCol_7_size_1 justifyItemsCenter w_70Per m_a">

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
                            
                        </div>
                        
                        <h2>You may also like:</h2>

                        @foreach($data as $list)
                        <a href="{{url('/open/article/'.$list->Art_ID)}}" class="linkless fSize_1">
                            <abbr title="Will redirect you to the article">
                                <p class="txtJustify"><i class="bgmix_2 fa-solid fa-newspaper"></i> {{$list->Art_Title}} </p>
                            </abbr>
                        </a>
                        @endforeach

                    </div>
            
                </div>

            </div>

        </div>





        <!-- mobile -->


        <div class="bgmix forMobile gridGap_h">

            <div class="w_90Per m_a disGrid gridGap_1 justifyContentCenter articleDarkMode themeMode" data-aos="fade-up">


                @foreach($section as $list)
                @if($list->Section=='mainTitle')

                <!-- title section -->
                <strong class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1_h m_0"> {{$list->Main_Title}} </strong>


                @elseif($list->Section=='subTitle')

                <!-- sub title section -->
                <strong class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1_q m_0"> {{$list->Sub_Title}} </strong>


                @elseif($list->Section=='para')

                <!-- text section -->
                <p class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1 m_0">{{$list->Para}}</p>


                @elseif($list->Section=='imgPara')

                <!-- image + text section -->
                <div class="disGrid gridGap_1 gridCol_2_size_4_6">
                    <img class="disGrid justifySelfCenter vScrlrElm p_0 m_0" src="{{asset('Article_Builder/'.$list->ImgPara_Img)}}" width="100%" alt="loading failed!">
                    <p class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1 m_0">{{$list->ImgPara_Para}}</p>
                </div>


                @elseif($list->Section=='paraImg')

                <!-- text section + image -->
                <div class="disGrid gridGap_1 gridCol_2_size_6_4">
                    <p class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1 m_0">{{$list->ParaImg_Para}}</p>
                    <img class="disGrid justifySelfCenter vScrlrElm p_0 m_0" src="{{asset('Article_Builder/'.$list->ParaImg_Img)}}" width="100%" alt="loading failed!">
                </div>


                @elseif($list->Section=='code')

<!-- code section -->
<pre data-start="1" style="white-space:pre-wrap;" class="language-{{$list->Language}} line-numbers">
    <code>
    {{$list->Code}}
    </code>
</pre>


                @elseif($list->Section=='link')

                <!-- link -->
                <a target="blank" class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1 m_0 disFlex flexDirRow alignItemsCenter linkless" href="{{$list->Link_URL}}"><i class="fa-solid fa-link fSize_1_q"></i>{{$list->Link_Name}}</a>

                @endif
                @endforeach

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