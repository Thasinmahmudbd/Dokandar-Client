@extends('adminFrame')


@section('container')










                    
                    
                    <p class="titleL p_0 m_0_h">Listed Extensions</p>

                        <table class="tableChart" class="w_100Per">
                            <form action="" class="w_100Per">

                                <tr>
                                    <th width="5%">S/N</th>
                                    <th width="5%">Sort</th>
                                    <th width="80%">Name</th>
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
                                        <p>{{$list->Ex_Name}}</p>
                                    </td>
                                    <td>
                                        <a class="pendingBtnR m_0_h p_0_1 fSize_15px txtDecorNone"  href="{{url('/admin/extension/edit/'.$list->Ex_ID)}}">Edit</a>
                                    </td>
                                    <td>
                                        <a class="dangerBtnR m_0_h p_0_1 fSize_15px txtDecorNone"  href="{{url('/delete/extension/'.$list->Ex_ID)}}">Delete</a>
                                    </td>
                                    <td>
                                        <a class="successBtnR m_0_h p_0_1 fSize_15px txtDecorNone"  href="{{url('/generate/tag/E/'.$list->Ex_ID)}}">Add</a>
                                    </td>
                                </tr>
                                @endforeach

                            </form>
                        </table>






@endsection
