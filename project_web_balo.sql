-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 08, 2024 lúc 09:56 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_web_balo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `iduser` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`iduser`, `user`, `password`, `name`, `email`, `phone`, `address`, `role`) VALUES
(1, 'admin', '0000', 'admin', 'admin@gmail.com', '0398694446', 'Hà Nội', 1),
(9, 'tuan', '1234', 'tuan', 'Phanhoangtuan21072004@gmail.com', '0398694446', 'Thôn Quan Âm, xã Bắc Hồng, huyện Đông Anh,', 2),
(10, 'abc', 'abc', 'abc', 'abc@gmail.com', '', '', 2),
(11, 'tuanphi1', 'hupote', 'tuanphi1', 'Phanhoangtuan21072004@gmail.com', '0398694446', 'Thôn Quan Âm, xã Bắc Hồng, huyện Đông Anh,', 2),
(12, 'hiha', '123', 'ha', 'Phanhoangtuan21072004@gmail.com', '0398694446', 'Thôn Quan Âm, xã Bắc Hồng, huyện Đông Anh,', 2),
(13, 'abcd', 'abcd', 'abcd', 'Phanhoangtuan21072004@gmail.com', '0000000000', 'abcd', 2),
(14, 'ppp', 'ppp', 'ppp', 'Phanhoangtuan21072004@gmail.com', '0398694446', 'Thôn Quan Âm, xã Bắc Hồng, huyện Đông Anh,', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(10) NOT NULL,
  `iduser` int(10) DEFAULT 0,
  `order_code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_price` double(10,2) NOT NULL,
  `payment_methods` varchar(50) NOT NULL DEFAULT '0' COMMENT '1. Thanh toán qua chuyển khoản             2. Thanh toán sau khi nhận hàng',
  `bill_date` varchar(50) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0' COMMENT '0. Đơn hàng đang được xử lý, vui lòng chờ...\r\n1. Đơn hàng đã được xử lý!!!\r\n2. Đơn hàng đang được vận chuyển\r\n\r\n3. Đơn hàng đã được giao thành công'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_bill`, `iduser`, `order_code`, `name`, `email`, `phone`, `address`, `total_price`, `payment_methods`, `bill_date`, `status`) VALUES
(251, 9, 'ABC-6682d58727862', 'tuan', 'Phanhoangtuan21072004@gmail.com', 398694446, 'Thôn Quan Âm, xã Bắc Hồng, huyện Đông Anh,', 10460.45, 'Thanh toán sau khi nhận hàng', '18:12:55 01/07/2024', '0'),
(252, 9, 'ABC-6682d599e2534', 'tuan', 'Phanhoangtuan21072004@gmail.com', 398694446, 'Thôn Quan Âm, xã Bắc Hồng, huyện Đông Anh,', 974.35, 'Thanh toán qua chuyển khoản', '18:13:13 01/07/2024', '0'),
(253, 9, 'ABC-6682d5a6d4faa', 'tuan', 'Phanhoangtuan21072004@gmail.com', 398694446, 'Thôn Quan Âm, xã Bắc Hồng, huyện Đông Anh,', 4483.05, 'Thanh toán qua chuyển khoản', '18:13:26 01/07/2024', '0'),
(254, 9, 'ABC-6682d5b1f21ed', 'tuan', 'Phanhoangtuan21072004@gmail.com', 398694446, 'Thôn Quan Âm, xã Bắc Hồng, huyện Đông Anh,', 1995.00, 'Thanh toán qua chuyển khoản', '18:13:37 01/07/2024', '0'),
(255, 0, 'ABC-66841e3f0d6c8', '', '', 0, '', 1494.35, 'Thanh toán sau khi nhận hàng', '17:35:27 02/07/2024', '0'),
(256, 9, 'ABC-668425d76ee7c', 'tuan', 'Phanhoangtuan21072004@gmail.com', 398694446, 'Thôn Quan Âm, xã Bắc Hồng, huyện Đông Anh,', 1494.35, 'Thanh toán sau khi nhận hàng', '18:07:51 02/07/2024', '0'),
(257, 9, 'ABC-66882b197bdd8', 'tuan', 'Phanhoangtuan21072004@gmail.com', 398694446, 'Thôn Quan Âm, xã Bắc Hồng, huyện Đông Anh,', 0.00, 'Thanh toán sau khi nhận hàng', '19:19:21 05/07/2024', '0'),
(258, 9, 'ABC-66882f776f9eb', 'tuan', 'Phanhoangtuan21072004@gmail.com', 398694446, 'Thôn Quan Âm, xã Bắc Hồng, huyện Đông Anh,', 3387.70, 'Thanh toán sau khi nhận hàng', '19:37:59 05/07/2024', '0'),
(259, 9, 'ABC-66895cb97a26b', 'tuan', 'Phanhoangtuan21072004@gmail.com', 398694446, 'Thôn Quan Âm, xã Bắc Hồng, huyện Đông Anh,', 1494.35, 'Thanh toán sau khi nhận hàng', '17:03:21 06/07/2024', '0'),
(260, 9, 'ABC-66895cf3c6900', 'tuan', 'Phanhoangtuan21072004@gmail.com', 398694446, 'Thôn Quan Âm, xã Bắc Hồng, huyện Đông Anh,', 1169.35, 'Thanh toán sau khi nhận hàng', '17:04:19 06/07/2024', '0'),
(261, 9, 'ABC-66895d69c205b', 'tuan', 'Phanhoangtuan21072004@gmail.com', 398694446, 'Thôn Quan Âm, xã Bắc Hồng, huyện Đông Anh,', 1169.35, 'Thanh toán sau khi nhận hàng', '17:06:17 06/07/2024', '0'),
(262, 9, 'ABC-66895da2775c8', 'tuan', 'Phanhoangtuan21072004@gmail.com', 398694446, 'Thôn Quan Âm, xã Bắc Hồng, huyện Đông Anh,', 1169.35, 'Thanh toán sau khi nhận hàng', '17:07:14 06/07/2024', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_quantity` int(50) NOT NULL,
  `product_new_price` double(10,2) NOT NULL DEFAULT 0.00,
  `product_total` double(10,2) NOT NULL DEFAULT 0.00,
  `date` varchar(50) DEFAULT NULL,
  `id_bill` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `iduser`, `id_product`, `product_name`, `product_image`, `product_quantity`, `product_new_price`, `product_total`, `date`, `id_bill`) VALUES
(220, 9, 1, 'Balo Herschel Heritage Standard 15', 'balo_sv1.jpg', 7, 1494.35, 10460.45, '18:12:55 01/07/2024', 251),
(221, 9, 2, 'Balo Herschel Classic \r\nMini Backpack XS Ash Rose', 'balo_sv2.jpg', 1, 974.35, 974.35, '18:13:13 01/07/2024', 252),
(222, 9, 5, 'Balo Herschel Heritage Standard 15', 'balo_sv5.jpg', 3, 1494.35, 4483.05, '18:13:26 01/07/2024', 253),
(223, 9, 11, 'Balo thể thao, du lịch nhỏ gọn Mikkor The Ivy Backpack', 'balo_tt1.jpg', 5, 399.00, 1995.00, '18:13:37 01/07/2024', 254),
(225, 9, 1, 'Balo Herschel Heritage Standard 15', 'balo_sv1.jpg', 1, 1494.35, 1494.35, '18:07:51 02/07/2024', 256),
(226, 9, 1, 'Balo Herschel Heritage Standard 15', 'balo_sv1.jpg', 2, 1494.35, 2988.70, '19:37:59 05/07/2024', 258),
(227, 9, 11, 'Balo thể thao, du lịch nhỏ gọn Mikkor The Ivy Backpack', 'balo_tt1.jpg', 1, 399.00, 399.00, '19:37:59 05/07/2024', 258),
(228, 9, 1, 'Balo Herschel Heritage Standard 15', 'balo_sv1.jpg', 1, 1494.35, 1494.35, '17:03:21 06/07/2024', 259),
(229, 9, 47, 'laptop1', 'uploadbalo6.png', 1, 1169.35, 1169.35, '17:04:19 06/07/2024', 260),
(230, 9, 47, 'laptop1', 'uploadbalo6.png', 1, 1169.35, 1169.35, '17:06:17 06/07/2024', 261),
(231, 9, 47, 'laptop1', 'uploadbalo6.png', 1, 1169.35, 1169.35, '17:07:14 06/07/2024', 262);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(10) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `category_name`) VALUES
(1, 'Balo du lịch'),
(2, 'Balo laptop'),
(3, 'Balo đa năng'),
(4, 'Balo thể thao'),
(5, 'Balo học sinh, sinh viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `iduser`, `id_product`, `content`, `date`) VALUES
(52, 9, 1, 'a', '2024-06-29'),
(53, 9, 2, 'scscs', '2024-07-01'),
(54, 9, 4, 'sasds', '2024-07-01'),
(55, 9, 4, 'sds', '2024-07-01'),
(56, 9, 47, 'xaxaxa', '2024-07-01'),
(57, 9, 47, 'xZxz', '2024-07-01'),
(58, 9, 1, 'dfdfd', '2024-07-01'),
(59, 9, 3, 'sdsds', '2024-07-01'),
(60, 9, 3, 'ddvvdvv', '2024-07-01'),
(61, 9, 3, 'sdsdsd', '2024-07-01'),
(62, 9, 4, 'sdsdsc', '2024-07-01'),
(63, 9, 2, 'dvvvvvvvvvvvvvvv', '2024-07-01'),
(64, 9, 2, 'xxcx', '2024-07-01'),
(65, 9, 1, 'sdsds', '2024-07-01'),
(66, 9, 1, 'ddddddddddddddddd', '2024-07-01'),
(67, 9, 1, 'frbfb', '2024-07-05'),
(68, 9, 1, '7i7', '2024-07-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_status`
--

CREATE TABLE `list_status` (
  `id_status` int(10) NOT NULL,
  `name_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `list_status`
--

INSERT INTO `list_status` (`id_status`, `name_status`) VALUES
(1, 'Đơn hàng đang được xử lí, vui lòng chờ...'),
(2, 'Đơn hàng đã được xử lí !!! Đang giao hàng.'),
(3, 'Đã giao hàng thành công');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_product` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_old_price` double(10,2) DEFAULT NULL,
  `product_new_price` double(10,2) NOT NULL DEFAULT 0.00,
  `product_image` varchar(255) NOT NULL,
  `product_mota` text DEFAULT NULL,
  `product_view` int(15) NOT NULL DEFAULT 0,
  `id_category` int(10) NOT NULL,
  `id_status_product` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_product`, `product_name`, `product_old_price`, `product_new_price`, `product_image`, `product_mota`, `product_view`, `id_category`, `id_status_product`) VALUES
(1, 'Balo Herschel Heritage Standard 15\" Backpack M Peacoat/Light Pelican', 2299.00, 1494.35, 'balo_sv1.jpg', '\"Less is more\"- lược giản tất cả những chi tiết không cần thiết, Heritage pha trộn một chút cá tính trên nền minimal khiến chiếc balo không chỉ hiện đại mà còn vô cùng tinh tế. \r\n\r\nTương thích với dòng MacBook/Laptop kích thước lên đến 15 inch\r\n\r\nTrang bị ngăn chống sốc, bảo vệ tối ưu cho Laptop\r\n\r\nNgăn lưu trữ đồ nhỏ gọn phía trước \r\n\r\nKhoá kéo ấn tượng với nút thắt đẹp mắt\r\n\r\nQuai đeo êm ái, thoáng khí', 0, 5, 1),
(2, 'Balo Herschel Classic \r\nMini Backpack XS Ash Rose', 1499.00, 974.35, 'balo_sv2.jpg', 'Herschel Classic bền bỉ cùng thời gian bởi chính sự đơn giản đến tinh tế, không cần quá nhiều chi tiết nhưng luôn để lại ấn tượng sâu đậm. \r\n\r\nNgăn trữ đồ nhỏ gọn, tiện lợi phía trước\r\n\r\nQuai đeo êm ái, thoáng khí\r\n\r\nThiết kế nhỏ gọn, dễ dàng di chuyển', 0, 5, 1),
(3, 'Balo Herschel Classic Mini Backpack XS Black', 1499.00, 974.35, 'balo_sv3.jpg', 'Herschel Classic bền bỉ cùng thời gian bởi chính sự đơn giản đến tinh tế, không cần quá nhiều chi tiết nhưng luôn để lại ấn tượng sâu đậm. \r\n\r\nNgăn trữ đồ nhỏ gọn, tiện lợi phía trước\r\n\r\nQuai đeo êm ái, thoáng khí\r\n\r\nThiết kế nhỏ gọn, dễ dàng di chuyển', 0, 5, 1),
(4, 'Balo Herschel Heritage TM Standard 15\" Backpack M Black Tonal', NULL, 3199.00, 'balo_sv4.jpg', '\"Less is more\"- lược giản tất cả những chi tiết không cần thiết, Heritage TM Standard pha trộn một chút cá tính trên nền minimal khiến chiếc balo không chỉ hiện đại mà còn vô cùng tinh tế. \r\n\r\nTương thích với dòng MacBook/Laptop kích thước lên đến 15 inch\r\n\r\nTrang bị ngăn chống sốc, bảo vệ tối ưu cho Laptop\r\n\r\nNgăn lưu trữ đồ nhỏ gọn phía trước, ngăn chứa bình nước tiện lợi\r\n\r\nChất liệu vải EcoSystem™ 600D thân thiện với môi trường\r\n\r\nQuai đeo êm ái, thoáng khí', 0, 5, 1),
(5, 'Balo Herschel Heritage Standard 15\" Backpack M Black Crosshatch/Black', 2299.00, 1494.35, 'balo_sv5.jpg', '\"Less is more\"- lược giản tất cả những chi tiết không cần thiết, Heritage pha trộn một chút cá tính trên nền minimal khiến chiếc balo không chỉ hiện đại mà còn vô cùng tinh tế. \r\n\r\nTương thích với dòng MacBook/Laptop kích thước lên đến 15 inch\r\n\r\nTrang bị ngăn chống sốc, bảo vệ tối ưu cho Laptop\r\n\r\nNgăn lưu trữ đồ nhỏ gọn phía trước \r\n\r\nKhoá kéo ấn tượng với nút thắt đẹp mắt\r\n\r\nQuai đeo êm ái, thoáng khí', 0, 5, 1),
(6, 'Balo Herschel Settlement TM Standard 15\" Backpack M Black Tonal', NULL, 3199.00, 'balo_sv6.jpg', 'Trẻ trung, phóng khoáng nhưng không kém phần thanh lịch theo đúng tinh thần của Herschel. Settlement TM Standard sở hữu gam màu thời thượng khẳng định luôn là sản phẩm best seller của hãng.   \r\n\r\nTương thích với dòng MacBook/Laptop kích thước lên đến 15 inch\r\n\r\nTrang bị ngăn chống sốc, bảo vệ tối ưu cho laptop\r\n\r\nNgăn lưu trữ đồ nhỏ gọn phía trước\r\n\r\nChất liệu vải EcoSystem™ 600D thân thiện với môi trường\r\n\r\nNgăn đựng bình nước bên cạnh\r\nQuai đeo êm ái, thoáng khí', 0, 5, 1),
(7, 'Balo Herschel Classic Standard 15\" Backpack M Navy', NULL, 1169.35, 'balo_sv7.jpg', 'Thương hiệu Herschel Supply\r\n\r\nThương hiệu nổi tiếng đến từ Canada. Ra đời năm 2009, bởi hai anh em Jamie và Lydon Cormack. Các bộ sưu tập của Herschel là sự kết hợp hoàn hảo giữa chất hoài cổ đan xen nét sành điệu của thời trang cao cấp. Herschel đã tự biến mình trở thành một xu hướng của thế giới. \r\n\r\n\r\n\r\nMô tả sản phẩm\r\n\r\nHerschel Classic bền bỉ cùng thời gian bởi chính sự đơn giản đến tinh tế, không cần quá nhiều chi tiết nhưng luôn để lại ấn tượng sâu đậm. \r\n\r\nNgăn trữ đồ nhỏ gọn, tiện lợi phía trước\r\n\r\nQuai đeo êm ái, thoáng khí\r\n\r\nKhoá kéo kim loại ấn tượng với nút thắt đẹp mắt ', 0, 5, 1),
(8, 'Balo Herschel Classic Standard 15\" Backpack M Black Crosshatch', NULL, 1169.35, 'balo_sv8.jpg', '\r\nThương hiệu Herschel Supply\r\n\r\nThương hiệu nổi tiếng đến từ Canada. Ra đời năm 2009, bởi hai anh em Jamie và Lydon Cormack. Các bộ sưu tập của Herschel là sự kết hợp hoàn hảo giữa chất hoài cổ đan xen nét sành điệu của thời trang cao cấp. Herschel đã tự biến mình trở thành một xu hướng của thế giới. \r\n\r\n\r\n\r\nMô tả sản phẩm\r\n\r\nHerschel Classic bền bỉ cùng thời gian bởi chính sự đơn giản đến tinh tế, không cần quá nhiều chi tiết nhưng luôn để lại ấn tượng sâu đậm. \r\n\r\nNgăn trữ đồ nhỏ gọn, tiện lợi phía trước\r\n\r\nQuai đeo êm ái, thoáng khí\r\n\r\nKhoá kéo kim loại ấn tượng với nút thắt đẹp mắt ', 0, 5, 1),
(9, 'Balo Herschel Settlement Standard 15\" Backpack M Black Crosshatch', 2299.00, 1494.35, 'balo_sv9.jpg', 'Thương hiệu Herschel Supply\r\n\r\nThương hiệu nổi tiếng đến từ Canada. Ra đời năm 2009, bởi hai anh em Jamie và Lydon Cormack. Các bộ sưu tập của Herschel là sự kết hợp hoàn hảo giữa chất hoài cổ đan xen nét sành điệu của thời trang cao cấp. Herschel đã tự biến mình trở thành một xu hướng của thế giới. \r\n\r\n\r\nMô tả sản phẩm\r\n\r\nTrẻ trung, phóng khoáng nhưng không kém phần thanh lịch theo đúng tinh thần của Herschel. Settlement Standard sở hữu gam màu thời thượng khẳng định luôn là sản phẩm best seller của hãng.   \r\n\r\nTương thích với dòng MacBook/Laptop kích thước lên đến 15 inch\r\n\r\nTrang bị ngăn chống sốc, bảo vệ tối ưu cho laptop\r\n\r\nNgăn lưu trữ đồ nhỏ gọn phía trước\r\n\r\nDây đai gài ấn tượng, chắc chắn\r\n\r\nQuai đeo êm ái, thoáng khí', 0, 5, 1),
(10, 'Balo Herschel Classic Standard 15\" Backpack M Peacoat', 1799.00, 1169.35, 'balo_sv10.jpg', 'Thương hiệu Herschel Supply\r\n\r\nThương hiệu nổi tiếng đến từ Canada. Ra đời năm 2009, bởi hai anh em Jamie và Lydon Cormack. Các bộ sưu tập của Herschel là sự kết hợp hoàn hảo giữa chất hoài cổ đan xen nét sành điệu của thời trang cao cấp. Herschel đã tự biến mình trở thành một xu hướng của thế giới. \r\n\r\n\r\n\r\nMô tả sản phẩm\r\n\r\nHerschel Classic bền bỉ cùng thời gian bởi chính sự đơn giản đến tinh tế, không cần quá nhiều chi tiết nhưng luôn để lại ấn tượng sâu đậm. \r\n\r\nNgăn trữ đồ nhỏ gọn, tiện lợi phía trước\r\n\r\nQuai đeo êm ái, thoáng khí\r\n\r\nKhoá kéo kim loại ấn tượng với nút thắt đẹp mắt ', 0, 5, 1),
(11, 'Balo thể thao, du lịch nhỏ gọn Mikkor The Ivy Backpack', NULL, 399.00, 'balo_tt1.jpg', 'Thiết kế thời trang\r\nMikkor The Ivy Backpack là mẫu balo thể thao, du lịch nhỏ gọn mới nhất season 2023 mà nhà Mikkor vừa cho ra đời. Với mong muốn mang đến cho bạn sản phẩm phù hợp và tiện lợi nhất khi sử dụng hàng ngày, The Ivy Backpack chính là một lựa chọn hoàn hảo. Với nhu cầu không cần đựng quá nhiều, The Ivy Backpack phù hợp nhất khi đi chơi, đi thể thao hoặc dùng như chiếc balo để đi học thêm, dã ngoại cho các bạn học sinh, sinh viên.\r\n\r\n– Tên sản phẩm: The Ivy Backpack\r\n– Chất liệu: 600D Supertex PU/2T, 900D Twill Polyester with PU&WR.\r\n– Kích thước: 38cm x 27cm x 16cm\r\n– Cân nặng: 400 gr\r\n– Bảo hành: 05 năm\r\n– Màu sắc: Black, Navy, Tan, Graphite, Red', 0, 4, 1),
(12, 'Balo thể thao Unisex ABSU039-1V', NULL, 1070.18, 'balo_tt2.jpg', 'Balo thể thao Unisex ABSU039-1V\r\n\r\nKích thước : 26*15.5*41.5CM\r\nChất liệu : Polyamide100%\r\nDòng sản phẩm : Running/ Chạy bộ\r\nĐặc điểm nổi bật :\r\n\r\nThiết kế Hiện Đại: Li-Ning thường áp dụng các kiểu dáng hiện đại và độc đáo vào sản phẩm của mình, giúp túi xách và balo trở thành không chỉ là dụng cụ tiện ích mà còn là phụ kiện thời trang.\r\n\r\nChất Liệu Chất Lượng: Li-Ning sử dụng các chất liệu cao cấp như nylon, polyester, và các vật liệu chống nước để đảm bảo sự bền bỉ và khả năng chống thấm nước cho túi xách và balo.\r\n\r\nNgăn Chứa Linh Hoạt: Sự linh hoạt trong bố trí ngăn chứa giúp bạn tổ chức đồ đạc một cách hiệu quả. Các ngăn được thiết kế để phù hợp với nhu cầu sử dụng thể thao hoặc hàng ngày.\r\n\r\nLogo và Thương Hiệu Độc Đáo: Logo của Li-Ning thường được đặt ở vị trí nổi bật, tạo điểm nhấn cho sản phẩm. Thương hiệu này nổi tiếng với việc kết hợp màu sắc độc đáo và logo phong cách.\r\n\r\nKiểu Dáng Đa Dạng: Túi xách và balo của Li-Ning có nhiều kiểu dáng khác nhau, từ dòng thể thao đến phong cách hàng ngày, đáp ứng nhu cầu đa dạng của người tiêu dùng.', 0, 4, 1),
(13, 'Ba lô Thể Thao Nữ ADIDAS Clsc Cam S Bp GE2080', 750.00, 600.00, 'balo_tt3.jpg', 'Ba lô Thể Thao Nữ ADIDAS Clsc Cam S Bp GE2080\r\n\r\n100% chính hãng ADIDAS Việt Nam\r\n\r\nBao gồm: Sản phẩm mới nguyên TAG', 0, 4, 1),
(14, 'Balo Oxford', 950.00, 760.00, 'balo_tt4.jpg', 'Với khả năng đựng được nhiều đồ và chống trượt nước tốt mỗi khi gặp thời tiết xấu, balo Oxford là \"người bạn\" tin cậy để cho mọi người mang đi học, đi làm và đi du lịch.\r\n\r\nChất liệu: Vải Oxford nhập khẩu\r\nKích thước: 38 x 30 x 20 cm\r\nĐể được các loại laptop 15.4 Inches đổ xuống\r\n1 ngăn lớn, 5 ngăn nhỏ, 2 ngăn bên hông', 0, 4, 1),
(15, 'Balô thể thao tiện dụng Essential 17L - Xanh', NULL, 295.00, 'balo_tt5.jpg', 'Bạn đang tìm kiếm một mẫu balo đi tập hoặc dùng thường ngày? Balo Essential 17L được thiết kế với một ngăn chính lớn và nhiều ngăn phụ, gồm một ngăn đựng giày.\r\n\r\nBalo thể thao 17L Essential được thiết kế với nhiều ngăn, giúp việc di chuyển thường ngày đến phòng tập và tham gia hoạt động của bạn trở nên dễ dàng hơn.\r\n\r\n• Mã sản phẩm 8734606\r\nLợi ích sản phẩm\r\n\r\nThể tích\r\nThể tích 17 lít. Thiết kế dạng hành lý xách tay | Kích thước: 43 x 29 x13 cm.\r\n\r\nNhiều ngăn\r\n4 ngăn túi.Ngăn trước, ngăn đựng phụ kiện, ngăn đựng giày, ngăn đựng chai nước.\r\n\r\nĐộ bền\r\nLàm từ chất liệu chịu được sức nặng và mài mòn. Đã qua kiểm nghiệm độ bền.\r\n\r\nThoải mái mang theo\r\nQuai đeo có thể điều chỉnh và phần lưng có đệm.', 0, 4, 1),
(16, 'Ba Lô Thể Thao Adidas Classic', NULL, 650.00, 'balo_tt6.jpg', 'BA LÔ BADGE OF SPORT CLASSIC\r\n\r\nCHIẾC BA LÔ HUY HIỆU THỂ THAO ADIDAS CHO BẠN HÀNH TRANG THOẢI MÁI.\r\n\r\nXách ba lô lên và đi. Chiếc ba lô adidas này giúp bạn mang theo các vật dụng thiết yếu hàng ngày thật thoải mái. Ngăn chính có ngăn chia đồ bên trong giúp sắp xếp mọi thứ đúng vị trí để tiện lấy đồ. Quai đeo vai lót đệm và tùy chỉnh đảm bảo độ vừa vặn. Sản phẩm này có sử dụng chất liệu tái chế, là một phần cam kết của chúng tôi hướng tới chấm dứt rác thải nhựa.\r\n\r\nTHÔNG SỐ\r\n\r\nKích thước: 15 cm x 32 cm x 46 cm\r\nDung tích: 27,5 L\r\nVải dệt trơn làm từ 100% polyester tái chế\r\nNgăn khóa kéo phía trước\r\nNgăn mở hai bên\r\nNgăn chia đồ có lớp lót\r\nQuai đeo vai lót đệm tùy chỉnh\r\nQuai xách phía trên\r\nMàu sản phẩm: Focus Olive / Black / White\r\nMã sản phẩm: H34811', 0, 4, 1),
(18, 'Balo thể thao Unisex ABST255-1V', NULL, 932.73, 'balo_tt8.jpg', 'Balo thể thao Unisex ABST255-1V\r\n\r\nKích thước : 33*19*48CM\r\nChất liệu : Polyester100%\r\nDòng sản phẩm : Training/ Tập luyện\r\nĐặc điểm nổi bật :\r\n\r\nThiết kế Hiện Đại: Li-Ning thường áp dụng các kiểu dáng hiện đại và độc đáo vào sản phẩm của mình, giúp túi xách và balo trở thành không chỉ là dụng cụ tiện ích mà còn là phụ kiện thời trang.\r\n\r\nChất Liệu Chất Lượng: Li-Ning sử dụng các chất liệu cao cấp như nylon, polyester, và các vật liệu chống nước để đảm bảo sự bền bỉ và khả năng chống thấm nước cho túi xách và balo.\r\n\r\nNgăn Chứa Linh Hoạt: Sự linh hoạt trong bố trí ngăn chứa giúp bạn tổ chức đồ đạc một cách hiệu quả. Các ngăn được thiết kế để phù hợp với nhu cầu sử dụng thể thao hoặc hàng ngày.\r\n\r\nLogo và Thương Hiệu Độc Đáo: Logo của Li-Ning thường được đặt ở vị trí nổi bật, tạo điểm nhấn cho sản phẩm. Thương hiệu này nổi tiếng với việc kết hợp màu sắc độc đáo và logo phong cách.\r\n\r\nKiểu Dáng Đa Dạng: Túi xách và balo của Li-Ning có nhiều kiểu dáng khác nhau, từ dòng thể thao đến phong cách hàng ngày, đáp ứng nhu cầu đa dạng của người tiêu dùng.', 0, 4, 1),
(19, 'Balo thể thao 25L - Academic đen', NULL, 895.00, 'balo_tt9.jpg', 'Bạn đang tìm kiếm một balô tiện lợi và phù hợp với phong cách của mình? Balô Academic 25L rất lý tưởng với ngăn đựng thông minh và một ngăn đảo mặt để bạn có thể thay đổi màu sắc ngay tức thì!\r\n\r\nBalo Academic 25L được thiết kế để bạn mang theo dụng cụ tập luyện hoặc vật dụng hàng ngày. Kiểu dáng thời thượng sẽ khiến bạn luôn trông thật phong cách.\r\n\r\n• Mã sản phẩm 8605502\r\nLợi ích sản phẩm\r\n\r\nThể tích\r\nKích thước: 46 x 32 x 20 cm | Thể tích: 25 L | Cỡ hành lý xách tay.\r\n\r\nĐộ linh hoạt\r\nNgăn balô hai mặt và có thể tháo rời. Thay đổi phong cách dễ dàng.\r\n\r\nNhiều ngăn\r\n7 ngăn | ngăn chính - giày - laptop - bình nước - vật dụng nhỏ\r\n\r\nĐộ bền\r\nLàm từ chất liệu chịu được sức nặng và mài mòn. Đã qua kiểm nghiệm độ bền.\r\n\r\nThoải mái mang theo\r\nQuai đeo có thể điều chỉnh và phần lưng có đệm. Có đai ngực.', 0, 4, 1),
(20, 'Balo thể thao Unisex ABSU039-1V', NULL, 1070.18, 'balo_tt10.jpg', 'Balo thể thao Unisex ABSU039-1V\r\n\r\nKích thước : 26*15.5*41.5CM\r\nChất liệu : Polyamide100%\r\nDòng sản phẩm : Running/ Chạy bộ\r\nĐặc điểm nổi bật :\r\n\r\nThiết kế Hiện Đại: Li-Ning thường áp dụng các kiểu dáng hiện đại và độc đáo vào sản phẩm của mình, giúp túi xách và balo trở thành không chỉ là dụng cụ tiện ích mà còn là phụ kiện thời trang.\r\n\r\nChất Liệu Chất Lượng: Li-Ning sử dụng các chất liệu cao cấp như nylon, polyester, và các vật liệu chống nước để đảm bảo sự bền bỉ và khả năng chống thấm nước cho túi xách và balo.\r\n\r\nNgăn Chứa Linh Hoạt: Sự linh hoạt trong bố trí ngăn chứa giúp bạn tổ chức đồ đạc một cách hiệu quả. Các ngăn được thiết kế để phù hợp với nhu cầu sử dụng thể thao hoặc hàng ngày.\r\n\r\nLogo và Thương Hiệu Độc Đáo: Logo của Li-Ning thường được đặt ở vị trí nổi bật, tạo điểm nhấn cho sản phẩm. Thương hiệu này nổi tiếng với việc kết hợp màu sắc độc đáo và logo phong cách.\r\n\r\nKiểu Dáng Đa Dạng: Túi xách và balo của Li-Ning có nhiều kiểu dáng khác nhau, từ dòng thể thao đến phong cách hàng ngày, đáp ứng nhu cầu đa dạng của người tiêu dùng.', 0, 4, 1),
(41, 'ttttttt', NULL, 111.22, '34b5bf180145769.6505ae7623131.jpg', 'eeeeeee', 0, 3, 1),
(42, 'ttttttt', NULL, 111.22, 'asus-proart-pa248qv-241-inch-fhd.jpg', 'qq', 0, 3, 2),
(43, 'BA LÔ THỂ THAO PROSPECS UNISEX BE MY BACKPACK BP-Y111', 3042.70, 1825.62, 'balo_tt11.jpg', '• Ba lô Bemy có túi lưới phía trước và dạng dây\r\n• Thiết kế phù hợp xu hướng\r\n• Trọng lượng túi 710 g\r\n• Bộ khóa kéo mới được phát triển mang lại sự thuận tiện khi mở\r\n• Thiết kế đai ngực ngăn túi bị trượt khỏi vai\r\n• Túi trước có tính ứng dụng cao, túi lưới bên hông\r\n• Chức năng phản quang 3M ở mặt trước đảm bảo an toàn vào ban đêm\r\n• Giúp túi không bị chảy xệ nhờ ngăn bên trong có thể gập lại\r\n• Mặt sau bên trong có túi đựng máy tính xách tay và ngăn đựng đồ nhỏ', 0, 4, 1),
(47, 'laptop1', NULL, 1169.35, 'uploadbalo6.png', 'asdsadasssssssssssssssssssssssssssss', 0, 2, 1),
(81, '', NULL, 0.00, '448724951_465859489710067_327962000089028447_n.png', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_status`
--

CREATE TABLE `product_status` (
  `id_status_product` int(10) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_status`
--

INSERT INTO `product_status` (`id_status_product`, `status`) VALUES
(1, 'Còn hàng'),
(2, 'Hết hàng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`iduser`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `cart_product` (`id_product`),
  ADD KEY `cart_bill` (`id_bill`),
  ADD KEY `cart_user` (`iduser`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_account` (`iduser`),
  ADD KEY `comment_product` (`id_product`);

--
-- Chỉ mục cho bảng `list_status`
--
ALTER TABLE `list_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `product_category` (`id_category`),
  ADD KEY `product_status` (`id_status_product`);

--
-- Chỉ mục cho bảng `product_status`
--
ALTER TABLE `product_status`
  ADD PRIMARY KEY (`id_status_product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `iduser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `list_status`
--
ALTER TABLE `list_status`
  MODIFY `id_status` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `product_status`
--
ALTER TABLE `product_status`
  MODIFY `id_status_product` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_bill` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`),
  ADD CONSTRAINT `cart_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `cart_user` FOREIGN KEY (`iduser`) REFERENCES `account` (`iduser`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_account` FOREIGN KEY (`iduser`) REFERENCES `account` (`iduser`),
  ADD CONSTRAINT `comment_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `product_status` FOREIGN KEY (`id_status_product`) REFERENCES `product_status` (`id_status_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
