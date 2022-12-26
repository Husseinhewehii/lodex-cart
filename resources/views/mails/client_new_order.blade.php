
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <title>Multikart | Email template </title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="icon" href="{{ url('assets/frontend/images/favicon/1.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('assets/frontend/images/favicon/1.png') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/price-range.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/fontawesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/fontawesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/color1.css') }}" media="screen" id="color">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/custom.css') }}">

    <style type="text/css">
        body {
            text-align: center;
            margin: 0 auto;
            width: 650px;
            font-family: 'Open Sans', sans-serif;
            background-color: #e2e2e2;
            display: block;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            text-decoration: unset;
        }

        a {
            text-decoration: none;
        }

        p {
            margin: 15px 0;
        }

        h5 {
            color: #444;
            text-align: left;
            font-weight: 400;
        }

        .text-center {
            text-align: center
        }

        .main-bg-light {
            background-color: #fafafa;
        }

        .title {
            color: #444444;
            font-size: 22px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-bottom: 0;
            text-transform: uppercase;
            display: inline-block;
            line-height: 1;
        }

        table {
            margin-top: 30px
        }

        table.top-0 {
            margin-top: 0;
        }

        table.order-detail {
            border: 1px solid #ddd;
            border-collapse: collapse;
        }

        table.order-detail tr:nth-child(even) {
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }

        table.order-detail tr:nth-child(odd) {
            border-bottom: 1px solid #ddd;
        }

        .pad-left-right-space {
            border: unset !important;
        }

        .pad-left-right-space td {
            padding: 5px 15px;
        }

        .pad-left-right-space td p {
            margin: 0;
        }

        .pad-left-right-space td b {
            font-size: 15px;
            font-family: 'Roboto', sans-serif;
        }

        .order-detail th {
            font-size: 16px;
            padding: 15px;
            text-align: center;
            background: #fafafa;
        }

        .footer-social-icon tr td img {
            margin-left: 5px;
            margin-right: 5px;
        }

        .directionRTL{
            direction: rtl;
            text-align: right;
        }
    </style>
</head>

<body style="margin: 20px auto;">
<table align="center" border="0" cellpadding="0" cellspacing="0"
       style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
    <tbody class="{{Config::get('app.locale') == 'ar' ? 'directionRTL' : null}}">
    <tr>
        <td>
            <table align="left" border="0" cellpadding="0" cellspacing="0" style="text-align: left;"
                   width="100%">
                <tr>
                    <td style="text-align: center;">
                        <img src="../assets/images/email-temp/delivery-2.png" alt=""
                             style=";margin-bottom: 30px;">
                    </td>
                </tr>
                <tr>
                    <td class="{{Config::get('app.locale') == 'ar' ? 'directionRTL' : null}}">
                        <p style="font-size: 14px;"><b>{{$user->first_name}} {{$user->last_name}}</b></p>
                        <p style="font-size: 14px;">{{trans('order_is_successfully_processed_and_your_order_is_on_the_way')}},</p>
                        <p style="font-size: 14px;">{{trans('transaction')}} {{trans('id')}} : {{$order->id}}</p>
                    </td>
                </tr>
            </table>

            <table cellpadding="0" cellspacing="0" border="0" align="left"
                   style="width: 100%;margin-top: 10px;    margin-bottom: 10px;">
                <tbody>
                <tr>
                    <td
                        style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 50%;">
                        <h5
                            class="{{Config::get('app.locale') == 'ar' ? 'directionRTL' : null}}"
                            style="font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">
                            {{trans('shipping')}} {{trans('address')}}</h5>
                        <p>{{trans('building')}} {{$order->address->building}}<samp>, {{trans('street')}} {{$order->address->street}}<samp>,  {{trans('floor')}} {{$order->address->floor}}, {{trans('apartment')}} {{$order->address->apartment}}</p>
                    </td>

                </tr>
                </tbody>
            </table>
            <table class="order-detail" border="0" cellpadding="0" cellspacing="0" align="left"
                   style="width: 100%;    margin-bottom: 50px;">
                <tr align="left">
                    <th>{{trans('product')}}</th>
                    <th style="padding-left: 15px;">{{trans('name')}}</th>
                    <th>{{trans('quantity')}}</th>
                    <th>{{trans('price')}} </th>
                </tr>

                @foreach($order->orderProducts as $orderProduct)
                    <tr>
                        <td>
                            <img src="{{$orderProduct->product->image->image}}" alt="" width="80">
                        </td>
                        <td valign="top" style="padding-left: 15px;">
                            <h5 style="margin-top: 15px;">{{$orderProduct->product->name}}</h5>
                        </td>
                        <td valign="top" style="padding-left: 15px;">
                            <h5 style="font-size: 14px; color:#444;margin-top: 10px;">QTY : <span>{{$orderProduct->quantity}}</span></h5>
                        </td>
                        <td valign="top" style="padding-left: 15px;">
                            <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>${{$orderProduct->price}}</b></h5>
                        </td>
                    </tr>
                @endforeach
                <tr class="pad-left-right-space ">
                    <td class="m-t-5" colspan="2" align="left">
                        <p style="font-size: 14px;">{{trans('subtotal')}} : </p>
                    </td>
                    <td class="m-t-5" colspan="2" align="right">
                        <b style>${{$orderDeliveryCost}}</b>
                    </td>
                <tr class="pad-left-right-space">
                    <td colspan="2" align="left">
                        <p style="font-size: 14px;">{{trans('shipping')}} {{trans('charge')}} :</p>
                    </td>
                    <td colspan="2" align="right">
                        <b>${{$orderDeliveryFee}}</b>
                    </td>
                </tr>

                <tr class="pad-left-right-space ">
                    <td class="m-b-5" colspan="2" align="left">
                        <p style="font-size: 14px;">{{trans('total')}} :</p>
                    </td>
                    <td class="m-b-5" colspan="2" align="right">
                        <b>${{$order->total_price}}</b>
                    </td>
                </tr>

            </table>

        </td>
    </tr>
    </tbody>
