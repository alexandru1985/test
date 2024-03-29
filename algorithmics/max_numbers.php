<?php

class MaxNumbers 
{
    public function getMaxNumberOfEachClass(array $numbers): array 
    {
        $classesWithAllNumbers = [];
        $maxNumberOfEachClass = [];
        $maxNumberName = 'max_number';
        
            for ($i = 0; $i < count($numbers); $i++) {
                $firstDigitOfClass = $this->getFirstDigitOfClass($numbers[$i]);
                $joinDigitsToClass = $this->joinDigitsToClass($numbers[$i]);

                // Add all numbers to each class 
                $classesWithAllNumbers[$firstDigitOfClass . $joinDigitsToClass][] = $numbers[$i];

                // Add max_number key and its value to each class 
                $classesWithAllNumbers[$firstDigitOfClass . $joinDigitsToClass][$maxNumberName] = 
                    max($classesWithAllNumbers[$firstDigitOfClass . $joinDigitsToClass]);
                
                // Add max_number as single value to each class     
                $maxNumberOfEachClass[$firstDigitOfClass . $joinDigitsToClass] = 
                    $classesWithAllNumbers[$firstDigitOfClass . $joinDigitsToClass][$maxNumberName]; 
            }

        return array_values($maxNumberOfEachClass);
    }

    public function getFirstDigitOfClass(int $number): string 
    {
        $numberAsString = (string) $number; 
        $firstDigitOfClass = $numberAsString[0];

        return $firstDigitOfClass;
    }

    public function joinDigitsToClass(int $number): string  
    {
        $numberAsString = (string) $number; 

        return str_repeat('0', strlen($numberAsString) - 1);
    }
}

$numbers = [110, 120, 130, 280, 301, 780, 510, 505, 605, 720, 300, 230, 210, 275];
$maxNumbers = new MaxNumbers();

var_dump($maxNumbers->getMaxNumberOfEachClass($numbers));
    
    