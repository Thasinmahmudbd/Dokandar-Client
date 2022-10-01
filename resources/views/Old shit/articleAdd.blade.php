@extends('adminFrame')


@section('container')







                    @if(Session::get('actionType')=='add')

                    <p class="titleL p_0 m_0_h">Add Article</p>

                        @if(Session::get('tagHook')==null)
                        <form action="{{url('/add/article')}}" method="post" enctype="multipart/form-data">
                        @else
                        <form action="{{url('/add/article/'.Session::get('tagHook').'/'.Session::get('tagId'))}}" method="post" enctype="multipart/form-data">
                        @endif
                        @csrf

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Title </label>
                                <input  class="p_0_h fSize_1" type="text" name="Art_Title">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Summary </label>
                                <textarea class="borSize_2 borStyleSolid borClrBlack borRad_5 p_0_h txtJustify fSize_1 lineHeight_1_5" name="Art_Summary" id="" rows="3"></textarea>
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Tag </label>
                                <input  class="p_0_h fSize_1 shadeLight" type="text" name="Art_Tag" readonly>
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Date </label>
                                <input  class="p_0_h fSize_1" type="date" name="Art_Date">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Reference </label>
                                <input  class="p_0_h fSize_1 valCheck" type="url" name="Art_Reference">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Sorting </label>
                                <input  class="p_0_h fSize_1" type="number" name="Sorting" value="0">
                            </div>

                            <div action="" class="p_0_h disGrid gridCol_2_size_1_9">

                                <p><strong>Picture</strong></p>

                                <div class="file_2 pl_4px">
                                    <label for="Art_Image" class="fBtn">
                                        <i class="fas fa-file-image"></i>
                                    </label>
                                    <input class="fName" type="file" name="Art_Image" id="Art_Image">
                                </div>

                            </div>

                            <input class="frmBtnR w_100Per mt_0_h m_0_h" value="Insert" type="submit">

                        </form>

                    @elseif(Session::get('actionType')=='edit')

                    <p class="titleL p_0 m_0_h">Add Article</p>

                    @foreach($data as $list)
                    <form action="{{url('/edit/article/'.$list->Art_ID)}}" method="post" enctype="multipart/form-data">
                    @csrf

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Title </label>
                                <input  class="p_0_h fSize_1" type="text" name="Art_Title" value="{{$list->Art_Title}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Summary </label>
                                <textarea class="borSize_2 borStyleSolid borClrBlack borRad_5 p_0_h txtJustify fSize_1 lineHeight_1_5" name="Art_Summary" id="" rows="3">
                                {{$list->Art_Summary}}
                                </textarea>
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Reference </label>
                                <input  class="p_0_h fSize_1 valCheck" type="url" name="Art_Reference" value="{{$list->Art_Reference}}">
                            </div>

                            <div class="frmElm_6 p_0_h disGrid gridCol_2_size_1_9">
                                <label  for=""> Sorting </label>
                                <input  class="p_0_h fSize_1" type="number" name="Sorting" value="{{$list->Sorting}}">
                            </div>

                            <div action="" class="p_0_h disGrid gridCol_2_size_1_9">

                                <p><strong>Picture</strong></p>

                                <div class="file_2 pl_4px">
                                    <label for="Art_Image" class="fBtn">
                                        <i class="fas fa-file-image"></i>
                                    </label>
                                    <input class="fName" type="file" name="Art_Image" id="Art_Image">
                                </div>

                            </div>

                            <input class="pendingBtnR w_100Per mt_0_h m_0_h" value="Edit" type="submit">

                    </form>
                    @endforeach
                    @endif


                    <div class="largeGap"></div>
                    
                    
                






@endsection
