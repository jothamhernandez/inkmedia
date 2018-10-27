<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ManageController extends Controller
{
    //

    public function customer(){
        return view('home');
    }

    public function vendors(){
        return view('home');
    }
}
