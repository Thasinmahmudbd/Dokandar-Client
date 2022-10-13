@extends('cityFrame')


@section('container')





            <!-- Banner Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">

                            <div class="row justify-content-between">
                                <h6 class="mb-4 col-4">Area</h6>
                                <div class="col-1">
                                    <a href="{{url('/area/from')}}" class="btn btn-sm btn-primary">Add</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="5%" scope="col">#</th>
                                            <th width="70%" scope="col">Area Name</th>
                                            <th width="15%" scope="col">Delivery Charges</th>
                                            <th width="10%" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $serial = 1; ?>
                                        @foreach($data as $list)
                                        <tr>
                                            <th width="5%" scope="row"><?php echo $serial; $serial++; ?></th>
                                            <td width="70%">{{$list->area_name}}</td>
                                            <td width="15%">{{$list->delivery_charge}}</td>
                                            <td width="10%">
                                                <a href="{{url('/delete/banner/'.$list->area_id)}}" class="btn btn-sm btn-sm-square btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner End -->


@endsection