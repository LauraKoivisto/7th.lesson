<?php

//getting our configuration
require_once("../config.php");

//create connection

$mysql = new mysqli ("localhost", $db_username,
$db_password, "webpr2016_laukoi");

//SQL senctence
$stmt = $mysql->prepare("SELECT Id, recipient, message, created
FROM messages_sample ORDER BY created LIMIT 10");

//if error in sentendce
echo $mysql->error;

$stmt->bind_result($Id, $recipient, $message, $created);

$stmt->execute();

$table_html = "";

//add smth to string .=
$table_html .= "<table>";
  $table_html .= "<tr>";
  $table_html .= "<th>Id</th>";
  $table_html .= "<th>message</th>";
  $table_html .= "<th>recipient</th>";
  $table_html .= "<th>created</th>";
$table_html .= "</tr>";

//GET RESULT
//we have multiple rows
while($stmt->fetch()) {

//DO SOMETHING FOR EACH ROW
//echo $Id." ".$message."<br>";

$table_html .= "<tr>"; //start new row
  $table_html .= "<td>".$Id."</td>";
  $table_html .= "<td>".$recipient."</td>";
    $table_html .= "<td>".$message."</td>";
      $table_html .= "<td>".$created."</td>";
  $table_html .= "</tr>";



	}

  $table_html .= "</table>";
  echo $table_html;
?>

<a href= "app.php">app</a>
