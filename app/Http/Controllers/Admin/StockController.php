<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commodity;
use App\Models\Stock;
use App\Models\StockIn;
use App\Models\StockOut;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::with('commodity')->paginate(10);
        return view('admin.stock.index', compact('stocks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commodities = Commodity::all()->pluck('name', 'id');
        return view('admin.stock.create', compact('commodities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock = Stock::create($request->all());
        return redirect()->route('stocks.show', $stock);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = Stock::findOrFail($id);
        $recently_stock_ins = StockIn::with('commodity')->whereCommodityId($stock->commodity_id)->get()->take(5);
        $recently_stock_outs = StockOut::with('commodity')->whereCommodityId($stock->commodity_id)->get()->take(5);
        return view('admin.stock.show', compact('stock', 'recently_stock_ins', 'recently_stock_outs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::with('commodity')->findOrFail($id);
        $commodities = Commodity::all()->pluck('name', 'id');
        return view('admin.stock.edit', compact('stock', 'commodities'));
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
        $stock = Stock::findOrFail($id);
        $stock->update($request->all());
        return redirect()->route('stocks.show', $stock);
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
        $stocks = Stock::with('commodity')->whereHas('commodity', function ($query) use ($keyword) {
            $query->where('name', 'like', "%$keyword%");
        })->paginate(10);
        return view('admin.stock.index', compact('stocks'));
    }
}
