# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases V8.1.2                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          Project1.dez                                    #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database drop script                            #
# Created on:            2019-08-20 00:21                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Drop procedures                                                        #
# ---------------------------------------------------------------------- #

DROP PROCEDURE `computador`;

DROP PROCEDURE `insetUsuario`;

DROP PROCEDURE `tema`;

DROP PROCEDURE `miprocesos1`;

DROP PROCEDURE `usuario`;

DROP PROCEDURE `miprocesos`;

DROP PROCEDURE `videoBeam`;

# ---------------------------------------------------------------------- #
# Drop views                                                             #
# ---------------------------------------------------------------------- #

DROP VIEW `listarautor`;

DROP VIEW `listareditorial`;

DROP VIEW `listartema`;

DROP VIEW `lomasbuscadolibro`;

# ---------------------------------------------------------------------- #
# Drop foreign key constraints                                           #
# ---------------------------------------------------------------------- #

ALTER TABLE `tbl_libro` DROP FOREIGN KEY `Editorial_Libro`;

ALTER TABLE `tbl_libro_autor` DROP FOREIGN KEY `tbl_autor_tbl_libro_autor`;

ALTER TABLE `tbl_libro_autor` DROP FOREIGN KEY `tbl_libro_tbl_libro_autor`;

ALTER TABLE `tbl_libro_categoria` DROP FOREIGN KEY `tbl_categoria_tbl_libro_categoria`;

ALTER TABLE `tbl_libro_categoria` DROP FOREIGN KEY `tbl_libro_tbl_libro_categoria`;

ALTER TABLE `tbl_libro_listapublica` DROP FOREIGN KEY `tbl_libro_tbl_libro_listaPublica`;

ALTER TABLE `tbl_libro_listapublica` DROP FOREIGN KEY `tbl_listaPublica_tbl_libro_listaPublica`;

ALTER TABLE `tbl_libro_temas` DROP FOREIGN KEY `tbl_libro_tbl_libro_temas`;

ALTER TABLE `tbl_libro_temas` DROP FOREIGN KEY `tbl_temas_tbl_libro_temas`;

ALTER TABLE `tbl_milista` DROP FOREIGN KEY `tbl_libro_tbl_usuario_tbl_libro`;

ALTER TABLE `tbl_milista` DROP FOREIGN KEY `tbl_usuario_tbl_usuario_tbl_libro`;

ALTER TABLE `tbl_prestamo` DROP FOREIGN KEY `TBL_Computador_TBL_Prestamo`;

ALTER TABLE `tbl_prestamo` DROP FOREIGN KEY `TBL_Video_Beam_TBL_Prestamo`;

ALTER TABLE `tbl_prestamo` DROP FOREIGN KEY `tbl_libro_tbl_prestamo`;

ALTER TABLE `tbl_prestamo` DROP FOREIGN KEY `tbl_usuario_tbl_prestamo`;

ALTER TABLE `tbl_prestamo_interbibliotecario` DROP FOREIGN KEY `tbl_biblioteca_tbl_prestamo_InterBibliotecario`;

ALTER TABLE `tbl_prestamo_interbibliotecario` DROP FOREIGN KEY `tbl_libro_prestamoint_tbl_prestamo_InterBibliotecario`;

ALTER TABLE `tbl_prestamo_interbibliotecario` DROP FOREIGN KEY `tbl_prestamo_tbl_prestamo_InterBibliotecario`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_prestamo_interbibliotecario"                           #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tbl_prestamo_interbibliotecario` MODIFY `idPrestamoInterBiblio` INTEGER(11) NOT NULL;

# Drop constraints #

ALTER TABLE `tbl_prestamo_interbibliotecario` DROP PRIMARY KEY;

DROP TABLE `tbl_prestamo_interbibliotecario`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_prestamo"                                              #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tbl_prestamo` MODIFY `idPrestamo` INTEGER(11) NOT NULL;

# Drop constraints #

ALTER TABLE `tbl_prestamo` ALTER COLUMN `renovacion` DROP DEFAULT;

ALTER TABLE `tbl_prestamo` DROP PRIMARY KEY;

DROP TABLE `tbl_prestamo`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_milista"                                               #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tbl_milista` MODIFY `id_miLista` INTEGER(11) NOT NULL;

# Drop constraints #

ALTER TABLE `tbl_milista` DROP PRIMARY KEY;

DROP TABLE `tbl_milista`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_libro_temas"                                           #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tbl_libro_temas` MODIFY `idLibroTema` INTEGER(11) NOT NULL;

