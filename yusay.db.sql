# Host: localhost  (Version 5.5.5-10.1.34-MariaDB)
# Date: 2023-12-11 17:41:16
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "account"
#

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `Id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempPassword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstName` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Inactive',
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateAdded` date DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volunteerId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

#
# Data for table "account"
#

INSERT INTO `account` VALUES (1,'admin','81dc9bdb52d04dc20036dbd8313ed055','1234','fre','Garcia','Active','Admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'chloe','75238625077196f0bc617f721453be7d',NULL,'Chloie','Silava','Active','Staff',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'vol','75238625077196f0bc617f721453be7d',NULL,'test','vol','Active','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,2),(10,'admin2','75238625077196f0bc617f721453be7d',NULL,'fred','garcia','Active','Admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'vol1','81dc9bdb52d04dc20036dbd8313ed055','884815','vol','vol','Active','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,1);

#
# Structure for table "address"
#

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `refId` int(11) DEFAULT '0',
  `name` varchar(200) DEFAULT NULL,
  `isDeleted` int(11) DEFAULT '0',
  `postalCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

#
# Data for table "address"
#

INSERT INTO `address` VALUES (1,'City',0,'test',0,'10');

#
# Structure for table "beneficiary"
#

DROP TABLE IF EXISTS `beneficiary`;
CREATE TABLE `beneficiary` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `age` int(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `contactNumber` varchar(255) DEFAULT NULL,
  `content` text,
  `status` varchar(255) DEFAULT 'Pending',
  `proof` varchar(255) DEFAULT NULL,
  `dateAdded` date DEFAULT NULL,
  `address` text,
  `cityId` int(255) DEFAULT NULL,
  `brgyId` int(11) DEFAULT NULL,
  `postalCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "beneficiary"
#


#
# Structure for table "category"
#

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `isDeleted` int(11) DEFAULT '0',
  `description` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "category"
#

INSERT INTO `category` VALUES (1,'Environmental Programs',0,'programs under environmental program',NULL),(2,'Educational Program',0,'programs under educational program',NULL),(3,'Health Program',0,'programs under health program',NULL),(4,'Livelihood Program',0,'programs under livelihood program',NULL);

#
# Structure for table "donation"
#

DROP TABLE IF EXISTS `donation`;
CREATE TABLE `donation` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `age` int(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `contactNumber` varchar(255) DEFAULT NULL,
  `content` text,
  `status` varchar(255) DEFAULT 'Pending',
  `proof` varchar(255) DEFAULT NULL,
  `dateAdded` date DEFAULT NULL,
  `isAnonymous` varchar(255) DEFAULT 'Pending',
  `amount` double DEFAULT NULL,
  `referenceNumber` varchar(10) DEFAULT NULL,
  `address` text,
  `cityId` int(255) DEFAULT NULL,
  `brgyId` int(11) DEFAULT NULL,
  `postalCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "donation"
#


#
# Structure for table "joiner"
#

DROP TABLE IF EXISTS `joiner`;
CREATE TABLE `joiner` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `programId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "joiner"
#

INSERT INTO `joiner` VALUES (1,1,11);

#
# Structure for table "program"
#

DROP TABLE IF EXISTS `program`;
CREATE TABLE `program` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `description` text,
  `categoryId` int(11) DEFAULT NULL,
  `address` text,
  `notes` text,
  `maxVolunteer` int(255) DEFAULT NULL,
  `amountSpent` double DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Approved',
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Data for table "program"
#

INSERT INTO `program` VALUES (1,'test','2023-12-31','12:59:00','qq',1,'kjhkj','kjhkj',87,87,'Approved','17022846191674997525.webp');

#
# Structure for table "volunteer"
#

DROP TABLE IF EXISTS `volunteer`;
CREATE TABLE `volunteer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `address` text,
  `cityId` int(255) DEFAULT NULL,
  `brgyId` int(11) DEFAULT NULL,
  `postalCode` varchar(255) DEFAULT NULL,
  `mobileNumber` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ecName` varchar(255) DEFAULT NULL,
  `ecRelationship` varchar(255) DEFAULT NULL,
  `ecContactNumber` varchar(255) DEFAULT NULL,
  `elementary` varchar(255) DEFAULT NULL,
  `elementaryYear` varchar(255) DEFAULT NULL,
  `highschool` varchar(255) DEFAULT NULL,
  `highschoolYear` varchar(255) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL,
  `collegeYear` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `workFrom` varchar(255) DEFAULT NULL,
  `workTo` varchar(255) DEFAULT NULL,
  `dateAdded` varchar(255) DEFAULT NULL,
  `reason1` int(11) DEFAULT '0',
  `reason2` int(11) DEFAULT '0',
  `reason3` int(11) DEFAULT '0',
  `reason4` int(11) DEFAULT '0',
  `reason5` int(11) DEFAULT '0',
  `reason6` int(11) DEFAULT '0',
  `others` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Pending',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "volunteer"
#

INSERT INTO `volunteer` VALUES (1,'kjhkjh','kjhjkh','kjhkj',11,14,'6100','09954394933','aa@aa.com','ujo','joi','oijoij','oijoijoi','joijoi','joij','oijoi','joij','oijoi','joij','oijoijo','oijoij','oijo',NULL,1,0,1,0,0,0,'hjoi','Pending');
