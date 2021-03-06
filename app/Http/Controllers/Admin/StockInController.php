<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commodity;
use App\Models\Stock;
use App\Models\StockIn;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock_ins = StockIn::orderBy('in_at', 'desc')->with('commodity')->paginate(10);
        return view('admin.stock.in.index', compact('stock_ins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commodity_list = Commodity::with('stock')->pluck('name', 'id');
        return view('admin.stock.in.create', compact('commodity_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock_ins = collect($request->input('commodities'))->map(function ($item, $key) use ($request) {
            return [
                'commodity_id' => $item,
                'in_quantity' => $request->input('quantities.' . $key),
                'in_type' => $request->input('in_type.' . $key),
                'in_at' => $request->input('in_at.' . $key)

            ];
        });
        $error = false;
        foreach ($stock_ins as $stock_in) {
            StockIn::create($stock_in);
            if ($stock = Stock::where('commodity_id', $stock_in['commodity_id'])->first() != null) {
                $stock->increment('stock', $stock_in['in_quantity']);
            } else {
                $error = true;
            }
        }
        if ($error) {
            flash('库存中无商品信息，请先创建库存信息', 'danger');
            return redirect()->route('stock_in.create');
        } else {
            flash('信息已创建', 'success');
            return redirect()->route('stock_in.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $stock_ins = StockIn::with('commodity')->whereHas('commodity', function ($query) use ($keyword) {
            $query->where('name', 'like', "%$keyword%");
        })->paginate(10);
        return view('admin.stock.in.index', compact('stock_ins'));
    }
}
