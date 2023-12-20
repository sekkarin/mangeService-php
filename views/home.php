<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h2>Welcome to Your Application</h2>

    <p>This is the home page of your application.</p>

    <p>
        <a href="index.php?page=login">Login</a> |
        <a href="index.php?page=register">Register</a>
        <a href="index.php?page=register">Register</a>
        <?php
            // session_start();
            if(isset($_SESSION["user_id"])){
                echo "<a href='index.php?page=logout'>logout</a> <br/>";
            }
        ?>
    </>
    <?php
        if(isset($services)){
            print_r($services);
            echo "<br/>";
            foreach ($services as $service) {
                echo "$service[ServiceName] | ". "$service[ServiceProvider] "." | <a href='index.php?page=regservice&serviceID=$service[ServiceID]' >สมัคร</a> <br/>";
              }
        }
    ?>
    
</body>
</html>
