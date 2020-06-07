<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    @include('admin.public.script')
    @include('admin.public.style')
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; <a href="{{url('admin/article')}}">文章管理</a> &raquo;编辑文章
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
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
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>添加文章</a>
                <a href="{{url('admin/article')}}"><i class="fa fa-recycle"></i>全部文章</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/article/'.$field->art_id)}}" method="post">
            <input type="hidden" value="put" name="_method">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>分类：</th>
                        <td>
                            <select name="cate_id">
                                <option value="0">==顶级分类==</option>
                                @foreach($data as $v)
                                <option value="{{$v->cate_id}}" 
                                    @if($v->cate_id==$field->cate_id) selected="selected" @endif>
                                    {{$v->_cate_name}}
                                </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>文章标题：</th>
                        <td>
                            <input type="text" class="lg" name="art_title" value="{{$field->art_title}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>分类标题必须填写</span>
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>
                     <tr>
                        <th>编辑作者：</th>
                        <td>
                            <input type="text" name="art_author" value="{{$field->art_author}}">
                        </td>
                    </tr>
                     <tr>
                        <th>缩略图：</th>
                        <td>
                            <input type="text" size="50" name="art_photo" value="{{$field->art_photo}}">
                            <script src="{{asset('resources/views/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('resources/views/org/uploadify/uploadify.css')}}">
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#file_upload').uploadify({
                                        'buttonText':'修改图片！',
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : '{{csrf_token()}}'
                                        },
                                        'swf'      : "{{asset('resources/views/org/uploadify/uploadify.swf')}}",
                                        'uploader' : "{{url('admin/upload')}}",
                                        'onUploadSuccess' : function(file,data,response){
                                            // alert(data);
                                            $("input[name='art_photo']").val(data);
                                            $('#samll_img').attr("src",'/laravel/'+data);
                                        }
                                    });
                                });
                            </script>
                            <style type="text/css">
                                .uploadify{
                                    display: inline-block;
                                }
                                .uploadify-botton{
                                    border: none;
                                    border-radius: 5px;
                                    margin-top: 8px;
                                }
                                .add_tab tr td span.uploadify-button-text{
                                    color: #fff;
                                    margin: 0;
                                }
                            </style>
                        </td>
                    </tr>
                    <tr>
                        <th>预览缩略图：</th>
                        <td>
                            <img src="/laravel/{{$field->art_photo}}" alt="" id="samll_img" style="max-width: 350px;max-height: 100px;">
                        </td>
                    </tr>
                    <tr>
                        <th>关键词：</th>
                        <td>
                            <input type="text" class="lg" name="art_keywords" value="{{$field->art_keywords}}">
                        </td>
                    </tr>
                    <tr>
                        <th>文章描述：</th>
                        <td>
                            <textarea name="art_description">{{$field->art_description}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>文章内容：</th>
                        <td>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/views/org/ueditor/ueditor.config.js')}}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/views/org/ueditor/ueditor.all.min.js')}}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/views/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                            <script id="editor" name="art_content" type="text/plain" style="width:860px;height:300px;">{!!$field->art_content!!}</script>
                            <script type="text/javascript">
                                var ue = UE.getEditor('editor');
                            </script>
                            <style type="text/css">
                                .edui-default{line-hight:28px;}
                                div.edui-combox-body,
                                div.edui-button-body,
                                div.edui-splitbutton-body{
                                    overflow:hidden;
                                    height: 20px;
                                }
                                    div.edui-box{
                                        overflow: hidden;
                                        height: 22px;
                                    }
                                }
                            </style>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

</body>
</html>