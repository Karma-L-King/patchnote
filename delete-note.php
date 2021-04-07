<?php

include "db.conn.php";
session_start();
$uid = ($_GET['note_id']);

$sql = "DELETE FROM note WHERE note_id = :ph_id";
$stmt = $db_conn->prepare($sql); //stuur naar mysql.
$stmt->bindParam(":ph_id", $uid);
header("location:dashboard.php");
$stmt->execute();
?>
<?
/// nep comment want vs code doet raar
?>