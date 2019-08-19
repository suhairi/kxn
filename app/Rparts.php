<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rparts extends Model
{
    protected $fillable = ['repair_id', 'name', 'quantity', 'price', 'total'];

    public function setNameAttribute($value) {
    	$this->attributes['name'] = ucwords($value);
    }

    public function repair() {
    	return $this->belongsTo('App\Repair');
    }

    public $timestamps = false;
}
