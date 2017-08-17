<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Use_data extends Model
{
    public $timestamps = false;
    protected $table="Use_data";
    protected $fillable=['name','remark'] ;
    protected $guarded=['id',] ;
}
