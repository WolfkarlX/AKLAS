-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2023 a las 17:16:44
-- Versión del servidor: 11.2.0-MariaDB
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
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`AreaID`, `NameArea`, `Description`) VALUES
(1, 'Area 1', 'BEBIDAS CARBONATADAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(25) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`, `Description`) VALUES
(7, 'BEBIDAS CARBONATADAS', 'Coca-Cola es la bebida mÃ¡s vendida en la historia desde 1886. Es la marca mÃ¡s famosa del mundo. Bien frÃ­a, hace disfrutar cada instante de la vida ya que aÃ±ade magia a cada momento.'),
(8, 'AGUA GASIFICADA', 'Ciel Mineralizada es una marca de agua mineralizada y carbonatada que entrÃ³ al mercado mexicano en el 2001. Es una opciÃ³n baja en sodio que puede contribuir a la hidrataciÃ³n y que tambiÃ©n puede ser disfrutada como base de otras bebidas como naranjadas y limonadas.'),
(9, 'AGUA DE SABORES', 'El nuevo integrante de la familia Ciel, exprime todo el sabor de las frutas y las hojas para ofrecerte cuatro sabores que te invitan a descubrir mÃ¡s.'),
(10, 'BEBIDA A BASE DE FRUTAS', 'Delaware Punch es un refresco sabor a frutas. Su fÃ³rmula utiliza una mezcla de sabores de frutas, siendo uva la mÃ¡s destacada.'),
(11, 'BEBIDAS DEPORTIVAS', 'Innovadora bebida para deportistas que te da todos los beneficios de la tecnologÃ­a ION4 con gran sabor. La tecnologÃ­a ION4 repone 4 de los minerales que se pierden al sudar: Sodio(NA), Potasio(K), Calcio(Ca) y Magnesio(Mg).'),
(12, 'AGUA PURIFICADA', 'Tu cerebro se deshidrata incluso antes de que te des cuenta. Mantente hidratado. Ciel conecta mente y cuerpo.');

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
  `Password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`EmployeID`, `LastName`, `FirstName`, `BirthDate`, `Description`, `IdKey`, `email`, `Password`) VALUES
(1, 'root', 'root', NULL, 'root', 12345678, 'asanmillan@ucol.mx', '$2y$10$Pwtg/t9M6Q68clotNE6u3OF4VDylwAib..OlULwXDmV0tQQxXbk9C'),
(7, 'Bustamante Bernabe', 'Saúl', NULL, '', 23090001, 'sbustamante@ucol.mx', '$2y$10$089ST.rffLFGeIpTQRzL6uIDjkqZ6NRy20rUIQ1mcb.q/NDDbk/qq'),
(10, 'San Millan Ramos', 'Alan Adolfo', NULL, 'Backend', 23100002, 'alansanmillanr@gmail.com', '$2y$10$MO9FRH.AuepLeGbWCjKhLutyTcp3EmqOPPqLJo93a81kDLovm.gsa');

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
  `Price` decimal(10,0) DEFAULT NULL,
  `Quantity` int(11) NOT NULL DEFAULT 0,
  `MaxQuantityLimit` int(11) DEFAULT NULL,
  `MinQuantityLimit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_tags`
--

CREATE TABLE `products_tags` (
  `ProductsTagsID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `TagID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suppliers`
--

CREATE TABLE `suppliers` (
  `SupplierID` int(11) NOT NULL,
  `SupplierName` varchar(50) DEFAULT NULL,
  `ContactName` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL,
  `Country` varchar(15) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `suppliers`
--

INSERT INTO `suppliers` (`SupplierID`, `SupplierName`, `ContactName`, `Address`, `City`, `PostalCode`, `Country`, `Phone`) VALUES
(3, 'SportX', 'JosÃ© Joshua Rodriguez Ãvila', 'Los Patos, calle Itzora #108', 'Manzanillo', '28200', 'MÃ©xico', '3141232927'),
(4, 'Coca Cola', 'James Quincey', 'RubÃ©n DarÃ­o 115 Col. Bosque de Chapultepec', 'Ciudad de MÃ©xico', '11580', 'MÃ©xico', '8007044400');

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
(4, 'Rehidratante', 'Recupera sales y minerales que pierdes al sudar'),
(5, 'Exceso de azÃºcares', 'Contenidp alto en azÃºcar'),
(6, 'Light', 'DietÃ©tica y ligera'),
(7, 'Energizante', 'ObtÃ©n energÃ­a en seguida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL DEFAULT current_timestamp()
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
  MODIFY `AreaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products_tags`
--
ALTER TABLE `products_tags`
  MODIFY `ProductsTagsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `TagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`SupplierID`) REFERENCES `suppliers` (`SupplierID`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`AreaID`) REFERENCES `area` (`AreaID`) ON DELETE SET NULL ON UPDATE CASCADE;

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
