@extends('web.layout')

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('dashboard')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('web.home.index')}}">{{trans('home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{trans('dashboard')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="account-sidebar"><a class="popup-btn">{{trans('account')}}</a></div>
                    <div class="dashboard-left">
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                                                                         aria-hidden="true"></i> {{trans('back')}}</span></div>
                        <div class="block-content">
                            <ul>
                                <li class="active"><a href="#">{{trans('account')}} {{trans('info')}}</a></li>
                                <li><a href="{{route('web.user.orders')}}">{{trans('orders')}}</a></li>
                                <li><a href="{{route('web.user.wishlist')}}">{{trans('wishlist')}}</a></li>
                                <li><a href="{{route('profile.edit')}}">{{trans('account')}}</a></li>
                                <li><a href="{{route('password.edit')}}">{{trans('change')}} {{trans('password')}}</a></li>
                                <li class="last"><a href="{{route('web.auth.logout')}}">{{trans('logout')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="dashboard-right">
                        <div class="dashboard">
                            <div class="page-title">
                                <h2>{{trans('dashboard')}}</h2>
                            </div>
                            <div class="welcome-msg">
                                <p> {{trans('hello')}}, {{$user->first_name}}  {{$user->last_name}}</p>
                                <p>{{trans('from_your_account_dashboard_you_have_the_ability_to_view_a_snapshot_of_your_recent_account_activity_and_update_your_account_information')}} {{trans('select_a_link_below_to_view_or_edit_information')}}.</p>
                            </div>
                            <div class="box-account box-info">
                                <div class="box-head">
                                    <h2>{{trans('account')}} {{trans('information')}}</h2>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="box">
                                            <div class="box-title">
                                                <h3>{{trans('customer_information')}}</h3><a href="#">{{trans('edit')}}</a>
                                            </div>
                                            <div class="box-content">
                                                <h6>{{$user->first_name}}  {{$user->last_name}}</h6>
                                                <h6>{{$user->email}}</h6>
                                                <h6><a href="{{route('password.edit')}}">{{trans('change')}} {{trans('password')}}</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>{{trans('address')}} {{trans('book')}}</h3><a href="#">{{trans('manage_address')}}</a>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6>{{trans('main_address')}}</h6>
                                                @if($address)
                                                    <span>{{trans('building')}} {{$address->building}}<samp>, {{trans('street')}} {{$address->street}}<samp>,  {{trans('floor')}} {{$address->floor}}, {{trans('apartment')}} {{$address->apartment}}</span>
                                                    <div class="">
                                                        <a href="{{route('profile.edit')}}#edit_shipping_address">{{trans('edit')}} {{trans('address')}}</a>
                                                    </div>
                                                @else
                                                    <address>{{trans('you_have_not_set_a_default_address')}}.<br></address>
                                                @endif
                                            </div>
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
    <!-- section end -->

@endsection
