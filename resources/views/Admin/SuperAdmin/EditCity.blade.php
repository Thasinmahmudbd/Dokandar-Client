@extends('adminFrame')


@section('container')


            <!-- Edit City Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">

                            <h6 class="mb-4">Edit City</h6>

                            <form action="{{url('/update/city')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-floating mb-0">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="Address"
                                        name="address" value="{{session('city_name')}}" required>
                                        <input type="hidden" name="id" value="{{session('city_id')}}">
                                    <label for="floatingInput">Address</label>
                                </div>    

                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label"></label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="image">
                                </div>

                                <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit City End -->


@endsection