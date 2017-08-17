<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
      public $timestamps = false;
    protected $table="Department";
      protected $fillable=['name','remark'] ;
        protected $guarded=['id',] ;
}
