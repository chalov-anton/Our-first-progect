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

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
     <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <head>
        <body>
            <div class="wrap"> 
        <?php include('templates/header.php'); ?>
<main>
        <div>
            <?php if ($user): ?>
                <h4><?php echo htmlspecialchars($user['title']); ?></h4>
                <p>Created by: <?php echo htmlspecialchars($user['email']); ?></p>
                <p><?php echo date($user['created_at']); ?></p>
                <h5>Interests:</h5>
                <p><?php echo htmlspecialchars($user['interests']); ?></p>
                <button onclick="history.go(-1);">Back</button>
                <!--This form is needed for deleting Cards, don't worry about in because in it hidden -->
                <form action="details.php" method="POST">
                    <input type="hidden" name="id_to_delete" value="<?php echo $user['id']; ?>">
                    <input type="submit" name="delete" value="Delete" onclick="return  confirm('Are you sure you want to Delete this record?')">
                </form>
            <?php else: ?>
                <!--this is an error if somehow you'll direct to non existing User card-->
                <h5>There is no user under such ID</h5>
            <?php endif; ?>


        </div>
</main>
        <?php include('templates/footer.php'); ?>
    
</div>
</body>
</html>
