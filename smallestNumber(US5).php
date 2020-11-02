<?php

class smallestNumber
{
    public function getSmallestNumber($firstNumber, $secondNumber, $thirdNumber)
    {
        if ($firstNumber < $secondNumber && $firstNumber < $thirdNumber) {
            echo $firstNumber . " is the smallest number";
        }
        if ($secondNumber < $firstNumber && $secondNumber < $thirdNumber) {
            echo $secondNumber. " is the smallest number";
        }
        if ($thirdNumber < $firstNumber && $thirdNumber < $secondNumber) {
            echo $thirdNumber. " is the smallest number";
        }
    }
}

?>