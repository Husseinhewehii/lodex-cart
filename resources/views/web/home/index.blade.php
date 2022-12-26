@extends('web.layout')

@section('content')

    @include('web.session_message')

    <!-- Home slider -->
    @if(count($sliders))
        <section class="p-0">
            <div class="slide-1 home-slider">
                @foreach($sliders as $slider)
                    <div>
                        <div class="home text-center">
                            <img src="{{$slider->image}}" alt="" class="bg-img blur-up lazyload">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="slider-contain">
                                            <div>
                                                <h4>{{$slider->title}}</h4>
                                                <h1>{{$slider->description}}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
    <!-- Home slider end -->


    <!-- collection banner -->
    <section class="banner-padding absolute-banner pb-0">
        <div class="container absolute-bg">
            <div class="service p-0">
                <div class="row">
                    @foreach($features as $feature)
                        <div class="col-md-4 service-block">
                            <div class="media">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -117 679.99892 679">
                                    <path
                                        d="m12.347656 378.382812h37.390625c4.371094 37.714844 36.316407 66.164063 74.277344 66.164063 37.96875 0 69.90625-28.449219 74.28125-66.164063h241.789063c4.382812 37.714844 36.316406 66.164063 74.277343 66.164063 37.96875 0 69.902344-28.449219 74.285157-66.164063h78.890624c6.882813 0 12.460938-5.578124 12.460938-12.460937v-352.957031c0-6.882813-5.578125-12.464844-12.460938-12.464844h-432.476562c-6.875 0-12.457031 5.582031-12.457031 12.464844v69.914062h-105.570313c-4.074218.011719-7.890625 2.007813-10.21875 5.363282l-68.171875 97.582031-26.667969 37.390625-9.722656 13.835937c-1.457031 2.082031-2.2421872 4.558594-2.24999975 7.101563v121.398437c-.09765625 3.34375 1.15624975 6.589844 3.47656275 9.003907 2.320312 2.417968 5.519531 3.796874 8.867187 3.828124zm111.417969 37.386719c-27.527344 0-49.851563-22.320312-49.851563-49.847656 0-27.535156 22.324219-49.855469 49.851563-49.855469 27.535156 0 49.855469 22.320313 49.855469 49.855469 0 27.632813-22.21875 50.132813-49.855469 50.472656zm390.347656 0c-27.53125 0-49.855469-22.320312-49.855469-49.847656 0-27.535156 22.324219-49.855469 49.855469-49.855469 27.539063 0 49.855469 22.320313 49.855469 49.855469.003906 27.632813-22.21875 50.132813-49.855469 50.472656zm140.710938-390.34375v223.34375h-338.375c-6.882813 0-12.464844 5.578125-12.464844 12.460938 0 6.882812 5.582031 12.464843 12.464844 12.464843h338.375v79.761719h-66.421875c-4.382813-37.710937-36.320313-66.15625-74.289063-66.15625-37.960937 0-69.898437 28.445313-74.277343 66.15625h-192.308594v-271.324219h89.980468c6.882813 0 12.464844-5.582031 12.464844-12.464843 0-6.882813-5.582031-12.464844-12.464844-12.464844h-89.980468v-31.777344zm-531.304688 82.382813h99.703125v245.648437h-24.925781c-4.375-37.710937-36.3125-66.15625-74.28125-66.15625-37.960937 0-69.90625 28.445313-74.277344 66.15625h-24.929687v-105.316406l3.738281-5.359375h152.054687c6.882813 0 12.460938-5.574219 12.460938-12.457031v-92.226563c0-6.882812-5.578125-12.464844-12.460938-12.464844h-69.796874zm-30.160156 43h74.777344v67.296875h-122.265625zm0 0"
                                        fill="#ff4c3b" />
                                </svg>
                                <div class="media-body">
                                    <h4>{{$feature->title}}</h4>
                                    <p>{{$feature->description}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- collection banner end -->


    <!-- product section -->
    <section class="section-b-space addtocart_count ratio_square">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title4">
                        <h2 class="title-inner4">{{trans('trending_products')}}</h2>
                        <div class="line"><span></span></div>
                    </div>
                    <div class="product-5 product-m no-arrow">
                        @foreach($trendingProducts as $trendingProduct)
                            <div class="product-box product-wrap">
                            <div class="img-wrapper">
                                <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                        sale</span></div>
                                <div class="front">
                                    <a href="{{ route('web.product.show', ["product" => $trendingProduct->id]) }}">
                                        <img src="{{$trendingProduct->product->image->image}}" class="img-fluid blur-up lazyload bg-img" alt="">
                                    </a>
                                </div>
                                @if(auth()->check())
                                    <div class="cart-info cart-wrap ">
                                        <a id="heart-title-{{ $trendingProduct->id }}" title="{{ $trendingProduct->isFavorite ? trans('remove_from_wishList') : trans('add_to_wishList')  }}" class="wishlist-btn" data-id="{{ $trendingProduct->id }}">
                                            <i data-message="{{ $trendingProduct->isFavorite ? trans('item_removed_from_wishlist_successfully') : trans('item_added_to_wishlist_successfully')  }}" class="fa fa-heart {{ $trendingProduct->isFavorite ? 'red-heart' : null  }}" id="red-heart-{{ $trendingProduct->id }}"></i>
                                        </a>
                                        <input type="hidden" name="is-fav-{{ $trendingProduct->id }}" id="is-fav-{{ $trendingProduct->id }}" value="{{ $trendingProduct->isFavorite ? $trendingProduct->isFavorite : 0 }}"/>
                                    </div>
                                @endif
                                <div class="addtocart_btn">
                                    <button class="add-button add_cart add-to-cart-click" title="Add to cart" data-id="{{ $trendingProduct->id }}">
                                        {{trans('add')}} {{trans('to')}} {{trans('cart')}}
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn quantity-left-minus product-quantity" data-type="minus" data-field="" data-id="{{ $trendingProduct->id }}">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input type="text" name="quantity" id="quantity-{{ $trendingProduct->id }}"  class="form-control input-number" value="{{ isset(session()->get('cart')[$trendingProduct->id]["quantity"]) ? session()->get('cart')[$trendingProduct->id]["quantity"]: 0 }}">
                                            <button type="button" class="btn quantity-right-plus add-to-cart-click" data-type="plus" data-field="" data-id="{{ $trendingProduct->id }}">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-detail text-center">
                                <div class="{{Config::get('app.locale') == 'ar' ? 'rate_direction' : null}}">
                                    <?php
                                        $rate = $trendingProduct->getRateAttribute();
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
                                <a href="{{ route('web.product.show', ["product" => $trendingProduct->id]) }}">
                                    <h6>{{$trendingProduct->product->name}}</h6>
                                </a>
                                @if($trendingProduct->priceAfterDiscount)
                                    <h4>$ {{ $trendingProduct->priceAfterDiscount }} <del>${{$trendingProduct->price}}</del></h4>
                                @else
                                    <h4>${{$trendingProduct->price}}</h4>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product section end -->

    <!-- Parallax banner -->
    @if($homeBanner)
        <section class="p-0">
        <div class="full-banner parallax text-left p-left">
        <img src="{{$homeBanner->image}}" alt="" class="bg-img blur-up lazyload">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="banner-contain">
                        <h3>{{$homeBanner->title}}</h3>
                        <h4>{{$homeBanner->description}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>
    @endif
    <!-- Parallax banner end -->

    <!-- product-box slider -->
    <section class="section-b-space addtocart_count">
        <div class="full-box">
            <div class="container">
                <div class="title4">
                    <h2 class="title-inner4"> {{trans('special_products')}}</h2>
                    <div class="line"><span></span></div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="theme-card center-align">
                            <div class="offer-slider">
                                <div class="sec-1">
                                    @if(isset($specialProducts[0]))
                                        <div class="product-box2">
                                            <div class="media">
                                                <a href="{{ route('web.product.show', ["product" => $specialProducts[0]->id]) }}">
                                                    <img class="img-fluid blur-up lazyload" src="{{$specialProducts[0]->product->image->image}}" alt="">
                                                </a>
                                                <div class="media-body align-self-center">
                                                    <div class="{{Config::get('app.locale') == 'ar' ? 'rate_direction' : null}}">
                                                        <?php
                                                        $rate = $specialProducts[0]->getRateAttribute();
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
                                                    <a href="{{ route('web.product.show', ["product" => $specialProducts[0]->id]) }}">
                                                        <h6>{{$specialProducts[0]->product->name}}</h6>
                                                    </a>
                                                    @if($specialProducts[0]->priceAfterDiscount)
                                                        <h4>$ {{ $specialProducts[0]->priceAfterDiscount }} <del>${{$specialProducts[0]->price}}</del></h4>
                                                    @else
                                                        <h4>${{$specialProducts[0]->price}}</h4>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($specialProducts[1]))
                                        <div class="product-box2">
                                            <div class="media">
                                                <a href="{{ route('web.product.show', ["product" => $specialProducts[1]->id]) }}"><img
                                                        class="img-fluid blur-up lazyload"
                                                        src="{{$specialProducts[1]->product->image->image}}" alt=""></a>

                                                <div class=" {{Config::get('app.locale') == 'ar' ? 'rate_direction' : null}} media-body align-self-center">
                                                    <?php
                                                    $rate = $specialProducts[1]->getRateAttribute();
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
                                                    <a href="{{ route('web.product.show', ["product" => $specialProducts[1]->id]) }}">
                                                        <h6>{{$specialProducts[1]->product->name}}</h6>
                                                    </a>
                                                    @if($specialProducts[1]->priceAfterDiscount)
                                                        <h4>$ {{ $specialProducts[1]->priceAfterDiscount }} <del>${{$specialProducts[1]->price}}</del></h4>
                                                    @else
                                                        <h4>${{$specialProducts[1]->price}}</h4>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 center-slider">
                        @if(isset($specialProducts[2]))
                            <div>
                            <div class="offer-slider">
                                <div>
                                    <div class="product-box product-wrap">
                                        <div class="img-wrapper">
                                            <div class="front">
                                                <a href="{{ route('web.product.show', ["product" => $specialProducts[2]->id]) }}"><img
                                                        src="{{$specialProducts[2]->product->image->image}}"
                                                        class="img-fluid blur-up lazyload" alt=""></a>
                                            </div>
                                            @if(auth()->check())
                                                <div class="cart-info cart-wrap ">
                                                    <a id="heart-title-{{ $specialProducts[2]->id }}" title="{{ $specialProducts[2]->isFavorite ? trans('remove_from_wishList') : trans('add_to_wishList')  }}" class="wishlist-btn" data-id="{{ $specialProducts[2]->id }}">
                                                        <i data-message="{{ $specialProducts[2]->isFavorite ? trans('item_removed_from_wishlist_successfully') : trans('item_added_to_wishlist_successfully')  }}" class="fa fa-heart {{ $specialProducts[2]->isFavorite ? 'red-heart' : null  }}" id="red-heart-{{ $specialProducts[2]->id }}"></i>
                                                    </a>
                                                    <input type="hidden" name="is-fav-{{ $specialProducts[2]->id }}" id="is-fav-{{ $specialProducts[2]->id }}" value="{{ $specialProducts[2]->isFavorite ? $specialProducts[2]->isFavorite : 0 }}"/>
                                                </div>
                                            @endif
                                            <div class="addtocart_btn">
                                                <button class="add-button add_cart add-to-cart-click" title="Add to cart" data-id="{{ $specialProducts[2]->id }}">
                                                    {{trans('add')}} {{trans('to')}} {{trans('cart')}}
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn quantity-left-minus product-quantity" data-type="minus" data-field="" data-id="{{ $specialProducts[2]->id }}">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input type="text" name="quantity" id="quantity-{{ $specialProducts[2]->id }}"  class="form-control input-number" value="{{ isset(session()->get('cart')[$specialProducts[2]->id]["quantity"]) ? session()->get('cart')[$specialProducts[2]->id]["quantity"]: 0 }}">
                                                        <button type="button" class="btn quantity-right-plus add-to-cart-click" data-type="plus" data-field="" data-id="{{ $specialProducts[2]->id }}">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" {{Config::get('app.locale') == 'ar' ? 'rate_direction' : null}} product-detail text-center">
                                            <?php
                                            $rate = $specialProducts[2]->getRateAttribute();
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
                                            <a href="{{ route('web.product.show', ["product" => $specialProducts[2]->id]) }}">
                                                <h6>{{$specialProducts[2]->product->name}}</h6>
                                            </a>
                                            @if($specialProducts[2]->priceAfterDiscount)
                                                <h4>$ {{ $specialProducts[2]->priceAfterDiscount }} <del>${{$specialProducts[2]->price}}</del></h4>
                                            @else
                                                <h4>${{$specialProducts[2]->price}}</h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="theme-card center-align">
                            <div class="offer-slider">
                                <div class="sec-1">
                                    @if(isset($specialProducts[3]))
                                         <div class="product-box2">
                                            <div class="media">
                                            <a href="{{ route('web.product.show', ["product" => $specialProducts[3]->id]) }}"><img
                                                    class="img-fluid blur-up lazyload"
                                                    src="{{$specialProducts[3]->product->image->image}}" alt=""></a>
                                            <div class="{{Config::get('app.locale') == 'ar' ? 'rate_direction' : null}} media-body align-self-center">
                                                <?php
                                                $rate = $specialProducts[3]->getRateAttribute();
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
                                                <a href="{{ route('web.product.show', ["product" => $specialProducts[3]->id]) }}">
                                                    <h6>{{$specialProducts[3]->product->name}}</h6>
                                                </a>
                                                @if($specialProducts[3]->priceAfterDiscount)
                                                    <h4>$ {{ $specialProducts[3]->priceAfterDiscount }} <del>${{$specialProducts[3]->price}}</del></h4>
                                                @else
                                                    <h4>${{$specialProducts[3]->price}}</h4>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(isset($specialProducts[4]))
                                        <div class="product-box2">
                                         <div class="media">
                                            <a href="{{ route('web.product.show', ["product" => $specialProducts[4]->id]) }}"><img
                                                    class="img-fluid blur-up lazyload"
                                                    src="{{$specialProducts[4]->product->image->image}}" alt=""></a>
                                            <div class="{{Config::get('app.locale') == 'ar' ? 'rate_direction' : null}} media-body align-self-center">
                                                <?php
                                                $rate = $specialProducts[4]->getRateAttribute();
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
                                                <a href="{{ route('web.product.show', ["product" => $specialProducts[4]->id]) }}">
                                                    <h6>{{$specialProducts[4]->product->name}}</h6>
                                                </a>
                                                @if($specialProducts[4]->priceAfterDiscount)
                                                    <h4>$ {{ $specialProducts[4]->priceAfterDiscount }} <del>${{$specialProducts[4]->price}}</del></h4>
                                                @else
                                                    <h4>${{$specialProducts[4]->price}}</h4>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-box slider end -->

    <!-- Categories section-->
    @foreach($trendingCategories as $trendingCategory)
        <section class="section-b-space addtocart_count ratio_square">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="title4">
                            <h2 class="title-inner4">{{$trendingCategory->name}} {{trans('category')}}</h2>
                            <div class="line"><span></span></div>
                        </div>
                        <div class="product-5 product-m no-arrow">
                            @foreach($trendingCategory->trendingBranchProducts as $branchProduct)
                                <div class="product-box product-wrap">
                                    <div class="img-wrapper">
                                        <div class="front">
                                            <a href="{{ route('web.product.show', ["product" => $branchProduct->id]) }}">
                                                <img src="{{$branchProduct->product->image->image}}" class="img-fluid blur-up lazyload bg-img" alt="">
                                            </a>
                                        </div>

                                        @if(auth()->check())
                                            <div class="cart-info cart-wrap ">
                                                <a id="heart-title-{{ $branchProduct->id }}" title="{{ $branchProduct->isFavorite ? trans('remove_from_wishList') : trans('add_to_wishList')  }}" class="wishlist-btn" data-id="{{ $branchProduct->id }}">
                                                    <i data-message="{{ $branchProduct->isFavorite ? trans('item_removed_from_wishlist_successfully') : trans('item_added_to_wishlist_successfully')  }}" class="fa fa-heart {{ $branchProduct->isFavorite ? 'red-heart' : null  }}" id="red-heart-{{ $branchProduct->id }}"></i>
                                                </a>
                                                <input type="hidden" name="is-fav-{{ $branchProduct->id }}" id="is-fav-{{ $branchProduct->id }}" value="{{ $branchProduct->isFavorite ? $branchProduct->isFavorite : 0 }}"/>
                                            </div>
                                        @endif

                                        <div class="addtocart_btn">
                                            <button class="add-button add_cart add-to-cart-click" title="Add to cart" data-id="{{ $branchProduct->id }}">
                                                {{trans('add')}} {{trans('to')}} {{trans('cart')}}
                                            </button>
                                            <div class="qty-box cart_qty">
                                                <div class="input-group">
                                                    <button type="button" class="btn quantity-left-minus product-quantity" data-type="minus" data-field="" data-id="{{ $branchProduct->id }}">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                    <input type="text" name="quantity" id="quantity-{{ $branchProduct->id }}"  class="form-control input-number" value="{{ isset(session()->get('cart')[$branchProduct->id]["quantity"]) ? session()->get('cart')[$branchProduct->id]["quantity"]: 0 }}">
                                                    <button type="button" class="btn quantity-right-plus add-to-cart-click" data-type="plus" data-field="" data-id="{{ $branchProduct->id }}">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-detail text-center">
                                        <div class="{{Config::get('app.locale') == 'ar' ? 'rate_direction' : null}}">
                                            <?php
                                            $rate = $branchProduct->getRateAttribute();
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
                                        <a href="{{ route('web.product.show', ["product" => $branchProduct->id]) }}">
                                            <h6>{{$branchProduct->product->name}}</h6>
                                        </a>
                                        @if($branchProduct->priceAfterDiscount)
                                            <h4>$ {{ $branchProduct->priceAfterDiscount }} <del>${{$branchProduct->price}}</del></h4>
                                        @else
                                            <h4>${{$branchProduct->price}}</h4>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    <!-- Categories section end-->
@stop
