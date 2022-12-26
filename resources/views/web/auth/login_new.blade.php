@extends('web.layout')

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('login')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('web.home.index')}}">{{trans('home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{trans('login')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="login-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Login</h3>
                    <div class="theme-card">
                        <form action="{{ route('web.auth.attempt') }}"  method="post" class="theme-form">
                            @include('web.session_message')
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">{{trans('email')}}</label>
                                <input class="form-control" id="email" name="email" type="text" placeholder="{{trans('email')}}" required="" value="{{(old('email'))}}">
                            </div>
                            <div class="form-group">
                                <label for="review">{{trans('password')}}</label>
                                <input class="form-control" id="password"
                                       name="password" type="password" placeholder="{{trans('password')}}" required="">
                            </div>
                            <div>
                                <button href="#" class="btn btn-solid">{{trans('login')}}</button>
                                <span style="padding:20px;" ><a  href="{{route('password.reset')}}">{{trans('forgot')}} {{trans('password')}}?</a></span>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-lg-6 right-login">
                    <h3>{{trans('new')}} {{trans('customer')}}</h3>
                    <div class="theme-card authentication-right">
                        <h6 class="title-font">{{trans('create')}} {{trans('new')}} {{trans('account')}}</h6>
                        <p>{{trans('sign_up_for_a_free_account_at_our_store')}}.
                            {{trans('registration_is_quick_and_easy')}}.<br>
                            {{trans('it_allows_you_to_be_able_to_order_from_our_shop')}}<br>
                            {{trans('to_start_shopping_click_register')}}.</p><a href="{{ route('web.auth.register') }}"
                                                                                                 class="btn btn-solid">{{trans('create')}} {{trans('new')}} {{trans('account')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->


    <!-- tap to top start -->
    <div class="tap-top">
        <div><i class="fa fa-angle-double-up"></i></div>
    </div>
    <!-- tap to top end -->


@endsection

