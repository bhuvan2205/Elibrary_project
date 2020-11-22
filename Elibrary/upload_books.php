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
<h3 id='heading'> Upload New Books</h3>
<?php 
  if(isset($_POST['submit']))
  {
    $target_dir='upload/';
    $target_file=$target_dir.basename($_FILES["efile"]["name"]);
    if(move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file))
{

  $sql="INSERT INTO book(BTITLE,KEYWORDS,FILE) values ('{$_POST["bname"]}','{$_POST["keys"]}','{target_file}')";
  $db->query($sql);
  echo "<p class='success'>Book Upload Successfully</p>";
    }
    else{
        echo "<p class='error'>Error in Upload</p>";
    }
  }
?>
 <div id="center">
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST' enctype='multipart/form-data'>
    
     <label >Book Title</label>
     <input type="text" name='bname' required>
    
     <label >Keywords</label>
     <textarea name="keys" required></textarea>
     <label >Upload File</label>
     <input type="file" name="efile" id='efile' required>
     <button type='submit' name='submit'> Upload Book </button>
    </form>
 </div>
   </div>
        <div id="navi">
            <?php include 'adminsidebar.php'?>
        </div>
        <div id='footer'>
        <p>Copyright &copy; Bhuvan 2020</p>
        </div>
    </div>
</body>
</html>
