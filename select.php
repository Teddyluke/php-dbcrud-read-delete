<?php

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "booleanhotel";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn && $conn->connect_error) {
    echo "connection failed :" . $conn->connect_error;
    return;
  }

  $sql = "

    SELECT pagamenti.id, pagamenti.status, pagamenti.price
    FROM pagamenti
    WHERE price > 600

  ";
  $result = $conn->query($sql);
  if ($result && $result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
      echo "<li>" . $row['id'] . "  " . $row['status'] . "  " . $row['price'] . "</li>" . '<br>';
    }
    echo "</ul>";
  } elseif ($result) {
    echo "0 results";
  } else {
    echo "query error";
  }
  $conn->close();
 ?>
