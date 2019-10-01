-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2019 at 08:54 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shan_distributers`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `intCid` int(11) NOT NULL,
  `varCFName` varchar(150) NOT NULL,
  `varVNIC` varchar(45) NOT NULL,
  `varAddLine1` varchar(100) NOT NULL,
  `varAddLine2` varchar(100) NOT NULL,
  `varAddLine3` varchar(100) NOT NULL,
  `varContactNo` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `intEmpID` int(11) NOT NULL,
  `varEmpFname` varchar(75) NOT NULL,
  `varEmpMName` varchar(75) NOT NULL,
  `varEmpLname` varchar(75) NOT NULL,
  `varEmpNIC` varchar(25) NOT NULL,
  `varDrivingLisenceNo` varchar(45) DEFAULT NULL,
  `varEmpAddL1` varchar(75) NOT NULL,
  `varEmpAddL2` varchar(75) NOT NULL,
  `varEmpAddL3` varchar(75) NOT NULL,
  `varEmpContactNoM` varchar(15) NOT NULL,
  `varEmpContactNoH` varchar(15) DEFAULT NULL,
  `gender` varchar(7) NOT NULL,
  `image` varchar(150) NOT NULL,
  `dateJoinedDate` date NOT NULL,
  `empIsActive` tinyint(1) NOT NULL DEFAULT '1',
  `varDescription` varchar(250) DEFAULT NULL,
  `jobCateogory_intJobCategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`intEmpID`, `varEmpFname`, `varEmpMName`, `varEmpLname`, `varEmpNIC`, `varDrivingLisenceNo`, `varEmpAddL1`, `varEmpAddL2`, `varEmpAddL3`, `varEmpContactNoM`, `varEmpContactNoH`, `gender`, `image`, `dateJoinedDate`, `empIsActive`, `varDescription`, `jobCateogory_intJobCategoryID`) VALUES
