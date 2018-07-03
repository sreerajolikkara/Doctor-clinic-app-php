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
if(isset($_POST['isearch']))
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
$doctid=$_POST['docid1'];
$sql1 = "SELECT date FROM t2 where($doctid=docid);";
$result2 = $conn->query($sql1);
$row = $result2->fetch_assoc();
$x=$row["date"];
echo "date as per is::";
echo $x;
$newdate = date("Y/m/d", strtotime($x));
echo "<br>new x:";
echo $newdate;
echo "<br>y:";
$y = date('Y/m/d');
echo $y; 
$x1 = strtotime($x);
$y1 = strtotime($y);
echo"<br>x1:".$x1."<br>";
$secs = $y1 - $x1;// == <seconds between the two times>
$days = $secs / 86400;



echo "<br>days:";
echo $days;
if($days<7)
	echo "Free consultation";
else
	echo"Fees to be collected<br><br><br>";
$sql= "SELECT * FROM t2 where(($doctid=docid) AND ($userid=id));";
$result= $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>id: " . $row["id"]. " - <br>doctorid:: " . $row["docid"]. "<br>description:: " . $row["descrip"]. "<br>";
    }
} else {
    echo "0 results";
}
}
}
?>
<html>
<head>
<h1>doctors appointment check using previous date</h1>
</head>
<body>
<table>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<tr>
<td>
enter id:<input type="text" id="usid" name="usid"/>
</td>
</tr>
<tr>
<td>
enter doctor id:<input type="text" id="docid1" name="docid1"/>
</td>
</tr>
<tr>
<td>
<input type="submit" id="sub" name="isearch"/>
</td>
</tr>
</form>
<table>
</body>
</html>
