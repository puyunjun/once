<?php
namespace Wap\Controller;
use Think\Controller;
class CaseController extends BaseController {
    // 构造方法
    public function _auto(){
        $this->assign('Case','1');
    }
    // 案例 index
    public function index(){

        //案例封面
        $caseCover=M("case_cover")->order("sort asc")->select();//首页案例

        $this->assign('caseCover',$caseCover);

        //顶部图片
        $top=M("casepage")->find();
        $this->assign("top",$top);

        //案例类型
        $caseClass=M("case_class")->where("sort<3")->select();
        $this->assign("caseClass",$caseClass);
      $this->display();
    }
    // 案例详情 index
    public function inDetails(){
        // display
        $id=i("id");  //查找该表封面ccid
        $info=M("case_indetail")->where("ccid=$id")->find();
        $this->assign('info',$info);
        $this->display();
    }


    public function classify(){
        $id=I("id");
        $cid=M("case_indetail")->field("ccid")->where("cid=$id")->select();
        foreach ($cid as $v){
            $needid[]=$v['ccid'];  //属于该类型的封面id
        }
        $idStr=implode(",",$needid);
        if($idStr!=''){
            $classCover=M("case_cover")->where("id in({$idStr})")->select();//相关类的案例封面
        }else{
            $classCover=array();
        }
        $this->ajaxReturn($classCover);
    }
}