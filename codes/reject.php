<?php
include('connection.php');
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "DELETE FROM reservation WHERE id=$id";
    $con->query($sql);
    header('Location:admin.php');
}
?>