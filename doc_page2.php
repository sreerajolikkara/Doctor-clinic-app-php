<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="doc";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error==0) {
echo "Connected successfully";
if(isset($_POST['submit']))
{
$userid=$_POST['usid'];
$sql = "SELECT * FROM t1 where($userid=id);";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>id: " . $row["id"]. " - <br>Name:: " . $row["patname"]. "<br>mobile:: " . $row["patmob"]. "<br>";
    }
} else {
    echo "0 results";
}
$sql = "SELECT * FROM t2 where($userid=id);";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>id: " . $row["id"]. " - <br>date:: " . $row["date"]. "<br>docid:: " 
		.$row["docid"]. "<br>description: " .$row["descrip"]."<br>medicines: " 
		.$row["medicine"]."<br>";
    }
} else {
    echo "0 results";
}
}
if(isset($_POST['submit1']))
{
$userid1=$_POST['usid1'];
$date=$_POST['dateup'];
$docid=$_POST['docid'];
$descr=$_POST['descr'];
$medi=$_POST['med'];
if($userid1==$x)
{
$sql = "INSERT INTO t2 (id, date, docid, descrip, medicine)
VALUES ($userid1, '$date', $docid, '$descr', '$medi')";
if ($conn->query($sql) === TRUE) 
{
    echo "New record created successfully";
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}	
}
else
{echo "entered wrong id please check the id :)";
}
}
}
?>



<html>
<h2>Search desk</h2>
<table>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<tr>
<td>
enter id<input type="text" id="usid" name="usid"/>
</td>
</tr>

<tr>
<td>
<input type="submit" id="sub" name="submit"/>
</td>
</tr>
</form>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<tr>
<td>
enter id:<input type="text" id="usid1" name="usid1"/>
</td>
</tr>
<tr>
<td>
enter date:<input type="date" id="date" name="dateup"/>
</td>
</tr>
<tr>
<td>
enter docid:<input type="text" id="docid" name="docid"/>
</td>
</tr>
<tr>
<td>
enter description:<input type="text" id="descr" name="descr"/>
</td>
</tr>
<tr>
<td>
enter medicines:<input type="text" id="med" name="med"/>
</td>
</tr>
<tr>
<td>
<input type="submit" value="update" id="sub" name="submit1"/>
</td>
</tr>
</form>
</table>
</html>
