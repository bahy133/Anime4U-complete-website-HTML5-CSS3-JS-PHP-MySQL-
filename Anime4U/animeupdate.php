<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="ANIME, anime, Anime">
        <meta name="description" content="Anime website">
        <meta name="author" content="Bahy Mohamed">
        <meta http-equiv="refresh" content="30">
        <title>Admin-<?php
        session_start();
        $user=$_SESSION['username'];
        $conn=mysqli_connect("localhost","root","","anime");
        $qry="select * from user where username ='".$user."'";
        $res=mysqli_query($conn,$qry);
        $arr2=mysqli_fetch_row($res);
        echo("[$arr2[0]");
        echo"-";
        echo("$arr2[1]]");
        ?></title>
        
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Seymour One">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spartan">
        <!--Fonts Library -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--Bootstrap Library-->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script type="text/javascript" src="JavaScript.js"></script>
<style>
    .admin{
    height: 800px;
    
    }
</style>
    </head>
    <body>
        <header><a href="Home.php"><img src="images/logo.png"></a></header>
        <nav style="position: sticky; top: 0; z-index: 1;">
            
            <ul class="mynavbar container-fluid">
                <li><a class="title" href="Home.php">HOME</a></li>
                <li><a class="title" href="animelist.php">ANIME LIST</a></li>
                <li><a class="title" href="movies.php">MOVIES</a></li>
                <?php
                   

                    if(isset($_SESSION['username'])&&$_SESSION['username']!=0){
                        $user=$_SESSION['username'];
                        if($arr2[6]){
                            ?>
                            <li class="account"><a class="title" href="account.php"><img style="border-radius: 50%;" src="<?= $arr2[6]?>" width="50px" height="50px"></a></li>
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
            <?php
                $_SESSION['name']=$_GET['name'];
            ?>
            <div class="regForm admin container">
                <h1 class="infoheader">Animes</h1>
                <form class="reg adminform" action="animeUpdateFile.php" method="GET">
                    <label for="img">Add Image<sup>*</sup></label>
                    <a href="updateimage.php">From Here</a>
                    <br>
                    <label for="name">Anime Name<sup>*</sup></label>
                    <input type="text" id="name" name="name">
                    <br>
                    <label for="trailer">Anime Trailer (Embed Code Only)<sup>*</sup></label>
                    <input type="text" id="trailer" name="trailer" placeholder="Check Video down below">
                    <br>
                    <br>
                    <iframe width="350" height="250" src="https://www.youtube.com/embed/FAY1K2aUg5g?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <br>
                    <br>
                    <h3 style="color: red;">Anime Type</h3>
                    <label for="type" class="radio">
                    <input type="radio" id="type" name="type" value="A" class="radio_input">
                    <div class="radio_radio"></div>
                    Anime</label>
                    <label for="type2" class="radio2">
                    <input type="radio" id="type2" name="type" value="M" class="radio_input">
                    <div class="radio_radio"></div>
                    Movie</label>
                    <br>
                    <br>
                    <label for="bgimg">Anime Background</label>
                    <a href="updateimage.php">From Here</a>
                    <br>
                    <label for="episodes">Anime Episodes</label>
                    <input type="number" id="episodes" name="episodes" min="1">
                    <br>
                    <label for="episodes_num">Anime Episode number</label>
                    <input type="number" id="episodes" name="episode_num" min="1">
                    <input type="text" id="src" name="src">
                    <br>
                    <br>
                    <button type="submit" class="regbtn adminbtn">Update</button>
                    
                </form>
               
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