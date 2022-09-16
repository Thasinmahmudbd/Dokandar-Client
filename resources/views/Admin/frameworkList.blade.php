@extends('adminFrame')


@section('container')








                    
                    
                    <p class="titleL p_0 m_0_h">Listed Frameworks</p>

                        <table class="tableChart" class="w_100Per">
                            <form action="" class="w_100Per">

                                <tr>
                                    <th width="5%">S/N</th>
                                    <th width="5%">Sort</th>
                                    <th width="80%">Title</th>
                                    <th width="5%">Edit</th>
                                    <th width="5%">Delete</th>
                                    <th width="5%">Article</th>
                                </tr>

                                <?php $serial = 1; ?>
                                @foreach($data as $list)
                                <tr>
                                    <td class="txtCenter"><?php echo $serial; $serial++; ?></td>
                                    <td class="txtCenter">{{$list->Sorting}}</td>
                                    <td>
                                        <p>{{$list->Fw_Title}}</p>
                                    </td>
                                    <td>
                                        <a class="pendingBtnR m_0_h p_0_1 fSize_15px txtDecorNone"  href="{{url('/admin/framework/edit/'.$list->Fw_ID)}}">Edit</a>
                                    </td>
                                    <td>
                                        <a class="dangerBtnR m_0_h p_0_1 fSize_15px txtDecorNone"  href="{{url('/delete/framework/'.$list->Fw_ID)}}">Delete</a>
                                    </td>
                                    <td>
                                        <a class="successBtnR m_0_h p_0_1 fSize_15px txtDecorNone"  href="{{url('/generate/tag/F/'.$list->Fw_ID)}}">Add</a>
                                    </td>
                                </tr>
                                @endforeach

                            </form>
                        </table>





@endsection