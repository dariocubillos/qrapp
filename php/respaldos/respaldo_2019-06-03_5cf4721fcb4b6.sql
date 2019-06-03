SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
-- Database: `qrcamdb`
--




CREATE TABLE `reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userfk` varchar(12) DEFAULT NULL,
  `enter_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exit_time` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `day_work` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userfk` (`userfk`),
  CONSTRAINT `reg_ibfk_1` FOREIGN KEY (`userfk`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO reg VALUES
("1","123456789","2019-05-26 14:51:40","0000-00-00 00:00:00","2019-05-26"),
("3","123456789","2019-06-01 15:24:46","0000-00-00 00:00:00","2019-06-01");




CREATE TABLE `users` (
  `id` varchar(12) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `stall` varchar(100) NOT NULL,
  `tel` bigint(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pass` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO users VALUES
("123456789","unix","ingxxx","unix","ingx","331111","mail","2019-05-26 00:52:50",""),
("77888999","Charles","Xavier","Profesor","Profesor","1223311","xmen","2019-06-01 18:39:44",""),
("admin","admin","admin","Licenciado","admin","123456789","admin","2019-05-26 17:35:33","adminadmin"),
("xxx","xx","xx","Tecnico","xxx","9241011231","admin","2019-05-27 20:42:37","xx");




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;