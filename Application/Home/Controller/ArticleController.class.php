<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
    public function read() {
        $map['ar_id'] = I('get.ar_id');
        $info = M('article') -> where($map) -> find();
        $moremap['type'] = $info['type'];
        $more = M('article') -> where($moremap) -> select();
        $this->assign('info',$info);
        $this->assign('more',$more);
        $this->assign('ar_id',$map['ar_id']);
        $this->display();
    }
    public function index() {
        $info = M('tags') -> select();
        $this -> assign('tags',$info);
        $this -> display();
    }
    public function post() {
        $info['cate_id'] = 1;
        $info['content'] = I('post.content');
        $info['title'] = I('post.title');
        $tags_value = I('post.tags');
        $tags_value = explode(',',$tags_value);
        $tags = M('tags') -> select();
        $tags_info = array();
        //$i = 0;
        $tags_id = '';
        foreach ($tags as $value) {
            $tags_info[$value['tags_name']] = $value['tags_id'];
        }
        foreach ($tags_value as $value) {
            if($value != '') {
                $tags_id = $tags_id . (string)$tags_info[$value] . ',';
            }
        }
        $info['tags_id'] = $tags_id;
        $info['author_name'] = 'wiwry';     //测试数据
        $info['date'] = date ("y-m-d",time());
        M('article') -> add($info);
        //$this->ajaxReturn($tags_id);
    }

    public function get_tags() {
        $info = M('tags') -> select();
        $this -> ajaxReturn(array_column($info, 'tags_name'));
    }
    public function get_content() {
        $map['ar_id'] = I('post.ar_id');
        $info = M('article') -> where($map) -> find();
        $this->ajaxReturn($info);
    }
}
