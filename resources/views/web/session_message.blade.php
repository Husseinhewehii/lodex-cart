<!-- session start -->
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
<!-- session end-->
