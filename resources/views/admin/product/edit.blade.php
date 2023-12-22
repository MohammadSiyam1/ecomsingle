@extends('admin.layout.base')
@section('title','Dashboard | edit Product')

@section('body')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> Edit Product</h4>
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Product</h5>
            <small class="text-muted float-end">Default label</small>
          </div>
          <div class="card-body">
            <form method="POST" action="{{route('admin.updateProduct',$products->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_name">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="product_name" name="product_name" value="{{$products->product_name}}">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_quantity">Quantity</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="product_quantity" name="quantity" value="{{$products->quantity}}">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_description">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="product_description" name="product_description"  cols="30" rows="5">{{$products->description}}</textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_short_des">Short Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="product_short_des" name="product_short_des"  cols="30" rows="5">{{$products->short_description}}</textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_price">Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_price" name="product_price" value="{{$products->price}}">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_price">Preview Image</label>
                <div class="col-sm-10">
                    <img src="{{asset($products->product_image)}}" alt="">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_img">Upload Product Image</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" name="product_img" id="product_img">
                </div>
              </div>

              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection
