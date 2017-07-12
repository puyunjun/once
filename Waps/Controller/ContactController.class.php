<?php
namespace Wap\Controller;
use Think\Controller;
class ContactController extends BaseController {
    // 构造方法
    public function _auto(){
        $this->assign('Contact','1');
    }
    // 联系 index
    public function index(){
        $contact=M("contactpage")->order("id desc")->find();
        $this->assign("contact",$contact);
        $this->display();
    }
}