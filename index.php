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
</head>


<?php include('templates/header.php'); ?>

<main>

    <?php foreach ($users as $user): ?>

        <div class="wrapper">
            <h1>Profile info</h1>
            <div class="user-card">
                <div class="col col-1">
                <p>Name:</p>
                <p>Interests:</p>
            </div>
            <div class="col col-2">
               <p><?php echo htmlspecialchars($user['title']); ?></p>
               <p><?php echo htmlspecialchars($user['interests']); ?></p>
            </div>
        </div>
        <a class="details" href="details.php?id=<?php echo $user['id'] ?>">Details</a>

<?php endforeach; ?>

</main>

<?php include('templates/footer.php'); ?>

</html>



