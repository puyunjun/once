<?php
namespace Wap\Controller;
use Think\Controller;
class LayoutsController extends BaseController {
    // 构造方法
    public function _auto(){
        $this->assign('Layouts','1');
    }
    // 头部
    public function header(){
      // display
      $this->display();
    }
    // 页脚
    public function footer(){
      // display
      $this->display();
    }
}