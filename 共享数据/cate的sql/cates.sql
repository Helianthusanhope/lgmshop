/*
Navicat MySQL Data Transfer

Source Server         : 本地数据库服务器
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : lgmshop

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-06-26 12:06:09
*/

SET FOREIGN_KEY_CHECKS=0;

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
