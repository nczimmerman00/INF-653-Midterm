<?php 
$dsn = 'mysql:host=acw2033ndw0at1t7.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=a83ggl9p6k1088o0';
$username = 'orccuw7hr3h0lbua';
$password = 'mior2tc64286j19j';
//$dsn = "mysql:host=localhost; port=3307; dbname=zippyusedautos";
//$username = 'root';

try{
    //$db = new PDO($dsn, $username);
    $db = new PDO($dsn, $username, $password);
}catch (PDOException $e){
    $error = 'Database Error: ';
    $error .= $e->getMessage();
    include('../view/error.php');
exit();
}

?>
