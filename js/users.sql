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
  gender tiyint(3),
  birthday date default null,
  last_login datetime default null,
  facebook varchar(255),
  status tiyint(3) default '0',
  created_at timestamp default current_timestamp ,
  update_at datetime default null,
  primary key(`id`)
)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- //categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`(
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) not null,
  description varchar(255),
  status tyinint(3),
  created_at TIMESTAMP DEFAULT  CURRENT_TIMESTAMP ,
  updated_at DATETIME DEFAULT NULL,
  primary key(`id`)
)
-- products
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`(
  id int(11) not null auto_increment,
  category_id int(11) not null,
  title varchar(255),
  avatar varchar(255),
  color varchar(150),
  price int(11),
  sale int(11),
  content text,
  status tinyint(3),
  created_at timestamp default current_timestamp ,
  updated_at dateime default null,
  primary key(`id`)
);
-- images
DROP TABLE IF EXISTS `images`;
create table `images`(
  id int(11) not null auto_increment,
  product_id int(11) not null,
  color_id int(11),
  images varchar(255),
  created_at timestamp default current_timestamp,
  updated_at datetime default null,
  primary key(`id`)
)
--COLOR
DROP TABLE IF EXISTS `color`;
create table `color`(
  id int(11) not null auto_increment,
  product_id int(11) not null,
  image_id int(11),
  name varchar(255),
  avatar varchar(255),
  status tinyint(3),
  created_at timestamp default current_timestamp ,
  updated_at datetime default null,
  PRIMARY KEY(`id`)
)
-- SIZE
DROP TABLE IF NOT EXISTS `size`;
create table `size`(
  id int(11) not null auto_increment,
  product_id int(11) not null,
  name varchar(255),
  size_1 tinyint(3),
  size_2 tinyint(3),
  size_3 tinyint(3),
  hand_length tinyint(3),
  `length` tinyint(3),
  `bicep_length` tinyint(3),
  shoulder tinyint(3),
  cuff tinyint(3),
  femoral tinyint(3),
  type tinyint(3) comment(0-áo,1-quần,2-váy),
  status tinyint(3) ,
  created_at timestamp default current_timestamp ,
  updated_at datetime default null,
  primary key(`id`)
)

-- ORDER
DROP TABLE IF NOT EXISTS `orders`;
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
  created_at timestamp default auto_increment,
  updated_at datetime,
  primary key(`id`)
)

-- ORDER_DETAIL
DROP TABLE IF NOT EXISTS `order_detail`;
CREATE TABLE `order_detail`(
  order_id int(11),
  product_id int(11),
  quality int(11)
);

-- form
DROP TABLE IF NOT EXISTS `sign_up`;
CREATE TABLE  `sign_up`();

-- slides

DROP TABLE IF NOT EXISTS `slides`;
CREATE TABLE  `slides`(
  id int(11) not null auto_increment,
  avatar varchar(255),
  position tinyint(3),
  status tinyint(3),
  created_at timestamp default auto_increment,
  updated_at datetime,
);
