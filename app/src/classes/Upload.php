<?php

class Upload { //default settings

    private $destination = 'files';
    private $maxSize = 5000; // bytes (1048576 bytes = 1 meg)
    private $allowedExtensions = array('jpeg', 'png', 'gif'); // mime types
    private $printError = true;
    public $error = '';

    public function getExtension($file) {

        $path = $file['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        return $ext;
    }

    //START: Functions to Change Default Settings
    public function setDestination($newDestination) {
        return $this->destination = $newDestination;
    }

//    public function getFileName($newFileName) {
//        return $this->fileName = $newFileName;
//    }

    public function setPrintError($newValue) {
        return $this->printError = $newValue;
    }

    public function setMaxSize($newSize) {
        return $this->maxSize = $newSize;
    }

    public function setAllowedExtensions($newExtensions) {
        if (is_array($newExtensions)) {
            $this->allowedExtensions = $newExtensions;
        } else {
            $this->allowedExtensions = array($newExtensions);
        }
       
    }

    public function uploadfile($file) {
        
    $this->validate($file);
//      echo '<pre>';
//
//var_dump( $this->validate($file));
//echo '</pre>';
//die();

        if ($this->error) {
            if ($this->printError)
                print $this->error;
            return false;
        }
        else {
            $target_dir = $this->destination;
//            echo '<pre>';
//
//            var_dump($target_dir);
//            echo '</pre>';
//            die();
            $target_file = $target_dir . '/' . basename($file["name"]);
            
//            echo '<pre>';
//
//            var_dump( $target_file);
//            echo '</pre>';
//            die();
            return move_uploaded_file($file["tmp_name"], $target_file);
        }
    }

    //END: Functions to Change Default Settings
    //START: Process File Functions

    public function delete($file) {

        if (file_exists($file)) {
            unlink($file) or $this->error .= 'Destination Directory Permission Problem.<br />';
        } else {
            $this->error .= 'File not found! Could not delete: ' . $file . '<br />';
        }

        if ($this->error && $this->printError)
            print $this->error;
    }

    public function validate($file) {

        $error = '';

        //check file exist
        if (empty($file['name'])) {
        $error .= 'No file found.<br />'; 
  
        }
        //check allowed extensions
        if (!in_array($this->getExtension($file), $this->allowedExtensions))
            $error .= '<span style="color:red;">Extension is not allowed.</span><br />';
        //check file size
        if ($file['size'][0] > $this->maxSize)
            $error .= 'Max File Size Exceeded. Limit: ' . $this->maxSize . ' bytes.<br />';

        return $this->error = $error;
    }

}

//END: Helper Functions
