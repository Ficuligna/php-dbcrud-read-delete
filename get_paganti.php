<?php

header("Content-Type: application/json");

$server = "localhost";
$password = "root";
$username = "root";
$dbname = "hoteldb";

$conn = new mysqli($server,$password,$username,$dbname);

if ($conn -> connect_errno) {
  echo json_encode(connect_errno);
}

$sql = "
SELECT id,name,lastname,address
FROM paganti
";

$results = $conn -> query($sql);

if ($results -> num_rows < 1) {
  echo json_encode("cambiare parametri ricerca");
}else {
  $lista_paganti = [];
  while ($row = $results -> fetch_assoc()) {
    $lista_paganti[] = $row;
  }
}

$conn -> close();

echo json_encode($lista_paganti);
