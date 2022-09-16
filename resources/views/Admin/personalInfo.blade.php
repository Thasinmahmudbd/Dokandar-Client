@extends('adminFrame')


@section('container')




                    <p class="titleL p_0 m_0_h">Personal Information</p>

                    @foreach($data as $list)
                    <form action="{{url('/edit/profile')}}" method="post">
                    @csrf

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Name </label>
                                <input  class="p_0_h fSize_1" type="text" name="name" value="{{$list->Name}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Interested In </label>
                                <input  class="p_0_h fSize_1" type="text" name="interest" value="{{$list->Interested_In}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Organization </label>
                                <input  class="p_0_h fSize_1" type="text" name="organization" value="{{$list->Organization}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Fiverr Link </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="fiver" value="{{$list->Fiver_Link}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Objective </label>
                                <textarea class="borSize_2 borStyleSolid borClrBlack borRad_5 p_0_h txtJustify fSize_1 lineHeight_1_5" name="objective" id="" rows="3">
                                {{$list->Objective}}
                                </textarea>
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Phone 1 </label>
                                <input  class="p_0_h valCheck fSize_1" type="tel" name="phone_1" value="{{$list->Phone_One}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> phone 2 </label>
                                <input  class="p_0_h valCheck fSize_1" type="tel" name="phone_2" value="{{$list->Phone_Two}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Github </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="github" value="{{$list->Github}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Linkedin </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="linkedin" value="{{$list->Linkedin}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Youtube </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="youtube" value="{{$list->Youtube}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Facebook </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="facebook" value="{{$list->Facebook}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Twitter </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="twitter" value="{{$list->Twitter}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Email </label>
                                <input  class="p_0_h valCheck fSize_1" type="email" name="email" value="{{$list->Email}}">
                            </div>

                            <input class="pendingBtn w_100Per mt_0_h" value="Edit" type="submit">

                    </form>


                    <div class="largeGap"></div>
                    
                    
                    <p class="titleL p_0 m_0_h">CV Uploader</p>

                    <form action="{{url('/edit/cv')}}" method="post" class="p_0_h disGrid gridCol_3_size_8_1_1" enctype="multipart/form-data">
                    @csrf
                        <div class="file_2">
                                
                            <label for="cv" class="fBtn">
                                <i class="fas fa-file-pdf"></i>
                            </label>
                            
                            <input class="fName" type="file" name="cv" id="cv">
                            
                        </div>

                        <a href="{{asset('CV/'.$list->CV)}}" target="_blank" class="linkless" download="Thasin Mahmud CV">
                            <i class="fa-solid fa-file fSize_3 cv"></i>
                        </a>

                        <!-- <img src="{{asset('CV/t.jpg')}}" alt="0"> file access from public folders--> 

                        <input class="frmBtn" value="Upload" type="submit">
                    </form>

                    <div class="largeGap"></div>


                    <p class="titleL p_0 m_0_h">Profile Picture Uploader</p>

                    <form action="{{url('/edit/dp')}}" method="post" class="p_0_h disGrid gridCol_3_size_8_1_1" enctype="multipart/form-data">
                    @csrf
                        <div class="file_2">
                                
                            <label for="dp" class="fBtn">
                                <i class="fas fa-file-image"></i>
                            </label>
                            
                            <input class="fName" type="file" name="dp" id="dp">
                            
                        </div>

                        <img width="50px" src="{{asset('DP/'.$list->DP)}}" alt="DP">

                        <input class="frmBtn" value="Upload" type="submit">
                    </form>
                    @endforeach

                    <div class="largeGap"></div>

@endsection