<?php

class Test {
    public $num;
    public function __construct() {
        $this->num++ ;
    }
    public function add($num1, $num2) {
        return $num1 + $num2 + $this->num;
    }
}


class Test1 {
    
    public function getAdd(Test $test) {
        
        return $test->add(1, 2);
    }
    
}

$test1 = new Test1();
$test = new Test();
echo $test1->getAdd($test);