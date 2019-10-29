<?php

$title = $email = $ingredients = '';
$errors = array('email' => '', 'title' => '', 'ingredients' => '');

if(isset($_POST['submit'])){
    
    if(empty($_POST['email'])){
        $errors['email'] = 'An email is required <br />';
    } else{
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email must be a valid email adress';
        }
    }
    
    if(empty($_POST['title'])){
        $errors['title'] = 'A Title is required <br />';
    } else{
        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
            $errors['title'] = 'Title must be letters and spaces only';
        }
    }
    
    if(empty($_POST['ingredients'])){
        $errors['ingredients'] = 'Ingredients are required <br />';
    } else{
        $ingredients = $_POST['ingredients'];
        if(!preg_match('/^([a-zA-Z0-9\s]+)(,\s*[a-zA-Z0-9\s]*)*$/', $ingredients)){
            $errors['ingredients'] = 'Ingredients mus be a comma separated list';
        }
    }

if(array_filter($errors)) {
    
}else {
    header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
    <html>
    
        <?php include('templates/header.php')?>
        
        <section>
            <h4>Add</h4>
            <form action="add.php" method="POST">
                <label>Your Email:</label>
                <input type="text" name="email" value="<?php echo $email ?>">
                    <div><?php echo $errors['email'];?></div>
                <label>Pizza Title:</label>
                <input type="text" name="title" value="<?php echo $title ?>">
                    <div><?php echo $errors['title'];?></div>                
                <label>Ingredients (comma separated):</label>
                <input type="text" name="ingredients" value="<?php echo $ingredients ?>">
                    <div><?php echo $errors['ingredients'];?></div>              
                <div>
                    <input type="submit" name="submit" value="submit">
                </div>    
            </form>    
        </section>
        <?php include('templates/footer.php')?>
               
    </html>
