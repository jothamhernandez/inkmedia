<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Estimate;
use App\Model\EstimateItems;

class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Estimate::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $forEstimate = $request->except(['toBill','items']);
        $forEstimate['customer_id'] = $request->input('toBill')['id'];
        $items = $request->input('items');


        // return response()->json($forEstimate);
        $estimate = Estimate::create($forEstimate);

        collect($items)->each(function($data, $key) use ($estimate){
            $forItem['estimate_id'] = $estimate->id;
            $forItem['item_id'] = $data['item']['id'];
            $forItem['description'] = $data['description'];
            $forItem['quantity'] = $data['quantity'];
            $forItem['price'] = $data['price'];
            $forItem['tax'] = $data['tax'];
            $item = EstimateItems::create($forItem);
        });
        
        $estimate = Estimate::find($estimate->id);

        return response()->json($estimate);
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
        $estimate = Estimate::find($id);
        $estimate->delete();
    }
}
