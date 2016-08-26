function post_article() {
    var content = $('#ar_content').val();
    var title = $('#ar_title').val();
    var type = $('#ar_type').val();
    $.ajax({
        type: "POST",
        url: "http://localhost/dcode/knowledge_base/?m=home&c=article&a=post",
        data: {
            content : content,
            title : title,
            type : type,
        },
        error: function(request) {
            alert("Connection error");
        },
        success: function(data) {
            console.log(data);
        }
    });
}
