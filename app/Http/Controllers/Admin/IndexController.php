<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commodity;
use App\Models\Customer;
use App\Models\PurchaseOrder;
use App\Models\SalesOrder;
use App\Models\Supplier;
use App\Models\User;

class IndexController extends Controller
{
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
        $recently_added_sales_orders = SalesOrder::orderBy('created_at', 'desc')->with('customer')->take(5)->get();
        $recently_added_purchase_orders = PurchaseOrder::orderBy('created_at', 'desc')->with('supplier')->take(5)->get();
        $recently_added_commodities = Commodity::orderBy('created_at', 'desc')->with('supplier')->take(5)->get();
        return view('admin.index', compact(
            'count',
            'recently_added_sales_orders',
            'recently_added_purchase_orders',
            'recently_added_commodities'));
    }
}
