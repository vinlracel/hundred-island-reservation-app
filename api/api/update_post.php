<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/database.php';
include_once '../class/post_model.php';

$database = new Database();
$db = $database->getConnection();

$item = new PostModel($db);

$data = json_decode(file_get_contents("php://input"));

$item->post_id = $data->post_id;

// students values
$item->post_title = $data->post_title;
$item->post_body = $data->post_body;

if($item->onUpdatePost())
{

    echo json_encode("Post data updated.");

}
else
{

    echo json_encode("Post could not be updated");

}

?>