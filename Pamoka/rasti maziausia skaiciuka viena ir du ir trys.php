<?php


$array = array(5, 6, 10, 19, 15, 20, -2, -1);
// parasyti algoritma kuris rastu arejuje maziausia skaiciu
$min = 9999;
$min2 = 9999;
$min3 = 9999;

foreach($array as $x){
    if ($x < $min){
        $min2 = $min; //antras maziausias skaicius
        $min = $x; // maziausias skaicius

    }elseif($x < $min2){ // funkscija sukama tik tada kai pirmas if neteisingas
        $min3 = $min2; // trecias maziausias skaicius
        $min2 = $x; //antras maziausias skaicius
    }elseif($x < $min3){ // funkcija suka tik tada kai pirmas if ir pirmas elseif neteisingas
        $min3 = $x;
    }
}
echo "Musu maziausias skiacius yra $min or antras maziausias skaicius yra $min2 o trecias min skaicius $min3";








