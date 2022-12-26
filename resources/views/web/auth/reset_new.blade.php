@extends('web.layout')

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>forget password</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('web.home.index')}}">{{trans('home')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('web.auth.login')}}">{{trans('login')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{trans('forgot')}} {{trans('password')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="pwd-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h2>{{trans('forgot')}} {{trans('password')}}</h2>
                    <form action="{{ route('web.auth.reset.send') }}"  method="post" class="theme-form">
                        @include('web.session_message')
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="email" name="email" placeholder="{{trans('enter')}} {{trans('your_email')}}"
                                       required="">
                            </div>
                            <button href="#" class="btn btn-solid">{{trans('submit')}}</button>
                        </div>
                    </form>
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

