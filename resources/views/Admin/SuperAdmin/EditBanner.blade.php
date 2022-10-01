@extends('adminFrame')


@section('container')


            <!-- Edit Banner Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">

                            <h6 class="mb-4">Edit Banner</h6>

                            <form action="{{url('/update/banner')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="Title"
                                        name="title" value="{{session('banner_title')}}" required>
                                        <input type="hidden" name="id" value="{{session('banner_id')}}">
                                    <label for="floatingInput">Title</label>
                                </div>    

                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Message"
                                        id="floatingTextarea" style="height: 150px;" name="message" required>
                                        {{session('banner_message')}}</textarea>
                                    <label for="floatingTextarea">Message</label>
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
            <!-- Edit Banner End -->


@endsection