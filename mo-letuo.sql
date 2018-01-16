/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : mo-letuo

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-01-16 14:25:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(36) DEFAULT NULL,
  `phone` varchar(24) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `contect` varchar(128) NOT NULL,
  `time` int(10) NOT NULL,
  `ip` varchar(16) DEFAULT NULL,
  `c` varchar(48) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('1', '陈陈', '18336344625', '1', '9', '0', '1516081068', '127.0.0.1', '');
INSERT INTO `order` VALUES ('2', '陈啊陈', '18336345124', '1', '9', '是的 为', '1516081204', '127.0.0.1', '');
INSERT INTO `order` VALUES ('3', '里啊', '13898654578', '2', '12', '辅导费施肥是否', '1516081250', '127.0.0.1', 'test');

-- ----------------------------
-- Table structure for `shop`
-- ----------------------------
DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(32) DEFAULT NULL,
  `shop_name` varchar(128) DEFAULT NULL,
  `shop_address` varchar(128) DEFAULT NULL,
  `shop_mobile` varchar(64) DEFAULT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop
-- ----------------------------
INSERT INTO `shop` VALUES ('1', '重庆', null, null, null, '0');
INSERT INTO `shop` VALUES ('2', '佛山', null, null, null, '0');
INSERT INTO `shop` VALUES ('3', '中山', null, null, null, '0');
INSERT INTO `shop` VALUES ('4', '深圳', null, null, null, '0');
INSERT INTO `shop` VALUES ('5', '惠州', null, null, null, '0');
INSERT INTO `shop` VALUES ('6', '天门', null, null, null, '0');
INSERT INTO `shop` VALUES ('7', '秦皇岛', null, null, null, '0');
INSERT INTO `shop` VALUES ('8', '南宁', null, null, null, '0');
INSERT INTO `shop` VALUES ('9', null, '沙坪坝店', '重庆市沙坪坝区炫地商城5楼', '023-65749379', '1');
INSERT INTO `shop` VALUES ('10', null, '合川店', '重庆市合川区双牌坊街9号南洋百货2楼', '023-85181877', '1');
INSERT INTO `shop` VALUES ('11', null, '巴南店', '重庆市巴南区鱼洞街道新市街80号协信购物广场3楼', '023-62335896', '1');
INSERT INTO `shop` VALUES ('12', null, '桂城店', '佛山市南海区桂城街道桂澜中路23号万科金域国际花园8座一层', '0757-86221567/89955309', '2');
INSERT INTO `shop` VALUES ('13', null, '西南店', '佛山市三水区西南街道兴达路7号汇丰豪园121铺', '0757-87731599/88517480', '2');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(128) NOT NULL,
  `create_time` int(10) NOT NULL,
  `update_time` int(10) DEFAULT NULL,
  `login_time` int(10) DEFAULT NULL,
  `ip` varchar(48) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '$2y$10$BMX/JDTSpXLSHZ/kjUjSmu3JyepTKS4UrTQIGD8NG0Qur.MaZQakC', '1509690166', '1510730719', '1516079408', '127.0.0.1', '1');
