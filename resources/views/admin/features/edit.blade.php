@extends('admin.layout')
<?php use \App\Constants\UserTypes;?>
@section('content')
    <div class="app-content">
        <section class="section">

            <!--page-header open-->
            <div class="page-header">
                <h4 class="page-title">{{trans('features')}}</h4>
                <ol class="breadcrumb">
                    @if(auth()->user()->type == UserTypes::ADMIN)
                        <li class="breadcrumb-item"><a  href="{{ route('admin.home.index') }}" class="text-light-color">{{trans('home')}}</a></li>
                    @endif

                    @if(auth()->user()->type == UserTypes::ADMIN)
                        <li class="breadcrumb-item"><a  href="{{ route('admin.features.index') }}"  class="text-light-color">{{trans('branches')}}</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">{{trans('update')}} {{trans('feature')}} #{{ $feature->id }}</li>
                </ol>
            </div>
            <!--page-header closed-->

            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{trans('update')}} {{trans('feature')}}</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.errors')
                                <form action="{{ route('admin.features.update', ['feature' => $feature]) }}" method="Post"
                                      enctype="multipart/form-data" autocomplete="off">
                                    @method('PUT')
                                    @csrf
                                    <ul class="nav nav-tabs" role="tablist">
                                        @foreach(config()->get('app.locales') as $lang => $language)
                                            <li class="nav-item">
                                                <a class="nav-link {{ $lang == app()->getLocale() ? 'active': ''}} show" id="home-tab2" data-toggle="tab" href="#lang-{{ $lang }}" role="tab" aria-controls="home" aria-selected="true">{{ trans($language) }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">
                                        @foreach(config()->get('app.locales') as $lang => $language)
                                            <div class="tab-pane fade {{ $lang == app()->getLocale() ? 'active show': ''}}" id="lang-{{ $lang }}" role="tabpanel" aria-labelledby="home-tab2">
                                                <div class="form-group col-md-4">
                                                    <label for="title">{{trans('title')}} *</label>
                                                    <input type="text" class="form-control" name="{{ $lang }}[title]" value="{{ old($lang.".title", $feature->translate($lang)->title)}}" id="{{ $lang }}[title]">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="description">{{trans('description')}} *</label>
                                                    <input type="text" class="form-control" name="{{ $lang }}[description]" value="{{ old($lang.'.description',$feature->translate($lang)->description) }}" id="{{ $lang }}[address]">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="id" value="{{ $feature->id}}"/>


                                    <div class="form-group col-md-4">
                                        <p style ="margin-top:-30px "> {{trans('image') }}  </p>
                                        <label class="custom-switch" class="text-center" style ="margin-right:90px ">
                                            <input type="file"  name="icon" onchange="readURL(this,'upload_img');"  class="image"style="visibility: hidden">
                                            <img id="upload_img"  src="{{ asset($feature->icon)}}" style ="width:100px;height:100px; border-radius:50px; margin-top:-10px ;margin-right:70px ;">
                                        </label>
                                    </div>
                                    <div class="form-group col-md-12 row">
                                        <label class="custom-switch">
                                            <input type="checkbox" name="active" value="1"
                                                   {{ $feature->active ? 'checked' : '' }} class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">{{trans('active')}}</span>
                                        </label>
                                    </div>

                                    <div class="form-group col-md-12 row">
                                        <div class="form-group col-md-3">
                                            <button type="submit" href="#"
                                                    class="btn  btn-outline-primary m-b-5  m-t-5"><i
                                                    class="fa fa-save"></i> {{trans('save')}}</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
@section('scripts')
    <script>
        $(document).ready(function(){
            $('input.timepicker').timepicker({});
            $('.timepicker').timepicker({
                timeFormat: 'h:mm p',
                interval: 60,
                minTime: '10',
                maxTime: '6:00pm',
                defaultTime: '11',
                startTime: '10:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAndFqevHboVWDN156vJqXk1Y1-D7QR7BE&libraries=places&callback=initAutocomplete" async defer></script>

@endsection
