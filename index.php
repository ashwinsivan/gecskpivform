<?php
$insert=false;

if(isset($_POST['name'])){
    //Set connection variables
    $server="localhost";
    $username="root";
    $password="";

    //Create a database connection
    $con= mysqli_connect($server,$username,$password);

    //Check for connection success
    if(!$con)
    {
        die("Connection to database FAILED. Error code : ".mysqli_connect_error());
    }
    else
    {
        // echo("Connection to database SUCCESS!!!");
    }

    //Connect post variables
    $name= $_POST['name'];
    $age= $_POST['age'];
    $gender= $_POST['gender'];
    $email= $_POST['email'];
    $mob= $_POST['mob'];
    $query= $_POST['query'];
    
    $sql = "INSERT INTO `iv`.`trip` (`name`, `age`, `gender`, `email`, `mob`, `query`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$mob', '$query', current_timestamp());";

    // echo $sql;

    //Execute the query
    if($con->query($sql)==true)
    {
        // echo "Your registration is successfull...";
        $insert=true; //Flag for insertion success

    }
    else
    {
        echo "ERROR: $sql <br> $con->error"; //Flag for insertion failure
    }

    //Closing database connection
    $con->close(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industrial Visit | Dept. of Information Technology</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Finlandica:ital@1&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bgimg" src="bg.jpg" alt="GECSKP" srcset="">
    <div class="container">
        <div class="htext">
        <h1>Welcome to GEC Palakkad Industrial Visit Form</h1><br>
        <p id="subhead">Enter your details and submit the form to confirm your seats</p>
        </div>
        <?php
            if($insert==true)
            {
                echo "<p class='SubmitMsg'><b>Thank you for submitting the form.We are happy to have you onboard.</b></p>";
            }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="number" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="number" name="mob" id="mob" placeholder="Enter your phone number">
            <textarea name="query" id="query" cols="30" rows="3" placeholder="Do you have any queries?"></textarea><br>
            <button class="btn">Book Seats</button>
        </form>

    </div>
    <script src="index.js"></script>
    
</body>
</html>