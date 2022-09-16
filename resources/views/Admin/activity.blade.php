@extends('adminFrame')


@section('container')






                    <p class="titleL p_0 m_0_h">Search Log</p>

                    <table class="tableChart w_10Per">
                        <form action="{{url('/search/activity')}}" method="get">
                        @csrf

                            <tr>
                                <td>
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="date" name="search">
                                </td>
                                <td>
                                    <input class="frmBtnR disGrid m_a" value="Search" type="submit">
                                </td>
                            </tr>

                        </form>
                    </table>



                    <p class="titleL p_0 m_0_h">Activity Log</p>

                    <table class="tableChart w_100Per">
                            <tr> 
                                <th>S/N</th>
                                <th>Logs</th>
                                <th>Time</th>
                            </tr>

                            <?php $serial = 1; ?>
                            @foreach($data as $list)
                            <tr>
                                <td class="txtCenter p_0_h"><?php echo $serial; $serial++; ?></td>
                                <td class="p_0_h">{{$list->Logs}}</td>
                                <td class="p_0_h">{{$list->Timestamp}}</td>
                            </tr>
                            @endforeach
                    </table>


                    <div class="largeGap"></div>











@endsection
