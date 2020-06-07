<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
   protected $table = 'config';
   protected $primaryKey = 'conf_id';
   // 是否维护create_at和updated_at字段
   public $timestamps = false;
   //哪些字段不允许修改
   protected $guarded = [];
}
