-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 23. Jan 2013 um 21:00
-- Server Version: 5.5.28
-- PHP-Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `your_weirdbird_database`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wb_articles`
--

CREATE TABLE IF NOT EXISTS `wb_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` int(11) NOT NULL DEFAULT '0',
  `structure_column_mapping_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `teaser` text,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `wb_articles`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wb_files`
--

CREATE TABLE IF NOT EXISTS `wb_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `filename` varchar(256) NOT NULL,
  `type` varchar(16) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `wb_files`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wb_languages`
--

CREATE TABLE IF NOT EXISTS `wb_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `shortform` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `wb_languages`
--

INSERT INTO `wb_languages` (`id`, `name`, `shortform`) VALUES
(1, 'English', 'en'),
(2, 'Deutsch', 'de');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wb_layouts`
--

CREATE TABLE IF NOT EXISTS `wb_layouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `view` varchar(128) NOT NULL,
  `columns` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `wb_layouts`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wb_loadfiles`
--

CREATE TABLE IF NOT EXISTS `wb_loadfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` int(11) NOT NULL,
  `filename` varchar(256) NOT NULL,
  `type` varchar(128) NOT NULL,
  `custom_type` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `wb_loadfiles`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wb_modules`
--

CREATE TABLE IF NOT EXISTS `wb_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `view` varchar(128) NOT NULL,
  `allowarticles` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `wb_modules`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wb_roles`
--

CREATE TABLE IF NOT EXISTS `wb_roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `wb_roles`
--

INSERT INTO `wb_roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Login privileges, granted after account confirmation'),
(2, 'admin', 'Administrative user, has access to everything.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wb_roles_users`
--

CREATE TABLE IF NOT EXISTS `wb_roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wb_structures`
--

CREATE TABLE IF NOT EXISTS `wb_structures` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `active` varchar(5) NOT NULL DEFAULT 'false',
  `position` tinyint(32) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `layout_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `wb_structures`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wb_structure_options`
--

CREATE TABLE IF NOT EXISTS `wb_structure_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `structure_id` int(11) NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  `headline1` varchar(128) DEFAULT NULL,
  `headline2` varchar(256) DEFAULT NULL,
  `headline3` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `wb_structure_options`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wb_structure_column_mappings`
--

CREATE TABLE IF NOT EXISTS `wb_structure_column_mappings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `structure_id` int(11) NOT NULL,
  `column` tinyint(4) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `wb_structure_column_mappings`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wb_system_settings`
--

CREATE TABLE IF NOT EXISTS `wb_system_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fieldname` varchar(128) NOT NULL,
  `content` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `wb_system_settings`
--

INSERT INTO `wb_system_settings` (`id`, `fieldname`, `content`) VALUES
(1, 'contactemail', ''),
(2, 'language_id', '1'),
(3, 'companyname', ''),
(4, 'info', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wb_templates`
--

CREATE TABLE IF NOT EXISTS `wb_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `standardlayout` varchar(128) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `folder` varchar(256) DEFAULT NULL,
  `folder_css` varchar(256) DEFAULT NULL,
  `folder_js` varchar(256) DEFAULT NULL,
  `folder_views` varchar(256) DEFAULT NULL,
  `folder_images` varchar(256) DEFAULT NULL,
  `folder_preview` varchar(128) DEFAULT NULL,
  `previewimage_filename` varchar(128) DEFAULT NULL,
  `previewimage_description` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Daten für Tabelle `wb_templates`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wb_users`
--

CREATE TABLE IF NOT EXISTS `wb_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(127) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` char(128) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wb_user_pending`
--

CREATE TABLE IF NOT EXISTS `wb_user_pending` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL COMMENT 'resetpw or activate',
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `valid_until` varchar(32) NOT NULL,
  `reference` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Daten für Tabelle `wb_user_pending`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wb_user_tokens`
--

CREATE TABLE IF NOT EXISTS `wb_user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(32) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `wb_roles_users`
--
ALTER TABLE `wb_roles_users`
  ADD CONSTRAINT `wb_roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `wb_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wb_roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `wb_roles` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `wb_user_tokens`
--
ALTER TABLE `wb_user_tokens`
  ADD CONSTRAINT `wb_user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `wb_users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- add a standard administrator user


--
-- Daten für Tabelle `wb_users` (the unhashed password for Administrator is "adminadmin")
--

INSERT INTO `wb_users` (`id`, `email`, `username`, `password`, `logins`, `last_login`) VALUES
(1, 'your@email-addr.es', 'Administrator', 'eb1f0f1ab4f2ee9295e42f40fda9ed51da39a5ccbcde10224c546b81027f23a7', 0, NULL);

--
-- Daten für Tabelle `wb_roles_users`
--

INSERT INTO `wb_roles_users` (`user_id`, `role_id`) VALUES
(1, 1),
(1, 2);