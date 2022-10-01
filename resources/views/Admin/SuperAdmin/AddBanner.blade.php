@extends('adminFrame')


@section('container')


            <!-- Add Banner Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">

                            <h6 class="mb-4">Add Banner</h6>

                            <form action="{{url('/store/banner')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="Title" name="title" required>
                                    <label for="floatingInput">Title</label>
                                </div>

                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea" style="height: 150px;" name="message" required></textarea>
                                    <label for="floatingTextarea">Message</label>
                                </div>

                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label"></label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="image" required>
                                </div>

                                <button type="submit" class="btn btn-sm btn-primary">Add</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Banner End -->


@endsection