@extends('user_template.layouts.user_profile')
@section('userBody')
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session()->get('message') }}</div>
    @endif
    <table class="table">
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>
        @foreach ($pendingOrders as $order)
            <tr>
                @php
                    $product_name = App\Models\Product::where('id', $order->product_id)->value('product_name');
                @endphp
                <td>{{$product_name}}</td>
                <th>{{$order->quantity}}</th>
                <th>{{$order->total_price}}</th>
            </tr>
        @endforeach
    </table>
@endsection
