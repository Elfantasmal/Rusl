<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase_orders = PurchaseOrder::paginate(10);
        return view('admin.orders.purchase.index', compact('purchase_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all()->pluck('company_name', 'id');
        return view('admin.orders.purchase.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase_order = PurchaseOrder::create($request->all());

        $order_details = collect($request->input('commodities'))->map(function ($item, $key) use ($request, $purchase_order) {
            return [
                'order_id' => $purchase_order->id,
                'commodity_id' => $item,
                'quantity' => $request->input('quantities.' . $key),
                'subtotal' => $request->input('subtotals.' . $key),
                'order_type' => 'purchase_order'

            ];
        });

        foreach ($order_details as $order_detail) {
            OrderDetail::create($order_detail);
        }

        flash('订单已创建', 'success');

        return redirect()->route('purchase_orders.show', $purchase_order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase_order = PurchaseOrder::with('supplier', 'orderDetails.commodity')->findOrFail($id);
        return view('admin.orders.purchase.show', compact('purchase_order'));
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

    /**
     * Search the specified resource with keyword from storage.
     *
     * @param string $keyword
     * @return \Illuminate\Http\JsonResponse
     */
    public function search($keyword)
    {
        $purchase_orders = PurchaseOrder::with('supplier')->whereHas('supplier', function ($query) use ($keyword) {
            $query->where('company_name', 'like', "%$keyword%");
        })->paginate(10);
        return view('admin.orders.purchase.index', compact('purchase_orders'));
    }
}
