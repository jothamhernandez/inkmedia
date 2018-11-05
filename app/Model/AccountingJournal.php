<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountingJournal extends Model
{
    //
    protected $fillable = ['description','type','journal_date'];
    protected $appends = ['transactions'];


    public function getTransactionsAttribute(){
        return $this->attributes['transactions'] = $this->hasMany('App\Model\Transactions','journal_id')->get();
    }
}
