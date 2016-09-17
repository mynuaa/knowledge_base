<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>文章发布</title>
    <link href="/zhifeiji/knowledge_base/Public/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="/zhifeiji/knowledge_base/Public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/zhifeiji/knowledge_base/Public/Font-Awesome-3.2.1/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/zhifeiji/knowledge_base/Public/css/simditor.css" rel="stylesheet" />
    <script src="/zhifeiji/knowledge_base/Public/lib/jquery.min.js"></script>
    <script src="/zhifeiji/knowledge_base/Public/js/module.min.js"></script>
    <script src="/zhifeiji/knowledge_base/Public/js/hotkeys.min.js"></script>
    <script src="/zhifeiji/knowledge_base/Public/js/uploader.min.js"></script>
    <script src="/zhifeiji/knowledge_base/Public/js/simditor.min.js"></script>
    <link href="/zhifeiji/knowledge_base/Public/css/main.css" rel="stylesheet">
    <link href="/zhifeiji/knowledge_base/Public/css/post_article.css" rel="stylesheet">
</head>

<body>
    <div class="navbar navbar-inverse navbar-fixed-top hidden-print navbar-back ">
        <div class="container-fluid">
            <a href="<?php echo U('Home/Index/Index');?>" class="btn btn-default navbar-btn btn-back">返回上一级</a>
        </div>
    </div>
    <header class="site-header jumbotron">
        <div class="container">
            <h1>纸飞机技术知识库</h1>
            <p>攥写文章</p>
        </div>
    </header>
    <div id="tags">
        <ul class="ul_tags">
            <?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="li_tags">
                    <botton class="btn btn-xs btn-success" id="<?php echo ($vo["tags_name"]); ?>"><?php echo ($vo["tags_name"]); ?></botton>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <section class="content-wrap">
        <div id="post_article" class="container">
            <div>
                <input type='text' name='title' id='ar_title' class="a_title" placeholder="标题:如何让自己的电脑更加快速">
            </div>
            <div>
                <input type='text' name='tags' id='ar_tags_id' class="a_tags" placeholder="标签:如php,用英文逗号分割">
            </div>
            <div>
                <textarea id='ar_content' class="a_content"></textarea>
            </div>
            <div>
                <button onclick="post_article()" class="a_submit btn btn-primary">发布文章</button>
            </div>
        </div>
    </section>
    <script src="/zhifeiji/knowledge_base/Public/js/article.js"></script>
</body>

</html>