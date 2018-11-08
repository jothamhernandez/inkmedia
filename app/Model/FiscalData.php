<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FiscalData extends Model
{
    //
    protected $fillable = ['fiscal_year','start_date','end_date','starting_balance'];
}
