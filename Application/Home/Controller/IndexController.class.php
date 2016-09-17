<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

        //首页文章分页
        public function Index(){

            $article = M("article");
         	$count = $article->count();
         	$page = new\Think\Page($count,4);

         	$page->setConfig('header','条数据');
         	$page->setConfig('prev','上一页');
         	$page->setConfig('next','下一页');
         	$page->setConfig('first','首页');
         	$page->setconfig('last','末页');
         	$show = $page->show();

            $result = $article->field(array('title','author_name','date','thumbsup','comments_count','content','ar_id','tags_id'))
                              ->order('ar_id desc')->limit($page->firstRow.','.$page->listRows)->select();
            $tags_result = self::tags($result);
            //dump($tags_result);
            $this->assign('list',$result);
            $this->assign('tags',$tags_result);
            $this->assign('page',$show);
            $this->display();
        }

        //输出文章标签,一对多数据表
        private function tags($result){

            $tags = M("tags");
            for ($i=0; $i<count($result); $i++){
                $tags_string = $result[$i]['tags_id'];
                $tags_array = explode(",",$tags_string);
                $k=0;
                for($j=0; $j<count($tags_array); $j++){
                    $map['tags_id'] = (int)$tags_array[$j];
                    $field_result = $tags->where($map)->find();
                    if($field_result){
                        $tags_result[$i][$k] = $field_result['tags_name'];
                        $k++;
                    }
                }
            }
            return $tags_result;
        }
}
