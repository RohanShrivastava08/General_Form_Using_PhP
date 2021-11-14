<?php
$insert = false;
if(isset($_POST['name'])){
    // Set Connection Variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a Database Connection
    $con = mysqli_connect($server,$username,$password);

    // check for connetion success
    if(!$con){
        die("Connection to this database failed due to" .mysqli_connect_error());
    }
    // echo "Success connecting to the Database.";

    // Collect Post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name' , '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());" ;
    // echo $sql;

   // Execute the query 
if($con->query($sql)== true){
    // echo "Successfully Inserted";

    // Flag for successful insertion
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

// CLose the database connection
$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&family=Roboto:wght@300;400&display=swap" rel="stylesheet">

</head>
<body>
    <img class="bg" src="bg.jpg" alt="IIT Kharagpur">
    <div class="container">
        <h1>Welcome to IIT Kharapur US Trip Form</h1>
        <p> Enter your details to confirm your participation in the trip.</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'> Thanks for Submmitting your Form. We are happy to see you joining us for the US Trip.</p>
        ";
        }

        ?>
         
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone No.">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
           
        </form>
    </div>
    <script src="index.js"></script>

     

</body>
</html>