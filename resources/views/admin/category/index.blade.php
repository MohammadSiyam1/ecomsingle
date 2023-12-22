@extends('admin.layout.base')
@section('title','Dashboard | Categories')

@section('body')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> All Category</h4>
        <div class="card">
            <h5 class="card-header">Available Category Information</h5>
            <div class="table-responsive text-nowrap">
                @if (session()->has('message'))
                <div class="alert alert-success">{{session()->get('message')}}</div>
                @endif
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Sub Categories</th>
                    <th>Slug</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <tr>
                    @foreach ($categories as $key=>$category)
                        <tr>
                            <th>{{$key+1}}</th>
                            <th>{{$category->Category_Name}}</th>
                            <th>{{$category->Count_Sub_Category	}}</th>
                            <th>{{$category->Slug}}</th>
                            <th>
                                <a href="{{route('admin.editCategory',$category->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{route('admin.deleteCategory',$category->id)}}" class="btn btn-danger btn-sm">Delete</a>
                            </th>
                        </tr>
                    @endforeach
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
    </div>
@endsection
