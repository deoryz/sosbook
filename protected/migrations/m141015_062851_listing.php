<?php

class m141015_062851_listing extends CDbMigration
{
	public function up()
	{


		$this->execute("
		CREATE TABLE IF NOT EXISTS `slide` (
		  `id` int(20) NOT NULL AUTO_INCREMENT,
		  `image` varchar(225) NOT NULL,
		  `url` varchar(225) NOT NULL,
		  `sort` int(11) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
		");

		$this->execute("
		INSERT INTO `slide` (`id`, `image`, `url`, `sort`) VALUES
		(1, '8c248-surabaya-spine-clinic-1.jpg', '', 1),
		(2, '6048f-surabaya-spine-clinic-2.jpg', '', 2),
		(3, 'eea04-surabaya-spine-clinic-3.jpg', '', 3),
		(4, 'cd56d-surabaya-spine-clinic-5.jpg', '', 4);
		");

		$this->execute("
		CREATE TABLE IF NOT EXISTS `slide_description` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `slide_id` int(11) NOT NULL,
		  `language_id` int(11) NOT NULL,
		  `desc` text NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
		");

		$this->execute("
		CREATE TABLE IF NOT EXISTS `sosbook` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `url` varchar(255) NOT NULL,
		  `slug` varchar(200) NOT NULL,
		  `category_id` int(11) NOT NULL,
		  `title` varchar(200) NOT NULL,
		  `content` text NOT NULL,
		  `date_input` datetime NOT NULL,
		  `date_update` datetime NOT NULL,
		  `insert_by` varchar(200) NOT NULL,
		  `last_update_by` varchar(200) NOT NULL,
		  `meta_title` varchar(200) NOT NULL,
		  `meta_desc` varchar(200) NOT NULL,
		  `meta_key` varchar(200) NOT NULL,
		  `image` varchar(255) NOT NULL,
		  `active` int(11) NOT NULL,
		  PRIMARY KEY (`id`),
		  UNIQUE KEY `slug` (`slug`),
		  KEY `title` (`title`),
		  KEY `date_input` (`date_input`),
		  KEY `active` (`active`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
		");

		$this->execute("
		CREATE TABLE IF NOT EXISTS `category` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `parent_id` int(11) NOT NULL,
		  `name` varchar(100) NOT NULL,
		  `slug` varchar(100) NOT NULL,
		  PRIMARY KEY (`id`),
		  UNIQUE KEY `slug` (`slug`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
		");
	}

	public function down()
	{
		echo "m131118_062851_first_table does not support migration down.\n";
		return false;
	}

}
