<?php

////////////////////////////////////////////////////////////////////////////////
// Configure the default time zone
////////////////////////////////////////////////////////////////////////////////
date_default_timezone_set('EST');

////////////////////////////////////////////////////////////////////////////////
// Configure the default currency
////////////////////////////////////////////////////////////////////////////////
setlocale(LC_MONETARY, 'en_US');

////////////////////////////////////////////////////////////////////////////////
// Define constants for database connectivty
////////////////////////////////////////////////////////////////////////////////
defined('DATABASE_HOST') ? NULL : define('DATABASE_HOST', '107.180.41.45:3306');
defined('DATABASE_NAME') ? NULL : define('DATABASE_NAME', 'PlannerData');
defined('DATABASE_USER') ? NULL : define('DATABASE_USER', 'PlannerSysAdmin');
defined('DATABASE_PASSWORD') ? NULL : define('DATABASE_PASSWORD', 'rxa7355#12pF');

////////////////////////////////////////////////////////////////////////////////
// Define absolute application paths
////////////////////////////////////////////////////////////////////////////////

// Use PHP's directory separator for windows/unix compatibility
defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);

// Define absolute path to server root
defined('SITE_ROOT') ? NULL : define('SITE_ROOT', dirname(dirname(__FILE__)).DS);

// Define absolute path to includes
defined('CONFIG_PATH') ? NULL : define('CONFIG_PATH', SITE_ROOT.'config'.DS);
defined('FUNCTION_PATH') ? NULL : define('FUNCTION_PATH', SITE_ROOT.'function'.DS);
defined('MODEL_PATH') ? NULL : define('MODEL_PATH', SITE_ROOT.'model'.DS);
defined('DATA_PATH') ? NULL : define('DATA_PATH', SITE_ROOT.'data'.DS);

////////////////////////////////////////////////////////////////////////////////
// Include library, helpers, functions
////////////////////////////////////////////////////////////////////////////////
require_once(CONFIG_PATH.'database.config.php');
require_once(FUNCTION_PATH.'app.function.php');
require_once(MODEL_PATH.'budget.model.php');
require_once(DATA_PATH.'budget.data.php');
require_once(DATA_PATH.'todo.data.php');
require_once(DATA_PATH.'tracker.data.php');
require_once(DATA_PATH.'wish.data.php');
