# Host: localhost  (Version 5.5.5-10.1.34-MariaDB)
# Date: 2023-12-15 11:54:50
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "account"
#

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `Id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

#
# Data for table "account"
#

INSERT INTO `account` VALUES (1,'admin','1234','Jerahmeel','Francisco','Active','Admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'chloe','634728','Chloie','Silava','Inactive','Staff',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'vol','qq','test','vol','Active','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,1),(10,'Jules','abc','Jules Stephen','Caballero','Active','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,2),(11,'dia','dia123','Diana Jane','Tee','Active','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,4),(12,'aiks','aika02','Aika Angela','Gomez','Active','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,5),(13,'dia','347319','kyle','Gomez','Inactive','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,6),(14,'kyle20','1234','kyle','Gomez','Active','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,7),(15,'Aero','2020','AEro','Melendres','Active','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,8),(16,'Dynzyl','dynzyl123','Dynzyl James','Ganchoon','Active','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,9),(17,'kyrie','12345','kyrie','endoma','Active','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,10),(18,'J23','123','Josh','Labarejos','Active','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,11),(19,'olrak','123','Karlo Jose','Flores','Active','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,12),(20,'Roy','123','Roy Patrick','Cuadra','Active','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,13),(21,'GLO','glorymei','Glory Mae','Plateros','Active','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,14),(22,'JERRY','681103','TRISTRAM','CHAMPURADO','Inactive','Admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'claire','12345','Claire Krizel','Segovia','Active','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,3),(24,'taga','abc','taga','bukid','Active','Volunteer',NULL,NULL,NULL,NULL,NULL,NULL,15);

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
  `address` text,
  `barangay` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `content` text,
  `status` varchar(255) DEFAULT 'Pending',
  `proof` varchar(255) DEFAULT NULL,
  `dateAdded` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "beneficiary"
#

INSERT INTO `beneficiary` VALUES (1,'First Name','Last Name','example_email@gmail.com',18,'Male','2121896','Taloc Proper South, Bago City, Negros Occ.','Taloc','Bago City','example content','Approved','','2023-11-11'),(2,'Chloie','Silava','silava@gmail.com',18,'Female','880808','Mansiligan','Mansiligan','Bacolod City','example content2','Approved','','2023-11-11'),(3,'Taylor','Swift','sgv@gmail.com',33,'Female','09543276891','Malibu','n/a','california','','Pending','1700048949391757614_708630397793995_6967883793607838672_n.jpg','2023-11-15'),(4,'Mike','Jomes','mike_jomes@gmail.com',23,'Male','0945333245','Brgy. Mansilingan, Bacolod City','Mansiligan','Bacolod City','This is my situation: I don&#039;t have a home in our community -- but I can offer some volunteer help when all this matter ends in the long run for good. Please help me and my family','Pending','1701226199grid-health-6.jpg','2023-11-29'),(5,'alliah','benedicto','alibenedicto14@gmail.com',23,'Female','09267576430','bacolod city','sum ag','Bacolod City','','Approved','1701229286Bloodletting.jpg','2023-11-29');

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

INSERT INTO `category` VALUES (1,'Environmental Program',0,'The FGYFI&#039;s environmental program is a comprehensive and multifaceted initiative dedicated to addressing pressing environmental issues and fostering a sustainable future. This program encompasses a range of strategic actions, each with a specific focus on environmental conservation, restoration, and awareness. By combining various approaches, the program aims to make a substantial impact on the local and global environment. It seeks to engage communities, volunteers, and stakeholders in activities that promote the protection of natural habitats, responsible waste management, and the preservation of vital ecosystems.\r\n\r\nOverall, the FGYFI&#039;s environmental program underscores the organization&#039;s commitment to creating a cleaner, greener, and more environmentally conscious world for present and future generations.',NULL),(2,'Educational Program',0,'The Education Program initiated by FGYFI is a comprehensive endeavor aimed at improving educational access and quality for underserved communities. This program embodies FGYFI&#039;s commitment to empower individuals through education, fostering opportunities for a brighter future.\r\n\r\nThe Education Program initiated by FGYFI stands as a cornerstone of the foundation&#039;s mission to empower individuals through education. At its core, this program is a steadfast commitment to bridging the educational divide and fostering opportunities for socioeconomically disadvantaged communities. Education is often considered the key to breaking the cycle of poverty, and FGYFI recognizes the profound impact it can have on individuals&#039; lives and the communities they are part of. The Education Program not only seeks to provide material support in the form of school supplies and infrastructure but also aims to inspire a love for learning and cultivate the potential of every student.',NULL),(3,'Health Program',0,'The FGYFI&#039;s health program is a multifaceted initiative dedicated to improving the well-being and overall health of individuals, particularly in underserved communities. This program encompasses a range of strategic actions, each designed to address different aspects of health and medical care. FGYFI recognizes the critical importance of accessible healthcare services and endeavors to make a positive impact on the lives of those in need.\r\n\r\nThrough a variety of initiatives, the FGYFI health program contributes to the overall health and welfare of communities. These initiatives include bloodletting events, medical missions, surgical missions, dental missions, optical missions, and medical assistance. The program strives to provide essential healthcare services, including blood donations for emergencies and medical treatments, free medical check-ups, surgical procedures, dental care, eye care, and support for individuals affected by environmental issues or crises.',NULL),(4,'Livelihood Program',0,'The Felix G. Yusay Foundation&#039;s Livelihood program is designed to empower individuals and communities by providing a platform for sustainable economic growth\r\n\r\nThe foundation&#039;s focus in this initiative is on enhancing the lives of the economically disadvantaged. The goal of this program is to help people and places become economically self-sufficient and raise their standard of living. \r\n\r\nPeople can participate in the program to improve their skill sets. They&#039;ve also helped them out by donating some resources that are renewable.',NULL),(5,'Special Program',0,'At the Felix G. Yusay Foundation Inc., our special programs collectively embody our unwavering commitment to compassion and community support. These initiatives are the heart and soul of our mission to create a more inclusive and caring society.\r\n\r\nThe emphasis of the program is on the giving nature of the foundation. The holiday season is a popular time for this program, but it is not limited. The organization gives priority aid to the poorest of the poor, and in rare cases, such as after natural disasters, it even builds homes for individuals who have lost theirs.\r\n',NULL),(6,'Sports Program',0,'FGYFI&#039;S Sports Program is designed to help both young and adult improve their athletic abilities and pursue their passions. Giving people access to the resources they need to pursue their passions, whether from professional development or pure enjoyment. FGYFI ultimately had faith in the abilities of these young and adult athletes.',NULL),(7,'Adapt a Community Program',0,'At the Felix G. Yusay Foundation Inc., our community programs collectively embody our unwavering commitment to compassion and community support. These initiatives are the heart and soul of our mission to create a more inclusive and caring society. The emphasis of the program is on the giving nature of the foundation. The holiday season is a popular time for this program, but it is not limited. The organization gives priority aid to the poorest of the poor, and in rare cases, such as after natural disasters, it even builds homes for individuals who have lost theirs.',NULL);

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
  `address` text,
  `barangay` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `content` text,
  `status` varchar(255) DEFAULT 'Pending',
  `proof` varchar(255) DEFAULT NULL,
  `dateAdded` date DEFAULT NULL,
  `isAnonymous` varchar(255) DEFAULT 'Pending',
  `amount` double DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "donation"
#

INSERT INTO `donation` VALUES (1,'Jerahmeel Hoshaiah','Francisco','s1920327@usls.edu.ph',18,'Male','10380184','Taloc Proper South, Bago City, Negros Occ.','Taloc','Bago City','Thank you note, donation','Approved','1699690159Giving of Sports Uniform.jpg','2023-11-11','No',100),(2,'Cherryl','Torbiso','cerryl@gmail.com',36,'Female','0915234567','blk 3 lot 3','purisima','manapla','KEEP ON HELPING','Pending','1699690159Giving of Sports Uniform.jpg','2023-11-11','No',20000),(3,'Stephen','Caballero','vhafnafja@gmail.com',23,'Male','0914000032','Montebello','Bata','Bacolod','','Pending',NULL,'2023-11-15','No',60000),(4,'kai','ratcliffe','kai@gmail.com',20,'Male','0879679678','Brgy. Mansilingan, Bacolod City','Mansiligan','Bacolod City','','Approved','1701226543bg-showcase-1.jpg','2023-11-29','Yes',10000),(5,'Theodore','COnsing','theo.simon.consing@gmail.com',22,'Male','09409051088','mandalagan','mandalagan','bacolod city','keep on helping','Approved','1701229745Distribution of Trash Cans.jpg','2023-11-29','No',20000),(6,'tony ','stark','johnnybaby831@gmail.com',31,'Male','09062326318','silay city','V','silay city','im rich. sheesh','Approved','1701231569bg-showcase-1.jpg','2023-11-29','No',2000000),(7,'John','Doe','john@doe.com',29,'Male','0912345678','dfgdfg','dfgdg','dfgdfg','dfgfdgd','Approved','1701234953bg-showcase-1.jpg','2023-11-29','Yes',545454);

#
# Structure for table "joiner"
#

DROP TABLE IF EXISTS `joiner`;
CREATE TABLE `joiner` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `programId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

