DROP DATABASE IF EXISTS reciclape;
CREATE DATABASE reciclape;
USE reciclape;

-- 
-- Definiendo la tabla `Usuario` 
-- 

CREATE TABLE `usuario` (
	`UsuarioID` INT NOT NULL AUTO_INCREMENT,
	`UsuarioCorreo` VARCHAR(100) NOT NULL,
	`UsuarioPassword` VARCHAR(100) NOT NULL,
	`UsuarioNombres` VARCHAR(100) NULL DEFAULT NULL,
    `UsuarioApellidos` VARCHAR(100) NULL DEFAULT NULL,
	`UsuarioDireccion` VARCHAR(200) NULL DEFAULT NULL,
	`UsuarioTelefono` INT(10) NULL DEFAULT NULL,

	PRIMARY KEY (`UsuarioID`)
)
ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- 
-- Insertando datos a la tabla `Usuario` 
-- 

INSERT INTO `usuario` (`UsuarioID`, `UsuarioCorreo`, `UsuarioPassword`, `UsuarioNombres`, `UsuarioApellidos`, `UsuarioDireccion`, `UsuarioTelefono`) VALUES 
	(1, 'luis.carlos1999h@gmail.com', 'abc123def', 'Luis', 'Huamaní', 'Avenida Javier Prado Oeste 980, Int. 901, Magdalena', 965126613),
    (2, 'jlqs97@gmail.com', 'abc123def', 'Giorgio', 'Emé', 'Avenida Javier Prado Oeste 980, Int. 901, Magdalena', 957212662),
    (3, 'xjsanchezf@gmail.com', 'abc123def', 'Xiomara', 'Sánchez', 'Avenida Javier Prado Oeste 980, Int. 901, Magdalena', 992137315);

-- 
-- Definiendo la tabla `Empresa` 
--  

DROP TABLE IF EXISTS empresa;
CREATE TABLE empresa (
    EmpresaID INT NOT NULL AUTO_INCREMENT,
    EmpresaRUC BIGINT(11) NOT NULL,
    EmpresaRazSoc VARCHAR(200) NOT NULL ,
    EmpresaCorreo VARCHAR(200) NULL DEFAULT NULL,
    EmpresaDireccion VARCHAR(200) NOT NULL ,
    EmpresaTelefono INT(9) NULL DEFAULT NULL,

    PRIMARY KEY (EmpresaID)
)
DEFAULT CHARSET=utf8mb4;

INSERT INTO empresa (EmpresaID, EmpresaRUC, EmpresaRazSoc, EmpresaCorreo, EmpresaDireccion, EmpresaTelefono) VALUES 
    (1, 20601106940, 'Reciclando Perú', 'contacto@reciclandoperu.com', 'Manzana F Lote 20 Grupo 4, Cruz de Motupe, San Juan de Lurigancho', 970713494),
    (2, 20516647281, 'Recyclean Perú', 'percy@recycleanperu.com', 'Nevado Yanahuanca S/N Mz. 1 Lt. 6A, Urb. Villa Baja Chorrillos, Chorrillos', 2581586),
    (3, 20602129676, 'Recipack', 'informes@recipack.com.pe', 'Mz. M1 Lt. 6-B Coop. Agrop. Las Vertientes, Villa El Salvador', 4178031);

-- 
-- Definiendo la tabla Categoria
-- 

