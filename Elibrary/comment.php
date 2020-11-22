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
<h3 id='heading'>Comment Your Thoughts</h3>
     <?php
       if(isset($_POST['submit']))
       {
    $sql="INSERT INTO comment(BID, SID, COM, LOGS)
        VALUES({$_GET['id']},{$_SESSION['ID']},'{$_POST["mes"]}',now())";
       $db->query($sql);
         }
         $sql="SELECT * from book WHERE BID=".$_GET['id'] ;
         $res=$db->query($sql);
         if($res->num_rows>0){
echo "<table>";
$row=$res->fetch_assoc();
echo"
<tr>
       <th> Book Name</th>
       <td>{$row["BTITLE"]}</td>
</tr>
<tr>
<th> Keywords</th>
<td>{$row["KEYWORDS"]}</td>
</tr>
";
echo "</table>";
         }
         else{
            echo "<p class='error'> No Books Found..</p>";
                  }
  ?> <br>
  <div id="center">
     <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post">
         <label >Your Comments</label>
         <textarea name="mes" required></textarea>
         <button type='submit' name='submit'>Post it</button>
     </form>
 </div>
 <?php 
     $sql="SELECT student.NAME,comment.COM,comment.LOGS 
    from comment INNER JOIN student on 
    comment.SID = student.ID WHERE comment.BID={$_GET["id"]} ORDER BY comment.CID DESC";
$res=$db->query($sql);
if($res->num_rows>0){
while($row=$res->fetch_assoc())
{
    echo "<p>
    <strong>
    {$row['NAME']}
    </strong>
    {$row['COM']}
    <i>{$row['LOGS']}</i>
    </P>";
}
}
else{
    echo "<p class='error'>No Comment Yet..</p>";
}    
 ?>
</div>
        <div id="navi">
            <?php include 'usersidebar.php' ?>
        </div>
        <div id='footer'>
        <p>Copyright &copy; Bhuvan 2020</p>
        </div>
    </div>
</body>
</html>
