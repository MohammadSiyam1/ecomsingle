@extends('admin.layout.base')
@section('title','Dashboard | All Product')

@section('body')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> All Product</h4>
        <div class="card">
            <h5 class="card-header">Available Product Information</h5>
            <div class="table-responsive text-nowrap">
                @if (session()->has('message'))
                <div class="alert alert-success">{{session()->get('message')}}</div>
                @endif
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($products as $key=>$product)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>
                            <img src="{{asset($product->product_image)}}" style="height: 100px" class="img-fluid rounded-top" alt="">
                        </td>
                        <td>{{$product->price}}</td>
                        <td>
                            <a href="{{route('admin.editProduct', $product->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{route('admin.deleteProduct', $product->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
    </div>
@endsection
