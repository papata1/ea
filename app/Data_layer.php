<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_layer extends Model
{
  public $timestamps = false;
    protected $table="Data_layer";
      protected $fillable=['name','remark'] ;
        protected $guarded=['id',] ;
}
