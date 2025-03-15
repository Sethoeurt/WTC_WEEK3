<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    
    // Get input values
    $name = trim($_POST["name"] ?? ""); 
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? ""; 
    $confirm_password = $_POST["confirm_password"] ?? ""; 
    
    // Validate name
    if (empty($name)) {
        $errors["name"] = "Name cannot be empty.";
    }
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email address.";
    }
    
    // Validate passwords
    if (empty($password)) {
        $errors["password"] = "Password cannot be empty.";
    } elseif ($password !== $confirm_password) {
        $errors["password"] = "Passwords do not match.";
    }

    if (empty($errors)) {
        echo "<h2>Registration Successful!</h2>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
    
    } else {
        foreach ($errors as $field => $error) {
            echo "<p style='color:red;'><strong>$field Error:</strong> $error</p>";
        }
    }
}
?>
