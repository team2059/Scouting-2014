SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS `2059` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `2059`;

CREATE TABLE IF NOT EXISTS `rounds` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `teamNumber` int(11) DEFAULT NULL,
  `matchNumber` int(11) DEFAULT NULL,
  `autohtMiss` int(11) DEFAULT NULL,
  `autohtMade` int(11) DEFAULT NULL,
  `hotGoal` int(11) DEFAULT NULL,
  `autoltMiss` int(11) DEFAULT NULL,
  `autoltMade` int(11) DEFAULT NULL,
  `hotZone` text,
  `startPosition` text,
  `htMiss` int(11) DEFAULT NULL,
  `htMade` int(11) DEFAULT NULL,
  `ltMiss` int(11) DEFAULT NULL,
  `ltMade` int(11) DEFAULT NULL,
  `passes` int(11) DEFAULT NULL,
  `catches` int(11) DEFAULT NULL,
  `truss` int(11) DEFAULT NULL,
  `pointsPrevented` int(11) DEFAULT NULL,
  `note` text,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(45) DEFAULT NULL,
  `mac` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=680 ;

CREATE TABLE IF NOT EXISTS `schedule` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `round` int(11) NOT NULL,
  `red1` int(11) NOT NULL,
  `red2` int(11) NOT NULL,
  `red3` int(11) NOT NULL,
  `blu1` int(11) NOT NULL,
  `blu2` int(11) NOT NULL,
  `blu3` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;
