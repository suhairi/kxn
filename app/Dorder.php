<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dorder extends Model
{
    protected $fillable = ['do_no', 'repair_id', 'date'];
    protected $table 	= 'do';
    public $timestamps	= false;

    public function repair() {
    	return $this->hasOne('App\Repair');
    }

    public function setDateAttribute( $value ) {
      $this->attributes['date'] = (new Carbon($value))->format('Y-m-d H:i:s');
    }
}