</table>
<table class="main-bg-light text-center top-0" align="center" border="0" cellpadding="0" cellspacing="0"
       width="100%">
    <tr>
        <td style="padding: 30px;">
            <div>
                <h4 class="title" style="margin:0;text-align: center;">Follow us here</h4>
            </div>
            <table border="0" cellpadding="0" cellspacing="0" class="footer-social-icon" align="center"
                   class="text-center" style="margin-top:20px;">
                <tr>
                    <td>
                        <a href="{{\App\Models\Setting::getSettingByKey('FACEBOOK_URL')}}"><img src="../assets/images/email-temp/facebook.png" alt=""></a>
                    </td>
                    <td>
                        <a href="{{\App\Models\Setting::getSettingByKey('YOUTUBE_URL')}}"><img src="../assets/images/email-temp/youtube.png" alt=""></a>
                    </td>
                    <td>
                        <a href="{{\App\Models\Setting::getSettingByKey('TWITTER_URL')}}"><img src="../assets/images/email-temp/twitter.png" alt=""></a>
                    </td>
                    <td>
                        <a href="{{\App\Models\Setting::getSettingByKey('GMAIL_URL')}}"><img src="../assets/images/email-temp/gplus.png" alt=""></a>
                    </td>
                    <td>
                        <a href="{{\App\Models\Setting::getSettingByKey('LINKEDIN_URL')}}"><img src="../assets/images/email-temp/linkedin.png" alt=""></a>
                    </td>
                    <td>
                        <a href="{{\App\Models\Setting::getSettingByKey('INSTAGRAM_URL')}}"><img src="../assets/images/email-temp/instagram.png" alt=""></a>
                    </td>
                    <td>
                        <a href="{{\App\Models\Setting::getSettingByKey('PINTEREST_URL')}}"><img src="../assets/images/email-temp/pinterest.png" alt=""></a>
                    </td>
                </tr>
            </table>
            <div style="border-top: 1px solid #ddd; margin: 20px auto 0;"></div>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 20px auto 0;">
                <tr>
                    <td>
                        <a href="#" style="font-size:13px">Want to change how you receive these emails?</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="font-size:13px; margin:0;">2018 - 19 Copy Right by Themeforest powerd by Pixel
                            Strap</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#" style="font-size:13px; margin:0;text-decoration: underline;">Unsubscribe</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<!-- tap to top end -->
<script src="{{ url('assets/frontend/js/jquery-3.3.1.min.js') }}"></script>

<!-- menu js-->
<script src="{{ url('assets/frontend/js/menu.js') }}"></script>

<!-- lazyload js-->
<script src="{{ url('assets/frontend/js/lazysizes.min.js') }}"></script>

<!-- popper js-->
<script src="{{ url('assets/frontend/js/popper.min.js') }}"></script>

<!-- slick js-->
<script src="{{ url('assets/frontend/js/slick.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ url('assets/frontend/js/bootstrap.js') }}"></script>

<!-- Bootstrap Notification js-->
<script src="{{ url('assets/frontend/js/bootstrap-notify.min.js') }}"></script>

<!-- Theme js-->
<script src="{{ url('assets/frontend/js/script.js') }}"></script>
</body>

</html>
