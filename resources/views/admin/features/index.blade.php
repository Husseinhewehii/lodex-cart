@extends('admin.layout')

@section('content')
    <div class="app-content">
        <section class="section">

            <!--page-header open-->
            <div class="page-header">
                <h4 class="page-title">{{trans('features')}}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-light-color">{{trans('home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('features')}}</li>
                </ol>
            </div>
            <!--page-header closed-->


            <div class="section-body">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                @if(session()->has('success'))
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
                                @endif

                                <div class="table-responsive">
                                    <h4>
                                        {{trans('features')}}
                                    </h4>
                                    <table class="table table-bordered table-hover mb-0 text-nowrap">
                                        <thead>
                                        <tr>
                                            <th style="width: 1px">#</th>
                                            <th>{{trans('icon')}}</th>
                                            <th>{{trans('title')}}</th>
                                            <th>{{trans('description')}}</th>
                                            <th style="width: 1px">{{trans('status')}}</th>
                                            @if(auth()->user()->hasAccess("admin.features.update") )
                                                <th style="width: 1px">{{trans('actions')}}</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($features as $feature)
                                            <tr>
                                                <td>{{ $feature->id }}</td>
                                                <td>{{ $feature->icon }}</td>
                                                <td>{{ $feature->title }}</td>
                                                <td>{{ $feature->description }}</td>
                                                <td><span class="badge badge-{{ $feature->active ? 'success' : 'danger' }}">{{ $feature->active? trans('active') : trans('disabled') }}</span></td>
                                                @if(auth()->user()->hasAccess("admin.features.update"))
                                                    <td>
                                                        <div class="btn-group dropdown">
                                                            <button type="button" class="btn btn-sm btn-info m-b-5 m-t-5 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa-cog fa"></i>
                                                            </button>
                                                            @can("update", $feature)
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item has-icon" href="{{ route('admin.features.edit', ['feature' => $feature]) }}"><i class="fa fa-edit"></i> {{trans('edit')}}</a>
                                                                </div>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

@stop

