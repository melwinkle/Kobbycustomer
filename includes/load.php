<?php
define("URL_SEPARATOR", '/');

define("DS", DIRECTORY_SEPARATOR);


defined('SITE_ROOT')?null : define('SITE_ROOT' , realpath(dirname(__FILE__)));
define("LIB_PATH_INC",SITE_ROOT.DS);

require_once(LIB_PATH_INC. 'database.php');
require_once(LIB_PATH_INC. 'Invoice.php');
require_once(LIB_PATH_INC. 'contract.php');
require_once(LIB_PATH_INC. 'feedback.php');
require_once(LIB_PATH_INC. 'notice.php');
require_once(LIB_PATH_INC. 'pass.php');
require_once(LIB_PATH_INC. 'task.php');
require_once(LIB_PATH_INC. 'tenants.php');
require_once(LIB_PATH_INC. 'users.php');
require_once(LIB_PATH_INC. 'Property.php');


?>