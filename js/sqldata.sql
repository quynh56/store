SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `gdt`;
CREATE TABLE`gdt`(
id int(20) unsigned  NOT NULL AUTO_INCREMENT,
store_menu varchar(50),
description varchar(100) DEFAULT NULL,
price decimal(10,3),
image text,
PRIMARY KEY(`id`)
)ENGINE =InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET =utf8;
INSERT INTO `gdt` VALUES('1','chân váy','Chân váy','270','../image/chanvay-05.jpg');
iNSERT INTO `gdt` VALUES()