(1, 'Dhanushka', 'Randima', 'Kumanayake', '903073730V', NULL, 'Dhammasaragama', 'Galkulama', 'Anuradhapura', '0174292635', '0253893793', 'Male', '', '2019-09-11', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobcateogory`
--

CREATE TABLE `jobcateogory` (
  `intJobCategoryID` int(11) NOT NULL,
  `varJobCategoryName` varchar(75) NOT NULL,
  `varDesignation` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobcateogory`
--

INSERT INTO `jobcateogory` (`intJobCategoryID`, `varJobCategoryName`, `varDesignation`) VALUES
(1, 'IT', 'Software Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `intLid` int(11) NOT NULL,
  `datePerfomedDate` date NOT NULL,
  `timePerformedTime` time NOT NULL,
  `varDescription` varchar(250) DEFAULT NULL,
  `varPerformAction` varchar(45) NOT NULL,
  `booleanActionStatus` tinyint(1) NOT NULL,
  `user_intUid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `main_stock`
--

CREATE TABLE `main_stock` (
  `intSid` int(11) NOT NULL,
  `varItemName` varchar(50) NOT NULL,
  `intAmount` int(11) NOT NULL DEFAULT '0',
  `varDescription` varchar(150) DEFAULT NULL,
  `Purpose_intPurposeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `main_stock_has_sales_details`
--

CREATE TABLE `main_stock_has_sales_details` (
  `Main_Stock_intSid` int(11) NOT NULL,
  `sales_details_intSID` int(11) NOT NULL,
  `Main_Stock_has_sales_detailscol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `main_stock_has_stock_in_vehicle`
--

CREATE TABLE `main_stock_has_stock_in_vehicle` (
  `Main_Stock_intSid` int(11) NOT NULL,
  `stock_in_vehicle_intIdvehicle_Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `intProductId` int(11) NOT NULL,
  `varProductCategory` varchar(45) NOT NULL,
  `varProductName` varchar(45) NOT NULL,
  `doubleUnitPrice` double NOT NULL,
  `Main_Stock_intSid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_has_vendor`
--

CREATE TABLE `product_has_vendor` (
  `product_intProductId` int(11) NOT NULL,
  `Vendor_intVendorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE `purpose` (
  `intPurposeID` int(11) NOT NULL,
  `varPurpose` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `intSID` int(11) NOT NULL,
  `varItemName` varchar(100) DEFAULT NULL,
  `intQuantity` int(11) DEFAULT NULL,
  `dateSalesDate` date DEFAULT NULL,
  `timeSaleTime` time DEFAULT NULL,
  `intSaleDoneBy` int(11) DEFAULT NULL,
  `customer_intCid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock_in_vehicle`
--

CREATE TABLE `stock_in_vehicle` (
  `intIdvehicle_Stock` int(11) NOT NULL,
  `varVSItemName` varchar(5) NOT NULL,
  `intVSAmount` int(11) NOT NULL,
  `varVSDescription` varchar(150) DEFAULT NULL,
  `vehicle_varVehicleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock_in_vehicle_has_sales_details`
--

CREATE TABLE `stock_in_vehicle_has_sales_details` (
  `stock_in_vehicle_intIdvehicle_Stock` int(11) NOT NULL,
  `sales_details_intSID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `intUid` int(11) NOT NULL,
  `passWord` varchar(150) NOT NULL,
  `varEmail` varchar(100) NOT NULL,
  `employee_intEmpID` int(11) NOT NULL,
  `dateCreatedDate` date NOT NULL,
  `intCreatedBy` int(11) NOT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `DateUpdatedDate` date DEFAULT NULL,
  `intUpdatedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`intUid`, `passWord`, `varEmail`, `employee_intEmpID`, `dateCreatedDate`, `intCreatedBy`, `isActive`, `DateUpdatedDate`, `intUpdatedBy`) VALUES
(1, '4cc19aaff82f60ac4097f935ab4a06ad4f0891cc', 'rdhanushka5@gmail.com', 1, '2019-10-01', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `varVehicleId` int(11) NOT NULL,
  `varVehicleNo` varchar(15) NOT NULL,
  `varVehicleIsActive` binary(1) NOT NULL DEFAULT '1',
  `intFuelCapacity` int(11) NOT NULL,
  `varDescription` varchar(250) DEFAULT NULL,
  `employee_intEmpID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `intVendorID` int(11) NOT NULL,
  `varVName` varchar(150) NOT NULL,
  `varAddLine1` varchar(100) NOT NULL,
  `varAddLine2` varchar(100) NOT NULL,
  `varAddLine3` varchar(100) NOT NULL,
  `varContactNo` varchar(11) NOT NULL,
  `varEmaiAdd` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`intCid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`intEmpID`),
  ADD KEY `fk_employee_jobCateogory1_idx` (`jobCateogory_intJobCategoryID`);

--
-- Indexes for table `jobcateogory`
--
ALTER TABLE `jobcateogory`
  ADD PRIMARY KEY (`intJobCategoryID`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`intLid`),
  ADD KEY `fk_log_user1_idx` (`user_intUid`);

--
-- Indexes for table `main_stock`
--
ALTER TABLE `main_stock`
  ADD PRIMARY KEY (`intSid`),
  ADD KEY `fk_Main_Stock_Purpose1_idx` (`Purpose_intPurposeID`);

--
-- Indexes for table `main_stock_has_sales_details`
--
ALTER TABLE `main_stock_has_sales_details`
  ADD PRIMARY KEY (`Main_Stock_intSid`,`sales_details_intSID`),
  ADD KEY `fk_Main_Stock_has_sales_details_sales_details1_idx` (`sales_details_intSID`),
  ADD KEY `fk_Main_Stock_has_sales_details_Main_Stock1_idx` (`Main_Stock_intSid`);

--
-- Indexes for table `main_stock_has_stock_in_vehicle`
--
ALTER TABLE `main_stock_has_stock_in_vehicle`
  ADD PRIMARY KEY (`Main_Stock_intSid`,`stock_in_vehicle_intIdvehicle_Stock`),
  ADD KEY `fk_Main_Stock_has_stock_in_vehicle_stock_in_vehicle1_idx` (`stock_in_vehicle_intIdvehicle_Stock`),
  ADD KEY `fk_Main_Stock_has_stock_in_vehicle_Main_Stock1_idx` (`Main_Stock_intSid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`intProductId`),
  ADD KEY `fk_product_Main_Stock1_idx` (`Main_Stock_intSid`);

--
-- Indexes for table `product_has_vendor`
--
ALTER TABLE `product_has_vendor`
  ADD PRIMARY KEY (`product_intProductId`,`Vendor_intVendorID`),
  ADD KEY `fk_product_has_Vendor_Vendor1_idx` (`Vendor_intVendorID`),
  ADD KEY `fk_product_has_Vendor_product1_idx` (`product_intProductId`);

--
-- Indexes for table `purpose`
--
ALTER TABLE `purpose`
  ADD PRIMARY KEY (`intPurposeID`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`intSID`),
  ADD KEY `fk_sales_details_customer1_idx` (`customer_intCid`);

--
-- Indexes for table `stock_in_vehicle`
--
ALTER TABLE `stock_in_vehicle`
  ADD PRIMARY KEY (`intIdvehicle_Stock`),
  ADD KEY `fk_vehicle_Stock_vehicle1_idx` (`vehicle_varVehicleId`);

--
-- Indexes for table `stock_in_vehicle_has_sales_details`
--
ALTER TABLE `stock_in_vehicle_has_sales_details`
  ADD PRIMARY KEY (`stock_in_vehicle_intIdvehicle_Stock`,`sales_details_intSID`),
  ADD KEY `fk_stock_in_vehicle_has_sales_details_sales_details1_idx` (`sales_details_intSID`),
  ADD KEY `fk_stock_in_vehicle_has_sales_details_stock_in_vehicle1_idx` (`stock_in_vehicle_intIdvehicle_Stock`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`intUid`,`employee_intEmpID`),
  ADD KEY `fk_user_employee1_idx` (`employee_intEmpID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`varVehicleId`),
  ADD KEY `fk_vehicle_employee1_idx` (`employee_intEmpID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`intVendorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `intCid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `intEmpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobcateogory`
--
ALTER TABLE `jobcateogory`
  MODIFY `intJobCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `intLid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_stock`
--
ALTER TABLE `main_stock`
  MODIFY `intSid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `intProductId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purpose`
--
ALTER TABLE `purpose`
  MODIFY `intPurposeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `intSID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_in_vehicle`
--
ALTER TABLE `stock_in_vehicle`
  MODIFY `intIdvehicle_Stock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `intUid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `varVehicleId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `intVendorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_jobCateogory1` FOREIGN KEY (`jobCateogory_intJobCategoryID`) REFERENCES `jobcateogory` (`intJobCategoryID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_log_user1` FOREIGN KEY (`user_intUid`) REFERENCES `user` (`intUid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `main_stock`
--
ALTER TABLE `main_stock`
  ADD CONSTRAINT `fk_Main_Stock_Purpose1` FOREIGN KEY (`Purpose_intPurposeID`) REFERENCES `purpose` (`intPurposeID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `main_stock_has_sales_details`
--
ALTER TABLE `main_stock_has_sales_details`
  ADD CONSTRAINT `fk_Main_Stock_has_sales_details_Main_Stock1` FOREIGN KEY (`Main_Stock_intSid`) REFERENCES `main_stock` (`intSid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Main_Stock_has_sales_details_sales_details1` FOREIGN KEY (`sales_details_intSID`) REFERENCES `sales_details` (`intSID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `main_stock_has_stock_in_vehicle`
--
ALTER TABLE `main_stock_has_stock_in_vehicle`
  ADD CONSTRAINT `fk_Main_Stock_has_stock_in_vehicle_Main_Stock1` FOREIGN KEY (`Main_Stock_intSid`) REFERENCES `main_stock` (`intSid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Main_Stock_has_stock_in_vehicle_stock_in_vehicle1` FOREIGN KEY (`stock_in_vehicle_intIdvehicle_Stock`) REFERENCES `stock_in_vehicle` (`intIdvehicle_Stock`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_Main_Stock1` FOREIGN KEY (`Main_Stock_intSid`) REFERENCES `main_stock` (`intSid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_has_vendor`
--
ALTER TABLE `product_has_vendor`
  ADD CONSTRAINT `fk_product_has_Vendor_Vendor1` FOREIGN KEY (`Vendor_intVendorID`) REFERENCES `vendor` (`intVendorID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_has_Vendor_product1` FOREIGN KEY (`product_intProductId`) REFERENCES `product` (`intProductId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD CONSTRAINT `fk_sales_details_customer1` FOREIGN KEY (`customer_intCid`) REFERENCES `customer` (`intCid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stock_in_vehicle`
--
ALTER TABLE `stock_in_vehicle`
  ADD CONSTRAINT `fk_vehicle_Stock_vehicle1` FOREIGN KEY (`vehicle_varVehicleId`) REFERENCES `vehicle` (`varVehicleId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stock_in_vehicle_has_sales_details`
--
ALTER TABLE `stock_in_vehicle_has_sales_details`
  ADD CONSTRAINT `fk_stock_in_vehicle_has_sales_details_sales_details1` FOREIGN KEY (`sales_details_intSID`) REFERENCES `sales_details` (`intSID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stock_in_vehicle_has_sales_details_stock_in_vehicle1` FOREIGN KEY (`stock_in_vehicle_intIdvehicle_Stock`) REFERENCES `stock_in_vehicle` (`intIdvehicle_Stock`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_employee1` FOREIGN KEY (`employee_intEmpID`) REFERENCES `employee` (`intEmpID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `fk_vehicle_employee1` FOREIGN KEY (`employee_intEmpID`) REFERENCES `employee` (`intEmpID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
