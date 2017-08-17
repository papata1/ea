<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_process extends Model
{
    public $timestamps = false;
    protected $table="Type_process";
    protected $fillable=['name','remark'] ;
    protected $guarded=['id',] ;
}
