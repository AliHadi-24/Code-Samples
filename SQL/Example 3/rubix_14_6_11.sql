
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";



create Database rubix2017;
use rubix2017;


CREATE TABLE IF NOT EXISTS `plants_master` (
  `pnum` int(5) NOT NULL,
  `pname` varchar(25) DEFAULT NULL,
  `ptype` varchar(1) DEFAULT NULL,
  `variety` varchar(1) DEFAULT NULL,
  `stockOnHand` int(11) DEFAULT NULL,
  `lastUpdate` date DEFAULT NULL,
  `reorderQty` int(11) DEFAULT NULL,
  `comments` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pnum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



INSERT INTO `plants_master` (`pnum`, `pname`, `ptype`, `variety`, `stockOnHand`, `lastUpdate`, `reorderQty`, `comments`) VALUES
(10001, 'Rose', 'P', 'S', 9, '2011-03-06', 10, NULL),
(10002, 'Jasmine', 'P', 'B', 28, '2011-03-06', 8, 'Not selling'),
(10003, 'Bouganvilla', 'P', 'T', 50, '2011-02-15', 100, 'Fast selling'),
(10004, 'Tulip', 'A', 'S', 100, '2011-04-02', 125, 'Fast selling'),
(10005, 'Banksia', 'P', 'S', 250, '2011-03-28', 20, 'Moderate'),
(10006, 'Tomato', 'A', 'S', 150, '2011-01-01', 15, 'Moderate'),
(1007, 'Devils Ivy', 'P', 'S', 15, '2011-03-22', 20, NULL);



CREATE TABLE IF NOT EXISTS `purchases` (
  `invoiceNum` int(5) NOT NULL,
  `invoiceDate` date DEFAULT NULL,
  `pnum` int(5) DEFAULT NULL,
  `purDate` date DEFAULT NULL,
  `purQty` int(4) DEFAULT NULL,
  `purPrice` decimal(7,2) DEFAULT NULL,
  `suppNum` int(5) DEFAULT NULL,
  PRIMARY KEY (`invoiceNum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `purchases` (`invoiceNum`, `invoiceDate`, `pnum`, `purDate`, `purQty`, `purPrice`, `suppNum`) VALUES
(10100, '2010-12-12', 10001, '2010-12-01', 150, '10.10', 10010),
(10101, '2010-12-12', 10002, '2010-12-01', 150, '7.50', 10010),
(10102, '2011-01-17', 10003, '2011-01-15', 50, '12.50', 20010),
(10103, '2011-01-17', 10006, '2011-01-16', 25, '16.75', 20020),
(10104, '2011-01-19', 10004, '2011-01-17', 250, '15.00', 20012),
(10105, '2011-01-19', 10005, '2011-01-17', 10, '25.00', 20012),
(10106, '2011-01-21', 10003, '2011-01-18', 50, '13.13', 20010),
(10107, '2011-02-10', 10003, '2011-02-10', 50, '12.50', 20011),
(10108, '2011-03-05', 10004, '2011-03-05', 250, '14.30', 20011),
(10109, '2011-03-25', 10006, '2011-03-23', 25, '7.75', 10010),
(10110, '2011-04-03', 10004, '2011-04-02', 250, '14.65', 10010);



CREATE TABLE IF NOT EXISTS `sales` (
  `recptNum` int(5) NOT NULL,
  `recptDate` date DEFAULT NULL,
  `pnum` int(5) DEFAULT NULL,
  `saleQty` int(4) DEFAULT NULL,
  `custNum` int(5) DEFAULT NULL,
  PRIMARY KEY (`recptNum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `sales` (`recptNum`, `recptDate`, `pnum`, `saleQty`, `custNum`) VALUES
(11000, '2011-03-03', 10001, 10, 101),
(11001, '2011-03-03', 10006, 5, 101),
(11002, '2011-03-03', 10002, 3, 101),
(11003, '2011-03-03', 10007, 1, 110),
(11004, '2011-04-03', 10001, 3, 111),
(11005, '2011-04-13', 10007, 2, 111),
(11006, '2011-04-13', 10004, 1, 1000),
(11007, '2011-04-23', 10003, 2, 1000),
(11008, '2011-04-13', 10005, 5, 1100),
(11009, '2011-04-04', 10006, 10, 1100),
(11010, '2011-03-24', 10007, 2, 1100),
(11011, '2011-06-01', 10001, 3, 102),
(11012, '2011-06-03', 10001, 1, 103),
(11013, '2011-06-16', 10004, 15, 101),
(11014, '2011-06-10', 10005, 20, 101),
(11015, '2011-06-18', 10006, 10, 111);



CREATE TABLE IF NOT EXISTS `supplier` (
  `suppNum` int(5) NOT NULL,
  `suppName` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `streetNum` varchar(4) NOT NULL,
  `streetName` varchar(20) NOT NULL,
  `suburb` varchar(20) NOT NULL,
  `postCode` varchar(4) NOT NULL,
  PRIMARY KEY (`suppNum`),
  UNIQUE KEY `phone` (`phone`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `supplier` (`suppNum`, `suppName`, `phone`, `email`, `streetNum`, `streetName`, `suburb`, `postCode`) VALUES
(10010, 'Plants R Us', '96829000', 'sales@plantsrus.com', '120', 'William Street', 'Granville', '2142'),
(20010, 'Easy gardens', '98629000', 'sales@easygardens.com', '1200', 'Parramatta Road', 'Granville', '2142'),
(20011, 'Good landscapes', '89629000', 'sales@goodlandscapes.com', '1', 'Abla Ave', 'Merrylands', '2147'),
(20012, 'Lucky plants', '95649000', 'sales@luckyplants.com', '78', 'Good Street', 'Harris Park', '2137'),
(20020, 'Rocks N Grass', '96829200', 'sales@rocksngrass.com', '200', 'Bold Road', 'Granville', '2142');
