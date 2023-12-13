<?php

class TextInput {

    public $text;

    public function add($text) 
    {
        if (is_string($text)) {
            return $this->text .= $text;
        }
    }

    public function getValue() 
    {
        return $this->text;
    }
}

class NumericInput extends TextInput {

    public function add($text) 
    {
        if (is_numeric($text)) {
            return $this->text .= $text;
        } else {
            return "";
        }
    }

}

$input = new NumericInput();
$input->add('1');
$input->add('a');
$input->add('0');

var_dump($input->getValue());
