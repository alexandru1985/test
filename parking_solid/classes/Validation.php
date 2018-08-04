<?php

class Validation {

    protected $format;

    public function __construct(Format $format) {

        $this->format = $format;
    }

    public function checkField($field) {
        
        $error = '';
        
        if (empty($field)) {
            
            $error = "Unul sau mai multe campuri nu au fost completate." . '<br />';
            
        }
        
        echo $error;

        if (isset($field)) {
            
            $this->format->checkDigitsFormat($field);
            
        }

        if (!empty($error)) {
            
            exit();
            
        }
    }

}
