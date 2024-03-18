-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour challengedbext
CREATE DATABASE IF NOT EXISTS `challengedbext` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `challengedbext`;

-- Listage de la structure de table challengedbext. achete_nows
CREATE TABLE IF NOT EXISTS `achete_nows` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom_prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ou_recherchez_vous` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typelogement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surface-recherch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_piece` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_chambre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surface` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `criter_appart` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filtrag_annonce` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.achete_nows : ~0 rows (environ)

-- Listage de la structure de table challengedbext. achete_now_etat_achat
CREATE TABLE IF NOT EXISTS `achete_now_etat_achat` (
  `etat_achat_id` bigint unsigned NOT NULL,
  `achete_now_id` bigint unsigned NOT NULL,
  KEY `achete_now_etat_achat_etat_achat_id_foreign` (`etat_achat_id`),
  KEY `achete_now_etat_achat_achete_now_id_foreign` (`achete_now_id`),
  CONSTRAINT `achete_now_etat_achat_achete_now_id_foreign` FOREIGN KEY (`achete_now_id`) REFERENCES `achete_nows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `achete_now_etat_achat_etat_achat_id_foreign` FOREIGN KEY (`etat_achat_id`) REFERENCES `etat_achats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.achete_now_etat_achat : ~0 rows (environ)

-- Listage de la structure de table challengedbext. achete_now_exigence_particuliere
CREATE TABLE IF NOT EXISTS `achete_now_exigence_particuliere` (
  `exigence_particuliere_id` bigint unsigned NOT NULL,
  `achete_now_id` bigint unsigned NOT NULL,
  KEY `foreign_alias_0000001` (`exigence_particuliere_id`),
  KEY `achete_now_exigence_particuliere_achete_now_id_foreign` (`achete_now_id`),
  CONSTRAINT `achete_now_exigence_particuliere_achete_now_id_foreign` FOREIGN KEY (`achete_now_id`) REFERENCES `achete_nows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `foreign_alias_0000001` FOREIGN KEY (`exigence_particuliere_id`) REFERENCES `exigence_particulieres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.achete_now_exigence_particuliere : ~0 rows (environ)

-- Listage de la structure de table challengedbext. achete_now_surface_annexe
CREATE TABLE IF NOT EXISTS `achete_now_surface_annexe` (
  `surface_annexe_id` bigint unsigned NOT NULL,
  `achete_now_id` bigint unsigned NOT NULL,
  KEY `achete_now_surface_annexe_surface_annexe_id_foreign` (`surface_annexe_id`),
  KEY `achete_now_surface_annexe_achete_now_id_foreign` (`achete_now_id`),
  CONSTRAINT `achete_now_surface_annexe_achete_now_id_foreign` FOREIGN KEY (`achete_now_id`) REFERENCES `achete_nows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `achete_now_surface_annexe_surface_annexe_id_foreign` FOREIGN KEY (`surface_annexe_id`) REFERENCES `surface_annexes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.achete_now_surface_annexe : ~0 rows (environ)

-- Listage de la structure de table challengedbext. certifications
CREATE TABLE IF NOT EXISTS `certifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom_prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typebien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.certifications : ~0 rows (environ)

-- Listage de la structure de table challengedbext. certification_type_certification
CREATE TABLE IF NOT EXISTS `certification_type_certification` (
  `type_certification_id` bigint unsigned NOT NULL,
  `certification_id` bigint unsigned NOT NULL,
  KEY `certification_type_certification_type_certification_id_foreign` (`type_certification_id`),
  KEY `certification_type_certification_certification_id_foreign` (`certification_id`),
  CONSTRAINT `certification_type_certification_certification_id_foreign` FOREIGN KEY (`certification_id`) REFERENCES `certifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `certification_type_certification_type_certification_id_foreign` FOREIGN KEY (`type_certification_id`) REFERENCES `type_certifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.certification_type_certification : ~0 rows (environ)

-- Listage de la structure de table challengedbext. contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom_prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `your-consent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.contacts : ~0 rows (environ)

-- Listage de la structure de table challengedbext. critere_immeubles
CREATE TABLE IF NOT EXISTS `critere_immeubles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.critere_immeubles : ~2 rows (environ)
INSERT INTO `critere_immeubles` (`id`, `libel`, `created_at`, `updated_at`) VALUES
	(6, 'Dernier etage', '2024-03-18 08:41:53', '2024-03-18 08:41:53'),
	(7, 'Rez-de-chaussee', '2024-03-18 08:42:27', '2024-03-18 08:42:27'),
	(8, 'Eviter le rez-de-chaussee', '2024-03-18 08:42:42', '2024-03-18 08:42:42');

-- Listage de la structure de table challengedbext. critere_immeuble_maison_certif
CREATE TABLE IF NOT EXISTS `critere_immeuble_maison_certif` (
  `critere_immeuble_id` bigint unsigned NOT NULL,
  `maison_certif_id` bigint unsigned NOT NULL,
  KEY `critere_immeuble_maison_certif_critere_immeuble_id_foreign` (`critere_immeuble_id`),
  KEY `critere_immeuble_maison_certif_maison_certif_id_foreign` (`maison_certif_id`),
  CONSTRAINT `critere_immeuble_maison_certif_critere_immeuble_id_foreign` FOREIGN KEY (`critere_immeuble_id`) REFERENCES `critere_immeubles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `critere_immeuble_maison_certif_maison_certif_id_foreign` FOREIGN KEY (`maison_certif_id`) REFERENCES `maison_certifs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.critere_immeuble_maison_certif : ~0 rows (environ)

-- Listage de la structure de table challengedbext. etat_achats
CREATE TABLE IF NOT EXISTS `etat_achats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.etat_achats : ~2 rows (environ)
INSERT INTO `etat_achats` (`id`, `libel`, `created_at`, `updated_at`) VALUES
	(6, 'Dans le neuf', '2024-03-18 14:20:45', '2024-03-18 14:20:45'),
	(7, 'Dans l’ancien', '2024-03-18 14:21:20', '2024-03-18 14:21:20');

-- Listage de la structure de table challengedbext. exigence_immeubles
CREATE TABLE IF NOT EXISTS `exigence_immeubles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.exigence_immeubles : ~5 rows (environ)
INSERT INTO `exigence_immeubles` (`id`, `libel`, `created_at`, `updated_at`) VALUES
	(6, 'Interphone', '2024-03-18 15:09:34', '2024-03-18 15:09:34'),
	(7, 'Gardien', '2024-03-18 15:09:43', '2024-03-18 15:09:43'),
	(8, 'Ascenseur', '2024-03-18 15:09:51', '2024-03-18 15:09:51'),
	(9, 'Piscine', '2024-03-18 15:10:00', '2024-03-18 15:10:00'),
	(10, 'Fibre deployee', '2024-03-18 15:10:11', '2024-03-18 15:10:11');

-- Listage de la structure de table challengedbext. exigence_immeuble_maison_certif
CREATE TABLE IF NOT EXISTS `exigence_immeuble_maison_certif` (
  `exigence_immeuble_id` bigint unsigned NOT NULL,
  `maison_certif_id` bigint unsigned NOT NULL,
  KEY `exigence_immeuble_maison_certif_exigence_immeuble_id_foreign` (`exigence_immeuble_id`),
  KEY `exigence_immeuble_maison_certif_maison_certif_id_foreign` (`maison_certif_id`),
  CONSTRAINT `exigence_immeuble_maison_certif_exigence_immeuble_id_foreign` FOREIGN KEY (`exigence_immeuble_id`) REFERENCES `exigence_immeubles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `exigence_immeuble_maison_certif_maison_certif_id_foreign` FOREIGN KEY (`maison_certif_id`) REFERENCES `maison_certifs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.exigence_immeuble_maison_certif : ~0 rows (environ)

-- Listage de la structure de table challengedbext. exigence_particulieres
CREATE TABLE IF NOT EXISTS `exigence_particulieres` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.exigence_particulieres : ~4 rows (environ)
INSERT INTO `exigence_particulieres` (`id`, `libel`, `created_at`, `updated_at`) VALUES
	(6, 'Interphone', '2024-03-18 15:14:39', '2024-03-18 15:14:39'),
	(7, 'Gardien', '2024-03-18 15:14:49', '2024-03-18 15:14:49'),
	(8, 'Ascenseur', '2024-03-18 15:18:29', '2024-03-18 15:18:29'),
	(9, 'Piscine', '2024-03-18 15:18:35', '2024-03-18 15:18:35');

-- Listage de la structure de table challengedbext. failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.failed_jobs : ~0 rows (environ)

-- Listage de la structure de table challengedbext. maison_certifs
CREATE TABLE IF NOT EXISTS `maison_certifs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom_prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typelogement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_chambre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_salle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moment_acquis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ma_preference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surface_habitable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_construction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autre_budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_emploi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proprietaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.maison_certifs : ~0 rows (environ)

-- Listage de la structure de table challengedbext. maison_certif_type_de_surface
CREATE TABLE IF NOT EXISTS `maison_certif_type_de_surface` (
  `type_de_surface_id` bigint unsigned NOT NULL,
  `maison_certif_id` bigint unsigned NOT NULL,
  KEY `maison_certif_type_de_surface_type_de_surface_id_foreign` (`type_de_surface_id`),
  KEY `maison_certif_type_de_surface_maison_certif_id_foreign` (`maison_certif_id`),
  CONSTRAINT `maison_certif_type_de_surface_maison_certif_id_foreign` FOREIGN KEY (`maison_certif_id`) REFERENCES `maison_certifs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `maison_certif_type_de_surface_type_de_surface_id_foreign` FOREIGN KEY (`type_de_surface_id`) REFERENCES `type_de_surfaces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.maison_certif_type_de_surface : ~0 rows (environ)

-- Listage de la structure de table challengedbext. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.migrations : ~0 rows (environ)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_03_16_000001_create_achete_nows_table', 1),
	(6, '2024_03_16_000002_create_achete_now_etat_achat_table', 1),
	(7, '2024_03_16_000003_create_achete_now_exigence_particuliere_table', 1),
	(8, '2024_03_16_000004_create_achete_now_surface_annexe_table', 1),
	(9, '2024_03_16_000005_create_certifications_table', 1),
	(10, '2024_03_16_000006_create_certification_type_certification_table', 1),
	(11, '2024_03_16_000007_create_contacts_table', 1),
	(12, '2024_03_16_000008_create_critere_immeubles_table', 1),
	(13, '2024_03_16_000009_create_critere_immeuble_maison_certif_table', 1),
	(14, '2024_03_16_000010_create_etat_achats_table', 1),
	(15, '2024_03_16_000011_create_exigence_immeubles_table', 1),
	(16, '2024_03_16_000012_create_exigence_particulieres_table', 1),
	(17, '2024_03_16_000013_create_exigence_immeuble_maison_certif_table', 1),
	(18, '2024_03_16_000014_create_maison_certifs_table', 1),
	(19, '2024_03_16_000015_create_maison_certif_type_de_surface_table', 1),
	(20, '2024_03_16_000016_create_rendez_vous_table', 1),
	(21, '2024_03_16_000017_create_surface_annexes_table', 1),
	(22, '2024_03_16_000018_create_terrain_certifs_table', 1),
	(23, '2024_03_16_000019_create_type_certifications_table', 1),
	(24, '2024_03_16_000020_create_type_de_surfaces_table', 1),
	(25, '2024_03_16_009001_add_foreigns_to_achete_now_etat_achat_table', 1),
	(26, '2024_03_16_009002_add_foreigns_to_achete_now_exigence_particuliere_table', 1),
	(27, '2024_03_16_009003_add_foreigns_to_achete_now_surface_annexe_table', 1),
	(28, '2024_03_16_009004_add_foreigns_to_certification_type_certification_table', 1),
	(29, '2024_03_16_009005_add_foreigns_to_critere_immeuble_maison_certif_table', 1),
	(30, '2024_03_16_009006_add_foreigns_to_exigence_immeuble_maison_certif_table', 1),
	(31, '2024_03_16_009007_add_foreigns_to_maison_certif_type_de_surface_table', 1),
	(32, '2024_03_17_021138_create_permission_tables', 1);

-- Listage de la structure de table challengedbext. model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.model_has_permissions : ~0 rows (environ)

-- Listage de la structure de table challengedbext. model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.model_has_roles : ~0 rows (environ)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(2, 'App\\Models\\User', 1);

-- Listage de la structure de table challengedbext. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.password_resets : ~0 rows (environ)

-- Listage de la structure de table challengedbext. permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.permissions : ~80 rows (environ)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'list achetenows', 'web', '2024-03-17 02:25:50', '2024-03-17 02:25:50'),
	(2, 'view achetenows', 'web', '2024-03-17 02:25:50', '2024-03-17 02:25:50'),
	(3, 'create achetenows', 'web', '2024-03-17 02:25:50', '2024-03-17 02:25:50'),
	(4, 'update achetenows', 'web', '2024-03-17 02:25:50', '2024-03-17 02:25:50'),
	(5, 'delete achetenows', 'web', '2024-03-17 02:25:50', '2024-03-17 02:25:50'),
	(6, 'list certifications', 'web', '2024-03-17 02:25:50', '2024-03-17 02:25:50'),
	(7, 'view certifications', 'web', '2024-03-17 02:25:50', '2024-03-17 02:25:50'),
	(8, 'create certifications', 'web', '2024-03-17 02:25:50', '2024-03-17 02:25:50'),
	(9, 'update certifications', 'web', '2024-03-17 02:25:50', '2024-03-17 02:25:50'),
	(10, 'delete certifications', 'web', '2024-03-17 02:25:50', '2024-03-17 02:25:50'),
	(11, 'list contacts', 'web', '2024-03-17 02:25:50', '2024-03-17 02:25:50'),
	(12, 'view contacts', 'web', '2024-03-17 02:25:50', '2024-03-17 02:25:50'),
	(13, 'create contacts', 'web', '2024-03-17 02:25:50', '2024-03-17 02:25:50'),
	(14, 'update contacts', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(15, 'delete contacts', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(16, 'list critereimmeubles', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(17, 'view critereimmeubles', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(18, 'create critereimmeubles', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(19, 'update critereimmeubles', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(20, 'delete critereimmeubles', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(21, 'list etatachats', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(22, 'view etatachats', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(23, 'create etatachats', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(24, 'update etatachats', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(25, 'delete etatachats', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(26, 'list exigenceimmeubles', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(27, 'view exigenceimmeubles', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(28, 'create exigenceimmeubles', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(29, 'update exigenceimmeubles', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(30, 'delete exigenceimmeubles', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(31, 'list exigenceparticulieres', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(32, 'view exigenceparticulieres', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(33, 'create exigenceparticulieres', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(34, 'update exigenceparticulieres', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(35, 'delete exigenceparticulieres', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(36, 'list maisoncertifs', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(37, 'view maisoncertifs', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(38, 'create maisoncertifs', 'web', '2024-03-17 02:25:51', '2024-03-17 02:25:51'),
	(39, 'update maisoncertifs', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(40, 'delete maisoncertifs', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(41, 'list allrendezvous', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(42, 'view allrendezvous', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(43, 'create allrendezvous', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(44, 'update allrendezvous', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(45, 'delete allrendezvous', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(46, 'list surfaceannexes', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(47, 'view surfaceannexes', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(48, 'create surfaceannexes', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(49, 'update surfaceannexes', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(50, 'delete surfaceannexes', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(51, 'list terraincertifs', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(52, 'view terraincertifs', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(53, 'create terraincertifs', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(54, 'update terraincertifs', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(55, 'delete terraincertifs', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(56, 'list typecertifications', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(57, 'view typecertifications', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(58, 'create typecertifications', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(59, 'update typecertifications', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(60, 'delete typecertifications', 'web', '2024-03-17 02:25:52', '2024-03-17 02:25:52'),
	(61, 'list typedesurfaces', 'web', '2024-03-17 02:25:53', '2024-03-17 02:25:53'),
	(62, 'view typedesurfaces', 'web', '2024-03-17 02:25:53', '2024-03-17 02:25:53'),
	(63, 'create typedesurfaces', 'web', '2024-03-17 02:25:53', '2024-03-17 02:25:53'),
	(64, 'update typedesurfaces', 'web', '2024-03-17 02:25:53', '2024-03-17 02:25:53'),
	(65, 'delete typedesurfaces', 'web', '2024-03-17 02:25:53', '2024-03-17 02:25:53'),
	(66, 'list roles', 'web', '2024-03-17 02:25:53', '2024-03-17 02:25:53'),
	(67, 'view roles', 'web', '2024-03-17 02:25:53', '2024-03-17 02:25:53'),
	(68, 'create roles', 'web', '2024-03-17 02:25:53', '2024-03-17 02:25:53'),
	(69, 'update roles', 'web', '2024-03-17 02:25:53', '2024-03-17 02:25:53'),
	(70, 'delete roles', 'web', '2024-03-17 02:25:53', '2024-03-17 02:25:53'),
	(71, 'list permissions', 'web', '2024-03-17 02:25:53', '2024-03-17 02:25:53'),
	(72, 'view permissions', 'web', '2024-03-17 02:25:53', '2024-03-17 02:25:53'),
	(73, 'create permissions', 'web', '2024-03-17 02:25:53', '2024-03-17 02:25:53'),
	(74, 'update permissions', 'web', '2024-03-17 02:25:53', '2024-03-17 02:25:53'),
	(75, 'delete permissions', 'web', '2024-03-17 02:25:54', '2024-03-17 02:25:54'),
	(76, 'list users', 'web', '2024-03-17 02:25:54', '2024-03-17 02:25:54'),
	(77, 'view users', 'web', '2024-03-17 02:25:54', '2024-03-17 02:25:54'),
	(78, 'create users', 'web', '2024-03-17 02:25:54', '2024-03-17 02:25:54'),
	(79, 'update users', 'web', '2024-03-17 02:25:54', '2024-03-17 02:25:54'),
	(80, 'delete users', 'web', '2024-03-17 02:25:54', '2024-03-17 02:25:54');

-- Listage de la structure de table challengedbext. personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.personal_access_tokens : ~0 rows (environ)

-- Listage de la structure de table challengedbext. rendez_vous
CREATE TABLE IF NOT EXISTS `rendez_vous` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nompre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `votr_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rdv-date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rdv-hour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.rendez_vous : ~0 rows (environ)
INSERT INTO `rendez_vous` (`id`, `nompre`, `telephone`, `votr_email`, `rdv-date`, `rdv-hour`, `created_at`, `updated_at`) VALUES
	(1, 'Ut id quis ut sit. Explicabo iure reprehenderit ex quia modi. Quos sit alias id amet qui quae laudantium. Adipisci voluptas omnis modi quas enim.', 'Sed et suscipit nisi voluptate. Vero qui sed dicta ex ut aspernatur natus. Harum in adipisci in dolores quia. Molestiae deleniti distinctio cum iste tenetur. Tempore harum accusamus et rerum deleniti. Et at repellat provident esse.', 'Nulla tenetur est illo omnis. Aperiam eaque labore dicta mollitia in. Eos quis similique occaecati. Aut ut ex suscipit similique natus. Quo repudiandae totam odio dolor reiciendis. Vel neque quod amet nesciunt vero excepturi est iusto.', 'Alias soluta non voluptatem. Sed molestiae ullam consequatur ut quia. Veniam beatae beatae alias deserunt inventore necessitatibus aut officia. Eos quis voluptatem quisquam explicabo quia.', 'Quidem neque quaerat natus et alias et temporibus. Saepe nihil omnis molestiae consequatur eveniet. Exercitationem sit ratione laborum autem ut dignissimos. Et ea deleniti magnam. Quas natus accusamus unde in odit.', '2024-03-17 02:25:55', '2024-03-17 02:25:55'),
	(2, 'Esse dicta et repellendus repellat magni. Iste optio eveniet laborum assumenda neque quae eius qui.', 'Numquam nihil ut dolorem qui. Delectus sit eveniet sunt praesentium qui. Et sit recusandae aliquid recusandae animi sunt optio laboriosam.', 'Illum ducimus vel doloribus voluptatem ex voluptatem impedit. Quibusdam harum corrupti qui aut aliquid. Quibusdam in quod culpa beatae. Autem dolorem architecto optio incidunt sed quia vel.', 'Corporis dolorem nesciunt praesentium consequatur ex et. Ut esse sit eum quisquam in. Deleniti ut est sed aliquam aut recusandae.', 'Commodi quia qui esse explicabo iusto. Beatae qui laudantium et eaque nemo quaerat. Inventore porro incidunt aut optio.', '2024-03-17 02:25:55', '2024-03-17 02:25:55'),
	(3, 'Magnam laborum ea beatae culpa odio quidem consequatur qui. Ipsa est omnis labore enim omnis quidem earum sunt. Minus animi soluta est laboriosam consequatur eum odit.', 'Rerum ea fugiat fuga autem. Rem quasi vel impedit numquam omnis. Eveniet molestias rerum beatae ut. Impedit modi dolorem voluptas quod omnis rerum repellendus repudiandae.', 'Eius quis suscipit est explicabo in facere qui excepturi. Et sit saepe sed dolorem. Earum voluptatem eaque unde qui vitae occaecati quas quo.', 'Magnam optio fugiat eius consequatur. Magnam eos iusto vero reiciendis facere itaque. Aut facere provident ratione eum consequatur optio. Ut nobis exercitationem quam eveniet ut veniam sed. Rerum rerum a harum alias a.', 'In facere est deleniti ex. Modi nesciunt voluptatem numquam consectetur adipisci rerum. Natus quia delectus consectetur odio iure. Optio quia possimus facere quia beatae quos.', '2024-03-17 02:25:55', '2024-03-17 02:25:55'),
	(4, 'Nemo quae dolorem aspernatur et unde consectetur provident. Et delectus accusamus quis soluta fugiat. Voluptatum corporis nostrum et consequatur laborum. Iure et exercitationem at ut nostrum rem.', 'Deserunt porro debitis illum sit velit. Sunt facilis ad cum non. Optio magni earum error neque animi. Sint quo cum nihil dicta corporis.', 'Facere molestias nemo ut at alias aspernatur. Tempore rerum eum nostrum minus cupiditate et rerum adipisci. Et corrupti voluptatibus cum delectus dolor excepturi neque. Molestiae eum qui est provident maiores voluptas alias qui.', 'Eum reiciendis quas deleniti assumenda suscipit. Itaque aliquid modi et rerum deserunt sed laudantium. Iure eveniet impedit est accusantium debitis velit earum ipsa.', 'Quae non reprehenderit adipisci doloribus. Minima quos corrupti asperiores aliquam repudiandae saepe. Officiis ut minus dolorum quasi porro. Nam aut rerum saepe qui enim ad in.', '2024-03-17 02:25:55', '2024-03-17 02:25:55'),
	(5, 'Illum earum aut eligendi. Ipsam soluta aut esse nobis et sit laboriosam. Omnis et sint beatae veritatis. Cupiditate accusamus hic consequatur laudantium corrupti eum soluta. Harum eum eos delectus architecto. Blanditiis eaque ea iusto.', 'Ea et quasi et illum. Asperiores nisi sed est amet cupiditate ut. Incidunt quo qui illum quidem illum.', 'Necessitatibus est ipsa autem vero deserunt nesciunt suscipit. Excepturi dicta expedita harum et consequatur velit modi. Et quia quis et rerum deserunt.', 'Qui et iure eligendi. Saepe et est atque facere autem perferendis. Nesciunt totam voluptatem harum omnis. Aut dolorem animi dolorem autem. Cum est illum aut autem eum qui.', 'Molestiae dolorem sed sunt praesentium vel vero accusamus incidunt. Rerum totam sed culpa tempore soluta dolor. Rerum expedita et laborum nihil aspernatur eaque. Unde nobis nihil facilis optio accusantium ipsum aliquid.', '2024-03-17 02:25:55', '2024-03-17 02:25:55');

-- Listage de la structure de table challengedbext. roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.roles : ~2 rows (environ)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'user', 'web', '2024-03-17 02:25:53', '2024-03-17 02:25:53'),
	(2, 'super-admin', 'web', '2024-03-17 02:25:54', '2024-03-17 02:25:54');

-- Listage de la structure de table challengedbext. role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.role_has_permissions : ~65 rows (environ)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(27, 1),
	(28, 1),
	(29, 1),
	(30, 1),
	(31, 1),
	(32, 1),
	(33, 1),
	(34, 1),
	(35, 1),
	(36, 1),
	(37, 1),
	(38, 1),
	(39, 1),
	(40, 1),
	(41, 1),
	(42, 1),
	(43, 1),
	(44, 1),
	(45, 1),
	(46, 1),
	(47, 1),
	(48, 1),
	(49, 1),
	(50, 1),
	(51, 1),
	(52, 1),
	(53, 1),
	(54, 1),
	(55, 1),
	(56, 1),
	(57, 1),
	(58, 1),
	(59, 1),
	(60, 1),
	(61, 1),
	(62, 1),
	(63, 1),
	(64, 1),
	(65, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2),
	(5, 2),
	(6, 2),
	(7, 2),
	(8, 2),
	(9, 2),
	(10, 2),
	(11, 2),
	(12, 2),
	(13, 2),
	(14, 2),
	(15, 2),
	(16, 2),
	(17, 2),
	(18, 2),
	(19, 2),
	(20, 2),
	(21, 2),
	(22, 2),
	(23, 2),
	(24, 2),
	(25, 2),
	(26, 2),
	(27, 2),
	(28, 2),
	(29, 2),
	(30, 2),
	(31, 2),
	(32, 2),
	(33, 2),
	(34, 2),
	(35, 2),
	(36, 2),
	(37, 2),
	(38, 2),
	(39, 2),
	(40, 2),
	(41, 2),
	(42, 2),
	(43, 2),
	(44, 2),
	(45, 2),
	(46, 2),
	(47, 2),
	(48, 2),
	(49, 2),
	(50, 2),
	(51, 2),
	(52, 2),
	(53, 2),
	(54, 2),
	(55, 2),
	(56, 2),
	(57, 2),
	(58, 2),
	(59, 2),
	(60, 2),
	(61, 2),
	(62, 2),
	(63, 2),
	(64, 2),
	(65, 2),
	(66, 2),
	(67, 2),
	(68, 2),
	(69, 2),
	(70, 2),
	(71, 2),
	(72, 2),
	(73, 2),
	(74, 2),
	(75, 2),
	(76, 2),
	(77, 2),
	(78, 2),
	(79, 2),
	(80, 2);

-- Listage de la structure de table challengedbext. surface_annexes
CREATE TABLE IF NOT EXISTS `surface_annexes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.surface_annexes : ~0 rows (environ)

-- Listage de la structure de table challengedbext. terrain_certifs
CREATE TABLE IF NOT EXISTS `terrain_certifs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom_prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partic_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obj_achat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surface` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `config_terrain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prec_config_terrain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `financement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_spplement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `votre_poste` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moment_acquis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.terrain_certifs : ~0 rows (environ)

-- Listage de la structure de table challengedbext. type_certifications
CREATE TABLE IF NOT EXISTS `type_certifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.type_certifications : ~3 rows (environ)
INSERT INTO `type_certifications` (`id`, `libel`, `created_at`, `updated_at`) VALUES
	(6, 'Certification administrative', '2024-03-18 15:24:56', '2024-03-18 15:24:56'),
	(7, 'Certification juridique', '2024-03-18 15:25:10', '2024-03-18 15:25:10'),
	(8, 'Certification technique', '2024-03-18 15:25:28', '2024-03-18 15:25:28');

-- Listage de la structure de table challengedbext. type_de_surfaces
CREATE TABLE IF NOT EXISTS `type_de_surfaces` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.type_de_surfaces : ~3 rows (environ)
INSERT INTO `type_de_surfaces` (`id`, `libel`, `created_at`, `updated_at`) VALUES
	(6, 'Plat', '2024-03-18 15:33:18', '2024-03-18 15:33:18'),
	(7, 'En pente', '2024-03-18 15:33:33', '2024-03-18 15:33:33'),
	(8, 'Autre', '2024-03-18 15:33:39', '2024-03-18 15:33:39');

-- Listage de la structure de table challengedbext. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table challengedbext.users : ~1 rows (environ)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'HEYZ Account', 'admin@admin.com', '2024-03-17 02:25:50', '$2y$10$896NodTfaiJSqnaAU45MD.tcJWQ/1naVMqFIyN0Ke8Wy/eu0Fc7CO', 'kqaWBFvLohKSub3kKsvn53ziru2sIoz6zf2DyKO52J0t4nwLAmWKYjOORY7o', '2024-03-17 02:25:50', '2024-03-18 15:38:37');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
