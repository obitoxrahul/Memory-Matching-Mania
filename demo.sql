CREATE TABLE `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `appid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
desc score;
INSERT INTO `score` VALUES
('1','test', 'test@test.com', 0, ''),
('20','Rahul', 'Rahul.k@gmail.com', 101, 'demo');