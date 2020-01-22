<?php

include ('config/db_connect');

$title = $email = $city = $interests = '';
$errors = array('email' => '', 'title' => '', 'city' => '', 'interests' => '');

if (isset($_POST['submit'])) {

    if (empty($_POST['email'])) {
        $errors['email'] = 'An email is required <br />';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid email adress';
        }
    }

    if (empty($_POST['title'])) {
        $errors['title'] = 'Job title is required <br />';
    } else {
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = 'Job title must be letters and spaces only';
        }
    }
    
    if (empty($_POST['city'])) {
        $errors['city'] = 'City is required <br />';
    } else {
        $city = $_POST['city'];
        if (!preg_match('/^[a-zA-Z\s-]+$/', $city)) { 
            $errors['city'] = 'City must be letters spaces and/or dashes only';
        }
    }
    
    if (empty($_POST['interests'])) {
        $errors['interests'] = 'Interests are required <br />';
    } else {
        $interests = $_POST['interests'];
        if (!preg_match('/^([a-zA-Z0-9\s]+)(,\s*[a-zA-Z0-9\s]*)*$/', $interests)) {
            $errors['interests'] = 'Interests must be a comma separated list';
        }
    }

    if (array_filter($errors)) {

    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $interests = mysqli_real_escape_string($conn, $_POST['interests']);

        $sql = "INSERT INTO users(title,email,city,interests) VALUES('$title', '$email', '$city', '$interests') ";

        if(mysqli_query($conn, $sql)){
            header('Location: index.php');
        } else {
            echo 'query error: ' .mysqli_error($conn);
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="for-add">
<div class="wrap"> 
    <nav class="main-nav">
    <ul class="nav-list">
      <li><a href="index.php">Home Page</a></li>
      <li><a href="/add.php" class="current">Add</a></li>
    </ul>
  </nav>

<main>
   

    <form class="add-form" action="add.php" method="POST" enctype="multipart/form-data">
         <h1 class="reg-title">Registration Form</h1>
<fieldset>
        <label for="Name">Name</label>
        <input type="text" name="name" id="name" placeholder="Your name">
        <div class="error"></div>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Your email address" value="<?php echo $email ?>">
        <div class="error"><?php echo $errors['email']; ?></div>
        <label for="title">Job title</label>
        <input type="text" name="title" id="title" placeholder="Your job title" value="<?php echo $title ?>">
        <div class="error"><?php echo $errors['title']; ?></div>

        <label for="city">City</label>
        <input type="text" name="city" id="city" placeholder="Your city">
        <div class="error"><?php echo $errors['city']; ?></div>

        <label for="interests">Interests</label>
        <input type="text" name="interests" id="interests" placeholder="What are you interested in?" value="<?php echo $interests ?>">
        <div class="error"><?php echo $errors['interests']; ?></div>
        
        <!-- !!!!!!!!!!!! Alexandra, don't worry about this input, it's in progresses*/ =-->
        <input type="image" name="image" id="image">
        
        
</fieldset>
        <div class="btn-container">
            <input type="submit" class="button" name="submit" value="Send">
        </div>
    </form>
</main>
<?php include('templates/footer.php') ?>
</div>
</body>
</html>
