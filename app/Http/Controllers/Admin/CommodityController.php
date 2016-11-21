<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commodity;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Response;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commodities = Commodity::with('supplier')->paginate(10);
        return view('admin.commodities.index', compact('commodities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier_list = Supplier::all()->pluck('company_name', 'id');
        return view('admin.commodities.create', compact('supplier_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commodity = Commodity::create($request->all());
        return redirect()->route('commodities.show', $commodity);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commodity = Commodity::findOrFail($id);
        return view('admin.commodities.show', compact('commodity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commodity = Commodity::findOrFail($id);
        $supplier_list = Supplier::all()->pluck('company_name', 'id');
        return view('admin.commodities.edit', compact('commodity', 'supplier_list'));
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
        $commodity = Commodity::findOrFail($id);
        $commodity->update($request->all());
        return redirect()->route('commodities.show', $commodity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Commodity::destroy($id);
        return redirect('/commodities');
    }


    /**
     * Return specified resource json info from storage
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function info($id)
    {
        $info = Commodity::find($id, ['sales_price', 'unit']);
        return Response::json($info);
    }
}
