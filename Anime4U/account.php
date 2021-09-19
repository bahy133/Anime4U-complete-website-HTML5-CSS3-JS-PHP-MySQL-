<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="ANIME, anime, Anime">
        <meta name="description" content="Anime website">
        <meta name="author" content="Bahy Mohamed">
        <meta http-equiv="refresh" content="30">
        <title>Anime4U-<?php
        session_start();
        $user=$_SESSION['username'];
        $conn=mysqli_connect("localhost","root","","anime");
        $qry="select * from user where username ='".$user."'";
        $res=mysqli_query($conn,$qry);
        $arr=mysqli_fetch_row($res);
        echo("[$arr[0]");
        echo"-";
        echo("$arr[1]]");
        ?></title>
        
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Seymour One">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spartan">
        <!--Fonts Library -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--Bootstrap Library-->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script type="text/javascript" src="JavaScript.js"></script>
<link rel="stylesheet" href="style.css">

    </head>
    <body>
        <header><a href="Home.php"><img src="images/logo.png"></a></header>
        <nav style="position: sticky; top: 0; z-index: 1;">
            
            <ul class="mynavbar container-fluid">
                <li><a class="title" href="Home.php">HOME</a></li>
                <li><a class="title" href="animelist.php">ANIME LIST</a></li>
                <li><a class="title" href="movies.php">MOVIES</a></li>
                <?php
                    if(isset($_SESSION['username'])){
                        $user=$_SESSION['username'];
                        
                        if($arr[6]){
                            ?>
                            <li class="account"><a class="title" href="account.php"><img style="border-radius: 50%;" src="<?= $arr[6]?>" width="50px" height="50px"></a></li>
                            <?php
                        }
                        else{
                            ?>
                            <li class="account"><a class="title" href="account.php"><img  src="images/user-circle-regular.png" width="40px" height="30px"></a></li>
                        <?php
                        }
                    }
                    else{
                        ?>
                        <li class="account"><a class="title" href="Registeration.php"><img  src="images/user-circle-regular.png" width="40px" height="30px"></a></li>
                        <?php
                    }

                ?>
            </ul>
            
        </nav>
       
        <section>
            <div class="Info">
                <?php
                    if($arr[6]){
                        ?>
                            <img class="profilepic" width="150px" height="150px" style="border-radius: 50%; border: solid 7px black;" src="<?= $arr[6]?>">
                        <?php
                    }
                    else{
                        ?>
                            <img class="profilepic" width="150px" height="150px" style="border-radius: 50%;" src="images/white-profile-icon-24.jpg">
                        <?php
                    }
                ?>
                <h1 class="infoheader">    
                <?php
                        if($arr){

                        
                        for($i=0;$i<2;$i++){
                            echo($arr[$i]);
                            echo " ";
                            
                        }
                    }

                    ?>
                </h1>
                <p class="data">
                    User Name:
                </p>
                <p class="answer">
                    <?php
                    if($arr){
                        echo($arr[2]);
                    }
                 ?>
                </p>
                <div style="clear: left;">
                    <button class="regbtn" onclick="gotoupdate();">Update Data</button> 
                    <?php
                        if($arr){
                            if($arr[5]=="A"){
                    ?>
                            <button class="regbtn" onclick="gotoadmin();">Admin Page</button> 
                        <?php
                        }
                    }
                        ?>   
                       <button class="regbtn" onclick="logout();">Logout</button> 
                       <script type="text/javascript">
                            function logout(){
                                location.replace('Registeration.php');
                            }
                           
                       </script>

                </div>
            </div>
        </section>
        <div class="contact">
            <ul class="icons">
            <li><h4><a class="fbicon" href="https://www.facebook.com/AnimeMixPage" target="_blanc"><i class="fab fa-facebook"></i></a></h4></li>
                <li><h4><a class="yticon" href="https://www.youtube.com/channel/UCuGDPyVYuAGFmaawTL4uvuA" target="_blanc"><i class="fab fa-youtube"></i></a></h4></li>
                <li><h4><a class="igicon" href="https://www.instagram.com/the_anime_house/" target="_blanc"><i class="fab fa-instagram"></i></a></h4></li>
                <li><h4><a class="twticon" href="https://twitter.com/karekareo" target="_blanc"><i class="fab fa-twitter"></i></a></h4></li>
                <li><h4><a class="wapicon" href="#" target="_blanc"><i class="fab fa-whatsapp-square"></i></a></h4></li>
            </ul>
        </div>
        <footer class="container-fluid">

            <div class="footdiv"><p>Copyright &copy; All rights reserved 2021</p></div>
            <div class="footdiv footdiv2">
                <h3>About Us</h3>
                <p>We are the best anime website you will ever see</p>
        </div>
        </footer>
    </body>
</html>