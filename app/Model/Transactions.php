<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    //
    protected $fillable = ['account','account_code','description','price','entry','status','journal_id'];
}
