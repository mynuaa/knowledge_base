function post_feedback() {
    // var content = fb_editor.sync();
    // var title = $('#ar_title').val();
    // var tags = $('#ar_tags_id').val();
    // console.log(content);
    // var content = fb_editor.sync();
    // var title = $('#fb_title').val();
    // var tags = $('#fb_tags_id').val();
    // console.log(tite);
    // console.log(content);
// var editor = new wangEditor('fb_editor-trigger');

  //  var editor = new wangEditor('fb_editor');
       // editor.create();


        // 获取编辑器区域完整html代码
        var html = fb_editor.$txt.html().trim();

        // 获取编辑器纯文本内容
     //   var text = fb_editor.$txt.text();

        // 获取格式化后的纯文本
     //   var formatText = fb_editor.$txt.formatText();

        console.log("pp");
        //console.log(text);
        console.log(html);
        //console.log(formatText);
        var title = $('#fb_title').val().trim();
        var tags = $('#fb_tags_id').val().trim();
        console.log(title);
        console.log(tags);
    $.ajax({
        type: "POST",
        url: "./fb_save",
        data: {
            content : html,
            title : title,
            tags : tags
        },
        error: function(request) {
            alert("Connection error");
        },
        success: function(result) {
            console.log(result);
        }
    });
}