CREATE TABLE `categoria` (
	`CategoriaID` INT NOT NULL AUTO_INCREMENT,
	`CategoriaNombre` VARCHAR(100) NOT NULL,
	`CategoriaDesc` VARCHAR(100) NULL DEFAULT NULL,

	PRIMARY KEY (`CategoriaID`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 
-- Insertando datos a la tabla `Categoria` 
-- 

INSERT INTO `categoria` (`CategoriaID`, `CategoriaNombre`, `CategoriaDesc`) VALUES 
    (1, 'Papel', 'Todo tipo de papeles y sus derivados.'),
    (2, 'Plástico', 'ABC, PVC, etc.'),
    (3, 'Vidrio', 'Cualquier producto hecho a base de vidrio.'),
    (4, 'Metal', 'Todo tipo de metales y aleaciones.'),
    (5, 'Orgánico', 'Residuos que sean perecibles.'),
    (6, 'Baterías', 'Pilas y baterías de motor.'),
    (7, 'Focos', 'Bombillas de luz de todo tipo y tamaño.'),
    (8, 'Electrónica', 'Electrodomésticos, piezas de computadora, celulares, etc.'),
    (9, 'Otros', 'Ropa, accesorios, cerámicas, etc.');

-- 
-- Definiendo la tabla `Producto` 
-- 

CREATE TABLE `producto` (
	`ProductoID` INT NOT NULL AUTO_INCREMENT,
	`ProductoNombre` VARCHAR(45) NOT NULL,
	`ProductoDesc` VARCHAR(100) NULL DEFAULT NULL,
	`ProductoPrecio` FLOAT NOT NULL,
	`ProductoImagen` BLOB NULL DEFAULT NULL,
	`ProductoCategoria` INT NOT NULL,

	PRIMARY KEY (`ProductoID`),

	KEY `FK_Item_CategoriaID` (`ProductoCategoria`),
	CONSTRAINT `FK_Item_CategoriaID` FOREIGN KEY (`ProductoCategoria`) REFERENCES `categoria` (`CategoriaID`) ON DELETE CASCADE
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Insertando datos a la tabla `Producto`
--

INSERT INTO `producto` (`ProductoID`, `ProductoNombre`, `ProductoPrecio`, `ProductoCategoria`) VALUES
	(100, 'Periódicos', 1.20, 1),
    (101, 'Cartones', 0.20, 1),
    (102, 'Papel Bond', 0.15, 1),
    (200, 'Botellas', 0.12, 2),
    (201, 'Chapitas', 0.22, 2),
    (300, 'Ventanas rotas', 0.59, 3),
    (400, 'Cobre', 0.79, 4),
    (401, 'Bronce', 0.89, 4),
    (600, 'Pilas', 1.40, 6),
    (700, 'Focos', 2.02, 7),
    (800, 'Partes de computadora', 9.90, 8),
    (801, 'Equipos de sonido', 12.90, 8),
    (900, 'Ropa', 12.90, 9),
    (901, 'Calzado', 4.90, 9);



--
-- Definiendo la tabla `DetallePedido`
--
 
CREATE TABLE `detallepedido` (
 	`DetalleID` INT NOT NULL AUTO_INCREMENT ,
 	`DetalleProducto` INT NOT NULL ,
 	`DetalleCantidad` FLOAT NOT NULL,

	PRIMARY KEY (`DetalleID`),

	KEY `FK_DetallePedido_ProductoID` (`DetalleProducto`),
	CONSTRAINT `FK_DetallePedido_ProductoID` FOREIGN KEY (`DetalleProducto`) REFERENCES `producto` (`ProductoID`) ON DELETE CASCADE
)
DEFAULT CHARSET=utf8mb4;

--
-- Insertando datos a la tabla `DetallePedido` 
--

INSERT INTO `detallepedido` (`DetalleID`, `DetalleProducto`, `DetalleCantidad`) VALUES
	(1, 1, 2.05),
    (2, 1, 2.05),
    (3, 1, 2.05),
    (4, 1, 2.05),
    (5, 1, 2.05);

--
-- Definiendo la tabla `Pedido`
--

CREATE TABLE `pedido` (
    `PedidoID` INT NOT NULL AUTO_INCREMENT ,
    `PedidoDetalle` INT NOT NULL ,
    `PedidoFecha` TIMESTAMP NOT NULL ,
    `PedidoUsuario` INT NOT NULL ,
    `PedidoEmpresa` INT NOT NULL ,

    PRIMARY KEY (`PedidoID`),

    KEY `FK_Pedido_DetalleID` (`PedidoDetalle`),
    CONSTRAINT `FK_Pedido_DetalleID` FOREIGN KEY (`PedidoDetalle`) REFERENCES `detallepedido` (`DetalleID`) ON DELETE CASCADE,

    KEY `FK_Pedido_UsuarioID` (`PedidoUsuario`),
    CONSTRAINT `FK_Pedido_UsuarioID` FOREIGN KEY (`PedidoUsuario`) REFERENCES `usuario` (`UsuarioID`) ON DELETE CASCADE,

    KEY `FK_Pedido_EmpresaID` (`PedidoEmpresa`),
    CONSTRAINT `FK_Pedido_EmpresaID` FOREIGN KEY (`PedidoEmpresa`) REFERENCES `empresa` (`EmpresaID`) ON DELETE CASCADE
)
DEFAULT CHARSET=utf8mb4;

--
-- Insertando datos a la tabla `pedido` 
--
INSERT INTO pedido (PedidoID, PedidoDetalle,PedidoUsuario,PedidoEmpresa) VALUES
    -- Pedidos para Usuario 1
    (101, 1, 1, 1),
    (102, 2, 1, 2),
    (103, 3, 1, 2),
    (104, 4, 1, 3),
    (105, 5, 1, 2),
    -- Pedidos para Usuario 2
    (201, 1, 2, 1),
    (202, 2, 2, 2),
    (203, 3, 2, 2),
    (204, 4, 2, 3),
    (205, 5, 2, 2),
    -- Pedidos para Usuario 3
    (301, 1, 3, 2),
    (302, 2, 3, 3),
    (303, 3, 3, 1),
    (304, 4, 3, 2),
    (305, 5, 3, 1);

-- 
-- Definiendo la tabla `Admin` 
-- 

CREATE TABLE `admin` (
	`AdminID` INT NOT NULL AUTO_INCREMENT,
	`AdminNombre` VARCHAR(45) NOT NULL,
	`AdminPassword` VARCHAR(45) NOT NULL,

	PRIMARY KEY (`AdminID`)
)
ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- 
-- Insertando datos a la tabla `Admin` 
-- 

INSERT INTO `admin` (`AdminID`, `AdminNombre`, `AdminPassword`) VALUES
    (1, 'luishuamani', 'abc123def'),
    (2, 'giorgioeme', 'abc123def'),
    (3, 'xiomarasanchez', 'abc123def');