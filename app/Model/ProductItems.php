<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductItems extends Model
{
    //
    protected $fillable = ['name','description','price','isSellable','isBuyable','income_account','expense_account','sales_tax'];
}