# Drop constraints #

ALTER TABLE `tbl_libro_temas` DROP PRIMARY KEY;

DROP TABLE `tbl_libro_temas`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_libro_listapublica"                                    #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tbl_libro_listapublica` MODIFY `id_listaPublica` INTEGER(11) NOT NULL;

# Drop constraints #

ALTER TABLE `tbl_libro_listapublica` DROP PRIMARY KEY;

DROP TABLE `tbl_libro_listapublica`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_video_beam"                                            #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tbl_video_beam` ALTER COLUMN `estadoVideoBeam` DROP DEFAULT;

ALTER TABLE `tbl_video_beam` DROP PRIMARY KEY;

DROP TABLE `tbl_video_beam`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_usuario"                                               #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tbl_usuario` MODIFY `id` INTEGER(11) NOT NULL;

# Drop constraints #

ALTER TABLE `tbl_usuario` ALTER COLUMN `telefonoPrincipal` DROP DEFAULT;

ALTER TABLE `tbl_usuario` ALTER COLUMN `telefonoSecundario` DROP DEFAULT;

ALTER TABLE `tbl_usuario` ALTER COLUMN `contactoTelefono` DROP DEFAULT;

ALTER TABLE `tbl_usuario` ALTER COLUMN `multa` DROP DEFAULT;

ALTER TABLE `tbl_usuario` ALTER COLUMN `perfil` DROP DEFAULT;

ALTER TABLE `tbl_usuario` ALTER COLUMN `intentos` DROP DEFAULT;

ALTER TABLE `tbl_usuario` DROP PRIMARY KEY;

DROP TABLE `tbl_usuario`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_temas"                                                 #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tbl_temas` MODIFY `idTema` INTEGER(11) NOT NULL;

# Drop constraints #

ALTER TABLE `tbl_temas` DROP PRIMARY KEY;

DROP TABLE `tbl_temas`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_listapublica"                                          #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tbl_listapublica` MODIFY `id_lista` INTEGER(11) NOT NULL;

# Drop constraints #

ALTER TABLE `tbl_listapublica` DROP PRIMARY KEY;

DROP TABLE `tbl_listapublica`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_libro_prestamoint"                                     #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tbl_libro_prestamoint` DROP PRIMARY KEY;

DROP TABLE `tbl_libro_prestamoint`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_libro_categoria"                                       #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tbl_libro_categoria` MODIFY `id_libroCategoria` INTEGER(11) NOT NULL;

# Drop constraints #

ALTER TABLE `tbl_libro_categoria` DROP PRIMARY KEY;

DROP TABLE `tbl_libro_categoria`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_libro_autor"                                           #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tbl_libro_autor` MODIFY `idAutorLibro` INTEGER(11) NOT NULL;

# Drop constraints #

ALTER TABLE `tbl_libro_autor` DROP PRIMARY KEY;

DROP TABLE `tbl_libro_autor`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_libro"                                                 #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tbl_libro` ALTER COLUMN `estado` DROP DEFAULT;

ALTER TABLE `tbl_libro` DROP PRIMARY KEY;

DROP TABLE `tbl_libro`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_editorial"                                             #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tbl_editorial` MODIFY `idEditorial` INTEGER(11) NOT NULL;

# Drop constraints #

ALTER TABLE `tbl_editorial` DROP PRIMARY KEY;

DROP TABLE `tbl_editorial`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_computador"                                            #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tbl_computador` ALTER COLUMN `estadoComputador` DROP DEFAULT;

ALTER TABLE `tbl_computador` DROP PRIMARY KEY;

DROP TABLE `tbl_computador`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_categoria"                                             #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tbl_categoria` DROP PRIMARY KEY;

DROP TABLE `tbl_categoria`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_biblioteca"                                            #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tbl_biblioteca` MODIFY `idBiblioteca` INTEGER(11) NOT NULL;

# Drop constraints #

ALTER TABLE `tbl_biblioteca` DROP PRIMARY KEY;

DROP TABLE `tbl_biblioteca`;

# ---------------------------------------------------------------------- #
# Drop table "tbl_autor"                                                 #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tbl_autor` MODIFY `idAutor` INTEGER(11) NOT NULL;

# Drop constraints #

ALTER TABLE `tbl_autor` ALTER COLUMN `nombreAutor` DROP DEFAULT;

ALTER TABLE `tbl_autor` DROP PRIMARY KEY;

DROP TABLE `tbl_autor`;
