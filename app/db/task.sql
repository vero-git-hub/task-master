CREATE TABLE `task` (
    `id` int NOT NULL AUTO_INCREMENT,
    `title` varchar(15) NOT NULL,
    `description` varchar(45) DEFAULT NULL,
    `status` varchar(15) NOT NULL,
    `created_at` date NOT NULL,
    PRIMARY KEY (`id`)
)