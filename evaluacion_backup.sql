

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `año_escolar` int(11) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  PRIMARY KEY (`id_alumno`),
  KEY `año_escolar` (`año_escolar`),
  CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`año_escolar`) REFERENCES `año` (`id_año`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO alumnos VALUES("12047267","lorena","contreras","calle miranda","03138232313","Femenino","1","2023-11-27");
INSERT INTO alumnos VALUES("12345678","samuel andres","arandia","alto de escuque","51097897","Masculino","1","2023-11-16");
INSERT INTO alumnos VALUES("22594522","luis jose","montilla contreras","calle miranda","03138232313","Masculino","1","2023-11-28");
INSERT INTO alumnos VALUES("31368896","angel daniel","mascagnini","calle miranda","03138232313","Masculino","1","2023-11-15");



CREATE TABLE `año` (
  `id_año` int(11) NOT NULL,
  `nombre_año` varchar(100) NOT NULL,
  PRIMARY KEY (`id_año`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO año VALUES("1","primer año");
INSERT INTO año VALUES("2","segundo año");
INSERT INTO año VALUES("3","tercer año");
INSERT INTO año VALUES("4","cuarto año");
INSERT INTO año VALUES("5","quinto año");



CREATE TABLE `materias` (
  `id_materia` varchar(100) NOT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO materias VALUES("biologia");
INSERT INTO materias VALUES("castellano");
INSERT INTO materias VALUES("educacion fisica");
INSERT INTO materias VALUES("GHC");
INSERT INTO materias VALUES("Matematica");



CREATE TABLE `notas` (
  `id_alumno` int(11) NOT NULL,
  `id_materia` varchar(100) NOT NULL,
  `lapso` int(11) NOT NULL,
  `periodo_escolar` varchar(100) NOT NULL,
  `año_escolar` int(11) NOT NULL,
  `nota` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`id_alumno`,`id_materia`,`lapso`,`periodo_escolar`,`año_escolar`),
  KEY `id_materia` (`id_materia`),
  KEY `año_escolar` (`año_escolar`),
  CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE,
  CONSTRAINT `notas_ibfk_3` FOREIGN KEY (`año_escolar`) REFERENCES `año` (`id_año`),
  CONSTRAINT `notas_ibfk_4` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO notas VALUES("12047267","castellano","1","2022-2023","1","20.00");
INSERT INTO notas VALUES("12047267","matematica","1","2022-2023","1","12.00");
INSERT INTO notas VALUES("22594522","matematica","1","2022-2023","1","18.00");
INSERT INTO notas VALUES("31368896","matematica","1","2022-2023","1","20.00");



CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `tipo_usuario` enum('administrador','usuario') NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2147483648 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO usuarios VALUES("5500243","luci","1234","administrador");
INSERT INTO usuarios VALUES("12345678","loren","123","usuario");
INSERT INTO usuarios VALUES("13404506","angel","123","usuario");
INSERT INTO usuarios VALUES("31368896","angel daniel","1234","administrador");
INSERT INTO usuarios VALUES("2147483647","jesus","1234","usuario");

