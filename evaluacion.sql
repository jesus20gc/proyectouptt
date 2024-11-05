-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 09:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evaluacion`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `año_escolar` int(11) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `nombre`, `apellido`, `direccion`, `telefono`, `sexo`, `año_escolar`, `fecha_nacimiento`) VALUES
(12047267, 'lorena', 'contreras', 'calle miranda', '03138232313', 'Femenino', 1, '2023-11-27'),
(22594522, 'luis jose', 'montilla contreras', 'calle miranda', '03138232313', 'Masculino', 1, '2023-11-28'),
(31368896, 'angel daniel', 'mascagnini', 'calle miranda', '03138232313', 'Masculino', 1, '2023-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `año`
--

CREATE TABLE `año` (
  `id_año` int(11) NOT NULL,
  `nombre_año` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `año`
--

INSERT INTO `año` (`id_año`, `nombre_año`) VALUES
(1, 'primer año'),
(2, 'segundo año'),
(3, 'tercer año'),
(4, 'cuarto año'),
(5, 'quinto año');

-- --------------------------------------------------------

--
-- Table structure for table `materias`
--

CREATE TABLE `materias` (
  `id_materia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materias`
--

INSERT INTO `materias` (`id_materia`) VALUES
('biologia'),
('castellano'),
('educacion fisica'),
('GHC'),
('Matematica');

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

CREATE TABLE `notas` (
  `id_alumno` int(11) NOT NULL,
  `id_materia` varchar(100) NOT NULL,
  `lapso` int(11) NOT NULL,
  `periodo_escolar` varchar(100) NOT NULL,
  `año_escolar` int(11) NOT NULL,
  `nota` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notas`
--

INSERT INTO `notas` (`id_alumno`, `id_materia`, `lapso`, `periodo_escolar`, `año_escolar`, `nota`) VALUES
(12047267, 'castellano', 1, '2022-2023', 1, 18.00),
(22594522, 'matematica', 1, '2022-2023', 1, 18.00),
(31368896, 'matematica', 1, '2022-2023', 1, 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `tipo_usuario` enum('administrador','usuario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `contraseña`, `tipo_usuario`) VALUES
(5500243, 'luci', '1234', 'administrador'),
(12345678, 'loren', '123', 'usuario'),
(13404506, 'angel', '123', 'usuario'),
(31368896, 'angel daniel', '1234', 'administrador'),
(2147483647, 'jesus', '1234', 'usuario');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `año_escolar` (`año_escolar`);

--
-- Indexes for table `año`
--
ALTER TABLE `año`
  ADD PRIMARY KEY (`id_año`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_alumno`,`id_materia`,`lapso`,`periodo_escolar`,`año_escolar`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `año_escolar` (`año_escolar`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`año_escolar`) REFERENCES `año` (`id_año`);

--
-- Constraints for table `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `notas_ibfk_3` FOREIGN KEY (`año_escolar`) REFERENCES `año` (`id_año`),
  ADD CONSTRAINT `notas_ibfk_4` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
