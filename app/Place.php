<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public $timestamps = false;
    protected $table="place";
    protected $fillable=['name','remark'] ;
    protected $guarded=['id',] ;
}
