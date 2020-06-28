ajoute un controller: ProductController.php
ajoute un view: produitsingle.blade.php

image: resources/image

CREATE TABLE `product` (
 `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `product_name` varchar(100) NOT NULL,
 `product_mark` int(50) NOT NULL,
 `product_price` double NOT NULL,
 `product_description` varchar(1000) DEFAULT NULL,
 `product_image` varchar(1000) DEFAULT NULL,
 PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8

CREATE TABLE `mark` (
 `mark_id` int(11) NOT NULL AUTO_INCREMENT,
 `mark_name` varchar(255) NOT NULL,
 PRIMARY KEY (`mark_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8


CREATE TABLE `image` (
 `image_id` int(11) NOT NULL AUTO_INCREMENT,
 `image_name` varchar(255) NOT NULL,
 PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
