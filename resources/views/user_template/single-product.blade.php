@extends('user_template.layouts.base')
@section('title', 'EcomSingle | Home')
@section('body')
    <div class="fashion_section">
        <div class="container ">
            <div class="row">
                <div class="col-lg-4">
                    <div class="box_main">
                        <div class="tshirt_img">
                            <img src="{{ asset($product->product_image) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="box_main">
                        <div class="product-info">
                            <h4 class="shirt_text text-left">{{ $product->product_name }}</h4>
                            <p class="price_text text-left">Price <span style="color: 262626;">{{ $product->price }}</span>
                            </p>
                        </div>
                        <div class="my-3 product-details">
                            <p class="lead">{{ $product->short_description }}</p>
                            <ul class="p-2 my-2 bg-light">
                                <li>
                                    <p>Product Category - {{ $product->product_category_name }}</p>
                                </li>
                                <li>
                                    <p>Product Sub Category - {{ $product->product_sub_category_name }}</p>
                                </li>
                                <li>
                                    <p>Available Quantity - {{ $product->quantity }}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="btn-main ">
                            <form action="{{ route('AddToCart') }}" method="post">
                                @csrf

                                <div class="input-group mb-3">
                                    <input type="hidden" name="productId" value="{{ $product->id }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <input type="hidden" name="quantity" value="1">

                                    <input type="number" class="form-control "min="1" name="quantity"
                                        placeholder="Enter Quantity of Product" value="1"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">

                                    <button class="btn btn-outline-warning" type="submit" id="button-addon2">Add toCart</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <div class="related_product">
                <h1 class="fashion_taital">Related Products</h1>
                <div class="fashion_section_2">
                    <div class="row">
                        @foreach ($related_products as $product)
                            <div class="col-lg-4 col-sm-4">
                                <div class="box_main">
                                    <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                    <p class="price_text">Price <span style="color: #262626;">{{ $product->price }}
                                            Tk.</span></p>
                                    <div class="tshirt_img"><img src="{{ asset($product->product_image) }}">
                                    </div>
                                    <div class="btn_main">

                                        <div class="buy_bt">
                                            <form action="{{route('AddToCart')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="productId" value="{{ $product->id }}">
                                                <input type="hidden" name="price" value="{{ $product->price }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="submit" class="btn btn-outline-warning" value="Buy Now">
                                            </form>
                                        </div>
                                        <div class="seemore_bt"><a
                                                href="{{ route('SingleProduct', $product->id) }}">SeeMore<a>
                                                    <div>
                                                    </div>
                                        </div>
                                    </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
