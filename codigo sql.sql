CREATE TABLE `user` (
	`id` int AUTO_INCREMENT PRIMARY KEY,
	`user` varchar(80) NOT NULL,
	`pass` varchar(80) NOT NULL,
	`email` varchar(80) NOT NULL
);

CREATE TABLE `classRoom` (
	`id` int AUTO_INCREMENT PRIMARY KEY,
	`class` varchar(80) NOT NULL,
	`chairLength` int NOT NULL,
	`chairWidth` int NOT NULL,
	`classSize` int NOT NULL,
	`colorHex` varchar(7) NOT NULL,
	`userFK` INT NOT NULL, FOREIGN KEY (`userFK`) REFERENCES `user`(`id`)
);

CREATE TABLE `students` (
	`id` INt AUTO_INCREMENT PRIMARY KEY,
	`student` TEXT(80) NOT NULL,
	`vision` boolean NOT NULL,
	`height` boolean NOT NULL,
    `acessibility` boolean NOT NULL,
    `priority` INT NOT NULL,
	`classStudentFK` INT NOT NULL, FOREIGN KEY (`classStudentFK`) REFERENCES `classRoom`(`id`),
    `userFK` INT NOT NULL, FOREIGN KEY (`userFK`) REFERENCES `user`(`id`)
	
);

CREATE TABLE `map`(
	`idMap` INT AUTO_INCREMENT PRIMARY KEY,
	`map` LONGTEXT NOT NULL,
	`classMapFK` INT NOT NULL, FOREIGN KEY (`classMapFK`) REFERENCES `classRoom`(`id`),
        `userFK` INT NOT NULL, FOREIGN KEY (`userFK`) REFERENCES `user`(`id`)

);




