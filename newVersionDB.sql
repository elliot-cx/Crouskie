-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2022 at 08:06 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `CART`
--

CREATE TABLE `CART` (
  `IDCUSTOMER` int(11) NOT NULL,
  `IDPROD` int(11) NOT NULL,
  `QUANTITYCART` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CART`
--

INSERT INTO `CART` (`IDCUSTOMER`, `IDPROD`, `QUANTITYCART`) VALUES
(1, 1, 2),
(1, 2, 5),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `CLOTH_SIZE`
--

CREATE TABLE `CLOTH_SIZE` (
  `IDSIZE` int(11) NOT NULL,
  `NAMESIZE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CLOTH_SIZE`
--

INSERT INTO `CLOTH_SIZE` (`IDSIZE`, `NAMESIZE`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'Grand'),
(7, 'superGrand');

-- --------------------------------------------------------

--
-- Table structure for table `CMD`
--

CREATE TABLE `CMD` (
  `DATEORDER` timestamp NULL DEFAULT NULL,
  `NUMORDER` int(11) NOT NULL,
  `IDCUSTOMER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CMD`
--

INSERT INTO `CMD` (`DATEORDER`, `NUMORDER`, `IDCUSTOMER`) VALUES
('2022-10-23 22:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `COLLECTION`
--

CREATE TABLE `COLLECTION` (
  `NAMECOLLECTION` varchar(255) NOT NULL,
  `IDCOLLECTION` int(11) NOT NULL,
  `PATHPICTURE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `COLLECTION`
--

INSERT INTO `COLLECTION` (`NAMECOLLECTION`, `IDCOLLECTION`, `PATHPICTURE`) VALUES
('crooskieverre', 1, 'cheminVersLimageDeTest');

-- --------------------------------------------------------

--
-- Table structure for table `COLOR`
--

CREATE TABLE `COLOR` (
  `NAMECOLOR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `COLOR`
--

INSERT INTO `COLOR` (`NAMECOLOR`) VALUES
('Bleu'),
('jaune'),
('orange'),
('rouge'),
('vert');

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMER`
--

CREATE TABLE `CUSTOMER` (
  `IDCUSTOMER` int(11) NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `LAST_NAME` varchar(255) DEFAULT NULL,
  `MAIL_ADDRESS` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `counter_connection` int(11) NOT NULL DEFAULT 0,
  `last_connection_try` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CUSTOMER`
--

INSERT INTO `CUSTOMER` (`IDCUSTOMER`, `FIRST_NAME`, `LAST_NAME`, `MAIL_ADDRESS`, `password`, `counter_connection`, `last_connection_try`) VALUES
(1, 'Thomas', 'Warrier', 'totot@gamil.com', 'default_password', 2, '2022-11-11 17:07:37'),
(2, 'loic', 'pupier', 'lolo@gmail.com', 'default_password', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `EXISTINGCOLOR`
--

CREATE TABLE `EXISTINGCOLOR` (
  `IDPROD` int(11) NOT NULL,
  `NAMECOLOR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `EXISTINGCOLOR`
--

INSERT INTO `EXISTINGCOLOR` (`IDPROD`, `NAMECOLOR`) VALUES
(1, 'Bleu'),
(1, 'rouge'),
(2, 'orange'),
(2, 'vert'),
(4, 'jaune'),
(11, 'Bleu'),
(13, 'orange');

-- --------------------------------------------------------

--
-- Table structure for table `EXISTINGSIZE`
--

CREATE TABLE `EXISTINGSIZE` (
  `IDPROD` int(11) NOT NULL,
  `IDSIZE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `EXISTINGSIZE`
--

INSERT INTO `EXISTINGSIZE` (`IDPROD`, `IDSIZE`) VALUES
(1, 1),
(1, 6),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(4, 1),
(12, 1),
(12, 4),
(13, 6);

-- --------------------------------------------------------

--
-- Table structure for table `FAVORITE`
--

CREATE TABLE `FAVORITE` (
  `IDCUSTOMER` int(11) NOT NULL,
  `IDPROD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FAVORITE`
--

INSERT INTO `FAVORITE` (`IDCUSTOMER`, `IDPROD`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `PICTURE`
--

CREATE TABLE `PICTURE` (
  `PATHPICTURE` varchar(255) NOT NULL,
  `IDPROD` int(11) DEFAULT NULL,
  `ALTPICTURE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PICTURE`
--

INSERT INTO `PICTURE` (`PATHPICTURE`, `IDPROD`, `ALTPICTURE`) VALUES
('cheminVersLimageDeTest', 1, 'pull très stylé'),
('cheminVersLimageDeTest2ndVersion', 2, 'pull encore plus stylé');

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `IDPROD` int(11) NOT NULL,
  `IDCOLLECTION` int(11) DEFAULT NULL,
  `NAMEPROD` varchar(255) NOT NULL,
  `DESCRIPTIONPROD` varchar(255) DEFAULT NULL,
  `PRICEPROD` float(10,2) NOT NULL,
  `enVente` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PRODUCT`
--

INSERT INTO `PRODUCT` (`IDPROD`, `IDCOLLECTION`, `NAMEPROD`, `DESCRIPTIONPROD`, `PRICEPROD`, `enVente`) VALUES
(1, 1, 'ertyu', 'dfg', 10.00, 12),
(2, NULL, '[value-TEst]', '[value-Des]', 21.00, 1),
(3, NULL, 'nameprodTestId', 'super descripti', 100.00, 1),
(4, 1, 'name Product isnerted', 'sldfkj', 424.00, 1),
(7, 1, 'nom', 'dessss', 11.00, 1),
(8, 1, 'nom', 'dessss', 11.00, 1),
(11, 1, '???', '????smdk\n', 10.01, 1),
(12, 1, 'ertyu', 'dfg', 10.00, 1),
(13, NULL, 'Observer', 'il t\'observe', 99.00, 1),
(14, NULL, 'Add', 'sf', 10.00, 0),
(15, NULL, 'test??', 'c\'est meiux ?', 10.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCTBOUGHT`
--

CREATE TABLE `PRODUCTBOUGHT` (
  `IDPP` int(11) NOT NULL,
  `NAMECOLOR` varchar(255) NOT NULL,
  `IDPROD` int(11) NOT NULL,
  `IDSIZE` int(11) NOT NULL,
  `NUMORDER` int(11) NOT NULL,
  `QUANTITYBOUGHT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PRODUCTBOUGHT`
--

INSERT INTO `PRODUCTBOUGHT` (`IDPP`, `NAMECOLOR`, `IDPROD`, `IDSIZE`, `NUMORDER`, `QUANTITYBOUGHT`) VALUES
(2, 'rouge', 1, 2, 1, 2),
(3, 'vert', 2, 3, 1, 1),
(4, 'rouge', 1, 2, 1, 55),
(5, 'rouge', 1, 2, 1, 55),
(6, 'rouge', 1, 2, 1, 55),
(7, 'rouge', 1, 2, 1, 55),
(8, 'rouge', 1, 2, 1, 55),
(9, 'rouge', 1, 2, 1, 55),
(10, 'rouge', 1, 2, 1, 55),
(11, 'rouge', 1, 2, 1, 55);

-- --------------------------------------------------------

--
-- Table structure for table `STOCKED`
--

CREATE TABLE `STOCKED` (
  `IDPROD` int(11) NOT NULL,
  `NAMECOLOR` varchar(255) NOT NULL,
  `IDSIZE` int(11) NOT NULL,
  `QUANTITYSTOCKED` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `STOCKED`
--

INSERT INTO `STOCKED` (`IDPROD`, `NAMECOLOR`, `IDSIZE`, `QUANTITYSTOCKED`) VALUES
(1, 'rouge', 2, 14),
(1, 'rouge', 3, 100),
(1, 'rouge', 4, 100),
(2, 'jaune', 2, 50),
(2, 'orange', 2, 10),
(2, 'vert', 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `TAG`
--

CREATE TABLE `TAG` (
  `idtag` int(11) NOT NULL,
  `nametag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TAG`
--

INSERT INTO `TAG` (`idtag`, `nametag`) VALUES
(1, 'pull'),
(2, 't-shirt'),
(3, 'autreXd'),
(4, 'observer');

-- --------------------------------------------------------

--
-- Table structure for table `TAGS_PRODUCT`
--

CREATE TABLE `TAGS_PRODUCT` (
  `IDPROD` int(11) NOT NULL,
  `IDTAG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TAGS_PRODUCT`
--

INSERT INTO `TAGS_PRODUCT` (`IDPROD`, `IDTAG`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(3, 1),
(8, 1),
(11, 1),
(13, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CART`
--
ALTER TABLE `CART`
  ADD PRIMARY KEY (`IDCUSTOMER`,`IDPROD`),
  ADD KEY `FK_CART2` (`IDPROD`);

--
-- Indexes for table `CLOTH_SIZE`
--
ALTER TABLE `CLOTH_SIZE`
  ADD PRIMARY KEY (`IDSIZE`);

--
-- Indexes for table `CMD`
--
ALTER TABLE `CMD`
  ADD PRIMARY KEY (`NUMORDER`),
  ADD KEY `FK_ORDERED` (`IDCUSTOMER`);

--
-- Indexes for table `COLLECTION`
--
ALTER TABLE `COLLECTION`
  ADD PRIMARY KEY (`IDCOLLECTION`),
  ADD KEY `FK_REPRESENTATIONOF` (`PATHPICTURE`);

--
-- Indexes for table `COLOR`
--
ALTER TABLE `COLOR`
  ADD PRIMARY KEY (`NAMECOLOR`);

--
-- Indexes for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD PRIMARY KEY (`IDCUSTOMER`),
  ADD UNIQUE KEY `MAIL_ADDRESS` (`MAIL_ADDRESS`);

--
-- Indexes for table `EXISTINGCOLOR`
--
ALTER TABLE `EXISTINGCOLOR`
  ADD PRIMARY KEY (`IDPROD`,`NAMECOLOR`),
  ADD KEY `FK_EXISTINGCOLOR2` (`NAMECOLOR`);

--
-- Indexes for table `EXISTINGSIZE`
--
ALTER TABLE `EXISTINGSIZE`
  ADD PRIMARY KEY (`IDPROD`,`IDSIZE`),
  ADD KEY `FK_EXISTINGSIZE2` (`IDSIZE`);

--
-- Indexes for table `FAVORITE`
--
ALTER TABLE `FAVORITE`
  ADD PRIMARY KEY (`IDCUSTOMER`,`IDPROD`),
  ADD KEY `FK_FAVORITE2` (`IDPROD`);

--
-- Indexes for table `PICTURE`
--
ALTER TABLE `PICTURE`
  ADD PRIMARY KEY (`PATHPICTURE`),
  ADD KEY `FK_LOOKS_LIKE` (`IDPROD`);

--
-- Indexes for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD PRIMARY KEY (`IDPROD`),
  ADD KEY `FK_PARTOF` (`IDCOLLECTION`);

--
-- Indexes for table `PRODUCTBOUGHT`
--
ALTER TABLE `PRODUCTBOUGHT`
  ADD PRIMARY KEY (`IDPP`),
  ADD KEY `FK_BOUGHT` (`NUMORDER`),
  ADD KEY `FK_COLORCHOOSEN` (`NAMECOLOR`),
  ADD KEY `FK_SIZECHOOSEN` (`IDSIZE`),
  ADD KEY `FK_SOLDPROD` (`IDPROD`);

--
-- Indexes for table `STOCKED`
--
ALTER TABLE `STOCKED`
  ADD PRIMARY KEY (`IDPROD`,`NAMECOLOR`,`IDSIZE`),
  ADD KEY `Fk_STocked` (`IDSIZE`),
  ADD KEY `Fk2_STocked` (`NAMECOLOR`);

--
-- Indexes for table `TAG`
--
ALTER TABLE `TAG`
  ADD PRIMARY KEY (`idtag`);

--
-- Indexes for table `TAGS_PRODUCT`
--
ALTER TABLE `TAGS_PRODUCT`
  ADD PRIMARY KEY (`IDPROD`,`IDTAG`),
  ADD KEY `Fk2_TAGS_PRODUCT` (`IDTAG`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CLOTH_SIZE`
--
ALTER TABLE `CLOTH_SIZE`
  MODIFY `IDSIZE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `CMD`
--
ALTER TABLE `CMD`
  MODIFY `NUMORDER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `COLLECTION`
--
ALTER TABLE `COLLECTION`
  MODIFY `IDCOLLECTION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  MODIFY `IDCUSTOMER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `IDPROD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `PRODUCTBOUGHT`
--
ALTER TABLE `PRODUCTBOUGHT`
  MODIFY `IDPP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `TAG`
--
ALTER TABLE `TAG`
  MODIFY `idtag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `EXISTINGCOLOR`
--
ALTER TABLE `EXISTINGCOLOR`
  ADD CONSTRAINT `Fk2_EXISTINGCOLOR` FOREIGN KEY (`NAMECOLOR`) REFERENCES `COLOR` (`NAMECOLOR`),
  ADD CONSTRAINT `Fk2_existing_color` FOREIGN KEY (`IDPROD`) REFERENCES `PRODUCT` (`IDPROD`),
  ADD CONSTRAINT `Fk_EXISTINGCOLOR` FOREIGN KEY (`IDPROD`) REFERENCES `PRODUCT` (`IDPROD`);

--
-- Constraints for table `EXISTINGSIZE`
--
ALTER TABLE `EXISTINGSIZE`
  ADD CONSTRAINT `Fk2_existing_size` FOREIGN KEY (`IDSIZE`) REFERENCES `CLOTH_SIZE` (`IDSIZE`),
  ADD CONSTRAINT `Fk_existing_size` FOREIGN KEY (`IDPROD`) REFERENCES `PRODUCT` (`IDPROD`);

--
-- Constraints for table `FAVORITE`
--
ALTER TABLE `FAVORITE`
  ADD CONSTRAINT `Fk1_favorite` FOREIGN KEY (`IDPROD`) REFERENCES `PRODUCT` (`IDPROD`),
  ADD CONSTRAINT `Fk2_favorite` FOREIGN KEY (`IDCUSTOMER`) REFERENCES `CUSTOMER` (`IDCUSTOMER`);

--
-- Constraints for table `PICTURE`
--
ALTER TABLE `PICTURE`
  ADD CONSTRAINT `Fk_picture` FOREIGN KEY (`IDPROD`) REFERENCES `PRODUCT` (`IDPROD`);

--
-- Constraints for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD CONSTRAINT `Fk_product` FOREIGN KEY (`IDCOLLECTION`) REFERENCES `COLLECTION` (`IDCOLLECTION`);

--
-- Constraints for table `PRODUCTBOUGHT`
--
ALTER TABLE `PRODUCTBOUGHT`
  ADD CONSTRAINT `Fk3_EXISTINGCOLOR` FOREIGN KEY (`IDSIZE`) REFERENCES `CLOTH_SIZE` (`IDSIZE`),
  ADD CONSTRAINT `Fk4_EXISTINGCOLOR` FOREIGN KEY (`NAMECOLOR`) REFERENCES `COLOR` (`NAMECOLOR`),
  ADD CONSTRAINT `Fk5_EXISTINGCOLOR` FOREIGN KEY (`IDPROD`) REFERENCES `PRODUCT` (`IDPROD`),
  ADD CONSTRAINT `Fk6_EXISTINGCOLOR` FOREIGN KEY (`NUMORDER`) REFERENCES `CMD` (`NUMORDER`);

--
-- Constraints for table `STOCKED`
--
ALTER TABLE `STOCKED`
  ADD CONSTRAINT `Fk2_STocked` FOREIGN KEY (`NAMECOLOR`) REFERENCES `COLOR` (`NAMECOLOR`),
  ADD CONSTRAINT `Fk3_STocked` FOREIGN KEY (`IDPROD`) REFERENCES `PRODUCT` (`IDPROD`),
  ADD CONSTRAINT `Fk_STocked` FOREIGN KEY (`IDSIZE`) REFERENCES `CLOTH_SIZE` (`IDSIZE`);

--
-- Constraints for table `TAGS_PRODUCT`
--
ALTER TABLE `TAGS_PRODUCT`
  ADD CONSTRAINT `Fk2_TAGS_PRODUCT` FOREIGN KEY (`IDTAG`) REFERENCES `TAG` (`idtag`),
  ADD CONSTRAINT `Fk_TAGS_PRODUCT` FOREIGN KEY (`IDPROD`) REFERENCES `PRODUCT` (`IDPROD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
