<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table 	= 'supplier';
    protected $fillable = ['name'];

    public $timestamps = false;

    public function setNameAttribute($value) {
    	$this->attributes['name'] = strtoupper($value);
    }

}
