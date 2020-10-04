<?php

namespace factory;

abstract class AbstractBook {

    protected $subject = "PHP";

    abstract function getAuthor();

    abstract function getTitle();
}
