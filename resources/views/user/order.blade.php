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

            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2 class="h5 mb-0 pt-2 pb-2">My Orders</h2>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Orders #</th>
                                        <th>Date Purchased</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            <a href="/orderDetail/{{$order->id}}">{{$order->order_code}}</a>
                                        </td>
                                        <td>{{$order->created_at}}</td>
                                        <td>
                                            <span class="badge bg-success">{{$order->order_status}}</span>
                                        </td>
                                        <?php 
                                        $subtotal = 0;
                                        ?>
                                        @foreach($order->order_details as $order_detail)
                                        <?php 
                                        $subtotal = $subtotal + ($order_detail->price * $order_detail->stock);
                                        ?>  
                                        @endforeach
                                        <td>{{$subtotal}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection