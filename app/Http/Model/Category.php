<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  //连接数据表
   protected $table = 'category';
   //设置说明主键
   protected $primaryKey = 'cate_id';
   //是否记录修改时间，如果没设置，在修改数据库中的数据时会出错，如修改密码，报错信息是让你添加一个‘create_at’字段
   public $timestamps = false;
   //哪些字段不允许修改 黑名单 (批量修改时用到)
   protected $guarded = [];

   public function class_set($cate_id)
   {
     $all_class = Category::orderBy('cate_order','asc')->get();
     $class_set = [$cate_id];
     // 调用下面的递归方法
     $this->get_class_set($cate_id,$all_class,$class_set);
     // 把这个数组return出去
     return $class_set;
   }
   // 递归拿到自己所在id的所有之类包括[自己-->($class_set = [$cate_id];)]，存在$class_set数组里面
   public function get_class_set($cate_id,$all_class,&$class_set)
   {
     foreach ($all_class as $class) {
       if ($class['cate_pid'] == $cate_id) {
         array_push($class_set, $class['cate_id']);
         $this->get_class_set($class['cate_id'],$all_class,$class_set);
       }
     }
     return;
   }

   //调用分类树方法返回$class_tree数组
   public function tree()
   {
   		// $category = $this::all();
      $category = $this->orderBy('cate_order','asc')->get();
      $class_tree = array();
      $this->getTree($category,$class_tree,0,'|');
      return $class_tree;
   }
   //递归实现分类树方法
   public function getTree($data,&$class_tree,$pid,$seperator)
   {
     $seperator .= '-';
     foreach ($data as $value) {
       if ($value->cate_pid == $pid) {
         $new_code = array(
            "cate_id" => $value->cate_id,
            "cate_pid" => $value->cate_pid,
            "cate_order" => $value->cate_order,
            "cate_name" => $value->cate_name,
            "cate_title" => $value->cate_title,
            "cate_view" => $value->cate_view,
            "cate_description" => $value->cate_description,
            "cate_keywords" => $value->cate_keywords,
            "seperator" => $seperator
         );
         array_push($class_tree, $new_code);
         $this->getTree($data,$class_tree,$value->cate_id,$seperator);
       }
     }
     return;
   }

   //static关键字静态的，不可用this指向，用(new Category)
   // public static function tree()
   // {
   // 		$category = Category::all();
   //      return (new Category())->getTree($category,'cate_name','cate_id','cate_pid',0);
   // }
   
   //分类树功能  可用递归实现  这里是用了嵌套循环
   /*public function getTree($data,$field_name,$field_id='id',$field_pid='pid',$pid=0)
    {
        $arr = array();
        foreach ($data as $k => $v) {
            //循环找到$v->cate_pid == 0的（新闻，娱乐，体育）即父亲
            if ($v->$field_pid == $pid) {
                $data[$k]['_'.$field_name] =$data[$k][$field_name];
                $arr[] = $data[$k];
                foreach ($data as $m => $n) {
                    //循环找到$n->cate_pid == $v->cate_id,就是父亲的子类
                    //$n->$field_pid -->子类中的父id字段   $v->$field_id -->父id字段
                    if ($n->$field_pid == $v->$field_id) {
                        $data[$m]['_'.$field_name] = '|-->'.$data[$m][$field_name];
                        $arr[] = $data[$m];
                    }
                }
            }
        }
        return $arr;
    }*/





}
