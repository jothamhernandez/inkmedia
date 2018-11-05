<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Bills;
use App\Model\Transactions;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Bills::all());
        
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
        $forBill = $request->except(['toBill','items']);
        $forBill['vendor_id'] = $request->input('toBill')['id'];
        $items = $request->input('items');


        // return response()->json($forEstimate);
        $forBill['items'] = [];

        collect($items)->each(function($data, $key) use (&$forBill){
            $forItem['item_id'] = $data['item']['id'];
            $forItem['description'] = $data['description'];
            $forItem['quantity'] = $data['quantity'];
            $forItem['price'] = $data['price'];
            $forItem['tax'] = $data['tax']; 
            array_push($forBill['items'], $forItem);
        });

        $forBill['items'] = collect($forBill['items'])->toJson();
        $bill = Bills::create($forBill);


        return response()->json($bill);
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
        $bill = Bills::find($id);
        $status = $request->query('status');
        $vendor = $bill->vendor->vendor_name;
        unset($bill['vendor']);
        


        if($status == 'paid'){
            $items = json_decode($bill['items'], true);
            $totalPrice = 0;
            collect($items)->each(function($d) use(&$totalPrice){
                $totalPrice += ($d['price'] * $d['quantity']) + $d['tax'];
            });


            $bill['status'] = 'paid';
            
            $transaction = new Transactions();
            $transaction['account'] = "Expense";
            $transaction['account_code'] = "EXPENSE";
            $transaction['description'] = "Payment for " . $vendor . " with bill id#" . $bill['id'];
            $transaction['price'] = $totalPrice;
            $transaction['entry'] = 'credit';
            $transaction['status'] = 'approved';
            
            $bill->save();
            $transaction->save();
        }
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
