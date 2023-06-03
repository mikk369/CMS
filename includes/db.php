<?php include "dbConnect.php";
$connection = mysqli_connect($serverName, $userName, $password, $database);
if($connection) {
//     echo "Connected to database";
// }else {
//     echo "Database Connection failed";
}
?>