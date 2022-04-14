--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `item_num` int(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` decimal(65,2) DEFAULT NULL,
  `item_quantity` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_num`, `item_name`, `item_price`, `item_quantity`) VALUES
(1, 'Samsung S21', '899.99', 7),
(2, 'Wireless Charger', '19.99', 20),
(3, 'Samsung S21 Case', '9.99', 50),
(4, 'Woosh! Screen Cleaner', '25.99', 10);
COMMIT;