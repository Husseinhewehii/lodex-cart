@extends('web.layout')

@section('content')
    <?php
    use App\Models\User;
    use App\Models\BranchProduct;
    use App\Constants\OrderStatus;
    ?>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('orders')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('web.home.index')}}">{{trans('home')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('orders')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="wishlist-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                        <tr class="table-head">
                            <th scope="col">{{trans('order')}} {{trans('id')}}</th>
                            <th scope="col">{{trans('name')}}</th>
                            <th scope="col">{{trans('shipping')}} {{trans('address')}}</th>
                            <th scope="col">{{trans('products')}}</th>
                            <th scope="col">{{trans('total')}} {{trans('price')}}</th>
                            <th scope="col">{{trans('issue')}} {{trans('date')}}</th>
                            <th scope="col">{{trans('status')}}</th>
                            <th scope="col">{{trans('action')}}</th>
                        </tr>
                        </thead>
                        @foreach($orders as $order)
                            <?php
                                $orderProducts = $order->orderProducts()->get();
                            ?>
                            <tbody>
                            <tr>
                                <td>
                                    <p>{{$order->id}}</p>
                                </td>
                                <td>
                                    <p>{{User::find($order->user_id)->name}}</p>
                                </td>
                                <td>
                                    <p>{{trans('building')}} {{$order->address->building}}<samp>, {{trans('street')}} {{$order->address->street}}<samp>,  {{trans('floor')}} {{$order->address->floor}}, {{trans('apartment')}} {{$order->address->apartment}}</p>
                                </td>
                                <td>
                                    <ul>
                                        @foreach($orderProducts as $orderProduct)
                                            <?php $branchProduct = BranchProduct::find($orderProduct->branch_product_id) ?>
                                            <li style="display:list-item">{{$branchProduct->product->name}} <strong>({{$orderProduct->quantity}} X ${{$branchProduct->price}})</strong></li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <h4>${{$order->total_price}}</h4>
                                </td>
                                <td>
                                    <p>{{$order->created_at}}</p>
                                </td>
                                <td>
                                    <p>{{OrderStatus::getValue($order->status)}}</p>
                                </td>
                                <td>
                                    @if($order->status == \App\Constants\OrderStatus::SUBMITTED)

                                            <div class="col-12">
                                                <button href="#" class="btn btn-solid">{{trans('cancel')}}</button>
                                            </div>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--section end-->

@endsection
