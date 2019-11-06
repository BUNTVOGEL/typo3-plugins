#
# Table structure for table 'tx_infochycache_domain_model_data'
#
CREATE TABLE tx_infochycache_domain_model_data (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# TABLE STRUCTURE FOR TABLE 'cf_infochycache_cache'
#
CREATE TABLE cf_infochycache_cache (
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    identifier VARCHAR(250) DEFAULT '' NOT NULL,
    crdate INT(11) UNSIGNED DEFAULT '0' NOT NULL,
    content mediumblob,
    expires INT(11) UNSIGNED DEFAULT '0' NOT NULL,
    PRIMARY KEY (id),
    KEY cache_id (identifier)
) ENGINE=InnoDB;

#
# TABLE STRUCTURE FOR TABLE 'cf_infochycache_cache_tags'
#
CREATE TABLE cf_infochycache_cache_tags (
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    identifier VARCHAR(250) DEFAULT '' NOT NULL,
    tag VARCHAR(250) DEFAULT '' NOT NULL,
    PRIMARY KEY (id),
    KEY cache_id (identifier),
    KEY cache_tag (tag)
) ENGINE=InnoDB;
