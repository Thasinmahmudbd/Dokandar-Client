@extends('adminFrame')


@section('container')


            <!-- Setting Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">

                            <h6 class="mb-4">Account Settings</h6>

                            <form action="{{url('/update/admin/info')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        value="{{session('Admin_Name')}}" name="name">
                                    <label for="floatingInput">Admin Name</label>
                                </div>    

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput"
                                    value="{{session('Admin_Email')}}" name="email">
                                    <label for="floatingInput">Admin Email</label>
                                </div>

                                <div class="form-floating mb-0">
                                    <input type="text" class="form-control" id="floatingInput"
                                    value="{{session('Admin_Phone')}}" name="phone">
                                    <label for="floatingInput">Admin Phone</label>
                                </div> 

                                <input type="hidden" value="{{session('Admin_ID')}}" name="id">

                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label"></label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="image">
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword"
                                        placeholder="Password" name="password">
                                    <label for="floatingPassword">Admin Password</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword"
                                        placeholder="Password" name="confirm_password">
                                    <label for="floatingPassword">Confirm Password</label>
                                </div>

                                <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Setting End -->


@endsection