function post_feedback() {
    // var content = editor.sync();
    // var title = $('#ar_title').val();
    // var tags = $('#ar_tags_id').val();
    // console.log(content);
    // var content = fb_editor.sync();
    // var title = $('#fb_title').val();
    // var tags = $('#fb_tags_id').val();
    // console.log(tite);
    // console.log(content);
 var editor = new wangEditor('fb_editor-trigger');

  //  var editor = new wangEditor('fb_editor');
        editor.create();


        // 获取编辑器区域完整html代码
        var html = editor.$txt.html();

        // 获取编辑器纯文本内容
        var text = editor.$txt.text();

        // 获取格式化后的纯文本
        var formatText = editor.$txt.formatText();

        console.log(html);
        console.log(text);
        console.log(formatText);

    // $.ajax({
    //     type: "POST",
    //     url: "./post",
    //     data: {
    //         content : content,
    //         title : title,
    //         tags : tags
    //     },
    //     error: function(request) {
    //         alert("Connection error");
    //     },
    //     success: function(data) {
    //         console.log(data);
    //     }
    // });
}