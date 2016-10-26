function post_article() {
    var content = editor.sync();
    var title = $('#ar_title').val();
    var tags = $('#ar_tags_id').val();
    $.ajax({
        type: "POST",
        url: "./post",
        data: {
            content : content,
            title : title,
            tags : tags
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(XMLHttpRequest.status);
                        alert(XMLHttpRequest.readyState);
                        alert(textStatus);

                    },
        success: function(data) {
            alert("发布成功!");
            //console.log(data);  服务器返回的数据
            window.location.href='../Index';
        }
    });
}

var editor = new Simditor({
  textarea: $('#ar_content')
  //optional options
});
function show_tags() {
    $('#tags').show();
}

function hide_tags() {
    $('#tags').hide();
}
var tags;
($.ajax({
    type: "POST",
    url: "./get_tags",
    data: {
    },
    error: function(request) {
        alert("Connection error");
    },
    success: function(data) {
        tags = data;
    }
}))

var add = '';

$('body').click(function(e){
    var id = $(e.target).attr('id');
    if (id == 'ar_tags_id') {
        show_tags();
    }
    else if(jQuery.inArray(id,tags) != -1) {
        if(add.indexOf(id) != -1 ) {
            //$(vid).animate({''});
        }
        else {
            var vid = '#' + id;
            var left = $('#tags').position().left + 30;
            left = left + "px";
            add = add + id + ',';
            $('#ar_tags_id').val(add);
            $('#tags').animate({left: left},"normal");
        }
    }
    else {
        hide_tags();
    }
});
