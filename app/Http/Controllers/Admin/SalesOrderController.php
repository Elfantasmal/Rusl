<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commodity;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\SalesOrder;
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_orders = SalesOrder::paginate(10);
        return view('admin.orders.sales.index', compact('sales_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer_list = Customer::all()->pluck('company_name', 'id');
        $commodity_list = Commodity::all()->pluck('name', 'id');
        return view('admin.orders.sales.create', compact('customer_list', 'commodity_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sales_order = SalesOrder::create($request->all());

        $order_details = collect($request->input('commodities'))->map(function ($item, $key) use ($request, $sales_order) {
            return [
                'order_id' => $sales_order->id,
                'commodity_id' => $item,
                'quantity' => $request->input('quantities.' . $key),
                'subtotal' => $request->input('subtotals.' . $key),
                'order_type' => 'sales_order'

            ];
        });

        foreach ($order_details as $order_detail) {
            OrderDetail::create($order_detail);
        }

        return redirect()->route('sales_orders.show', $sales_order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales_order = SalesOrder::with('customer', 'orderDetails.commodity')->findOrFail($id);
        return view('admin.orders.sales.show', compact('sales_order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
