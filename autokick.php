<? 
session_start();
include "db.conn.php";
error_reporting(0);
if ($_SESSION['id'] != $userid) {


    header('Location: index.php');
};



?>