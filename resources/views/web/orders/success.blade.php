@extends('web.layout')
@section('content')
    <!-- thank-you section start -->
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="success-text"><i class="fa fa-check-circle" aria-hidden="true"></i>
                        <h2>{{trans('thank_you')}}</h2>
                        <p> {{trans('your_order_is_on_the_way')}}</p>
                        <p>{{trans('order')}} {{trans('id')}}: {{ $order->id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->

    <!-- order-detail section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-order">
                        <h3>{{trans('order')}} {{trans('details')}}</h3>
                        @foreach($order->products as $product)
                            <div class="row product-order-detail">
                                <div class="col-3">
                                    <img src="{{$product->product->image->image}}" alt="" class="img-fluid blur-up lazyload"></div>
                                <div class="col-3 order_detail">
                                    <div>
                                        <h4>{{trans('product')}} {{trans('name')}}</h4>
                                        <h5>{{$product->product->name}}</h5>
                                    </div>
                                </div>
                                <div class="col-3 order_detail">
                                    <div>
                                        <h4>{{trans('quantity')}}</h4>
                                        <h5>{{\App\Models\OrderProduct::where('order_id', '=', $order->id)->first()->quantity}}</h5>
                                    </div>
                                </div>
                                <div class="col-3 order_detail">
                                    <div>
                                        <h4>{{trans('price')}}</h4>
                                        <h5>${{$product->price}}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="total-sec">
                            <ul>
                                <li>{{trans('subtotal')}} <span>$ {{$orderDeliveryCost}}
                                    </span></li>
                                <li>{{trans('shipping')}} <span>${{$orderDeliveryFee}}</span></li>
                            </ul>
                        </div>
                        <div class="final-total">
                            <h3>{{trans('total')}} <span>${{$order->total_price}}</span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row order-success-sec">
                        <div class="col-sm-6">
                            <h4>{{trans('summary')}}</h4>
                            <ul class="order-detail">
                                <li>{{trans('order')}} {{trans('id')}}: {{$order->id}}</li>
                                <li>{{trans('order')}} {{trans('date')}}: {{date("F j, Y, g:i a",strtotime($order->created_at))}}</li>
                                <li>{{trans('order')}} {{trans('total')}}: ${{$order->total_price}}</li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <h4>{{trans('shipping')}} {{trans('address')}}</h4>
                            <ul class="order-detail">
                                <li>{{trans('building')}} {{$order->address->building}}</li>
                                <li>{{trans('street')}} {{$order->address->street}}.</li>
                                <li>{{trans('floor')}} {{$order->address->floor}}, {{trans('apartment')}} {{$order->address->apartment}}</li>
                                <li>{{trans('customer')}} {{trans('phone')}} {{trans('number')}}: {{\App\Models\User::find($order->user_id)->phone}}</li>
                            </ul>
                        </div>
                        <div class="col-sm-12 payment-mode">
                            <h4>{{trans('payment')}} {{trans('method')}}</h4>
                            <p>{{\App\Constants\PaymentTypes::getOne($order->payment_type)}}</p>
                        </div>
                        <div class="col-md-12">
                            <div class="delivery-sec">
                                <h3>{{trans('expected_delivery_time')}} </h3>
                                <h2>{{date("F j, Y, g:i a",strtotime($order->expected_delivery_time))}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->
@stop
@section('scripts')
@stop



