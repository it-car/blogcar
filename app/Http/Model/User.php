<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
   protected $table = 'user';
   protected $primaryKey = 'id';
   // 是否维护create_at和updated_at字段
   public $timestamps = false;
   
   // 允许批量操作字段的有哪些
    // public $fillable =['user_name','user_pass','email','pone'];
    // 不允许的有哪些
    // public $guarded = [];
}
