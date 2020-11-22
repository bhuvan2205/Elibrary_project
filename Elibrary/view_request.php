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
<h3 id='heading'> View Request Details</h3>
<?php 
               $sql="SELECT student.NAME,request.MES,request.LOGS from student INNER JOIN request on student.ID=request.ID ";
               $res=$db->query($sql);
               if($res->num_rows>0){
         echo "<table> 
         <tr>
         <th>S_No</th>
         <th>Name</th>
         <th>Messages</th>
         <th>Logs</th>
         </tr>";

         $i=1;
         while($row=$res->fetch_assoc()){
echo " <tr>";
echo "<td> {$i}</td>";
echo "<td> {$row['NAME']}</td>";
echo "<td> {$row['MES']}</td>";
echo "<td> {$row['LOGS']}</td>";
echo " </tr>";
$i++;
         }
         echo "</table>";
               }
               else{
                   echo "<p class='error'> No Request Found</p>";
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
