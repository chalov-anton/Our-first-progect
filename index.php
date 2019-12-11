<?php

include ('config/db_connect');

$sql = 'SELECT title, interests, id FROM users ORDER BY created_at';
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);


mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   <div class="wrap">  
<?php include('templates/header.php'); ?>

<main>

    <?php foreach ($users as $user): ?>

        <div class="wrapper">
            <h1>Profile info</h1>
            <div class="user-card">
                <img src="images/zebra.svg" style="width:70px; height:70px;">
                <div class="col col-1">
                <p>Name:</p>
                <p>Interests:</p>
            </div>
            <div class="col col-2">
               <p><?php echo htmlspecialchars($user['title']); ?></p>
               <p><?php echo htmlspecialchars($user['interests']); ?></p>
            </div>
            <a class="details" href="details.php?id=<?php echo $user['id'] ?>">Details</a>
        </div>
        

<?php endforeach; ?>

</main>

<?php include('templates/footer.php'); ?>
</body>
</div>
</html>



