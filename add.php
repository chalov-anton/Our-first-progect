<?php

include ('config/db_connect');

$title = $email = $interests = '';
$errors = array('email' => '', 'title' => '', 'interests' => '');

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
        $errors['title'] = 'A Title is required <br />';
    } else {
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = 'Title must be letters and spaces only';
        }
    }

    if (empty($_POST['interests'])) {
        $errors['interests'] = 'Interests are required <br />';
    } else {
        $interests = $_POST['interests'];
        if (!preg_match('/^([a-zA-Z0-9\s]+)(,\s*[a-zA-Z0-9\s]*)*$/', $interests)) {
            $errors['interests'] = 'Interests mus be a comma separated list';
        }
    }

    if (array_filter($errors)) {

    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $interests = mysqli_real_escape_string($conn, $_POST['interests']);

        $sql = "INSERT INTO users(title,email,interests) VALUES('$title', '$email', '$interests') ";

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
<head>
<body class="for-add">
<div class="wrap"> 
    <nav class="main-nav">
    <ul class="nav-list">
      <li><a href="index.php">Home Page</a></li>
      <li><a href="/add.php" class="current">Add</a></li>
    </ul>
  </nav>

<main>
   

    <form class="add-form" action="add.php" method="POST">
         <h1 class="reg-title">Registration Form</h1>
<fieldset>
        <label for="Name">Name</label>
        <input type="text" name="name" id="name" placeholder="Your name">
        <div class="error"></div>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Your email address" value="<?php echo $email ?>">
        <div class="error"><?php echo $errors['email']; ?></div>

        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="Your title" value="<?php echo $title ?>">
        <div class="error"><?php echo $errors['title']; ?></div>

        <label for="city">City</label>
        <input type="text" name="city" id="city" placeholder="Yout city">
        <div class="error"></div>

        <label for="interests">Interests</label>
        <input type="text" name="interests" id="interests" placeholder="What are you interested in?" value="<?php echo $interests ?>">
        <div class="error"><?php echo $errors['interests']; ?></div>
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
