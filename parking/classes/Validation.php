<?php

class Validation {

    public function addValidation($field) {

        $error = '';

        if (empty($field)) {

            $error .= "Unul sau mai multe campuri nu au fost completate." . '<br />';
        }
        if (is_numeric($field)) {
            
        } else {
            $error .= "Sunt permise doar cifre in toate campurile." . '<br />';
        }

        echo $error;

        if (!empty($error)) {
            exit();
        }
    }

}
