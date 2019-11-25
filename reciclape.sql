DROP DATABASE IF EXISTS reciclape;
CREATE DATABASE reciclape;
USE reciclape;

-- 
-- Definiendo la tabla `Usuario` 
-- 

CREATE TABLE `Usuario` (
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

INSERT INTO `Usuario` (`UsuarioID`, `UsuarioCorreo`, `UsuarioPassword`, `UsuarioNombres`, `UsuarioApellidos`, `UsuarioDireccion`, `UsuarioTelefono`) VALUES 
	(1, 'luis.carlos1999h@gmail.com', 'abc123def', 'Luis', 'Huamaní', 'Avenida Javier Prado Oeste 980, Int. 901, Magdalena', 965126613),
    (2, 'jlqs97@gmail.com', 'abc123def', 'Giorgio', 'Emé', 'Avenida Javier Prado Oeste 980, Int. 901, Magdalena', 957212662),
    (3, 'xjsanchezf@gmail.com', 'abc123def', 'Xiomara', 'Sánchez', 'Avenida Javier Prado Oeste 980, Int. 901, Magdalena', 992137315);

-- 
-- Definiendo la tabla `Empresa` 
--  

CREATE TABLE `Empresa` (
    `EmpresaID` INT NOT NULL AUTO_INCREMENT ,
    `EmpresaRUC` INT(11) NOT NULL ,
    `EmpresaRazSoc` VARCHAR(200) NOT NULL ,
    `EmpresaCorreo` VARCHAR(200) NULL DEFAULT NULL,
    `EmpresaDireccion` VARCHAR(200) NULL DEFAULT NULL,
    `EmpresaTelefono` VARCHAR(20) NULL DEFAULT NULL,

    PRIMARY KEY (`EmpresaID`)
)
DEFAULT CHARSET=utf8mb4;

INSERT INTO `Empresa` (`EmpresaID`, `EmpresaRUC`, `EmpresaRazSoc`, `EmpresaCorreo`, `EmpresaDireccion`, `EmpresaTelefono`) VALUES 
    (1, '20601106940', 'Reciclando Perú', 'contacto@reciclandoperu.com', 'Manzana F Lote 20 Grupo 4, Cruz de Motupe, San Juan de Lurigancho', '970713494'),
    (2, '20601106940', 'Recyclean Perú', 'percy@recycleanperu.com', 'Nevado Yanahuanca S/N Mz. 1 Lt. 6A, Urb. Villa Baja Chorrillos, Chorrillos', '2581586'),
    (3, '20601106940', 'Recipack', 'informes@recipack.com.pe', 'Mz. M1 Lt. 6-B Coop. Agrop. Las Vertientes, Villa El Salvador', '4178031');

-- 
-- Definiendo la tabla `Categoria` 
-- 

CREATE TABLE `Categoria` (
	`CategoriaID` INT NOT NULL AUTO_INCREMENT,
	`CategoriaNombre` VARCHAR(100) NOT NULL,
	`CategoriaDesc` VARCHAR(100) NULL DEFAULT NULL,

	PRIMARY KEY (`CategoriaID`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 
-- Insertando datos a la tabla `Categoria` 
-- 

INSERT INTO `Categoria` (`CategoriaID`, `CategoriaNombre`, `CategoriaDesc`) VALUES 
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

CREATE TABLE `Producto` (
	`ProductoID` INT NOT NULL AUTO_INCREMENT,
	`ProductoNombre` VARCHAR(45) NOT NULL,
	`ProductoDesc` VARCHAR(100) NULL DEFAULT NULL,
	`ProductoPrecio` FLOAT NOT NULL,
	`ProductoImagen` BLOB NULL DEFAULT NULL,
	`ProductoCategoria` INT NOT NULL,

	PRIMARY KEY (`ProductoID`),

	KEY `FK_Item_CategoriaID` (`ProductoCategoria`),
	CONSTRAINT `FK_Item_CategoriaID` FOREIGN KEY (`ProductoCategoria`) REFERENCES `Categoria` (`CategoriaID`)
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Insertando datos a la tabla `Producto`
--

INSERT INTO `Producto` (`ProductoID`, `ProductoNombre`, `ProductoPrecio`, `ProductoCategoria`) VALUES
	(1, 'Periódicos', 1.20, 1);

--
-- Definiendo la tabla `DetallePedido`
--
 
CREATE TABLE `DetallePedido` (
 	`DetalleID` INT NOT NULL AUTO_INCREMENT ,
 	`DetalleProducto` INT NOT NULL ,
 	`DetalleCantidad` FLOAT NOT NULL,

	PRIMARY KEY (`DetalleID`),

	KEY `FK_DetallePedido_ProductoID` (`DetalleProducto`),
	CONSTRAINT `FK_DetallePedido_ProductoID` FOREIGN KEY (`DetalleProducto`) REFERENCES `Producto` (`ProductoID`)
)
DEFAULT CHARSET=utf8mb4;

--
-- Insertando datos a la tabla `DetallePedido` 
--

--
-- Definiendo la tabla `Pedido`
--

CREATE TABLE `Pedido` (
    `PedidoID` INT NOT NULL AUTO_INCREMENT ,
    `PedidoDetalle` INT NOT NULL ,
    `PedidoFecha` TIMESTAMP NOT NULL ,
    `PedidoUsuario` INT NOT NULL ,
    `PedidoEmpresa` INT NOT NULL ,

    PRIMARY KEY (`PedidoID`),

    KEY `FK_Pedido_DetalleID` (`PedidoDetalle`),
    CONSTRAINT `FK_Pedido_DetalleID` FOREIGN KEY (`PedidoDetalle`) REFERENCES `DetallePedido` (`DetalleID`),

    KEY `FK_Pedido_UsuarioID` (`PedidoUsuario`),
    CONSTRAINT `FK_Pedido_UsuarioID` FOREIGN KEY (`PedidoUsuario`) REFERENCES `Usuario` (`UsuarioID`),

    KEY `FK_Pedido_EmpresaID` (`PedidoEmpresa`),
    CONSTRAINT `FK_Pedido_EmpresaID` FOREIGN KEY (`PedidoEmpresa`) REFERENCES `Empresa` (`EmpresaID`)
)
DEFAULT CHARSET=utf8mb4;

-- 
-- Definiendo la tabla `Admin` 
-- 

CREATE TABLE `Admin` (
	`AdminID` INT NOT NULL AUTO_INCREMENT,
	`AdminNombre` VARCHAR(45) NOT NULL,
	`AdminPassword` VARCHAR(45) NOT NULL,

	PRIMARY KEY (`AdminID`)
)
ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- 
-- Insertando datos a la tabla `Admin` 
-- 

INSERT INTO `Admin` (`AdminID`, `AdminNombre`, `AdminPassword`) VALUES
    (1, 'luishuamani', 'abc123def'),
    (2, 'giorgioeme', 'abc123def'),
    (3, 'xiomarasanchez', 'abc123def');