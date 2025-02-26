<?php
include('connection.php');
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $name = $_GET["name"];
    $email = $_GET["email"];
    $address = $_GET["address"];
    $cnum = $_GET["cnum"];
    $date = $_GET["date"];
    $time = $_GET["time"];



    //$sql = "SELECT * FROM reservation WHERE id = $id";
    //$result = $con->query($sql);

    $insert = "INSERT INTO `accepted`(`id`, `name`, `email`, `cnum`, `address`, `date`, `time`) VALUES ('$id','$name','$email','$cnum','$address','$date','$time')";
    $con->query($insert);
    /*while($row = $result->fetch_assoc())
    {
    $insert = "INSERT INTO `accepted`(`id`, `name`, `email`, `cnum`, `address`, `date`, `time`) VALUES ('$id','$row[name]','$row[email]','$row[cnum]','$row[address]','$row[date]','$row[time]')";
    $con->query($insert);
    }*/
    
    $delete = "DELETE FROM reservation WHERE id=$id";
    $con->query($delete);
    header('Location:admin.php');
}
?>