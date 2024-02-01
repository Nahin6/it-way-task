@extends('layouts.app')

@section('content')
{{-- <div class=" p-1 my-container active-cont"> --}}

@if ($message = Session::get('success'))
    <div id="success-message" class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="container ms-lg-5-5">
    <h1 class="text-center">Product List</h1>
    <div class="table-responsive">
        <table class="table m-3">
            <thead>
                <tr>

                    <th scope="col">Product ID</th>
                    <th scope="col">Product Title</th>
                    <th scope="col">Product Category</th>
                    <th scope="col">Product price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Image</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $product)
                    <tr>

                        <th>{{ $product->id }}</th>
                        <td>{{ $product->productName }}</td>
                        <td>{{ $product->catagory }}</td>
                        <td>{{ $product->productPrice }}</td>
                        <td>{{ $product->productQuantity }}</td>
                        <td><img src="public/product_images/{{ $product->productImg }}" style="height: 50px;"
                                alt="..."></td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>


</div>
@endsection
