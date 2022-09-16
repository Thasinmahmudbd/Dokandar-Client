@extends('adminFrame')


@section('container')


            <!-- Order Complaints Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">

                            <div class="row justify-content-between">
                                <h6 class="mb-4 col-4">Order Complaints</h6>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Customer Number</th>
                                            <th scope="col">Order Id</th>
                                            <th scope="col">Vendor Name</th>
                                            <th scope="col">Vendor Number</th>
                                            <th scope="col">Complaints</th>
                                            <th scope="col">Date | Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>John</td>
                                            <td>Doe</td>
                                            <td>John</td>
                                            <td>Doe</td>
                                            <td>John</td>
                                            <td>Doe</td>
                                            <td>John</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Order Complaints End -->


@endsection