/*
Navicat MySQL Data Transfer

Source Server         : db
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : grafico

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-07-10 17:45:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `articulos`
-- ----------------------------
DROP TABLE IF EXISTS `articulos`;
CREATE TABLE `articulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `periodista_id` int(11) NOT NULL,
  `seccion_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articulos
-- ----------------------------
INSERT INTO `articulos` VALUES ('1', 'test1', '1', '1', '1341502672', '1341502672');
INSERT INTO `articulos` VALUES ('2', 'test2', '1', '1', '1341502681', '1341502681');
INSERT INTO `articulos` VALUES ('3', 'ART1', '1', '3', '1341502691', '1341502691');
INSERT INTO `articulos` VALUES ('7', 'ART3', '1', '1', '1341582147', '1341582147');

-- ----------------------------
-- Table structure for `fotos`
-- ----------------------------
DROP TABLE IF EXISTS `fotos`;
CREATE TABLE `fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` text NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `articulo_id` int(11) NOT NULL,
  `dimension_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fotos
-- ----------------------------
INSERT INTO `fotos` VALUES ('1', 'mars.jpg', '110', '110', '1', '1', '0', '1341502794', '1341502794');
INSERT INTO `fotos` VALUES ('2', 'sample_colors.jpg', '110', '110', '1', '1', '1', '1341502834', '1341502834');
INSERT INTO `fotos` VALUES ('3', 'rover.jpg', '110', '110', '1', '1', '2', '1341502852', '1341502852');
INSERT INTO `fotos` VALUES ('5', 'mars.jpg', '110', '110', '2', '1', '0', '1341524796', '1341524796');
INSERT INTO `fotos` VALUES ('7', 'rover.jpg', '110', '110', '2', '1', '1', '1341524838', '1341524838');
INSERT INTO `fotos` VALUES ('8', 'http://localhost/mg/photos/uno/4988199.jpg', '110', '110', '3', '3', '0', '1341867186', '1341867186');
INSERT INTO `fotos` VALUES ('10', 'http://localhost/mg/photos/uno/3893029006_4b1e514f85.jpg', '110', '110', '3', '3', '0', '1341867321', '1341867321');
INSERT INTO `fotos` VALUES ('11', 'http://localhost/mg/photos/uno/pasta.jpg', '110', '110', '3', '3', '0', '1341867368', '1341867368');
INSERT INTO `fotos` VALUES ('13', 'http://localhost/mg/photos/uno/3893029006_4b1e514f85.jpg', '110', '110', '5', '3', '0', '1341868469', '1341868469');
INSERT INTO `fotos` VALUES ('15', 'http://localhost/mg/photos/uno/pasta.jpg', '110', '110', '4', '4', '0', '1341868578', '1341868578');
INSERT INTO `fotos` VALUES ('16', 'http://localhost/mg/photos/uno/cherry.jpg', '110', '110', '4', '3', '0', '1341868817', '1341868817');
INSERT INTO `fotos` VALUES ('26', 'http://localhost/mg/photos/dos/avatar.jpg', '110', '110', '2', '2', '0', '1341938012', '1341938012');
INSERT INTO `fotos` VALUES ('29', 'http://localhost/mg/photos/uno/3053388158_f0e007f08b_z.jpg', '110', '110', '2', '2', '0', '1341938106', '1341938106');

-- ----------------------------
-- Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('app', 'default', '001_create_articulos');
INSERT INTO `migration` VALUES ('app', 'default', '002_create_fotos');

-- ----------------------------
-- Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL,
  `previous_id` varchar(40) NOT NULL,
  `user_agent` text NOT NULL,
  `ip_hash` char(32) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `updated` int(10) unsigned NOT NULL,
  `payload` longtext NOT NULL,
  PRIMARY KEY (`session_id`),
  UNIQUE KEY `previous_id` (`previous_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('d91e37f61f658c3c5cfbb8017cec92b6', '73c23d7694b7fb0290f9675a6b5f957c', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/13.0.782.112 Safari/535.1', '4869e012aa045958bdf5c461577cf02d', '1341851814', '1341851814', 'a:2:{i:0;a:2:{s:8:\"username\";s:5:\"admin\";s:10:\"login_hash\";s:40:\"3bc3374cfd43c5f9d7f9d7dec555011d7ab95fb1\";}i:1;a:0:{}}');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `group` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_login` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `login_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profile_fields` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) unsigned NOT NULL,
  `updated_at` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'G3J4FzF6UZPc3eJPwXC/MU/zluEYQSF1UNcLrePKVKQ=', '100', 'user@user.com', '1341933137', 'c55a0fafbd41bae84c9389f28cd814c8446671be', 'a:0:{}', '1341514271', '0');
