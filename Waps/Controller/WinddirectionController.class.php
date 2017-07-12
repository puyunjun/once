<?php
namespace Wap\Controller;
use Think\Controller;
class WinddirectionController extends BaseController {
    // 构造方法
    public function _auto(){
        $this->assign('Winddirection','1');
    }
    // 风象 index
    public function index(){

        $class=M("article_class")->select();
        foreach($class as $key=>$v){
            $re=explode(",",$v['cname']);
            if(count($re)>1){
                unset($re[0]);
                $class[$key]['cname']=$re[1];
            }else{
                $class[$key]['cname']=$re[0];
            }
        }
        $this->assign("class",$class);
        $info=M("article_indetail")->limit(3)->order("id desc")->select();
        foreach($info as $key=>$v){
            $str=mb_strlen($v['content']);
            if($str>20){
                $info[$key]['content']=mb_substr($v['content'],0,15,'utf-8')."...";
            }
        }

        $this->assign("info",$info);
        //顶部图片
        $topimg=M("winddirectionpage")->order("id desc")->find();
        $this->assign("topimg",$topimg);

      $this->display();
    }
    // 风象详情 index
    public function inDetails(){
      $this->display();
    }


public function classify(){
    //获取文章类Id
    $id=i("id");
    $class=M("article_class")->select();
    $this->assign("class",$class);
    //该类的文章
    $info=M("article_indetail")->where("aid=$id")->select();
    foreach($info as $key=>$v){
        $str=mb_strlen($v['content']);
        if($str>20){
            $info[$key]['content']=mb_substr($v['content'],0,15,'utf-8')."...";
        }
    }
    $this->assign("info",$info);
    $topimg=M("winddirectionpage")->order("id desc")->find();
    $this->assign("topimg",$topimg);
    $this->display();
}

}