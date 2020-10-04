<?php

require "vendor/autoload.php";

use builder\HTMLPageDirector;
use builder\HTMLPageBuilder;

$HTMLPageBuilder = new HTMLPageBuilder();

$HTMLPageDirector = new HTMLPageDirector($HTMLPageBuilder);

$HTMLPageDirector->buildPage();
echo $HTMLPageDirector->getPage();

