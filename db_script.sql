DROP TABLE IF EXISTS `properties`;
CREATE TABLE `properties` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` longtext NOT NULL,
  `rooms` int NOT NULL,
  `wc` int NOT NULL,
  `parking` int NOT NULL,
  `created` date NOT NULL,
  `seller_id` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_properties_sellers_idx` (`seller_id`),
  CONSTRAINT `fk_properties_sellers` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `sellers`;
CREATE TABLE `sellers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

INSERT INTO `properties` (`id`, `title`, `price`, `description`, `rooms`, `wc`, `parking`, `created`, `seller_id`, `image`) VALUES
(1, 'House on Beach', 1000000.00, 'Luxury House on the beach with furniture included', 3, 3, 1, '2023-09-05', 1, 'f5cf142750e3be79e1105cd283740c6c.jpg');
INSERT INTO `properties` (`id`, `title`, `price`, `description`, `rooms`, `wc`, `parking`, `created`, `seller_id`, `image`) VALUES
(2, 'House on the Lake', 1000000.00, 'Luxury house with furniture and great views', 4, 3, 3, '2023-09-05', 3, '8271214aedcc60fc68f68be98635e104.jpg');
INSERT INTO `properties` (`id`, `title`, `price`, `description`, `rooms`, `wc`, `parking`, `created`, `seller_id`, `image`) VALUES
(3, 'House with a Pool', 1000000.00, 'Luxury house with furniture and great views', 3, 4, 2, '2023-09-05', 2, 'ba24da723b9d84a533a9c58a3bb2f86e.jpg');
INSERT INTO `properties` (`id`, `title`, `price`, `description`, `rooms`, `wc`, `parking`, `created`, `seller_id`, `image`) VALUES
(4, 'Family House', 1000000.00, 'Luxury house with furniture and great accesibility', 4, 2, 1, '2023-09-05', 2, '55eb7f245390c5781377c0d1e33d8828.jpg'),
(5, 'Luxury House on a Forest', 1000000.00, 'Luxury house with furniture and great views', 3, 3, 3, '2023-09-05', 1, '257ca7eeb43a4246afea10c4c18b1460.jpg'),
(6, 'House with a Great View', 1000000.00, 'Luxury house with furniture and great views', 2, 1, 1, '2023-09-05', 3, 'cba1aef3b454e656bdff6839c0f1ef9f.jpg');

INSERT INTO `sellers` (`id`, `name`, `lastName`, `phone`) VALUES
(1, 'Alvaro', 'Chacon', '12345678');
INSERT INTO `sellers` (`id`, `name`, `lastName`, `phone`) VALUES
(2, 'Leonardo', 'Cespedes', '12345678');
INSERT INTO `sellers` (`id`, `name`, `lastName`, `phone`) VALUES
(3, 'Pablo', 'Perez', '12345678');

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'email@email.com', '$2y$10$4B9dD/cq5VVPN9BszjCQsuiOC8hGHZr.2z.VDSVNCyHYw.50Uooii');