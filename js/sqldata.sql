SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `gdt`;
CREATE TABLE`gdt`(
id int(20) unsigned  NOT NULL AUTO_INCREMENT,
store_menu varchar(50),
store_menu_child varchar (50),
description varchar(100) DEFAULT NULL,
price decimal(10,3),
image text,
PRIMARY KEY(`id`)
)ENGINE =InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET =utf8;
INSERT INTO `gdt` VALUES('1','clothing','chân váy','Chân váy','270','../images/chanvay-05.jpg');
INSERT INTO `gdt` VALUES('2','clothing','váy','Váy yếm','320','../images/vay-07.jpg');
INSERT INTO `gdt` VALUES ('3','clothing','váy','váy','320','../images/vay-10.jpg');
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();
INSERT INTO `gdt` VALUES ();