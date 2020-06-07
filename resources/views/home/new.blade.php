﻿@extends('layouts.home')

@section('info')
<title>{{$field->art_title}} —— {{Config::get('myConfig.web_title')}}</title>
<meta name="keywords" content="{{$field->art_keywords}}" />
<meta name="description" content="{{$field->art_description}}" />
@endsection
<link href="{{asset('resources/views/home/css/new.css')}}" rel="stylesheet">
@section('content')
<article class="blogs">
  <h1 class="t_nav">
    <span>您当前的位置：<a href="{{url('/')}}">首页</a>&nbsp;&gt;&nbsp;<a href="{{url('cate/'.$field->cate_id)}}">{{$field->cate_name}}</a></span>
    <a href="{{url('/')}}" class="n1">网站首页</a>
    <a href="{{url('cate/'.$field->cate_id)}}" class="n2">{{$field->cate_name}}</a>
  </h1>

  <!-- 左边开始 -->
  <div class="index_about">
    <h2 class="c_titile">{{$field->art_title}}</h2>
    <p class="box_c"><span class="d_time">发布时间：{{$field->art_time}}</span><span>编辑：{{$field->art_author}}</span><span>查看次数：{{$field->art_views}}</span></p>
    <ul class="infos">
      {!!$field->art_content!!}
    </ul>
    <div class="keybq">
    <p><span>关键字词</span>：{{$field->art_keywords}}</p>
    </div>

    <div class="ad"> </div>
    <div class="nextinfo">
      <p>上一篇：
        @if($article['pre'])
        <a href="{{url('article/'.$article['pre']->art_id)}}">{{$article['pre']->art_title}}</a>
        @else
        <span>没有上一篇了</span>
        @endif
      </p>
      <p>下一篇：
        @if($article['next'])
        <a href="{{url('article/'.$article['next']->art_id)}}">{{$article['next']->art_title}}</a>
        @else
        <span>没有下一篇了</span>
        @endif
      </p>
    </div>
    <div class="otherlink">
      <h2>相关文章</h2>
      <ul>
        @foreach($data as $d)
        <li><a href="{{url('article/'.$d->art_id)}}" title="{{$d->art_title}}">{{$d->art_title}}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
  <!-- 左边结束 -->
  <!-- 右边开始 -->
  <aside class="right">
    <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
    <script type="text/javascript" id="bdshell_js"></script> 
    <script type="text/javascript">
      document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
    </script> 
    <!-- Baidu Button END -->
    <div class="blank"></div>

    <div class="news">
      @parent

    <div class="visitors">
      <h3>
        <p>最近访客</p>
      </h3>
      <ul></ul>
    </div>

  </aside>
</article>
@endsection