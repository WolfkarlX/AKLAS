-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2023 a las 00:46:47
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aklas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `AreaID` int(11) NOT NULL,
  `NameArea` varchar(50) NOT NULL,
  `RacksQ` int(11) NOT NULL,
  `Rackf` int(11) NOT NULL,
  `Storaget` varchar(15) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`AreaID`, `NameArea`, `RacksQ`, `Rackf`, `Storaget`, `Description`) VALUES
(1, 'Alimentos', 10, 10, 'BODEGA', 'Área donde se almacenan los comestibles y bebibles'),
(2, 'Electrónica', 10, 10, 'BODEGA', 'Área donde se almacena lo electrónico'),
(3, 'Salud y Belleza', 10, 10, 'BODEGA', 'Área donde se almacenan aquellos productos que sirven para el cuidado del cuerpo y para acicalarse ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`, `Description`) VALUES
(1, 'LÁCTEOS Y HUEVO', 'Los lácteos son productos alimenticios que se elaboran con la leche de animales mamíferos, principalmente vacas, ovejas, cabras y búfalas.'),
(3, 'BEBIDAS', 'Se denomina bebida a la sustancia que puede beberse. Esta acción (beber) alude a la ingesta de un líquido. El agua, la gaseosa, el vino, el café y la cerveza son algunas de las bebidas más populares.'),
(4, 'ELECTRÓNICOS', 'Aparatos electrónicos como computadoras, celulares, relojes digitales, televisores, circuitos electrónicos, entre muchos otros.'),
(5, 'CUIDADO PERSONAL', 'La autoprotección, velar por el bienestar propio y la imagen que transmitimos a los demás, hacen parte del cuidado personal. Muchos lo asocian con aseo e higiene que permite que el cuerpo y la mente se encuentren saludables.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `EmployeID` int(11) NOT NULL,
  `LastName` varchar(30) DEFAULT NULL,
  `FirstName` varchar(30) DEFAULT NULL,
  `BirthDate` datetime DEFAULT NULL,
  `Description` varchar(1024) DEFAULT NULL,
  `IdKey` int(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `code` mediumint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`EmployeID`, `LastName`, `FirstName`, `BirthDate`, `Description`, `IdKey`, `email`, `Password`, `rol`, `code`) VALUES
(1, 'root', 'root', NULL, 'root', 12345678, 'aklasventas@gmail.com', '$2y$10$Pwtg/t9M6Q68clotNE6u3OF4VDylwAib..OlULwXDmV0tQQxXbk9C', 'root', NULL),
(2, 'Vargas Ponce', 'Alan Gabriel', NULL, 'Es God', 23090001, 'avargas39@ucol.mx ', '$2y$10$zmj/qWTzRvut4Y1Iv/LGueZGkAVm3WVrz5Jnzxr3gW.CtpDEWNrEi', 'empleado', NULL),
(3, 'San Millan Ramos', 'Alan Adolfo', NULL, 'Jefe de area', 23090002, 'asanmillan@ucol.mx', '$2y$10$GmlSpkTC5i9mQjAh2PLPoeRCv.7y0yGWuXeG1LbwxYUz.wFhwPIGa', 'jefe', NULL),
(4, 'Ramírez Márquez', 'Karla Karina', NULL, 'Ing. de software', 23101327, 'kramirez32@ucol.mx', '$2y$10$ZcV48MUkQRHkUwhQ8zxpAur7JVEFV5nWOqd6T8y.AxG0ZgUzVH0OG', 'jefe', NULL),
(5, 'Bustamante Bernabe', 'Saúl', NULL, '', 23110001, 'sbustamante@ucol.mx', '$2y$10$0TT84yf3V9Eokcnlo/757uM.aKe4rFhNOTlK0NPqhPearYbQG/2Jm', 'jefe', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(50) DEFAULT NULL,
  `SupplierID` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `AreaID` int(11) DEFAULT NULL,
  `StorageR` int(15) NOT NULL,
  `StorageRF` int(16) NOT NULL,
  `Price` decimal(10,0) DEFAULT NULL,
  `Quantity` int(11) NOT NULL DEFAULT 0,
  `Description` text NOT NULL,
  `MaxQuantityLimit` int(11) DEFAULT NULL,
  `MinQuantityLimit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `SupplierID`, `CategoryID`, `AreaID`, `StorageR`, `StorageRF`, `Price`, `Quantity`, `Description`, `MaxQuantityLimit`, `MinQuantityLimit`) VALUES
(1, 'Leche entera', 1, 1, 1, 1, 5, 0, 10, 'Leche entera de vaca, Lala 1 L', 10, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_tags`
--

CREATE TABLE `products_tags` (
  `ProductsTagsID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `TagID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products_tags`
--

INSERT INTO `products_tags` (`ProductsTagsID`, `ProductID`, `TagID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suppliers`
--

CREATE TABLE `suppliers` (
  `SupplierID` int(11) NOT NULL,
  `SupplierName` varchar(50) DEFAULT NULL,
  `ContactName` varchar(50) DEFAULT NULL,
  `Address` varchar(130) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL,
  `Country` varchar(15) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `suppliers`
--

INSERT INTO `suppliers` (`SupplierID`, `SupplierName`, `ContactName`, `Address`, `City`, `PostalCode`, `Country`, `Phone`) VALUES
(1, 'Grupo LALA', 'Arquímedes Adriano Celis Ordaz', 'Calz. Carlos Herrera Araluce No. 185, Parque Industrial Carlos Herrera A.', 'Gómez Palacio, Durango', '35079', 'México', '7797969600'),
(2, 'Cocal Cola', 'Ian Craig García', 'Rubén Darío 115 Col. Bosque de Chapultepec', 'Ciudad de México', '11580', 'México', '8007044400'),
(3, 'Pepsico México', 'Isaías Martínez Cuevas', 'Calzada Vallejo 734 Colonia Coltongo', 'Ciudad de México', '02630', 'México', '8009172273'),
(4, 'Samsung', 'Marcelo Lago', 'Calz. Gral. Mariano Escobedo 476-piso 8, Chapultep', 'Ciudad de México', '11590', 'México', '5592628333'),
(5, 'Lenovo', 'Marco Jimenez', 'Antonio Dovali Jaime #70, Torre A Piso 14, colonia Zedec Santa Fe, Alcaldía Álvaro Obregón', 'Ciudad de México', '01219', 'México', '5557989520'),
(6, 'Nivea', 'Perez Griselda', 'Torre Mapfre, Piso 10 Av. Paseo de la Reforma No. 243 Col. Juárez, Del. Cuauhtémoc', 'Ciudad de México', '06600', 'México', '5557290296');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `TagID` int(11) NOT NULL,
  `TagName` varchar(50) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`TagID`, `TagName`, `Description`) VALUES
(1, 'Alto en grasas', 'Tiene una alta cantidad de grasas, lo que puede ser perjudicial para la salud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Reason` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactiondetails`
--

CREATE TABLE `transactiondetails` (
  `TransactionDetailID` int(11) NOT NULL,
  `TransactionID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `PInput` int(11) DEFAULT 0,
  `POutput` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `transactiondetails`
--
DELIMITER $$
CREATE TRIGGER `ActualizaCantidadProducto` AFTER INSERT ON `transactiondetails` FOR EACH ROW BEGIN
	IF new.PInput <> 0 THEN
    	UPDATE products SET products.Quantity = products.Quantity + new.PInput WHERE products.ProductID = new.ProductID;
    END IF;
    IF new.POutput <> 0 THEN
		UPDATE products SET products.Quantity = products.Quantity - new.POutput WHERE products.ProductID = new.ProductID;
	END IF;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`AreaID`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeID`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `SupplierID` (`SupplierID`),
  ADD KEY `AreaID` (`AreaID`);

--
-- Indices de la tabla `products_tags`
--
ALTER TABLE `products_tags`
  ADD PRIMARY KEY (`ProductsTagsID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `TagID` (`TagID`);

--
-- Indices de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`TagID`);

--
-- Indices de la tabla `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indices de la tabla `transactiondetails`
--
ALTER TABLE `transactiondetails`
  ADD PRIMARY KEY (`TransactionDetailID`),
  ADD KEY `TransactionID` (`TransactionID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `AreaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `products_tags`
--
ALTER TABLE `products_tags`
  MODIFY `ProductsTagsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `TagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transactiondetails`
--
ALTER TABLE `transactiondetails`
  MODIFY `TransactionDetailID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`SupplierID`) REFERENCES `suppliers` (`SupplierID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`AreaID`) REFERENCES `area` (`AreaID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `products_tags`
--
ALTER TABLE `products_tags`
  ADD CONSTRAINT `products_tags_ibfk_1` FOREIGN KEY (`TagID`) REFERENCES `tags` (`TagID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_tags_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeID`);

--
-- Filtros para la tabla `transactiondetails`
--
ALTER TABLE `transactiondetails`
  ADD CONSTRAINT `transactiondetails_ibfk_1` FOREIGN KEY (`TransactionID`) REFERENCES `transaction` (`TransactionID`),
  ADD CONSTRAINT `transactiondetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
