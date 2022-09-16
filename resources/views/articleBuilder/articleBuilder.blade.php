<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is a article builder for Thasin's portfolio.">
    <meta name="keywords" content="Article builder, Thasin, Mahmud">
    <meta name="author" content="Thasin Mahmud">
    <!-- Title -->
    <title>Thasin Mahmud - Article Builder</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="#">
    <link rel="icon" type="image/png" sizes="32x32" href="#">
    <link rel="icon" type="image/png" sizes="16x16" href="#">
    <link rel="manifest" href="#">
    <!-- CDN Development -->
    <link rel="stylesheet" href="https://raw.githack.com/Thasinmahmudbd/TcSS-Framework/Thasin/dist/css/tcss.min.css">
    <!-- CDN Backup -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Thasinmahmudbd/TcSS-Framework/dist/css/tcss.min.css">
    <!-- CDN Production (current version)-->
    <link rel="stylesheet" href="https://rawcdn.githack.com/Thasinmahmudbd/TcSS-Framework/8272c261b90f1bd691ade6402fa9f73ada36fa12/dist/css/tcss.min.css">
    
    <!-- style -->
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/articleModeShift.css')}}">
    <link rel="stylesheet" href="{{asset('css/global.css')}}">

    <!-- Script -->
    <script defer src="{{asset('js/theme.js')}}"></script>
    <script defer src="{{asset('js/pannelPopUp.js')}}"></script>

    <!-- prism -->
    <link rel="stylesheet" href="{{asset('prism/prism.css')}}">
    <script defer src="{{asset('prism/prism.js')}}"></script>
</head>

