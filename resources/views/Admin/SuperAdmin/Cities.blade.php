@extends('adminFrame')


@section('container')


            <!-- Cities Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">

                            <div class="row justify-content-between">
                                <h6 class="mb-4 col-4">Cities</h6>
                                <div class="col-1">
                                    <a href="{{url('/add/city')}}" class="btn btn-sm btn-primary">Add</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">City Name</th>
                                            <th scope="col">City Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>John</td>
                                            <td>Doe</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-sm-square btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="" class="btn btn-sm btn-sm-square btn-outline-warning">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cities End -->


@endsection