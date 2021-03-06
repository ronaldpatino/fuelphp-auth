/*
Navicat MySQL Data Transfer

Source Server         : db
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : grafico

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2013-02-15 16:53:42
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

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
INSERT INTO `ayudas` VALUES ('9', '2', 'Agregar fotos a noticias de cronistas', 'editor_agregar_foto.mp4', '<p>\r\nEn el caso de que las fotos seleccionada no cumplan con los requerimientos, el editor puede seleccionar por si mismo las fotos de crea necesarias para la noticia.\r\n</p>\r\n<p>\r\nAl dar clic en el botón<a class=\"btn\" href=\"#\"><i class=\"icon-picture\"></i> Foto</a> puede acceder a la galería de fotos donde puede seleccionar la foto adecuada y asignarle a la noticia.\r\n</p>\r\n\r\n<div class=\"alert alert-error\">\r\n<h4 class=\"alert-heading\">Atención!</h4>\r\nAl momento de seleccionar la foto, la noticia en la que se dio clic en el botón <a class=\"btn\" href=\"#\"><i class=\"icon-picture\"></i> Foto</a> es seleccionada automáticamente en la lista desplegable. Se debe revisar que la noticia correcta esté seleccionada de la lista desplegable  en otro caso la foto puede ser asignada por error a otra noticia.\r\n</div>', '1360768437', '1360768532');
INSERT INTO `ayudas` VALUES ('10', '2', 'Manejo de fotos de otros cronistas', 'editor_otro_cronista.mp4', '<p>\r\nCada editor tiene un grupo de cronistas que están bajo su supervisión los cuales aparecen directamente bajo la etiqueta [Cronistas Asignados], sin embargo,   también pueden administrar las noticias y fotos de otros cronistas que no están bajo su supervisión.\r\n</p>\r\n<p>\r\nPara esto, el editor puede dar clic en la etiqueta [Otros Cronistas] donde tendrá un listado similar al de sus cronistas asignados\r\n</p>\r\n\r\n<div class=\"alert alert-error\"  id=\"alerta_error\">\r\n\r\n    <h4 class=\"alert-heading\">Atención!</h4>\r\n    Los cronistas que no están asignados al editor aparecen al final en la lista de noticias para asignar foto de la siguiente manera:<br>\r\n  <strong> [Nombre de la Noticia -> Nombre del Cronista]</strong>\r\n<br><br>\r\n   Los cronistas asignados al editor aparecen al inicio y sin las llaves [ ]:<br>\r\n  <strong> Nombre de la Noticia -> Nombre del Cronista</strong>\r\n</div>', '1360768963', '1360769158');
INSERT INTO `ayudas` VALUES ('11', '3', 'Funciones del Diagramador', 'diagramador_funciones.mp4', '<p>\r\nAl ingresar a la pantalla de diagramador, tenemos un listado de las secciones y el número de noticias que tienen fotos, al dar un clic en la sección podemos acceder al listado de noticias con sus fotos.\r\n</p>\r\n<p>\r\nEl diagramador accede al sistema únicamente para descargar las imágenes que ya han sido aprobadas por el editor. Las imágenes pueden ser descargadas individualmente o en un archivo zip.\r\n<br>\r\nDentro del archivo zip están las imágenes seleccionadas y un archivo en formato txt con información relacionada a las imágenes\r\n</p>', '1360769315', '1360769450');
INSERT INTO `ayudas` VALUES ('12', '2', 'Crear nueva noticia del editor', 'crear_articulo.mp4', '<p>\r\nPara crear una noticia noticia nueva, seleccionamos el menú <strong>Artículos</strong>. En la parte superior, tenemos un formulario en el cual ingresamos:\r\n<ul>\r\n<li>Nombre del artículo o noticia</li>\r\n<li>Página en la que va a ser publicada</li>\r\n<li>Sección en la que va a ser publicada</li>\r\n<li>Fecha en la que va a ser publicada</li>\r\n</ul>\r\n\r\nLuego de ingresar estos datos damos clic en el botón <input class=\"btn btn-primary\" name=\"submit\" value=\"Crear Articulo\" type=\"submit\" id=\"form_submit\">\r\n</p>\r\n\r\n<div class=\"alert alert-error\"  id=\"alerta_error\">\r\n    <h4 class=\"alert-heading\">Atención!</h4>\r\n    <strong>Si</strong> es posible colocar una fecha de publicación a futuro en la noticia. \r\n</div>\r\n', '0', '0');
INSERT INTO `ayudas` VALUES ('13', '2', 'Editar una noticia  del editor', 'editar_articulo.mp4', '<p>\r\nEn el caso de que sea necesario modificar los datos de una noticia, lo podemos hacer dando clic en <a class=\"btn\" href=\"#\"><i class=\"icon-edit\"></i> Editar</a>, lo cual nos llevará a una nueva pantalla.\r\n</p>\r\n<p>\r\nCuando hayamos hecho los cambios necesarios damos clic en  <input class=\"btn primary\" name=\"submit\" value=\"Save\" type=\"submit\" id=\"form_submit\"> para guardar los cambios. En caso de <strong>no</strong> querer guardar los cambios, damos clic en <a href=\"#\">Regresar</a>\r\n</p>', '0', '0');
INSERT INTO `ayudas` VALUES ('14', '2', 'Borrar Noticia  del editor', 'borrar_articulo.mp4', '<p> En el caso de que sea necesario borrar una noticia, lo podemos hacer dando clic en <a class=\"btn\" href=\"#\"><i class=\"icon-trash\"></i> Borrar</a>, antes de borrar nos pedirá confirmar si deseamos borrar o no la noticia.', '0', '0');
INSERT INTO `ayudas` VALUES ('15', '2', 'Agregar fotos a noticias del editor', 'foto_articulo.mp4', '<p>\r\nPara agregar fotos a un noticia o artículo creado damos clic en <a class=\"btn\" href=\"\"><i class=\"icon-picture\"></i> Foto</a>, esto nos llevará a la <strong>Galería</strong> en la cual podemos elegir la foto que queremos.\r\n</p>\r\n\r\n<p>\r\nPara relacionar la foto que deseamos con la noticia, damos clic en la foto seleccionada, al hacerlo una ventana se nos abre, en ella tenemos 3 ítems en la parte inferior el primero es una lista desplegable con las noticias que hemos creado, por defecto la noticia en la que dimos clic en el botón <a class=\"btn\" href=\"\"><i class=\"icon-picture\"></i> Foto</a> está seleccionada, luego seleccionamos las medidas y finalmente el botón <button type=\"submit\" class=\"btn btn-primary\"><i class=\"icon-plus\"></i> Agregar Imagen</button> en el que damos clic para terminar el proceso de agregar una foto\r\n</p>\r\n\r\n<div class=\"alert alert-error\"> <h4 class=\"alert-heading\">Atención!</h4> Al momento de seleccionar la foto, la noticia en la que se dio clic en el botón <a class=\"btn\" href=\"#\"><i class=\"icon-picture\"></i> Foto</a> es seleccionada automáticamente en la lista desplegable. Se debe revisar que la noticia correcta esté seleccionada de la lista desplegable en otro caso la foto puede ser asignada por error a otra noticia. </div>', '0', '0');
INSERT INTO `ayudas` VALUES ('16', '2', 'Uso de la Galería de Fotos', 'galeria_operaciones.mp4', '<p>\r\nEn este tutorial podemos ver las funcionalidades y las operaciones que tenemos en la <strong>galería</strong> de fotos.\r\n</p>\r\n\r\n<p>\r\nBásicamente podemos navegar por la galería, seleccionar fotos y agregarlas a nuestra noticia.\r\n</p>', '0', '0');
INSERT INTO `ayudas` VALUES ('17', '4', 'Roles del sistema', 'null', '<p>\r\nEl sistema tiene los siguientes perfiles de usuarios:\r\n<ul>\r\n<li>Administrador</li>\r\n<li>Editor</li>\r\n<li>Periodista</li>\r\n<li>Diagramador</li>\r\n</ul>\r\n</p>\r\n\r\n<p>\r\n<strong>Administrador</strong>, este perfil se encarga de los parámetros del sistema y e l manejo de usuarios, puede realizar las siguientes operaciones:\r\n<ul>\r\n<li>Crear y dar mantenimientos a usuarios</li>\r\n<li>Crear y dar mantenimientos a secciones</li>\r\n<li>Crear y dar mantenimientos a páginas</li>\r\n<li>Crear y dar mantenimientos a medidas</li>\r\n</ul>\r\n</p>\r\n\r\n<p>\r\n<strong>Editor</strong>, la función del editor es la de revisar las fotos que los periodistas cargan en el sistema, puede realizar las siguientes operaciones:\r\n<ul>\r\n<li>Visualizar las noticias creadas por los periodistas</li>\r\n<li>Aprobar o rechazar las fotos seleccionadas por los periodistas</li>\r\n<li>Asignar fotos a noticias creadas por los periodistas</li>\r\n<li>Crear noticias y asignarles fotos</li>\r\n<li>Si el administrador activa la opción, puede descargar imágenes retocadas por el sistema para ser subidas a la web</li>\r\n</ul>\r\n</p>\r\n\r\n<p>\r\n<strong>Periodista</strong>, la función del periodista es la de crear notas y asignarle fotos , puede realizar las siguientes operaciones:\r\n<ul>\r\n<li>Crear, Editar y Eliminar noticias</li>\r\n<li>Asignar fotos a noticias</li>\r\n<li>Navegar por la galería</li>\r\n<li>Si el administrador activa la opción, puede descargar imágenes retocadas por el sistema para ser subidas a la web</li>\r\n</ul>\r\n</p>\r\n\r\n<p>\r\n<strong>Diagramador</strong>, la función del diagramador es la descargar las fotos que el Editor a aprobado para su publicación, puede realizar la siguiente operación:\r\n<ul>\r\n<li>Descargar un archivo zip con todas las imágenes aprobadas</li>\r\n<li>Descargar  las imágenes aprobadas individualmente</li>\r\n</ul>\r\n</p>', '1360961203', '1360962011');
INSERT INTO `ayudas` VALUES ('18', '4', 'Crear Editores', 'crear_usuario_editor.mp4', '<p>\r\nPara crear un usuario debemos ingresar los siguiente campos\r\n\r\n<p>\r\n<strong>Nombre de Usuario</strong>, debe ser un nombre único con el que el usuario ingresa al sistema\r\n</p>\r\n\r\n<p>\r\n<strong>Password</strong>, la clave del usuario para ingresar al sistema, debe tener mínimo ocho caracteres\r\n</p>\r\n<p>\r\n<strong>Confime Password</strong>, confirmar la clave del usuario para validarla, debe ser idéntica a la ingresada en <strong>Password</strong>\r\n</p> \r\n\r\n<p>\r\n<strong>Email</strong>, dirección de correo del usuario\r\n</p> \r\n\r\n<p>\r\n<strong>Grupo</strong>, grupo o rol al que pertenece el usuario, estos pueden ser:\r\n<ul>\r\n<li>Administrador</li>\r\n<li>Editor</li>\r\n<li>Periodista</li>\r\n<li>Diagramador</li>\r\n</ul>\r\n</p> \r\n\r\n\r\n<p>\r\n<strong>Editor Gráfico Responsable</strong>, es el editor que va a revisar las fotos del periodista, esté campo es  válido solamente si el grupo seleccionado es Periodista ó Diagramador, en otro caso este valor es ignorado por el sistema.\r\n</p> \r\n\r\n<p>\r\n<strong>Puede descargar imágenes para web</strong>, este campo nos indica si el Editor o el Periodista tiene acceso a descargar las imágenes asignadas a las noticias para publicarlas en la web. Por defecto el valor es <strong>NO</strong>\r\n</p> \r\n\r\n\r\n</p>\r\n\r\n', '1360962652', '1360962652');
INSERT INTO `ayudas` VALUES ('19', '4', 'Crear Periodistas', 'crear_usuario_periodista.mp4', '<p>\r\nPara crear un usuario debemos ingresar los siguiente campos\r\n\r\n<p>\r\n<strong>Nombre de Usuario</strong>, debe ser un nombre único con el que el usuario ingresa al sistema\r\n</p>\r\n\r\n<p>\r\n<strong>Password</strong>, la clave del usuario para ingresar al sistema, debe tener mínimo ocho caracteres\r\n</p>\r\n<p>\r\n<strong>Confime Password</strong>, confirmar la clave del usuario para validarla, debe ser idéntica a la ingresada en <strong>Password</strong>\r\n</p> \r\n\r\n<p>\r\n<strong>Email</strong>, dirección de correo del usuario\r\n</p> \r\n\r\n<p>\r\n<strong>Grupo</strong>, grupo o rol al que pertenece el usuario, estos pueden ser:\r\n<ul>\r\n<li>Administrador</li>\r\n<li>Editor</li>\r\n<li>Periodista</li>\r\n<li>Diagramador</li>\r\n</ul>\r\n</p> \r\n\r\n\r\n<p>\r\n<strong>Editor Gráfico Responsable</strong>, es el editor que va a revisar las fotos del periodista, esté campo es  válido solamente si el grupo seleccionado es Periodista ó Diagramador, en otro caso este valor es ignorado por el sistema.\r\n</p> \r\n\r\n<p>\r\n<strong>Puede descargar imágenes para web</strong>, este campo nos indica si el Editor o el Periodista tiene acceso a descargar las imágenes asignadas a las noticias para publicarlas en la web. Por defecto el valor es <strong>NO</strong>\r\n</p> \r\n\r\n\r\n</p>\r\n\r\n', '0', '0');
INSERT INTO `ayudas` VALUES ('20', '4', 'Crear Diagramadores', 'crear_usuario_diagramador.mp4', '<p>\r\nPara crear un usuario debemos ingresar los siguiente campos\r\n\r\n<p>\r\n<strong>Nombre de Usuario</strong>, debe ser un nombre único con el que el usuario ingresa al sistema\r\n</p>\r\n\r\n<p>\r\n<strong>Password</strong>, la clave del usuario para ingresar al sistema, debe tener mínimo ocho caracteres\r\n</p>\r\n<p>\r\n<strong>Confime Password</strong>, confirmar la clave del usuario para validarla, debe ser idéntica a la ingresada en <strong>Password</strong>\r\n</p> \r\n\r\n<p>\r\n<strong>Email</strong>, dirección de correo del usuario\r\n</p> \r\n\r\n<p>\r\n<strong>Grupo</strong>, grupo o rol al que pertenece el usuario, estos pueden ser:\r\n<ul>\r\n<li>Administrador</li>\r\n<li>Editor</li>\r\n<li>Periodista</li>\r\n<li>Diagramador</li>\r\n</ul>\r\n</p> \r\n\r\n\r\n<p>\r\n<strong>Editor Gráfico Responsable</strong>, es el editor que va a revisar las fotos del periodista, esté campo es  válido solamente si el grupo seleccionado es Periodista ó Diagramador, en otro caso este valor es ignorado por el sistema.\r\n</p> \r\n\r\n<p>\r\n<strong>Puede descargar imágenes para web</strong>, este campo nos indica si el Editor o el Periodista tiene acceso a descargar las imágenes asignadas a las noticias para publicarlas en la web. Por defecto el valor es <strong>NO</strong>\r\n</p> \r\n\r\n\r\n</p>\r\n\r\n', '0', '0');
INSERT INTO `ayudas` VALUES ('21', '4', 'Crear Adimistradores', 'crear_usuario_administrador.mp4', '<p>\r\nPara crear un usuario debemos ingresar los siguiente campos\r\n\r\n<p>\r\n<strong>Nombre de Usuario</strong>, debe ser un nombre único con el que el usuario ingresa al sistema\r\n</p>\r\n\r\n<p>\r\n<strong>Password</strong>, la clave del usuario para ingresar al sistema, debe tener mínimo ocho caracteres\r\n</p>\r\n<p>\r\n<strong>Confime Password</strong>, confirmar la clave del usuario para validarla, debe ser idéntica a la ingresada en <strong>Password</strong>\r\n</p> \r\n\r\n<p>\r\n<strong>Email</strong>, dirección de correo del usuario\r\n</p> \r\n\r\n<p>\r\n<strong>Grupo</strong>, grupo o rol al que pertenece el usuario, estos pueden ser:\r\n<ul>\r\n<li>Administrador</li>\r\n<li>Editor</li>\r\n<li>Periodista</li>\r\n<li>Diagramador</li>\r\n</ul>\r\n</p> \r\n\r\n\r\n<p>\r\n<strong>Editor Gráfico Responsable</strong>, es el editor que va a revisar las fotos del periodista, esté campo es  válido solamente si el grupo seleccionado es Periodista ó Diagramador, en otro caso este valor es ignorado por el sistema.\r\n</p> \r\n\r\n<p>\r\n<strong>Puede descargar imágenes para web</strong>, este campo nos indica si el Editor o el Periodista tiene acceso a descargar las imágenes asignadas a las noticias para publicarlas en la web. Por defecto el valor es <strong>NO</strong>\r\n</p> \r\n\r\n\r\n</p>\r\n\r\n', '0', '0');
INSERT INTO `ayudas` VALUES ('22', '4', 'Secciones', 'null', '<p>\r\n<strong>Secciones</strong> en este menú encontramos un listado de las secciones creadas. Podemos Crear, Eliminar, Editar y Visualziar las secciones que forman parte del sistema\r\n</p>', '0', '0');
INSERT INTO `ayudas` VALUES ('23', '4', 'Páginas', 'null', '<p>\r\n<strong>Páginas</strong> en este menú encontramos un listado de las páginas creadas. Podemos Crear, Eliminar, Editar y Visualziar las secciones que forman parte del sistema. \r\n</p>', '0', '0');
INSERT INTO `ayudas` VALUES ('24', '4', 'Dimensiones', 'null', '<p>\r\n<strong>Dimensiones</strong> en este menú encontramos un listado de las dimensiones que se usan en el diario para los tamaños de imagenes. \r\n</p>', '0', '0');
INSERT INTO `ayudas` VALUES ('25', '1', 'Flujo de Trabajo en el Sistema', 'workflow.mp4', '<p>\r\n<strong>Primero Paso</strong> el Cronista crea sus noticias y les asigna las fotos que considere necesarias\r\n</p>\r\n<p>\r\n<strong>Segundo Paso</strong> el Editor revisa las fotos que los cronistas han seleccionado en el sistema para ser publicadas y las <strong>Aprueba</strong> o <strong>Rechaza</strong> de acuerdo a su criterio. El Editor puede también selecionar fotos y asignarlas a las noticias enviadas por en cronista\r\n</p>\r\n\r\n<p>\r\n<strong>Tercer Paso</strong> el Cronista puede ver si el Editor aprobo o no las fotos seleccionadas, en caso de de que el Editor no haya aprobado ninguna de las fotos, el Cronista puede seleccionar otras fotos para que sean revisadas por el Editor.\r\n<div class=\"alert alert-error\">\r\n<p>\r\nSi el Cronista tiene asignado el correspondiente permiso,  puede bajarse las imagenes que seleccionó esten o no esten aprobadas por el editor, para publicarlas en la web.\r\n</p>\r\n<p>\r\nLas fotos  son ya optimizadas por el sistema para ser publicadas en el web, por defecto el ancho de las fotos es de 400 pixels por el alto proporcional, el formato generado es jpg. <br/>\r\nEl sufijo -elmercurio-cuenca-ecuador es agregado a todas las imagenes para el web.\r\n</p>\r\n\r\n </div>\r\n</p>\r\n\r\n<p>\r\n<strong>Cuarto Paso</strong> el Diagramador se descarga las fotos aprobadas para procesarlas y ser publicadas en el diario\r\n</p>', '0', '0');
INSERT INTO `ayudas` VALUES ('26', '2', 'Flujo de Trabajo en el Sistema', 'workflow.mp4', '<p>\r\n<strong>Primero Paso</strong> el Cronista crea sus noticias y les asigna las fotos que considere necesarias\r\n</p>\r\n<p>\r\n<strong>Segundo Paso</strong> el Editor revisa las fotos que los cronistas han seleccionado en el sistema para ser publicadas y las <strong>Aprueba</strong> o <strong>Rechaza</strong> de acuerdo a su criterio. El Editor puede también selecionar fotos y asignarlas a las noticias enviadas por en cronista\r\n</p>\r\n\r\n<p>\r\n<strong>Tercer Paso</strong> el Cronista puede ver si el Editor aprobo o no las fotos seleccionadas, en caso de de que el Editor no haya aprobado ninguna de las fotos, el Cronista puede seleccionar otras fotos para que sean revisadas por el Editor.\r\n<div class=\"alert alert-error\">\r\n<p>\r\nSi el Cronista tiene asignado el correspondiente permiso,  puede bajarse las imagenes que seleccionó esten o no esten aprobadas por el editor, para publicarlas en la web.\r\n</p>\r\n<p>\r\nLas fotos  son ya optimizadas por el sistema para ser publicadas en el web, por defecto el ancho de las fotos es de 400 pixels por el alto proporcional, el formato generado es jpg. <br/>\r\nEl sufijo -elmercurio-cuenca-ecuador es agregado a todas las imagenes para el web.\r\n</p>\r\n\r\n </div>\r\n</p>\r\n\r\n<p>\r\n<strong>Cuarto Paso</strong> el Diagramador se descarga las fotos aprobadas para procesarlas y ser publicadas en el diario\r\n</p>', '0', '0');
INSERT INTO `ayudas` VALUES ('27', '3', 'Flujo de Trabajo en el Sistema', 'workflow.mp4', '<p>\r\n<strong>Primero Paso</strong> el Cronista crea sus noticias y les asigna las fotos que considere necesarias\r\n</p>\r\n<p>\r\n<strong>Segundo Paso</strong> el Editor revisa las fotos que los cronistas han seleccionado en el sistema para ser publicadas y las <strong>Aprueba</strong> o <strong>Rechaza</strong> de acuerdo a su criterio. El Editor puede también selecionar fotos y asignarlas a las noticias enviadas por en cronista\r\n</p>\r\n\r\n<p>\r\n<strong>Tercer Paso</strong> el Cronista puede ver si el Editor aprobo o no las fotos seleccionadas, en caso de de que el Editor no haya aprobado ninguna de las fotos, el Cronista puede seleccionar otras fotos para que sean revisadas por el Editor.\r\n<div class=\"alert alert-error\">\r\n<p>\r\nSi el Cronista tiene asignado el correspondiente permiso,  puede bajarse las imagenes que seleccionó esten o no esten aprobadas por el editor, para publicarlas en la web.\r\n</p>\r\n<p>\r\nLas fotos  son ya optimizadas por el sistema para ser publicadas en el web, por defecto el ancho de las fotos es de 400 pixels por el alto proporcional, el formato generado es jpg. <br/>\r\nEl sufijo -elmercurio-cuenca-ecuador es agregado a todas las imagenes para el web.\r\n</p>\r\n\r\n </div>\r\n</p>\r\n\r\n<p>\r\n<strong>Cuarto Paso</strong> el Diagramador se descarga las fotos aprobadas para procesarlas y ser publicadas en el diario\r\n</p>', '0', '0');
INSERT INTO `ayudas` VALUES ('28', '4', 'Flujo de Trabajo en el Sistema', 'workflow.mp4', '<p>\r\n<strong>Primero Paso</strong> el Cronista crea sus noticias y les asigna las fotos que considere necesarias\r\n</p>\r\n<p>\r\n<strong>Segundo Paso</strong> el Editor revisa las fotos que los cronistas han seleccionado en el sistema para ser publicadas y las <strong>Aprueba</strong> o <strong>Rechaza</strong> de acuerdo a su criterio. El Editor puede también selecionar fotos y asignarlas a las noticias enviadas por en cronista\r\n</p>\r\n\r\n<p>\r\n<strong>Tercer Paso</strong> el Cronista puede ver si el Editor aprobo o no las fotos seleccionadas, en caso de de que el Editor no haya aprobado ninguna de las fotos, el Cronista puede seleccionar otras fotos para que sean revisadas por el Editor.\r\n<div class=\"alert alert-error\">\r\n<p>\r\nSi el Cronista tiene asignado el correspondiente permiso,  puede bajarse las imagenes que seleccionó esten o no esten aprobadas por el editor, para publicarlas en la web.\r\n</p>\r\n<p>\r\nLas fotos  son ya optimizadas por el sistema para ser publicadas en el web, por defecto el ancho de las fotos es de 400 pixels por el alto proporcional, el formato generado es jpg. <br/>\r\nEl sufijo -elmercurio-cuenca-ecuador es agregado a todas las imagenes para el web.\r\n</p>\r\n\r\n </div>\r\n</p>\r\n\r\n<p>\r\n<strong>Cuarto Paso</strong> el Diagramador se descarga las fotos aprobadas para procesarlas y ser publicadas en el diario\r\n</p>', '0', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of paginas
-- ----------------------------
INSERT INTO `paginas` VALUES ('1', '1A', '1360003206', '1360003206');
INSERT INTO `paginas` VALUES ('2', '2A', '1360003303', '1360003303');
INSERT INTO `paginas` VALUES ('3', '3A', '1360003312', '1360003312');
INSERT INTO `paginas` VALUES ('4', '4A', '1360857864', '1360857864');
INSERT INTO `paginas` VALUES ('5', '5A', '1360857867', '1360857867');
INSERT INTO `paginas` VALUES ('6', '6A', '1360857871', '1360857871');
INSERT INTO `paginas` VALUES ('7', '7A', '1360857874', '1360857874');
INSERT INTO `paginas` VALUES ('8', '8A', '1360857879', '1360857879');
INSERT INTO `paginas` VALUES ('9', '1B', '1360857886', '1360857886');
INSERT INTO `paginas` VALUES ('10', '2B', '1360857893', '1360857893');
INSERT INTO `paginas` VALUES ('11', '3B', '1360857898', '1360857898');
INSERT INTO `paginas` VALUES ('12', '4B', '1360857903', '1360857903');
INSERT INTO `paginas` VALUES ('13', '5B', '1360857907', '1360857907');
INSERT INTO `paginas` VALUES ('14', '6B', '1360857911', '1360857911');
INSERT INTO `paginas` VALUES ('15', '7B', '1360857923', '1360857923');
INSERT INTO `paginas` VALUES ('16', '8B', '1360857928', '1360857928');
INSERT INTO `paginas` VALUES ('17', '1C', '1360857932', '1360857932');
INSERT INTO `paginas` VALUES ('18', '2C', '1360857936', '1360857936');
INSERT INTO `paginas` VALUES ('19', '3C', '1360857940', '1360857940');
INSERT INTO `paginas` VALUES ('20', '4C', '1360857946', '1360857946');
INSERT INTO `paginas` VALUES ('21', '5C', '1360857951', '1360857951');
INSERT INTO `paginas` VALUES ('22', '6C', '1360857955', '1360857955');
INSERT INTO `paginas` VALUES ('23', '7C', '1360857961', '1360857961');
INSERT INTO `paginas` VALUES ('24', '8C', '1360857966', '1360857966');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of seccions
-- ----------------------------
INSERT INTO `seccions` VALUES ('1', 'Deportes', '1342106667', '1346337482');
INSERT INTO `seccions` VALUES ('3', 'Nacional', '1342106680', '1342106680');
INSERT INTO `seccions` VALUES ('4', 'Policiales (Crónica)', '1342106689', '1360857702');
INSERT INTO `seccions` VALUES ('5', 'Portada', '1360857651', '1360857651');
INSERT INTO `seccions` VALUES ('6', 'Editorial', '1360857662', '1360857662');
INSERT INTO `seccions` VALUES ('7', 'Cultura', '1360857672', '1360857672');
INSERT INTO `seccions` VALUES ('8', 'Local', '1360857679', '1360857679');
INSERT INTO `seccions` VALUES ('9', 'Azuay', '1360857687', '1360857687');
INSERT INTO `seccions` VALUES ('10', 'Cañar', '1360857710', '1360857710');
INSERT INTO `seccions` VALUES ('11', 'Loja', '1360857717', '1360857717');
INSERT INTO `seccions` VALUES ('12', 'Empresarial', '1360857725', '1360857725');
INSERT INTO `seccions` VALUES ('13', 'Amenidades', '1360857735', '1360857735');
INSERT INTO `seccions` VALUES ('14', 'Internacional', '1360857743', '1360857743');
INSERT INTO `seccions` VALUES ('15', 'Publicidad', '1360857763', '1360857763');
INSERT INTO `seccions` VALUES ('16', 'Clasificados', '1360857773', '1360857773');
INSERT INTO `seccions` VALUES ('17', 'Mortuorios', '1360857783', '1360857783');
INSERT INTO `seccions` VALUES ('18', 'Orden Indistinto', '1360857791', '1360857791');

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
INSERT INTO `sessions` VALUES ('aadbd737fa93ce1f403399e40fcdc310', 'aadbd737fa93ce1f403399e40fcdc310', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/13.0.782.112 Safari/535.1', '4869e012aa045958bdf5c461577cf02d', '1360959827', '1360959827', 'a:2:{i:0;a:0:{}i:1;a:1:{s:12:\"flash::error\";a:2:{s:5:\"state\";s:3:\"new\";s:5:\"value\";s:52:\"Usuario o passworod incorrectos. Intente nuevamente.\";}}}');
INSERT INTO `sessions` VALUES ('afc61c082b18720ff759a1ed5126274a', '3f82d00f696777dad1c7569c6850cb6a', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/13.0.782.112 Safari/535.1', '4869e012aa045958bdf5c461577cf02d', '1360965129', '1360965129', 'a:2:{i:0;a:3:{s:8:\"template\";s:20:\"template_diagramador\";s:8:\"username\";s:11:\"diagramador\";s:10:\"login_hash\";s:40:\"36d2144885d557fcf662be3d67d50777c5248b67\";}i:1;a:0:{}}');

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '100', 'admin@elmercurio.com.ec', '0', '', '1360960311', '99ed257e2df0afea0a05a25e9e6647f180899341', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1341514271', '0');
INSERT INTO `users` VALUES ('4', 'diagramador', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '25', 'diagramador@elmercurio.com', '0', 'mercurio', '1360964065', '36d2144885d557fcf662be3d67d50777c5248b67', '', '1346275067', '0');
INSERT INTO `users` VALUES ('5', 'jduran', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '50', 'jduran@elmercurio.com.ec', '0', 'mercurio', '1360866031', 'f766af2252570c0cdadf9adc4c8b2da10e16d508', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360855526', '1360855526');
INSERT INTO `users` VALUES ('6', 'dmontalvan', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '50', 'dmontalvan@elmercurio.com.ec', '0', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360855549', '1360855549');
INSERT INTO `users` VALUES ('7', 'avera', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '50', 'avera@elmercurio.com.ec', '0', 'mercurio', '1360862583', 'e58d7a4d657bd852ff27ac23ecf16e596258c720', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360855590', '1360855590');
INSERT INTO `users` VALUES ('8', 'sgallegos', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '50', 'deportes@elmercurio.com.ec', '0', 'mercurio', '1360862300', '3b8babbe78bd11d95a2b9d28df20774019183f80', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360855637', '1360855637');
INSERT INTO `users` VALUES ('9', 'cultura', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'cultura@elmercurio.com.ec', '6', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360856846', '1360856846');
INSERT INTO `users` VALUES ('10', 'ciudad', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'jcontreras@elmercurio.com.ec', '6', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360856888', '1360856888');
INSERT INTO `users` VALUES ('11', 'politica', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'csanchez@elmercurio.com.ec', '6', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360856977', '1360856977');
INSERT INTO `users` VALUES ('12', 'ciudad1', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'avelez@elmercurio.com.ec', '6', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360857011', '1360857011');
INSERT INTO `users` VALUES ('13', 'region', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'azhingre@elmercurio.com.ec', '7', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360857042', '1360857043');
INSERT INTO `users` VALUES ('14', 'economia', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'acalle@elmercurio.com.ec', '7', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360857070', '1360857070');
INSERT INTO `users` VALUES ('15', 'azogues', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'azogues@elmercurio.com.ec', '7', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360857111', '1360857111');
INSERT INTO `users` VALUES ('16', 'cronica', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'cronica@elmercurio.com.ec', '7', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360857148', '1360857148');
INSERT INTO `users` VALUES ('17', 'sociales', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'sociales@elmercurio.com.ec', '7', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360857180', '1360857181');
INSERT INTO `users` VALUES ('18', 'loja', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'redaccionloja@elmercurio.com.ec', '7', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360857214', '1360857214');
INSERT INTO `users` VALUES ('19', 'deportes1', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'deportes1@elmercurio.com.ec', '5', 'mercurio', '1360863971', '5d11a2171a548b3dc37448993b4ebc05c8f67f76', 'a:1:{s:10:\"acceso_web\";s:1:\"1\";}', '1360857264', '1360857264');
INSERT INTO `users` VALUES ('20', 'deportes2', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'deportes2@elmercurio.com.ec', '8', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360857294', '1360857294');
INSERT INTO `users` VALUES ('22', 'deportes3', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'deportes3@elmercurio.com.ec', '8', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360857359', '1360857360');
INSERT INTO `users` VALUES ('23', 'deportes4', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '1', 'deportes4@elmercurio.com.ec', '8', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360857385', '1360857385');
INSERT INTO `users` VALUES ('24', 'hroman', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '50', 'editorgrafico@elmercurio.com.ec', '0', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360857479', '1360857479');
INSERT INTO `users` VALUES ('25', 'mroman', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '50', 'mroman@elmercurio.com.ec', '0', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360857530', '1360857530');
INSERT INTO `users` VALUES ('26', 'aguillermo', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '50', 'redaccion@elmercurio.com.ec', '0', 'mercurio', '', '', 'a:1:{s:10:\"acceso_web\";s:1:\"0\";}', '1360857585', '1360857585');
INSERT INTO `users` VALUES ('27', 'cmerchan', 'ZqL+S1RMW/XxZY1hOEq2wG8KkRqkrtNHBzLzN7KgJF8=', '50', 'carmen_m@elmercurio.com.ec', '0', 'mercurio', '1360865367', 'ee313ff7b3ce71f1ba85d04caf3f92080528bbd4', 'a:1:{s:10:\"acceso_web\";s:1:\"1\";}', '1360857610', '1360857610');
