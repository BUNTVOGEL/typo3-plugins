#
# Table structure for table "tt_content"
#

CREATE TABLE tt_content (
  uid int(11) NOT NULL auto_increment,
  pid int(11) default '0' NOT NULL ,
  t3ver_oid int(11) default '0' NOT NULL ,
  t3ver_id int(11) default '0' NOT NULL ,
  t3ver_wsid int(11) default '0' NOT NULL ,
  t3ver_label varchar(30) NOT NULL default '',
  t3ver_state tinyint(4) default '0' NOT NULL ,
  t3ver_stage tinyint(4) default '0' NOT NULL ,
  t3ver_count int(11) default '0' NOT NULL ,
  t3ver_tstamp int(11) default '0' NOT NULL ,
  t3_origuid int(11) default '0' NOT NULL ,
  tstamp int(11) unsigned default '0' NOT NULL ,
  hidden tinyint(4) unsigned default '0' NOT NULL ,
  sorting int(11) unsigned default '0' NOT NULL ,
  CType varchar(30) NOT NULL default '',
  header tinytext NOT NULL,
  header_position varchar(6) NOT NULL default '',
  bodytext mediumtext NOT NULL,
  image blob NOT NULL,
  imagewidth mediumint(11) unsigned default '0' NOT NULL ,
  imageorient tinyint(4) unsigned default '0' NOT NULL ,
  imagecaption text NOT NULL,
  imagecols tinyint(4) unsigned default '0' NOT NULL ,
  imageborder tinyint(4) unsigned default '0' NOT NULL ,
  media blob NOT NULL,
  layout tinyint(3) unsigned default '0' NOT NULL ,
  deleted tinyint(4) unsigned default '0' NOT NULL ,
  cols tinyint(3) unsigned default '0' NOT NULL ,
  records blob NOT NULL,
  pages tinyblob NOT NULL,
  starttime int(11) unsigned default '0' NOT NULL ,
  endtime int(11) unsigned default '0' NOT NULL ,
  colPos tinyint(3) unsigned default '0' NOT NULL ,
  subheader tinytext NOT NULL,
  spaceBefore tinyint(4) unsigned default '0' NOT NULL ,
  spaceAfter tinyint(4) unsigned default '0' NOT NULL ,
  fe_group varchar(100) default '0' NOT NULL ,
  header_link tinytext NOT NULL,
  imagecaption_position varchar(6) NOT NULL default '',
  image_link tinytext NOT NULL,
  image_zoom tinyint(3) unsigned default '0' NOT NULL ,
  image_noRows tinyint(3) unsigned default '0' NOT NULL ,
  image_effects tinyint(3) unsigned default '0' NOT NULL ,
  image_compression tinyint(3) unsigned default '0' NOT NULL ,
  altText text NOT NULL,
  titleText text NOT NULL,
  longdescURL text NOT NULL,
  header_layout varchar(30) default '0' NOT NULL ,
  text_align varchar(6) NOT NULL default '',
  text_face tinyint(3) unsigned default '0' NOT NULL ,
  text_size tinyint(3) unsigned default '0' NOT NULL ,
  text_color tinyint(3) unsigned default '0' NOT NULL ,
  text_properties tinyint(3) unsigned default '0' NOT NULL ,
  menu_type varchar(30) default '0' NOT NULL ,
  list_type varchar(36) default '0' NOT NULL ,
  table_border tinyint(3) unsigned default '0' NOT NULL ,
  table_cellspacing tinyint(3) unsigned default '0' NOT NULL ,
  table_cellpadding tinyint(3) unsigned default '0' NOT NULL ,
  table_bgColor tinyint(3) unsigned default '0' NOT NULL ,
  select_key varchar(80) NOT NULL default '',
  sectionIndex tinyint(3) unsigned default '0' NOT NULL ,
  linkToTop tinyint(3) unsigned default '0' NOT NULL ,
  filelink_size tinyint(3) unsigned default '0' NOT NULL ,
  section_frame tinyint(3) unsigned default '0' NOT NULL ,
  date int(10) unsigned default '0' NOT NULL ,
  splash_layout varchar(30) default '0' NOT NULL ,
  multimedia tinyblob NOT NULL,
  image_frames tinyint(3) unsigned default '0' NOT NULL ,
  recursive tinyint(3) unsigned default '0' NOT NULL ,
  imageheight mediumint(8) unsigned default '0' NOT NULL ,
  rte_enabled tinyint(4) default '0' NOT NULL ,
  sys_language_uid int(11) default '0' NOT NULL ,
  tx_impexp_origuid int(11) default '0' NOT NULL ,
  pi_flexform mediumtext NOT NULL,
  l18n_parent int(11) default '0' NOT NULL ,
  l18n_diffsource mediumblob NOT NULL,
  tx_damdownloadlist_records blob NOT NULL,
  tx_damdownloads_category blob NOT NULL,
  tx_damttcontent_files int(11) unsigned default '0' NOT NULL ,
  tx_cegallery_dam_category blob NOT NULL,
  tx_kjimagelightbox2_imagelightbox2 tinyint(3) default '0' NOT NULL ,
  tx_kjimagelightbox2_imageset tinyint(3) default '0' NOT NULL ,
  tx_kjimagelightbox2_presentationmode tinyint(3) default '0' NOT NULL ,
  PRIMARY KEY  (uid),
  KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY parent (pid,sorting)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

INSERT INTO tt_content VALUES (1, 1, 0, 0, 0, '', 0, 0, 0, 0, 0, 1179622782, 0, 256, 'textpic', 'Lorus Lorem', '', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.  t3s\r\n<ul><li><span class="file">configuration</span></li><li><span class="file">resources</span></li><li><span class="file">library</span></li></ul>\r\nLorem \r\n\r\n<title>Lorem </title>\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\n', '', 200, 17, 'Caption text', 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', '', 'center', '', 0, 0, 0, 0, '', '', '', '0', '', 0, 0, 0, 0, '0', '', 0, 0, 0, 0, '', 1, 0, 0, 0, 0, '0', '', 0, 0, 200, 0, 0, 0, '', 0, 0x613a34353a7b733a353a224354797065223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a363a22636f6c506f73223b4e3b733a31313a2273706163654265666f7265223b4e3b733a31303a2273706163654166746572223b4e3b733a31333a2273656374696f6e5f6672616d65223b4e3b733a31323a2273656374696f6e496e646578223b4e3b733a393a226c696e6b546f546f70223b4e3b733a363a22686561646572223b4e3b733a31353a226865616465725f706f736974696f6e223b4e3b733a31333a226865616465725f6c61796f7574223b4e3b733a31313a226865616465725f6c696e6b223b4e3b733a343a2264617465223b4e3b733a383a22626f647974657874223b4e3b733a31303a22746578745f616c69676e223b4e3b733a393a22746578745f66616365223b4e3b733a393a22746578745f73697a65223b4e3b733a31303a22746578745f636f6c6f72223b4e3b733a31313a227274655f656e61626c6564223b4e3b733a31353a22746578745f70726f70657274696573223b4e3b733a353a22696d616765223b4e3b733a32313a2274785f64616d7474636f6e74656e745f66696c6573223b4e3b733a31313a22696d6167656f7269656e74223b4e3b733a393a22696d616765636f6c73223b4e3b733a31323a22696d6167655f6e6f526f7773223b4e3b733a31313a22696d616765626f72646572223b4e3b733a31303a22696d6167657769647468223b4e3b733a31313a22696d616765686569676874223b4e3b733a31303a22696d6167655f6c696e6b223b4e3b733a31303a22696d6167655f7a6f6f6d223b4e3b733a33343a2274785f6b6a696d6167656c69676874626f78325f696d6167656c69676874626f7832223b4e3b733a32383a2274785f6b6a696d6167656c69676874626f78325f696d616765736574223b4e3b733a33363a2274785f6b6a696d6167656c69676874626f78325f70726573656e746174696f6e6d6f6465223b4e3b733a31373a22696d6167655f636f6d7072657373696f6e223b4e3b733a31333a22696d6167655f65666665637473223b4e3b733a31323a22696d6167655f6672616d6573223b4e3b733a31323a22696d61676563617074696f6e223b4e3b733a32313a22696d61676563617074696f6e5f706f736974696f6e223b4e3b733a373a22616c7454657874223b4e3b733a393a227469746c6554657874223b4e3b733a31313a226c6f6e676465736355524c223b4e3b733a363a2268696464656e223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a383a2266655f67726f7570223b4e3b7d, '', '', 1, '', 1, 0, 0);
INSERT INTO tt_content VALUES (2, 36, 0, 0, 0, '', 0, 0, 0, 0, 0, 1176562473, 0, 256, 'search', '', '', '', '', 0, 8, '', 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '0', '', 0, 0, 0, 0, '0', '', 0, 0, 0, 0, '', 1, 0, 0, 0, 0, '0', '', 0, 0, 0, 0, 0, 0, '', 0, 0x613a31383a7b733a353a224354797065223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a363a22636f6c506f73223b4e3b733a31313a2273706163654265666f7265223b4e3b733a31303a2273706163654166746572223b4e3b733a31333a2273656374696f6e5f6672616d65223b4e3b733a31323a2273656374696f6e496e646578223b4e3b733a393a226c696e6b546f546f70223b4e3b733a363a22686561646572223b4e3b733a31353a226865616465725f706f736974696f6e223b4e3b733a31333a226865616465725f6c61796f7574223b4e3b733a31313a226865616465725f6c696e6b223b4e3b733a343a2264617465223b4e3b733a353a227061676573223b4e3b733a363a2268696464656e223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a383a2266655f67726f7570223b4e3b7d, '', '', 0, '', 0, 0, 0);
INSERT INTO tt_content VALUES (5, 25, 0, 0, 0, '', 0, 0, 0, 0, 0, 1176564477, 0, 256, 'list', '', '', '', '', 0, 8, '', 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '0', '', 0, 0, 0, 0, '0', 'chc_forum_pi1', 0, 0, 0, 0, '', 1, 0, 0, 0, 0, '0', '', 0, 0, 0, 0, 0, 0, '<?xml version="1.0" encoding="iso-8859-1" standalone="yes" ?>\n<T3FlexForms>\n    <data>\n        <sheet index="sDEF">\n            <language index="lDEF">\n                <field index="feusers_pid">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_profiles">\n            <language index="lDEF">\n                <field index="disable_profile">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="disable_img">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="disable_img_edit">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="disable_email">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="disable_website">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="disable_aim">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="disable_yahoo">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="disable_msn">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="custom_im">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="alt_img_field">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="alt_img_path">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_post">\n            <language index="lDEF">\n                <field index="req_email">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="use_username">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="allow_rating">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="allow_thread_endtime">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="max_thread_lifetime">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="thread_lifetime">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_appearance">\n            <language index="lDEF">\n                <field index="tmpl_path">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="image_ext_type">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="forum_title">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="hot_thread_cnt">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="subject_trim">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="posts_per_page">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="threads_per_page">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="users_per_page">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="date_format">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="time_format">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="conf_sorting">\n                    <value index="vDEF">sort</value>\n                </field>\n                <field index="cat_sorting">\n                    <value index="vDEF">sort</value>\n                </field>\n                <field index="thread_sorting">\n                    <value index="vDEF">desc</value>\n                </field>\n                <field index="post_sorting">\n                    <value index="vDEF">asc</value>\n                </field>\n                <field index="ulist_disable">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="hide_empty_cats">\n                    <value index="vDEF">0</value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_emoticons">\n            <language index="lDEF">\n                <field index="emoticons_disable">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="emoticons_path">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="emoticons_type">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="emoticons_add">\n                    <value index="vDEF">0</value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_mailer">\n            <language index="lDEF">\n                <field index="mailer_forum_url">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="mailer_email">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="mailer_disable">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="mailer_disable_thread_watch">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="mailer_msg_tmpl">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_pruning">\n            <language index="lDEF">\n                <field index="pruning_auto">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_security">\n            <language index="lDEF">\n                <field index="forum_pw">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="restrict_ulist">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="max_user_img">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="max_attach">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="allowed_file_types">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="allowed_mime_types">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_thirdparty">\n            <language index="lDEF">\n                <field index="enable_cwtcommunity">\n                    <value index="vDEF">0</value>\n                </field>\n            </language>\n        </sheet>\n    </data>\n</T3FlexForms>', 0, 0x613a32313a7b733a353a224354797065223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a363a22636f6c506f73223b4e3b733a31313a2273706163654265666f7265223b4e3b733a31303a2273706163654166746572223b4e3b733a31333a2273656374696f6e5f6672616d65223b4e3b733a31323a2273656374696f6e496e646578223b4e3b733a393a226c696e6b546f546f70223b4e3b733a363a22686561646572223b4e3b733a31353a226865616465725f706f736974696f6e223b4e3b733a31333a226865616465725f6c61796f7574223b4e3b733a31313a226865616465725f6c696e6b223b4e3b733a343a2264617465223b4e3b733a393a226c6973745f74797065223b4e3b733a31313a2270695f666c6578666f726d223b4e3b733a353a227061676573223b4e3b733a393a22726563757273697665223b4e3b733a363a2268696464656e223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a383a2266655f67726f7570223b4e3b7d, '', '', 0, '', 0, 0, 0);
INSERT INTO tt_content VALUES (8, 62, 0, 0, 0, '', 0, 0, 0, 0, 0, 1176580880, 0, 256, 'menu', '', '', '', '', 0, 8, '', 0, 0, '', 0, 0, 0, '', 0x31, 0, 0, 0, '', 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '0', '', 0, 0, 0, 0, '2', '', 0, 0, 0, 0, '', 1, 0, 0, 0, 0, '0', '', 0, 0, 0, 0, 0, 0, '', 0, 0x613a31393a7b733a353a224354797065223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a363a22636f6c506f73223b4e3b733a31313a2273706163654265666f7265223b4e3b733a31303a2273706163654166746572223b4e3b733a31333a2273656374696f6e5f6672616d65223b4e3b733a31323a2273656374696f6e496e646578223b4e3b733a393a226c696e6b546f546f70223b4e3b733a363a22686561646572223b4e3b733a31353a226865616465725f706f736974696f6e223b4e3b733a31333a226865616465725f6c61796f7574223b4e3b733a31313a226865616465725f6c696e6b223b4e3b733a343a2264617465223b4e3b733a393a226d656e755f74797065223b4e3b733a353a227061676573223b4e3b733a363a2268696464656e223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a383a2266655f67726f7570223b4e3b7d, '', '', 0, '', 0, 0, 0);
INSERT INTO tt_content VALUES (9, 53, 0, 0, 0, '', 0, 0, 0, 0, 0, 1176839028, 0, 256, 'list', '', '', '', '', 0, 8, '', 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '0', '', 0, 0, 0, 0, '0', 'th_mailformplus_pi1', 0, 0, 0, 0, '', 1, 0, 0, 0, 0, '0', '', 0, 0, 0, 0, 0, 0, '', 0, 0x613a32303a7b733a353a224354797065223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a363a22636f6c506f73223b4e3b733a31313a2273706163654265666f7265223b4e3b733a31303a2273706163654166746572223b4e3b733a31333a2273656374696f6e5f6672616d65223b4e3b733a31323a2273656374696f6e496e646578223b4e3b733a393a226c696e6b546f546f70223b4e3b733a363a22686561646572223b4e3b733a31353a226865616465725f706f736974696f6e223b4e3b733a31333a226865616465725f6c61796f7574223b4e3b733a31313a226865616465725f6c696e6b223b4e3b733a343a2264617465223b4e3b733a393a226c6973745f74797065223b4e3b733a353a227061676573223b4e3b733a393a22726563757273697665223b4e3b733a363a2268696464656e223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a383a2266655f67726f7570223b4e3b7d, '', '', 0, '', 0, 0, 0);
INSERT INTO tt_content VALUES (10, 86, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 1, 0, 'textpic', 'jujumicha@web.de', '', '', '', 0, 0, '', 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '0', '', '', '', 0, 0, 0, 0, '', '', '', '0', '', 0, 0, 0, 0, '0', '0', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, '0', '', 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, '', 0, 0, 0);
INSERT INTO tt_content VALUES (7, 4, 0, 0, 0, '', 0, 0, 0, 0, 0, 1176567885, 0, 256, 'list', '', '', '', '', 0, 8, '', 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '0', '', 0, 0, 0, 0, '0', 'chc_forum_pi1', 0, 0, 0, 0, '', 1, 0, 0, 0, 0, '0', '', 0, 0, 0, 0, 0, 0, '<?xml version="1.0" encoding="iso-8859-1" standalone="yes" ?>\n<T3FlexForms>\n    <data>\n        <sheet index="sDEF">\n            <language index="lDEF">\n                <field index="feusers_pid">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_profiles">\n            <language index="lDEF">\n                <field index="disable_profile">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="disable_img">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="disable_img_edit">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="disable_email">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="disable_website">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="disable_aim">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="disable_yahoo">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="disable_msn">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="custom_im">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="alt_img_field">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="alt_img_path">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_post">\n            <language index="lDEF">\n                <field index="req_email">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="use_username">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="allow_rating">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="allow_thread_endtime">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="max_thread_lifetime">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="thread_lifetime">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_appearance">\n            <language index="lDEF">\n                <field index="tmpl_path">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="image_ext_type">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="forum_title">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="hot_thread_cnt">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="subject_trim">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="posts_per_page">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="threads_per_page">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="users_per_page">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="date_format">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="time_format">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="conf_sorting">\n                    <value index="vDEF">sort</value>\n                </field>\n                <field index="cat_sorting">\n                    <value index="vDEF">sort</value>\n                </field>\n                <field index="thread_sorting">\n                    <value index="vDEF">desc</value>\n                </field>\n                <field index="post_sorting">\n                    <value index="vDEF">asc</value>\n                </field>\n                <field index="ulist_disable">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="hide_empty_cats">\n                    <value index="vDEF">0</value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_emoticons">\n            <language index="lDEF">\n                <field index="emoticons_disable">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="emoticons_path">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="emoticons_type">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="emoticons_add">\n                    <value index="vDEF">0</value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_mailer">\n            <language index="lDEF">\n                <field index="mailer_forum_url">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="mailer_email">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="mailer_disable">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="mailer_disable_thread_watch">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="mailer_msg_tmpl">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_pruning">\n            <language index="lDEF">\n                <field index="pruning_auto">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_security">\n            <language index="lDEF">\n                <field index="forum_pw">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="restrict_ulist">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="max_user_img">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="max_attach">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="allowed_file_types">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="allowed_mime_types">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_thirdparty">\n            <language index="lDEF">\n                <field index="enable_cwtcommunity">\n                    <value index="vDEF">0</value>\n                </field>\n            </language>\n        </sheet>\n    </data>\n</T3FlexForms>', 0, 0x613a32313a7b733a353a224354797065223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a363a22636f6c506f73223b4e3b733a31313a2273706163654265666f7265223b4e3b733a31303a2273706163654166746572223b4e3b733a31333a2273656374696f6e5f6672616d65223b4e3b733a31323a2273656374696f6e496e646578223b4e3b733a393a226c696e6b546f546f70223b4e3b733a363a22686561646572223b4e3b733a31353a226865616465725f706f736974696f6e223b4e3b733a31333a226865616465725f6c61796f7574223b4e3b733a31313a226865616465725f6c696e6b223b4e3b733a343a2264617465223b4e3b733a393a226c6973745f74797065223b4e3b733a31313a2270695f666c6578666f726d223b4e3b733a353a227061676573223b4e3b733a393a22726563757273697665223b4e3b733a363a2268696464656e223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a383a2266655f67726f7570223b4e3b7d, '', '', 0, '', 0, 0, 0);
INSERT INTO tt_content VALUES (11, 3, 0, 0, 0, '', 0, 0, 0, 0, 0, 1196151350, 0, 256, 'list', '', '', '', '', 0, 8, '', 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '0', '', 0, 0, 0, 0, '0', 'ce_gallery_pi1', 0, 0, 0, 0, '', 1, 0, 0, 0, 0, '0', '', 0, 250, 0, 0, 0, 0, '<?xml version="1.0" encoding="iso-8859-1" standalone="yes" ?>\n<T3FlexForms>\n    <data>\n        <sheet index="thumbnails">\n            <language index="lDEF">\n                <field index="thumbwidth">\n                    <value index="vDEF">160</value>\n                </field>\n                <field index="thumbheight">\n                    <value index="vDEF">160</value>\n                </field>\n                <field index="thumbquality">\n                    <value index="vDEF">90</value>\n                </field>\n                <field index="thumbnumber">\n                    <value index="vDEF">6</value>\n                </field>\n                <field index="thumbrownumber">\n                    <value index="vDEF">2</value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="detail">\n            <language index="lDEF">\n                <field index="detailwidth">\n                    <value index="vDEF">370</value>\n                </field>\n                <field index="detailheight">\n                    <value index="vDEF">370</value>\n                </field>\n                <field index="detailquality">\n                    <value index="vDEF">90</value>\n                </field>\n                <field index="smoothslideshow">\n                    <value index="vDEF">1</value>\n                </field>\n                <field index="smoothslideshowdelay">\n                    <value index="vDEF">4500</value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="categoryView">\n            <language index="lDEF">\n                <field index="category">\n                    <value index="vDEF">1</value>\n                </field>\n            </language>\n        </sheet>\n    </data>\n</T3FlexForms>', 0, 0x613a32313a7b733a353a224354797065223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a363a22636f6c506f73223b4e3b733a31313a2273706163654265666f7265223b4e3b733a31303a2273706163654166746572223b4e3b733a31333a2273656374696f6e5f6672616d65223b4e3b733a31323a2273656374696f6e496e646578223b4e3b733a393a226c696e6b546f546f70223b4e3b733a363a22686561646572223b4e3b733a31353a226865616465725f706f736974696f6e223b4e3b733a31333a226865616465725f6c61796f7574223b4e3b733a31313a226865616465725f6c696e6b223b4e3b733a343a2264617465223b4e3b733a393a226c6973745f74797065223b4e3b733a31313a2270695f666c6578666f726d223b4e3b733a353a227061676573223b4e3b733a393a22726563757273697665223b4e3b733a363a2268696464656e223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a383a2266655f67726f7570223b4e3b7d, '', '', 0, '', 0, 0, 0);
INSERT INTO tt_content VALUES (12, 63, 0, 0, 0, '', 0, 0, 0, 0, 0, 1196151410, 0, 256, 'list', '', '', '', '', 0, 8, '', 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '0', '', 0, 0, 0, 0, '0', 'damd_gallery_pi1', 0, 0, 0, 0, '', 1, 0, 0, 0, 0, '0', '', 0, 0, 0, 0, 0, 0, '<?xml version="1.0" encoding="iso-8859-1" standalone="yes" ?>\n<T3FlexForms>\n    <data>\n        <sheet index="sDEF">\n            <language index="lDEF">\n                <field index="code">\n                    <value index="vDEF">THUMBS</value>\n                </field>\n                <field index="wich_dam_cat">\n                    <value index="vDEF">1</value>\n                </field>\n                <field index="overlayIengine">\n                    <value index="vDEF">Lightbox</value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_template">\n            <language index="lDEF">\n                <field index="template_file">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="css_file">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="singleImagePID">\n                    <value index="vDEF">64</value>\n                </field>\n                <field index="commentPid">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="Advanced">\n            <language index="lDEF">\n                <field index="photoWidth">\n                    <value index="vDEF">600</value>\n                </field>\n                <field index="photoHeight">\n                    <value index="vDEF">600</value>\n                </field>\n                <field index="thumbnailWidth">\n                    <value index="vDEF">300</value>\n                </field>\n                <field index="thumbnailHeight">\n                    <value index="vDEF">300</value>\n                </field>\n                <field index="lightboxWidth">\n                    <value index="vDEF">400</value>\n                </field>\n                <field index="lightboxHeight">\n                    <value index="vDEF">400</value>\n                </field>\n            </language>\n        </sheet>\n    </data>\n</T3FlexForms>', 0, 0x613a32313a7b733a353a224354797065223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a363a22636f6c506f73223b4e3b733a31313a2273706163654265666f7265223b4e3b733a31303a2273706163654166746572223b4e3b733a31333a2273656374696f6e5f6672616d65223b4e3b733a31323a2273656374696f6e496e646578223b4e3b733a393a226c696e6b546f546f70223b4e3b733a363a22686561646572223b4e3b733a31353a226865616465725f706f736974696f6e223b4e3b733a31333a226865616465725f6c61796f7574223b4e3b733a31313a226865616465725f6c696e6b223b4e3b733a343a2264617465223b4e3b733a393a226c6973745f74797065223b4e3b733a31313a2270695f666c6578666f726d223b4e3b733a353a227061676573223b4e3b733a393a22726563757273697665223b4e3b733a363a2268696464656e223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a383a2266655f67726f7570223b4e3b7d, '', '', 0, '', 0, 0, 0);
INSERT INTO tt_content VALUES (13, 64, 0, 0, 0, '', 0, 0, 0, 0, 0, 1196151436, 0, 256, 'list', '', '', '', '', 0, 8, '', 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '0', '', 0, 0, 0, 0, '0', 'damd_gallery_pi1', 0, 0, 0, 0, '', 1, 0, 0, 0, 0, '0', '', 0, 0, 0, 0, 0, 0, '<?xml version="1.0" encoding="iso-8859-1" standalone="yes" ?>\n<T3FlexForms>\n    <data>\n        <sheet index="sDEF">\n            <language index="lDEF">\n                <field index="code">\n                    <value index="vDEF">BIG_IMAGE,IMG_DESCRIPTION</value>\n                </field>\n                <field index="wich_dam_cat">\n                    <value index="vDEF">1</value>\n                </field>\n                <field index="overlayIengine">\n                    <value index="vDEF">Lightbox</value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_template">\n            <language index="lDEF">\n                <field index="template_file">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="css_file">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="singleImagePID">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="commentPid">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="Advanced">\n            <language index="lDEF">\n                <field index="photoWidth">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="photoHeight">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="thumbnailWidth">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="thumbnailHeight">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="lightboxWidth">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="lightboxHeight">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n    </data>\n</T3FlexForms>', 0, 0x613a32313a7b733a353a224354797065223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a363a22636f6c506f73223b4e3b733a31313a2273706163654265666f7265223b4e3b733a31303a2273706163654166746572223b4e3b733a31333a2273656374696f6e5f6672616d65223b4e3b733a31323a2273656374696f6e496e646578223b4e3b733a393a226c696e6b546f546f70223b4e3b733a363a22686561646572223b4e3b733a31353a226865616465725f706f736974696f6e223b4e3b733a31333a226865616465725f6c61796f7574223b4e3b733a31313a226865616465725f6c696e6b223b4e3b733a343a2264617465223b4e3b733a393a226c6973745f74797065223b4e3b733a31313a2270695f666c6578666f726d223b4e3b733a353a227061676573223b4e3b733a393a22726563757273697665223b4e3b733a363a2268696464656e223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a383a2266655f67726f7570223b4e3b7d, '', '', 0, '', 0, 0, 0);
INSERT INTO tt_content VALUES (14, 63, 0, 0, 0, '', 0, 0, 0, 0, 12, 1179622987, 0, 1000000000, 'list', '', '', '', '', 0, 8, '', 0, 0, '', 0, 1, 0, '', '', 0, 0, 0, '', 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '0', '', 0, 0, 0, 0, '0', 'damd_gallery_pi1', 0, 0, 0, 0, '', 1, 0, 0, 0, 0, '0', '', 0, 0, 0, 0, 0, 0, '<?xml version="1.0" encoding="iso-8859-1" standalone="yes" ?>\n<T3FlexForms>\n    <data>\n        <sheet index="sDEF">\n            <language index="lDEF">\n                <field index="code">\n                    <value index="vDEF">THUMBS</value>\n                </field>\n                <field index="wich_dam_cat">\n                    <value index="vDEF">1</value>\n                </field>\n                <field index="overlayIengine">\n                    <value index="vDEF">Lightbox</value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_template">\n            <language index="lDEF">\n                <field index="template_file">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="css_file">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="singleImagePID">\n                    <value index="vDEF">64</value>\n                </field>\n                <field index="commentPid">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="Advanced">\n            <language index="lDEF">\n                <field index="photoWidth">\n                    <value index="vDEF">600</value>\n                </field>\n                <field index="photoHeight">\n                    <value index="vDEF">600</value>\n                </field>\n                <field index="thumbnailWidth">\n                    <value index="vDEF">100</value>\n                </field>\n                <field index="thumbnailHeight">\n                    <value index="vDEF">100</value>\n                </field>\n                <field index="lightboxWidth">\n                    <value index="vDEF">600</value>\n                </field>\n                <field index="lightboxHeight">\n                    <value index="vDEF">600</value>\n                </field>\n            </language>\n        </sheet>\n    </data>\n</T3FlexForms>', 0, 0x613a32313a7b733a353a224354797065223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a363a22636f6c506f73223b4e3b733a31313a2273706163654265666f7265223b4e3b733a31303a2273706163654166746572223b4e3b733a31333a2273656374696f6e5f6672616d65223b4e3b733a31323a2273656374696f6e496e646578223b4e3b733a393a226c696e6b546f546f70223b4e3b733a363a22686561646572223b4e3b733a31353a226865616465725f706f736974696f6e223b4e3b733a31333a226865616465725f6c61796f7574223b4e3b733a31313a226865616465725f6c696e6b223b4e3b733a343a2264617465223b4e3b733a393a226c6973745f74797065223b4e3b733a31313a2270695f666c6578666f726d223b4e3b733a353a227061676573223b4e3b733a393a22726563757273697665223b4e3b733a363a2268696464656e223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a383a2266655f67726f7570223b4e3b7d, '', '', 0, '', 0, 0, 0);
INSERT INTO tt_content VALUES (15, 5, 0, 0, 0, '', 0, 0, 0, 0, 0, 1196151744, 0, 256, 'list', '', '', '', '', 0, 8, '', 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '0', '', 0, 0, 0, 0, '0', '9', 0, 0, 0, 0, '', 1, 0, 0, 0, 0, '0', '', 0, 0, 0, 0, 0, 0, '<?xml version="1.0" encoding="iso-8859-1" standalone="yes" ?>\n<T3FlexForms>\n    <data>\n        <sheet index="sDEF">\n            <language index="lDEF">\n                <field index="what_to_display">\n                    <value index="vDEF">LIST</value>\n                </field>\n                <field index="listOrderBy">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="ascDesc">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="categoryMode">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="categorySelection">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="useSubCategories">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="archive">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="pages">\n                    <value index="vDEF">61</value>\n                </field>\n                <field index="recursive">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_template">\n            <language index="lDEF">\n                <field index="template_file">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="imageMaxWidth">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="imageMaxHeight">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="alternatingLayouts">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="croppingLenght">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_category">\n            <language index="lDEF">\n                <field index="catImageMode">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="catImageMaxWidth">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="catImageMaxHeight">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="maxCatImages">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="catTextMode">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="maxCatTexts">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_misc">\n            <language index="lDEF">\n                <field index="PIDitemDisplay">\n                    <value index="vDEF">67</value>\n                </field>\n                <field index="backPid">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="firstImageIsPreview">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="forceFirstImageIsPreview">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="listStartId">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="listLimit">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="noPageBrowser">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="maxWordsInSingleView">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n    </data>\n</T3FlexForms>', 0, 0x613a31393a7b733a353a224354797065223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a363a22636f6c506f73223b4e3b733a31313a2273706163654265666f7265223b4e3b733a31303a2273706163654166746572223b4e3b733a31333a2273656374696f6e5f6672616d65223b4e3b733a31323a2273656374696f6e496e646578223b4e3b733a393a226c696e6b546f546f70223b4e3b733a363a22686561646572223b4e3b733a31353a226865616465725f706f736974696f6e223b4e3b733a31333a226865616465725f6c61796f7574223b4e3b733a31313a226865616465725f6c696e6b223b4e3b733a343a2264617465223b4e3b733a393a226c6973745f74797065223b4e3b733a31313a2270695f666c6578666f726d223b4e3b733a363a2268696464656e223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a383a2266655f67726f7570223b4e3b7d, '', '', 0, '', 0, 0, 0);
INSERT INTO tt_content VALUES (16, 67, 0, 0, 0, '', 0, 0, 0, 0, 0, 1196151762, 0, 256, 'list', '', '', '', '', 0, 8, '', 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '0', '', 0, 0, 0, 0, '0', '9', 0, 0, 0, 0, '', 1, 0, 0, 0, 0, '0', '', 0, 0, 0, 0, 0, 0, '<?xml version="1.0" encoding="iso-8859-1" standalone="yes" ?>\n<T3FlexForms>\n    <data>\n        <sheet index="sDEF">\n            <language index="lDEF">\n                <field index="what_to_display">\n                    <value index="vDEF">SINGLE</value>\n                </field>\n                <field index="listOrderBy">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="ascDesc">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="categoryMode">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="categorySelection">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="useSubCategories">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="archive">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="pages">\n                    <value index="vDEF">61</value>\n                </field>\n                <field index="recursive">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_template">\n            <language index="lDEF">\n                <field index="template_file">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="imageMaxWidth">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="imageMaxHeight">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="alternatingLayouts">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="croppingLenght">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_category">\n            <language index="lDEF">\n                <field index="catImageMode">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="catImageMaxWidth">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="catImageMaxHeight">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="maxCatImages">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="catTextMode">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="maxCatTexts">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_misc">\n            <language index="lDEF">\n                <field index="PIDitemDisplay">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="backPid">\n                    <value index="vDEF">5</value>\n                </field>\n                <field index="firstImageIsPreview">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="forceFirstImageIsPreview">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="listStartId">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="listLimit">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="noPageBrowser">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="maxWordsInSingleView">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n    </data>\n</T3FlexForms>', 0, 0x613a31393a7b733a353a224354797065223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a363a22636f6c506f73223b4e3b733a31313a2273706163654265666f7265223b4e3b733a31303a2273706163654166746572223b4e3b733a31333a2273656374696f6e5f6672616d65223b4e3b733a31323a2273656374696f6e496e646578223b4e3b733a393a226c696e6b546f546f70223b4e3b733a363a22686561646572223b4e3b733a31353a226865616465725f706f736974696f6e223b4e3b733a31333a226865616465725f6c61796f7574223b4e3b733a31313a226865616465725f6c696e6b223b4e3b733a343a2264617465223b4e3b733a393a226c6973745f74797065223b4e3b733a31313a2270695f666c6578666f726d223b4e3b733a363a2268696464656e223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a383a2266655f67726f7570223b4e3b7d, '', '', 0, '', 0, 0, 0);
INSERT INTO tt_content VALUES (17, 14, 0, 0, 0, '', 0, 0, 0, 0, 0, 1179624490, 0, 256, 'list', '', '', '', '', 0, 8, '', 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '0', '', 0, 0, 0, 0, '0', '9', 0, 0, 0, 0, '', 1, 0, 0, 0, 0, '0', '', 0, 0, 0, 0, 0, 0, '<?xml version="1.0" encoding="iso-8859-1" standalone="yes" ?>\n<T3FlexForms>\n    <data>\n        <sheet index="sDEF">\n            <language index="lDEF">\n                <field index="what_to_display">\n                    <value index="vDEF">LIST</value>\n                </field>\n                <field index="listOrderBy">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="ascDesc">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="categoryMode">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="categorySelection">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="useSubCategories">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="archive">\n                    <value index="vDEF">1</value>\n                </field>\n                <field index="pages">\n                    <value index="vDEF">61</value>\n                </field>\n                <field index="recursive">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_template">\n            <language index="lDEF">\n                <field index="template_file">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="imageMaxWidth">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="imageMaxHeight">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="alternatingLayouts">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="croppingLenght">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_category">\n            <language index="lDEF">\n                <field index="catImageMode">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="catImageMaxWidth">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="catImageMaxHeight">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="maxCatImages">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="catTextMode">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="maxCatTexts">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n        <sheet index="s_misc">\n            <language index="lDEF">\n                <field index="PIDitemDisplay">\n                    <value index="vDEF">67</value>\n                </field>\n                <field index="backPid">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="firstImageIsPreview">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="forceFirstImageIsPreview">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="listStartId">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="listLimit">\n                    <value index="vDEF"></value>\n                </field>\n                <field index="noPageBrowser">\n                    <value index="vDEF">0</value>\n                </field>\n                <field index="maxWordsInSingleView">\n                    <value index="vDEF"></value>\n                </field>\n            </language>\n        </sheet>\n    </data>\n</T3FlexForms>', 0, 0x613a31393a7b733a353a224354797065223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a363a22636f6c506f73223b4e3b733a31313a2273706163654265666f7265223b4e3b733a31303a2273706163654166746572223b4e3b733a31333a2273656374696f6e5f6672616d65223b4e3b733a31323a2273656374696f6e496e646578223b4e3b733a393a226c696e6b546f546f70223b4e3b733a363a22686561646572223b4e3b733a31353a226865616465725f706f736974696f6e223b4e3b733a31333a226865616465725f6c61796f7574223b4e3b733a31313a226865616465725f6c696e6b223b4e3b733a343a2264617465223b4e3b733a393a226c6973745f74797065223b4e3b733a31313a2270695f666c6578666f726d223b4e3b733a363a2268696464656e223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a383a2266655f67726f7570223b4e3b7d, '', '', 0, '', 0, 0, 0);

#
# Table structure for table "sys_template"
#

CREATE TABLE sys_template (
  uid int(11) NOT NULL auto_increment,
  pid int(11) default '0' NOT NULL ,
  t3ver_oid int(11) default '0' NOT NULL ,
  t3ver_id int(11) default '0' NOT NULL ,
  t3ver_wsid int(11) default '0' NOT NULL ,
  t3ver_label varchar(30) NOT NULL default '',
  t3ver_state tinyint(4) default '0' NOT NULL ,
  t3ver_stage tinyint(4) default '0' NOT NULL ,
  t3ver_count int(11) default '0' NOT NULL ,
  t3ver_tstamp int(11) default '0' NOT NULL ,
  t3_origuid int(11) default '0' NOT NULL ,
  tstamp int(11) unsigned default '0' NOT NULL ,
  sorting int(11) unsigned default '0' NOT NULL ,
  crdate int(11) unsigned default '0' NOT NULL ,
  cruser_id int(11) unsigned default '0' NOT NULL ,
  title tinytext NOT NULL,
  sitetitle tinytext NOT NULL,
  hidden tinyint(4) unsigned default '0' NOT NULL ,
  starttime int(11) unsigned default '0' NOT NULL ,
  endtime int(11) unsigned default '0' NOT NULL ,
  root tinyint(4) unsigned default '0' NOT NULL ,
  clear tinyint(4) unsigned default '0' NOT NULL ,
  include_static tinyblob NOT NULL,
  include_static_file blob NOT NULL,
  constants blob NOT NULL,
  config blob NOT NULL,
  editorcfg blob NOT NULL,
  resources blob NOT NULL,
  nextLevel varchar(5) NOT NULL default '',
  description text NOT NULL,
  basedOn tinyblob NOT NULL,
  deleted tinyint(3) unsigned default '0' NOT NULL ,
  includeStaticAfterBasedOn tinyint(4) unsigned default '0' NOT NULL ,
  static_file_mode tinyint(4) unsigned default '0' NOT NULL ,
  tx_impexp_origuid int(11) default '0' NOT NULL ,
  PRIMARY KEY  (uid),
  KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY parent (pid,sorting)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO sys_template VALUES (1, 1, 0, 0, 0, '', 0, 0, 0, 0, 0, 1200774349, 512, 1174943984, 1, 't3s', '', 0, 0, 0, 0, 0, '', 0x4558543a743373756761722f74656d702f74732f, 0x0a636f6e6669672e74785f7265616c75726c5f656e61626c65203d2030, '', '', '', '', '', '', 0, 0, 2, 0);
INSERT INTO sys_template VALUES (3, 1, 0, 0, 0, '', 0, 0, 0, 0, 0, 1179624326, 256, 1176657337, 1, 'root', '', 0, 0, 0, 1, 3, '', 0x4558543a6373735f7374796c65645f636f6e74656e742f7374617469632f2c4558543a63655f67616c6c6572792f7069312f7374617469632f2c4558543a64616d645f67616c6c6572792f7069312f7374617469632f2c4558543a6b6a5f696d6167656c69676874626f78322f7374617469632f496d6167654c69676874626f785f76322f2c4558543a74696d7461622f7374617469632f776562736572766963652f2c4558543a74696d7461622f7374617469632f6b75627269636b5f6d61696e2f2c4558543a74745f6e6577732f7374617469632f7273735f666565642f2c4558543a74745f6e6577732f7374617469632f74735f6f6c642f2c4558543a74745f6e6577732f7374617469632f74735f6e65772f, '', 0x7061676543737353637265656e2e3430203d200d0a7061676543737353637265656e2e3530203d20, '', '', '', '', 0x31, 0, 0, 0, 0);

#
# Table structure for table "sys_language"
#

CREATE TABLE sys_language (
  uid int(11) unsigned NOT NULL auto_increment,
  pid int(11) unsigned default '0' NOT NULL ,
  tstamp int(11) unsigned default '0' NOT NULL ,
  hidden tinyint(4) unsigned default '0' NOT NULL ,
  title varchar(80) NOT NULL default '',
  flag varchar(20) NOT NULL default '',
  static_lang_isocode int(11) unsigned default '0' NOT NULL ,
  PRIMARY KEY  (uid),
  KEY parent (pid)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


INSERT INTO sys_language VALUES (1, 0, 1176506665, 0, 'Englisch', 'en.gif', 0);

#
# Table structure for table "pages_language_overlay"
#

CREATE TABLE pages_language_overlay (
  uid int(11) NOT NULL auto_increment,
  pid int(11) default '0' NOT NULL ,
  t3ver_oid int(11) default '0' NOT NULL ,
  t3ver_id int(11) default '0' NOT NULL ,
  t3ver_wsid int(11) default '0' NOT NULL ,
  t3ver_label varchar(30) NOT NULL default '',
  t3ver_state tinyint(4) default '0' NOT NULL ,
  t3ver_stage tinyint(4) default '0' NOT NULL ,
  t3ver_count int(11) default '0' NOT NULL ,
  t3ver_tstamp int(11) default '0' NOT NULL ,
  t3_origuid int(11) default '0' NOT NULL ,
  tstamp int(11) unsigned default '0' NOT NULL ,
  crdate int(11) unsigned default '0' NOT NULL ,
  cruser_id int(11) unsigned default '0' NOT NULL ,
  sys_language_uid int(11) unsigned default '0' NOT NULL ,
  title tinytext NOT NULL,
  hidden tinyint(4) unsigned default '0' NOT NULL ,
  starttime int(11) unsigned default '0' NOT NULL ,
  endtime int(11) unsigned default '0' NOT NULL ,
  deleted tinyint(3) unsigned default '0' NOT NULL ,
  subtitle tinytext NOT NULL,
  nav_title tinytext NOT NULL,
  media tinyblob NOT NULL,
  keywords text NOT NULL,
  description text NOT NULL,
  abstract text NOT NULL,
  author tinytext NOT NULL,
  author_email varchar(80) NOT NULL default '',
  tx_impexp_origuid int(11) default '0' NOT NULL ,
  l18n_diffsource mediumblob NOT NULL,
  PRIMARY KEY  (uid),
  KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY parent (pid)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;



INSERT INTO pages_language_overlay VALUES (1, 1, 0, 0, 0, '', 0, 0, 0, 0, 0, 1193917890, 1176506683, 1, 1, 'Start', 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0x613a31333a7b733a363a2268696464656e223b733a313a2230223b733a31363a227379735f6c616e67756167655f756964223b4e3b733a353a227469746c65223b733a343a22486f6d65223b733a383a227375627469746c65223b733a303a22223b733a393a226e61765f7469746c65223b733a303a22223b733a383a226162737472616374223b733a303a22223b733a383a226b6579776f726473223b733a303a22223b733a31313a226465736372697074696f6e223b733a303a22223b733a353a226d65646961223b733a303a22223b733a393a22737461727474696d65223b733a313a2230223b733a373a22656e6474696d65223b733a313a2230223b733a363a22617574686f72223b733a303a22223b733a31323a22617574686f725f656d61696c223b733a303a22223b7d);
INSERT INTO pages_language_overlay VALUES (4, 69, 0, 0, 0, '', 0, 0, 0, 0, 0, 1196151297, 1196151297, 1, 1, 'Start', 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0x613a31333a7b733a363a2268696464656e223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a353a227469746c65223b4e3b733a383a227375627469746c65223b4e3b733a393a226e61765f7469746c65223b4e3b733a383a226162737472616374223b4e3b733a383a226b6579776f726473223b4e3b733a31313a226465736372697074696f6e223b4e3b733a353a226d65646961223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a363a22617574686f72223b4e3b733a31323a22617574686f725f656d61696c223b4e3b7d);
INSERT INTO pages_language_overlay VALUES (5, 64, 0, 0, 0, '', 0, 0, 0, 0, 0, 1196151555, 1196151555, 1, 1, 'Image', 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0x613a31333a7b733a363a2268696464656e223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a353a227469746c65223b4e3b733a383a227375627469746c65223b4e3b733a393a226e61765f7469746c65223b4e3b733a383a226162737472616374223b4e3b733a383a226b6579776f726473223b4e3b733a31313a226465736372697074696f6e223b4e3b733a353a226d65646961223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a363a22617574686f72223b4e3b733a31323a22617574686f725f656d61696c223b4e3b7d);
INSERT INTO pages_language_overlay VALUES (6, 63, 0, 0, 0, '', 0, 0, 0, 0, 0, 1196151587, 1196151587, 1, 0, 'Gallery2', 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0x613a31333a7b733a363a2268696464656e223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a353a227469746c65223b4e3b733a383a227375627469746c65223b4e3b733a393a226e61765f7469746c65223b4e3b733a383a226162737472616374223b4e3b733a383a226b6579776f726473223b4e3b733a31313a226465736372697074696f6e223b4e3b733a353a226d65646961223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a363a22617574686f72223b4e3b733a31323a22617574686f725f656d61696c223b4e3b7d);
INSERT INTO pages_language_overlay VALUES (7, 3, 0, 0, 0, '', 0, 0, 0, 0, 0, 1196152181, 1196151606, 1, 1, 'Gallery', 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0x613a31333a7b733a363a2268696464656e223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a353a227469746c65223b4e3b733a383a227375627469746c65223b4e3b733a393a226e61765f7469746c65223b4e3b733a383a226162737472616374223b4e3b733a383a226b6579776f726473223b4e3b733a31313a226465736372697074696f6e223b4e3b733a353a226d65646961223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a363a22617574686f72223b4e3b733a31323a22617574686f725f656d61696c223b4e3b7d);
INSERT INTO pages_language_overlay VALUES (8, 5, 0, 0, 0, '', 0, 0, 0, 0, 0, 1196151670, 1196151670, 1, 1, 'News', 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0x613a31333a7b733a363a2268696464656e223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a353a227469746c65223b4e3b733a383a227375627469746c65223b4e3b733a393a226e61765f7469746c65223b4e3b733a383a226162737472616374223b4e3b733a383a226b6579776f726473223b4e3b733a31313a226465736372697074696f6e223b4e3b733a353a226d65646961223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a363a22617574686f72223b4e3b733a31323a22617574686f725f656d61696c223b4e3b7d);
INSERT INTO pages_language_overlay VALUES (9, 67, 0, 0, 0, '', 0, 0, 0, 0, 0, 1196151717, 1196151717, 1, 1, 'Article', 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0x613a31333a7b733a363a2268696464656e223b4e3b733a31363a227379735f6c616e67756167655f756964223b4e3b733a353a227469746c65223b4e3b733a383a227375627469746c65223b4e3b733a393a226e61765f7469746c65223b4e3b733a383a226162737472616374223b4e3b733a383a226b6579776f726473223b4e3b733a31313a226465736372697074696f6e223b4e3b733a353a226d65646961223b4e3b733a393a22737461727474696d65223b4e3b733a373a22656e6474696d65223b4e3b733a363a22617574686f72223b4e3b733a31323a22617574686f725f656d61696c223b4e3b7d);

#
# Table structure for table "pages"
#

CREATE TABLE pages (
  uid int(11) NOT NULL auto_increment,
  pid int(11) default '0' NOT NULL ,
  t3ver_oid int(11) default '0' NOT NULL ,
  t3ver_id int(11) default '0' NOT NULL ,
  t3ver_wsid int(11) default '0' NOT NULL ,
  t3ver_label varchar(30) NOT NULL default '',
  t3ver_state tinyint(4) default '0' NOT NULL ,
  t3ver_stage tinyint(4) default '0' NOT NULL ,
  t3ver_count int(11) default '0' NOT NULL ,
  t3ver_tstamp int(11) default '0' NOT NULL ,
  t3ver_swapmode tinyint(4) default '0' NOT NULL ,
  t3_origuid int(11) default '0' NOT NULL ,
  tstamp int(11) unsigned default '0' NOT NULL ,
  sorting int(11) unsigned default '0' NOT NULL ,
  deleted tinyint(1) unsigned default '0' NOT NULL ,
  perms_userid int(11) unsigned default '0' NOT NULL ,
  perms_groupid int(11) unsigned default '0' NOT NULL ,
  perms_user tinyint(4) unsigned default '0' NOT NULL ,
  perms_group tinyint(4) unsigned default '0' NOT NULL ,
  perms_everybody tinyint(4) unsigned default '0' NOT NULL ,
  editlock tinyint(4) unsigned default '0' NOT NULL ,
  crdate int(11) unsigned default '0' NOT NULL ,
  cruser_id int(11) unsigned default '0' NOT NULL ,
  title tinytext NOT NULL,
  doktype tinyint(3) unsigned default '0' NOT NULL ,
  TSconfig text NOT NULL,
  storage_pid int(11) default '0' NOT NULL ,
  is_siteroot tinyint(4) default '0' NOT NULL ,
  php_tree_stop tinyint(4) default '0' NOT NULL ,
  tx_impexp_origuid int(11) default '0' NOT NULL ,
  url tinytext NOT NULL,
  hidden tinyint(4) unsigned default '0' NOT NULL ,
  starttime int(11) unsigned default '0' NOT NULL ,
  endtime int(11) unsigned default '0' NOT NULL ,
  urltype tinyint(4) unsigned default '0' NOT NULL ,
  shortcut int(10) unsigned default '0' NOT NULL ,
  shortcut_mode int(10) unsigned default '0' NOT NULL ,
  no_cache int(10) unsigned default '0' NOT NULL ,
  fe_group varchar(100) default '0' NOT NULL ,
  subtitle tinytext NOT NULL,
  layout tinyint(3) unsigned default '0' NOT NULL ,
  target varchar(20) NOT NULL default '',
  media blob NOT NULL,
  lastUpdated int(10) unsigned default '0' NOT NULL ,
  keywords text NOT NULL,
  cache_timeout int(10) unsigned default '0' NOT NULL ,
  newUntil int(10) unsigned default '0' NOT NULL ,
  description text NOT NULL,
  no_search tinyint(3) unsigned default '0' NOT NULL ,
  SYS_LASTCHANGED int(10) unsigned default '0' NOT NULL ,
  abstract text NOT NULL,
  module varchar(10) NOT NULL default '',
  extendToSubpages tinyint(3) unsigned default '0' NOT NULL ,
  author tinytext NOT NULL,
  author_email varchar(80) NOT NULL default '',
  nav_title tinytext NOT NULL,
  nav_hide tinyint(4) default '0' NOT NULL ,
  content_from_pid int(10) unsigned default '0' NOT NULL ,
  mount_pid int(10) unsigned default '0' NOT NULL ,
  mount_pid_ol tinyint(4) default '0' NOT NULL ,
  alias varchar(32) NOT NULL default '',
  l18n_cfg tinyint(4) default '0' NOT NULL ,
  fe_login_mode tinyint(4) default '0' NOT NULL ,
  tx_realurl_pathsegment varchar(30) NOT NULL default '',
  tx_rlmptmplselector_main_tmpl varchar(240) NOT NULL default '',
  tx_rlmptmplselector_ca_tmpl varchar(240) NOT NULL default '',
  PRIMARY KEY  (uid),
  KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY parent (pid,sorting),
  KEY alias (alias)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;


INSERT INTO pages VALUES (1, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 1196152126, 256, 0, 1, 0, 31, 27, 0, 0, 1174935916, 1, 'Start', 2, '', 0, 0, 0, 0, '', 0, 0, 0, 1, 2, 1, 0, '', '', 0, '', '', 0, '', 0, 0, '', 0, 1196152126, '', '', 0, '', '', '', 0, 0, 0, 0, '', 0, 0, '', '0', '0');
INSERT INTO pages VALUES (3, 1, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 1196151329, 512, 0, 1, 0, 31, 27, 0, 0, 1174935994, 1, 'Gallery', 2, '', 0, 0, 0, 0, '', 0, 0, 0, 1, 0, 0, 0, '', '', 0, '', '', 0, '', 0, 0, '', 0, 1196151350, '', '', 0, '', '', '', 0, 0, 0, 0, '', 0, 0, '', '0', '0');
INSERT INTO pages VALUES (5, 1, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 1196151649, 1024, 0, 1, 0, 31, 27, 0, 0, 1174936187, 1, 'Nachrichten', 2, '', 0, 0, 0, 0, '', 0, 0, 0, 1, 0, 0, 0, '', '', 0, '', '', 0, '', 0, 0, '', 0, 1196151744, '', '', 0, '', '', '', 0, 0, 0, 0, '', 0, 0, '', '0', '0');
INSERT INTO pages VALUES (30, 1, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 1174937502, 1792, 0, 1, 0, 31, 27, 0, 0, 1174937502, 1, 'Records', 254, '', 0, 0, 0, 0, '', 0, 0, 0, 1, 0, 0, 0, '', '', 0, '', '', 0, '', 0, 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, 0, '', 0, 0, '', '', '');
INSERT INTO pages VALUES (31, 30, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 1174937548, 256, 0, 1, 0, 31, 27, 0, 0, 1174937522, 1, 'tt_news', 254, '', 0, 0, 0, 0, '', 0, 0, 0, 1, 0, 0, 0, '', '', 0, '', '', 0, '', 0, 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, 0, '', 0, 0, '', '', '');
INSERT INTO pages VALUES (58, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 1174940582, 29999, 0, 0, 0, 31, 31, 31, 0, 1174940582, 0, 'Media', 2, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '0', '', 0, '', '', 0, '', 0, 0, '', 0, 0, '', 'dam', 0, '', '', '', 0, 0, 0, 0, '', 0, 0, '', '', '');
INSERT INTO pages VALUES (61, 31, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 1174941726, 256, 0, 1, 0, 31, 27, 0, 0, 1174941711, 1, 'news', 254, '', 0, 0, 0, 0, '', 0, 0, 0, 1, 0, 0, 0, '', '', 0, '', '', 0, '', 0, 0, '', 0, 0, '', 'news', 0, '', '', '', 0, 0, 0, 0, '', 0, 0, '', '', '');
INSERT INTO pages VALUES (63, 3, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 1196151387, 256, 0, 1, 0, 31, 27, 0, 0, 1179621942, 1, 'Gallery2', 2, '', 0, 0, 0, 0, '', 0, 0, 0, 1, 0, 0, 0, '', '', 0, '', '', 0, '', 0, 0, '', 0, 1196151410, '', '', 0, '', '', '', 0, 0, 0, 0, '', 0, 0, '', '0', '0');
INSERT INTO pages VALUES (64, 63, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 1196151525, 256, 0, 1, 0, 31, 27, 0, 0, 1179621966, 1, 'Bild', 2, '', 0, 0, 0, 0, '', 0, 0, 0, 1, 0, 0, 0, '', '', 0, '', '', 0, '', 0, 0, '', 0, 1179622257, '', '', 0, '', '', '', 1, 0, 0, 0, '', 0, 0, '', '0', '0');
INSERT INTO pages VALUES (67, 5, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 1196151698, 256, 0, 1, 0, 31, 27, 0, 0, 1179623318, 1, 'Artikel', 2, '', 0, 0, 0, 0, '', 0, 0, 0, 1, 0, 0, 0, '', '', 0, '', '', 0, '', 0, 0, '', 0, 1179624364, '', '', 0, '', '', '', 1, 0, 0, 0, '', 0, 0, '', '0', '0');
INSERT INTO pages VALUES (69, 1, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 1196151277, 256, 0, 1, 0, 31, 27, 0, 0, 1195221472, 1, 'Start', 4, '', 0, 0, 0, 0, '', 0, 0, 0, 1, 1, 0, 0, '', '', 0, '', '', 0, '', 0, 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, 0, '', 0, 0, '', '0', '0');


#
# Table structure for table "tt_news"
#
DROP TABLE IF EXISTS tt_news;
CREATE TABLE tt_news (
  uid int(11) auto_increment,
  pid int(11) default '0',
  tstamp int(11) unsigned default '0',
  crdate int(11) unsigned default '0',
  cruser_id int(11) unsigned default '0',
  editlock tinyint(4) unsigned default '0',
  deleted tinyint(3) unsigned default '0',
  hidden tinyint(4) unsigned default '0',
  starttime int(11) unsigned default '0',
  endtime int(11) unsigned default '0',
  fe_group varchar(100) default '0',
  title text,
  datetime int(11) unsigned default '0',
  image text,
  imagecaption text,
  imagealttext text,
  imagetitletext text,
  related int(11) default '0',
  short text,
  bodytext mediumtext,
  author tinytext,
  author_email tinytext,
  category int(11) default '0',
  news_files text,
  links text,
  type tinyint(4) default '0',
  page int(11) default '0',
  keywords text,
  archivedate int(11) default '0',
  ext_url tinytext,
  sys_language_uid int(11) default '0',
  l18n_parent int(11) default '0',
  l18n_diffsource mediumblob,
  no_auto_pb tinyint(4) unsigned default '0',
  t3ver_oid int(11) default '0',
  t3ver_id int(11) default '0',
  t3ver_wsid int(11) default '0',
  t3ver_label varchar(30) default '',
  t3ver_state tinyint(4) default '0',
  t3ver_stage tinyint(4) default '0',
  t3ver_count int(11) default '0',
  t3ver_tstamp int(11) default '0',
  t3_origuid int(11) default '0',
  tx_timtab_trackbacks text,
  tx_timtab_comments_allowed tinyint(4) unsigned default '1',
  tx_timtab_ping_allowed tinyint(4) unsigned default '1',
  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid,t3ver_wsid)
);


INSERT INTO tt_news VALUES ('1', '61', '1179632834', '1179623873', '1', '0', '0', '0', '0', '0', '', 'GGGorem', '1179623760', 'Yeti-Render_01.jpg', 'cation', '', '', '0', 'm te epicuri aliquando pertinacia mei. Viderer maiorum denique usu te, inani intellegam ei cum. Sit at fabulas fabellas iracundia, oporteat convenire in per, falli facilis conceptam a', 'Lorem ipsum te epicuri aliquando pertinacia mei. Viderer maiorum denique usu te, inani intellegam ei cum. Sit at fabulas fabellas iracundia, oporteat convenire in per, falli facilis conceptam ad sed. Mei putent perpetua te. Iudico tamquam mediocritatem id pri, pro nostro numquam te, sea choro adipisci et. Et duo sale graece nostro, ius omnes lobortis ut.<br /><br />Vituperatoribus aliquando ut ius. Vix te vide vitae accommodare. In mundi omnium senserit vim, mei iisque verterem antiopam te. Vim populo putant ea. Oportere scripserit ius ei, ad agam gubergren sea, id partiendo elaboraret mel.<br /><br />Ut iisque temporibus vim, no invenire quaestio eloquentiam mei. Option maiorum no mea, id mea summo nemore alterum. In vel ipsum accumsan neglegentur, idque pertinacia eu usu. Discere delectus honestatis no vix, ex nulla oporteat pro, hinc dolorem deserunt nam ut. Vel possit alterum cu. Cu libris diceret periculis ius, ex iuvaret tibique has.<br /><br />Aperiri ceteros incorrupte an nam, has cu vituperatoribus consequuntur. Ei vel porro efficiendi. Labore iracundia cum in, cum at soleat vocent, dicant graece nemore ea nec. Vel an wisi verear suscipiantur, causae appareat ne ius. Ex vix dicant dictas possim, ad suas porro possit usu. In sonet graece vim, atqui exerci scripserit at per.<br /><br />Sit omnis detracto ne, in mea dicam instructior, ei mea discere ponderum. At usu oratio aliquyam. Mea at laudem alterum delenit, cu sit quas nihil. Dicant tempor sed id. Usu cetero delicata id, vis accusam epicurei theophrastus et.<br /><br />Quo tale ipsum singulis te, quo enim ullum ex. Te suscipit postulant delicatissimi eos, malis bonorum liberavisse id pro. Et tantas epicurei qui. Zzril neglegentur complectitur eu duo, partem noster in quo, per numquam accusamus no. Vel possim contentiones id, usu vivendo blandit eu. Mei ad aeque prodesset. Cu malis repudiandae eos, fierent disputando vim ea.<br /><br />Sea diceret delectus eu, quis exerci adolescens mei te, at vitae consul singulis sit. Sed eius altera postea at, ludus legimus forensibus vim at, sed mucius quaestio reformidans ad. Simul recteque at sit, an sed movet maiorum suavitate, cu nam quaeque argumentum. Eum no falli simul. Dolorem splendide eu est. Hinc dictas feugiat duo ne.<br /><br />Ex cum stet invenire, at denique facilisi duo. Mei alii animal an. Debet gubergren mei ut, ad mundi quando duo. In qui percipit vulputate, eam probatus similique abhorreant cu. Id has inimicus consetetur, sit et assum feugiat minimum.<br /><br />Vix atqui falli et, id eum solet mollis suscipit, pri unum lorem detracto te. Eam eu postea maluisset theophrastus, pertinax referrentur no pri. Ad vidit illum minim vis, pri ad detraxit insolens pertinax. Ne erant lucilius disputando usu, labores maiorum et mea, sea te decore sensibus. Cu persius graecis eloquentiam cum.<br /><br />Ea vix fabellas perpetua intellegat. Ius ea idque perpetua urbanitas, mel ei saepe doctus animal, et vim probo blandit urbanitas. Illum omittantur no vim. Vim enim atomorum ad, atqui ridens pro in. Id meliore habemus consulatu nam, amet delenit facilisis mel at. Ad modo iudico cum.', 'Micha Barthel', 'info@infochy.de', '0', '', '', '0', '0', 'Lorem, test', '0', '', '0', '0', 'a:24:{s:5:"title";N;s:6:"hidden";N;s:9:"starttime";N;s:7:"endtime";N;s:4:"type";N;s:8:"editlock";N;s:8:"datetime";N;s:11:"archivedate";N;s:16:"sys_language_uid";N;s:6:"author";N;s:12:"author_email";N;s:5:"short";N;s:8:"bodytext";N;s:8:"keywords";N;s:10:"no_auto_pb";N;s:8:"category";N;s:5:"image";N;s:12:"imagecaption";N;s:12:"imagealttext";N;s:14:"imagetitletext";N;s:5:"links";N;s:7:"related";N;s:10:"news_files";N;s:8:"fe_group";N;}', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '', '1', '1');


#
# Table structure for table "tx_dam"
#
DROP TABLE IF EXISTS tx_dam;
CREATE TABLE tx_dam (
  uid int(11) auto_increment,
  pid int(11) default '0',
  tstamp int(11) unsigned default '0',
  crdate int(11) unsigned default '0',
  cruser_id int(11) unsigned default '0',
  parent_id int(11) default '0',
  deleted tinyint(4) unsigned default '0',
  active tinyint(4) unsigned default '0',
  sorting int(10) unsigned default '0',
  hidden tinyint(4) unsigned default '0',
  starttime int(11) unsigned default '0',
  endtime int(11) unsigned default '0',
  fe_group int(11) default '0',
  sys_language_uid int(11) default '0',
  l18n_parent int(11) default '0',
  l18n_diffsource mediumblob,
  t3ver_oid int(11) default '0',
  t3ver_id int(11) default '0',
  t3ver_label varchar(30) default '',
  media_type tinyint(4) unsigned default '0',
  title tinytext,
  category int(11) default '0',
  index_type varchar(4) default '',
  file_mime_type varchar(45) default '',
  file_mime_subtype varchar(45) default '',
  file_type varchar(4) default '',
  file_type_version varchar(9) default '',
  file_name varchar(100) default '',
  file_path varchar(255) default '',
  file_size int(11) unsigned default '0',
  file_mtime int(11) unsigned default '0',
  file_inode int(11) default '0',
  file_ctime int(11) unsigned default '0',
  file_hash varchar(32) default '',
  file_status tinyint(4) unsigned default '0',
  file_orig_location varchar(255) default '',
  file_orig_loc_desc varchar(45) default '',
  file_creator varchar(45) default '',
  file_dl_name varchar(100) default '',
  file_usage int(11) unsigned default '0',
  meta text,
  ident varchar(45) default '',
  creator varchar(45) default '',
  keywords tinytext,
  description text,
  alt_text varchar(255) default '',
  caption text,
  abstract text,
  search_content text,
  language char(3) default '',
  pages int(4) unsigned default '0',
  publisher varchar(45) default '',
  copyright varchar(128) default '',
  instructions tinytext,
  date_cr int(11) unsigned default '0',
  date_mod int(11) unsigned default '0',
  loc_desc varchar(45) default '',
  loc_country char(3) default '',
  loc_city varchar(45) default '',
  hres int(11) unsigned default '0',
  vres int(11) unsigned default '0',
  hpixels int(11) unsigned default '0',
  vpixels int(11) unsigned default '0',
  color_space varchar(4) default '',
  width float unsigned default '0',
  height float unsigned default '0',
  height_unit char(3) default '',
  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY media_type (media_type),
  KEY t3ver_oid (t3ver_oid),
  KEY file_type (file_type),
  KEY file_hash (file_hash),
  KEY file_name (file_name),
  KEY file_path (file_path)
);


INSERT INTO tx_dam VALUES ('1', '58', '1179621736', '1179621043', '1', '0', '0', '0', '256', '0', '0', '0', '0', '0', '0', 'a:31:{s:5:"title";N;s:8:"keywords";N;s:11:"description";N;s:11:"loc_country";N;s:8:"loc_city";N;s:8:"loc_desc";N;s:7:"date_cr";N;s:8:"date_mod";N;s:6:"hidden";N;s:9:"starttime";N;s:7:"endtime";N;s:8:"fe_group";N;s:7:"caption";N;s:8:"alt_text";N;s:12:"file_dl_name";N;s:18:"file_orig_location";N;s:18:"file_orig_loc_desc";N;s:8:"category";N;s:11:"color_space";N;s:7:"hpixels";N;s:7:"vpixels";N;s:5:"width";N;s:6:"height";N;s:11:"height_unit";N;s:4:"hres";N;s:4:"vres";N;s:7:"creator";N;s:9:"publisher";N;s:9:"copyright";N;s:5:"ident";N;s:12:"instructions";N;}', '0', '0', '', '2', 'trump-hotel-render', '1', '', 'image', 'jpeg', 'jpg', '', 'trump-hotel-render.jpg', 'fileadmin/t3simages/', '132977', '1179621041', '0', '1179621042', '', '0', '', '', '', 'trump-hotel-render.jpg', '0', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '1179621043', '1179621043', '', '0', '', '0', '0', '585', '1066', '', '0', '0', '');
INSERT INTO tx_dam VALUES ('2', '58', '1179621724', '1179621044', '1', '0', '0', '0', '128', '0', '0', '0', '0', '0', '0', 'a:31:{s:5:"title";N;s:8:"keywords";N;s:11:"description";N;s:11:"loc_country";N;s:8:"loc_city";N;s:8:"loc_desc";N;s:7:"date_cr";N;s:8:"date_mod";N;s:6:"hidden";N;s:9:"starttime";N;s:7:"endtime";N;s:8:"fe_group";N;s:7:"caption";N;s:8:"alt_text";N;s:12:"file_dl_name";N;s:18:"file_orig_location";N;s:18:"file_orig_loc_desc";N;s:8:"category";N;s:11:"color_space";N;s:7:"hpixels";N;s:7:"vpixels";N;s:5:"width";N;s:6:"height";N;s:11:"height_unit";N;s:4:"hres";N;s:4:"vres";N;s:7:"creator";N;s:9:"publisher";N;s:9:"copyright";N;s:5:"ident";N;s:12:"instructions";N;}', '0', '0', '', '2', 'Yeti-Render', '1', '', 'image', 'jpeg', 'jpg', '', 'Yeti-Render.jpg', 'fileadmin/t3simages/', '87748', '1179621041', '0', '1179621042', '', '0', '', '', '', 'Yeti-Render.jpg', '0', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '1179621044', '1179621044', '', '0', '', '0', '0', '800', '600', '', '0', '0', '');

#
# Table structure for table "tx_dam_cat"
#
DROP TABLE IF EXISTS tx_dam_cat;
CREATE TABLE tx_dam_cat (
  uid int(11) auto_increment,
  pid int(11) default '0',
  parent_id int(11) default '0',
  tstamp int(11) unsigned default '0',
  sorting int(11) unsigned default '0',
  deleted tinyint(4) unsigned default '0',
  crdate int(11) unsigned default '0',
  cruser_id int(11) unsigned default '0',
  hidden tinyint(4) unsigned default '0',
  fe_group int(11) default '0',
  title tinytext,
  nav_title tinytext,
  subtitle tinytext,
  keywords text,
  description text,
  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY parent_id (parent_id)
);


INSERT INTO tx_dam_cat VALUES ('1', '58', '0', '1179621092', '256', '0', '1179621092', '1', '0', '0', 'example', '', '', '', '');

#
# Table structure for table "tx_dam_mm_cat"
#
DROP TABLE IF EXISTS tx_dam_mm_cat;
CREATE TABLE tx_dam_mm_cat (
  uid_local int(11) default '0',
  uid_foreign int(11) default '0',
  tablenames varchar(30) default '',
  sorting int(11) unsigned default '0',
  sorting_foreign int(11) default '0',
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);


INSERT INTO tx_dam_mm_cat VALUES ('2', '1', '', '1', '0');
INSERT INTO tx_dam_mm_cat VALUES ('1', '1', '', '1', '0');

#
# Table structure for table "tx_dam_metypes_avail"
#
DROP TABLE IF EXISTS tx_dam_metypes_avail;
CREATE TABLE tx_dam_metypes_avail (
  uid int(11) auto_increment,
  pid int(11) default '0',
  parent_id int(11) unsigned default '0',
  tstamp int(11) unsigned default '0',
  sorting int(11) unsigned default '0',
  title varchar(30) default '',
  type tinyint(4) unsigned default '0',
  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY parent_id (parent_id)
);


INSERT INTO tx_dam_metypes_avail VALUES ('1', '58', '0', '1179621044', '300', 'image', '2');
INSERT INTO tx_dam_metypes_avail VALUES ('2', '58', '1', '1179621044', '0', 'jpg', '2');



#
# Table structure for table "tx_dam_mm_ref"
#
DROP TABLE IF EXISTS tx_dam_mm_ref;
CREATE TABLE tx_dam_mm_ref (
  uid_local int(11) default '0',
  uid_foreign int(11) default '0',
  tablenames varchar(30) default '',
  ident varchar(30) default '',
  sorting_foreign int(11) unsigned default '0',
  sorting int(11) unsigned default '0',
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);


INSERT INTO tx_dam_mm_ref VALUES ('1', '1', 'tt_content', 'tx_damttcontent_files', '1', '0');


#
# Table structure for table "tx_dam_log_index"
#
DROP TABLE IF EXISTS tx_dam_log_index;
CREATE TABLE tx_dam_log_index (
  uid int(11) auto_increment,
  pid int(11) default '0',
  tstamp int(11) unsigned default '0',
  cruser_id int(11) unsigned default '0',
  crdate int(11) unsigned default '0',
  error tinyint(4) unsigned default '0',
  type varchar(4) default '',
  item_count int(11) unsigned default '0',
  message tinytext,
  PRIMARY KEY (uid),
  KEY parent (pid)
);


INSERT INTO tx_dam_log_index VALUES ('1', '0', '1179621041', '1', '1179621043', '0', 'auto', '2', 'New files indexed');


#
# Table structure for table "tx_dam_file_tracking"
#
DROP TABLE IF EXISTS tx_dam_file_tracking;
CREATE TABLE tx_dam_file_tracking (
  uid int(11) auto_increment,
  pid int(11) default '0',
  tstamp int(11) unsigned default '0',
  file_name varchar(100) default '',
  file_path varchar(255) default '',
  file_size int(11) unsigned default '0',
  file_ctime int(11) unsigned default '0',
  file_hash varchar(32) default '',
  PRIMARY KEY (uid),
  KEY parent (pid)
);


INSERT INTO tx_dam_file_tracking VALUES ('1', '0', '1179623873', 'Yeti-Render.jpg', 'uploads/pics/', '87748', '1179623873', '559ba2c66ac53090669cc09391ef7740');
INSERT INTO tx_dam_file_tracking VALUES ('2', '0', '1179632834', 'Yeti-Render_01.jpg', 'uploads/pics/', '20819', '1179632834', 'd580291392449184f87ef511faa21206');
