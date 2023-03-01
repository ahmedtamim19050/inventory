@extends('layouts.home-app')

@section('content')

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container mt-5">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles justify-content-between py-4">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>

        <div class="col-md-2">
            <button type="button" class="btn waves-effect waves-light btn btn-info pull-right text-white" data-toggle="modal" data-target="#productCreateForm">Create a Product</button>

        </div>

    </div>
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
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
                        @if (count($products) > 0 )
                        <table class="table vm no-th-brd pro-of-month">
                            <thead>
                                <tr>
                                    <th colspan="1">ID</th>
                                    <th>Name</th>
                                    <th>Unit Price</th>
                        
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>
                                        {{ $loop->index+1 }}
                                    </td>
                                    <td>
                                        <h6>{{$product->name}}</h6>
                                    </td>

                                    <td>{{ $product->price }}</td>
                                  
                                    <td>
                                        <h6>{{$product->quantity ==!null ? $product->quantity : 0}}</h6>
                                    </td>
                                    <td>{{ $product->price * ($product->quantity > 0 ? $product->quantity :1) }}</td>
                                    <td>

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productEditForm" data-product-name="{{ $product->name }}" data-product-id="{{ $product->id }}" data-product-price="{{ $product->price }}">Edit</button>

                                        <form action="{{route('product.delete',$product)}}" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <a href="{{route('history.index',$product)}}" class="btn btn-success">Stock</a>
                                    </td>
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
<div class="modal fade bd-example-modal-lg" id="productCreateForm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('product.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Product name">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Price</label>
                        <input type="text" class="form-control" name="price" id="price" required placeholder="Price">
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
@if (count($products) > 0 )
<div class="modal fade bd-example-modal-lg" id="productEditForm" tabindex="-1" role="dialog" aria-labelledby="productEditForm" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="editModal" class="modal-body">
                <form action="{{route('product.edit')}}" method="post">
                    @csrf
                    <input type="hidden" id="product_id" name="product_id" value="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Product name">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Price</label>
                        <input type="text" class="form-control" name="price" id="price" required placeholder="Price">
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
@endif

<!-- Product create Modal end -->

@endsection

@section('js')
<script>
    $('#productEditForm').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var productName = button.data('product-name') // Extract product name from data-* attributes
        var productId = button.data('product-id') // Extract product description from data-* attributes
        var productPrice = button.data('product-price') // Extract product price from data-* attributes
        var modal = $(this)
        modal.find('#editModal #name').val(productName)
        modal.find('#editModal #price').val(productPrice)
        modal.find('#editModal #product_id').val(productId)
        modal.find('#editModalTitle').text('Edit' + ' #' + productName)
    })
</script>

@endsection