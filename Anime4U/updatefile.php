<?php
                $conn=mysqli_connect("localhost","root","","anime");
                session_start();
                $user=$_SESSION['username'];
                if(isset($_POST['update'])){
                    $target="userpics/";
                    $targetfile=$target.basename($_FILES['profile']['name']);
                    move_uploaded_file($_FILES['profile']['tmp_name'],$targetfile);
                    if(!empty($_POST['firstname'])&&!empty($_POST['lastname'])&&!empty($_POST['password'])&&$targetfile=="userpics/"){
                        $newfname=$_POST['firstname'];
                        $newlname=$_POST['lastname'];
                        $newpass=$_POST['password'];
                        $qry="update user set firstname='".$newfname."' , lastname='".$newlname."' , password='".$newpass."' where username='".$user."'";
                        if(mysqli_query($conn,$qry)){
                            header("Location: account.php");
                        }
                        else{
                            ?>
                            <h3 style="color: red;"><i class="far fa-frown"></i>Error 503 </h3>
                            <?php
                        }
                    }
                    else if(!empty($_POST['firstname'])&&!empty($_POST['lastname'])&&empty($_POST['password'])&&$targetfile=="userpics/"){
                        $newfname=$_POST['firstname'];
                        $newlname=$_POST['lastname'];
                        
                        $qry="update user set firstname='".$newfname."' , lastname='".$newlname."' where username='".$user."'";
                        if(mysqli_query($conn,$qry)){
                            header("Location: account.php");
                        }
                        else{
                            ?>
                            <h3 style="color: red;"><i class="far fa-frown"></i>Error 503 </h3>
                            <?php
                        }
                    }
                    else if(!empty($_POST['firstname'])&&empty($_POST['lastname'])&&empty($_POST['password'])&&$targetfile=="userpics/"){
                        $conn=mysqli_connect("localhost","root","","anime");
                        $newfname=$_POST['firstname'];
                        
                        
                        $qry="update user set firstname='".$newfname."' where username='".$user."'";
                        if(mysqli_query($conn,$qry)){
                            header("Location: account.php");
                        }
                        else{
                            ?>
                            <h3 style="color: red;"><i class="far fa-frown"></i>Error 503 </h3>
                            <?php
                        }
                    }
                    else if(!empty($_POST['firstname'])&&empty($_POST['lastname'])&&!empty($_POST['password'])&&$targetfile=="userpics/"){
                        $newfname=$_POST['firstname'];
                        
                        $newpass=$_POST['password'];
                        $qry="update user set firstname='".$newfname."' , password='".$newpass."' where username='".$user."'";
                        if(mysqli_query($conn,$qry)){
                            header("Location: account.php");
                        }
                        else{
                            ?>
                            <h3 style="color: red;"><i class="far fa-frown"></i>Error 503 </h3>
                            <?php
                        }
                    }
                    else if(empty($_POST['firstname'])&&!empty($_POST['lastname'])&&!empty($_POST['password'])&&$targetfile=="userpics/"){
                        
                        $newlname=$_POST['lastname'];
                        $newpass=$_POST['password'];
                        $qry="update user set lastname='".$newlname."' , password='".$newpass."' where username='".$user."'";
                        if(mysqli_query($conn,$qry)){
                            header("Location: account.php");
                        }
                        else{
                            ?>
                            <h3 style="color: red;"><i class="far fa-frown"></i>Error 503 </h3>
                            <?php
                        }
                    }
                    else if(empty($_POST['firstname'])&&!empty($_POST['lastname'])&&empty($_POST['password'])&&$targetfile=="userpics/"){
                        
                        $newlname=$_POST['lastname'];
                       
                        $qry="update user set lastname='".$newlname."' where username='".$user."'";
                        if(mysqli_query($conn,$qry)){
                            header("Location: account.php");
                        }
                        else{
                            ?>
                            <h3 style="color: red;"><i class="far fa-frown"></i>Error 503 </h3>
                            <?php
                        }
                    }
                    else if(empty($_POST['firstname'])&&empty($_POST['lastname'])&&!empty($_POST['password'])&&$targetfile=="userpics/"){
                        
                        
                        $newpass=$_POST['password'];
                        $qry="update user set password='".$newpass."' where username='".$user."'";
                        if(mysqli_query($conn,$qry)){
                            header("Location: account.php");
                        }
                        else{
                            ?>
                            <h3 style="color: red;"><i class="far fa-frown"></i>Error 503 </h3>
                            <?php
                        }
                    }
                    else if(empty($_POST['firstname'])&&empty($_POST['lastname'])&&empty($_POST['password'])&&$targetfile=="userpics/"){
                        ?>
                        <h2 style="color: red;"><i class="far fa-angry"></i>Please Enter a Valid Data</h2>
                        <?php
                    }
                    else if(!empty($_POST['firstname'])&&!empty($_POST['lastname'])&&!empty($_POST['password'])&&$targetfile!="userpics/"){
                        $newfname=$_POST['firstname'];
                        $newlname=$_POST['lastname'];
                        $newpass=$_POST['password'];
                        $qry="update user set firstname='".$newfname."' , lastname='".$newlname."' , password='".$newpass."' , profile='".$targetfile."' where username='".$user."'";
                        if(mysqli_query($conn,$qry)){
                            header("Location: account.php");
                        }
                        else{
                            ?>
                            <h3 style="color: red;"><i class="far fa-frown"></i>Error 503 </h3>
                            <?php
                        }
                    }
                    else if(!empty($_POST['firstname'])&&!empty($_POST['lastname'])&&empty($_POST['password'])&&$targetfile!="userpics/"){
                        $newfname=$_POST['firstname'];
                        $newlname=$_POST['lastname'];
                        
                        $qry="update user set firstname='".$newfname."' , lastname='".$newlname."' , profile='".$targetfile."' where username='".$user."'";
                        if(mysqli_query($conn,$qry)){
                            header("Location: account.php");
                        }
                        else{
                            ?>
                            <h3 style="color: red;"><i class="far fa-frown"></i>Error 503 </h3>
                            <?php
                        }
                    }
                    else if(!empty($_POST['firstname'])&&empty($_POST['lastname'])&&empty($_POST['password'])&&$targetfile!="userpics/"){
                        $conn=mysqli_connect("localhost","root","","anime");
                        $newfname=$_POST['firstname'];
                        
                        
                        $qry="update user set firstname='".$newfname."' , profile='".$targetfile."' where username='".$user."'";
                        if(mysqli_query($conn,$qry)){
                            header("Location: account.php");
                        }
                        else{
                            ?>
                            <h3 style="color: red;"><i class="far fa-frown"></i>Error 503 </h3>
                            <?php
                        }
                    }
                    else if(!empty($_POST['firstname'])&&empty($_POST['lastname'])&&!empty($_POST['password'])&&$targetfile!="userpics/"){
                        $newfname=$_POST['firstname'];
                        
                        $newpass=$_POST['password'];
                        $qry="update user set firstname='".$newfname."' , password='".$newpass."' , profile='".$targetfile."' where username='".$user."'";
                        if(mysqli_query($conn,$qry)){
                            header("Location: account.php");
                        }
                        else{
                            ?>
                            <h3 style="color: red;"><i class="far fa-frown"></i>Error 503 </h3>
                            <?php
                        }
                    }
                    else if(empty($_POST['firstname'])&&!empty($_POST['lastname'])&&!empty($_POST['password'])&&$targetfile!="userpics/"){
                        
                        $newlname=$_POST['lastname'];
                        $newpass=$_POST['password'];
                        $qry="update user set lastname='".$newlname."' , password='".$newpass."' , profile='".$targetfile."' where username='".$user."'";
                        if(mysqli_query($conn,$qry)){
                            header("Location: account.php");
                        }
                        else{
                            ?>
                            <h3 style="color: red;"><i class="far fa-frown"></i>Error 503 </h3>
                            <?php
                        }
                    }
                    else if(empty($_POST['firstname'])&&!empty($_POST['lastname'])&&empty($_POST['password'])&&$targetfile!="userpics/"){
                        
                        $newlname=$_POST['lastname'];
                       
                        $qry="update user set lastname='".$newlname."' , profile='".$targetfile."' where username='".$user."'";
                        if(mysqli_query($conn,$qry)){
                            header("Location: account.php");
                        }
                        else{
                            ?>
                            <h3 style="color: red;"><i class="far fa-frown"></i>Error 503 </h3>
                            <?php
                        }
                    }
                    else if(empty($_POST['firstname'])&&empty($_POST['lastname'])&&!empty($_POST['password'])&&$targetfile!="userpics/"){
                        
                        
                        $newpass=$_POST['password'];
                        $qry="update user set password='".$newpass."' , profile='".$targetfile."' where username='".$user."'";
                        if(mysqli_query($conn,$qry)){
                            header("Location: account.php");
                        }
                        else{
                            ?>
                            <h3 style="color: red;"><i class="far fa-frown"></i>Error 503 </h3>
                            <?php
                        }
                    }
                    else if(empty($_POST['firstname'])&&empty($_POST['lastname'])&&empty($_POST['password'])&&$targetfile!="userpics/"){
                        $qry="update user set profile='".$targetfile."' where username='".$user."'";
                        if(mysqli_query($conn,$qry)){
                            header("Location: account.php");
                        }
                        else{
                            ?>
                            <h3 style="color: red;"><i class="far fa-frown"></i>Error 503 </h3>
                            <?php
                        }
                    }
                }
                ?>