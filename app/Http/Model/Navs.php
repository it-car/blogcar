<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Navs extends Model
{
   protected $table = 'navs';
   protected $primaryKey = 'nav_id';
   // 是否维护create_at和updated_at字段
   public $timestamps = false;
   //哪些字段不允许修改
   protected $guarded = [];
}
