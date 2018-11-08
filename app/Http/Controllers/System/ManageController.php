<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ManageController extends Controller
{
    //

    public function customer(){
        return view('system.customer');
    }

    public function vendors(){
        return view('system.vendor');
    }

    public function chartofaccounts(){
        return view('system.coa');
    }

    public function itemproduct(){
        return view('system.itemproducts');
    }

    public function fiscal(){
        return view('system.fiscaldata');
    }
}
