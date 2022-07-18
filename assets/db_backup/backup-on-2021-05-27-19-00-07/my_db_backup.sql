#
# TABLE STRUCTURE FOR: add_contact
#

DROP TABLE IF EXISTS `add_contact`;

CREATE TABLE `add_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(55) DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1-Pending,2-Active,3-Delete,4-Pending',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `add_contact` (`id`, `name`, `mobile`, `status`, `created_at`) VALUES (1, 'Rana Sharma', '8825171386', 0, '2021-02-05 07:16:28');


#
# TABLE STRUCTURE FOR: blog_category
#

DROP TABLE IF EXISTS `blog_category`;

CREATE TABLE `blog_category` (
  `blog_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0-Deleted,1-Pending,2-Active,3-InActive',
  PRIMARY KEY (`blog_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `blog_category` (`blog_cat_id`, `name`, `status`) VALUES (1, 'rana', 2);
INSERT INTO `blog_category` (`blog_cat_id`, `name`, `status`) VALUES (2, 'sharma', 2);
INSERT INTO `blog_category` (`blog_cat_id`, `name`, `status`) VALUES (3, 'abc1', 2);
INSERT INTO `blog_category` (`blog_cat_id`, `name`, `status`) VALUES (4, 'abc1', 2);
INSERT INTO `blog_category` (`blog_cat_id`, `name`, `status`) VALUES (5, 'hello', 2);
INSERT INTO `blog_category` (`blog_cat_id`, `name`, `status`) VALUES (6, 'hii', 2);


#
# TABLE STRUCTURE FOR: blog_details
#

DROP TABLE IF EXISTS `blog_details`;

CREATE TABLE `blog_details` (
  `blog_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_cat_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `blog_description` varchar(1000) NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `file_path` varchar(250) NOT NULL,
  `file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` varchar(55) NOT NULL,
  PRIMARY KEY (`blog_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `blog_details` (`blog_details_id`, `blog_cat_id`, `title`, `blog_description`, `file_name`, `file_path`, `file_id`, `user_id`, `created_at`) VALUES (1, 1, 'How to Gain Weight Fast and Safely', 'About two thirds of people in the US are either overweight or obese (1Trusted Source).\r\n\r\nHowever, there are also many people with the opposite problem of being too skinny (2Trusted Source).\r\n\r\nThis is a concern, as being underweight can be just as bad for your health as being obese.\r\n\r\nAdditionally, many people who are not clinically underweight still want to gain some muscle.\r\n\r\nWhether you’re clinically underweight or simply struggling to gain muscle weight, the main principles are the same.', '', '', 0, 0, '2020-08-13 18:28:50');


#
# TABLE STRUCTURE FOR: category
#

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0-Deleted,1-Pending,2-Active,3-InActive',
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO `category` (`id_category`, `name`, `status`) VALUES (1, 'Bihar', 2);
INSERT INTO `category` (`id_category`, `name`, `status`) VALUES (2, 'Jharkhand', 2);
INSERT INTO `category` (`id_category`, `name`, `status`) VALUES (3, 'Sports', 2);
INSERT INTO `category` (`id_category`, `name`, `status`) VALUES (4, 'Politics', 2);
INSERT INTO `category` (`id_category`, `name`, `status`) VALUES (5, 'Trending', 2);
INSERT INTO `category` (`id_category`, `name`, `status`) VALUES (6, 'Medicine', 2);
INSERT INTO `category` (`id_category`, `name`, `status`) VALUES (7, 'India', 2);
INSERT INTO `category` (`id_category`, `name`, `status`) VALUES (8, 'World', 2);
INSERT INTO `category` (`id_category`, `name`, `status`) VALUES (9, 'Crime', 2);
INSERT INTO `category` (`id_category`, `name`, `status`) VALUES (10, 'Entertainment', 2);
INSERT INTO `category` (`id_category`, `name`, `status`) VALUES (11, 'Election', 2);


#
# TABLE STRUCTURE FOR: ci_sessions
#

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1j22pf2eio6prugo2ivrrko07rja4774', '::1', 1622088048, '__ci_last_regenerate|i:1622087802;id_user|s:1:\"1\";first_name|s:4:\"Rana\";id_user_type|s:1:\"1\";id_role|s:1:\"1\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8qoksiv0kr2bi2v0ta4te8ml7mii0cpc', '::1', 1622133734, '__ci_last_regenerate|i:1622133701;id_user|s:1:\"1\";first_name|s:4:\"Rana\";id_user_type|s:1:\"1\";id_role|s:1:\"1\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9kmn94c5mi0nvjo1rt2be3qkm475j34f', '::1', 1622088344, '__ci_last_regenerate|i:1622088179;id_user|s:1:\"1\";first_name|s:4:\"Rana\";id_user_type|s:1:\"1\";id_role|s:1:\"1\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('c9r29pkouj1foa6gs6ivq2havnkmlh9o', '::1', 1622089181, '__ci_last_regenerate|i:1622088936;id_user|s:1:\"1\";first_name|s:4:\"Rana\";id_user_type|s:1:\"1\";id_role|s:1:\"1\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('en9ouhp8uel20oonaa3otvmgjcfmak9a', '::1', 1622089959, '__ci_last_regenerate|i:1622089763;id_user|s:1:\"1\";first_name|s:4:\"Rana\";id_user_type|s:1:\"1\";id_role|s:1:\"1\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('hd7m30ff1mb5r5d8res5hu35mb534sh4', '::1', 1622134628, '__ci_last_regenerate|i:1622134403;id_user|s:1:\"1\";first_name|s:4:\"Rana\";id_user_type|s:1:\"1\";id_role|s:1:\"1\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('iu5rdkr6jodnsd8h5pgronf99cs86ofc', '::1', 1622085317, '__ci_last_regenerate|i:1622085311;id_user|s:1:\"1\";first_name|s:4:\"Rana\";id_user_type|s:1:\"1\";id_role|s:1:\"1\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('n6ggo8njh7m31mvh1899s9snk8p9mk7e', '::1', 1622090303, '__ci_last_regenerate|i:1622090071;id_user|s:1:\"1\";first_name|s:4:\"Rana\";id_user_type|s:1:\"1\";id_role|s:1:\"1\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('tvqdirprlln31ej1lbgnh7f8d5ro5kua', '::1', 1622088616, '__ci_last_regenerate|i:1622088592;id_user|s:1:\"1\";first_name|s:4:\"Rana\";id_user_type|s:1:\"1\";id_role|s:1:\"1\";');


#
# TABLE STRUCTURE FOR: cms_pages
#

DROP TABLE IF EXISTS `cms_pages`;

CREATE TABLE `cms_pages` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(100) NOT NULL,
  `page_content` varchar(100) NOT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: diet_chart
#

DROP TABLE IF EXISTS `diet_chart`;

CREATE TABLE `diet_chart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `hindi_description` varchar(2000) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0-Deleted,1-Pending,2-Active,3-InActive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `diet_chart` (`id`, `title`, `description`, `hindi_description`, `status`) VALUES (1, 'Kidney Stone', '<blockquote>\r\n<h4><strong>Diet Chart</strong></h4>\r\n</blockquote>\r\n<h4 style=\"text-align: center;\"><strong>Step 1: 1st Breakfast&nbsp;</strong></h4>\r\n<p>Take Breakfast by midnight Minimum 4 Types Of Fruits, For Example, Apple Mango Banana papaya Guava, etc.<br>The quantity depends on your body weight</p>\r\n<table style=\"height: 165px; margin-left: auto; margin-right: auto; text-align: center;\" border=\"1\" width=\"325\">\r\n<tbody>\r\n<tr style=\"height: 23px;\">\r\n<td style=\"width: 161.333px; height: 23px;\">&nbsp; &nbsp;BODY WEIGHT</td>\r\n<td style=\"width: 162.667px; height: 23px;\"><strong>&nbsp;QUANTITY</strong></td>\r\n</tr>\r\n<tr style=\"height: 23px;\">\r\n<td style=\"width: 161.333px; height: 23px;\">50 Kg&nbsp;</td>\r\n<td style=\"width: 162.667px; height: 23px;\">500 Gram</td>\r\n</tr>\r\n<tr style=\"height: 23.6667px;\">\r\n<td style=\"width: 161.333px; height: 23.6667px;\">60 Kg&nbsp;</td>\r\n<td style=\"width: 162.667px; height: 23.6667px;\">600 Gram&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 23px;\">\r\n<td style=\"width: 161.333px; height: 23px;\">70 Kg&nbsp;</td>\r\n<td style=\"width: 162.667px; height: 23px;\">700 Gram&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 23px;\">\r\n<td style=\"width: 161.333px; height: 23px;\">80 Kg&nbsp;&nbsp;</td>\r\n<td style=\"width: 162.667px; height: 23px;\">800 Gram&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 23px;\">\r\n<td style=\"width: 161.333px; height: 23px;\">90 Kg&nbsp;&nbsp;</td>\r\n<td style=\"width: 162.667px; height: 23px;\">900 Gram&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 24px;\">\r\n<td style=\"width: 161.333px; height: 24px;\">100 Kg&nbsp;&nbsp;</td>\r\n<td style=\"width: 162.667px; height: 24px;\">1 Kilo Gram&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p>Your breakfast should consist only of fruits neither tea nor coffee nor roti.saassas</p>', '<p>assa</p>', 2);
INSERT INTO `diet_chart` (`id`, `title`, `description`, `hindi_description`, `status`) VALUES (2, 'Hello', '<p>sdhbdjh&nbsp; &nbsp; bsjdhbdj&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', NULL, 2);
INSERT INTO `diet_chart` (`id`, `title`, `description`, `hindi_description`, `status`) VALUES (3, 'd', '<p>dd</p>', NULL, 2);


#
# TABLE STRUCTURE FOR: diseases
#

DROP TABLE IF EXISTS `diseases`;

CREATE TABLE `diseases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `hindi_description` varchar(2000) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0-Deleted,1-Pending,2-Active,3-InActive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: email_subscription
#

DROP TABLE IF EXISTS `email_subscription`;

CREATE TABLE `email_subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `ip_address` char(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

INSERT INTO `email_subscription` (`id`, `created_at`, `email`, `ip_address`) VALUES (31, '2021-01-28 04:36:48', 'pradeepkumar95@gmail.com', '::1');
INSERT INTO `email_subscription` (`id`, `created_at`, `email`, `ip_address`) VALUES (32, '2021-01-28 04:41:39', 'ranasharma880@gmail.com', '::1');
INSERT INTO `email_subscription` (`id`, `created_at`, `email`, `ip_address`) VALUES (33, '2021-01-28 05:09:45', 'Sharma@gmail.com', '::1');


#
# TABLE STRUCTURE FOR: enquiry
#

DROP TABLE IF EXISTS `enquiry`;

CREATE TABLE `enquiry` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `ip_address` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` char(15) NOT NULL,
  `message` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `enquiry` (`id`, `created_at`, `ip_address`, `name`, `email`, `mobile`, `message`) VALUES ('1', '2020-08-14 17:29:33', '', 'Rana Sharma', 'iamrana@gmail.com', '9199758612', 'Feel free to contact us');
INSERT INTO `enquiry` (`id`, `created_at`, `ip_address`, `name`, `email`, `mobile`, `message`) VALUES ('2', '2020-08-23 15:59:48', '', 'Rana Sharma', 'rana@weblightsol.com', '9199758912', 'Kambopura, Karnal - 132008');
INSERT INTO `enquiry` (`id`, `created_at`, `ip_address`, `name`, `email`, `mobile`, `message`) VALUES ('3', '2021-01-28 02:25:47', '6465', 'ewwewe', 'e@gmail.com', '9199758622', 'xAX');


#
# TABLE STRUCTURE FOR: news
#

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) DEFAULT NULL,
  `url_slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `english_url_title` varchar(355) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `title` varchar(355) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `details` text CHARACTER SET utf8 COLLATE utf8_bin,
  `publisher_id` int(11) DEFAULT NULL,
  `file_name` varchar(150) DEFAULT NULL,
  `file_path` varchar(250) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Pending,2-Pending,3-Delete,4-Cancelled',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

INSERT INTO `news` (`id`, `id_category`, `url_slug`, `english_url_title`, `title`, `details`, `publisher_id`, `file_name`, `file_path`, `file_id`, `created_at`, `modified_at`, `status`) VALUES (22, 6, 'usdhbwubhvjwehb-jbjdhbvjsdbhv', 'USDHBWUBHVJWEHB JBJDHBVJSDBHV', 'DJCHBJHBVSJDBH', 'JHDBJDSBVH HBCJSB', NULL, 'a6j0zymcy4oys3fcaayc.jpg', NULL, NULL, '2021-05-27 06:38:22', NULL, 1);


#
# TABLE STRUCTURE FOR: order_details
#

DROP TABLE IF EXISTS `order_details`;

CREATE TABLE `order_details` (
  `id_order_details` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NOT NULL DEFAULT '0',
  `id_product` int(11) NOT NULL DEFAULT '0',
  `product_name` varchar(150) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `total` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_order_details`),
  KEY `id_order` (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `order_details` (`id_order_details`, `id_order`, `id_product`, `product_name`, `quantity`, `price`, `total`) VALUES (5, 5, 2, 'Haldiram Soanpapdi', 15, '135.00', '2025.00');
INSERT INTO `order_details` (`id_order_details`, `id_order`, `id_product`, `product_name`, `quantity`, `price`, `total`) VALUES (6, 6, 2, 'Haldiram Soanpapdi', 15, '135.00', '2025.00');


#
# TABLE STRUCTURE FOR: orders
#

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `state` varchar(55) DEFAULT NULL,
  `pin` varchar(15) DEFAULT NULL,
  `created_at` varchar(55) NOT NULL,
  `created_by` varchar(55) NOT NULL,
  `order_no` int(11) DEFAULT NULL,
  `amount` double(10,2) NOT NULL DEFAULT '0.00',
  `disc_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `payable_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-New,2-Confirmed,3-Delivered,4-Cancelled',
  `billing_address` varchar(150) NOT NULL,
  `shipping_address` varchar(150) NOT NULL,
  `contact_name_no` varchar(150) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `orders` (`id_order`, `mobile`, `email`, `state`, `pin`, `created_at`, `created_by`, `order_no`, `amount`, `disc_amount`, `payable_amount`, `status`, `billing_address`, `shipping_address`, `contact_name_no`, `contact_person`) VALUES (5, '8825171386', 'rana@weblightsol.com', 'Bihar', '854651', '01-Jan-1970', 'Rana Sharma', 1598604413, '2025.00', '0.00', '2025.00', 1, 'Srinagar Co-operative bazar', 'Srinagar Co-operative bazar', '9199758612', 'Srivastava Ji');
INSERT INTO `orders` (`id_order`, `mobile`, `email`, `state`, `pin`, `created_at`, `created_by`, `order_no`, `amount`, `disc_amount`, `payable_amount`, `status`, `billing_address`, `shipping_address`, `contact_name_no`, `contact_person`) VALUES (6, '8825171386', 'rana@weblightsol.com', 'Bihar', '854651', '28-08-2020 10:48:50', 'Aman Sharma', 1598604530, '2025.00', '0.00', '2025.00', 1, 'Srinagar Co-operative bazar', 'Srinagar Co-operative bazar', '9199758612', 'Srivastava Ji');


#
# TABLE STRUCTURE FOR: payment
#

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id_payment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: product
#

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `hindi_desc` text CHARACTER SET utf8 COLLATE utf8_bin,
  `mrp_price` int(11) NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `file_name` varchar(150) DEFAULT NULL,
  `file_path` varchar(250) DEFAULT NULL,
  `file_id` int(11) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `product` (`id_product`, `id_category`, `name`, `quantity`, `description`, `hindi_desc`, `mrp_price`, `discount_amount`, `sell_price`, `purchase_price`, `file_name`, `file_path`, `file_id`) VALUES (1, 1, 'Amrit Tulsi', '120 Capsules', '', NULL, 500, 400, 250, 200, NULL, NULL, 0);
INSERT INTO `product` (`id_product`, `id_category`, `name`, `quantity`, `description`, `hindi_desc`, `mrp_price`, `discount_amount`, `sell_price`, `purchase_price`, `file_name`, `file_path`, `file_id`) VALUES (2, 1, 'Haldiram Soanpapdi', '120 Capsules', 'Buy Haldiram\'s Soan Papdi - Badami Box for Rs.65 online. Haldiram\'s Soan Papdi - Badami Box at best prices with FREE shipping & cash on delivery.\r\n Rating: 4.2 - ?304 reviews\r\n\r\nSoan Papdi - Haldiram\'swww.haldirams.com › soan-papdi-online\r\nHaldiram\'s Soan papdi is delicate cotton candy confections made with besan and creamy milk. that melt in your mouth with a flavourful burst of cardamon and ...\r\n?230.00', NULL, 150, 135, 135, 130, NULL, NULL, 0);
INSERT INTO `product` (`id_product`, `id_category`, `name`, `quantity`, `description`, `hindi_desc`, `mrp_price`, `discount_amount`, `sell_price`, `purchase_price`, `file_name`, `file_path`, `file_id`) VALUES (3, 1, 'Product Two', '120 Capsules', '<p><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">An article is a word that is used with a noun to specify grammatical definiteness of the noun, and in some languages extending to volume or numerical scope. The articles in English grammar are the and a/an, and in certain contexts some.</span><br></p>', '<p class=\"story-body__introduction\" style=\"border: 0px; color: rgb(64, 64, 64); font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-family: Arial, Verdana, Geneva, Helvetica, sans-serif; font-size: 1.125rem; font-weight: bold; line-height: 1.44444; margin-top: 28px; margin-bottom: 0px; padding: 0px; vertical-align: baseline;\">आपदा के समय ज़्यादातर लोग वो अहम काम करने में असफल रहते हैं जो उनकी जान बचा सकता है.</p><p style=\"border: 0px; color: rgb(64, 64, 64); font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-family: Arial, Verdana, Geneva, Helvetica, sans-serif; font-size: 1.125rem; line-height: 1.44444; margin-top: 18px; margin-bottom: 0px; padding: 0px; vertical-align: baseline;\">लेकिन ऐसा क्यों होता है ? इसका जवाब खोजते समय 27 सितंबर 1994 की उस घटना पर ध्यान देना चाहिए जिसमें 852 लोग समुद्र में डूब गए थे.</p><p style=\"border: 0px; color: rgb(64, 64, 64); font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-family: Arial, Verdana, Geneva, Helvetica, sans-serif; font-size: 1.125rem; line-height: 1.44444; margin-top: 18px; margin-bottom: 0px; padding: 0px; vertical-align: baseline;\">उस दिन सुबह सात बजे समुद्री जहाज़ एमएस एस्टोनिया 989 मुसाफ़िरों को लेकर तालिन बंदरगाह से रवाना हुआ. उसे बाल्टिक सागर पार कर स्टॉकहोम जाना था. पर जहाज़़ कभी वहाँ नहीं पंहुचा.</p><p style=\"border: 0px; color: rgb(64, 64, 64); font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-family: Arial, Verdana, Geneva, Helvetica, sans-serif; font-size: 1.125rem; line-height: 1.44444; margin-top: 18px; margin-bottom: 0px; padding: 0px; vertical-align: baseline;\">बंदरगाह छोड़ने के छह घंटे बाद जहाज़ ज़बरदस्त तूफ़ान में फंस गया, इसके सामने का दरवाज़ा टूट गया और पानी तेज़ी से अंदर घुसने लगा.</p>', 150, 150, 150, 150, NULL, NULL, 0);


#
# TABLE STRUCTURE FOR: request
#

DROP TABLE IF EXISTS `request`;

CREATE TABLE `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `seeking` varchar(25) DEFAULT NULL,
  `age` varchar(25) DEFAULT NULL,
  `gender` varchar(55) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `date` varchar(55) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0-Deleted,1-Pending,2-Active,3-InActive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `request` (`id`, `name`, `mobile`, `seeking`, `age`, `gender`, `state`, `city`, `created_at`, `date`, `ip_address`, `status`) VALUES (1, 'asassa', '9199758612', 'on', '18', 'Male', 'Jammu and Kashmir', 'Anantnag', '2021-01-28 03:58:02', '28-01-2021', '::1', 2);
INSERT INTO `request` (`id`, `name`, `mobile`, `seeking`, `age`, `gender`, `state`, `city`, `created_at`, `date`, `ip_address`, `status`) VALUES (2, 'Rana Sharma', '8825171386', 'Female', '21', 'Male', 'Bihar', 'Purnia', '2021-01-28 03:59:40', '28-01-2021', '::1', 2);
INSERT INTO `request` (`id`, `name`, `mobile`, `seeking`, `age`, `gender`, `state`, `city`, `created_at`, `date`, `ip_address`, `status`) VALUES (3, 'sdfsdf', '9199758612', 'Man', '20', 'Female', 'Assam', 'Baksa', '2021-01-28 08:32:22', '28-01-2021', '::1', 2);


#
# TABLE STRUCTURE FOR: slider
#

DROP TABLE IF EXISTS `slider`;

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `file_path` varchar(250) NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Pending,2-Active,3-Deleted',
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_staff` char(1) NOT NULL DEFAULT 'N',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0-Deleted,1-Pending,2-Active,3-InActive',
  `id_user_type` int(11) NOT NULL DEFAULT '0',
  `id_role` int(11) NOT NULL DEFAULT '0',
  `first_name` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mobile_no` char(15) DEFAULT NULL,
  `alt_mobile_no` char(15) NOT NULL,
  `gender` char(1) NOT NULL DEFAULT 'M' COMMENT 'M-Male,F-Female',
  `file_path` varchar(225) DEFAULT NULL,
  `display_order` int(11) DEFAULT '1',
  PRIMARY KEY (`id_user`),
  KEY `id_user_type` (`id_user_type`),
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id_user`, `is_staff`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`, `id_user_type`, `id_role`, `first_name`, `last_name`, `email`, `mobile_no`, `alt_mobile_no`, `gender`, `file_path`, `display_order`) VALUES ('1', 'Y', NULL, 0, NULL, 0, 2, 1, 1, 'Rana', 'Sir', NULL, '8210211736', '', 'M', NULL, 1);
INSERT INTO `users` (`id_user`, `is_staff`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`, `id_user_type`, `id_role`, `first_name`, `last_name`, `email`, `mobile_no`, `alt_mobile_no`, `gender`, `file_path`, `display_order`) VALUES ('2', 'N', NULL, 0, NULL, 0, 2, 1, 1, 'Saurabh', 'Sir', NULL, '8210211736', '', 'M', NULL, 1);
INSERT INTO `users` (`id_user`, `is_staff`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`, `id_user_type`, `id_role`, `first_name`, `last_name`, `email`, `mobile_no`, `alt_mobile_no`, `gender`, `file_path`, `display_order`) VALUES ('3', 'N', NULL, 0, NULL, 0, 2, 3, 3, 'Saurabh', 'Sir', NULL, '+91 8210211736', '', 'M', 'https://res.cloudinary.com/dnxxccs9g/image/upload/v1595379502/saurabh_soj4mu.jpg', 2);
INSERT INTO `users` (`id_user`, `is_staff`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`, `id_user_type`, `id_role`, `first_name`, `last_name`, `email`, `mobile_no`, `alt_mobile_no`, `gender`, `file_path`, `display_order`) VALUES ('4', 'N', NULL, 0, NULL, 0, 2, 3, 3, 'Suman', 'Sir', NULL, '+91 8210211736', '', 'M', 'https://res.cloudinary.com/dnxxccs9g/image/upload/v1595379551/suman_pudif5.jpg', 4);
INSERT INTO `users` (`id_user`, `is_staff`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`, `id_user_type`, `id_role`, `first_name`, `last_name`, `email`, `mobile_no`, `alt_mobile_no`, `gender`, `file_path`, `display_order`) VALUES ('5', 'N', NULL, 0, NULL, 0, 2, 3, 3, 'Gopal', 'Mishra', NULL, '+91 8521926238', '', 'M', 'https://res.cloudinary.com/dnxxccs9g/image/upload/v1595380243/IMG-20200717-WA0003_sll3j6.jpg', 3);
INSERT INTO `users` (`id_user`, `is_staff`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`, `id_user_type`, `id_role`, `first_name`, `last_name`, `email`, `mobile_no`, `alt_mobile_no`, `gender`, `file_path`, `display_order`) VALUES ('6', 'N', NULL, 0, NULL, 0, 2, 3, 3, 'Ashok', 'Kumar', NULL, '+91 9472846329', '', 'M', 'https://res.cloudinary.com/dnxxccs9g/image/upload/v1595474202/WhatsApp_Image_2020-07-22_at_19.23.42_xathjv.jpg', 1);
INSERT INTO `users` (`id_user`, `is_staff`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`, `id_user_type`, `id_role`, `first_name`, `last_name`, `email`, `mobile_no`, `alt_mobile_no`, `gender`, `file_path`, `display_order`) VALUES ('7', 'N', NULL, 0, NULL, 0, 2, 3, 3, 'Tapan', 'Sir', NULL, '+91 7991177541', '', 'M', 'https://res.cloudinary.com/dnxxccs9g/image/upload/v1595382658/IMG-20200719-WA0045_p1ynrj.jpg', 5);
INSERT INTO `users` (`id_user`, `is_staff`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`, `id_user_type`, `id_role`, `first_name`, `last_name`, `email`, `mobile_no`, `alt_mobile_no`, `gender`, `file_path`, `display_order`) VALUES ('8', 'N', NULL, 0, NULL, 0, 2, 3, 3, 'Rahul', 'Sir', NULL, '+91 8406986929', '', 'M', 'https://res.cloudinary.com/dnxxccs9g/image/upload/v1595390573/Screenshot_20200722-054650_2_yavv2a.png', 5);
INSERT INTO `users` (`id_user`, `is_staff`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`, `id_user_type`, `id_role`, `first_name`, `last_name`, `email`, `mobile_no`, `alt_mobile_no`, `gender`, `file_path`, `display_order`) VALUES ('9', 'N', NULL, 0, NULL, 0, 2, 0, 0, 'Ajit', 'Jha', 'ajitjhaaaa@gmail.com', '8789019048', '', 'M', NULL, 1);
INSERT INTO `users` (`id_user`, `is_staff`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`, `id_user_type`, `id_role`, `first_name`, `last_name`, `email`, `mobile_no`, `alt_mobile_no`, `gender`, `file_path`, `display_order`) VALUES ('10', 'N', '2020-08-05 10:36:31', 1, NULL, 0, 2, 3, 3, 'Rana', 'Sharma', 'iamranasharma@gmail.com', '9199758612', '', 'M', NULL, 1);
INSERT INTO `users` (`id_user`, `is_staff`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`, `id_user_type`, `id_role`, `first_name`, `last_name`, `email`, `mobile_no`, `alt_mobile_no`, `gender`, `file_path`, `display_order`) VALUES ('11', 'N', '2020-08-15 13:06:49', 0, NULL, 0, 2, 0, 0, 'g', 'ghj', 'aaaa@gmail.com', '9199758612', '', 'M', NULL, 1);


#
# TABLE STRUCTURE FOR: users_address
#

DROP TABLE IF EXISTS `users_address`;

CREATE TABLE `users_address` (
  `id_user_address` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) NOT NULL DEFAULT '0',
  `address_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Native Address,2-Communication Address',
  `id_country` int(11) NOT NULL DEFAULT '0',
  `id_state` int(11) NOT NULL DEFAULT '0',
  `id_city` int(11) NOT NULL DEFAULT '0',
  `id_location` int(11) NOT NULL DEFAULT '0',
  `address` varchar(225) DEFAULT NULL,
  `pin_code` char(15) DEFAULT NULL,
  PRIMARY KEY (`id_user_address`),
  KEY `id_user` (`id_user`),
  KEY `id_country` (`id_country`),
  KEY `id_state` (`id_state`),
  KEY `id_city` (`id_city`),
  KEY `id_location` (`id_location`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: users_adhar_card
#

DROP TABLE IF EXISTS `users_adhar_card`;

CREATE TABLE `users_adhar_card` (
  `id_user` bigint(20) NOT NULL DEFAULT '0',
  `adhar_card_no` varchar(25) NOT NULL,
  `file_name` varchar(150) DEFAULT NULL,
  `file_path` varchar(225) DEFAULT NULL,
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: users_logins
#

DROP TABLE IF EXISTS `users_logins`;

CREATE TABLE `users_logins` (
  `id_login` bigint(20) NOT NULL AUTO_INCREMENT,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1-InActive,2-Active',
  `id_user` bigint(20) NOT NULL DEFAULT '0',
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id_login`),
  KEY `id_user` (`id_user`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `users_logins` (`id_login`, `modified_at`, `modified_by`, `status`, `id_user`, `username`, `password`, `last_login_time`) VALUES ('1', NULL, 0, 2, '1', 'superadmin', 'e10adc3949ba59abbe56e057f20f883e', NULL);
INSERT INTO `users_logins` (`id_login`, `modified_at`, `modified_by`, `status`, `id_user`, `username`, `password`, `last_login_time`) VALUES ('2', NULL, 0, 2, '2', 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL);
INSERT INTO `users_logins` (`id_login`, `modified_at`, `modified_by`, `status`, `id_user`, `username`, `password`, `last_login_time`) VALUES ('3', NULL, 0, 2, '3', 'teacher', 'e10adc3949ba59abbe56e057f20f883e', NULL);
INSERT INTO `users_logins` (`id_login`, `modified_at`, `modified_by`, `status`, `id_user`, `username`, `password`, `last_login_time`) VALUES ('4', NULL, 0, 2, '3', 'cdirector', 'e10adc3949ba59abbe56e057f20f883e', NULL);


#
# TABLE STRUCTURE FOR: users_pan_card
#

DROP TABLE IF EXISTS `users_pan_card`;

CREATE TABLE `users_pan_card` (
  `id_user` int(11) NOT NULL DEFAULT '0',
  `pan_number` char(15) DEFAULT NULL,
  `file_name` varchar(150) DEFAULT NULL,
  `file_path` varchar(225) DEFAULT NULL,
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: users_roles
#

DROP TABLE IF EXISTS `users_roles`;

CREATE TABLE `users_roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0-Deleted,1-Pending,2-Active,3-InActive',
  `name` varchar(85) DEFAULT NULL,
  PRIMARY KEY (`id_role`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `users_roles` (`id_role`, `modified_at`, `modified_by`, `status`, `name`) VALUES (1, '2020-07-16 00:00:00', 1, 2, 'Super Admin');
INSERT INTO `users_roles` (`id_role`, `modified_at`, `modified_by`, `status`, `name`) VALUES (2, '2020-07-16 00:00:00', 1, 2, 'Admin');
INSERT INTO `users_roles` (`id_role`, `modified_at`, `modified_by`, `status`, `name`) VALUES (3, '2020-07-16 00:00:00', 1, 2, 'Teacher');
INSERT INTO `users_roles` (`id_role`, `modified_at`, `modified_by`, `status`, `name`) VALUES (4, '2020-07-16 00:00:00', 1, 2, 'Coaching Director');


#
# TABLE STRUCTURE FOR: users_type
#

DROP TABLE IF EXISTS `users_type`;

CREATE TABLE `users_type` (
  `id_user_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(85) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0-Deleted,1-Pending,2-Active,3-InActive',
  PRIMARY KEY (`id_user_type`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `users_type` (`id_user_type`, `name`, `status`) VALUES (1, 'Super Admin', 1);
INSERT INTO `users_type` (`id_user_type`, `name`, `status`) VALUES (2, 'Admin', 1);
INSERT INTO `users_type` (`id_user_type`, `name`, `status`) VALUES (3, 'Customer', 1);


