@extends('adminFrame')


@section('container')









                    <p class="titleL p_0 m_0_h">Add Education</p>

                    <table class="tableChart" class="w_100Per">
                        <form action="{{url('/add/education')}}" method="post">
                        @csrf

                            <tr class="w_100vw">
                                <th width="5%">S/N</th>
                                <th width="5%">Sort</th>
                                <th width="10%">Type</th>
                                <th width="10%">Degree</th>
                                <th width="10%">Subject</th>
                                <th width="10%">CGPA</th>
                                <th width="10%">Skill Genre</th>
                                <th width="10%">Skill</th>
                                <th width="10%">Extra Skill</th>
                                <th width="10%">Efficiency</th>
                                <th width="5%">Action</th>
                                <th width="5%">Action</th>
                            </tr>
                            <tr>
                                <td width="5%" class="txtCenter">0</td>
                                <td width="5%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="tel" name="Sorting">
                                </td>
                                <td width="10%">
                                    <select class="p_0_h fSize_1 bgWhite borNone w_95Per" name="Type" id="Type">
                                        <option value="edu">Edu</option>
                                        <option value="skill">Skill</option>
                                        <option value="extra">Extra</option>
                                    </select>
                                </td>
                                <td width="10%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="Degree">
                                </td>
                                <td width="15%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="Subject">
                                </td>
                                <td width="10%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="CGPA">
                                </td>
                                <td width="10%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="Skill_Genre">
                                </td>
                                <td width="10%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="Skill">
                                </td>
                                <td width="10%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="Extra_Skill">
                                </td>
                                <td width="10%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="Efficiency">
                                </td>
                                <td width="5%">
                                    <input class="dangerBtnR disGrid m_a" value="Reset" type="reset">
                                </td>
                                <td width="5%">
                                    <input class="successBtnR disGrid m_a" value="Add" type="submit">
                                </td>
                            </tr>

                        </form>
                    </table>


                    <div class="largeGap"></div>

                    <p class="titleL p_0 m_0_h">Edit/View Education</p>

                    <table class="tableChart" class="w_100Per">

                        <?php $serial = 1; ?>
                        @foreach($data as $list)
                        <form action="{{url('/edit/education/'.$list->Edu_ID)}}" method="post" class="w_100Per">
                        @csrf

                            <tr>
                            <td width="5%" class="txtCenter"><?php echo $serial; $serial++; ?></td>
                                <td width="5%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="tel" name="Sorting" value="{{$list->Sorting}}">
                                </td>
                                <td width="10%">
                                    <select class="p_0_h fSize_1 bgWhite borNone w_95Per" name="Type" id="Type">
                                        @if($list->Type == "edu")
                                        <option value="edu" selected>Edu</option>
                                        <option value="skill">Skill</option>
                                        <option value="extra">Extra</option>
                                        @elseif($list->Type == "skill")
                                        <option value="edu" selected>Edu</option>
                                        <option value="skill" selected>Skill</option>
                                        <option value="extra">Extra</option>
                                        @elseif($list->Type == "extra")
                                        <option value="edu" selected>Edu</option>
                                        <option value="skill">Skill</option>
                                        <option value="extra" selected>Extra</option>
                                        @endif
                                    </select>
                                </td>
                                <td width="10%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="Degree" value="{{$list->Degree}}">
                                </td>
                                <td width="15%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="Subject" value="{{$list->Subject}}">
                                </td>
                                <td width="10%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="CGPA" value="{{$list->CGPA}}">
                                </td>
                                <td width="10%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="Skill_Genre" value="{{$list->Skill_Genre}}">
                                </td>
                                <td width="10%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="Skill" value="{{$list->Skill}}">
                                </td>
                                <td width="10%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="Extra_Skill" value="{{$list->Extra_Skill}}">
                                </td>
                                <td width="10%">
                                    <input  class="p_0_h fSize_1 w_95Per m_a borNone" type="text" name="Efficiency" value="{{$list->Efficiency}}">
                                </td>
                                <td width="5%"> 
                                    <input class="pendingBtnR" value="Edit" type="submit">
                                </td>
                                <td width="5%">
                                    <a class="dangerBtnR m_0_h fSize_12px txtDecorNone txtCenter"  href="{{url('/delete/education/'.$list->Edu_ID)}}">Del</a>
                                </td>
                            </tr>

                        </form>
                        @endforeach

                    </table>
                    
                    
                










@endsection

