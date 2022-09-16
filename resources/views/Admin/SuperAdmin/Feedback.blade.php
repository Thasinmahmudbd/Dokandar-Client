@extends('adminFrame')


@section('container')


            <!-- Feedback Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">

                            <div class="row justify-content-between">
                                <h6 class="mb-4 col-4">Feedback</h6>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="5%" scope="col">#</th>
                                            <th width="15%" scope="col">User Name</th>
                                            <th width="15%" scope="col">User Number</th>
                                            <th width="50%" scope="col">Message</th>
                                            <th width="15%" scope="col">Date | Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th width="5%" scope="row">1</th>
                                            <td width="15%">John</td>
                                            <td width="15%">Doe</td>
                                            <td width="50%">John</td>
                                            <td width="15%">John</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Feedback End -->


@endsection