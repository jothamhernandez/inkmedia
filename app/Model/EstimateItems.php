<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EstimateItems extends Model
{
    //
    protected $fillable = ['estimate_id','item_id','description','quantity','price','tax'];
}
