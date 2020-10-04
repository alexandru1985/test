<?php

namespace app\classes;

abstract class BaseCarClass {

    public function wheels() {
        return "Has 4 wheels.";
    }

    abstract public function seats();
}
