<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    //

    protected $fillable = ['estimate_name','customer_id','po_so','date_to_issued','date_to_expire','subheading','footer','memo','items'];

    protected $appends = ['customer'];

    public function getCustomerAttribute(){
        return $this->attributes['customer'] = $this->belongsTo('App\Model\Customer','customer_id')->first();
    }
}
