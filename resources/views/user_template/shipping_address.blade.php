@extends('user_template.layouts.base')
@section('title','EcomSingle | Home')
@section('body')
<div class="container">
    <div class="box_main">
        <h2 class="text-center">Shipping Address</h2>
        <form action="{{route('StoreShippingAddress')}}" method="post">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="phone_number">Phone Number</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="phone_number" name="phone_number"
                        placeholder="Enter Phone Number">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="district">District</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="district" name="district"
                        placeholder="Enter District Name">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="upazila">Upazila</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="upazila" name="upazila"
                        placeholder="Enter Upazila Name">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="postal_code">Postal Code</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="postal_code" name="postal_code"
                        placeholder="Enter Postal Code">
                </div>
            </div>

            <div class="">
                <input type="submit" value="Place Order" class=" btn btn-outline-warning ">
            </div>


        </form>
    </div>
</div>
@endsection
