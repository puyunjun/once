<?php
namespace Wap\Controller;
use Think\Controller;
class JoinController extends BaseController {
    // 构造方法
    public function _auto(){
        $this->assign('Join','1');
    }
    // 加入 index
    public function index(){
        // display
        $topimg=M("joinpage")->order("id desc")->find();
        $this->assign("topimg",$topimg);

        $arr=M("recruit")->select();
        $this->assign("arr",$arr);
        $this->display();
    }
}