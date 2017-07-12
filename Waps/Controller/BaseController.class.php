<?php
namespace Wap\Controller;
use Think\Controller;
// 接入微信公众平台 TOKEN
define("TOKEN", "hryycl");
class BaseController extends Controller {
    public $AppID;
    public $AppSecret;
    public $aturl;
    public $AccessToken = array();
    public $ipurl;
    public $ipList = array();
    // 构造方法
    public function _initialize(){
      $this->AppID = C('APPID');
      $this->AppSecret = C('APPSECRET');
      $this->Aturl = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$this->AppID.'&secret='.$this->AppSecret;
      // 获取access_token
      $this->AccessToken = json_decode(file_get_contents($this->Aturl),true);
      $this->ipurl = 'https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token='.$this->AccessToken['access_token'];
      // 获取微信服务器ip地址
      $this->ipList = json_decode(file_get_contents($this->ipurl),true);
      //控制器初始化



        $case=M("case_class")->select();

        $this->assign("case",$case);
        $widd=M("article_class")->select();
        //处理掉英文部分
        foreach($widd as $key=>$v){
            $re=explode(",",$v['cname']);
            if(count($re)>1){
                unset($re[0]);
                $widd[$key]['cname']=$re[1];
            }else{
                $widd[$key]['cname']=$re[0];
            }
        }

        $this->assign("widd",$widd);
        $foot=M("siteconfig")->order("id desc")->find();
        $this->assign("foot",$foot);
        if(method_exists($this,'_auto'))
            $this->_auto();
    }
    // 微信中控
    public function cControl(){
      // 接入微信公众平台
      Vendor('WechatCallbackApi.WechatCallbackApi');
      $WechatObj = new \WechatCallbackApi();
      if (!isset($_GET['echostr'])) {
        $WechatObj->responseMsg();
      }else{
        $WechatObj->valid();
      }
    }

}