<body class="lato">

    
















    <div>

        <div class="disGrid gridCol_2_size_8_2 ml_5px p_0_q bgmix2">

            <!-- Article Title -->
            <h1 class="txtLogo clrWhite txtLeft">Article Title</h1>

            <div class="disGrid gridCol_3_size_1">

                <!-- choose article -->
                <a onclick="openList()" class="txtLogo" href="#">
                    <span class="clrWhite fSize_1 txtRight"> Articles</span>
                </a>

                <!-- log out -->
                <a class="txtLogo" href="{{url('/logout')}}">
                    <span class="clrWhite fSize_1 txtRight"> Log Out</span>
                </a>

                <!-- theme switch -->
                <a onclick="themeChange()" class="txtLogo" href="#">
                    <i class="fa-solid fa-circle-half-stroke clrWhite fSize_1_h txtCenter"></i>
                </a>

            </div>

        </div>











        <!--Session message-->

        @if(session('msgHook')=='green' && session()->has('msg'))

        <p class="highlightSuccess w_100Per txtCenter"> {{session('msg')}} </p>

        @elseif(session('msgHook')=='yellow' && session()->has('msg'))

        <p class="highlightAlert w_100Per txtCenter"> {{session('msg')}} </p>

        @elseif(session('msgHook')=='red' && session()->has('msg'))

        <p class="highlightDanger w_100Per txtCenter"> {{session('msg')}} </p>

        @endif








        @if(session('Art_ID')!=null)

        <div data-aos="fade">

            <!-- pc article template start -->

            <div class="w_90Per m_a disGrid gridGap_1 pt_50px justifyContentCenter articleDarkMode themeMode">






                @foreach($section as $list)
                @if($list->Section=='mainTitle')

                <!-- title section -->
                <strong class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1_h m_0">{{$list->Main_Title}}</strong>
                <form action="{{url('/article/portion/edit/'.$list->Unique_ID)}}" method="post" class="w_100Per">
                @csrf
                        <div class="frmElm_6 disGrid gridCol_4_size_7_1_1_1 gridGap_h">
                    
                            <input  class="fSize_1 lato" type="text" name="Main_Title" value="{{$list->Main_Title}}">
                            <input  class="fSize_1 lato" type="number" name="Sorting" value="{{$list->Sorting}}" placeholder="Sort">
                            <input class="pendingBtnR w_100Per fSize_1 lato" value="Edit" type="submit">
                            <a class="dangerBtnR txtCenter" href="{{url('/article/portion/delete/'.$list->Unique_ID)}}">Delete</a>
                    
                        </div>
                </form>
                <hr class="clrDanger w_100Per">









                @elseif($list->Section=='subTitle')

                <!-- sub title section -->
                <strong class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1_q m_0">{{$list->Sub_Title}}</strong>
                <form action="{{url('/article/portion/edit/'.$list->Unique_ID)}}" method="post" class="w_100Per">
                @csrf

                    <div class="frmElm_6 disGrid gridCol_4_size_7_1_1_1 gridGap_h">
                
                        <input  class="fSize_1 lato" type="text" name="Sub_Title" value="{{$list->Sub_Title}}">
                        <input  class="fSize_1 lato" type="number" name="Sorting" value="{{$list->Sorting}}" placeholder="Sort">
                        <input class="pendingBtnR w_100Per fSize_1 lato" value="Edit" type="submit">
                        <a class="dangerBtnR txtCenter" href="{{url('/article/portion/delete/'.$list->Unique_ID)}}">Delete</a>

                    </div>
                </form>
                <hr class="clrDanger w_100Per">









                @elseif($list->Section=='para')

                <!-- text section -->
                <p class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1 m_0">{{$list->Para}}</p>
                <form action="{{url('/article/portion/edit/'.$list->Unique_ID)}}" method="post" class="w_100Per">
                @csrf

                    <div class="frmElm_6 disGrid gridCol_1_size_1 gridGap_h">
                
                        <textarea name="Para" id="" cols="30" rows="10" class="borSize_2 borClrThasin borRad_5 fSize_1 lato">
                            {{$list->Para}}
                        </textarea>
                        <div class="frmElm_6 disGrid gridCol_4_size_7_1_1_1 gridGap_h">
                            <span></span>
                            <input class="fSize_1 lato" type="number" name="Sorting" value="{{$list->Sorting}}" placeholder="Sort">
                            <input class="pendingBtnR w_100Per fSize_1 lato" value="Edit" type="submit">
                            <a class="dangerBtnR txtCenter" href="{{url('/article/portion/delete/'.$list->Unique_ID)}}">Delete</a>
                        </div>
                    </div>
                </form>
                <hr class="clrDanger w_100Per">










                @elseif($list->Section=='imgPara')

                <!-- image + text section -->
                <div class="disGrid gridGap_1 gridCol_2_size_4_6">
                    <img class="vScrlrElm p_0 m_0" src="{{asset('Article_Builder/'.$list->ImgPara_Img)}}" width="100%" alt="loading failed!">
                    <p class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1 m_0">{{$list->ImgPara_Para}}</p>
                </div>
                <form action="{{url('/article/portion/edit/'.$list->Unique_ID)}}" method="post" enctype="multipart/form-data" class="w_100Per">
                @csrf

                    <div class="frmElm_6 disGrid gridCol_1_size_1 gridGap_h">

                        <div class="frmElm_6 disGrid gridCol_2_size_9_1 gridGap_h">
                            <textarea name="ImgPara_Para" id="" cols="30" rows="10" class="borSize_2 borClrThasin borRad_5 fSize_1 lato">
                                {{$list->ImgPara_Para}}
                            </textarea>
                            <div class="file_1">
                                <label for="" class="fBtn">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </label>
                                <input class="fName" type="file" name="ImgPara_Img" id="ImgPara_Img">
                            </div>
                        </div>
                        <div class="frmElm_6 disGrid gridCol_4_size_7_1_1_1 gridGap_h">
                            <span></span>
                            <input class="fSize_1 lato" type="number" name="Sorting" value="{{$list->Sorting}}" placeholder="Sort">
                            <input class="pendingBtnR w_100Per fSize_1 lato" value="Edit" type="submit">
                            <a class="dangerBtnR txtCenter" href="{{url('/article/portion/delete/'.$list->Unique_ID)}}">Delete</a>
                        </div>
                
                    </div>
                </form>
                <hr class="clrDanger w_100Per">















                @elseif($list->Section=='paraImg')

                <!-- text section + image -->
                <div class="disGrid gridGap_1 gridCol_2_size_6_4">
                    <p class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1 m_0">{{$list->ParaImg_Para}}</p>
                    <img class="vScrlrElm p_0 m_0" src="{{asset('Article_Builder/'.$list->ParaImg_Img)}}" width="100%" alt="loading failed!">
                </div>
                <form action="{{url('/article/portion/edit/'.$list->Unique_ID)}}" method="post" enctype="multipart/form-data" class="w_100Per">
                @csrf

                    <div class="frmElm_6 disGrid gridCol_1_size_1 gridGap_h">
                
                        <div class="frmElm_6 disGrid gridCol_2_size_9_1 gridGap_h">
                            <textarea name="ParaImg_Para" id="" cols="30" rows="10" class="borSize_2 borClrThasin borRad_5 fSize_1 lato">
                                {{$list->ParaImg_Para}}
                            </textarea>
                            <div class="file_1">
                                <label for="" class="fBtn">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </label>
                                <input class="fName" type="file" name="ParaImg_Img" id="ParaImg_Img">
                            </div>
                        </div>
                        <div class="frmElm_6 disGrid gridCol_4_size_7_1_1_1 gridGap_h">
                            <span></span>
                            <input class="fSize_1 lato" type="number" name="Sorting" value="{{$list->Sorting}}" placeholder="Sort">
                            <input class="pendingBtnR w_100Per fSize_1 lato" value="Edit" type="submit">
                            <a class="dangerBtnR txtCenter" href="{{url('/article/portion/delete/'.$list->Unique_ID)}}">Delete</a>
                        </div>
                
                    </div>
                </form>
                <hr class="clrDanger w_100Per">













                @elseif($list->Section=='code')

