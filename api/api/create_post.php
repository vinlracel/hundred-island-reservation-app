<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/database.php';
include_once '../class/post_model.php';

$database = new Database();
$db = $database->getConnection();

$item = new PostModel($db);

$data = json_decode(file_get_contents("php://input"));

$item->name = $data->name;
$item->email = $data->email;
$item->cnum = $data->cnum;
$item->date = $data->date;
$item->time = $data->time;
$item->address = $data->address;


if($item->onCreatePost())
{

    echo 'Post created successfully.';

}
else
{

    echo 'Post could not be created.';

}

?>