<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../class/post_model.php';

$database = new Database();
$db = $database->getConnection();

$item = new PostModel($db);

$item->post_id = isset($_GET['post_id']) ? $_GET['post_id'] : die();

$item->getPost();

if($item->post_title != null)
{

    // create array
    $post = array(
        "post_id" =>  $item->post_id,
        "post_title" => $item->post_title,
        "post_body" => $item->post_body
    );

    http_response_code(200);
    echo json_encode($post);

}
else
{

    http_response_code(404);
    echo json_encode("Post not found.");

}

?>