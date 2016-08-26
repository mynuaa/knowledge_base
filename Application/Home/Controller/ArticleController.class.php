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
        $this->display();
    }
    public function index() {
        $this->display();
    }
    public function post() {

            $info['uid'] = 1;
            $info['content'] = I('post.content');
            $info['title'] = I('post.title');
            $info['author_name'] = 'wiwry';
            $info['type'] = I('post.type');
            M('article') -> add($info);
    }
}
