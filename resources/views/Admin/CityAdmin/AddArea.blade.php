@extends('cityFrame')


@section('container')


            <!-- Add City Admin Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">

                            <h6 class="mb-4">Add Area</h6>

                            <form action="{{url('/add/area')}}" method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="" name="area">
                                    <label for="floatingInput">Address</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput"
                                        placeholder="" name="delivery_charge">
                                    <label for="floatingInput">Delivery Charge</label>
                                </div>

                                <button type="submit" class="btn btn-sm btn-primary">Add</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Add City Admin End -->


@endsection