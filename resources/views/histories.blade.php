@extends('layouts.home-app')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container mt-5">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles justify-content-between py-3">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Historeis</li>
            </ol>
        </div>

        <div class="col-md-2 mt-2">
            <button type="button" class="btn waves-effect waves-light btn btn-info pull-right text-white" data-toggle="modal" data-target="#historyCreate">Update Stock</button>

        </div>

    </div>
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="row">

        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="card-title">Products</h5>
                        </div>
                        <!-- <div class="ms-auto">
                                <select class="form-select b-0">
                                    <option selected="">January</option>
                                    <option value="1">February</option>
                                    <option value="2">March</option>
                                    <option value="3">April</option>
                                </select>
                            </div> -->
                    </div>
                    <div class="table-responsive mt-3 no-wrap">
                        @if (count($products) > 0)
                        <table class="table vm no-th-brd pro-of-month">
                            <thead>
                                <tr>
                                    <th colspan="1">ID</th>
                                    <th>Status</th>
                                    <th>Quantity</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                <tr>
                                    <td>
                                        {{ $loop->index+1 }}
                                    </td>
                                    <td>
                                        @if($item->status==1)
                                        <h4 class="text-primary">Stock in</h4>
                                        @elseif ($item->status==2)
                                        <h4 class="text-warning">Stock out</h4>
                                        @elseif ($item->status==3)
                                        <h4 class="text-warning">Damage</h4>
                                        @else
                                        <h4 class="text-info">Remove</h4>
                                        @endif
                                    </td>

                                    <td>{{ $item->quantity }}</td>
                                    <!-- <td>



                                        <form action="{{route('history.delete',$item)}}" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td> -->
                                </tr>


                                @endforeach




                            </tbody>
                        </table>
                        @else
                        <h4 class="text-center text-danger">Not Items Found</h4>
                        @endif

                    </div>
                </div>
            </div>
        </div>



    </div>

</div>

<footer class="footer"> © 2021 Developed by <a href="">Tamim & Rayhan</a> </footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->

<!-- Product create Modal -->

<div class="modal fade bd-example-modal-lg" id="historyCreate" tabindex="-1" role="dialog" aria-labelledby="historyCreate" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('history.store',$product)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <select class="form-select" name="status" required aria-label="Default select example">
                            <option selected>Choose..</option>
                            <option value="1">Stock In</option>
                            <option value="2">Stock Out</option>
                            <option value="3">Damage</option>
                            <option value="4">Remove</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Quantity</label>
                        <input type="text" class="form-control" name="quantity" id="quantity" required placeholder="Quantity">
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Product create Modal end -->


@endsection