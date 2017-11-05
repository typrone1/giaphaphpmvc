-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2017 at 09:29 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `MaBaiViet` int(11) NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `HinhAnh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MaLoaiTin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`MaBaiViet`, `TieuDe`, `NoiDung`, `HinhAnh`, `MaLoaiTin`) VALUES
(1, 'Trump sẽ không thăm khu phi quân sự liên Triều\n', '<div class=\"col-lg-6\">\n          <h4>Subheading</h4>\n          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>\n\n          <h4>Subheading</h4>\n          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>\n\n          <h4>Subheading</h4>\n          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>\n        </div>', 'd41faa7f38cc3b8bc64170f30a16a9d5.jpg', 1),
(2, 'Trump sẽ không thăm khu phi quân sự liên Triều\n', '<div class=\"table-responsive\">\n            <table class=\"table table-striped\">\n              <thead>\n                <tr>\n                  <th>#</th>\n                  <th>Header</th>\n                  <th>Header</th>\n                  <th>Header</th>\n                  <th>Header</th>\n                </tr>\n              </thead>\n              <tbody>\n                <tr>\n                  <td>1,001</td>\n                  <td>Lorem</td>\n                  <td>ipsum</td>\n                  <td>dolor</td>\n                  <td>sit</td>\n                </tr>\n                <tr>\n                  <td>1,002</td>\n                  <td>amet</td>\n                  <td>consectetur</td>\n                  <td>adipiscing</td>\n                  <td>elit</td>\n                </tr>\n                <tr>\n                  <td>1,003</td>\n                  <td>Integer</td>\n                  <td>nec</td>\n                  <td>odio</td>\n                  <td>Praesent</td>\n                </tr>\n                <tr>\n                  <td>1,003</td>\n                  <td>libero</td>\n                  <td>Sed</td>\n                  <td>cursus</td>\n                  <td>ante</td>\n                </tr>\n                <tr>\n                  <td>1,004</td>\n                  <td>dapibus</td>\n                  <td>diam</td>\n                  <td>Sed</td>\n                  <td>nisi</td>\n                </tr>\n                <tr>\n                  <td>1,005</td>\n                  <td>Nulla</td>\n                  <td>quis</td>\n                  <td>sem</td>\n                  <td>at</td>\n                </tr>\n                <tr>\n                  <td>1,006</td>\n                  <td>nibh</td>\n                  <td>elementum</td>\n                  <td>imperdiet</td>\n                  <td>Duis</td>\n                </tr>\n                <tr>\n                  <td>1,007</td>\n                  <td>sagittis</td>\n                  <td>ipsum</td>\n                  <td>Praesent</td>\n                  <td>mauris</td>\n                </tr>\n                <tr>\n                  <td>1,008</td>\n                  <td>Fusce</td>\n                  <td>nec</td>\n                  <td>tellus</td>\n                  <td>sed</td>\n                </tr>\n                <tr>\n                  <td>1,009</td>\n                  <td>augue</td>\n                  <td>semper</td>\n                  <td>porta</td>\n                  <td>Mauris</td>\n                </tr>\n                <tr>\n                  <td>1,010</td>\n                  <td>massa</td>\n                  <td>Vestibulum</td>\n                  <td>lacinia</td>\n                  <td>arcu</td>\n                </tr>\n                <tr>\n                  <td>1,011</td>\n                  <td>eget</td>\n                  <td>nulla</td>\n                  <td>Class</td>\n                  <td>aptent</td>\n                </tr>\n                <tr>\n                  <td>1,012</td>\n                  <td>taciti</td>\n                  <td>sociosqu</td>\n                  <td>ad</td>\n                  <td>litora</td>\n                </tr>\n                <tr>\n                  <td>1,013</td>\n                  <td>torquent</td>\n                  <td>per</td>\n                  <td>conubia</td>\n                  <td>nostra</td>\n                </tr>\n                <tr>\n                  <td>1,014</td>\n                  <td>per</td>\n                  <td>inceptos</td>\n                  <td>himenaeos</td>\n                  <td>Curabitur</td>\n                </tr>\n                <tr>\n                  <td>1,015</td>\n                  <td>sodales</td>\n                  <td>ligula</td>\n                  <td>in</td>\n                  <td>libero</td>\n                </tr>\n              </tbody>\n            </table>\n          </div>', NULL, 1),
(3, 'Trump sẽ không thăm khu phi quân sự liên Triều\n', '<div class=\"table-responsive\">\n            <table class=\"table table-striped\">\n              <thead>\n                <tr>\n                  <th>#</th>\n                  <th>Header</th>\n                  <th>Header</th>\n                  <th>Header</th>\n                  <th>Header</th>\n                </tr>\n              </thead>\n              <tbody>\n                <tr>\n                  <td>1,001</td>\n                  <td>Lorem</td>\n                  <td>ipsum</td>\n                  <td>dolor</td>\n                  <td>sit</td>\n                </tr>\n                <tr>\n                  <td>1,002</td>\n                  <td>amet</td>\n                  <td>consectetur</td>\n                  <td>adipiscing</td>\n                  <td>elit</td>\n                </tr>\n                <tr>\n                  <td>1,003</td>\n                  <td>Integer</td>\n                  <td>nec</td>\n                  <td>odio</td>\n                  <td>Praesent</td>\n                </tr>\n                <tr>\n                  <td>1,003</td>\n                  <td>libero</td>\n                  <td>Sed</td>\n                  <td>cursus</td>\n                  <td>ante</td>\n                </tr>\n                <tr>\n                  <td>1,004</td>\n                  <td>dapibus</td>\n                  <td>diam</td>\n                  <td>Sed</td>\n                  <td>nisi</td>\n                </tr>\n                <tr>\n                  <td>1,005</td>\n                  <td>Nulla</td>\n                  <td>quis</td>\n                  <td>sem</td>\n                  <td>at</td>\n                </tr>\n                <tr>\n                  <td>1,006</td>\n                  <td>nibh</td>\n                  <td>elementum</td>\n                  <td>imperdiet</td>\n                  <td>Duis</td>\n                </tr>\n                <tr>\n                  <td>1,007</td>\n                  <td>sagittis</td>\n                  <td>ipsum</td>\n                  <td>Praesent</td>\n                  <td>mauris</td>\n                </tr>\n                <tr>\n                  <td>1,008</td>\n                  <td>Fusce</td>\n                  <td>nec</td>\n                  <td>tellus</td>\n                  <td>sed</td>\n                </tr>\n                <tr>\n                  <td>1,009</td>\n                  <td>augue</td>\n                  <td>semper</td>\n                  <td>porta</td>\n                  <td>Mauris</td>\n                </tr>\n                <tr>\n                  <td>1,010</td>\n                  <td>massa</td>\n                  <td>Vestibulum</td>\n                  <td>lacinia</td>\n                  <td>arcu</td>\n                </tr>\n                <tr>\n                  <td>1,011</td>\n                  <td>eget</td>\n                  <td>nulla</td>\n                  <td>Class</td>\n                  <td>aptent</td>\n                </tr>\n                <tr>\n                  <td>1,012</td>\n                  <td>taciti</td>\n                  <td>sociosqu</td>\n                  <td>ad</td>\n                  <td>litora</td>\n                </tr>\n                <tr>\n                  <td>1,013</td>\n                  <td>torquent</td>\n                  <td>per</td>\n                  <td>conubia</td>\n                  <td>nostra</td>\n                </tr>\n                <tr>\n                  <td>1,014</td>\n                  <td>per</td>\n                  <td>inceptos</td>\n                  <td>himenaeos</td>\n                  <td>Curabitur</td>\n                </tr>\n                <tr>\n                  <td>1,015</td>\n                  <td>sodales</td>\n                  <td>ligula</td>\n                  <td>in</td>\n                  <td>libero</td>\n                </tr>\n              </tbody>\n            </table>\n          </div>', NULL, 2),
(4, 'Trump sẽ không thăm khu phi quân sự liên Triều\n', '<div class=\"table-responsive\">\n            <table class=\"table table-striped\">\n              <thead>\n                <tr>\n                  <th>#</th>\n                  <th>Header</th>\n                  <th>Header</th>\n                  <th>Header</th>\n                  <th>Header</th>\n                </tr>\n              </thead>\n              <tbody>\n                <tr>\n                  <td>1,001</td>\n                  <td>Lorem</td>\n                  <td>ipsum</td>\n                  <td>dolor</td>\n                  <td>sit</td>\n                </tr>\n                <tr>\n                  <td>1,002</td>\n                  <td>amet</td>\n                  <td>consectetur</td>\n                  <td>adipiscing</td>\n                  <td>elit</td>\n                </tr>\n                <tr>\n                  <td>1,003</td>\n                  <td>Integer</td>\n                  <td>nec</td>\n                  <td>odio</td>\n                  <td>Praesent</td>\n                </tr>\n                <tr>\n                  <td>1,003</td>\n                  <td>libero</td>\n                  <td>Sed</td>\n                  <td>cursus</td>\n                  <td>ante</td>\n                </tr>\n                <tr>\n                  <td>1,004</td>\n                  <td>dapibus</td>\n                  <td>diam</td>\n                  <td>Sed</td>\n                  <td>nisi</td>\n                </tr>\n                <tr>\n                  <td>1,005</td>\n                  <td>Nulla</td>\n                  <td>quis</td>\n                  <td>sem</td>\n                  <td>at</td>\n                </tr>\n                <tr>\n                  <td>1,006</td>\n                  <td>nibh</td>\n                  <td>elementum</td>\n                  <td>imperdiet</td>\n                  <td>Duis</td>\n                </tr>\n                <tr>\n                  <td>1,007</td>\n                  <td>sagittis</td>\n                  <td>ipsum</td>\n                  <td>Praesent</td>\n                  <td>mauris</td>\n                </tr>\n                <tr>\n                  <td>1,008</td>\n                  <td>Fusce</td>\n                  <td>nec</td>\n                  <td>tellus</td>\n                  <td>sed</td>\n                </tr>\n                <tr>\n                  <td>1,009</td>\n                  <td>augue</td>\n                  <td>semper</td>\n                  <td>porta</td>\n                  <td>Mauris</td>\n                </tr>\n                <tr>\n                  <td>1,010</td>\n                  <td>massa</td>\n                  <td>Vestibulum</td>\n                  <td>lacinia</td>\n                  <td>arcu</td>\n                </tr>\n                <tr>\n                  <td>1,011</td>\n                  <td>eget</td>\n                  <td>nulla</td>\n                  <td>Class</td>\n                  <td>aptent</td>\n                </tr>\n                <tr>\n                  <td>1,012</td>\n                  <td>taciti</td>\n                  <td>sociosqu</td>\n                  <td>ad</td>\n                  <td>litora</td>\n                </tr>\n                <tr>\n                  <td>1,013</td>\n                  <td>torquent</td>\n                  <td>per</td>\n                  <td>conubia</td>\n                  <td>nostra</td>\n                </tr>\n                <tr>\n                  <td>1,014</td>\n                  <td>per</td>\n                  <td>inceptos</td>\n                  <td>himenaeos</td>\n                  <td>Curabitur</td>\n                </tr>\n                <tr>\n                  <td>1,015</td>\n                  <td>sodales</td>\n                  <td>ligula</td>\n                  <td>in</td>\n                  <td>libero</td>\n                </tr>\n              </tbody>\n            </table>\n          </div>', NULL, 2),
(5, 'Vui vui buồn buồn', '<p>Viết cho c&oacute;</p>\r\n', 'd41faa7f38cc3b8bc64170f30a16a9d5.jpg', 2),
(6, 'q', '<p>q</p>\r\n', '', 1),
(7, 'qqqqqqqqqqqqqqqqqqqqqqqqqqq', '<p>aaaaaaaaaaaaaaaaaaa</p>\r\n', '3b7b7069176210606ff00d844de18bf8.jpg', 1),
(8, 'qqqqqqqqqqqqqqqqqqqqqqqqqqq', '<p>aaaaaaaaaaaaaaaaaaa</p>\r\n', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `capquantri`
--

CREATE TABLE `capquantri` (
  `MaCapQuanTri` int(11) NOT NULL,
  `TenCapQuanTri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `capquantri`
