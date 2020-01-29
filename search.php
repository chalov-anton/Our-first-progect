<?php

include('templates/header.php');
include ('config/db_connect');

$search = mysqli_real_escape_string($conn, $_POST['search']);
$sql = "SELECT * FROM  users WHERE email LIKE '%$search%' OR name LIKE '%$search%' OR title LIKE '%$search%' OR city LIKE '%$search%' OR interests LIKE '%$search%' OR created_at LIKE '%$search%'";
$result = mysqli_query($conn, $sql);
$queryResult = mysqli_num_rows($result);

if (isset($_POST['submit-search'])){
    
?> 

<!DOCTYPE html>   
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div>
        <?php
            if ($queryResult > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<div class='card-container card-details'>
                            <p>".$row['name']."</p>
                            <p>".$row['email']."</p>
                            <p>".$row['title']."</p>
                            <p>".$row['city']."</p>
                            <p>".$row['interests']."</p>
                            <p>".$row['created_at']."</p>
                        </div>";  
                }
                }else {
                    echo "There are no results found";
                }
               }?>
        </div>
    
 <?php include 'templates/footer.php';?>
    
   </body>
</html>