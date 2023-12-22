@extends('user_template.layouts.base')
@section('title', 'EcomSingle | Home')
@section('body')
    <div class="container">
        <h2 class="text-center">Final step to place your order</h2>
        <div class="row">
            <div class="col-8">
                <div class="box_main">
                    <h3>Product will send at-</h3>
                    <p>District - {{ $shipping_address->district }}</p>
                    <p>Upazila - {{ $shipping_address->upazila }}</p>
                    <p>Postal Code - {{ $shipping_address->postal_code }}</p>
                    <p>Phone Number - {{ $shipping_address->phone_number }}</p>
                </div>
            </div>

            <div class="col-4">
                <div class="box_main">
                    <h3>Your Final Product are-</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($items as $item)
                                <tr>
                                    @php
                                        $product_name = App\Models\Product::where('id', $item->Product_id)->value('product_name');
                                    @endphp
                                    <td>{{ $product_name }}</td>
                                    <td>{{ $item->Quantity }}</td>
                                    <td>{{ $item->Price }}</td>
                                </tr>
                                @php
                                    $total = $total + $item->Price;
                                @endphp
                            @endforeach
                            <tr>
                                <td></td>
                                <td><b>Total</b></td>
                                <td><b>{{ $total }}</b></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="d-flex mb-3">
            <form action="{{route('placeOrder')}}" method="post">
                @csrf
                <input type="submit" class="btn btn-outline-warning mr-2" value="Place Order">
            </form>
            <form action="" method="post">
                @csrf
                <input type="submit" class="btn btn-outline-danger" value="Cancel Order">
            </form>
        </div>
    </div>
@endsection
