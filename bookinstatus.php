<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING STATUS</title>
</head>
<body>
<style>
h1
{
    text-transform: lowercase;
    color: gray;
}
*{
    margin: 0;
    padding: 0;

}

body{
    background: url("images/booking.jpg");
    background-position: center;
   background-size: cover;
   width: 100%;
   height: 100%;
}
.box{
    padding: 40px;
    box-sizing: border-box;
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,.5);
    display: flex;
    align-content: space-between;
    margin-top: 50px;
    margin-bottom: 10px;
}


.box .content{
    margin-left: 5px;
    font-size: 17px;
}

.box .button{
    width: 240px;
    height: 40px;
    background: #ff7200;
    border:none;
    margin-top: 30px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
}

.utton{
    width: 200px;
    height: 40px;
    background: #ff7200;
    border:none;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
    margin-top: 10px;
}
.utton a{
    text-decoration: none;
    color: white;
    font-weight: bold;
}

ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
}

ul li{
    list-style: none;
    margin-left: 62px;
    margin-top: 27px;
    font-size: 14px;

}

ul li a{
    text-decoration: none;
    color: black;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;
    color: #fff;

}

ul li a:hover{
    color:orange;

}
.name{
    font-weight: bold;
    color: #fff;
}
.navbar{
    width: 100%;
    height: 115px;
    margin: auto;
background-color: #2d2d2d;
}

.icon{
    width:200px;
    float: left;
    height : 70px;
}

.logo{
    color: #ff7200;
    font-size: 35px;
    font-family: Arial;
    padding-left: 20px;
    float:left;
    padding-top: 33px;

}
.menu{
    width: 400px;
    float: left;
    height: 70px;
    color: #fff;
}
.nn{
    width:100px;
    background: #ff7200;
    border:none;
    height: 40px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:white;
    transition: 0.4s ease;

}
.contain{
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.nn a{
    text-decoration: none;
    color: black;
    font-weight: bold;
    
}

.overview{
    text-align: center;

    margin-top: 40px;
}

.circle{
    border-radius:48%;
    width:65px;
}

.phello{
    width: 200px;
    margin-left: -10px;
    padding: 0px;
}

</style>



<?php
    include('connection.php');
    session_start();
    $email = $_SESSION['email'];

 
    $sql="select * from booking where EMAIL='$email'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);





    if($rows==null){
        echo '<script>alert("THERE ARE NO BOOKING DETAILS")</script>';
        echo '<script> window.location.href = "cardetails.php";</script>';
    }
    else{
    $sql2="select * from users where EMAIL='$email'";
    $name2 = mysqli_query($con,$sql2);
    $rows2=mysqli_fetch_assoc($name2);
?>
   <div class="navbar">
            <div class="icon">
                <h2 class="logo">Rentcar</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="cardetails.php">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="Feedbacks.php">FEEDBACK</a></li>
                    <li><img src="images/profile.png" class="circle" alt="Alps"></li>
                    <li><p class="phello">HELLO! &nbsp;<a id="pname"><?php echo $rows2['FNAME']." ".$rows2['LNAME']?></a></p></li>
                    <li><button class="nn"><a href="index.html">LOGOUT</a></button></li>
                </ul>
            </div>
            
            
        </div>
<div class="contain">
<?php

$sql = "SELECT * FROM booking WHERE EMAIL = '$email' ORDER BY BOOK_ID";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)){
    $duration = $row['DURATION'];
    $booking_status = $row['BOOK_STATUS'];
    echo '
        <div class="box">
        <div class="content">
        <h1>Car name: ';  
        $carId = $row['CAR_ID'];
        $sql_car = "SELECT CAR_NAME FROM cars WHERE CAR_ID = '$carId'";
        $result_car = mysqli_query($con, $sql_car);
        $car_name = mysqli_fetch_assoc($result_car);
        echo $car_name['CAR_NAME'];
        echo '</h1><br>
        <h1>No of days: ' . $duration . '</h1><br>

        <h1>Booking Status: '. $booking_status    .'</h1><br>
        </div>
        </div>
        ';

    
}

    ?>
    </div>
<?php
 }
?>
    
</body>
</html>