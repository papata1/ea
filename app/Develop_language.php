<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Develop_language extends Model
{
    public $timestamps = false;
    protected $table="Develop_language";
    protected $fillable=['name','remark'] ;
    protected $guarded=['id',] ;
}
