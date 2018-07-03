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
$username=$_POST['uname'];
$mobile=$_POST['mob'];
$age=$_POST['age'];
$sql = "INSERT INTO t1 (id, patname, patmob, age)
VALUES ($userid, '$username', $mobile, $age)";
if ($conn->query($sql) === TRUE) 
{
    echo "New record created successfully";
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
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


}
if(isset($_POST['msearch']))
{
$mobile=$_POST['mobil'];
$sql = "SELECT * FROM t1 where($mobile=patmob);";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<br>id: " . $row["id"]. " - <br>Name:: " . $row["patname"]. "<br>mobile:: " . $row["patmob"]. "<br>";
    }
} else {
    echo "0 results";
}



}
$pdo = new PDO();
$results = $pdo->query("SELECT * FROM t1 INTO OUTFILE 'data.txt'");
$dummy = $result->fetchAll();

}
?>



<html>
<h2>Registration Desk</h2>
<table>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<tr>
<td>
enter id<input type="text" id="usid" name="usid"/>
</td>
</tr>
<tr>
<td>
enter name:<input type="text" id="uname" name="uname"/>
</td>
</tr>
<tr>
<td>
enter mobilenumber:<input type="text" id="mob" name="mob"/>
</td>
</tr>
<tr>
<td>
enter Age:<input type="text" id="age" name="age"/>
</td>
</tr>
<tr>
<td>
<input type="submit" id="sub" name="submit"/>
</td>
</tr>
</form>
<table>
<thead>
<th><h2>Search using id:<h2></th>
</thead>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<tr>
<td>
enter id:<input type="text" id="usid" name="usid"/>
</td>
</tr>
<tr>
<td>
<input type="submit" id="sub" name="isearch" value="idsearch"/>
</td>
</tr>
</form>
<table>
<thead>
<th><h2>search using mobile number:</h2></th>
</thead>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<tr>
<td>
enter mobile-number:<input type="text" id="mobil" name="mobil"/>
</td>
</tr>
<tr>
<td>
<input type="submit" id="sub" name="msearch" value="mobsearch"/>
</td>
</tr>
</form>
</table>
</html>
