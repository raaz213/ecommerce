@extends('user.layout.main')
@section('content')
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="/">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="/shop">Shop</a></li>
                <li class="breadcrumb-item">Cart</li>
            </ol>
        </div>
    </div>
</section>

<section class=" section-9 pt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table" id="cart">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $subTotal = 0;

                            ?>
                            @foreach($carts as $cart)
                            @php
                            $imagePath = is_array($cart->product->images) ? $cart->product->images[0] : $cart->product->images;
                            @endphp
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('storage/'.$imagePath) }}" width="" height="">
                                        <h2>{{$cart->product->name}}</h2>
                                    </div>
                                </td>
                                <td>{{$cart->product->price}}</td>
                                <td>
                                    <form action="/updateCart/{{$cart->id}}" class="updateForm" method="post">
                                        @csrf
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1 qtyDecrease">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="stock" class="form-control form-control-sm  border-0 text-center" value="{{$cart->stock}}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1 qtyIncrease">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td>
                        {{$cart->product->price * $cart->stock}}
                                </td>
                                <td>
                                    <button  class="btn btn-sm btn-danger"><a href="/deleteCart/{{$cart->id}}"> <i class="fa fa-times"></a></i></button>
                                </td>
                            </tr>
                            <?php 
                            $subTotal += $cart->product->price * $cart->stock;
                            ?>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card cart-summery">
                    <div class="sub-title">
                        <h2 class="bg-white">Cart Summery</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between pb-2">
                            <div>Subtotal</div>
                            <div>${{$subTotal}}</div>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <div>Shipping</div>
                            <div>$100</div>
                        </div>
                        <div class="d-flex justify-content-between summery-end">
                            <div>Total</div>
                            <div>${{$subTotal+100}}</div>
                        </div>
                        <div class="pt-5">
                            <button>Proceed To Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const updateForms = document.querySelectorAll('.updateForm');

    updateForms.forEach(updateForm => {
        const qtyDecrease = updateForm.querySelector('.qtyDecrease');
        const qtyIncrease = updateForm.querySelector('.qtyIncrease');
        const stock = updateForm.querySelector('input[name="stock"]');

        qtyDecrease.addEventListener('click', function() {
            if (stock.value > 1) {
                stock.value--;
                updateForm.submit();
            }
        });

        qtyIncrease.addEventListener('click', function() {
            stock.value++;
            updateForm.submit();
        });
    });
</script>

@endsection