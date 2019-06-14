CREATE TABLE tt_content (
    tx_skbootstrapcarousel_carousel_item int(11) unsigned DEFAULT '0'
);


CREATE TABLE tx_skbootstrapcarousel_carousel_item (
    uid int(11) unsigned NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,

    tt_content int(11) unsigned DEFAULT '0',
    background_image int(11) unsigned DEFAULT '0',

    tstamp int(11) unsigned DEFAULT '0' NOT NULL,
    crdate int(11) unsigned DEFAULT '0' NOT NULL,
    cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
    deleted smallint unsigned DEFAULT '0' NOT NULL,
    hidden smallint unsigned DEFAULT '0' NOT NULL,
    starttime int(11) unsigned DEFAULT '0' NOT NULL,
    endtime int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL,

    text1 varchar(500) DEFAULT '' NOT NULL,
    usetexthadow smallint unsigned DEFAULT 0 NOT NULL,
    shadowcolor varchar(10) DEFAULT '' NOT NULL,

    useframe smallint unsigned DEFAULT 0 NOT NULL,
    framebordercolor varchar(10) DEFAULT '' NOT NULL,
    framebackgroundcolor varchar(10) DEFAULT '' NOT NULL,
    frameopacity smallint unsigned DEFAULT 0 NOT NULL,


    t3ver_oid int(11) unsigned DEFAULT '0' NOT NULL,
    t3ver_id int(11) unsigned DEFAULT '0' NOT NULL,
    t3ver_wsid int(11) unsigned DEFAULT '0' NOT NULL,
    t3ver_label varchar(255) DEFAULT '' NOT NULL,
    t3ver_state smallint DEFAULT '0' NOT NULL,
    t3ver_stage int(11) DEFAULT '0' NOT NULL,
    t3ver_count int(11) unsigned DEFAULT '0' NOT NULL,
    t3ver_tstamp int(11) unsigned DEFAULT '0' NOT NULL,
    t3ver_move_id int(11) unsigned DEFAULT '0' NOT NULL,
    t3_origuid int(11) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid),
);



