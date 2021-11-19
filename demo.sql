-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2021 lúc 02:50 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_comment`
--

CREATE TABLE IF NOT EXISTS `tb_comment` (
  `ID_CMT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) DEFAULT NULL,
  `ID_POSTS` int(11) DEFAULT NULL,
  `CONTENT` varchar(1000) DEFAULT NULL,
  `TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_CMT`),
  KEY `ID_USER` (`ID_USER`),
  KEY `ID_POSTS` (`ID_POSTS`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_comment`
--

INSERT INTO `tb_comment` (`ID_CMT`, `ID_USER`, `ID_POSTS`, `CONTENT`, `TIME`) VALUES
(1, 2, 1, 'Nội dung bài blog rất liên quan với nhau và ý nghĩa', '2021-11-05 14:06:57'),
(2, 2, 1, 'Amazing Gút chóp em', '2021-11-05 16:35:40'),
(3, 1, 1, 'Cảm ơn bạn', '2021-11-05 16:47:50'),
(4, 2, 1, 'Không có gì đâu chị', '2021-11-07 13:44:02'),
(10, 2, 1, 'ủa alo, load lại là nó thêm comment kì cục ta', '2021-11-08 09:34:11'),
(16, 2, 1, 'ủa alo nè ', '2021-11-08 12:09:23'),
(17, 2, 1, 'ádasdsa', '2021-11-08 12:23:20'),
(20, 2, 1, 'một hai ba bốn năm', '2021-11-19 11:08:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_feedback`
--

CREATE TABLE IF NOT EXISTS `tb_feedback` (
  `ID_FEEDBACK` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) DEFAULT NULL,
  `CONTENT` varchar(1000) DEFAULT NULL,
  `TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_FEEDBACK`),
  KEY `ID_USER` (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_posts`
--

CREATE TABLE IF NOT EXISTS `tb_posts` (
  `ID_POSTS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) DEFAULT NULL,
  `CONTENT` varchar(10000) DEFAULT NULL,
  `TIME` datetime DEFAULT NULL,
  `POST_NAME` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`ID_POSTS`),
  KEY `ID_USER` (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_posts`
--

INSERT INTO `tb_posts` (`ID_POSTS`, `ID_USER`, `CONTENT`, `TIME`, `POST_NAME`) VALUES
(1, 1, 'Tây Nguyên từ lâu đã trở thành địa điểm du lịch yêu thích của những du khách đam mê khám phá những vùng đất mới. Đến Tây Nguyên, bạn sẽ được chiêm ngưỡng vẻ đẹp của những ngọn thác hùng vĩ, những ngọn núi cao, hay những cánh rừng bạt ngàn xanh tốt… Tây Nguyên còn có vũ điệu cồng chiêng hấp dẫn, làm biết bao du khách mê mẩn. Hôm nay, Kim Tiền sẽ chia sẻ đến các bạn đầy đủ và chi tiết nhất về du lịch Tây Nguyên. Để những ai chưa biết Đi du lịch Tây Nguyên có gì hấp dẫn thú vị? sẽ biết thêm về vùng đất du lịch tuyệt vời này!\r\n\r\n\r\nĐi du lịch Phú Quốc tự túc - tưởng khó mà dễ. Bỏ túi các kinh nghiệm du lịch Phú Quốc tự túc do Klook tổng hợp để thả ga khám phá thiên nhiên tươi đẹp ở đảo ngọc nhé. Không ít du khách cảm thấy bối rối trong lần đầu đi  tự túc. Nguyên nhân là vì hòn đảo này có diện tích khá lớn (589.23km2 - tương đương với cả đảo quốc sư tử Singapore), với nhiều di tích lịch sử, danh lam thắng cảnh cùng đa dạng hoạt động vui chơi - giải trí, khám phá thiên nhiên hấp dẫn. Làm thế nào để vi vu hết các  khi mà quỹ thời gian còn eo hẹp? Để Klook mách bạn vài kinh nghiệm du lịch Phú Quốc tự túc hữu ích nhé. Khi đi du lịch tự túc đến Phú Quốc, bạn có thể thoải mái lựa chọn bất kỳ thời điểm nào trong năm vì khí hậu nơi đây trung bình nhiệt độ khoảng 28 độ C. Tuy nhiên từ tháng 4 đến tháng 9 sẽ hơi đông khách du lịch vì là mùa hè, mùa nghỉ dưỡng. Từ tháng 10 đến tháng 3 năm tiếp theo là thời điểm Phú Quốc được cho là đẹp nhất, nhưng bạn cũng nên xem dự báo thời tiết để tránh những ngày giông bão nhé.', '2021-10-27 14:02:48', 'DU LỊCH TÂY NGUYÊN CÓ GÌ HẤP DẪN, THÚ VỊ?'),
(2, 2, 'Tây Nguyên từ lâu đã trở thành địa điểm du lịch yêu thích của những du khách đam mê khám phá những vùng đất mới. Đến Tây Nguyên, bạn sẽ được chiêm ngưỡng vẻ đẹp của những ngọn thác hùng vĩ, những ngọn núi cao, hay những cánh rừng bạt ngàn xanh tốt… Tây Nguyên còn có vũ điệu cồng chiêng hấp dẫn, làm biết bao du khách mê mẩn. Hôm nay, Kim Tiền sẽ chia sẻ đến các bạn đầy đủ và chi tiết nhất về du lịch Tây Nguyên. Để những ai chưa biết Đi du lịch Tây Nguyên có gì hấp dẫn thú vị? sẽ biết thêm về vùng đất du lịch tuyệt vời này!\r\n\r\n\r\nĐi du lịch Phú Quốc tự túc - tưởng khó mà dễ. Bỏ túi các kinh nghiệm du lịch Phú Quốc tự túc do Klook tổng hợp để thả ga khám phá thiên nhiên tươi đẹp ở đảo ngọc nhé. Không ít du khách cảm thấy bối rối trong lần đầu đi  tự túc. Nguyên nhân là vì hòn đảo này có diện tích khá lớn (589.23km2 - tương đương với cả đảo quốc sư tử Singapore), với nhiều di tích lịch sử, danh lam thắng cảnh cùng đa dạng hoạt động vui chơi - giải trí, khám phá thiên nhiên hấp dẫn. Làm thế nào để vi vu hết các  khi mà quỹ thời gian còn eo hẹp? Để Klook mách bạn vài kinh nghiệm du lịch Phú Quốc tự túc hữu ích nhé. Khi đi du lịch tự túc đến Phú Quốc, bạn có thể thoải mái lựa chọn bất kỳ thời điểm nào trong năm vì khí hậu nơi đây trung bình nhiệt độ khoảng 28 độ C. Tuy nhiên từ tháng 4 đến tháng 9 sẽ hơi đông khách du lịch vì là mùa hè, mùa nghỉ dưỡng. Từ tháng 10 đến tháng 3 năm tiếp theo là thời điểm Phú Quốc được cho là đẹp nhất, nhưng bạn cũng nên xem dự báo thời tiết để tránh những ngày giông bão nhé.', '2021-10-27 14:02:48', 'DU LỊCH TÂY NGUYÊN CÓ GÌ HẤP DẪN, THÚ VỊ?');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `LASTNAME` varchar(100) DEFAULT NULL,
  `FIRSTNAME` varchar(100) DEFAULT NULL,
  `USERNAME` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(150) DEFAULT NULL,
  `STATUS` varchar(100) DEFAULT NULL,
  `AVATAR` blob DEFAULT NULL,
  PRIMARY KEY (`ID_USER`),
  UNIQUE KEY `EMAIL` (`EMAIL`),
  UNIQUE KEY `USERNAME` (`USERNAME`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_user`
--

INSERT INTO `tb_user` (`ID_USER`, `LASTNAME`, `FIRSTNAME`, `USERNAME`, `PASSWORD`, `EMAIL`, `STATUS`, `AVATAR`) VALUES
(1, 'Kim Tiền', 'Phan', 'kimtienyeulinda', 'asdfgghjkl', 'tientien@gmail.com', '1', NULL),
(2, 'Pu', 'Chi', 'chipuoooo', 'asdfgghjkl', 'chipuoooo@gmail.com', '1', NULL);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD CONSTRAINT `tb_comment_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `tb_user` (`ID_USER`),
  ADD CONSTRAINT `tb_comment_ibfk_2` FOREIGN KEY (`ID_POSTS`) REFERENCES `tb_posts` (`ID_POSTS`);

--
-- Các ràng buộc cho bảng `tb_feedback`
--
ALTER TABLE `tb_feedback`
  ADD CONSTRAINT `tb_feedback_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `tb_user` (`ID_USER`);

--
-- Các ràng buộc cho bảng `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD CONSTRAINT `tb_posts_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `tb_user` (`ID_USER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
