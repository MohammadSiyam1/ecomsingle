@extends('admin.layout.base')
@section('title','Dashboard | Create Product')

@section('body')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> Add Product</h4>
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add new Product</h5>
            <small class="text-muted float-end">Default label</small>
          </div>
          <div class="card-body">
            <form method="POST" action="{{route('admin.storeProduct')}}" enctype="multipart/form-data">
                @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_name">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name">
                  @error('product_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_quantity">Quantity</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="product_quantity" name="quantity" placeholder="Enter Product Quantity">
                  @error('quantity')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_description">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="product_description" name="product_description" placeholder="Enter Product Name" cols="30" rows="5"></textarea>
                    @error('product_description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_short_des">Short Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="product_short_des" name="product_short_des" placeholder="Enter Product Name" cols="30" rows="5"></textarea>
                    @error('product_short_des')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_price">Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Product Name">
                    @error('product_price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="subCategory">Select Category</label>
                <div class="col-sm-10">
                    <select id="category" name="Category" class="form-select">
                        <option>select product category</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->Category_Name}}</option>
                        @endforeach
                    </select><br>
                    @error('Category')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="subCategory">Select Sub Category</label>
                <div class="col-sm-10">
                    <select id="category" name="sub_category" class="form-select">
                        <option>select sub category</option>
                        @foreach ($subCategory as $item)
                        <option value="{{$item->id}}">{{$item->sub_category_name}}</option>
                        @endforeach
                    </select><br>
                </div>
                @error('sub_category')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_img">Upload Product Image</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" name="product_img" id="product_img">
                    @error('product_img')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
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
