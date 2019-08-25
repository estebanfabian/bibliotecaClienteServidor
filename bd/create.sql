# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases V8.1.2                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          Project1.dez                                    #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database creation script                        #
# Created on:            2019-08-20 00:21                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Add tables                                                             #
# ---------------------------------------------------------------------- #

# ---------------------------------------------------------------------- #
# Add table "tbl_autor"                                                  #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_autor` (
    `idAutor` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `nombreAutor` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'anonimo',
    `notaAutor` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    PRIMARY KEY (`idAutor`)
)
ENGINE = INNODB;

# ---------------------------------------------------------------------- #
# Add table "tbl_biblioteca"                                             #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_biblioteca` (
    `idBiblioteca` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `nombreBiblioteca` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `direccionBiblioteca` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `telefonoBiblioteca` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `personaResponsabe` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `obervacionBiblioteca` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    PRIMARY KEY (`idBiblioteca`)
)
ENGINE = INNODB;

# ---------------------------------------------------------------------- #
# Add table "tbl_categoria"                                              #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_categoria` (
    `idCategoria` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `categoria` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `descriccion` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    PRIMARY KEY (`idCategoria`)
)
ENGINE = INNODB;

# ---------------------------------------------------------------------- #
# Add table "tbl_computador"                                             #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_computador` (
    `idcomputador` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `fabricante` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `observaciones` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `cargadorId` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `estadoComputador` VARCHAR(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'libre' COMMENT 'Este campo indica el estado del computador si es libre,reservado y prestado ',
    PRIMARY KEY (`idcomputador`)
)
ENGINE = INNODB;

# ---------------------------------------------------------------------- #
# Add table "tbl_editorial"                                              #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_editorial` (
    `idEditorial` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `nombreEditorial` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `direccionEditorial` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `telefonoEditorial` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `anoPublicacion` DATE,
    PRIMARY KEY (`idEditorial`)
)
ENGINE = INNODB;

# ---------------------------------------------------------------------- #
# Add table "tbl_libro"                                                  #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_libro` (
    `isbn` INTEGER(11) NOT NULL,
    `idEditorial` INTEGER(11),
    `titulo` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `resena` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `estado` VARCHAR(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'libre' COMMENT 'Este campo indica el estado del libro si es libre,reservado y prestado (estado reservado ser maximo 3 dias  sin contar domingo ni festivos )',
    `imagen` VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    PRIMARY KEY (`isbn`)
)
ENGINE = INNODB;

CREATE INDEX `Editorial_Libro` ON `tbl_libro` (`idEditorial`);

# ---------------------------------------------------------------------- #
# Add table "tbl_libro_autor"                                            #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_libro_autor` (
    `idAutorLibro` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `listaLibro` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `idAutor` INTEGER(11),
    `isbn` INTEGER(11),
    PRIMARY KEY (`idAutorLibro`)
)
ENGINE = INNODB;

CREATE INDEX `tbl_autor_tbl_libro_autor` ON `tbl_libro_autor` (`idAutor`);

CREATE INDEX `tbl_libro_tbl_libro_autor` ON `tbl_libro_autor` (`isbn`);

# ---------------------------------------------------------------------- #
# Add table "tbl_libro_categoria"                                        #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_libro_categoria` (
    `id_libroCategoria` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `isbn` INTEGER(11) NOT NULL,
    `idCategoria` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    PRIMARY KEY (`id_libroCategoria`)
)
ENGINE = INNODB;

CREATE INDEX `tbl_libro_tbl_libro_categoria` ON `tbl_libro_categoria` (`isbn`);

CREATE INDEX `tbl_categoria_tbl_libro_categoria` ON `tbl_libro_categoria` (`idCategoria`);

# ---------------------------------------------------------------------- #
# Add table "tbl_libro_prestamoint"                                      #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_libro_prestamoint` (
    `isbnPrestamoInt` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `titulo` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `editorial` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `categoriaLibro` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `resena` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `autor` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    PRIMARY KEY (`isbnPrestamoInt`)
)
ENGINE = INNODB;

# ---------------------------------------------------------------------- #
# Add table "tbl_listapublica"                                           #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_listapublica` (
    `id_lista` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    PRIMARY KEY (`id_lista`)
)
ENGINE = INNODB;

