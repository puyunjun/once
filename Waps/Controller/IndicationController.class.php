<?php
namespace Wap\Controller;
use Think\Controller;
class IndicationController extends BaseController {
    // 构造方法
    public function _auto(){
        $this->assign('Indication','1');
    }
    // 关于迹象 index
    public function index(){
        if( IS_GET === true ){
            // display
            $id=i("id");

            $arrInfo=M("indicationpage")->order("id desc")->find();
            $this->assign("arrInfo",$arrInfo);

            $this->display();
            die;
        }
    }
}