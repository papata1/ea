<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buslv1 extends Model
{
    public $timestamps = false;
    protected $table="business_layer_lv1";
    protected $fillable=['name','short','select_lv','remark'] ;
    protected $guarded=['id'] ;
}
