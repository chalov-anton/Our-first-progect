<?php

include('config/db_connect');

if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    $sql = "DELETE FROM users WHERE id = $id_to_delete";
    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
}

$s='#';
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
    <div class="wrap"> 
        <nav class="main-nav">
            <ul class="nav-list">
                <li><a href="index.php" class="current">Home Page</a></li>
                <li><a href="../add.php">Add</a></li>
            </ul>
        </nav>

        <main>
            <div class="card-container card-details">
            
             <?php if ($user): ?>
             <!-- Please move the name field where you like and style it -->    
                <h4><?php echo htmlspecialchars($user['name']); ?></h4>
                <h4><?php echo htmlspecialchars($user['title']); ?></h4>
                <p>Created by: <?php echo htmlspecialchars($user['email']); ?></p>
                <p><?php echo htmlspecialchars($user['city']); ?></p>
                                
                <h5>Interests:</h5>
                <p><?php echo htmlspecialchars($user['interests']); ?></p>
                
                <p><?php echo date($user['created_at']); ?></p>
            
                <div class="buttons btn-details">
                <button class="primary btn-back" onclick="history.go(-1);">Back</button>
                <!--This form is needed for deleting Cards, don't worry about in because in it hidden -->
                
                <form action="details.php" method="POST">
                    <input  type="hidden" name="id_to_delete" value="<?php echo $user['id']; ?>">
                    <input type="submit" class="primary btn-del" name="delete" value="Delete" onclick="return  confirm('Are you sure you want to Delete this record?')">
                </form>
            </div>
            <?php else: ?>
                <!--this is an error if somehow you'll direct to non existing User card-->
                <h5>There is no user under such ID</h5>
            <?php endif; ?>
        </main>

        <footer>
            <div class="soc">
                <a target="_blank" href="https://www.instagram.com/chalov_anton/"><i class="fa fa-2x fa-instagram"></i></a>
                <a target="_blank" href="https://www.facebook.com/"><i class="fa fa-2x fa-facebook-square"></i></a>
                <a target="_blank" href="https://github.com/chalov-anton/Our-first-project"><i class="fa fa-2x fa-github"></i></a>
            </div>
            <div class="copyright-info">Copyright <?php echo date("Y"); ?></div>
        </footer>
    </div><!--End of wrap-->
</body>
</html>
