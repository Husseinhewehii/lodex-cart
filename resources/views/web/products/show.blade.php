@extends('web.layout')
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ $product->product->name }}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('web.home.index') }}">{{ trans("home") }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('web.category.products', ["category" => $product->product->category->id]) }}">{{ $product->product->category->name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->product->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-sm-2 col-xs-12">
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-right-nav">
                                    @foreach($product->product->images as $image)
                                        <div>
                                            <img src="{{ asset($image->image) }}" alt="" class="img-fluid blur-up lazyload">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-10 col-xs-12 order-up">
                        <div class="product-right-slick">
                            @foreach($product->product->images as $image)
                                <div>
                                    <img src="{{ asset($image->image) }}" alt="" class="img-fluid blur-up lazyload image_zoom_cls-0">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2>{{ $product->product->name }}</h2>
                            @if($product->priceAfterDiscount)<h4><del>${{ $product->price }}</del><span>{{$product->discount}}% off</span></h4>@endif
                            <h3>${{ $product->finalPriceAfterDiscount }}</h3>
                            <div class="product-description border-product">
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <button type="button" class="btn quantity-left-minus product-quantity" data-type="minus" data-field="" data-id="{{ $product->id }}">
                                                <i class="ti-angle-left"></i>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity-{{ $product->id }}" class="form-control" value="{{ isset(session()->get('cart')[$product->id]["quantity"]) ? session()->get('cart')[$product->id]["quantity"]: 0 }}">
                                        <span class="input-group-prepend">
                                            <button type="button" class="btn quantity-right-plus add-to-cart-click" data-type="plus" data-field="" data-id="{{ $product->id }}">
                                                <i class="ti-angle-right"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-buttons">
                                <a href="" class="btn btn-solid add-to-cart-click" title="Add to cart" data-id="{{ $product->id }}" data-toggle="modal" data-target="#addtocart">
                                    {{trans('add')}} {{trans('to')}} {{trans('cart')}}
                                </a>
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">{{trans('share_it')}}</h6>
                                <div class="product-icon">
                                    <ul class="product-social">
                                        <li><a href="{{ Share::currentPage()->facebook()->getRawLinks() }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="{{ Share::currentPage()->twitter()->getRawLinks() }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="{{ Share::currentPage()->whatsapp()->getRawLinks() }}" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                                    </ul>
                                    @if(auth()->check())
                                        <div class="d-inline-block">
                                            <a class="wishlist-btn" data-id="{{ $product->id }}">
                                                <i data-message="{{ $product->isFavorite ?  trans('item_removed_from_wishlist_successfully')  : trans('item_added_to_wishlist_successfully')  }}" class="fa fa-heart {{ $product->isFavorite ? 'red-heart' : null  }}" id="red-heart-{{ $product->id }}"></i><span class="title-font" id="heart-text-{{ $product->id }}"> {{ $product->isFavorite ? trans('remove_from_wishList') : trans('add_to_wishList')  }} </span>
                                            </a>
                                            <input type="hidden" name="is-fav-{{ $product->id }}" id="is-fav-{{ $product->id }}" value="{{ $product->isFavorite ? $product->isFavorite : 0 }}"/>
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
    <!-- Section ends -->


    <!-- product-tab starts -->
    <section class="tab-product m-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab"
                                                href="#top-home" role="tab" aria-selected="true">{{trans('description')}}</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-toggle="tab"
                                                href="#top-profile" role="tab" aria-selected="false">{{trans('details')}}</a>
                            <div class="material-border"></div>
                        </li>
                        @if(auth()->check())
                        <li class="nav-item"><a class="nav-link" id="review-top-tab" data-toggle="tab"
                                                href="#top-review" role="tab" aria-selected="false">{{trans('write')}} {{trans('review')}}</a>
                            <div class="material-border"></div>
                        </li>
                        @endif
                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel"
                             aria-labelledby="top-home-tab">
                            <p>{{ $product->product->description }}</p>
                        </div>
                        <div class="tab-pane fade " id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                            <div class="single-product-tables">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>{{trans('code')}}</td>
                                        <td>{{ $product->product->code ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{trans('discount')}}</td>
                                        <td>{{ $product->discount?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{trans('discount')}} {{trans('till')}}</td>
                                        <td>{{ $product->discount_till ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{trans('manufacturer')}}</td>
                                        <td>{{ $product->product->manufacturer ?? '-' }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if(auth()->check())
                            <div class="tab-pane fade " id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                                <form class="theme-form" id="review-form">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="media">
                                                <label>{{trans('rate')}}</label>
                                                <div class="media-body ml-3">
                                                    <div class="{{Config::get('app.locale') == 'ar' ? 'rate_direction' : null}} three-star">
                                                        <?php
                                                        $rate = $product->getRateAttribute();
                                                        if($rate <= 5 && $rate >=0){
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
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <div class="col-md-12">
                                            <div class="alert alert-success alert-has-icon alert-dismissible show fade success-message" style="display: none">
                                                <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert">
                                                        <span>×</span>
                                                    </button>
                                                    <div class="alert-title"><b>{{trans('success')}}!</b></div>
                                                    {{ trans("review_added_success") }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="rate">{{trans('your_rate')}}</label>
                                            <br>
                                            <span class="error" id="rate_error"></span>
                                            <input type="number" min="1" max="5" class="form-control" name="rate" id="rate" placeholder="{{trans('enter_your_rate_out_of_five')}}" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="review">{{trans('review')}}</label>
                                            <textarea class="form-control" name="review" placeholder="{{trans('write_your_review_here')}}" id="review" rows="6"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-solid" type="button" id="add-review-btn" data-id="{{ $product->id }}" >{{trans('submit')}} {{trans('review')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-tab ends -->



    <!-- product section start -->
    <section class="section-b-space ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col-12 product-related">
                    <h2>{{trans('related')}} {{trans('products')}}</h2>
                </div>
            </div>
            <div class="row search-product">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="product-box">
                            <div class="img-wrapper">
                            <div class="front">
                                <a href="{{ route('web.product.show', ["product" => $relatedProduct->id]) }}">
                                    <img src="{{ count($relatedProduct->product->images) ? asset($relatedProduct->product->images[0]->image) : null }}" class="img-fluid blur-up lazyload bg-img" alt="">
                                </a>
                            </div>
                            <div class="back">
                                <a href="{{ route('web.product.show', ["product" => $relatedProduct->id]) }}">
                                    <img src="{{ count($relatedProduct->product->images) ? asset($relatedProduct->product->images[0]->image) : null }}" class="img-fluid blur-up lazyload bg-img" alt="">
                                </a>
                            </div>
                            <div class="cart-info cart-wrap">
                                @if(auth()->check())
                                    <button class="add-to-cart-click" title="Add to cart" data-id="{{ $relatedProduct->id }}" data-toggle="modal" data-target="#addtocart"><i id="cart-icon-{{ $relatedProduct->id }}" data-message="{{trans('item_added_to_cart_successfully')}}"class="ti-shopping-cart"></i></button>
                                    <a id="heart-title-{{ $relatedProduct->id }}" title="{{ $relatedProduct->isFavorite ? trans('remove_from_wishList') : trans('add_to_wishList')  }}" class="wishlist-btn" data-id="{{ $relatedProduct->id }}">
                                        <i data-message="{{ $relatedProduct->isFavorite ? trans('item_removed_from_wishlist_successfully') : trans('item_added_to_wishlist_successfully')  }}" class="fa fa-heart {{ $relatedProduct->isFavorite ? 'red-heart' : null  }}" id="red-heart-{{ $relatedProduct->id }}"></i>
                                    </a>
                                    <input type="hidden" name="is-fav-{{ $relatedProduct->id }}" id="is-fav-{{ $relatedProduct->id }}" value="{{ $relatedProduct->isFavorite ? $relatedProduct->isFavorite : 0 }}"/>

                                @endif
                            </div>
                        </div>
                            <div class="product-detail">
                            <div class="{{Config::get('app.locale') == 'ar' ? 'rate_direction' : null}}">
                                <?php
                                $rate = $relatedProduct->getRateAttribute();
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
                            <a href="{{ route('web.product.show', ["product" => $relatedProduct->id]) }}">
                                <h6>{{ $relatedProduct->product->name }}</h6>
                            </a>
                            <h4>$ {{ $relatedProduct->finalPriceAfterDiscount }}</h4>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- product section end -->
@stop
@section('scripts')
    <script src="{{ url('assets/frontend/js/jquery.elevatezoom.js') }}"></script>
    <script>
        @if(auth()->check())
            $('#add-review-btn').on('click', function (e) {
            e.preventDefault();
            if($('#rate').val()<=5 && $('#rate').val()>=0){
                let accessToken = '{{ auth()->user()->createToken('User Personal Token #' . auth()->user()->id)->accessToken }}';
                let url = '{{ route("api.product.reviews.store",['product ' => "productId"]) }}';
                url = url.replace('productId', $(this).data("id"));
                $.ajax({
                    url: url,
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        'rate': $('#rate').val(),
                        'review': $('#review').val(),
                        'published': 1,
                    },
                    headers: {'Auth':'Bearer '+accessToken,},
                    success: function(response){
                        $(".error").text("");
                        $('#review-form' ).each(function(){
                            this.reset();
                        });
                        $(".success-message").css("display", "block").fadeOut(7000, function() {
                        });
                    },
                    error: function(error){
                        $(".error").text("");
                        let errors = error.responseJSON.errors;
                        console.log(errors);
                        $.each(errors, function (key, val) {
                            $("#" + key + "_error").text(val[0]);
                        });
                    }
                });
            }else{
                $('#rate_error').html('Rate Range Is Between 0 and 5');
            }
        });
        @endif
    </script>
@stop



