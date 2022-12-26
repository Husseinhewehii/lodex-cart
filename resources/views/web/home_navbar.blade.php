<!-- header start -->

<header class="header-2">
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact">
                        <ul>
                            @if(\App\Models\Setting::getSettingByKey('WELCOME_TITLE')->active)
                                <li>Welcome to {{\App\Models\Setting::getSettingByKey('WELCOME_TITLE')->value}}</li>
                            @endif
                            @if(\App\Models\Setting::getSettingByKey('MOBILE')->active)
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>{{trans('call_us')}}: {{\App\Models\Setting::getSettingByKey('MOBILE')->value}}</li>
                            @endif
                            <li><a class="contact-us" href="{{route('web.tickets.contact_us')}}">{{trans('contact_us')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <ul class="header-dropdown">
                        @guest
                            <li><a href="{{route('web.auth.register')}}" data-lng="en">{{trans('register')}}</a></li>
                            <li><a href="{{route('web.auth.login')}}" data-lng="en">{{trans('login')}}</a></li>
                        @else
                            <li  class="onhover-dropdown mobile-account">
                                <i class="fa fa-user" aria-hidden="true"></i> <a href="{{route('user.dashboard')}}">{{ucfirst(auth()->user()->first_name)}}</a>
                                <ul class="onhover-show-div">
                                    <li><a href="{{route('password.edit')}}" data-lng="es">{{trans('change')}} {{trans('password')}}</a></li>
                                    <li><a href="{{route('profile.edit')}}" data-lng="es">{{trans('edit')}} {{trans('profile')}}</a></li>
                                    <li><a href="{{route('web.auth.logout')}}" data-lng="es">{{trans('logout')}}</a></li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu border-section border-top-0">
                    <div class="menu-left">
                        <div class="navbar"><a href="javascript:void(0)" onclick="openNav()"><i
                                    class="fa fa-bars sidebar-bar" aria-hidden="true"></i></a>
                            <div id="mySidenav" class="sidenav">
                                <a href="javascript:void(0)" class="sidebar-overlay" onclick="closeNav()"></a>
                                <nav>
                                    <a href="javascript:void(0)" onclick="closeNav()">
                                        <div class="sidebar-back text-left"><i class="fa fa-angle-left pr-2"
                                                                               aria-hidden="true"></i> Back</div>
                                    </a>
                                    <!-- Vertical Menu -->
                                    <ul id="sub-menu" class="sm pixelstrap sm-vertical">
                                        @foreach ($sideBarCategories as $category)
                                            @if($category->activeChildren()->count())
                                                <li>@include('web.categories.index', $category)</li>
                                            @else
                                                <li><a href="{{ route('web.category.products', ["category" => $category->id]) }}">{{$category->name}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="brand-logo layout2-logo">
                        @if(\App\Models\Setting::getSettingByKey('LOGO')->active)
                            <a href="{{ route('web.home.index') }}"><img src="{{ url(\App\Models\Setting::getSettingByKey('LOGO')->value) }}" class="img-fluid blur-up lazyload" alt=""></a>
                        @endif
                    </div>
                    <div class="menu-right pull-right">
                        <div class="icon-nav">
                            <ul>
                                <li class="onhover-div mobile-setting">
                                    <div><img src="{{ url('assets/frontend/images/icon/setting.png') }}" class="img-fluid blur-up lazyload" alt=""> <i class="ti-settings"></i>
                                    </div>
                                    <div class="show-div setting">
                                        <h6>{{trans('language')}}</h6>
                                        <ul>
                                            @foreach (Config::get('app.locales') as $lang => $language)
                                                <a href="{{ route(Route::currentRouteName(), array_merge( request()->route()->parameters(), ['lang' => $lang])) }}" class="dropdown-item d-flex align-items-center">
                                                    <div>
                                                        {{--<strong > {{trans($lang)}}  {{CountryFlag::get(\App\Constants\FlagTypes::getOne($lang))}}</strong>--}}
                                                        <strong > {{trans($lang)}}  </strong>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li class="onhover-div mobile-cart">
                                    <div>
                                        <img src="{{ url('assets/frontend/images/icon/cart.png') }}" class="img-fluid blur-up lazyload" alt="">
                                        <i class="ti-shopping-cart"></i>
                                        <label id="cart-count" style="background-color: red; color: white; padding: 5px ;border-radius: 5px; display:{{ count($cartProducts) ? '' : 'none' }}">{{ count($cartProducts) ?? 0 }}</label>
                                    </div>
                                    <ul class="show-div shopping-cart shopping-cart-ul">
                                        <li id="no-cart-product" @if(count($cartProducts)) style ="display:none"@endif>
                                            <b id="cart_status">{{trans('cart_is_empty')}}.</b>
                                        </li>
                                        @foreach($cartProducts as $cartProduct)
                                            <li id="{{ $cartProduct["id"] }}" class="list-{{ $cartProduct["id"] }}">
                                                <div class="media">
                                                    <a href="{{ route('web.product.show', ["product" => $cartProduct["id"]]) }}"><img class="mr-3" src="{{ $cartProduct["image"] }}" alt=""></a>
                                                    <div class="media-body">
                                                        <a href="{{ route('web.product.show', ["product" => $cartProduct["id"]]) }}">
                                                            <h4>{{ $cartProduct["name"] }}</h4>
                                                        </a>
                                                        <h4 class="{{Config::get('app.locale') == 'ar' ? 'cart_direction' : null}}" ><span><span class="span-quantity">{{ $cartProduct["quantity"] }}</span> x $ {{ $cartProduct["price"] }}</span></h4>
                                                    </div>
                                                </div>
                                                <div class="close-circle">
                                                    <a href="" class="remove-from-cart" data-id="{{ $cartProduct["id"] }}">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </li>
                                        @endforeach

                                        <li id="last-cart-li" @if(!count($cartProducts)) style="display: none" @endif>
                                            <div class="buttons">
                                                <a href="{{ route('web.cart.index') }}" class="view-cart">{{trans('view')}} {{trans('cart')}}</a>
                                            </div>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-nav-center">
                    <nav id="main-nav">
                        <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                        <!-- Sample menu definition -->
                        <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                            @foreach ($navbarCategories as $category)
                                @if($category->activeChildren()->count())
                                    <li>@include('web.categories.index', $category)</li>
                                @else
                                    @if($category->parent_id)
                                        <li><a href="{{ route('web.category.products', ["category" => $category->id]) }}">{{$category->name}}</a></li>
                                    @else
                                        <li><a href="{{ route('web.home.index') }}">{{$category->name}}</a></li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->
