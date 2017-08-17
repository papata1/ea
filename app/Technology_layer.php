<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology_layer extends Model
{
     public $timestamps = false;
    protected $table="Technology_layer";
      protected $fillable=['name','brand','model','tech_spec','amount','operating_system','cpu_use','memory_total','memory_used','hardisk_total','hardisk_used','utility_app','tech_location','ma_cost','remark','owner','type'] ;
        protected $guarded=['id',] ;
}
