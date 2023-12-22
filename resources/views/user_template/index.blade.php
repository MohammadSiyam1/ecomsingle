@extends('user_template.layouts.base')
@section('title','EcomSingle | Home')
@section('body')
    <!-- fashion section start -->
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital">All Products</h1>
                        <div class="fashion_section_2">
                            <div class="row">
                                @foreach ($products as $product)
                                <div class="col-lg-4 col-sm-4">
                                    <div class="box_main">
                                        <h4 class="shirt_text">{{$product->product_name}}</h4>
                                        <p class="price_text">Price <span style="color: #262626;">{{$product->price}} Tk.</span></p>
                                        <div class="tshirt_img"><img src="{{$product->product_image}}">
                                        </div>
                                        <div class="btn_main">
                                            <div class="buy_bt">
                                                <form action="{{route('AddToCart')}}" method="post">@csrf
                                                    <input type="hidden" name="productId" value="{{ $product->id }}">
                                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="submit" class="btn btn-outline-warning" value="Buy Now">
                                                </form>
                                            </div>
                                            <div class="seemore_bt"><a href="{{route('SingleProduct',$product->id)}}">See More</a></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="loader_main">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- fashion section end -->


@endsection
