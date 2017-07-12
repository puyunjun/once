<?php
return array(
  // 数据库配置
  'DB_TYPE'               =>  'mysql',     // 数据库类型
  'DB_HOST'               =>  'dev.jx.local', // 服务器地址
  'DB_NAME'               =>  'jixiang',          // 数据库名
  'DB_USER'               =>  'root',      // 用户名
  'DB_PWD'                =>  'root',          // 密码
  
   // 开启路由
  'URL_ROUTER_ON'   => true,
  'URL_ROUTE_RULES'=>array(
    'base'  =>  'Base/cControl',
    'menucustom'  =>  'Menu/custom',
  ),



);