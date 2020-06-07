@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;配置项管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<!-- <div class="search_wrap">
            <form action="" method="post">
                <table class="search_tab">
                    <tr>
                        <th width="120">选择分类:</th>
                        <td>
                            <select onchange="javascript:location.href=this.value;">
                                <option value="">全部</option>
                                <option value="http://www.baidu.com">百度</option>
                                <option value="http://www.sina.com">新浪</option>
                            </select>
                        </td>
                        <th width="70">关键字:</th>
                        <td><input type="text" name="keywords" placeholder="关键字"></td>
                        <td><input type="submit" name="sub" value="查询"></td>
                    </tr>
                </table>
            </form>
        </div> -->
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
        <div class="result_wrap">
            <div class="result_title">
            <h3>配置项列表</h3>
            @if(count($errors)>0)
            <div class="mark">
            @if(is_object($errors))
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            @else
                <p>{{$errors}}</p>
            @endif
            </div>
            @endif
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>添加配置项</a>
                    <a href="{{url('admin/config')}}"><i class="fa fa-recycle"></i>全部配置项</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content"> 
                <form action="{{url('admin/config/changecontent')}}" method="post">
                {{csrf_field()}}
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>标题</th>
                        <th>名称</th>
                        <th>内容</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                    <tr>
                        <td class="tc">
                            <input type="text" onchange="changeOrder(this,{{$v->conf_id}})" name="ord[]" value="{{$v->conf_order}}">
                        </td>
                        <td class="tc">{{$v->conf_id}}</td>
                        <td>
                            <a href="#">{{$v->conf_title}}</a>
                        </td>
                        <td>{{$v->conf_name}}</td>
                        <td>
                            <input type="hidden" name="conf_id[]" value="{{$v->conf_id}}">
                            {!!$v->_html!!}
                        </td>
                        <td>
                            <a href="{{url('admin/config/'.$v->conf_id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick="deleCate({{$v->conf_id}})">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="btn_group" style="text-align: center;">
                    <input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回" >
                </div>
                <!-- <div class="page_list">
                    <ul>
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div> -->
            </form>
            </div>
        </div>
    <!--搜索结果页面 列表 结束-->
    <script type="text/javascript">
        //修改input值异步操作 修改分类排序
        function changeOrder(obj,conf_id){
            //获取用户自定义输入的值
            var conf_order = $(obj).val();
            $.post("{{url('admin/config/changeorder')}}",{'_token':'{{csrf_token()}}','conf_order':conf_order,'conf_id':conf_id},function(data){
                // alert(data.status);
                if (data.status == 0) {
                    layer.msg(data.msg, {icon: 6});
                } else {
                    layer.msg(data.msg, {icon: 5});
                }
            });
        }

        //删除项
        function deleCate(conf_id){
            // alert('22');
            layer.confirm('确认删除吗？', {
              btn: ['确认','手滑了'] //按钮
            }, function(){
              // alert(cate_id)
              $.post("{{url('admin/config/')}}/"+conf_id,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
                // alert(data.status);
                if (data.status == 0) {
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                } else {
                    layer.msg(data.msg, {icon: 5});
                }
              });

              // layer.msg('的确很重要', {icon: 1});    
              }, function(){
                
                });
        }
    </script>


@endsection