<!-- code section -->
<pre data-start="1" style="white-space:pre-wrap;" class="{{$list->Language}} line-numbers">
<code>
{{$list->Code}}
</code>
</pre>
                <form action="{{url('/article/portion/edit/'.$list->Unique_ID)}}" method="post" class="w_100Per">
                @csrf

                    <div class="frmElm_6 disGrid gridCol_1_size_1 gridGap_h">
                
                        <label  class="txtCenter bgThasin clrWhite p_7px" for=""> Code </label>
                        <textarea name="Code" id="" cols="30" rows="10" class="borSize_2 borClrThasin borRad_5 fSize_1 lato">
                            {{$list->Code}}
                        </textarea>

                        <div class="frmElm_6 disGrid gridCol_4_size_7_1_1_1 gridGap_h">
                            <input  type="text" name="Language" value="{{$list->Language}}">
                            <input class="fSize_1 lato" type="number" name="Sorting" value="{{$list->Sorting}}" placeholder="Sort">
                            <input class="pendingBtnR w_100Per fSize_1 lato" value="Edit" type="submit">
                            <a class="dangerBtnR txtCenter" href="{{url('/article/portion/delete/'.$list->Unique_ID)}}">Delete</a>
                        </div>
                
                    </div>
                </form>
                <hr class="clrDanger w_100Per">











                @elseif($list->Section=='link')

                <!-- link -->
                <a target="blank" class="vScrlrElm bgThasin p_1 lineHeight_1_5 txtJustify fSize_1 m_0 disFlex flexDirRow alignItemsCenter linkless" href="{{$list->Link_URL}}"><i class="fa-solid fa-link fSize_1_q"></i>{{$list->Link_Name}}</a>
                <form action="{{url('/article/portion/edit/'.$list->Unique_ID)}}" method="post" class="w_100Per">
                @csrf

                    <div class="frmElm_6 disGrid gridCol_5_size_2_5_1_1_1 gridGap_h">
                
                        <input  type="text" name="Link_Name" value="{{$list->Link_Name}}">
                        <input  type="url" name="Link_URL" value="{{$list->Link_URL}}">
                        <input class="fSize_1 lato" type="number" name="Sorting" value="{{$list->Sorting}}" placeholder="Sort">
                        <input class="pendingBtnR w_100Per fSize_1 lato" value="Edit" type="submit">
                        <a class="dangerBtnR txtCenter" href="{{url('/article/portion/delete/'.$list->Unique_ID)}}">Delete</a>
                
                    </div>
                </form>
                <hr class="clrDanger w_100Per">



                @endif
                @endforeach








            </div>

            <!-- pc article template end -->

        </div>
        @endif

    </div>

















    <div class="posFix bottom_0 w_100Per disGrid gridCol_7_size_1 gridGap_1 clrWhite alignItemsCenter justifyContentCenter bgWhite p_1 borOnlyT borSize_5 borClrThasin">
        <a href="#" class="p_2 txtCenter fSize_5 bgThasin disGrid" onclick="bringTitle()">
            <i class="fa-solid fa-t"></i>
        </a>
        <a href="#" class="p_2 txtCenter fSize_3 bgThasin disGrid" onclick="bringSubTitle()">
            <i class="fa-solid fa-t"></i>
        </a>
        <a href="#" class="p_2 txtCenter fSize_5 bgThasin disGrid" onclick="bringParagraph()">
            <i class="fa-solid fa-align-justify"></i>
        </a>
        <a href="#" class="p_2 txtCenter fSize_5 bgThasin disGrid gridGap_1 gridCol_2_size_1" onclick="bringParaImg()">
            <i class="fa-solid fa-image"></i>
            <i class="fa-solid fa-align-justify"></i>
        </a>
        <a href="#" class="p_2 txtCenter fSize_5 bgThasin disGrid gridGap_1 gridCol_2_size_1" onclick="bringImgPara()">
            <i class="fa-solid fa-align-justify"></i>
            <i class="fa-solid fa-image"></i>
        </a>
        <a href="#" class="p_2 txtCenter fSize_5 bgThasin disGrid" onclick="bringCode()">
            <i class="fa-solid fa-code"></i>
        </a>
        <a href="#" class="p_2 txtCenter fSize_5 bgThasin disGrid" onclick="bringLink()">
            <i class="fa-solid fa-link"></i>
        </a>
    </div>







    @if(Session::get('Art_ID')!=null)


    <form action="{{url('/add/section')}}" method="post" class="w_90Per posFix negBottom_500 m_1 p_1 w_90Per m_a bgThasin zIndex_10" id="bringTitle">
    @csrf
            <div class="frmElm_6 disGrid gridCol_3_size_1_8_1 gridGap_h">
        
                <label  class="txtCenter bgThasin clrWhite p_7px" for=""> Title </label>
                <input  type="text" name="Main_Title">
                <input  type="hidden" name="Section" value="mainTitle">
                <input  type="hidden" name="Art_ID" value="{{Session::get('Art_ID')}}">

                <div>
                    <input class="frmBtnR w_100Per" value="Upload" type="submit">
                </div>
        
            </div>
    </form>






    <form action="{{url('/add/section')}}" method="post" class="w_90Per posFix negBottom_500 m_1 p_1 w_90Per m_a bgThasin zIndex_10 posFix negBottom_500 m_1 p_1 w_90Per m_a bgThasin zIndex_10" id="bringSubTitle">
    @csrf

        <div class="frmElm_6 disGrid gridCol_3_size_1_8_1 gridGap_h">
    
            <label  class="txtCenter bgThasin clrWhite p_7px" for=""> Sub Title </label>
            <input  type="text" name="Sub_Title">
            <input  type="hidden" name="Section" value="subTitle">
            <input  type="hidden" name="Art_ID" value="{{Session::get('Art_ID')}}">

            <div>
                <input class="frmBtnR w_100Per" value="Upload" type="submit">
            </div>
    
        </div>
    </form>








    <form action="{{url('/add/section')}}" method="post" class="w_90Per posFix negBottom_500 m_1 p_1 w_90Per m_a bgThasin zIndex_10" id="bringParagraph">
    @csrf

        <div class="frmElm_6 disGrid gridCol_3_size_1_8_1 gridGap_h">
    
            <label  class="txtCenter bgThasin clrWhite p_7px" for=""> Paragraph </label>
            <textarea name="Para" id="" cols="30" rows="10" class="borSize_2 borClrThasin borRad_5 fSize_1 lato">

            </textarea>
            <input  type="hidden" name="Section" value="para">
            <input  type="hidden" name="Art_ID" value="{{Session::get('Art_ID')}}">

            <div>
                <input class="frmBtnR w_100Per" value="Upload" type="submit">
            </div>
    
        </div>
    </form>






    <form action="{{url('/add/section')}}" method="post" enctype="multipart/form-data" class="w_90Per posFix negBottom_500 m_1 p_1 w_90Per m_a bgThasin zIndex_10" id="bringParaImg">
    @csrf

        <div class="frmElm_6 disGrid gridCol_1_size_1 gridGap_h">
    
            <label  class="txtCenter bgThasin clrWhite p_7px" for=""> Paragraph </label>
            <textarea name="ImgPara_Para" id="" cols="30" rows="10" class="borSize_2 borClrThasin borRad_5 fSize_1 lato">

            </textarea>
            <input  type="hidden" name="Section" value="imgPara">
            <input  type="hidden" name="Art_ID" value="{{Session::get('Art_ID')}}">

            <div class="file_2">
            
                <label for="" class="fBtn">
                    <i class="fas fa-cloud-upload-alt"></i>
                </label>
            
                <input class="fName" type="file" name="ImgPara_Img" id="ImgPara_Img">
            
            </div>

            <div>
                <input class="frmBtnR w_100Per mt_0_h" value="Upload" type="submit">
            </div>
    
        </div>
    </form>






    <form action="{{url('/add/section')}}" method="post" enctype="multipart/form-data" class="w_90Per posFix negBottom_500 m_1 p_1 w_90Per m_a bgThasin zIndex_10" id="bringImgPara">
    @csrf

        <div class="frmElm_6 disGrid gridCol_1_size_1 gridGap_h">
    
            <label  class="txtCenter bgThasin clrWhite p_7px" for=""> Paragraph </label>
            <textarea name="ParaImg_Para" id="" cols="30" rows="10" class="borSize_2 borClrThasin borRad_5 fSize_1 lato">

            </textarea>
            <input  type="hidden" name="Section" value="paraImg">
            <input  type="hidden" name="Art_ID" value="{{Session::get('Art_ID')}}">

            <div class="file_2">
            
                <label for="" class="fBtn">
                    <i class="fas fa-cloud-upload-alt"></i>
                </label>
            
                <input class="fName" type="file" name="ParaImg_Img" id="ParaImg_Img">
            
            </div>

            <div>
                <input class="frmBtnR w_100Per mt_0_h" value="Upload" type="submit">
            </div>
    
        </div>
    </form>







    <form action="{{url('/add/section')}}" method="post" class="w_90Per posFix negBottom_500 m_1 p_1 w_90Per m_a bgThasin zIndex_10" id="bringCode">
    @csrf

        <div class="frmElm_6 disGrid gridCol_1_size_1 gridGap_h">
    
            <label  class="txtCenter bgThasin clrWhite p_7px" for=""> Code </label>
            <textarea name="Code" id="" cols="30" rows="10" class="borSize_2 borClrThasin borRad_5 fSize_1 lato">
                
            </textarea>
            <input  type="hidden" name="Section" value="code">
            <input  type="hidden" name="Art_ID" value="{{Session::get('Art_ID')}}">

            <label  class="txtCenter bgThasin clrWhite p_7px" for=""> language </label>
            <input  type="text" name="Language">

            <div>
                <input class="frmBtnR w_100Per" value="Upload" type="submit">
            </div>
    
        </div>
    </form>






    <form action="{{url('/add/section')}}" method="post" class="w_90Per posFix negBottom_500 m_1 p_1 w_90Per m_a bgThasin zIndex_10" id="bringLink">
    @csrf

        <div class="frmElm_6 disGrid gridCol_5_size_1_3_1_4_1 gridGap_h">
    
            <label  class="txtCenter bgThasin clrWhite p_7px" for=""> Link </label>
            <input  type="text" name="Link_Name">
            <label  class="txtCenter bgThasin clrWhite p_7px" for=""> URL </label>
            <input  type="url" name="Link_URL">
            <input  type="hidden" name="Section" value="link">
            <input  type="hidden" name="Art_ID" value="{{Session::get('Art_ID')}}">

            <div>
                <input class="frmBtnR w_100Per" value="Upload" type="submit">
            </div>
    
        </div>
    </form>



    @endif















    <table class="tableChart bgThasin vScrlr_400 posFix negBottom_500 w_100Per" class="w_100Per" id="articleList">

        <form action="{{url('/search/article')}}" method="get" class="w_100Per">
        @csrf

            <tr>
                <td colspan="3">
                    <div class="frmElm_6">

                        <label  for=""> Search </label>
                        <input  type="text" name="searchArticle">

                    </div>
                </td>
                <td>
                    <input class="frmBtnR disGrid m_a" value="Search" type="submit">
                </td>
        
        </form>


        <div class="w_100Per">

            <tr>
                <th width="5%">S/N</th>
                <th width="5%">Sort</th>
                <th width="85%">Article Title</th>
                <th width="5%">Action</th>
            </tr>

            <?php $serial = 1; ?>
            @foreach($data as $list)
            <tr>
                <td class="txtCenter"><?php echo $serial; $serial++; ?></td>
                <td class="txtCenter">{{$list->Sorting}}</td>
                <td>
                    <p>{{$list->Art_Title}}</p>
                </td>
                <td>
                    <a class="successBtnR m_0_h p_0_1 fSize_15px txtDecorNone"  href="{{url('/select/article/'.$list->Art_ID)}}">Build</a>
                </td>
            </tr>
            @endforeach

        </div>

    </table>






    <span class="bigGap p_30"></span>


</body>
</html>