<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devlopment_group extends Model
{
    public $timestamps = false;
    protected $table="devlopment_group";
    protected $fillable=['name','remark'] ;
    protected $guarded=['id',] ;
}
