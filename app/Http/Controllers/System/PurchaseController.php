<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    //

    public function bills(){
        return view('home');
    }

    public function reciepts(){
        return view('home');
    }
}
