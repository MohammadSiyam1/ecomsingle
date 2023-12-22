@extends('admin.layout.base')
@section('title', 'Dashboard | Confimed Orders')
@section('body')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> All Confimed Orders</h4>
        <div class="card">
            <h5 class="card-header">Available Pending Orders Information</h5>
            <div class="table-responsive text-nowrap">
                <table class="table text-center">
                    <thead class="table-light">
                        <tr>
                            <th>User Id</th>
                            <th>Shipping Information</th>
                            <th>Product Id</th>
                            <th>Quantity</th>
                            <th>Total will pay</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($confirmedOrder as $order)
                            <tr>
                                <td>{{$order->user_id}}</td>
                                <td>
                                    <ul style="text-align: left !important">
                                        <li>Phone Number - {{$order->phone_number}}</li>
                                        <li>District - {{$order->district}}</li>
                                        <li>Upazila - {{$order->upazila}}</li>
                                        <li>Postal Code - {{$order->postal_code}}</li>
                                    </ul>
                                </td>
                                <td>{{$order->product_id}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->total_price}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
