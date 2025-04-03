<?php

// $dbhost = "localhost:3306";
// $dbuser = "root";
// $dbpass = "";
// $dbname = "kobili";

$db = array(
	"host" => "localhost:3306",
	"user" => "root",
	"pass" => "",
	"name" => "kobili"
);

$connect = mysqli_connect($db["host"], $db["user"], $db["pass"], $db["name"]);

if (!$connect) {
  die("connection to db failed");
  exit();
} else {
  // connection is successfull
}
