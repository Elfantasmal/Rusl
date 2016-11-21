<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commodity;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\User;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = [
            'user_count' => User::count(),
            'commodity_count' => Commodity::count(),
            'customer_count' => Customer::count(),
            'supplier_count' => Supplier::count()
        ];
        return view('admin.index', compact('count'));
    }

    public function test() {
        return view('admin.orders.purchase.index');
    }
}
