@extends('cityFrame')


@section('container')




            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <form class="d-flex mb-2">
                            <input class="form-control bg-transparent" type="date" name="from">
                            <input class="form-control bg-transparent" type="date" name="to">
                            <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="delivery_boy" required>
                                @foreach($data as $list)
                                <option value="{{$list->delivery_id}}">{{$list->delivery_name}}</option>
                                @endforeach
                            </select>
                                <button type="button" class="btn btn-primary ms-2">Search</button>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Banner Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">

                            <div class="row justify-content-between">
                                <h6 class="mb-4 col-4">Commission List</h6>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Order ID</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Delivery Boy</th>
                                            <th scope="col">Product Price</th>
                                            <th scope="col">Commission Price</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Amount Status</th>
                                            <th scope="col">Payment Method</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $serial = 1; ?>
                                        <tr>
                                            <th scope="row"><?php echo $serial; $serial++; ?></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner End -->


@endsection