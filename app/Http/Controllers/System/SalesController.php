<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    //

    public function estimates(){
        return view('system.estimate');
    }

    public function createEstimate(){
        return view('system.createEstimate');
    }

    public function invoices(){
        return view('home');
    }

    public function customerstatements(){
        return view('home');
    }
}
