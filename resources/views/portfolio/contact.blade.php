@extends('portfolioFrame')




@section('meta')

    <meta name="description" content="This is a contact page. Contact me if you need and web related services.">
    <meta name="keywords" content="thasin mahmud, thasin, contact, thasin mahmud contact, thasin mahmud portfolio">

@endsection




@section('title')

    <!-- Title -->
    <title>Thasin Mahmud - Contact</title>

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



        <!-- contact -->

        <div class="posAbs w_70vw left_0 top_0 bgmix p_1 contentMobile">



            <!-- nav -->


            <div class="nav bgmix2">
                
                <!-- Text Logo. -->
                <p class="txtLogo clrWhite">Contact</p>

                <span></span>

                
            </div>


            <!--Session message-->

            @if(session('msgHook')=='green' && session()->has('msg'))

            <p class="highlightSuccess w_100Per txtCenter"> {{session('msg')}} </p>

            @elseif(session('msgHook')=='yellow' && session()->has('msg'))

            <p class="highlightAlert w_100Per txtCenter"> {{session('msg')}} </p>

            @elseif(session('msgHook')=='red' && session()->has('msg'))

            <p class="highlightDanger w_100Per txtCenter"> {{session('msg')}} </p>

            @endif



                <!-- contact form -->

                <form action="{{url('/send/mail/')}}" method="post" class="vScrlr_800 snapInline bgmix content--H p_1 w_80Per m_a content" data-aos="fade">
                @csrf
                    <div class="vScrlrElm bgThasin frMs_R100px_1 gridGap_1 p_1">  
                
                        <p class="bgThasin">  
                            <i class="bgThasin clrWhite fSize_6 p_1 borRad_100Per fa-solid fa-at"></i>
                        </p> 

                        <span class="disGrid gridGap_1">

                            <div class="frmElm_5">
                            
                                <label  class="clrWhite" for="Email"> E-mail </label>
                                <input  class="valCheck fSize_1" type="email" name="Email">
                            
                            </div>
    
                            <div class="frmElm_5">
                            
                                <label class="clrWhite" for="Subject"> Subject </label>
                                <input class="fSize_1" type="text" name="Subject">
                            
                            </div>
    
                            <div class="frmElm_7">
                            
                                <label  class="clrWhite" for="Body"> Message </label>
                                <textarea class="olStyleUnset fSize_1" id="Body" cols="30" rows="10" name="Body"></textarea>
                            
                            </div>
                        
                        </span>

                    </div>

                    <div class="disGrid gridCol_2_size_8_2 gridGap_h">

                        <div class="vScrlrElm bgThasin frMs_R100px_1 gridGap_1 p_1">  
                    
                            <p class="bgThasin">  
                                <i class="bgThasin clrWhite fSize_6 p_1 borRad_100Per fa-solid fa-headset"></i>
                            </p> 

                            <abbr title="Click to call directly" class="disFlex flexDirCol justifyContentCenter">

                                <a class="linkless Pt_1" href="tel:{{Session::get('phn1')}}">{{Session::get('phn1')}}</a>
                                <a class="linkless pt_1" href="tel:{{Session::get('phn2')}}">{{Session::get('phn2')}}</a>

                            </abbr>

                        </div>

                        <span class="disFlex flexDirCol gridGap_h">

                            <input value="Send" class="p_0_h successBtn lato fSize_1" type="submit">
                            <input class="p_0_h dangerBtn lato fSize_1" type="reset">

                        </span>

                    </div>

                    <span class="bigGap"></span>
                    <span class="bigGap"></span>
                    <span class="bigGap"></span>

                </form>

        </div>





        <!-- mobile -->

        <!-- post template -->


        <div class="forMobile gridGap_h" data-aos="fade-up">
        
            <!-- contact form -->

            <form action="{{url('/send/mail/')}}" method="post" class="vScrlr_800 snapInline bgmix content--H p_1 w_90Per m_a content">
            @csrf
                <div class="vScrlrElm bgThasin p_1">  

                    <span class="disGrid gridGap_1">

                        <div class="frmElm_5">
                        
                            <label  class="clrWhite" for="Email"> E-mail </label>
                            <input  class="valCheck fSize_1" type="email" name="Email">
                        
                        </div>

                        <div class="frmElm_5">
                        
                            <label class="clrWhite" for="Subject"> Subject </label>
                            <input class="fSize_1" type="text" name="Subject">
                        
                        </div>

                        <div class="frmElm_7">
                        
                            <label  class="clrWhite" for="Body"> Message </label>
                            <textarea class="olStyleUnset fSize_1" id="Body" cols="30" rows="10" name="Body"></textarea>
                        
                        </div>
                    
                    </span>

                </div>

                <div class="disGrid gridCol_2_size_8_2 gridGap_h">

                    <div class="vScrlrElm bgThasin p_1">  

                        <div class="disFlex flexDirCol justifyContentCenter">

                            <a class="linkless Pt_1" href="tel:{{Session::get('phn1')}}">
                                <i class="clrWhite pr_0_h fa-solid fa-phone"></i>{{Session::get('phn1')}}
                            </a>
                            <a class="linkless pt_1" href="tel:{{Session::get('phn2')}}">
                                <i class="clrWhite pr_0_h fa-solid fa-phone"></i>{{Session::get('phn2')}}
                            </a>

                        </div>

                    </div>

                    <span class="disFlex flexDirCol gridGap_h">

                        <input value="Send" class="p_0_h successBtn lato fSize_1" type="submit">
                        <input class="p_0_h dangerBtn lato fSize_1" type="reset">

                    </span>

                </div>

                <span class="bigGap"></span>
                <span class="bigGap"></span>
                <span class="bigGap"></span>

            </form>

        </div>







@endsection