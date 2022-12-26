@extends('web.layout')
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2> Cart </h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('web.home.index') }}">{{ trans("home") }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> {{ trans("cart") }} </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!--section start-->
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                        <tr class="table-head">
                            <th scope="col">{{ trans("image") }}</th>
                            <th scope="col">{{ trans("product_name") }}</th>
                            <th scope="col">{{ trans("price") }}</th>
                            <th scope="col">{{ trans("quantity") }}</th>
                            <th scope="col">{{ trans("action") }}</th>
                            <th scope="col">{{ trans("total") }}</th>
                        </tr>
                        </thead>
                        <tbody class="no-cart-product" @if(count($cartProducts)) style ="display:none"@endif>
                        <tr>
                            <td colspan="6">{{ trans("cart") }}  {{ trans("is") }} {{ trans("empty") }}.</td>
                        </tr>
                        </tbody>
                        @foreach($cartProducts as $cartProduct)
                        <tbody class="row-{{ $cartProduct["id"] }}">
                        <tr>
                            <td>
                                <a href="{{ route('web.product.show', ["product" => $cartProduct["id"]]) }}"><img src="{{ $cartProduct["image"] }}" alt=""></a>
                            </td>
                            <td><a href="{{ route('web.product.show', ["product" => $cartProduct["id"]]) }}">{{ $cartProduct["name"] }}</a>
                                <div class="mobile-cart-content row">
                                    <div class="col-xs-3">
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input type="text" min="1" name="quantity" class="form-control input-number product-quantity" value="{{ $cartProduct["quantity"] }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color">${{ $cartProduct["price"] }}</h2>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color"><a href="#" class="icon"><i class="ti-close"></i></a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>$<span id="product-price-{{ $cartProduct["id"] }}">{{ $cartProduct["price"] }}</span></h2>
                            </td>
                            <td>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <input type="number" min="1" name="quantity" class="form-control input-number product-quantity" data-id="{{ $cartProduct["id"] }}" value="{{ $cartProduct["quantity"] }}">
                                    </div>
                                </div>
                            </td>
                            <td><a href="" class="icon remove-from-cart" data-id="{{ $cartProduct["id"] }}"><i class="ti-close"></i></a></td>
                            <td>
                                <h2 class="td-color">$<span class="product-total-price" id="product-total-price-{{ $cartProduct["id"] }}">{{ $cartProduct["quantity"] * $cartProduct["price"]  }}</span></h2>
                            </td>
                        </tr>
                        </tbody>
                        @endforeach

                    </table>
                    <table class="table cart-table table-responsive-md cart-total-amount" @if(!count($cartProducts)) style ="display:none"@endif>
                        <tfoot>
                        <tr>
                            <td>{{ trans("total") }} {{ trans("price") }} :</td>
                            <td>
                                <h2>$<span id="total-order-price"></span></h2>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row cart-buttons" @if(!count($cartProducts)) style ="display:none"@endif>
                <div class="col-6"><a href="{{ route('web.home.index') }}" class="btn btn-solid">{{ trans("continue") }} {{ trans("shopping") }}</a></div>
                <div class="col-6">
                    <form method="POST" action="{{ route('web.orders.store') }}">
                        @csrf
                        <button type="submit" class="btn btn-solid">{{ trans("check_out") }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--section end-->

@stop
@section('scripts')
    <script>
        function updateTotalPrice()
        {
            let totalPrice = 0;
            $('.product-total-price').each(function(i) {
                totalPrice = parseInt(totalPrice) + parseInt($(this).text());
            });

            $('#total-order-price').text(totalPrice);
        }

        updateTotalPrice();
        $(document).on('click', '.remove-from-cart', function(e){
            e.preventDefault();
            $('.row-'+$(this).data('id')+'').remove();
            if ($('#cart-count').text() == 1) {
                $('.cart-buttons').hide();
                $('.cart-total-amount').hide();
            }
            updateTotalPrice();
        });
        /////////////////////////////////////////////////////////////////////

    </script>
@stop



