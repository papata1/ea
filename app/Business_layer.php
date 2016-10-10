<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business_layer extends Model
{
  public $timestamps = false;
    protected $table="Business_layer";
      protected $fillable=['name','workflow_path','remark','department_id'] ;
        protected $guarded=['id',] ;

}
