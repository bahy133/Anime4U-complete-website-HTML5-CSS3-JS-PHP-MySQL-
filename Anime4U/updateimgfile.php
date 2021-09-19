<?php
     session_start();
     $name=$_SESSION['name'];
     $conn=mysqli_connect("localhost","root","","anime");
     $target="images/";
     $targetfile=$target.basename($_FILES['img']['name']);
     move_uploaded_file($_FILES['img']['tmp_name'],$targetfile);
     $target2="videos/";
     $targetfile2=$target2.basename($_FILES['bgimg']['name']);
     move_uploaded_file($_FILES['bgimg']['tmp_name'],$targetfile2);
     if($targetfile!="images/"){
         $qry="update animelist set image='".$targetfile."' where name='".$name."'";
         mysqli_query($conn,$qry);
         header("Location: Home.php");
     }
     if($targetfile2!="videos/"){
         $qry="update animelist set videobg='".$targetfile2."' where name='".$name."'";
         mysqli_query($conn,$qry);
         header("Location: Home.php");
     }
?>