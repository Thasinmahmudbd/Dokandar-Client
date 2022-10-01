@extends('adminFrame')


@section('container')


            <!-- Banner Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">

                            <div class="row justify-content-between">
                                <h6 class="mb-4 col-4">Banner</h6>
                                <div class="col-1">
                                    <a href="{{url('/add/banner')}}" class="btn btn-sm btn-primary">Add</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Banner Title</th>
                                            <th scope="col">Banner Message</th>
                                            <th scope="col">Banner Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $serial = 1; ?>
                                        @foreach($data as $list)
                                        <tr>
                                            <th scope="row"><?php echo $serial; $serial++; ?></th>
                                            <td>{{$list->banner_title}}</td>
                                            <td>{{$list->banner_message}}</td>
                                            <td><img src="{{asset('Banner/'.$list->banner_image)}}" alt="loading error..." width="30px"></td>
                                            <td>
                                                <a href="{{url('/delete/banner/'.$list->banner_id)}}" class="btn btn-sm btn-sm-square btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="{{url('/edit/banner/'.$list->banner_id)}}" class="btn btn-sm btn-sm-square btn-outline-warning">
                                                    <i class="fas fa-pen"></i>
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