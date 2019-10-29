<?php

$conn = mysqli_connect('localhost', 'shaun', 'test1234', 'ninjas_pizza');

if(!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}

$sql = 'SELECT title, ingredients, id FROM pizzas';
$result = mysqli_query($conn, $sql);
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
    <html>
    
        <?php include('templates/header.php')?>
        
        <h4>Pizzas</h4>
        
        <div>
            <div>
                <?php foreach($pizzas as $pizza) ?>
                <div>
                    <div>
                        <div>
                            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                            <div><?php echo htmlspecialchars($pizza['ingredients']);?></div>
                        </div>
                        <div>
                            <a href="#">more info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <?php include('templates/footer.php')?>
               
    </html>



