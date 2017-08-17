<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business_relation extends Model
{
    protected $table="Business_relation";
    public $timestamps = false;
    protected $fillable=['name','business_layer_id','comp_id','frag'] ;
    protected $guarded=['id',] ;
}
