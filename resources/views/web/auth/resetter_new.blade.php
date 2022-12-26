@extends('web.layout')

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('reset')}} {{trans('password')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('web.home.index')}}">{{trans('home')}}</a></li>
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
                    <h3>{{trans('reset')}} {{trans('password')}}</h3>
                    <div class="theme-card">
                        <form action="{{ route('web.auth.reset.confirm') }}"  method="post" class="theme-form">
                            @include('web.session_message')
                            @csrf
                            <input   class="btn-block" name="token" type="hidden" value="{{ request('token') }}" />

                            @error('email')
                            <div class="alert alert-danger">
                                <span class="error-msg">{{ $errors->first('email') }}</span>
                            </div>
                            @enderror
                            <div class="col-12">
                                <label for="password">{{trans('email')}}</label>
                                <input class="btn-block" name="email" type="text" placeholder="{{trans('email')}}" />
                            </div>

                            @error('password')
                            <div class="alert alert-danger">
                                <span class="error-msg">{{ $errors->first('password') }}</span>
                            </div>
                            @enderror
                            <div class="col-12">
                                <label for="password">{{trans('new')}} {{trans('password')}}</label>
                                <input class="btn-block" name="password" type="password" placeholder="{{trans('password')}}" />
                            </div>

                            @error('password_confirmation')
                            <div class="alert alert-danger">
                                <span class="error-msg">{{ $errors->first('password_confirmation') }}</span>
                            </div>
                            @enderror
                            <div class="col-12">
                                <label for="password_confirmation">{{trans('confirm')}} {{trans('new')}} {{trans('password')}}</label>
                                <input class="btn-block" name="password_confirmation" type="password" placeholder="{{trans('confirm')}} {{trans('new')}} {{trans('password')}}" />
                            </div>

                            <button href="#" class="btn btn-solid">{{trans('reset')}} {{trans('password')}}</button>
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

