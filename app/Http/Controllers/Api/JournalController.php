<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Transactions;
use App\Model\AccountingJournal;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(AccountingJournal::all());
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
        $transactions = collect($request['transactions'])->toArray();
        unset($request['transactions']);
        $journal = AccountingJournal::create($request->all());
        collect($transactions)->each(function($transaction) use($journal){
            $transaction['journal_id'] = $journal->id;
            Transactions::create($transaction);
        });
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
        $transactions = collect($request['transactions'])->toArray();
        unset($request['transactions']);
        $journal = AccountingJournal::find($id);
        $journal->update($request->all());
        collect($transactions)->each(function($transaction) use ($journal){
            unset($transaction['id']);
            $t = Transactions::where($transaction)->first();
            if($t == []){
                $transaction['journal_id'] = $journal->id;
                Transactions::create($transaction);
            } else {
                $t->update($transaction);
            }
            
        });
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
