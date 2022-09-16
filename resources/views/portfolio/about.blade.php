@extends('portfolioFrame')




@section('meta')

    <meta name="description" content="Here are all my details.">
    <meta name="keywords" content="Thasin Mahmud, Thasin, thasin, about, thasin mahmud portfolio, thasin about, thasin mahmud extensions">

@endsection




@section('title')

    <!-- Title -->
    <title>Thasin Mahmud - About</title>

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
                <p class="txtLogo clrWhite">About</p>

                <span></span>

                
            </div>


                <!-- about -->

                <div class="vScrlr_800 snapInline bgmix p_1 w_80Per m_a" data-aos="fade">

                        @foreach($data as $list)
                        <div class="frMs_R100px_1"> 
                    
                            <span> 
                                <img class="borRad_100Per" width="100%" src="{{asset('DP/'.$list->DP)}}" alt="Error">
                            </span> 
                    
                            <span class="disGrid gridCol_3_size_2_1_7 clrWhite vScrlrElm bgThasin p_1"> 
                                <span>Name</span><span class="txtLeft">:</span><span class="txtLeft">{{$list->Name}}</span>
                                <span>Interested In</span><span class="txtLeft">:</span><span class="txtLeft">{{$list->Interested_In}}</span>
                                <span>Organization</span><span class="txtLeft">:</span><span class="txtLeft">{{$list->Organization}}</span>
                                <span>Out Sourcing</span><span class="txtLeft">:</span><span class="txtLeft">I'm on <a target="blank" class="clrmix2 latoBold" href="{{$list->Fiver_Link}}">fiverr</a>.</span>
                            </span> 
                    
                        </div>

                        <div class="vScrlrElm bgThasin">

                            <span class="clrWhite pl_1 pt_0_h">Objective:</span>

                            <div class="disGrid gridCol_2_size_9_1 gridGap_1">
                        
                                <span class="clrWhite p_1">{{$list->Objective}}</span>

                                <abbr title="Download CV/Resume" class="txtCenter">
                                    <a href="{{asset('CV/'.$list->CV)}}" target="blank" class="linkless" download="Thasin Mahmud CV">
                                        <i class="fa-solid fa-file fSize_3 cv"></i>
                                    </a>
                                </abbr>

                            </div>
                        
                        </div>
                        @endforeach
                        
                        <div class="vScrlrElm bgThasin">

                            <span class="clrWhite pl_1 pt_0_h">Education:</span>

                                <table class="tableChart content--H">
                                    <tr>
                                        <th width="20%">Degree</th>
                                        <th width="60%">Subject</th>
                                        <th width="20%">CGPA</th>
                                    </tr>
                                    @foreach($edu as $list)
                                    @if($list->Type=='edu')
                                    <tr class="txtCenter">
                                        <td>{{$list->Degree}}</td>
                                        <td>{{$list->Subject}}</td>
                                        <td>{{$list->CGPA}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </table>
                        
                        </div>

                        <div class="vScrlrElm bgThasin">

                            <span class="clrWhite pl_1 pt_0_h">Skills:</span>
                        
                                <table class="tableChart content--H">
                                    @foreach($edu as $list)
                                    @if($list->Type=='skill')
                                    <tr>
                                        <th>{{$list->Skill_Genre}}</th>
                                        <td>{{$list->Skill}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </table>
                        
                        </div>
                        
                        <div class="vScrlrElm bgThasin">

                            <span class="clrWhite pl_1 pt_0_h">Extra Skills:</span>

                                <table class="tableChart content--H">
                                    <tr>
                                        <th width="40%">Extra Skill</th>
                                        <th width="60%">Efficiency</th>
                                    </tr>
                                    @foreach($edu as $list)
                                    @if($list->Type=='extra')
                                    <tr class="txtCenter">
                                        <td>{{$list->Extra_Skill}}</td>
                                        <td>{{$list->Efficiency}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </table>

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
                    <span class="bigGap"></span>
                    <span class="bigGap"></span>
                    <span class="bigGap"></span>

                </div>

        </div>





        <!-- mobile -->

        <!-- post template -->


        <div class="forMobile gridGap_h">
        
            <!-- about -->
            @foreach($data as $list)
            <div class="disGrid gridCol_1_size_1" data-aos="fade-up"> 
                    
                <span class="disGrid justifyContentCenter"> 
                    <img class="borRad_100Per" width="100%" src="{{asset('DP/'.$list->DP)}}" alt="Error">
                </span> 
        
                <span class="mobileList clrWhite vScrlrElm bgThasin p_1"> 
                    <span>Name</span><span class="txtLeft">:</span><span class="txtLeft">{{$list->Name}}</span>
                    <span>Interested In</span><span class="txtLeft">:</span><span class="txtLeft">{{$list->Interested_In}}</span>
                    <span>Organization</span><span class="txtLeft">:</span><span class="txtLeft">{{$list->Organization}}</span>
                    <span>Out Sourcing</span><span class="txtLeft">:</span><span class="txtLeft">I'm on <a target="blank" class="clrmix2 latoBold" href="{{$list->Fiver_Link}}">fiverr</a>.</span>
                </span> 
        
            </div>

            <div class="vScrlrElm bgThasin" data-aos="fade-up">

                <span class="clrWhite pl_1 pt_0_h">Objective:</span>

                <div class="disGrid gridCol_2_size_9_1 gridGap_1">
                        
                    <span class="clrWhite p_1">{{$list->Objective}}</span>
                    <abbr title="Download CV/Resume" class="txtCenter">
                        <a href="{{asset('CV/'.$list->CV)}}" target="blank" class="linkless" download="Thasin Mahmud CV">
                            <i class="fa-solid fa-file fSize_3 cv"></i>
                        </a>
                    </abbr>
    
                </div>
            
            </div>
            @endforeach
            
            <div class="vScrlrElm bgThasin" data-aos="fade-up">

                <span class="clrWhite pl_1 pt_0_h">Education:</span>
            
                    <table class="tableChart content--H">
                        <tr>
                            <th width="20%">Degree</th>
                            <th width="60%">Subject</th>
                            <th width="20%">CGPA</th>
                        </tr>
                        @foreach($edu as $list)
                        @if($list->Type=='edu')
                        <tr class="txtCenter">
                            <td>{{$list->Degree}}</td>
                            <td>{{$list->Subject}}</td>
                            <td>{{$list->CGPA}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
            
            </div>

            <div class="vScrlrElm bgThasin" data-aos="fade-up">

                <span class="clrWhite pl_1 pt_0_h">Skills:</span>
            
                    <table class="tableChart content--H">
                        @foreach($edu as $list)
                        @if($list->Type=='skill')
                        <tr>
                            <th>{{$list->Skill_Genre}}</th>
                            <td>{{$list->Skill}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
            
            </div>
            
            <div class="vScrlrElm bgThasin" data-aos="fade-up">

                <span class="clrWhite pl_1 pt_0_h">Extra Skills:</span>
            
                    <table class="tableChart content--H">
                        <tr>
                            <th width="40%">Extra Skill</th>
                            <th width="60%">Efficiency</th>
                        </tr>
                        @foreach($edu as $list)
                        @if($list->Type=='extra')
                        <tr class="txtCenter">
                            <td>{{$list->Extra_Skill}}</td>
                            <td>{{$list->Efficiency}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
            
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
            <span class="bigGap"></span>
            <span class="bigGap"></span>
            <span class="bigGap"></span>

        </div>





@endsection