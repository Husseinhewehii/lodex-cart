@extends('web.layout')

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('wishlist')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('web.home.index')}}">{{trans('home')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('wishlist')}}</li>
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
                            <th scope="col">{{trans('image')}}</th>
                            <th scope="col">{{trans('product')}} {{trans('name')}}</th>
                            <th scope="col">{{trans('price')}}</th>
                            <th scope="col">{{trans('action')}}</th>
                        </tr>
                        </thead>
                        @foreach($favoriteProducts as $favoriteProduct)
                            <tbody id="wishlist-product-{{$favoriteProduct->id}}">
                            <tr>
                                <td>
                                    <a href="#"><img src="{{$favoriteProduct->product->image->image}}" alt=""></a>
                                </td>
                                <td><a href="#">{{$favoriteProduct->product->name}}</a>
                                    <div class="mobile-cart-content row">

                                        <div class="col-xs-3">
                                            <h2 class="td-color">${{$favoriteProduct->price}}</h2>
                                        </div>
                                        <div class="col-xs-3">
                                            <h2 class="td-color"><a href="#" class="icon mr-1"><i class="ti-close"></i>
                                                </a><a href="#" class="cart"><i class="ti-shopping-cart"></i></a></h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>${{$favoriteProduct->price}}</h2>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" title="Add to Wishlist" class="icon mr-3 wishlist-btn"  data-id="{{ $favoriteProduct->id }}">
                                        <i id="remove-from_wishlist" class="ti-close"  aria-hidden="true"></i>
                                    </a>

                                    <a class="add-to-cart-click" style="cursor:pointer" data-id="{{ $favoriteProduct->id }}" title="Add to cart">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                    <input type="hidden" name="is-fav-{{ $favoriteProduct->id }}" id="is-fav-{{ $favoriteProduct->id }}" value="{{ $favoriteProduct->isFavorite ? $favoriteProduct->isFavorite : 0 }}"/>
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
