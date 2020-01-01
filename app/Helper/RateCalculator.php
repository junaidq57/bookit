<?php
namespace App\Helper;

class RateCalculator {

    /**
     * Main function. Returns the hammering distance of two images' bit value.
     *
     * @param string $pathOne Path to image 1
     * @param string $pathTwo Path to image 2
     *
     * @return bool|int Hammering value on success. False on error.
     */
    public function mealsRates($distance) {
        $uptoMinKm = 5;
        $priceUptoMin = 7;
        $priceAfterMinKm = 1.5;

        if($distance <= $uptoMinKm){
            return  $priceUptoMin;
        }
        else{
            return $distance * $priceAfterMinKm;
        }
    }

    public function GroceryRates($distance, $totalItems) {
        $uptoMinKm = 5;
        $uptoMinItems = 20;
        $uptoMinItemsPrice = 10;
        $priceUptoMin = 12;
        $service = 25;
        $priceAfterMinKm = 2.5;

        if($totalItems <= $uptoMinItems){
            return  $uptoMinItemsPrice;
        }
        else if($totalItems > 20 && $distance <= $uptoMinKm){
            return $service + $priceUptoMin;
        }
        else{
            return $service + ($priceAfterMinKm * $distance);
        }
    }

    public function medicineRates($distance) {
        $uptoMinKm = 5;
        $service = 10;
        $priceUptoMin = 10;
        $priceAfterMinKm = 2;

        if($distance <= $uptoMinKm){
            return  $service + $priceUptoMin;
        }
        else{
            return ($distance * $priceAfterMinKm) + $service;
        }
    }




}
  
?>