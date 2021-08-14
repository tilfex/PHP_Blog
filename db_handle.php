<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "myDB";

    $conn = @new mysqli ($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $title = $_POST["title"];
    $content = $_POST["content"];

    $sql = "INSERT INTO MyBlog (title, content) VALUES ('$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "New article created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    $conn->close();
?>
<br>
<a href="index.php">BACK</a>