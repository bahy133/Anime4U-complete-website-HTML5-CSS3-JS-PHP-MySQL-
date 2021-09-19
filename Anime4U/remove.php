<?php
    $name=$_GET['name'];
    $conn=mysqli_connect("localhost","root","","anime");
    $qry="delete from animelist where name='".$name."'";
    if(mysqli_query($conn,$qry)){
        header("Location: Home.php");
    }
    else{
        ?>
        <h1 style="color: red; font-size: 50px; font-weight: bolder; font-family: Arial, Helvetica, sans-serif;">delete error</h1>
        <?php
    }
?>