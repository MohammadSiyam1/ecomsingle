@extends('admin.layout.base')
@section('title','Dashboard | Create Sub-Categories')

@section('body')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> Add Sub Category</h4>
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add new Sub Category</h5>
            <small class="text-muted float-end">Default label</small>
          </div>
          <div class="card-body">
            @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            <form method="POST" action="{{route('admin.storeSubCategory')}}">
                @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="subCategory">Sub Category Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="subCategory" name="subCategory" placeholder="Enter Sub Category Name">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="subCategory">Select Category</label>
                <div class="col-sm-10">
                    <select id="category" name="category_id" class="form-select">
                        <option>Categories</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->Category_Name}}</option>
                        @endforeach
                    </select>
                </div>
              </div>

              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Add Sub Category</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection
