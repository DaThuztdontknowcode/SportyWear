-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 04:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportwear`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `BrandID` int(11) NOT NULL,
  `BrandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`BrandID`, `BrandName`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Puma'),
(4, 'Reebok'),
(5, 'Ananas'),
(6, 'The North Face'),
(7, 'New Balance');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Shoes'),
(2, 'T-Shirts'),
(3, 'Tops'),
(4, 'Socks'),
(5, 'Tights'),
(6, 'Pants'),
(7, 'Jackets'),
(8, 'Headwear'),
(9, 'Bra'),
(10, 'Skirts Dresses'),
(11, 'Polo'),
(12, 'Sandals/Slippers'),
(13, 'Sweatshirt'),
(14, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `AvatarURL` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `AvatarURL`, `FirstName`, `LastName`, `Email`) VALUES
(1, 'ImgPath', 'John', 'Thanh', 'thandang03@gmail.com'),
(2, 'ImgPath', 'Jane', 'Thuc', 'thucle03@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderDetailID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `TotalPrice` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderDetailID`, `OrderID`, `ProductID`, `Quantity`, `TotalPrice`) VALUES
(1, 1, 1, 2, 199.98),
(2, 1, 2, 1, 79.99),
(3, 2, 3, 3, 149.97);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `OrderDate`) VALUES
(1, 1, '2023-11-14'),
(2, 2, '2023-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Description` text DEFAULT NULL,
  `StockQuantity` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `BrandID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `CategoryID`, `Price`, `Description`, `StockQuantity`, `image_url`, `BrandID`) VALUES
(0, '', NULL, 0.00, NULL, NULL, NULL, NULL),
(1, 'Nike Air Force 1 \'07 EasyOn', 1, 133.45, 'Colour Shown: White/White/White\nStyle: FD1146-100\nCountry/Region of Origin: Vietnam', 50, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/13721f24-2774-443e-a27d-998d2c6be068/air-force-1-07-easyon-shoes-LKXPhZ.png', 1),
(2, 'NikeCourt Legacy', 1, 85.25, 'Men\'s Shoes. Colour Shown: White/Desert Ochre/Black\nStyle: DH3162-100', 30, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/ece27fc1-1c28-43b2-ae8e-fb39db26c71c/nikecourt-legacy-shoes-PKg8wX.png', 1),
(3, 'Nike Dri-FIT Alate Coverage', 9, 48.16, 'Lightweight running shoes for long-distance runners.', 100, 'Women\'s Light-Support Padded Sports Bra. Colour Shown: Particle Beige/Particle Beige/Dusted Clay\nStyle: DM0531-207', 1),
(4, 'Nike Air Max Cirro', 12, 60.94, 'Men\'s Slides.\r\nColour Shown: Black/Black/Black\r\nStyle: DC1460-007', 100, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/29bd1060-e500-4956-a51f-4c8237e9da27/air-max-cirro-slides-96vclH.png', 1),
(5, 'Nike Victori One', 12, 36.63, 'Men\'s Slides.\r\nColour Shown: Black/Black/White\r\nStyle: CN9675-002', 150, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/77874acd-bf25-4037-bf21-9b442d1b28eb/victori-one-slides-QTTJHP.png', 1),
(6, 'Essentials Small Logo Men\'s Hoodie', 7, 45.00, 'PRODUCT STORY\r\nThis hoodie is as classic as it gets. The timeless, understated look gets an eco-friendly twist with recycled fibers and support for the Forever Better Initiative, for fashion that feels as good as it looks.\r\nFEATURES & BENEFITS\r\nContains Recycled Material: Made with recycled fibers. One of PUMA\'s answers to reduce its environmental impact.\r\nMaterial Information\r\nHOOD LINING: 100% cotton\r\nSHELL: 66% cotton, 34% polyester\r\nRIB: 97% cotton, 3% elastane', 100, 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_600,h_600/global/586690/01/fnd/PNA/fmt/png/Essentials-Small-Logo-Men\'s-Hoodie', 3),
(7, 'Riaze Prowl Rainbow Women\'s Sneakers', 1, 85.00, 'PRODUCT STORY\r\nPut some pep in your step with the classic comfort of Riaze Prowl. With a breathable upper design, extended lacing system and rainbow-colored CELL unit in the heel, the Riaze Prowl Rainbow spreads a little sunshine with every step.\r\nPut some pep in your step with the classic comfort of Riaze Prowl. With a breathable upper design, extended lacing system and rainbow-colored CELL unit in the heel, the Riaze Prowl Rainbow spreads a little sunshine with every step.\r\nStyle: 194482_01\r\nColor: Puma Black-Luminous Pink', 150, 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_600,h_600/global/194482/01/sv01/fnd/PNA/fmt/png/Riaze-Prowl-Rainbow-Women\'s-Sneakers', 3),
(8, 'ÁO TRACK JACKET CORDUROY SEASONAL ADICOLOR', 7, 111.23, 'CHIẾC ÁO TRACK JACKET MỀM MẠI VÀ THỜI THƯỢNG LÀM TỪ CHẤT LIỆU TÁI CHẾ.\r\nLền đồ theo phong cách retro-cool với chiếc áo track jacket adidas Adicolor sang chảnh làm từ chất liệu nhung tăm êm ái. Các đường viền tương phản mang đến vẻ classic và tôn lên thiết kế đậm chất cổ điển, cùng các logo Ba Lá thêu nổi tô điểm nét thể thao đặc trưng. Đựng chìa khóa và điện thoại vào các túi khóa kéo tiện lợi và thỏa sức phiêu lưu suốt ngày dài.\r\n\r\nLàm từ 100% chất liệu tái chế, sản phẩm này đại diện cho một trong số rất nhiều các giải pháp của chúng tôi hướng tới chấm dứt rác thải nhựa.', 200, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/ad05ccba9f474d598664c3f2ea9727f1_9366/Ao_Track_Jacket_Corduroy_Seasonal_Adicolor_Be_IM4433_21_model.jpg', 2),
(9, 'QUẦN CORDUROY SEASONAL ADICOLOR', 6, 90.63, 'Làm từ 100% chất liệu tái chế, sản phẩm này đại diện cho một trong số rất nhiều các giải pháp của chúng tôi hướng tới chấm dứt rác thải nhựa.\r\nDáng loose fit\r\nCạp chun có dây rút\r\nVải nhung làm từ 100% polyester tái chế\r\nCác túi khóa kéo phía trước\r\nCác túi mở phía sau\r\nMàu sản phẩm: Wonder White\r\nMã sản phẩm: IM4434', 200, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/eceb888445a444a08ece15d95c67c2cd_9366/Quan_Corduroy_Seasonal_Adicolor_Be_IM4434_21_model.jpg', 2),
(10, 'ÁO THUN 3 SỌC KỸ THUẬT', 2, 35.02, 'CHIẾC ÁO THUN COTTON MỀM MẠI MƯỢN CẢM HỨNG TỪ ÁO JERSEY CỔ ĐIỂN.\r\nVintage mà hiện đại. Với 3 Sọc nằm ngang đầy mới mẻ, chiếc áo thun này mượn cảm hứng từ áo jersey adidas cổ điển. Cảm giác mềm mại hệt như vẻ ngoài — chất vải single jersey hoàn toàn bằng cotton đảm bảo điều đó. Cổ tròn bo gân cho kiểu dáng cực chuẩn: vừa khít, dễ chịu và clasic.\r\n\r\nCác sản phẩm cotton của chúng tôi hỗ trợ ngành trồng bông bền vững hơn.', 200, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/94f7a7fa9ebe46f7b016afb601737426_9366/Ao_Thun_3_Soc_Ky_Thuat_trang_IL4702_21_model.jpg\r\n\r\nhttps://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/55bb0c5218a64', 2),
(11, 'GIÀY X_PLRBOOST', 1, 173.02, 'Làm từ một loạt chất liệu tái chế, thân giày có chứa tối thiểu 50% thành phần tái chế. Sản phẩm này đại diện cho một trong số rất nhiều các giải pháp của chúng tôi hướng tới chấm dứt rác thải nhựa.\r\nDáng regular fit\r\nCó dây giày\r\nThân giày bằng vải lưới, cao su neoprene và da lộn\r\nTorsion System\r\nĐế giữa BOOST\r\nĐế ngoài bằng cao su\r\nThân giày có chứa tối thiểu 50% thành phần tái chế\r\nMàu sản phẩm: Cloud White / Crystal White / Cloud White\r\nMã sản phẩm: HP3130', 100, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/909cd24b43ad45e19d70af56015788f0_9366/Giay_X_PLRBOOST_trang_HP3130_01_standard.jpg', 2),
(12, 'AC Milan 23/24 Big Kids\' Replica Home Jersey', 2, 75.00, 'FEATURES & BENEFITS\r\ndryCELL: Performance technology designed to wick moisture from the body and keep you free of sweat during exercise\r\nRecycled content: Made with 100% recycled material excluding trims & decorations as a step toward a better future\r\nDETAILS\r\nRegular fit\r\nCrew neck\r\nShort sleeves\r\nOfficial team crest on chest\r\nMaterial Information\r\nSHELL: 100% polyester\r\nRIB: 97% polyester, 3% elastane', 100, 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_600,h_600/global/770385/01/mod02/fnd/PNA/fmt/png/AC-Milan-23/24-Big-Kids\'-Replica-Home-Jersey\r\n\r\nhttps://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_600,h_600/global/770385/01', 3),
(13, 'PUMA x CHRISTIAN PULISIC Cat Soccer Ball', 14, 45.00, 'PRODUCT STORY\r\nWhether you\'re an amateur or a future star, the PUMA Cat Soccer Ball is designed to enhance on-field performance.\r\n\r\nDETAILS\r\nPUMA branding details\r\nSuitable for all ages\r\nMachine stitched', 50, 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_600,h_600/global/084077/01/fnd/PNA/fmt/png/PUMA-x-CHRISTIAN-PULISIC-Cat-Soccer-Ball', 3),
(14, 'Nike Universa\r\nWomen\'s Medium-Support High-Waisted 7/8 Leggings with Pockets\r\n', 5, 102.95, 'Benefits\r\n\r\nDesigned to help reduce rolling, pinching and sliding, the extra-wide waistband helps hold you up and smooths the waist.\r\nSide pockets with seamless entry let you keep your essentials close.\r\nNike Dri-FIT technology moves sweat away from your skin for quicker evaporation, helping you stay dry and comfortable.\r\n\r\nProduct Details\r\n\r\n7/8 length\r\nHigh-rise waistband\r\nBody: 76% nylon/24% elastane. Gusset Lining: 84% nylon/16% elastane.\r\nMachine wash\r\nImported\r\nNot intended for use as Personal Protective Equipment (PPE)\r\nProduct Details\r\n\r\n7/8 length\r\nHigh-rise waistband\r\nBody: 76% nylon/24% elastane. Gusset Lining: 84% nylon/16% elastane.\r\nMachine wash\r\nImported\r\nNot intended for use as Personal Protective Equipment (PPE)\r\nColour Shown: Black/Black\r\nStyle: DQ5898-010\r\nCountry/Region of Origin: Vietnam', 100, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b0a580b4-9ad3-4ceb-95d7-1a64bb94e34c/universa-support-high-waisted-7-8-leggings-with-pockets-77X1ds.png', 1),
(15, 'QUẦN SHORT BÓNG RỔ GIẢ DA LỘN', 4, 131.82, 'Chiếc quần short bóng rổ này làm từ vải thun da cá cao cấp cho hiệu ứng như da lộn, với các túi khóa kéo chìm hai bên và cạp quần bo gân có dây rút tùy chỉnh.\r\nDáng regular fit\r\nCạp quần bo gân có dây rút\r\nVải thun da cá làm từ 63% polyester tái chế, 21% cotton, 16% polyester\r\nVải thun da cá giả da lộn\r\nCác túi chìm có khóa kéo hai bên\r\nLớp lót đục lỗ toàn bộ\r\nHọa tiết cao cấp ở mặt trước và mặt sau\r\nMẫu quần short này sử dụng công nghệ UNITEFIT — hệ thống kích cỡ áp dụng cho mọi giới tính và chú trọng vào sự đa dạng về số đo, giới tính và vóc dáng.\r\nMàu sản phẩm: Carbon\r\nMã sản phẩm: IN7699', 100, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/9f98be131790446a9f1b31e6f93c3ad1_9366/Quan_Short_Bong_Ro_Gia_Da_Lon_Xam_IN7699_21_model.jpg', 2),
(16, 'Women’s Skeena Sandals', 12, 59.00, 'The sustainably-conscious Women’s Skeena Sandals are made with 100% recycled nylon uppers and have a timeless, comfortable design that will make them your go-to sandals all spring and summer long.\r\nStyle:\r\nNF0A46BF\r\nSizes:\r\n5–11 (whole sizes)\r\nApprox Weight (½ Pair):\r\n6 oz (169 g)', 100, 'https://images.thenorthface.com/is/image/TheNorthFace/NF0A46BF_LQ6_hero?wid=1300&hei=1510&fmt=jpeg&qlt=90&resMode=sharp2&op_usm=0.9,1.0,8,0', 6),
(17, 'BEANIE HAT - ANANAS TYPO BOX - BLACK', 8, 8.03, 'Mũ Beanie màu Black đơn giản với artwork Ananas Typo Box nổi bật dễ nhận diện. Chiếc mũ có chất liệu mềm mịn, phom co giãn thoải mái. Đây chắc chắn là món phụ kiện không thể thiếu trong tủ đồ của bạn.\r\nGender – /Unisex/\r\nSize: Free\r\nHọa tiết – /Ananas Typo/\r\nChất liệu – /100% Acrylic/\r\nThêu 2D đơn giản', 50, 'https://ananas.vn/wp-content/uploads/pro_ABN001_1-1-1.jpg', 5),
(18, 'Women’s Valley Twill Utility Shacket', 3, 105.00, 'Soft, durable and made from 100% organic cotton, the relaxed-fit Women’s Valley Twill Utility Shacket is primed for adventures from the backyard to the backcountry.\r\nStyle:\r\nNF0A831Q\r\nBody:\r\n350 g/m² 100% organic cotton 2-ply twill\r\nLining:\r\n73 g/m² 100% recycled polyester with non-PFC durable water-repellent (non-PFC DWR) finish\r\nSizes:\r\nXS, S, M, L, XL, XXL\r\nCenter Back:\r\n28\'\'', 100, 'https://images.thenorthface.com/is/image/TheNorthFace/NF0A831Q_I0I_hero?wid=1300&hei=1510&fmt=jpeg&qlt=90&resMode=sharp2&op_usm=0.9,1.0,8,0', 6),
(19, 'Kids Flat Knit No Show Socks 6 Pack', 4, 15.99, 'New Balance Kids\' No-Show Socks take your child from the classroom to the playground in comfort. These children\'s socks feature a Y-shaped heel that help prevent the fabric from falling down bunching around the heel. Plus, reinforced heels and toes help the socks stand up to high-impact playtime. We also integrated mesh paneling and NB DRY technology to wick sweat from this poly knit fabric.\r\nFeatures\r\nMaterial: 97% Polyester and 3% Spandex\r\nEngineered arch for fit and support\r\nKnit-in size indicators\r\nLightweight construction\r\nMesh panels\r\nReinforced Y-heel pocket\r\nItem cannot be returned.\r\nStyle #: LAS03326GML', NULL, 'https://nb.scene7.com/is/image/NB/las03326gml_nb_03_i?$pdpflexf2$&fmt=webp&wid=944&hei=944', 7),
(20, 'MADE in USA Core Hoodie', 13, 174.99, 'Manufactured in the U.S., from domestically sourced fabrics, new MADE in USA apparel brings timeless quality and craftsmanship to everyday staples. The NB Made in USA Core Hoodie boasts premium craftsmanship and classic sportswear design. Featuring French terry fabric, a double lined hood and embroidered patch logo for timeless, every day wear.\r\nFeatures\r\n440gsm French terry fabric\r\nDouble-lined hood with rib detail and drawcord\r\nKangaroo pocket\r\nLong sleeves\r\nRibbed cuffs\r\nRibbed hem\r\nEmbroidered NB patch logo\r\n100% cotton\r\nMade in USA\r\nStyle #: MT21540ROK', 200, 'https://nb.scene7.com/is/image/NB/mt21540rok_nb_70_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 7),
(21, 'LM NEW YEAR M TN', 3, 44.90, 'ÁO THUN THỂ THAO REEBOK LES MILLS® CNY GRAPHICS TANK\r\nMỘT CHIẾC ÁO BA LỖ TẬP LUYỆN VỚI PHONG CÁCH ĐỒ HỌA TÁO BẠO\r\nTHÔNG SỐ\r\n• Kiểu dáng thon gọn vừa vặn\r\n• Cổ tròn\r\n• Vải thun trơn Single jersey\r\n• Mã sản phẩm: HE7122\r\n• Vải thun trơn 84% nylon / 16% elastane\r\n• Đồ họa ở mặt sau\r\n• Màu sản phẩm: Black', 100, 'https://image.hsv-tech.io/400x0/common/e2be2f1c-9fd6-4aed-a81e-9c13126c7400.webp', 4),
(22, 'GIÀY THỂ THAO UNISEX REEBOK ZIG KINETICA 3', 1, 147.89, 'Màu sắc\r\nWhite', 100, 'https://i.ibb.co/C2SpWH0/100034219-1.jpg', 4),
(23, 'teamLIGA Women\'s Skirt', 10, 40.00, 'PRODUCT STORY\r\nThis teamLIGA skirt is built for high performance, thanks to its built-in shorts and elasticated waistband for optimum coverage and support. On top of that, moisture-wicking technology helps to keep you cool as you enjoy the thrill of the competition as well as the joy of victory.\r\n\r\nFEATURES & BENEFITS\r\ndryCELL: Performance technology designed to wick moisture from the body and keep you free of sweat during exercise\r\nRecycled Content: Made with at least 70% recycled material as a step toward a better future\r\nDETAILS\r\nRegular fit\r\nInner-short construction\r\nElasticated waist\r\nPUMA Cat Logo heat transfer on the left side\r\nMaterial Information\r\nSHELL: 88% polyester, 12% elastane', 50, 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_600,h_600/global/658387/03/fnd/PNA/fmt/png/teamLIGA-Women\'s-Skirt\r\nhttps://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_600,h_600/global/658387/03/mod01/fnd/PNA/fmt/png/teamLIG', 3),
(24, 'VÁY BÓNG ĐÁ', 10, 65.91, 'PHIÊN BẢN ÁO VÁY DỰA TRÊN CHIẾC ÁO ĐẤU CLASSIC YÊU THÍCH CỦA BẠN.\r\nVẫn là chiếc áo đấu bóng đá kinh điển vốn rất được ưa thích, nay cải biên đầy mới mẻ. Mẫu váy adidas này ghi điểm bằng cách thu nhỏ thiết kế đặc trưng ấy trở thành một chiếc váy dáng ôm. 3 Sọc adidas chạy dọc hai cánh tay cho phong cách đậm chất thể thao, cùng với các huy hiệu đặt phía trên logo Ba Lá. Điểm nhấn là thiết kế cổ bẻ để bạn có thể dựng lên mỗi khi có hứng.\r\nDáng slim fit\r\nCổ bẻ\r\nVải single jersey làm từ 93% cotton, 7% elastane\r\nMade with Better Cotton\r\nMàu sản phẩm: Black\r\nMã sản phẩm: IR9788', 100, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/4430cad1d1334e67b0f1f3f191741fd3_9366/Vay_Bong_DJa_DJen_IR9788_23_hover_model.jpg\r\nhttps://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/da25b55c39c7485e9bf4', 2),
(25, 'RI POLO', 11, 40.78, 'Áo polo tay ngắn với đường viền cổ tạo điểm nhấn, Reebok RI POLO sẽ là một chiếc áo yêu thích của phái mạnh bởi sự thời trang, mạnh mẽ và nam tính.\r\nSPECIFICATIONS\r\n• Thông số\r\n• Fit\r\n• Technology\r\n• Product Code\r\n• Chất liệu vải terry co giãn mang lại cảm giác mềm mại.\r\n• Thích hợp mặc hàng ngày\r\n• French terry\r\n• FP9173', 100, 'https://image.hsv-tech.io/400x0/common/de66d70a-209e-436e-b2fa-10c8375b60fd.webp', 4),
(26, 'Women’s Etip™ Recycled Gloves', 14, 45.00, 'Featuring a women-specific fit, the touchscreen-compatible, stretchable Women’s Etip™ Recycled Gloves are a runner’s favorite, and ready for your fastest or most leisurely hikes.\r\nDetails\r\nStyle:\r\nNF0A4SHB\r\nShell:\r\n93% recycled polyester, 7% elastane double-knit fleece\r\nPalm:\r\n93% recycled polyester, 7% elastane double-knit fleece with Etip™ compatibility and silicone gripper print\r\nSizes:\r\nXS, S, M, L, XL\r\nPalm:\r\n93% recycled polyester, 7% elastane double-knit fleece with Etip™ compatibility and silicone gripper print', 50, 'https://images.thenorthface.com/is/image/TheNorthFace/NF0A4SHB_I0F_hero?wid=1300&hei=1510&fmt=jpeg&qlt=90&resMode=sharp2&op_usm=0.9,1.0,8,0', 6),
(27, 'Dock Worker Recycled Beanie', 8, 30.00, 'The deep-fit Dock Worker Recycled Beanie is made from 95% recycled fabric, so your sustainably-conscious heart can feel as good as your head does.\r\nDetails\r\nStyle:\r\nNF0A3FNT\r\n95% recycled polyester, 4% nylon, 1% elastane\r\nSizes:\r\nOne size\r\nFabric:\r\n95% recycled polyester, 4% nylon, 1% elastane', 50, 'https://images.thenorthface.com/is/image/TheNorthFace/NF0A3FNT_I0H_hero?wid=1300&hei=1510&fmt=jpeg&qlt=90&resMode=sharp2&op_usm=0.9,1.0,8,0', 6),
(28, 'Nike Everyday Lightweight\r\nTraining Crew Socks (3 Pairs)', 4, 18.91, 'SWEAT-WICKING COMFORT.\r\nPower through your workout with the Nike Everyday Socks. Soft yarns with sweat-wicking technology help keep your feet comfortable and dry.\r\nBenefits\r\nDri-FIT Technology helps your feet stay dry and comfortable.\r\nCrew silhouette covers your ankle and lower calf.\r\nRibbed cuffs help keep the socks in place.\r\nArch band provides a supportive feel.\r\nProduct Details\r\nFabric: 60% cotton/37% polyester/3% elastane\r\nMachine wash\r\nImported\r\nColour Shown: White/Black\r\nStyle: SX7676-100\r\nCountry/Region of Origin: Argentina,Vietnam,China', 100, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/bivbbt0saypjw0mimm9x/everyday-lightweight-training-crew-socks-Gvl3WS.png', 1),
(29, 'Women\'s\r\nRun For Life Impact Run Tight', 5, 79.99, 'Features\r\nNB DRYx premium, fast-drying technology wicks moisture away from your body to help you dominate your workout\r\nMid rise sits just below the waist for easy fit and movement\r\nPoly knit fabric with stretch\r\nDrop-in pockets for easy access to personal items while running and a secure back zip pocket for added storage\r\nStorage tunnel for threading extra layers through\r\nReflective branding on thigh and piping down the leg\r\nDesigned for the NYRR Run For Life collection with exclusive branding\r\n77% recycled polyester, 23% spandex\r\nImported\r\nStyle #: WP21273BNGO', 50, 'https://nb.scene7.com/is/image/NB/wp21273bngo_nb_70_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 7),
(30, 'Women’s Lead In Tanklette', 9, 70.00, 'As the newest addition to our Lead In Collection, the fitted Women’s Lead in Tanklette was designed specifically for climbing. It uses moisture-wicking, abrasion-resistant FlashDry-XD™ materials and includes a shelf bra for light support on the wall.\r\nStyle:\r\nNF0A7WY9\r\nBody And Straps:\r\n40D x 40D 210 g/m² 72% nylon, 28% elastane knit interlock with FlashDry-XD™\r\nLining:\r\n100D x 30D 175 g/m² 90% recycled polyester, 10% elastane jersey knit with FlashDry-XD™\r\nSizes:\r\nXS, S, M, L, XL, XXL', 100, 'https://images.thenorthface.com/is/image/TheNorthFace/NF0A7WY9_LV4_back?wid=1300&hei=1510&fmt=jpeg&qlt=90&resMode=sharp2&op_usm=0.9,1.0,8,0\r\nhttps://images.thenorthface.com/is/image/TheNorthFace/NF0A7WY9_LV4_hero?wid=1300&hei=1510&fmt=jpeg&qlt=90&resMode=', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'thuc', 'ledinhduythuc510@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(3, 'Duy Thuc', 'ledinhduythuc510@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(4, 'thuc', 'ledinhduythuc510@gmail.com', '4138c76b25fbce846ca0307b64177cca', 'user'),
(5, 'thuc', 'ledinhduythuc510@mail.com', '25f9e794323b453885f5181f1b624d0b', 'user'),
(6, 'thuc', 'ledinhduythuc510@mail.com', '4138c76b25fbce846ca0307b64177cca', 'user'),
(7, 'thuc', 'ledinhduythuc510@gmail.co', '900150983cd24fb0d6963f7d28e17f72', 'user'),
(8, 'Đặng Trí Thành', 'dangtrithanh03@gmail.com', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BrandID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `fk_products_brand` (`BrandID`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_brand` FOREIGN KEY (`BrandID`) REFERENCES `brand` (`BrandID`),
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
