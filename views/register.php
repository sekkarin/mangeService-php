<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <form method="post" action="index.php?page=register">
        <label for="FirstName">FirstName:</label>
        <input type="text" name="FirstName" required>
        <br>
        <label for="LastName">LastName:</label>
        <input type="text" name="LastName" required>

        <label for="Password">Password:</label>
        <input type="Password" name="Password" required>

        <label for="Email">Email:</label>
        <input type="Email" name="Email" required>

        <label for="PhoneNumber">PhoneNumber:</label>
        <input type="phone" name="PhoneNumber" required>
        <br>
        <input type="submit" value="Register">
    </form>

    <!-- Registration form goes here -->

    <p>Already have an account? <a href="index.php?page=login">Login here</a></p>
</body>
</html>