# ---------------------------------------------------------------------- #
# Add table "tbl_temas"                                                  #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_temas` (
    `idTema` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `nombreTema` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `descripcion` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    PRIMARY KEY (`idTema`)
)
ENGINE = INNODB;

# ---------------------------------------------------------------------- #
# Add table "tbl_usuario"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_usuario` (
    `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `codigo` INTEGER(11) NOT NULL,
    `cedula` VARCHAR(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `nombre` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `apellido` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `fechaNacimiento` DATE NOT NULL,
    `sexo` TINYINT(4) NOT NULL COMMENT '0 mujer , 1 hombre',
    `direccion` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `direccion2` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `telefonoPrincipal` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
    `telefonoSecundario` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
    `telefonoOtro` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `emailPrincipal` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `contactoNombre` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `contactoApellido` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `contactoDireccion` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `contactoDireccion2` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `contactoTelefono` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
    `contrasena` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `multa` INTEGER(11) DEFAULT 0,
    `perfil` VARCHAR(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'estudiante' COMMENT 'Los perfiles que se manejara administrador, estudiates y trabajador',
    `intentos` INTEGER(11) DEFAULT 0,
    `ultimo_intento` DATETIME,
    PRIMARY KEY (`id`)
)
ENGINE = INNODB;

# ---------------------------------------------------------------------- #
# Add table "tbl_video_beam"                                             #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_video_beam` (
    `idVideoBeam` INTEGER(11) NOT NULL,
    `fabricante` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `cableUSB` TINYINT(4) NOT NULL COMMENT 'este campo es para saber si el video bem tiene clase USB',
    `cableHDMI` TINYINT(4) NOT NULL COMMENT 'este campo es para saber si el video bem tiene clase HDMI',
    `cableVGA` TINYINT(4) NOT NULL COMMENT 'este campo es para saber si el video bem tiene clase VGA',
    `observaciones` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `estadoVideoBeam` VARCHAR(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'libre' COMMENT 'Este campo indica el estado del video beam si es libre,reservado y prestado ',
    PRIMARY KEY (`idVideoBeam`)
)
ENGINE = INNODB;

# ---------------------------------------------------------------------- #
# Add table "tbl_libro_listapublica"                                     #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_libro_listapublica` (
    `id_listaPublica` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `isbn` INTEGER(11) NOT NULL,
    `id_lista` INTEGER(11) NOT NULL,
    PRIMARY KEY (`id_listaPublica`)
)
ENGINE = INNODB;

CREATE INDEX `tbl_libro_tbl_libro_listaPublica` ON `tbl_libro_listapublica` (`isbn`);

CREATE INDEX `tbl_listaPublica_tbl_libro_listaPublica` ON `tbl_libro_listapublica` (`id_lista`);

# ---------------------------------------------------------------------- #
# Add table "tbl_libro_temas"                                            #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_libro_temas` (
    `idLibroTema` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `idTema` INTEGER(11) NOT NULL,
    `isbn` INTEGER(11),
    PRIMARY KEY (`idLibroTema`)
)
ENGINE = INNODB;

CREATE INDEX `tbl_temas_tbl_libro_temas` ON `tbl_libro_temas` (`idTema`);

CREATE INDEX `tbl_libro_tbl_libro_temas` ON `tbl_libro_temas` (`isbn`);

# ---------------------------------------------------------------------- #
# Add table "tbl_milista"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_milista` (
    `id_miLista` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `id` INTEGER(11) NOT NULL,
    `isbn` INTEGER(11) NOT NULL,
    `nombreLista` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `categoriaLista` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    PRIMARY KEY (`id_miLista`)
)
ENGINE = INNODB;

CREATE INDEX `tbl_usuario_tbl_usuario_tbl_libro` ON `tbl_milista` (`id`);

CREATE INDEX `tbl_libro_tbl_usuario_tbl_libro` ON `tbl_milista` (`isbn`);

