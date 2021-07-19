<?php
session_start();
?>

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


  <!-- /.container -->
<?php

require('connect.php');

if (isset($_POST['username']) and isset($_POST['password'])){
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $query = "SELECT * FROM users WHERE username='$username' and password='$password'";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  $count = mysqli_num_rows($result);

  if ($count == 1) {
    $_SESSION['username'] = $username;
   }  else {
     $fsmsg = "Ошибка";
   }
  } 
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  echo "Hello "  . $username . "<br>";
  echo "Курсы валют сегодня <p>USD: <span id='usd'></span> руб</p>
                            <p>EUR: <span id='eur'></span> руб</p><br>";
  echo "<a href='logout.php'> Logout </a>";

}

else {
?>

<div class="container">
    <form action="" method="POST" class="form">
    <!-- /.form -->
    <h2>Login</h2>
    
    <input type="text" name="username" class="form__control" placeholder="Username" required>
    
    <input type="password" name="password" class="form__control" placeholder="Password" required>
    <button class="button" type="submit">Login</button>
    <a href="index.php">Registration</a>
    
    </form>
  </div>

<?php
}

?>
  
</body>
</html>