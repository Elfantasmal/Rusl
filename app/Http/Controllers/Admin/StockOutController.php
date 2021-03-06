<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commodity;
use App\Models\Stock;
use App\Models\StockOut;
use Illuminate\Http\Request;

class StockOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock_outs = StockOut::orderBy('out_at', 'desc')->with('commodity')->paginate(10);
        return view('admin.stock.out.index', compact('stock_outs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commodity_list = Commodity::all()->pluck('name', 'id');
        return view('admin.stock.out.create', compact('commodity_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock_outs = collect($request->input('commodities'))->map(function ($item, $key) use ($request) {
            return [
                'commodity_id' => $item,
                'out_quantity' => $request->input('quantities.' . $key),
                'out_type' => $request->input('out_type.' . $key),
                'out_at' => $request->input('out_at.' . $key)

            ];
        });
        $error = false;
        foreach ($stock_outs as $stock_out) {
            StockOut::create($stock_out);
            if ($stock = Stock::where('commodity_id', $stock_out['commodity_id'])->first() != null) {
                $stock->decrement('stock', $stock_out['out_quantity']);
            } else {
                $error = true;
            }
        }
        if ($error) {
            flash('库存中无商品信息，请先创建库存信息', 'danger');
            return redirect()->route('stock_out.create');
        } else {
            flash('信息已创建', 'success');
            return redirect()->route('stock_out.index');
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
        $stock_outs = Stock::with('commodity')->whereHas('commodity', function ($query) use ($keyword) {
            $query->where('name', 'like', "%$keyword%");
        })->paginate(10);
        return view('admin.stock.out.index', compact('stock_outs'));
    }
}
