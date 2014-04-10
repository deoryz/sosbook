<?php

class m131209_062851_first_table extends CDbMigration
{
	public function up()
	{

		$this->execute("
		CREATE TABLE IF NOT EXISTS `language` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(100) NOT NULL,
		  `code` varchar(11) NOT NULL,
		  `sort` int(11) NOT NULL,
		  `status` enum('0','1') NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
		");

		$this->execute("
		INSERT INTO `language` (`id`, `name`, `code`, `sort`, `status`) VALUES
		(1, 'Bahasa', 'id', 0, '1'),
		(2, 'English', 'en', 0, '0');
		");

		$this->execute('
		CREATE TABLE IF NOT EXISTS `log` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `username` varchar(100) NOT NULL,
		  `activity` varchar(100) NOT NULL,
		  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
		');

		$this->execute('
		CREATE TABLE IF NOT EXISTS `setting` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(256) NOT NULL,
		  `label` varchar(200) NOT NULL,
		  `value` text NOT NULL,
		  `type` varchar(100) NOT NULL,
		  `hide` int(11) NOT NULL,
		  `group` varchar(100) NOT NULL,
		  `dual_language` enum(\'n\',\'y\') NOT NULL,
		  `sort` int(11) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;
		');

		$this->execute("
		INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
		(1, 'title', 'Title', '', 'text', 0, 'setting', 'y', 1),
		(2, 'keywords', 'Keywords', '', 'text', 0, 'setting', 'y', 2),
		(3, 'description', 'Description', '', 'textarea', 0, 'setting', 'y', 3),
		(4, 'email', 'Email', 'info@findtoko.com', 'text', 0, 'setting', 'n', 4),
		(13, 'facebook', 'Facebook', 'https://www.facebook.com/', 'text', 0, 'setting', 'n', 5),
		(22, 'home_title', 'Title', '', 'textarea', 0, 'home', 'y', 1),
		(23, 'home_read', 'Short Text', '', 'textarea', 0, 'home', 'y', 2),
		(24, 'home_best', 'Best Service', '', 'textarea', 0, 'home', 'y', 3),
		(25, 'home_newslatter', 'Newslatter', '', 'textarea', 0, 'home', 'y', 4),
		(26, 'about_overview', 'Overview', '', 'editor', 0, 'about', 'y', 1),
		(27, 'about_visi', 'Visi', '', 'textarea', 0, 'about', 'y', 2),
		(28, 'about_misi', 'Misi', '', 'editor', 0, 'about', 'y', 3),
		(29, 'doctor_foto', 'Doctor Photo', '405f241fe5about-human-voice.png', 'image', 0, 'about', 'n', 4),
		(30, 'doctor_description', 'Doctor Description', '', 'editor', 0, 'about', 'y', 6),
		(31, 'doctor_detail', 'Doctor Detail', '', 'editor', 0, 'about', 'y', 7),
		(32, 'doctor_name', 'Doctor Name', '', 'text', 0, 'about', 'y', 5),
		(33, 'alamat_footer', 'Alamat Footer', '', 'text', 0, 'setting', 'y', 6),
		(34, 'phone', 'Phone', '0822 3322 7788', 'text', 0, 'setting', 'n', 7),
		(35, 'contact_content', 'Content', '', 'editor', 0, 'contact', 'y', 1),
		(36, 'contact_email', 'Kirim Ke', 'info@surabayaspineclinic.com', 'text', 0, 'contact', 'n', 2),
		(37, 'contact_cc', 'CC Ke', 'ibnu@markdesign.net', 'text', 0, 'contact', 'n', 3),
		(38, 'contact_bcc', 'BCC Ke', 'deoryzpandu@gmail.com', 'text', 0, 'contact', 'n', 4),
		(39, 'location_content', 'Content', '', 'editor', 0, 'location', 'y', 1),
		(40, 'alamat', 'Alamat', '', 'textarea', 0, 'setting', 'y', 10);
		");
		$this->execute('
		CREATE TABLE IF NOT EXISTS `setting_description` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `setting_id` int(11) NOT NULL,
		  `language_id` int(11) NOT NULL,
		  `value` text NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;
		');

		$this->execute('
		CREATE TABLE IF NOT EXISTS `tb_group` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `group` varchar(50) NOT NULL,
		  `aktif` int(11) NOT NULL,
		  `akses` blob NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;
		');

		$this->execute("
		INSERT INTO `tb_group` (`id`, `group`, `aktif`, `akses`) VALUES
		(8, 'Administrator', 1, 0x613a32393a7b693a303b733a31363a2261646d696e2e757365722e696e646578223b693a313b733a31373a2261646d696e2e757365722e637265617465223b693a323b733a31373a2261646d696e2e757365722e757064617465223b693a333b733a31373a2261646d696e2e757365722e64656c657465223b693a343b733a31373a2261646d696e2e736c6964652e696e646578223b693a353b733a31383a2261646d696e2e736c6964652e637265617465223b693a363b733a31383a2261646d696e2e736c6964652e757064617465223b693a373b733a31383a2261646d696e2e736c6964652e64656c657465223b693a383b733a32373a2261646d696e2e7365727669636543617465676f72792e696e646578223b693a393b733a32383a2261646d696e2e7365727669636543617465676f72792e637265617465223b693a31303b733a32383a2261646d696e2e7365727669636543617465676f72792e757064617465223b693a31313b733a32383a2261646d696e2e7365727669636543617465676f72792e64656c657465223b693a31323b733a32313a2261646d696e2e73657474696e672e636f6e74616374223b693a31333b733a31393a2261646d696e2e73657474696e672e696e646578223b693a31343b733a32323a2261646d696e2e73657474696e672e6c6f636174696f6e223b693a31353b733a31393a2261646d696e2e617274696b656c2e696e646578223b693a31363b733a32303a2261646d696e2e617274696b656c2e637265617465223b693a31373b733a32303a2261646d696e2e617274696b656c2e757064617465223b693a31383b733a32303a2261646d696e2e617274696b656c2e64656c657465223b693a31393b733a32313a2261646d696e2e70726f6d6f74696f6e2e696e646578223b693a32303b733a32323a2261646d696e2e70726f6d6f74696f6e2e637265617465223b693a32313b733a32323a2261646d696e2e70726f6d6f74696f6e2e757064617465223b693a32323b733a32323a2261646d696e2e70726f6d6f74696f6e2e64656c657465223b693a32333b733a31393a2261646d696e2e736572766963652e696e646578223b693a32343b733a32303a2261646d696e2e736572766963652e637265617465223b693a32353b733a32303a2261646d696e2e736572766963652e757064617465223b693a32363b733a32303a2261646d696e2e736572766963652e64656c657465223b693a32373b733a31383a2261646d696e2e73657474696e672e686f6d65223b693a32383b733a31393a2261646d696e2e73657474696e672e61626f7574223b7d);
		");

		$this->execute('
		CREATE TABLE IF NOT EXISTS `tb_menu_akses` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `type` varchar(50) NOT NULL,
		  `name` varchar(255) NOT NULL,
		  `controller` varchar(50) NOT NULL,
		  `action` blob NOT NULL,
		  `sub_action` blob NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;
		');

		$this->execute("
		INSERT INTO `tb_menu_akses` (`id`, `type`, `name`, `controller`, `action`, `sub_action`) VALUES
		(22, 'admin', 'User', 'user', 0x613a343a7b733a353a22696e646578223b733a393a224c6973742044617461223b733a363a22637265617465223b733a31313a224372656174652044617461223b733a363a22757064617465223b733a31313a225570646174652044617461223b733a363a2264656c657465223b733a31313a2244656c6574652044617461223b7d, 0x613a303a7b7d),
		(21, 'admin', 'Slide', 'slide', 0x613a343a7b733a353a22696e646578223b733a393a224c6973742044617461223b733a363a22637265617465223b733a31313a224372656174652044617461223b733a363a22757064617465223b733a31313a225570646174652044617461223b733a363a2264656c657465223b733a31313a2244656c6574652044617461223b7d, 0x613a303a7b7d),
		(20, 'admin', 'Service Category', 'serviceCategory', 0x613a343a7b733a353a22696e646578223b733a393a224c6973742044617461223b733a363a22637265617465223b733a31313a224372656174652044617461223b733a363a22757064617465223b733a31313a225570646174652044617461223b733a363a2264656c657465223b733a31313a2244656c6574652044617461223b7d, 0x613a303a7b7d),
		(17, 'admin', 'Contact', 'setting', 0x613a313a7b733a373a22636f6e74616374223b733a31323a224564697420436f6e74616374223b7d, 0x613a303a7b7d),
		(18, 'admin', 'Setting', 'setting', 0x613a313a7b733a353a22696e646578223b733a31373a22456469742053657474696e6720556d756d223b7d, 0x613a303a7b7d),
		(19, 'admin', 'Location', 'setting', 0x613a313a7b733a383a226c6f636174696f6e223b733a31373a2245646974204f7572204c6f636174696f6e223b7d, 0x613a303a7b7d),
		(15, 'admin', 'Artikel', 'artikel', 0x613a343a7b733a353a22696e646578223b733a393a224c6973742044617461223b733a363a22637265617465223b733a31313a224372656174652044617461223b733a363a22757064617465223b733a31313a225570646174652044617461223b733a363a2264656c657465223b733a31313a2244656c6574652044617461223b7d, 0x613a303a7b7d),
		(16, 'admin', 'Promotion', 'promotion', 0x613a343a7b733a353a22696e646578223b733a393a224c6973742044617461223b733a363a22637265617465223b733a31313a224372656174652044617461223b733a363a22757064617465223b733a31313a225570646174652044617461223b733a363a2264656c657465223b733a31313a2244656c6574652044617461223b7d, 0x613a303a7b7d),
		(14, 'admin', 'Service', 'service', 0x613a343a7b733a353a22696e646578223b733a393a224c6973742044617461223b733a363a22637265617465223b733a31313a224372656174652044617461223b733a363a22757064617465223b733a31313a225570646174652044617461223b733a363a2264656c657465223b733a31313a2244656c6574652044617461223b7d, 0x613a303a7b7d),
		(12, 'admin', 'Home', 'setting', 0x613a313a7b733a343a22686f6d65223b733a393a224564697420486f6d65223b7d, 0x613a303a7b7d),
		(13, 'admin', 'About', 'setting', 0x613a313a7b733a353a2261626f7574223b733a31303a22456469742041626f7574223b7d, 0x613a303a7b7d);
		");

		$this->execute('
		CREATE TABLE IF NOT EXISTS `tb_user` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `email` varchar(200) NOT NULL,
		  `pass` varchar(100) NOT NULL,
		  `type` varchar(50) NOT NULL,
		  `group_id` int(11) NOT NULL,
		  `login_terakhir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		  `aktivasi` int(11) NOT NULL,
		  `aktif` int(11) NOT NULL,
		  `user_input` varchar(200) NOT NULL,
		  `tanggal_input` timestamp NOT NULL DEFAULT \'0000-00-00 00:00:00\',
		  `initial` varchar(200) NOT NULL,
		  PRIMARY KEY (`id`),
		  KEY `email` (`email`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
		');

		$this->execute("
		INSERT INTO `tb_user` (`id`, `email`, `pass`, `type`, `group_id`, `login_terakhir`, `aktivasi`, `aktif`, `user_input`, `tanggal_input`, `initial`) VALUES
		(1, 'deoryzpandu@gmail.com', '564fda17f517ae04a86734c2b2341327ed4fd565', 'root', 0, '2014-03-19 15:14:59', 0, 1, '', '2014-02-09 14:21:36', 'Deory Pandu'),
		(2, 'deoryz@yahoo.co.id', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 8, '2014-02-25 03:56:22', 0, 1, '', '0000-00-00 00:00:00', 'deo');
		");



	}

	public function down()
	{
		echo "m131118_062851_first_table does not support migration down.\n";
		return false;
	}

}
