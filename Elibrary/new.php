<?php 
include 'database.php';
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
<h3 id='heading'>User Registration</h3>
<?php 
  if(isset($_POST['submit']))
  {
  $sql="INSERT INTO student( NAME, PASS, MAIL,DEP) VALUES ('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["email"]}','{$_POST["dep"]}')";
  $db->query($sql);
  echo "<p class='success'>Registration Successfully Done</p>";
    }
?>
 <div id="center">
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
     <label >User Name</label>
     <input type="text" name='name' required>
     <label >Password</label>
     <input type="password" name='pass' required>
     <label >Email</label>
     <input type="email" name='email' required>
    <select name="dep" required>
    <option value="">Select</option>
        <option value="cse">Cse</option>
        <option value="mech">Mech</option>
        <option value="eee">Eee</option>
        <option value="ece">Ece</option>
    </select>
     <button type='submit' name='submit'>Register Now </button>
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
