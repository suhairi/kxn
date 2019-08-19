<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
	protected $table	= 'car';
    protected $fillable = ['owner', 'plateNo', 'model'];

    public function setOwnerAttribute($value) {
    	$this->attributes['owner'] = ucwords($value);
    }

    public function setPlateNoAttribute($value) {
    	$this->attributes['plateNo'] = strtoupper($value);
    }

    public function setModelAttribute($value) {
    	$this->attributes['model'] = strtoupper($value);
    }

    public function repair() {
        return $this->hasMany('App\Repair');
    }

    public $timestamps = false;
}
