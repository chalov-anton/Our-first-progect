<?php

include ('config/db_connect');

$sql = 'SELECT title, interests, id FROM userstable ORDER BY created_at';
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);


mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <link href="styles.css" type="text/css" rel="stylesheet">
</head>


<?php include('templates/header.php') ?>
<main>
  <h4>Users</h4>
  <p>djfsjfljsdlfjsdfsd</p>
  <p>djfsjfljsdlfjsdfsd</p>
  <p>djfsjfljsdlfjsdfsd</p>
  <p>djfsjfljsdlfjsdfsd</p>
  <p>djfsjfljsdlfjsdfsd</p>
  <p>djfsjfljsdlfjsdfsd</p>
  <p>djfsjfljsdlfjsdfsd</p>
</main>

<div>
    <div>
        <?php foreach ($users as $user) ?>
        <div>
            <div>
                <div>
                    <h6><?php echo htmlspecialchars($user['title']); ?></h6>
                    <div><?php echo htmlspecialchars($user['interests']); ?></div>
                </div>
                <div>
                    <a href="#">more info test</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('templates/footer.php') ?>

</html>



