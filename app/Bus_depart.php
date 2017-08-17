<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus_depart extends Model
{
  public $timestamps = false;
    protected $table="Bus_depart";
      protected $fillable=['id','bus_id','department_id'] ;
        protected $guarded=['id',] ;

}
