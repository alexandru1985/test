<?php

// Set database credentials

define("EZSQL_DB_USER", 'root');
define("EZSQL_DB_PASSWORD", '');
define("EZSQL_DB_NAME", 'task_manager');
define("EZSQL_DB_HOST", 'localhost');

//////////////////////////////////////////////////////////


include "ez_sql_core.php";
include "ez_sql_msqli.php";


// Set $db object

$db = new ezSQL_mysqli(EZSQL_DB_USER, EZSQL_DB_PASSWORD, EZSQL_DB_NAME, EZSQL_DB_HOST);



