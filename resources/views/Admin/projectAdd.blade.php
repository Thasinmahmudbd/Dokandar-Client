@extends('adminFrame')


@section('container')









                    @if(Session::get('actionType')=='add')

                    <p class="titleL p_0 m_0_h">Add Project</p>

                    <form action="{{url('/add/project')}}" method="post" enctype="multipart/form-data">
                    @csrf

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Title </label>
                                <input  class="p_0_h fSize_1" type="text" name="Pro_Title">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Summary </label>
                                <textarea class="borSize_2 borStyleSolid borClrBlack borRad_5 p_0_h txtJustify fSize_1 lineHeight_1_5" name="Pro_Summary" id="" rows="3"></textarea>
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Tag </label>
                                <input  class="p_0_h fSize_1" type="text" name="Pro_Tag">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Github </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="Pro_Git">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Live View </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="Pro_Liveview">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Sorting </label>
                                <input  class="p_0_h valCheck fSize_1" type="number" name="Sorting" value="0">
                            </div>

                            <div class="p_0_h disGrid gridCol_2_size_1_9">

                                <p><strong>Picture</strong></p>

                                <div class="file_2 pl_4px">
                                    <label for="Pro_Image" class="fBtn">
                                        <i class="fas fa-file-image"></i>
                                    </label>
                                    <input class="fName" type="file" name="Pro_Image" id="Pro_Image">
                                </div>

                            </div>

                            <input class="frmBtnR w_100Per mt_0_h m_0_h" value="Insert" type="submit">

                    </form>

                    @elseif(Session::get('actionType')=='edit')

                    <p class="titleL p_0 m_0_h">Edit Project</p>

                    @foreach($data as $list)
                    <form action="{{url('/edit/project/'.$list->Pro_ID)}}" method="post" enctype="multipart/form-data">
                    @csrf

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Title </label>
                                <input  class="p_0_h fSize_1" type="text" name="Pro_Title" value="{{$list->Pro_Title}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Summary </label>
                                <textarea class="borSize_2 borStyleSolid borClrBlack borRad_5 p_0_h txtJustify fSize_1 lineHeight_1_5" name="Pro_Summary" id="" rows="3">
                                {{$list->Pro_Summary}}
                                </textarea>
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Tag </label>
                                <input  class="p_0_h fSize_1" type="text" name="Pro_Tag" value="{{$list->Pro_Tag}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Github </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="Pro_Git" value="{{$list->Pro_Git}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Live View </label>
                                <input  class="p_0_h valCheck fSize_1" type="url" name="Pro_Liveview" value="{{$list->Pro_Liveview}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Sorting </label>
                                <input  class="p_0_h valCheck fSize_1" type="number" name="Sorting" value="{{$list->Sorting}}">
                            </div>

                            <div class="p_0_h disGrid gridCol_2_size_1_9">

                                <p><strong>Picture</strong></p>

                                <div class="file_2 pl_4px">
                                    <label for="Pro_Image" class="fBtn">
                                        <i class="fas fa-file-image"></i>
                                    </label>
                                    <input class="fName" type="file" name="Pro_Image" id="Pro_Image">
                                </div>

                            </div>

                            <input class="pendingBtnR w_100Per mt_0_h m_0_h" value="Edit" type="submit">

                    </form>
                    @endforeach
                    @endif


                    <div class="largeGap"></div>
                    
                    
                




@endsection