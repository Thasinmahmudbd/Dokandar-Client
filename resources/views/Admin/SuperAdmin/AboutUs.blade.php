@extends('adminFrame')


@section('container')


            <!-- About Us Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">

                            <h6 class="mb-4">About Us</h6>

                            <form action="{{url('/update/policy')}}" method="post">
                            @csrf

                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea" style="height: 150px;" name="about">{{session('policy')}}</textarea>

                                    <input type="hidden" class="form-control" id="floatingInput"
                                        value="about" name="type">

                                    <label for="floatingTextarea">Message</label>
                                </div>

                                <button type="submit" class="btn btn-sm btn-primary mt-3">Publish</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- About Us End -->


@endsection