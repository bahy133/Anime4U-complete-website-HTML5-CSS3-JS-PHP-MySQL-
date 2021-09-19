<?php
class user{
    var $firstname;
    var $lastname;
    var $username;
    var $password;
    var $gender;
    var $usertype;
    function __construct($Fname,$Lname,$Username,$pass,$gender)
    {
        $this->firstname=$Fname;
        $this->lastname=$Lname;
        $this->username=$Username;
        $this->password=$pass;
        $this->gender=$gender;
        $this->usertype=null;
    }

    
}
session_start();
$conn=mysqli_connect("localhost","root","","anime");

if(isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['gender'])){
    $checkqry="select count(*) from user where username='".$_POST['username']."'";
    $res=mysqli_query($conn,$checkqry);
    $arr=mysqli_fetch_row($res);
    if($arr[0]==1){
       ?>
       <!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="ANIME, anime, Anime">
        <meta name="description" content="Anime website">
        <meta name="author" content="Bahy Mohamed">
        <meta http-equiv="refresh" content="30">
        <title>Registeration Page</title>
        
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Seymour One">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spartan">
        <!--Fonts Library -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--Bootstrap Library-->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    </head>
    <body>
        <header><a href="Home.php"><img src="images/logo.png"></a></header>
        <nav style="position: sticky; top: 0; z-index: 1;">
            
            <ul class="mynavbar container-fluid">
                <li><a class="title" href="Home.php">HOME</a></li>
                <li><a class="title" href="animelist.php">ANIME LIST</a></li>
                <li><a class="title" href="movies.php">MOVIES</a></li>
               <li class="account"><a class="title" href="Registeration.php"><img  src="images/user-circle-regular.png" width="40px" height="30px"></a></li>
            </ul>
            
        </nav>
        <section>
        <?php
                
                $_SESSION['username']=0;
            ?>
           <div class="regForm ">
                <form class="reg" action="registerfile.php" method="POST">
                    <label for="firstname">First Name<sup>*</sup></label>
                    <input type="text" id="firstname" name="firstname" required>
                    <br>
                    <label for="lastname">Last Name<sup>*</sup></label>
                    <input type="text" id="lastname" name="lastname" required>
                    <br>
                    <label for="username">User Name<sup>*</sup></label>
                    <input type="text" id="username" name="username" required>
                    <p style="color: red; text-align: center; font-family: 'Spartan';">User Name Already Taken</p>
                    <label for="password">Password<sup>*</sup></label>
                    <input type="password" id="password" name="password" required>
                    <br>
                    <label for="Cpassword" id="Cpassid">Confirm Password<sup>*</sup></label>
                    <input type="password" id="Cpassword" name="Cpassword" required>
                    <br>
                    <h3 style="text-align: center; margin-top: 10px;">Gender</h3>
                    <label for="gender" class="radio">
                    <input type="radio" id="gender" name="gender" value="M" class="radio_input">
                    <div class="radio_radio"></div>
                    Male</label>
                    <label for="gender2" class="radio2">
                    <input type="radio" id="gender2" name="gender" value="F" class="radio_input">
                    <div class="radio_radio"></div>
                    Female</label>
                    <br>
                    <button type="submit" class="regbtn" name="register">Register</button>
                    <br>
                    <a style="color: red; font-weight:bolder ; font-family: 'Spartan'; margin-left: 235px;" href="Login.php">Login?</a>

                </form>
           </div>
        </section>
        <div class="contact">
            <ul class="icons">
                <li><a class="fbicon" href="https://www.facebook.com/AnimeMixPage" target="_blanc"><i class="fab fa-facebook"></i></a></li>
                <li><a class="yticon" href="https://www.youtube.com/channel/UCuGDPyVYuAGFmaawTL4uvuA" target="_blanc"><i class="fab fa-youtube"></i></a></li>
                <li><a class="igicon" href="https://www.instagram.com/the_anime_house/" target="_blanc"><i class="fab fa-instagram"></i></a></li>
                <li><a class="twticon" href="https://twitter.com/karekareo" target="_blanc"><i class="fab fa-twitter"></i></a></li>
                <li><a class="wapicon" href="#" target="_blanc"><i class="fab fa-whatsapp-square"></i></a></li>
            </ul>
        </div>
        <footer class=" logfooter container-fluid">

            <div class="footdiv"><p>Copyright &copy; All rights reserved 2021</p></div>
            <div class="footdiv footdiv2">
                <h3>About Us</h3>
                <p>We are the best anime website you will ever see</p>
        </div>
        </footer>
    </body>
</html>   
    <?php
    }
    else{
    if($_POST['password']===$_POST['Cpassword']){
        
        $obj=new user(trim($_POST['firstname']),trim($_POST['lastname']),trim($_POST['username']),$_POST['password'],$_POST['gender']);
        $qry="insert into user (firstname,lastname,username,password,gender) values ('".$obj->firstname."',
        '".$obj->lastname."','".$obj->username."','".$obj->password."','".$obj->gender."')";
        $_SESSION['username']=$obj->username;
        if(mysqli_query($conn,$qry)){
            header("Location: Home.php");
        }
    }
    else{
        ?>
      <!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="ANIME, anime, Anime">
        <meta name="description" content="Anime website">
        <meta name="author" content="Bahy Mohamed">
        <meta http-equiv="refresh" content="30">
        <title>Registeration Page</title>
        
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Seymour One">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spartan">
        <!--Fonts Library -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--Bootstrap Library-->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    </head>
    <body>
        <header><a href="Home.php"><img src="images/logo.png"></a></header>
        <nav style="position: sticky; top: 0; z-index: 1;">
            
            <ul class="mynavbar container-fluid">
                <li><a class="title" href="Home.php">HOME</a></li>
                <li><a class="title" href="animelist.php">ANIME LIST</a></li>
                <li><a class="title" href="movies.php">MOVIES</a></li>
               <li class="account"><a class="title" href="Registeration.php"><img  src="images/user-circle-regular.png" width="40px" height="30px"></a></li>
            </ul>
            
        </nav>
        <section>
        <?php
                
                $_SESSION['username']=0;
            ?>
           <div class="regForm ">
                <form class="reg" action="registerfile.php" method="POST">
                    <label for="firstname">First Name<sup>*</sup></label>
                    <input type="text" id="firstname" name="firstname" required>
                    <br>
                    <label for="lastname">Last Name<sup>*</sup></label>
                    <input type="text" id="lastname" name="lastname" required>
                    <br>
                    <label for="username">User Name<sup>*</sup></label>
                    <input type="text" id="username" name="username" required>
                    <br>
                    <label for="password">Password<sup>*</sup></label>
                    <input type="password" id="password" name="password" required>
                    <br>
                    <label for="Cpassword" id="Cpassid">Confirm Password<sup>*</sup></label>
                    <input type="password" id="Cpassword" name="Cpassword" required>
                    <p style="color: red; text-align: center; font-family: 'Spartan';">Invalid Password</p>
                    <h3 style="text-align: center; margin-top: 10px;">Gender</h3>
                    <label for="gender" class="radio">
                    <input type="radio" id="gender" name="gender" value="M" class="radio_input">
                    <div class="radio_radio"></div>
                    Male</label>
                    <label for="gender2" class="radio2">
                    <input type="radio" id="gender2" name="gender" value="F" class="radio_input">
                    <div class="radio_radio"></div>
                    Female</label>
                    <br>
                    <button type="submit" class="regbtn" name="register">Register</button>
                    <br>
                    <a style="color: red; font-weight:bolder ; font-family: 'Spartan'; margin-left: 235px;" href="Login.php">Login?</a>

                </form>
           </div>
        </section>
        <div class="contact">
            <ul class="icons">
                <li><a class="fbicon" href="https://www.facebook.com/AnimeMixPage" target="_blanc"><i class="fab fa-facebook"></i></a></li>
                <li><a class="yticon" href="https://www.youtube.com/channel/UCuGDPyVYuAGFmaawTL4uvuA" target="_blanc"><i class="fab fa-youtube"></i></a></li>
                <li><a class="igicon" href="https://www.instagram.com/the_anime_house/" target="_blanc"><i class="fab fa-instagram"></i></a></li>
                <li><a class="twticon" href="https://twitter.com/karekareo" target="_blanc"><i class="fab fa-twitter"></i></a></li>
                <li><a class="wapicon" href="#" target="_blanc"><i class="fab fa-whatsapp-square"></i></a></li>
            </ul>
        </div>
        <footer class=" logfooter container-fluid">

            <div class="footdiv"><p>Copyright &copy; All rights reserved 2021</p></div>
            <div class="footdiv footdiv2">
                <h3>About Us</h3>
                <p>We are the best anime website you will ever see</p>
        </div>
        </footer>
    </body>
    </html>
        <?php
    }
}
}
else{
    header("Location: Registeration.html");
    echo"Please fill all Data";
}

?>