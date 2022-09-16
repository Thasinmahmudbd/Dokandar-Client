@extends('adminFrame')


@section('container')


            <!-- User Notification Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">

                            <h6 class="mb-4">User Notification</h6>

                            <form>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Title</label>
                                </div>

                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea" style="height: 150px;"></textarea>
                                    <label for="floatingTextarea">Message</label>
                                </div>

                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label"></label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                                </div>

                                <button type="submit" class="btn btn-sm btn-primary">Send Notification</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- User Notification End -->


@endsection