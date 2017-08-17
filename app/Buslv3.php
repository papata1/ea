<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buslv3 extends Model
{
    public $timestamps = false;
    protected $table="business_layer_lv3";
    protected $fillable=['name','short','remark','lv2_id'] ;
    protected $guarded=['id'] ;
}

