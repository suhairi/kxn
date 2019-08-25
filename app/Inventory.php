<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Supplier;

class Inventory extends Model
{
    protected $table        = 'inventory';
    protected $primaryKey 	= 'id';
    protected $fillable		= ['name', 'supplier_id', 'date', 'quantity', 'price', 'discount', 'tax'];
    protected $dates 		= ['date'];

    public $timestamps = false;

    public function setNameAttribute($value) {
    	$this->attributes['name'] = ucwords($value);
    }

    public function setDateAttribute( $value ) {
      $this->attributes['date'] = (new Carbon($value))->format('Y-m-d H:i:s');
    }

    public function supplier() {
    	return $this->belongsTo('App\Supplier', 'supplier_id', 'id');
    }

    public function getSupplierItems($supplier_id) {
        $items = Inventory::where('supplier_id', $supplier_id)->groupBy('date')->get();

        return $items;
    }
}
