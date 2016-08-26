<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>文章发布</title>
    </head>
    <body>
        <script src="/dcode/knowledge_base/Public/lib/jquery.min.js"></script>
        <div id='post_article'>
            <div>文章标题<input type='text' name='title' id='ar_title'></div>
            <div>文章内容<input type='textareat' name='title' id='ar_content'></div>
            <div>文章类型<input type='textarea' name='title' id='ar_type'></div>
            <div><button onclick="post_article()">提交</button></div>
        </div>
        <script src="/dcode/knowledge_base/Public/js/article.js"></script>
    </body>
</html>