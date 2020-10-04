<?php

require "vendor/autoload.php";

use app\classes\BmwClass;

$bmw = new BmwClass();

echo $bmw->seats();
echo $bmw->wheels();