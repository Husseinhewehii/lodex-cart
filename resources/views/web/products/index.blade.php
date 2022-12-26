@extends('web.layout')
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ $category->name }}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('web.home.index') }}">{{ trans("home") }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 collection-filter">
                        @if($productBanner)
                        <div class="collection-sidebar-banner">
                            <a href="{{$productBanner->url}}"><img src="{{ asset($productBanner->image) }}" class="img-fluid blur-up lazyload" alt=""></a>
                        </div>
                        @endif
                        <br>
                        <div class="theme-card">
                            <h5 class="title-border">{{ trans("new") }} {{ trans("products") }}</h5>
                            <div class="offer-slider slide-1">
                                <div>
                                    @php $count = count($newProducts) > 3 ? 3 : count($newProducts); @endphp
                                    @for($j = 0; $j < $count; $j++)
                                        <div class="media">
                                        <a href="{{ route('web.product.show', ["product" => $newProducts[$j]->id]) }}"><img class="img-fluid blur-up lazyload" src="{{ count($newProducts[$j]->product->images) ? asset($newProducts[$j]->product->images[0]->image) : null }}" alt=""></a>
                                        <div class=" media-body align-self-center">
                                            <div class="">
                                                @for($i = 0; $i < $newProducts[$j]->rate; $i++)
                                                    <i style="color: orange" class="fa fa-star"></i>
                                                @endfor
                                                @for($i = 0; $i < (5-$newProducts[$j]->rate); $i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                            </div>
                                            <a href="{{ route('web.product.show', ["product" => $newProducts[$j]->id]) }}">
                                                <h6>{{ $newProducts[$j]->product->name }}</h6>
                                            </a>
                                            <h4>$ {{ $newProducts[$j]->finalPriceAfterDiscount }}</h4>
                                        </div>
                                    </div>
                                    @endfor
                                </div>
                                <div>
                                    @for($h = $j; $h < count($newProducts); $h++)
                                        <div class="media">
                                            <a href="{{ route('web.product.show', ["product" => $newProducts[$h]->id]) }}"><img class="img-fluid blur-up lazyload" src="{{ count($newProducts[$h]->product->images) ? asset($newProducts[$h]->product->images[0]->image) : null }}" alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="">
                                                    @for($i = 0; $i < $newProducts[$h]->rate; $i++)
                                                        <i style="color: orange" class="fa fa-star"></i>
                                                    @endfor
                                                    @for($i = 0; $i < (5-$newProducts[$h]->rate); $i++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                </div>
                                                <a href="{{ route('web.product.show', ["product" => $newProducts[$h]->id]) }}">
                                                    <h6>{{ $newProducts[$h]->product->name }}</h6>
                                                </a>
                                                <h4>$ {{ $newProducts[$h]->finalPriceAfterDiscount }}</h4>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top-banner-wrapper">
                                        @if($category->image)
                                        <a href=""><img src="{{ asset($category->image) }}" class="img-fluid blur-up lazyload" alt=""></a>
                                        @endif
                                            <div class="top-banner-content small-section">
                                            <h4>{{ $category->name }}</h4>
                                            @if($category->activeChildren()->count())
                                                <ul>
                                                    @foreach($category->activeChildren as $categoryy)
                                                        <li><a href="{{ route('web.category.products', ["category" => $categoryy->id]) }}">{{$categoryy->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> {{ trans("Filter") }}</span></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                        <div class="collection-view">
                                                            <ul>
                                                                <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="collection-grid-view">
                                                            <ul>
                                                                <li><img src="{{ url('assets/frontend/images/icon/2.png') }}" alt="" class="product-2-layout-view"></li>
                                                                <li><img src="{{ url('assets/frontend/images/icon/3.png') }}" alt="" class="product-3-layout-view"></li>
                                                                <li><img src="{{ url('assets/frontend/images/icon/4.png') }}" alt="" class="product-4-layout-view"></li>
                                                                <li><img src="{{ url('assets/frontend/images/icon/6.png') }}" alt="" class="product-6-layout-view"></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res">
                                                @foreach($list as $product)
                                                    <div class="col-xl-3 col-6 col-grid-box">
                                                            <div class="product-box">
                                                                <div class="img-wrapper">
                                                                    <div class="front">
                                                                        <a href="{{ route('web.product.show', ["product" => $product->id]) }}"><img src="{{ count($product->images) ? asset($product->images[0]->image) : null }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                                    </div>
                                                                    <div class="back">
                                                                        <a href="{{ route('web.product.show', ["product" => $product->branchProducts[0]->id]) }}"><img src="{{ count($product->images) ? asset($product->images[0]->image) : null }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                                    </div>
                                                                    <div class="cart-info cart-wrap">
                                                                        <button class="add-to-cart-click" data-id="{{ $product->branchProducts[0]->id }}" data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                                            <i id="cart-icon-{{ $product->id }}" data-message="{{trans('item_added_to_cart_successfully')}}" class="ti-shopping-cart"></i>
                                                                        </button>

                                                                        <a id="heart-title-{{ $product->id }}" title="{{ $product->isFavorite ? trans('remove_from_wishList') : trans('add_to_wishList')  }}" class="wishlist-btn" data-id="{{ $product->id }}">
                                                                            <i data-message="{{ $product->isFavorite ? trans('item_removed_from_wishlist_successfully') : trans('item_added_to_wishlist_successfully')  }}" class="fa fa-heart {{ $product->isFavorite ? 'red-heart' : null  }}" id="red-heart-{{ $product->id }}"></i>
                                                                        </a>
                                                                        <input type="hidden" name="is-fav-{{ $product->id }}" id="is-fav-{{ $product->id }}" value="{{ $product->isFavorite ? $product->isFavorite : 0 }}"/>
                                                                    </div>
                                                                </div>
                                                                <div class="product-detail">
                                                                    <div>

                                                                        <div class="{{Config::get('app.locale') == 'ar' ? 'rate_direction' : null}}">
                                                                            <?php
                                                                            $rate = $product->branchProducts[0]->getRateAttribute();
                                                                            if($rate <= 5 && $rate >-1){
                                                                                $dimmed_stars = 5-$rate;

                                                                                $color = 'orange';
                                                                                while($rate > 0){
                                                                                    echo '<i style="color:'.$color.'" class="fa fa-star"></i>';
                                                                                    $rate--;
                                                                                }

                                                                                $color='gray';
                                                                                for($i=1; $i<=$dimmed_stars; $i++){
                                                                                    echo '<i style="color:'.$color.'" class="fa fa-star"></i>';
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                        <a href="{{ route('web.product.show', ["product" => $product->branchProducts[0]->id]) }}">
                                                                            <h6>{{ $product->name }}</h6>
                                                                        </a>
                                                                        <h4>$ {{ $product->branchProducts[0]->finalPriceAfterDiscount }}</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="product-pagination">
                                            {{ $list->links('web.pagination', ["list" => $list]) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section End -->
@stop
@section('scripts')
    <script src="{{ url('assets/frontend/js/price-range.js') }}"></script>
@stop



