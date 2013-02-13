/*
Navicat MySQL Data Transfer

Source Server         : db
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : grafico

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2013-02-13 16:05:36
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
-- Table structure for `ayudas`
-- ----------------------------
DROP TABLE IF EXISTS `ayudas`;
CREATE TABLE `ayudas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `video` text NOT NULL,
  `descripcion` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ayudas
-- ----------------------------
INSERT INTO `ayudas` VALUES ('1', '1', 'Crear nueva noticia', 'crear_articulo.mp4', '<p>\r\nPara crear una noticia noticia nueva, seleccionamos el menú <strong>Artículos</strong>. En la parte superior, tenemos un formulario en el cual ingresamos:\r\n<ul>\r\n<li>Nombre del artículo o noticia</li>\r\n<li>Página en la que va a ser publicada</li>\r\n<li>Sección en la que va a ser publicada</li>\r\n<li>Fecha en la que va a ser publicada</li>\r\n</ul>\r\n\r\nLuego de ingresar estos datos damos clic en el botón <input class=\"btn btn-primary\" name=\"submit\" value=\"Crear Articulo\" type=\"submit\" id=\"form_submit\">\r\n</p>\r\n\r\n<div class=\"alert alert-error\"  id=\"alerta_error\">\r\n    <h4 class=\"alert-heading\">Atención!</h4>\r\n    <strong>Si</strong> es posible colocar una fecha de publicación a futuro en la noticia. \r\n</div>\r\n', '1360332068', '1360769911');
INSERT INTO `ayudas` VALUES ('2', '1', 'Editar una noticia', 'editar_articulo.mp4', '<p>\r\nEn el caso de que sea necesario modificar los datos de una noticia, lo podemos hacer dando clic en <a class=\"btn\" href=\"#\"><i class=\"icon-edit\"></i> Editar</a>, lo cual nos llevará a una nueva pantalla.\r\n</p>\r\n<p>\r\nCuando hayamos hecho los cambios necesarios damos clic en  <input class=\"btn primary\" name=\"submit\" value=\"Save\" type=\"submit\" id=\"form_submit\"> para guardar los cambios. En caso de <strong>no</strong> querer guardar los cambios, damos clic en <a href=\"#\">Regresar</a>\r\n</p>', '1360340755', '1360770095');
INSERT INTO `ayudas` VALUES ('3', '1', 'Borrar Noticia', 'borrar_articulo.mp4', '<p> En el caso de que sea necesario borrar una noticia, lo podemos hacer dando clic en <a class=\"btn\" href=\"#\"><i class=\"icon-trash\"></i> Borrar</a>, antes de borrar nos pedirá confirmar si deseamos borrar o no la noticia.\r\n</p>', '1360340900', '1360770203');
INSERT INTO `ayudas` VALUES ('4', '1', 'Agregar fotos a noticias', 'foto_articulo.mp4', '<p>\r\nPara agregar fotos a un noticia o artículo creado damos clic en <a class=\"btn\" href=\"\"><i class=\"icon-picture\"></i> Foto</a>, esto nos llevará a la <strong>Galería</strong> en la cual podemos elegir la foto que queremos.\r\n</p>\r\n\r\n<p>\r\nPara relacionar la foto que deseamos con la noticia, damos clic en la foto seleccionada, al hacerlo una ventana se nos abre, en ella tenemos 3 ítems en la parte inferior el primero es una lista desplegable con las noticias que hemos creado, por defecto la noticia en la que dimos clic en el botón <a class=\"btn\" href=\"\"><i class=\"icon-picture\"></i> Foto</a> está seleccionada, luego seleccionamos las medidas y finalmente el botón <button type=\"submit\" class=\"btn btn-primary\"><i class=\"icon-plus\"></i> Agregar Imagen</button> en el que damos clic para terminar el proceso de agregar una foto\r\n</p>\r\n\r\n<div class=\"alert alert-error\"> <h4 class=\"alert-heading\">Atención!</h4> Al momento de seleccionar la foto, la noticia en la que se dio clic en el botón <a class=\"btn\" href=\"#\"><i class=\"icon-picture\"></i> Foto</a> es seleccionada automáticamente en la lista desplegable. Se debe revisar que la noticia correcta esté seleccionada de la lista desplegable en otro caso la foto puede ser asignada por error a otra noticia. </div>', '1360341491', '1360770893');
INSERT INTO `ayudas` VALUES ('5', '1', 'Manejo de imágenes asignadas a una noticia', 'foto_operaciones.mp4', '<p>\r\nLa fotos que seleccionamos en la galería han sido asignadas a la noticia correspondiente. El editor con su pantalla puede aprobar o rechazar las fotos que hemos seleccionado.\r\n</p>\r\n<p>\r\nExisten tres estados para una foto que ha sido seleccionada\r\n<ul>\r\n<li>Foto rechazada por el Editor <a class=\"btn btn-danger\" rel=\"tooltip\" data-original-title=\"Foto rechazada por el editor\" href=\"#\"><i class=\"icon-ban-circle\"></i>\r\n</a></li>\r\n<li>Foto aprobada por el Editor <a class=\"btn btn-success\" rel=\"tooltip\" data-original-title=\"Foto aprobada por el editor\" href=\"#\"><i class=\"icon-ok-sign\"></i></a></li>\r\n<li>Foto a aprobar por el Editor (aún no ha sido revisada)\r\n<a class=\"btn btn-warning\" rel=\"tooltip\" data-original-title=\"Foto a aprobar por el editor\" href=\"#\"><i class=\"icon-question-sign\"></i></a>\r\n</li>\r\n</ul>\r\n</p>\r\n\r\n<p>\r\nEn caso de ser necesario, la foto puede ser <strong>Borrada</strong> de la noticia, dando clic en el botón <a class=\"btn\" rel=\"tooltip\" data-original-title=\"Borrar foto del articulo\"  href=\"#\"><i class=\"icon-trash\"></i></a>, nos pedirá confirmar si deseamos o no eliminar la foto\r\n</p>\r\n\r\n<p>\r\nPodemos también <strong>visualizar</strong>   la foto que hemos seleccionado dando un clic en <a href=\"#\" class=\"btn detalles_foto\" rel=\"gallery\" title=\"Vista previa\" alt=\"Vista previa\"> <i class=\"icon-eye-open\"></i></a></p>\r\n\r\n<p>\r\nEn el caso de que podamos acceder a <strong>bajar</strong> las fotos, el botón <a class=\"btn btn-success\" href=\"´#\"><i class=\"icon-arrow-down\"></i>Bajar</a> va a estar activo. Las fotos se baja en un solo archivo en formato zip, dentro del archivo tenemos las fotos de nuestra noticia retocadas para ser publicadas en la <strong>web</strong>\r\n</p>', '1360341608', '1360771737');
INSERT INTO `ayudas` VALUES ('6', '1', 'Uso de la Galería de Fotos', 'galeria_operaciones.mp4', '<p>\r\nEn este tutorial podemos ver las funcionalidades y las operaciones que tenemos en la <strong>galería</strong> de fotos.\r\n</p>\r\n\r\n<p>\r\nBásicamente podemos navegar por la galería, seleccionar fotos y agregarlas a nuestra noticia.\r\n</p>', '1360342559', '1360771978');
INSERT INTO `ayudas` VALUES ('7', '1', 'Historial de Articulos', 'historial_articulos.mp4', 'En el historial de artículos tenemos un listado de las noticias que no fueron aprobadas por el editor, tenemos un historial de 6 días anteriores a la fecha actual, podemos re publicar el articulo de tal manera que el editor lo pueda revisar y aprobar las fotos para que sea publicado', '1360765258', '1360765258');
INSERT INTO `ayudas` VALUES ('8', '2', 'Manejo de fotos de cronistas', 'editor_manejo_fotos.mp4', '<p>\r\nAl ingresar con su cuenta el editor tiene un listado de los cronistas que tienen noticias con fotos para ser aprobadas. Al dar clic en el nombre del cronista puede acceder al listado de noticias del cronista\r\n</p>\r\n<p>\r\nCada cronista tiene con su noticia una lista de fotos las cuales deben ser aprobadas por el editor. \r\n</p>\r\n\r\n<p>\r\nAl ingresar a su pantalla va a tener un listado de noticias con sus respectivas fotos.\r\n</p>\r\n<p>\r\nLas fotos seleccionadas por el cronista deben ser revisadas por el editor. El editor puede usar los botos que están bajo cada foto  para visualizar, aprobar o rechazar la foto.\r\n<ul>\r\n<li> Visualizar Foto <i class=\"icon-eye-open\"></i></li>\r\n<li> Aprobar Foto <i class=\"icon-ok-sign\"></i></li>\r\n<li> Rechazar Foto <i class=\"icon-ban-circle\"></i></li>\r\n</ul>\r\n</p>\r\n<p>\r\nEl cronista podrá ver automáticamente en su pantalla si el editor aprobó o no las fotos seleccionadas.\r\n</p>\r\n', '1360767044', '1360768042');
INSERT INTO `ayudas` VALUES ('9', '2', 'Agregar fotos a noticias', 'editor_agregar_foto.mp4', '<p>\r\nEn el caso de que las fotos seleccionada no cumplan con los requerimientos, el editor puede seleccionar por si mismo las fotos de crea necesarias para la noticia.\r\n</p>\r\n<p>\r\nAl dar clic en el botón<a class=\"btn\" href=\"#\"><i class=\"icon-picture\"></i> Foto</a> puede acceder a la galería de fotos donde puede seleccionar la foto adecuada y asignarle a la noticia.\r\n</p>\r\n\r\n<div class=\"alert alert-error\">\r\n<h4 class=\"alert-heading\">Atención!</h4>\r\nAl momento de seleccionar la foto, la noticia en la que se dio clic en el botón <a class=\"btn\" href=\"#\"><i class=\"icon-picture\"></i> Foto</a> es seleccionada automáticamente en la lista desplegable. Se debe revisar que la noticia correcta esté seleccionada de la lista desplegable  en otro caso la foto puede ser asignada por error a otra noticia.\r\n</div>', '1360768437', '1360768532');
INSERT INTO `ayudas` VALUES ('10', '2', 'Manejo de fotos de otros cronistas', 'editor_otro_cronista.mp4', '<p>\r\nCada editor tiene un grupo de cronistas que están bajo su supervisión los cuales aparecen directamente bajo la etiqueta [Cronistas Asignados], sin embargo,   también pueden administrar las noticias y fotos de otros cronistas que no están bajo su supervisión.\r\n</p>\r\n<p>\r\nPara esto, el editor puede dar clic en la etiqueta [Otros Cronistas] donde tendrá un listado similar al de sus cronistas asignados\r\n</p>\r\n\r\n<div class=\"alert alert-error\"  id=\"alerta_error\">\r\n\r\n    <h4 class=\"alert-heading\">Atención!</h4>\r\n    Los cronistas que no están asignados al editor aparecen al final en la lista de noticias para asignar foto de la siguiente manera:<br>\r\n  <strong> [Nombre de la Noticia -> Nombre del Cronista]</strong>\r\n<br><br>\r\n   Los cronistas asignados al editor aparecen al inicio y sin las llaves [ ]:<br>\r\n  <strong> Nombre de la Noticia -> Nombre del Cronista</strong>\r\n</div>', '1360768963', '1360769158');
INSERT INTO `ayudas` VALUES ('11', '3', 'Funciones del Diagramador', 'diagramador_funciones.mp4', '<p>\r\nAl ingresar a la pantalla de diagramador, tenemos un listado de las secciones y el número de noticias que tienen fotos, al dar un clic en la sección podemos acceder al listado de noticias con sus fotos.\r\n</p>\r\n<p>\r\nEl diagramador accede al sistema únicamente para descargar las imágenes que ya han sido aprobadas por el editor. Las imágenes pueden ser descargadas individualmente o en un archivo zip.\r\n<br>\r\nDentro del archivo zip están las imágenes seleccionadas y un archivo en formato txt con información relacionada a las imágenes\r\n</p>', '1360769315', '1360769450');

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
INSERT INTO `migration` VALUES ('app', 'default', '008_create_ayudas');

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
INSERT INTO `sessions` VALUES ('22cfeea0158b62cfdc8bf0125bc62b30', '1c9e9cf985e10464d4fa86120d227325', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/13.0.782.112 Safari/535.1', '4869e012aa045958bdf5c461577cf02d', '1360779111', '1360779335', 'a:2:{i:0;a:3:{s:8:\"template\";s:16:\"template_manager\";s:8:\"username\";s:5:\"admin\";s:10:\"login_hash\";s:40:\"1641eca4f9b49db2c5a9d1adb639ed0c23df9ad3\";}i:1;a:0:{}}');

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
INSERT INTO `users` VALUES ('1', 'admin', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '100', 'admin@elmercurio.com.ec', '0', '', '1360779112', '1641eca4f9b49db2c5a9d1adb639ed0c23df9ad3', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1341514271', '0');
INSERT INTO `users` VALUES ('2', 'editor', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '50', 'editor@elmercurio.com', '0', 'mercurio', '1360778594', 'bf6d29890da1eec2cbdc5eb60c5646490578e6df', 'a:0:{}', '1342473649', '0');
INSERT INTO `users` VALUES ('3', 'periodista', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'periodista@elmercurio.com', '2', 'mercurio', '1360778989', '344461d381a0d5bb119e2b978a595b247c8d4645', 'a:1:{s:10:\"acceso_web\";s:1:\"1\";}', '1346273528', '0');
INSERT INTO `users` VALUES ('4', 'diagramador', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '25', 'diagramador@elmercurio.com', '2', 'mercurio', '1360766379', '72540bed26bd7ad1f6a170265f64a3e988c929dd', '', '1346275067', '0');
