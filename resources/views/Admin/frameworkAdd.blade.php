@extends('adminFrame')


@section('container')








                    @if(Session::get('actionType')=='add')

                    <p class="titleL p_0 m_0_h">Add Framework</p>

                    <form action="{{url('/add/framework')}}" method="post" enctype="multipart/form-data">
                    @csrf

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Title </label>
                                <input  class="p_0_h fSize_1" type="text" name="Fw_Title">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Summary </label>
                                <textarea class="borSize_2 borStyleSolid borClrBlack borRad_5 p_0_h txtJustify fSize_1 lineHeight_1_5" name="Fw_Summary" id="" rows="3"></textarea>
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Tag </label>
                                <input  class="p_0_h valCheck fSize_1" type="text" name="Fw_Tag">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Name </label>
                                <input  class="p_0_h valCheck fSize_1" type="text" name="Fw_Name">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Type </label>
                                <input  class="p_0_h valCheck fSize_1" type="text" name="Fw_Type">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Version </label>
                                <input  class="p_0_h valCheck fSize_1" type="text" name="Fw_Version">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Documentation </label>
                                <input  class="p_0_h valCheck fSize_1" type="text" name="Fw_Documentation">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Extension </label>
                                <input  class="p_0_h valCheck fSize_1" type="text" name="Fw_Extension">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Github </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="Fw_Git">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Live View </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="Fw_Liveview">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Sorting </label>
                                <input  class="p_0_h valCheck fSize_1" type="number" name="Sorting" value="0">
                            </div>

                            <div class="p_0_h disGrid gridCol_2_size_1_9">

                                <p><strong>Picture</strong></p>

                                <div class="file_2 pl_4px">
                                    <label for="Fw_Image" class="fBtn">
                                        <i class="fas fa-file-image"></i>
                                    </label>
                                    <input class="fName" type="file" name="Fw_Image" id="Fw_Image">
                                </div>

                            </div>

                            <input class="frmBtnR w_100Per mt_0_h m_0_h" value="Insert" type="submit">

                    </form>

                    @elseif(Session::get('actionType')=='edit')

                    <p class="titleL p_0 m_0_h">Edit Framework</p>

                    @foreach($data as $list)
                    <form action="{{url('/edit/framework/'.$list->Fw_ID)}}" method="post" enctype="multipart/form-data">
                    @csrf

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Title </label>
                                <input  class="p_0_h fSize_1" type="text" name="Fw_Title" value="{{$list->Fw_Title}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Summary </label>
                                <textarea class="borSize_2 borStyleSolid borClrBlack borRad_5 p_0_h txtJustify fSize_1 lineHeight_1_5" name="Fw_Summary" id="" rows="3">
                                    {{$list->Fw_Summary}}
                                </textarea>
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Tag </label>
                                <input  class="p_0_h fSize_1" type="text" name="Fw_Tag" value="{{$list->Fw_Tag}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Name </label>
                                <input  class="p_0_h fSize_1" type="text" name="Fw_Name" value="{{$list->Fw_Name}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Type </label>
                                <input  class="p_0_h fSize_1" type="text" name="Fw_Type" value="{{$list->Fw_Type}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Version </label>
                                <input  class="p_0_h fSize_1" type="text" name="Fw_Version" value="{{$list->Fw_Version}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Documentation </label>
                                <input  class="p_0_h fSize_1" type="text" name="Fw_Documentation" value="{{$list->Fw_Documentation}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Extension </label>
                                <input  class="p_0_h fSize_1" type="text" name="Fw_Extension" value="{{$list->Fw_Extension}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Github </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="Fw_Git" value="{{$list->Fw_Git}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Live View </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="Fw_Liveview" value="{{$list->Fw_Liveview}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Sorting </label>
                                <input  class="p_0_h valCheck fSize_1" type="number" name="Sorting" value="{{$list->Sorting}}">
                            </div>

                            <div class="p_0_h disGrid gridCol_2_size_1_9">

                                <p><strong>Picture</strong></p>

                                <div class="file_2 pl_4px">
                                    <label for="Fw_Image" class="fBtn">
                                        <i class="fas fa-file-image"></i>
                                    </label>
                                    <input class="fName" type="file" name="Fw_Image" id="Fw_Image">
                                </div>

                            </div>

                            <input class="pendingBtnR w_100Per mt_0_h m_0_h" value="Edit" type="submit">

                    </form>
                    @endforeach
                    @endif


                    <div class="largeGap"></div>
                    
                    
                




@endsection