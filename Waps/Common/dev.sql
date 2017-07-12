# 微信用户信息表「主键id，openid，nickname，sex，province，city，country，headimgurl，privilege，unionid」
CREATE TABLE `webchat_userinfo`(
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '微信用户信息表主键id',
  `openid` varchar(255) NOT NULL COMMENT '用户的唯一标识',
  `nickname` varchar(255) NOT NULL COMMENT '用户昵称',
  `sex` tinyint(1) UNSIGNED NOT NULL COMMENT '用户的性别{0>未知，1>男，2>女}',
  `province` varchar(50) NOT NULL COMMENT '用户个人资料填写的省份',
  `city` varchar(50) NOT NULL COMMENT '普通用户个人资料填写的城市',
  `country` varchar(50) NOT NULL COMMENT '国家，如中国为CN',
  `headimgurl` varchar(255) NOT NULL COMMENT '用户头像，最后一个数值代表正方形头像大小（有0、46、64、96、132数值可选，0代表640*640正方形头像），用户没有头像时该项为空。若用户更换头像，原有头像URL将失效。',
  `privilege` varchar(255) NOT NULL COMMENT '用户特权信息，json 数组，如微信沃卡用户为（chinaunicom）',
  `unionid` varchar(255) NOT NULL COMMENT '只有在用户将公众号绑定到微信开放平台帐号后，才会出现该字段。',
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;




