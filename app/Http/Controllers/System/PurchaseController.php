<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    //

    public function bills(){
        return view('system.bills');
    }

    public function createBill(){
        return view('system.createBill');
    }

    public function reciepts(){
        return view('home');
    }
}
