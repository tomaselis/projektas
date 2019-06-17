<?php

$numbersArray = [1,3,4,5,[5,7,[4,6,3]],8,[4,6]];
$numbersArray2 = [1,3,4,2,6];

function getEvenNumbers($element){
    $newEvenNumbersArray = [];
    if(is_array($element)){
        foreach ($element as $value) {
            $newEvenNumbersArray = array_merge(getEvenNumbers($value), $newEvenNumbersArray);
        }
    }else{
        if($element % 2 == 0){
//$newEvenNumbersArray[] = $element;
            $newEvenNumbersArray[] = $element;
        }
    }

    return $newEvenNumbersArray;
}

echo '<pre>';
print_r(getEvenNumbers($numbersArray));



