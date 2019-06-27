<?php


class ProductAbstract
{
    // public / private / protected // matomumo lygiai


    private $price; // klases parametrai
    private $sku;
    private $name;

    public function __construct($name,) // vidueje siuo atveju galme ideti name, sku ir proce
    {
        $this->setName($name);
        // this price
    // this sku

    }


    public function getName(){ // metodai
    return $this->name;
    }
    public function makeTitle(){
        return '<h1>' . $this->getName() .'</h1>';
    }
    public function setName($kintamasis){
        $this->name = $kintamasis;
    }
    public function getPrice(){
        return $this->price = $price;
    }
    public function setPrice($price){
        $this->price = $proce;
    }
}


class Helper{
    public function getPriceWithTax($price){
        return $price  * 1.21;
    }
}

$product = new ProductAbstract('batai', 12, '000001');
// kitas failas kita klase

$product = new ProductAbstract;
$product->getName('Batai'); //naujas objektas
$proceWithTax = $helper->getPriceWithTax($product->getPrice());