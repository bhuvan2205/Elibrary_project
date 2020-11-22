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
<h3 id='heading'>Search Books</h3>
 <div id="center">
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
       <label >Enter Book Name</label>
     <input type='text' name="name" required>
     <button type='submit' name='submit'> Search </button>
    </form>
 </div>
 <?php 
  if(isset($_POST['submit'])){
               $sql="SELECT * from book where BTITLE like '%{$_POST['name']}%' or KEYWORDS like '%{$_POST['name']}%' ";
               $res=$db->query($sql);
               if($res->num_rows>0)
               {
                   echo "<br>";
         echo "<table> 
         <tr>
         <th>S_No</th>
         <th>Book Name</th>
         <th>Keywords</th>
         <th>View</th>
         <th>Comment</th>
         </tr>";
         $i=1;
         while($row=$res->fetch_assoc()){
echo " <tr>";
echo "<td> {$i}</td>";
echo "<td> {$row['BTITLE']}</td>";
echo "<td> {$row['KEYWORDS']}</td>";
echo "<td><a href=' {$row['FILE']}' target='_blank'>View </a></td>";
echo "<td> <a href='comment.php?id={$row["BID"]}'>  Go  </a></td>";
echo " </tr>";
$i++;
         }
         echo "</table>";
               }
               else{
                   echo "<p class='error'> No Books Found</p>";
               }}
?>
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
