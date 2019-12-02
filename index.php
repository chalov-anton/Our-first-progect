<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'usersdb');

if(!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}

$sql = 'SELECT title, interests, id FROM userstable';
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
    <html>
    
        <?php include('templates/header.php')?>
        
        <h4>Users</h4>
        
        <div>
            <div>
                <?php foreach($users as $user) ?>
                <div>
                    <div>
                        <div>
                            <h6><?php echo htmlspecialchars($user['title']); ?></h6>
                            <div><?php echo htmlspecialchars($user['interests']);?></div>
                        </div>
                        <div>
                            <a href="#">more info test</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <?php include('templates/footer.php')?>
               
    </html>



