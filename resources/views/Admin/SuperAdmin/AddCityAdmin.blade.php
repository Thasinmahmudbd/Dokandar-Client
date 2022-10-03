@extends('adminFrame')


@section('container')


            <!-- Add City Admin Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">

                            <h6 class="mb-4">Add City Admin</h6>

                            <form action="{{url('/add/city/admin')}}" method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="city">
                                        @foreach($data as $list)
                                        <option value="{{$list->city_name}}">{{$list->city_name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">City</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" name="name">
                                    <label for="floatingInput">City Admin Name</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" name="address">
                                    <label for="floatingInput">Address</label>
                                </div>

                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label"></label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="image">
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" name="email">
                                    <label for="floatingInput">City Admin Email</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" name="phone">
                                    <label for="floatingInput">City Admin Phone</label>
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

                                <button type="submit" class="btn btn-sm btn-primary">Add</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Add City Admin End -->


@endsection