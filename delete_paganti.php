<?php


$server = "localhost";
$password = "root";
$username = "root";
$dbname = "hoteldb";

$id = $_POST["id"];

if ($id) {
  $conn = new mysqli($server,$password,$username,$dbname);

  if ($conn -> connect_errno) {
    echo json_encode(connect_errno);
  }

  $sql = "
  DELETE FROM paganti
  WHERE id =" . $id;

  $conn -> query($sql);
  $conn -> close();
}
