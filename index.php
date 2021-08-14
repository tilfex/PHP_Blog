<html>
<head>
  <title>Tilfex Blog</title>
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <h1>Blog of Tilfex</h1>
  <form action="db_handle.php" method="post">
    <label for="title">Title</label> <br>
    <input type="text" id="title" name="title"> <br>
    <label for="content">Content</label> <br>
    <textarea id="content" name="content" rows="10" cols="100">
    </textarea> <br>
    <input type="submit">
  </form>
  <?php 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "myDB";

    $conn = @new mysqli ($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT title, content, day_time FROM MyBlog ORDER BY id DESC";
    $display = $conn->query($sql);

    $conn->close();
  ?>
  <?php
      if ($display->num_rows > 0) {
        while($row = $display->fetch_assoc()) {
  ?>
          <div class="blogborder">
            <h3>
              <?php 
                echo $row["title"];
              ?>
            </h3>
            <p>
              <?php 
                echo $row["content"]; 
              ?>
            </p>
            <p class="time">
              <?php 
                echo $row["day_time"]; 
              ?>
            </p>
          </div>
  <?php
        }
      }
  ?>


</body>


</html>