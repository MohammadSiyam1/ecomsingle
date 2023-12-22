@extends('admin.layout.base')
@section('title','Dashboard | All Sub-Categories')

@section('body')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> All Sub Category</h4>
        <div class="card">
            <h5 class="card-header">Available Sub Category Information</h5>
            <div class="table-responsive text-nowrap">
                @if (session()->has('message'))
                <div class="alert alert-success">{{session()->get('message')}}</div>
                @endif
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>Id</th>
                    <th>Sub Category Name</th>
                    <th>Category</th>
                    <th>Product</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($subcategories as $key=>$item)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->sub_category_name}}</td>
                        <td>{{$item->category_name}}</td>
                        <td>{{$item->product_count}}</td>
                        <th>
                            <a href="{{route('admin.editSubCategory',$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{route('admin.deleteSubCategory',$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </th>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
    </div>
@endsection
