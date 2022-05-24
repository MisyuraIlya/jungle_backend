
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- administrators
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `administrators`;

CREATE TABLE `administrators`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100),
    `password` VARCHAR(100),
    `token` VARCHAR(100),
    `role` VARCHAR(100),
    `email` VARCHAR(255),
    `phone` VARCHAR(255),
    `app_id` TEXT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- articles
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255),
    `description` VARCHAR(500),
    `text` TEXT,
    `img` VARCHAR(255),
    `unpublished` INTEGER,
    `orden` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- banners
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `type` INTEGER,
    `title` VARCHAR(255),
    `text` VARCHAR(1000),
    `img` VARCHAR(255),
    `link` VARCHAR(255),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- categories
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories`
(
    `id` INTEGER NOT NULL,
    `parent_id` INTEGER,
    `ex_id` VARCHAR(255),
    `code` VARCHAR(255),
    `title` VARCHAR(255),
    `inner_title` VARCHAR(255),
    `img` VARCHAR(255),
    `img_wide` VARCHAR(255),
    `orden` INTEGER,
    `unpublished` INTEGER
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- distribution_area
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `distribution_area`;

CREATE TABLE `distribution_area`
(
    `Id` INTEGER NOT NULL AUTO_INCREMENT,
    `Title` VARCHAR(255) NOT NULL,
    `Description` VARCHAR(1023) NOT NULL,
    `Color` VARCHAR(10) NOT NULL,
    `Price` FLOAT NOT NULL,
    `MinOrderPrice` FLOAT NOT NULL,
    `MinOrderPriceForFreeShipping` FLOAT NOT NULL,
    `IsPublished` TINYINT(1) NOT NULL,
    `Created` DATETIME NOT NULL,
    `Modified` DATETIME NOT NULL,
    `Location` VARCHAR(1023) NOT NULL,
    `IsDeleted` TINYINT(1) NOT NULL,
    PRIMARY KEY (`Id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- filter_families
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `filter_families`;

CREATE TABLE `filter_families`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255),
    `unpublished` INTEGER,
    `orden` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- filters
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `filters`;

CREATE TABLE `filters`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `parent_id` INTEGER,
    `title` VARCHAR(255),
    `unpublished` INTEGER,
    `orden` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- notification
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `notification`;

CREATE TABLE `notification`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255),
    `description` TEXT,
    `link` VARCHAR(255),
    `date` VARCHAR(255),
    `send_to` INTEGER DEFAULT 1,
    `img` VARCHAR(255),
    `video` VARCHAR(255),
    `course_id` VARCHAR(255),
    `price_for` VARCHAR(255),
    `public` INTEGER,
    `unpublished` INTEGER,
    `type` VARCHAR(1),
    `isDeleted` TINYINT(1) DEFAULT 0 NOT NULL,
    `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- order_parts
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `order_parts`;

CREATE TABLE `order_parts`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `order_id` INTEGER,
    `user_id` INTEGER,
    `date` VARCHAR(255),
    `makat` VARCHAR(255),
    `barcode` VARCHAR(255),
    `title` VARCHAR(255),
    `price` VARCHAR(255),
    `total` VARCHAR(255),
    `quantity` VARCHAR(255),
    `img` VARCHAR(255),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- orders
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `date` VARCHAR(255),
    `format_date` VARCHAR(255),
    `time` VARCHAR(255),
    `user_id` INTEGER,
    `delivery_id` INTEGER,
    `pickup` VARCHAR(255),
    `total` VARCHAR(255),
    `status` VARCHAR(255),
    `comment` VARCHAR(255),
    `transaction` VARCHAR(1023),
    `mail` VARCHAR(255),
    `tel` VARCHAR(255),
    `first_name` VARCHAR(255),
    `last_name` VARCHAR(255),
    `passport` VARCHAR(255),
    `town` VARCHAR(255),
    `address` VARCHAR(255),
    `zip` VARCHAR(255),
    `house` VARCHAR(10),
    `appartment` VARCHAR(10),
    `floor` VARCHAR(10),
    `entrance` VARCHAR(10),
    `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- products
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `ex_id` VARCHAR(255),
    `parent_id` INTEGER,
    `makat` VARCHAR(100),
    `category` INTEGER,
    `category_id` INTEGER,
    `title` VARCHAR(255),
    `barcode` VARCHAR(100),
    `price` VARCHAR(100),
    `price_ml` VARCHAR(100),
    `discount` VARCHAR(100),
    `unit` VARCHAR(50),
    `img` TEXT,
    `img_wide` VARCHAR(255),
    `file` VARCHAR(255),
    `desc1` VARCHAR(8000),
    `desc2` VARCHAR(8000),
    `desc3` VARCHAR(500),
    `desc4` VARCHAR(500),
    `desc5` VARCHAR(500),
    `sale` INTEGER,
    `home` INTEGER,
    `new_one` INTEGER,
    `type` VARCHAR(255),
    `volume` VARCHAR(255),
    `filter_id` TEXT,
    `orden` INTEGER,
    `unpublished` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- sales
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `ex_id` INTEGER NOT NULL,
    `quantity` INTEGER NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `price` INTEGER NOT NULL,
    `end_date` VARCHAR(255) NOT NULL,
    `remarks` VARCHAR(255) NOT NULL,
    `code` INTEGER NOT NULL,
    `unpublished` INTEGER NOT NULL,
    `price2` INTEGER NOT NULL,
    `quantity2` INTEGER NOT NULL,
    `price3` INTEGER NOT NULL,
    `quantity3` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sales_barcode
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sales_barcode`;

CREATE TABLE `sales_barcode`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `ex_id` INTEGER NOT NULL,
    `item_code` VARCHAR(255) NOT NULL,
    `price` INTEGER NOT NULL,
    `code` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- shipping
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shipping`;

CREATE TABLE `shipping`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255),
    `price` VARCHAR(255),
    `makat` VARCHAR(255),
    `orden` INTEGER,
    `unpublished` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- slider
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `slider`;

CREATE TABLE `slider`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `grid_id` INTEGER,
    `img` VARCHAR(255),
    `link` VARCHAR(255),
    `title` VARCHAR(255),
    `orden` INTEGER,
    `unpublished` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `site_id` INTEGER,
    `mail` VARCHAR(255),
    `mail_second` VARCHAR(255),
    `tel` VARCHAR(255),
    `mobile` VARCHAR(255),
    `first_name` VARCHAR(255),
    `last_name` VARCHAR(255),
    `type` INTEGER,
    `unpublished` INTEGER,
    `password` VARCHAR(255),
    `token` VARCHAR(500),
    `passport` VARCHAR(255),
    `recovery` VARCHAR(255),
    `img` VARCHAR(255),
    `facebook_id` VARCHAR(255),
    `google_id` VARCHAR(255),
    `town` VARCHAR(255),
    `address` VARCHAR(255),
    `zip` VARCHAR(100),
    `accept` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
