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

<div class="card-container">
    
    <img class="round" src="https://randomuser.me/api/portraits/women/79.jpg" alt="user" />
    <h3>Ricky Park</h3>
    <h6>New York</h6>
    <p><?php echo htmlspecialchars($user['title']); ?></p>
    <p><?php echo htmlspecialchars($user['interests']); ?></p>
    <div class="buttons">
             <a class="primary" href="details.php?id=<?php echo $user['id'] ?>">Details</a>
             </div>
    <div class="skills">
        <h6>Skills</h6>
        <ul>
            <li>UI / UX</li>
            <li>Front End Development</li>
            <li>HTML</li>
            <li>CSS</li>
            <li>JavaScript</li>
            <li>React</li>
            <li>Node</li>
        </ul>
    </div>
</div>

<?php endforeach; ?>

</main>

<?php include('templates/footer.php'); ?>

   </div>
</body>
</html>



