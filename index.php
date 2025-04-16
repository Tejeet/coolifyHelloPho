<?php
include("config.php");


// Generate a random number (can be adjusted to your needs)
$randomUser = rand(1000, 9999);

// Insert into users table
$sql = "INSERT INTO users (user, createdon) VALUES ('$randomUser', '$randomUser')";

if ($con->query($sql) === TRUE) {
    echo "Random user $randomUser added successfully.<br>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

echo "I am Demo PHP Page";

?>