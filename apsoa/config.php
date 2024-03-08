<?php

// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', 'http://localhost:8888/glomindz/apsoa/');
//define('URL', 'http://apsoa.in/');
define('LIBS', 'libs/');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'apsoa');
define('DB_USER', 'root');
define('DB_PASS', 'root');

//define('DB_TYPE', 'mysql');
//define('DB_HOST', 'apsoa.db.6227164.hostedresource.com');
//define('DB_NAME', 'apsoa');
//define('DB_USER', 'apsoa');
//define('DB_PASS', 'Gl0m1ndz@0123');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'GlomindzSoftwarePrivateLimited');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');


//tables

define('TABLE_USER_MASTER', 'apsoa_user_master');
