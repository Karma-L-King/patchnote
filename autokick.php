<? 
session_start();
include "db.conn.php";
error_reporting(0);
if ( $userid != $_SESSION['id'] ) {


    header('Location: index.php');
};



?>