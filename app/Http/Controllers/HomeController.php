<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\Option;
use App\Models\Type;
use App\Models\Order;

class HomeController extends Controller
{
    public function welcome() {
        $buildings = Building::where('status', array_search('AVAILABLE', Building::$STATUS))->with('options')->limit(4)->get();
        return view('welcome', compact('buildings'));
    }

    public function catalogue() {
        $types = Type::all();
        $buildings = Building::where('status', array_search('AVAILABLE', Building::$STATUS))->with('options')->get();
        return view('catalogue', compact('buildings', 'types'));
    }

    public function detail(Building $building) {
        if ($building->status == array_search('AVAILABLE', Building::$STATUS)) {
            $building->load('options');
            return view('show', compact('building'));
        } else {
            return redirect()->route('welcome');
        }
    }

    public function rent(Request $request) {
        $option = Option::find($request->option_id);

        $order = new Order;
        $order->building_id = $option->building_id;
        $order->user_id = auth()->user()->id;
        $order->total_price = $option->price;
        $order->status = array_search('INIT', Order::$STATUS);
        $order->save();

        return redirect()->route('orders.show', $order->id);
    }
}
