<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$products = [
    1 => [
        'name' => 'Produktas 1',
        'sku' => '000001',
        'price' => '100',
        'image' => 'https://www.uhaul.com/MovingSupplies/Image/GetMedia/?id=16338&media=8174'
    ],
    2 => [
        'name' => 'Produktas 2',
        'sku' => '000002',
        'price' => '1050',
        'image' => 'https://www.uhaul.com/MovingSupplies/Image/GetMedia/?id=16338&media=8174'
    ],
    3 => [
        'name' => 'Produktas 3',
        'sku' => '000003',
        'price' => '1200',
        'image' => 'https://www.uhaul.com/MovingSupplies/Image/GetMedia/?id=16338&media=8174'
    ],
    4 => [
        'name' => 'Produktas 4',
        'sku' => '000004',
        'price' => '100',
        'image' => 'https://www.uhaul.com/MovingSupplies/Image/GetMedia/?id=16338&media=8174'
    ],
    5 => [
        'name' => 'Produktas 5',
        'sku' => '000005',
        'price' => '10120',
        'image' => 'https://www.uhaul.com/MovingSupplies/Image/GetMedia/?id=16338&media=8174'
    ],
    6 => [
        'name' => 'Produktas 6',
        'sku' => '000006',
        'price' => '100',
        'image' => 'https://www.uhaul.com/MovingSupplies/Image/GetMedia/?id=16338&media=8174'
    ],
];

function renderListItem($product, $key)
{
    $html = '';
    $html .= '<tr>';
    $html .= '<td>' . $key . '</td>';
    $html .= '<td>' . $product['name'] . '</td>';
    $html .= '<td>' . $product['sku'] . '</td>';
    $html .= '<td>' . $product['price'] . ' €</td>';
    $html .= '<td><img src="' . $product["image"] . '"></td>';
    $html .= '<td>' . priceWithPVM($product['price']) . ' €</td>';
    $html .= '</tr>';
    return $html;
}

function priceWithPVM($price)
{
    $pvm = $price * 1.21;
    return $pvm;
}

function renderGrid($products)
{
    $html = '';
    $html .= '<table>';
    $html .= '<tr>';
    $html .= '<th>ID</th>';
    $html .= '<th>Name</th>';
    $html .= '<th>Sku</th>';
    $html .= '<th>Price</th>';
    $html .= '<th>Imge</th>';
    $html .= '<th>P. with PVM</th>';
    $html .= '</tr>';

    foreach ($products as $key => $product) {
        $html .= renderListItem($product, $key);
    }
    $html .= '</table>';
    return $html;
}

echo renderGrid($products);
?>


<style>
    table {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
        text-align: center;
    }

    img {
        max-width: 100px;
    }
</style>