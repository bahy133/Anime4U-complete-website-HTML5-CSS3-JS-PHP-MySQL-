<?php
    $conn=mysqli_connect("localhost","root","","anime");
    $regex="<.+?>";
    if(!empty($_POST['name'])&&!empty($_POST['trailer'])&&!empty($_POST['type'])&&!empty($_POST['episodes'])){
        $name=trim($_POST['name']);
        $ad=trim($_POST['trailer']);
        $num=$_POST['episodes'];
        if(!preg_match($regex,$ad)){
            ?>
            <h1 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><i class="far fa-frown"></i> ERROR in embed video</h1>
            <?php        
        }
        $type=$_POST['type'];
        $target="images/";
        $targetfile=$target.basename($_FILES['img']['name']);
        move_uploaded_file($_FILES['img']['tmp_name'],$targetfile);
        $target2="videos/";
        $targetfile2=$target2.basename($_FILES['bgimg']['name']);
        move_uploaded_file($_FILES['bgimg']['tmp_name'],$targetfile2);
        $qry="insert into animelist (name,image,videobg,videoad,type,num) values ('".$name."','".$targetfile."','".$targetfile2."',
        '".$ad."','".$type."','".$num."')";
        if(mysqli_query($conn,$qry)){
            for($i=1;$i<=$num;$i++){
                $qry="insert into episodes values('".$name."','"."Episode ".$i."')";
                mysqli_query($conn,$qry);
            }
           header("Location: Home.php");
        }
        else{
            ?>
            <h1 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><i class="far fa-frown"></i> ERROR 503</h1>
            <?php
        }
    }
    
    else{
        ?>
            <h1 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><i class="far fa-frown"></i> ERROR 503</h1>
            <?php
    }
    
?>