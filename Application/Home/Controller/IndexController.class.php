<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

        private $article;
        private $show;
        
        //构造函数给$article,$show赋值
        public function __construct(){
          parent::__construct();    //调用Controller构造函数，重载父类函数，包括assign()
          $this->article = M("article");
          $article = $this->article;
          $count = $article->count();
           
          $page = new\Think\Page($count,4);

          $page->setConfig('header','条数据');         //分页
          $page->setConfig('prev','上一页');
          $page->setConfig('next','下一页');
          $page->setConfig('first','首页');
          $page->setconfig('last','末页');
          $this->show = $page->show();
        }

        //类内公用输出函数
        private function display_content($result,$tags_result){
          $this->assign('list',$result);
          $this->assign('tags',$tags_result);
          $this->assign('page',$this->show);
          $this->display();
        }

        //'最新' 文章输出
        public function Index(){  
          
          $result = $this->ar_link('ar_id');         //选择文章排序方式
          $tags_result = $this->tags($result);
          $this->style_index();
          $this->display_content($result,$tags_result);
        }
       
        //'最热' 文章输出
        public function hottest(){
          
          $result = $this->ar_link('thumbsup');     //选择文章排序方式
          $tags_result = $this->tags($result);
          $this->style_hottest();      //导航栏跳转后样式
          $this->display_content($result,$tags_result); 
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
        
        //判断文章排序方式,并选中所需要的文章
        private function ar_link($link_basis){
            $article = $this->article;
            $result = $article
                      ->field(array('title','author_name','date','thumbsup','comments_count','content','ar_id','tags_id'))
                      ->order("$link_basis desc")->limit($page->firstRow.','.$page->listRows)->select();//双引号中的内容才会被解析 
            return $result;
        } 

        //导航栏样式
        private function style_index(){
            $this->assign('index','active');
          
        }

        private function style_hottest(){
            $this->assign('hottest','active');
        }
 

}
    