@extends('cityFrame')


@section('container')


            <!-- Vendor Notification Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">

                            <h6 class="mb-4">Vendor Notification</h6>

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

                                <div class="mb-3"></div>

                                <button type="submit" class="btn btn-sm btn-primary">Send Notification</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Vendor Notification End -->


@endsection