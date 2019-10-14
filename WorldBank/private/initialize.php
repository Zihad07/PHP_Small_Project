<?php

// $name = dirname(__FILE__);
// echo "The  file name ".$name;

// Assign file paths to PHP constants
// __FILE__ returns the current path to this file
// dirname() returns the path to the parent directory


define("PRIVATE_PATH",dirname(__FILE__));
define("PROJECT_PATH",dirname(PRIVATE_PATH));
define("PUBLIC_PATH",PROJECT_PATH."/public");
define("SHARED_PATH",PRIVATE_PATH."/shared");

// echo "---------\n";
// echo PRIVATE_PATH."\n";
// echo PROJECT_PATH."\n";
// echo PUBLIC_PATH."\n";
// echo SHARED_PATH."\n";

require_once("functions.php");
require_once("database.php");
require_once("query_functions.php");


// echo "-------------------------\n";
// echo $_SERVER['SCRIPT_NAME']."\n";
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;

  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);

// echo $public_end."\n";
// echo $doc_root."\n";

// database connect
$db = db_connect();