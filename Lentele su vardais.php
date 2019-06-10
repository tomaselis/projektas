<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$users = [
    1 => [
        'name' => 'Antanas',
        'surname' => 'Adomavicius',
        'email' => 'antanas@gmail.com',
        'phone' => '370768905',
        'bday' => '1985 12 23'
    ],
    2 => [
        'name' => 'Jonas',
        'surname' => 'Petravicius',
        'email' => 'jonass@gmail.com',
        'phone' => '37075353905',
        'bday' => '1982 02 12'
    ],
    3 => [
        'name' => 'Tomas',
        'surname' => 'Sakalauskas',
        'email' => 'tomas@gmail.com',
        'phone' => '370768905',
        'bday' => '1985 12 23'
    ],
    4 => [
        'name' => 'Viktorija',
        'surname' => 'Cizauskaite',
        'email' => 'viktorika@gmail.com',
        'phone' => '3706789574',
        'bday' => '1993 02 12'
    ],
    5 => [
        'name' => 'Petras',
        'surname' => 'Slekavicius',
        'email' => 'petras@gmail.com',
        'phone' => '3707754905',
        'bday' => '1993 01 25'
    ]
];


function renderListItem($user, $key){
    $html = '';
    $html .= '<tr class="user-wrapper" style="padding: 10px; border: 1px solid black; text-align: center;">';
    $html .= '<td class="name" style="padding: 10px; border: 1px solid black; text-align: center;">'.$key.'</td>';
    $html .= '<td class="name" style="padding: 10px; border: 1px solid black; text-align: center;">'.$user['name'].'</td>';
    $html .= '<td class="surname" style="padding: 10px; border: 1px solid black; text-align: center;">'.$user['surname'].'</td>';
    $html .= '<td class="email" style="padding: 10px; border: 1px solid black; text-align: center;">'.$user['email'].'</td>';
    $html .= '<td class="phone" style="padding: 10px; border: 1px solid black; text-align: center;">'.$user['phone'].'</td>';
    $html .= '<td class="bday" style="padding: 10px; border: 1px solid black; text-align: center;">'.$user['bday'].'</td>';
    $html .= '</tr>';


    return $html;
}

function renderGrid($users){
    $html = '';
    $html .= '<div style="display: flex; align-items: center; justify-content: center; margin-top: 200px;">';
    $html .= '<table style="border-collapse: collapse;">';
    $html .= '<tr>';
    $html .= '<th style="padding: 10px; border: 1px solid black;">NR</th>';
    $html .= '<th style="padding: 10px; border: 1px solid black;">USERNAME</th>';
    $html .= '<th style="padding: 10px; border: 1px solid black;">SURNAME</th>';
    $html .= '<th style="padding: 10px; border: 1px solid black;">EMEIL</th>';
    $html .= '<th style="padding: 10px; border: 1px solid black;">TELEPHONE</th>';
    $html .= '<th style="padding: 10px; border: 1px solid black;">DOB</th>';
    $html .='</tr>';
    $html .='</div>';

    foreach ($users as $key => $user){
        $html .= renderListItem($user, $key);
    }
    $html .= '</table>';

    return $html;

}

echo renderGrid($users);