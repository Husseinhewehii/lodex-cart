<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="{{ url('assets/frontend/images/favicon/1.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('assets/frontend/images/favicon/1.png') }}" type="image/x-icon">
    <title>Lodex Cart</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/price-range.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/fontawesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/fontawesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/color1.css') }}" media="screen" id="color">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/custom.css') }}">
</head>
    <body class="{{Config::get('app.locale') == 'ar' ? 'rtl' : null}}" >
        <!-- Start Nave -->
        @include('web.home_navbar')
        <!-- End Nave -->


        <div id="app">
            @yield('content')
        </div>

        <!-- footer start -->
        <footer class="footer-light">
            <div class="light-layout">
                <div class="container">
                    <section class="small-section border-section border-top-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="subscribe">
                                    <div>
                                        <h4>{{trans('know_it_all_first')}}!</h4>
                                        <p>{{trans('never_miss_anything_by_signing_up_to_our_newsletter')}} {{\App\Models\Setting::getSettingByKey('WELCOME_TITLE')->value}} .</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <!-- The Modal -->
                                <div id="subscribeModal" class="subscribeModal">

                                    <!-- Modal content -->
                                    <div class="subscribe-modal-content">
                                        <span class="subscribeClose">&times;</span>
                                        <p id="subscribe_msg"></p>
                                    </div>

                                </div>

                                <form
                                    action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda"
                                    class="form-inline subscribe-form auth-form needs-validation" method="post"
                                    id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                                    <div class="form-group mx-sm-3">
                                        <input type="text" class="form-control" name="EMAIL" id="mce-EMAIL"
                                               placeholder="{{trans('enter')}} {{trans('your_email')}}" required="required">
                                    </div>
                                    <button type="submit" class="btn btn-solid" id="mc-submit">{{trans('subscribe')}}</button>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <section class="section-b-space light-layout">
                <div class="container">
                    <div class="row footer-theme partition-f">
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-title footer-mobile-title">
                                <h4>{{trans('about')}}</h4>
                            </div>
                            <div class="footer-contant">
                                @if(\App\Models\Setting::getSettingByKey('LOGO')->active)
                                    <a href="{{ route('web.home.index') }}"><img src="{{ url(\App\Models\Setting::getSettingByKey('LOGO')->value) }}" class="img-fluid blur-up lazyload" alt=""></a>
                                @endif
                                @if(\App\Models\Setting::getSettingByKey('ABOUT')->active)
                                    <p>{{\App\Models\Setting::getSettingByKey('ABOUT')->value}}</p>
                                @endif
                                <div class="footer-social">
                                    <ul>
                                        @if(\App\Models\Setting::getSettingByKey('FACEBOOK_URL')->active)
                                            <li><a href="{{\App\Models\Setting::getSettingByKey('FACEBOOK_URL')->value}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        @endif
                                        @if(\App\Models\Setting::getSettingByKey('GMAIL_URL')->active)
                                            <li><a href="{{\App\Models\Setting::getSettingByKey('GMAIL_URL')->value}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        @endif
                                        @if(\App\Models\Setting::getSettingByKey('TWITTER_URL')->active)
                                            <li><a href="{{\App\Models\Setting::getSettingByKey('TWITTER_URL')->value}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        @endif
                                        @if(\App\Models\Setting::getSettingByKey('INSTAGRAM_URL')->active)
                                            <li><a href="{{\App\Models\Setting::getSettingByKey('INSTAGRAM_URL')->value}}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col offset-xl-1">
                            <div class="sub-title">
                                <div class="footer-title">
                                    <h4>{{trans('categories')}}</h4>
                                </div>
                                <div class="footer-contant">
                                    <ul>
                                        @foreach($sideBarCategories as $category)
                                         <li><a href="{{ route('web.home.index') }}">{{$category->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="sub-title">
                                <div class="footer-title">
                                    <h4>{{trans('store')}} {{trans('information')}}</h4>
                                </div>
                                <div class="footer-contant">
                                    <ul class="contact-list">
                                        @if(\App\Models\Setting::getSettingByKey('ADDRESS')->active)
                                            <li><i class="fa fa-map-marker"></i>{{\App\Models\Setting::getSettingByKey('ADDRESS')->value}}</li>
                                        @endif

                                        @if(\App\Models\Setting::getSettingByKey('MOBILE')->active)
                                            <li><i class="fa fa-phone"></i>{{trans('call_us')}} : {{\App\Models\Setting::getSettingByKey('MOBILE')->value}}</li>
                                        @endif

                                        @if(\App\Models\Setting::getSettingByKey('EMAIL')->active)
                                            <li><i class="fa fa-envelope-o"></i>{{trans('email_us')}}: {{\App\Models\Setting::getSettingByKey('EMAIL')->value}}</li>
                                        @endif

                                        @if(\App\Models\Setting::getSettingByKey('FAX')->active)
                                            <li><i class="fa fa-fax"></i>{{trans('fax')}}: {{\App\Models\Setting::getSettingByKey('FAX')->value}}</li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="footer-end">
                                <p><i class="fa fa-copyright" aria-hidden="true"></i> 2017-18 themeforest powered by
                                    pixelstrap</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="payment-card-bottom">
                                <ul>
                                    <li>
                                        <a href="#"><img src="../assets/frontend/images/icon/visa.png" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="../assets/frontend/images/icon/mastercard.png" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="../assets/frontend/images/icon/paypal.png" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="../assets/frontend/images/icon/american-express.png" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="../assets/frontend/images/icon/discover.png" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->


        <!-- theme setting -->
        <div  id="setting_box" class="setting-box">
            <div class="setting_box_body">
                <div class="setting-body">
                    <div class="setting-title">
                        <h4>color picker</h4>
                    </div>
                    <div class="setting-contant">
                        <ul class="color-box">
                            <li>
                                <input id="ColorPicker1" type="color" value="#ff4c3b" name="Background">
                                <span>theme deafult color</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- theme setting -->

        <!--modal popup end-->


        <!-- tap to top start -->
        <div class="tap-top">
            <div><i class="fa fa-angle-double-up"></i></div>
        </div>
        <!-- tap to top end -->
        <script src="{{ url('assets/frontend/js/jquery-3.3.1.min.js') }}"></script>

        <!-- menu js-->
        <script src="{{ url('assets/frontend/js/menu.js') }}"></script>

        <!-- lazyload js-->
        <script src="{{ url('assets/frontend/js/lazysizes.min.js') }}"></script>

        <!-- popper js-->
        <script src="{{ url('assets/frontend/js/popper.min.js') }}"></script>

        <!-- slick js-->
        <script src="{{ url('assets/frontend/js/slick.js') }}"></script>

        <!-- Bootstrap js-->
        <script src="{{ url('assets/frontend/js/bootstrap.js') }}"></script>

        <!-- Bootstrap Notification js-->
        <script src="{{ url('assets/frontend/js/bootstrap-notify.min.js') }}"></script>

        <!-- Theme js-->
        <script src="{{ url('assets/frontend/js/script.js') }}"></script>

{{--        <script src="{{ url('js/share.js') }}"></script>--}}

        @yield('scripts')

        <script>
            $(window).on('load', function () {
                setTimeout(function () {
                    $('#exampleModal').modal('show');
                }, 2500);
            });

            function openSearch() {
                document.getElementById("search-overlay").style.display = "block";
            }

            function closeSearch() {
                document.getElementById("search-overlay").style.display = "none";
            }
        </script>
        <script>

            /////////////////////////////////////////////////////////////////
                function updateTotalPrice()
                {
                    let totalPrice = 0;
                    $('.product-total-price').each(function(i) {
                        totalPrice = parseInt(totalPrice) + parseInt($(this).text());
                    });

                    $('#total-order-price').text(totalPrice);
                }
                $(document).on('click', '.add-to-cart-click', function(e){
                    e.preventDefault();
                    {{--let accessToken = '{{ auth()->user()->createToken('User Personal Token #' . auth()->user()->id)->accessToken }}';--}}
                    let url = '{{ route("web.add.to.cart",['product ' => "productId"]) }}';
                    url = url.replace('productId', $(this).data("id"));

                    let oldQuantity = $('#quantity-'+$(this).data("id")+'').val();
                    $('#quantity-'+$(this).data("id")+'').val(parseInt(oldQuantity) + parseInt(1));

                    $.ajax({
                        url: url,
                        type: 'get',
                        data: {_token: '{{ csrf_token() }}'},
                        // headers: {'Auth':'Bearer '+accessToken,},
                        success: function(response){
                            let productsId = [];
                            $('.shopping-cart-ul li').each(function(i) {
                                productsId.push($(this).attr('id'));
                            });

                            $('.no-cart-product').hide();
                            $('#last-cart-li').show();

                            if (! productsId.includes(""+response.product.id+"")) {
                                $('#cart_status').html('');
                                $('#cart-count').show();
                                $('#cart-count').html(parseInt($('#cart-count').html(), 10)+1);
                                let switchArabicClass = "{{Config::get('app.locale') == 'ar' ? 'cart_direction' : null}}";
                                let html = '<li id="' + response.product.id + '" class="list-' + response.product.id + '">\n' +
                                    '          <div class="media">\n' +
                                    '              <a href=""><img class="mr-3"\n' +
                                    '                    src="' + response.product.image + '" alt=""></a>\n' +
                                    '               <div class="media-body">\n' +
                                    '                    <a href="#">\n' +
                                    '                       <h4>' + response.product.name + '</h4>\n' +
                                    '                     </a>\n' +
                                    '                      <h4 class="'+switchArabicClass+'"><span><span class="span-quantity">' + response.product.quantity + '</span> x $ ' + response.product.price + '</span></h4>\n' +
                                    '                </div>\n' +
                                    '           </div>\n' +
                                    '           <div class="close-circle">\n' +
                                    '               <a href="" class="remove-from-cart" data-id="'+response.product.id+'">\n' +
                                    '                    <i class="fa fa-times" aria-hidden="true"></i>\n' +
                                    '                </a>\n' +
                                    '          </div>\n' +
                                    '      </li>';
                                $(html).insertBefore('#last-cart-li');
                            } else {
                                $('.shopping-cart-ul .list-'+response.product.id+' .span-quantity').text(parseInt($('.shopping-cart-ul .list-'+response.product.id+' .span-quantity').html(), 10)+1);
                            }
                        },
                        error: function(error){
                           alert('error');
                        }
                    });
                });
                ////////////////////////////////////////////////////////////////
                $(document).on('click', '.remove-from-cart', function(e){
                    e.preventDefault();
                    $('.list-'+$(this).data('id')+'').remove();
                    $('#cart-count').html(parseInt($('#cart-count').html(), 10)-1);
                    let msgCart = "{{trans('cart_is_empty') }} .";
                    if ($('#cart-count').text() == 0) {
                        $('#cart_status').html(msgCart);
                        $('#cart-count').hide();
                        $('#last-cart-li').hide();
                        $('.no-cart-product').show();
                    }
                    $('#quantity-'+$(this).data("id")+'').val(0);
                    {{--let accessToken = '{{ auth()->user()->createToken('User Personal Token #' . auth()->user()->id)->accessToken }}';--}}
                    $.ajax({
                        url: '{{ route("web.remove.from.cart") }}',
                        type: 'delete',
                        data: {_token: '{{ csrf_token() }}', 'id' : $(this).data('id')},
                        // headers: {'Auth':'Bearer '+accessToken,},
                        success: function(response){
                            let msgAddedToCart = "{{trans('item_added_to_cart_successfully') }} .";
                            $('#cart-icon-'+productId).data({
                                "message": msgAddedToCart
                            });
                        },
                        error: function(error){
                            alert('error');
                        }
                    });
                });
                ////////////////////////////////////////////////////////////////
                @if(auth()->check())
                    $('.wishlist-btn').on('click', function (e) {
                    e.preventDefault();
                    let productId = $(this).data("id");
                    let isFav = $('#is-fav-'+productId).val();
                    let accessToken = '{{ auth()->user()->createToken('User Personal Token #' . auth()->user()->id)->accessToken }}';
                    $.ajax({
                        url: '{{ route('api.favorited.products.toggle') }}',
                        type: 'post',
                        data: { _token: '{{ csrf_token() }}', 'branch_product_id': productId },
                        headers: {'Auth':'Bearer '+accessToken,},
                        success: function(response){
                            if (isFav == 1) {
                                $('#is-fav-'+productId).val(0);
                                $('#wishlist-product-'+productId).remove();
                                $('#red-heart-'+productId).removeClass('red-heart');
                                let msgWishlist = "{{trans('add_to_wishlist') }} .";
                                $('#heart-text-'+productId).html(msgWishlist);
                                $('#heart-title-'+productId).attr({
                                    "title": "Add To WishList"
                                });
                                let msgWishlist_2 = "{{trans('item_added_to_wishlist_successfully') }} .";
                                $('#red-heart-'+productId).data({
                                    "message": msgWishlist_2
                                });
                            } else {
                                $('#is-fav-'+productId).val(1);
                                $('#red-heart-'+productId).addClass('red-heart');
                                let msgWishlist = "{{trans('remove_from_wishlist') }} .";
                                $('#heart-text-'+productId).html(msgWishlist);
                                $('#heart-title-'+productId).attr({
                                    "title": "Remove From WishList"
                                });
                                let msgWishlist_2 = "{{trans('item_removed_from_wishlist_successfully') }} .";
                                $('#red-heart-'+productId).data({
                                    "message": msgWishlist_2
                                });
                            }
                        },
                        error: function(){
                            alert("error");
                        }
                    });
                });
                @endif
                ////////////////////////////////////////////////////////////////
                $(document).on('click', '.product-quantity', function(e){
                    e.preventDefault();
                    ////////////////// This only from minus button in home page////////////////////
                    let oldQuantity = $('#quantity-'+$(this).data("id")+'').val();
                    if (oldQuantity <= 1) {
                        return false;
                    }
                    $('#quantity-'+$(this).data("id")+'').val(parseInt(oldQuantity) - parseInt(1));
                    ///////////////////////////////////////////////////////////////////////////////
                    let totalPrice = $(this).val() * $('#product-price-'+$(this).data("id")+'').text();
                    $('#product-total-price-'+$(this).data("id")+'').text(totalPrice);

                    let newQuantity = $(this).val();
                    if (!$(this).val()) {
                        newQuantity = $('#quantity-'+$(this).data("id")+'').val();
                    }

                    $('.shopping-cart-ul .list-'+$(this).data("id")+' .span-quantity').text(newQuantity);

                    updateTotalPrice();

                    {{--let accessToken = '{{ auth()->user()->createToken('User Personal Token #' . auth()->user()->id)->accessToken }}';--}}
                    $.ajax({
                        url: '{{ route("web.update.cart") }}',
                        type: 'patch',
                        data: {_token: '{{ csrf_token() }}',
                            'id' : $(this).data('id'),
                            'quantity' : newQuantity,
                        },
                        // headers: {'Auth':'Bearer '+accessToken,},
                        success: function(response){
                            //alert('success');
                        },
                        error: function(error){
                            //alert('error');
                        }
                    });
                });
                /////////////////////////////////////////////////////////////////


            $(document).on('click', '#mc-submit', function(e){
                e.preventDefault();

                var emaill = $.trim($("#mce-EMAIL").val());

                $.ajax({
                    url: '{{ route("web.subscribe") }}',
                    type: 'post',
                    data: {_token: '{{ csrf_token() }}',
                        email:emaill
                    },
                    headers: {},
                    success: function(response){
                        let msgSubscription = "{{trans('subscription_done_successfully') }} .";
                        $('#subscribe_msg').html(msgSubscription);
                        subscribeModal.style.display = "block";
                    },
                    error: function(error){
                        let msgSubscription = "{{trans('invalid_email') }} .";
                        $('#subscribe_msg').html(msgSubscription);
                        subscribeModal.style.display = "block";
                    }
                });
            });
            /////////////////////////////////////////////////////////////////

        </script>
        <script>
            var subscribeModal = document.getElementById("subscribeModal");

            var subcribeSpan = document.getElementsByClassName("subscribeClose")[0];

            subcribeSpan.onclick = function() {
                subscribeModal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == subscribeModal) {
                    subscribeModal.style.display = "none";
                }
            }
        </script>

    </body>
</html>
