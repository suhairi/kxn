<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
	protected $table 	= 'repair';
    protected $fillable = ['car_id', 'dateIn', 'dateOut', 'grandTotal', 'status'];

    public function setDateInAttribute( $value ) {
      $this->attributes['dateIn'] = (new Carbon($value))->format('Y-m-d H:i:s');
    }

    public function setDateOutAttribute( $value ) {
      $this->attributes['dateOut'] = (new Carbon($value))->format('Y-m-d H:i:s');
    }

    public function car() {
    	return $this->belongsTo('App\Car', 'car_id', 'id');
    }

    public function rparts() {
        return $this->hasMany('App\Rparts');
    }

    public function invoice() {
        return $this->hasOne('App\Invoice');
    }


}
