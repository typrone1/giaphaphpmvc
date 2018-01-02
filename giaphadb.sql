-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2018 at 04:48 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giaphadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `MaBaiViet` int(11) NOT NULL,
  `TieuDe` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` text COLLATE utf8_unicode_ci,
  `MaLoaiTin` int(11) NOT NULL,
  `NgayDuaTin` date NOT NULL,
  `MaThanhVien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`MaBaiViet`, `TieuDe`, `NoiDung`, `HinhAnh`, `MaLoaiTin`, `NgayDuaTin`, `MaThanhVien`) VALUES
(1, 'Vài nét về Gia Phả học', '1.2 Chức năng của Gia phả học:\n\nMỗi một môn khoa học đều có một số chức năng nhất định. Chức năng của mỗi môn khoa học được phản ánh ở mối quan hệ và sự tác động qua lại của chính môn khoa họ', '31e94d507f4dfd39bf66d1ca7a045de3.png', 1, '0000-00-00', 27),
(2, 'Viết gia phả thế nào?', 'Một gia phả hoàn chỉnh bao gồm những phần sau đây:\n- Trước hết, phải có thông tin về người sao lục (biên soạn ) là ai, tên gì, thuộc đời thứ mấy, triều vua nào, năm nào… và tên người tục biên qua các đời cũng có cước chú rõ ràng.\n- Tiếp theo, là phả ký hay là gia sử. Nêu nguồn gốc xuất xứ của gia tộc.\n- Tiếp theo, là Thuỷ tổ của dòng họ.\n- Sau đó, là từng phả hệ phát sinh từ Thuỷ Tổ cho đến các đời con cháu sau này. Đây là phần quan trọng nhất của gia phả. Có phần phả đồ, là cách vẽ như một cây, từng gia đình là từng nhánh, từ gốc đến ngọn cho dễ theo dõi từng đời. Đối với tiền nhân có các mục sau đây:\n\n* Tên: Gồm tên huý, tên tự, biệt hiệu, thụy hiệu và tên gọi thông thường theo tập quán địa phương? Thuộc đời thứ mấy?\n* Con trai thứ mấy của ông nào? Bà nào?\n* Ngày tháng năm sinh (có người còn ghi được cả giờ sinh).\n* Ngày, tháng, năm mất? Thọ bao nhiêu tuổi?\n* Mộ táng tại đâu? (có người ghi được cả nguyên táng, cải táng, di táng tại đâu? Vào tháng, năm nào?).\n* Học hành, thi cử, đậu đạt, chức vụ, địa vị lúc sinh thời và truy phong sau khi mất: Thi đậu học vị gì? Khoa nào? Triều vua nào? Nhận chức vị gì? năm nào? Được ban khen và hưởng tước lộc gì? Sau khi mất được truy phong chức gì? Tước gì? (Đối với những vị hiển đạt thì mục này rất dài. Ví dụ trong Nghi Tiên Nguyễn gia thế phả, chỉ riêng Xuân quận công Nguyễn Nghiễm, mục này đã trên mười trang)\n* Vợ: Chánh thất, kế thất, thứ thất... Họ tên, con gái thứ mấy của ông nào, bà nào? Quê ở đâu? Các mục ngày, tháng, năm sinh, ngày, tháng, năm mất, tuổi thọ, mộ, đều ghi từng người như trên. Nếu có thi đậu hoặc có chức tước, địa vị, được ban thưởng riêng thì ghi thêm.\n* Con: Ghi theo thứ tự năm sinh, nếu nhiều vợ thì ghi rõ con bà nào? Con gái thì cước chú kỹ: Con gái thứ mấy, đã lấy chồng thì ghi tên họ chồng, năm sinh, con ông bà nào, quê quán, đậu đạt, chức tước? Sinh con mấy trai mấy gái, tên gì? (Con gái có cước chú còn con trai không cần vì có mục riêng từng người thuộc đời sau).\n* Những gương sáng, những tính cách, hành trạng đặc biệt, hoặc những công đức đối với làng xã, họ hàng, xóm giềng.. Những lời dạy bảo con cháu đời sau ( di huấn), những lời di chúc…\n* Ngoài những mục ghi trên, gia phả nhiều họ còn lưu lại nhiều sự tích đặc biệt của các vị tiên tổ, những đôi câu đối, những áng văn hay, những bài thuốc gia truyền...đó là những tài sản quý giá mà chúng ta để thất truyền, chưa biết khai thác. \n\nTiếp theo, là tộc ước. Đây là những quy định-quy ước trong tộc họ, đặt ra nhằm ổn định tộc họ, có công thưởng, có tội phạt , tất nhiên là phải phù hợp với luật pháp chung.\n- Với một tộc họ lớn, có thể có nhiều tông nhánh, chi phái. Phần này sẽ ghi những thông tin chi phái, ai là bắt đâu chi, chi hiện ở đâu, nhà thờ chi…\n- Những thông tin khác về tài sản hương hỏa, bản đồ các khu mộ tiền nhân v.v.', '', 1, '0000-00-00', 27),
(3, 'Bản gợi ý về việc viết Gia phả, Tộc phả', '<p>Dịch phả v&agrave; viết phả l&agrave; việc l&agrave;m s&ocirc;i động của nhiều d&ograve;ng Họ tại Việt Nam. Nhiều chi Họ đ&atilde; dịch phả chữ nho ra quốc ngữ v&agrave; viết phả mới. Song nhiều Họ chỉ l&agrave;m đ&shy;ư&shy;ợc phả tiểu chi độ 4, 5 đời nhờ v&agrave;o vị tr&iacute; c&aacute;c cụ cao tuổi c&ograve;n sống v&igrave; kh&ocirc;ng c&oacute; gia phả cũ để lại. Một số Họ đ&atilde; viết đ&shy;ư&shy;ợc tộc phả từ 15 đến 20 đời. Tuy nhi&ecirc;n nhiều tộc phả đư&shy;&shy;ợc viết ch&shy;ư&shy;a hội đủ c&aacute;c nh&aacute;nh, c&aacute;c chi đ&atilde; di chuyển đi&nbsp;một số v&ugrave;ng, miền kh&aacute;c nhau v&igrave; chư&shy;a c&oacute; c&ocirc;ng sư&shy;u tập tư&shy; liệu, chắp nối hệ tộc. Nh&igrave;n chung, việc viết phả của nhiều chi Họ c&ograve;n đơn giản, nội dung c&aacute;c bản phả c&ograve;n ngh&egrave;o n&agrave;n v&igrave; chư&shy;a coi phả l&agrave; cuốn tiểu sử của gia tộc, d&ograve;ng Họ.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Qua nghi&ecirc;n cứu c&aacute;c b&agrave;i hư&shy;ớng dẫn viết phả của một số t&aacute;c giả, tham khảo một số bản phả v&agrave; trực tiếp viết phả, ch&uacute;ng t&ocirc;i xin n&ecirc;u ra một số gợi &yacute; để c&aacute;c chi họ Đo&agrave;n ở địa phư&shy;ơng tham khảo, vận dụng v&agrave;o việc bi&ecirc;n tập phả.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tr&shy;ước hết ch&uacute;ng ta cần thống nhất về mục đ&iacute;ch viết phả l&agrave; gi&uacute;p con ch&aacute;u hiện nay v&agrave; mai sau biết đ&shy;ược:</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Nguồn gốc của tổ ti&ecirc;n v&agrave; sự ph&aacute;t triển của d&ograve;ng Họ.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Truyền thống văn h&oacute;a của c&aacute;c d&ograve;ng Họ: đạo đức, lối sống, học tập, lao động, th&agrave;nh đạt....c&ocirc;ng lao của tổ ti&ecirc;n đối với đất n&shy;ước v&agrave; d&ograve;ng Họ.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- C&aacute;c c&agrave;nh c&aacute;c nh&aacute;nh, c&aacute;c chi họ, ng&ocirc;i thứ từng ngư&shy;ời trong họ l&agrave;m cơ sở giao tiếp, ứng xử đ&uacute;ng đắn.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Phả c&ograve;n l&agrave; nguồn t&shy;ư liệu qu&yacute;&nbsp;&nbsp;gi&uacute;p bổ sung cho lịch sử quốc gia v&agrave; địa phư&shy;ơng.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dĩ nhi&ecirc;n mức độ t&aacute;c dụng của cuốn phả c&ograve;n tuy thuộc ở chất l&shy;ượng của d&ograve;ng Họ v&agrave; c&ocirc;ng phu của ng&shy;ười bi&ecirc;n tập.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ch&uacute;ng ta hiện c&oacute; 2 loại phả: gia phả v&agrave; tộc phả. Gia phả l&agrave; của một tiểu chi tối đa c&oacute; 5 đời. C&ograve;n tộc phả l&agrave; phả của một chi họ, nh&aacute;nh họ hay một d&ograve;ng họ c&oacute; nhiều đời con ch&aacute;u, c&oacute; thể định cư&shy; ở nhiều địa phư&shy;ơng kh&aacute;c nhau.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Muốn l&agrave;m tộc phả n&ecirc;n bắt đầu viết gia phả tiểu chi. C&acirc;u lạc bộ UNESCO th&ocirc;ng tin c&aacute;c d&ograve;ng Họ đang ph&aacute;t động v&agrave; khuyến kh&iacute;ch tất cả c&aacute;c Họ đều viết gia phả tiểu chi. Đ&acirc;y cũng l&agrave; điều rất n&ecirc;n l&agrave;m đối với Họ Đo&agrave;n ch&uacute;ng ta. Ch&uacute;ng t&ocirc;i đề nghi tất cả c&aacute;c tiểu chi Họ Đo&agrave;n đang định c&shy;ư ở bất cứ địa phương n&agrave;o&nbsp;&nbsp;đều n&ecirc;n cử ng&shy;ười l&agrave;m gia phả tiểu chi, hay tổ chức ban bi&ecirc;n tập phả Họ, d&ugrave; c&oacute; gia phả cũ để lại hay kh&ocirc;ng.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Đối với những tiểu chi Họ kh&ocirc;ng c&oacute; gia phả cũ để lại, kh&ocirc;ng biết đ&shy;ược nguồn g&ocirc;c Họ từ đ&acirc;u th&igrave; n&ecirc;n họp c&aacute;c cụ cao tuổi của Họ đang định c&shy;ư trong th&ocirc;n hoặc c&aacute;c th&ocirc;n kh&aacute;c c&oacute; quan hệ d&ograve;ng tộc, gặp th&ecirc;m c&aacute;c vị cao tuổi ở họ kh&aacute;c c&oacute; quan hệ th&ocirc;ng gia với họ Đo&agrave;n hoặc biết nhiều về Họ Đo&agrave;n để b&agrave;n bạc, t&igrave;m hiểu thế thứ của c&aacute;c vị đa qua đời v&agrave; con ch&aacute;u của c&aacute;c vị đ&oacute;. Đồng thời, lấy những ng&shy;ười con của Họ đư&shy;ợc sinh ra trong những năm cuối c&ugrave;ng của thế kỷ 20, để k&ecirc; l&ecirc;n c&aacute;c đời tr&ecirc;n l&agrave; cha , &ocirc;ng, cụ, rồi đến cố....h&igrave;nh th&agrave;nh n&ecirc;n một hồ sơ ho&agrave;n chỉnh của tiểu chi tr&shy;ước khi viết phả ch&iacute;nh thức. Từ gia phả tiểu chi 4 hay 5 đời, chắp nối l&ecirc;n tr&ecirc;n với c&aacute;c tiểu chi đồng tộc để h&igrave;nh th&agrave;nh phả của chi Họ l&agrave; khả năng s&shy;ưu tầm tư&shy; liệu v&agrave; nghi&ecirc;n cứu của ng&shy;ười viết v&agrave; quyết t&acirc;m của chi Họ đ&oacute;.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nếu họ đ&oacute; c&oacute; gia phả bằng H&aacute;n n&ocirc;m, th&igrave; dịch ra quốc ngữ. Bản dịch phải đảm bảo Đ&uacute;ng &acirc;m, từ Tiếng Việt, nhất l&agrave; t&ecirc;n ng&shy;ười, t&ecirc;n địa ph&shy;ương, n&ecirc;n đối chiếu với t&ecirc;n đư&shy;ợc b&agrave; con địa phư&shy;ơng quen gọi v&agrave; lập phả đồ cho đ&uacute;ng. Căn cứ v&agrave;o cuốn phả đư&shy;ợc dịch, t&iacute;nh từ cụ tổ đầu ti&ecirc;n cho đến lớp con ch&aacute;u hiện nay l&agrave; mấy đời, h&igrave;nh th&agrave;nh bao nhi&ecirc;u nh&aacute;nh, chi hoặc tiểu chi Họ ở nguy&ecirc;n qu&aacute;n hay di c&shy;ư ở địa ph&shy;ương n&agrave;o. Đ&acirc;y l&agrave; cơ sở để ch&uacute;ng ta định liệu việc l&agrave;m phả cho từng nh&aacute;nh, từng chi, tr&ecirc;n cơ sở c&aacute;c phả của tiểu chi chắp nối lại. Ngo&agrave;i gia phả của tiểu chi, ta ho&agrave;n to&agrave;n c&oacute; thể viết phả cho từng nh&aacute;nh, từng chi Họ ....h&igrave;nh th&agrave;nh hệ thống phả của một d&ograve;ng họ lớn c&oacute; nhiều đời.... l&agrave; t&ugrave;y thuộc v&agrave;o y&ecirc;u cầu v&agrave; khả năng của từng Họ.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Muốn viết gia phả hay phả tộc th&igrave; tr&shy;ước hết phải lập phả đồ. Phả đồ phải ghi đủ họ, t&ecirc;n những ng&shy;ười con trai, con g&aacute;i của họ theo đ&uacute;ng thế thứ : ng&shy;ười sinh tr&shy;ước ghi t&ecirc;n trư&shy;ớc, sinh sau ghi sau - kh&ocirc;ng kể nam hay nữ - con vợ trư&shy;ớc ghi trư&shy;ớc, c&oacute; vợ sau ghi sau- d&ugrave; sinh tr&shy;ước. V&igrave; phải bảo đảm ghi đầyđủ, ch&iacute;nh x&aacute;c tất cả những ng&shy;ười con của họ v&agrave; cũng do t&iacute;nh han hẹp của sơ đồ n&ecirc;n kh&ocirc;ng thể ghi con d&acirc;u, con rể, ch&aacute;u ngoại của Họ, phần n&agrave;y sẽ đ&shy;ược bổ sung khi bi&ecirc;n soạn phả.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hiện nay ch&uacute;ng ta c&oacute; nhiều loại họ, to nhỏ kh&aacute;c nhau, từ 4 đến 20 đời hay hơn nữa. Theo thiển nghĩ của ch&uacute;ng t&ocirc;i th&igrave; họ n&agrave;o c&oacute; phả H&aacute;n n&ocirc;m để lại ch&uacute;ng ta cũng chỉ c&oacute; thể v&agrave; n&ecirc;n l&agrave;m một phả tộc tối đa&nbsp;&nbsp;l&agrave; 20 đời, l&agrave; phả của một d&ograve;ng họ đ&atilde; tồn tại v&agrave; ph&aacute;t triển từ 500 đến 550 năm. Đ&acirc;y đ&shy;ược coi l&agrave; một c&ocirc;ng tr&igrave;nh kh&aacute; lớn nếu&nbsp;ta d&agrave;y c&ocirc;ng&nbsp;s&shy;ưu tầm tư&shy; liệu v&agrave; bi&ecirc;n tập, v&agrave; l&agrave; một t&agrave;i sản qu&yacute; gi&aacute; đối với con em trong họ.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Để l&agrave;m một tộc phả nhiều đời, ch&uacute;ng ta lấy chi họ 5 đời l&agrave;m cơ sở để ph&acirc;n ra th&agrave;nh c&agrave;nh, nh&aacute;nh chi v&agrave; tiểu chi t&ugrave;y thuộc quy m&ocirc; to, nhỏ của từng họ. Nếu họ c&oacute; 20 đời th&igrave; họ đ&oacute; c&oacute; đủ c&agrave;nh, nh&aacute;nh, chi v&agrave; tiểu chi. Những ngư&shy;ời sinh ra trong những năm cuối c&ugrave;ng của thế kỷ 20 l&agrave; đời thứ 20, tr&shy;ưởng tiểu chi họ l&agrave; ng&shy;ười thuộc đời thứ 16 hoặc 17; tr&shy;ưởng chi họ l&agrave; những chủ gia đ&igrave;nh từ đời thứ 11 đến thứ&nbsp;&nbsp;15; Tr&shy;ưởng nh&aacute;nh họ l&agrave; những chủ gia đ&igrave;nh thuộc đời thứ 6 đến đời thứ 10; tr&shy;ưởng c&agrave;nh họ l&agrave; những chủ gia đ&igrave;nh thuộc đời thứ 2. Trong mỗi một đời, ai thuộc c&agrave;nh nh&aacute;nh, chi hay tiểu chi n&agrave;o th&igrave; phải để đ&uacute;ng vị tr&iacute;, thứ bậc của ng&shy;ười đ&oacute;. Đ&aacute;nh số thứ tự v&agrave; để trong v&ograve;ng tr&ograve;n những ngư&shy;ơi con trai l&agrave; chủ gia đ&igrave;nh trong mỗi đời. Đ&aacute;nh số thứ tự số con của mỗi gia đ&igrave;nh. Nếu trong nh&aacute;nh, trong chi, trong tiểu chi c&oacute; ng&shy;ười n&agrave;o đ&oacute; kh&ocirc;ng c&oacute; con kế tục đời sau th&igrave; số thứ tự của nh&aacute;nh, chi hay tiểu chi đ&oacute; mất đi.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sơ đồ Họ c&oacute; thể l&agrave;m theo 2 c&aacute;ch: Mẫu 1 l&agrave; hồ sơ một tiểu chi 5 đời t&shy;ương đối &iacute;t nh&acirc;n khẩu. Mẫu 2 l&agrave; sơ đồ chi họ c&oacute; 9 đời. Dung l&shy;ượng của sơ đồ sau n&agrave;y kh&aacute; lớn, nếu d&ugrave;ng giấy khổ rộng c&oacute; thể ghi đủ số ngư&shy;ời của một chi họ lớn (xem 2 sơ đồ&nbsp; k&egrave;m theo). Họ c&oacute; từ 16 đời trở l&ecirc;n th&igrave; sơ đồ chỉ c&oacute; thể t&ecirc;n tr&shy;ưởng c&agrave;nh, trư&shy;ởng nh&aacute;nh, trư&shy;ởng chi, Trư&shy;ởng tiểu chi m&agrave; kh&ocirc;ng thể ghi hết t&ecirc;n những ng&shy;ười trong họ, tuy nhi&ecirc;n nếu họ c&oacute; ng&shy;ười con trai n&agrave;o, bất cứ thuộc đời n&agrave;o đi lập nghiệp ở địa ph&shy;ương kh&aacute;c, h&igrave;nh th&agrave;nh n&ecirc;n nh&aacute;nh hay chi họ ở nơi đ&oacute; thi phải ghi r&otilde; tr&ecirc;n sơ đồ.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sau khi l&agrave;m xong sơ đồ tiểu chi hay cả chi họ cần c&ocirc;ng bố rộng r&atilde;i cho b&agrave; con trong họ biết, tham gia &yacute; kiến bổ sung trư&shy;ớc khi viết phả. Cần thấy rằng th&agrave;nh c&ocirc;ng của cuốn phả phụ thuộc v&agrave;o độ ch&iacute;nh x&aacute;c đ&aacute;ng tin cậy của sơ đồ, do đ&oacute; phải ho&agrave;n chỉnh sơ đồ rồi mới bi&ecirc;n soạn phả.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nội dung một cuốn phả</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thực chất của việc bi&ecirc;n tập phả l&agrave; l&agrave;m tiểu sử của Họ, d&ugrave; tiểu sử của tiểu chi họ c&oacute; 4, 5 đời (đ&shy;ợc coi l&agrave; tiểu sử gia đ&igrave;nh) hay tiểu sử của một chi, một d&ograve;ng Họ c&oacute; nhiều đời th&igrave; nội dung cũng kh&ocirc;ng kh&aacute;c nhau l&agrave; mấy.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trong họ c&oacute; cuốn phả n&ecirc;n c&oacute; 5 phần. Độ d&agrave;i của từng phần tuy theo sự ph&aacute;t triển phong ph&uacute; của từng loại Họ.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phần1: Lời tựa: Ghi 1 số &yacute; sau đ&acirc;y:</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Mục đ&iacute;ch viết phả</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- N&oacute;i về thế thứ, học vị, chức danh ng&shy;ời bi&ecirc;n tập ch&iacute;nh của phả Họ</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Ph&shy;ơng h&shy;ớng bi&ecirc;n tập: dựa tr&ecirc;n phả cũ của cụ n&agrave;o để lại, tr&ecirc;n cơ sở phả của c&aacute;c chi, c&aacute;c tiểu chi họ, c&aacute;c t&shy; liệu... với sự tham gia đống g&oacute;p của b&agrave; con trong họ.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Mong muốn của ng&shy;ời bi&ecirc;n soạn phả.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phần 2: Sơ l&shy;uợc nguồn gốc, qu&aacute; tr&igrave;nh ph&aacute;t triển của d&ograve;ng Họ (hay chi Họ)</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phần n&agrave;y kh&aacute;i qu&aacute;t sự ph&aacute;t triển của d&ograve;ng Họ từ cụ tổ đầu ti&ecirc;n c&oacute; nguồn gốc từ đ&acirc;u, ph&aacute;t triển đến nay đ&shy;ợc bao nhiều đời (c&oacute; ghi mốc quan trọng trong sự ph&aacute;t triển của họ, đối với lịch sử qua c&aacute;c triều vua - cả năm &acirc;m v&agrave; năm d&shy;ơng), c&oacute; sự di c&shy; từ nơi n&agrave;y qua nơi kh&aacute;c của c&aacute;c vị ti&ecirc;n tổ, đẫ ph&aacute;t triển hoặc ti&ecirc;u vong nh&shy; thế n&agrave;o. Phần n&agrave;y chỉ n&ecirc;u những n&eacute;t lớn, những chuyển biến, thăng trầm nổi bật trong sự ph&aacute;t triển của d&ograve;ng Họ, của từng chi Họ, m&agrave; kh&ocirc;ng ghi chi tiết từng ng&shy;ời.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phần 3: Hệ thống c&aacute;c thế hệ của d&ograve;ng Họ (hay chi họ)</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phần n&agrave;y ghi ch&eacute;p với th&acirc;n thế, sự nghiệp t&oacute;m tắt&nbsp;&nbsp;của từng ng&shy;ời trong Họ&nbsp;&nbsp;theo thứ tự từng đời (căn cứ theo sơ đồ ). Từng ng&shy;uời con của Họ phải ghi nh&shy; một l&yacute; lịch tr&iacute;ch ngang: Họ t&ecirc;n, chữ l&oacute;t, t&ecirc;n tự t&ecirc;n h&uacute;y, b&iacute; danh, danh x&shy;ng đ&uacute;ng nh&shy; trong gia phả cũ đ&atilde; viết; ng&agrave;y th&aacute;ng năm sinh cả &acirc;m v&agrave; d&shy;ơng lịch, Học vấn ghi bằng cấp cao nhất ( nếu c&oacute; ); nghề nghiệp: chi nghề ch&iacute;nh, sở tr&shy;ờng, l&agrave;m l&acirc;u nhất. Chức vụ, phẩm h&agrave;m: ghi một số chức danh cao nhất . Khen th&shy;ởng: ghi danh hiệu cao qu&yacute; nhất m&agrave; nh&agrave; n&shy;ớc ban tặng ( kh&ocirc;ng ghi c&aacute;c phần th&shy;ởng&nbsp;&nbsp;theo ni&ecirc;n hạn ). Ng&agrave;y mất, nơi an t&aacute;ng, mộ ch&iacute;, bia, từ đ&shy;ờng(nếu c&oacute;). Tiếp đ&oacute; l&agrave; ghi t&ecirc;n con trai th&igrave; ghi họ, t&ecirc;n vợ, qu&ecirc; qu&aacute;n; họ t&ecirc;n v&agrave; chức vụ ch&iacute;nh của bố vợ, c&ocirc;ng việc v&agrave; chức danh quan trọng nhất (nếu c&oacute;) của ng&shy;ời vợ. Nếu c&oacute; vợ 2, vợ 3 cũng ghi nh&shy; tr&ecirc;n. Nếu l&agrave; ng&shy;ời con g&aacute;i của Họ thi ghi t&ecirc;n, qu&ecirc; qu&aacute;n ng&shy;ời chồng, họ t&ecirc;n v&agrave; chức vụ ch&iacute;nh của bố chồng (nếu c&oacute;). C&ocirc;ng vị&ecirc;c v&agrave; chức danh quan trọng nhất (nếu c&oacute;) của ng&shy;ời chồng. Ghi họ t&ecirc;n c&aacute;c con của ng&shy;ời con g&aacute;i Họ ( tức ch&aacute;u ngoai họ Đo&agrave;n ), trong số n&agrave;y nếu c&oacute; ng&shy;ời n&agrave;o đỗ đạt cao, c&oacute; t&agrave;i, c&oacute; chức danh quan trọng c&oacute; thể chi th&ecirc;m. Phần n&agrave;y cần ghi gọn, r&otilde; r&agrave;ng, kh&ocirc;ng tham chi tiết.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nếu trong Họ c&oacute; ng&shy;ời bị can &aacute;n hoặc c&oacute; th&agrave;nh t&iacute;ch bất hảo, l&agrave;m ảnh h&shy;ởng xấu đến d&ograve;ng Họ cũng cần ghi thực tế h&agrave;nh vi v&agrave; hậu quả. Nếu khắc phục đ&shy;ợc trở n&ecirc;n l&shy;ơng thiện, tốt đẹp, lập đ&shy;ợc c&ocirc;ng lao thi ghi cố gắng đ&oacute;. Về điểm n&agrave;y n&ecirc;n suy nghĩ thật thận trọng để ghi c&oacute; mức độ, vừa phải, ai cũng dễ d&agrave;ng chấp nh&acirc;n.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phần 4:&nbsp;&nbsp;Viết về sự t&iacute;ch v&agrave; truyền thống qu&yacute; b&aacute;u của d&ograve;ng Họ.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phần n&agrave;y c&oacute; 2 nội dung: Một nội dung viết về th&ecirc;n thế, sự nghiệp của c&aacute;c vị ti&ecirc;n tổ theo thứ tự từng đời, thực chất l&agrave; kể về c&aacute;c danh nh&acirc;n, những ng&shy;ời c&oacute; c&ocirc;ng lao đối với sự ph&aacute;t triển v&agrave; l&agrave;m vẻ vang cho d&ograve;ng Họ bằng những t&agrave;i liệu, t&shy; liệu ch&iacute;nh x&aacute;c c&oacute; sức thuyết phục cao.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nội dung thứ 2 viết về truyền thống qu&yacute; b&aacute;u của d&ograve;ng Họ nh&shy; nề nếp gia phong, hiếu học, cần c&ugrave; lao động, đạo đức, lối sống trong quan hệ gia đ&igrave;nh, họ h&agrave;ng, l&agrave;ng n&shy;ớc. Căn cứ v&agrave;o ng&shy;ời thật, việc thật c&aacute;c vị ti&ecirc;n tổ trong Họ tr&shy;ớc bối cảnh lịch sử, x&atilde; hội nhất định m&agrave; đ&uacute;c kết lại để l&agrave;m b&agrave;i học cho c&aacute;c thế hệ sau.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tuy l&agrave; 2 nội dung song c&oacute; thể viết h&ograve;a quyện v&agrave;o một, t&ugrave;y t&igrave;nh h&igrave;nh thực tế của từng Họ, hay chi họ v&agrave; nhận thức cũng nh&shy; khả năng ng&shy;ời viết.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phần 5: Lời kết</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Đ&acirc;y l&agrave; phần cảm nghĩ v&agrave; mong muốn của ng&shy;ời viết sau khi l&agrave;m xong cuốn phả: n&oacute;i l&ecirc;n niềm tự h&agrave;o của con ch&aacute;u đối với tổ ti&ecirc;n, &shy;ớc mong về sự ph&aacute;t triển tốt đẹp của con ch&aacute;u trong học tập,lao động, phấn đấu l&agrave;m vẻ vang cho d&ograve;ng Họ. Nhắc nhở về bổn phận giữ g&igrave;n phả Họ, tiếp tục t&igrave;m hiểu, x&aacute;c minh, bổ sung những chỗ c&ograve;n ch&shy;a đầy đủ, chua r&otilde; r&agrave;ng trong phả Họ.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cuối c&ugrave;ng: Phần phụ lục</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phần n&agrave;y kể về những giai thoại, truyền thuyết (nếu c&oacute;) của tổ ti&ecirc;n nh&shy;ng kh&ocirc;ng ch&eacute;p đ&shy;ợc trong phần 4. Viết hoặc sao chụp c&aacute;c chứng t&iacute;ch nh&shy; phần đầu bản phả h&aacute;n n&ocirc;m, di ch&uacute;c, c&acirc;u đố, bia, t&shy;ợng, từ đ&shy;ờng, văn thơ,.....bằng cả h&aacute;n n&ocirc;m v&agrave; quốc ngữ (c&oacute; phi&ecirc;n &acirc;m dịch nghĩa) v&agrave; cả những t&shy; liệu, t&agrave;i liệu m&agrave; ta đ&atilde; d&ugrave;ng để bi&ecirc;n soạn phả Họ.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Một điều cần ch&uacute; &yacute; khi viết phả: Bi&ecirc;n soạn gia phả l&agrave; viết sử chứ kh&ocirc;ng phải viết văn. Văn của phả l&agrave; phải ngắn gọn, giản dị s&aacute;ng sủa, d&ugrave;ng từ, đặt c&acirc;u phải ch&iacute;nh x&aacute;, r&otilde; r&agrave;ng, dễ hiểu, tr&aacute;nh d&ugrave;ng những từ h&aacute;n việt kh&ocirc;ng c&ograve;n th&ocirc;ng dụng hiện nay, g&acirc;y cho ng&shy;ời đọc kh&oacute; hiểu.</p>\r\n', '1dc7b81ce7bc5dad7d23b7db020e66c6.jpg', 1, '0000-00-00', 27),
(4, 'Tổng hợp kiến thức cơ bản về gia phả', '<p><strong>1. Gia phả l&agrave; g&igrave;?</strong></p>\r\n\r\n<p>Gia phả l&agrave; một từ H&aacute;n Việt, trong đ&oacute; Gia c&oacute; nghĩa l&agrave; gia đ&igrave;nh, gia tộc, họ tộc; Phả (c&ograve;n c&oacute; &acirc;m l&agrave; Phổ) l&agrave; cuốn s&aacute;ch bi&ecirc;n ch&eacute;p con người, &nbsp;sự việc theo thứ tự, hệ thống.&nbsp; Người ta c&oacute; một trong những c&aacute;ch định nghĩa:</p>\r\n\r\n<p><em>Gia phả (hay gia phổ) l&agrave; cuốn s&aacute;ch ghi ch&eacute;p lại lịch sử c&aacute;c thế hệ của một gia đ&igrave;nh hay họ tộc.</em></p>\r\n\r\n<p>T&ugrave;y quy m&ocirc; v&agrave; c&aacute;ch viết, Gia phả c&ograve;n được gọi l&agrave; Tộc phả (Tộc phổ), Phả k&yacute;, Phả ch&iacute;, Phả hệ, Phả truyền. C&aacute;c nh&agrave; t&ocirc;ng thất c&ograve;n gọi gia phả của vương triều, d&ograve;ng tộc m&igrave;nh l&agrave; Ngọc phả, Thế phả.</p>\r\n\r\n<p>Ở c&aacute;c đền miếu, đ&igrave;nh l&agrave;ng cũng c&oacute; c&aacute;c s&aacute;ch ch&eacute;p về lịch sử ra đời của c&ocirc;ng tr&igrave;nh cũng như sự t&iacute;ch, truyền thuyết c&aacute;c Thần, Th&aacute;nh, Th&agrave;nh ho&agrave;ng được thờ phụng. S&aacute;ch đ&oacute; gọi l&agrave; Thần phả, Th&aacute;nh phả.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>2. Nội dung, cấu tr&uacute;c v&agrave; c&aacute;ch tr&igrave;nh b&agrave;y gia phả.</strong></p>\r\n\r\n<p>Căn cứ v&agrave;o nội dung hoặc cấu tr&uacute;c tr&igrave;nh b&agrave;y, người ta chia bản gia phả th&agrave;nh c&aacute;c phần viết kh&aacute;c nhau.</p>\r\n\r\n<p><em>X&eacute;t về nội dung, một bản phả d&ugrave; viết giản đơn hay viết chi tiết thường được chia l&agrave;m 3 bộ phận: lời n&oacute;i đầu (lời tựa), ch&iacute;nh văn gia phả v&agrave; những nội dung viết th&ecirc;m.</em></p>\r\n', 'e2a021870433220e875be98c9bf45323.jpg', 1, '0000-00-00', 27),
(5, 'Những người viết gia phả: “Để kể lại câu chuyện về nòi giống...”', '<p><strong>1% NGƯỜI VIỆT C&Oacute; GIA PHẢ</strong></p>\r\n\r\n<p><strong><em>V&igrave; sao &ocirc;ng cho rằng việc dựng phả l&agrave; quan trọng trong bối cảnh hiện nay, thưa &ocirc;ng?</em></strong></p>\r\n\r\n<p>- Chiến tranh đ&atilde; kết th&uacute;c, đất nước thống nhất gần nửa thế kỷ. Sau những cuộc di cư, ly t&aacute;n, sau chia l&igrave;a chiến tranh v&agrave; sau thời kỳ kh&oacute; khăn về kinh tế, ngh&egrave;o n&agrave;n về học vấn... th&igrave; nay điều kiện x&atilde; hội đủ đầy hơn, t&ocirc;i nghĩ nhiều người đặt c&acirc;u hỏi về tổ ti&ecirc;n n&ograve;i giống, huyết thống, qu&ecirc; xứ của m&igrave;nh. Đ&oacute; l&agrave; l&yacute; do để ch&uacute;ng t&ocirc;i bắt tay v&agrave;o c&ocirc;ng việc n&agrave;y.</p>\r\n\r\n<p><strong><em>Gần đ&acirc;y t&ocirc;i nghe n&oacute;i ngay cả những nh&agrave; l&atilde;nh đạo Việt Nam cũng t&igrave;m đến Trung t&acirc;m Nghi&ecirc;n cứu v&agrave; thực h&agrave;nh gia phả để đặt h&agrave;ng &ldquo;dựng phả&rdquo; cho họ. Theo &ocirc;ng, việc đ&oacute; n&oacute;i l&ecirc;n điều g&igrave;?</em></strong></p>\r\n\r\n<p>- Một số vị l&atilde;nh đạo như Phan Văn Khải, Trần Văn Danh, gia đ&igrave;nh &ocirc;ng L&ecirc; Hồng Anh, &ocirc;ng Trương Tấn Sang, b&agrave; Trương Mỹ Hoa, &ocirc;ng Phạm Ch&aacute;nh Trực... c&oacute; đề nghị ch&uacute;ng t&ocirc;i lập phả. C&ocirc;ng việc của ch&uacute;ng t&ocirc;i được họ hoan ngh&ecirc;nh. L&atilde;nh đạo th&igrave; cũng từ d&acirc;n m&agrave; ra, họ cũng c&oacute; t&acirc;m tư, mong muốn như một người d&acirc;n b&igrave;nh thường, đ&oacute; l&agrave; được biết d&ograve;ng d&otilde;i gốc g&aacute;c của m&igrave;nh. Họ cho rằng sự nghiệp gi&uacute;p b&agrave; con c&oacute; bộ gia phả l&agrave; đ&uacute;ng đắn v&agrave; tin tưởng n&ecirc;n t&igrave;m đến với ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<p>Nhưng kh&ocirc;ng chỉ c&aacute;c vị l&atilde;nh đạo đ&acirc;u, c&oacute; khoảng 151 chi họ kh&aacute;c cũng t&igrave;m đến đặt ch&uacute;ng t&ocirc;i dựng gia phả. Nhiều người d&acirc;n cho rằng việc l&agrave;m lịch sử d&ograve;ng họ c&oacute; nhiều t&aacute;c dụng thiết thực như gi&uacute;p mọi người nhớ ng&agrave;y sinh, ng&agrave;y mất, ng&agrave;y giỗ của &ocirc;ng b&agrave; cha mẹ, biết được t&ecirc;n người tiền nh&acirc;n để sau đặt t&ecirc;n cho con c&aacute;i khỏi tr&ugrave;ng, gi&uacute;p x&atilde; hội t&igrave;m được th&acirc;n thế d&ograve;ng họ của m&igrave;nh, qu&ecirc; hương bổn qu&aacute;n ra sao...</p>\r\n\r\n<p>Với c&ocirc;ng việc nghi&ecirc;n cứu, những bộ gia phả thực tế gi&uacute;p ch&uacute;ng t&ocirc;i c&oacute; dữ liệu h&igrave;nh th&agrave;nh những b&agrave;i học, gi&aacute;o tr&igrave;nh cho học sinh sinh vi&ecirc;n trong trường học... Theo nghi&ecirc;n cứu của viện t&ocirc;i, hiện nay chỉ non 1% người ở Việt Nam c&oacute; gia phả (kể cả mới v&agrave; cũ). Đ&oacute; l&agrave; con số qu&aacute; &iacute;t ỏi.</p>\r\n\r\n<p><strong><em>Tại sao ở một đất nước coi gia đ&igrave;nh l&agrave; tế b&agrave;o x&atilde; hội, xem gia ti&ecirc;n l&agrave; đạo nhưng những t&agrave;ng thư về gia phả, gốc t&iacute;ch trước đ&acirc;y lại chưa được ch&uacute; trọng? C&oacute; bao giờ nguy&ecirc;n nh&acirc;n nằm ở ch&iacute;nh t&acirc;m t&iacute;nh người Việt - kh&ocirc;ng coi trọng việc ghi ch&eacute;p, l&agrave;m tư liệu?</em></strong></p>\r\n\r\n<p>- T&ocirc;i nghĩ trong th&acirc;m t&acirc;m, ai cũng muốn d&ograve;ng họ m&igrave;nh c&oacute; lịch sử th&agrave;nh văn v&igrave; d&ograve;ng họ kh&ocirc;ng c&oacute; lịch sử th&agrave;nh văn th&igrave; th&ocirc;ng tin mờ ảo lắm. Nhưng xưa chỉ những người biết chữ, c&oacute; bằng cấp, trung lưu, quan quyền vua ch&uacute;a mới c&oacute; điều kiện dựng phả.</p>\r\n\r\n<p>Ngo&agrave;i ra, trong qu&aacute; khứ đ&atilde; c&oacute; l&uacute;c nh&agrave; nước m&igrave;nh kh&ocirc;ng xem trọng chuyện gia phả, coi đ&oacute; l&agrave; biểu hiện của sự phục hồi phong kiến. Tư liệu, điều kiện, con người tập trung cho nghi&ecirc;n cứu gia phả cũng &iacute;t ỏi. Cũng c&oacute; yếu tố t&iacute;nh c&aacute;ch người Việt kh&ocirc;ng mặn m&agrave; chuyện l&agrave;m tư liệu như anh n&oacute;i, nhưng điều n&agrave;y cũng phụ thuộc nhận thức v&agrave; d&acirc;n tr&iacute; x&atilde; hội n&oacute;i chung.</p>\r\n\r\n<p><strong><em>Hiện nay c&acirc;u chuyện dựng phả trong d&acirc;n ra sao, thưa &ocirc;ng?</em></strong></p>\r\n\r\n<p>- Trước đ&acirc;y th&ocirc;ng tin gia phả chỉ được &ldquo;lưu&rdquo; ở dạng k&yacute; ức d&ograve;ng họ, tr&iacute; nhớ người n&agrave;y người kia hay c&ugrave;ng lắm l&agrave; tr&ecirc;n bia mộ, giấy tờ h&agrave;nh ch&iacute;nh... B&acirc;y giờ th&igrave; c&oacute; nhiều dạng l&agrave;m gia phả trong d&acirc;n dưới dạng th&agrave;nh văn. V&iacute; dụ hiện nay ở TP.HCM c&oacute; 356 d&ograve;ng họ th&igrave; c&oacute; 30-35 ban li&ecirc;n lạc d&ograve;ng họ được thiết lập. C&aacute;c ban li&ecirc;n lạc n&agrave;y cũng c&oacute; &yacute; hướng x&acirc;y dựng gia phả một c&aacute;ch tự nhi&ecirc;n, chứng tỏ &iacute;t nhiều cũng cho thấy người d&acirc;n bắt đầu nhận thức về &yacute; nghĩa của gia phả tốt hơn.</p>\r\n', 'c7690b46590551874b57036902c29ab0.jpg', 1, '0000-00-00', 27),
(6, 'Test Bài Viết 2', '<p><strong>B&agrave;i viết được viết rất c&ocirc;ng phu lắm</strong></p>\r\n', '', 1, '2017-12-07', 27),
(7, 'Văn hóa gia đình dòng họ và gia phả Việt Nam', '<p>Vấn đề d&ograve;ng họ l&agrave; một vấn đề khoa học x&atilde; hội ở nước ta xưa nay &iacute;t được tiếp cận nghi&ecirc;n cứu như cảm nhận ch&iacute;nh x&aacute;c của nguy&ecirc;n Thủ tướng Phan Văn Khải: &ldquo;Ở nước ta, d&ograve;ng họ l&agrave; một đề t&agrave;i c&ograve;n &iacute;t được nghi&ecirc;n cứu để tăng cường việc gi&aacute;o dục truyền thống d&ograve;ng họ&rdquo; (trong Lời giới thiệu s&aacute;ch Họ Phan trong quốc gia d&acirc;n tộc Việt Nam, NXB Thế giới, H&agrave; Nội 2015, tr.5.). Đ&oacute; l&agrave; một vấn đề của sử học, văn h&oacute;a học, d&acirc;n tộc học, gắn kết với đời sống t&acirc;m linh thờ c&uacute;ng tổ ti&ecirc;n, gắn kết với l&ograve;ng tự h&agrave;o d&acirc;n tộc, sức mạnh đo&agrave;n tụ v&agrave; l&ograve;ng tri &acirc;n s&acirc;u sắc Quốc tổ H&ugrave;ng Vương v&agrave; d&ograve;ng họ Hồng B&agrave;ng. Vấn đề d&ograve;ng họ c&ograve;n li&ecirc;n quan đến sự ra đời v&agrave; ngưỡng mộ c&aacute;c tổ sư l&agrave;ng nghề, những vị tổ nghiệp v&otilde; đạo, nghệ thuật, những nguồn nh&acirc;n lực tr&iacute; thức địa phương, những gen d&ograve;ng tộc ưu thế về tiềm năng tr&iacute; tuệ.v.v&hellip;<br />\r\n&nbsp;</p>\r\n\r\n<p>D&ograve;ng họ l&agrave; dấu nối giữa người đ&atilde; qu&aacute; cố với người đang sống, giữa t&ocirc;ng đường với người sống trong một hệ thống trật tự gia phả gồm viễn tổ, th&aacute;i tổ, &ocirc;ng b&agrave;, ch&uacute; b&aacute;c, c&ocirc; d&igrave;, cậu mợ, con ch&aacute;u nội ngoại. Gia phả học l&agrave; m&ocirc;n nghi&ecirc;n cứu, ghi ch&eacute;p, sắp xếp thứ tự theo ni&ecirc;n đại, danh xưng hệ thống trật tự của một gia đ&igrave;nh. Nước c&oacute; quốc sử, d&ograve;ng họ c&oacute; lịch sử d&ograve;ng họ, gia đ&igrave;nh c&oacute; gia phả. C&agrave;ng c&oacute; nhiều tư liệu lịch sử d&ograve;ng họ qua c&aacute;c thời đại (cổ trung, cận hiện đại), quốc sử sẽ dồi d&agrave;o tri thức nh&acirc;n sinh, văn h&oacute;a học sẽ phong ph&uacute; t&iacute;nh d&acirc;n gian, lưu giữ được nhiều trữ lượng tri thức bản địa, khắc s&acirc;u hơn m&agrave;u sắc tinh hoa của d&acirc;n tộc.&nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://qlkh.hcmussh.edu.vn/Resources/Images/SubDomain/qlkh/SACH%20CONG%20BO/Copy%20of%20Vanhoadongho.jpg\" /><br />\r\n&nbsp;</p>\r\n\r\n<p>C&oacute; nhiều gia phả, ch&uacute;ng ta sẽ c&oacute; th&ecirc;m nhiều động lực th&uacute;c đẩy t&igrave;nh thương y&ecirc;u, qu&yacute; trọng gia đ&igrave;nh, l&ograve;ng tự trọng bản th&acirc;n, &yacute; thức tr&aacute;ch nhiệm v&agrave; đạo đức thương người trong x&atilde; hội. Kh&ocirc;ng c&oacute; gia phả, con người sẽ kh&ocirc;ng biết được ch&iacute;nh x&aacute;c ta l&agrave; ai; ta đ&atilde; được sinh ra từ n&ograve;i giống n&agrave;o v&agrave; ch&iacute;nh ta c&ograve;n c&oacute; truyền thống tốt đẹp n&agrave;o để g&igrave;n giữ cho một nh&acirc;n c&aacute;ch nh&acirc;n văn sống trong một thời đại đầy rẫy sự biến đổi m&agrave; h&agrave;nh vi phi nh&acirc;n c&aacute;ch đang lấn &aacute;t h&agrave;nh vi nh&acirc;n c&aacute;ch!</p>\r\n', 'c878f2884d6a913fd691efeb1f8012a0.jpg', 1, '2017-12-07', 27);