# ---------------------------------------------------------------------- #
# Add table "tbl_prestamo"                                               #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_prestamo` (
    `idPrestamo` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `estadoLibro` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `preInterBibliotecarios` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci COMMENT 'este campo indica si el libro fue de prestamo interbibliotecarios',
    `actividad` INTEGER(11) NOT NULL COMMENT '0 inactivo , 1 reservado , 2 prestamo',
    `diaReserva` DATETIME,
    `diaEntrega` DATETIME,
    `diaPrestamo` DATETIME,
    `renovacion` INTEGER(11) DEFAULT 0 COMMENT 'este campo se tiene para que los usuario solo pueda hacer una renovacion ',
    `codigo` INTEGER(11),
    `cod_empleado` INTEGER(11),
    `idVideoBeam` INTEGER(11),
    `idcomputador` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `id` INTEGER(11),
    `isbn` INTEGER(11),
    PRIMARY KEY (`idPrestamo`)
)
ENGINE = INNODB;

CREATE INDEX `TBL_Video_Beam_TBL_Prestamo` ON `tbl_prestamo` (`idVideoBeam`);

CREATE INDEX `TBL_Computador_TBL_Prestamo` ON `tbl_prestamo` (`idcomputador`);

CREATE INDEX `tbl_usuario_tbl_prestamo` ON `tbl_prestamo` (`id`);

CREATE INDEX `tbl_libro_tbl_prestamo` ON `tbl_prestamo` (`isbn`);

# ---------------------------------------------------------------------- #
# Add table "tbl_prestamo_interbibliotecario"                            #
# ---------------------------------------------------------------------- #

CREATE TABLE `tbl_prestamo_interbibliotecario` (
    `idPrestamoInterBiblio` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `idPrestemoInterBibliotecario` INTEGER(11) NOT NULL,
    `isbnPrestamoInt` VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
    `idPrestamo` INTEGER(11),
    PRIMARY KEY (`idPrestamoInterBiblio`)
)
ENGINE = INNODB;

CREATE INDEX `tbl_biblioteca_tbl_prestamo_InterBibliotecario` ON `tbl_prestamo_interbibliotecario` (`idPrestemoInterBibliotecario`);

CREATE INDEX `tbl_libro_prestamoint_tbl_prestamo_InterBibliotecario` ON `tbl_prestamo_interbibliotecario` (`isbnPrestamoInt`);

CREATE INDEX `tbl_prestamo_tbl_prestamo_InterBibliotecario` ON `tbl_prestamo_interbibliotecario` (`idPrestamo`);

# ---------------------------------------------------------------------- #
# Add foreign key constraints                                            #
# ---------------------------------------------------------------------- #

