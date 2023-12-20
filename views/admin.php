<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
  <?php
  if(isset($_SESSION["role"])){
    echo "<h2>Welcome to Admin </h2>";
  }else{
    echo "<h2>Welcome not Admin </h2>";
  }
  ?>
  <?php
            // session_start();
      if(isset($_SESSION["user_id"])){
        
          echo "<a href='index.php?page=logout'>logout</a> <br/>";
      }else{
        echo "<a href='index.php?page=login'>Login</a> <br/>";
        echo "<a href='index.php?page=register'>Register</a>";
      }
    ?>

    
    

  
    
</body>
</html>
