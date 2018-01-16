/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mo-letuo

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-01-15 21:37:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `common`
-- ----------------------------
DROP TABLE IF EXISTS `common`;
CREATE TABLE `common` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` int(3) NOT NULL,
  `val` varchar(36) NOT NULL,
  `type` varchar(8) NOT NULL,
  `order` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of common
-- ----------------------------
INSERT INTO `common` VALUES ('1', '1', '建设银行', 'bank', '1');
INSERT INTO `common` VALUES ('2', '2', '农业银行', 'bank', '1');
INSERT INTO `common` VALUES ('3', '3', '中国银行', 'bank', '1');
INSERT INTO `common` VALUES ('4', '4', '工商银行', 'bank', '3');
INSERT INTO `common` VALUES ('5', '5', '交通银行', 'bank', '2');
INSERT INTO `common` VALUES ('6', '5', '5万', 'quato', '5');
INSERT INTO `common` VALUES ('7', '10', '10万', 'quato', '10');
INSERT INTO `common` VALUES ('8', '15', '15万', 'quato', '15');
INSERT INTO `common` VALUES ('9', '20', '20万', 'quato', '20');
INSERT INTO `common` VALUES ('10', '6', '邮政银行', 'bank', '1');
INSERT INTO `common` VALUES ('11', '7', '- 选择银行 -', 'test', '3');
INSERT INTO `common` VALUES ('12', '8', '平安银行', 'bank', '1');
INSERT INTO `common` VALUES ('13', '9', '光大银行', 'bank', '1');
INSERT INTO `common` VALUES ('14', '10', '浦发银行', 'bank', '1');
INSERT INTO `common` VALUES ('15', '11', '中兴银行', 'test', '1');
INSERT INTO `common` VALUES ('16', '12', '华夏银行', 'bank', '1');
INSERT INTO `common` VALUES ('17', '13', '兴业银行', 'bank', '1');
INSERT INTO `common` VALUES ('18', '14', '招商银行', 'bank', '2');
INSERT INTO `common` VALUES ('19', '25', '25万', 'quato', '25');
INSERT INTO `common` VALUES ('20', '30', '30万', 'quato', '30');
INSERT INTO `common` VALUES ('21', '35', '35万', 'quato', '35');
INSERT INTO `common` VALUES ('22', '40', '40万', 'quato', '40');
INSERT INTO `common` VALUES ('23', '45', '45万', 'quato', '45');
INSERT INTO `common` VALUES ('24', '50', '50万', 'quato', '50');
INSERT INTO `common` VALUES ('25', '6', '6万', 'quato', '6');
INSERT INTO `common` VALUES ('26', '3', '3万', 'quato', '3');
INSERT INTO `common` VALUES ('27', '7', '7万', 'quato', '7');
INSERT INTO `common` VALUES ('28', '8', '8万', 'quato', '8');
INSERT INTO `common` VALUES ('29', '9', '9万', 'quato', '9');
INSERT INTO `common` VALUES ('30', '0', '广州银行', 'bank', '0');

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(36) DEFAULT NULL,
  `phone` varchar(24) DEFAULT NULL,
  `cardid` varchar(36) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `quato` tinyint(1) NOT NULL,
  `time` int(10) NOT NULL,
  `ip` varchar(16) DEFAULT NULL,
  `c` varchar(48) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------

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
INSERT INTO `shop` VALUES ('9', null, '佰花方专业祛斑中心（沙坪坝店）', '重庆市沙坪坝区炫地商城5楼', '023-65749379', '1');
INSERT INTO `shop` VALUES ('10', null, '佰花方专业祛斑中心（合川店）', '重庆市合川区双牌坊街9号南洋百货2楼', '023-85181877', '1');
INSERT INTO `shop` VALUES ('11', null, '佰花方专业祛斑中心（巴南店）', '重庆市巴南区鱼洞街道新市街80号协信购物广场3楼', '023-62335896', '1');
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
INSERT INTO `user` VALUES ('1', 'admin', '$2y$10$BMX/JDTSpXLSHZ/kjUjSmu3JyepTKS4UrTQIGD8NG0Qur.MaZQakC', '1509690166', '1510730719', '1511847123', '127.0.0.1', '1');
