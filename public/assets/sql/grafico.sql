/*
Navicat MySQL Data Transfer

Source Server         : db
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : grafico

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-08-29 17:33:51
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articulos
-- ----------------------------

-- ----------------------------
-- Table structure for `dimensions`
-- ----------------------------
DROP TABLE IF EXISTS `dimensions`;
CREATE TABLE `dimensions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descipcion` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dimensions
-- ----------------------------
INSERT INTO `dimensions` VALUES ('1', 'UNA PLANA', '1342018398', '1342018398');
INSERT INTO `dimensions` VALUES ('2', 'MEDIA PLANA', '1342018404', '1342018404');
INSERT INTO `dimensions` VALUES ('3', 'TRES PLANAS', '1342018410', '1342018410');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fotos
-- ----------------------------

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
INSERT INTO `migration` VALUES ('app', 'default', '003_create_users');
INSERT INTO `migration` VALUES ('app', 'default', '004_create_users_2');
INSERT INTO `migration` VALUES ('app', 'default', '005_create_users_3');
INSERT INTO `migration` VALUES ('app', 'default', '006_create_dimensions');
INSERT INTO `migration` VALUES ('app', 'default', '007_create_seccions');

-- ----------------------------
-- Table structure for `seccions`
-- ----------------------------
DROP TABLE IF EXISTS `seccions`;
CREATE TABLE `seccions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of seccions
-- ----------------------------
INSERT INTO `seccions` VALUES ('1', 'Deportes', '1342106667', '1342106667');
INSERT INTO `seccions` VALUES ('3', 'Nacional', '1342106680', '1342106680');
INSERT INTO `seccions` VALUES ('4', 'Crónica Roja', '1342106689', '1342106689');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '100', 'admin@elmercurio.com', '1346274501', '1e9d93614e8394c015343ca1fbb6913c384feade', 'a:0:{}', '1341514271', '0');
INSERT INTO `users` VALUES ('6', 'editor', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '50', 'editor@elmercurio.com', '1346276573', 'e9c0cad31ae299127aca684e7e9b7947c54478da', 'a:0:{}', '1342473649', '0');
INSERT INTO `users` VALUES ('7', 'periodista', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'periodista@elmercurio.com', '1346274442', '56a47011443b1d7e36d896647d74a177e3f91bff', 'a:0:{}', '1346273528', '0');
INSERT INTO `users` VALUES ('8', 'diagramador', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '25', 'diagramador@elmercurio.com', '1346276692', '848b6dedfe104ba8779caf158302758b3828b38f', 'a:0:{}', '1346275067', '0');
