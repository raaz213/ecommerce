@extends('user.layout.main')
@section('content')
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="/">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="/shop">Shop</a></li>
                <li class="breadcrumb-item">{{$product->name}}</li>
            </ol>
        </div>
    </div>
</section>

<section class="section-7 pt-3 mb-3">
    <div class="container">
        <div class="row ">
            <div class="col-md-5">
                <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner bg-light">
                        @foreach($product->images as $index => $image)
                        <div class="carousel-item @if($index === 0) active @endif">
                            <img class="w-100 h-100" src="{{ asset('storage/'.$image) }}" alt="Image">
                        </div>
                        @endforeach

                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-bs-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-bs-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <form action="/addToCart/{{$product->id}}" method="post">
                    @csrf
                    <div class="bg-light right">
                        <h1>{{$product->name}}</h1>
                        <h4>{{$product->subcategory->name}}</h4>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star-half-alt"></small>
                                <small class="far fa-star"></small>
                            </div>
                            <small class="pt-1">(99 Reviews)</small>
                        </div>
                        <h2 class="price text-secondary"><del>$400</del></h2>
                        <h2 class="price ">${{$product->price}}</h2> <br>
                        <b>Size:</b>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="size" id="inlineRadio1" value="s">
                            <label class="form-check-label" for="inlineRadio1">S</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="size" id="inlineRadio2" value="m">
                            <label class="form-check-label" for="inlineRadio2">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="size" id="inlineRadio3" value="l">
                            <label class="form-check-label" for="inlineRadio3">L </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="size" id="inlineRadio3" value="xl">
                            <label class="form-check-label" for="inlineRadio3">XL </label>
                        </div>
                        <div class="pt-4">
                            <label class="" for="inlineRadio3">Qty:</label>
                            <input class="" type="number" name="stock" value="1" style="width: 50px; height:30px">
                        </div>
                        <p>{!!$product->description!!}</p>
                        <button type="submit" class="btn btn-dark"> <i class="fas fa-shopping-cart"></i> &nbsp;ADD TO CART </button>
                    </div>
                </form>
            </div>

            <div class="col-md-12 mt-5">
                <div class="bg-light">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button" role="tab" aria-controls="shipping" aria-selected="false">Shipping & Returns</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <p>
                                {{strip_tags($product->description)}}
                            </p>
                        </div>
                        <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit, incidunt blanditiis suscipit quidem magnam doloribus earum hic exercitationem. Distinctio dicta veritatis alias delectus quaerat, quam sint ab nulla aperiam commodi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit, incidunt blanditiis suscipit quidem magnam doloribus earum hic exercitationem. Distinctio dicta veritatis alias delectus quaerat, quam sint ab nulla aperiam commodi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit, incidunt blanditiis suscipit quidem magnam doloribus earum hic exercitationem. Distinctio dicta veritatis alias delectus quaerat, quam sint ab nulla aperiam commodi.</p>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-5 section-8">
    <div class="container">
        <div class="section-title">
            <h2>Related Products</h2>
        </div>
        <div class="col-md-12">
            <div id="related-products" class="carousel">
                @foreach($relatedProducts as $product)
                @php
                $imagePath = is_array($product->images) ? $product->images[0] : $product->images;
                @endphp
                <div class="card product-card">
                    <div class="product-image position-relative">
                        <a href="" class="product-img"><img class="card-img-top" src="{{ asset('storage/'.$imagePath) }}" alt=""></a>
                        <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                        <div class="product-action">
                            <a class="btn btn-dark" href="#">
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </a>
                        </div>
                    </div>
                    <div class="card-body text-center mt-3">
                        <a class="h6 link" href="">{{$product->name}}</a>
                        <div class="price mt-2">
                            <span class="h5"><strong>${{$product->price}}</strong></span>
                            <span class="h6 text-underline"><del>$120</del></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection