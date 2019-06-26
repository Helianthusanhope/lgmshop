/*
Navicat MySQL Data Transfer

Source Server         : 本地数据库服务器
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : lgmshop

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-06-26 12:30:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for actives
-- ----------------------------
DROP TABLE IF EXISTS `actives`;
CREATE TABLE `actives` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active_name` varchar(128) NOT NULL COMMENT '活动名称',
  `active_desc` varchar(128) NOT NULL COMMENT '活动描述',
  `discount` float(5,0) NOT NULL COMMENT '折扣',
  `active_thumb` varchar(60) NOT NULL COMMENT '缩略图',
  `background` varchar(60) NOT NULL COMMENT '活动图片',
  `status` int(3) NOT NULL DEFAULT '0' COMMENT '0不推荐,1推荐',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of actives
-- ----------------------------
INSERT INTO `actives` VALUES ('21', '秒杀', '以肉换肉,节后甩肉', '4', '20190620/v3FYbDZ0OZSmxOLXDf5NCGeLdWQltSbwn8m7L8go.jpeg', '20190620/VYqExkhhTAi74OIvrqHu0HWSRrlNtHCwp7BsuFAU.jpeg', '0', '2019-06-20 10:18:35', '2019-06-24 13:44:16');
INSERT INTO `actives` VALUES ('22', '特惠', '鲜货直达,满199减15', '9', '20190622/MZ7LUhwEHY0xK291QueCDVlbziu2jcQZEEWiYQtE.jpeg', '20190622/7NwW3Bj6Gc7ig8D1p0ELDJlfaqvbSbPaiPMR4sMW.jpeg', '0', '2019-06-22 15:52:47', '2019-06-24 13:44:14');
INSERT INTO `actives` VALUES ('23', '团购', '吃货联盟3.8折起', '4', '20190622/HfPQ4xuUXkAZpqEE6lsBVUg5CHcb4bxwIrT2307J.jpeg', '20190622/nkDRh5GrPBdQa6ZWL41EciRmddHD3VaJTYyT7NeH.jpeg', '0', '2019-06-22 15:53:55', '2019-06-24 13:44:12');
INSERT INTO `actives` VALUES ('24', '超值', '由内而发,爱自己', '3', '20190622/PaYPJr9smypAAjelW21QpXY6mGTfFpG9wRJsLI2l.jpeg', '20190622/4JshNGD2HPhbNa4BYrjprKwpklZLnmBXFXAvk6Ak.jpeg', '0', '2019-06-22 15:54:44', '2019-06-24 13:44:10');
INSERT INTO `actives` VALUES ('25', '真的有鱼', '开年福利篇', '3', '20190624/St0HqrhdJvh8KyCy0LTWdJ5nUGdrUFIisV37XX4x.png', '20190624/PZql76ILWjTIsTkQEKQhB1sLQsZqOX87riEeARD8.png', '1', '2019-06-24 09:01:59', '2019-06-24 13:44:18');
INSERT INTO `actives` VALUES ('26', '围货过冬', '让爱早回家', '3', '20190624/iQWFrPxh25oVR8drvIT3fL949DGxAzAQrKyeqMGt.png', '20190624/LUjnL5XDKkmelRdSW1LBvQbFD558Tma8y6zf92if.png', '1', '2019-06-24 09:03:28', '2019-06-24 13:44:28');
INSERT INTO `actives` VALUES ('27', '浪漫情人节', '甜甜蜜蜜', '3', '20190624/6TrPmz01D4nrGJ4hhttNZtfi7ZJtWSD4hKhmb6hr.png', '20190624/sxNqqdgUDUR2IrqSEkrbX1o98OsyOc940hUOdUk3.png', '1', '2019-06-24 09:04:36', '2019-06-24 13:44:23');

-- ----------------------------
-- Table structure for adminusers
-- ----------------------------
DROP TABLE IF EXISTS `adminusers`;
CREATE TABLE `adminusers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(32) DEFAULT NULL COMMENT '后台管理员名字',
  `upass` char(60) DEFAULT NULL COMMENT '后台管理员登录密码',
  `profile` varchar(128) DEFAULT NULL COMMENT '后台管理员头像',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of adminusers
-- ----------------------------
INSERT INTO `adminusers` VALUES ('1', 'guanchao123', '$2y$10$CAQm82mrajmULPFUTaItMuseU/ZY/4lBdIKxSe08q6GPR/cgpfCU.', '20190618/IXdawwBvryjVFwAVrp6zXKj6aQzybBbWuAAL1yAb.jpeg');
INSERT INTO `adminusers` VALUES ('2', 'lvbo123', '$2y$10$jbXmX3HTRNJ6KozW62vdHeh61V9.5PcgmXdBJYbMnnWl7ETjBy.7q', '20190618/Ljd6W9CpmPLKixBN9RW98jDoXMpaiVmmQIi4IOAM.png');
INSERT INTO `adminusers` VALUES ('3', 'manyvqi123', '$2y$10$xDd66RZP/WMTzgfC5PNqA.2sl9P0AAYjNOv/Z9YhsK/xaAKEeHfBG', '20190618/uZ1wKohSq8RXZazEA09qyxjf23VOZrNoEQEe4kgD.jpeg');

-- ----------------------------
-- Table structure for adminusers_roles
-- ----------------------------
DROP TABLE IF EXISTS `adminusers_roles`;
CREATE TABLE `adminusers_roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '管理员id',
  `rid` int(11) NOT NULL COMMENT '角色id',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of adminusers_roles
-- ----------------------------
INSERT INTO `adminusers_roles` VALUES ('1', '1', '3', null, '2019-06-19 15:38:54');
INSERT INTO `adminusers_roles` VALUES ('2', '2', '4', null, null);
INSERT INTO `adminusers_roles` VALUES ('3', '3', '4', null, null);

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL COMMENT '标题',
  `desc` varchar(128) NOT NULL COMMENT '简介',
  `url` varchar(60) NOT NULL COMMENT '图',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0未激活1已激活',
  `active_id` int(10) NOT NULL COMMENT '活动id',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES ('19', 'nova5i', 'nova5i新品上市', '20190623/Uzo8C7JgKl5yxeNFdysquqyxyScKDMlD1gi1u0Mp.webp', '1', '24', '2019-06-23 21:53:53', '2019-06-23 21:53:53');
INSERT INTO `banners` VALUES ('20', '校园嘉年华', '时尚潮流必备', '20190623/ZeK7xCHMBP0ZU7h5wtgAinL6uWWKoGFCfOyI2Mir.jpeg', '1', '23', '2019-06-23 21:55:06', '2019-06-23 21:55:06');
INSERT INTO `banners` VALUES ('21', '姨妈期神仙cp', '满199减100盘他', '20190623/cTynq9Dk4nwF72OtFBBsDjqpPwWTEEhbWNTVLDLv.webp', '1', '22', '2019-06-23 21:56:40', '2019-06-23 21:56:40');
INSERT INTO `banners` VALUES ('22', 'OMS欧诗雅', '嗨购继续满199减100', '20190623/xxGHh7r1ndn6R0995WE71K6XqFKfr6j9SJoqyEKj.webp', '1', '22', '2019-06-23 21:58:33', '2019-06-23 21:58:33');

-- ----------------------------
-- Table structure for buycars
-- ----------------------------
DROP TABLE IF EXISTS `buycars`;
CREATE TABLE `buycars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `stid` varchar(60) NOT NULL COMMENT '库存号',
  `bnumber` varchar(20) NOT NULL COMMENT '商品数量',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of buycars
-- ----------------------------

-- ----------------------------
-- Table structure for cates
-- ----------------------------
DROP TABLE IF EXISTS `cates`;
CREATE TABLE `cates` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(32) NOT NULL COMMENT '分类名称',
  `desc` varchar(128) DEFAULT NULL COMMENT '首级分类描述',
  `thumb` varchar(128) DEFAULT NULL COMMENT '首级分类缩略图',
  `pid` int(32) NOT NULL DEFAULT '0' COMMENT '上级分类id',
  `path` varchar(32) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cates
-- ----------------------------
INSERT INTO `cates` VALUES ('1', '家用电器', '爱你身边的人', '20190626/3G96i9Z4dJxZF2hvgpxfCrkOC0fNID9sRpSHKqoY.png', '0', '0', '2019-06-17 16:18:49', '2019-06-26 09:36:00');
INSERT INTO `cates` VALUES ('3', '电视', '智能改变生活', '20190626/7jRGs3R9gSBhvmroF1x6DCF1iT06gietjRBBKOvj.jpeg', '1', '0,1', '2019-06-17 16:25:34', '2019-06-26 09:28:14');
INSERT INTO `cates` VALUES ('4', '4k超清电视', null, null, '3', '0,1,3', '2019-06-17 16:26:16', '2019-06-17 16:26:16');
INSERT INTO `cates` VALUES ('5', '手机/数码', '心与心的沟通', '20190626/qGLJc5InEpD7MFWrWWaHdPUV80h8s9qpPEun35dC.webp', '0', '0', '2019-06-17 16:35:35', '2019-06-26 09:42:34');
INSERT INTO `cates` VALUES ('6', '手机通信', null, null, '5', '0,5', '2019-06-17 16:37:55', '2019-06-17 16:37:55');
INSERT INTO `cates` VALUES ('8', '小米手机', null, '20190626/SQNbmJHgGxuUtxZY1ZGW1EaslCg1fz67fzRgcdru.jpeg', '6', '0,5,6', '2019-06-24 15:49:45', '2019-06-26 09:25:08');
INSERT INTO `cates` VALUES ('9', '空调', null, null, '1', '0,1', '2019-06-25 13:00:09', '2019-06-25 13:00:09');
INSERT INTO `cates` VALUES ('10', '海尔空调', null, null, '9', '0,1,9', '2019-06-25 13:06:52', '2019-06-25 13:06:52');
INSERT INTO `cates` VALUES ('12', '柯达相机', null, null, '5', '0,5', '2019-06-25 13:24:05', '2019-06-25 13:24:05');
INSERT INTO `cates` VALUES ('13', '华为手机', '前置3200万人像超级夜景 你比夜色更美官网', '20190626/kk22LDhPWSZTd2RZEvS3levPUNi7nqOLPpabztaR.png', '6', '0,5,6', '2019-06-25 16:46:00', '2019-06-26 09:03:46');

-- ----------------------------
-- Table structure for friends
-- ----------------------------
DROP TABLE IF EXISTS `friends`;
CREATE TABLE `friends` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `friend_name` varchar(128) NOT NULL COMMENT '链接名',
  `url` varchar(128) NOT NULL COMMENT '地址',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0未激活，1已激活',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of friends
-- ----------------------------
INSERT INTO `friends` VALUES ('1', '百度', 'http://www.baidu.com', '1', '2019-06-20 16:12:15', '2019-06-23 21:37:38');
INSERT INTO `friends` VALUES ('2', '京东', 'http://www.jd.com', '1', '2019-06-20 16:24:24', '2019-06-23 21:37:29');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gname` varchar(128) NOT NULL COMMENT '商品名称',
  `price` decimal(10,2) NOT NULL COMMENT '价格',
  `desc` varchar(255) NOT NULL,
  `good_status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0未上架 1上架',
  `cid` int(10) NOT NULL COMMENT '分类',
  `active_id` int(10) NOT NULL DEFAULT '0' COMMENT '活动id',
  `thumb` varchar(60) NOT NULL COMMENT '缩略图',
  `num` int(10) NOT NULL DEFAULT '0' COMMENT '评价量',
  `collect` int(10) NOT NULL DEFAULT '0' COMMENT '收藏量',
  `detail` text NOT NULL COMMENT '商品详情',
  `sale` int(10) NOT NULL DEFAULT '0' COMMENT '销量',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL COMMENT 'moo',
  `moonsale` int(10) NOT NULL DEFAULT '0' COMMENT '月销量',
  PRIMARY KEY (`gid`),
  UNIQUE KEY `gid` (`gid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('19', '蔬菜3290', '782.51', '3532964因此,用户可能一不小心就关错了标签页,或者直接点击浏览器右上角的关闭按钮一...这当然不是我们所希望看到的,我们希望的可能是,在提交该页面上表单的...', '1', '4', '27', '20190619/5cPtFeYlac51WMGead4XspzQKUXJE3bvpA6tkBTR.jpeg', '0', '0', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3398366是直接都按js走了。不回等你按确定还是取消按钮呢。。 js方法是 function ...点击确定按钮时,弹出确定和取消,点击取消也提交表单了\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '0', '2019-06-18 15:14:49', '2019-06-25 12:46:50', '0');
INSERT INTO `goods` VALUES ('26', '蔬菜1627', '680.12', '1792354因此,用户可能一不小心就关错了标签页,或者直接点击浏览器右上角的关闭按钮一...这当然不是我们所希望看到的,我们希望的可能是,在提交该页面上表单的...', '1', '4', '24', '20190619/g0pTANMAiZqmdmb3d9Na5RfmLsnXjBfqMGkMhWna.jpeg', '0', '0', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2136948是直接都按js走了。不回等你按确定还是取消按钮呢。。 js方法是 function ...点击确定按钮时,弹出确定和取消,点击取消也提交表单了\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p>}\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '0', '2019-06-18 15:14:49', '2019-06-25 16:47:18', '0');
INSERT INTO `goods` VALUES ('27', '蔬菜2536', '870.29', '546025因此,用户可能一不小心就关错了标签页,或者直接点击浏览器右上角的关闭按钮一...这当然不是我们所希望看到的,我们希望的可能是,在提交该页面上表单的...', '1', '4', '24', '20190619/EnO2aJFgOo91fymkbrq9fLa22NXmxLB8xNAOxIXZ.jpeg', '0', '0', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;1901135是直接都按js走了。不回等你按确定还是取消按钮呢。。 js方法是 function ...点击确定按钮时,弹出确定和取消,点击取消也提交表单了\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p>}\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '0', '2019-06-18 15:14:49', '2019-06-25 16:47:25', '0');
INSERT INTO `goods` VALUES ('32', '蔬菜3348', '33.96', '1214540因此,用户可能一不小心就关错了标签页,或者直接点击浏览器右上角的关闭按钮一...这当然不是我们所希望看到的,我们希望的可能是,在提交该页面上表单的...', '1', '4', '24', '20190621/6bMsyc0nR1y1drycoASQcXnwMkNa4oSdr2n162GB.jpeg', '0', '0', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2260279是直接都按js走了。不回等你按确定还是取消按钮呢。。 js方法是 function ...点击确定按钮时,弹出确定和取消,点击取消也提交表单了}\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p>}\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '0', '2019-06-18 15:14:50', '2019-06-25 16:47:40', '0');
INSERT INTO `goods` VALUES ('33', '蔬菜2852', '499.20', '2732222因此,用户可能一不小心就关错了标签页,或者直接点击浏览器右上角的关闭按钮一...这当然不是我们所希望看到的,我们希望的可能是,在提交该页面上表单的...', '1', '4', '24', '20190624/gC8LoGiQehXf6xxwjQeBWqo1hJue3Q3zsCQWuhd6.jpeg', '0', '0', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2034186是直接都按js走了。不回等你按确定还是取消按钮呢。。 js方法是 function ...点击确定按钮时,弹出确定和取消,点击取消也提交表单了}\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '0', '2019-06-18 15:14:50', '2019-06-25 12:46:21', '0');
INSERT INTO `goods` VALUES ('34', '蔬菜3452', '516.81', '239684因此,用户可能一不小心就关错了标签页,或者直接点击浏览器右上角的关闭按钮一...这当然不是我们所希望看到的,我们希望的可能是,在提交该页面上表单的...', '1', '4', '25', '20190624/RyOCCQFSJCAS6tuL9xki8Q2SxKlkiQk3jRygbivR.jpeg', '0', '0', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2404061是直接都按js走了。不回等你按确定还是取消按钮呢。。 js方法是 function ...点击确定按钮时,弹出确定和取消,点击取消也提交表单了}\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '0', '2019-06-18 15:14:50', '2019-06-25 12:47:59', '0');
INSERT INTO `goods` VALUES ('35', '蔬菜3874', '214.81', '254207因此,用户可能一不小心就关错了标签页,或者直接点击浏览器右上角的关闭按钮一...这当然不是我们所希望看到的,我们希望的可能是,在提交该页面上表单的...', '1', '4', '0', '20190624/dzrErTqDIR71kniaVf4rH5oN2RlnmSx3fk1pBwUu.jpeg', '0', '0', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;985306是直接都按js走了。不回等你按确定还是取消按钮呢。。 js方法是 function ...点击确定按钮时,弹出确定和取消,点击取消也提交表单了}\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '0', '2019-06-18 15:14:50', '2019-06-24 13:00:42', '0');
INSERT INTO `goods` VALUES ('36', '蔬菜3358', '982.10', '2531055因此,用户可能一不小心就关错了标签页,或者直接点击浏览器右上角的关闭按钮一...这当然不是我们所希望看到的,我们希望的可能是,在提交该页面上表单的...', '1', '4', '21', '20190624/NCsk0ro9kjbPTy96StSVMpG0VDhLVikVsCliCgEh.png', '0', '0', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2690669是直接都按js走了。不回等你按确定还是取消按钮呢。。 js方法是 function ...点击确定按钮时,弹出确定和取消,点击取消也提交表单了}\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p>}\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '0', '2019-06-18 15:14:50', '2019-06-25 16:47:55', '0');
INSERT INTO `goods` VALUES ('37', '蔬菜21279a', '327.12', '却说高顺引张辽击关公寨，吕布自击张飞寨，关、张各出迎战，玄德引兵两路接应。吕 布分军从背后杀来，关、张两军皆溃，玄德引数十骑奔回沛城。', '1', '4', '0', '20190619/tjCpqfhLJrbJv6z701dyaoswXOmhD9z2wlBVcZb5.jpeg', '0', '0', '<p><img src=\"/ueditor/php/upload/image/20190619/1560924104.jpg\" title=\"1560924104.jpg\" alt=\"t01.jpg\"/>却说高顺引张辽击关公寨，吕布自击张飞寨，关、张各出迎战，玄德引兵两路接应。吕 布分军从背后杀来，关、张两军皆溃，玄德引数十骑奔回沛城。却说高顺引张辽击关公寨，吕布自击张飞寨，关、张各出迎战，玄德引兵两路接应。吕 布分军从背后杀来，关、张两军皆溃，玄德引数十骑奔回沛城。却说高顺引张辽击关公寨，吕布自击张飞寨，关、张各出迎战，玄德引兵两路接应。吕 布分军从背后杀来，关、张两军皆溃，玄德引数十骑奔回沛城。却说高顺引张辽击关公寨，吕布自击张飞寨，关、张各出迎战，玄德引兵两路接应。吕 布分军从背后杀来，关、张两军皆溃，玄德引数十骑奔回沛城。却说高顺引张辽击关公寨，吕布自击张飞寨，关、张各出迎战，玄德引兵两路接应。吕 布分军从背后杀来，关、张两军皆溃，玄德引数十骑奔回沛城。</p><p>}\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '0', '2019-06-19 14:02:09', '2019-06-24 13:00:12', '0');
INSERT INTO `goods` VALUES ('38', '长虹', '9999.99', '小米（MI）小米电视4X 55英寸 L55M5-AD 2GB+8GB HDR 4K超高清 蓝牙语音遥控 人工智能语音网络液晶平板电视', '1', '4', '23', '20190619/vz0eSOTSMaPkoCjlHpt5ZdhZksdJ0FYQ17Fg4Unk.jpeg', '0', '0', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p><a target=\"_blank\" title=\"\" href=\"http://ccc-x.jd.com/dsp/cpd?ext=aHR0cHM6Ly9wcm8uamQuY29tL21hbGwvYWN0aXZlLzNGdjV2Y01vR242MVJpUzN5cm9ObnZLMXVnZ0ovaW5kZXguaHRtbA&log=JF5rMUAKXlLMuE_-1qw2RKwu9W82n03RnztIpYfC-NUJnP7A5v6VUsfpDag9vEA6tTbXdj23TYw0iaF4IxXHsXEkZH8GkoiBKsaKQNAU4oiwS6tPcXBPFgVr4ZZ2__nmMqCc0IjxRFVaifclfU2MfZmbNETbLp8H-8nEYf3Dm-GP4L0b3Ku116FtB1GTZq1ukG3qFA8WuY21m3zBzHHxShc25tlF-JzKQjiVROcuDWwBhiXpPi4R5Gc05Xu7IpMAvYJzSfYC1ZGbK2OVFGATwdX6i-YMhZu7-PoryyRi7nrDjxob9aQ1dCa-6G-533vIUIwjp9Q2iyNGqtLxl8hpxzLdelz5QpCAl3wDFrSYzWBD-Jno3-c9P5ikisXmq8R9CIOWDvWgdpMvgccmPUYsosSelYjNELGCHT0AA3rhDQzS3KnX3LU1Cm0nJPm8FnsK7Bns_Yc7Tc6ct3isqwIlLBqZ_yDbdF0FFDoqCqO46pCdWTPgt1tqIBqp4nDrzwc6IuQp_P8hHndOOlyAgP26DctuF4-kzTuMUjL98_naZ1M-HjRJzmG_kxEfhojqlxE0hJpJc45i1dDfsK_DwkvPQ0PVJONu3Phk_980Muzl2v5HeQ9L8h_IqQsOIqA2oMhZg2iTrPF-bj0sCQNTTJ0yGSewWYXZwGJt5un9Y9BxsXTo1VHE68zpz6e9BcRhbYdi10QALSLAGDU2rqIj2eemgjE7ifzEKVPv5WrFyXm-KxQ\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><img width=\"990\" alt=\"\" src=\"/ueditor/php/upload/image/20190619/1560929301.jpg\"/></a></p><p><a href=\"https://pro.jd.com/mall/active/46xH2FEswob1Eibj3tJMTTfpJvA/index.html\" target=\"_blank\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><img alt=\"\" class=\"\" src=\"/ueditor/php/upload/image/20190619/1560929303.jpg\"/></a></p><p><br/></p><p><br/><br/></p><p><img alt=\"\" class=\"\" src=\"/ueditor/php/upload/image/20190619/1560929305.jpg\"/><br/></p><h3 style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: normal; font-family: \">售后保障</h3><ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p><span class=\"goods\" style=\"margin: 0px; padding: 0px 10px 0px 0px; display: inline-block; width: 32px; height: 32px; line-height: 32px; vertical-align: bottom; background: url(\"></span>&nbsp;<strong style=\"margin: 0px; padding: 8px 0px 3px; display: inline-block;\">厂家服务</strong></p></li><li><p>本产品全国联保，享受三包服务，质保期为：一年质保<br/>本产品提供上门安装调试、提供上门检测和维修等售后服务，自收到商品之日起，如您所购买家电商品出现质量问题，请先联系厂家进行检测，凭厂商提供的故障检测证明，在“我的京东-客户服务-返修退换货”页面提交退换申请，将有专业售后人员提供服务。京东承诺您：30天内产品出现质量问题可退货，180天内产品出现质量问题可换货，超过180天按国家三包规定享受服务。<br/>您可以查询本品牌在各地售后服务中心的联系方式，<a target=\"_blank\" href=\"https://list.mi.com/accessories/tag?id=tv_service\" style=\"margin: 0px; padding: 0px; color: rgb(0, 90, 160); text-decoration-line: none;\">请点击这儿查询......</a><br/><br/>品牌官方网站：<a target=\"_blank\" href=\"https://list.mi.com/accessories/tag?id=tv_service\" style=\"margin: 0px; padding: 0px; color: rgb(0, 90, 160); text-decoration-line: none;\">https://list.mi.com/accessories/tag?id=tv_service</a><br/>售后服务电话：400-100-5678</p></li><li><p><span class=\"goods\" style=\"margin: 0px; padding: 0px 10px 0px 0px; display: inline-block; width: 32px; height: 32px; line-height: 32px; vertical-align: bottom; background: url(\"></span>&nbsp;<strong style=\"margin: 0px; padding: 8px 0px 3px; display: inline-block;\">京东承诺</strong></p></li><li><p>京东平台卖家销售并发货的商品，由平台卖家提供发票和相应的售后服务。请您放心购买！<br/>注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！</p></li><li><p><span class=\"goods\" style=\"margin: 0px; padding: 0px 10px 0px 0px; display: inline-block; width: 32px; height: 32px; line-height: 32px; vertical-align: bottom; background: url(\"></span><strong style=\"margin: 0px; padding: 8px 0px 3px; display: inline-block;\">正品行货</strong></p></li><li><p>京东商城向您保证所售商品均为正品行货，京东自营商品开具机打发票或电子发票。</p></li><li><p><span class=\"unprofor\" style=\"margin: 0px; padding: 0px 10px 0px 0px; display: inline-block; width: 32px; height: 32px; line-height: 32px; vertical-align: bottom; background: url(\"></span><strong style=\"margin: 0px; padding: 8px 0px 3px; display: inline-block;\">全国联保</strong></p></li><li><p>凭质保证书及京东商城发票，可享受全国联保服务（奢侈品、钟表除外；奢侈品、钟表由京东联系保修，享受法定三包售后服务），与您亲临商场选购的商品享受相同的质量保证。京东商城还为您提供具有竞争力的商品价格和<a href=\"https://help.jd.com/help/question-892.html\" target=\"_blank\" style=\"margin: 0px; padding: 0px; color: rgb(0, 90, 160); text-decoration-line: none;\">运费政策</a>，请您放心购买！&nbsp;<br/><br/>注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！</p></li><li><p><span class=\"no-worries\" style=\"margin: 0px; padding: 0px 10px 0px 0px; display: inline-block; width: 32px; height: 32px; line-height: 32px; vertical-align: bottom; background: url(\"></span><strong style=\"margin: 0px; padding: 8px 0px 3px; display: inline-block;\">无忧退货</strong></p></li><li><p>客户购买京东自营商品7日内（含7日，自客户收到商品之日起计算），在保证商品完好的前提下，可无理由退货。（部分商品除外，详情请见各商品细则）</p></li></ul><p><strong style=\"margin: 0px; padding: 8px 0px 3px; display: inline-block; color: rgb(228, 57, 60);\">权利声明：</strong><br/>京东上的所有商品信息、客户评价、商品咨询、网友讨论等内容，是京东重要的经营资源，未经许可，禁止非法转载使用。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\">注：</strong>本站商品信息均来自于合作方，其真实性、准确性和合法性由信息拥有者（合作方）负责。本站不提供任何保证，并不承担任何法律责任。</p><p><br/><strong style=\"margin: 0px; padding: 8px 0px 3px; display: inline-block; color: rgb(228, 57, 60);\">价格说明：</strong><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\">京东价：</strong>京东价为商品的销售价，是您最终决定是否购买商品的依据。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\">划线价：</strong>商品展示的划横线价格为参考价，并非原价，该价格可能是品牌专柜标价、商品吊牌价或由品牌供应商提供的正品零售价（如厂商指导价、建议零售价等）或该商品在京东平台上曾经展示过的销售价；由于地区、时间的差异性和市场行情波动，品牌专柜标价、商品吊牌价等可能会与您购物时展示的不一致，该价格仅供您参考。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\">折扣：</strong>如无特殊说明，折扣指销售商在原价、或划线价（如品牌专柜标价、商品吊牌价、厂商指导价、厂商建议零售价）等某一价格基础上计算出的优惠比例或优惠金额；如有疑问，您可在购买前联系销售商进行咨询。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\">异常问题：</strong>商品促销信息以商品详情页“促销”栏中的信息为准；商品的具体售价以订单结算页价格为准；如您发现活动商品售价或促销信息有异常，建议购买前先联系销售商咨询。</p><p><br/><strong style=\"margin: 0px; padding: 8px 0px 3px; display: inline-block; color: rgb(228, 57, 60);\">能效标识说明：</strong><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">根据国家相关能效标识法规和标准的要求，京东自营在售商品的能效标识图样，将会逐步替换为新版能源效率标识贴；受能效标识标准变化影响，部分产品的新版和旧版能效标识，在能效等级、测试值等方面会有差异，但产品实际性能完全一样，并不影响购买和使用，加贴新版或旧版能效标识的商品会随机发放，请您放心购买；如有疑问，请在购买前通过咚咚或来电咨询。</p><p><br/></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p>}\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '0', '2019-06-19 15:30:30', '2019-06-21 12:00:41', '0');
INSERT INTO `goods` VALUES ('39', '华为（HUAWEI） 荣耀10青春版 手机（20天价保） 渐变蓝 全网通(6G+128G)', '1549.00', '上万评价！质量保证！全新原封！现货速发！ 128G下单送荣耀原装115耳机+手机钢化膜+手机简易支架+全国流量卡等！', '1', '13', '22', '20190624/TQi4vgoz776jthTKvonUKo3H5rQ6rKT0oxOYqzcq.jpeg', '0', '0', '<p class=\"more-par\"><a href=\"https://item.jd.com/36826348085.html#product-detail\" class=\"J-more-param\">更多参数<span style=\"text-decoration:line-through;\">&gt;&gt;</span></a>\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p style=\"text-align:center\"><img src=\"/ueditor/php/upload/image/20190624/1561363357.jpg\"/><img src=\"/ueditor/php/upload/image/20190624/1561363358.jpg\"/><area shape=\"rect\" coords=\"4,3,787,286\" href=\"https://item.jd.com/39046443421.html\"/><area shape=\"rect\" coords=\"3,296,788,577\" href=\"https://item.jd.com/36826348085.html\"/><area shape=\"rect\" coords=\"2,584,784,876\" href=\"https://item.jd.com/31984967247.html\"/><area shape=\"rect\" coords=\"2,888,387,1129\" href=\"https://item.jd.com/27396780187.html\"/><area shape=\"rect\" coords=\"497,945,499,947\" href=\"https://item.jd.com/36826348085.html\"/><area shape=\"rect\" coords=\"395,890,788,1131\" href=\"https://item.jd.com/30164630893.html\"/><area shape=\"rect\" coords=\"1,1136,386,1380\" href=\"https://item.jd.com/35699399338.html\"/><area shape=\"rect\" coords=\"394,1136,786,1385\" href=\"https://item.jd.com/28985159018.html\"/><img src=\"/ueditor/php/upload/image/20190624/1561363359.jpg\"/><br/></p><p><br/></p><p>}\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '0', '2019-06-24 16:07:58', '2019-06-25 16:46:54', '0');
INSERT INTO `goods` VALUES ('40', '小米（MI） 红米6A 移动联通电信4G 老年智能手机 双卡双待 铂银灰 全网通(3G+32G)', '595.00', '【现货速发】小米官方直供货源，全新原装正品！【京东/顺丰配送】全国联保+运费险，售后无忧购买更放心！', '1', '8', '0', '20190624/AWb3s4hPkiyLJWQ19p0zX8TObvLXya6A6DwO9kxl.jpeg', '0', '0', '<ul class=\"parameter1 p-parameter-list list-paddingleft-2\"><li><p>分辨率：1440*720</p></li><li><p>后置摄像头：1300万像素</p><p>前置摄像头：500万像素</p></li><li><p>核&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数：四核</p><p>频&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;率：以官网信息为准</p></li></ul><ul class=\"p-parameter-list list-paddingleft-2\"><li><p>品牌： <a href=\"https://list.jd.com/list.html?cat=9987,653,655&ev=exbrand_18374\" target=\"_blank\">小米（MI）</a></p></li></ul><ul class=\"parameter2 p-parameter-list list-paddingleft-2\"><li><p>商品名称：小米（MI） 红米6A &nbsp;移动联通电信4G 老年智能手机 双卡双待 铂银灰 全网通(3G+32G)</p></li><li><p>商品编号：31168625132</p></li><li><p>店铺： <a href=\"https://zsjsj.jd.com\" target=\"_blank\">掌视界数码旗舰店</a></p></li><li><p>商品毛重：200.00g</p></li><li><p>多卡支持：双卡双待单4G</p></li><li><p>网络制式：4G LTE全网通</p></li><li><p>4G LTE网络特性：其他</p></li></ul><p class=\"more-par\"><a href=\"https://item.jd.com/31168625132.html?extension_id=eyJhZCI6IjE3NTUiLCJjaCI6IjIiLCJza3UiOiIzMTE2ODYyNTEzMiIsInRzIjoiMTU2MTM2Mjg0OCIsInVuaXFpZCI6IntcImNsaWNrX2lkXCI6XCIxNzA5MmFhOS03ODQ3LTQ3M2ItYTJiZi02OTVlMmQ5MjZjZTRcIixcIm1hdGVyaWFsX2lkXCI6XCI4NTM5Nzc1MTU0ODk1MTMwNjQyXCIsXCJwb3NfaWRcIjpcIjE3NTVcIixcInNpZFwiOlwiNjY2M2Q1MGYtM2Y5Ny00Zjk4LThhOWEtNjNhZjA5ODhhOWYzXCJ9In0=&jd_pop=17092aa9-7847-473b-a2bf-695e2d926ce4&abt=0#product-detail\" class=\"J-more-param\">更多参数<span style=\"text-decoration:line-through;\">&gt;&gt;</span></a>\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p style=\"text-align:center\"><img src=\"/ueditor/php/upload/image/20190624/1561363974.jpg\"/><img src=\"/ueditor/php/upload/image/20190624/1561363975.jpg\"/><area shape=\"rect\" coords=\"4,3,787,286\" href=\"https://item.jd.com/39046443421.html\"/><area shape=\"rect\" coords=\"3,296,788,577\" href=\"https://item.jd.com/36826348085.html\"/><area shape=\"rect\" coords=\"2,584,784,876\" href=\"https://item.jd.com/31984967247.html\"/><area shape=\"rect\" coords=\"2,888,387,1129\" href=\"https://item.jd.com/27396780187.html\"/><area shape=\"rect\" coords=\"497,945,499,947\" href=\"https://item.jd.com/31168625132.html?extension_id=eyJhZCI6IjE3NTUiLCJjaCI6IjIiLCJza3UiOiIzMTE2ODYyNTEzMiIsInRzIjoiMTU2MTM2Mjg0OCIsInVuaXFpZCI6IntcImNsaWNrX2lkXCI6XCIxNzA5MmFhOS03ODQ3LTQ3M2ItYTJiZi02OTVlMmQ5MjZjZTRcIixcIm1hdGVyaWFsX2lkXCI6XCI4NTM5Nzc1MTU0ODk1MTMwNjQyXCIsXCJwb3NfaWRcIjpcIjE3NTVcIixcInNpZFwiOlwiNjY2M2Q1MGYtM2Y5Ny00Zjk4LThhOWEtNjNhZjA5ODhhOWYzXCJ9In0=&jd_pop=17092aa9-7847-473b-a2bf-695e2d926ce4&abt=0\"/><area shape=\"rect\" coords=\"395,890,788,1131\" href=\"https://item.jd.com/30164630893.html\"/><area shape=\"rect\" coords=\"1,1136,386,1380\" href=\"https://item.jd.com/35699399338.html\"/><area shape=\"rect\" coords=\"394,1136,786,1385\" href=\"https://item.jd.com/28985159018.html\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20190624/1561363975.jpg\"/></p><p><br/></p>', '0', '2019-06-24 16:13:09', '2019-06-25 09:11:55', '0');
INSERT INTO `goods` VALUES ('41', '小米 Redmi K20Pro 4800万超广角三摄 8GB+256GB 碳纤黑 骁龙855 全网通4G 双卡双待 全面屏拍照游戏智能手机', '2999.00', '【新品抢购】限时白条6期免息，RedmiK20Pro骁龙855新品开抢，弹出式前置相机！品质好物购不停', '1', '8', '0', '20190624/syBX7plXWHEQZgcwufOm6ixueEkA9h8lax5rvswg.jpeg', '0', '0', '<ul class=\"parameter1 p-parameter-list list-paddingleft-2\"><li><p>分辨率：2340×1080</p></li><li><p>后置摄像头：4800万+1300万+800万像素</p><p>前置摄像头：2000万像素</p></li><li><p>核&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数：八核</p><p>频&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;率：以官网信息为准</p></li></ul><ul class=\"p-parameter-list list-paddingleft-2\"><li><p>品牌： <a href=\"https://list.jd.com/list.html?cat=9987,653,655&tid=655&ev=exbrand_18374\" target=\"_blank\">小米（MI）</a></p></li></ul><ul class=\"parameter2 p-parameter-list list-paddingleft-2\"><li><p>商品名称：小米Redmi K20 Pro</p></li><li><p>商品编号：7652029</p></li><li><p>商品毛重：490.00g</p></li><li><p>商品产地：中国大陆</p></li><li><p>系统：安卓（Android）</p></li><li><p>拍照特点：智能拍照，后置三摄</p></li><li><p>电池容量：4000mAh-5999mAh</p></li><li><p>运行内存：8GB</p></li><li><p>前置摄像头像素：2000万及以上</p></li><li><p>后置摄像头像素：2000万及以上</p></li><li><p>机身内存：256GB</p></li><li><p>机身厚度：普通（8.5mm以上）</p></li></ul><p class=\"more-par\"><a href=\"https://item.jd.com/7652029.html#product-detail\" class=\"J-more-param\">更多参数<span style=\"text-decoration:line-through;\">&gt;&gt;</span></a>\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p><img alt=\"\" class=\"\" src=\"/ueditor/php/upload/image/20190624/1561364135.jpg\"/><br/></p><p><img src=\"/ueditor/php/upload/image/20190624/1561364225.jpg\" alt=\"https://img30.360buyimg.com/sku/jfs/t1/48385/24/1076/185275/5cecae60E92c04a0a/b3bc740552084aef.jpg\" class=\"shrinkToFit\" width=\"749\" height=\"1065\"/></p><p><br/></p><p><br/></p><p><area shape=\"rect\" coords=\"12,289,246,680\" href=\"https://item.jd.com/7652091.html\"/><area shape=\"rect\" coords=\"259,290,495,677\" href=\"https://item.jd.com/7652029.html\"/><area shape=\"rect\" coords=\"505,289,743,679\" href=\"https://item.jd.com/7652093.html\"/></p><p><area shape=\"rect\" coords=\"8,222,186,425\" href=\"https://item.jd.com/7652013.html\"/><area shape=\"rect\" coords=\"199,217,372,429\" href=\"https://item.jd.com/100000400010.html\"/><area shape=\"rect\" coords=\"381,216,560,426\" href=\"https://item.jd.com/7437710.html\"/><area shape=\"rect\" coords=\"566,215,744,427\" href=\"https://item.jd.com/100002677997.html\"/><area shape=\"rect\" coords=\"7,438,185,649\" href=\"https://item.jd.com/7437708.html\"/><area shape=\"rect\" coords=\"193,444,371,651\" href=\"https://item.jd.com/7437688.html\"/><area shape=\"rect\" coords=\"380,441,557,652\" href=\"https://item.jd.com/7120000.html\"/><area shape=\"rect\" coords=\"566,442,743,647\" href=\"https://item.jd.com/100000349372.html\"/><area shape=\"rect\" coords=\"7,661,186,877\" href=\"https://item.jd.com/7437786.html\"/><area shape=\"rect\" coords=\"192,669,371,878\" href=\"https://item.jd.com/7437564.html\"/><area shape=\"rect\" coords=\"379,667,557,880\" href=\"https://item.jd.com/100004771694.html\"/><area shape=\"rect\" coords=\"570,664,743,879\" href=\"https://item.jd.com/8264407.html\"/></p>', '0', '2019-06-24 16:18:19', '2019-06-25 09:13:48', '0');

-- ----------------------------
-- Table structure for goods_word
-- ----------------------------
DROP TABLE IF EXISTS `goods_word`;
CREATE TABLE `goods_word` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(255) DEFAULT NULL COMMENT '分出的词语',
  `gid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1561 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of goods_word
-- ----------------------------
INSERT INTO `goods_word` VALUES ('1', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('2', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('3', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('4', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('5', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('6', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('7', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('8', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('9', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('10', '长虹', '38');
INSERT INTO `goods_word` VALUES ('11', '华为', '39');
INSERT INTO `goods_word` VALUES ('12', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('13', '青春', '39');
INSERT INTO `goods_word` VALUES ('14', '版', '39');
INSERT INTO `goods_word` VALUES ('15', '手机', '39');
INSERT INTO `goods_word` VALUES ('16', '天价', '39');
INSERT INTO `goods_word` VALUES ('17', '保）', '39');
INSERT INTO `goods_word` VALUES ('18', '渐变', '39');
INSERT INTO `goods_word` VALUES ('19', '蓝', '39');
INSERT INTO `goods_word` VALUES ('20', '全', '39');
INSERT INTO `goods_word` VALUES ('21', '网通', '39');
INSERT INTO `goods_word` VALUES ('22', '小米', '40');
INSERT INTO `goods_word` VALUES ('23', '红', '40');
INSERT INTO `goods_word` VALUES ('24', '米', '40');
INSERT INTO `goods_word` VALUES ('25', '移动', '40');
INSERT INTO `goods_word` VALUES ('26', '联通', '40');
INSERT INTO `goods_word` VALUES ('27', '电信', '40');
INSERT INTO `goods_word` VALUES ('28', '老年', '40');
INSERT INTO `goods_word` VALUES ('29', '智能', '40');
INSERT INTO `goods_word` VALUES ('30', '手机', '40');
INSERT INTO `goods_word` VALUES ('31', '双', '40');
INSERT INTO `goods_word` VALUES ('32', '卡', '40');
INSERT INTO `goods_word` VALUES ('33', '双', '40');
INSERT INTO `goods_word` VALUES ('34', '待', '40');
INSERT INTO `goods_word` VALUES ('35', '铂', '40');
INSERT INTO `goods_word` VALUES ('36', '银灰', '40');
INSERT INTO `goods_word` VALUES ('37', '全', '40');
INSERT INTO `goods_word` VALUES ('38', '网通', '40');
INSERT INTO `goods_word` VALUES ('39', '小米', '41');
INSERT INTO `goods_word` VALUES ('40', '万超', '41');
INSERT INTO `goods_word` VALUES ('41', '广角', '41');
INSERT INTO `goods_word` VALUES ('42', '三', '41');
INSERT INTO `goods_word` VALUES ('43', '摄', '41');
INSERT INTO `goods_word` VALUES ('44', '碳', '41');
INSERT INTO `goods_word` VALUES ('45', '纤', '41');
INSERT INTO `goods_word` VALUES ('46', '黑', '41');
INSERT INTO `goods_word` VALUES ('47', '骁', '41');
INSERT INTO `goods_word` VALUES ('48', '龙', '41');
INSERT INTO `goods_word` VALUES ('49', '全', '41');
INSERT INTO `goods_word` VALUES ('50', '网通', '41');
INSERT INTO `goods_word` VALUES ('51', '双', '41');
INSERT INTO `goods_word` VALUES ('52', '卡', '41');
INSERT INTO `goods_word` VALUES ('53', '双', '41');
INSERT INTO `goods_word` VALUES ('54', '待', '41');
INSERT INTO `goods_word` VALUES ('55', '全面', '41');
INSERT INTO `goods_word` VALUES ('56', '屏', '41');
INSERT INTO `goods_word` VALUES ('57', '拍照', '41');
INSERT INTO `goods_word` VALUES ('58', '游戏', '41');
INSERT INTO `goods_word` VALUES ('59', '智能', '41');
INSERT INTO `goods_word` VALUES ('60', '手机', '41');
INSERT INTO `goods_word` VALUES ('61', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('62', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('63', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('64', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('65', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('66', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('67', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('68', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('69', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('70', '长虹', '38');
INSERT INTO `goods_word` VALUES ('71', '华为', '39');
INSERT INTO `goods_word` VALUES ('72', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('73', '青春', '39');
INSERT INTO `goods_word` VALUES ('74', '版', '39');
INSERT INTO `goods_word` VALUES ('75', '手机', '39');
INSERT INTO `goods_word` VALUES ('76', '天价', '39');
INSERT INTO `goods_word` VALUES ('77', '保）', '39');
INSERT INTO `goods_word` VALUES ('78', '渐变', '39');
INSERT INTO `goods_word` VALUES ('79', '蓝', '39');
INSERT INTO `goods_word` VALUES ('80', '全', '39');
INSERT INTO `goods_word` VALUES ('81', '网通', '39');
INSERT INTO `goods_word` VALUES ('82', '小米', '40');
INSERT INTO `goods_word` VALUES ('83', '红', '40');
INSERT INTO `goods_word` VALUES ('84', '米', '40');
INSERT INTO `goods_word` VALUES ('85', '移动', '40');
INSERT INTO `goods_word` VALUES ('86', '联通', '40');
INSERT INTO `goods_word` VALUES ('87', '电信', '40');
INSERT INTO `goods_word` VALUES ('88', '老年', '40');
INSERT INTO `goods_word` VALUES ('89', '智能', '40');
INSERT INTO `goods_word` VALUES ('90', '手机', '40');
INSERT INTO `goods_word` VALUES ('91', '双', '40');
INSERT INTO `goods_word` VALUES ('92', '卡', '40');
INSERT INTO `goods_word` VALUES ('93', '双', '40');
INSERT INTO `goods_word` VALUES ('94', '待', '40');
INSERT INTO `goods_word` VALUES ('95', '铂', '40');
INSERT INTO `goods_word` VALUES ('96', '银灰', '40');
INSERT INTO `goods_word` VALUES ('97', '全', '40');
INSERT INTO `goods_word` VALUES ('98', '网通', '40');
INSERT INTO `goods_word` VALUES ('99', '小米', '41');
INSERT INTO `goods_word` VALUES ('100', '万超', '41');
INSERT INTO `goods_word` VALUES ('101', '广角', '41');
INSERT INTO `goods_word` VALUES ('102', '三', '41');
INSERT INTO `goods_word` VALUES ('103', '摄', '41');
INSERT INTO `goods_word` VALUES ('104', '碳', '41');
INSERT INTO `goods_word` VALUES ('105', '纤', '41');
INSERT INTO `goods_word` VALUES ('106', '黑', '41');
INSERT INTO `goods_word` VALUES ('107', '骁', '41');
INSERT INTO `goods_word` VALUES ('108', '龙', '41');
INSERT INTO `goods_word` VALUES ('109', '全', '41');
INSERT INTO `goods_word` VALUES ('110', '网通', '41');
INSERT INTO `goods_word` VALUES ('111', '双', '41');
INSERT INTO `goods_word` VALUES ('112', '卡', '41');
INSERT INTO `goods_word` VALUES ('113', '双', '41');
INSERT INTO `goods_word` VALUES ('114', '待', '41');
INSERT INTO `goods_word` VALUES ('115', '全面', '41');
INSERT INTO `goods_word` VALUES ('116', '屏', '41');
INSERT INTO `goods_word` VALUES ('117', '拍照', '41');
INSERT INTO `goods_word` VALUES ('118', '游戏', '41');
INSERT INTO `goods_word` VALUES ('119', '智能', '41');
INSERT INTO `goods_word` VALUES ('120', '手机', '41');
INSERT INTO `goods_word` VALUES ('121', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('122', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('123', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('124', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('125', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('126', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('127', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('128', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('129', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('130', '长虹', '38');
INSERT INTO `goods_word` VALUES ('131', '华为', '39');
INSERT INTO `goods_word` VALUES ('132', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('133', '青春', '39');
INSERT INTO `goods_word` VALUES ('134', '版', '39');
INSERT INTO `goods_word` VALUES ('135', '手机', '39');
INSERT INTO `goods_word` VALUES ('136', '天价', '39');
INSERT INTO `goods_word` VALUES ('137', '保）', '39');
INSERT INTO `goods_word` VALUES ('138', '渐变', '39');
INSERT INTO `goods_word` VALUES ('139', '蓝', '39');
INSERT INTO `goods_word` VALUES ('140', '全', '39');
INSERT INTO `goods_word` VALUES ('141', '网通', '39');
INSERT INTO `goods_word` VALUES ('142', '小米', '40');
INSERT INTO `goods_word` VALUES ('143', '红', '40');
INSERT INTO `goods_word` VALUES ('144', '米', '40');
INSERT INTO `goods_word` VALUES ('145', '移动', '40');
INSERT INTO `goods_word` VALUES ('146', '联通', '40');
INSERT INTO `goods_word` VALUES ('147', '电信', '40');
INSERT INTO `goods_word` VALUES ('148', '老年', '40');
INSERT INTO `goods_word` VALUES ('149', '智能', '40');
INSERT INTO `goods_word` VALUES ('150', '手机', '40');
INSERT INTO `goods_word` VALUES ('151', '双', '40');
INSERT INTO `goods_word` VALUES ('152', '卡', '40');
INSERT INTO `goods_word` VALUES ('153', '双', '40');
INSERT INTO `goods_word` VALUES ('154', '待', '40');
INSERT INTO `goods_word` VALUES ('155', '铂', '40');
INSERT INTO `goods_word` VALUES ('156', '银灰', '40');
INSERT INTO `goods_word` VALUES ('157', '全', '40');
INSERT INTO `goods_word` VALUES ('158', '网通', '40');
INSERT INTO `goods_word` VALUES ('159', '小米', '41');
INSERT INTO `goods_word` VALUES ('160', '万超', '41');
INSERT INTO `goods_word` VALUES ('161', '广角', '41');
INSERT INTO `goods_word` VALUES ('162', '三', '41');
INSERT INTO `goods_word` VALUES ('163', '摄', '41');
INSERT INTO `goods_word` VALUES ('164', '碳', '41');
INSERT INTO `goods_word` VALUES ('165', '纤', '41');
INSERT INTO `goods_word` VALUES ('166', '黑', '41');
INSERT INTO `goods_word` VALUES ('167', '骁', '41');
INSERT INTO `goods_word` VALUES ('168', '龙', '41');
INSERT INTO `goods_word` VALUES ('169', '全', '41');
INSERT INTO `goods_word` VALUES ('170', '网通', '41');
INSERT INTO `goods_word` VALUES ('171', '双', '41');
INSERT INTO `goods_word` VALUES ('172', '卡', '41');
INSERT INTO `goods_word` VALUES ('173', '双', '41');
INSERT INTO `goods_word` VALUES ('174', '待', '41');
INSERT INTO `goods_word` VALUES ('175', '全面', '41');
INSERT INTO `goods_word` VALUES ('176', '屏', '41');
INSERT INTO `goods_word` VALUES ('177', '拍照', '41');
INSERT INTO `goods_word` VALUES ('178', '游戏', '41');
INSERT INTO `goods_word` VALUES ('179', '智能', '41');
INSERT INTO `goods_word` VALUES ('180', '手机', '41');
INSERT INTO `goods_word` VALUES ('181', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('182', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('183', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('184', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('185', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('186', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('187', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('188', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('189', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('190', '长虹', '38');
INSERT INTO `goods_word` VALUES ('191', '华为', '39');
INSERT INTO `goods_word` VALUES ('192', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('193', '青春', '39');
INSERT INTO `goods_word` VALUES ('194', '版', '39');
INSERT INTO `goods_word` VALUES ('195', '手机', '39');
INSERT INTO `goods_word` VALUES ('196', '天价', '39');
INSERT INTO `goods_word` VALUES ('197', '保）', '39');
INSERT INTO `goods_word` VALUES ('198', '渐变', '39');
INSERT INTO `goods_word` VALUES ('199', '蓝', '39');
INSERT INTO `goods_word` VALUES ('200', '全', '39');
INSERT INTO `goods_word` VALUES ('201', '网通', '39');
INSERT INTO `goods_word` VALUES ('202', '小米', '40');
INSERT INTO `goods_word` VALUES ('203', '红', '40');
INSERT INTO `goods_word` VALUES ('204', '米', '40');
INSERT INTO `goods_word` VALUES ('205', '移动', '40');
INSERT INTO `goods_word` VALUES ('206', '联通', '40');
INSERT INTO `goods_word` VALUES ('207', '电信', '40');
INSERT INTO `goods_word` VALUES ('208', '老年', '40');
INSERT INTO `goods_word` VALUES ('209', '智能', '40');
INSERT INTO `goods_word` VALUES ('210', '手机', '40');
INSERT INTO `goods_word` VALUES ('211', '双', '40');
INSERT INTO `goods_word` VALUES ('212', '卡', '40');
INSERT INTO `goods_word` VALUES ('213', '双', '40');
INSERT INTO `goods_word` VALUES ('214', '待', '40');
INSERT INTO `goods_word` VALUES ('215', '铂', '40');
INSERT INTO `goods_word` VALUES ('216', '银灰', '40');
INSERT INTO `goods_word` VALUES ('217', '全', '40');
INSERT INTO `goods_word` VALUES ('218', '网通', '40');
INSERT INTO `goods_word` VALUES ('219', '小米', '41');
INSERT INTO `goods_word` VALUES ('220', '万超', '41');
INSERT INTO `goods_word` VALUES ('221', '广角', '41');
INSERT INTO `goods_word` VALUES ('222', '三', '41');
INSERT INTO `goods_word` VALUES ('223', '摄', '41');
INSERT INTO `goods_word` VALUES ('224', '碳', '41');
INSERT INTO `goods_word` VALUES ('225', '纤', '41');
INSERT INTO `goods_word` VALUES ('226', '黑', '41');
INSERT INTO `goods_word` VALUES ('227', '骁', '41');
INSERT INTO `goods_word` VALUES ('228', '龙', '41');
INSERT INTO `goods_word` VALUES ('229', '全', '41');
INSERT INTO `goods_word` VALUES ('230', '网通', '41');
INSERT INTO `goods_word` VALUES ('231', '双', '41');
INSERT INTO `goods_word` VALUES ('232', '卡', '41');
INSERT INTO `goods_word` VALUES ('233', '双', '41');
INSERT INTO `goods_word` VALUES ('234', '待', '41');
INSERT INTO `goods_word` VALUES ('235', '全面', '41');
INSERT INTO `goods_word` VALUES ('236', '屏', '41');
INSERT INTO `goods_word` VALUES ('237', '拍照', '41');
INSERT INTO `goods_word` VALUES ('238', '游戏', '41');
INSERT INTO `goods_word` VALUES ('239', '智能', '41');
INSERT INTO `goods_word` VALUES ('240', '手机', '41');
INSERT INTO `goods_word` VALUES ('241', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('242', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('243', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('244', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('245', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('246', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('247', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('248', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('249', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('250', '长虹', '38');
INSERT INTO `goods_word` VALUES ('251', '华为', '39');
INSERT INTO `goods_word` VALUES ('252', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('253', '青春', '39');
INSERT INTO `goods_word` VALUES ('254', '版', '39');
INSERT INTO `goods_word` VALUES ('255', '手机', '39');
INSERT INTO `goods_word` VALUES ('256', '天价', '39');
INSERT INTO `goods_word` VALUES ('257', '保）', '39');
INSERT INTO `goods_word` VALUES ('258', '渐变', '39');
INSERT INTO `goods_word` VALUES ('259', '蓝', '39');
INSERT INTO `goods_word` VALUES ('260', '全', '39');
INSERT INTO `goods_word` VALUES ('261', '网通', '39');
INSERT INTO `goods_word` VALUES ('262', '小米', '40');
INSERT INTO `goods_word` VALUES ('263', '红', '40');
INSERT INTO `goods_word` VALUES ('264', '米', '40');
INSERT INTO `goods_word` VALUES ('265', '移动', '40');
INSERT INTO `goods_word` VALUES ('266', '联通', '40');
INSERT INTO `goods_word` VALUES ('267', '电信', '40');
INSERT INTO `goods_word` VALUES ('268', '老年', '40');
INSERT INTO `goods_word` VALUES ('269', '智能', '40');
INSERT INTO `goods_word` VALUES ('270', '手机', '40');
INSERT INTO `goods_word` VALUES ('271', '双', '40');
INSERT INTO `goods_word` VALUES ('272', '卡', '40');
INSERT INTO `goods_word` VALUES ('273', '双', '40');
INSERT INTO `goods_word` VALUES ('274', '待', '40');
INSERT INTO `goods_word` VALUES ('275', '铂', '40');
INSERT INTO `goods_word` VALUES ('276', '银灰', '40');
INSERT INTO `goods_word` VALUES ('277', '全', '40');
INSERT INTO `goods_word` VALUES ('278', '网通', '40');
INSERT INTO `goods_word` VALUES ('279', '小米', '41');
INSERT INTO `goods_word` VALUES ('280', '万超', '41');
INSERT INTO `goods_word` VALUES ('281', '广角', '41');
INSERT INTO `goods_word` VALUES ('282', '三', '41');
INSERT INTO `goods_word` VALUES ('283', '摄', '41');
INSERT INTO `goods_word` VALUES ('284', '碳', '41');
INSERT INTO `goods_word` VALUES ('285', '纤', '41');
INSERT INTO `goods_word` VALUES ('286', '黑', '41');
INSERT INTO `goods_word` VALUES ('287', '骁', '41');
INSERT INTO `goods_word` VALUES ('288', '龙', '41');
INSERT INTO `goods_word` VALUES ('289', '全', '41');
INSERT INTO `goods_word` VALUES ('290', '网通', '41');
INSERT INTO `goods_word` VALUES ('291', '双', '41');
INSERT INTO `goods_word` VALUES ('292', '卡', '41');
INSERT INTO `goods_word` VALUES ('293', '双', '41');
INSERT INTO `goods_word` VALUES ('294', '待', '41');
INSERT INTO `goods_word` VALUES ('295', '全面', '41');
INSERT INTO `goods_word` VALUES ('296', '屏', '41');
INSERT INTO `goods_word` VALUES ('297', '拍照', '41');
INSERT INTO `goods_word` VALUES ('298', '游戏', '41');
INSERT INTO `goods_word` VALUES ('299', '智能', '41');
INSERT INTO `goods_word` VALUES ('300', '手机', '41');
INSERT INTO `goods_word` VALUES ('301', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('302', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('303', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('304', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('305', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('306', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('307', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('308', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('309', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('310', '长虹', '38');
INSERT INTO `goods_word` VALUES ('311', '华为', '39');
INSERT INTO `goods_word` VALUES ('312', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('313', '青春', '39');
INSERT INTO `goods_word` VALUES ('314', '版', '39');
INSERT INTO `goods_word` VALUES ('315', '手机', '39');
INSERT INTO `goods_word` VALUES ('316', '天价', '39');
INSERT INTO `goods_word` VALUES ('317', '保）', '39');
INSERT INTO `goods_word` VALUES ('318', '渐变', '39');
INSERT INTO `goods_word` VALUES ('319', '蓝', '39');
INSERT INTO `goods_word` VALUES ('320', '全', '39');
INSERT INTO `goods_word` VALUES ('321', '网通', '39');
INSERT INTO `goods_word` VALUES ('322', '小米', '40');
INSERT INTO `goods_word` VALUES ('323', '红', '40');
INSERT INTO `goods_word` VALUES ('324', '米', '40');
INSERT INTO `goods_word` VALUES ('325', '移动', '40');
INSERT INTO `goods_word` VALUES ('326', '联通', '40');
INSERT INTO `goods_word` VALUES ('327', '电信', '40');
INSERT INTO `goods_word` VALUES ('328', '老年', '40');
INSERT INTO `goods_word` VALUES ('329', '智能', '40');
INSERT INTO `goods_word` VALUES ('330', '手机', '40');
INSERT INTO `goods_word` VALUES ('331', '双', '40');
INSERT INTO `goods_word` VALUES ('332', '卡', '40');
INSERT INTO `goods_word` VALUES ('333', '双', '40');
INSERT INTO `goods_word` VALUES ('334', '待', '40');
INSERT INTO `goods_word` VALUES ('335', '铂', '40');
INSERT INTO `goods_word` VALUES ('336', '银灰', '40');
INSERT INTO `goods_word` VALUES ('337', '全', '40');
INSERT INTO `goods_word` VALUES ('338', '网通', '40');
INSERT INTO `goods_word` VALUES ('339', '小米', '41');
INSERT INTO `goods_word` VALUES ('340', '万超', '41');
INSERT INTO `goods_word` VALUES ('341', '广角', '41');
INSERT INTO `goods_word` VALUES ('342', '三', '41');
INSERT INTO `goods_word` VALUES ('343', '摄', '41');
INSERT INTO `goods_word` VALUES ('344', '碳', '41');
INSERT INTO `goods_word` VALUES ('345', '纤', '41');
INSERT INTO `goods_word` VALUES ('346', '黑', '41');
INSERT INTO `goods_word` VALUES ('347', '骁', '41');
INSERT INTO `goods_word` VALUES ('348', '龙', '41');
INSERT INTO `goods_word` VALUES ('349', '全', '41');
INSERT INTO `goods_word` VALUES ('350', '网通', '41');
INSERT INTO `goods_word` VALUES ('351', '双', '41');
INSERT INTO `goods_word` VALUES ('352', '卡', '41');
INSERT INTO `goods_word` VALUES ('353', '双', '41');
INSERT INTO `goods_word` VALUES ('354', '待', '41');
INSERT INTO `goods_word` VALUES ('355', '全面', '41');
INSERT INTO `goods_word` VALUES ('356', '屏', '41');
INSERT INTO `goods_word` VALUES ('357', '拍照', '41');
INSERT INTO `goods_word` VALUES ('358', '游戏', '41');
INSERT INTO `goods_word` VALUES ('359', '智能', '41');
INSERT INTO `goods_word` VALUES ('360', '手机', '41');
INSERT INTO `goods_word` VALUES ('361', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('362', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('363', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('364', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('365', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('366', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('367', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('368', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('369', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('370', '长虹', '38');
INSERT INTO `goods_word` VALUES ('371', '华为', '39');
INSERT INTO `goods_word` VALUES ('372', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('373', '青春', '39');
INSERT INTO `goods_word` VALUES ('374', '版', '39');
INSERT INTO `goods_word` VALUES ('375', '手机', '39');
INSERT INTO `goods_word` VALUES ('376', '天价', '39');
INSERT INTO `goods_word` VALUES ('377', '保）', '39');
INSERT INTO `goods_word` VALUES ('378', '渐变', '39');
INSERT INTO `goods_word` VALUES ('379', '蓝', '39');
INSERT INTO `goods_word` VALUES ('380', '全', '39');
INSERT INTO `goods_word` VALUES ('381', '网通', '39');
INSERT INTO `goods_word` VALUES ('382', '小米', '40');
INSERT INTO `goods_word` VALUES ('383', '红', '40');
INSERT INTO `goods_word` VALUES ('384', '米', '40');
INSERT INTO `goods_word` VALUES ('385', '移动', '40');
INSERT INTO `goods_word` VALUES ('386', '联通', '40');
INSERT INTO `goods_word` VALUES ('387', '电信', '40');
INSERT INTO `goods_word` VALUES ('388', '老年', '40');
INSERT INTO `goods_word` VALUES ('389', '智能', '40');
INSERT INTO `goods_word` VALUES ('390', '手机', '40');
INSERT INTO `goods_word` VALUES ('391', '双', '40');
INSERT INTO `goods_word` VALUES ('392', '卡', '40');
INSERT INTO `goods_word` VALUES ('393', '双', '40');
INSERT INTO `goods_word` VALUES ('394', '待', '40');
INSERT INTO `goods_word` VALUES ('395', '铂', '40');
INSERT INTO `goods_word` VALUES ('396', '银灰', '40');
INSERT INTO `goods_word` VALUES ('397', '全', '40');
INSERT INTO `goods_word` VALUES ('398', '网通', '40');
INSERT INTO `goods_word` VALUES ('399', '小米', '41');
INSERT INTO `goods_word` VALUES ('400', '万超', '41');
INSERT INTO `goods_word` VALUES ('401', '广角', '41');
INSERT INTO `goods_word` VALUES ('402', '三', '41');
INSERT INTO `goods_word` VALUES ('403', '摄', '41');
INSERT INTO `goods_word` VALUES ('404', '碳', '41');
INSERT INTO `goods_word` VALUES ('405', '纤', '41');
INSERT INTO `goods_word` VALUES ('406', '黑', '41');
INSERT INTO `goods_word` VALUES ('407', '骁', '41');
INSERT INTO `goods_word` VALUES ('408', '龙', '41');
INSERT INTO `goods_word` VALUES ('409', '全', '41');
INSERT INTO `goods_word` VALUES ('410', '网通', '41');
INSERT INTO `goods_word` VALUES ('411', '双', '41');
INSERT INTO `goods_word` VALUES ('412', '卡', '41');
INSERT INTO `goods_word` VALUES ('413', '双', '41');
INSERT INTO `goods_word` VALUES ('414', '待', '41');
INSERT INTO `goods_word` VALUES ('415', '全面', '41');
INSERT INTO `goods_word` VALUES ('416', '屏', '41');
INSERT INTO `goods_word` VALUES ('417', '拍照', '41');
INSERT INTO `goods_word` VALUES ('418', '游戏', '41');
INSERT INTO `goods_word` VALUES ('419', '智能', '41');
INSERT INTO `goods_word` VALUES ('420', '手机', '41');
INSERT INTO `goods_word` VALUES ('421', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('422', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('423', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('424', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('425', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('426', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('427', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('428', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('429', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('430', '长虹', '38');
INSERT INTO `goods_word` VALUES ('431', '华为', '39');
INSERT INTO `goods_word` VALUES ('432', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('433', '青春', '39');
INSERT INTO `goods_word` VALUES ('434', '版', '39');
INSERT INTO `goods_word` VALUES ('435', '手机', '39');
INSERT INTO `goods_word` VALUES ('436', '天价', '39');
INSERT INTO `goods_word` VALUES ('437', '保）', '39');
INSERT INTO `goods_word` VALUES ('438', '渐变', '39');
INSERT INTO `goods_word` VALUES ('439', '蓝', '39');
INSERT INTO `goods_word` VALUES ('440', '全', '39');
INSERT INTO `goods_word` VALUES ('441', '网通', '39');
INSERT INTO `goods_word` VALUES ('442', '小米', '40');
INSERT INTO `goods_word` VALUES ('443', '红', '40');
INSERT INTO `goods_word` VALUES ('444', '米', '40');
INSERT INTO `goods_word` VALUES ('445', '移动', '40');
INSERT INTO `goods_word` VALUES ('446', '联通', '40');
INSERT INTO `goods_word` VALUES ('447', '电信', '40');
INSERT INTO `goods_word` VALUES ('448', '老年', '40');
INSERT INTO `goods_word` VALUES ('449', '智能', '40');
INSERT INTO `goods_word` VALUES ('450', '手机', '40');
INSERT INTO `goods_word` VALUES ('451', '双', '40');
INSERT INTO `goods_word` VALUES ('452', '卡', '40');
INSERT INTO `goods_word` VALUES ('453', '双', '40');
INSERT INTO `goods_word` VALUES ('454', '待', '40');
INSERT INTO `goods_word` VALUES ('455', '铂', '40');
INSERT INTO `goods_word` VALUES ('456', '银灰', '40');
INSERT INTO `goods_word` VALUES ('457', '全', '40');
INSERT INTO `goods_word` VALUES ('458', '网通', '40');
INSERT INTO `goods_word` VALUES ('459', '小米', '41');
INSERT INTO `goods_word` VALUES ('460', '万超', '41');
INSERT INTO `goods_word` VALUES ('461', '广角', '41');
INSERT INTO `goods_word` VALUES ('462', '三', '41');
INSERT INTO `goods_word` VALUES ('463', '摄', '41');
INSERT INTO `goods_word` VALUES ('464', '碳', '41');
INSERT INTO `goods_word` VALUES ('465', '纤', '41');
INSERT INTO `goods_word` VALUES ('466', '黑', '41');
INSERT INTO `goods_word` VALUES ('467', '骁', '41');
INSERT INTO `goods_word` VALUES ('468', '龙', '41');
INSERT INTO `goods_word` VALUES ('469', '全', '41');
INSERT INTO `goods_word` VALUES ('470', '网通', '41');
INSERT INTO `goods_word` VALUES ('471', '双', '41');
INSERT INTO `goods_word` VALUES ('472', '卡', '41');
INSERT INTO `goods_word` VALUES ('473', '双', '41');
INSERT INTO `goods_word` VALUES ('474', '待', '41');
INSERT INTO `goods_word` VALUES ('475', '全面', '41');
INSERT INTO `goods_word` VALUES ('476', '屏', '41');
INSERT INTO `goods_word` VALUES ('477', '拍照', '41');
INSERT INTO `goods_word` VALUES ('478', '游戏', '41');
INSERT INTO `goods_word` VALUES ('479', '智能', '41');
INSERT INTO `goods_word` VALUES ('480', '手机', '41');
INSERT INTO `goods_word` VALUES ('481', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('482', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('483', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('484', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('485', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('486', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('487', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('488', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('489', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('490', '长虹', '38');
INSERT INTO `goods_word` VALUES ('491', '华为', '39');
INSERT INTO `goods_word` VALUES ('492', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('493', '青春', '39');
INSERT INTO `goods_word` VALUES ('494', '版', '39');
INSERT INTO `goods_word` VALUES ('495', '手机', '39');
INSERT INTO `goods_word` VALUES ('496', '天价', '39');
INSERT INTO `goods_word` VALUES ('497', '保）', '39');
INSERT INTO `goods_word` VALUES ('498', '渐变', '39');
INSERT INTO `goods_word` VALUES ('499', '蓝', '39');
INSERT INTO `goods_word` VALUES ('500', '全', '39');
INSERT INTO `goods_word` VALUES ('501', '网通', '39');
INSERT INTO `goods_word` VALUES ('502', '小米', '40');
INSERT INTO `goods_word` VALUES ('503', '红', '40');
INSERT INTO `goods_word` VALUES ('504', '米', '40');
INSERT INTO `goods_word` VALUES ('505', '移动', '40');
INSERT INTO `goods_word` VALUES ('506', '联通', '40');
INSERT INTO `goods_word` VALUES ('507', '电信', '40');
INSERT INTO `goods_word` VALUES ('508', '老年', '40');
INSERT INTO `goods_word` VALUES ('509', '智能', '40');
INSERT INTO `goods_word` VALUES ('510', '手机', '40');
INSERT INTO `goods_word` VALUES ('511', '双', '40');
INSERT INTO `goods_word` VALUES ('512', '卡', '40');
INSERT INTO `goods_word` VALUES ('513', '双', '40');
INSERT INTO `goods_word` VALUES ('514', '待', '40');
INSERT INTO `goods_word` VALUES ('515', '铂', '40');
INSERT INTO `goods_word` VALUES ('516', '银灰', '40');
INSERT INTO `goods_word` VALUES ('517', '全', '40');
INSERT INTO `goods_word` VALUES ('518', '网通', '40');
INSERT INTO `goods_word` VALUES ('519', '小米', '41');
INSERT INTO `goods_word` VALUES ('520', '万超', '41');
INSERT INTO `goods_word` VALUES ('521', '广角', '41');
INSERT INTO `goods_word` VALUES ('522', '三', '41');
INSERT INTO `goods_word` VALUES ('523', '摄', '41');
INSERT INTO `goods_word` VALUES ('524', '碳', '41');
INSERT INTO `goods_word` VALUES ('525', '纤', '41');
INSERT INTO `goods_word` VALUES ('526', '黑', '41');
INSERT INTO `goods_word` VALUES ('527', '骁', '41');
INSERT INTO `goods_word` VALUES ('528', '龙', '41');
INSERT INTO `goods_word` VALUES ('529', '全', '41');
INSERT INTO `goods_word` VALUES ('530', '网通', '41');
INSERT INTO `goods_word` VALUES ('531', '双', '41');
INSERT INTO `goods_word` VALUES ('532', '卡', '41');
INSERT INTO `goods_word` VALUES ('533', '双', '41');
INSERT INTO `goods_word` VALUES ('534', '待', '41');
INSERT INTO `goods_word` VALUES ('535', '全面', '41');
INSERT INTO `goods_word` VALUES ('536', '屏', '41');
INSERT INTO `goods_word` VALUES ('537', '拍照', '41');
INSERT INTO `goods_word` VALUES ('538', '游戏', '41');
INSERT INTO `goods_word` VALUES ('539', '智能', '41');
INSERT INTO `goods_word` VALUES ('540', '手机', '41');
INSERT INTO `goods_word` VALUES ('541', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('542', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('543', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('544', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('545', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('546', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('547', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('548', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('549', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('550', '长虹', '38');
INSERT INTO `goods_word` VALUES ('551', '华为', '39');
INSERT INTO `goods_word` VALUES ('552', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('553', '青春', '39');
INSERT INTO `goods_word` VALUES ('554', '版', '39');
INSERT INTO `goods_word` VALUES ('555', '手机', '39');
INSERT INTO `goods_word` VALUES ('556', '天价', '39');
INSERT INTO `goods_word` VALUES ('557', '保）', '39');
INSERT INTO `goods_word` VALUES ('558', '渐变', '39');
INSERT INTO `goods_word` VALUES ('559', '蓝', '39');
INSERT INTO `goods_word` VALUES ('560', '全', '39');
INSERT INTO `goods_word` VALUES ('561', '网通', '39');
INSERT INTO `goods_word` VALUES ('562', '小米', '40');
INSERT INTO `goods_word` VALUES ('563', '红', '40');
INSERT INTO `goods_word` VALUES ('564', '米', '40');
INSERT INTO `goods_word` VALUES ('565', '移动', '40');
INSERT INTO `goods_word` VALUES ('566', '联通', '40');
INSERT INTO `goods_word` VALUES ('567', '电信', '40');
INSERT INTO `goods_word` VALUES ('568', '老年', '40');
INSERT INTO `goods_word` VALUES ('569', '智能', '40');
INSERT INTO `goods_word` VALUES ('570', '手机', '40');
INSERT INTO `goods_word` VALUES ('571', '双', '40');
INSERT INTO `goods_word` VALUES ('572', '卡', '40');
INSERT INTO `goods_word` VALUES ('573', '双', '40');
INSERT INTO `goods_word` VALUES ('574', '待', '40');
INSERT INTO `goods_word` VALUES ('575', '铂', '40');
INSERT INTO `goods_word` VALUES ('576', '银灰', '40');
INSERT INTO `goods_word` VALUES ('577', '全', '40');
INSERT INTO `goods_word` VALUES ('578', '网通', '40');
INSERT INTO `goods_word` VALUES ('579', '小米', '41');
INSERT INTO `goods_word` VALUES ('580', '万超', '41');
INSERT INTO `goods_word` VALUES ('581', '广角', '41');
INSERT INTO `goods_word` VALUES ('582', '三', '41');
INSERT INTO `goods_word` VALUES ('583', '摄', '41');
INSERT INTO `goods_word` VALUES ('584', '碳', '41');
INSERT INTO `goods_word` VALUES ('585', '纤', '41');
INSERT INTO `goods_word` VALUES ('586', '黑', '41');
INSERT INTO `goods_word` VALUES ('587', '骁', '41');
INSERT INTO `goods_word` VALUES ('588', '龙', '41');
INSERT INTO `goods_word` VALUES ('589', '全', '41');
INSERT INTO `goods_word` VALUES ('590', '网通', '41');
INSERT INTO `goods_word` VALUES ('591', '双', '41');
INSERT INTO `goods_word` VALUES ('592', '卡', '41');
INSERT INTO `goods_word` VALUES ('593', '双', '41');
INSERT INTO `goods_word` VALUES ('594', '待', '41');
INSERT INTO `goods_word` VALUES ('595', '全面', '41');
INSERT INTO `goods_word` VALUES ('596', '屏', '41');
INSERT INTO `goods_word` VALUES ('597', '拍照', '41');
INSERT INTO `goods_word` VALUES ('598', '游戏', '41');
INSERT INTO `goods_word` VALUES ('599', '智能', '41');
INSERT INTO `goods_word` VALUES ('600', '手机', '41');
INSERT INTO `goods_word` VALUES ('601', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('602', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('603', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('604', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('605', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('606', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('607', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('608', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('609', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('610', '长虹', '38');
INSERT INTO `goods_word` VALUES ('611', '华为', '39');
INSERT INTO `goods_word` VALUES ('612', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('613', '青春', '39');
INSERT INTO `goods_word` VALUES ('614', '版', '39');
INSERT INTO `goods_word` VALUES ('615', '手机', '39');
INSERT INTO `goods_word` VALUES ('616', '天价', '39');
INSERT INTO `goods_word` VALUES ('617', '保）', '39');
INSERT INTO `goods_word` VALUES ('618', '渐变', '39');
INSERT INTO `goods_word` VALUES ('619', '蓝', '39');
INSERT INTO `goods_word` VALUES ('620', '全', '39');
INSERT INTO `goods_word` VALUES ('621', '网通', '39');
INSERT INTO `goods_word` VALUES ('622', '小米', '40');
INSERT INTO `goods_word` VALUES ('623', '红', '40');
INSERT INTO `goods_word` VALUES ('624', '米', '40');
INSERT INTO `goods_word` VALUES ('625', '移动', '40');
INSERT INTO `goods_word` VALUES ('626', '联通', '40');
INSERT INTO `goods_word` VALUES ('627', '电信', '40');
INSERT INTO `goods_word` VALUES ('628', '老年', '40');
INSERT INTO `goods_word` VALUES ('629', '智能', '40');
INSERT INTO `goods_word` VALUES ('630', '手机', '40');
INSERT INTO `goods_word` VALUES ('631', '双', '40');
INSERT INTO `goods_word` VALUES ('632', '卡', '40');
INSERT INTO `goods_word` VALUES ('633', '双', '40');
INSERT INTO `goods_word` VALUES ('634', '待', '40');
INSERT INTO `goods_word` VALUES ('635', '铂', '40');
INSERT INTO `goods_word` VALUES ('636', '银灰', '40');
INSERT INTO `goods_word` VALUES ('637', '全', '40');
INSERT INTO `goods_word` VALUES ('638', '网通', '40');
INSERT INTO `goods_word` VALUES ('639', '小米', '41');
INSERT INTO `goods_word` VALUES ('640', '万超', '41');
INSERT INTO `goods_word` VALUES ('641', '广角', '41');
INSERT INTO `goods_word` VALUES ('642', '三', '41');
INSERT INTO `goods_word` VALUES ('643', '摄', '41');
INSERT INTO `goods_word` VALUES ('644', '碳', '41');
INSERT INTO `goods_word` VALUES ('645', '纤', '41');
INSERT INTO `goods_word` VALUES ('646', '黑', '41');
INSERT INTO `goods_word` VALUES ('647', '骁', '41');
INSERT INTO `goods_word` VALUES ('648', '龙', '41');
INSERT INTO `goods_word` VALUES ('649', '全', '41');
INSERT INTO `goods_word` VALUES ('650', '网通', '41');
INSERT INTO `goods_word` VALUES ('651', '双', '41');
INSERT INTO `goods_word` VALUES ('652', '卡', '41');
INSERT INTO `goods_word` VALUES ('653', '双', '41');
INSERT INTO `goods_word` VALUES ('654', '待', '41');
INSERT INTO `goods_word` VALUES ('655', '全面', '41');
INSERT INTO `goods_word` VALUES ('656', '屏', '41');
INSERT INTO `goods_word` VALUES ('657', '拍照', '41');
INSERT INTO `goods_word` VALUES ('658', '游戏', '41');
INSERT INTO `goods_word` VALUES ('659', '智能', '41');
INSERT INTO `goods_word` VALUES ('660', '手机', '41');
INSERT INTO `goods_word` VALUES ('661', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('662', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('663', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('664', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('665', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('666', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('667', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('668', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('669', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('670', '长虹', '38');
INSERT INTO `goods_word` VALUES ('671', '华为', '39');
INSERT INTO `goods_word` VALUES ('672', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('673', '青春', '39');
INSERT INTO `goods_word` VALUES ('674', '版', '39');
INSERT INTO `goods_word` VALUES ('675', '手机', '39');
INSERT INTO `goods_word` VALUES ('676', '天价', '39');
INSERT INTO `goods_word` VALUES ('677', '保）', '39');
INSERT INTO `goods_word` VALUES ('678', '渐变', '39');
INSERT INTO `goods_word` VALUES ('679', '蓝', '39');
INSERT INTO `goods_word` VALUES ('680', '全', '39');
INSERT INTO `goods_word` VALUES ('681', '网通', '39');
INSERT INTO `goods_word` VALUES ('682', '小米', '40');
INSERT INTO `goods_word` VALUES ('683', '红', '40');
INSERT INTO `goods_word` VALUES ('684', '米', '40');
INSERT INTO `goods_word` VALUES ('685', '移动', '40');
INSERT INTO `goods_word` VALUES ('686', '联通', '40');
INSERT INTO `goods_word` VALUES ('687', '电信', '40');
INSERT INTO `goods_word` VALUES ('688', '老年', '40');
INSERT INTO `goods_word` VALUES ('689', '智能', '40');
INSERT INTO `goods_word` VALUES ('690', '手机', '40');
INSERT INTO `goods_word` VALUES ('691', '双', '40');
INSERT INTO `goods_word` VALUES ('692', '卡', '40');
INSERT INTO `goods_word` VALUES ('693', '双', '40');
INSERT INTO `goods_word` VALUES ('694', '待', '40');
INSERT INTO `goods_word` VALUES ('695', '铂', '40');
INSERT INTO `goods_word` VALUES ('696', '银灰', '40');
INSERT INTO `goods_word` VALUES ('697', '全', '40');
INSERT INTO `goods_word` VALUES ('698', '网通', '40');
INSERT INTO `goods_word` VALUES ('699', '小米', '41');
INSERT INTO `goods_word` VALUES ('700', '万超', '41');
INSERT INTO `goods_word` VALUES ('701', '广角', '41');
INSERT INTO `goods_word` VALUES ('702', '三', '41');
INSERT INTO `goods_word` VALUES ('703', '摄', '41');
INSERT INTO `goods_word` VALUES ('704', '碳', '41');
INSERT INTO `goods_word` VALUES ('705', '纤', '41');
INSERT INTO `goods_word` VALUES ('706', '黑', '41');
INSERT INTO `goods_word` VALUES ('707', '骁', '41');
INSERT INTO `goods_word` VALUES ('708', '龙', '41');
INSERT INTO `goods_word` VALUES ('709', '全', '41');
INSERT INTO `goods_word` VALUES ('710', '网通', '41');
INSERT INTO `goods_word` VALUES ('711', '双', '41');
INSERT INTO `goods_word` VALUES ('712', '卡', '41');
INSERT INTO `goods_word` VALUES ('713', '双', '41');
INSERT INTO `goods_word` VALUES ('714', '待', '41');
INSERT INTO `goods_word` VALUES ('715', '全面', '41');
INSERT INTO `goods_word` VALUES ('716', '屏', '41');
INSERT INTO `goods_word` VALUES ('717', '拍照', '41');
INSERT INTO `goods_word` VALUES ('718', '游戏', '41');
INSERT INTO `goods_word` VALUES ('719', '智能', '41');
INSERT INTO `goods_word` VALUES ('720', '手机', '41');
INSERT INTO `goods_word` VALUES ('721', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('722', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('723', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('724', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('725', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('726', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('727', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('728', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('729', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('730', '长虹', '38');
INSERT INTO `goods_word` VALUES ('731', '华为', '39');
INSERT INTO `goods_word` VALUES ('732', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('733', '青春', '39');
INSERT INTO `goods_word` VALUES ('734', '版', '39');
INSERT INTO `goods_word` VALUES ('735', '手机', '39');
INSERT INTO `goods_word` VALUES ('736', '天价', '39');
INSERT INTO `goods_word` VALUES ('737', '保）', '39');
INSERT INTO `goods_word` VALUES ('738', '渐变', '39');
INSERT INTO `goods_word` VALUES ('739', '蓝', '39');
INSERT INTO `goods_word` VALUES ('740', '全', '39');
INSERT INTO `goods_word` VALUES ('741', '网通', '39');
INSERT INTO `goods_word` VALUES ('742', '小米', '40');
INSERT INTO `goods_word` VALUES ('743', '红', '40');
INSERT INTO `goods_word` VALUES ('744', '米', '40');
INSERT INTO `goods_word` VALUES ('745', '移动', '40');
INSERT INTO `goods_word` VALUES ('746', '联通', '40');
INSERT INTO `goods_word` VALUES ('747', '电信', '40');
INSERT INTO `goods_word` VALUES ('748', '老年', '40');
INSERT INTO `goods_word` VALUES ('749', '智能', '40');
INSERT INTO `goods_word` VALUES ('750', '手机', '40');
INSERT INTO `goods_word` VALUES ('751', '双', '40');
INSERT INTO `goods_word` VALUES ('752', '卡', '40');
INSERT INTO `goods_word` VALUES ('753', '双', '40');
INSERT INTO `goods_word` VALUES ('754', '待', '40');
INSERT INTO `goods_word` VALUES ('755', '铂', '40');
INSERT INTO `goods_word` VALUES ('756', '银灰', '40');
INSERT INTO `goods_word` VALUES ('757', '全', '40');
INSERT INTO `goods_word` VALUES ('758', '网通', '40');
INSERT INTO `goods_word` VALUES ('759', '小米', '41');
INSERT INTO `goods_word` VALUES ('760', '万超', '41');
INSERT INTO `goods_word` VALUES ('761', '广角', '41');
INSERT INTO `goods_word` VALUES ('762', '三', '41');
INSERT INTO `goods_word` VALUES ('763', '摄', '41');
INSERT INTO `goods_word` VALUES ('764', '碳', '41');
INSERT INTO `goods_word` VALUES ('765', '纤', '41');
INSERT INTO `goods_word` VALUES ('766', '黑', '41');
INSERT INTO `goods_word` VALUES ('767', '骁', '41');
INSERT INTO `goods_word` VALUES ('768', '龙', '41');
INSERT INTO `goods_word` VALUES ('769', '全', '41');
INSERT INTO `goods_word` VALUES ('770', '网通', '41');
INSERT INTO `goods_word` VALUES ('771', '双', '41');
INSERT INTO `goods_word` VALUES ('772', '卡', '41');
INSERT INTO `goods_word` VALUES ('773', '双', '41');
INSERT INTO `goods_word` VALUES ('774', '待', '41');
INSERT INTO `goods_word` VALUES ('775', '全面', '41');
INSERT INTO `goods_word` VALUES ('776', '屏', '41');
INSERT INTO `goods_word` VALUES ('777', '拍照', '41');
INSERT INTO `goods_word` VALUES ('778', '游戏', '41');
INSERT INTO `goods_word` VALUES ('779', '智能', '41');
INSERT INTO `goods_word` VALUES ('780', '手机', '41');
INSERT INTO `goods_word` VALUES ('781', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('782', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('783', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('784', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('785', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('786', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('787', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('788', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('789', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('790', '长虹', '38');
INSERT INTO `goods_word` VALUES ('791', '华为', '39');
INSERT INTO `goods_word` VALUES ('792', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('793', '青春', '39');
INSERT INTO `goods_word` VALUES ('794', '版', '39');
INSERT INTO `goods_word` VALUES ('795', '手机', '39');
INSERT INTO `goods_word` VALUES ('796', '天价', '39');
INSERT INTO `goods_word` VALUES ('797', '保）', '39');
INSERT INTO `goods_word` VALUES ('798', '渐变', '39');
INSERT INTO `goods_word` VALUES ('799', '蓝', '39');
INSERT INTO `goods_word` VALUES ('800', '全', '39');
INSERT INTO `goods_word` VALUES ('801', '网通', '39');
INSERT INTO `goods_word` VALUES ('802', '小米', '40');
INSERT INTO `goods_word` VALUES ('803', '红', '40');
INSERT INTO `goods_word` VALUES ('804', '米', '40');
INSERT INTO `goods_word` VALUES ('805', '移动', '40');
INSERT INTO `goods_word` VALUES ('806', '联通', '40');
INSERT INTO `goods_word` VALUES ('807', '电信', '40');
INSERT INTO `goods_word` VALUES ('808', '老年', '40');
INSERT INTO `goods_word` VALUES ('809', '智能', '40');
INSERT INTO `goods_word` VALUES ('810', '手机', '40');
INSERT INTO `goods_word` VALUES ('811', '双', '40');
INSERT INTO `goods_word` VALUES ('812', '卡', '40');
INSERT INTO `goods_word` VALUES ('813', '双', '40');
INSERT INTO `goods_word` VALUES ('814', '待', '40');
INSERT INTO `goods_word` VALUES ('815', '铂', '40');
INSERT INTO `goods_word` VALUES ('816', '银灰', '40');
INSERT INTO `goods_word` VALUES ('817', '全', '40');
INSERT INTO `goods_word` VALUES ('818', '网通', '40');
INSERT INTO `goods_word` VALUES ('819', '小米', '41');
INSERT INTO `goods_word` VALUES ('820', '万超', '41');
INSERT INTO `goods_word` VALUES ('821', '广角', '41');
INSERT INTO `goods_word` VALUES ('822', '三', '41');
INSERT INTO `goods_word` VALUES ('823', '摄', '41');
INSERT INTO `goods_word` VALUES ('824', '碳', '41');
INSERT INTO `goods_word` VALUES ('825', '纤', '41');
INSERT INTO `goods_word` VALUES ('826', '黑', '41');
INSERT INTO `goods_word` VALUES ('827', '骁', '41');
INSERT INTO `goods_word` VALUES ('828', '龙', '41');
INSERT INTO `goods_word` VALUES ('829', '全', '41');
INSERT INTO `goods_word` VALUES ('830', '网通', '41');
INSERT INTO `goods_word` VALUES ('831', '双', '41');
INSERT INTO `goods_word` VALUES ('832', '卡', '41');
INSERT INTO `goods_word` VALUES ('833', '双', '41');
INSERT INTO `goods_word` VALUES ('834', '待', '41');
INSERT INTO `goods_word` VALUES ('835', '全面', '41');
INSERT INTO `goods_word` VALUES ('836', '屏', '41');
INSERT INTO `goods_word` VALUES ('837', '拍照', '41');
INSERT INTO `goods_word` VALUES ('838', '游戏', '41');
INSERT INTO `goods_word` VALUES ('839', '智能', '41');
INSERT INTO `goods_word` VALUES ('840', '手机', '41');
INSERT INTO `goods_word` VALUES ('841', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('842', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('843', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('844', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('845', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('846', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('847', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('848', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('849', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('850', '长虹', '38');
INSERT INTO `goods_word` VALUES ('851', '华为', '39');
INSERT INTO `goods_word` VALUES ('852', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('853', '青春', '39');
INSERT INTO `goods_word` VALUES ('854', '版', '39');
INSERT INTO `goods_word` VALUES ('855', '手机', '39');
INSERT INTO `goods_word` VALUES ('856', '天价', '39');
INSERT INTO `goods_word` VALUES ('857', '保）', '39');
INSERT INTO `goods_word` VALUES ('858', '渐变', '39');
INSERT INTO `goods_word` VALUES ('859', '蓝', '39');
INSERT INTO `goods_word` VALUES ('860', '全', '39');
INSERT INTO `goods_word` VALUES ('861', '网通', '39');
INSERT INTO `goods_word` VALUES ('862', '小米', '40');
INSERT INTO `goods_word` VALUES ('863', '红', '40');
INSERT INTO `goods_word` VALUES ('864', '米', '40');
INSERT INTO `goods_word` VALUES ('865', '移动', '40');
INSERT INTO `goods_word` VALUES ('866', '联通', '40');
INSERT INTO `goods_word` VALUES ('867', '电信', '40');
INSERT INTO `goods_word` VALUES ('868', '老年', '40');
INSERT INTO `goods_word` VALUES ('869', '智能', '40');
INSERT INTO `goods_word` VALUES ('870', '手机', '40');
INSERT INTO `goods_word` VALUES ('871', '双', '40');
INSERT INTO `goods_word` VALUES ('872', '卡', '40');
INSERT INTO `goods_word` VALUES ('873', '双', '40');
INSERT INTO `goods_word` VALUES ('874', '待', '40');
INSERT INTO `goods_word` VALUES ('875', '铂', '40');
INSERT INTO `goods_word` VALUES ('876', '银灰', '40');
INSERT INTO `goods_word` VALUES ('877', '全', '40');
INSERT INTO `goods_word` VALUES ('878', '网通', '40');
INSERT INTO `goods_word` VALUES ('879', '小米', '41');
INSERT INTO `goods_word` VALUES ('880', '万超', '41');
INSERT INTO `goods_word` VALUES ('881', '广角', '41');
INSERT INTO `goods_word` VALUES ('882', '三', '41');
INSERT INTO `goods_word` VALUES ('883', '摄', '41');
INSERT INTO `goods_word` VALUES ('884', '碳', '41');
INSERT INTO `goods_word` VALUES ('885', '纤', '41');
INSERT INTO `goods_word` VALUES ('886', '黑', '41');
INSERT INTO `goods_word` VALUES ('887', '骁', '41');
INSERT INTO `goods_word` VALUES ('888', '龙', '41');
INSERT INTO `goods_word` VALUES ('889', '全', '41');
INSERT INTO `goods_word` VALUES ('890', '网通', '41');
INSERT INTO `goods_word` VALUES ('891', '双', '41');
INSERT INTO `goods_word` VALUES ('892', '卡', '41');
INSERT INTO `goods_word` VALUES ('893', '双', '41');
INSERT INTO `goods_word` VALUES ('894', '待', '41');
INSERT INTO `goods_word` VALUES ('895', '全面', '41');
INSERT INTO `goods_word` VALUES ('896', '屏', '41');
INSERT INTO `goods_word` VALUES ('897', '拍照', '41');
INSERT INTO `goods_word` VALUES ('898', '游戏', '41');
INSERT INTO `goods_word` VALUES ('899', '智能', '41');
INSERT INTO `goods_word` VALUES ('900', '手机', '41');
INSERT INTO `goods_word` VALUES ('901', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('902', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('903', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('904', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('905', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('906', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('907', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('908', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('909', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('910', '长虹', '38');
INSERT INTO `goods_word` VALUES ('911', '华为', '39');
INSERT INTO `goods_word` VALUES ('912', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('913', '青春', '39');
INSERT INTO `goods_word` VALUES ('914', '版', '39');
INSERT INTO `goods_word` VALUES ('915', '手机', '39');
INSERT INTO `goods_word` VALUES ('916', '天价', '39');
INSERT INTO `goods_word` VALUES ('917', '保）', '39');
INSERT INTO `goods_word` VALUES ('918', '渐变', '39');
INSERT INTO `goods_word` VALUES ('919', '蓝', '39');
INSERT INTO `goods_word` VALUES ('920', '全', '39');
INSERT INTO `goods_word` VALUES ('921', '网通', '39');
INSERT INTO `goods_word` VALUES ('922', '小米', '40');
INSERT INTO `goods_word` VALUES ('923', '红', '40');
INSERT INTO `goods_word` VALUES ('924', '米', '40');
INSERT INTO `goods_word` VALUES ('925', '移动', '40');
INSERT INTO `goods_word` VALUES ('926', '联通', '40');
INSERT INTO `goods_word` VALUES ('927', '电信', '40');
INSERT INTO `goods_word` VALUES ('928', '老年', '40');
INSERT INTO `goods_word` VALUES ('929', '智能', '40');
INSERT INTO `goods_word` VALUES ('930', '手机', '40');
INSERT INTO `goods_word` VALUES ('931', '双', '40');
INSERT INTO `goods_word` VALUES ('932', '卡', '40');
INSERT INTO `goods_word` VALUES ('933', '双', '40');
INSERT INTO `goods_word` VALUES ('934', '待', '40');
INSERT INTO `goods_word` VALUES ('935', '铂', '40');
INSERT INTO `goods_word` VALUES ('936', '银灰', '40');
INSERT INTO `goods_word` VALUES ('937', '全', '40');
INSERT INTO `goods_word` VALUES ('938', '网通', '40');
INSERT INTO `goods_word` VALUES ('939', '小米', '41');
INSERT INTO `goods_word` VALUES ('940', '万超', '41');
INSERT INTO `goods_word` VALUES ('941', '广角', '41');
INSERT INTO `goods_word` VALUES ('942', '三', '41');
INSERT INTO `goods_word` VALUES ('943', '摄', '41');
INSERT INTO `goods_word` VALUES ('944', '碳', '41');
INSERT INTO `goods_word` VALUES ('945', '纤', '41');
INSERT INTO `goods_word` VALUES ('946', '黑', '41');
INSERT INTO `goods_word` VALUES ('947', '骁', '41');
INSERT INTO `goods_word` VALUES ('948', '龙', '41');
INSERT INTO `goods_word` VALUES ('949', '全', '41');
INSERT INTO `goods_word` VALUES ('950', '网通', '41');
INSERT INTO `goods_word` VALUES ('951', '双', '41');
INSERT INTO `goods_word` VALUES ('952', '卡', '41');
INSERT INTO `goods_word` VALUES ('953', '双', '41');
INSERT INTO `goods_word` VALUES ('954', '待', '41');
INSERT INTO `goods_word` VALUES ('955', '全面', '41');
INSERT INTO `goods_word` VALUES ('956', '屏', '41');
INSERT INTO `goods_word` VALUES ('957', '拍照', '41');
INSERT INTO `goods_word` VALUES ('958', '游戏', '41');
INSERT INTO `goods_word` VALUES ('959', '智能', '41');
INSERT INTO `goods_word` VALUES ('960', '手机', '41');
INSERT INTO `goods_word` VALUES ('961', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('962', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('963', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('964', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('965', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('966', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('967', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('968', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('969', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('970', '长虹', '38');
INSERT INTO `goods_word` VALUES ('971', '华为', '39');
INSERT INTO `goods_word` VALUES ('972', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('973', '青春', '39');
INSERT INTO `goods_word` VALUES ('974', '版', '39');
INSERT INTO `goods_word` VALUES ('975', '手机', '39');
INSERT INTO `goods_word` VALUES ('976', '天价', '39');
INSERT INTO `goods_word` VALUES ('977', '保）', '39');
INSERT INTO `goods_word` VALUES ('978', '渐变', '39');
INSERT INTO `goods_word` VALUES ('979', '蓝', '39');
INSERT INTO `goods_word` VALUES ('980', '全', '39');
INSERT INTO `goods_word` VALUES ('981', '网通', '39');
INSERT INTO `goods_word` VALUES ('982', '小米', '40');
INSERT INTO `goods_word` VALUES ('983', '红', '40');
INSERT INTO `goods_word` VALUES ('984', '米', '40');
INSERT INTO `goods_word` VALUES ('985', '移动', '40');
INSERT INTO `goods_word` VALUES ('986', '联通', '40');
INSERT INTO `goods_word` VALUES ('987', '电信', '40');
INSERT INTO `goods_word` VALUES ('988', '老年', '40');
INSERT INTO `goods_word` VALUES ('989', '智能', '40');
INSERT INTO `goods_word` VALUES ('990', '手机', '40');
INSERT INTO `goods_word` VALUES ('991', '双', '40');
INSERT INTO `goods_word` VALUES ('992', '卡', '40');
INSERT INTO `goods_word` VALUES ('993', '双', '40');
INSERT INTO `goods_word` VALUES ('994', '待', '40');
INSERT INTO `goods_word` VALUES ('995', '铂', '40');
INSERT INTO `goods_word` VALUES ('996', '银灰', '40');
INSERT INTO `goods_word` VALUES ('997', '全', '40');
INSERT INTO `goods_word` VALUES ('998', '网通', '40');
INSERT INTO `goods_word` VALUES ('999', '小米', '41');
INSERT INTO `goods_word` VALUES ('1000', '万超', '41');
INSERT INTO `goods_word` VALUES ('1001', '广角', '41');
INSERT INTO `goods_word` VALUES ('1002', '三', '41');
INSERT INTO `goods_word` VALUES ('1003', '摄', '41');
INSERT INTO `goods_word` VALUES ('1004', '碳', '41');
INSERT INTO `goods_word` VALUES ('1005', '纤', '41');
INSERT INTO `goods_word` VALUES ('1006', '黑', '41');
INSERT INTO `goods_word` VALUES ('1007', '骁', '41');
INSERT INTO `goods_word` VALUES ('1008', '龙', '41');
INSERT INTO `goods_word` VALUES ('1009', '全', '41');
INSERT INTO `goods_word` VALUES ('1010', '网通', '41');
INSERT INTO `goods_word` VALUES ('1011', '双', '41');
INSERT INTO `goods_word` VALUES ('1012', '卡', '41');
INSERT INTO `goods_word` VALUES ('1013', '双', '41');
INSERT INTO `goods_word` VALUES ('1014', '待', '41');
INSERT INTO `goods_word` VALUES ('1015', '全面', '41');
INSERT INTO `goods_word` VALUES ('1016', '屏', '41');
INSERT INTO `goods_word` VALUES ('1017', '拍照', '41');
INSERT INTO `goods_word` VALUES ('1018', '游戏', '41');
INSERT INTO `goods_word` VALUES ('1019', '智能', '41');
INSERT INTO `goods_word` VALUES ('1020', '手机', '41');
INSERT INTO `goods_word` VALUES ('1021', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('1022', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('1023', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('1024', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('1025', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('1026', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('1027', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('1028', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('1029', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('1030', '长虹', '38');
INSERT INTO `goods_word` VALUES ('1031', '华为', '39');
INSERT INTO `goods_word` VALUES ('1032', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('1033', '青春', '39');
INSERT INTO `goods_word` VALUES ('1034', '版', '39');
INSERT INTO `goods_word` VALUES ('1035', '手机', '39');
INSERT INTO `goods_word` VALUES ('1036', '天价', '39');
INSERT INTO `goods_word` VALUES ('1037', '保）', '39');
INSERT INTO `goods_word` VALUES ('1038', '渐变', '39');
INSERT INTO `goods_word` VALUES ('1039', '蓝', '39');
INSERT INTO `goods_word` VALUES ('1040', '全', '39');
INSERT INTO `goods_word` VALUES ('1041', '网通', '39');
INSERT INTO `goods_word` VALUES ('1042', '小米', '40');
INSERT INTO `goods_word` VALUES ('1043', '红', '40');
INSERT INTO `goods_word` VALUES ('1044', '米', '40');
INSERT INTO `goods_word` VALUES ('1045', '移动', '40');
INSERT INTO `goods_word` VALUES ('1046', '联通', '40');
INSERT INTO `goods_word` VALUES ('1047', '电信', '40');
INSERT INTO `goods_word` VALUES ('1048', '老年', '40');
INSERT INTO `goods_word` VALUES ('1049', '智能', '40');
INSERT INTO `goods_word` VALUES ('1050', '手机', '40');
INSERT INTO `goods_word` VALUES ('1051', '双', '40');
INSERT INTO `goods_word` VALUES ('1052', '卡', '40');
INSERT INTO `goods_word` VALUES ('1053', '双', '40');
INSERT INTO `goods_word` VALUES ('1054', '待', '40');
INSERT INTO `goods_word` VALUES ('1055', '铂', '40');
INSERT INTO `goods_word` VALUES ('1056', '银灰', '40');
INSERT INTO `goods_word` VALUES ('1057', '全', '40');
INSERT INTO `goods_word` VALUES ('1058', '网通', '40');
INSERT INTO `goods_word` VALUES ('1059', '小米', '41');
INSERT INTO `goods_word` VALUES ('1060', '万超', '41');
INSERT INTO `goods_word` VALUES ('1061', '广角', '41');
INSERT INTO `goods_word` VALUES ('1062', '三', '41');
INSERT INTO `goods_word` VALUES ('1063', '摄', '41');
INSERT INTO `goods_word` VALUES ('1064', '碳', '41');
INSERT INTO `goods_word` VALUES ('1065', '纤', '41');
INSERT INTO `goods_word` VALUES ('1066', '黑', '41');
INSERT INTO `goods_word` VALUES ('1067', '骁', '41');
INSERT INTO `goods_word` VALUES ('1068', '龙', '41');
INSERT INTO `goods_word` VALUES ('1069', '全', '41');
INSERT INTO `goods_word` VALUES ('1070', '网通', '41');
INSERT INTO `goods_word` VALUES ('1071', '双', '41');
INSERT INTO `goods_word` VALUES ('1072', '卡', '41');
INSERT INTO `goods_word` VALUES ('1073', '双', '41');
INSERT INTO `goods_word` VALUES ('1074', '待', '41');
INSERT INTO `goods_word` VALUES ('1075', '全面', '41');
INSERT INTO `goods_word` VALUES ('1076', '屏', '41');
INSERT INTO `goods_word` VALUES ('1077', '拍照', '41');
INSERT INTO `goods_word` VALUES ('1078', '游戏', '41');
INSERT INTO `goods_word` VALUES ('1079', '智能', '41');
INSERT INTO `goods_word` VALUES ('1080', '手机', '41');
INSERT INTO `goods_word` VALUES ('1081', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('1082', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('1083', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('1084', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('1085', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('1086', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('1087', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('1088', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('1089', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('1090', '长虹', '38');
INSERT INTO `goods_word` VALUES ('1091', '华为', '39');
INSERT INTO `goods_word` VALUES ('1092', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('1093', '青春', '39');
INSERT INTO `goods_word` VALUES ('1094', '版', '39');
INSERT INTO `goods_word` VALUES ('1095', '手机', '39');
INSERT INTO `goods_word` VALUES ('1096', '天价', '39');
INSERT INTO `goods_word` VALUES ('1097', '保）', '39');
INSERT INTO `goods_word` VALUES ('1098', '渐变', '39');
INSERT INTO `goods_word` VALUES ('1099', '蓝', '39');
INSERT INTO `goods_word` VALUES ('1100', '全', '39');
INSERT INTO `goods_word` VALUES ('1101', '网通', '39');
INSERT INTO `goods_word` VALUES ('1102', '小米', '40');
INSERT INTO `goods_word` VALUES ('1103', '红', '40');
INSERT INTO `goods_word` VALUES ('1104', '米', '40');
INSERT INTO `goods_word` VALUES ('1105', '移动', '40');
INSERT INTO `goods_word` VALUES ('1106', '联通', '40');
INSERT INTO `goods_word` VALUES ('1107', '电信', '40');
INSERT INTO `goods_word` VALUES ('1108', '老年', '40');
INSERT INTO `goods_word` VALUES ('1109', '智能', '40');
INSERT INTO `goods_word` VALUES ('1110', '手机', '40');
INSERT INTO `goods_word` VALUES ('1111', '双', '40');
INSERT INTO `goods_word` VALUES ('1112', '卡', '40');
INSERT INTO `goods_word` VALUES ('1113', '双', '40');
INSERT INTO `goods_word` VALUES ('1114', '待', '40');
INSERT INTO `goods_word` VALUES ('1115', '铂', '40');
INSERT INTO `goods_word` VALUES ('1116', '银灰', '40');
INSERT INTO `goods_word` VALUES ('1117', '全', '40');
INSERT INTO `goods_word` VALUES ('1118', '网通', '40');
INSERT INTO `goods_word` VALUES ('1119', '小米', '41');
INSERT INTO `goods_word` VALUES ('1120', '万超', '41');
INSERT INTO `goods_word` VALUES ('1121', '广角', '41');
INSERT INTO `goods_word` VALUES ('1122', '三', '41');
INSERT INTO `goods_word` VALUES ('1123', '摄', '41');
INSERT INTO `goods_word` VALUES ('1124', '碳', '41');
INSERT INTO `goods_word` VALUES ('1125', '纤', '41');
INSERT INTO `goods_word` VALUES ('1126', '黑', '41');
INSERT INTO `goods_word` VALUES ('1127', '骁', '41');
INSERT INTO `goods_word` VALUES ('1128', '龙', '41');
INSERT INTO `goods_word` VALUES ('1129', '全', '41');
INSERT INTO `goods_word` VALUES ('1130', '网通', '41');
INSERT INTO `goods_word` VALUES ('1131', '双', '41');
INSERT INTO `goods_word` VALUES ('1132', '卡', '41');
INSERT INTO `goods_word` VALUES ('1133', '双', '41');
INSERT INTO `goods_word` VALUES ('1134', '待', '41');
INSERT INTO `goods_word` VALUES ('1135', '全面', '41');
INSERT INTO `goods_word` VALUES ('1136', '屏', '41');
INSERT INTO `goods_word` VALUES ('1137', '拍照', '41');
INSERT INTO `goods_word` VALUES ('1138', '游戏', '41');
INSERT INTO `goods_word` VALUES ('1139', '智能', '41');
INSERT INTO `goods_word` VALUES ('1140', '手机', '41');
INSERT INTO `goods_word` VALUES ('1141', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('1142', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('1143', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('1144', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('1145', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('1146', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('1147', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('1148', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('1149', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('1150', '长虹', '38');
INSERT INTO `goods_word` VALUES ('1151', '华为', '39');
INSERT INTO `goods_word` VALUES ('1152', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('1153', '青春', '39');
INSERT INTO `goods_word` VALUES ('1154', '版', '39');
INSERT INTO `goods_word` VALUES ('1155', '手机', '39');
INSERT INTO `goods_word` VALUES ('1156', '天价', '39');
INSERT INTO `goods_word` VALUES ('1157', '保）', '39');
INSERT INTO `goods_word` VALUES ('1158', '渐变', '39');
INSERT INTO `goods_word` VALUES ('1159', '蓝', '39');
INSERT INTO `goods_word` VALUES ('1160', '全', '39');
INSERT INTO `goods_word` VALUES ('1161', '网通', '39');
INSERT INTO `goods_word` VALUES ('1162', '小米', '40');
INSERT INTO `goods_word` VALUES ('1163', '红', '40');
INSERT INTO `goods_word` VALUES ('1164', '米', '40');
INSERT INTO `goods_word` VALUES ('1165', '移动', '40');
INSERT INTO `goods_word` VALUES ('1166', '联通', '40');
INSERT INTO `goods_word` VALUES ('1167', '电信', '40');
INSERT INTO `goods_word` VALUES ('1168', '老年', '40');
INSERT INTO `goods_word` VALUES ('1169', '智能', '40');
INSERT INTO `goods_word` VALUES ('1170', '手机', '40');
INSERT INTO `goods_word` VALUES ('1171', '双', '40');
INSERT INTO `goods_word` VALUES ('1172', '卡', '40');
INSERT INTO `goods_word` VALUES ('1173', '双', '40');
INSERT INTO `goods_word` VALUES ('1174', '待', '40');
INSERT INTO `goods_word` VALUES ('1175', '铂', '40');
INSERT INTO `goods_word` VALUES ('1176', '银灰', '40');
INSERT INTO `goods_word` VALUES ('1177', '全', '40');
INSERT INTO `goods_word` VALUES ('1178', '网通', '40');
INSERT INTO `goods_word` VALUES ('1179', '小米', '41');
INSERT INTO `goods_word` VALUES ('1180', '万超', '41');
INSERT INTO `goods_word` VALUES ('1181', '广角', '41');
INSERT INTO `goods_word` VALUES ('1182', '三', '41');
INSERT INTO `goods_word` VALUES ('1183', '摄', '41');
INSERT INTO `goods_word` VALUES ('1184', '碳', '41');
INSERT INTO `goods_word` VALUES ('1185', '纤', '41');
INSERT INTO `goods_word` VALUES ('1186', '黑', '41');
INSERT INTO `goods_word` VALUES ('1187', '骁', '41');
INSERT INTO `goods_word` VALUES ('1188', '龙', '41');
INSERT INTO `goods_word` VALUES ('1189', '全', '41');
INSERT INTO `goods_word` VALUES ('1190', '网通', '41');
INSERT INTO `goods_word` VALUES ('1191', '双', '41');
INSERT INTO `goods_word` VALUES ('1192', '卡', '41');
INSERT INTO `goods_word` VALUES ('1193', '双', '41');
INSERT INTO `goods_word` VALUES ('1194', '待', '41');
INSERT INTO `goods_word` VALUES ('1195', '全面', '41');
INSERT INTO `goods_word` VALUES ('1196', '屏', '41');
INSERT INTO `goods_word` VALUES ('1197', '拍照', '41');
INSERT INTO `goods_word` VALUES ('1198', '游戏', '41');
INSERT INTO `goods_word` VALUES ('1199', '智能', '41');
INSERT INTO `goods_word` VALUES ('1200', '手机', '41');
INSERT INTO `goods_word` VALUES ('1201', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('1202', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('1203', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('1204', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('1205', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('1206', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('1207', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('1208', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('1209', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('1210', '长虹', '38');
INSERT INTO `goods_word` VALUES ('1211', '华为', '39');
INSERT INTO `goods_word` VALUES ('1212', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('1213', '青春', '39');
INSERT INTO `goods_word` VALUES ('1214', '版', '39');
INSERT INTO `goods_word` VALUES ('1215', '手机', '39');
INSERT INTO `goods_word` VALUES ('1216', '天价', '39');
INSERT INTO `goods_word` VALUES ('1217', '保）', '39');
INSERT INTO `goods_word` VALUES ('1218', '渐变', '39');
INSERT INTO `goods_word` VALUES ('1219', '蓝', '39');
INSERT INTO `goods_word` VALUES ('1220', '全', '39');
INSERT INTO `goods_word` VALUES ('1221', '网通', '39');
INSERT INTO `goods_word` VALUES ('1222', '小米', '40');
INSERT INTO `goods_word` VALUES ('1223', '红', '40');
INSERT INTO `goods_word` VALUES ('1224', '米', '40');
INSERT INTO `goods_word` VALUES ('1225', '移动', '40');
INSERT INTO `goods_word` VALUES ('1226', '联通', '40');
INSERT INTO `goods_word` VALUES ('1227', '电信', '40');
INSERT INTO `goods_word` VALUES ('1228', '老年', '40');
INSERT INTO `goods_word` VALUES ('1229', '智能', '40');
INSERT INTO `goods_word` VALUES ('1230', '手机', '40');
INSERT INTO `goods_word` VALUES ('1231', '双', '40');
INSERT INTO `goods_word` VALUES ('1232', '卡', '40');
INSERT INTO `goods_word` VALUES ('1233', '双', '40');
INSERT INTO `goods_word` VALUES ('1234', '待', '40');
INSERT INTO `goods_word` VALUES ('1235', '铂', '40');
INSERT INTO `goods_word` VALUES ('1236', '银灰', '40');
INSERT INTO `goods_word` VALUES ('1237', '全', '40');
INSERT INTO `goods_word` VALUES ('1238', '网通', '40');
INSERT INTO `goods_word` VALUES ('1239', '小米', '41');
INSERT INTO `goods_word` VALUES ('1240', '万超', '41');
INSERT INTO `goods_word` VALUES ('1241', '广角', '41');
INSERT INTO `goods_word` VALUES ('1242', '三', '41');
INSERT INTO `goods_word` VALUES ('1243', '摄', '41');
INSERT INTO `goods_word` VALUES ('1244', '碳', '41');
INSERT INTO `goods_word` VALUES ('1245', '纤', '41');
INSERT INTO `goods_word` VALUES ('1246', '黑', '41');
INSERT INTO `goods_word` VALUES ('1247', '骁', '41');
INSERT INTO `goods_word` VALUES ('1248', '龙', '41');
INSERT INTO `goods_word` VALUES ('1249', '全', '41');
INSERT INTO `goods_word` VALUES ('1250', '网通', '41');
INSERT INTO `goods_word` VALUES ('1251', '双', '41');
INSERT INTO `goods_word` VALUES ('1252', '卡', '41');
INSERT INTO `goods_word` VALUES ('1253', '双', '41');
INSERT INTO `goods_word` VALUES ('1254', '待', '41');
INSERT INTO `goods_word` VALUES ('1255', '全面', '41');
INSERT INTO `goods_word` VALUES ('1256', '屏', '41');
INSERT INTO `goods_word` VALUES ('1257', '拍照', '41');
INSERT INTO `goods_word` VALUES ('1258', '游戏', '41');
INSERT INTO `goods_word` VALUES ('1259', '智能', '41');
INSERT INTO `goods_word` VALUES ('1260', '手机', '41');
INSERT INTO `goods_word` VALUES ('1261', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('1262', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('1263', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('1264', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('1265', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('1266', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('1267', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('1268', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('1269', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('1270', '长虹', '38');
INSERT INTO `goods_word` VALUES ('1271', '华为', '39');
INSERT INTO `goods_word` VALUES ('1272', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('1273', '青春', '39');
INSERT INTO `goods_word` VALUES ('1274', '版', '39');
INSERT INTO `goods_word` VALUES ('1275', '手机', '39');
INSERT INTO `goods_word` VALUES ('1276', '天价', '39');
INSERT INTO `goods_word` VALUES ('1277', '保）', '39');
INSERT INTO `goods_word` VALUES ('1278', '渐变', '39');
INSERT INTO `goods_word` VALUES ('1279', '蓝', '39');
INSERT INTO `goods_word` VALUES ('1280', '全', '39');
INSERT INTO `goods_word` VALUES ('1281', '网通', '39');
INSERT INTO `goods_word` VALUES ('1282', '小米', '40');
INSERT INTO `goods_word` VALUES ('1283', '红', '40');
INSERT INTO `goods_word` VALUES ('1284', '米', '40');
INSERT INTO `goods_word` VALUES ('1285', '移动', '40');
INSERT INTO `goods_word` VALUES ('1286', '联通', '40');
INSERT INTO `goods_word` VALUES ('1287', '电信', '40');
INSERT INTO `goods_word` VALUES ('1288', '老年', '40');
INSERT INTO `goods_word` VALUES ('1289', '智能', '40');
INSERT INTO `goods_word` VALUES ('1290', '手机', '40');
INSERT INTO `goods_word` VALUES ('1291', '双', '40');
INSERT INTO `goods_word` VALUES ('1292', '卡', '40');
INSERT INTO `goods_word` VALUES ('1293', '双', '40');
INSERT INTO `goods_word` VALUES ('1294', '待', '40');
INSERT INTO `goods_word` VALUES ('1295', '铂', '40');
INSERT INTO `goods_word` VALUES ('1296', '银灰', '40');
INSERT INTO `goods_word` VALUES ('1297', '全', '40');
INSERT INTO `goods_word` VALUES ('1298', '网通', '40');
INSERT INTO `goods_word` VALUES ('1299', '小米', '41');
INSERT INTO `goods_word` VALUES ('1300', '万超', '41');
INSERT INTO `goods_word` VALUES ('1301', '广角', '41');
INSERT INTO `goods_word` VALUES ('1302', '三', '41');
INSERT INTO `goods_word` VALUES ('1303', '摄', '41');
INSERT INTO `goods_word` VALUES ('1304', '碳', '41');
INSERT INTO `goods_word` VALUES ('1305', '纤', '41');
INSERT INTO `goods_word` VALUES ('1306', '黑', '41');
INSERT INTO `goods_word` VALUES ('1307', '骁', '41');
INSERT INTO `goods_word` VALUES ('1308', '龙', '41');
INSERT INTO `goods_word` VALUES ('1309', '全', '41');
INSERT INTO `goods_word` VALUES ('1310', '网通', '41');
INSERT INTO `goods_word` VALUES ('1311', '双', '41');
INSERT INTO `goods_word` VALUES ('1312', '卡', '41');
INSERT INTO `goods_word` VALUES ('1313', '双', '41');
INSERT INTO `goods_word` VALUES ('1314', '待', '41');
INSERT INTO `goods_word` VALUES ('1315', '全面', '41');
INSERT INTO `goods_word` VALUES ('1316', '屏', '41');
INSERT INTO `goods_word` VALUES ('1317', '拍照', '41');
INSERT INTO `goods_word` VALUES ('1318', '游戏', '41');
INSERT INTO `goods_word` VALUES ('1319', '智能', '41');
INSERT INTO `goods_word` VALUES ('1320', '手机', '41');
INSERT INTO `goods_word` VALUES ('1321', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('1322', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('1323', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('1324', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('1325', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('1326', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('1327', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('1328', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('1329', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('1330', '长虹', '38');
INSERT INTO `goods_word` VALUES ('1331', '华为', '39');
INSERT INTO `goods_word` VALUES ('1332', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('1333', '青春', '39');
INSERT INTO `goods_word` VALUES ('1334', '版', '39');
INSERT INTO `goods_word` VALUES ('1335', '手机', '39');
INSERT INTO `goods_word` VALUES ('1336', '天价', '39');
INSERT INTO `goods_word` VALUES ('1337', '保）', '39');
INSERT INTO `goods_word` VALUES ('1338', '渐变', '39');
INSERT INTO `goods_word` VALUES ('1339', '蓝', '39');
INSERT INTO `goods_word` VALUES ('1340', '全', '39');
INSERT INTO `goods_word` VALUES ('1341', '网通', '39');
INSERT INTO `goods_word` VALUES ('1342', '小米', '40');
INSERT INTO `goods_word` VALUES ('1343', '红', '40');
INSERT INTO `goods_word` VALUES ('1344', '米', '40');
INSERT INTO `goods_word` VALUES ('1345', '移动', '40');
INSERT INTO `goods_word` VALUES ('1346', '联通', '40');
INSERT INTO `goods_word` VALUES ('1347', '电信', '40');
INSERT INTO `goods_word` VALUES ('1348', '老年', '40');
INSERT INTO `goods_word` VALUES ('1349', '智能', '40');
INSERT INTO `goods_word` VALUES ('1350', '手机', '40');
INSERT INTO `goods_word` VALUES ('1351', '双', '40');
INSERT INTO `goods_word` VALUES ('1352', '卡', '40');
INSERT INTO `goods_word` VALUES ('1353', '双', '40');
INSERT INTO `goods_word` VALUES ('1354', '待', '40');
INSERT INTO `goods_word` VALUES ('1355', '铂', '40');
INSERT INTO `goods_word` VALUES ('1356', '银灰', '40');
INSERT INTO `goods_word` VALUES ('1357', '全', '40');
INSERT INTO `goods_word` VALUES ('1358', '网通', '40');
INSERT INTO `goods_word` VALUES ('1359', '小米', '41');
INSERT INTO `goods_word` VALUES ('1360', '万超', '41');
INSERT INTO `goods_word` VALUES ('1361', '广角', '41');
INSERT INTO `goods_word` VALUES ('1362', '三', '41');
INSERT INTO `goods_word` VALUES ('1363', '摄', '41');
INSERT INTO `goods_word` VALUES ('1364', '碳', '41');
INSERT INTO `goods_word` VALUES ('1365', '纤', '41');
INSERT INTO `goods_word` VALUES ('1366', '黑', '41');
INSERT INTO `goods_word` VALUES ('1367', '骁', '41');
INSERT INTO `goods_word` VALUES ('1368', '龙', '41');
INSERT INTO `goods_word` VALUES ('1369', '全', '41');
INSERT INTO `goods_word` VALUES ('1370', '网通', '41');
INSERT INTO `goods_word` VALUES ('1371', '双', '41');
INSERT INTO `goods_word` VALUES ('1372', '卡', '41');
INSERT INTO `goods_word` VALUES ('1373', '双', '41');
INSERT INTO `goods_word` VALUES ('1374', '待', '41');
INSERT INTO `goods_word` VALUES ('1375', '全面', '41');
INSERT INTO `goods_word` VALUES ('1376', '屏', '41');
INSERT INTO `goods_word` VALUES ('1377', '拍照', '41');
INSERT INTO `goods_word` VALUES ('1378', '游戏', '41');
INSERT INTO `goods_word` VALUES ('1379', '智能', '41');
INSERT INTO `goods_word` VALUES ('1380', '手机', '41');
INSERT INTO `goods_word` VALUES ('1381', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('1382', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('1383', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('1384', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('1385', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('1386', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('1387', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('1388', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('1389', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('1390', '长虹', '38');
INSERT INTO `goods_word` VALUES ('1391', '华为', '39');
INSERT INTO `goods_word` VALUES ('1392', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('1393', '青春', '39');
INSERT INTO `goods_word` VALUES ('1394', '版', '39');
INSERT INTO `goods_word` VALUES ('1395', '手机', '39');
INSERT INTO `goods_word` VALUES ('1396', '天价', '39');
INSERT INTO `goods_word` VALUES ('1397', '保）', '39');
INSERT INTO `goods_word` VALUES ('1398', '渐变', '39');
INSERT INTO `goods_word` VALUES ('1399', '蓝', '39');
INSERT INTO `goods_word` VALUES ('1400', '全', '39');
INSERT INTO `goods_word` VALUES ('1401', '网通', '39');
INSERT INTO `goods_word` VALUES ('1402', '小米', '40');
INSERT INTO `goods_word` VALUES ('1403', '红', '40');
INSERT INTO `goods_word` VALUES ('1404', '米', '40');
INSERT INTO `goods_word` VALUES ('1405', '移动', '40');
INSERT INTO `goods_word` VALUES ('1406', '联通', '40');
INSERT INTO `goods_word` VALUES ('1407', '电信', '40');
INSERT INTO `goods_word` VALUES ('1408', '老年', '40');
INSERT INTO `goods_word` VALUES ('1409', '智能', '40');
INSERT INTO `goods_word` VALUES ('1410', '手机', '40');
INSERT INTO `goods_word` VALUES ('1411', '双', '40');
INSERT INTO `goods_word` VALUES ('1412', '卡', '40');
INSERT INTO `goods_word` VALUES ('1413', '双', '40');
INSERT INTO `goods_word` VALUES ('1414', '待', '40');
INSERT INTO `goods_word` VALUES ('1415', '铂', '40');
INSERT INTO `goods_word` VALUES ('1416', '银灰', '40');
INSERT INTO `goods_word` VALUES ('1417', '全', '40');
INSERT INTO `goods_word` VALUES ('1418', '网通', '40');
INSERT INTO `goods_word` VALUES ('1419', '小米', '41');
INSERT INTO `goods_word` VALUES ('1420', '万超', '41');
INSERT INTO `goods_word` VALUES ('1421', '广角', '41');
INSERT INTO `goods_word` VALUES ('1422', '三', '41');
INSERT INTO `goods_word` VALUES ('1423', '摄', '41');
INSERT INTO `goods_word` VALUES ('1424', '碳', '41');
INSERT INTO `goods_word` VALUES ('1425', '纤', '41');
INSERT INTO `goods_word` VALUES ('1426', '黑', '41');
INSERT INTO `goods_word` VALUES ('1427', '骁', '41');
INSERT INTO `goods_word` VALUES ('1428', '龙', '41');
INSERT INTO `goods_word` VALUES ('1429', '全', '41');
INSERT INTO `goods_word` VALUES ('1430', '网通', '41');
INSERT INTO `goods_word` VALUES ('1431', '双', '41');
INSERT INTO `goods_word` VALUES ('1432', '卡', '41');
INSERT INTO `goods_word` VALUES ('1433', '双', '41');
INSERT INTO `goods_word` VALUES ('1434', '待', '41');
INSERT INTO `goods_word` VALUES ('1435', '全面', '41');
INSERT INTO `goods_word` VALUES ('1436', '屏', '41');
INSERT INTO `goods_word` VALUES ('1437', '拍照', '41');
INSERT INTO `goods_word` VALUES ('1438', '游戏', '41');
INSERT INTO `goods_word` VALUES ('1439', '智能', '41');
INSERT INTO `goods_word` VALUES ('1440', '手机', '41');
INSERT INTO `goods_word` VALUES ('1441', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('1442', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('1443', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('1444', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('1445', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('1446', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('1447', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('1448', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('1449', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('1450', '长虹', '38');
INSERT INTO `goods_word` VALUES ('1451', '华为', '39');
INSERT INTO `goods_word` VALUES ('1452', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('1453', '青春', '39');
INSERT INTO `goods_word` VALUES ('1454', '版', '39');
INSERT INTO `goods_word` VALUES ('1455', '手机', '39');
INSERT INTO `goods_word` VALUES ('1456', '天价', '39');
INSERT INTO `goods_word` VALUES ('1457', '保）', '39');
INSERT INTO `goods_word` VALUES ('1458', '渐变', '39');
INSERT INTO `goods_word` VALUES ('1459', '蓝', '39');
INSERT INTO `goods_word` VALUES ('1460', '全', '39');
INSERT INTO `goods_word` VALUES ('1461', '网通', '39');
INSERT INTO `goods_word` VALUES ('1462', '小米', '40');
INSERT INTO `goods_word` VALUES ('1463', '红', '40');
INSERT INTO `goods_word` VALUES ('1464', '米', '40');
INSERT INTO `goods_word` VALUES ('1465', '移动', '40');
INSERT INTO `goods_word` VALUES ('1466', '联通', '40');
INSERT INTO `goods_word` VALUES ('1467', '电信', '40');
INSERT INTO `goods_word` VALUES ('1468', '老年', '40');
INSERT INTO `goods_word` VALUES ('1469', '智能', '40');
INSERT INTO `goods_word` VALUES ('1470', '手机', '40');
INSERT INTO `goods_word` VALUES ('1471', '双', '40');
INSERT INTO `goods_word` VALUES ('1472', '卡', '40');
INSERT INTO `goods_word` VALUES ('1473', '双', '40');
INSERT INTO `goods_word` VALUES ('1474', '待', '40');
INSERT INTO `goods_word` VALUES ('1475', '铂', '40');
INSERT INTO `goods_word` VALUES ('1476', '银灰', '40');
INSERT INTO `goods_word` VALUES ('1477', '全', '40');
INSERT INTO `goods_word` VALUES ('1478', '网通', '40');
INSERT INTO `goods_word` VALUES ('1479', '小米', '41');
INSERT INTO `goods_word` VALUES ('1480', '万超', '41');
INSERT INTO `goods_word` VALUES ('1481', '广角', '41');
INSERT INTO `goods_word` VALUES ('1482', '三', '41');
INSERT INTO `goods_word` VALUES ('1483', '摄', '41');
INSERT INTO `goods_word` VALUES ('1484', '碳', '41');
INSERT INTO `goods_word` VALUES ('1485', '纤', '41');
INSERT INTO `goods_word` VALUES ('1486', '黑', '41');
INSERT INTO `goods_word` VALUES ('1487', '骁', '41');
INSERT INTO `goods_word` VALUES ('1488', '龙', '41');
INSERT INTO `goods_word` VALUES ('1489', '全', '41');
INSERT INTO `goods_word` VALUES ('1490', '网通', '41');
INSERT INTO `goods_word` VALUES ('1491', '双', '41');
INSERT INTO `goods_word` VALUES ('1492', '卡', '41');
INSERT INTO `goods_word` VALUES ('1493', '双', '41');
INSERT INTO `goods_word` VALUES ('1494', '待', '41');
INSERT INTO `goods_word` VALUES ('1495', '全面', '41');
INSERT INTO `goods_word` VALUES ('1496', '屏', '41');
INSERT INTO `goods_word` VALUES ('1497', '拍照', '41');
INSERT INTO `goods_word` VALUES ('1498', '游戏', '41');
INSERT INTO `goods_word` VALUES ('1499', '智能', '41');
INSERT INTO `goods_word` VALUES ('1500', '手机', '41');
INSERT INTO `goods_word` VALUES ('1501', '蔬菜', '19');
INSERT INTO `goods_word` VALUES ('1502', '蔬菜', '26');
INSERT INTO `goods_word` VALUES ('1503', '蔬菜', '27');
INSERT INTO `goods_word` VALUES ('1504', '蔬菜', '32');
INSERT INTO `goods_word` VALUES ('1505', '蔬菜', '33');
INSERT INTO `goods_word` VALUES ('1506', '蔬菜', '34');
INSERT INTO `goods_word` VALUES ('1507', '蔬菜', '35');
INSERT INTO `goods_word` VALUES ('1508', '蔬菜', '36');
INSERT INTO `goods_word` VALUES ('1509', '蔬菜', '37');
INSERT INTO `goods_word` VALUES ('1510', '长虹', '38');
INSERT INTO `goods_word` VALUES ('1511', '华为', '39');
INSERT INTO `goods_word` VALUES ('1512', '荣耀', '39');
INSERT INTO `goods_word` VALUES ('1513', '青春', '39');
INSERT INTO `goods_word` VALUES ('1514', '版', '39');
INSERT INTO `goods_word` VALUES ('1515', '手机', '39');
INSERT INTO `goods_word` VALUES ('1516', '天价', '39');
INSERT INTO `goods_word` VALUES ('1517', '保）', '39');
INSERT INTO `goods_word` VALUES ('1518', '渐变', '39');
INSERT INTO `goods_word` VALUES ('1519', '蓝', '39');
INSERT INTO `goods_word` VALUES ('1520', '全', '39');
INSERT INTO `goods_word` VALUES ('1521', '网通', '39');
INSERT INTO `goods_word` VALUES ('1522', '小米', '40');
INSERT INTO `goods_word` VALUES ('1523', '红', '40');
INSERT INTO `goods_word` VALUES ('1524', '米', '40');
INSERT INTO `goods_word` VALUES ('1525', '移动', '40');
INSERT INTO `goods_word` VALUES ('1526', '联通', '40');
INSERT INTO `goods_word` VALUES ('1527', '电信', '40');
INSERT INTO `goods_word` VALUES ('1528', '老年', '40');
INSERT INTO `goods_word` VALUES ('1529', '智能', '40');
INSERT INTO `goods_word` VALUES ('1530', '手机', '40');
INSERT INTO `goods_word` VALUES ('1531', '双', '40');
INSERT INTO `goods_word` VALUES ('1532', '卡', '40');
INSERT INTO `goods_word` VALUES ('1533', '双', '40');
INSERT INTO `goods_word` VALUES ('1534', '待', '40');
INSERT INTO `goods_word` VALUES ('1535', '铂', '40');
INSERT INTO `goods_word` VALUES ('1536', '银灰', '40');
INSERT INTO `goods_word` VALUES ('1537', '全', '40');
INSERT INTO `goods_word` VALUES ('1538', '网通', '40');
INSERT INTO `goods_word` VALUES ('1539', '小米', '41');
INSERT INTO `goods_word` VALUES ('1540', '万超', '41');
INSERT INTO `goods_word` VALUES ('1541', '广角', '41');
INSERT INTO `goods_word` VALUES ('1542', '三', '41');
INSERT INTO `goods_word` VALUES ('1543', '摄', '41');
INSERT INTO `goods_word` VALUES ('1544', '碳', '41');
INSERT INTO `goods_word` VALUES ('1545', '纤', '41');
INSERT INTO `goods_word` VALUES ('1546', '黑', '41');
INSERT INTO `goods_word` VALUES ('1547', '骁', '41');
INSERT INTO `goods_word` VALUES ('1548', '龙', '41');
INSERT INTO `goods_word` VALUES ('1549', '全', '41');
INSERT INTO `goods_word` VALUES ('1550', '网通', '41');
INSERT INTO `goods_word` VALUES ('1551', '双', '41');
INSERT INTO `goods_word` VALUES ('1552', '卡', '41');
INSERT INTO `goods_word` VALUES ('1553', '双', '41');
INSERT INTO `goods_word` VALUES ('1554', '待', '41');
INSERT INTO `goods_word` VALUES ('1555', '全面', '41');
INSERT INTO `goods_word` VALUES ('1556', '屏', '41');
INSERT INTO `goods_word` VALUES ('1557', '拍照', '41');
INSERT INTO `goods_word` VALUES ('1558', '游戏', '41');
INSERT INTO `goods_word` VALUES ('1559', '智能', '41');
INSERT INTO `goods_word` VALUES ('1560', '手机', '41');

-- ----------------------------
-- Table structure for good_collects
-- ----------------------------
DROP TABLE IF EXISTS `good_collects`;
CREATE TABLE `good_collects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL COMMENT '用户id',
  `gid` int(10) NOT NULL COMMENT '商品id',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of good_collects
-- ----------------------------

-- ----------------------------
-- Table structure for good_comments
-- ----------------------------
DROP TABLE IF EXISTS `good_comments`;
CREATE TABLE `good_comments` (
  `coid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL COMMENT '用户名',
  `gid` int(10) NOT NULL,
  `stars` enum('1','2','3','4','5') NOT NULL DEFAULT '5' COMMENT '星级1-5星',
  `comment` text NOT NULL COMMENT '评论',
  `add_comm` text NOT NULL COMMENT '追评',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `stname` varchar(20) NOT NULL COMMENT '规格',
  `uid` int(10) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`coid`),
  UNIQUE KEY `coid` (`coid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of good_comments
-- ----------------------------
INSERT INTO `good_comments` VALUES ('1', 'zhangsan2089', '26', '5', '啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊', '', '2019-06-21 19:42:14', '2019-06-21 19:42:16', '撒sa*阿萨', '290');

-- ----------------------------
-- Table structure for good_stocks
-- ----------------------------
DROP TABLE IF EXISTS `good_stocks`;
CREATE TABLE `good_stocks` (
  `stid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) NOT NULL COMMENT '商品id',
  `size` varchar(10) DEFAULT '' COMMENT '规格',
  `color` varchar(10) DEFAULT '' COMMENT '颜色',
  `stock` int(10) unsigned NOT NULL COMMENT '库存',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`stid`),
  UNIQUE KEY `stid` (`stid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of good_stocks
-- ----------------------------
INSERT INTO `good_stocks` VALUES ('2', '19', '阿萨', '阿萨斯', '2', '2019-06-19 18:56:32', '2019-06-19 18:56:32');
INSERT INTO `good_stocks` VALUES ('3', '26', '撒sa', '阿萨', '74', '2019-06-19 18:57:11', '2019-06-23 22:39:19');
INSERT INTO `good_stocks` VALUES ('4', '27', '敖德萨所多', '大声道as', '6', '2019-06-23 19:15:32', '2019-06-23 22:39:19');
INSERT INTO `good_stocks` VALUES ('7', '38', null, null, '999', '2019-06-20 19:05:01', '2019-06-20 19:05:01');
INSERT INTO `good_stocks` VALUES ('8', '32', null, null, '9999', '2019-06-21 11:59:53', '2019-06-21 11:59:53');
INSERT INTO `good_stocks` VALUES ('9', '19', null, null, '999', '2019-06-23 19:00:17', '2019-06-23 19:00:17');
INSERT INTO `good_stocks` VALUES ('10', '19', 'XXL', 'blue', '975', '2019-06-23 19:00:39', '2019-06-23 22:39:19');
INSERT INTO `good_stocks` VALUES ('11', '33', 'XXL', 'blue', '998', '2019-06-24 12:53:57', '2019-06-24 12:53:57');
INSERT INTO `good_stocks` VALUES ('12', '34', null, null, '99999999', '2019-06-24 12:58:42', '2019-06-24 12:58:47');
INSERT INTO `good_stocks` VALUES ('13', '35', 'XXL', '大声道as', '12', '2019-06-24 12:59:11', '2019-06-24 12:59:11');
INSERT INTO `good_stocks` VALUES ('14', '36', 'XXL', 'blue', '999', '2019-06-24 12:59:24', '2019-06-24 12:59:24');
INSERT INTO `good_stocks` VALUES ('15', '37', 'XXL', 'blue', '999', '2019-06-24 12:59:32', '2019-06-24 12:59:32');
INSERT INTO `good_stocks` VALUES ('16', '39', '6G+128G', '华为', '10000', '2019-06-25 09:10:11', '2019-06-25 09:10:11');
INSERT INTO `good_stocks` VALUES ('17', '40', '3G+32G', '小米', '200000', '2019-06-25 09:11:41', '2019-06-25 09:11:41');
INSERT INTO `good_stocks` VALUES ('18', '41', '8G+256G', '小米', '300000', '2019-06-25 09:13:18', '2019-06-25 09:13:18');

-- ----------------------------
-- Table structure for nodes
-- ----------------------------
DROP TABLE IF EXISTS `nodes`;
CREATE TABLE `nodes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限id',
  `cname` varchar(32) DEFAULT NULL COMMENT '控制器名字',
  `aname` varchar(32) DEFAULT NULL COMMENT '方法名字',
  `desc` varchar(32) DEFAULT NULL COMMENT '操作描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of nodes
-- ----------------------------
INSERT INTO `nodes` VALUES ('1', 'usercontroller', 'index', '用户列表');
INSERT INTO `nodes` VALUES ('2', 'usercontroller', 'create', '用户添加');
INSERT INTO `nodes` VALUES ('3', 'usercontroller', 'edit', '用户修改');
INSERT INTO `nodes` VALUES ('4', 'usercontroller', 'destory', '用户删除');
INSERT INTO `nodes` VALUES ('5', 'catecontroller', 'index', '分类列表');
INSERT INTO `nodes` VALUES ('6', 'catecontroller', 'edit', '分类添加');
INSERT INTO `nodes` VALUES ('7', 'catecontroller', 'create', '分类修改');
INSERT INTO `nodes` VALUES ('8', 'catecontroller', 'destory', '分类删除');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `oname` int(15) NOT NULL COMMENT '订单号',
  `stid_all` varchar(255) NOT NULL COMMENT '商品id',
  `coid_all` varchar(255) NOT NULL COMMENT '评论id',
  `number` varchar(255) NOT NULL COMMENT '数量',
  `order_status` enum('0','1','2','3','4') NOT NULL DEFAULT '0' COMMENT '未付款，未发货，已发货，待评价，已完成',
  `aid` int(10) NOT NULL COMMENT '收获地址id',
  `price_all` decimal(10,2) NOT NULL COMMENT '总金额',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE,
  UNIQUE KEY `oname` (`oname`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '290', '1906211557', '10,3,4', '0,1,0', '8,7,12', '2', '1', '999.00', '2019-06-21 16:16:43', '2019-06-23 22:39:19');

-- ----------------------------
-- Table structure for pass_prots
-- ----------------------------
DROP TABLE IF EXISTS `pass_prots`;
CREATE TABLE `pass_prots` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `qid` int(10) NOT NULL DEFAULT '0' COMMENT '问题id',
  `answer` varchar(32) NOT NULL COMMENT '密保答案',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of pass_prots
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `rname` varchar(32) DEFAULT NULL COMMENT '角色名称(职称)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', '普通管理员');
INSERT INTO `roles` VALUES ('2', '项目主管');
INSERT INTO `roles` VALUES ('3', '项目经理');
INSERT INTO `roles` VALUES ('4', '超级管理员');

-- ----------------------------
-- Table structure for roles_nodes
-- ----------------------------
DROP TABLE IF EXISTS `roles_nodes`;
CREATE TABLE `roles_nodes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT NULL COMMENT '角色id',
  `nid` int(11) DEFAULT NULL COMMENT '权限id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of roles_nodes
-- ----------------------------
INSERT INTO `roles_nodes` VALUES ('1', '1', '1');
INSERT INTO `roles_nodes` VALUES ('2', '1', '5');
INSERT INTO `roles_nodes` VALUES ('3', '2', '1');
INSERT INTO `roles_nodes` VALUES ('4', '2', '2');
INSERT INTO `roles_nodes` VALUES ('5', '2', '5');
INSERT INTO `roles_nodes` VALUES ('6', '2', '6');
INSERT INTO `roles_nodes` VALUES ('7', '3', '1');
INSERT INTO `roles_nodes` VALUES ('8', '3', '2');
INSERT INTO `roles_nodes` VALUES ('9', '3', '3');
INSERT INTO `roles_nodes` VALUES ('10', '3', '5');
INSERT INTO `roles_nodes` VALUES ('11', '3', '6');
INSERT INTO `roles_nodes` VALUES ('12', '3', '7');
INSERT INTO `roles_nodes` VALUES ('13', '4', '1');
INSERT INTO `roles_nodes` VALUES ('14', '4', '2');
INSERT INTO `roles_nodes` VALUES ('15', '4', '3');
INSERT INTO `roles_nodes` VALUES ('16', '4', '4');
INSERT INTO `roles_nodes` VALUES ('17', '4', '5');
INSERT INTO `roles_nodes` VALUES ('18', '4', '6');
INSERT INTO `roles_nodes` VALUES ('19', '4', '7');
INSERT INTO `roles_nodes` VALUES ('20', '4', '8');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `upass` char(60) NOT NULL COMMENT '密码',
  `email` varchar(32) NOT NULL DEFAULT '' COMMENT '邮箱',
  `status` int(3) NOT NULL DEFAULT '0',
  `phone` char(11) NOT NULL DEFAULT '' COMMENT '手机号',
  `token` char(50) DEFAULT '' COMMENT '保护码',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  `deleted_at` datetime DEFAULT NULL COMMENT '软删除时间',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=454 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('280', 'zhangsan1776', '$2y$10$lQ132qK.fWUW0gtsbuy.8uTBL4Cv7WmS99Y.n.zB18xHc1JB956ii', 'zhangsan2197@qq.com', '0', '12363524722', '', '2019-06-13 21:36:46', '2019-06-19 14:39:31', null);
INSERT INTO `users` VALUES ('281', 'zhangsan1930', '$2y$10$QOMoI.eypJ78dzT6ySA78eiVlNq/v4coz0HfygIA/jqM/Q0Kn75mS', 'zhangsan3332@qq.com', '0', '12301609502', '', '2019-06-13 21:36:46', '2019-06-13 21:36:46', null);
INSERT INTO `users` VALUES ('285', 'zhangsan1837', '$2y$10$GmlvEIbhlc6SG24MU4ZrFeV3LRnTJcmfjjsXYy0IBoq3b/GgWciom', 'zhangsan3141@qq.com', '0', '13197419799', '', '2019-06-13 21:36:47', '2019-06-13 21:36:47', null);
INSERT INTO `users` VALUES ('286', 'zhangsan3957', '$2y$10$ETYH3.B1ZVj.rqfHcdMtT.yZkUjkS58NjRyIQ.gneEuhMkbc1vnPq', 'zhangsan3617@qq.com', '0', '14293448775', '', '2019-06-13 21:36:47', '2019-06-13 21:36:47', null);
INSERT INTO `users` VALUES ('287', 'zhangsan4207', '$2y$10$dlY1bpRzq7ZcYx8wuW.0.eCYMBbEM7bGw.1z8GzOI.HeGx3eWQGkS', 'zhangsan3552@qq.com', '0', '14286572950', '', '2019-06-13 21:36:47', '2019-06-13 21:36:47', null);
INSERT INTO `users` VALUES ('288', 'zhangsan1904', '$2y$10$OMDnlMJFQg7NIjO50mIMmOFSAiXZV/0oZSwQiOVKwC.R4fdMAImNS', 'zhangsan4074@qq.com', '0', '13341182481', '', '2019-06-13 21:36:47', '2019-06-13 21:36:47', null);
INSERT INTO `users` VALUES ('289', 'zhangsan3271', '$2y$10$aJ5gQKMDq0BxVecb2h5Yve8SOGKTzC.P6VhHUtpqsLdPn33Cyjjba', 'zhangsan3595@qq.com', '0', '12382344226', '', '2019-06-13 21:36:47', '2019-06-13 21:36:47', null);
INSERT INTO `users` VALUES ('290', 'zhangsan2089', '$2y$10$T.2M505/ktim3y.qLpLnoOopiAiPUUCrf97uWki4sKb0FtMDiGIMi', 'zhangsan3233@qq.com', '0', '12065509794', '', '2019-06-13 21:36:48', '2019-06-13 21:36:48', null);
INSERT INTO `users` VALUES ('291', 'zhangsan2411', '$2y$10$oDZdFtygRpLQqE3vBRxY2e7xTCOL10WE8xzMWMU1ADPsH4tAZp6.S', 'zhangsan1911@qq.com', '0', '12888644096', '', '2019-06-13 21:36:48', '2019-06-13 21:36:48', null);
INSERT INTO `users` VALUES ('292', 'zhangsan2153', '$2y$10$SWUXEoi2hO.p41paOqeH6eq7mp8eKF0OzytOazamzlHApDVwDqwjC', 'zhangsan3663@qq.com', '0', '14267412286', '', '2019-06-13 21:36:48', '2019-06-13 21:36:48', null);
INSERT INTO `users` VALUES ('293', 'zhangsan3960', '$2y$10$/XMmh66XJVeUKnUln93FI.zbTNBzek.Wdt76sbvjGpNHcGpw/1/2a', 'zhangsan3439@qq.com', '0', '13400493787', '', '2019-06-13 21:36:48', '2019-06-13 21:36:48', null);
INSERT INTO `users` VALUES ('294', 'zhangsan3624', '$2y$10$IogDATE/.8MqQV430h97R.PXYDWaigtrWkjuoDvTZLiUJV4ugR2VG', 'zhangsan1557@qq.com', '0', '11667133798', '', '2019-06-13 21:36:48', '2019-06-13 21:36:48', null);
INSERT INTO `users` VALUES ('295', 'zhangsan2922', '$2y$10$xtffqZYJGTYe.xpY/z0bEeXGG.CS5pAGgigQoXdEjChp/EDLseGUC', 'zhangsan2355@qq.com', '0', '11919299103', '', '2019-06-13 21:36:49', '2019-06-13 21:36:49', null);
INSERT INTO `users` VALUES ('296', 'zhangsan1666', '$2y$10$Eg7BDyv6aj4sVnVuuDBFhu5ofhmvNZ3/OMWWKShUkHr0EBeX4wSBm', 'zhangsan3633@qq.com', '0', '13075427371', '', '2019-06-13 21:36:49', '2019-06-13 21:36:49', null);
INSERT INTO `users` VALUES ('297', 'zhangsan4135', '$2y$10$W9Ba6Jh28isqhCZPjLl4peKQYZgMWPYEx.Koi52ceM.lam04D5TJO', 'zhangsan3446@qq.com', '0', '13077571196', '', '2019-06-13 21:36:49', '2019-06-13 21:36:49', null);
INSERT INTO `users` VALUES ('298', 'zhangsan3025', '$2y$10$S7nz6EcZKdoa5dzZiWUvXeBKd4Kpsu6d/77BgAAW0bd8zbvnVbQmC', 'zhangsan1555@qq.com', '0', '13644568218', '', '2019-06-13 21:36:49', '2019-06-13 21:36:49', null);
INSERT INTO `users` VALUES ('299', 'zhangsan3404', '$2y$10$k7ATEnYXBsQFObQFelgZleL0VD5ALaMPeqERhxQ4cMF0DKMPo6g/K', 'zhangsan4144@qq.com', '0', '12205404279', '', '2019-06-13 21:36:49', '2019-06-13 21:36:49', null);
INSERT INTO `users` VALUES ('300', 'zhangsan3440', '$2y$10$YV2wLMfI/3RTVvgMcMJkceyEFWjymnSx9zKCM3MOTTF7PjgVQHBV2', 'zhangsan1716@qq.com', '0', '13771186063', '', '2019-06-13 21:36:50', '2019-06-13 21:36:50', null);
INSERT INTO `users` VALUES ('301', 'zhangsan4156', '$2y$10$Bs//KcaxFFiDvDkDvaWEZOpBcSuS7xZamaOio5b5Fzec180RPstEG', 'zhangsan4133@qq.com', '0', '13961130338', '', '2019-06-13 21:36:50', '2019-06-13 21:36:50', null);
INSERT INTO `users` VALUES ('302', 'zhangsan2953', '$2y$10$5U/oa2rrK3SbTHIZiSFe/.bgmdZMkAirQRPzgeUEb.n8ilVot7UTq', 'zhangsan2762@qq.com', '0', '11711587747', '', '2019-06-13 21:36:50', '2019-06-13 21:36:50', null);
INSERT INTO `users` VALUES ('303', 'zhangsan1288', '$2y$10$5fgddk.Lm6QE/ds4CgYXZO67.BzxcaTKhFn2bF8Rps2AkWOxHZ60i', 'zhangsan2011@qq.com', '0', '11720268776', '', '2019-06-13 21:36:50', '2019-06-13 21:36:50', null);
INSERT INTO `users` VALUES ('304', 'zhangsan2974', '$2y$10$u/.Hg.6FUsaHit1gA67vJO5tKev7oWN.VciChs.j2FNPZXDYLu6g6', 'zhangsan2108@qq.com', '0', '11623500949', '', '2019-06-13 21:36:51', '2019-06-13 21:36:51', null);
INSERT INTO `users` VALUES ('305', 'zhangsan3279', '$2y$10$mwBUcGOG1YOpNN4Vy1sHf.jBuuZIxdkFyztF1109sf6G5a9tK6Jo6', 'zhangsan2849@qq.com', '0', '14178615705', '', '2019-06-13 21:36:51', '2019-06-13 21:36:51', null);
INSERT INTO `users` VALUES ('306', 'zhangsan3179', '$2y$10$qLXGyU3/5pY54AhMS9nuIuDJCZsqt2HGkqHdhqTsTG.icyQob2Bxe', 'zhangsan1406@qq.com', '0', '13818595629', '', '2019-06-13 21:36:51', '2019-06-13 21:36:51', null);
INSERT INTO `users` VALUES ('307', 'zhangsan1589', '$2y$10$oJb9G2lENCaWDn4JbDdF/eOh0zBt2RKPIAZ290NCwkULuJj.EUEj6', 'zhangsan3748@qq.com', '0', '12904169855', '', '2019-06-13 21:36:52', '2019-06-13 21:36:52', null);
INSERT INTO `users` VALUES ('308', 'zhangsan3572', '$2y$10$5IPVnB5X7WH2RDNJgxQpquEJbm5GNiwMee8FZSLvfC3FyqZgkVfRO', 'zhangsan3071@qq.com', '0', '13945237918', '', '2019-06-13 21:37:43', '2019-06-13 21:37:43', null);
INSERT INTO `users` VALUES ('309', 'zhangsan2905', '$2y$10$OjjaovME6UUeqinQWWiC6OPKkh.36v2wkb0IX.hP6FSpsYw3DKiNG', 'zhangsan3474@qq.com', '0', '14294455726', '', '2019-06-13 21:37:43', '2019-06-13 21:37:43', null);
INSERT INTO `users` VALUES ('310', 'zhangsan3157', '$2y$10$TV6qBdOVZWfBdVcINVuJyuIgO.XzqlhESQN7qF9Z5br0COaG3C4yO', 'zhangsan2034@qq.com', '0', '11833527395', '', '2019-06-13 21:37:43', '2019-06-13 21:37:43', null);
INSERT INTO `users` VALUES ('311', 'zhangsan2037', '$2y$10$HZv87ozNfO8J9IwyKv3hguht8OBAhpImxmCTWGRpVobOLwexISXT6', 'zhangsan1817@qq.com', '0', '12818529970', '', '2019-06-13 21:37:43', '2019-06-13 21:37:43', null);
INSERT INTO `users` VALUES ('312', 'zhangsan1948', '$2y$10$veamkrCoqNO2jijwb8Q9seba1K1e/8d8pwE8WwJiL06AsoxH9mjVi', 'zhangsan1505@qq.com', '0', '13623489726', '', '2019-06-13 21:37:44', '2019-06-13 21:37:44', null);
INSERT INTO `users` VALUES ('313', 'zhangsan2793', '$2y$10$3fI5zqGSlI0qmvZCHKYIn.jP5M7GMs2IMsAOSDq/GKiQ6gqsznNgy', 'zhangsan4056@qq.com', '0', '12625425038', '', '2019-06-13 21:37:44', '2019-06-13 21:37:44', null);
INSERT INTO `users` VALUES ('314', 'zhangsan1290', '$2y$10$kUg1iRiD3dQWlOv/rur/w.S4F7Tb1fdsbuvDCmNJlLA18fsMRzlG6', 'zhangsan2653@qq.com', '0', '12261463785', '', '2019-06-13 21:37:44', '2019-06-13 21:37:44', null);
INSERT INTO `users` VALUES ('315', 'zhangsan1423', '$2y$10$NUTHSLkkorRIVERiaZ9CbuE8uI8ns6PRb3Axhv2ymcM3iPhDVuLOe', 'zhangsan3371@qq.com', '0', '12957359638', '', '2019-06-13 21:37:44', '2019-06-13 21:37:44', null);
INSERT INTO `users` VALUES ('316', 'zhangsan3817', '$2y$10$W5R70dXAwZsnJmdj/Uqrwe1d6D8d3VtuajY4MRHpuH8LTuaZAOh2q', 'zhangsan2867@qq.com', '0', '12520540429', '', '2019-06-13 21:37:44', '2019-06-13 21:37:44', null);
INSERT INTO `users` VALUES ('317', 'zhangsan2878', '$2y$10$WTYP6inUrs/TTls3MbChyO6o/zdj.I.cS50dAyWioN27OlsDFK4ke', 'zhangsan4204@qq.com', '0', '13267382743', '', '2019-06-13 21:37:44', '2019-06-13 21:37:44', null);
INSERT INTO `users` VALUES ('318', 'zhangsan3830', '$2y$10$S.D/M6JBmC3FsI7ZRXLbheaz9L0EkGBxX/U27n0Z7QOnx3VbvX6WK', 'zhangsan4071@qq.com', '0', '11560150991', '', '2019-06-13 21:37:45', '2019-06-13 21:37:45', null);
INSERT INTO `users` VALUES ('319', 'zhangsan2752', '$2y$10$aHwgg240E.VL3a1cWhuPd.CJT/quu10OwZMfutUiWr4o1ilOsp5B2', 'zhangsan3089@qq.com', '0', '14246585099', '', '2019-06-13 21:37:45', '2019-06-13 21:37:45', null);
INSERT INTO `users` VALUES ('320', 'zhangsan2894', '$2y$10$AK5o.oGgY2QglwjUSsB87.TYYHrFOTLGIBAtWGr5BRi.7saCHbPRy', 'zhangsan3486@qq.com', '0', '12559453654', '', '2019-06-13 21:37:45', '2019-06-13 21:37:45', null);
INSERT INTO `users` VALUES ('321', 'zhangsan3699', '$2y$10$wS6rEEq.avFOtFRA2r/oBuUWiPwamsa0IBcxe9C5SiR.F7M5Ixkoi', 'zhangsan4106@qq.com', '0', '11502490517', '', '2019-06-13 21:37:45', '2019-06-13 21:37:45', null);
INSERT INTO `users` VALUES ('322', 'zhangsan3682', '$2y$10$aH7HWAyXDXUYK3HbHy3duONXjwxNmRjJ6M/RC5LFqi6WVsttvN38C', 'zhangsan2295@qq.com', '0', '11415500876', '', '2019-06-13 21:37:45', '2019-06-13 21:37:45', null);
INSERT INTO `users` VALUES ('323', 'zhangsan1744', '$2y$10$RkbiCG1JciTAc8bkMneh2.78MmEXSh3AIvNdVOn6zEKx8Rfw8QAyW', 'zhangsan1601@qq.com', '0', '13039422732', '', '2019-06-13 21:37:45', '2019-06-13 21:37:45', null);
INSERT INTO `users` VALUES ('324', 'zhangsan3925', '$2y$10$3MefIl9m45ag94XA97ohNOyCfRGV7ayPj.lhaManq3aRUtNy.VU6q', 'zhangsan3385@qq.com', '0', '13955396553', '', '2019-06-13 21:37:45', '2019-06-13 21:37:45', null);
INSERT INTO `users` VALUES ('325', 'zhangsan2166', '$2y$10$yOpUJUZQjgIC8dt.d0/IYO9J1PdVXgDzGScbkQodLdaMmOyhPpHzK', 'zhangsan3892@qq.com', '0', '11358381463', '', '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `users` VALUES ('326', 'zhangsan3483', '$2y$10$ooB2DiD7MWFttesg2rUJi.SNIaGDkkXtKZAZmJl1cZODLt.2IzcLK', 'zhangsan3861@qq.com', '0', '12225422540', '', '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `users` VALUES ('327', 'zhangsan4099', '$2y$10$zWh2Luw63muurVPJR7o1XesREILRbHPBw/vjjkZGStZxNYRoThTsO', 'zhangsan1436@qq.com', '0', '13718571211', '', '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `users` VALUES ('328', 'zhangsan2922', '$2y$10$DGVhTjr0lexTXgEiqOEVre56natIBJAkoqdx3bkyIwnmHn7Q5sIxS', 'zhangsan2714@qq.com', '0', '13169369257', '', '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `users` VALUES ('329', 'zhangsan2553', '$2y$10$LDfbh9AAAe/5F9QmcV3DEe9PHyvGmWDOcPw.66Rq37frtSWzhSiqS', 'zhangsan1470@qq.com', '0', '11524559488', '', '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `users` VALUES ('330', 'zhangsan2270', '$2y$10$6oBD.Mr8a4qfPsNTcYLwLetZg2HESyxezS/cqEuH8Cm/BgKuBRG2S', 'zhangsan1485@qq.com', '0', '12873388517', '', '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `users` VALUES ('331', 'zhangsan4182', '$2y$10$EJFHvQihWgRg8P2s61onFOUg7e8VmPtiEr4ik66tdMx6WEdmKdCC.', 'zhangsan2496@qq.com', '0', '12136581063', '', '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `users` VALUES ('332', 'zhangsan2415', '$2y$10$Xd5U4wyUac1JXgrpwGB3e.gbCroIZ2zWuAWkK0IfQfKxGT2Y2Cagy', 'zhangsan1407@qq.com', '0', '13444524895', '', '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `users` VALUES ('333', 'zhangsan1941', '$2y$10$ePh6L9Bm2KALAZ3k2m1Yp.IvH6bjyoqhMmixydPSP4eQKlr3MmxvO', 'zhangsan3854@qq.com', '0', '14229298127', '', '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `users` VALUES ('334', 'zhangsan2564', '$2y$10$dC0bsmBMr3AqJo.Xd7MRauIPlzwgx9zulbAIYfXITAi5II3GbI2rC', 'zhangsan4012@qq.com', '0', '13876339379', '', '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `users` VALUES ('335', 'zhangsan3191', '$2y$10$MNjD/pdq2hIEAEoGfZM5nOnE4Zi797HqIOvRypoUKDGejU9gm6BKS', 'zhangsan1242@qq.com', '0', '11538212963', '', '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `users` VALUES ('336', 'zhangsan2724', '$2y$10$qpkREIs0LGV4wvqMhv7feOoKrR53uEsswsTmdleLJOqOexfpvndh6', 'zhangsan1511@qq.com', '0', '14235329908', '', '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `users` VALUES ('337', 'zhangsan3504', '$2y$10$.aFL8DQCwSH753Ep5JbTaOb4IOGuMumz6V.upkCTdoH8v8WjoGQpm', 'zhangsan2139@qq.com', '0', '12569521956', '', '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `users` VALUES ('338', 'zhangsan3761', '$2y$10$BhPzZ6mFXW/14qXQcpq/U.yCXvyq5aaPJqKOcrhRD3YIEAbmUU.Bq', 'zhangsan2538@qq.com', '0', '13484252840', '', '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `users` VALUES ('339', 'zhangsan2812', '$2y$10$ZTGK/eg/acH4rZn5EAL7e.s4qoHuPbyR.pOT4OVMLp4a/vRUxLDDu', 'zhangsan3692@qq.com', '0', '13693199333', '', '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `users` VALUES ('340', 'zhangsan3121', '$2y$10$ls2M2CRfDBxELGLOWZtqa.MekEFvdTsrjXuWUXqtBwJjWgi6l2Kzq', 'zhangsan2043@qq.com', '0', '14196645131', '', '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `users` VALUES ('341', 'zhangsan3048', '$2y$10$Wl/K6XZ3hN2FNXgtpgWtRe6M2wIKQn9uTNaBZ0JnFsummyuArLkw2', 'zhangsan2865@qq.com', '0', '12700393301', '', '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `users` VALUES ('342', 'zhangsan4139', '$2y$10$DOt2ULdRnIZE4m3nJQQi5.l.rTqhuh7fCVDnAnk.d9DFWA5XYw/s.', 'zhangsan2829@qq.com', '0', '13259560383', '', '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `users` VALUES ('343', 'zhangsan2325', '$2y$10$Pxl8zT8s4KfDQ1Rhle6e5eBLg/U7UWd3iRmnqf/DNXwEH6q4EptO2', 'zhangsan1622@qq.com', '0', '13781252638', '', '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `users` VALUES ('344', 'zhangsan2150', '$2y$10$5dr/3j4n3HhNKA5XR9ln3OQpyRuolBZpBLcm10F/mPk7ytTPn0X2O', 'zhangsan2842@qq.com', '0', '13290285327', '', '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `users` VALUES ('345', 'zhangsan2329', '$2y$10$25QMczmsiaGRbxQwZkeCqeH3VLaXJ/B5I5QGcFk..nkEg8F3xvBaS', 'zhangsan4070@qq.com', '0', '14193168129', '', '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `users` VALUES ('346', 'zhangsan3967', '$2y$10$Wqvxnv7wSVC9PWDwIcDzYu5imGTTQwz0I8Pea8kEsYaNQNVmKRoii', 'zhangsan1686@qq.com', '0', '13652319465', '', '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `users` VALUES ('347', 'zhangsan2153', '$2y$10$7ypRy/v6IUY6Kh2PfVX.z.lsWP5B8vUN5iAMUxzORYhxrWReNng.2', 'zhangsan2203@qq.com', '0', '12537619656', '', '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `users` VALUES ('348', 'zhangsan4185', '$2y$10$o/1VitxZrWWtv62EZGTvo.BVwZ79fRWvyKxGlq6yb1FqPYFgKU26O', 'zhangsan3964@qq.com', '0', '12214146144', '', '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `users` VALUES ('349', 'zhangsan3663', '$2y$10$kYboECEq3bACcxlPpnHyEucpMZD1Uk2oJK5krGFB1MM6FNMXIBNn.', 'zhangsan1726@qq.com', '0', '11524631945', '', '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `users` VALUES ('350', 'zhangsan4112', '$2y$10$DzOsxRxDgq8Ci5EIDOkbYeH7uQmv6YvnOtS7/ZplbP.QrQ90L8wlu', 'zhangsan2909@qq.com', '0', '13511439672', '', '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `users` VALUES ('351', 'zhangsan3078', '$2y$10$3Q5fDHm3tHr8FjmQT2hRlO4mzu8eb2Rk1r9EPejhTtusahOLQiM3e', 'zhangsan4137@qq.com', '0', '12706245799', '', '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `users` VALUES ('352', 'zhangsan2993', '$2y$10$j/OgwTM34cT3PgSyNBpMQuhwscMfZ1dHvdxdPgiChYMNofLqobEKO', 'zhangsan3297@qq.com', '0', '14098581497', '', '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `users` VALUES ('353', 'zhangsan1723', '$2y$10$OL1ZGqbJx3YdQNF3tnhw5eTD5PqQOaJJ0TRTWSlPS6UD6mXqO3r46', 'zhangsan4025@qq.com', '0', '12555535708', '', '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `users` VALUES ('354', 'zhangsan4246', '$2y$10$BJMnEDbcF7saK391fzV5Let6HCr.rHJ56oLgFbXQER79VVbxtlyS6', 'zhangsan2337@qq.com', '0', '11271643994', '', '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `users` VALUES ('355', 'zhangsan1342', '$2y$10$I7ZDLFCCnqzajADlaiFCmOFxuOoNFqH8kyoPabv8mux9Fbdt3pEvG', 'zhangsan3719@qq.com', '0', '11756640229', '', '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `users` VALUES ('356', 'zhangsan2111', '$2y$10$tf00ZtUlFC.kER2mrbuA5uyXTvkJmbvr5LFDx6WZhMcQCvSH3ah..', 'zhangsan2650@qq.com', '0', '11605555089', '', '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `users` VALUES ('357', 'zhangsan2254', '$2y$10$towh7gA.3adrDxqSirjm2OTwUKmJ3ErmqaI.vLcsiYwsWrPGwnbSO', 'zhangsan3669@qq.com', '0', '14239625228', '', '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `users` VALUES ('358', 'zhangsan2182', '$2y$10$osWedQ/LpY/m8UjUGiM0ceVpBIUt7SXJK1gC9d2MZiRlIhv1awff.', 'zhangsan2953@qq.com', '0', '11361571950', '', '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `users` VALUES ('359', 'zhangsan2726', '$2y$10$2rxuTw6AIbzLaXTE4LCaV.ThZOhJ2q78.m.SrR2v1762MnrFxY/Si', 'zhangsan4050@qq.com', '0', '11924432716', '', '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `users` VALUES ('360', 'zhangsan1856', '$2y$10$wPdQwYCCUCg5cT/igrFjJu5lKVERUeMV6SO0zYsbEgvwfNhfxE10e', 'zhangsan4263@qq.com', '0', '12638208551', '', '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `users` VALUES ('361', 'zhangsan2467', '$2y$10$GDuiP4tfF9rG2Obn5MzTP.rCWJJQ0DcwzZO0mHqALYSU0JJsiIYTW', 'zhangsan3973@qq.com', '0', '12139242498', '', '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `users` VALUES ('362', 'zhangsan3585', '$2y$10$9Au1.TgsOIVSc19pERuo/e2QQlf1ujuHgtNKrVxKKqYFoyjEUgZ8S', 'zhangsan3759@qq.com', '0', '12779278041', '', '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `users` VALUES ('363', 'zhangsan1921', '$2y$10$8rjklEN4H.rUXhq.OiL9..RiGiCuFBDY5UDpohiDQGQ4NLl38z8dG', 'zhangsan1759@qq.com', '0', '13746141998', '', '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `users` VALUES ('364', 'zhangsan2422', '$2y$10$MG5k1t8gLtOi8iK08I5BVuBa6/4C9yxW2sGoTABD/EqxX1Avhif7S', 'zhangsan4316@qq.com', '0', '11576336813', '', '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `users` VALUES ('365', 'zhangsan1494', '$2y$10$jHNZa0lw8r5pNUbVRNB6LuFhNQdcXe0S3GU2qePPGQi1Oz6G4cqkC', 'zhangsan3319@qq.com', '0', '11499638757', '', '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `users` VALUES ('366', 'zhangsan1663', '$2y$10$4eJgt9OAzagzStQ/DEYaieibRAnqmJPMRhNTC3KLCwez/AF5XU4YG', 'zhangsan1992@qq.com', '0', '12035362232', '', '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `users` VALUES ('367', 'zhangsan1276', '$2y$10$TaGE1Ximz56iPlAmIKji0ecPTwpz/tQs.qvIb1raFCAZ3oHxqY8E6', 'zhangsan2552@qq.com', '0', '13325244157', '', '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `users` VALUES ('368', 'zhangsan4208', '$2y$10$u0RN.ly.538BvsUX4TsNz..Kp/Y2imMxGALZkEYmaJEwwOWBUBKIq', 'zhangsan2914@qq.com', '0', '11245460894', '', '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `users` VALUES ('369', 'zhangsan1874', '$2y$10$ngek.jSEDIMeECeFCM6oqe6McvRpVZB8QMZS6ugvY1lOaig4jgho6', 'zhangsan2515@qq.com', '0', '11831265555', '', '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `users` VALUES ('370', 'zhangsan3007', '$2y$10$J8s3pCYaeeNgQ.y32GUPMOOMH.vFLcku2nRFffvkaCJxzDAaO5iVu', 'zhangsan3293@qq.com', '0', '11812313896', '', '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `users` VALUES ('371', 'zhangsan2116', '$2y$10$xS21P7//1aZdJ3B9aygS/OucZSYryPx932t0UYNLEvDLqNDd5ENDm', 'zhangsan1447@qq.com', '0', '13061550921', '', '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `users` VALUES ('372', 'zhangsan3796', '$2y$10$n5mLdeqY6yWfudUu2vaHnOEDd0BYoFrGyaSeQwW/pOGn/crgyQw5y', 'zhangsan2204@qq.com', '0', '11718312150', '', '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `users` VALUES ('373', 'zhangsan1872', '$2y$10$/Qmo/ErIm025q.GLhdvHguPlwtbUZjn0PXYJkoBZjJmX0uQ1zKG5i', 'zhangsan3585@qq.com', '0', '12346264074', '', '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `users` VALUES ('374', 'zhangsan2848', '$2y$10$FA/FqAaKHpz0OztfdxbueOoylvfQJVBAgKWrz.iVynrxYNW/SAQe2', 'zhangsan2967@qq.com', '0', '11301388536', '', '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `users` VALUES ('375', 'zhangsan2615', '$2y$10$q/B8x4v209VYncm0wR98POCzgqRmXsA2IYn/mIZKiJlS8wcAsEDBe', 'zhangsan2832@qq.com', '0', '14235363728', '', '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `users` VALUES ('376', 'zhangsan1863', '$2y$10$DJ.TXalUscYVaKrZ8oRBHulwG0wrIxNmfYioVDh2l5GqITfEKPt/a', 'zhangsan1558@qq.com', '0', '11356474996', '', '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `users` VALUES ('377', 'zhangsan1948', '$2y$10$HchyM/FPNB.1.a9FaaNxYe6JNRZ8bVdYNi3Jnd7jjhoPOwNoDk1/K', 'zhangsan1896@qq.com', '0', '11474526440', '', '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `users` VALUES ('378', 'zhangsan1603', '$2y$10$hhDZkoL8pqrSamDE2bEIi.htVKCLkaRVelncwG3F0/J4hdV5x.j42', 'zhangsan2143@qq.com', '0', '13531265634', '', '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `users` VALUES ('379', 'zhangsan3108', '$2y$10$DgZglLZUku/IHEXj8C/T1OyQN4scZHk/vjYNRFPD2sKuOpkDZtF3m', 'zhangsan1249@qq.com', '0', '13720456202', '', '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `users` VALUES ('380', 'zhangsan1883', '$2y$10$uLDbXGLkTenEHj01kOnXleaoedcVa6VP0OEO/XsuDRT5c6EpD/w3K', 'zhangsan3351@qq.com', '0', '11612192625', '', '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `users` VALUES ('381', 'zhangsan2420', '$2y$10$D9.DrYYkEHruQJVEj1B6Y.SAWNrim1hjCIUHw9PTp9ukgslluXrRy', 'zhangsan2607@qq.com', '0', '14063436212', '', '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `users` VALUES ('382', 'zhangsan2206', '$2y$10$zjwJqbxk1FpBqzgbgrw9E.pYd4lhZ6yJeyrcOGQNNOpyWOPDveEaO', 'zhangsan2628@qq.com', '0', '11845614700', '', '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `users` VALUES ('383', 'zhangsan2316', '$2y$10$T0n.bqI5/kIhk0.x3k5tcOvvCRIkFgW60MWKbn48HNZQnI2OEdUWW', 'zhangsan3962@qq.com', '0', '13119340480', '', '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `users` VALUES ('384', 'zhangsan3258', '$2y$10$VvXeaoh6VS/./Vg9nCR.Zu.aLAMG8ervyyWuNKfN/1gJro2y/r0Ta', 'zhangsan2007@qq.com', '0', '11722314252', '', '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `users` VALUES ('385', 'zhangsan3952', '$2y$10$DRS3KALreGYfk38DcEdDJe/q0WktImBWUf8QIu1hMqDrUSYj8ttrS', 'zhangsan1639@qq.com', '0', '11252646221', '', '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `users` VALUES ('386', 'zhangsan2763', '$2y$10$2K.0gpFI8j0fSa2shhR69OQs1GyotElXW/pwfwkNXnt9xJmwR0Eay', 'zhangsan1274@qq.com', '0', '11487484118', '', '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `users` VALUES ('387', 'zhangsan2178', '$2y$10$Mx1i1TRk30unIn.0PkoaHO9Gf92K0yr77w8kS5eW.4Y4BVgUMJVKO', 'zhangsan3043@qq.com', '0', '11735617661', '', '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `users` VALUES ('388', 'zhangsan3807', '$2y$10$azm06MFXjwedSF/makKT2O1UFiUZ1qJM.zEUcUXI3A4WXnYRk/Gpq', 'zhangsan3160@qq.com', '0', '11481338756', '', '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `users` VALUES ('389', 'zhangsan3645', '$2y$10$iLZsx2l2xkofbjQThSoxE.gjaGk2fKt.bUZ0mFZPDqFGfd9HTUYjS', 'zhangsan1289@qq.com', '0', '12381234696', '', '2019-06-13 21:37:51', '2019-06-13 21:37:51', null);
INSERT INTO `users` VALUES ('390', 'zhangsan1349', '$2y$10$98D4nYVoLwDs59ppsPyM..vxHaQ4.WH/rNZiwAc60HT9yB/LztxSa', 'zhangsan2119@qq.com', '0', '12900502932', '', '2019-06-13 21:37:51', '2019-06-13 21:37:51', null);
INSERT INTO `users` VALUES ('391', 'zhangsan3700', '$2y$10$3PFo83D9fwV/TKnOhOSJ4elKIRuMphsr46WPWjRDRXnGxus4VmqXC', 'zhangsan1909@qq.com', '0', '12915613761', '', '2019-06-13 21:37:51', '2019-06-13 21:37:51', null);
INSERT INTO `users` VALUES ('392', 'zhangsan3838', '$2y$10$vAFeCXe7gppOdCqNaVkmIOLDPmNgMoUNxGJT4gYK4nDG1W966iv1u', 'zhangsan1771@qq.com', '0', '12317520758', '', '2019-06-13 21:37:51', '2019-06-13 21:37:51', null);
INSERT INTO `users` VALUES ('393', 'zhangsan3464', '$2y$10$hC8EulUv6GbkA8RdRIqhp.gkFdUxNi3dM.fMCgEkguwkatmF.sQgG', 'zhangsan3549@qq.com', '0', '13168374730', '', '2019-06-13 21:37:51', '2019-06-13 21:37:51', null);
INSERT INTO `users` VALUES ('394', 'zhangsan3634', '$2y$10$BowTtHsid2Qgfu0XYhFRye2KSMXKDrNiAxMlM9U78srXfonqHkK0i', 'zhangsan3709@qq.com', '0', '11735179670', '', '2019-06-13 21:37:51', '2019-06-13 21:37:51', null);
INSERT INTO `users` VALUES ('395', 'zhangsan2462', '$2y$10$TTZOsrpAWOuc9dWe.WzVd.Yvvxt.ypboWCvYm1ImqD9wKhTZIkuei', 'zhangsan2775@qq.com', '0', '13381225878', '', '2019-06-13 21:37:51', '2019-06-13 21:37:51', null);
INSERT INTO `users` VALUES ('396', 'zhangsan1476', '$2y$10$zmc/xUoOCPcB90fVXjbg3.RSy8D41HDOO/s.4jwt68TwfE8Ui8itC', 'zhangsan2582@qq.com', '0', '11673498823', '', '2019-06-13 21:37:51', '2019-06-13 21:37:51', null);
INSERT INTO `users` VALUES ('397', 'zhangsan2660', '$2y$10$6C2l0vKTmitZo1YnZJ9y9eY8fK9BLSO79NmkZ1DCIp2E1ptGodfDO', 'zhangsan3686@qq.com', '0', '13702195586', '', '2019-06-13 21:37:52', '2019-06-13 21:37:52', null);
INSERT INTO `users` VALUES ('398', 'zhangsan2845', '$2y$10$8tV3XW195VjT9IWr5jNAJ.EPC15rDX9pf47MyJhsFSQnS2OhSfrXq', 'zhangsan1257@qq.com', '0', '12903561107', '', '2019-06-13 21:37:55', '2019-06-13 21:37:55', null);
INSERT INTO `users` VALUES ('399', 'zhangsan1944', '$2y$10$btfxcqWz8I9dvrLMttlYX.fY8lOVKEMWPovg1K.uC/rMDdlNW4jz6', 'zhangsan2177@qq.com', '0', '11445639254', '', '2019-06-13 21:37:55', '2019-06-13 21:37:55', null);
INSERT INTO `users` VALUES ('400', 'zhangsan1663', '$2y$10$heSvvHuPyiXolw/8WL5aHuAPNAZ1nWDVR/OzM/tSgnYF8E.k2gSA.', 'zhangsan2202@qq.com', '0', '13766603532', '', '2019-06-13 21:37:55', '2019-06-13 21:37:55', null);
INSERT INTO `users` VALUES ('401', 'zhangsan1608', '$2y$10$riS.9pG3.mXopwwO/uI.I.N90DL6Up3tE1FF7Rb29ROUYLCWYxGxy', 'zhangsan2156@qq.com', '0', '13041194291', '', '2019-06-13 21:37:55', '2019-06-13 21:37:55', null);
INSERT INTO `users` VALUES ('402', 'zhangsan1930', '$2y$10$MZeUvztKPBDef9R2yP8LZ.OlORcqZ9jrk2uAwqKM0vFbn.LoYfWR6', 'zhangsan3957@qq.com', '0', '14097625214', '', '2019-06-13 21:37:56', '2019-06-13 21:37:56', null);
INSERT INTO `users` VALUES ('403', 'zhangsan2959', '$2y$10$t60QTCLoDltk2Z2HHOjohu.C/XircNZcL3KywMSJDZiFYnIArVVLe', 'zhangsan3194@qq.com', '0', '13236170125', '', '2019-06-13 21:37:56', '2019-06-13 21:37:56', null);
INSERT INTO `users` VALUES ('404', 'zhangsan2273', '$2y$10$P1R1dusdEZMaIScTNwjXzuSeCIxq.oEtfIjWJZ0mf/lrWZemP9xpy', 'zhangsan3213@qq.com', '0', '11376614301', '', '2019-06-13 21:37:56', '2019-06-13 21:37:56', null);
INSERT INTO `users` VALUES ('405', 'zhangsan4238', '$2y$10$5vsPMAdmn7NfT/4kTMuhau0we.xIop.vwsngOc06QsrklNxTsPe6O', 'zhangsan4223@qq.com', '0', '14298471762', '', '2019-06-13 21:37:56', '2019-06-13 21:37:56', null);
INSERT INTO `users` VALUES ('406', 'zhangsan3753', '$2y$10$xudwZcLdg6NH6X6dkpmda.6siP4AEJukCiyJz5VPpooaB7fQu9ixG', 'zhangsan2088@qq.com', '0', '11747278241', '', '2019-06-13 21:37:56', '2019-06-13 21:37:56', null);
INSERT INTO `users` VALUES ('407', 'zhangsan3466', '$2y$10$Y8zifdG8mU0xt4bcrNQYSeGBDhfzreSbvPmw2ILHOJiM5dDF5ftDW', 'zhangsan3984@qq.com', '0', '12437271705', '', '2019-06-13 21:37:56', '2019-06-13 21:37:56', null);
INSERT INTO `users` VALUES ('408', 'zhangsan2233', '$2y$10$hUC9/FiLqQm2K1YDl4e/uu68JVXS/mwHSj6Dn07MZSyj9CtoDLsXa', 'zhangsan3934@qq.com', '0', '14055337103', '', '2019-06-13 21:37:57', '2019-06-13 21:37:57', null);
INSERT INTO `users` VALUES ('409', 'zhangsan2143', '$2y$10$Zy04I3Srv0SDolhw26ZCVeXk5H/lySEhrfsxJXRVML3QSRv75SUJu', 'zhangsan3457@qq.com', '0', '12408393528', '', '2019-06-13 21:37:57', '2019-06-13 21:37:57', null);
INSERT INTO `users` VALUES ('410', 'zhangsan1319', '$2y$10$DaMXB39LF01HsLKKlAfrGe123WcAx7TFdfw/3f95qQqKuWt/1bKtm', 'zhangsan2441@qq.com', '0', '11276366684', '', '2019-06-13 21:37:57', '2019-06-13 21:37:57', null);
INSERT INTO `users` VALUES ('411', 'zhangsan3164', '$2y$10$PKzGMzikR6GHZ0lD99V0SOW1i5sh9a.L9had0WPE4Nc/9UDQFMbG.', 'zhangsan1746@qq.com', '0', '12800314213', '', '2019-06-13 21:37:57', '2019-06-13 21:37:57', null);
INSERT INTO `users` VALUES ('412', 'zhangsan3682', '$2y$10$xPHubSfzwlAh2vVkLQrtv.5TvkjejODttpkE4LNmaRLonZu6GISje', 'zhangsan1281@qq.com', '0', '13056138455', '', '2019-06-13 21:37:57', '2019-06-13 21:37:57', null);
INSERT INTO `users` VALUES ('413', 'zhangsan1785', '$2y$10$zbrpPMKQRHEwCkJxaUzXVeGqBJ5yH2gtlV.JBeMKU5klcYZ642tZm', 'zhangsan1458@qq.com', '0', '12775157861', '', '2019-06-13 21:37:58', '2019-06-13 21:37:58', null);
INSERT INTO `users` VALUES ('414', 'zhangsan1698', '$2y$10$0cB8nYkiHQMpUhOIPREw..UHmLJdwOWYCjdZezhctGfHPIC4tr4zy', 'zhangsan3819@qq.com', '0', '14271614331', '', '2019-06-13 21:37:58', '2019-06-13 21:37:58', null);
INSERT INTO `users` VALUES ('415', 'zhangsan2667', '$2y$10$K8ULzGpLh2zXiykTODuhqOsBFJHP91ED2NGQVjaaVv9QSacp8vZt.', 'zhangsan1439@qq.com', '0', '13449125341', '', '2019-06-13 21:37:58', '2019-06-13 21:37:58', null);
INSERT INTO `users` VALUES ('416', 'zhangsan4279', '$2y$10$rDYaU/RW.K847NkyFs2Ln.QLC2zYZfZtsNMcuYbAZ69dsAt1mgPd2', 'zhangsan3147@qq.com', '0', '11747650940', '', '2019-06-13 21:37:58', '2019-06-13 21:37:58', null);
INSERT INTO `users` VALUES ('417', 'zhangsan3070', '$2y$10$h.r7krBBNGq7cVjWyW4Epe61jz2KnaWSwZXsiBY5m.XaEwKJ9gsfm', 'zhangsan3867@qq.com', '0', '12274411128', '', '2019-06-13 21:37:58', '2019-06-13 21:37:58', null);
INSERT INTO `users` VALUES ('418', 'zhangsan2711', '$2y$10$FvyvavxZ6/h.mELLXNU4a.IIOT6n9LBE2/d8dLcbG.4FdIPEMIc1W', 'zhangsan3121@qq.com', '0', '12263192528', '', '2019-06-13 21:37:58', '2019-06-13 21:37:58', null);
INSERT INTO `users` VALUES ('419', 'zhangsan3143', '$2y$10$PdOV4rouKiSJ/L6wJJd3/.MLhfpR1lfTakjlHNTVehZQUHfCMZctO', 'zhangsan2044@qq.com', '0', '13141445649', '', '2019-06-13 21:37:59', '2019-06-13 21:37:59', null);
INSERT INTO `users` VALUES ('420', 'zhangsan1726', '$2y$10$lvWayA6KxJ6//yfaCyw3T.PDz0DBqqKqTCUJpOhx.OhPq8XRzExUS', 'zhangsan4229@qq.com', '0', '14245223041', '', '2019-06-13 21:37:59', '2019-06-13 21:37:59', null);
INSERT INTO `users` VALUES ('421', 'zhangsan3016', '$2y$10$YMxnN.ME7ROR6GD.i59WYe2nUvaQXU9sLxnmBmYyiygn0lisvFdcq', 'zhangsan2511@qq.com', '0', '13370453867', '', '2019-06-13 21:37:59', '2019-06-13 21:37:59', null);
INSERT INTO `users` VALUES ('422', 'zhangsan3395', '$2y$10$d0pKX1faTa9fl2BSRET82e0G7MnL1qf6b2LUoQX6orsAYDgWl9V1G', 'zhangsan2487@qq.com', '0', '11847153426', '', '2019-06-13 21:37:59', '2019-06-13 21:37:59', null);
INSERT INTO `users` VALUES ('423', 'zhangsan3967', '$2y$10$nf8IOL0YKmtnAsBYtiUMuO05Ijdi7W3Vdip8zFCDDFd11U6KMxsAu', 'zhangsan1351@qq.com', '0', '13191570212', '', '2019-06-13 21:37:59', '2019-06-13 21:37:59', null);
INSERT INTO `users` VALUES ('424', 'zhangsan3518', '$2y$10$17lyTPJGv0rrZZwarngwKuvc968a5QTrTyEKgb7ijoQmpkQZCEpKG', 'zhangsan2784@qq.com', '0', '13682421278', '', '2019-06-13 21:38:00', '2019-06-13 21:38:00', null);
INSERT INTO `users` VALUES ('425', 'zhangsan3493', '$2y$10$7Q8ONlK3nnUU3qTQbyECVerBWgwtZj3F85quCJ2wEdWkJt9k27EGa', 'zhangsan1405@qq.com', '0', '12487282861', '', '2019-06-13 21:38:00', '2019-06-13 21:38:00', null);
INSERT INTO `users` VALUES ('426', 'zhangsan1433', '$2y$10$fSst7ymqmxgJVL7qzXDaheBOJ4h4vgtScX1PYS0AKs7DERxESb8ni', 'zhangsan4223@qq.com', '0', '11356316679', '', '2019-06-13 21:38:00', '2019-06-13 21:38:00', null);
INSERT INTO `users` VALUES ('427', 'zhangsan2744', '$2y$10$0jErsBAl5l7lvsDyME/NbOqAcEdTKymOP/DGmn7rNf2HBf.l9p5P.', 'zhangsan2007@qq.com', '0', '11619619883', '', '2019-06-13 21:38:00', '2019-06-13 21:38:00', null);
INSERT INTO `users` VALUES ('440', '', '$2y$10$bEWNYwrrp/9hL4wVwwj1cOTkyyCeKv9XTtvyKyeYM9AS3XdHVJnM.', '1140774779@qq.com', '1', '', 'dz4BSXKI874LG8fvWB8sjKFa6T5nMo9N2wc9daR5ygzOVmEYOi', '2019-06-20 12:52:53', '2019-06-20 13:10:34', null);
INSERT INTO `users` VALUES ('441', '', '$2y$10$zOz8Roe4/23zzWuI0mMmPur1LHEOMbV6zum2BQXISe7mv3Lq1MMXu', '1140774779@qq.com', '0', '', 'hvF32QumqfQPYbMfiacJvCjfQisBzeGTuUpTkiHRE0nPXcI40p', '2019-06-20 13:26:08', '2019-06-20 13:26:08', null);
INSERT INTO `users` VALUES ('444', '用户1887', '$2y$10$CBMmaOLmsBlB3fLN3rqqGOSFgYkjlbnIM5pIKWmYGE/tCNC1ejsZi', '', '0', '18738140686', '', '2019-06-24 09:22:17', '2019-06-24 09:22:17', null);
INSERT INTO `users` VALUES ('445', '用户23', '$2y$10$9uNCqykH.fWGvpNHJUbS6e7Py6IseLKDD22oCG/0PiKDDPPPs4sjS', '', '0', '18738140686', '', '2019-06-24 09:22:54', '2019-06-24 09:22:54', null);
INSERT INTO `users` VALUES ('446', '用户760', '$2y$10$ZMxA2JX3DMXxe3vKs.ll5O13EkPl6jRMeIlXlKg4CwompOYZyhh.2', '1140774778@qq.com', '0', '', 'kem81gUZVHVhK31xjTGksvh2ZD8wd9tvAXY1geBkbHk4blINhc', '2019-06-24 09:46:45', '2019-06-24 09:46:45', null);
INSERT INTO `users` VALUES ('447', '用户506', '$2y$10$jkgpeUx9huTLiLOi.cy4a.MH1Paahtpfmn8/PQRqFCwMIXkXb5slS', '', '0', '驱蚊器翁', '', '2019-06-24 09:50:12', '2019-06-24 09:50:12', null);
INSERT INTO `users` VALUES ('448', '用户960', '$2y$10$8f3L0R/22cmi1zjb4Xx0q.ZNjMPfSuS689BXT78QtonNYRVI7gjpe', '1140774777@qq.com', '0', '', 'AhzHuDjashdnzNO9yRAtvFZAsckuIZlqsk4nVeEAE8gXeubebt', '2019-06-24 10:33:00', '2019-06-24 10:33:00', null);
INSERT INTO `users` VALUES ('449', '用户214', '$2y$10$.rs0LLCKJb86TEcP5eLGVOjWgBBcUFQ2brUEGyvtXBBCD7Xi0mplS', '9@qq.com', '0', '', 'b0Npwzd7W6RcRrdh8Fu9djfA94y1tgrQskDk1w47EhiNMKZICx', '2019-06-24 11:19:44', '2019-06-24 11:19:44', null);
INSERT INTO `users` VALUES ('450', '用户1243', '$2y$10$aZ1z/D31qU9uEB0MecfzDOIqmNs8aLdC2OkqcI/ntovI0S4YXKnTm', '1140774778@qq.com', '0', '', 'zgr5xX6kbszhA9VFS9OLK9cg5pgOwqVueyrvZ8MI4aoTnW8TI5', '2019-06-24 11:31:05', '2019-06-24 11:31:05', null);
INSERT INTO `users` VALUES ('451', '用户594', '$2y$10$guFDEucIsvCKAiVFfNHwFeDuqwqCbRE/YC2B3btBnuvgc3jNhEIV2', '1140774779@qq.com', '0', '', 'l2s9usmIPuKW0Mo9wDtW0dEzlqk2M6srSBR8isGwxDDOqUKPKh', '2019-06-24 12:01:47', '2019-06-24 12:01:47', null);
INSERT INTO `users` VALUES ('452', '用户245', '$2y$10$5YpsPl07Ofwdf3pdQctDte9foRoqk20L0yl6lFL/O.QMu5q7xaG3K', '1140774779@qq.com', '0', '', 'n6cASYm4JULr0xtmPvXxmkyfCEkdbOgk76gTrVdZSUZEnOPniL', '2019-06-24 12:35:21', '2019-06-24 12:35:21', null);
INSERT INTO `users` VALUES ('453', '用户1698', '$2y$10$URamkC.1B7QZxugAf2hDxOdmxYG9WO8WjqdjCzdggI4In5Oqq45SG', '1140774772@qq.com', '0', '', 'MTP1WABlAOxTI6YSd0bIgFnPLQdsTC9zY7FLLsz9RZntIQhivD', '2019-06-24 12:48:33', '2019-06-24 12:48:33', null);

-- ----------------------------
-- Table structure for user_addrs
-- ----------------------------
DROP TABLE IF EXISTS `user_addrs`;
CREATE TABLE `user_addrs` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `address` varchar(255) NOT NULL COMMENT '收货地址',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '更新时间',
  `addrname` varchar(10) NOT NULL COMMENT '收货人',
  `phone` int(12) NOT NULL COMMENT '手机号',
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1默认地址',
  PRIMARY KEY (`aid`),
  UNIQUE KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_addrs
-- ----------------------------
INSERT INTO `user_addrs` VALUES ('1', '290', '北京市昌平区奇点中心B座616室', '2019-06-21 16:00:38', '2019-06-21 16:00:41', '张三', '1399999999', '0');

-- ----------------------------
-- Table structure for user_infos
-- ----------------------------
DROP TABLE IF EXISTS `user_infos`;
CREATE TABLE `user_infos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `profile` varchar(128) NOT NULL,
  `balance` decimal(10,0) DEFAULT NULL,
  `sex` enum('w','m') NOT NULL,
  `birthday` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=437 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_infos
-- ----------------------------
INSERT INTO `user_infos` VALUES ('276', '280', '20190619/M7RFskFynbNHZX6sbz0mn6wjAB9Lf5iTXHNfaxzv.png', null, 'w', null, '2019-06-13 21:36:46', '2019-06-19 15:32:09', null);
INSERT INTO `user_infos` VALUES ('277', '281', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:46', '2019-06-13 21:36:46', null);
INSERT INTO `user_infos` VALUES ('281', '285', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:47', '2019-06-13 21:36:47', null);
INSERT INTO `user_infos` VALUES ('282', '286', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:47', '2019-06-13 21:36:47', null);
INSERT INTO `user_infos` VALUES ('283', '287', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:47', '2019-06-13 21:36:47', null);
INSERT INTO `user_infos` VALUES ('284', '288', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:47', '2019-06-13 21:36:47', null);
INSERT INTO `user_infos` VALUES ('285', '289', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:47', '2019-06-13 21:36:47', null);
INSERT INTO `user_infos` VALUES ('286', '290', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:48', '2019-06-13 21:36:48', null);
INSERT INTO `user_infos` VALUES ('287', '291', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:48', '2019-06-13 21:36:48', null);
INSERT INTO `user_infos` VALUES ('288', '292', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:48', '2019-06-13 21:36:48', null);
INSERT INTO `user_infos` VALUES ('289', '293', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:48', '2019-06-13 21:36:48', null);
INSERT INTO `user_infos` VALUES ('290', '294', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:48', '2019-06-13 21:36:48', null);
INSERT INTO `user_infos` VALUES ('291', '295', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:49', '2019-06-13 21:36:49', null);
INSERT INTO `user_infos` VALUES ('292', '296', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:49', '2019-06-13 21:36:49', null);
INSERT INTO `user_infos` VALUES ('293', '297', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:49', '2019-06-13 21:36:49', null);
INSERT INTO `user_infos` VALUES ('294', '298', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:49', '2019-06-13 21:36:49', null);
INSERT INTO `user_infos` VALUES ('295', '299', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:49', '2019-06-13 21:36:49', null);
INSERT INTO `user_infos` VALUES ('296', '300', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:50', '2019-06-13 21:36:50', null);
INSERT INTO `user_infos` VALUES ('297', '301', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:50', '2019-06-13 21:36:50', null);
INSERT INTO `user_infos` VALUES ('298', '302', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:50', '2019-06-13 21:36:50', null);
INSERT INTO `user_infos` VALUES ('299', '303', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:50', '2019-06-13 21:36:50', null);
INSERT INTO `user_infos` VALUES ('300', '304', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:51', '2019-06-13 21:36:51', null);
INSERT INTO `user_infos` VALUES ('301', '305', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:51', '2019-06-13 21:36:51', null);
INSERT INTO `user_infos` VALUES ('302', '306', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:51', '2019-06-13 21:36:51', null);
INSERT INTO `user_infos` VALUES ('303', '307', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:36:52', '2019-06-13 21:36:52', null);
INSERT INTO `user_infos` VALUES ('304', '308', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:43', '2019-06-13 21:37:43', null);
INSERT INTO `user_infos` VALUES ('305', '309', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:43', '2019-06-13 21:37:43', null);
INSERT INTO `user_infos` VALUES ('306', '310', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:43', '2019-06-13 21:37:43', null);
INSERT INTO `user_infos` VALUES ('307', '311', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:43', '2019-06-13 21:37:43', null);
INSERT INTO `user_infos` VALUES ('308', '312', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:44', '2019-06-13 21:37:44', null);
INSERT INTO `user_infos` VALUES ('309', '313', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:44', '2019-06-13 21:37:44', null);
INSERT INTO `user_infos` VALUES ('310', '314', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:44', '2019-06-13 21:37:44', null);
INSERT INTO `user_infos` VALUES ('311', '315', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:44', '2019-06-13 21:37:44', null);
INSERT INTO `user_infos` VALUES ('312', '316', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:44', '2019-06-13 21:37:44', null);
INSERT INTO `user_infos` VALUES ('313', '317', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:44', '2019-06-13 21:37:44', null);
INSERT INTO `user_infos` VALUES ('314', '318', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:45', '2019-06-13 21:37:45', null);
INSERT INTO `user_infos` VALUES ('315', '319', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:45', '2019-06-13 21:37:45', null);
INSERT INTO `user_infos` VALUES ('316', '320', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:45', '2019-06-13 21:37:45', null);
INSERT INTO `user_infos` VALUES ('317', '321', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:45', '2019-06-13 21:37:45', null);
INSERT INTO `user_infos` VALUES ('318', '322', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:45', '2019-06-13 21:37:45', null);
INSERT INTO `user_infos` VALUES ('319', '323', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:45', '2019-06-13 21:37:45', null);
INSERT INTO `user_infos` VALUES ('320', '324', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:45', '2019-06-13 21:37:45', null);
INSERT INTO `user_infos` VALUES ('321', '325', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `user_infos` VALUES ('322', '326', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `user_infos` VALUES ('323', '327', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `user_infos` VALUES ('324', '328', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `user_infos` VALUES ('325', '329', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `user_infos` VALUES ('326', '330', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `user_infos` VALUES ('327', '331', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `user_infos` VALUES ('328', '332', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `user_infos` VALUES ('329', '333', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `user_infos` VALUES ('330', '334', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `user_infos` VALUES ('331', '335', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `user_infos` VALUES ('332', '336', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:46', '2019-06-13 21:37:46', null);
INSERT INTO `user_infos` VALUES ('333', '337', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `user_infos` VALUES ('334', '338', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `user_infos` VALUES ('335', '339', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `user_infos` VALUES ('336', '340', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `user_infos` VALUES ('337', '341', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `user_infos` VALUES ('338', '342', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `user_infos` VALUES ('339', '343', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `user_infos` VALUES ('340', '344', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `user_infos` VALUES ('341', '345', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `user_infos` VALUES ('342', '346', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `user_infos` VALUES ('343', '347', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `user_infos` VALUES ('344', '348', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `user_infos` VALUES ('345', '349', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `user_infos` VALUES ('346', '350', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:47', '2019-06-13 21:37:47', null);
INSERT INTO `user_infos` VALUES ('347', '351', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `user_infos` VALUES ('348', '352', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `user_infos` VALUES ('349', '353', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `user_infos` VALUES ('350', '354', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `user_infos` VALUES ('351', '355', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `user_infos` VALUES ('352', '356', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `user_infos` VALUES ('353', '357', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `user_infos` VALUES ('354', '358', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `user_infos` VALUES ('355', '359', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `user_infos` VALUES ('356', '360', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `user_infos` VALUES ('357', '361', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `user_infos` VALUES ('358', '362', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `user_infos` VALUES ('359', '363', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:48', '2019-06-13 21:37:48', null);
INSERT INTO `user_infos` VALUES ('360', '364', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `user_infos` VALUES ('361', '365', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `user_infos` VALUES ('362', '366', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `user_infos` VALUES ('363', '367', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `user_infos` VALUES ('364', '368', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `user_infos` VALUES ('365', '369', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `user_infos` VALUES ('366', '370', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `user_infos` VALUES ('367', '371', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `user_infos` VALUES ('368', '372', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `user_infos` VALUES ('369', '373', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `user_infos` VALUES ('370', '374', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `user_infos` VALUES ('371', '375', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `user_infos` VALUES ('372', '376', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `user_infos` VALUES ('373', '377', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:49', '2019-06-13 21:37:49', null);
INSERT INTO `user_infos` VALUES ('374', '378', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `user_infos` VALUES ('375', '379', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `user_infos` VALUES ('376', '380', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `user_infos` VALUES ('377', '381', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `user_infos` VALUES ('378', '382', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `user_infos` VALUES ('379', '383', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `user_infos` VALUES ('380', '384', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `user_infos` VALUES ('381', '385', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `user_infos` VALUES ('382', '386', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `user_infos` VALUES ('383', '387', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `user_infos` VALUES ('384', '388', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:50', '2019-06-13 21:37:50', null);
INSERT INTO `user_infos` VALUES ('385', '389', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:51', '2019-06-13 21:37:51', null);
INSERT INTO `user_infos` VALUES ('386', '390', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:51', '2019-06-13 21:37:51', null);
INSERT INTO `user_infos` VALUES ('387', '391', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:51', '2019-06-13 21:37:51', null);
INSERT INTO `user_infos` VALUES ('388', '392', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:51', '2019-06-13 21:37:51', null);
INSERT INTO `user_infos` VALUES ('389', '393', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:51', '2019-06-13 21:37:51', null);
INSERT INTO `user_infos` VALUES ('390', '394', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:51', '2019-06-13 21:37:51', null);
INSERT INTO `user_infos` VALUES ('391', '395', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:51', '2019-06-13 21:37:51', null);
INSERT INTO `user_infos` VALUES ('392', '396', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:51', '2019-06-13 21:37:51', null);
INSERT INTO `user_infos` VALUES ('393', '397', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:52', '2019-06-13 21:37:52', null);
INSERT INTO `user_infos` VALUES ('394', '398', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:55', '2019-06-13 21:37:55', null);
INSERT INTO `user_infos` VALUES ('395', '399', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:55', '2019-06-13 21:37:55', null);
INSERT INTO `user_infos` VALUES ('396', '400', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:55', '2019-06-13 21:37:55', null);
INSERT INTO `user_infos` VALUES ('397', '401', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:55', '2019-06-13 21:37:55', null);
INSERT INTO `user_infos` VALUES ('398', '402', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:56', '2019-06-13 21:37:56', null);
INSERT INTO `user_infos` VALUES ('399', '403', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:56', '2019-06-13 21:37:56', null);
INSERT INTO `user_infos` VALUES ('400', '404', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:56', '2019-06-13 21:37:56', null);
INSERT INTO `user_infos` VALUES ('401', '405', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:56', '2019-06-13 21:37:56', null);
INSERT INTO `user_infos` VALUES ('402', '406', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:56', '2019-06-13 21:37:56', null);
INSERT INTO `user_infos` VALUES ('403', '407', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:56', '2019-06-13 21:37:56', null);
INSERT INTO `user_infos` VALUES ('404', '408', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:57', '2019-06-13 21:37:57', null);
INSERT INTO `user_infos` VALUES ('405', '409', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:57', '2019-06-13 21:37:57', null);
INSERT INTO `user_infos` VALUES ('406', '410', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:57', '2019-06-13 21:37:57', null);
INSERT INTO `user_infos` VALUES ('407', '411', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:57', '2019-06-13 21:37:57', null);
INSERT INTO `user_infos` VALUES ('408', '412', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:57', '2019-06-13 21:37:57', null);
INSERT INTO `user_infos` VALUES ('409', '413', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:58', '2019-06-13 21:37:58', null);
INSERT INTO `user_infos` VALUES ('410', '414', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:58', '2019-06-13 21:37:58', null);
INSERT INTO `user_infos` VALUES ('411', '415', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:58', '2019-06-13 21:37:58', null);
INSERT INTO `user_infos` VALUES ('412', '416', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:58', '2019-06-13 21:37:58', null);
INSERT INTO `user_infos` VALUES ('413', '417', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:58', '2019-06-13 21:37:58', null);
INSERT INTO `user_infos` VALUES ('414', '418', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:58', '2019-06-13 21:37:58', null);
INSERT INTO `user_infos` VALUES ('415', '419', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:59', '2019-06-13 21:37:59', null);
INSERT INTO `user_infos` VALUES ('416', '420', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:59', '2019-06-13 21:37:59', null);
INSERT INTO `user_infos` VALUES ('417', '421', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:59', '2019-06-13 21:37:59', null);
INSERT INTO `user_infos` VALUES ('418', '422', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:59', '2019-06-13 21:37:59', null);
INSERT INTO `user_infos` VALUES ('419', '423', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:37:59', '2019-06-13 21:37:59', null);
INSERT INTO `user_infos` VALUES ('420', '424', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:38:00', '2019-06-13 21:38:00', null);
INSERT INTO `user_infos` VALUES ('421', '425', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:38:00', '2019-06-13 21:38:00', null);
INSERT INTO `user_infos` VALUES ('422', '426', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:38:00', '2019-06-13 21:38:00', null);
INSERT INTO `user_infos` VALUES ('423', '427', '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg', null, 'w', null, '2019-06-13 21:38:00', '2019-06-13 21:38:00', null);
INSERT INTO `user_infos` VALUES ('425', '440', '/20190619/M7RFskFynbNHZX6sbz0mn6wjAB9Lf5iTXHNfaxzv.png', null, 'w', null, '2019-06-20 12:52:58', '2019-06-20 12:52:58', null);
INSERT INTO `user_infos` VALUES ('426', '441', '/20190619/M7RFskFynbNHZX6sbz0mn6wjAB9Lf5iTXHNfaxzv.png', null, 'w', null, '2019-06-20 13:26:25', '2019-06-20 13:26:25', null);
INSERT INTO `user_infos` VALUES ('427', '444', '/20190619/M7RFskFynbNHZX6sbz0mn6wjAB9Lf5iTXHNfaxzv.png', null, 'w', null, '2019-06-24 09:22:17', '2019-06-24 09:22:17', null);
INSERT INTO `user_infos` VALUES ('428', '445', '/20190619/M7RFskFynbNHZX6sbz0mn6wjAB9Lf5iTXHNfaxzv.png', null, 'w', null, '2019-06-24 09:22:54', '2019-06-24 09:22:54', null);
INSERT INTO `user_infos` VALUES ('429', '446', '/20190619/M7RFskFynbNHZX6sbz0mn6wjAB9Lf5iTXHNfaxzv.png', null, 'w', null, '2019-06-24 09:46:51', '2019-06-24 09:46:51', null);
INSERT INTO `user_infos` VALUES ('430', '447', '/20190619/M7RFskFynbNHZX6sbz0mn6wjAB9Lf5iTXHNfaxzv.png', null, 'w', null, '2019-06-24 09:50:12', '2019-06-24 09:50:12', null);
INSERT INTO `user_infos` VALUES ('431', '448', '/20190619/M7RFskFynbNHZX6sbz0mn6wjAB9Lf5iTXHNfaxzv.png', null, 'w', null, '2019-06-24 10:33:12', '2019-06-24 10:33:12', null);
INSERT INTO `user_infos` VALUES ('432', '449', '/20190619/M7RFskFynbNHZX6sbz0mn6wjAB9Lf5iTXHNfaxzv.png', null, 'w', null, '2019-06-24 11:19:48', '2019-06-24 11:19:48', null);
INSERT INTO `user_infos` VALUES ('433', '450', '/20190619/M7RFskFynbNHZX6sbz0mn6wjAB9Lf5iTXHNfaxzv.png', null, 'w', null, '2019-06-24 11:31:06', '2019-06-24 11:31:06', null);
INSERT INTO `user_infos` VALUES ('434', '451', '/20190619/M7RFskFynbNHZX6sbz0mn6wjAB9Lf5iTXHNfaxzv.png', null, 'w', null, '2019-06-24 12:01:50', '2019-06-24 12:01:50', null);
INSERT INTO `user_infos` VALUES ('435', '452', '/20190619/M7RFskFynbNHZX6sbz0mn6wjAB9Lf5iTXHNfaxzv.png', null, 'w', null, '2019-06-24 12:35:25', '2019-06-24 12:35:25', null);
INSERT INTO `user_infos` VALUES ('436', '453', '/20190619/M7RFskFynbNHZX6sbz0mn6wjAB9Lf5iTXHNfaxzv.png', null, 'w', null, '2019-06-24 12:48:36', '2019-06-24 12:48:36', null);

-- ----------------------------
-- Table structure for web_configs
-- ----------------------------
DROP TABLE IF EXISTS `web_configs`;
CREATE TABLE `web_configs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '网站名称',
  `describe` varchar(255) NOT NULL COMMENT '网站描述',
  `logo` varchar(255) DEFAULT NULL COMMENT '网站logo',
  `filing` varchar(255) NOT NULL COMMENT '网站备案号',
  `telephone` varchar(255) NOT NULL COMMENT '联系方式',
  `status` int(10) NOT NULL DEFAULT '1' COMMENT '网站开关',
  `created_at` datetime NOT NULL COMMENT '添加时间',
  `updated_at` datetime NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_configs
-- ----------------------------
INSERT INTO `web_configs` VALUES ('1', 'LGM商城', '这是三位伟大的程序员的出山之作', '20190619/BTFozMI0vTecgEs7g9xE40yBfuDEBGJ1G3HFHeOj.jpeg', '京ICP证999999号  京公网安备99999999999999号', '13999999998', '1', '2019-06-19 23:21:25', '2019-06-21 09:11:32');

-- ----------------------------
-- Table structure for works
-- ----------------------------
DROP TABLE IF EXISTS `works`;
CREATE TABLE `works` (
  `wid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wtitle` varchar(255) NOT NULL COMMENT '文章标题',
  `writer` varchar(32) NOT NULL DEFAULT '' COMMENT '文章作者名',
  `wdesc` varchar(255) NOT NULL COMMENT '文章描述',
  `wcontent` text NOT NULL COMMENT '文章内容',
  `status` int(10) NOT NULL DEFAULT '1' COMMENT '1:显示  2:不显示',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`wid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of works
-- ----------------------------
INSERT INTO `works` VALUES ('5', '人情味儿', '奥术大师', '人情味儿', '<p>网上的若哇多<br/></p>', '1', '2019-06-21 16:24:59', '2019-06-24 13:47:21');
INSERT INTO `works` VALUES ('6', '人情味儿', '阿斯顿发送到', '人情味儿', '<p>&nbsp;我去二无群二武切维奇求吻<br/></p>', '1', '2019-06-21 16:26:14', '2019-06-21 18:35:21');
INSERT INTO `works` VALUES ('7', '瓦尔特委托为', '发送到发送到', '尔特人二维', '<p>体弱沃尔沃二为<br/></p>', '1', '2019-06-21 16:27:14', '2019-06-21 18:35:29');

-- ----------------------------
-- View structure for view_goods_word
-- ----------------------------
DROP VIEW IF EXISTS `view_goods_word`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `view_goods_word` AS SELECT
goods_word.id,
goods_word.word,
goods_word.gid
FROM
goods_word ;
