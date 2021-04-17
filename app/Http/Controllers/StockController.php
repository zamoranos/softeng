<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\StockCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::all();
        return Inertia::render('Stocks/Index',
        ['stocks'=>$stocks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stock_categories = StockCategory::select('id')->get();
        return Inertia::render('Stocks/Create',
        ['stock_categories'=>$stock_categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'id' => 'required|numeric|unique:stocks',
                'stock_category_id' => 'required',
                'description' => 'required',
                'uom' => 'required',
                'barcode' => 'nullable|numeric',
                //'discontinued' => 'required',
                //'photo_path' => 'nullable',
            ]
        );

        $model = new Stock();
        $model->id = $request->id;
        $model->stock_category_id = $request->stock_category_id;
        $model->description = $request->description;
        $model->uom = $request->uom;
        $model->barcode = $request->barcode;
        $model->discontinued = $request->discontinued;
        //$model->photo_path = $request->photo_path;

        $model->save();

        return redirect()->back()->with('success', 'New Stock Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
