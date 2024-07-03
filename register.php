<?php
if(isset($_POST['name']))
{
$server="localhost";
$username="root";
$password="";
$dbname = "banquet hall";
$con= mysqli_connect($server,$username,$password,$dbname);
if(!$con)
{
    die ("failed".mysqli_connect_error());
}
// echo "sucess";
$fullName=$_POST['name'];
$contact=$_POST['age'];
$email=$_POST['gender'];
$address=$_POST['mobile'];
$sql = "INSERT INTO kl (name, age, gender, email, mobile) VALUES ('$name', '$age', '$gender', '$email','$mobile')";
// echo $sql;

if(mysqli_query($con,$sql))
{
    echo "successfully inserted";
}
else
{
      echo "error:";
      echo $sql;
      echo mysqli_error($con);

}
mysqli_close($con);
}
?>