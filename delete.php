<?php

  // db communication
  $servername = "localhost";
  $user = "root";
  $password = "root";
  $db_name = "booleanhotel";

  // db check db situation
  $connection = new mysqli ($servername, $user, $password, $db_name);

  if ( $connection && $connection->connect_error ) {
    echo "error?" . $connection->connect_error;
    // fondamentale per bloccare l'esecuzione del resto dello script il return
    return;
  } else {
    echo "ok";
  }
  // write query sql
  $sql = "
    DELETE
    FROM pagamenti
    WHERE pagante_id = 6
    AND status LIKE 'rejected'
  " ;

  // -while on result
  $result = $connection->query($sql);

  if( $result === TRUE ) {
    echo 'deleted.';
    print_r($result); // num of row affected
  } else {
    echo 'Error with deletion';
    print_r($result); // 0
  }  // close

  $connection->close();



 ?>
