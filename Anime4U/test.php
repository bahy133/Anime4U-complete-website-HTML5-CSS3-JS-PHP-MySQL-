<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="ANIME, anime, Anime">
        <meta name="description" content="Anime website">
        <meta name="author" content="Bahy Mohamed">
        <meta http-equiv="refresh" content="30">
        <title>Anime4U</title>
        
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
    /* .content{
    display: flex;
    flex-flow: row wrap;
    justify-content: center;
    }
.child{
    width: 25%;
    height: 330px;
    border: 3px solid black;
    border-radius: 10%;
    margin-left: 10px;
    flex-grow: 0;
    margin-top: 10px;
    }  */
    *{
        box-sizing: border-box;
    }
    body{
        margin: 0;
    }
    /* .ad{
    margin-top:10px;
     z-index: 3;
      margin-right: 750px;
       margin-bottom: 150px;
    } */
    .contact{
    
    height: 35%;
    
    }
</style>
    </head>
    <body>
        <header style="position: relative; z-index: 5;"><a href="Home.php"><img src="images/logo.png"></a></header>
        
            
            <ul class="mynavbar container-fluid">
                <li style="background-color: #e6b800;"><a style="color: black;" class="title" href="Home.php">HOME</a></li>
                <li><a class="title" href="animelist.php">ANIME LIST</a></li>
                <li><a class="title" href="movies.php">MOVIES</a></li>
                <?php
                    session_start();
                    $conn=mysqli_connect("localhost","root","","anime");
                    if(isset($_SESSION['username'])&&$_SESSION['username']!=0){
                        $user=$_SESSION['username'];
                        $qry="select profile from user where username='".$user."'";
                        $res=mysqli_query($conn,$qry);
                        $arr=mysqli_fetch_row($res);
                        if($arr[0]){
                            ?>
                            <li class="account"><a class="title" href="account.php"><img style="border-radius: 50%;" src="<?= $arr[0]?>" width="50px" height="50px"></a></li>
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
            
          <?php
            $_SESSION['name']=$_GET['name'];
            $name=$_SESSION['name'];   
            $qry="select image , videobg , videoad , num from animelist where name='".$name."'";
            $res=mysqli_query($conn,$qry);
            $arr=mysqli_fetch_row($res);
          ?>  
          <div class="fullscreen_video">
              <video id="myvideo" src="<?= $arr[1]?>" autoplay="true" loop="true" muted controls></video>
          </div>
          <div class="overlay"></div>
          <div class="content container-fluid">
              <div class="ad">
                  <?= $arr[2]?>
                 </div>
              <div class="animecontent">
                  <?php
                  $qry="select * from episodes where animename='".$name."'";
                  $res=mysqli_query($conn,$qry);
                  
                    while($row=mysqli_fetch_assoc($res)){
                        ?>
                            <div class="child">
                                <a href="<?= $row['src']?$row['src']:"#"?>" target="_blanc" style="cursor: pointer;"><img style="border-radius: 10%;" src="<?= $arr[0]?>" width="100%" height="250px"></a>
                                <div class="childname">
                                    <a href="<?= $row['src']?$row['src']:"#"?>" target="_blanc" class="animename" style="cursor: pointer;"><?= $row['episode_num']?></a>
                                </div>
                            </div>
                            
                        <?php
                    }
                  ?>
                  
              </div>
          </div>
        <ul style="position: fixed; bottom: 20px; right: 20px; z-index: 5;">
            <li id="mute" style="cursor: pointer; list-style-type: none;" onclick="muteVideo();"><h2><i class="fas fa-volume-mute"></i></h2></li>
        </ul>
        <div class="contact" id="test">
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