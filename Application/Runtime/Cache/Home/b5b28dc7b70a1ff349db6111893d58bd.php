<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>文章发布</title>
    </head>
    <body>
        <script src="/dcode/knowledge_base/Public/lib/jquery.min.js"></script>
        <div>
            <p>文章标题 <?php echo ($info["title"]); ?></P>
            <p>文章内容 <?php echo ($info["content"]); ?></p>
            <p>文章类型 <?php echo ($info["type"]); ?></p>
        </div>
    </body>
</html>