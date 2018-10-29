<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CoaType extends Model
{
    //
    protected $appends = ['accounts'];


    public function getAccountsAttribute(){
        return $this->attributes['accounts'] = $this->hasMany('App\Model\Coa', 'coa_type')->get();
    }
}
