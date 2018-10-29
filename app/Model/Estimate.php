<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    //
    protected $fillable = ['estimate_name','customer_id','po_so','date_to_issued','date_to_expire','subheading','footer','memo'];

    protected $appends = ['items','customer'];

    public function getItemsAttribute(){
        return $this->attributes['items'] = $this->hasMany('App\Model\EstimateItems','estimate_id')->get();
    }

    public function getCustomerAttribute(){
        return $this->attributes['customer'] = $this->belongsTo('App\Model\Customer','customer_id')->first();
    }
}
