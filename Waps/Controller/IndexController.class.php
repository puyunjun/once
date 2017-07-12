<?php
namespace Wap\Controller;
use Think\Controller;
class IndexController extends BaseController {
    // 构造方法
    public function _auto(){

        $this->assign('Index','1');
    }
    // 首页
    public function index(){
        // Get
        if( IS_GET === true ){
            // display
            //首页图片
            $first=$banner=M("banner")->order("id asc")->find();//显示第一张图片
            $this->assign('first',$first);
            $banner=M("banner")->where("sort<5")->select();//显示
            unset($banner[0]);
            foreach ($banner as $key=>$val){
                $sort=$banner[$key]['sort'];
                $arr=M("case_cover")->where("sort=$sort")->find();
                $needId=$arr['id']; //封面id
                $banner[$key]['id']=$needId;  //传id值获取内容即可
            }
            $this->assign('banner',$banner);
            //首页关于迹象描述
            $about=M("homepage")->select();
            $this->assign('about',$about);
            //最新案例,最新9张
            $caseCover=M("case_cover")->order("sort asc")->limit("9")->select();//首页案例
            foreach($caseCover as $key=>$v) {
                $info=explode(",",$v['character']);
                $count=count($info);
                $temp=$info[$count-1];
                $info[$count]=$temp;
                $info[$count-1]="-";   //加入-
                $caseCover[$key]['character']=$info; //案例文字数组
            }
            $this->assign('caseCover',$caseCover);
            //首页文章类型
            $article=M("article_class")->select();

            foreach($article as $key=>$v) {
                $re=explode(",",$v['cname']);
                if(is_array($re)){
                    $article[$key]['firstcname']=$re[0];
                    unset($re[0]);
                }
                $article[$key]['cname']=$re;
                $detail=M("article_indetail")->field("id,title")->where("aid={$v['id']}")->select();
                $article[$key]['articleInfo']=$detail;//文章类别和详细信息总数组
            }
            /*var_dump($article);
            exit;*/
            $this->assign("article",$article);

            //文章标题
            $titleInfo=M("article_indetail")->field("id,title")->select();
            $this->assign("titleInfo",$titleInfo);


            $this->display();
            die;
        }

    }
}