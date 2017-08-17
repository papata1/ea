<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initial extends Model
{
    public $timestamps = false;
    protected $table="place";
    protected $fillable=['name','initial'] ;
    protected $guarded=['id',] ;
}
