<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AccountingJournal;

class AccountingController extends Controller
{
    //

    public function transaction(){
        return view('system.transactions');
    }

    public function addTransaction(){
        return view('system.addTransaction');
    }

    public function journaltransaction(){
        return view('system.journal');
    }

    public function startingbalance(){
        return view('home');
    }

    public function editJournal($id){
        $journal['data'] = AccountingJournal::find($id);

        return view('system.addTransaction', $journal);
        // return response()->json($journal);
    }
}
