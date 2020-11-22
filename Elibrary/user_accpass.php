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
<h3 id='heading'> Change Password</h3>
<?php 
  if(isset($_POST['submit'])){
      $sql="SELECT * from student WHERE PASS='{$_POST['opass']}' and ID='{$_SESSION['ID']}'";
      $res=$db->query($sql);
      if($res->num_rows>0){
         $s="update student set PASS='{$_POST['npass']}' where ID='{$_SESSION['ID']}' ";
         $db->query($s);
         echo "<p class='success'>Password Updated Successfully</p>";
      }
      else{
echo "<p class='error'> Invalid Password</p>";
      }
  }
?>
 <div id="center">
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
    
     <label >Old Password</label>
     <input type="password" name='opass' required>
    
     <label >New Password</label>
     <input type="password" name='npass' required>
     <button type='submit' name='submit'> Update </button>
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
