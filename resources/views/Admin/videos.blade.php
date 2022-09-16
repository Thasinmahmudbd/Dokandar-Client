@extends('adminFrame')


@section('container')













                    

                    <p class="titleL p_0 m_0_h">Search Video</p>

                    <table class="tableChart" class="w_100Per">
                        <form action="{{url('/search/video')}}" method="get" class="w_100Per">
                        @csrf

                            <tr class="w_100Per">
                                <td width="80%">
                                    <select class="p_0_h fSize_1 bgWhite borNone w_95Per" name="Video_Tag" id="Video_Tag">
                                        @foreach($data as $list)
                                        <option value="{{$list->Video_Tag}}">{{$list->Video_Tag}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td width="20%">
                                    <input class="frmBtnR disGrid m_a" value="Search" type="submit">
                                </td>
                            </tr>

                        </form>
                    </table>



                    <p class="titleL p_0 m_0_h">Add Video</p>

                    <table class="tableChart" class="w_100Per">
                        <form action="{{url('/add/video')}}" method="post" class="w_100Per">
                        @csrf

                            <tr>
                                <th width="5%">S/N</th>
                                <th width="5%">Sort</th>
                                <th width="20%">Title</th>
                                <th width="30%">Embed Link</th>
                                <th width="15%">Gallery Tag</th>
                                <th width="15%">Video Tag</th>
                                <th width="5%">Action</th>
                                <th width="5%">Action</th>
                            </tr>
                            <tr>
                                <td class="txtCenter">0</td>
                                <td class="txtCenter">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="tel" name="Sorting">
                                </td>
                                <td>
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="Vid_Name">
                                </td>
                                <td>
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="Embed">
                                </td>
                                <td>
                                    <select class="p_0_h fSize_1 bgWhite borNone w_95Per" name="Gallery_Tag" id="Gallery_Tag">
                                        <option value="fr">Framework</option>
                                        <option value="ex">Extension</option>
                                        <option value="pro">Project</option>
                                    </select>
                                </td>
                                <td>
                                    <input  class="p_0_h fSize_1 borNone" type="text" name="Video_Tag">
                                </td>
                                <td>
                                    <input class="dangerBtnR disGrid m_a" value="Reset" type="reset">
                                </td>
                                <td>
                                    <input class="successBtnR disGrid m_a" value="Add" type="submit">
                                </td>
                            </tr>

                        </form>
                    </table>


                    <div class="largeGap"></div>

                    <p class="titleL p_0 m_0_h">Edit/View Videos</p>

                    <table class="tableChart" class="w_100Per">

                        <?php $serial = 1; ?>
                        @foreach($data as $list)
                        <form action="{{url('/edit/video/'.$list->Vid_ID)}}" method="post" class="w_100Per">
                        @csrf
                            <tr>
                                <td width="5%" class="txtCenter"><?php echo $serial; $serial++; ?></td>
                                <td width="5%" class="txtCenter">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="tel" name="Sorting" value="{{$list->Sorting}}">
                                </td>
                                <td width="20%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="Vid_Name" value="{{$list->Vid_Name}}">
                                </td>
                                <td width="30%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="Embed" value="{{$list->Embed}}">
                                </td>
                                <td width="15%">
                                    <select class="p_0_h fSize_1 bgWhite borNone w_95Per" name="Gallery_Tag" id="Gallery_Tag">
                                        @if($list->Gallery_Tag == "fr")
                                        <option value="fr" selected>Framework</option>
                                        <option value="ex">Extension</option>
                                        <option value="pro">Project</option>
                                        @elseif($list->Gallery_Tag == "ex")
                                        <option value="fr" selected>Framework</option>
                                        <option value="ex" selected>Extension</option>
                                        <option value="pro">Project</option>
                                        @elseif($list->Gallery_Tag == "pro")
                                        <option value="fr" selected>Framework</option>
                                        <option value="ex">Extension</option>
                                        <option value="pro" selected>Project</option>
                                        @endif
                                    </select>
                                </td>
                                <td width="15%">
                                    <input  class="p_0_h fSize_1 borNone" type="text" name="Video_Tag" value="{{$list->Video_Tag}}">
                                </td>
                                <td width="5%">
                                    <input class="pendingBtnR disGrid m_a" value="Edit" type="submit">
                                </td>
                                <td width="5%">
                                    <a class="dangerBtnR fSize_15px m_0_h txtDecorNone txtCenter"  href="{{url('/delete/video/'.$list->Vid_ID)}}">Del</a>
                                </td>
                            </tr>

                        </form>
                        @endforeach

                    </table>
                    
                    
                



@endsection