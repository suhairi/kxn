<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['invoice_no', 'repair_id', 'date'];

    public function setDateAttribute( $value ) {
      $this->attributes['date'] = (new Carbon($value))->format('Y-m-d H:i:s');
    }

    public function repair() {
    	return $this->belongsTo('App\Repair', 'repair_id', 'id');
    }
}
