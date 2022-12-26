@extends('web.layout')

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{auth()->user()->first_name}} {{auth()->user()->last_name}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('web.home.index')}}">{{trans('home')}}</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('web.auth.logout')}}">{{trans('logout')}}</a></li>
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
                    <h3>{{trans('change')}} {{trans('password')}}</h3>
                    <div class="theme-card">
                        <form action="{{ route('password.update') }}"  method="post" class="theme-form">
                            @method('PUT')
                            @csrf
                            @if(session()->has('error'))
                                <div class="col-12">
                                    <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                                        <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                                <span>×</span>
                                            </button>
                                            <div class="alert-title">{{trans('error')}}</div>
                                            {{ session('error') }}
                                        </div>
                                    </div>
                                </div>
                            @elseif(session()->has('success'))
                                <div class="col-12">
                                    <div class="alert alert-success alert-has-icon alert-dismissible show fade">
                                        <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                                <span>×</span>
                                            </button>
                                            <div class="alert-title">{{trans('success')}}</div>
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @error('current_password')
                            <div class="alert alert-danger">
                                <span class="error-msg">{{ $errors->first('current_password') }}</span>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="review">{{trans('current')}} {{trans('password')}}</label>
                                <input class="form-control" id="old_password"
                                       name="current_password" type="password" placeholder="{{trans('current')}} {{trans('password')}}" required="">
                            </div>

                            @error('new_password')
                            <div class="alert alert-danger">
                                <span class="error-msg">{{ $errors->first('new_password') }}</span>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="review">{{trans('new')}} {{trans('password')}}</label>
                                <input class="form-control" id="new_password"
                                       name="new_password" type="password" placeholder="{{trans('new')}} {{trans('password')}}" required="">
                            </div>

                            @error('confirm_new_password')
                            <div class="alert alert-danger">
                                <span class="error-msg">{{ $errors->first('confirm_new_password') }}</span>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="review">{{trans('confirm')}} {{trans('new')}} {{trans('password')}}</label>
                                <input class="form-control" id="confirm_new_password"
                                       name="confirm_new_password" type="password" placeholder="{{trans('confirm')}} {{trans('new')}} {{trans('password')}}" required="">
                            </div>

                            <button href="#" class="btn btn-solid">{{trans('change')}} {{trans('password')}}</button>
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

