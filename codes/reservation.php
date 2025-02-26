<?php
include('connection.php');
$pic_uploaded = 0;
if(isset($_POST['res']))
{    
    $email = $_POST['email'];
    $name = $_POST['name'];
    $address = $_POST['add'];
    $cnum = $_POST['cnum'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $img_dir = $_FILES["id"]['name'];
    if(move_uploaded_file($_FILES['id']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/Project/uploaded/'.$img_dir))
    {
        $target_file = $_SERVER['DOCUMENT_ROOT'].'Project/uploaded/'.$img_dir;
        $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $picname = ($_FILES['id']['name']);
        $photo = $picname;
        if($imgFileType != "jpg" && $imgFileType != "jpeg" && $imgFileType != "png")
        {?>
        <script>
            alert("Please upload phot with extension .jpg/.png or .jpeg");
        </script>
        <?php
        
        }
        else
        {
            $pic_uploaded = 1;
        }

}
if($pic_uploaded == 1)
{
    $query = "INSERT INTO `reservation`(`name`, `email`, `cnum`,`date`, `time`, `address`, `img_dir`) VALUES ('$name','$email','$cnum','$date', '$time','$address','$photo')";
    mysqli_query($con, $query);
    if($query>0)
    {
        
        ?>
        <script>
            alert("Reservation Successful");
        </script>
        
    <?php
    
} else {
    ?>
    <script>
        alert("Reservation unsuccessful");
        
    </script>
    <?php
}



    
}
}

?>