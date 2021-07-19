<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/main.js" defer></script>
  <title>Курс валют</title>
</head>
<body>
<?php
require('connect.php');

if (isset($_POST['username']) && isset($_POST['password'])){
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);

  $query = "INSERT INTO users(username, password, email) VALUES('{$username}', '{$email}', '{$password}')";
  $result = mysqli_query($connection, $query);

  

  if($result){
    $smsg = "Регистрация прошла успешно";
  } else{
    $fsmsg = "Ошибка";
  }
}
?>


<div class="container">
    <form action="" method="POST" class="form">
    <!-- /.form -->
    <h2>Registration</h2>
    <?php if(isset($smsg)){ ?><div class="alert alert__success" role="alert"> <?php echo $smsg; ?></div><?php }?>
    <?php if(isset($fsmsg)){ ?><div class="alert alert__danger" role="alert"> <?php echo $fsmsg; ?></div><?php }?>
    <input type="text" name="username" class="form__control" placeholder="Username" required>
    <input type="email" name="email" class="form__control" placeholder="Email" required>
    <input type="password" name="password" class="form__control" placeholder="Password" required>
    <button class="button" type="submit">Register</button>
    <a href="login.php">Login</a>
    
    </form>
  </div>
  <!-- /.container -->
  
  <!-- <p>USD: <span id="usd"></span> руб</p>
  <p>EUR: <span id="eur"></span> руб</p> -->
</body>
</html>