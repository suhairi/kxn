<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $table	= 'invoice';
    protected $fillable = ['invoice_no', 'repair_id', 'date'];
    public $timestamps	= false;

    public function setDateAttribute( $value ) {
      $this->attributes['date'] = (new Carbon($value))->format('Y-m-d H:i:s');
    }

    public function repair() {
    	return $this->belongsTo('App\Repair', 'repair_id', 'id');
    }
}
