<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;
    protected $table="Brand";
    protected $fillable=['name','remark'] ;
    protected $guarded=['id',] ;
}
