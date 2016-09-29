<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>文章发布</title>
    </head>
    <body>
        <link href="/knowledge_base/Public/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    	<link href="/knowledge_base/Public/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="/knowledge_base/Public/Font-Awesome-3.2.1/css/font-awesome.min.css" rel="stylesheet">
    	<link href="/knowledge_base/Public/css/main.css" rel="stylesheet">
        <script src="/knowledge_base/Public/lib/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/knowledge_base/Public/css/simditor.css" rel="stylesheet" />
        <script src="/knowledge_base/Public/lib/jquery.min.js"></script>
        <script src="/knowledge_base/Public/js/module.min.js"></script>
        <script src="/knowledge_base/Public/js/hotkeys.min.js"></script>
        <script src="/knowledge_base/Public/js/uploader.min.js"></script>
        <script src="/knowledge_base/Public/js/simditor.min.js"></script>
        <link href="/knowledge_base/Public/css/main.css" rel="stylesheet">
        <link href="/knowledge_base/Public/css/post_article.css" rel="stylesheet">
        <div class="navbar navbar-inverse navbar-fixed-top hidden-print navbar-back ">
    		<div class="container-fluid">
    			<a href="<?php echo U('Home/Index/Index');?>" class="btn btn-default navbar-btn btn-back">返回上一级</a>
    		</div>
    	</div>
        <header class="site-header jumbotron">
    		<div class="site-nav">
    			<a href="#" onclick= >注册</a>
    			<span>|</span>
    			<a href="#" onclick= >登录</a>
    		</div>
    		<div class="container">
    			<h1>纸飞机技术知识库</h1>
    			<p>The most popular front-end framework for developing responsive.</p>
    			<p class="head-content">I'm myfzzs. I'm a Rookie!</p>
    		</div>
            <p id='text' style="display:none"></p>
    	</header>
        <section class="content-wrap">
    		<div class="container">
                <article class="post">
                    <h1 class="h_center"><?php echo ($info["title"]); ?></h1>
                    <div id='ar_content'>
                        <p id='content'></p>
                    </div>
                </article>
            </div>
        </section>
    </body>
    <script>
        $.ajax({
            type: "POST",
            url: "./get_content",
            data: {
                ar_id : <?php echo ($ar_id); ?>
            },
            error: function(request) {
                alert("Connection error");
            },
            success: function(data) {
                var htmls = $('#text').html(data.content).text();
                $('#content').html(htmls);
            }
        });
    </script>
</html>