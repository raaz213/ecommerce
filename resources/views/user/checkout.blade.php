@extends('user.layout.main')
@section('content')
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="/">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="/shop">Shop</a></li>
                <li class="breadcrumb-item">Checkout</li>
            </ol>
        </div>
    </div>
</section>

<section class="section-9 pt-4">
    <div class="container">
        <form action="/addToCheckout" method="post">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="sub-title">
                        <h2>Shipping Address</h2>
                    </div>
                    <div class="card shadow-lg border-0">
                        <div class="card-body checkout-form">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <select class="form-control" id="state" name="state" onchange="updateCities()">
                                            <option value="" selected disabled>Select a State</option>
                                            <option value="1">Province 1</option>
                                            <option value="2">Province 2</option>
                                            <option value="3">Province 3</option>
                                            <option value="4">Province 4</option>
                                            <option value="5">Province 5</option>
                                            <option value="6">Province 6</option>
                                            <option value="7">Province 7</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <select class="form-control" id="city" name="city">
                                            <option value="" selected disabled>Select a City</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <input type="text" name="street" id="street" class="form-control" placeholder="Street">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile No.">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea name="order_notes" id="order_notes" cols="30" rows="2" placeholder="Order Notes (optional)" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sub-title">
                        <h2>Order Summery</h3>
                    </div>
                    <div class="card cart-summery">
                        <div class="card-body">
                            <?php
                            $subtotal = 0;

                            ?>
                            @foreach($carts as $cart)
                            <div class="d-flex justify-content-between pb-2">
                                <div class="h6">{{$cart->product->name}} x {{$cart->stock}}</div>
                                <div class="h6">{{$cart->product->price * $cart->stock}}</div>
                            </div>
                            <?php
                            $subtotal = $subtotal + ($cart->product->price * $cart->stock);
                            ?>
                            @endforeach
                            <div class="d-flex justify-content-between summery-end">
                                <div class="h6"><strong>Subtotal</strong></div>
                                <div class="h6"><strong>{{$subtotal}}</strong></div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="h6"><strong>Shipping</strong></div>
                                <div class="h6"><strong>$100</strong></div>
                            </div>
                            <div class="d-flex justify-content-between mt-2 summery-end">
                                <div class="h5"><strong>Total</strong></div>
                                <div class="h5"><strong>${{$subtotal + 100}}</strong></div>
                            </div>
                        </div>
                    </div>

                    <div class="card payment-form ">
                        <h3 class="card-title h5 mb-3">Payment Details</h3>
                        <div class="">
                            <input type="radio" name="payment_method" id="" value="cod"> <span class="pt-4">Cash on Delivery</span> <br>
                            <input type="radio" name="payment_method" id="" value="khalti"> <span class="pt-4">Khalti</span>
                            <div class="pt-4">
                                <button class="btn btn-dark" type="submit">Pay Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        function updateCities() {
            var cities = [];
            var state = document.getElementById('state').value;
            var citySelect = document.getElementById('city');
            citySelect.innerHTML = '';
            switch (state) {
                case "1":
                    cities = ["Biratnagar", "Dharan", "Itahari", "Bhadrapur", "Ilam", "Mechinagar", "Phidim", "Damak", "Biratchowk", "Bhojpur", "Urlabari", "Khandbari"];
                    break;
                case "2":
                    cities = ["Janakpur", "Birgunj", "Bharatpur", "Hetauda", "Rajbiraj", "Siraha", "Lahan", "Malangawa", "Dhangadhi", "Dadeldhura", "Baitadi", "Mahendranagar"];
                    break;
                case "3":
                    cities = ["Kathmandu", "Bhaktapur", "Patan", "Kirtipur", "Banepa", "Bhimdatta", "Bhimeshwar", "Bhimeshwor", "Bidur", "Birgunj", "Butwal"];
                    break;
                case "4":
                    cities = ["Pokhara", "Baglung", "Gorkha", "Lamjung", "Kushma", "Beni", "Bharatpur", "Besisahar", "Besishahar", "Burtibang", "Chame", "Damauli"];
                    break;
                case "5":
                    cities = ["Butwal", "Nawalparasi", "Bhairahawa", "Tansen", "Parasi", "Ramgram", "Sandhikharka", "Siddharthanagar", "Waling", "Bardibas", "Biratnagar"];
                    break;
                case "6":
                    cities = ["Surkhet", "Jumla", "Dailekh", "Birendranagar", "Ghorahi", "Nepalgunj", "Tulsipur", "Khalanga", "Manma", "Musikot", "Putha", "Rukumkot"];
                    break;
                case "7":
                    cities = ["Dhangadhi", "Dadeldhura", "Baitadi", "Mahendranagar", "Dadeldhura", "Bhajani", "Dasharathchand", "Dhangadhi", "Dogadakedar", "Ghodaghodi", "Ghodaghodi Lake", "Godawari"];
                    break;
            }
            cities.forEach(city => {
                var option = document.createElement('option');
                option.text = city;
                option.value = city;
                citySelect.add(option);
            });

        }
    </script>
</section>
@endsection