#
# Data for table "joiner"
#

INSERT INTO `joiner` VALUES (1,3,9),(3,1,9),(5,2,9),(6,4,9),(8,2,10),(9,4,11),(10,8,12),(11,9,11),(12,9,14),(13,14,15),(15,9,16),(19,13,19),(21,8,21),(23,13,24),(25,8,10),(26,9,10),(27,13,0),(28,17,0),(29,18,0),(30,8,0);

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
  `status` varchar(255) DEFAULT 'Pending',
  `image` varchar(150) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

#
# Data for table "program"
#

INSERT INTO `program` VALUES (1,'Singcang Tree Plantings','2023-11-18','12:30:00','test',1,'Singcang Airport','dsfdsf',10,20000,'Closed',''),(2,'Kabugwason Clean Up Drive','2023-11-28','08:30:00','Clean Up DRIVE',1,'Kabugwason Mansilingan','',20,5000,'Closed',''),(3,'Singcang Tree Planting','2023-11-18','12:30:00','Planting ',1,'Singcang Airport','',10,10000,'Closed',''),(4,'KES School Supplies Giving','2023-12-01','11:00:00','Giving of School Supplies to KES students ',2,'KES mansilingan','',5,5000,'Approved',''),(5,'School Shoes for a smile','2023-12-03','11:30:00','Giving out of school shoes for ABES 1 students',2,'ABES 1','',5,8000,'Closed',''),(6,'Seniors Medical Checkup','2023-11-26','07:30:00','Medical Checkup for the elderly',3,'bago city gymnasium','',10,15000,'Pending',''),(7,'Eye check you','2023-12-03','11:20:00','Free eye checking',3,'','',10,6000,'Pending',''),(8,'Tree Planting','2023-11-30','09:30:00','Within FGYFI, our commitment to a greener future is epitomized by our tree-planting initiatives. These endeavors represent our dedication to mitigating deforestation and fostering a healthier environment by planting trees.',1,'Felisa','Tree Planting',5,5500,'Approved','1703718515grid-environmental-3.jpg'),(9,'Distribution of Trash Cans','2023-11-03','09:09:00','In our effort to maintain clean and responsible communities, FGYFI takes an active role by distributing trash cans. This practical gesture empowers individuals to dispose of their waste responsibly, thus preventing littering and fostering a cleaner and healthier environment.',1,'Felisa','n/a',100,15000,'Approved','1700727947927Distribution of Trash Cans.jpg'),(10,'Coastal Clean-Up','2023-12-07','21:17:00','This program consists of a coastal cleanup program initiated by the foundation',1,'','',100,10000,'Open','1701177475Coastal Clean-up.jpg'),(11,'Test even','2023-12-31','12:59:00','lkjlkjl',1,'lkhjlkjl','lkjlkj',10,10,'Pending','1701178641PeriodicTableWallpaper2017.png'),(12,'Example 2','2023-11-30','21:42:00','Example Event 2',1,'','',5,100,'Pending','1701178803Dental Mission.jpg'),(13,'Donation to Shelters','2023-11-23','12:41:00','Donation to Shelters Program',4,'','',10,100,'Approved','1701178909Donation to Shelters.jpg'),(14,'Mangrove Planting','2023-11-08','11:04:00','FGYFI is resolute in its commitment to the preservation of coastal ecosystems. Through our mangrove planting initiatives, we create and maintain mangrove forests, which act as nature&#039;s defense against erosion and provide a thriving habitat for marine life.',1,'Brgy. Balaring, Silay City','n/a',200,20000,'Approved','1701209172Mangrove Planting.jpg'),(15,'Coastal Cleanup','2023-11-29','06:07:00','At FGYFI, we&#039;re ardent about safeguarding our waters. Through meticulously organized coastal clean-up events, we are committed to removing marine debris and preserving marine ecosystems, playing a vital role in protecting the environment.',1,'Felisa','n/a',150,20000,'Approved','1701209254Coastal Clean-up.jpg'),(16,'Environmental Awareness Program','2023-11-15','10:08:00','We educate on environmental protection, understanding human impacts, and spur action. We raise awareness on environmental issues and provide support during disasters and crises.',1,'Brgy. Balaring','n/a',175,200,'Approved','1701209350Environmental Awareness.jpg'),(17,'Balik Eskwela','2023-11-22','09:18:00','The foundation provides a complete set of school supplies to selected indigent school children to far-flung communities and public schools.',2,'Bacolod City National Highschool, BCNHS','n/a',50,1000,'Approved','1701209962Balik Eskwela.jpg'),(18,'Brigada Eskwela','2023-11-27','10:20:00','The foundation joins the Brigada Eskwela Program of Dep-Ed by providing painting and cleaning materials to public schools around Negros Occidental.',2,'Bacolod City National Highschool, BCNHS','n/a',20,0,'Approved','1701210028Brigada Eskwela.jpg'),(19,'School Repair and Renovation','2023-11-22','00:22:00','The foundation provides construction materials to public schools for repair and renovation of classrooms and school facilities',2,'Sta. Rosa Elementary School, Murcia','tire change during travel',10,5500,'Approved','1701210130School Repair and Renovation.jpg'),(20,'Scholarship Grant','2023-11-28','06:23:00','The foundation sponsors senior high school and college level students from indigent families by providing them full tuition fee or allowance.',2,'La Consolacion College Murcia','n/a',5,0,'Approved','1701210230Scholarship Grant.jpg'),(21,'Medical Mission','2023-11-08','06:25:00','FGYFI conducts medical missions, offering free medical check-ups, consultations, and essential medicines to underserved communities, improving their health access.',3,'Gaisano Main','n/a',20,0,'Approved','1701210364Medical Mission.jpg'),(22,'Surgical Mission','2023-11-21','08:27:00','FGYFI provides free surgical procedures and medicines to those in need contributing to their overall health and well-being.',3,'Gaisano City','n/a',20,0,'Approved','1701210466Surgical Mission.jpg'),(23,'Dental Mission','2023-11-16','09:28:00','FGYFI&#039;S dental mission offers free tooth extractions and medicines to individuals who require dental care but may not have access to it.',3,'Gaisano City','n/a',20,0,'Approved','1701210521Dental Mission.jpg'),(24,'Relief Operations','2023-11-30','07:32:00','We take pride in our commitment to providing relife to communities during times of crisis. Our mission is to ensure that individuals in need receive essential supplies and support when they need it most. We work tirelessly to assist communities affected by emergencies and natural disasters, helping them rebuild and recover.',5,'Brgy. Mansiligan','n/a',200,500,'Approved','1701210768Relief Operation.jpg'),(25,'Gift Giving','2023-07-29','06:34:00','We have a deep-seated commitment to spreading joy and alleviating the burdens faced by underprivileged individuals and communities. Our gift-giving initiatives are a testament to our compassionate spirit. We provide gifts and essential items, especially during special occasions, to bring happiness and relief to those in need.',5,'Brgy. Balaring','n/a',10,2000,'Approved','1701210906Gift Giving.jpg'),(26,'Donation of Laundry Soap','2023-06-29','06:35:00','In our ongoing efforts to improve the well-being of individuals and communities, we provide  a basic necessity: laundry soap. We understand the importance of cleanliness and hygiene in daily life, and by donating laundry soap, we contribute to enhancing the quality of life for those we serve.',5,'Brgy. Singcang, Bacolod City','n/a',10,0,'Approved','1701210963Donation of Laundry Soap.jpg'),(27,'Giving of Sports Uniform','2023-11-14','06:39:00','The foundation provides a complete set of school supplies to selected indigent school children to far-flung communities and public schools.',6,'ETCS 1','n/a',25,1000,'Approved','1701211206Giving of Sports Uniform.jpg'),(28,'Giving of Sports Equipment','2023-11-23','09:40:00','The foundation joins the Brigada Eskwela Program of Dep-Ed by providing painting and cleaning materials to public schools around Negros Occidental.',6,'ETCS 2','n/a',20,1000,'Approved','1701211246Giving of Sports Equipment.jpg'),(29,'Example Donation Event','2023-11-29','11:31:00','Example Donation Event',1,'n/a','n/a',100,1000,'Approved','1701228714Giving of Sports Equipment.jpg');

