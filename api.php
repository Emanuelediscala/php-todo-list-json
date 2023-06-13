<?php
header('Content-Type: application/json');
$todoList = file_get_contents("dati.json");
$todoListDati = json_decode($todoList, true);

if( isset($_POST['newTask']) ) {

    $nameObject = $_POST["newTask"]; 

    $newObject = array(
        'name' => $nameObject,
        'status' => 'undone'
    );

    $todoListDati[] = $newObject;
    file_put_contents("dati.json", json_encode($todoListDati) );

} else if( isset($_POST['deleteAll']) ) {

    $todoListDati = [];
    file_put_contents("dati.json", json_encode($todoListDati) );

} else if( isset($_POST['deleteIndex'] )) {
    $indice = $_POST['deleteIndex'];
    array_splice($todoListDati, $indice, 1);
    file_put_contents("dati.json", json_encode($todoListDati) );
}
else if( isset($_POST['change'] )) {
    $indice = $_POST['index'];
    $todoListDati[$indice]["done"] = !$todoListDati[$indice]["done"];
    file_put_contents("dati.json", json_encode($todoListDati) );
}
else if( isset($_POST['editing'] )) {
    $indice = $_POST['index'];
    $editedtext = $_POST["editing"];
    $todoListDati[$indice]["name= $editedtext"];
    file_put_contents("dati.json", json_encode($todoListDati) );
}

$todoList = json_encode($todoListDati);
echo $todoList;
?>