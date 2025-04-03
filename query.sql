-- users table

CREATE TABLE `kobili`.`users` (
`id` INT(11) NOT NULL AUTO_INCREMENT , 
`username` VARCHAR(20) NOT NULL , 
`email` VARCHAR(20) NOT NULL , 
`phoneNumber` VARCHAR(20) NOT NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;
