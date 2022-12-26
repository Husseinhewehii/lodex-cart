@extends('admin.layout')

@section('content')
    <?php
    use \App\Constants\BannerTypes;
    ?>
    <div class="app-content">
        <section class="section">

            <!--page-header open-->
            <div class="page-header">
                <h4 class="page-title">{{trans('banners')}}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"
                                                   class="text-light-color">{{trans('home')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.banners.index') }}"
                                                   class="text-light-color">{{trans('banners')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('update_banner')}}</li>
                </ol>
            </div>
            <!--page-header closed-->

            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{trans('new_banner')}}</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.errors')
                                <form action="{{ route('admin.banners.update', ['banner' => $banner]) }}" method="Post"
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
                                                    <input type="text" class="form-control" name="{{ $lang }}[title]" value="{{ old($lang.".title", $banner->translate($lang)->title)}}" id="{{ $lang }}[title]">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="description">{{trans('description')}} *</label>
                                                    <input type="text" class="form-control" name="{{ $lang }}[description]" value="{{ old($lang.'.description',$banner->translate($lang)->description) }}" id="{{ $lang }}[address]">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="id" value="{{ $banner->id}}"/>

                                    <div class="form-group col-md-12 row">

                                        <div class="form-group col-md-4">
                                            <div class="form-group overflow-hidden">
                                                <label for="types">{{trans('type')}}</label>
                                                <select name="type" class="form-control select2 w-100" id="types">
                                                    <option value="">{{ trans('select_type') }} *</option>
                                                    @foreach(BannerTypes::getList() as $key => $value)
                                                        <option
                                                            value="{{ $key }}" {{ $banner->type == $key ? "selected":null }}>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-12 row">
                                        <div class="form-group col-md-4">
                                            <div class="form-group overflow-hidden">
                                                <label for="categories">{{trans('category')}} *</label>
                                                <select name="category_id" class="form-control select2 w-100" id="types">
                                                    <option value="">{{ trans('select_category') }}</option>
                                                    @foreach($categories as $category)
                                                        <option
                                                            value="{{ $category->id }}" {{ "category_id" == $category->id ? "selected":null }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 row">
                                        <div class="form-group col-md-8">
                                            <label for="url">{{trans('url')}}</label>

                                            <input type="url" class="form-control"
                                                   value="{{ !(old('url'))? $banner->url : old('url' )}}"
                                                   name="url" id="url">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 row">
                                        <div class="form-group col-md-4">
                                            <label for="date_from">{{trans('date_from')}}</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right dateFrom"
                                                       name="date_from" id="from"
                                                       value="{{ !(old('date_from'))? $banner->date_from : old('date_from') }}">
                                            </div>

                                        </div>


                                        <div class="form-group col-md-4">
                                            <label for="date_to">{{trans('date_to')}}</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right dateTo"
                                                       name="date_to" id="to"
                                                       value="{{ !(old('date_to'))? $banner->date_to : old('date_to') }}">
                                            </div>

                                        </div>

                                    </div>


                                    <div class="form-group col-md-12 row" id="branch_banner">

                                        <div class="form-group col-md-4" id="vendor">
                                            <div class="form-group overflow-hidden">
                                                <label for="vendor_id">{{trans('vendor')}}</label>
                                                <select name="vendor_id" id="vendor_id" class="form-control select2 w-100">
                                                    <option value="">{{ trans('select_vendor') }}</option>
                                                    @foreach($vendors as $vendor)
                                                        <option value="{{ $vendor->id }}" {{ $vendor->id == old( 'vendor_id', $banner->branch?$banner->branch->vendor_id:null ) ? "selected":null }}>{{ $vendor->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <div class="form-group overflow-hidden">
                                                <label for="branch_id">{{trans('select_branch')}}</label>
                                                <select name="branch_id" id="branch_id"
                                                        class="form-control select2 w-100">
                                                    <option value="">{{ trans('select_branch') }}</option>
                                                    @foreach($branches as $branch)
                                                        <option
                                                            value="{{ $branch->id }}" {{ $branch->id == old( 'branch_id', $banner->branch_id) ? "selected":null }}>{{ $branch->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-4">
                                        <p style ="margin-top:-30px "> {{trans('image'). " * ". trans('notice_image_ratio_should_be_2to1') }}  </p>
                                        <label class="custom-switch" class="text-center" style ="margin-right:90px ">
                                            <input type="file"  name="image" onchange="readURL(this,'upload_img');"  class="image"style="visibility: hidden">
                                            <img id="upload_img"  src="{{ asset($banner->image)}}" style ="width:100px;height:100px; border-radius:50px; margin-top:-10px ;margin-right:70px ;">
                                        </label>
                                    </div>
                                    <div class="form-group col-md-12 row">
                                        <label class="custom-switch">
                                            <input type="checkbox" name="active" value="1"
                                                   {{ $banner->active ? 'checked' : '' }} class="custom-switch-input">
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
