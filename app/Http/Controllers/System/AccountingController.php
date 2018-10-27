<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountingController extends Controller
{
    //

    public function transaction(){
        return view('home');
    }

    public function journaltransaction(){
        return view('home');
    }

    public function startingbalance(){
        return view('home');
    }
}
