-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2024 a las 06:36:38
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `ID_Doctor` int(11) NOT NULL,
  `ID_Usuario` int(11) DEFAULT NULL,
  `Especialidad` varchar(100) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `Cedula_Profesional` varchar(20) DEFAULT NULL,
  `Condicion` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`ID_Doctor`, `ID_Usuario`, `Especialidad`, `RFC`, `Cedula_Profesional`, `Condicion`) VALUES
(1, 2, 'Oftalmología', 'LOAA760101XYZ', '1234567', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exploracion_fisica`
--

CREATE TABLE `exploracion_fisica` (
  `ID_Exploracion` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Vias_Lagrimales` text DEFAULT NULL,
  `Parpados` text DEFAULT NULL,
  `Globo_Ocular` text DEFAULT NULL,
  `Conjuntivas` text DEFAULT NULL,
  `Corneas` text DEFAULT NULL,
  `Iris_Porcion_Ciliar` text DEFAULT NULL,
  `Cristalinos` text DEFAULT NULL,
  `Vitreo` text DEFAULT NULL,
  `Fondo_Ojo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `exploracion_fisica`
--

INSERT INTO `exploracion_fisica` (`ID_Exploracion`, `ID_Paciente`, `Vias_Lagrimales`, `Parpados`, `Globo_Ocular`, `Conjuntivas`, `Corneas`, `Iris_Porcion_Ciliar`, `Cristalinos`, `Vitreo`, `Fondo_Ojo`) VALUES
(2, 1, 'funcionales', 'bien', 'sano', 'si', 'bien', 'mal estado', 'si', 'no', 'impecable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exploracion_funcional`
--

CREATE TABLE `exploracion_funcional` (
  `ID_Exploracion_Funcional` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Pupilas_PP` text DEFAULT NULL,
  `Pupilas_C_Rup` text DEFAULT NULL,
  `Pupilas_Rec` text DEFAULT NULL,
  `Queratometria_OD` varchar(50) DEFAULT NULL,
  `Queratometria_OI` varchar(50) DEFAULT NULL,
  `Retinoscopia_OD` varchar(50) DEFAULT NULL,
  `Retinoscopia_OI` varchar(50) DEFAULT NULL,
  `Subjetivo_OD` varchar(50) DEFAULT NULL,
  `Subjetivo_OI` varchar(50) DEFAULT NULL,
  `Add_OD_AV` varchar(50) DEFAULT NULL,
  `Add_OI_AV` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `exploracion_funcional`
--

INSERT INTO `exploracion_funcional` (`ID_Exploracion_Funcional`, `ID_Paciente`, `Pupilas_PP`, `Pupilas_C_Rup`, `Pupilas_Rec`, `Queratometria_OD`, `Queratometria_OI`, `Retinoscopia_OD`, `Retinoscopia_OI`, `Subjetivo_OD`, `Subjetivo_OI`, `Add_OD_AV`, `Add_OI_AV`) VALUES
(1, 1, '2', '2', '2', '3', '3', '4', '4', '5', '5', '6', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID_Factura` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `Monto` decimal(10,2) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Condicion` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`ID_Factura`, `ID_Paciente`, `Fecha`, `Monto`, `Descripcion`, `Condicion`) VALUES
(1, 1, '2024-12-02', 5001.00, 'lentes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_ocular`
--

CREATE TABLE `historia_ocular` (
  `ID_Historia_Ocular` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Interrogatorio` text DEFAULT NULL,
  `Historia_General` text DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Sexo` enum('Masculino','Femenino') DEFAULT NULL,
  `Ocupacion` varchar(100) DEFAULT NULL,
  `Graduacion_Usa` tinyint(1) DEFAULT NULL,
  `Fecha_Graduacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historia_ocular`
--

INSERT INTO `historia_ocular` (`ID_Historia_Ocular`, `ID_Paciente`, `Interrogatorio`, `Historia_General`, `Edad`, `Sexo`, `Ocupacion`, `Graduacion_Usa`, `Fecha_Graduacion`) VALUES
(3, 1, 'No presenta sintomas', 'miopia y astimagtismo', 25, 'Masculino', 'Maestro', 0, '2022-10-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lente_contacto`
--

CREATE TABLE `lente_contacto` (
  `ID_Lente` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Radio` varchar(50) DEFAULT NULL,
  `Diam` varchar(50) DEFAULT NULL,
  `CP` varchar(50) DEFAULT NULL,
  `RX` varchar(50) DEFAULT NULL,
  `Grueso` varchar(50) DEFAULT NULL,
  `ZO` varchar(50) DEFAULT NULL,
  `PL` varchar(50) DEFAULT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `AV` varchar(50) DEFAULT NULL,
  `Observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lente_contacto`
--

INSERT INTO `lente_contacto` (`ID_Lente`, `ID_Paciente`, `Radio`, `Diam`, `CP`, `RX`, `Grueso`, `ZO`, `PL`, `Color`, `AV`, `Observaciones`) VALUES
(2, 1, '2', '2', '2', '2', '2', '2', '2', 'verde', '2', 'No hay Observaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ojo`
--

CREATE TABLE `ojo` (
  `ID_Ojo` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Tipo` enum('OD','OI') NOT NULL,
  `Esferico` decimal(5,2) DEFAULT NULL,
  `Cilindrico` decimal(5,2) DEFAULT NULL,
  `Eje` decimal(5,2) DEFAULT NULL,
  `Prisma` decimal(5,2) DEFAULT NULL,
  `Altura` decimal(5,2) DEFAULT NULL,
  `Oblea` decimal(5,2) DEFAULT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `AV` varchar(50) DEFAULT NULL,
  `PIO` varchar(50) DEFAULT NULL,
  `Estereopsis` varchar(50) DEFAULT NULL,
  `Agudeza_Visual_S_L` varchar(50) DEFAULT NULL,
  `Agudeza_Visual_C` varchar(50) DEFAULT NULL,
  `Agudeza_Visual_L` varchar(50) DEFAULT NULL,
  `Agudeza_Visual_C_C` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ojo`
--

INSERT INTO `ojo` (`ID_Ojo`, `ID_Paciente`, `Tipo`, `Esferico`, `Cilindrico`, `Eje`, `Prisma`, `Altura`, `Oblea`, `Color`, `AV`, `PIO`, `Estereopsis`, `Agudeza_Visual_S_L`, `Agudeza_Visual_C`, `Agudeza_Visual_L`, `Agudeza_Visual_C_C`) VALUES
(1, 1, 'OD', 2.30, 2.00, 2.00, 2.00, 2.50, 2.00, 'azul', '2', '2', '4', '2', '2', '2', '2'),
(2, 1, 'OI', 1.50, 1.50, 1.50, 1.50, 1.50, 1.50, 'azul', '2.5', '3', '4', '2.5', '2.5', '2.2', '2.5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `ID_Paciente` int(11) NOT NULL,
  `ID_Usuario` int(11) DEFAULT NULL,
  `Colonia` varchar(100) DEFAULT NULL,
  `Ciudad` varchar(100) DEFAULT NULL,
  `CP` varchar(10) DEFAULT NULL,
  `Edo` varchar(100) DEFAULT NULL,
  `Celular` varchar(15) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `FN` date DEFAULT NULL,
  `Condicion` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`ID_Paciente`, `ID_Usuario`, `Colonia`, `Ciudad`, `CP`, `Edo`, `Celular`, `RFC`, `FN`, `Condicion`) VALUES
(1, 1, 'Colonia Centro', 'Ciudad de México', '12345', 'CDMX', '555-5678', 'JUAP880101HDF', '1988-01-01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'datospaciente'),
(2, 'recetas'),
(3, 'acceso'),
(4, 'misdatos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `ID_Receta` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `ID_Doctor` int(11) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `Cristal` tinyint(1) DEFAULT NULL,
  `Plastico` tinyint(1) DEFAULT NULL,
  `Armazon` varchar(100) DEFAULT NULL,
  `Color_Armazon` varchar(50) DEFAULT NULL,
  `Tamaño_y_Pte` varchar(100) DEFAULT NULL,
  `Original` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`ID_Receta`, `ID_Paciente`, `ID_Doctor`, `Fecha`, `Cristal`, `Plastico`, `Armazon`, `Color_Armazon`, `Tamaño_y_Pte`, `Original`) VALUES
(2, 1, 1, '2142-12-04', 1, 0, 'de acero', 'azul', 'grande', 'original');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Tel` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Tipo` enum('Cliente','Doctor','Admin') NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Fecha_Modificacion` date NOT NULL DEFAULT current_timestamp(),
  `ID_Modificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre`, `Direccion`, `Tel`, `Email`, `Tipo`, `Username`, `Password`, `Fecha_Modificacion`, `ID_Modificacion`) VALUES
(1, 'Juan Perez', 'Calle Falsa 123', '555-1234', 'juan.perez@example.com', 'Cliente', 'juanp', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', '2024-06-07', 11),
(2, 'Dr. Ana Lopez', 'Avenida Principal 456', '555-8765', 'ana.lopez@example.com', 'Doctor', 'analopez', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', '2024-06-07', 11),
(11, 'admin', 'admin', 'admin', 'admin', 'Admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '2024-06-06', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
(136, 11, 1),
(137, 11, 2),
(138, 11, 3),
(139, 11, 4),
(140, 1, 2),
(141, 1, 4),
(142, 2, 1),
(143, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`ID_Doctor`),
  ADD UNIQUE KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `exploracion_fisica`
--
ALTER TABLE `exploracion_fisica`
  ADD PRIMARY KEY (`ID_Exploracion`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `exploracion_funcional`
--
ALTER TABLE `exploracion_funcional`
  ADD PRIMARY KEY (`ID_Exploracion_Funcional`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID_Factura`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `historia_ocular`
--
ALTER TABLE `historia_ocular`
  ADD PRIMARY KEY (`ID_Historia_Ocular`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `lente_contacto`
--
ALTER TABLE `lente_contacto`
  ADD PRIMARY KEY (`ID_Lente`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `ojo`
--
ALTER TABLE `ojo`
  ADD PRIMARY KEY (`ID_Ojo`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`ID_Paciente`),
  ADD UNIQUE KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`ID_Receta`),
  ADD KEY `ID_Paciente` (`ID_Paciente`),
  ADD KEY `ID_Doctor` (`ID_Doctor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `usuario_ibfk_1` (`ID_Modificacion`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`),
  ADD KEY `fk_usuario_permiso_permiso_idx` (`idpermiso`),
  ADD KEY `fk_usuario_permiso_usuario_idx` (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `ID_Doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `exploracion_fisica`
--
ALTER TABLE `exploracion_fisica`
  MODIFY `ID_Exploracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exploracion_funcional`
--
ALTER TABLE `exploracion_funcional`
  MODIFY `ID_Exploracion_Funcional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `ID_Factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `historia_ocular`
--
ALTER TABLE `historia_ocular`
  MODIFY `ID_Historia_Ocular` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `lente_contacto`
--
ALTER TABLE `lente_contacto`
  MODIFY `ID_Lente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ojo`
--
ALTER TABLE `ojo`
  MODIFY `ID_Ojo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `ID_Paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `ID_Receta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `exploracion_fisica`
--
ALTER TABLE `exploracion_fisica`
  ADD CONSTRAINT `exploracion_fisica_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `exploracion_funcional`
--
ALTER TABLE `exploracion_funcional`
  ADD CONSTRAINT `exploracion_funcional_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `historia_ocular`
--
ALTER TABLE `historia_ocular`
  ADD CONSTRAINT `historia_ocular_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `lente_contacto`
--
ALTER TABLE `lente_contacto`
  ADD CONSTRAINT `lente_contacto_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `ojo`
--
ALTER TABLE `ojo`
  ADD CONSTRAINT `ojo_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `receta_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`),
  ADD CONSTRAINT `receta_ibfk_2` FOREIGN KEY (`ID_Doctor`) REFERENCES `doctor` (`ID_Doctor`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_Modificacion`) REFERENCES `usuario` (`ID_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
