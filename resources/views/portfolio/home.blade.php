@extends('portfolioFrame')




@section('meta')

    <meta name="description" content="Your description.">
    <meta name="keywords" content="tag, tag, tag">

@endsection




@section('title')

    <!-- Title -->
    <title>Thasin Mahmud - Home</title>

@endsection





@section('body')

<body class="nunito bgThasin ofHiddenY scrlNone mobileFlow">

@endsection




@section('sidenav')

    <ul class="sideNav swipeToBottom">
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

    @foreach($data as $list)
    <!-- name section -->
    <span class="mobileNavSpace"></span>

    <code class="intro swipeToRight lato indexCode">
        <span class="blue">&lt;?php</span> <br>

        <span class="ml_3"><span class="blue">function</span> <span class="yellow">Introduction( ) {</span></span><br>

        <span class="ml_6"><span class="yellow">echo</span> <span span class="orange">" Hello World! "</span><span class="clrWhite">;</span></span><br>

        <span class="ml_6"><span class="yellow">echo</span> <span span class="orange">" I'm {{$list->Name}}. "</span><span class="clrWhite">;</span></span><br>

        <span class="ml_6"><span class="yellow">echo</span> <span span class="orange">" <span class="auto-type"></span> "</span><span class="clrWhite">;</span></span><br>

        <span class="ml_3 yellow">}</span><br>
        
        <span class="blue">?></span> <br>
    </code>




        <div class="socialMobileContainer posFix left_100 negBottom_500 swipeToTop">
            <p class="clrWhite socialHeader">Socials</p>
            <div class="disGrid gridCol_5_size_1 socialMobile">
        
                
                <div class="transparent social">
                    <a class="link disGrid gridCol_2_size_3_7 justifySelfCenter alignItemsCenter gridGap_h txtCenter github" href="{{$list->Github}}" target="blank">
                        <i class="fSize_2 txtCenter fa-brands fa-github"></i>
                        <span class="clrWhite socialName">Github</span>
                    </a>
                </div>

                <div class="transparent social">
                    <a class="link disGrid gridCol_2_size_3_7 justifySelfCenter alignItemsCenter gridGap_h txtCenter" href="{{$list->Linkedin}}" target="blank">
                        <i class="fSize_2 txtCenter fa-brands fa-linkedin-in"></i>
                        <span class="clrWhite socialName">Linkedin</span>
                    </a>
                </div>
                
                <div class="transparent social">
                    <a class="link disGrid gridCol_2_size_3_7 justifySelfCenter alignItemsCenter gridGap_h txtCenter youtube" href="{{$list->Youtube}}" target="blank">
                        <i class="fSize_2 txtCenter fa-brands fa-youtube"></i></i>
                        <span class="clrWhite socialName">Youtube</span>
                    </a>
                </div>

                <div class="transparent social">
                    <a class="link disGrid gridCol_2_size_3_7 justifySelfCenter alignItemsCenter gridGap_h txtCenter" href="{{$list->Facebook}}" target="blank">
                        <i class="fSize_2 txtCenter fa-brands fa-facebook-f"></i>
                        <span class="clrWhite socialName">Facebook</span>
                    </a>
                </div>

                <div class="transparent social">
                    <a class="link disGrid gridCol_2_size_3_7 justifySelfCenter alignItemsCenter gridGap_h txtCenter twitter" href="{{$list->Twitter}}" target="blank">
                        <i class="fSize_2 txtCenter fa-brands fa-twitter"></i>
                        <span class="clrWhite socialName">Twitter</span>
                    </a>
                </div>
        
            </div>
        </div>
    @endforeach


@endsection
