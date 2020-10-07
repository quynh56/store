SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `gdt`;
CREATE TABLE`gdt`(
id int(20) unsigned  NOT NULL AUTO_INCREMENT,
store_menu varchar(50),
store_menu_child varchar (50),
description varchar(100) DEFAULT NULL,
price decimal(10,3),
PRIMARY KEY(`id`)
)ENGINE =InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET =utf8;
INSERT INTO `gdt` VALUES('1','clothing','skirt','Chân váy','270');
INSERT INTO `gdt` VALUES('2','clothing','váy yếm','Váy yếm','320');
INSERT INTO `gdt` VALUES ('3','clothing','dress','váy','320');
INSERT INTO `gdt` VALUES ('4','clothing','dress','váy trắng','450');
INSERT INTO `gdt` VALUES ('5','clothing','dress','Dress white','570');
INSERT INTO `gdt` VALUES ('6','clothing','skirt','chân váy họa tiết','270');
INSERT INTO `gdt` VALUES ('7','clothing','jacket','áo dạ Hàn Quốc','550');
INSERT INTO `gdt` VALUES ('8','clothing','trouser','Quần thể thao','290');
INSERT INTO `gdt` VALUES ('9','clothing','jacket','áo khoác','570');
INSERT INTO `gdt` VALUES ('10','clothing','skirt','chân váy dạ','290');
INSERT INTO `gdt` VALUES ('11','clothing','blazer','blazer','650');
INSERT INTO `gdt` VALUES ('12','clothing','dress','dahlia dress','500');
INSERT INTO `gdt` VALUES ('13','clothing','t-shirt','áo phông','230');
INSERT INTO `gdt` VALUES ('14','clothing','dress','váy','470');
INSERT INTO `gdt` VALUES ('15','clothing','jacket','áo khoác bò','390');
INSERT INTO `gdt` VALUES ('16','clothing','trouser','Quần thể thao basic','230');
INSERT INTO `gdt` VALUES ('17','clothing','jacket','áo khoác lông','800');
INSERT INTO `gdt` VALUES ('18','clothing','shirt','áo sơ mi kẻ','350');
INSERT INTO `gdt` VALUES ('19','clothing','jacket','Áo khoác','450');
INSERT INTO `gdt` VALUES ('20','clothing','jacket','Áo khoác dạ','550');
INSERT INTO `gdt` VALUES ('21','clothing','trouser','Quần sooc','270');
INSERT INTO `gdt` VALUES ('22','clothing','Set','Set váy','650');
INSERT INTO `gdt` VALUES ('23','clothing','blazer','Blazer','550');
INSERT INTO `gdt` VALUES ('24','clothing','dress','váy xuông','270');
INSERT INTO `gdt` VALUES ('25','clothing','jacket','áo khoác bò gile','390');
INSERT INTO `gdt` VALUES ('26','clothing','wool dress','Váy len dáng xuông','300');
INSERT INTO `gdt` VALUES ('27','accessories','bag','túi','370');
INSERT INTO `gdt` VALUES ('28','accessories','boots','boots','550');
INSERT INTO `gdt` VALUES ('29','accessories','hat','mũ','450');
INSERT INTO `gdt` VALUES ('30','accessories','hat','mũ bành','270');
INSERT INTO `gdt` VALUES ('31','accessories','scarf','khăn','220');
INSERT INTO `gdt` VALUES ('32','accessories','boots','boots','650');
INSERT INTO `gdt` VALUES ('33','accessories','hat','mũ len','270');
INSERT INTO `gdt` VALUES ('34','accessories','Bag','Túi mini','270');
INSERT INTO `gdt` VALUES ('35','accessories','hat','Mũ lưỡi trai','190');
INSERT INTO `gdt` VALUES ('36','clothing','skirt','chân váy bò','250');
INSERT INTO `gdt` VALUES ('37','clothing','sweater','áo len cao cổ','290');
INSERT INTO `gdt` VALUES ('38','clothing','t-shirt','áo phông kẻ','240');
INSERT INTO `gdt` VALUES ('39','clothing','skirt','chân váy','250');
INSERT INTO `gdt` VALUES ('40','clothing','t-shirt','áo phông','220');
INSERT INTO `gdt` VALUES ('41','clothing','jacket','áo khoác dạ','590');
INSERT INTO `gdt` VALUES ('42','clothing','sweater','áo len','290');
INSERT INTO `gdt` VALUES ('43','clothing','shirt','áo sơ mi trắng','190');
INSERT INTO `gdt` VALUES ('44','clothing','blazer','blazer oversize','450');
INSERT INTO `gdt` VALUES ('45','clothing','sweater','áo len','340');
INSERT INTO `gdt` VALUES ('46','clothing','sweater','áo len','350');
INSERT INTO `gdt` VALUES ('47','clothing','shirt','áo sơ mi kẻ nhỏ','320');
INSERT INTO `gdt` VALUES ('48','clothing','jacket','áo khoác lông','450');
INSERT INTO `gdt` VALUES ('49','clothing','sweatshirt','Áo nỉ','230');
INSERT INTO `gdt` VALUES ('50','clothing','trouser','quần bò kaki','650');
INSERT INTO `gdt` VALUES ('51','clothing','trouser','quần bò yếm','340');
INSERT INTO `gdt` VALUES ('52','clothing','trouser','quần sooc trắng','190');
INSERT INTO `gdt` VALUES ('53','clothing','trouser','quần bò yếm','340');
INSERT INTO `gdt` VALUES ('54','clothing','trouser','quần bò','490');
INSERT INTO `gdt` VALUES ('55','clothing','dress','váy yếm trắng','270');
INSERT INTO `gdt` VALUES ('56','clothing','skirt','chân váy','190');
INSERT INTO `gdt` VALUES ('57','clothing','set','váy + Blazer','1100');
INSERT INTO `gdt` VALUES ('58','clothing','set','váy yếm + áo','450');
INSERT INTO `gdt` VALUES ('59','clothing','set','dress +áo','500');
INSERT INTO `gdt` VALUES ('60','clothing','set','chân váy +áo','750');
INSERT INTO `gdt` VALUES ('61','clothing','set','váy +áo len','550');
INSERT INTO `gdt` VALUES ('62','accessories','scarf','khăn kẻ','270');

