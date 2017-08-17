<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buslv2 extends Model
{
    public $timestamps = false;
    protected $table="business_layer_lv2";
    protected $fillable=['name','short','remark','lv1_id'] ;
    protected $guarded=['id'] ;
}
