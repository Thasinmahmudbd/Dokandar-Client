@extends('adminFrame')


@section('container')








                    @if(Session::get('actionType')=='add')

                    <p class="titleL p_0 m_0_h">Add Extension</p>

                    <form action="{{url('/add/extension')}}" method="post" enctype="multipart/form-data">
                    @csrf

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Name </label>
                                <input  class="p_0_h fSize_1" type="text" name="Ex_Name">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Type </label>
                                <input  class="p_0_h fSize_1" type="text" name="Ex_Type">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Version </label>
                                <input  class="p_0_h fSize_1" type="text" name="Ex_Version">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> IDE </label>
                                <input  class="p_0_h fSize_1" type="text" name="Ex_IDE">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Use </label>
                                <input  class="p_0_h fSize_1" type="text" name="Ex_Use">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Tag </label>
                                <input  class="p_0_h fSize_1" type="text" name="Ex_Tag">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Github </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="Ex_Git">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Live View </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="Ex_Liveview">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Sorting </label>
                                <input  class="p_0_h valCheck fSize_1" type="number" value="0" name="Sorting">
                            </div>

                            <div action="" class="p_0_h disGrid gridCol_2_size_1_9">

                                <p><strong>Picture</strong></p>

                                <div class="file_2 pl_4px">
                                    <label for="Ex_Image" class="fBtn">
                                        <i class="fas fa-file-image"></i>
                                    </label>
                                    <input class="fName" type="file" name="Ex_Image" id="Ex_Image">
                                </div>

                            </div>

                            <input class="frmBtnR w_100Per mt_0_h m_0_h" value="Insert" type="submit">

                    </form>

                    @elseif(Session::get('actionType')=='edit')

                    <p class="titleL p_0 m_0_h">Edit Extension</p>

                    @foreach($data as $list)
                    <form action="{{url('/edit/extension/'.$list->Ex_ID)}}" method="post" enctype="multipart/form-data">
                    @csrf

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Name </label>
                                <input  class="p_0_h fSize_1" type="text" name="Ex_Name" value="{{$list->Ex_Name}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Type </label>
                                <input  class="p_0_h fSize_1" type="text" name="Ex_Type" value="{{$list->Ex_Type}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Version </label>
                                <input  class="p_0_h fSize_1" type="text" name="Ex_Version" value="{{$list->Ex_Version}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> IDE </label>
                                <input  class="p_0_h fSize_1" type="text" name="Ex_IDE" value="{{$list->Ex_IDE}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Use </label>
                                <input  class="p_0_h fSize_1" type="text" name="Ex_Use" value="{{$list->Ex_Use}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Tag </label>
                                <input  class="p_0_h fSize_1" type="text" name="Ex_Tag" value="{{$list->Ex_Tag}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Github </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="Ex_Git" value="{{$list->Ex_Git}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Live View </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="Ex_Liveview" value="{{$list->Ex_Liveview}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Sorting </label>
                                <input  class="p_0_h valCheck fSize_1" type="number" name="Sorting" value="{{$list->Sorting}}">
                            </div>

                            <div action="" class="p_0_h disGrid gridCol_2_size_1_9">

                                <p><strong>Picture</strong></p>

                                <div class="file_2 pl_4px">
                                    <label for="Ex_Image" class="fBtn">
                                        <i class="fas fa-file-image"></i>
                                    </label>
                                    <input class="fName" type="file" name="Ex_Image" id="Ex_Image">
                                </div>

                            </div>

                            <input class="pendingBtnR w_100Per mt_0_h m_0_h" value="Edit" type="submit">

                    </form>
                    @endforeach
                    @endif


                    <div class="largeGap"></div>
                    
                    
                







@endsection