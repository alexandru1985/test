<?php

include "Automobile.php";

$automobile = new Automobile();
echo $automobile->create() . '<br>';
echo $automobile->discountAutomobile();