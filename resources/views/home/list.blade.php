@extends('layouts.home')
@section('info')
<title>{{$field->cate_name}} —— {{Config::get('myConfig.web_title')}}</title>
<meta name="keywords" content="{{$field->cate_keywords}}" />
<meta name="description" content="{{$field->cate_description}}" />
@endsection
<link href="{{asset('resources/views/home/css/style.css')}}" rel="stylesheet">
@section('content')
<!-- 主体内容开始 -->
<article class="blogs">
  <h1 class="t_nav">
    <span>{{$field->cate_title}}</span>
    <a href="{{url('/')}}" class="n1">网站首页</a>
    <a href="{{url('/cate/'.$field->cate_id)}}" class="n2">{{$field->cate_name}}</a>
  </h1>

  <!-- 左边开始 -->
  <div class="newblog left">
    @foreach($data as $d)
   <h2>{{$d->art_title}}</h2>
   <p class="dateview"><span>发布时间：{{$d->art_time}}</span><span>作者：{{$d->art_author}}</span><span>分类：[<a href="{{url('/cate/'.$field->cate_id)}}">{{$field->cate_name}}</a>]</span></p>
    <figure><img src="{{url($d->art_photo)}}"></figure>
    <ul class="nlist">
      <p>{{$d->art_description}}</p>
      <a title="{{$d->art_title}}" href="{{url('article/'.$d->art_id)}}" target="_blank" class="readmore">阅读全文>></a>
    </ul>
    <div class="line"></div>
    @endforeach
    <!-- 分页 -->
    <div class="page">
      {{$data->links()}}
    </div>
    
  </div>
<!-- 左边结束 -->
<!-- 右边开始 -->
  <aside class="right">
    <!--判断是否有子类 循环输出子类 -->
    @if($subclass)
    <div class="rnav">
        <ul>
          @foreach($subclass as $k=>$s)
          <li class="rnav{{$k+1}}"><a href="{{url('cate/'.$s->cate_id)}}" target="_blank">{{$s->cate_name}}</a></li>
          @endforeach
       </ul>      
    </div>
  @endif
  <!-- 最新文章 -->
  <div class="news">
    @parent
    <div class="visitors">
      <h3><p>最近访客</p></h3>
      <ul>
        
      </ul>
    </div>
     <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
      <a class="bds_tsina"></a>
      <a class="bds_qzone"></a>
      <a class="bds_tqq"></a>
      <a class="bds_renren"></a>
      <span class="bds_more"></span>
      <a class="shareCount"></a>
    </div>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script> 
    <script type="text/javascript" id="bdshell_js"></script> 
    <script type="text/javascript">
      document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
    </script> 
    <!-- Baidu Button END -->   
</aside>
<!-- 右边结束-->
</article>
@endsection