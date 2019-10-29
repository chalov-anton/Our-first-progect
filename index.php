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
        
        <h4 class="center grey-text">Pizzas</h4>
        
        <div>
            <div class="row">
                <?php foreach($pizzas as $pizza) ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                            <div><?php echo htmlspecialchars($pizza['ingredients']);?></div>
                        </div>
                        <div class="card-action right-align">
                            <a class="brand-text" href="#">more info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <?php include('templates/footer.php')?>
               
    </html>



