@extends('web.layout')

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('contact')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('web.home.index')}}">{{trans('home')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('contact')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="contact-page section-b-space">
        <div class="container">
            <div class="row section-b-space">
                <div class="col-lg-7 map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3456.6749317286335!2d31.287509151106715!3d29.96002752942083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583841178e7ebf%3A0xb1e7fbf3ce0b8e81!2sLodex%20Solutions!5e0!3m2!1sen!2seg!4v1605435411020!5m2!1sen!2seg" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-lg-5">
                    <div class="contact-right">
                        <ul>
                            @if(\App\Models\Setting::getSettingByKey('MOBILE')->active)
                                <li>
                                    <div class="contact-icon"><img src="../assets/images/icon/phone.png"
                                                                   alt="Generic placeholder image">
                                        <h6>{{trans('contact_us')}}</h6>
                                    </div>
                                    <div class="media-body">
                                        <p>{{\App\Models\Setting::getSettingByKey('MOBILE')->value}}</p>
                                    </div>
                                </li>
                            @endif

                            @if(\App\Models\Setting::getSettingByKey('ADDRESS')->active)
                                <li>
                                    <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <h6>{{trans('address')}}</h6>
                                    </div>
                                    <div class="media-body">
                                        <p>{{\App\Models\Setting::getSettingByKey('ADDRESS')->value}}</p>
                                    </div>
                                </li>
                            @endif
                            @if(\App\Models\Setting::getSettingByKey('EMAIL')->active)
                                <li>
                                    <div class="contact-icon"><img src="../assets/images/icon/email.png"
                                                                   alt="Generic placeholder image">
                                        <h6>{{trans('email')}}</h6>
                                    </div>
                                    <div class="media-body">
                                        <p>{{\App\Models\Setting::getSettingByKey('EMAIL')->value}}</p>
                                    </div>
                                </li>
                            @endif
                            @if(\App\Models\Setting::getSettingByKey('FAX')->active)
                                <li>
                                    <div class="contact-icon"><i class="fa fa-fax" aria-hidden="true"></i>
                                        <h6>{{trans('fax')}}</h6>
                                    </div>
                                    <div class="media-body">
                                        <p>{{\App\Models\Setting::getSettingByKey('FAX')->value}}</p>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form class="theme-form" action="{{ route('web.tickets.contact_us_message') }}" method="post">
                        @include('web.session_message')
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="name">{{trans('first_name')}}</label>
                                <input type="text" class="form-control" {{ auth()->check() ? "disabled" : null }} value="{{old('first_name', auth()->check() ? auth()->user()->first_name : null)}}" name="first_name" id="name" placeholder="{{trans('enter')}} {{trans('first_name')}}"
                                       >
                            </div>
                            <div class="col-md-6">
                                <label for="email">{{trans('last_name')}}</label>
                                <input type="text" class="form-control" {{ auth()->check() ? "disabled" : null }} value="{{old('last_name', auth()->check() ? auth()->user()->last_name : null)}}" name="last_name" id="last-name" placeholder="{{trans('enter')}} {{trans('last_name')}}" >
                            </div>
                            <div class="col-md-6">
                                <label for="review">{{trans('phone')}} {{trans('number')}}</label>
                                <input type="text" class="form-control" {{ auth()->check() ? "disabled" : null }} value="{{old('phone', auth()->check() ? auth()->user()->phone : null)}}" name="phone" id="review" placeholder="{{trans('enter')}} {{trans('phone')}} {{trans('number')}}"
                                       >
                            </div>
                            <div class="col-md-6">
                                <label for="email">{{trans('email')}}</label>
                                <input type="text" class="form-control" {{ auth()->check() ? "disabled" : null }} value="{{old('email', auth()->check() ? auth()->user()->email : null)}}" name="email" id="email" placeholder="{{trans('enter')}} {{trans('email')}}" >
                            </div>
                            <div class="col-md-12">

                                <label for="review">{{trans('write_your_message')}}</label>
                                <p style="color:red;">@error('description'){{ $message }}@enderror</p>
                                <textarea class="form-control" value="{{old('description')}}" name="description" placeholder="{{trans('write_your_message')}}"
                                          id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-solid" type="submit">{{trans('submit_your_message')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

@stop
