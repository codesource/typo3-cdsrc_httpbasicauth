#
# Table structure for table 'tx_cdsrchttpbasicauth_domain_model_access'
#
CREATE TABLE tx_cdsrchttpbasicauth_domain_model_access (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	hidden tinyint(4) DEFAULT '0' NOT NULL,
	starttime int(11) DEFAULT '0' NOT NULL,
	endtime int(11) DEFAULT '0' NOT NULL,

  name varchar(255) DEFAULT '' NOT NULL,
  username varchar(255) DEFAULT '' NOT NULL,
  password varchar(255) DEFAULT '' NOT NULL,
  message tinytext NOT NULL,
	allow_access_to_everybody tinyint(4) DEFAULT '0' NOT NULL,
	allow_propagation tinyint(4) DEFAULT '0' NOT NULL,
	
	PRIMARY KEY (uid)
);