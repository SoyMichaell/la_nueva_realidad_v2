-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para la_nueva_realidad_2
CREATE DATABASE IF NOT EXISTS `la_nueva_realidad_2` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `la_nueva_realidad_2`;

-- Volcando estructura para tabla la_nueva_realidad_2.diagnostico_individual
CREATE TABLE IF NOT EXISTS `diagnostico_individual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nit_empresa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_persona` int(11) DEFAULT 0,
  `mision` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `vision` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `objetivo_estrategio` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd1_1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd3` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd4` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd5` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd5_1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd6` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd7` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd8` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd9` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd10` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd11` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd12` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd13` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd14` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd15` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd16` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd17` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntacd17_1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntac1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntac2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntac3` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntac4` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntac4_1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntac5` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntac6` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntac7` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntac8` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntac9` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapi1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapi2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapi3` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapi3_1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapi4` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapi4_1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapi5` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapi6` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapi6_1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapi7` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapi8` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf1_1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf2_1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf3` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf3_1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf4` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf5` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf6` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf7` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf8` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf9` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf9_1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf10` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf10_1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf11` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf12` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf13` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf14` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntapf15` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `modalidad` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla la_nueva_realidad_2.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organizacion` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categoria` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `razon_social` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `identificacion` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nit` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_matricula` date DEFAULT NULL,
  `fecha_renovacion` date DEFAULT NULL,
  `direccion` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `municipio` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `telefono1` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `telefono2` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono3` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `ciiu_1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciiu_2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciiu_3` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciiu_4` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_persona` int(11) DEFAULT NULL,
  `activo_total` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tamano` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `propietario` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `representante` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `autorizacion` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `estado_35` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13816 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla la_nueva_realidad_2.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla la_nueva_realidad_2.matriz_dofa
CREATE TABLE IF NOT EXISTS `matriz_dofa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fortaleza1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `fortaleza2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `fortaleza3` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `fortaleza4` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `fortaleza5` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `debilidad1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `debilidad2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `debilidad3` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `debilidad4` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `amenaza4` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `debilidad5` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `oportunidad1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `oportunidad2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `oportunidad3` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `oportunidad4` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `oportunidad5` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiafo1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiafo2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiafo3` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiafo4` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiafo5` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiado1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiado2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiado3` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiado4` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiado5` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `amenaza1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `amenaza2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `amenaza3` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `amenaza5` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiafa1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiafa2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiafa3` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiafa4` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiafa5` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiada1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiada2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiada3` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiada4` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrategiada5` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `nit` (`nit`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla la_nueva_realidad_2.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla la_nueva_realidad_2.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla la_nueva_realidad_2.permisos
CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla la_nueva_realidad_2.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla la_nueva_realidad_2.respuestas
CREATE TABLE IF NOT EXISTS `respuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nit_empresa` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pre1_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre1_1_pcd` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre2_pcd` varchar(2) COLLATE utf8_unicode_ci DEFAULT '',
  `pre3_1_pcd` int(11) DEFAULT 0,
  `pre3_2_pcd` int(11) DEFAULT 0,
  `pre3_3_pcd` int(11) DEFAULT 0,
  `pre3_4_pcd` int(11) DEFAULT 0,
  `pre3_5_pcd` int(11) DEFAULT 0,
  `pre3_6_pcd` int(11) DEFAULT 0,
  `pre4_1_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre4_2_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre4_3_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre4_4_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre4_5_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre4_6_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre5_pcd` varchar(2) COLLATE utf8_unicode_ci DEFAULT '',
  `pre5_1_pcd` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre6_pcd` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre7_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre8_1_pcd` int(11) DEFAULT 0,
  `pre8_2_pcd` int(11) DEFAULT 0,
  `pre8_3_pcd` int(11) DEFAULT 0,
  `pre8_4_pcd` int(11) DEFAULT 0,
  `pre8_5_pcd` int(11) DEFAULT 0,
  `pre8_6_pcd` int(11) DEFAULT 0,
  `pre8_7_pcd` int(11) DEFAULT 0,
  `pre8_8_pcd` int(11) DEFAULT 0,
  `pre9_1_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre9_2_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre9_3_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre9_4_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `pre10_1_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre10_2_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre10_3_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre10_4_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre10_5_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre10_6_pcd` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre11_1_pcd` int(11) DEFAULT 0,
  `pre11_2_pcd` int(11) DEFAULT 0,
  `pre11_3_pcd` int(11) DEFAULT 0,
  `pre11_4_pcd` int(11) DEFAULT 0,
  `pre12_pcd` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre13_pcd` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre14_pcd` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre15_pcd` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre16_1_pcd` int(11) DEFAULT 0,
  `pre16_2_pcd` int(11) DEFAULT 0,
  `pre16_3_pcd` int(11) DEFAULT 0,
  `pre16_4_pcd` int(11) DEFAULT 0,
  `pre17_1_pcd` varchar(2) COLLATE utf8_unicode_ci DEFAULT '',
  `pre17_2_pcd` varchar(2) COLLATE utf8_unicode_ci DEFAULT '',
  `pre1_pc` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre2_1_pc` int(11) DEFAULT 0,
  `pre2_2_pc` int(11) DEFAULT 0,
  `pre2_3_pc` int(11) DEFAULT 0,
  `pre2_4_pc` int(11) DEFAULT 0,
  `pre2_5_pc` int(11) DEFAULT 0,
  `pre3_pc` varchar(2) COLLATE utf8_unicode_ci DEFAULT '',
  `pre4_1_pc` varchar(2) COLLATE utf8_unicode_ci DEFAULT '',
  `pre4_2_pc` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre5_pc` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre6_pc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre7_1_pc` int(11) DEFAULT 0,
  `pre7_2_pc` int(11) DEFAULT 0,
  `pre7_3_pc` int(11) DEFAULT 0,
  `pre7_4_pc` int(11) DEFAULT 0,
  `pre7_5_pc` int(11) DEFAULT 0,
  `pre7_6_pc` int(11) DEFAULT 0,
  `pre8_pc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre9_pc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre1_pi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre2_pi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre3_1_pi` varchar(2) COLLATE utf8_unicode_ci DEFAULT '',
  `pre3_2_pi` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre4_1_pi` varchar(2) COLLATE utf8_unicode_ci DEFAULT '',
  `pre4_2_pi` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `pre5_1_pi` int(11) DEFAULT 0,
  `pre5_2_pi` int(11) DEFAULT 0,
  `pre5_3_pi` int(11) DEFAULT 0,
  `pre5_4_pi` int(11) DEFAULT 0,
  `pre5_5_pi` int(11) DEFAULT 0,
  `pre5_6_pi` int(11) DEFAULT 0,
  `pre5_7_pi` int(11) DEFAULT 0,
  `pre6_1_pi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre6_2_pi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre7_pi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre8_pi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre1_pf` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre1_1_pf` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre2_pf` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre2_1_pf` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre3_1_pf` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre3_2_pf` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre4_pf` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre5_pf` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre6_pf` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre7_pf` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre8_pf` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre9_1_pf` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre9_2_pf` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre10_1_pf` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre10_2_pf` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre11_pf` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre12_pf` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre13_pf` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre14_pf` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre15_pf` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2142 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla la_nueva_realidad_2.resultados
CREATE TABLE IF NOT EXISTS `resultados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nit_empresa` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `perspectiva_c_d` int(11) NOT NULL,
  `perspectiva_c` int(11) NOT NULL,
  `perspectiva_p_i` int(11) NOT NULL,
  `perspectiva_f` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `ciiu` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_registro_resultado` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=389 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla la_nueva_realidad_2.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla la_nueva_realidad_2.roles_permisos
CREATE TABLE IF NOT EXISTS `roles_permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `permiso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla la_nueva_realidad_2.tabla_control
CREATE TABLE IF NOT EXISTS `tabla_control` (
  `nit` int(11) NOT NULL,
  `perspectiva` text COLLATE utf8_unicode_ci NOT NULL,
  `objetivo` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `indicador` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla la_nueva_realidad_2.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo_institucional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo_personal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel_programa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `programa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_correo_institucional_unique` (`correo_institucional`),
  UNIQUE KEY `users_correo_personal_unique` (`correo_personal`),
  KEY `FK_users_roles` (`rol`),
  CONSTRAINT `FK_users_roles` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
