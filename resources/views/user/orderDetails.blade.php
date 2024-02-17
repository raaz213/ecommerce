@extends('user.layout.main')
@section('content')
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">My Account</a></li>
                <li class="breadcrumb-item">Settings</li>
            </ol>
        </div>
    </div>
</section>

<section class=" section-11 ">
    <div class="container  mt-5">
        <div class="row">
            <div class="col-md-3">
                <ul id="account-panel" class="nav nav-pills flex-column">
                    <li class="nav-item ">
                        <a href="#" class="nav-link font-weight-bold" role="tab" aria-controls="tab-login" aria-expanded="false"><i class="fas fa-user-alt"></i> My Profile</a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-shopping-bag"></i>My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="wishlist.php" class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-heart"></i> Wishlist</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-lock"></i> Change Password</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2 class="h5 mb-0 pt-2 pb-2">My Orders</h2>
                    </div>

                    <div class="card-body pb-0">
                        <div class="card card-sm">
                            <div class="card-body bg-light mb-3">
                                <div class="row">
                                    <div class="col-6 col-lg-3">
                                        <h6 class="heading-xxxs text-muted">Order No:</h6>

                                        <p class="mb-lg-0 fs-sm fw-bold">
                                            {{ $order->order_code}}
                                        </p>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <h6 class="heading-xxxs text-muted">Shipped date:</h6>

                                        <p class="mb-lg-0 fs-sm fw-bold">
                                            <time datetime="2019-10-01">
                                                {{ $order->delivery_date}} days
                                            </time>
                                        </p>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <h6 class="heading-xxxs text-muted">Status:</h6>

                                        <p class="mb-0 fs-sm fw-bold">
                                            {{ $order->order_status}}
                                        </p>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <h6 class="heading-xxxs text-muted">Order Amount:</h6>
                                        <?php
                                        $subtotal = 0;
                                        ?>
                                        @foreach($order->order_details as $order_detail)
                                        <?php
                                        $subtotal = $subtotal + ($order_detail->price * $order_detail->stock);
                                        ?>
                                        @endforeach
                                        <p class="mb-0 fs-sm fw-bold">
                                            {{$subtotal}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer p-4">
                        <h6 class="mb-7 h5 mt-4">Order Items({{$order->order_details->count()}})</h6>

                        <!-- Divider -->
                        <hr class="my-3">

                        <!-- List group -->
                        <ul>
                            @foreach($order->order_details as $order_detail)
                            @foreach($order_detail->product as $product)
                            @php
                            $imagePath = is_array($product->images) ? $product->images[0] : $product->images;
                            @endphp
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-4 col-md-3 col-xl-2">
                                        <!-- Image -->
                                        <a href="product.html"><img src="{{ asset('storage/'.$imagePath) }}" alt="..." class="img-fluid"></a>
                                    </div>
                                    <div class="col">
                                        <!-- Title -->
                                        <p class="mb-4 fs-sm fw-bold">
                                            <a class="text-body" href="product.html">{{$product->name }} x {{$order_detail->stock}}</a> <br>
                                            <span class="text-muted">{{$order_detail->price}}</span>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="card card-lg mb-5 mt-3">
                    <div class="card-body">
                        <h6 class=" mt-0 mb-3 h5">Order Total</h6>

                        <!-- List group -->
                        <ul>
                            <li class="list-group-item d-flex">
                                <span>Subtotal</span>
                                <span class="ms-auto">${{$subtotal}}</span>
                            </li>
                            <li class="list-group-item d-flex">
                                <span>Tax</span>
                                <span class="ms-auto">$0.00</span>
                            </li>
                            <li class="list-group-item d-flex">
                                <span>Shipping</span>
                                <span class="ms-auto">$100</span>
                            </li>
                            <li class="list-group-item d-flex fs-lg fw-bold">
                                <span>Total</span>
                                <span class="ms-auto">${{$subtotal + 100}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection