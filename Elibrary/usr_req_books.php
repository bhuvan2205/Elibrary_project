<?php 
include 'database.php';
session_start();
function countRecord($sql,$db){
    $res=$db->query($sql);
    return $res->num_rows;
}
if(!isset($_SESSION['ID']))
{
    header('location:ulogin.php');
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
<h3 id='heading'> Request Books</h3>
<div id="center">
<?php 
  if(isset($_POST['submit'])){
      $sql="INSERT into request (ID,MES,LOGS) values({$_SESSION['ID']},'{$_POST['mess']}',now())";
      $res=$db->query($sql);
         echo "<p class='success'>Request Sent Successfully</p>";
  }
?>
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
  
     <label >Message</label>
     <textarea name="mess" required></textarea>
     <button type='submit' name='submit'> Send </button>
    </form>
 </div>

          </div>
        <div id="navi">
            <?php include 'usersidebar.php'?>
        </div>
        <div id='footer'>
        <p>Copyright &copy; Bhuvan 2020</p>
        </div>
    </div>
</body>
</html>
