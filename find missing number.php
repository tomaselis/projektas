<pre>
<?php

/* Arejuje surasti value kurio truksta ?



*/


//$arejus = [1, 3, 4, 5, 6, 7];
//
//$diff = 0;
//
//foreach($arejus as $key => $val) {
//    if ($key + $diff != $val - 1) {
//        for ($i = $key + $diff; $i < $val - 1; $i++) {
//            $Arejus[$i] = $i + 1;
//            $diff += 1;
//        }
//    }
//}
//
//return $arejus;

//function findMissingNum($array){
//    for($i = 1; $i <= count($array) + 1; $i++ ){
//        if (!in_array($i, $array)){
//            print $i;
//        }
//
//    }
//}
//
//print_r(findMissingNum(array(1, 3, 4, 5, 6)));

function missingNumber($numList){

    //constructing new array
    $newArray = range($numList[0],max($numList));
    // using array_diff to find the missing number
    return array_diff($newArray, $numList);
}


print_r(missingNumber(array(1, 3, 4, 6, 8, 10, 12)));

?>

</pre>