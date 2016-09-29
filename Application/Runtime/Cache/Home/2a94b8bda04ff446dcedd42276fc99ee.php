<?php if (!defined('THINK_PATH')) exit();?>	<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0" charset='utf-8' charset='utf-8' >
	<title>知识库</title>

	<link href="/knowledge_base/Public/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<link href="/knowledge_base/Public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/knowledge_base/Public/Font-Awesome-3.2.1/css/font-awesome.min.css" rel="stylesheet">
	<link href="/knowledge_base/Public/css/main.css" rel="stylesheet">
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top hidden-print navbar-back ">
		<div class="container-fluid">
			<a href="http://my.nuaa.edu.cn" class="btn btn-default navbar-btn btn-back">返回门户</a>
		</div>
	</div>
	<header class="site-header jumbotron">
		<div class="container">
			<h1>纸飞机技术知识库</h1>
			<p>The most popular front-end framework for developing responsive.</p>
			<p class="head-content">I'm myfzzs. I'm a Rookie!</p>
		</div>
	</header>		
	<div class="container">
		<div class="row">
			<div class="visible-xs">
				<form  class="choose-content">
					<label>选择版块:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-warning"><input type="radio">电脑维修</label>
						<label class="btn btn-warning"><input type="radio">编程开发</label>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
				<div class="col-md-8 left-style">
					<ul class="nav nav-tabs nav-tabs-zen pull-left">
							<li role="presentatio"  id="ar_id" name="newest" class="<?php echo ($index); ?>"><a href="<?php echo U('Index/');?>">最新的</a></li>
							<li role="presentation" id="thumbsup" name="hottest" class="<?php echo ($hottest); ?>"><a href="<?php echo U('Index/hottest/');?>">热门的</a></li>
					</ul>
				</div>
				<div class="col-md-4 hidden-xs">
					<form  class="pull-right  choose-content">
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-warning"><input type="radio">电脑维修</label>
							<label class="btn btn-warning"><input type="radio">编程开发</label>
						</div>
					</form>
				</div>
		</div>
	</div>

	<section class="content-wrap">
		<div class="container">
			<div class="row">
				<main class="col-md-8 main-content">

				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><article class="post">
						<div class="header">
							<h3 class="post-title"><a href="###"><?php echo ($vo["title"]); ?></a></h3>
						</div>
						<div class="post-meta">
							<span class="date"><i class="icon icon-calendar"></i><?php echo ($vo["date"]); ?></span>
						    <span class="category">
						    	<i class="icon icon-tags"></i>
						    		<?php $j=0; foreach($tags[$i-1] as $value){ echo"<a href=#>";echo($value);echo"</a>"; $j++; if($j< count($tags[$i-1])) echo("&nbsp;&nbsp;&&nbsp;&nbsp;"); } ?>

						    </span>
							<span class="comments"><a href="###"><i class="icon icon-comments"></i><?php echo ($vo["comments_count"]); ?>&nbsp;comments</a></span>
							<span class="like-count"><i class="icon icon-thumbs-up"></i><?php echo ($vo["thumbsup"]); ?></span>
						</div>
							<p><?php echo (msubstr($vo["content"],0,200,'utf-8',true)); ?><a href="<?php echo U('Home/article/read/');?>?ar_id=<?php echo ($vo["ar_id"]); ?>">Read more</a>
							</p>
					</article><?php endforeach; endif; else: echo "" ;endif; ?>

				<div><?php echo ($page); ?></div>
				</main>

				<aside class="col-md-4 sidebar">
					<div class="widget">
						<h4 class="title">和我们一起建设知识库吧！</h4>
						<div class="content">
							<div class="contribute"><span> > </span><a href="<?php echo U('Home/Article/Index');?>">快来投稿哦！</a></div>
							<div class="feedback"><span> > </span><a href="###">反馈建议</a></div>
						</div>
					</div>
					<div class="widget top-5">
						<h4 class="title">排行榜</h4>
						<ol>

						</ol>
					</div>
					<div class="widget">
        				<h4 class="title">标签</h4>
			        	<div class="content category">
			        	    <a href="#">Laravel 5.2</a>
			 				<a href="#">Spark</a>
							<a href="#">镜像 </a>
			        	    <a href="#">新版本发布</a>
			        	    <a href="#">LTS</a>
			                <a href="#">微框架</a>
			                <a href="#">Luman</a>
			                <a href="#">命名空间</a>
			                <a href="#">Laravel4</a>
			                <a href="#">Whoops</a>
			                <a href="#">Event</a>
			                <a href="#">升级</a>
			                <a href="#">Laravle5</a>
			                <a href="#">错误页</a>
			                <a href="#">Laravel 5</a>
			                <a href="#">Artisan</a>
			                <a href="#">Lavavel 5.1</a>
			                <a href="#">Lravel</a>
			                <a href="#">...</a>
			        	</div>
		        	</div>
</aside>
				
			</div>
		</div>
	</section>
	/knowledge_base/index.php/Home/Index

	<script type="text/javascript" src="/knowledge_base/Public/lib/jquery.js"></script>
	<script type="text/javascript" src="/knowledge_base/Public/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="/knowledge_base/Public/js/function.js"></script>
</body>
</html>