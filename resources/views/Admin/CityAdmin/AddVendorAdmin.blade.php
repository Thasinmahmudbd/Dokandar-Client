@extends('cityFrame')


@section('container')


            <!-- Add City Admin Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">

                            <h6 class="mb-4">Add City Admin</h6>

                            <form action="{{url('/add/vendor/admin')}}" method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="vendor_category">
                                        <option value="grocery">Grocery</option>
                                        <option value="restaurants">Restaurants</option>
                                        <option value="pharmacy">Pharmacy</option>
                                        <option value="library">Library</option>
                                        <option value="laundry services">Laundry Services</option>
                                        <option value="beyond boundaries">Beyond Boundaries</option>
                                        <option value="delivery through us">Delivery Through Us</option>
                                    </select>
                                    <label for="floatingSelect">Vendor Category</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="Enter vendor name" name="name">
                                    <label for="floatingInput">Vendor Name</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="Enter owner name" name="owner_name">
                                    <label for="floatingInput">Owner Name</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="Enter address" name="address">
                                    <label for="floatingInput">Address</label>
                                </div>

                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label"></label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="image">
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput"
                                        placeholder="Enter email number" name="email">
                                    <label for="floatingInput">Admin Email</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="Enter phone number" name="phone">
                                    <label for="floatingInput">Admin Phone</label>
                                </div> 

                                <div class="form-floating mb-3">
                                    <input type="time" class="form-control" id="floatingInput"
                                        placeholder="" name="opening">
                                    <label for="floatingInput">Opening Time</label>
                                </div> 

                                <div class="form-floating mb-3">
                                    <input type="time" class="form-control" id="floatingInput"
                                        placeholder="" name="closing">
                                    <label for="floatingInput">Closing Time</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="Commission in percentage" name="commission">
                                    <label for="floatingInput">Commission Per Order (%)</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="How many KM you delivered" name="delivery_range">
                                    <label for="floatingInput">Delivery Range (km)</label>
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