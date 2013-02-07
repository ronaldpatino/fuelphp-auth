/*
Navicat MySQL Data Transfer

Source Server         : db
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : grafico

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2013-02-07 15:04:26
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
  `pagina_id` int(11) NOT NULL,
  `fecha_publicacion` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dimensions
-- ----------------------------
INSERT INTO `dimensions` VALUES ('1', 'UNA PLANA', '1342018398', '1342018398');
INSERT INTO `dimensions` VALUES ('2', 'MEDIA PLANA', '1342018404', '1342018404');
INSERT INTO `dimensions` VALUES ('3', 'TRES PLANAS', '1342018410', '1342018410');
INSERT INTO `dimensions` VALUES ('4', 'DESCONOCIDA', '1346338133', '1346338141');

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
-- Table structure for `paginas`
-- ----------------------------
DROP TABLE IF EXISTS `paginas`;
CREATE TABLE `paginas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of paginas
-- ----------------------------
INSERT INTO `paginas` VALUES ('1', '1A', '1360003206', '1360003206');
INSERT INTO `paginas` VALUES ('2', '2A', '1360003303', '1360003303');
INSERT INTO `paginas` VALUES ('3', '3A', '1360003312', '1360003312');

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
INSERT INTO `seccions` VALUES ('1', 'Deportes', '1342106667', '1346337482');
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
INSERT INTO `sessions` VALUES ('241e013cda09088b0e160a6c73fd3e8d', '241e013cda09088b0e160a6c73fd3e8d', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/13.0.782.112 Safari/535.1', '4869e012aa045958bdf5c461577cf02d', '1360245562', '1360245562', 'a:2:{i:0;a:3:{s:8:\"username\";s:10:\"periodista\";s:10:\"login_hash\";s:40:\"190c4159b9e9bf096022fb0bd508339d7683d6cb\";s:8:\"template\";s:16:\"template_gallery\";}i:1;a:0:{}}');
INSERT INTO `sessions` VALUES ('c7a75f87733f539b710d746120381de1', '53adf5196fd5e04119233afb3d0ed273', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/13.0.782.112 Safari/535.1', '4869e012aa045958bdf5c461577cf02d', '1360252191', '1360252196', 'a:2:{i:0;a:1:{s:8:\"template\";s:20:\"template_diagramador\";}i:1;a:0:{}}');

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
  `padre` int(11) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `last_login` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `login_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profile_fields` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) unsigned NOT NULL,
  `updated_at` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '100', 'admin@elmercurio.com.ec', '0', '', '1360170750', '3f2639c336c75bd68c70994107942cddec203735', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1341514271', '0');
INSERT INTO `users` VALUES ('2', 'editor', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '50', 'editor@elmercurio.com', '0', 'mercurio', '1360250193', '3d07f460ee6a430a836a89658be6078a367bcff6', 'a:0:{}', '1342473649', '0');
INSERT INTO `users` VALUES ('3', 'periodista', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'periodista@elmercurio.com', '2', 'mercurio', '1360245562', '190c4159b9e9bf096022fb0bd508339d7683d6cb', 'a:1:{s:10:\"acceso_web\";s:1:\"1\";}', '1346273528', '0');
INSERT INTO `users` VALUES ('4', 'diagramador', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '25', 'diagramador@elmercurio.com', '2', 'mercurio', '1360251026', 'cc38c8448f5824cfe18a6d106e09e252cf83c71b', '', '1346275067', '0');
