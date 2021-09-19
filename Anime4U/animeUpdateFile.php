<?php
        session_start();
        $name=$_SESSION['name'];
        $conn=mysqli_connect("localhost","root","","anime");
    if(!empty($_GET['name'])||!empty($_GET['trailer'])||!empty($_GET['type'])||!empty($_GET['episodes'])||!empty($_GET['episode_num'])){
        if(!empty($_GET['name'])){
            $newname=trim($_GET['name']);
            $qry="update animelist set name='".$newname."' where name='".$name."'";
            mysqli_query($conn,$qry);
            $name=$newname;
            $_SESSION['name']=$newname;
        }
        if(!empty($_GET['trailer'])){
            $newad=trim($_GET['trailer']);
            if(!preg_match($regex,$newad)){
                ?>
                <h1 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><i class="far fa-frown"></i> ERROR in embed video</h1>
                <?php        
                }
            else{
                $qry="update animelist set videoad='".$newad."' where name='".$name."'";
                mysqli_query($conn,$qry);
            }    
            
        }
        if(!empty($_GET['type'])){
            $newtype=$_GET['type'];
            $qry="update animelist set type='".$newtype."' where name='".$name."'";
            mysqli_query($conn,$qry);
        }
        if(!empty($_GET['episodes'])){
            $qry="delete from episodes where animename='".$name."'";
            mysqli_query($conn,$qry);
            $newnum=$_GET['episodes'];
            $qry="update animelist set num='".$newnum."' where name='".$name."'";
            mysqli_query($conn,$qry);
            for($i=1;$i<=$newnum;$i++){
                $qry="insert into episodes values('".$name."','"."Episode ".$i."')";
                mysqli_query($conn,$qry);
            }
            
            
        }
        if(!empty($_GET['episode_num'])){
            $episode_num=$_GET['episode_num'];
            if(!empty($_GET['src'])){
                $src=$_GET['src'];
                $qry="update episodes set src='".$src."' where animename='".$name."' and episode_num='"."Episode ".$episode_num."'";
                mysqli_query($conn,$qry);
            }
            else{
                ?>
                <h1 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><i class="far fa-frown"></i> ERROR</h1>
                <?php
            }
        }
    }
    else{
            header("Location: animeupdate.php");
    }
    header("Location: Home.php");
?>