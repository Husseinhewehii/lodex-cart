<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\BaseController;
use App\Models\Order;
use App\Http\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(Request $request, OrderService $orderService)
    {
        if(!auth()->check()){
            return redirect(route('web.auth.login'));
        }

        if(!auth()->user()->addresses()->get()->last()){
            return redirect(route('profile.edit').'#edit_shipping_address');
        }

        $request->request->add(session()->get('cart'));
        $order = $orderService->fillWebRequest($request);
        session()->forget('cart');
        return redirect(route('web.order.success', ['order' => $order->id]));
    }

    public function success(Order $order)
    {
        $orderDeliveryFee = $this->orderService->getOrderDeliveryFee($order);
        $orderDeliveryCost = $this->orderService->getOrderTotalCost($order->id);
        return view('web.orders.success', ['order' => $order, 'orderDeliveryFee' => $orderDeliveryFee, 'orderDeliveryCost' => $orderDeliveryCost]);
    }

    public function index()
    {
        $orders = Order::with(['products','products.product','products.product.images','address','branch.zones'])
            ->where('user_id', auth()->user()->id)
            ->orderBy("created_at", "DESC")
            ->get();

        return response()->json($orders);
    }

    public function show(Order $order)
    {
        $order = $order->with(['products','products.product','address','branch.zones'])
                ->find($order->id);

        return response()->json($order);
    }

    public function cancel(Order $order)
    {
        if ($this->orderService->cancelOrder($order)) {
            return response()->json(['success' => true, 'result' => trans('order_cancelled_successfully')]);
        }

        return response()->json(['success' => false, 'result' => trans('not_cancel_order')]);
    }
}
