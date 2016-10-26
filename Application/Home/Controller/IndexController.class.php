<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
        //“最新”文章输出
        public function Index(){
          $article = M("article");
          $count = $article->count();
          
          $tag = I('param.tag')?I('param.tag'):'';

          $page = new\Think\Page($count,4);
          $page->setConfig('header','条数据');         //分页
          $page->setConfig('prev','上一页');
          $page->setConfig('next','下一页');
          $page->setConfig('first','首页');
          $page->setconfig('last','末页');
          $show = $page->show();
          $result = self::ar_link($article,'ar_id',$tag);         //选择文章排序方式
          $result = self::tags($result);
          //dump($tags_result);
          self::style_index();
       
          $this->assign('list',$result);
        //  $this->assign('tags',$tags_result);
          $this->assign('page',$show);

          $this->display();
        }
        //最热文章输出
        public function hottest(){
          $article = M("article");
          $count = $article->count();
            
          $page = new\Think\Page($count,4);
          $page->setConfig('header','条数据');         //分页
          $page->setConfig('prev','上一页');
          $page->setConfig('next','下一页');
          $page->setConfig('first','首页');
          $page->setconfig('last','末页');
          $show = $page->show();
          
          $result = self::ar_link($article,'thumbsup');         //选择文章排序方式
          $tags_result = self::tags($result);
          //dump($tags_result);
          self::style_hottest();      //导航栏跳转后样式
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
                        $result[$i]['tag'][] = $field_result;
                        $k++;
                    }
                }
                $result[$i]['tag_num'] = count($result[$i]['tag']);
            }
            return $result;
        }
        
        //文章排序方式
        private function ar_link($article,$link_basis,$tag){
          if($tag!=''){
            $map['tags_id'] = array('like','%'.$tag.'%');
             $result = $article->where($map)
                      ->field(array('title','author_name','date','thumbsup','comments_count','content','ar_id','tags_id'))
                      ->order("$link_basis desc")->limit($page->firstRow.','.$page->listRows)->select();//双引号中的内容会被解析 
          }
          else{
            $result = $article
                      ->field(array('title','author_name','date','thumbsup','comments_count','content','ar_id','tags_id'))
                      ->order("$link_basis desc")->limit($page->firstRow.','.$page->listRows)->select();//双引号中的内容会被解析 
          }
           
            return $result;
        } 
       private function style_index(){
            $this->assign('index','active');
          
       }
       private function style_hottest(){
            $this->assign('hottest','active');
           
       }
}
    