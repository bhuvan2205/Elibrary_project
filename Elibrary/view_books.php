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
<h3 id='heading'> View Book Details</h3>
<?php 
               $sql="SELECT * from book";
               $res=$db->query($sql);
               if($res->num_rows>0){
         echo "<table> 
         <tr>
         <th>S_No</th>
         <th>Book Name</th>
         <th>Keywords</th>
         <th>View</th>
         </tr>";
         $i=1;
         while($row=$res->fetch_assoc()){
echo " <tr>";
echo "<td> {$i}</td>";
echo "<td> {$row['BTITLE']}</td>";
echo "<td> {$row['KEYWORDS']}</td>";
echo "<td><a href=' {$row['FILE']}' target='_blank'>View </a></td>";
echo " </tr>";
$i++;
         }
         echo "</table>";
               }
               else{
                   echo "<p class='error'> No Books Found</p>";
               }
?>
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
