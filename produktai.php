<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$products = [
    1 => [
        'name' => 'Produktas 1',
        'sku' => '00001',
        'price' => '100',
        'image' => 'https://cdn.pixabay.com/photo/2016/09/01/10/23/image-1635747_960_720.jpg',
    ],
    2 => [
        'name' => 'Produktas 2',
        'sku' => '2',
        'price' => '40',
        'image' => 'https://cdn.pixabay.com/photo/2016/09/01/10/23/image-1635747_960_720.jpg',
    ],
    3 => [
        'name' => 'Produktas 3',
        'sku' => '00003',
        'price' => '260',
        'image' => 'https://cdn.pixabay.com/photo/2016/09/01/10/23/image-1635747_960_720.jpg',
    ],
    4 => [
        'name' => 'Produktas 4',
        'sku' => '4',
        'price' => '200',
        'image' => 'https://cdn.pixabay.com/photo/2016/09/01/10/23/image-1635747_960_720.jpg',
    ],
    5 => [
        'name' => 'Produktas 5',
        'sku' => '5',
        'price' => '150',
        'image' => 'https://cdn.pixabay.com/photo/2016/09/01/10/23/image-1635747_960_720.jpg',
    ],
    6 => [
        'name' => 'Produktas 6',
        'sku' => '6',
        'price' => '50',
        'image' => 'https://cdn.pixabay.com/photo/2016/09/01/10/23/image-1635747_960_720.jpg',
    ]
];

function renderProduct($product){
    $html = '';
    $html .= '<div style="float: left; background: #ccc; border: 1px solid greenyellow; display=flex;"></div>';
    $html .= '<div class="product-wrapper">';
    $html .= '<div class="image"><img src="'.$product['image'].'"></div>';
    $html .= '<div class="name">'.$product['name'].'</div>';
    $html .= '<div class="sku">'.$product['sku'].'</div>';
    $html .= '<div class="price">'.$product['price'].'</div>';

    $html .= '</div>';

    return $html;
}
function renderGrid($products){
    $html = '';
    $html .= '<div class="grid-wrapper" style="display: flex;">';
    foreach ($products as $product) {
        $html .= renderProduct($product);
    }
    $html .= '</div>';
    return $html;

}


        echo renderGrid($products);