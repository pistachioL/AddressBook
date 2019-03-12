<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = 'info';
    public $timestamps = false;
    protected $fillable = ['department','name','phone','short_number'];//可批量赋值
   // protected $primaryKey = 'id';
}
