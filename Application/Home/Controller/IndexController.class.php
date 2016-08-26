<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function Index(){
    	load("extend");
     	$article = M("article");
     	$count = $article->count();
     	$page = new\Think\Page($count,4);

     	$page->setConfig('header','条数据');
     	$page->setConfig('prev','上一页');
     	$page->setConfig('next','下一页');
     	$page->setConfig('first','首页');
     	$page->setconfig('last','末页');
     	$show = $page->show();

        $result = $article->field(array('title','author_name','date','thumbsup','content','ar_id'))->order('ar_id','desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list',$result);
        $this->assign('page',$show);
        $this->display();
    }
}
