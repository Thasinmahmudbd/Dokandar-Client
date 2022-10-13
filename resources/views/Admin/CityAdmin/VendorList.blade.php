@extends('cityFrame')


@section('container')




            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <form class="d-flex mb-2">
                            <input class="form-control bg-transparent" type="text" placeholder="Search vendors">
                                <button type="button" class="btn btn-primary ms-2">Search</button>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Banner Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">

                            <div class="row justify-content-between">
                                <h6 class="mb-4 col-4">Vendors</h6>
                                <div class="col-1">
                                    <a href="{{url('/vendor/admin/form')}}" class="btn btn-sm btn-primary">Add</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Vendor Name</th>
                                            <th scope="col">Owner</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Logo</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $serial = 1; ?>
                                        @foreach($data as $list)
                                        <tr>
                                            <th scope="row"><?php echo $serial; $serial++; ?></th>
                                            <td>{{$list->admin_name}}</td>
                                            <td>{{$list->owner_name}}</td>
                                            <td>{{$list->admin_number}}</td>
                                            <td>{{$list->admin_email}}</td>
                                            <td><img src="{{asset('Admin/'.$list->admin_image)}}" alt="No Image" width="30px"></td>
                                            <td>
                                                <a href="{{url('/login/vendor/admin/'.$list->admin_id)}}" class="btn btn-sm btn-sm-square btn-outline-dark">
                                                    <i class="fas fa-user-secret"></i>
                                                </a>
                                                <a href="{{url('/delete/vendor/admin/'.$list->admin_id)}}" class="btn btn-sm btn-sm-square btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="{{url('/edit/vendor/admin/'.$list->admin_id)}}" class="btn btn-sm btn-sm-square btn-outline-warning">
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