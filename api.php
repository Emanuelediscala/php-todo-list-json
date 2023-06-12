<?php

$students = [
    [
        'name' => 'Mario',
        'last_name' => 'Rossi'
    ],
    [
        'name' => 'Giovanna',
        'last_name' => 'Bianchi'
    ],
];

header('Content-Type: application/json');

$stringaConDati = json_encode($students);



?>