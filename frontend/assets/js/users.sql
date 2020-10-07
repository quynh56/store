SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`(
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  first_name varchar(255) ,
  last_name varchar(255),
  phone int(11),
  address varchar(255),
  email varchar(255),
  avatar varchar(255),
  gender tinyint(3),
  birthday date default null,
  last_login datetime default null,
  facebook varchar(255),
  status TINYINT(3) DEFAULT 0 ,
  created_at timestamp default current_timestamp ,
  update_at datetime default null,
  primary key(`id`)
)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- //categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`(
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) not null,
--   avatar varchar(255),
--   description varchar(255),
  parent_id int(11) not null ,
  number tinyint(3),
  type_product tinyint(3) comment(0-clothing 1-accessories),
  type tinyint(3),
  status TINYINT(3) DEFAULT 0 ,
  created_at TIMESTAMP DEFAULT  CURRENT_TIMESTAMP ,
  updated_at DATETIME DEFAULT NULL,
  primary key(`id`)
)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- products
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`(
  id int(11) not null auto_increment,
  category_id int(11) not null,
  new_id int(11),
  user_id int(11),
  name varchar(255),
--   product_code varchar(255),
  avatar varchar(255),
--   color varchar(150),
  price int(11),
  sale int(11),
  content text,
  type tinyint(3) comment"0-clothing 1-accessories",
  status TINYINT(3) DEFAULT 0 ,
  created_at timestamp default current_timestamp ,
  updated_at datetime default null,
  primary key(`id`)
)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- --describe
DROP TABLE IF EXISTS `describe`;
CREATE TABLE `describe`(
id int(11) not null auto_increment,
product_id int(11) not null,
style varchar(255) comment"phong cách",
color_id int(11) comment"màu sắc",
model varchar(255) comment"kiểu mẫu",
borders varchar(255) comment"viền",
lengths tinyint(3) comment"chiều dài 0-dài 1-bình thường 2-ngắn",
sleeve_length tinyint(3) comment"chiều dài tay 0-dài 1-lửng 2-ngắn",
sleeve_type varchar(255) comment"loại tay áo",
ingredient varchar(255) comment"thành phần",
material varchar(255) comment"vật liệu chất liệu",
cotton tinyint(3) comment"sợi vải 0-căng nhẹ 1-không căng",
thin tinyint(3) comment"0-true 1-false",
match_type varchar(255) comment"loại phù hợp",
figure_hem varchar (255) comment"hình hem: vd bút chì",
primary key(`id`)
)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- images
DROP TABLE IF EXISTS `images`;
create table `images`(
  id int(11) not null auto_increment,
  product_id int(11),
  new_id int(11),
  color_id int(11),
  images varchar(255),
  created_at timestamp default current_timestamp,
  updated_at datetime default null,
  primary key(`id`)
)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `color`;
create table `color`(
  id int(11) not null auto_increment,
  product_id int(11) not null,
--   image_id int(11),
  name varchar(255),
  avatar varchar(255),
  status TINYINT(3) DEFAULT 0 ,
  created_at timestamp default current_timestamp ,
  updated_at datetime default null,
  PRIMARY KEY(`id`)
)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- SIZE
DROP TABLE IF EXISTS `sizes`;
create table `sizes`(
  id int(11) not null auto_increment,
  product_id int(11) not null,
  name varchar(255),
  size_1 tinyint(3) comment"vòng 1",
  size_2 tinyint(3) comment"vòng 2",
  size_3 tinyint(3) comment"vòng 3",
  hand_length tinyint(3) comment"chiều dài tay",
  `lengths` tinyint(3) comment"chiều dài",
  `waist_length` tinyint(3) comment"chiều dài thắt lưng",
  `bice_length` tinyint(3) comment"chiều dài bắp tay",
  shoulder tinyint(3) comment"vai",
  cuff tinyint(3)comment"cổ tay áo",
  femoral tinyint(3)comment"đùi",
  base_height tinyint(3) comment"chiều cao của gót",
  axle_height tinyint(3) comment"chiều cao từ mắt cá chân lên",
  quality tinyint(3) comment"số lượng",
  type tinyint(3) comment"0-áo,1-quần,2-váy,3-chanvay giày dép",
  status TINYINT(3) DEFAULT 0  ,
  created_at timestamp default current_timestamp ,
  updated_at datetime default null,
  primary key(`id`)
)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- news
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`(
  id int(11) not null auto_increment,
  category_id int(11) not null ,
  title varchar(255),
  summary varchar(255),
  content text,
  quote varchar(255),
  status TINYINT(3) DEFAULT 0 ,
  created_at timestamp default current_timestamp ,
  updated_at datetime default null,
  primary key(`id`)

)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- ORDER
DROP TABLE IF EXISTS `orders`;
create table `orders`(
  id int(11) not null auto_increment,
  user_id int(11) not null,
  fullname varchar(255),
  address varchar(255),
  mobile int(11),
  email varchar(255),
  note text,
  price_total int(11),
  payment_status tinyint(2),
  created_at timestamp default current_timestamp ,
  updated_at datetime default null,
  primary key(`id`)
)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ORDER_DETAIL
DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail`(
  order_id int(11),
  product_id int(11),
  quality int(11)
)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- slides
DROP TABLE IF EXISTS `slides`;
CREATE TABLE  `slides`(
  id int(11) not null auto_increment,
  product_id int(11),
  avatar varchar(255),
  position tinyint(3),
  location tinyint(3)COMMENT "0-top 1-center 2-bottom",
  status tinyint(3) default 0,
  created_at timestamp default current_timestamp ,
  updated_at datetime default null,
  primary key(`id`)
)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
