@extends('portfolioFrame')




@section('meta')

    <meta name="description" content="Here you will get a list of articles that I've written on various topic.">
    <meta name="keywords" content="thasin mahmud, thasin, article, thasin mahmud article, thasin mahmud portfolio">

@endsection




@section('title')

    <!-- Title -->
    <title>Thasin Mahmud - Article</title>

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




        <!-- Article -->

        <div class="posAbs w_70vw left_0 top_0 bgmix p_1 contentMobile">



            <!-- nav -->


            <div class="nav bgmix2">
                
                <!-- Text Logo. -->
                <p class="txtLogo clrWhite">Articles</p>

                <span></span>

                <!-- Search Form. -->
                <form class="searchBar pr_1" action="{{url('/search/articles/')}}" method="get">
                    <input class="searchField formSearch txtRight" type="text" name="searchKey">
                    <button class="searchBtn bgWhite formSearchBtn" type="input"><i class="clrThasin fas fa-search"></i></button>
                </form>
                
            </div>


            <!-- post template -->

            <div class="vScrlr_800 snapInline bgmix" data-aos="fade">

                @foreach($data as $list)
                @if($list->Art_Image!=null)
                <!-- pc article template with picture start-->
        
                <div class="vScrlrElm gridCol_2_size_3_7 bgThasin boxContent">
                    <img src="{{asset('Art_Image/'.$list->Art_Image)}}" alt="loading error..." width="100%">
                    <div>
                        <p class="clrWhite pl_1 pr_1 txtJustify">
                            <span class="titleL borNoneB">{{$list->Art_Title}}</span> <br>
                            <span>{{$list->Art_Summary}}</span> 
                        </p>
                        <div class="disInlineBlock txtLeft p_1">
                            <i class="clrWhite fSize_1 bgmix_2 fa-solid fa-eye articleEndLinks"></i>
                            <span class="clrWhite fSize_1 bgmix_2 articleEndLinks"> {{$list->Art_Views}} </span>
                            <i class="clrWhite fSize_1 bgmix_2 fa-solid fa-grip-lines-vertical articleEndLinks"></i> 
                            <span class="clrWhite fSize_1 bgmix_2 articleEndLinks"> Posted: {{$list->Art_Date}} </span>
                            
                            @if($list->Art_Reference!=null)
                            <i class="clrWhite fSize_1 bgmix_2 fa-solid fa-grip-lines-vertical articleEndLinks"></i> 
                            <i class="clrWhite fSize_1  bgmix_2 fa-solid fa-globe articleEndLinks"></i>
                            <a class="link fSize_1 bgmix_2 articleEndLinks" href="{{$list->Art_Reference}}">Reference</a>
                            @endif

                            @if($list->Art_More!=0)
                            <i class="clrWhite fSize_1 bgmix_2 fa-solid fa-grip-lines-vertical articleEndLinks"></i>
                            <a class="link fSize_1 bgmix_2 articleEndLinks" href="{{url('/open/article/'.$list->Art_ID)}}">Read more</a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- pc article template with picture end-->
                @else
                <!-- pc article template without picture start-->

                <div class="vScrlrElm bgThasin boxContent">
                    <p class="clrWhite pl_1 pr_1 txtJustify">
                        <span class="titleL borNoneB">{{$list->Art_Title}}</span> <br>
                        <span>{{$list->Art_Summary}}</span> 
                    </p>
                    <div class="disInlineBlock txtLeft p_1">
                        <i class="clrWhite fSize_1 bgmix_2 fa-solid fa-eye articleEndLinks"></i>
                        <span class="clrWhite fSize_1 bgmix_2 articleEndLinks"> {{$list->Art_Views}} </span>
                        <i class="clrWhite fSize_1 bgmix_2 fa-solid fa-grip-lines-vertical articleEndLinks"></i> 
                        <span class="clrWhite fSize_1 bgmix_2 articleEndLinks"> Posted: {{$list->Art_Date}} </span>

                        @if($list->Art_Reference!=null)
                        <i class="clrWhite fSize_1 bgmix_2 fa-solid fa-grip-lines-vertical articleEndLinks"></i> 
                        <i class="clrWhite fSize_1  bgmix_2 fa-solid fa-globe articleEndLinks"></i>
                        <a target="blank" class="link fSize_1 bgmix_2 articleEndLinks" href="{{$list->Art_Reference}}">Reference</a>
                        @endif

                        @if($list->Art_More!=0)
                        <i class="clrWhite fSize_1 bgmix_2 fa-solid fa-grip-lines-vertical articleEndLinks"></i>
                        <a class="link fSize_1 bgmix_2 articleEndLinks" href="{{url('/open/article/'.$list->Art_ID)}}">Read more</a>
                        @endif
                    </div>
                </div>

                <!-- pc article template without picture end-->
                @endif
                @endforeach

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

        <!-- mobile article template with picture start-->


        <div class="bgmix forMobile gridGap_h pt_40px">

            @foreach($data as $list)
            @if($list->Art_Image!='0')
        
            <div class="vScrlrElm gridCol_2_size_3_7 bgThasin boxContent" data-aos="fade-up">
                <img src="{{asset('Art_Image/'.$list->Art_Image)}}" alt="loading error..." width="100%">
                <div>
                    <p class="clrWhite pl_1 pr_1 txtJustify">
                        <span class="titleL borNoneB">{{$list->Art_Title}}</span> <br>
                        <span>{{$list->Art_Summary}}</span> 
                    </p>
                    <div class="disInlineBlock txtLeft p_1">
                        <i class="clrWhite fSize_1 bgmix_2 fa-solid fa-eye articleEndLinks"></i>
                        <span class="clrWhite fSize_1 bgmix_2 articleEndLinks"> {{$list->Art_Views}} </span>
                        <i class="clrWhite fSize_1 bgmix_2 fa-solid fa-grip-lines-vertical articleEndLinks"></i> 
                        <span class="clrWhite fSize_1 bgmix_2 articleEndLinks"> Posted: {{$list->Art_Date}} </span>
                        
                        @if($list->Art_Reference!=null)
                        <i class="clrWhite fSize_1 bgmix_2 fa-solid fa-grip-lines-vertical articleEndLinks"></i> 
                        <i class="clrWhite fSize_1  bgmix_2 fa-solid fa-globe articleEndLinks"></i>
                        <a class="link fSize_1 bgmix_2 articleEndLinks" href="{{$list->Art_Reference}}">Reference</a>
                        @endif

                        @if($list->Art_More!=0)
                        <i class="clrWhite fSize_1 bgmix_2 fa-solid fa-grip-lines-vertical articleEndLinks"></i>
                        <a class="link fSize_1 bgmix_2 articleEndLinks" href="{{url('/open/article/'.$list->Art_ID)}}">Read more</a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- mobile article template with picture end-->
            @else
            <!-- mobile article template without picture start-->

            <div class="vScrlrElm bgThasin boxContent" data-aos="fade-up">
                <p class="clrWhite pl_1 pr_1 txtJustify">
                    <span class="titleL borNoneB">{{$list->Art_Title}}</span> <br>
                    <span>{{$list->Art_Summary}}</span> 
                </p>
                <div class="disInlineBlock txtLeft p_1">
                    <i class="clrWhite fSize_1 bgmix_2 fa-solid fa-eye articleEndLinks"></i>
                    <span class="clrWhite fSize_1 bgmix_2 articleEndLinks"> {{$list->Art_Views}} </span>
                    <i class="clrWhite fSize_1 bgmix_2 fa-solid fa-grip-lines-vertical articleEndLinks"></i> 
                    <span class="clrWhite fSize_1 bgmix_2 articleEndLinks"> Posted: {{$list->Art_Date}} </span>
                    
                    @if($list->Art_Reference!=null)
                    <i class="clrWhite fSize_1 bgmix_2 fa-solid fa-grip-lines-vertical articleEndLinks"></i> 
                    <i class="clrWhite fSize_1  bgmix_2 fa-solid fa-globe articleEndLinks"></i>
                    <a target="blank" class="link fSize_1 bgmix_2 articleEndLinks" href="{{$list->Art_Reference}}">Reference</a>
                    @endif

                    @if($list->Art_More!=0)
                    <i class="clrWhite fSize_1 bgmix_2 fa-solid fa-grip-lines-vertical articleEndLinks"></i>
                    <a class="link fSize_1 bgmix_2 articleEndLinks" href="{{url('/open/article/'.$list->Art_ID)}}">Read more</a>
                    @endif
                </div>
            </div>

            <!-- mobile article template without picture end-->
            @endif
            @endforeach

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