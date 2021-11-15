-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 29, 2021 at 09:08 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duynguyenhairsalon`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `UserName` varchar(15) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `quyen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`UserName`, `Password`, `quyen`) VALUES
('+84829764659', '141220', NULL),
('+84973271208', '141220', NULL),
('+84974174629', '141220', NULL),
('+84978679717', '141220', NULL),
('0353770140', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin'),
('0394684487', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `ID_Bill` varchar(20) NOT NULL,
  `Date_Bill` datetime NOT NULL,
  `Sum_Money_Bill` int(11) NOT NULL,
  `Shipping_Fee` int(11) NOT NULL,
  `Delivery_Address` varchar(250) NOT NULL,
  `Specific_Delivery_Address` varchar(500) NOT NULL,
  `Fast_Delivery` tinyint(1) NOT NULL,
  `Is_Successful` tinyint(1) NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`ID_Bill`, `Date_Bill`, `Sum_Money_Bill`, `Shipping_Fee`, `Delivery_Address`, `Specific_Delivery_Address`, `Fast_Delivery`, `Is_Successful`, `ID_User`) VALUES
('B1630143844', '2021-08-28 16:44:04', 3850000, 0, '[\"268\",\"1826\",\"220404\"]', 'Xóm 4, Thiết Trụ', 0, 0, 11),
('B2172181555326', '2021-07-02 18:15:55', 338000, 30000, 'Xã Bình Minh, Huyện Khoái Châu, Hưng Yên', '0', 1, 0, 7),
('B217294216849', '2021-07-02 09:42:16', 770000, 0, 'Xã Bình Minh, Huyện Khoái Châu, Hưng Yên', '0', 0, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `descriptionbill`
--

CREATE TABLE `descriptionbill` (
  `Amount` int(11) NOT NULL,
  `ID_Bill` varchar(20) NOT NULL,
  `ID_Product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `descriptionbill`
--

INSERT INTO `descriptionbill` (`Amount`, `ID_Bill`, `ID_Product`) VALUES
(2, 'B1630143844', 1),
(7, 'B1630143844', 2),
(1, 'B2172181555326', 1),
(1, 'B217294216849', 1),
(1, 'B217294216849', 2);

-- --------------------------------------------------------

--
-- Table structure for table `descriptioncart`
--

CREATE TABLE `descriptioncart` (
  `Amount` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_Product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `descriptioncart`
--

INSERT INTO `descriptioncart` (`Amount`, `ID_User`, `ID_Product`) VALUES
(1, 5, 1),
(4, 6, 1),
(1, 6, 2),
(9, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `descriptiontask`
--

CREATE TABLE `descriptiontask` (
  `ID_Task` varchar(20) NOT NULL,
  `ID_Service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `descriptiontask`
--

INSERT INTO `descriptiontask` (`ID_Task`, `ID_Service`) VALUES
('T217216222252', 1),
('1629642400', 2),
('1629642431', 1),
('1629642473', 1),
('1629644307', 1),
('1629970498', 1),
('1629970498', 7),
('1629970498', 10),
('1629970498', 13),
('1629970498', 14),
('1629970498', 15),
('1630145858', 1);

-- --------------------------------------------------------

--
-- Table structure for table `producer`
--

CREATE TABLE `producer` (
  `ID_Producer` varchar(20) NOT NULL,
  `Name_Brand` varchar(50) NOT NULL,
  `Origin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producer`
--

INSERT INTO `producer` (`ID_Producer`, `Name_Brand`, `Origin`) VALUES
('Davines', 'Davines', 'Ý'),
('Dr.Sante', 'Dr.Sante', 'Đông Âu'),
('Etiaxil', 'Etiaxil', 'Pháp'),
('Farcom', 'Farcom', 'Đông Âu'),
('Orzen', 'Orzen', 'Hàn Quốc'),
('Paul Mitchell', 'Paul Mitchell', 'Hàn Quốc'),
('TIGI', 'TIGI', 'Mỹ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID_Product` int(11) NOT NULL,
  `Name_Product` varchar(100) NOT NULL,
  `Price_Product` int(11) NOT NULL,
  `Amount_Product` int(11) NOT NULL,
  `Info_Product` text NOT NULL,
  `Description_Product` text NOT NULL,
  `Using_Product` text NOT NULL,
  `Image_Product` text DEFAULT NULL,
  `ID_SpeciesProduct` int(11) NOT NULL,
  `ID_Producer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID_Product`, `Name_Product`, `Price_Product`, `Amount_Product`, `Info_Product`, `Description_Product`, `Using_Product`, `Image_Product`, `ID_SpeciesProduct`, `ID_Producer`) VALUES
(1, 'Dầu Gội Làm Sạch Và Điều Tiết Bã Nhờn Etiaxil Deo-Douche 24H 150ML', 308000, 100, 'Sản phẩm mới Etiaxil Deo-Shampoo nhẹ nhàng làm sạch da đầu và điều tiết bã nhờn bằng cách sử dụng muối kẽm, cân bằng lại hệ vi sinh vật trên da, khử mùi hôi.', 'Công Dụng:\r\n- Detox & cân bằng hệ sinh thái da đầu, ngăn ngừa tình trạng bết - nhờn - dính\r\n- Tiêu diệt vi khuẩn, mảng bám trên da, cải thiện mùi hôi da đầu.\r\n- Ngừa nấm da đầu & cải thiện tình trạng rụng tóc\r\nCông dụng lên đến 24h\r\n\r\nThành Phần:\r\n- Muối Zinc PCA: có công dụng kháng khuẩn, giảm tiết bã nhờn và trung hòa mùi cơ thể.\r\n- Phức hợp probiotic: có chứa Lactococcus Lactis-một loại lợi khuẩn cho da; giúp cải thiện hàng rào bảo vệ, kết nối giữa các tế bào, ức chế hại khuẩn gây mùi...\r\n- Chiết xuất dầu dừa: cấp ẩm cho da, tăng mức kháng khuẩn, làm mềm mịn và sạch da.\r\n- Phức hợp Fluidipure TM: là hỗn hợp đường và Glycerin Biovector tác động lên các vi khuẩn chịu trách nhiệm về mùi hôi và bã nhờn, cân bằng hệ khuẩn trên da đầu, chống mẩn ngứa, đỏ tấy. Bảo vệ acid thiên nhiên trên da đầu và các vi sinh vật trên da.', 'HDSD: Làm ướt tóc và da đầu, lấy 1 lượng vừa đủ ra tay và thoa đều khắp đầu tạo bọt, massage nhẹ nhàng. Gội sạch lại với nước.\r\nDùng 2-3 lần/ tuần', 'product1.jpg', 1, 'Etiaxil'),
(2, 'Xịt Dưỡng Tóc Davines Nourishing Keratin Sealer 100ml', 462000, 100, 'Dung dịch đóng chặt biểu bì dành cho tóc khô và tóc hư tổn.', 'NOURISHING KERATIN SEALER\r\nDung dịch đóng chặt biểu bì dành cho tóc khô và tóc hư tổn.\r\nDung dịch xả khô nuôi dưỡng bảo vệ giúp đóng chặt biểu bì, tăng cường độ bóng sáng và mềm mượt.\r\nTăng cường cấu trúc tóc, chống việc hình thành chẻ ngọn.\r\n\r\nCông thức vô cùng nhẹ, giàu Keratin Thực vật và amino axit, giúp khoá chặt các dưỡng chất (kể cả từ các bước trị liệu trước đó) ở bên trong sợi tóc lâu dài, cũng như đảm bảo độ bóng và mềm tối đa mà không làm nặng tóc.', 'Xịt đều lên tóc đã gội sạch & thấm khô bằng khăn bông, có thể dùng lược để phân bổ sản phẩm đều lên tóc. Tiếp tục các bước tạo kiểu tiếp theo.', 'product2.jpg', 1, 'Davines');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ID_Service` int(11) NOT NULL,
  `Name_Service` varchar(100) NOT NULL,
  `Description_Service` varchar(200) NOT NULL,
  `Price_Service` int(11) NOT NULL,
  `ID_Species` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ID_Service`, `Name_Service`, `Description_Service`, `Price_Service`, `ID_Species`) VALUES
(1, 'Combo cắt gội 10 bước', 'Combo Cắt - Gội - Thư giãn 10 bước cơ bản', 80000, 1),
(2, 'Cắt xả', 'Cắt xả nhanh không gội, massage. Tiết kiệm thời gian', 70000, 1),
(3, 'Vip combo cắt gội', 'Combo 10 bước kèm các dịch vụ chăm sóc grooming cao cấp', 199000, 1),
(4, 'Kid combo', 'Combo cắt gội riêng cho bé (mỹ phẩm riêng cho trẻ em)', 70000, 1),
(5, 'Gội massage dưỡng sinh vuốt tạo kiểu', 'Áp dụng Y học cổ truyền, bấm huyệt chữa mỏi vai gáy', 40000, 1),
(6, 'Uốn cao cấp Hàn Quốc', 'Sử dụng thuốc uốn ATS cao cấp từ Hàn Quốc, bổ sung Amino Axit giảm thiểu tối đa tổn thương tóc.', 349000, 2),
(7, 'Uốn tiêu chuẩn', 'Thuốc uốn tiêu chuẩn nhập khẩu Hàn Quốc, tạo sóng tóc căng bóng.', 260000, 2),
(8, 'Hấp dưỡng tiêu chuẩn OLIU', 'Giúp tóc bóng mượt, chắc khỏe từ sâu bên trong.', 119000, 2),
(9, 'Phục hồi nano', 'Hấp dưỡng kết hợp súng tinh chất Nano ngấm sâu giúp tóc chắc khỏe, suôn mượt.', 159000, 2),
(10, 'Nhuộm phủ bạc thảo dược', 'Giúp tóc đen bóng, da đầu chắc khỏe, trẻ trung.', 180000, 3),
(11, 'Nhuộm màu cơ bản', 'Các màu không cần tẩy: tông nâu đỏ, nâu vàng, rượu vang.(Nâu đen, Nâu nhiệt đới, Nâu tự nhiên, Nâu ánh vàng).', 249000, 3),
(12, 'Nhuộm màu thời trang nổi bật', 'Nhuộm các màu sáng, màu khói. có thể cần tẩy tóc (100K/lần tẩy)\r\n(Xanh đen, Nâu rêu trầm, Nâu rêu, Nâu rêu sáng, Khói nhạt, Xám khói trầm, Xám khói, Xám khói sáng).', 289000, 3),
(13, 'Lấy ráy tai', 'Quy trình chuyên nghiệp, an toàn, dụng cụ sử dụng 1 lần.', 30000, 4),
(14, 'Đắp mặt nạ', 'Mặt nạ dưỡng chất làm sáng, sạch da.', 20000, 4),
(15, 'Tẩy da chết sủi bọt', 'Loại bỏ bụi bẩn, bã nhờn sâu bên trong giúp da sáng khỏe.', 25000, 4),
(16, 'Lấy mụ bằng que gạt', 'Sử dụng mĩ phẩm đẩy mụn kết hợp que gạt(sử dụng 1 lần) lấy nhấn mụn.', 30000, 4),
(17, 'Lột mụn than tre', 'Thành phần chính là than tre hoạt tính, lột sạch mụn đầu đen.', 30000, 4),
(18, 'Giường massage Nhật Bản', 'Công nghệ S trank Nhật Bản với 4 trục đấm, bóp, di huyệt thiết kế riêng cho người Châu Á', 20000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `speciesproduct`
--

CREATE TABLE `speciesproduct` (
  `ID_SpeciesProduct` int(11) NOT NULL,
  `Name_SpeciesProduct` varchar(50) NOT NULL,
  `Image_SpeciesProduct` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `speciesproduct`
--

INSERT INTO `speciesproduct` (`ID_SpeciesProduct`, `Name_SpeciesProduct`, `Image_SpeciesProduct`) VALUES
(1, 'Chăm sóc tóc', 'products_1_icon_1.jpg'),
(2, 'Chăm sóc da', 'products_1_icon_1.jpg'),
(3, 'Nước hoa', 'products_1_icon_1.jpg'),
(4, 'Tạo kiểu tóc', 'products_1_icon_1.jpg'),
(5, 'Phụ kiện', 'products_1_icon_1.jpg'),
(6, 'Chăm sóc cơ thể', 'products_1_icon_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `speciesservice`
--

CREATE TABLE `speciesservice` (
  `ID_Species` int(11) NOT NULL,
  `Name_Species` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `speciesservice`
--

INSERT INTO `speciesservice` (`ID_Species`, `Name_Species`) VALUES
(1, 'Cắt Gội Massage'),
(2, 'Uốn'),
(3, 'Nhuộm'),
(4, 'Dịch vụ khác');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `ID_Task` varchar(20) NOT NULL,
  `Date_Task` datetime NOT NULL,
  `Sum_Money_Task` int(11) NOT NULL,
  `Is_Save_Photo` tinyint(1) NOT NULL,
  `Is_Consulting` tinyint(1) NOT NULL,
  `Is_Successful_Task` tinyint(1) NOT NULL,
  `Service_Free` text NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`ID_Task`, `Date_Task`, `Sum_Money_Task`, `Is_Save_Photo`, `Is_Consulting`, `Is_Successful_Task`, `Service_Free`, `ID_User`) VALUES
('1629642400', '2021-08-23 10:00:00', 70000, 1, 1, 0, '[\"Bỏ bớt thời gian gội, cắt sớm\"]', 9),
('1629642431', '2021-08-23 14:30:00', 80000, 1, 1, 0, '[\"Bỏ bớt thời gian gội, cắt sớm\",\"Da dễ kích ứng\"]', 9),
('1629642473', '2021-08-23 09:30:00', 80000, 1, 1, 0, '[]', 9),
('1629644307', '2021-08-24 16:30:00', 80000, 1, 1, 0, '[\"Bỏ bớt thời gian gội, cắt sớm\",\"Da dễ kích ứng\"]', 9),
('1629970498', '2021-08-27 16:00:00', 595000, 1, 0, 1, '[\"Bỏ bớt thời gian gội, cắt sớm\",\"Da dễ kích ứng\",\"Hỏi kỹ trước khi cắt\",\"Hướng dẫn vuốt sáp tại nhà\"]', 11),
('1630145858', '2021-08-29 10:00:00', 80000, 1, 1, 1, '[\"Bỏ bớt thời gian gội, cắt sớm\",\"Da dễ kích ứng\"]', 11),
('T217216222252', '2021-07-02 17:30:00', 80000, 1, 1, 0, '[\"Bỏ bớt thời gian gội, cắt sớm\",\"Da dễ kích ứng\",\"Hỏi kĩ trong khi cắt\",\"Hướng dẫn vuôt sáp tại nhà\",\"Tư vấn cắt tóc mới\",\"Cắt - giũa móng tay\"]', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_User` int(11) NOT NULL,
  `Name_User` varchar(30) NOT NULL,
  `Phone_Number_User` varchar(12) NOT NULL,
  `Avatar_User` varchar(10) DEFAULT NULL,
  `UserName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_User`, `Name_User`, `Phone_Number_User`, `Avatar_User`, `UserName`) VALUES
(4, 'Admin', '+84973271208', NULL, '+84973271208'),
(5, 'Chu Thị Bích Thảo', '+84974174629', NULL, '+84974174629'),
(6, 'Lê Quang Thọ', '+84829764659', NULL, '+84829764659'),
(7, 'Chưa có tên', '+84978679717', NULL, '+84978679717'),
(9, 'Khác hàng Vip', '0353770140', NULL, '0353770140'),
(11, 'Khách hàng', '0394684487', NULL, '0394684487');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`ID_Bill`),
  ADD KEY `fk_user_bill` (`ID_User`);

--
-- Indexes for table `descriptionbill`
--
ALTER TABLE `descriptionbill`
  ADD PRIMARY KEY (`ID_Bill`,`ID_Product`),
  ADD KEY `fk_bill_descriptionbill` (`ID_Bill`),
  ADD KEY `fk_product_descriptionbill` (`ID_Product`);

--
-- Indexes for table `descriptioncart`
--
ALTER TABLE `descriptioncart`
  ADD PRIMARY KEY (`ID_User`,`ID_Product`),
  ADD KEY `fk_user_cart` (`ID_User`),
  ADD KEY `fk_product_cart` (`ID_Product`);

--
-- Indexes for table `descriptiontask`
--
ALTER TABLE `descriptiontask`
  ADD KEY `fk_task_descriptionservice` (`ID_Task`),
  ADD KEY `fk_service_descriptionservice` (`ID_Service`);

--
-- Indexes for table `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`ID_Producer`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID_Product`),
  ADD KEY `fk_species_product` (`ID_SpeciesProduct`),
  ADD KEY `fk_product_producer` (`ID_Producer`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ID_Service`),
  ADD KEY `fk_species_service` (`ID_Species`);

--
-- Indexes for table `speciesproduct`
--
ALTER TABLE `speciesproduct`
  ADD PRIMARY KEY (`ID_SpeciesProduct`);

--
-- Indexes for table `speciesservice`
--
ALTER TABLE `speciesservice`
  ADD PRIMARY KEY (`ID_Species`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`ID_Task`),
  ADD KEY `fk_user_task` (`ID_User`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`),
  ADD KEY `fk_user_account` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID_Product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ID_Service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `speciesproduct`
--
ALTER TABLE `speciesproduct`
  MODIFY `ID_SpeciesProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `speciesservice`
--
ALTER TABLE `speciesservice`
  MODIFY `ID_Species` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_user_bill` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`);

--
-- Constraints for table `descriptionbill`
--
ALTER TABLE `descriptionbill`
  ADD CONSTRAINT `fk_bill_descriptionbill` FOREIGN KEY (`ID_Bill`) REFERENCES `bill` (`ID_Bill`),
  ADD CONSTRAINT `fk_product_descriptionbill` FOREIGN KEY (`ID_Product`) REFERENCES `product` (`ID_Product`);

--
-- Constraints for table `descriptioncart`
--
ALTER TABLE `descriptioncart`
  ADD CONSTRAINT `fk_product_cart` FOREIGN KEY (`ID_Product`) REFERENCES `product` (`ID_Product`),
  ADD CONSTRAINT `fk_user_cart` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`);

--
-- Constraints for table `descriptiontask`
--
ALTER TABLE `descriptiontask`
  ADD CONSTRAINT `fk_service_descriptionservice` FOREIGN KEY (`ID_Service`) REFERENCES `service` (`ID_Service`),
  ADD CONSTRAINT `fk_task_descriptionservice` FOREIGN KEY (`ID_Task`) REFERENCES `task` (`ID_Task`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_producer` FOREIGN KEY (`ID_Producer`) REFERENCES `producer` (`ID_Producer`),
  ADD CONSTRAINT `fk_species_product` FOREIGN KEY (`ID_SpeciesProduct`) REFERENCES `speciesproduct` (`ID_SpeciesProduct`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `fk_species_service` FOREIGN KEY (`ID_Species`) REFERENCES `speciesservice` (`ID_Species`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_user_task` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`UserName`) REFERENCES `account` (`UserName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
