@extends('vendor.layout')

@section('content')
<div class="app-content">
    <section class="section">

        <!--page-header open-->
        <div class="page-header">
            <h4 class="page-title">{{trans('order_products')}}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor.home.index') }}" class="text-light-color">{{trans('home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('vendor.orders.index') }}" class="text-light-color">{{trans('orders')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{trans('order_products')}}</li>
            </ol>
        </div>
        <!--page-header closed-->

        <div class="section-body">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <span class="table-add float-right">
                                <a href="{{ route('vendor.order.products.create',['order' => $order->id]) }}" class="btn btn-icon"><i class="fa fa-plus fa-1x" aria-hidden="true"></i></a>
                            </span>
                            <h4>{{trans('order_products_list')}}</h4>
                        </div>

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
                                <table class="table table-bordered table-hover mb-0 text-nowrap">
                                    <thead>
                                        <tr>
                                            <th style="width: 1px">#</th>
                                            <th>{{trans('product')}}</th>
                                            <th>{{trans('price')}}</th>
                                            <th>{{trans('quantity')}}</th>
                                            <th style="width: 1px">{{trans('actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $product)
                                        <tr>
                                            <td>{{ $product->pivot->id }}</td>
                                            <td>{{ $product->product->name }}</td>
                                            <td>{{ $product->pivot->price }} </td>
                                            <td>{{ $product->pivot->quantity }}</td>
                                            <td>
                                                <div class="btn-group dropdown">
                                                    <button type="button" class="btn btn-sm btn-info m-b-5 m-t-5 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa-cog fa"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item has-icon" href="{{ route('vendor.order.products.edit', ['order'=>$order->id ,'orderProduct' => $product->pivot->id]) }}"><i class="fa fa-edit"></i> {{trans('edit')}}</a>
                                                        <button type="button" class="dropdown-item has-icon" data-toggle="modal" data-target="#delete_model_{{ $product->pivot->id }}">
                                                            <i class="fa fa-trash"></i> {{trans('remove')}}
                                                        </button>

                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @foreach ($list as $product)
    <!-- Message Modal -->
        <div class="modal fade" id="delete_model_{{ $product->pivot->id }}" tabindex="-1" role="dialog"  aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">{{ trans('delete') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('vendor.order.products.destroy', ['order'=>$order->id ,'orderProduct' => $product->pivot->id ]) }}" method="Post" >
                        @method('DELETE')
                        @csrf
                        <div class="modal-body">

                        {{ trans('delete_confirmation_message') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">{{ trans('close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ trans('delete') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Message Modal closed -->
    @endforeach

</div>
@stop
