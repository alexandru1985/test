<?php
include "Manufacturer.php";
include "Seller.php";

class Automobile extends Manufacturer {
    
    use Seller;
    
    
}