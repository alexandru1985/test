<?php

class Parking {

    private $parkingSpaces = 20;
//// There are 15 default entries cars
    private $defaultEntriesAndExits = array(1, 0, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1);

    public function setParkingSpaces($newParkingSpaces) {

        return $this->parkingSpaces = $newParkingSpaces;
    }

    public function getFreeParkingSpaces() {

        $countActions = array_count_values($this->defaultEntriesAndExits);
        $defaultParkingEntries = $countActions[1];

        return $freeParkingSpaces = $this->parkingSpaces - $defaultParkingEntries;
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
        
        return $totalCarsFromParking;
        
    }

    public function checkFullParkingSpaces($digits) {

        $checkFullParkingSpaces = $this->getFreeParkingSpaces() - $this->getParkingEntries($digits);
        $error = '';

        if ($checkFullParkingSpaces < 0) {
            $error .= '<span style="color:red;">Parking is full. No record added.</span> <br />';
        }

        echo $error;
    }

}





