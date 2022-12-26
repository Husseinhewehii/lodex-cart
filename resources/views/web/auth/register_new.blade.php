@extends('web.layout')

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('create')}} {{trans('account')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('web.home.index')}}">{{trans('home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{trans('create')}} {{trans('account')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>{{trans('create')}} {{trans('account')}}</h3>
                    <div class="theme-card">
                        <form action="{{ route('web.auth.register') }}" method="post" class="theme-form">
                            @include('web.session_message')
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="first_name">@error('first_name'){{ $message }}@enderror<br>{{trans('first_name')}}</label>
                                    <input class="form-control" type="text" name="first_name" placeholder="{{trans('first_name')}}" value="{{old('first_name')}}">
                                </div>

                                <div class="col-md-6">
                                    <label for="last_name">@error('last_name'){{ $message }}@enderror<br>{{trans('last_name')}}</label>
                                    <input class="form-control" type="text" name="last_name" placeholder="{{trans('last_name')}}" value="{{old('last_name')}}">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="email">@error('email'){{ $message }}@enderror<br>{{trans('email')}}</label>
                                    <input class="form-control" type="email" name="email" placeholder="{{trans('email')}}" value="{{old('email')}}">
                                </div>

                                <div class="col-md-6">
                                    <label for="email">@error('phone'){{ $message }}@enderror<br>{{trans('phone')}}</label>
                                    <input class="form-control" type="phone" name="phone" placeholder="{{trans('phone')}}" value="{{old('phone')}}">
                                </div>

                                <div class="col-md-6">
                                    <label for="password">@error('password'){{ $message }}@enderror<br>{{trans('password')}}</label>
                                    <input class="form-control" type="password" name="password" placeholder="{{trans('password')}}" value="{{old('password')}}">
                                </div>

                                <div class="col-md-6">
                                    <label for="confirm_password">@error('confirm_password'){{ $message }}@enderror<br>{{trans('confirm')}} {{trans('password')}}</label>
                                    <input class="form-control" type="password" name="confirm_password" placeholder="{{trans('confirm')}} {{trans('password')}}" value="{{old('password')}}">
                                </div>
                            </div>
                            <button href="#" class="btn btn-solid">{{trans('create')}} {{trans('account')}}</button>
                        </form>
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


    </html>

@endsection

