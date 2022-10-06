@extends('cityFrame')


@section('container')


            <!-- Add City Admin Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">

                            <h6 class="mb-4">Add delivery boy</h6>

                            <form action="{{url('/add/delivery/boy')}}" method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="area" required>
                                        @foreach($area as $list)
                                        <option value="{{$list->area_name}}">{{$list->area_name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Area</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="vendor" required>
                                        @foreach($vendor as $list)
                                        <option value="{{$list->vendor_name}}">{{$list->vendor_name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Vendor</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" name="name" required>
                                    <label for="floatingInput">Delivery Boy Name</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" name="phone" required>
                                    <label for="floatingInput">Delivery Boy Phone</label>
                                </div>

                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label"></label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="image">
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="Commission in fixed amount" name="commission" required>
                                    <label for="floatingInput">Commission</label>
                                </div> 

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword"
                                        placeholder="Password" name="password" required>
                                    <label for="floatingPassword">Admin Password</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword"
                                        placeholder="Password" name="confirm_password" required>
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