ALTER TABLE `tbl_libro` ADD CONSTRAINT `Editorial_Libro` 
    FOREIGN KEY (`idEditorial`) REFERENCES `tbl_editorial` (`idEditorial`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `tbl_libro_autor` ADD CONSTRAINT `tbl_autor_tbl_libro_autor` 
    FOREIGN KEY (`idAutor`) REFERENCES `tbl_autor` (`idAutor`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `tbl_libro_autor` ADD CONSTRAINT `tbl_libro_tbl_libro_autor` 
    FOREIGN KEY (`isbn`) REFERENCES `tbl_libro` (`isbn`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `tbl_libro_categoria` ADD CONSTRAINT `tbl_categoria_tbl_libro_categoria` 
    FOREIGN KEY (`idCategoria`) REFERENCES `tbl_categoria` (`idCategoria`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `tbl_libro_categoria` ADD CONSTRAINT `tbl_libro_tbl_libro_categoria` 
    FOREIGN KEY (`isbn`) REFERENCES `tbl_libro` (`isbn`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `tbl_libro_listapublica` ADD CONSTRAINT `tbl_libro_tbl_libro_listaPublica` 
    FOREIGN KEY (`isbn`) REFERENCES `tbl_libro` (`isbn`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `tbl_libro_listapublica` ADD CONSTRAINT `tbl_listaPublica_tbl_libro_listaPublica` 
    FOREIGN KEY (`id_lista`) REFERENCES `tbl_listapublica` (`id_lista`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `tbl_libro_temas` ADD CONSTRAINT `tbl_libro_tbl_libro_temas` 
    FOREIGN KEY (`isbn`) REFERENCES `tbl_libro` (`isbn`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `tbl_libro_temas` ADD CONSTRAINT `tbl_temas_tbl_libro_temas` 
    FOREIGN KEY (`idTema`) REFERENCES `tbl_temas` (`idTema`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `tbl_milista` ADD CONSTRAINT `tbl_libro_tbl_usuario_tbl_libro` 
    FOREIGN KEY (`isbn`) REFERENCES `tbl_libro` (`isbn`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `tbl_milista` ADD CONSTRAINT `tbl_usuario_tbl_usuario_tbl_libro` 
    FOREIGN KEY (`id`) REFERENCES `tbl_usuario` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `tbl_prestamo` ADD CONSTRAINT `TBL_Computador_TBL_Prestamo` 
    FOREIGN KEY (`idcomputador`) REFERENCES `tbl_computador` (`idcomputador`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `tbl_prestamo` ADD CONSTRAINT `TBL_Video_Beam_TBL_Prestamo` 
    FOREIGN KEY (`idVideoBeam`) REFERENCES `tbl_video_beam` (`idVideoBeam`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `tbl_prestamo` ADD CONSTRAINT `tbl_libro_tbl_prestamo` 
    FOREIGN KEY (`isbn`) REFERENCES `tbl_libro` (`isbn`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `tbl_prestamo` ADD CONSTRAINT `tbl_usuario_tbl_prestamo` 
    FOREIGN KEY (`id`) REFERENCES `tbl_usuario` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `tbl_prestamo_interbibliotecario` ADD CONSTRAINT `tbl_biblioteca_tbl_prestamo_InterBibliotecario` 
    FOREIGN KEY (`idPrestemoInterBibliotecario`) REFERENCES `tbl_biblioteca` (`idBiblioteca`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `tbl_prestamo_interbibliotecario` ADD CONSTRAINT `tbl_libro_prestamoint_tbl_prestamo_InterBibliotecario` 
    FOREIGN KEY (`isbnPrestamoInt`) REFERENCES `tbl_libro_prestamoint` (`isbnPrestamoInt`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `tbl_prestamo_interbibliotecario` ADD CONSTRAINT `tbl_prestamo_tbl_prestamo_InterBibliotecario` 
    FOREIGN KEY (`idPrestamo`) REFERENCES `tbl_prestamo` (`idPrestamo`) ON DELETE RESTRICT ON UPDATE RESTRICT;

# ---------------------------------------------------------------------- #
# Add views                                                              #
# ---------------------------------------------------------------------- #

CREATE VIEW `listarautor` AS
SELECT `tbl_autor`.`nombreAutor` AS `nombreAutor`
,`tbl_autor`.`notaAutor` AS `notaAutor`
FROM `tbl_autor`;

CREATE VIEW `listareditorial` AS
SELECT `tbl_editorial`.`idEditorial` AS `idEditorial`
,`tbl_editorial`.`nombreEditorial` AS `nombreEditorial`
FROM `tbl_editorial`;

CREATE VIEW `listartema` AS
SELECT `tbl_temas`.`idTema` AS `idTema`
,`tbl_temas`.`nombreTema` AS `nombreTema`
FROM `tbl_temas`;

CREATE VIEW `lomasbuscadolibro` AS
SELECT `libro`.`isbn` AS `isbn`
,`libro`.`titulo` AS `titulo`
,`libro`.`imagen` AS `imagen`
,`autor`.`nombreAutor` AS `nombreAutor`
,`editorial`.`nombreEditorial` AS `nombreEditorial`
FROM (((`tbl_libro` `libro` join `tbl_libro_autor` `lautor`
ON((`libro`.`isbn` = `lautor`.`isbn`))) join `tbl_autor` `autor`
ON((`autor`.`idAutor` = `lautor`.`idAutor`))) join `tbl_editorial` `editorial`
ON((`editorial`.`idEditorial` = `libro`.`idEditorial`)))
WHERE (`libro`.`estado` = 'libre') group by `libro`.`isbn`;

# ---------------------------------------------------------------------- #
# Add procedures                                                         #
# ---------------------------------------------------------------------- #

DROP PROCEDURE IF EXISTS `computador`;
 CREATE DEFINER=`root`@`localhost` PROCEDURE `computador`(IN `entrada` INT, IN `entrada1` INT, IN `entrada2` VARCHAR(40), IN `entrada3` TEXT, IN `entrada4` INT)
IF entrada = 1 then
begin

UPDATE `tbl_computador` SET `fabricante` = entrada2 , `observaciones` = entrada3, `cargadorId` = entrada4 WHERE `tbl_computador`.`idcomputador` = entrada1 ;
end;
elseif (entrada = 2) then
begin

INSERT INTO `tbl_computador` (`idcomputador`, `fabricante`, `observaciones`, `cargadorId`) VALUES (entrada1, entrada2, entrada3, entrada4);
end ;
end if;

DROP PROCEDURE IF EXISTS `insetUsuario`;
 CREATE DEFINER=`root`@`localhost` PROCEDURE `insetUsuario`(IN `cedulaUsuario` VARCHAR(40), IN `codigoUsuario` INT, IN `nombreUsuario` VARCHAR(40), IN `apellidoUsuario` VARCHAR(40), IN `fechaNacimientoUsuario` VARCHAR(40), IN `sexoUsuario` INT, IN `direccionUsuario` VARCHAR(40), IN `direccion2Usuario` VARCHAR(40), IN `telefonoPrincipalUsuario` VARCHAR(40), IN `telefonoSecundarioUsuario` VARCHAR(40), IN `telefonoOtroUsuario` VARCHAR(40), IN `emailPrincipalUsuario` VARCHAR(40), IN `contactoNombreUsuario` VARCHAR(40), IN `contactoApellidoUsuario` VARCHAR(40), IN `contactoDireccionUsuario` VARCHAR(40), IN `contactoDireccion2Usuario` VARCHAR(40), IN `contactoTelefonoUsuario` VARCHAR(40), IN `contrasenaUsuario` VARCHAR(40), IN `perfilUsuario` VARCHAR(40))
BEGIN
 INSERT INTO tbl_usuario (cedula, codigo, nombre, apellido, fechaNacimiento, sexo, direccion, direccion2, telefonoPrincipal, telefonoSecundario, telefonoOtro, emailPrincipal, contactoNombre, contactoApellido, contactoDireccion, contactoDireccion2, contactoTelefono, contrasena, perfil) VALUES (cedulaUsuario,codigoUsuario,nombreUsuario,apellidoUsuario,fechaNacimientoUsuario,sexoUsuario, direccionUsuario,direccion2Usuario, telefonoPrincipalUsuario,telefonoSecundarioUsuario,telefonoOtroUsuario,emailPrincipalUsuario,contactoNombreUsuario,contactoApellidoUsuario, contactoDireccionUsuario,contactoDireccion2Usuario,contactoTelefonoUsuario,contrasenaUsuario, perfilUsuario);
  END;

DROP PROCEDURE IF EXISTS `tema`;
 CREATE DEFINER=`root`@`localhost` PROCEDURE `tema`(IN `entrada` INT, IN `entrada1` VARCHAR(40), IN `entrada2` TEXT)
IF entrada = 1 then
begin

UPDATE `tbl_temas` SET `descripcion`= entrada2 WHERE `nombreTema`= entrada1;
end ;
elseif (entrada = 2) then
BEGIN

INSERT INTO `tbl_temas`( `nombreTema`, `descripcion`) VALUES (entrada1,entrada2);
END;
end if;

DROP PROCEDURE IF EXISTS `miprocesos1`;
 CREATE DEFINER=`root`@`localhost` PROCEDURE `miprocesos1`(IN `entrada` INT, IN `entrada1` VARCHAR(40))
IF entrada = 1 then
begin

 (SELECT nombreTema FROM tbl_temas WHERE nombreTema = entrada1);
 end ;
ELSEif (entrada = 2) then
begin

(SELECT tbl_libro.isbn AS isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libro_autor.listaLibro AS facultad, tbl_libro.estado AS estado ,tbl_libro.resena,tbl_libro.imagen FROM tbl_libro INNER JOIN tbl_editorial INNER JOIN tbl_libro_autor INNER JOIN tbl_autor INNER JOIN tbl_temas INNER JOIN tbl_libro_temas WHERE tbl_libro.idEditorial =tbl_editorial.idEditorial AND tbl_libro.isbn=tbl_libro_autor.isbn=tbl_libro_temas.isbn AND tbl_libro_autor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND tbl_autor.nombreAutor LIKE entrada1);
end;
ELSEif (entrada = 3) then
begin

(SELECT tbl_libro.isbn AS isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libro_autor.listaLibro AS facultad, tbl_libro.estado AS estado,tbl_libro.resena,tbl_libro.imagen FROM tbl_libro INNER JOIN tbl_editorial INNER JOIN tbl_libro_autor INNER JOIN tbl_autor INNER JOIN tbl_temas INNER JOIN tbl_libro_temas WHERE tbl_libro.idEditorial =tbl_editorial.idEditorial AND tbl_libro.isbn=tbl_libro_autor.isbn=tbl_libro_temas.isbn AND tbl_libro_autor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND tbl_editorial.nombreEditorial LIKE entrada1);
end;
ELSEif (entrada = 4) then
begin

(SELECT tbl_libro.isbn AS isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libro_autor.listaLibro AS facultad, tbl_libro.estado AS estado ,tbl_libro.resena,tbl_libro.imagen FROM tbl_libro INNER JOIN tbl_editorial INNER JOIN tbl_libro_autor INNER JOIN tbl_autor INNER JOIN tbl_temas INNER JOIN tbl_libro_temas WHERE tbl_libro.idEditorial = tbl_editorial.idEditorial AND tbl_libro.isbn=tbl_libro_autor.isbn=tbl_libro_temas.isbn AND tbl_libro_autor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND tbl_libro.titulo LIKE entrada1) ;
END;
ELSEif (entrada = 5) then


BEGIN
(SELECT tbl_libro.isbn AS isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libro_autor.listaLibro AS facultad, tbl_libro.estado AS estado,tbl_libro.resena,tbl_libro.imagen FROM tbl_libro INNER JOIN tbl_editorial INNER JOIN tbl_libro_autor INNER JOIN tbl_autor INNER JOIN tbl_temas INNER JOIN tbl_libro_temas WHERE  tbl_temas.nombreTema like entrada1 and tbl_libro.idEditorial =tbl_editorial.idEditorial AND tbl_libro.isbn=tbl_libro_autor.isbn=tbl_libro_temas.isbn AND tbl_libro_autor.idautor=tbl_autor.idautor);
END;
ELSEif (entrada = 6) then


BEGIN
(SELECT tbl_libro.isbn AS isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libro_autor.listaLibro AS facultad, tbl_libro.estado AS estado,tbl_libro.resena,tbl_libro.imagen FROM tbl_libro INNER JOIN tbl_editorial INNER JOIN tbl_libro_autor INNER JOIN tbl_autor INNER JOIN tbl_temas INNER JOIN tbl_libro_temas WHERE tbl_libro.idEditorial =tbl_editorial.idEditorial AND tbl_libro.isbn=tbl_libro_autor.isbn=tbl_libro_temas.isbn AND tbl_libro_autor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND tbl_libro_autor.listaLibro LIKE entrada1);
END;
ELSEif (entrada = 7) then
begin

DELETE FROM `tbl_temas` WHERE `nombreTema` = entrada1;
end;
ELSEif (entrada = 8) then
begin

(SELECT `descripcion` FROM `tbl_temas` WHERE `nombreTema` = entrada1);
end;
 end if;

DROP PROCEDURE IF EXISTS `usuario`;
 CREATE DEFINER=`root`@`localhost` PROCEDURE `usuario`(IN `entrada` INT, IN `entrada1` INT, IN `entrada2` VARCHAR(40))
IF entrada = 1 then
BEGIN

SET @fecha = NOW();
SET  @s = 0;
SELECT @s = codigo,nombre ,  perfil FROM tbl_usuario WHERE codigo = entrada1 AND contrasena like binary  entrada2 AND (intentos < 3 OR (intentos > 3 AND NOW() > DATE_ADD(ultimo_intento, INTERVAL 15 MINUTE)));

UPDATE tbl_usuario SET tbl_usuario.ultimo_intento = @fecha, tbl_usuario.intentos = CASE WHEN @s > 0 THEN 0 ELSE tbl_usuario.intentos + 1
END
WHERE tbl_usuario.codigo  =entrada1;

END;
ELSEif (entrada = 2) then
BEGIN

SELECT contrasena FROM tbl_usuario WHERE codigo= entrada1 and emailPrincipal =  entrada2;
  END;
ELSEif (entrada = 3) then
BEGIN

UPDATE tbl_usuario SET contrasena= entrada2 WHERE codigo= entrada1;
  END;
 end if;

DROP PROCEDURE IF EXISTS `miprocesos`;
 CREATE DEFINER=`root`@`localhost` PROCEDURE `miprocesos`(IN `entrada` INT, IN `entrada1` INT)
IF entrada = 1 then
begin

    (SELECT idVideoBeam FROM `tbl_video_beam` WHERE `idVideoBeam`= entrada1 );
    end  ;
ELSEif (entrada = 2) then
begin

    (SELECT `codigo` FROM `tbl_usuario` WHERE `codigo`= entrada1);
    end ;
ELSEif (entrada = 3) then
begin

    (SELECT `idcomputador` FROM `tbl_computador` WHERE `idcomputador` = entrada1);
    end ;
 ELSEif (entrada = 4) then
begin

    (SELECT  multa FROM `tbl_usuario` WHERE `codigo`= entrada1);
    end ;
 ELSEif ( entrada =5) then
begin

    DELETE FROM `tbl_video_beam` WHERE `idVideoBeam` = entrada1;
    end ;
 ELSEif (entrada = 6) then
begin

    DELETE FROM `tbl_usuario` WHERE `codigo`=entrada1;
    end ;
 ELSEif (entrada = 7) then
begin

    DELETE FROM `tbl_libro` WHERE `tbl_libro`.`isbn` = entrada1;
    end ;
 ELSEif (entrada = 8) then
begin

    DELETE FROM `tbl_computador` WHERE `tbl_computador`.`idcomputador` = entrada1;
    end ;
 ELSEif (entrada = 9) then
begin

    (SELECT * FROM `tbl_video_beam` WHERE `idVideoBeam`=entrada1);
    end ;
 ELSEif (entrada = 10) then
begin

    (SELECT  `codigo`, `cedula`, `nombre`, `apellido`, `fechaNacimiento`, `sexo`, `direccion`, `direccion2`, `telefonoPrincipal`, `telefonoSecundario`, `telefonoOtro`, `emailPrincipal`, `contactoNombre`, `contactoApellido`, `contactoDireccion`, `contactoDireccion2`, `contactoTelefono`, `contrasena`,  `perfil`FROM `tbl_usuario` WHERE `codigo`  = entrada1);
    end ;
 ELSEif (entrada = 11) then
begin

    (SELECT `idcomputador`, `fabricante`, `observaciones`, `cargadorId` FROM `tbl_computador` WHERE `idcomputador` = entrada1);
    end ;
 ELSEif (entrada = 12) then
begin

    (SELECT count(tbl_libro.isbn) , tbl_libro.isbn AS isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libro_autor.listaLibro AS facultad, tbl_libro.estado AS estado,tbl_libro.resena,tbl_libro.imagen FROM  tbl_libro INNER JOIN  tbl_editorial INNER JOIN  tbl_libro_autor INNER JOIN tbl_autor INNER JOIN  tbl_temas INNER JOIN  tbl_libro_temas  WHERE tbl_libro.idEditorial =tbl_editorial.idEditorial AND  tbl_libro.isbn=tbl_libro_autor.isbn=tbl_libro_temas.isbn AND tbl_libro_autor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND tbl_libro.isbn= entrada1
);
    end ;
 ELSE
begin

    (SELECT `resena`,`imagen` FROM `tbl_libro` WHERE `isbn`= entrada1);
    end ;
    end if;

DROP PROCEDURE IF EXISTS `videoBeam`;
 CREATE DEFINER=`root`@`localhost` PROCEDURE `videoBeam`(IN `entrada` INT, IN `entrada1` INT, IN `entrada2` VARCHAR(40), IN `entrada3` INT, IN `entrada4` INT, IN `entrada5` INT, IN `entrada6` TEXT)
IF entrada = 1 then
BEGIN

UPDATE tbl_video_beam SET fabricante= entrada2,cableUSB= entrada3 ,cableHDMI= entrada4,cableVGA= entrada5,observaciones= entrada6 WHERE idVideoBeam=entrada1 ;
end;
elseif (entrada = 2) THEN
begin

INSERT INTO tbl_video_beam(idVideoBeam, fabricante, cableUSB, cableHDMI, cableVGA, observaciones) VALUES (entrada1 ,entrada2 ,entrada3 ,entrada4 ,entrada5 ,entrada6);
end;
end if;
