<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>User Listings</title>
    <style>
      @media (max-width: 768px) {
        .mybuttonwrap {
          text-align: center;
        }
        .mybutton {
          padding: 1em;
          width: 100%;
        }
      }
    </style>
</head>
<body>
    <h1 class="display-1">User Listings</h1>
    <div class="container">
    <h2>Newly Added</h2>

<!-- 
    NOTE: this is our backend (server side) code. 
    1. User cannot see this code -- unlike HTML/CSS/JavaScript
    2. This is how we will do database opperations (DB is also on server)
-->    

<?php
// DYNAMIC HTML
$firstname = $_GET['apiFirst'];
$lastname = $_GET['apiLast'];
$country = $_GET['apiCountry'];
echo "<p><strong>$firstname</strong> has been added.</p>";


// DATABASE OPERATIONS:
// https://www.w3schools.com/php/php_mysql_insert.asp
$servername = "localhost";
$username = "user33";
$password = "33ross";
$dbname = "db33";

// Create connection (assuming these exist -- we set up the DB on the CLI)
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL OPPERATIONS
$sql = "INSERT INTO randuser2 (firstname, lastname, country) VALUES ('$firstname', '$lastname', '$country')";

echo "<div class ='col-md'>";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "</div>"; //close col-md
echo "</div>"; //close row
echo "</div>"; //close container
echo "<div class='container'>";

// Display full names and countries from the database
$sql = "SELECT * FROM randuser2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "<table class='table table-hover'>";
echo "<thead>";
echo "  <tr>";
echo "    <th>First Name</th>";
echo "    <th>Last Name</th>";
echo "    <th>Country</th>";
echo "  </tr>";
echo "</thead>";
echo "<tbody>";

  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "  <tr>";
    echo "    <td>" . $row['firstname'] . "<td>";
    echo "" . $row['lastname'] . "<td>";
    echo "" . $row['country'] . "<td>";
    echo "  </tr>";
  }
  
echo "</tbody>";
echo "</ttable>";

} else {
  echo "0 results";
}

$conn->close();
?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

<br><br>
<div class = "mybuttonwrap">
<button class = "btn btn-primary btn-lg mybutton" onclick="history.back()">&lt;&lt;Back</button>
</div>
<br>

<?php 
  include "footer.php";
?> 

</html>