-- --------------------------------------------------------

--
-- Table structure for table `hoso`
--

CREATE TABLE `hoso` (
  `MaHoSo` int(11) NOT NULL,
  `MaHoToc` int(11) NOT NULL,
  `MaHoSoBo` int(11) DEFAULT NULL,
  `MaHoSoMe` int(11) DEFAULT NULL,
  `HoTen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `DoiThu` int(11) NOT NULL,
  `ConThu` int(11) NOT NULL,
  `QueQuan` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ChiThu` int(11) DEFAULT NULL,
  `HocVan` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgheNghiep` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayMat` date DEFAULT NULL,
  `NguoiKy` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhAnh` text COLLATE utf8_unicode_ci,
  `NoiAnTang` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayTao` date DEFAULT NULL,
  `Email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DaMat` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoso`
--

INSERT INTO `hoso` (`MaHoSo`, `MaHoToc`, `MaHoSoBo`, `MaHoSoMe`, `HoTen`, `NgaySinh`, `GioiTinh`, `DoiThu`, `ConThu`, `QueQuan`, `ChiThu`, `HocVan`, `NgheNghiep`, `NgayMat`, `NguoiKy`, `HinhAnh`, `NoiAnTang`, `NgayTao`, `Email`, `DiaChi`, `SDT`, `DaMat`) VALUES
(2, 1, NULL, NULL, 'Lê Văn Hiếu', '1920-01-30', 1, 1, 1, '', NULL, NULL, NULL, '1905-11-01', NULL, '', '', NULL, '', '', '', 0),
(3, 1, 2, NULL, 'Lê Văn Toại', '0000-00-00', 1, 2, 1, '', NULL, NULL, NULL, '1905-11-14', NULL, '', '', NULL, '', '', '', 0),
(4, 1, 3, NULL, 'Lê Văn Phong', '0000-00-00', 1, 3, 1, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(5, 1, 4, NULL, 'Lê Văn Quý', '0000-00-00', 1, 4, 1, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(6, 1, 4, NULL, 'Lê Thị Vinh', '0000-00-00', 0, 4, 2, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(7, 1, 4, NULL, 'Lê Văn Quyên', '0000-00-00', 1, 4, 3, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(8, 1, 4, NULL, 'Lê Văn Tấn', '0000-00-00', 1, 4, 4, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(9, 1, 4, NULL, 'Lê Văn Không', '0000-00-00', 1, 4, 5, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(10, 1, 4, NULL, 'Lê Văn Diên', '0000-00-00', 1, 4, 6, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(11, 1, 4, NULL, 'Lê Văn Hải', '1910-01-01', 1, 4, 7, '', 7, NULL, NULL, '1905-01-02', NULL, '11.jpg', '', NULL, '', '', '', 0),
(12, 1, 4, NULL, 'Lê Văn Đường', '0000-00-00', 1, 4, 8, '', 8, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(13, 1, 11, 2, 'Lệ Thị Tý', '0000-00-00', 0, 5, 1, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(14, 1, 11, 2, 'Lê Thị Ban', '0000-00-00', 0, 5, 2, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(15, 1, 11, 2, 'Lê Văn Tú', '0000-00-00', 1, 5, 3, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(16, 1, 11, 2, 'Lê Thị Liên', '0000-00-00', 0, 5, 4, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(17, 1, 11, 2, 'Lê Văn Châu', '0000-00-00', 1, 5, 5, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(18, 1, 15, NULL, 'Lê Văn Chiểu', '0000-00-00', 1, 6, 1, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(19, 1, 15, NULL, 'Lê Thị Hằng', '0000-00-00', 0, 6, 2, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(20, 1, 15, NULL, 'Lê Thị Hà', '0000-00-00', 0, 6, 3, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(21, 1, 15, NULL, 'Lê Thị Thìn', '0000-00-00', 0, 6, 4, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(22, 1, 15, NULL, 'Lê Văn Thiệu', '0000-00-00', 1, 6, 5, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(23, 1, 15, NULL, 'Lê Văn Dinh', '0000-00-00', 1, 6, 6, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(24, 1, 15, NULL, 'Lê Văn Đáng', '0000-00-00', 1, 6, 7, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(25, 1, 15, NULL, 'Lê Thị Phiến', '0000-00-00', 0, 6, 8, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(26, 1, 15, NULL, 'Lê Thị Thi', '0000-00-00', 0, 6, 9, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(27, 1, 15, NULL, 'Lê Thị Thu', '0000-00-00', 0, 6, 10, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(28, 1, 15, NULL, 'Lê Thị Tâm', '0000-00-00', 0, 6, 11, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(29, 1, 15, NULL, 'Lê Văn Thoại', '0000-00-00', 1, 6, 12, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(30, 1, 29, NULL, 'Lê Thị Minh Trang', '0000-00-00', 0, 7, 1, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(31, 1, 29, NULL, 'Lê Thị Sa Na', '0000-00-00', 0, 7, 2, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(32, 1, 29, NULL, 'Lê Văn Anh Sơn', '0000-00-00', 1, 7, 3, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(33, 1, 29, NULL, 'Lê Thị Thu Hằng', '0000-00-00', 0, 7, 4, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(34, 1, 17, NULL, 'Lê Thị Thục', '0000-00-00', 0, 6, 1, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(35, 1, 17, NULL, 'Lê Thị  Nữ', '0000-00-00', 0, 6, 2, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(36, 1, 17, NULL, 'Lê Văn Triêm', '0000-00-00', 1, 6, 3, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(37, 1, 17, NULL, 'Lê Thị Hoàng', '0000-00-00', 0, 6, 4, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(38, 1, 17, NULL, 'Lê Văn Thiêm', '0000-00-00', 1, 6, 5, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(39, 1, 17, NULL, 'Lệ Thị Ngoạn', '0000-00-00', 1, 6, 6, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(40, 1, 18, NULL, 'Lê Văn Dễ', '0000-00-00', 1, 7, 1, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(41, 1, 18, NULL, 'Lê Thị Yến', '0000-00-00', 0, 7, 2, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(42, 1, 18, NULL, 'Lê Thị Oanh', '0000-00-00', 0, 7, 3, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(43, 1, 18, NULL, 'Lê Văn Hiền', '0000-00-00', 1, 7, 4, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(44, 1, 18, NULL, 'Lê Thị Đạt', '0000-00-00', 0, 7, 5, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(45, 1, 18, NULL, 'Lê Văn Vịnh', '0000-00-00', 1, 7, 6, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(46, 1, 18, NULL, 'Lê Văn Huy', '0000-00-00', 1, 7, 7, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(47, 1, 18, NULL, 'Lê Văn Thái', '0000-00-00', 1, 7, 8, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(48, 1, 18, NULL, 'Lê Văn Ái', '0000-00-00', 1, 7, 9, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(49, 1, 18, NULL, 'Lê Văn Ân', '0000-00-00', 1, 7, 10, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(50, 1, 18, NULL, 'Lê Phi Phụng', '0000-00-00', 1, 7, 11, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(51, 1, 45, NULL, 'Lê Văn Nhân', '0000-00-00', 1, 8, 1, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(52, 1, 45, NULL, 'Lê Văn Trọng Đức', '0000-00-00', 1, 8, 2, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(53, 1, 45, NULL, 'Lê Văn Trọng Nghĩa', '0000-00-00', 1, 8, 3, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(54, 1, 48, NULL, 'Lê Thị Trường Vân', '0000-00-00', 0, 8, 1, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(55, 1, 48, NULL, 'Lê Văn Thành Lộc', '0000-00-00', 0, 8, 2, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(56, 1, 48, NULL, 'Lê Thị Trường Vy', '0000-00-00', 0, 8, 3, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(57, 1, 48, NULL, 'Lê Thị Trường Linh', '0000-00-00', 0, 8, 4, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(58, 1, 22, NULL, 'Lê Văn Thuật', '0000-00-00', 1, 7, 1, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(59, 1, 22, NULL, 'Lê Văn Long', '0000-00-00', 1, 7, 2, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(60, 1, 22, NULL, 'Lê Thị Lộc', '0000-00-00', 0, 7, 3, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(61, 1, 22, NULL, 'Lê Thị Sâm', '0000-00-00', 0, 7, 4, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(62, 1, 22, NULL, 'Lê Văn Thống', '0000-00-00', 1, 7, 5, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(63, 1, 22, NULL, 'Lê Văn Trị', '0000-00-00', 1, 7, 6, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(64, 1, 22, NULL, 'Lê Thị Dụng', '0000-00-00', 0, 7, 7, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(65, 1, 22, NULL, 'Lê Thị Thảo', '0000-00-00', 0, 7, 8, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(66, 1, 22, NULL, 'Lê Thị Ngọ', '0000-00-00', 0, 7, 9, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(67, 1, 22, NULL, 'Lê Thị Câu', '0000-00-00', 0, 7, 10, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(68, 1, 12, NULL, 'Lê Văn Huyền', '0000-00-00', 1, 5, 1, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(69, 1, 12, NULL, 'Lê Văn Vi', '0000-00-00', 1, 5, 2, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(70, 1, 12, NULL, 'Lê Văn Trí', '0000-00-00', 1, 5, 3, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(71, 1, 12, NULL, 'Lê Văn Phú', '0000-00-00', 1, 5, 4, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(72, 1, 12, NULL, 'Lê Văn Hưu', '0000-00-00', 1, 5, 5, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(73, 1, 12, NULL, 'Lê Thị Du', '0000-00-00', 0, 5, 6, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(74, 1, 12, NULL, 'Lê Văn Em', '0000-00-00', 1, 5, 7, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(75, 1, 68, NULL, 'Lê Văn Diệu', '0000-00-00', 1, 6, 1, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(76, 1, 68, NULL, 'Lê Thị Lưu', '0000-00-00', 0, 6, 2, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(77, 1, 68, NULL, 'Lê Thị Dào', '0000-00-00', 0, 6, 3, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(78, 1, 68, NULL, 'Lê Văn Giảng', '0000-00-00', 1, 6, 4, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(79, 1, 68, NULL, 'Lê Thị Lý', '0000-00-00', 0, 6, 5, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(80, 1, 68, NULL, 'Lê Thị Lộc', '0000-00-00', 0, 6, 6, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(81, 1, 68, NULL, 'Lê Thị Lan', '0000-00-00', 0, 6, 7, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(82, 1, 68, NULL, 'Lê Thị Huê', '0000-00-00', 0, 6, 8, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(83, 1, 70, NULL, 'Lê Thị Thước', '0000-00-00', 0, 6, 1, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(84, 1, 70, NULL, 'Lê Thị Vượng', '0000-00-00', 0, 6, 2, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(85, 1, 70, NULL, 'Lê Thị Túy', '0000-00-00', 0, 6, 3, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(86, 1, 70, NULL, 'Lê Thị Thôi', '0000-00-00', 0, 6, 4, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(87, 1, 70, NULL, 'Lê Thị Trai', '0000-00-00', 0, 6, 5, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(88, 1, 70, NULL, 'Lê Văn Trọng', '0000-00-00', 1, 6, 6, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(89, 1, 70, NULL, 'Lê Thị Nga', '0000-00-00', 0, 6, 7, '', NULL, NULL, NULL, '1905-01-02', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(90, 1, 71, NULL, 'Lê Văn Thọ', '0000-00-00', 1, 6, 1, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(91, 1, 71, NULL, 'Lê Thị Cầu', '0000-00-00', 0, 6, 2, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(92, 1, 71, NULL, 'Lê Văn Khương', '0000-00-00', 1, 6, 3, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(93, 1, 71, NULL, 'Lê Thị Kiêm', '0000-00-00', 0, 6, 4, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(94, 1, 71, NULL, 'Lê Thị Xin', '0000-00-00', 0, 6, 5, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(95, 1, 71, NULL, 'Lê Văn Trinh', '0000-00-00', 1, 6, 6, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(96, 1, 71, NULL, 'Lê Văn Lợi', '0000-00-00', 1, 6, 7, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(97, 1, 71, NULL, 'Lê Thị Đỏ', '0000-00-00', 0, 6, 8, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(98, 1, 71, NULL, 'Lê Thị Hành', '0000-00-00', 0, 6, 9, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(99, 1, 72, NULL, 'Lê Văn Trà', '0000-00-00', 1, 6, 1, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(100, 1, 72, NULL, 'Lê Văn Tùng', '0000-00-00', 1, 6, 2, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(101, 1, 72, NULL, 'Lê Văn Quế', '0000-00-00', 1, 6, 3, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(102, 1, 72, NULL, 'Lê Văn Liễu', '0000-00-00', 1, 6, 4, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(103, 1, 72, NULL, 'Lê Văn Huê', '0000-00-00', 1, 6, 5, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(104, 1, 72, NULL, 'Lê Văn Mẹo', '0000-00-00', 1, 6, 6, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(105, 1, 74, NULL, 'Lê Thị Vinh', '0000-00-00', 0, 6, 1, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(106, 1, 74, NULL, 'Lê Thị Ve', '0000-00-00', 0, 6, 2, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(107, 1, 74, NULL, 'Lê Thị Thi', '0000-00-00', 0, 6, 3, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(108, 1, 74, NULL, 'Lê Văn Vĩnh', '0000-00-00', 1, 6, 4, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(109, 1, 74, NULL, 'Lê Thị Tỷ', '1987-01-01', 0, 6, 5, '', NULL, NULL, NULL, NULL, NULL, '109.jpg', NULL, NULL, NULL, NULL, NULL, 0),
(110, 1, 75, NULL, 'Lê Văn Vân', '0000-00-00', 1, 7, 1, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(111, 1, 75, NULL, 'Lê Văn Toàn', '0000-00-00', 1, 7, 2, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(112, 1, 75, NULL, 'Lê Văn Hoàn', '0000-00-00', 1, 7, 3, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(113, 1, 75, NULL, 'Lê Văn Thân', '0000-00-00', 1, 7, 4, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(114, 1, 75, NULL, 'Lê Văn Tấn', '0000-00-00', 1, 7, 5, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(115, 1, 75, NULL, 'Lê Văn Vĩnh', '0000-00-00', 1, 7, 6, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(116, 1, 78, NULL, 'Lê Văn Chương', '0000-00-00', 1, 7, 1, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(117, 1, 78, NULL, 'Lê Văn Trình', '0000-00-00', 1, 7, 2, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(118, 1, 96, NULL, 'Lê Văn Thanh Liêm', '0000-00-00', 1, 7, 1, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(119, 1, 96, NULL, 'Lê Văn Anh Tuấn', '0000-00-00', 1, 7, 2, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(120, 1, 96, NULL, 'Lê Văn Tuấn Khanh', '0000-00-00', 1, 7, 3, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(121, 1, 96, NULL, 'Lê Văn Tuấn Kiệt', '0000-00-00', 1, 7, 4, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(122, 1, 96, NULL, 'Lê Văn Minh Triết', '0000-00-00', 1, 7, 5, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(123, 1, 96, NULL, 'Lê Văn Minh Đức', '0000-00-00', 1, 7, 6, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(124, 1, 96, NULL, 'Lê Văn Nhất Tâm', '0000-00-00', 1, 7, 7, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(125, 1, 96, NULL, 'Lê Văn Nhật Tịnh', '0000-00-00', 1, 7, 8, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(126, 1, 96, NULL, 'Lê Văn Nhật Thanh', '0000-00-00', 1, 7, 9, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(127, 1, 100, NULL, 'Lê Văn Mai', '0000-00-00', 1, 7, 1, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(128, 1, 100, NULL, 'Lê Thanh Sanh', '0000-00-00', 1, 7, 2, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(129, 1, 100, NULL, 'Lê Văn Thông', '0000-00-00', 1, 7, 3, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(130, 1, 108, NULL, 'Lê Văn Tuấn Hải', '0000-00-00', 1, 7, 1, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(131, 1, 108, NULL, 'Lê Văn Tuấn Huy', '0000-00-00', 1, 7, 2, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(132, 1, 108, NULL, 'Lê Văn Tuấn Hoàng', '0000-00-00', 1, 7, 3, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(133, 1, 110, NULL, 'Lê Văn Hùng', '0000-00-00', 1, 8, 1, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(134, 1, 110, NULL, 'Lê Văn Lục', '0000-00-00', 1, 8, 2, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(135, 1, 110, NULL, 'Lê Văn Thanh', '0000-00-00', 1, 8, 3, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(136, 1, 111, NULL, 'Lê Thị Thắng', '0000-00-00', 0, 8, 1, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(137, 1, 111, NULL, 'Lê Thanh Vũ', '0000-00-00', 1, 8, 2, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(138, 1, 115, NULL, 'Lê H Thanh', '0000-00-00', 1, 8, 1, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(139, 1, 116, NULL, 'Lê Văn Phúc', '0000-00-00', 1, 8, 1, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(140, 1, 118, NULL, 'Lê Văn Duy Nhất', '0000-00-00', 1, 8, 1, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(141, 1, 118, NULL, 'Lê Văn Đăng Khoa', '0000-00-00', 1, 8, 2, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(142, 1, 119, NULL, 'Lê Minh Huy', '0000-00-00', 1, 8, 1, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(143, 1, 124, NULL, 'Lê Văn Nhật Quang', '0000-00-00', 1, 8, 1, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(144, 1, 124, NULL, 'Lê Văn Quang Minh', '0000-00-00', 1, 8, 2, '', NULL, NULL, NULL, '2016-11-12', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(145, 1, 127, NULL, 'Lê Văn Nam', '0000-00-00', 1, 8, 1, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(146, 1, 127, NULL, 'Lê Văn Sơn', '0000-00-00', 1, 8, 2, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hosongoaitoc`
--

CREATE TABLE `hosongoaitoc` (
  `MaHoSoNT` int(11) NOT NULL,
  `MaHoSo` int(11) NOT NULL,
  `HoTenBo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HoTenMe` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HoTen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `HinhAnh` text COLLATE utf8_unicode_ci,
  `DoiThu` int(11) DEFAULT NULL,
  `ConThu` int(11) DEFAULT NULL,
  `QueQuan` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayMat` date DEFAULT NULL,
  `NoiAnTang` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ChanhThat` tinyint(1) NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hosongoaitoc`
--

INSERT INTO `hosongoaitoc` (`MaHoSoNT`, `MaHoSo`, `HoTenBo`, `HoTenMe`, `HoTen`, `NgaySinh`, `GioiTinh`, `HinhAnh`, `DoiThu`, `ConThu`, `QueQuan`, `NgayMat`, `NoiAnTang`, `ChanhThat`, `Email`, `DiaChi`, `SDT`) VALUES
(1, 11, 'Nguyễn Thị Tài', 'Nguyễn Quốc Anh', 'Nguyễn Thị Húng', '1920-01-01', 0, '4764ff54f66b9011e310161b56fd4f84.jpg', 5, 6, '', '1950-02-02', '', 0, '', '', ''),
(2, 11, 'Nguyễn Nhất ', 'Nguyễn Nhì', 'Nguyễn Thị Tam', '1920-11-11', 0, '946c63331d9d99b8da04df417ae76868.jpg', 6, 9, '', '0000-00-00', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hotoc`
--

CREATE TABLE `hotoc` (
  `MaHoToc` int(11) NOT NULL,
  `TenHoToc` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotoc`
--

INSERT INTO `hotoc` (`MaHoToc`, `TenHoToc`) VALUES
(1, 'Lê Văn');

-- --------------------------------------------------------

--
-- Table structure for table `loaitin`
--

CREATE TABLE `loaitin` (
  `MaLoaiTin` int(11) NOT NULL,
  `TenLoaiTin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Mota` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaitin`
--

INSERT INTO `loaitin` (`MaLoaiTin`, `TenLoaiTin`, `Mota`) VALUES
(1, 'Bài viết', NULL),
(2, 'Thông báo', NULL),
(3, 'Cưới hỏi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `remembered_logins`
--

CREATE TABLE `remembered_logins` (
  `token_hash` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sukien`
--

CREATE TABLE `sukien` (
  `MaSuKien` int(11) NOT NULL,
  `TenSuKien` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `NgayDienRa` date NOT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `MaHoSo` int(11) DEFAULT NULL,
  `TrangThai` int(1) NOT NULL DEFAULT '1',
  `DiaDiem` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sukien`
--

INSERT INTO `sukien` (`MaSuKien`, `TenSuKien`, `NgayDienRa`, `NoiDung`, `MaHoSo`, `TrangThai`, `DiaDiem`) VALUES
(5, 'Ngày giỗ 2', '2017-11-12', 'Ngày giỗ 21111111111111', 146, 1, ''),
(6, 'Ngày họp mặt gia tộc 2', '2018-11-13', 'Kính mời các thành viên trong gia đình tham gia buổi lễ họp tất niên cuối năm 2018', 146, 1, ''),
(7, 'Sự kiện mới', '2017-11-14', 'Ngày 14 Tháng 11 ', NULL, 1, ''),
(8, 'Kiểm tra thời gian', '2017-11-22', 'Kiểm tra thời gian', NULL, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_hash` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_expires_at` datetime DEFAULT NULL,
  `activation_hash` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `MaHoSo` int(11) DEFAULT NULL,
  `HinhAnh` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `oauth_uid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaCapQuanTri` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password_hash`, `password_reset_hash`, `password_reset_expires_at`, `activation_hash`, `is_active`, `MaHoSo`, `HinhAnh`, `oauth_uid`, `MaCapQuanTri`) VALUES
(27, 'Nguyễn Hữu Tý', 'typrone1@gmail.com', '$2y$10$5ZCnMlSjLMchJHlIcvROZeybnqkQg6MWIJFY5ybVgtEWH33gzel3e', NULL, NULL, '5349a3f09b60a4b7b0547395f5090dec8d4074d230b756da717eba3aef776b26', 1, 2, '', NULL, 3),
(28, 'Nguyễn Hữu Tý', 'typrone2@gmail.com', '$2y$10$H83qPyxMeXec19dL.r7IzeOS3k2cBdAT/OCakNNTUjeSFT.kzbpSm', NULL, NULL, '9b85a8816d9c94693fae606b649cc9dcdf49c4e757cf9e935d6b25f8fc30161a', 1, NULL, '', NULL, 2),
(29, 'Nguyễn Hữu Tý', 'typrone3@gmail.com', '$2y$10$mn0LwtvLb6DonK22pFSoSegtYIP.SV.skrGK57OF281EPIPADnyvW', NULL, NULL, '9162b7512a1df10d55142c7df9627e811e1d727552866d0571990f9b0113ff68', 1, NULL, 'c07107d3dd71f0c9f101d2bd5efc2919.png', NULL, 3),
(30, 'Nguyễn', 'codocthanhgiao@yahoo.com.vn', '1', NULL, NULL, NULL, 0, 2, NULL, '1121108201359351', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`MaBaiViet`),
  ADD KEY `MaLoaiTin` (`MaLoaiTin`),
  ADD KEY `MaThanhVien` (`MaThanhVien`);

--
-- Indexes for table `hoso`
--
ALTER TABLE `hoso`
  ADD PRIMARY KEY (`MaHoSo`),
  ADD KEY `MaHoToc` (`MaHoToc`);

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
-- Indexes for table `remembered_logins`
--
ALTER TABLE `remembered_logins`
  ADD PRIMARY KEY (`token_hash`),
  ADD KEY `remembered_logins_ibfk_1` (`user_id`);

--
-- Indexes for table `sukien`
--
ALTER TABLE `sukien`
  ADD PRIMARY KEY (`MaSuKien`),
  ADD KEY `MaHoSo` (`MaHoSo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_hash` (`password_reset_hash`),
  ADD UNIQUE KEY `activation_hash` (`activation_hash`),
  ADD KEY `MaHoSo` (`MaHoSo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `MaBaiViet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `hoso`
--
ALTER TABLE `hoso`
  MODIFY `MaHoSo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT for table `hosongoaitoc`
--
ALTER TABLE `hosongoaitoc`
  MODIFY `MaHoSoNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hotoc`
--
ALTER TABLE `hotoc`
  MODIFY `MaHoToc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loaitin`
--
ALTER TABLE `loaitin`
  MODIFY `MaLoaiTin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sukien`
--
ALTER TABLE `sukien`
  MODIFY `MaSuKien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `baiviet_ibfk_1` FOREIGN KEY (`MaLoaiTin`) REFERENCES `loaitin` (`MaLoaiTin`),
  ADD CONSTRAINT `baiviet_ibfk_2` FOREIGN KEY (`MaThanhVien`) REFERENCES `users` (`id`);

--
-- Constraints for table `hoso`
--
ALTER TABLE `hoso`
  ADD CONSTRAINT `hoso_ibfk_1` FOREIGN KEY (`MaHoToc`) REFERENCES `hotoc` (`MaHoToc`);

--
-- Constraints for table `hosongoaitoc`
--
ALTER TABLE `hosongoaitoc`
  ADD CONSTRAINT `hosongoaitoc_ibfk_1` FOREIGN KEY (`MaHoSo`) REFERENCES `hoso` (`MaHoSo`);

--
-- Constraints for table `remembered_logins`
--
ALTER TABLE `remembered_logins`
  ADD CONSTRAINT `remembered_logins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sukien`
--
ALTER TABLE `sukien`
  ADD CONSTRAINT `sukien_ibfk_1` FOREIGN KEY (`MaHoSo`) REFERENCES `hoso` (`MaHoSo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