#
# Structure for table "volunteer"
#

DROP TABLE IF EXISTS `volunteer`;
CREATE TABLE `volunteer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `address` text,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Data for table "volunteer"
#

INSERT INTO `volunteer` VALUES (1,'kjhkjh','kjhkh','kjhkj','hkjh','kjhkj','98789','hkj','hkjh@sdsd.sdsd','87','98','7987','98798','798','798','798','798','98798','98798','798','798','798',NULL,1,0,1,0,1,0,'sdfds','Approved'),(2,'Jules Stephen','Caballero','Brgy 17','Bacolod','Negros Occ','6100','09152630501','steph@gmail.com','Chanel Chloie','mother','09995234955','ETCS 2','2013','NOHS','2019','JOHN B LACSON','2022','Rigel Shipping Company','cadet','2023','current',NULL,0,0,0,0,0,1,'','Pending'),(3,'Claire Krizel','Segovia','Brgy. Mansiligan','Bacolod City','Negros Occidental','6100','09455666077','krizel@gmail.com','Analyn Segovia','Mother','09169664502','Punta Salong ','2015','NOHS','2020','USLS','2025','N/A','N/A','N/A','N/A',NULL,0,0,1,0,0,0,'','Approved'),(4,'Diana Jane','Tee','Villena Street, Brgy. Zone 4','Cadiz City','Negros Occidental','6121','09515657669','s2120530@usls.edu.ph','Mary Jane Tee','Mother','09294989087','SPED Training Center','2015','Dr. VFGMNHS','2020','USLS','2025','NA','NA','NA','NA',NULL,0,0,0,0,1,0,'','Approved'),(5,'Aika Angela','Gomez','Totong 2,Brgy. Felisa, Bacolod City','Bacolod City','Negros Occidental','6100','09504413910','aikaangelagomez80@gmai.com','Mona Dia Jardin','Cousin','09989862341','Man-uling Eelementary School','2015','Handumanan NHS','2020','USLS','2025','N/A','N/A','N/A','N/A',NULL,0,1,1,0,1,0,'','Approved'),(6,'kyle','escara','brgy 30','Bacolod City','Negros Occidental','6100','09101050110','mrvpgame90@gmail.com','Mary Jane Tee','Mother','09169664502','SPED Training Center','2011`','Dr. VFGMNHS','2017','USLS','2025','NA','NA','2000','NA',NULL,0,0,0,0,1,0,'','Approved'),(7,'kyle','Gomez','blk 7','Bacolod','Negros Occidental','1312','09101050110','123@usls.edu.ph','Mary Jane Tee','Mother','09169664502','Punta Salong ','2015','NOHS','2020','USLS','2025','N/A','N/A','N/A','NA',NULL,0,0,0,0,1,0,'','Approved'),(8,'Aerochrise','Melendres','Deca Homes','Bacolod City','Negros Occidental','6100','09272716913','s2121478@usls.edu.ph','Angelo Melendres','Father','09606707568','ISPA','2015','USLS IS','2019','USLS','N/A','N/A','N/A','N/A','NA',NULL,0,0,0,1,0,0,'','Approved'),(9,'Dynzyl James','Ganchoon','#4 Alunan Avenue, Bacolod City','Bacolod','Negros Occidental','6100','09179145681','dynzyl.ganchoon@gmail.com','Chingbee Ganchoon','Mother','09179145681','BTTHS','2007','BTTHS','2018','USLS','2025','N/A','N/A','N/A','NA',NULL,1,1,0,0,1,0,'','Approved'),(10,'kyrie','endoma','salvacion','Bacolod City','Negros Occidental','6129','09101050110','endomaangelmae@gmail.com','jm aposaga','Father','09606707568','SVES','2015','Handumanan NHS','2019','USLS','2025','not available','N/A','N/A','NA',NULL,0,0,0,0,1,1,'','Approved'),(11,'Josh','Labarejos','Victorias City','Victorias','Negros Occidental','6110','123456780','s2021063@usls.edu.ph','Juan de la Cruz','Cousin','09123456789','DBTI','2014','CSAV-IS','2018','USLS','2024','not available','not available','NA','N',NULL,1,1,1,1,1,1,'','Approved'),(12,'Karlo Jose','Flores','Sum-ag, ','Bacolod City','Negros Occidental','6100','09196924099','karlomuyco@gmail.com','Hope Flores','Mother','09268654778','Sum-ag elementary','2014','VMA','2018','USLS','N/A','N/A','N/A','N/A','NA',NULL,0,0,1,0,0,0,'','Approved'),(13,'Roy Patrick','Cuadra','Brgy Taculing','BCD','Negros OCcidental','6100','09478363080','s2100370@usls.edu.ph','Rox CUadra','Mother','0954786329','SJI','2018','SJI &amp; USLS','2022','USLS','Ongoing','N/A','N/A','N/A','N/A',NULL,1,1,1,1,1,1,'','Approved'),(14,'Glory Mae','Plateros','Bacolod City','Bacolod','Negros Occidental','6100','09304628769','GLORYPLATEROS5@GMAIL.COM','Mary Jane Plateros','Mother','09304628769','ETCS 2','2015','NOHS','2021','USLS','N/A','N/A','N/A','N/A','NA',NULL,1,1,1,1,1,1,'','Approved'),(15,'taga','bukid','sum ag','Bacolod City','Negros Occidental','6100','09272716913','lactopafi2@kei-digital.com','Mary Jane Tee','Cousin','09294989087','SPED Training Center','2014','Handumanan NHS','2019','USLS','2024','N/A','N/A','N/A','NA',NULL,0,0,0,0,1,0,'','Approved');
