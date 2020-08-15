-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Jul-2020 às 17:36
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auditplan`
--

DROP TABLE IF EXISTS `auditplan`;
CREATE TABLE IF NOT EXISTS `auditplan` (
  `idAuditPlan` int(11) NOT NULL AUTO_INCREMENT,
  `ProcessActivitie` varchar(45) NOT NULL,
  `TypeAudit` char(1) NOT NULL,
  `ResponsabilitiesAudit` varchar(45) NOT NULL,
  `ScopeAuditL` char(1) NOT NULL,
  `ScopeAuditC` char(1) NOT NULL,
  `PeriodAudit` datetime NOT NULL,
  `idAuditTechnique` int(11) NOT NULL,
  PRIMARY KEY (`idAuditPlan`,`idAuditTechnique`),
  KEY `fk_AuditPlan_AuditTechnique_idx` (`idAuditTechnique`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `audittechnique`
--

DROP TABLE IF EXISTS `audittechnique`;
CREATE TABLE IF NOT EXISTS `audittechnique` (
  `idAuditTechnique` int(11) NOT NULL AUTO_INCREMENT,
  `ObjectiveAudit` char(1) NOT NULL,
  `AuditPlan` varchar(45) NOT NULL,
  PRIMARY KEY (`idAuditTechnique`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `criterionaudit`
--

DROP TABLE IF EXISTS `criterionaudit`;
CREATE TABLE IF NOT EXISTS `criterionaudit` (
  `idCriterionAudit` int(11) NOT NULL AUTO_INCREMENT,
  `INT_TYPE` int(11) DEFAULT NULL,
  `DATE_TYPE` date DEFAULT NULL,
  `FLOAT_TYPE` float DEFAULT NULL,
  `idAuditPlan` int(11) NOT NULL,
  PRIMARY KEY (`idCriterionAudit`,`idAuditPlan`),
  KEY `fk_CriterionAudit_AuditPlan1_idx` (`idAuditPlan`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentanalises`
--

DROP TABLE IF EXISTS `documentanalises`;
CREATE TABLE IF NOT EXISTS `documentanalises` (
  `idDocumentAnalises` int(11) NOT NULL AUTO_INCREMENT,
  `INT_TYPE` int(11) DEFAULT NULL,
  `DATE_TYPE` date DEFAULT NULL,
  `FLOAT_TYPE` float DEFAULT NULL,
  `idAuditPlan` int(11) NOT NULL,
  PRIMARY KEY (`idDocumentAnalises`,`idAuditPlan`),
  KEY `fk_DocumentAnalises_AuditPlan1_idx` (`idAuditPlan`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `logfindings`
--

DROP TABLE IF EXISTS `logfindings`;
CREATE TABLE IF NOT EXISTS `logfindings` (
  `idLogFindings` int(11) NOT NULL AUTO_INCREMENT,
  `idAuditPlan` int(11) NOT NULL,
  `CriterionAudit` varchar(100) DEFAULT NULL,
  `RegistroNC` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idLogFindings`,`idAuditPlan`),
  KEY `fk_LogFindings_AuditPlan1_idx` (`idAuditPlan`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `auditplan`
--
ALTER TABLE `auditplan`
  ADD CONSTRAINT `fk_AuditPlan_AuditTechnique` FOREIGN KEY (`idAuditTechnique`) REFERENCES `audittechnique` (`idAuditTechnique`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `criterionaudit`
--
ALTER TABLE `criterionaudit`
  ADD CONSTRAINT `fk_CriterionAudit_AuditPlan1` FOREIGN KEY (`idAuditPlan`) REFERENCES `auditplan` (`idAuditPlan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `documentanalises`
--
ALTER TABLE `documentanalises`
  ADD CONSTRAINT `fk_DocumentAnalises_AuditPlan1` FOREIGN KEY (`idAuditPlan`) REFERENCES `auditplan` (`idAuditPlan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `logfindings`
--
ALTER TABLE `logfindings`
  ADD CONSTRAINT `fk_LogFindings_AuditPlan1` FOREIGN KEY (`idAuditPlan`) REFERENCES `auditplan` (`idAuditPlan`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
