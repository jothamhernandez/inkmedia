<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CoaCategory extends Model
{
    //
    protected $appends = ['coa_types'];

    public function getCoaTypesAttribute(){
        return $this->attributes['coa_types'] = $this->hasMany('App\Model\CoaType','coa_category')->get();
    }
}
