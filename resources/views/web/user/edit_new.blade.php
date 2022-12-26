@extends('web.layout')

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('edit')}} {{trans('profile')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('web.home.index')}}">{{trans('home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{trans('profile')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section class="contact-page register-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>{{trans('personal')}} {{trans('detail')}}</h3>
                    <form class="theme-form" action="{{ route('profile.update') }}"
                          method="Post" enctype="multipart/form-data" autocomplete="off">
                        @method('PUT')
                        @csrf
                        @include('admin.errors')
                        @include('web.session_message')
                        <!-- personal deatail section start -->
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="name">{{trans('first_name')}}</label>
                                <input class="form-control" type="text" name="first_name" placeholder="{{trans('first_name')}}" value="{{$user->first_name}}">
                            </div>
                            <div class="col-md-6">
                                <label for="email">{{trans('last_name')}}</label>
                                <input class="form-control" type="text" name="last_name" placeholder="{{trans('last_name')}}" value="{{$user->last_name}}">
                            </div>
                            <div class="col-md-6">
                                <label for="review">{{trans('phone')}} {{trans('number')}}</label>
                                <input class="form-control" type="phone" name="phone" placeholder="{{trans('phone')}}" value="{{$user->phone}}">
                            </div>
                            <div class="col-md-6">
                                <label for="email">{{trans('email')}}</label>
                                <input class="form-control" type="email" name="email" placeholder="{{trans('email')}}" value="{{$user->email}}">
                            </div>
                        </div>
                            <!-- personal deatail section end -->

                        <!-- address section start -->
                        <section class="contact-page register-page section-b-space" id="edit_shipping_address">
                            <div>
                                <div  class="row">
                                    <div class="col-sm-12">
                                        <h3 >{{trans('shipping')}} {{trans('address')}}</h3>
                                        @if($address)
                                            @include('web.user.edit_address_form',$address)
                                        @else
<!--                                            --><?php //echo 'xxasdasxasxsssssss123';die; ?>
                                            @include('web.user.new_address_form')
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Address Section ends -->
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->

    <!-- tap to top start -->
    <div class="tap-top">
        <div><i class="fa fa-angle-double-up"></i></div>
    </div>
    <!-- tap to top end -->


    </html>

@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAndFqevHboVWDN156vJqXk1Y1-D7QR7BE&libraries=places&callback=initAutocomplete" async defer></script>
    <script>
        $('#city_id').on('change', function() {
            var lang = '{{ app()->getLocale() }}';
            var l = 0;
            if (lang == 'en') {
                l = 1;
            }

            $.ajax({
                url: '{{ route("api.locations.index") }}',
                type: 'get',
                data: { _token: '{{ csrf_token() }}', 'city_id' : this.value},
                success: function(data){
                    $('#div_region').css('visibility','visible');
                    var html='<option value ="">{{ trans("select_region") }}</option>';
                    var i;
                    for(i = 0; i < data.length; i++) {
                        html+= '<option value ="'+data[i].id+'">'+data[i].translations[l].name+'</option>';
                    }
                    $('#region_id').html(html);
                    $('#district_id').html('');


                    if ($('#city_id').val() === "") {
                        $('#div_region').css('visibility','hidden');
                        $('#div_district').css('visibility','hidden');
                    }

                },
                error: function(){
                    alert("error");
                }
            });
        });
        ///////////////////////////////////////////////////////////
        $('#region_id').on('change', function() {
            var lang = '{{ app()->getLocale() }}';
            var l = 0;
            if (lang == 'en') {
                l = 1;
            }
            $.ajax({
                url: '{{ route("api.locations.index") }}',
                type: 'get',
                data: { _token: '{{ csrf_token() }}', 'region_id' : this.value},
                success: function(data){
                    $('#div_district').css('visibility','visible');
                    var html='';
                    var i;
                    for(i = 0; i < data.length; i++) {
                        html+= '<option value ="'+data[i].id+'">'+data[i].translations[l].name+'</option>';
                    }
                    $('#district_id').html(html);
                    if ($('#region_id').val() === "") {
                        $('#div_district').css('visibility','hidden');
                    }
                },
                error: function(){
                    alert("error");
                }
            });
        });
    </script>
@endsection

