@extends('adminFrame')


@section('container')


            <!-- Add City Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">

                            <h6 class="mb-4">Add City</h6>

                            <form>
                                <div class="form-floating mb-0">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Address</label>
                                </div>    

                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label"></label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                                </div>

                                <button type="submit" class="btn btn-sm btn-primary">Add</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Add City End -->


@endsection