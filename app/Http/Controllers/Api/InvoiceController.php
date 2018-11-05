<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Invoices;
use App\Model\Transactions;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Invoices::all());
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
        $status= $request->query('status');
        $invoice = Invoices::find($id);
        $invoice->status = $status;

        $items = json_decode($invoice['items'], true);
        $totalPrice = 0;
        collect($items)->each(function($d) use(&$totalPrice){
            $totalPrice += ($d['price'] * $d['quantity']) + $d['tax'];
        });


        if($status == 'paid'){
            $transaction = new Transactions();
            $transaction['account'] = "Sales";
            $transaction['account_code'] = "SALE";
            $transaction['description'] = "Payment on " . $invoice['estimate_name'] . " with invoice id#" . $invoice['id'];
            $transaction['price'] = $totalPrice;
            $transaction['entry'] = 'debit';
            $transaction['status'] = 'approved';
            $transaction->save();
        }
        // dd($transaction);
        $invoice->save();
        return response()->json($invoice);
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
