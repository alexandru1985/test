<?php
spl_autoload_register(function ($class) {
    require 'src/classes/' . $class . '.php';

});

