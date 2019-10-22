DROP DATABASE IF EXISTS reciclape;
CREATE DATABASE reciclape;
USE reciclape;





-- 
-- Tabla `user` 
-- 

CREATE TABLE `usuario` (
	`id` 					INT(11) 			NOT NULL AUTO_INCREMENT,
	`ruc` 				VARCHAR(11) 	NOT NULL,
	`correo` 			VARCHAR(100) 	NOT NULL,
	`password` 			VARCHAR(45) 	NOT NULL,
	`nombre` 			VARCHAR(100) 	NULL DEFAULT NULL,
	`direccion`		VARCHAR(100) 	NULL DEFAULT NULL,
	`telefono` 		VARCHAR(50) 	NULL DEFAULT NULL,

	PRIMARY KEY (`id`)
)

COLLATE	= 'latin1_swedish_ci'
ENGINE	= InnoDB
AUTO_INCREMENT = 2
;


-- Insertando datos en `usuario`

INSERT INTO `usuario` (`id`, `ruc`, `correo`, `password`, `nombre`, `direccion`, `telefono`)
VALUES 
	(1, '20520869655', 'info@pacheco.pe', 'password', 'Pacheco Hnos.', 'Avenida Javier Prado Oeste 980, Magdalena', '+51 1 6172400')
;





-- 
-- Tabla `recicladora`
-- 

CREATE TABLE `recicladora`
(
 `id`   					int 					NOT NULL AUTO_INCREMENT ,
 `ruc`            varchar(11) 	NOT NULL ,
 `nombre`         varchar(200) 	NOT NULL ,
 `correo`         varchar(200) 	NULL DEFAULT NULL,
 `direccion`      varchar(200) 	NULL DEFAULT NULL,
 `telefono`       varchar(20) 	NULL DEFAULT NULL,

PRIMARY KEY (`id`)
);

INSERT INTO `recicladora` (`id`, `ruc`, `nombre`, `correo`, `direccion`, `telefono`) VALUES 
  (1, '20601106940', 'Reciclando Perú', 'contacto@reciclandoperu.com', 'Manzana F Lote 20 Grupo 4, Cruz de Motupe, San Juan de Lurigancho', '+51 970713494');





-- 
-- Tabla `categorias`
-- 

CREATE TABLE `categorias` (
	`id` 					INT 					NOT NULL AUTO_INCREMENT,
	`nombre` 			VARCHAR(100) 	NOT NULL,
	`icono` 			VARCHAR(100) 	NOT NULL,
	`descripcion` VARCHAR(300) 	NULL DEFAULT NULL,

	PRIMARY KEY (`id`)
)

COLLATE = 'latin1_swedish_ci'
ENGINE 	= InnoDB
;

-- Insertando datos en `categorias`

INSERT INTO `categorias` (`id`, `nombre`) VALUES 
  (1, 'Papel'),
  (2, 'Metales'),
  (3, 'Plástico'),
  (4, 'Vidrio');





-- 
-- Tabla `item`
-- 

CREATE TABLE `item` (
	`id` 			INT NOT NULL AUTO_INCREMENT,
	`nombre` 		VARCHAR(100) NOT NULL,
	`descripcion` 	VARCHAR(100) NULL DEFAULT NULL,
	`precio` 		FLOAT NOT NULL,
	`icono` 		VARCHAR(100) NULL DEFAULT NULL,
	`categoria` 	INT NOT NULL,

	PRIMARY KEY (`id`),

	KEY `FK_Item_CategoriaID` (`categoria`),
	CONSTRAINT `FK_Item_CategoriaID` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`)
)

COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;

-- Insertando datos en `item`

INSERT INTO `item` (`id`, `nombre`, `precio`, `categoria`) VALUES
	(1, 'Cobre', '10.30', 	2),
	(2, 'Aluminio', 11.20, 	2),
	(3, 'Plomo', 15.65,	2);



-- 
-- Tabla `producto`
-- 

CREATE TABLE `detalle_pedido`
(
 	`id`   			INT NOT NULL AUTO_INCREMENT ,
 	`nombre`   	VARCHAR(45) NOT NULL ,
 	`cantidad` 	FLOAT NOT NULL,
 	`item`      INT NOT NULL,

	PRIMARY KEY (`id`),

	KEY `FK_Producto_ItemID` (`item`),
	CONSTRAINT `FK_Producto_ItemID` FOREIGN KEY (`item`) REFERENCES `item` (`id`)
);





-- 
-- Tabla `pedido`
-- 

CREATE TABLE `pedido`
(
 `id`      				INT NOT NULL AUTO_INCREMENT ,
 `detalle_pedido` INT NOT NULL ,
 `fecha_pedido`   DATETIME NOT NULL ,
 `fecha_recojo`   DATETIME NOT NULL ,
 `usuario`     		INT NOT NULL ,
 `recicladora` 		INT NOT NULL ,

PRIMARY KEY (`id`),

KEY `FK_Pedido_DetalleID` (`detalle_pedido`),
CONSTRAINT `FK_Pedido_DetalleID` FOREIGN KEY (`detalle_pedido`) REFERENCES `detalle_pedido` (`id`),

KEY `FK_Pedido_UsuarioID` (`usuario`),
CONSTRAINT `FK_Pedido_UsuarioID` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`),

KEY `FK_Pedido_RecicladoraID` (`recicladora`),
CONSTRAINT `FK_Pedido_RecicladoraID` FOREIGN KEY (`recicladora`) REFERENCES `recicladora` (`id`)
);





-- 
-- Tabla `admin` 
-- 

CREATE TABLE `admin` (
	`id` 				INT						NOT NULL AUTO_INCREMENT,
	`nombre` 			VARCHAR(100) 	NOT NULL,
	`password` 		VARCHAR(45) 	NOT NULL,

	PRIMARY KEY (`id`)
)

COLLATE	= 'latin1_swedish_ci'
ENGINE	= InnoDB
AUTO_INCREMENT = 2
;

-- Insertando admin por defecto

INSERT INTO `admin` (`id`, `nombre`, `password`) VALUES
 (1, 'luis.huamani', 'password'),
 (2, 'giorgio.eme', 'password'),
 (3, 'xiomara.sanchez', 'password');