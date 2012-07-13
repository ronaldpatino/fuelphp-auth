/*
Navicat MySQL Data Transfer

Source Server         : db
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : grafico

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-07-13 17:15:01
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articulos
-- ----------------------------
INSERT INTO `articulos` VALUES ('1', 'test1', '1', '1', '1341502672', '1341502672');
INSERT INTO `articulos` VALUES ('2', 'test2', '1', '1', '1341502681', '1341502681');
INSERT INTO `articulos` VALUES ('3', 'ART1', '1', '3', '1341502691', '1341502691');
INSERT INTO `articulos` VALUES ('7', 'ART3', '1', '1', '1341582147', '1341582147');
INSERT INTO `articulos` VALUES ('8', 'ACTUAL', '1', '1', '1342017918', '1342017918');
INSERT INTO `articulos` VALUES ('9', 'NUEVO', '1', '1', '1342025647', '1342025647');
INSERT INTO `articulos` VALUES ('10', 'Articulo', '1', '1', '1342028484', '1342028484');
INSERT INTO `articulos` VALUES ('16', 'test', '1', '2', '1342112986', '1342113267');
INSERT INTO `articulos` VALUES ('18', 'TEST', '1', '2', '1342193703', '1342193703');
INSERT INTO `articulos` VALUES ('19', 'prueba desde el periodista', '2', '1', '1342215535', '1342215535');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fotos
-- ----------------------------
INSERT INTO `fotos` VALUES ('4', '/photos/Nueva%20carpeta/ganesha_symbolism_1.jpg', '110', '110', '16', '1', '0', '1342113237', '1342113237');
INSERT INTO `fotos` VALUES ('5', '/photos/uno/avatar.jpg', '110', '110', '16', '1', '0', '1342113250', '1342113250');
INSERT INTO `fotos` VALUES ('6', '/photos/tres/genre-blues.jpg', '110', '110', '16', '1', '0', '1342113317', '1342113317');
INSERT INTO `fotos` VALUES ('12', '/photos/tres/genre-blues.jpg', '110', '110', '18', '2', '0', '1342194084', '1342194084');
INSERT INTO `fotos` VALUES ('13', '/photos/uno/avatar.jpg', '110', '110', '18', '1', '0', '1342194130', '1342194130');
INSERT INTO `fotos` VALUES ('14', '/photos/dos/Copia%20(2)%20de%203893029006_4b1e514f85.jpg', '110', '110', '18', '1', '0', '1342194457', '1342194457');
INSERT INTO `fotos` VALUES ('15', '/photos/Nueva%20carpeta/ganesha_symbolism_1.jpg', '110', '110', '19', '1', '0', '1342215664', '1342215664');
INSERT INTO `fotos` VALUES ('16', '/photos/Copia%20de%20tres/art.jpg', '110', '110', '19', '1', '0', '1342216191', '1342216191');

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
INSERT INTO `seccions` VALUES ('2', 'Cultural', '1342106676', '1342106676');
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
INSERT INTO `sessions` VALUES ('3706380dde15235d81f6fc7444a54ff1', '3706380dde15235d81f6fc7444a54ff1', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/13.0.782.112 Safari/535.1', '4869e012aa045958bdf5c461577cf02d', '1342210684', '1342210684', 'a:2:{i:0;a:2:{s:8:\"username\";s:5:\"admin\";s:10:\"login_hash\";s:40:\"5894e85dfd96c0bf218a9d7acbb0be99ea13fbb7\";}i:1;a:0:{}}');
INSERT INTO `sessions` VALUES ('67b4365fda79c56fb8b0a6d8f45bfab4', 'ed356668c9daece99ca3c08518f7236c', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/13.0.782.112 Safari/535.1', '4869e012aa045958bdf5c461577cf02d', '1342217682', '1342217682', 'a:2:{i:0;a:2:{s:8:\"username\";s:5:\"admin\";s:10:\"login_hash\";s:40:\"2fb6a3df1eb287fd9fd1db0bdcfc03f97a6126c3\";}i:1;a:0:{}}');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'G3J4FzF6UZPc3eJPwXC/MU/zluEYQSF1UNcLrePKVKQ=', '100', 'user@user.com', '1342216246', '2fb6a3df1eb287fd9fd1db0bdcfc03f97a6126c3', 'a:0:{}', '1341514271', '0');
INSERT INTO `users` VALUES ('2', 'ronaldpatino', 'G9jS6lnpGOJpCz1iWnhUTJKK8kEz8M2vLc6FklTVh5w=', '1', 'ronaldpatino@gmail.com', '1342215344', 'c2a5a68fbb3698cd8d410006e3a324010f9e4bcd', 'a:0:{}', '1342215264', '0');
