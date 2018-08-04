<?php

class Format {

    public function checkDigitsFormat($field) {

        $error = '';

        if (!is_numeric($field)) {

            $error = "Sunt permise doar cifre in toate campurile." . '<br />';
        }

        echo $error;

        if (!empty($error)) {
            exit();
        }
    }

    public function patternDigits($field) {

        $error = '';
        
        $field = str_split($field);
        foreach ($field as $value) {
            if (!preg_match('/^[0-1]*$/', $value)) {

                $error = "In campurile Poluttion Buffer si Total Actions X," . '<br />'.
                         "sunt permise doar cifrele 0 sau 1 in formatul 101100";
            }
        }
        echo $error;

        if (!empty($error)) {
            exit();
        }
    }

}
