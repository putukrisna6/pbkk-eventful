<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use App\Models\Profile;

class OrdersController extends Controller
{
    public function show($id) {
        $user = User::find(Auth::id());
        $profile = Profile::where('user_id', $user->id)->first();
        $order = Order::where('id', $id)->with('building')->first();

        return view('order', compact('order', 'user', 'profile'));
    }

    public function update(Request $request) {
        try {
            $request->validate([
                'proof_of_payment' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }

        $order = Order::where('id', $request->id)->first();
        $order->status = array_search('PENDING', Order::$STATUS);
        $order->proof_of_payment = base64_encode(file_get_contents($request->file('proof_of_payment')->path()));
        $order->save();

        return 'complete';
    }

    public function ordersQueue() {
        $status = Order::$STATUS;
        $orders = Order::where('status', array_search('PENDING', Order::$STATUS))->with('building', 'user')->get();
        return view('admin.management.orders.index', compact('orders', 'status'));
    }

    public function ordersApprove(Request $request) {
        $order = Order::find($request->order_id);
        $order->status = array_search('PAID', Order::$STATUS);
        $order->save();

        session()->flash('success', 'Order payment confirmed successfully');
        return redirect()->route('orders.queue');
    }
}
