<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class application_relation extends Model
{
  public $timestamps = false;
    protected $table="application_relation";
      protected $fillable=['name','application_layer_id','comp_id','frag'] ;
        protected $guarded=['id',] ;
}
