--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `carID` int(11) NOT NULL AUTO_INCREMENT,
  `Make` varchar(45) DEFAULT NULL,
  `Model` varchar(45) NOT NULL,
  `Price` float NOT NULL,
  PRIMARY KEY (`carID`)
);
--
-- Table structure for table `colours`
--

DROP TABLE IF EXISTS `colours`;
CREATE TABLE `colours` (
  `colour` varchar(45) NOT NULL,
  `carID` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`colour`,`carID`),
  KEY `carID` (`carID`),
  FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`)
);

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `custID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`custID`,`email`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `custID_UNIQUE` (`custID`)
);


--
-- Table structure for table `engines`
--

DROP TABLE IF EXISTS `engines`;
CREATE TABLE `engines` (
  `engine` varchar(45) NOT NULL,
  `carID` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`engine`,`carID`),
  KEY `carID` (`carID`),
  FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`)
);
--
-- Table structure for table `interiors`
--

DROP TABLE IF EXISTS `interiors`;
CREATE TABLE `interiors` (
  `interior` varchar(45) NOT NULL,
  `carID` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`interior`,`carID`),
  KEY `carID` (`carID`),
  FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`)
);
--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `carID` int(11) DEFAULT NULL,
  `carTrim` varchar(45) DEFAULT NULL,
  `colour` varchar(45) DEFAULT NULL,
  `interior` varchar(45) DEFAULT NULL,
  `engine` varchar(45) DEFAULT NULL,
  `wheel` varchar(45) DEFAULT NULL,
  `sensors` varchar(45) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `carID` (`carID`),
  FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`)
);
--
-- Table structure for table `sensors`
--

DROP TABLE IF EXISTS `sensors`;
CREATE TABLE `sensors` (
  `sensors` varchar(45) NOT NULL,
  `carID` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`sensors`,`carID`),
  KEY `carID` (`carID`),
  FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`)
);
--
-- Table structure for table `trims`
--

DROP TABLE IF EXISTS `trims`;
CREATE TABLE `trims` (
  `carTrim` varchar(45) NOT NULL,
  `carID` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`carTrim`,`carID`),
  KEY `carID` (`carID`),
  FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`)
);

--
-- Table structure for table `wheels`
--

DROP TABLE IF EXISTS `wheels`;
CREATE TABLE `wheels` (
  `wheel` varchar(45) NOT NULL,
  `carID` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`wheel`,`carID`),
  KEY `carID` (`carID`),
  FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`)
);