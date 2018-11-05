<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    //
    protected $fillable = ['bill_name','vendor_id','po_so','date_to_issued','date_to_expire','subheading','footer','memo','items'];

    protected $appends = ['vendor'];

    public function getVendorAttribute(){
        return $this->attributes['vendor'] = $this->belongsTo('App\Model\Vendor','vendor_id')->first();
    }
}
