<?php
require 'interfaces/DefaultFreeParkingSpaces.php';

class Parking implements DefaultFreeParkingSpaces {
    
//// Minimum setting parking spaces for good testing results
    private $totalParkingSpaces = 20;
//// There are 15 default parked cars
    private $defaultEntriesAndExits = array(1, 0, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1);
    private $totalCarsFromParking;
    
    public function setParkingSpaces($newParkingSpaces) {

        return $this->totalParkingSpaces = $newParkingSpaces;
    }

    public function getFreeParkingSpaces() {

        $countActions = array_count_values($this->defaultEntriesAndExits);
        $defaultParkingEntries = $countActions[1];

        return $freeParkingSpaces = $this->totalParkingSpaces - $defaultParkingEntries;
    }

    public function getParkingEntries($digits) {

        $digits = str_split($digits);
        $countActions = array_count_values($digits);

        return $totalParkingEntries = $countActions[1];
    }

    public function totalFreeParkingSpaces($digits) {

        $totalFreeParkingSpaces = $this->getFreeParkingSpaces() - $this->getParkingEntries($digits);

        return $totalFreeParkingSpaces;
    }

    public function totalCarsFromParking($digits) {
        
        $countActions = array_count_values($this->defaultEntriesAndExits);
        $defaultParkingEntries = $countActions[1];
        $totalCarsFromParking = $this->getParkingEntries($digits) +  $defaultParkingEntries;
        
        return $this->totalCarsFromParking = $totalCarsFromParking;
        
    }

    public function checkFullParkingSpaces($digits) {

        $checkFullParkingSpaces = $this->getFreeParkingSpaces() - $this->getParkingEntries($digits);
        $error = '';

        if ($checkFullParkingSpaces < 0) {
            $error .= '<span style="color:red;">Parking is full. No record added.</span> <br />';
        }

        echo $error;
    }

       public function getPollutionBuffer($digits) {
           
        $digits = str_split($digits);
        $countActions = array_count_values($digits);
        $totalPoluttionCars = $countActions[1];
        $pullutionBuffer = round($totalPoluttionCars * 100 / $this->totalCarsFromParking).'%';
        
        return $pullutionBuffer;
    }

}





