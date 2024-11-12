@extends('layouts.masterUserSide.master')
@section('content')

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <!-- Product Image Carousel -->
            <div class="col-lg-5 mb-4">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        @if(optional($product->productImages)->isNotEmpty())
                            @foreach($product->productImages as $key => $image)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img class="img-fluid w-100" src="{{ asset('storage/' . $product->productImages->first()->image_path) }}" alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        @else
                            <div class="carousel-item active">
                            <img class="img-fluid w-100" src="{{ asset('default-image.jpg') }}" alt="{{ $product->name }}">
                            </div>
                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <!-- <a class="carousel-control-next" href="#product-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a> -->
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="col-lg-7 mb-4">
                <div class="bg-light p-4 border">
                    <!-- Product Name -->
                    <h3 class="font-weight-bold">{{ $product->name }}</h3>

                    <!-- Product Rating and Reviews -->
                    <div class="d-flex align-items-center mb-3">
                        <div class="text-warning mr-2">
                            @for($i = 0; $i < 5; $i++)
                                <small class="{{ $i < $product->rating ? 'fas fa-star' : 'far fa-star' }}"></small>
                            @endfor
                        </div>
                        <small>({{ $product->reviews_count ?? 0 }} Reviews)</small>
                    </div>

                    <!-- Product Price -->
                    <h3 class="font-weight-bold text-success mb-4">${{ number_format($product->price, 2) }}</h3>

                    <!-- Product Description -->
                    <p class="mb-4">{{ $product->description }}</p>


                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To
                            Cart</button>
                    </div>
                </div>
            </div>
        </div>







        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">1 review for "Product Name"</h4>
                                    <div class="media mb-4">
                                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Leave a review</h4>
                                    <small>Your email address will not be published. Required fields are marked *</small>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Your Rating * :</p>
                                        <div class="text-primary">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="message">Your Review *</label>
                                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>







    </div>
    <!-- Shop Detail End -->



    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">Similar Products</span>
        </h2>
        <div class="row px-xl-5">
        @foreach($relatedProducts as $relatedProduct)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        @if($relatedProduct->productImages->isNotEmpty())
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $relatedProduct->productImages->first()->image_path) }}" alt="{{ $relatedProduct->name }}">
                        @else
                            <img class="img-fluid w-100" src="{{ asset('img/default-image.jpg') }}" alt="{{ $relatedProduct->name }}">
                        @endif

                        <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href="{{url('productDetails', $product->id)}}"><i class="fa fa-search"></i></a>
                        </div>
                    </div>

                    <div class="text-center py-4">
                        <!-- عرض اسم المنتج والسعر للمنتجات المشابهة -->
                        <a class="h6 text-decoration-none text-truncate" href="{{ route('product.details', $relatedProduct->id) }}">{{ $relatedProduct->name }}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>${{ $relatedProduct->price }}</h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <!-- عرض التقييم للمنتج -->
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(0)</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <!-- Products End -->

 @endsection
