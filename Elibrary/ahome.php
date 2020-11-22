<?php 
include 'database.php';
session_start();
function countRecord($sql,$db){
    $res=$db->query($sql);
    return $res->num_rows;
}
if(!isset($_SESSION['AID']))
{
    header('location:alogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E_Library</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="container">
        <div id="header">
        <h1>E-Library Management System</h1>
        </div>
        <div id="wrapper">
<h3 id='heading'> Welcome You Admin</h3>
<div id="center">
<ul class='record'>
<li>Total Students:<?php echo countRecord("SELECT * from student",$db); ?> </li>
<li>Total Books:<?php echo countRecord("SELECT * from book",$db); ?></li>
<li>Total Request:<?php echo countRecord("SELECT * from request",$db); ?></li>
<li>Total Comments:<?php echo countRecord("SELECT * from comment",$db); ?></li>
</ul>       
        </div>
          </div>
        <div id="navi">
            <?php include 'adminsidebar.php' ?>
        </div>
        <div id='footer'>
        <p>Copyright &copy; Bhuvan 2020</p>
        </div>
    </div>
</body>
</html>
