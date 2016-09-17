<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>文章发布</title>
</head>

<body>
    <link href="/zhifeiji/knowledge_base/Public/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="/zhifeiji/knowledge_base/Public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/zhifeiji/knowledge_base/Public/Font-Awesome-3.2.1/css/font-awesome.min.css" rel="stylesheet">
    <script src="/zhifeiji/knowledge_base/Public/lib/jquery.min.js"></script>
    <link href="/zhifeiji/knowledge_base/index.php/Home/Common/css/main.css">
    <link href="/zhifeiji/knowledge_base/index.php/Home/Common/css/post_article.css">
    <div class="navbar navbar-inverse navbar-fixed-top hidden-print navbar-back ">
        <div class="container-fluid">
            <a href="http://my.nuaa.edu.cn" class="btn btn-default navbar-btn btn-back">返回门户</a>
        </div>
    </div>
    <header class="site-header jumbotron">
        <div class="container">
            <h1>纸飞机技术知识库</h1>
            <p>攥写文章</p>
        </div>
    </header>
    <section class="content-wrap">
        <div id="post_article" class="container" >
            <div class="a_title">文章标题
                <input type='text' name='title' id='ar_title'>
            </div>
            <div>文章内容
                <input type='textareat' name='title' id='ar_content'>
            </div>
            <div>文章类型
                <input type='textarea' name='title' id='ar_type'>
            </div>
            <div>
                <button onclick="post_article()">提交</button>
            </div>
        </div>
    </section>
    <script src="/zhifeiji/knowledge_base/Public/js/article.js"></script>
</body>

</html>