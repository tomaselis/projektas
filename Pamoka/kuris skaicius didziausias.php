<?php

$x = 1000;
$y = 123;
$z = 100;

if ($x > $y){
    if($x > $z){
        echo "$x yra didizuasias skaiciuskas";
    }
}elseif($y > $z){
    echo "$y yra didiziausias skaicius";
}else{
    echo "$z yra didziausias skaicius";
}