--

INSERT INTO `capquantri` (`MaCapQuanTri`, `TenCapQuanTri`) VALUES
(1, 'Thành viên'),
(2, 'Quản trị viên 1');

-- --------------------------------------------------------

--
-- Table structure for table `capquantri_quyenhan`
--

CREATE TABLE `capquantri_quyenhan` (
  `MaCapQuanTri` int(11) NOT NULL,
  `MaQuyenHan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `capquantri_quyenhan`
--

INSERT INTO `capquantri_quyenhan` (`MaCapQuanTri`, `MaQuyenHan`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `hoso`
--

CREATE TABLE `hoso` (
  `MaHoSo` int(11) NOT NULL,
  `MaHoToc` int(11) NOT NULL,
  `MaHoSoBo` int(11) DEFAULT NULL,
  `MaHoSoMe` int(11) DEFAULT NULL,
  `HoTen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DoiThu` int(11) NOT NULL,
  `ConThu` int(11) NOT NULL,
  `QueQuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DanToc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Kinh',
  `TonGiao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `QuocTich` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Việt Nam',
  `HocVan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NgheNghiep` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NgayMat` date DEFAULT NULL,
  `NguoiKy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HinhAnh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NgayCapNhat` date NOT NULL,
  `NoiAnTang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DaMat` tinyint(1) DEFAULT '0',
  `Email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SDT` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoso`
--

INSERT INTO `hoso` (`MaHoSo`, `MaHoToc`, `MaHoSoBo`, `MaHoSoMe`, `HoTen`, `NgaySinh`, `GioiTinh`, `DoiThu`, `ConThu`, `QueQuan`, `DanToc`, `TonGiao`, `QuocTich`, `HocVan`, `NgheNghiep`, `NgayMat`, `NguoiKy`, `HinhAnh`, `NgayCapNhat`, `NoiAnTang`, `DaMat`, `Email`, `DiaChi`, `SDT`) VALUES
(1, 1, NULL, NULL, 'Nguyễn Hữu Nhất', '1900-10-01', 'Nam', 9, 1, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, '', '', ''),
(2, 1, NULL, NULL, 'Nguyễn Hữu Tý', '1997-01-01', 'Nam', 10, 2, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, '', '', ''),
(3, 1, 11, NULL, 'Nguyễn Hữu Nhì', '1991-01-01', 'Nam', 1, 1, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, '', '', ''),
(4, 1, NULL, NULL, 'Nguyễn Hữu Tam', '1997-01-01', 'Nam', 10, 2, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, '', '', ''),
(5, 1, 1, NULL, 'Nguyễn Văn Tứ', '0000-00-00', '', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, '', '', ''),
(6, 1, 2, NULL, 'Nguyễn Thị Ngũ', '0000-00-00', '', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, '', '', ''),
(7, 1, 2, NULL, 'Nguyễn Văn Cờ', '0000-00-00', '', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, '', '', ''),
(8, 1, 7, NULL, 'Nguyễn Văn Lục', '1997-01-01', 'Nam', 1, 1, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, '', '', ''),
(9, 1, 8, NULL, 'Nguyễn Văn Tý', '0000-00-00', 'Nam', 1, 1, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, '', '', ''),
(11, 1, 10, NULL, 'Nguyễn Hữu Thất', '0000-00-00', 'Nam', 1, 1, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(12, 1, NULL, NULL, 'Nguyễn Hữu Ngọc', '0000-00-00', 'Nam', 1, 1, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(13, 1, NULL, NULL, 'Nguyễn Thị Phở', '0000-00-00', 'Nam', 1, 1, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(15, 1, 0, NULL, 'Nguyễn Phát Tài', '0000-00-00', 'Nam', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(16, 1, NULL, NULL, 'Nguyễn Ngọc Anh', '0000-00-00', 'Nam', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(18, 1, 9, NULL, 'Nguyễn Thập Nhất', '0000-00-00', 'Nam', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(19, 1, 9, NULL, 'Nguyễn Thập Tam', '0000-00-00', 'Nam', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(20, 1, 9, NULL, 'Nguyễn Hoa Kỳ', '0000-00-00', 'Nam', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(21, 1, 9, NULL, 'Nguyễn Hoàng Úc', '0000-00-00', 'Nam', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(22, 1, 9, NULL, 'Nguyễn Sinh Ga', '0000-00-00', 'Nam', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(23, 1, 9, NULL, 'Nguyễn Thị Ý', '0000-00-00', 'Nam', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(24, 1, 9, NULL, 'Nguyễn Văn Hải', '0000-00-00', 'Nam', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(25, 1, 9, NULL, 'Nguyễn Tài Lẻ', '0000-00-00', 'Nam', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(26, 1, 9, NULL, 'Nguyễn Văn Tên', '0000-00-00', 'Nam', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(27, 1, 9, NULL, 'Nguyễn Văn Tét', '0000-00-00', 'Nam', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(28, 1, 9, NULL, 'Nguyễn Văn Đép', '0000-00-00', 'Nam', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(29, 1, 9, NULL, 'Nguyễn Văn Tơ', '0000-00-00', 'Nam', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(31, 1, 9, NULL, 'Nguyễn Văn Dữ', '0000-00-00', 'Nam', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, NULL, NULL, NULL),
(34, 1, NULL, NULL, 'Nguyễn Văn Tý', '0000-00-00', 'Nam', 9, 9, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL),
(35, 1, NULL, NULL, 'Nguyễn Văn Tý', '0000-00-00', 'Nam', 1, 1, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, '12b811177aab27ff8c752d64be3a2df2.jpg', '0000-00-00', NULL, 0, NULL, NULL, NULL),
(36, 1, NULL, NULL, 'Nguyễn Văn Hà', '0000-00-00', 'Nam', 6, 9, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL),
(37, 1, NULL, NULL, 'Nguyễn Thị Nga', '0000-00-00', 'Nam', 1, 1, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL),
(38, 1, 0, NULL, 'Nguyễn Thị Nữ', '0000-00-00', 'Nam', 1, 1, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL),
(39, 1, NULL, NULL, 'Nguyễn Hoàng Tuấn', '0000-00-00', 'Nam', 1, 1, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL),
(40, 1, NULL, NULL, 'Văn Test', '0000-00-00', 'Nam', 1, 1, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL),
(41, 1, NULL, NULL, 'Nguyễn Văn Hô', '0000-00-00', 'Nam', 0, 0, NULL, 'Kinh', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hosongoaitoc`
--

CREATE TABLE `hosongoaitoc` (
  `MaHoSo` int(11) NOT NULL,
  `MaHoSoNT` int(11) NOT NULL,
  `HoTenBo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HoTenMe` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HoTen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HinhAnh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DoiThu` int(11) DEFAULT NULL,
  `ConThu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hosongoaitoc`
--

INSERT INTO `hosongoaitoc` (`MaHoSo`, `MaHoSoNT`, `HoTenBo`, `HoTenMe`, `HoTen`, `NgaySinh`, `GioiTinh`, `HinhAnh`, `DoiThu`, `ConThu`) VALUES
(1, 1, 'Hoàng Thị Bố', 'Hoàng Thị Mẹ', 'Hoàng Thị Linh', '0000-00-00', 'Nam', NULL, 0, 0),
(1, 2, '1', '1', '11', '0000-00-00', 'Nam', NULL, 1, 1),
(1, 3, '1', '1', '11', '0000-00-00', 'Nam', NULL, 1, 1),
(1, 4, '1', '1', '11', '0000-00-00', 'Nam', NULL, 1, 1),
(1, 5, '1', '1', '11', '0000-00-00', 'Nam', NULL, 1, 1),
(1, 6, '1', '1', '11', '0000-00-00', 'Nam', NULL, 1, 1),
(1, 7, 'q', 'q', 'q', '0000-00-00', 'Nam', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotoc`
--

CREATE TABLE `hotoc` (
  `MaHoToc` int(11) NOT NULL,
  `TenHoToc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotoc`
--

INSERT INTO `hotoc` (`MaHoToc`, `TenHoToc`) VALUES
(1, 'Tộc Nguyễn Hữu');

-- --------------------------------------------------------

--
-- Table structure for table `loaitin`
--

CREATE TABLE `loaitin` (
  `MaLoaiTin` int(11) NOT NULL,
  `TenLoaiTin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaitin`
--

INSERT INTO `loaitin` (`MaLoaiTin`, `TenLoaiTin`) VALUES
(1, 'Tin vui'),
(2, 'Tin buon');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'First Post', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2017-06-25 15:32:36'),
(2, 'First Post', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2017-06-25 15:33:06'),
(3, 'Second Post', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2017-06-25 15:33:15'),
(4, 'Second Post', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2017-06-25 15:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `quyenhan`
--

CREATE TABLE `quyenhan` (
  `MaQuyenHan` int(11) NOT NULL,
  `TenQuyenHan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quyenhan`
--

INSERT INTO `quyenhan` (`MaQuyenHan`, `TenQuyenHan`) VALUES
(1, 'Thêm hồ sơ mới'),
(2, 'Thêm bài viết'),
(3, 'Thêm sự kiện/ hội họp'),
(4, 'Chỉnh sửa hồ sơ');

-- --------------------------------------------------------

--
-- Table structure for table `remembered_logins`
--

CREATE TABLE `remembered_logins` (
  `token_hash` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `remembered_logins`
--

INSERT INTO `remembered_logins` (`token_hash`, `user_id`, `expires_at`) VALUES
('6d79975e75c161f2d35874889ffdeb98d2ac01d81ba27d3ad3f9f3dbfe55ac92', 42, '2017-12-03 15:33:01'),
('b89d28b9dd772900f5b8688ee787c7b143f97dd996b59960a33ecc3c21320bd9', 42, '2017-12-03 13:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_reset_hash` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_reset_expires_at` datetime DEFAULT NULL,
  `activation_hash` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `MaHoSo` int(11) DEFAULT NULL,
  `MaCapQuanTri` int(11) DEFAULT '1',
  `HinhAnh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password_hash`, `password_reset_hash`, `password_reset_expires_at`, `activation_hash`, `is_active`, `MaHoSo`, `MaCapQuanTri`, `HinhAnh`) VALUES
(42, 'Nguyễn Hữu Tý', 'typrone1@gmail.com', '$2y$10$xe3CjsdTqy.8LMWRPzjgYesRLoW4ubhymNSB3vCYnIp/QkRbAv8B2', NULL, NULL, 'a254da2a7bf7b75df3cee412839ad9273d4abe290bae9ce8aa33610ef8958326', 1, NULL, 2, '17e514e2757b265af08cf6f5d5de18a8.jpg'),
(45, 'TÝ', 'typrone2@gmail.com', '$2y$10$xe3CjsdTqy.8LMWRPzjgYesRLoW4ubhymNSB3vCYnIp/QkRbAv8B2', NULL, NULL, '14bd8d3908a77a61c6261509f66623e3e3e7bbb98b0eaa3e89a82ddf1f7bee3f', 1, NULL, 1, 'ce5df02c5876482bacecec106390c6e4.jpg'),
(46, 'Nguyễn', 'typrone3@gmail.com', '$2y$10$8H/U3lBjzZM8fNOu0iE3iuCjajQ6SstwP9uXZ3bOrNq/YBa7UxL7e', NULL, NULL, 'dfcc3ef3a26cf6e48e5d962423fb5dc84f3a3dd696c5a4979163a65b971f7dac', 1, NULL, 1, '36dbda31060873c4e1b6d9ad473c53a4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`MaBaiViet`),
  ADD KEY `MaLoaiTin` (`MaLoaiTin`);

--
-- Indexes for table `capquantri`
--
ALTER TABLE `capquantri`
  ADD PRIMARY KEY (`MaCapQuanTri`);

--
-- Indexes for table `capquantri_quyenhan`
--
ALTER TABLE `capquantri_quyenhan`
  ADD PRIMARY KEY (`MaCapQuanTri`,`MaQuyenHan`),
  ADD KEY `capquantri_quyenhan_ibfk_2` (`MaQuyenHan`);

--
-- Indexes for table `hoso`
--
ALTER TABLE `hoso`
  ADD PRIMARY KEY (`MaHoSo`);

--
-- Indexes for table `hosongoaitoc`
--
ALTER TABLE `hosongoaitoc`
  ADD PRIMARY KEY (`MaHoSoNT`),
  ADD KEY `MaHoSo` (`MaHoSo`);

--
-- Indexes for table `hotoc`
--
ALTER TABLE `hotoc`
  ADD PRIMARY KEY (`MaHoToc`);

--
-- Indexes for table `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`MaLoaiTin`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quyenhan`
--
ALTER TABLE `quyenhan`
  ADD PRIMARY KEY (`MaQuyenHan`);

--
-- Indexes for table `remembered_logins`
--
ALTER TABLE `remembered_logins`
  ADD PRIMARY KEY (`token_hash`),
  ADD KEY `remembered_logins_ibfk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_hash` (`password_reset_hash`),
  ADD UNIQUE KEY `activation_hash` (`activation_hash`),
  ADD KEY `MaHoSo` (`MaHoSo`),
  ADD KEY `MaCapQuanTri` (`MaCapQuanTri`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `MaBaiViet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `capquantri`
--
ALTER TABLE `capquantri`
  MODIFY `MaCapQuanTri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hoso`
--
ALTER TABLE `hoso`
  MODIFY `MaHoSo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `hosongoaitoc`
--
ALTER TABLE `hosongoaitoc`
  MODIFY `MaHoSoNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `hotoc`
--
ALTER TABLE `hotoc`
  MODIFY `MaHoToc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loaitin`
--
ALTER TABLE `loaitin`
  MODIFY `MaLoaiTin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `quyenhan`
--
ALTER TABLE `quyenhan`
  MODIFY `MaQuyenHan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `baiviet_ibfk_1` FOREIGN KEY (`MaLoaiTin`) REFERENCES `loaitin` (`MaLoaiTin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `capquantri_quyenhan`
--
ALTER TABLE `capquantri_quyenhan`
  ADD CONSTRAINT `capquantri_quyenhan_ibfk_1` FOREIGN KEY (`MaCapQuanTri`) REFERENCES `capquantri` (`MaCapQuanTri`) ON UPDATE CASCADE,
  ADD CONSTRAINT `capquantri_quyenhan_ibfk_2` FOREIGN KEY (`MaQuyenHan`) REFERENCES `quyenhan` (`MaQuyenHan`) ON UPDATE CASCADE;

--
-- Constraints for table `hosongoaitoc`
--
ALTER TABLE `hosongoaitoc`
  ADD CONSTRAINT `hosongoaitoc_ibfk_1` FOREIGN KEY (`MaHoSo`) REFERENCES `hoso` (`MaHoSo`);

--
-- Constraints for table `remembered_logins`
--
ALTER TABLE `remembered_logins`
  ADD CONSTRAINT `remembered_logins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`MaHoSo`) REFERENCES `hoso` (`MaHoSo`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`MaCapQuanTri`) REFERENCES `capquantri` (`MaCapQuanTri`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
