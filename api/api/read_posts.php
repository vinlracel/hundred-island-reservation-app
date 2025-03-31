<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../class/post_model.php';

$database = new Database();
$db = $database->getConnection();

$items = new PostModel($db);

$stmt = $items->getPosts();
$itemCount = $stmt->rowCount();

if ($itemCount > 0)
{

    $posts = array();
    $posts["body"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {

        extract($row);
        $post= array(
            "post_id" => $post_id,
            "post_title" => $post_title,
            "post_body" => $post_body,
        );
        array_push($posts["body"], $post);

    }
    echo json_encode($posts);

}
else
{

    http_response_code(404);
    echo json_encode(
        array("messsection" => "No record found.")
    );

}

?>