<?php

namespace app\Base;

abstract class BaseCarClass {

    public function wheels() {
        return "Has 4 wheels.";
    }

    abstract public function seats();
}
