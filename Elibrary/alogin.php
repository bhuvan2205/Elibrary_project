<?php 
include 'database.php';
ob_start();
session_start()
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
<h3 id='heading'>Admin Login Here</h3>
<div id="center">
<?php 
if(isset($_POST['submit'])){
    $sql="SELECT * FROM admin where ANAME='{$_POST["aname"]}'AND APASS='{$_POST["apass"]}' ";
    $res=$db->query($sql);
    if($res->num_rows>0)
    {
        $row=$res->fetch_assoc();
        $_SESSION['AID']=$row['AID'];
        $_SESSION['ANAME']=$row['ANAME'];
        header("location:ahome.php");
    }
 else{
     echo "<p class='error'> Invalid user Details</p>";
 }
}
?>
        <form action="alogin.php" method="POST">
         <label for="aname">Username</label>
         <input type="text" name='aname'  required>
         <label for='apass'>Password</label>
         <input type="password" name='apass' required>
         <button type='submit' name='submit'>Login </button>
        </form>
        </div>
          </div>
        <div id="navi">
            <?php include 'sidebar.php'?>
        </div>
        <div id='footer'>
        <p>Copyright &copy; Bhuvan 2020</p>
        </div>
    </div>
</body>
</html>
