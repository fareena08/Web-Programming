<?php
 
include "db.php";
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    $stmt = $conn->prepare("SELECT * FROM myguestbook2");
    $stmt->execute();
 
    $result = $stmt->fetchAll();
 
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
 
$conn = null;
?>
<!DOCTYPE html>
<html>
<head>
  <title>My Guestbook</title>
</head>
<body>
 
<ol>
<?php
foreach($result as $row) {

  echo "<li>";
  echo "Name : ".$row["user"]."<br>";
  echo "Email : ".$row["email"]."<br>";
  echo "How did you find me : ".$row["howfindme"]."<br>";
  echo "I like your: "."<br>";
  if ($row['frontpage'] == "Front page") 
    echo "-Front page"." <br>" ;
  
  if ($row['form'] == "Form") 
    echo "-Form"." <br>" ;
  
  if ($row['ui'] == "User interface") 
    echo "-User interface"." <br>" ;
  
  echo "Date : ".$row["postdate"]."<br>";
  echo "Time : ".$row["posttime"]."<br>";
  echo "Comments : ".$row["comment"]."<br>";
  echo "Action : <a href=edit.php?id=".$row["id"].">Edit</a> / <a href=delete.php?id=".$row["id"].">Delete</a>";
  echo "</li>";
  echo "<hr>";
}
?>
</ol>
 <p><a href="index.php">Home</a></a></p>
</body>
</html>