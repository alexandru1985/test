<?php

class Operation {

    public function subtract($number1, $number2) {

        return $number1 - $number2;
    }

    public function add($number1, $number2) {

        return $number1 + $number2;
    }

}

class Arithmetics {

    public $operation;

    public function __construct(Operation $operation) {

        $this->operation = $operation;
    }

    public function addition($number1, $number2) {

        return $this->operation->add($number1, $number2);
    }

    public function subtraction($number1, $number2) {

        return $this->operation->subtract($number1, $number2);
    }

}

$operation = new Operation();
$arithmetics = new Arithmetics($operation);

echo '<pre>';
var_dump($arithmetics);
echo '</pre>';
echo $arithmetics->addition(8, 7).'<br>';
echo $arithmetics->subtraction(20, 12);


