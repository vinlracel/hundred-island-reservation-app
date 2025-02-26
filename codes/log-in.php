<?php
include('connection.php');
if(isset($_POST['log-in']))
{
    $username = $_POST['name'];
    $password = $_POST['pass'];
    $sql = "SELECT * FROM `admin`";
    $result = $con->query($sql);
    if(!$result){
        die("Invalid Query: " .$connection->error);
    }
    while($row = $result->fetch_assoc())
    {
        if($username == $row['username'] && $password == $row['password'])
        {
            header('Location:admin.php');
        }
        else
        {?>
        <script>
            alert("Wrong Username or Password");
        </script>
        <?php
        }
    }
}
?>