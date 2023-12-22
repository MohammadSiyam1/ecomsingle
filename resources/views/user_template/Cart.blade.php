@extends('user_template.layouts.base')
@section('title', 'EcomSingle | Home')
@section('body')
    <div class="container">
        <h1>Cart</h1>
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            @endif
        <div class="row">
            <div class="col-12">
                <div class="box_main">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                  $total=0;
                              @endphp
                          @foreach ($items as $item)
                            <tr>
                                @php
                                    $product_name = App\Models\Product::where('id',$item->Product_id)->value('product_name');
                                    $product_img = App\Models\Product::where('id',$item->Product_id)->value('product_image');
                                @endphp
                                <td><img src="{{ asset($product_img) }}" alt=""></td>
                                <td>{{$product_name}}</td>
                                <td>{{$item->Quantity}}</td>
                                <td>{{$item->Price}}</td>
                                <td><a href="{{route('deleteCartItem',$item->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                            @php
                                $total=$total+$item->Price
                            @endphp
                          @endforeach
                          @if ($total>0)
                          <tr>
                            <td></td>
                            <td><b>Total</b></td>
                            <td></td>
                            <td><b>{{$total}}</b></td>td>
                            <td><a class="btn btn-outline-warning" href="{{route('ShippingAddress')}}">Procced to checkout</a></td>
                            @else
                            <td><h3 class="text-center text-warning ">You didn't added any item in your cart</h3></td>
                            @endif
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection
